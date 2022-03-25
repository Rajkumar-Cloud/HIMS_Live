<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewPatientServicesEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fview_patient_servicesedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fview_patient_servicesedit = currentForm = new ew.Form("fview_patient_servicesedit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_patient_services")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.view_patient_services)
        ew.vars.tables.view_patient_services = currentTable;
    fview_patient_servicesedit.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["Reception", [fields.Reception.visible && fields.Reception.required ? ew.Validators.required(fields.Reception.caption) : null], fields.Reception.isInvalid],
        ["mrnno", [fields.mrnno.visible && fields.mrnno.required ? ew.Validators.required(fields.mrnno.caption) : null], fields.mrnno.isInvalid],
        ["PatientName", [fields.PatientName.visible && fields.PatientName.required ? ew.Validators.required(fields.PatientName.caption) : null], fields.PatientName.isInvalid],
        ["Age", [fields.Age.visible && fields.Age.required ? ew.Validators.required(fields.Age.caption) : null], fields.Age.isInvalid],
        ["Gender", [fields.Gender.visible && fields.Gender.required ? ew.Validators.required(fields.Gender.caption) : null], fields.Gender.isInvalid],
        ["profilePic", [fields.profilePic.visible && fields.profilePic.required ? ew.Validators.required(fields.profilePic.caption) : null], fields.profilePic.isInvalid],
        ["Services", [fields.Services.visible && fields.Services.required ? ew.Validators.required(fields.Services.caption) : null], fields.Services.isInvalid],
        ["Unit", [fields.Unit.visible && fields.Unit.required ? ew.Validators.required(fields.Unit.caption) : null, ew.Validators.integer], fields.Unit.isInvalid],
        ["amount", [fields.amount.visible && fields.amount.required ? ew.Validators.required(fields.amount.caption) : null, ew.Validators.float], fields.amount.isInvalid],
        ["Quantity", [fields.Quantity.visible && fields.Quantity.required ? ew.Validators.required(fields.Quantity.caption) : null, ew.Validators.integer], fields.Quantity.isInvalid],
        ["DiscountCategory", [fields.DiscountCategory.visible && fields.DiscountCategory.required ? ew.Validators.required(fields.DiscountCategory.caption) : null], fields.DiscountCategory.isInvalid],
        ["Discount", [fields.Discount.visible && fields.Discount.required ? ew.Validators.required(fields.Discount.caption) : null, ew.Validators.float], fields.Discount.isInvalid],
        ["SubTotal", [fields.SubTotal.visible && fields.SubTotal.required ? ew.Validators.required(fields.SubTotal.caption) : null, ew.Validators.float], fields.SubTotal.isInvalid],
        ["description", [fields.description.visible && fields.description.required ? ew.Validators.required(fields.description.caption) : null], fields.description.isInvalid],
        ["patient_type", [fields.patient_type.visible && fields.patient_type.required ? ew.Validators.required(fields.patient_type.caption) : null], fields.patient_type.isInvalid],
        ["charged_date", [fields.charged_date.visible && fields.charged_date.required ? ew.Validators.required(fields.charged_date.caption) : null], fields.charged_date.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null], fields.status.isInvalid],
        ["modifiedby", [fields.modifiedby.visible && fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.visible && fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null], fields.modifieddatetime.isInvalid],
        ["Aid", [fields.Aid.visible && fields.Aid.required ? ew.Validators.required(fields.Aid.caption) : null], fields.Aid.isInvalid],
        ["Vid", [fields.Vid.visible && fields.Vid.required ? ew.Validators.required(fields.Vid.caption) : null], fields.Vid.isInvalid],
        ["DrID", [fields.DrID.visible && fields.DrID.required ? ew.Validators.required(fields.DrID.caption) : null], fields.DrID.isInvalid],
        ["DrCODE", [fields.DrCODE.visible && fields.DrCODE.required ? ew.Validators.required(fields.DrCODE.caption) : null], fields.DrCODE.isInvalid],
        ["DrName", [fields.DrName.visible && fields.DrName.required ? ew.Validators.required(fields.DrName.caption) : null], fields.DrName.isInvalid],
        ["Department", [fields.Department.visible && fields.Department.required ? ew.Validators.required(fields.Department.caption) : null], fields.Department.isInvalid],
        ["DrSharePres", [fields.DrSharePres.visible && fields.DrSharePres.required ? ew.Validators.required(fields.DrSharePres.caption) : null, ew.Validators.float], fields.DrSharePres.isInvalid],
        ["HospSharePres", [fields.HospSharePres.visible && fields.HospSharePres.required ? ew.Validators.required(fields.HospSharePres.caption) : null, ew.Validators.float], fields.HospSharePres.isInvalid],
        ["DrShareAmount", [fields.DrShareAmount.visible && fields.DrShareAmount.required ? ew.Validators.required(fields.DrShareAmount.caption) : null, ew.Validators.float], fields.DrShareAmount.isInvalid],
        ["HospShareAmount", [fields.HospShareAmount.visible && fields.HospShareAmount.required ? ew.Validators.required(fields.HospShareAmount.caption) : null, ew.Validators.float], fields.HospShareAmount.isInvalid],
        ["DrShareSettiledAmount", [fields.DrShareSettiledAmount.visible && fields.DrShareSettiledAmount.required ? ew.Validators.required(fields.DrShareSettiledAmount.caption) : null, ew.Validators.float], fields.DrShareSettiledAmount.isInvalid],
        ["DrShareSettledId", [fields.DrShareSettledId.visible && fields.DrShareSettledId.required ? ew.Validators.required(fields.DrShareSettledId.caption) : null, ew.Validators.integer], fields.DrShareSettledId.isInvalid],
        ["DrShareSettiledStatus", [fields.DrShareSettiledStatus.visible && fields.DrShareSettiledStatus.required ? ew.Validators.required(fields.DrShareSettiledStatus.caption) : null, ew.Validators.integer], fields.DrShareSettiledStatus.isInvalid],
        ["invoiceId", [fields.invoiceId.visible && fields.invoiceId.required ? ew.Validators.required(fields.invoiceId.caption) : null, ew.Validators.integer], fields.invoiceId.isInvalid],
        ["invoiceAmount", [fields.invoiceAmount.visible && fields.invoiceAmount.required ? ew.Validators.required(fields.invoiceAmount.caption) : null, ew.Validators.float], fields.invoiceAmount.isInvalid],
        ["invoiceStatus", [fields.invoiceStatus.visible && fields.invoiceStatus.required ? ew.Validators.required(fields.invoiceStatus.caption) : null], fields.invoiceStatus.isInvalid],
        ["modeOfPayment", [fields.modeOfPayment.visible && fields.modeOfPayment.required ? ew.Validators.required(fields.modeOfPayment.caption) : null], fields.modeOfPayment.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid],
        ["RIDNO", [fields.RIDNO.visible && fields.RIDNO.required ? ew.Validators.required(fields.RIDNO.caption) : null, ew.Validators.integer], fields.RIDNO.isInvalid],
        ["ItemCode", [fields.ItemCode.visible && fields.ItemCode.required ? ew.Validators.required(fields.ItemCode.caption) : null], fields.ItemCode.isInvalid],
        ["TidNo", [fields.TidNo.visible && fields.TidNo.required ? ew.Validators.required(fields.TidNo.caption) : null, ew.Validators.integer], fields.TidNo.isInvalid],
        ["sid", [fields.sid.visible && fields.sid.required ? ew.Validators.required(fields.sid.caption) : null, ew.Validators.integer], fields.sid.isInvalid],
        ["TestSubCd", [fields.TestSubCd.visible && fields.TestSubCd.required ? ew.Validators.required(fields.TestSubCd.caption) : null], fields.TestSubCd.isInvalid],
        ["DEptCd", [fields.DEptCd.visible && fields.DEptCd.required ? ew.Validators.required(fields.DEptCd.caption) : null], fields.DEptCd.isInvalid],
        ["ProfCd", [fields.ProfCd.visible && fields.ProfCd.required ? ew.Validators.required(fields.ProfCd.caption) : null], fields.ProfCd.isInvalid],
        ["LabReport", [fields.LabReport.visible && fields.LabReport.required ? ew.Validators.required(fields.LabReport.caption) : null], fields.LabReport.isInvalid],
        ["Comments", [fields.Comments.visible && fields.Comments.required ? ew.Validators.required(fields.Comments.caption) : null], fields.Comments.isInvalid],
        ["Method", [fields.Method.visible && fields.Method.required ? ew.Validators.required(fields.Method.caption) : null], fields.Method.isInvalid],
        ["Specimen", [fields.Specimen.visible && fields.Specimen.required ? ew.Validators.required(fields.Specimen.caption) : null], fields.Specimen.isInvalid],
        ["Abnormal", [fields.Abnormal.visible && fields.Abnormal.required ? ew.Validators.required(fields.Abnormal.caption) : null], fields.Abnormal.isInvalid],
        ["RefValue", [fields.RefValue.visible && fields.RefValue.required ? ew.Validators.required(fields.RefValue.caption) : null], fields.RefValue.isInvalid],
        ["TestUnit", [fields.TestUnit.visible && fields.TestUnit.required ? ew.Validators.required(fields.TestUnit.caption) : null], fields.TestUnit.isInvalid],
        ["LOWHIGH", [fields.LOWHIGH.visible && fields.LOWHIGH.required ? ew.Validators.required(fields.LOWHIGH.caption) : null], fields.LOWHIGH.isInvalid],
        ["Branch", [fields.Branch.visible && fields.Branch.required ? ew.Validators.required(fields.Branch.caption) : null], fields.Branch.isInvalid],
        ["Dispatch", [fields.Dispatch.visible && fields.Dispatch.required ? ew.Validators.required(fields.Dispatch.caption) : null], fields.Dispatch.isInvalid],
        ["Pic1", [fields.Pic1.visible && fields.Pic1.required ? ew.Validators.required(fields.Pic1.caption) : null], fields.Pic1.isInvalid],
        ["Pic2", [fields.Pic2.visible && fields.Pic2.required ? ew.Validators.required(fields.Pic2.caption) : null], fields.Pic2.isInvalid],
        ["GraphPath", [fields.GraphPath.visible && fields.GraphPath.required ? ew.Validators.required(fields.GraphPath.caption) : null], fields.GraphPath.isInvalid],
        ["MachineCD", [fields.MachineCD.visible && fields.MachineCD.required ? ew.Validators.required(fields.MachineCD.caption) : null], fields.MachineCD.isInvalid],
        ["TestCancel", [fields.TestCancel.visible && fields.TestCancel.required ? ew.Validators.required(fields.TestCancel.caption) : null], fields.TestCancel.isInvalid],
        ["OutSource", [fields.OutSource.visible && fields.OutSource.required ? ew.Validators.required(fields.OutSource.caption) : null], fields.OutSource.isInvalid],
        ["Printed", [fields.Printed.visible && fields.Printed.required ? ew.Validators.required(fields.Printed.caption) : null], fields.Printed.isInvalid],
        ["PrintBy", [fields.PrintBy.visible && fields.PrintBy.required ? ew.Validators.required(fields.PrintBy.caption) : null], fields.PrintBy.isInvalid],
        ["PrintDate", [fields.PrintDate.visible && fields.PrintDate.required ? ew.Validators.required(fields.PrintDate.caption) : null, ew.Validators.datetime(0)], fields.PrintDate.isInvalid],
        ["BillingDate", [fields.BillingDate.visible && fields.BillingDate.required ? ew.Validators.required(fields.BillingDate.caption) : null, ew.Validators.datetime(0)], fields.BillingDate.isInvalid],
        ["BilledBy", [fields.BilledBy.visible && fields.BilledBy.required ? ew.Validators.required(fields.BilledBy.caption) : null], fields.BilledBy.isInvalid],
        ["Resulted", [fields.Resulted.visible && fields.Resulted.required ? ew.Validators.required(fields.Resulted.caption) : null], fields.Resulted.isInvalid],
        ["ResultDate", [fields.ResultDate.visible && fields.ResultDate.required ? ew.Validators.required(fields.ResultDate.caption) : null, ew.Validators.datetime(0)], fields.ResultDate.isInvalid],
        ["ResultedBy", [fields.ResultedBy.visible && fields.ResultedBy.required ? ew.Validators.required(fields.ResultedBy.caption) : null], fields.ResultedBy.isInvalid],
        ["SampleDate", [fields.SampleDate.visible && fields.SampleDate.required ? ew.Validators.required(fields.SampleDate.caption) : null, ew.Validators.datetime(0)], fields.SampleDate.isInvalid],
        ["SampleUser", [fields.SampleUser.visible && fields.SampleUser.required ? ew.Validators.required(fields.SampleUser.caption) : null], fields.SampleUser.isInvalid],
        ["Sampled", [fields.Sampled.visible && fields.Sampled.required ? ew.Validators.required(fields.Sampled.caption) : null], fields.Sampled.isInvalid],
        ["ReceivedDate", [fields.ReceivedDate.visible && fields.ReceivedDate.required ? ew.Validators.required(fields.ReceivedDate.caption) : null, ew.Validators.datetime(0)], fields.ReceivedDate.isInvalid],
        ["ReceivedUser", [fields.ReceivedUser.visible && fields.ReceivedUser.required ? ew.Validators.required(fields.ReceivedUser.caption) : null], fields.ReceivedUser.isInvalid],
        ["Recevied", [fields.Recevied.visible && fields.Recevied.required ? ew.Validators.required(fields.Recevied.caption) : null], fields.Recevied.isInvalid],
        ["DeptRecvDate", [fields.DeptRecvDate.visible && fields.DeptRecvDate.required ? ew.Validators.required(fields.DeptRecvDate.caption) : null, ew.Validators.datetime(0)], fields.DeptRecvDate.isInvalid],
        ["DeptRecvUser", [fields.DeptRecvUser.visible && fields.DeptRecvUser.required ? ew.Validators.required(fields.DeptRecvUser.caption) : null], fields.DeptRecvUser.isInvalid],
        ["DeptRecived", [fields.DeptRecived.visible && fields.DeptRecived.required ? ew.Validators.required(fields.DeptRecived.caption) : null], fields.DeptRecived.isInvalid],
        ["SAuthDate", [fields.SAuthDate.visible && fields.SAuthDate.required ? ew.Validators.required(fields.SAuthDate.caption) : null, ew.Validators.datetime(0)], fields.SAuthDate.isInvalid],
        ["SAuthBy", [fields.SAuthBy.visible && fields.SAuthBy.required ? ew.Validators.required(fields.SAuthBy.caption) : null], fields.SAuthBy.isInvalid],
        ["SAuthendicate", [fields.SAuthendicate.visible && fields.SAuthendicate.required ? ew.Validators.required(fields.SAuthendicate.caption) : null], fields.SAuthendicate.isInvalid],
        ["AuthDate", [fields.AuthDate.visible && fields.AuthDate.required ? ew.Validators.required(fields.AuthDate.caption) : null, ew.Validators.datetime(0)], fields.AuthDate.isInvalid],
        ["AuthBy", [fields.AuthBy.visible && fields.AuthBy.required ? ew.Validators.required(fields.AuthBy.caption) : null], fields.AuthBy.isInvalid],
        ["Authencate", [fields.Authencate.visible && fields.Authencate.required ? ew.Validators.required(fields.Authencate.caption) : null], fields.Authencate.isInvalid],
        ["EditDate", [fields.EditDate.visible && fields.EditDate.required ? ew.Validators.required(fields.EditDate.caption) : null, ew.Validators.datetime(0)], fields.EditDate.isInvalid],
        ["EditBy", [fields.EditBy.visible && fields.EditBy.required ? ew.Validators.required(fields.EditBy.caption) : null], fields.EditBy.isInvalid],
        ["Editted", [fields.Editted.visible && fields.Editted.required ? ew.Validators.required(fields.Editted.caption) : null], fields.Editted.isInvalid],
        ["PatID", [fields.PatID.visible && fields.PatID.required ? ew.Validators.required(fields.PatID.caption) : null, ew.Validators.integer], fields.PatID.isInvalid],
        ["PatientId", [fields.PatientId.visible && fields.PatientId.required ? ew.Validators.required(fields.PatientId.caption) : null], fields.PatientId.isInvalid],
        ["Mobile", [fields.Mobile.visible && fields.Mobile.required ? ew.Validators.required(fields.Mobile.caption) : null], fields.Mobile.isInvalid],
        ["CId", [fields.CId.visible && fields.CId.required ? ew.Validators.required(fields.CId.caption) : null, ew.Validators.integer], fields.CId.isInvalid],
        ["Order", [fields.Order.visible && fields.Order.required ? ew.Validators.required(fields.Order.caption) : null, ew.Validators.float], fields.Order.isInvalid],
        ["Form", [fields.Form.visible && fields.Form.required ? ew.Validators.required(fields.Form.caption) : null], fields.Form.isInvalid],
        ["ResType", [fields.ResType.visible && fields.ResType.required ? ew.Validators.required(fields.ResType.caption) : null], fields.ResType.isInvalid],
        ["Sample", [fields.Sample.visible && fields.Sample.required ? ew.Validators.required(fields.Sample.caption) : null], fields.Sample.isInvalid],
        ["NoD", [fields.NoD.visible && fields.NoD.required ? ew.Validators.required(fields.NoD.caption) : null, ew.Validators.float], fields.NoD.isInvalid],
        ["BillOrder", [fields.BillOrder.visible && fields.BillOrder.required ? ew.Validators.required(fields.BillOrder.caption) : null, ew.Validators.float], fields.BillOrder.isInvalid],
        ["Formula", [fields.Formula.visible && fields.Formula.required ? ew.Validators.required(fields.Formula.caption) : null], fields.Formula.isInvalid],
        ["Inactive", [fields.Inactive.visible && fields.Inactive.required ? ew.Validators.required(fields.Inactive.caption) : null], fields.Inactive.isInvalid],
        ["CollSample", [fields.CollSample.visible && fields.CollSample.required ? ew.Validators.required(fields.CollSample.caption) : null], fields.CollSample.isInvalid],
        ["TestType", [fields.TestType.visible && fields.TestType.required ? ew.Validators.required(fields.TestType.caption) : null], fields.TestType.isInvalid],
        ["Repeated", [fields.Repeated.visible && fields.Repeated.required ? ew.Validators.required(fields.Repeated.caption) : null], fields.Repeated.isInvalid],
        ["RepeatedBy", [fields.RepeatedBy.visible && fields.RepeatedBy.required ? ew.Validators.required(fields.RepeatedBy.caption) : null], fields.RepeatedBy.isInvalid],
        ["RepeatedDate", [fields.RepeatedDate.visible && fields.RepeatedDate.required ? ew.Validators.required(fields.RepeatedDate.caption) : null, ew.Validators.datetime(0)], fields.RepeatedDate.isInvalid],
        ["serviceID", [fields.serviceID.visible && fields.serviceID.required ? ew.Validators.required(fields.serviceID.caption) : null, ew.Validators.integer], fields.serviceID.isInvalid],
        ["Service_Type", [fields.Service_Type.visible && fields.Service_Type.required ? ew.Validators.required(fields.Service_Type.caption) : null], fields.Service_Type.isInvalid],
        ["Service_Department", [fields.Service_Department.visible && fields.Service_Department.required ? ew.Validators.required(fields.Service_Department.caption) : null], fields.Service_Department.isInvalid],
        ["RequestNo", [fields.RequestNo.visible && fields.RequestNo.required ? ew.Validators.required(fields.RequestNo.caption) : null, ew.Validators.integer], fields.RequestNo.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fview_patient_servicesedit,
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
    fview_patient_servicesedit.validate = function () {
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
    fview_patient_servicesedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_patient_servicesedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_patient_servicesedit.lists.Services = <?= $Page->Services->toClientList($Page) ?>;
    fview_patient_servicesedit.lists.DiscountCategory = <?= $Page->DiscountCategory->toClientList($Page) ?>;
    loadjs.done("fview_patient_servicesedit");
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
<form name="fview_patient_servicesedit" id="fview_patient_servicesedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_patient_services">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<?php if ($Page->getCurrentMasterTable() == "view_billing_voucher") { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="view_billing_voucher">
<input type="hidden" name="fk_id" value="<?= HtmlEncode($Page->Vid->getSessionValue()) ?>">
<?php } ?>
<?php if ($Page->getCurrentMasterTable() == "view_billing_voucher_print") { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="view_billing_voucher_print">
<input type="hidden" name="fk_id" value="<?= HtmlEncode($Page->Vid->getSessionValue()) ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_view_patient_services_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<span id="el_view_patient_services_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
    <div id="r_Reception" class="form-group row">
        <label id="elh_view_patient_services_Reception" for="x_Reception" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Reception->caption() ?><?= $Page->Reception->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Reception->cellAttributes() ?>>
<span id="el_view_patient_services_Reception">
<span<?= $Page->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Reception->getDisplayValue($Page->Reception->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Reception" data-hidden="1" name="x_Reception" id="x_Reception" value="<?= HtmlEncode($Page->Reception->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <div id="r_mrnno" class="form-group row">
        <label id="elh_view_patient_services_mrnno" for="x_mrnno" class="<?= $Page->LeftColumnClass ?>"><?= $Page->mrnno->caption() ?><?= $Page->mrnno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mrnno->cellAttributes() ?>>
<span id="el_view_patient_services_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->mrnno->getDisplayValue($Page->mrnno->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_mrnno" data-hidden="1" name="x_mrnno" id="x_mrnno" value="<?= HtmlEncode($Page->mrnno->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <div id="r_PatientName" class="form-group row">
        <label id="elh_view_patient_services_PatientName" for="x_PatientName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PatientName->caption() ?><?= $Page->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientName->cellAttributes() ?>>
<span id="el_view_patient_services_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PatientName->getDisplayValue($Page->PatientName->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_PatientName" data-hidden="1" name="x_PatientName" id="x_PatientName" value="<?= HtmlEncode($Page->PatientName->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <div id="r_Age" class="form-group row">
        <label id="elh_view_patient_services_Age" for="x_Age" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Age->caption() ?><?= $Page->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Age->cellAttributes() ?>>
<span id="el_view_patient_services_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Age->getDisplayValue($Page->Age->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Age" data-hidden="1" name="x_Age" id="x_Age" value="<?= HtmlEncode($Page->Age->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
    <div id="r_Gender" class="form-group row">
        <label id="elh_view_patient_services_Gender" for="x_Gender" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Gender->caption() ?><?= $Page->Gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Gender->cellAttributes() ?>>
<span id="el_view_patient_services_Gender">
<span<?= $Page->Gender->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Gender->getDisplayValue($Page->Gender->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Gender" data-hidden="1" name="x_Gender" id="x_Gender" value="<?= HtmlEncode($Page->Gender->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <div id="r_profilePic" class="form-group row">
        <label id="elh_view_patient_services_profilePic" for="x_profilePic" class="<?= $Page->LeftColumnClass ?>"><?= $Page->profilePic->caption() ?><?= $Page->profilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->profilePic->cellAttributes() ?>>
<span id="el_view_patient_services_profilePic">
<span<?= $Page->profilePic->viewAttributes() ?>>
<?= $Page->profilePic->EditValue ?></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_profilePic" data-hidden="1" name="x_profilePic" id="x_profilePic" value="<?= HtmlEncode($Page->profilePic->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Services->Visible) { // Services ?>
    <div id="r_Services" class="form-group row">
        <label id="elh_view_patient_services_Services" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Services->caption() ?><?= $Page->Services->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Services->cellAttributes() ?>>
<span id="el_view_patient_services_Services">
<?php
$onchange = $Page->Services->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->Services->EditAttrs["onchange"] = "";
?>
<span id="as_x_Services" class="ew-auto-suggest">
    <input type="<?= $Page->Services->getInputTextType() ?>" class="form-control" name="sv_x_Services" id="sv_x_Services" value="<?= RemoveHtml($Page->Services->EditValue) ?>" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Services->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->Services->getPlaceHolder()) ?>"<?= $Page->Services->editAttributes() ?> aria-describedby="x_Services_help">
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_patient_services" data-field="x_Services" data-input="sv_x_Services" data-value-separator="<?= $Page->Services->displayValueSeparatorAttribute() ?>" name="x_Services" id="x_Services" value="<?= HtmlEncode($Page->Services->CurrentValue) ?>"<?= $onchange ?>>
<?= $Page->Services->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Services->getErrorMessage() ?></div>
<script>
loadjs.ready(["fview_patient_servicesedit"], function() {
    fview_patient_servicesedit.createAutoSuggest(Object.assign({"id":"x_Services","forceSelect":false}, ew.vars.tables.view_patient_services.fields.Services.autoSuggestOptions));
});
</script>
<?= $Page->Services->Lookup->getParamTag($Page, "p_x_Services") ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Unit->Visible) { // Unit ?>
    <div id="r_Unit" class="form-group row">
        <label id="elh_view_patient_services_Unit" for="x_Unit" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Unit->caption() ?><?= $Page->Unit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Unit->cellAttributes() ?>>
<span id="el_view_patient_services_Unit">
<input type="<?= $Page->Unit->getInputTextType() ?>" data-table="view_patient_services" data-field="x_Unit" name="x_Unit" id="x_Unit" size="2" maxlength="2" placeholder="<?= HtmlEncode($Page->Unit->getPlaceHolder()) ?>" value="<?= $Page->Unit->EditValue ?>"<?= $Page->Unit->editAttributes() ?> aria-describedby="x_Unit_help">
<?= $Page->Unit->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Unit->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->amount->Visible) { // amount ?>
    <div id="r_amount" class="form-group row">
        <label id="elh_view_patient_services_amount" for="x_amount" class="<?= $Page->LeftColumnClass ?>"><?= $Page->amount->caption() ?><?= $Page->amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->amount->cellAttributes() ?>>
<span id="el_view_patient_services_amount">
<input type="<?= $Page->amount->getInputTextType() ?>" data-table="view_patient_services" data-field="x_amount" name="x_amount" id="x_amount" size="7" maxlength="7" placeholder="<?= HtmlEncode($Page->amount->getPlaceHolder()) ?>" value="<?= $Page->amount->EditValue ?>"<?= $Page->amount->editAttributes() ?> aria-describedby="x_amount_help">
<?= $Page->amount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->amount->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Quantity->Visible) { // Quantity ?>
    <div id="r_Quantity" class="form-group row">
        <label id="elh_view_patient_services_Quantity" for="x_Quantity" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Quantity->caption() ?><?= $Page->Quantity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Quantity->cellAttributes() ?>>
<span id="el_view_patient_services_Quantity">
<input type="<?= $Page->Quantity->getInputTextType() ?>" data-table="view_patient_services" data-field="x_Quantity" name="x_Quantity" id="x_Quantity" size="2" maxlength="2" placeholder="<?= HtmlEncode($Page->Quantity->getPlaceHolder()) ?>" value="<?= $Page->Quantity->EditValue ?>"<?= $Page->Quantity->editAttributes() ?> aria-describedby="x_Quantity_help">
<?= $Page->Quantity->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Quantity->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DiscountCategory->Visible) { // DiscountCategory ?>
    <div id="r_DiscountCategory" class="form-group row">
        <label id="elh_view_patient_services_DiscountCategory" for="x_DiscountCategory" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DiscountCategory->caption() ?><?= $Page->DiscountCategory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DiscountCategory->cellAttributes() ?>>
<span id="el_view_patient_services_DiscountCategory">
    <select
        id="x_DiscountCategory"
        name="x_DiscountCategory"
        class="form-control ew-select<?= $Page->DiscountCategory->isInvalidClass() ?>"
        data-select2-id="view_patient_services_x_DiscountCategory"
        data-table="view_patient_services"
        data-field="x_DiscountCategory"
        data-value-separator="<?= $Page->DiscountCategory->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->DiscountCategory->getPlaceHolder()) ?>"
        <?= $Page->DiscountCategory->editAttributes() ?>>
        <?= $Page->DiscountCategory->selectOptionListHtml("x_DiscountCategory") ?>
    </select>
    <?= $Page->DiscountCategory->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->DiscountCategory->getErrorMessage() ?></div>
<?= $Page->DiscountCategory->Lookup->getParamTag($Page, "p_x_DiscountCategory") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_patient_services_x_DiscountCategory']"),
        options = { name: "x_DiscountCategory", selectId: "view_patient_services_x_DiscountCategory", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_patient_services.fields.DiscountCategory.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Discount->Visible) { // Discount ?>
    <div id="r_Discount" class="form-group row">
        <label id="elh_view_patient_services_Discount" for="x_Discount" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Discount->caption() ?><?= $Page->Discount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Discount->cellAttributes() ?>>
<span id="el_view_patient_services_Discount">
<input type="<?= $Page->Discount->getInputTextType() ?>" data-table="view_patient_services" data-field="x_Discount" name="x_Discount" id="x_Discount" size="3" maxlength="3" placeholder="<?= HtmlEncode($Page->Discount->getPlaceHolder()) ?>" value="<?= $Page->Discount->EditValue ?>"<?= $Page->Discount->editAttributes() ?> aria-describedby="x_Discount_help">
<?= $Page->Discount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Discount->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SubTotal->Visible) { // SubTotal ?>
    <div id="r_SubTotal" class="form-group row">
        <label id="elh_view_patient_services_SubTotal" for="x_SubTotal" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SubTotal->caption() ?><?= $Page->SubTotal->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SubTotal->cellAttributes() ?>>
<span id="el_view_patient_services_SubTotal">
<input type="<?= $Page->SubTotal->getInputTextType() ?>" data-table="view_patient_services" data-field="x_SubTotal" name="x_SubTotal" id="x_SubTotal" size="8" maxlength="8" placeholder="<?= HtmlEncode($Page->SubTotal->getPlaceHolder()) ?>" value="<?= $Page->SubTotal->EditValue ?>"<?= $Page->SubTotal->editAttributes() ?> aria-describedby="x_SubTotal_help">
<?= $Page->SubTotal->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SubTotal->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->description->Visible) { // description ?>
    <div id="r_description" class="form-group row">
        <label id="elh_view_patient_services_description" for="x_description" class="<?= $Page->LeftColumnClass ?>"><?= $Page->description->caption() ?><?= $Page->description->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->description->cellAttributes() ?>>
<span id="el_view_patient_services_description">
<span<?= $Page->description->viewAttributes() ?>>
<?= $Page->description->EditValue ?></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_description" data-hidden="1" name="x_description" id="x_description" value="<?= HtmlEncode($Page->description->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->patient_type->Visible) { // patient_type ?>
    <div id="r_patient_type" class="form-group row">
        <label id="elh_view_patient_services_patient_type" for="x_patient_type" class="<?= $Page->LeftColumnClass ?>"><?= $Page->patient_type->caption() ?><?= $Page->patient_type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->patient_type->cellAttributes() ?>>
<span id="el_view_patient_services_patient_type">
<span<?= $Page->patient_type->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->patient_type->getDisplayValue($Page->patient_type->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_patient_type" data-hidden="1" name="x_patient_type" id="x_patient_type" value="<?= HtmlEncode($Page->patient_type->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->charged_date->Visible) { // charged_date ?>
    <div id="r_charged_date" class="form-group row">
        <label id="elh_view_patient_services_charged_date" for="x_charged_date" class="<?= $Page->LeftColumnClass ?>"><?= $Page->charged_date->caption() ?><?= $Page->charged_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->charged_date->cellAttributes() ?>>
<span id="el_view_patient_services_charged_date">
<span<?= $Page->charged_date->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->charged_date->getDisplayValue($Page->charged_date->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_charged_date" data-hidden="1" name="x_charged_date" id="x_charged_date" value="<?= HtmlEncode($Page->charged_date->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label id="elh_view_patient_services_status" for="x_status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
<span id="el_view_patient_services_status">
<span<?= $Page->status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->status->getDisplayValue($Page->status->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_status" data-hidden="1" name="x_status" id="x_status" value="<?= HtmlEncode($Page->status->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Aid->Visible) { // Aid ?>
    <div id="r_Aid" class="form-group row">
        <label id="elh_view_patient_services_Aid" for="x_Aid" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Aid->caption() ?><?= $Page->Aid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Aid->cellAttributes() ?>>
<span id="el_view_patient_services_Aid">
<span<?= $Page->Aid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Aid->getDisplayValue($Page->Aid->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Aid" data-hidden="1" name="x_Aid" id="x_Aid" value="<?= HtmlEncode($Page->Aid->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Vid->Visible) { // Vid ?>
    <div id="r_Vid" class="form-group row">
        <label id="elh_view_patient_services_Vid" for="x_Vid" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Vid->caption() ?><?= $Page->Vid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Vid->cellAttributes() ?>>
<span id="el_view_patient_services_Vid">
<span<?= $Page->Vid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Vid->getDisplayValue($Page->Vid->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Vid" data-hidden="1" name="x_Vid" id="x_Vid" value="<?= HtmlEncode($Page->Vid->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DrID->Visible) { // DrID ?>
    <div id="r_DrID" class="form-group row">
        <label id="elh_view_patient_services_DrID" for="x_DrID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DrID->caption() ?><?= $Page->DrID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DrID->cellAttributes() ?>>
<span id="el_view_patient_services_DrID">
<span<?= $Page->DrID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->DrID->getDisplayValue($Page->DrID->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrID" data-hidden="1" name="x_DrID" id="x_DrID" value="<?= HtmlEncode($Page->DrID->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DrCODE->Visible) { // DrCODE ?>
    <div id="r_DrCODE" class="form-group row">
        <label id="elh_view_patient_services_DrCODE" for="x_DrCODE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DrCODE->caption() ?><?= $Page->DrCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DrCODE->cellAttributes() ?>>
<span id="el_view_patient_services_DrCODE">
<span<?= $Page->DrCODE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->DrCODE->getDisplayValue($Page->DrCODE->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrCODE" data-hidden="1" name="x_DrCODE" id="x_DrCODE" value="<?= HtmlEncode($Page->DrCODE->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DrName->Visible) { // DrName ?>
    <div id="r_DrName" class="form-group row">
        <label id="elh_view_patient_services_DrName" for="x_DrName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DrName->caption() ?><?= $Page->DrName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DrName->cellAttributes() ?>>
<span id="el_view_patient_services_DrName">
<span<?= $Page->DrName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->DrName->getDisplayValue($Page->DrName->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_DrName" data-hidden="1" name="x_DrName" id="x_DrName" value="<?= HtmlEncode($Page->DrName->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Department->Visible) { // Department ?>
    <div id="r_Department" class="form-group row">
        <label id="elh_view_patient_services_Department" for="x_Department" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Department->caption() ?><?= $Page->Department->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Department->cellAttributes() ?>>
<span id="el_view_patient_services_Department">
<span<?= $Page->Department->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Department->getDisplayValue($Page->Department->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_Department" data-hidden="1" name="x_Department" id="x_Department" value="<?= HtmlEncode($Page->Department->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DrSharePres->Visible) { // DrSharePres ?>
    <div id="r_DrSharePres" class="form-group row">
        <label id="elh_view_patient_services_DrSharePres" for="x_DrSharePres" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DrSharePres->caption() ?><?= $Page->DrSharePres->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DrSharePres->cellAttributes() ?>>
<span id="el_view_patient_services_DrSharePres">
<input type="<?= $Page->DrSharePres->getInputTextType() ?>" data-table="view_patient_services" data-field="x_DrSharePres" name="x_DrSharePres" id="x_DrSharePres" size="30" placeholder="<?= HtmlEncode($Page->DrSharePres->getPlaceHolder()) ?>" value="<?= $Page->DrSharePres->EditValue ?>"<?= $Page->DrSharePres->editAttributes() ?> aria-describedby="x_DrSharePres_help">
<?= $Page->DrSharePres->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DrSharePres->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HospSharePres->Visible) { // HospSharePres ?>
    <div id="r_HospSharePres" class="form-group row">
        <label id="elh_view_patient_services_HospSharePres" for="x_HospSharePres" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HospSharePres->caption() ?><?= $Page->HospSharePres->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospSharePres->cellAttributes() ?>>
<span id="el_view_patient_services_HospSharePres">
<input type="<?= $Page->HospSharePres->getInputTextType() ?>" data-table="view_patient_services" data-field="x_HospSharePres" name="x_HospSharePres" id="x_HospSharePres" size="30" placeholder="<?= HtmlEncode($Page->HospSharePres->getPlaceHolder()) ?>" value="<?= $Page->HospSharePres->EditValue ?>"<?= $Page->HospSharePres->editAttributes() ?> aria-describedby="x_HospSharePres_help">
<?= $Page->HospSharePres->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HospSharePres->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DrShareAmount->Visible) { // DrShareAmount ?>
    <div id="r_DrShareAmount" class="form-group row">
        <label id="elh_view_patient_services_DrShareAmount" for="x_DrShareAmount" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DrShareAmount->caption() ?><?= $Page->DrShareAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DrShareAmount->cellAttributes() ?>>
<span id="el_view_patient_services_DrShareAmount">
<input type="<?= $Page->DrShareAmount->getInputTextType() ?>" data-table="view_patient_services" data-field="x_DrShareAmount" name="x_DrShareAmount" id="x_DrShareAmount" size="30" placeholder="<?= HtmlEncode($Page->DrShareAmount->getPlaceHolder()) ?>" value="<?= $Page->DrShareAmount->EditValue ?>"<?= $Page->DrShareAmount->editAttributes() ?> aria-describedby="x_DrShareAmount_help">
<?= $Page->DrShareAmount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DrShareAmount->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HospShareAmount->Visible) { // HospShareAmount ?>
    <div id="r_HospShareAmount" class="form-group row">
        <label id="elh_view_patient_services_HospShareAmount" for="x_HospShareAmount" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HospShareAmount->caption() ?><?= $Page->HospShareAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospShareAmount->cellAttributes() ?>>
<span id="el_view_patient_services_HospShareAmount">
<input type="<?= $Page->HospShareAmount->getInputTextType() ?>" data-table="view_patient_services" data-field="x_HospShareAmount" name="x_HospShareAmount" id="x_HospShareAmount" size="30" placeholder="<?= HtmlEncode($Page->HospShareAmount->getPlaceHolder()) ?>" value="<?= $Page->HospShareAmount->EditValue ?>"<?= $Page->HospShareAmount->editAttributes() ?> aria-describedby="x_HospShareAmount_help">
<?= $Page->HospShareAmount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HospShareAmount->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
    <div id="r_DrShareSettiledAmount" class="form-group row">
        <label id="elh_view_patient_services_DrShareSettiledAmount" for="x_DrShareSettiledAmount" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DrShareSettiledAmount->caption() ?><?= $Page->DrShareSettiledAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DrShareSettiledAmount->cellAttributes() ?>>
<span id="el_view_patient_services_DrShareSettiledAmount">
<input type="<?= $Page->DrShareSettiledAmount->getInputTextType() ?>" data-table="view_patient_services" data-field="x_DrShareSettiledAmount" name="x_DrShareSettiledAmount" id="x_DrShareSettiledAmount" size="30" placeholder="<?= HtmlEncode($Page->DrShareSettiledAmount->getPlaceHolder()) ?>" value="<?= $Page->DrShareSettiledAmount->EditValue ?>"<?= $Page->DrShareSettiledAmount->editAttributes() ?> aria-describedby="x_DrShareSettiledAmount_help">
<?= $Page->DrShareSettiledAmount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DrShareSettiledAmount->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DrShareSettledId->Visible) { // DrShareSettledId ?>
    <div id="r_DrShareSettledId" class="form-group row">
        <label id="elh_view_patient_services_DrShareSettledId" for="x_DrShareSettledId" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DrShareSettledId->caption() ?><?= $Page->DrShareSettledId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DrShareSettledId->cellAttributes() ?>>
<span id="el_view_patient_services_DrShareSettledId">
<input type="<?= $Page->DrShareSettledId->getInputTextType() ?>" data-table="view_patient_services" data-field="x_DrShareSettledId" name="x_DrShareSettledId" id="x_DrShareSettledId" size="30" placeholder="<?= HtmlEncode($Page->DrShareSettledId->getPlaceHolder()) ?>" value="<?= $Page->DrShareSettledId->EditValue ?>"<?= $Page->DrShareSettledId->editAttributes() ?> aria-describedby="x_DrShareSettledId_help">
<?= $Page->DrShareSettledId->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DrShareSettledId->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
    <div id="r_DrShareSettiledStatus" class="form-group row">
        <label id="elh_view_patient_services_DrShareSettiledStatus" for="x_DrShareSettiledStatus" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DrShareSettiledStatus->caption() ?><?= $Page->DrShareSettiledStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DrShareSettiledStatus->cellAttributes() ?>>
<span id="el_view_patient_services_DrShareSettiledStatus">
<input type="<?= $Page->DrShareSettiledStatus->getInputTextType() ?>" data-table="view_patient_services" data-field="x_DrShareSettiledStatus" name="x_DrShareSettiledStatus" id="x_DrShareSettiledStatus" size="30" placeholder="<?= HtmlEncode($Page->DrShareSettiledStatus->getPlaceHolder()) ?>" value="<?= $Page->DrShareSettiledStatus->EditValue ?>"<?= $Page->DrShareSettiledStatus->editAttributes() ?> aria-describedby="x_DrShareSettiledStatus_help">
<?= $Page->DrShareSettiledStatus->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DrShareSettiledStatus->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->invoiceId->Visible) { // invoiceId ?>
    <div id="r_invoiceId" class="form-group row">
        <label id="elh_view_patient_services_invoiceId" for="x_invoiceId" class="<?= $Page->LeftColumnClass ?>"><?= $Page->invoiceId->caption() ?><?= $Page->invoiceId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->invoiceId->cellAttributes() ?>>
<span id="el_view_patient_services_invoiceId">
<input type="<?= $Page->invoiceId->getInputTextType() ?>" data-table="view_patient_services" data-field="x_invoiceId" name="x_invoiceId" id="x_invoiceId" size="30" placeholder="<?= HtmlEncode($Page->invoiceId->getPlaceHolder()) ?>" value="<?= $Page->invoiceId->EditValue ?>"<?= $Page->invoiceId->editAttributes() ?> aria-describedby="x_invoiceId_help">
<?= $Page->invoiceId->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->invoiceId->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->invoiceAmount->Visible) { // invoiceAmount ?>
    <div id="r_invoiceAmount" class="form-group row">
        <label id="elh_view_patient_services_invoiceAmount" for="x_invoiceAmount" class="<?= $Page->LeftColumnClass ?>"><?= $Page->invoiceAmount->caption() ?><?= $Page->invoiceAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->invoiceAmount->cellAttributes() ?>>
<span id="el_view_patient_services_invoiceAmount">
<input type="<?= $Page->invoiceAmount->getInputTextType() ?>" data-table="view_patient_services" data-field="x_invoiceAmount" name="x_invoiceAmount" id="x_invoiceAmount" size="30" placeholder="<?= HtmlEncode($Page->invoiceAmount->getPlaceHolder()) ?>" value="<?= $Page->invoiceAmount->EditValue ?>"<?= $Page->invoiceAmount->editAttributes() ?> aria-describedby="x_invoiceAmount_help">
<?= $Page->invoiceAmount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->invoiceAmount->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->invoiceStatus->Visible) { // invoiceStatus ?>
    <div id="r_invoiceStatus" class="form-group row">
        <label id="elh_view_patient_services_invoiceStatus" for="x_invoiceStatus" class="<?= $Page->LeftColumnClass ?>"><?= $Page->invoiceStatus->caption() ?><?= $Page->invoiceStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->invoiceStatus->cellAttributes() ?>>
<span id="el_view_patient_services_invoiceStatus">
<input type="<?= $Page->invoiceStatus->getInputTextType() ?>" data-table="view_patient_services" data-field="x_invoiceStatus" name="x_invoiceStatus" id="x_invoiceStatus" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->invoiceStatus->getPlaceHolder()) ?>" value="<?= $Page->invoiceStatus->EditValue ?>"<?= $Page->invoiceStatus->editAttributes() ?> aria-describedby="x_invoiceStatus_help">
<?= $Page->invoiceStatus->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->invoiceStatus->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modeOfPayment->Visible) { // modeOfPayment ?>
    <div id="r_modeOfPayment" class="form-group row">
        <label id="elh_view_patient_services_modeOfPayment" for="x_modeOfPayment" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modeOfPayment->caption() ?><?= $Page->modeOfPayment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modeOfPayment->cellAttributes() ?>>
<span id="el_view_patient_services_modeOfPayment">
<input type="<?= $Page->modeOfPayment->getInputTextType() ?>" data-table="view_patient_services" data-field="x_modeOfPayment" name="x_modeOfPayment" id="x_modeOfPayment" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->modeOfPayment->getPlaceHolder()) ?>" value="<?= $Page->modeOfPayment->EditValue ?>"<?= $Page->modeOfPayment->editAttributes() ?> aria-describedby="x_modeOfPayment_help">
<?= $Page->modeOfPayment->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modeOfPayment->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
    <div id="r_RIDNO" class="form-group row">
        <label id="elh_view_patient_services_RIDNO" for="x_RIDNO" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RIDNO->caption() ?><?= $Page->RIDNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RIDNO->cellAttributes() ?>>
<span id="el_view_patient_services_RIDNO">
<input type="<?= $Page->RIDNO->getInputTextType() ?>" data-table="view_patient_services" data-field="x_RIDNO" name="x_RIDNO" id="x_RIDNO" size="30" placeholder="<?= HtmlEncode($Page->RIDNO->getPlaceHolder()) ?>" value="<?= $Page->RIDNO->EditValue ?>"<?= $Page->RIDNO->editAttributes() ?> aria-describedby="x_RIDNO_help">
<?= $Page->RIDNO->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RIDNO->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ItemCode->Visible) { // ItemCode ?>
    <div id="r_ItemCode" class="form-group row">
        <label id="elh_view_patient_services_ItemCode" for="x_ItemCode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ItemCode->caption() ?><?= $Page->ItemCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ItemCode->cellAttributes() ?>>
<span id="el_view_patient_services_ItemCode">
<input type="<?= $Page->ItemCode->getInputTextType() ?>" data-table="view_patient_services" data-field="x_ItemCode" name="x_ItemCode" id="x_ItemCode" size="8" maxlength="8" placeholder="<?= HtmlEncode($Page->ItemCode->getPlaceHolder()) ?>" value="<?= $Page->ItemCode->EditValue ?>"<?= $Page->ItemCode->editAttributes() ?> aria-describedby="x_ItemCode_help">
<?= $Page->ItemCode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ItemCode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <div id="r_TidNo" class="form-group row">
        <label id="elh_view_patient_services_TidNo" for="x_TidNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TidNo->caption() ?><?= $Page->TidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TidNo->cellAttributes() ?>>
<span id="el_view_patient_services_TidNo">
<input type="<?= $Page->TidNo->getInputTextType() ?>" data-table="view_patient_services" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?= HtmlEncode($Page->TidNo->getPlaceHolder()) ?>" value="<?= $Page->TidNo->EditValue ?>"<?= $Page->TidNo->editAttributes() ?> aria-describedby="x_TidNo_help">
<?= $Page->TidNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TidNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->sid->Visible) { // sid ?>
    <div id="r_sid" class="form-group row">
        <label id="elh_view_patient_services_sid" for="x_sid" class="<?= $Page->LeftColumnClass ?>"><?= $Page->sid->caption() ?><?= $Page->sid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->sid->cellAttributes() ?>>
<span id="el_view_patient_services_sid">
<input type="<?= $Page->sid->getInputTextType() ?>" data-table="view_patient_services" data-field="x_sid" name="x_sid" id="x_sid" size="4" maxlength="4" placeholder="<?= HtmlEncode($Page->sid->getPlaceHolder()) ?>" value="<?= $Page->sid->EditValue ?>"<?= $Page->sid->editAttributes() ?> aria-describedby="x_sid_help">
<?= $Page->sid->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->sid->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TestSubCd->Visible) { // TestSubCd ?>
    <div id="r_TestSubCd" class="form-group row">
        <label id="elh_view_patient_services_TestSubCd" for="x_TestSubCd" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TestSubCd->caption() ?><?= $Page->TestSubCd->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TestSubCd->cellAttributes() ?>>
<span id="el_view_patient_services_TestSubCd">
<input type="<?= $Page->TestSubCd->getInputTextType() ?>" data-table="view_patient_services" data-field="x_TestSubCd" name="x_TestSubCd" id="x_TestSubCd" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TestSubCd->getPlaceHolder()) ?>" value="<?= $Page->TestSubCd->EditValue ?>"<?= $Page->TestSubCd->editAttributes() ?> aria-describedby="x_TestSubCd_help">
<?= $Page->TestSubCd->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TestSubCd->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DEptCd->Visible) { // DEptCd ?>
    <div id="r_DEptCd" class="form-group row">
        <label id="elh_view_patient_services_DEptCd" for="x_DEptCd" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DEptCd->caption() ?><?= $Page->DEptCd->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DEptCd->cellAttributes() ?>>
<span id="el_view_patient_services_DEptCd">
<input type="<?= $Page->DEptCd->getInputTextType() ?>" data-table="view_patient_services" data-field="x_DEptCd" name="x_DEptCd" id="x_DEptCd" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DEptCd->getPlaceHolder()) ?>" value="<?= $Page->DEptCd->EditValue ?>"<?= $Page->DEptCd->editAttributes() ?> aria-describedby="x_DEptCd_help">
<?= $Page->DEptCd->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DEptCd->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ProfCd->Visible) { // ProfCd ?>
    <div id="r_ProfCd" class="form-group row">
        <label id="elh_view_patient_services_ProfCd" for="x_ProfCd" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ProfCd->caption() ?><?= $Page->ProfCd->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProfCd->cellAttributes() ?>>
<span id="el_view_patient_services_ProfCd">
<input type="<?= $Page->ProfCd->getInputTextType() ?>" data-table="view_patient_services" data-field="x_ProfCd" name="x_ProfCd" id="x_ProfCd" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ProfCd->getPlaceHolder()) ?>" value="<?= $Page->ProfCd->EditValue ?>"<?= $Page->ProfCd->editAttributes() ?> aria-describedby="x_ProfCd_help">
<?= $Page->ProfCd->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ProfCd->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->LabReport->Visible) { // LabReport ?>
    <div id="r_LabReport" class="form-group row">
        <label id="elh_view_patient_services_LabReport" for="x_LabReport" class="<?= $Page->LeftColumnClass ?>"><?= $Page->LabReport->caption() ?><?= $Page->LabReport->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LabReport->cellAttributes() ?>>
<span id="el_view_patient_services_LabReport">
<textarea data-table="view_patient_services" data-field="x_LabReport" name="x_LabReport" id="x_LabReport" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->LabReport->getPlaceHolder()) ?>"<?= $Page->LabReport->editAttributes() ?> aria-describedby="x_LabReport_help"><?= $Page->LabReport->EditValue ?></textarea>
<?= $Page->LabReport->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->LabReport->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Comments->Visible) { // Comments ?>
    <div id="r_Comments" class="form-group row">
        <label id="elh_view_patient_services_Comments" for="x_Comments" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Comments->caption() ?><?= $Page->Comments->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Comments->cellAttributes() ?>>
<span id="el_view_patient_services_Comments">
<input type="<?= $Page->Comments->getInputTextType() ?>" data-table="view_patient_services" data-field="x_Comments" name="x_Comments" id="x_Comments" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Comments->getPlaceHolder()) ?>" value="<?= $Page->Comments->EditValue ?>"<?= $Page->Comments->editAttributes() ?> aria-describedby="x_Comments_help">
<?= $Page->Comments->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Comments->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Method->Visible) { // Method ?>
    <div id="r_Method" class="form-group row">
        <label id="elh_view_patient_services_Method" for="x_Method" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Method->caption() ?><?= $Page->Method->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Method->cellAttributes() ?>>
<span id="el_view_patient_services_Method">
<input type="<?= $Page->Method->getInputTextType() ?>" data-table="view_patient_services" data-field="x_Method" name="x_Method" id="x_Method" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Method->getPlaceHolder()) ?>" value="<?= $Page->Method->EditValue ?>"<?= $Page->Method->editAttributes() ?> aria-describedby="x_Method_help">
<?= $Page->Method->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Method->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Specimen->Visible) { // Specimen ?>
    <div id="r_Specimen" class="form-group row">
        <label id="elh_view_patient_services_Specimen" for="x_Specimen" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Specimen->caption() ?><?= $Page->Specimen->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Specimen->cellAttributes() ?>>
<span id="el_view_patient_services_Specimen">
<input type="<?= $Page->Specimen->getInputTextType() ?>" data-table="view_patient_services" data-field="x_Specimen" name="x_Specimen" id="x_Specimen" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Specimen->getPlaceHolder()) ?>" value="<?= $Page->Specimen->EditValue ?>"<?= $Page->Specimen->editAttributes() ?> aria-describedby="x_Specimen_help">
<?= $Page->Specimen->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Specimen->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Abnormal->Visible) { // Abnormal ?>
    <div id="r_Abnormal" class="form-group row">
        <label id="elh_view_patient_services_Abnormal" for="x_Abnormal" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Abnormal->caption() ?><?= $Page->Abnormal->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Abnormal->cellAttributes() ?>>
<span id="el_view_patient_services_Abnormal">
<input type="<?= $Page->Abnormal->getInputTextType() ?>" data-table="view_patient_services" data-field="x_Abnormal" name="x_Abnormal" id="x_Abnormal" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Abnormal->getPlaceHolder()) ?>" value="<?= $Page->Abnormal->EditValue ?>"<?= $Page->Abnormal->editAttributes() ?> aria-describedby="x_Abnormal_help">
<?= $Page->Abnormal->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Abnormal->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RefValue->Visible) { // RefValue ?>
    <div id="r_RefValue" class="form-group row">
        <label id="elh_view_patient_services_RefValue" for="x_RefValue" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RefValue->caption() ?><?= $Page->RefValue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RefValue->cellAttributes() ?>>
<span id="el_view_patient_services_RefValue">
<textarea data-table="view_patient_services" data-field="x_RefValue" name="x_RefValue" id="x_RefValue" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->RefValue->getPlaceHolder()) ?>"<?= $Page->RefValue->editAttributes() ?> aria-describedby="x_RefValue_help"><?= $Page->RefValue->EditValue ?></textarea>
<?= $Page->RefValue->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RefValue->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TestUnit->Visible) { // TestUnit ?>
    <div id="r_TestUnit" class="form-group row">
        <label id="elh_view_patient_services_TestUnit" for="x_TestUnit" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TestUnit->caption() ?><?= $Page->TestUnit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TestUnit->cellAttributes() ?>>
<span id="el_view_patient_services_TestUnit">
<input type="<?= $Page->TestUnit->getInputTextType() ?>" data-table="view_patient_services" data-field="x_TestUnit" name="x_TestUnit" id="x_TestUnit" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TestUnit->getPlaceHolder()) ?>" value="<?= $Page->TestUnit->EditValue ?>"<?= $Page->TestUnit->editAttributes() ?> aria-describedby="x_TestUnit_help">
<?= $Page->TestUnit->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TestUnit->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->LOWHIGH->Visible) { // LOWHIGH ?>
    <div id="r_LOWHIGH" class="form-group row">
        <label id="elh_view_patient_services_LOWHIGH" for="x_LOWHIGH" class="<?= $Page->LeftColumnClass ?>"><?= $Page->LOWHIGH->caption() ?><?= $Page->LOWHIGH->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LOWHIGH->cellAttributes() ?>>
<span id="el_view_patient_services_LOWHIGH">
<input type="<?= $Page->LOWHIGH->getInputTextType() ?>" data-table="view_patient_services" data-field="x_LOWHIGH" name="x_LOWHIGH" id="x_LOWHIGH" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->LOWHIGH->getPlaceHolder()) ?>" value="<?= $Page->LOWHIGH->EditValue ?>"<?= $Page->LOWHIGH->editAttributes() ?> aria-describedby="x_LOWHIGH_help">
<?= $Page->LOWHIGH->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->LOWHIGH->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Branch->Visible) { // Branch ?>
    <div id="r_Branch" class="form-group row">
        <label id="elh_view_patient_services_Branch" for="x_Branch" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Branch->caption() ?><?= $Page->Branch->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Branch->cellAttributes() ?>>
<span id="el_view_patient_services_Branch">
<input type="<?= $Page->Branch->getInputTextType() ?>" data-table="view_patient_services" data-field="x_Branch" name="x_Branch" id="x_Branch" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Branch->getPlaceHolder()) ?>" value="<?= $Page->Branch->EditValue ?>"<?= $Page->Branch->editAttributes() ?> aria-describedby="x_Branch_help">
<?= $Page->Branch->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Branch->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Dispatch->Visible) { // Dispatch ?>
    <div id="r_Dispatch" class="form-group row">
        <label id="elh_view_patient_services_Dispatch" for="x_Dispatch" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Dispatch->caption() ?><?= $Page->Dispatch->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Dispatch->cellAttributes() ?>>
<span id="el_view_patient_services_Dispatch">
<input type="<?= $Page->Dispatch->getInputTextType() ?>" data-table="view_patient_services" data-field="x_Dispatch" name="x_Dispatch" id="x_Dispatch" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Dispatch->getPlaceHolder()) ?>" value="<?= $Page->Dispatch->EditValue ?>"<?= $Page->Dispatch->editAttributes() ?> aria-describedby="x_Dispatch_help">
<?= $Page->Dispatch->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Dispatch->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Pic1->Visible) { // Pic1 ?>
    <div id="r_Pic1" class="form-group row">
        <label id="elh_view_patient_services_Pic1" for="x_Pic1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Pic1->caption() ?><?= $Page->Pic1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Pic1->cellAttributes() ?>>
<span id="el_view_patient_services_Pic1">
<input type="<?= $Page->Pic1->getInputTextType() ?>" data-table="view_patient_services" data-field="x_Pic1" name="x_Pic1" id="x_Pic1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Pic1->getPlaceHolder()) ?>" value="<?= $Page->Pic1->EditValue ?>"<?= $Page->Pic1->editAttributes() ?> aria-describedby="x_Pic1_help">
<?= $Page->Pic1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Pic1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Pic2->Visible) { // Pic2 ?>
    <div id="r_Pic2" class="form-group row">
        <label id="elh_view_patient_services_Pic2" for="x_Pic2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Pic2->caption() ?><?= $Page->Pic2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Pic2->cellAttributes() ?>>
<span id="el_view_patient_services_Pic2">
<input type="<?= $Page->Pic2->getInputTextType() ?>" data-table="view_patient_services" data-field="x_Pic2" name="x_Pic2" id="x_Pic2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Pic2->getPlaceHolder()) ?>" value="<?= $Page->Pic2->EditValue ?>"<?= $Page->Pic2->editAttributes() ?> aria-describedby="x_Pic2_help">
<?= $Page->Pic2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Pic2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GraphPath->Visible) { // GraphPath ?>
    <div id="r_GraphPath" class="form-group row">
        <label id="elh_view_patient_services_GraphPath" for="x_GraphPath" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GraphPath->caption() ?><?= $Page->GraphPath->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GraphPath->cellAttributes() ?>>
<span id="el_view_patient_services_GraphPath">
<input type="<?= $Page->GraphPath->getInputTextType() ?>" data-table="view_patient_services" data-field="x_GraphPath" name="x_GraphPath" id="x_GraphPath" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->GraphPath->getPlaceHolder()) ?>" value="<?= $Page->GraphPath->EditValue ?>"<?= $Page->GraphPath->editAttributes() ?> aria-describedby="x_GraphPath_help">
<?= $Page->GraphPath->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GraphPath->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MachineCD->Visible) { // MachineCD ?>
    <div id="r_MachineCD" class="form-group row">
        <label id="elh_view_patient_services_MachineCD" for="x_MachineCD" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MachineCD->caption() ?><?= $Page->MachineCD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MachineCD->cellAttributes() ?>>
<span id="el_view_patient_services_MachineCD">
<input type="<?= $Page->MachineCD->getInputTextType() ?>" data-table="view_patient_services" data-field="x_MachineCD" name="x_MachineCD" id="x_MachineCD" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MachineCD->getPlaceHolder()) ?>" value="<?= $Page->MachineCD->EditValue ?>"<?= $Page->MachineCD->editAttributes() ?> aria-describedby="x_MachineCD_help">
<?= $Page->MachineCD->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MachineCD->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TestCancel->Visible) { // TestCancel ?>
    <div id="r_TestCancel" class="form-group row">
        <label id="elh_view_patient_services_TestCancel" for="x_TestCancel" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TestCancel->caption() ?><?= $Page->TestCancel->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TestCancel->cellAttributes() ?>>
<span id="el_view_patient_services_TestCancel">
<input type="<?= $Page->TestCancel->getInputTextType() ?>" data-table="view_patient_services" data-field="x_TestCancel" name="x_TestCancel" id="x_TestCancel" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TestCancel->getPlaceHolder()) ?>" value="<?= $Page->TestCancel->EditValue ?>"<?= $Page->TestCancel->editAttributes() ?> aria-describedby="x_TestCancel_help">
<?= $Page->TestCancel->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TestCancel->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OutSource->Visible) { // OutSource ?>
    <div id="r_OutSource" class="form-group row">
        <label id="elh_view_patient_services_OutSource" for="x_OutSource" class="<?= $Page->LeftColumnClass ?>"><?= $Page->OutSource->caption() ?><?= $Page->OutSource->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OutSource->cellAttributes() ?>>
<span id="el_view_patient_services_OutSource">
<input type="<?= $Page->OutSource->getInputTextType() ?>" data-table="view_patient_services" data-field="x_OutSource" name="x_OutSource" id="x_OutSource" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->OutSource->getPlaceHolder()) ?>" value="<?= $Page->OutSource->EditValue ?>"<?= $Page->OutSource->editAttributes() ?> aria-describedby="x_OutSource_help">
<?= $Page->OutSource->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OutSource->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Printed->Visible) { // Printed ?>
    <div id="r_Printed" class="form-group row">
        <label id="elh_view_patient_services_Printed" for="x_Printed" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Printed->caption() ?><?= $Page->Printed->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Printed->cellAttributes() ?>>
<span id="el_view_patient_services_Printed">
<input type="<?= $Page->Printed->getInputTextType() ?>" data-table="view_patient_services" data-field="x_Printed" name="x_Printed" id="x_Printed" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Printed->getPlaceHolder()) ?>" value="<?= $Page->Printed->EditValue ?>"<?= $Page->Printed->editAttributes() ?> aria-describedby="x_Printed_help">
<?= $Page->Printed->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Printed->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PrintBy->Visible) { // PrintBy ?>
    <div id="r_PrintBy" class="form-group row">
        <label id="elh_view_patient_services_PrintBy" for="x_PrintBy" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PrintBy->caption() ?><?= $Page->PrintBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PrintBy->cellAttributes() ?>>
<span id="el_view_patient_services_PrintBy">
<input type="<?= $Page->PrintBy->getInputTextType() ?>" data-table="view_patient_services" data-field="x_PrintBy" name="x_PrintBy" id="x_PrintBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PrintBy->getPlaceHolder()) ?>" value="<?= $Page->PrintBy->EditValue ?>"<?= $Page->PrintBy->editAttributes() ?> aria-describedby="x_PrintBy_help">
<?= $Page->PrintBy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PrintBy->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PrintDate->Visible) { // PrintDate ?>
    <div id="r_PrintDate" class="form-group row">
        <label id="elh_view_patient_services_PrintDate" for="x_PrintDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PrintDate->caption() ?><?= $Page->PrintDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PrintDate->cellAttributes() ?>>
<span id="el_view_patient_services_PrintDate">
<input type="<?= $Page->PrintDate->getInputTextType() ?>" data-table="view_patient_services" data-field="x_PrintDate" name="x_PrintDate" id="x_PrintDate" placeholder="<?= HtmlEncode($Page->PrintDate->getPlaceHolder()) ?>" value="<?= $Page->PrintDate->EditValue ?>"<?= $Page->PrintDate->editAttributes() ?> aria-describedby="x_PrintDate_help">
<?= $Page->PrintDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PrintDate->getErrorMessage() ?></div>
<?php if (!$Page->PrintDate->ReadOnly && !$Page->PrintDate->Disabled && !isset($Page->PrintDate->EditAttrs["readonly"]) && !isset($Page->PrintDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_servicesedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_patient_servicesedit", "x_PrintDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BillingDate->Visible) { // BillingDate ?>
    <div id="r_BillingDate" class="form-group row">
        <label id="elh_view_patient_services_BillingDate" for="x_BillingDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BillingDate->caption() ?><?= $Page->BillingDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillingDate->cellAttributes() ?>>
<span id="el_view_patient_services_BillingDate">
<input type="<?= $Page->BillingDate->getInputTextType() ?>" data-table="view_patient_services" data-field="x_BillingDate" name="x_BillingDate" id="x_BillingDate" placeholder="<?= HtmlEncode($Page->BillingDate->getPlaceHolder()) ?>" value="<?= $Page->BillingDate->EditValue ?>"<?= $Page->BillingDate->editAttributes() ?> aria-describedby="x_BillingDate_help">
<?= $Page->BillingDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BillingDate->getErrorMessage() ?></div>
<?php if (!$Page->BillingDate->ReadOnly && !$Page->BillingDate->Disabled && !isset($Page->BillingDate->EditAttrs["readonly"]) && !isset($Page->BillingDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_servicesedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_patient_servicesedit", "x_BillingDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BilledBy->Visible) { // BilledBy ?>
    <div id="r_BilledBy" class="form-group row">
        <label id="elh_view_patient_services_BilledBy" for="x_BilledBy" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BilledBy->caption() ?><?= $Page->BilledBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BilledBy->cellAttributes() ?>>
<span id="el_view_patient_services_BilledBy">
<input type="<?= $Page->BilledBy->getInputTextType() ?>" data-table="view_patient_services" data-field="x_BilledBy" name="x_BilledBy" id="x_BilledBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BilledBy->getPlaceHolder()) ?>" value="<?= $Page->BilledBy->EditValue ?>"<?= $Page->BilledBy->editAttributes() ?> aria-describedby="x_BilledBy_help">
<?= $Page->BilledBy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BilledBy->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Resulted->Visible) { // Resulted ?>
    <div id="r_Resulted" class="form-group row">
        <label id="elh_view_patient_services_Resulted" for="x_Resulted" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Resulted->caption() ?><?= $Page->Resulted->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Resulted->cellAttributes() ?>>
<span id="el_view_patient_services_Resulted">
<input type="<?= $Page->Resulted->getInputTextType() ?>" data-table="view_patient_services" data-field="x_Resulted" name="x_Resulted" id="x_Resulted" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Resulted->getPlaceHolder()) ?>" value="<?= $Page->Resulted->EditValue ?>"<?= $Page->Resulted->editAttributes() ?> aria-describedby="x_Resulted_help">
<?= $Page->Resulted->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Resulted->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ResultDate->Visible) { // ResultDate ?>
    <div id="r_ResultDate" class="form-group row">
        <label id="elh_view_patient_services_ResultDate" for="x_ResultDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ResultDate->caption() ?><?= $Page->ResultDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ResultDate->cellAttributes() ?>>
<span id="el_view_patient_services_ResultDate">
<input type="<?= $Page->ResultDate->getInputTextType() ?>" data-table="view_patient_services" data-field="x_ResultDate" name="x_ResultDate" id="x_ResultDate" placeholder="<?= HtmlEncode($Page->ResultDate->getPlaceHolder()) ?>" value="<?= $Page->ResultDate->EditValue ?>"<?= $Page->ResultDate->editAttributes() ?> aria-describedby="x_ResultDate_help">
<?= $Page->ResultDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ResultDate->getErrorMessage() ?></div>
<?php if (!$Page->ResultDate->ReadOnly && !$Page->ResultDate->Disabled && !isset($Page->ResultDate->EditAttrs["readonly"]) && !isset($Page->ResultDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_servicesedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_patient_servicesedit", "x_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ResultedBy->Visible) { // ResultedBy ?>
    <div id="r_ResultedBy" class="form-group row">
        <label id="elh_view_patient_services_ResultedBy" for="x_ResultedBy" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ResultedBy->caption() ?><?= $Page->ResultedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ResultedBy->cellAttributes() ?>>
<span id="el_view_patient_services_ResultedBy">
<input type="<?= $Page->ResultedBy->getInputTextType() ?>" data-table="view_patient_services" data-field="x_ResultedBy" name="x_ResultedBy" id="x_ResultedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ResultedBy->getPlaceHolder()) ?>" value="<?= $Page->ResultedBy->EditValue ?>"<?= $Page->ResultedBy->editAttributes() ?> aria-describedby="x_ResultedBy_help">
<?= $Page->ResultedBy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ResultedBy->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SampleDate->Visible) { // SampleDate ?>
    <div id="r_SampleDate" class="form-group row">
        <label id="elh_view_patient_services_SampleDate" for="x_SampleDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SampleDate->caption() ?><?= $Page->SampleDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SampleDate->cellAttributes() ?>>
<span id="el_view_patient_services_SampleDate">
<input type="<?= $Page->SampleDate->getInputTextType() ?>" data-table="view_patient_services" data-field="x_SampleDate" name="x_SampleDate" id="x_SampleDate" placeholder="<?= HtmlEncode($Page->SampleDate->getPlaceHolder()) ?>" value="<?= $Page->SampleDate->EditValue ?>"<?= $Page->SampleDate->editAttributes() ?> aria-describedby="x_SampleDate_help">
<?= $Page->SampleDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SampleDate->getErrorMessage() ?></div>
<?php if (!$Page->SampleDate->ReadOnly && !$Page->SampleDate->Disabled && !isset($Page->SampleDate->EditAttrs["readonly"]) && !isset($Page->SampleDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_servicesedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_patient_servicesedit", "x_SampleDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SampleUser->Visible) { // SampleUser ?>
    <div id="r_SampleUser" class="form-group row">
        <label id="elh_view_patient_services_SampleUser" for="x_SampleUser" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SampleUser->caption() ?><?= $Page->SampleUser->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SampleUser->cellAttributes() ?>>
<span id="el_view_patient_services_SampleUser">
<input type="<?= $Page->SampleUser->getInputTextType() ?>" data-table="view_patient_services" data-field="x_SampleUser" name="x_SampleUser" id="x_SampleUser" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SampleUser->getPlaceHolder()) ?>" value="<?= $Page->SampleUser->EditValue ?>"<?= $Page->SampleUser->editAttributes() ?> aria-describedby="x_SampleUser_help">
<?= $Page->SampleUser->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SampleUser->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Sampled->Visible) { // Sampled ?>
    <div id="r_Sampled" class="form-group row">
        <label id="elh_view_patient_services_Sampled" for="x_Sampled" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Sampled->caption() ?><?= $Page->Sampled->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Sampled->cellAttributes() ?>>
<span id="el_view_patient_services_Sampled">
<input type="<?= $Page->Sampled->getInputTextType() ?>" data-table="view_patient_services" data-field="x_Sampled" name="x_Sampled" id="x_Sampled" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Sampled->getPlaceHolder()) ?>" value="<?= $Page->Sampled->EditValue ?>"<?= $Page->Sampled->editAttributes() ?> aria-describedby="x_Sampled_help">
<?= $Page->Sampled->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Sampled->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReceivedDate->Visible) { // ReceivedDate ?>
    <div id="r_ReceivedDate" class="form-group row">
        <label id="elh_view_patient_services_ReceivedDate" for="x_ReceivedDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ReceivedDate->caption() ?><?= $Page->ReceivedDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReceivedDate->cellAttributes() ?>>
<span id="el_view_patient_services_ReceivedDate">
<input type="<?= $Page->ReceivedDate->getInputTextType() ?>" data-table="view_patient_services" data-field="x_ReceivedDate" name="x_ReceivedDate" id="x_ReceivedDate" placeholder="<?= HtmlEncode($Page->ReceivedDate->getPlaceHolder()) ?>" value="<?= $Page->ReceivedDate->EditValue ?>"<?= $Page->ReceivedDate->editAttributes() ?> aria-describedby="x_ReceivedDate_help">
<?= $Page->ReceivedDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ReceivedDate->getErrorMessage() ?></div>
<?php if (!$Page->ReceivedDate->ReadOnly && !$Page->ReceivedDate->Disabled && !isset($Page->ReceivedDate->EditAttrs["readonly"]) && !isset($Page->ReceivedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_servicesedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_patient_servicesedit", "x_ReceivedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReceivedUser->Visible) { // ReceivedUser ?>
    <div id="r_ReceivedUser" class="form-group row">
        <label id="elh_view_patient_services_ReceivedUser" for="x_ReceivedUser" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ReceivedUser->caption() ?><?= $Page->ReceivedUser->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReceivedUser->cellAttributes() ?>>
<span id="el_view_patient_services_ReceivedUser">
<input type="<?= $Page->ReceivedUser->getInputTextType() ?>" data-table="view_patient_services" data-field="x_ReceivedUser" name="x_ReceivedUser" id="x_ReceivedUser" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ReceivedUser->getPlaceHolder()) ?>" value="<?= $Page->ReceivedUser->EditValue ?>"<?= $Page->ReceivedUser->editAttributes() ?> aria-describedby="x_ReceivedUser_help">
<?= $Page->ReceivedUser->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ReceivedUser->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Recevied->Visible) { // Recevied ?>
    <div id="r_Recevied" class="form-group row">
        <label id="elh_view_patient_services_Recevied" for="x_Recevied" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Recevied->caption() ?><?= $Page->Recevied->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Recevied->cellAttributes() ?>>
<span id="el_view_patient_services_Recevied">
<input type="<?= $Page->Recevied->getInputTextType() ?>" data-table="view_patient_services" data-field="x_Recevied" name="x_Recevied" id="x_Recevied" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Recevied->getPlaceHolder()) ?>" value="<?= $Page->Recevied->EditValue ?>"<?= $Page->Recevied->editAttributes() ?> aria-describedby="x_Recevied_help">
<?= $Page->Recevied->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Recevied->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DeptRecvDate->Visible) { // DeptRecvDate ?>
    <div id="r_DeptRecvDate" class="form-group row">
        <label id="elh_view_patient_services_DeptRecvDate" for="x_DeptRecvDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DeptRecvDate->caption() ?><?= $Page->DeptRecvDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DeptRecvDate->cellAttributes() ?>>
<span id="el_view_patient_services_DeptRecvDate">
<input type="<?= $Page->DeptRecvDate->getInputTextType() ?>" data-table="view_patient_services" data-field="x_DeptRecvDate" name="x_DeptRecvDate" id="x_DeptRecvDate" placeholder="<?= HtmlEncode($Page->DeptRecvDate->getPlaceHolder()) ?>" value="<?= $Page->DeptRecvDate->EditValue ?>"<?= $Page->DeptRecvDate->editAttributes() ?> aria-describedby="x_DeptRecvDate_help">
<?= $Page->DeptRecvDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DeptRecvDate->getErrorMessage() ?></div>
<?php if (!$Page->DeptRecvDate->ReadOnly && !$Page->DeptRecvDate->Disabled && !isset($Page->DeptRecvDate->EditAttrs["readonly"]) && !isset($Page->DeptRecvDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_servicesedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_patient_servicesedit", "x_DeptRecvDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DeptRecvUser->Visible) { // DeptRecvUser ?>
    <div id="r_DeptRecvUser" class="form-group row">
        <label id="elh_view_patient_services_DeptRecvUser" for="x_DeptRecvUser" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DeptRecvUser->caption() ?><?= $Page->DeptRecvUser->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DeptRecvUser->cellAttributes() ?>>
<span id="el_view_patient_services_DeptRecvUser">
<input type="<?= $Page->DeptRecvUser->getInputTextType() ?>" data-table="view_patient_services" data-field="x_DeptRecvUser" name="x_DeptRecvUser" id="x_DeptRecvUser" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DeptRecvUser->getPlaceHolder()) ?>" value="<?= $Page->DeptRecvUser->EditValue ?>"<?= $Page->DeptRecvUser->editAttributes() ?> aria-describedby="x_DeptRecvUser_help">
<?= $Page->DeptRecvUser->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DeptRecvUser->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DeptRecived->Visible) { // DeptRecived ?>
    <div id="r_DeptRecived" class="form-group row">
        <label id="elh_view_patient_services_DeptRecived" for="x_DeptRecived" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DeptRecived->caption() ?><?= $Page->DeptRecived->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DeptRecived->cellAttributes() ?>>
<span id="el_view_patient_services_DeptRecived">
<input type="<?= $Page->DeptRecived->getInputTextType() ?>" data-table="view_patient_services" data-field="x_DeptRecived" name="x_DeptRecived" id="x_DeptRecived" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DeptRecived->getPlaceHolder()) ?>" value="<?= $Page->DeptRecived->EditValue ?>"<?= $Page->DeptRecived->editAttributes() ?> aria-describedby="x_DeptRecived_help">
<?= $Page->DeptRecived->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DeptRecived->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SAuthDate->Visible) { // SAuthDate ?>
    <div id="r_SAuthDate" class="form-group row">
        <label id="elh_view_patient_services_SAuthDate" for="x_SAuthDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SAuthDate->caption() ?><?= $Page->SAuthDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SAuthDate->cellAttributes() ?>>
<span id="el_view_patient_services_SAuthDate">
<input type="<?= $Page->SAuthDate->getInputTextType() ?>" data-table="view_patient_services" data-field="x_SAuthDate" name="x_SAuthDate" id="x_SAuthDate" placeholder="<?= HtmlEncode($Page->SAuthDate->getPlaceHolder()) ?>" value="<?= $Page->SAuthDate->EditValue ?>"<?= $Page->SAuthDate->editAttributes() ?> aria-describedby="x_SAuthDate_help">
<?= $Page->SAuthDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SAuthDate->getErrorMessage() ?></div>
<?php if (!$Page->SAuthDate->ReadOnly && !$Page->SAuthDate->Disabled && !isset($Page->SAuthDate->EditAttrs["readonly"]) && !isset($Page->SAuthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_servicesedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_patient_servicesedit", "x_SAuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SAuthBy->Visible) { // SAuthBy ?>
    <div id="r_SAuthBy" class="form-group row">
        <label id="elh_view_patient_services_SAuthBy" for="x_SAuthBy" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SAuthBy->caption() ?><?= $Page->SAuthBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SAuthBy->cellAttributes() ?>>
<span id="el_view_patient_services_SAuthBy">
<input type="<?= $Page->SAuthBy->getInputTextType() ?>" data-table="view_patient_services" data-field="x_SAuthBy" name="x_SAuthBy" id="x_SAuthBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SAuthBy->getPlaceHolder()) ?>" value="<?= $Page->SAuthBy->EditValue ?>"<?= $Page->SAuthBy->editAttributes() ?> aria-describedby="x_SAuthBy_help">
<?= $Page->SAuthBy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SAuthBy->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SAuthendicate->Visible) { // SAuthendicate ?>
    <div id="r_SAuthendicate" class="form-group row">
        <label id="elh_view_patient_services_SAuthendicate" for="x_SAuthendicate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SAuthendicate->caption() ?><?= $Page->SAuthendicate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SAuthendicate->cellAttributes() ?>>
<span id="el_view_patient_services_SAuthendicate">
<input type="<?= $Page->SAuthendicate->getInputTextType() ?>" data-table="view_patient_services" data-field="x_SAuthendicate" name="x_SAuthendicate" id="x_SAuthendicate" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SAuthendicate->getPlaceHolder()) ?>" value="<?= $Page->SAuthendicate->EditValue ?>"<?= $Page->SAuthendicate->editAttributes() ?> aria-describedby="x_SAuthendicate_help">
<?= $Page->SAuthendicate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SAuthendicate->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AuthDate->Visible) { // AuthDate ?>
    <div id="r_AuthDate" class="form-group row">
        <label id="elh_view_patient_services_AuthDate" for="x_AuthDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AuthDate->caption() ?><?= $Page->AuthDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AuthDate->cellAttributes() ?>>
<span id="el_view_patient_services_AuthDate">
<input type="<?= $Page->AuthDate->getInputTextType() ?>" data-table="view_patient_services" data-field="x_AuthDate" name="x_AuthDate" id="x_AuthDate" placeholder="<?= HtmlEncode($Page->AuthDate->getPlaceHolder()) ?>" value="<?= $Page->AuthDate->EditValue ?>"<?= $Page->AuthDate->editAttributes() ?> aria-describedby="x_AuthDate_help">
<?= $Page->AuthDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AuthDate->getErrorMessage() ?></div>
<?php if (!$Page->AuthDate->ReadOnly && !$Page->AuthDate->Disabled && !isset($Page->AuthDate->EditAttrs["readonly"]) && !isset($Page->AuthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_servicesedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_patient_servicesedit", "x_AuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AuthBy->Visible) { // AuthBy ?>
    <div id="r_AuthBy" class="form-group row">
        <label id="elh_view_patient_services_AuthBy" for="x_AuthBy" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AuthBy->caption() ?><?= $Page->AuthBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AuthBy->cellAttributes() ?>>
<span id="el_view_patient_services_AuthBy">
<input type="<?= $Page->AuthBy->getInputTextType() ?>" data-table="view_patient_services" data-field="x_AuthBy" name="x_AuthBy" id="x_AuthBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AuthBy->getPlaceHolder()) ?>" value="<?= $Page->AuthBy->EditValue ?>"<?= $Page->AuthBy->editAttributes() ?> aria-describedby="x_AuthBy_help">
<?= $Page->AuthBy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AuthBy->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Authencate->Visible) { // Authencate ?>
    <div id="r_Authencate" class="form-group row">
        <label id="elh_view_patient_services_Authencate" for="x_Authencate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Authencate->caption() ?><?= $Page->Authencate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Authencate->cellAttributes() ?>>
<span id="el_view_patient_services_Authencate">
<input type="<?= $Page->Authencate->getInputTextType() ?>" data-table="view_patient_services" data-field="x_Authencate" name="x_Authencate" id="x_Authencate" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Authencate->getPlaceHolder()) ?>" value="<?= $Page->Authencate->EditValue ?>"<?= $Page->Authencate->editAttributes() ?> aria-describedby="x_Authencate_help">
<?= $Page->Authencate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Authencate->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EditDate->Visible) { // EditDate ?>
    <div id="r_EditDate" class="form-group row">
        <label id="elh_view_patient_services_EditDate" for="x_EditDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EditDate->caption() ?><?= $Page->EditDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EditDate->cellAttributes() ?>>
<span id="el_view_patient_services_EditDate">
<input type="<?= $Page->EditDate->getInputTextType() ?>" data-table="view_patient_services" data-field="x_EditDate" name="x_EditDate" id="x_EditDate" placeholder="<?= HtmlEncode($Page->EditDate->getPlaceHolder()) ?>" value="<?= $Page->EditDate->EditValue ?>"<?= $Page->EditDate->editAttributes() ?> aria-describedby="x_EditDate_help">
<?= $Page->EditDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EditDate->getErrorMessage() ?></div>
<?php if (!$Page->EditDate->ReadOnly && !$Page->EditDate->Disabled && !isset($Page->EditDate->EditAttrs["readonly"]) && !isset($Page->EditDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_servicesedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_patient_servicesedit", "x_EditDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EditBy->Visible) { // EditBy ?>
    <div id="r_EditBy" class="form-group row">
        <label id="elh_view_patient_services_EditBy" for="x_EditBy" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EditBy->caption() ?><?= $Page->EditBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EditBy->cellAttributes() ?>>
<span id="el_view_patient_services_EditBy">
<input type="<?= $Page->EditBy->getInputTextType() ?>" data-table="view_patient_services" data-field="x_EditBy" name="x_EditBy" id="x_EditBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EditBy->getPlaceHolder()) ?>" value="<?= $Page->EditBy->EditValue ?>"<?= $Page->EditBy->editAttributes() ?> aria-describedby="x_EditBy_help">
<?= $Page->EditBy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EditBy->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Editted->Visible) { // Editted ?>
    <div id="r_Editted" class="form-group row">
        <label id="elh_view_patient_services_Editted" for="x_Editted" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Editted->caption() ?><?= $Page->Editted->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Editted->cellAttributes() ?>>
<span id="el_view_patient_services_Editted">
<input type="<?= $Page->Editted->getInputTextType() ?>" data-table="view_patient_services" data-field="x_Editted" name="x_Editted" id="x_Editted" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Editted->getPlaceHolder()) ?>" value="<?= $Page->Editted->EditValue ?>"<?= $Page->Editted->editAttributes() ?> aria-describedby="x_Editted_help">
<?= $Page->Editted->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Editted->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
    <div id="r_PatID" class="form-group row">
        <label id="elh_view_patient_services_PatID" for="x_PatID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PatID->caption() ?><?= $Page->PatID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatID->cellAttributes() ?>>
<span id="el_view_patient_services_PatID">
<input type="<?= $Page->PatID->getInputTextType() ?>" data-table="view_patient_services" data-field="x_PatID" name="x_PatID" id="x_PatID" size="30" placeholder="<?= HtmlEncode($Page->PatID->getPlaceHolder()) ?>" value="<?= $Page->PatID->EditValue ?>"<?= $Page->PatID->editAttributes() ?> aria-describedby="x_PatID_help">
<?= $Page->PatID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
    <div id="r_PatientId" class="form-group row">
        <label id="elh_view_patient_services_PatientId" for="x_PatientId" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PatientId->caption() ?><?= $Page->PatientId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientId->cellAttributes() ?>>
<span id="el_view_patient_services_PatientId">
<input type="<?= $Page->PatientId->getInputTextType() ?>" data-table="view_patient_services" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientId->getPlaceHolder()) ?>" value="<?= $Page->PatientId->EditValue ?>"<?= $Page->PatientId->editAttributes() ?> aria-describedby="x_PatientId_help">
<?= $Page->PatientId->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientId->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Mobile->Visible) { // Mobile ?>
    <div id="r_Mobile" class="form-group row">
        <label id="elh_view_patient_services_Mobile" for="x_Mobile" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Mobile->caption() ?><?= $Page->Mobile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Mobile->cellAttributes() ?>>
<span id="el_view_patient_services_Mobile">
<input type="<?= $Page->Mobile->getInputTextType() ?>" data-table="view_patient_services" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Mobile->getPlaceHolder()) ?>" value="<?= $Page->Mobile->EditValue ?>"<?= $Page->Mobile->editAttributes() ?> aria-describedby="x_Mobile_help">
<?= $Page->Mobile->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Mobile->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CId->Visible) { // CId ?>
    <div id="r_CId" class="form-group row">
        <label id="elh_view_patient_services_CId" for="x_CId" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CId->caption() ?><?= $Page->CId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CId->cellAttributes() ?>>
<span id="el_view_patient_services_CId">
<input type="<?= $Page->CId->getInputTextType() ?>" data-table="view_patient_services" data-field="x_CId" name="x_CId" id="x_CId" size="30" placeholder="<?= HtmlEncode($Page->CId->getPlaceHolder()) ?>" value="<?= $Page->CId->EditValue ?>"<?= $Page->CId->editAttributes() ?> aria-describedby="x_CId_help">
<?= $Page->CId->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CId->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Order->Visible) { // Order ?>
    <div id="r_Order" class="form-group row">
        <label id="elh_view_patient_services_Order" for="x_Order" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Order->caption() ?><?= $Page->Order->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Order->cellAttributes() ?>>
<span id="el_view_patient_services_Order">
<input type="<?= $Page->Order->getInputTextType() ?>" data-table="view_patient_services" data-field="x_Order" name="x_Order" id="x_Order" size="30" placeholder="<?= HtmlEncode($Page->Order->getPlaceHolder()) ?>" value="<?= $Page->Order->EditValue ?>"<?= $Page->Order->editAttributes() ?> aria-describedby="x_Order_help">
<?= $Page->Order->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Order->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Form->Visible) { // Form ?>
    <div id="r_Form" class="form-group row">
        <label id="elh_view_patient_services_Form" for="x_Form" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Form->caption() ?><?= $Page->Form->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Form->cellAttributes() ?>>
<span id="el_view_patient_services_Form">
<textarea data-table="view_patient_services" data-field="x_Form" name="x_Form" id="x_Form" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Form->getPlaceHolder()) ?>"<?= $Page->Form->editAttributes() ?> aria-describedby="x_Form_help"><?= $Page->Form->EditValue ?></textarea>
<?= $Page->Form->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Form->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ResType->Visible) { // ResType ?>
    <div id="r_ResType" class="form-group row">
        <label id="elh_view_patient_services_ResType" for="x_ResType" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ResType->caption() ?><?= $Page->ResType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ResType->cellAttributes() ?>>
<span id="el_view_patient_services_ResType">
<input type="<?= $Page->ResType->getInputTextType() ?>" data-table="view_patient_services" data-field="x_ResType" name="x_ResType" id="x_ResType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ResType->getPlaceHolder()) ?>" value="<?= $Page->ResType->EditValue ?>"<?= $Page->ResType->editAttributes() ?> aria-describedby="x_ResType_help">
<?= $Page->ResType->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ResType->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Sample->Visible) { // Sample ?>
    <div id="r_Sample" class="form-group row">
        <label id="elh_view_patient_services_Sample" for="x_Sample" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Sample->caption() ?><?= $Page->Sample->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Sample->cellAttributes() ?>>
<span id="el_view_patient_services_Sample">
<input type="<?= $Page->Sample->getInputTextType() ?>" data-table="view_patient_services" data-field="x_Sample" name="x_Sample" id="x_Sample" size="30" maxlength="150" placeholder="<?= HtmlEncode($Page->Sample->getPlaceHolder()) ?>" value="<?= $Page->Sample->EditValue ?>"<?= $Page->Sample->editAttributes() ?> aria-describedby="x_Sample_help">
<?= $Page->Sample->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Sample->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NoD->Visible) { // NoD ?>
    <div id="r_NoD" class="form-group row">
        <label id="elh_view_patient_services_NoD" for="x_NoD" class="<?= $Page->LeftColumnClass ?>"><?= $Page->NoD->caption() ?><?= $Page->NoD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NoD->cellAttributes() ?>>
<span id="el_view_patient_services_NoD">
<input type="<?= $Page->NoD->getInputTextType() ?>" data-table="view_patient_services" data-field="x_NoD" name="x_NoD" id="x_NoD" size="30" placeholder="<?= HtmlEncode($Page->NoD->getPlaceHolder()) ?>" value="<?= $Page->NoD->EditValue ?>"<?= $Page->NoD->editAttributes() ?> aria-describedby="x_NoD_help">
<?= $Page->NoD->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NoD->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BillOrder->Visible) { // BillOrder ?>
    <div id="r_BillOrder" class="form-group row">
        <label id="elh_view_patient_services_BillOrder" for="x_BillOrder" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BillOrder->caption() ?><?= $Page->BillOrder->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillOrder->cellAttributes() ?>>
<span id="el_view_patient_services_BillOrder">
<input type="<?= $Page->BillOrder->getInputTextType() ?>" data-table="view_patient_services" data-field="x_BillOrder" name="x_BillOrder" id="x_BillOrder" size="30" placeholder="<?= HtmlEncode($Page->BillOrder->getPlaceHolder()) ?>" value="<?= $Page->BillOrder->EditValue ?>"<?= $Page->BillOrder->editAttributes() ?> aria-describedby="x_BillOrder_help">
<?= $Page->BillOrder->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BillOrder->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Formula->Visible) { // Formula ?>
    <div id="r_Formula" class="form-group row">
        <label id="elh_view_patient_services_Formula" for="x_Formula" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Formula->caption() ?><?= $Page->Formula->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Formula->cellAttributes() ?>>
<span id="el_view_patient_services_Formula">
<textarea data-table="view_patient_services" data-field="x_Formula" name="x_Formula" id="x_Formula" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Formula->getPlaceHolder()) ?>"<?= $Page->Formula->editAttributes() ?> aria-describedby="x_Formula_help"><?= $Page->Formula->EditValue ?></textarea>
<?= $Page->Formula->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Formula->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Inactive->Visible) { // Inactive ?>
    <div id="r_Inactive" class="form-group row">
        <label id="elh_view_patient_services_Inactive" for="x_Inactive" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Inactive->caption() ?><?= $Page->Inactive->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Inactive->cellAttributes() ?>>
<span id="el_view_patient_services_Inactive">
<input type="<?= $Page->Inactive->getInputTextType() ?>" data-table="view_patient_services" data-field="x_Inactive" name="x_Inactive" id="x_Inactive" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Inactive->getPlaceHolder()) ?>" value="<?= $Page->Inactive->EditValue ?>"<?= $Page->Inactive->editAttributes() ?> aria-describedby="x_Inactive_help">
<?= $Page->Inactive->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Inactive->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CollSample->Visible) { // CollSample ?>
    <div id="r_CollSample" class="form-group row">
        <label id="elh_view_patient_services_CollSample" for="x_CollSample" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CollSample->caption() ?><?= $Page->CollSample->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CollSample->cellAttributes() ?>>
<span id="el_view_patient_services_CollSample">
<input type="<?= $Page->CollSample->getInputTextType() ?>" data-table="view_patient_services" data-field="x_CollSample" name="x_CollSample" id="x_CollSample" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CollSample->getPlaceHolder()) ?>" value="<?= $Page->CollSample->EditValue ?>"<?= $Page->CollSample->editAttributes() ?> aria-describedby="x_CollSample_help">
<?= $Page->CollSample->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CollSample->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TestType->Visible) { // TestType ?>
    <div id="r_TestType" class="form-group row">
        <label id="elh_view_patient_services_TestType" for="x_TestType" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TestType->caption() ?><?= $Page->TestType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TestType->cellAttributes() ?>>
<span id="el_view_patient_services_TestType">
<span<?= $Page->TestType->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->TestType->getDisplayValue($Page->TestType->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_services" data-field="x_TestType" data-hidden="1" name="x_TestType" id="x_TestType" value="<?= HtmlEncode($Page->TestType->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Repeated->Visible) { // Repeated ?>
    <div id="r_Repeated" class="form-group row">
        <label id="elh_view_patient_services_Repeated" for="x_Repeated" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Repeated->caption() ?><?= $Page->Repeated->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Repeated->cellAttributes() ?>>
<span id="el_view_patient_services_Repeated">
<input type="<?= $Page->Repeated->getInputTextType() ?>" data-table="view_patient_services" data-field="x_Repeated" name="x_Repeated" id="x_Repeated" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Repeated->getPlaceHolder()) ?>" value="<?= $Page->Repeated->EditValue ?>"<?= $Page->Repeated->editAttributes() ?> aria-describedby="x_Repeated_help">
<?= $Page->Repeated->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Repeated->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RepeatedBy->Visible) { // RepeatedBy ?>
    <div id="r_RepeatedBy" class="form-group row">
        <label id="elh_view_patient_services_RepeatedBy" for="x_RepeatedBy" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RepeatedBy->caption() ?><?= $Page->RepeatedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RepeatedBy->cellAttributes() ?>>
<span id="el_view_patient_services_RepeatedBy">
<input type="<?= $Page->RepeatedBy->getInputTextType() ?>" data-table="view_patient_services" data-field="x_RepeatedBy" name="x_RepeatedBy" id="x_RepeatedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RepeatedBy->getPlaceHolder()) ?>" value="<?= $Page->RepeatedBy->EditValue ?>"<?= $Page->RepeatedBy->editAttributes() ?> aria-describedby="x_RepeatedBy_help">
<?= $Page->RepeatedBy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RepeatedBy->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RepeatedDate->Visible) { // RepeatedDate ?>
    <div id="r_RepeatedDate" class="form-group row">
        <label id="elh_view_patient_services_RepeatedDate" for="x_RepeatedDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RepeatedDate->caption() ?><?= $Page->RepeatedDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RepeatedDate->cellAttributes() ?>>
<span id="el_view_patient_services_RepeatedDate">
<input type="<?= $Page->RepeatedDate->getInputTextType() ?>" data-table="view_patient_services" data-field="x_RepeatedDate" name="x_RepeatedDate" id="x_RepeatedDate" placeholder="<?= HtmlEncode($Page->RepeatedDate->getPlaceHolder()) ?>" value="<?= $Page->RepeatedDate->EditValue ?>"<?= $Page->RepeatedDate->editAttributes() ?> aria-describedby="x_RepeatedDate_help">
<?= $Page->RepeatedDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RepeatedDate->getErrorMessage() ?></div>
<?php if (!$Page->RepeatedDate->ReadOnly && !$Page->RepeatedDate->Disabled && !isset($Page->RepeatedDate->EditAttrs["readonly"]) && !isset($Page->RepeatedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_servicesedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_patient_servicesedit", "x_RepeatedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->serviceID->Visible) { // serviceID ?>
    <div id="r_serviceID" class="form-group row">
        <label id="elh_view_patient_services_serviceID" for="x_serviceID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->serviceID->caption() ?><?= $Page->serviceID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->serviceID->cellAttributes() ?>>
<span id="el_view_patient_services_serviceID">
<input type="<?= $Page->serviceID->getInputTextType() ?>" data-table="view_patient_services" data-field="x_serviceID" name="x_serviceID" id="x_serviceID" size="30" placeholder="<?= HtmlEncode($Page->serviceID->getPlaceHolder()) ?>" value="<?= $Page->serviceID->EditValue ?>"<?= $Page->serviceID->editAttributes() ?> aria-describedby="x_serviceID_help">
<?= $Page->serviceID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->serviceID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Service_Type->Visible) { // Service_Type ?>
    <div id="r_Service_Type" class="form-group row">
        <label id="elh_view_patient_services_Service_Type" for="x_Service_Type" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Service_Type->caption() ?><?= $Page->Service_Type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Service_Type->cellAttributes() ?>>
<span id="el_view_patient_services_Service_Type">
<input type="<?= $Page->Service_Type->getInputTextType() ?>" data-table="view_patient_services" data-field="x_Service_Type" name="x_Service_Type" id="x_Service_Type" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Service_Type->getPlaceHolder()) ?>" value="<?= $Page->Service_Type->EditValue ?>"<?= $Page->Service_Type->editAttributes() ?> aria-describedby="x_Service_Type_help">
<?= $Page->Service_Type->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Service_Type->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Service_Department->Visible) { // Service_Department ?>
    <div id="r_Service_Department" class="form-group row">
        <label id="elh_view_patient_services_Service_Department" for="x_Service_Department" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Service_Department->caption() ?><?= $Page->Service_Department->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Service_Department->cellAttributes() ?>>
<span id="el_view_patient_services_Service_Department">
<input type="<?= $Page->Service_Department->getInputTextType() ?>" data-table="view_patient_services" data-field="x_Service_Department" name="x_Service_Department" id="x_Service_Department" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Service_Department->getPlaceHolder()) ?>" value="<?= $Page->Service_Department->EditValue ?>"<?= $Page->Service_Department->editAttributes() ?> aria-describedby="x_Service_Department_help">
<?= $Page->Service_Department->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Service_Department->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RequestNo->Visible) { // RequestNo ?>
    <div id="r_RequestNo" class="form-group row">
        <label id="elh_view_patient_services_RequestNo" for="x_RequestNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RequestNo->caption() ?><?= $Page->RequestNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RequestNo->cellAttributes() ?>>
<span id="el_view_patient_services_RequestNo">
<input type="<?= $Page->RequestNo->getInputTextType() ?>" data-table="view_patient_services" data-field="x_RequestNo" name="x_RequestNo" id="x_RequestNo" size="30" placeholder="<?= HtmlEncode($Page->RequestNo->getPlaceHolder()) ?>" value="<?= $Page->RequestNo->EditValue ?>"<?= $Page->RequestNo->editAttributes() ?> aria-describedby="x_RequestNo_help">
<?= $Page->RequestNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RequestNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("SaveBtn") ?></button>
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
    ew.addEventHandlers("view_patient_services");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
