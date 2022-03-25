<?php

namespace PHPMaker2021\HIMS;

// Set up and run Grid object
$Grid = Container("PatientServicesGrid");
$Grid->run();
?>
<?php if (!$Grid->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpatient_servicesgrid;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    fpatient_servicesgrid = new ew.Form("fpatient_servicesgrid", "grid");
    fpatient_servicesgrid.formKeyCountName = '<?= $Grid->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "patient_services")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.patient_services)
        ew.vars.tables.patient_services = currentTable;
    fpatient_servicesgrid.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["Reception", [fields.Reception.visible && fields.Reception.required ? ew.Validators.required(fields.Reception.caption) : null], fields.Reception.isInvalid],
        ["Services", [fields.Services.visible && fields.Services.required ? ew.Validators.required(fields.Services.caption) : null], fields.Services.isInvalid],
        ["amount", [fields.amount.visible && fields.amount.required ? ew.Validators.required(fields.amount.caption) : null, ew.Validators.float], fields.amount.isInvalid],
        ["description", [fields.description.visible && fields.description.required ? ew.Validators.required(fields.description.caption) : null], fields.description.isInvalid],
        ["patient_type", [fields.patient_type.visible && fields.patient_type.required ? ew.Validators.required(fields.patient_type.caption) : null, ew.Validators.integer], fields.patient_type.isInvalid],
        ["charged_date", [fields.charged_date.visible && fields.charged_date.required ? ew.Validators.required(fields.charged_date.caption) : null], fields.charged_date.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null], fields.status.isInvalid],
        ["mrnno", [fields.mrnno.visible && fields.mrnno.required ? ew.Validators.required(fields.mrnno.caption) : null], fields.mrnno.isInvalid],
        ["PatientName", [fields.PatientName.visible && fields.PatientName.required ? ew.Validators.required(fields.PatientName.caption) : null], fields.PatientName.isInvalid],
        ["Age", [fields.Age.visible && fields.Age.required ? ew.Validators.required(fields.Age.caption) : null], fields.Age.isInvalid],
        ["Gender", [fields.Gender.visible && fields.Gender.required ? ew.Validators.required(fields.Gender.caption) : null], fields.Gender.isInvalid],
        ["Unit", [fields.Unit.visible && fields.Unit.required ? ew.Validators.required(fields.Unit.caption) : null, ew.Validators.integer], fields.Unit.isInvalid],
        ["Quantity", [fields.Quantity.visible && fields.Quantity.required ? ew.Validators.required(fields.Quantity.caption) : null, ew.Validators.integer], fields.Quantity.isInvalid],
        ["Discount", [fields.Discount.visible && fields.Discount.required ? ew.Validators.required(fields.Discount.caption) : null, ew.Validators.float], fields.Discount.isInvalid],
        ["SubTotal", [fields.SubTotal.visible && fields.SubTotal.required ? ew.Validators.required(fields.SubTotal.caption) : null, ew.Validators.float], fields.SubTotal.isInvalid],
        ["ServiceSelect", [fields.ServiceSelect.visible && fields.ServiceSelect.required ? ew.Validators.required(fields.ServiceSelect.caption) : null], fields.ServiceSelect.isInvalid],
        ["Aid", [fields.Aid.visible && fields.Aid.required ? ew.Validators.required(fields.Aid.caption) : null, ew.Validators.integer], fields.Aid.isInvalid],
        ["Vid", [fields.Vid.visible && fields.Vid.required ? ew.Validators.required(fields.Vid.caption) : null, ew.Validators.integer], fields.Vid.isInvalid],
        ["DrID", [fields.DrID.visible && fields.DrID.required ? ew.Validators.required(fields.DrID.caption) : null, ew.Validators.integer], fields.DrID.isInvalid],
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
        ["RIDNO", [fields.RIDNO.visible && fields.RIDNO.required ? ew.Validators.required(fields.RIDNO.caption) : null], fields.RIDNO.isInvalid],
        ["TidNo", [fields.TidNo.visible && fields.TidNo.required ? ew.Validators.required(fields.TidNo.caption) : null], fields.TidNo.isInvalid],
        ["DiscountCategory", [fields.DiscountCategory.visible && fields.DiscountCategory.required ? ew.Validators.required(fields.DiscountCategory.caption) : null], fields.DiscountCategory.isInvalid],
        ["sid", [fields.sid.visible && fields.sid.required ? ew.Validators.required(fields.sid.caption) : null, ew.Validators.integer], fields.sid.isInvalid],
        ["ItemCode", [fields.ItemCode.visible && fields.ItemCode.required ? ew.Validators.required(fields.ItemCode.caption) : null], fields.ItemCode.isInvalid],
        ["TestSubCd", [fields.TestSubCd.visible && fields.TestSubCd.required ? ew.Validators.required(fields.TestSubCd.caption) : null], fields.TestSubCd.isInvalid],
        ["DEptCd", [fields.DEptCd.visible && fields.DEptCd.required ? ew.Validators.required(fields.DEptCd.caption) : null], fields.DEptCd.isInvalid],
        ["ProfCd", [fields.ProfCd.visible && fields.ProfCd.required ? ew.Validators.required(fields.ProfCd.caption) : null], fields.ProfCd.isInvalid],
        ["Comments", [fields.Comments.visible && fields.Comments.required ? ew.Validators.required(fields.Comments.caption) : null], fields.Comments.isInvalid],
        ["Method", [fields.Method.visible && fields.Method.required ? ew.Validators.required(fields.Method.caption) : null], fields.Method.isInvalid],
        ["Specimen", [fields.Specimen.visible && fields.Specimen.required ? ew.Validators.required(fields.Specimen.caption) : null], fields.Specimen.isInvalid],
        ["Abnormal", [fields.Abnormal.visible && fields.Abnormal.required ? ew.Validators.required(fields.Abnormal.caption) : null], fields.Abnormal.isInvalid],
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
        ["ResType", [fields.ResType.visible && fields.ResType.required ? ew.Validators.required(fields.ResType.caption) : null], fields.ResType.isInvalid],
        ["Sample", [fields.Sample.visible && fields.Sample.required ? ew.Validators.required(fields.Sample.caption) : null], fields.Sample.isInvalid],
        ["NoD", [fields.NoD.visible && fields.NoD.required ? ew.Validators.required(fields.NoD.caption) : null, ew.Validators.float], fields.NoD.isInvalid],
        ["BillOrder", [fields.BillOrder.visible && fields.BillOrder.required ? ew.Validators.required(fields.BillOrder.caption) : null, ew.Validators.float], fields.BillOrder.isInvalid],
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
        var f = fpatient_servicesgrid,
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
    fpatient_servicesgrid.validate = function () {
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
            var checkrow = (gridinsert) ? !this.emptyRow(rowIndex) : true;
            if (checkrow) {
                addcnt++;

            // Validate fields
            if (!this.validateFields(rowIndex))
                return false;

            // Call Form_CustomValidate event
            if (!this.customValidate(fobj)) {
                this.focus();
                return false;
            }
            } // End Grid Add checking
        }
        return true;
    }

    // Check empty row
    fpatient_servicesgrid.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "Reception", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Services", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "amount", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "description", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "patient_type", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "status", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "mrnno", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PatientName", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Age", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Gender", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Unit", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Quantity", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Discount", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SubTotal", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ServiceSelect[]", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Aid", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Vid", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DrID", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DrCODE", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DrName", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Department", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DrSharePres", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "HospSharePres", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DrShareAmount", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "HospShareAmount", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DrShareSettiledAmount", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DrShareSettledId", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DrShareSettiledStatus", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "invoiceId", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "invoiceAmount", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "invoiceStatus", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "modeOfPayment", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "RIDNO", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "TidNo", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DiscountCategory", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "sid", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ItemCode", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "TestSubCd", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DEptCd", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ProfCd", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Comments", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Method", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Specimen", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Abnormal", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "TestUnit", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "LOWHIGH", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Branch", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Dispatch", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Pic1", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Pic2", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "GraphPath", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "MachineCD", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "TestCancel", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "OutSource", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Printed", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PrintBy", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PrintDate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "BillingDate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "BilledBy", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Resulted", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ResultDate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ResultedBy", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SampleDate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SampleUser", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Sampled", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ReceivedDate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ReceivedUser", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Recevied", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DeptRecvDate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DeptRecvUser", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DeptRecived", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SAuthDate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SAuthBy", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SAuthendicate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "AuthDate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "AuthBy", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Authencate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "EditDate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "EditBy", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Editted", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PatID", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PatientId", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Mobile", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "CId", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Order", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ResType", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Sample", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "NoD", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "BillOrder", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Inactive", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "CollSample", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "TestType", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Repeated", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "RepeatedBy", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "RepeatedDate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "serviceID", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Service_Type", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Service_Department", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "RequestNo", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    fpatient_servicesgrid.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpatient_servicesgrid.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpatient_servicesgrid.lists.Services = <?= $Grid->Services->toClientList($Grid) ?>;
    fpatient_servicesgrid.lists.status = <?= $Grid->status->toClientList($Grid) ?>;
    fpatient_servicesgrid.lists.ServiceSelect = <?= $Grid->ServiceSelect->toClientList($Grid) ?>;
    loadjs.done("fpatient_servicesgrid");
});
</script>
<?php } ?>
<?php
$Grid->renderOtherOptions();
?>
<?php if ($Grid->TotalRecords > 0 || $Grid->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_services">
<?php if ($Grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $Grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fpatient_servicesgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_patient_services" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_patient_servicesgrid" class="table ew-table"><!-- .ew-table -->
<thead>
    <tr class="ew-table-header">
<?php
// Header row
$Grid->RowType = ROWTYPE_HEADER;

// Render list options
$Grid->renderListOptions();

// Render list options (header, left)
$Grid->ListOptions->render("header", "left");
?>
<?php if ($Grid->id->Visible) { // id ?>
        <th data-name="id" class="<?= $Grid->id->headerCellClass() ?>"><div id="elh_patient_services_id" class="patient_services_id"><?= $Grid->renderSort($Grid->id) ?></div></th>
<?php } ?>
<?php if ($Grid->Reception->Visible) { // Reception ?>
        <th data-name="Reception" class="<?= $Grid->Reception->headerCellClass() ?>"><div id="elh_patient_services_Reception" class="patient_services_Reception"><?= $Grid->renderSort($Grid->Reception) ?></div></th>
<?php } ?>
<?php if ($Grid->Services->Visible) { // Services ?>
        <th data-name="Services" class="<?= $Grid->Services->headerCellClass() ?>"><div id="elh_patient_services_Services" class="patient_services_Services"><?= $Grid->renderSort($Grid->Services) ?></div></th>
<?php } ?>
<?php if ($Grid->amount->Visible) { // amount ?>
        <th data-name="amount" class="<?= $Grid->amount->headerCellClass() ?>"><div id="elh_patient_services_amount" class="patient_services_amount"><?= $Grid->renderSort($Grid->amount) ?></div></th>
<?php } ?>
<?php if ($Grid->description->Visible) { // description ?>
        <th data-name="description" class="<?= $Grid->description->headerCellClass() ?>"><div id="elh_patient_services_description" class="patient_services_description"><?= $Grid->renderSort($Grid->description) ?></div></th>
<?php } ?>
<?php if ($Grid->patient_type->Visible) { // patient_type ?>
        <th data-name="patient_type" class="<?= $Grid->patient_type->headerCellClass() ?>"><div id="elh_patient_services_patient_type" class="patient_services_patient_type"><?= $Grid->renderSort($Grid->patient_type) ?></div></th>
<?php } ?>
<?php if ($Grid->charged_date->Visible) { // charged_date ?>
        <th data-name="charged_date" class="<?= $Grid->charged_date->headerCellClass() ?>"><div id="elh_patient_services_charged_date" class="patient_services_charged_date"><?= $Grid->renderSort($Grid->charged_date) ?></div></th>
<?php } ?>
<?php if ($Grid->status->Visible) { // status ?>
        <th data-name="status" class="<?= $Grid->status->headerCellClass() ?>"><div id="elh_patient_services_status" class="patient_services_status"><?= $Grid->renderSort($Grid->status) ?></div></th>
<?php } ?>
<?php if ($Grid->mrnno->Visible) { // mrnno ?>
        <th data-name="mrnno" class="<?= $Grid->mrnno->headerCellClass() ?>"><div id="elh_patient_services_mrnno" class="patient_services_mrnno"><?= $Grid->renderSort($Grid->mrnno) ?></div></th>
<?php } ?>
<?php if ($Grid->PatientName->Visible) { // PatientName ?>
        <th data-name="PatientName" class="<?= $Grid->PatientName->headerCellClass() ?>"><div id="elh_patient_services_PatientName" class="patient_services_PatientName"><?= $Grid->renderSort($Grid->PatientName) ?></div></th>
<?php } ?>
<?php if ($Grid->Age->Visible) { // Age ?>
        <th data-name="Age" class="<?= $Grid->Age->headerCellClass() ?>"><div id="elh_patient_services_Age" class="patient_services_Age"><?= $Grid->renderSort($Grid->Age) ?></div></th>
<?php } ?>
<?php if ($Grid->Gender->Visible) { // Gender ?>
        <th data-name="Gender" class="<?= $Grid->Gender->headerCellClass() ?>"><div id="elh_patient_services_Gender" class="patient_services_Gender"><?= $Grid->renderSort($Grid->Gender) ?></div></th>
<?php } ?>
<?php if ($Grid->Unit->Visible) { // Unit ?>
        <th data-name="Unit" class="<?= $Grid->Unit->headerCellClass() ?>"><div id="elh_patient_services_Unit" class="patient_services_Unit"><?= $Grid->renderSort($Grid->Unit) ?></div></th>
<?php } ?>
<?php if ($Grid->Quantity->Visible) { // Quantity ?>
        <th data-name="Quantity" class="<?= $Grid->Quantity->headerCellClass() ?>"><div id="elh_patient_services_Quantity" class="patient_services_Quantity"><?= $Grid->renderSort($Grid->Quantity) ?></div></th>
<?php } ?>
<?php if ($Grid->Discount->Visible) { // Discount ?>
        <th data-name="Discount" class="<?= $Grid->Discount->headerCellClass() ?>"><div id="elh_patient_services_Discount" class="patient_services_Discount"><?= $Grid->renderSort($Grid->Discount) ?></div></th>
<?php } ?>
<?php if ($Grid->SubTotal->Visible) { // SubTotal ?>
        <th data-name="SubTotal" class="<?= $Grid->SubTotal->headerCellClass() ?>"><div id="elh_patient_services_SubTotal" class="patient_services_SubTotal"><?= $Grid->renderSort($Grid->SubTotal) ?></div></th>
<?php } ?>
<?php if ($Grid->ServiceSelect->Visible) { // ServiceSelect ?>
        <th data-name="ServiceSelect" class="<?= $Grid->ServiceSelect->headerCellClass() ?>"><div id="elh_patient_services_ServiceSelect" class="patient_services_ServiceSelect"><?= $Grid->renderSort($Grid->ServiceSelect) ?></div></th>
<?php } ?>
<?php if ($Grid->Aid->Visible) { // Aid ?>
        <th data-name="Aid" class="<?= $Grid->Aid->headerCellClass() ?>"><div id="elh_patient_services_Aid" class="patient_services_Aid"><?= $Grid->renderSort($Grid->Aid) ?></div></th>
<?php } ?>
<?php if ($Grid->Vid->Visible) { // Vid ?>
        <th data-name="Vid" class="<?= $Grid->Vid->headerCellClass() ?>"><div id="elh_patient_services_Vid" class="patient_services_Vid"><?= $Grid->renderSort($Grid->Vid) ?></div></th>
<?php } ?>
<?php if ($Grid->DrID->Visible) { // DrID ?>
        <th data-name="DrID" class="<?= $Grid->DrID->headerCellClass() ?>"><div id="elh_patient_services_DrID" class="patient_services_DrID"><?= $Grid->renderSort($Grid->DrID) ?></div></th>
<?php } ?>
<?php if ($Grid->DrCODE->Visible) { // DrCODE ?>
        <th data-name="DrCODE" class="<?= $Grid->DrCODE->headerCellClass() ?>"><div id="elh_patient_services_DrCODE" class="patient_services_DrCODE"><?= $Grid->renderSort($Grid->DrCODE) ?></div></th>
<?php } ?>
<?php if ($Grid->DrName->Visible) { // DrName ?>
        <th data-name="DrName" class="<?= $Grid->DrName->headerCellClass() ?>"><div id="elh_patient_services_DrName" class="patient_services_DrName"><?= $Grid->renderSort($Grid->DrName) ?></div></th>
<?php } ?>
<?php if ($Grid->Department->Visible) { // Department ?>
        <th data-name="Department" class="<?= $Grid->Department->headerCellClass() ?>"><div id="elh_patient_services_Department" class="patient_services_Department"><?= $Grid->renderSort($Grid->Department) ?></div></th>
<?php } ?>
<?php if ($Grid->DrSharePres->Visible) { // DrSharePres ?>
        <th data-name="DrSharePres" class="<?= $Grid->DrSharePres->headerCellClass() ?>"><div id="elh_patient_services_DrSharePres" class="patient_services_DrSharePres"><?= $Grid->renderSort($Grid->DrSharePres) ?></div></th>
<?php } ?>
<?php if ($Grid->HospSharePres->Visible) { // HospSharePres ?>
        <th data-name="HospSharePres" class="<?= $Grid->HospSharePres->headerCellClass() ?>"><div id="elh_patient_services_HospSharePres" class="patient_services_HospSharePres"><?= $Grid->renderSort($Grid->HospSharePres) ?></div></th>
<?php } ?>
<?php if ($Grid->DrShareAmount->Visible) { // DrShareAmount ?>
        <th data-name="DrShareAmount" class="<?= $Grid->DrShareAmount->headerCellClass() ?>"><div id="elh_patient_services_DrShareAmount" class="patient_services_DrShareAmount"><?= $Grid->renderSort($Grid->DrShareAmount) ?></div></th>
<?php } ?>
<?php if ($Grid->HospShareAmount->Visible) { // HospShareAmount ?>
        <th data-name="HospShareAmount" class="<?= $Grid->HospShareAmount->headerCellClass() ?>"><div id="elh_patient_services_HospShareAmount" class="patient_services_HospShareAmount"><?= $Grid->renderSort($Grid->HospShareAmount) ?></div></th>
<?php } ?>
<?php if ($Grid->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
        <th data-name="DrShareSettiledAmount" class="<?= $Grid->DrShareSettiledAmount->headerCellClass() ?>"><div id="elh_patient_services_DrShareSettiledAmount" class="patient_services_DrShareSettiledAmount"><?= $Grid->renderSort($Grid->DrShareSettiledAmount) ?></div></th>
<?php } ?>
<?php if ($Grid->DrShareSettledId->Visible) { // DrShareSettledId ?>
        <th data-name="DrShareSettledId" class="<?= $Grid->DrShareSettledId->headerCellClass() ?>"><div id="elh_patient_services_DrShareSettledId" class="patient_services_DrShareSettledId"><?= $Grid->renderSort($Grid->DrShareSettledId) ?></div></th>
<?php } ?>
<?php if ($Grid->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
        <th data-name="DrShareSettiledStatus" class="<?= $Grid->DrShareSettiledStatus->headerCellClass() ?>"><div id="elh_patient_services_DrShareSettiledStatus" class="patient_services_DrShareSettiledStatus"><?= $Grid->renderSort($Grid->DrShareSettiledStatus) ?></div></th>
<?php } ?>
<?php if ($Grid->invoiceId->Visible) { // invoiceId ?>
        <th data-name="invoiceId" class="<?= $Grid->invoiceId->headerCellClass() ?>"><div id="elh_patient_services_invoiceId" class="patient_services_invoiceId"><?= $Grid->renderSort($Grid->invoiceId) ?></div></th>
<?php } ?>
<?php if ($Grid->invoiceAmount->Visible) { // invoiceAmount ?>
        <th data-name="invoiceAmount" class="<?= $Grid->invoiceAmount->headerCellClass() ?>"><div id="elh_patient_services_invoiceAmount" class="patient_services_invoiceAmount"><?= $Grid->renderSort($Grid->invoiceAmount) ?></div></th>
<?php } ?>
<?php if ($Grid->invoiceStatus->Visible) { // invoiceStatus ?>
        <th data-name="invoiceStatus" class="<?= $Grid->invoiceStatus->headerCellClass() ?>"><div id="elh_patient_services_invoiceStatus" class="patient_services_invoiceStatus"><?= $Grid->renderSort($Grid->invoiceStatus) ?></div></th>
<?php } ?>
<?php if ($Grid->modeOfPayment->Visible) { // modeOfPayment ?>
        <th data-name="modeOfPayment" class="<?= $Grid->modeOfPayment->headerCellClass() ?>"><div id="elh_patient_services_modeOfPayment" class="patient_services_modeOfPayment"><?= $Grid->renderSort($Grid->modeOfPayment) ?></div></th>
<?php } ?>
<?php if ($Grid->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Grid->HospID->headerCellClass() ?>"><div id="elh_patient_services_HospID" class="patient_services_HospID"><?= $Grid->renderSort($Grid->HospID) ?></div></th>
<?php } ?>
<?php if ($Grid->RIDNO->Visible) { // RIDNO ?>
        <th data-name="RIDNO" class="<?= $Grid->RIDNO->headerCellClass() ?>"><div id="elh_patient_services_RIDNO" class="patient_services_RIDNO"><?= $Grid->renderSort($Grid->RIDNO) ?></div></th>
<?php } ?>
<?php if ($Grid->TidNo->Visible) { // TidNo ?>
        <th data-name="TidNo" class="<?= $Grid->TidNo->headerCellClass() ?>"><div id="elh_patient_services_TidNo" class="patient_services_TidNo"><?= $Grid->renderSort($Grid->TidNo) ?></div></th>
<?php } ?>
<?php if ($Grid->DiscountCategory->Visible) { // DiscountCategory ?>
        <th data-name="DiscountCategory" class="<?= $Grid->DiscountCategory->headerCellClass() ?>"><div id="elh_patient_services_DiscountCategory" class="patient_services_DiscountCategory"><?= $Grid->renderSort($Grid->DiscountCategory) ?></div></th>
<?php } ?>
<?php if ($Grid->sid->Visible) { // sid ?>
        <th data-name="sid" class="<?= $Grid->sid->headerCellClass() ?>"><div id="elh_patient_services_sid" class="patient_services_sid"><?= $Grid->renderSort($Grid->sid) ?></div></th>
<?php } ?>
<?php if ($Grid->ItemCode->Visible) { // ItemCode ?>
        <th data-name="ItemCode" class="<?= $Grid->ItemCode->headerCellClass() ?>"><div id="elh_patient_services_ItemCode" class="patient_services_ItemCode"><?= $Grid->renderSort($Grid->ItemCode) ?></div></th>
<?php } ?>
<?php if ($Grid->TestSubCd->Visible) { // TestSubCd ?>
        <th data-name="TestSubCd" class="<?= $Grid->TestSubCd->headerCellClass() ?>"><div id="elh_patient_services_TestSubCd" class="patient_services_TestSubCd"><?= $Grid->renderSort($Grid->TestSubCd) ?></div></th>
<?php } ?>
<?php if ($Grid->DEptCd->Visible) { // DEptCd ?>
        <th data-name="DEptCd" class="<?= $Grid->DEptCd->headerCellClass() ?>"><div id="elh_patient_services_DEptCd" class="patient_services_DEptCd"><?= $Grid->renderSort($Grid->DEptCd) ?></div></th>
<?php } ?>
<?php if ($Grid->ProfCd->Visible) { // ProfCd ?>
        <th data-name="ProfCd" class="<?= $Grid->ProfCd->headerCellClass() ?>"><div id="elh_patient_services_ProfCd" class="patient_services_ProfCd"><?= $Grid->renderSort($Grid->ProfCd) ?></div></th>
<?php } ?>
<?php if ($Grid->Comments->Visible) { // Comments ?>
        <th data-name="Comments" class="<?= $Grid->Comments->headerCellClass() ?>"><div id="elh_patient_services_Comments" class="patient_services_Comments"><?= $Grid->renderSort($Grid->Comments) ?></div></th>
<?php } ?>
<?php if ($Grid->Method->Visible) { // Method ?>
        <th data-name="Method" class="<?= $Grid->Method->headerCellClass() ?>"><div id="elh_patient_services_Method" class="patient_services_Method"><?= $Grid->renderSort($Grid->Method) ?></div></th>
<?php } ?>
<?php if ($Grid->Specimen->Visible) { // Specimen ?>
        <th data-name="Specimen" class="<?= $Grid->Specimen->headerCellClass() ?>"><div id="elh_patient_services_Specimen" class="patient_services_Specimen"><?= $Grid->renderSort($Grid->Specimen) ?></div></th>
<?php } ?>
<?php if ($Grid->Abnormal->Visible) { // Abnormal ?>
        <th data-name="Abnormal" class="<?= $Grid->Abnormal->headerCellClass() ?>"><div id="elh_patient_services_Abnormal" class="patient_services_Abnormal"><?= $Grid->renderSort($Grid->Abnormal) ?></div></th>
<?php } ?>
<?php if ($Grid->TestUnit->Visible) { // TestUnit ?>
        <th data-name="TestUnit" class="<?= $Grid->TestUnit->headerCellClass() ?>"><div id="elh_patient_services_TestUnit" class="patient_services_TestUnit"><?= $Grid->renderSort($Grid->TestUnit) ?></div></th>
<?php } ?>
<?php if ($Grid->LOWHIGH->Visible) { // LOWHIGH ?>
        <th data-name="LOWHIGH" class="<?= $Grid->LOWHIGH->headerCellClass() ?>"><div id="elh_patient_services_LOWHIGH" class="patient_services_LOWHIGH"><?= $Grid->renderSort($Grid->LOWHIGH) ?></div></th>
<?php } ?>
<?php if ($Grid->Branch->Visible) { // Branch ?>
        <th data-name="Branch" class="<?= $Grid->Branch->headerCellClass() ?>"><div id="elh_patient_services_Branch" class="patient_services_Branch"><?= $Grid->renderSort($Grid->Branch) ?></div></th>
<?php } ?>
<?php if ($Grid->Dispatch->Visible) { // Dispatch ?>
        <th data-name="Dispatch" class="<?= $Grid->Dispatch->headerCellClass() ?>"><div id="elh_patient_services_Dispatch" class="patient_services_Dispatch"><?= $Grid->renderSort($Grid->Dispatch) ?></div></th>
<?php } ?>
<?php if ($Grid->Pic1->Visible) { // Pic1 ?>
        <th data-name="Pic1" class="<?= $Grid->Pic1->headerCellClass() ?>"><div id="elh_patient_services_Pic1" class="patient_services_Pic1"><?= $Grid->renderSort($Grid->Pic1) ?></div></th>
<?php } ?>
<?php if ($Grid->Pic2->Visible) { // Pic2 ?>
        <th data-name="Pic2" class="<?= $Grid->Pic2->headerCellClass() ?>"><div id="elh_patient_services_Pic2" class="patient_services_Pic2"><?= $Grid->renderSort($Grid->Pic2) ?></div></th>
<?php } ?>
<?php if ($Grid->GraphPath->Visible) { // GraphPath ?>
        <th data-name="GraphPath" class="<?= $Grid->GraphPath->headerCellClass() ?>"><div id="elh_patient_services_GraphPath" class="patient_services_GraphPath"><?= $Grid->renderSort($Grid->GraphPath) ?></div></th>
<?php } ?>
<?php if ($Grid->MachineCD->Visible) { // MachineCD ?>
        <th data-name="MachineCD" class="<?= $Grid->MachineCD->headerCellClass() ?>"><div id="elh_patient_services_MachineCD" class="patient_services_MachineCD"><?= $Grid->renderSort($Grid->MachineCD) ?></div></th>
<?php } ?>
<?php if ($Grid->TestCancel->Visible) { // TestCancel ?>
        <th data-name="TestCancel" class="<?= $Grid->TestCancel->headerCellClass() ?>"><div id="elh_patient_services_TestCancel" class="patient_services_TestCancel"><?= $Grid->renderSort($Grid->TestCancel) ?></div></th>
<?php } ?>
<?php if ($Grid->OutSource->Visible) { // OutSource ?>
        <th data-name="OutSource" class="<?= $Grid->OutSource->headerCellClass() ?>"><div id="elh_patient_services_OutSource" class="patient_services_OutSource"><?= $Grid->renderSort($Grid->OutSource) ?></div></th>
<?php } ?>
<?php if ($Grid->Printed->Visible) { // Printed ?>
        <th data-name="Printed" class="<?= $Grid->Printed->headerCellClass() ?>"><div id="elh_patient_services_Printed" class="patient_services_Printed"><?= $Grid->renderSort($Grid->Printed) ?></div></th>
<?php } ?>
<?php if ($Grid->PrintBy->Visible) { // PrintBy ?>
        <th data-name="PrintBy" class="<?= $Grid->PrintBy->headerCellClass() ?>"><div id="elh_patient_services_PrintBy" class="patient_services_PrintBy"><?= $Grid->renderSort($Grid->PrintBy) ?></div></th>
<?php } ?>
<?php if ($Grid->PrintDate->Visible) { // PrintDate ?>
        <th data-name="PrintDate" class="<?= $Grid->PrintDate->headerCellClass() ?>"><div id="elh_patient_services_PrintDate" class="patient_services_PrintDate"><?= $Grid->renderSort($Grid->PrintDate) ?></div></th>
<?php } ?>
<?php if ($Grid->BillingDate->Visible) { // BillingDate ?>
        <th data-name="BillingDate" class="<?= $Grid->BillingDate->headerCellClass() ?>"><div id="elh_patient_services_BillingDate" class="patient_services_BillingDate"><?= $Grid->renderSort($Grid->BillingDate) ?></div></th>
<?php } ?>
<?php if ($Grid->BilledBy->Visible) { // BilledBy ?>
        <th data-name="BilledBy" class="<?= $Grid->BilledBy->headerCellClass() ?>"><div id="elh_patient_services_BilledBy" class="patient_services_BilledBy"><?= $Grid->renderSort($Grid->BilledBy) ?></div></th>
<?php } ?>
<?php if ($Grid->Resulted->Visible) { // Resulted ?>
        <th data-name="Resulted" class="<?= $Grid->Resulted->headerCellClass() ?>"><div id="elh_patient_services_Resulted" class="patient_services_Resulted"><?= $Grid->renderSort($Grid->Resulted) ?></div></th>
<?php } ?>
<?php if ($Grid->ResultDate->Visible) { // ResultDate ?>
        <th data-name="ResultDate" class="<?= $Grid->ResultDate->headerCellClass() ?>"><div id="elh_patient_services_ResultDate" class="patient_services_ResultDate"><?= $Grid->renderSort($Grid->ResultDate) ?></div></th>
<?php } ?>
<?php if ($Grid->ResultedBy->Visible) { // ResultedBy ?>
        <th data-name="ResultedBy" class="<?= $Grid->ResultedBy->headerCellClass() ?>"><div id="elh_patient_services_ResultedBy" class="patient_services_ResultedBy"><?= $Grid->renderSort($Grid->ResultedBy) ?></div></th>
<?php } ?>
<?php if ($Grid->SampleDate->Visible) { // SampleDate ?>
        <th data-name="SampleDate" class="<?= $Grid->SampleDate->headerCellClass() ?>"><div id="elh_patient_services_SampleDate" class="patient_services_SampleDate"><?= $Grid->renderSort($Grid->SampleDate) ?></div></th>
<?php } ?>
<?php if ($Grid->SampleUser->Visible) { // SampleUser ?>
        <th data-name="SampleUser" class="<?= $Grid->SampleUser->headerCellClass() ?>"><div id="elh_patient_services_SampleUser" class="patient_services_SampleUser"><?= $Grid->renderSort($Grid->SampleUser) ?></div></th>
<?php } ?>
<?php if ($Grid->Sampled->Visible) { // Sampled ?>
        <th data-name="Sampled" class="<?= $Grid->Sampled->headerCellClass() ?>"><div id="elh_patient_services_Sampled" class="patient_services_Sampled"><?= $Grid->renderSort($Grid->Sampled) ?></div></th>
<?php } ?>
<?php if ($Grid->ReceivedDate->Visible) { // ReceivedDate ?>
        <th data-name="ReceivedDate" class="<?= $Grid->ReceivedDate->headerCellClass() ?>"><div id="elh_patient_services_ReceivedDate" class="patient_services_ReceivedDate"><?= $Grid->renderSort($Grid->ReceivedDate) ?></div></th>
<?php } ?>
<?php if ($Grid->ReceivedUser->Visible) { // ReceivedUser ?>
        <th data-name="ReceivedUser" class="<?= $Grid->ReceivedUser->headerCellClass() ?>"><div id="elh_patient_services_ReceivedUser" class="patient_services_ReceivedUser"><?= $Grid->renderSort($Grid->ReceivedUser) ?></div></th>
<?php } ?>
<?php if ($Grid->Recevied->Visible) { // Recevied ?>
        <th data-name="Recevied" class="<?= $Grid->Recevied->headerCellClass() ?>"><div id="elh_patient_services_Recevied" class="patient_services_Recevied"><?= $Grid->renderSort($Grid->Recevied) ?></div></th>
<?php } ?>
<?php if ($Grid->DeptRecvDate->Visible) { // DeptRecvDate ?>
        <th data-name="DeptRecvDate" class="<?= $Grid->DeptRecvDate->headerCellClass() ?>"><div id="elh_patient_services_DeptRecvDate" class="patient_services_DeptRecvDate"><?= $Grid->renderSort($Grid->DeptRecvDate) ?></div></th>
<?php } ?>
<?php if ($Grid->DeptRecvUser->Visible) { // DeptRecvUser ?>
        <th data-name="DeptRecvUser" class="<?= $Grid->DeptRecvUser->headerCellClass() ?>"><div id="elh_patient_services_DeptRecvUser" class="patient_services_DeptRecvUser"><?= $Grid->renderSort($Grid->DeptRecvUser) ?></div></th>
<?php } ?>
<?php if ($Grid->DeptRecived->Visible) { // DeptRecived ?>
        <th data-name="DeptRecived" class="<?= $Grid->DeptRecived->headerCellClass() ?>"><div id="elh_patient_services_DeptRecived" class="patient_services_DeptRecived"><?= $Grid->renderSort($Grid->DeptRecived) ?></div></th>
<?php } ?>
<?php if ($Grid->SAuthDate->Visible) { // SAuthDate ?>
        <th data-name="SAuthDate" class="<?= $Grid->SAuthDate->headerCellClass() ?>"><div id="elh_patient_services_SAuthDate" class="patient_services_SAuthDate"><?= $Grid->renderSort($Grid->SAuthDate) ?></div></th>
<?php } ?>
<?php if ($Grid->SAuthBy->Visible) { // SAuthBy ?>
        <th data-name="SAuthBy" class="<?= $Grid->SAuthBy->headerCellClass() ?>"><div id="elh_patient_services_SAuthBy" class="patient_services_SAuthBy"><?= $Grid->renderSort($Grid->SAuthBy) ?></div></th>
<?php } ?>
<?php if ($Grid->SAuthendicate->Visible) { // SAuthendicate ?>
        <th data-name="SAuthendicate" class="<?= $Grid->SAuthendicate->headerCellClass() ?>"><div id="elh_patient_services_SAuthendicate" class="patient_services_SAuthendicate"><?= $Grid->renderSort($Grid->SAuthendicate) ?></div></th>
<?php } ?>
<?php if ($Grid->AuthDate->Visible) { // AuthDate ?>
        <th data-name="AuthDate" class="<?= $Grid->AuthDate->headerCellClass() ?>"><div id="elh_patient_services_AuthDate" class="patient_services_AuthDate"><?= $Grid->renderSort($Grid->AuthDate) ?></div></th>
<?php } ?>
<?php if ($Grid->AuthBy->Visible) { // AuthBy ?>
        <th data-name="AuthBy" class="<?= $Grid->AuthBy->headerCellClass() ?>"><div id="elh_patient_services_AuthBy" class="patient_services_AuthBy"><?= $Grid->renderSort($Grid->AuthBy) ?></div></th>
<?php } ?>
<?php if ($Grid->Authencate->Visible) { // Authencate ?>
        <th data-name="Authencate" class="<?= $Grid->Authencate->headerCellClass() ?>"><div id="elh_patient_services_Authencate" class="patient_services_Authencate"><?= $Grid->renderSort($Grid->Authencate) ?></div></th>
<?php } ?>
<?php if ($Grid->EditDate->Visible) { // EditDate ?>
        <th data-name="EditDate" class="<?= $Grid->EditDate->headerCellClass() ?>"><div id="elh_patient_services_EditDate" class="patient_services_EditDate"><?= $Grid->renderSort($Grid->EditDate) ?></div></th>
<?php } ?>
<?php if ($Grid->EditBy->Visible) { // EditBy ?>
        <th data-name="EditBy" class="<?= $Grid->EditBy->headerCellClass() ?>"><div id="elh_patient_services_EditBy" class="patient_services_EditBy"><?= $Grid->renderSort($Grid->EditBy) ?></div></th>
<?php } ?>
<?php if ($Grid->Editted->Visible) { // Editted ?>
        <th data-name="Editted" class="<?= $Grid->Editted->headerCellClass() ?>"><div id="elh_patient_services_Editted" class="patient_services_Editted"><?= $Grid->renderSort($Grid->Editted) ?></div></th>
<?php } ?>
<?php if ($Grid->PatID->Visible) { // PatID ?>
        <th data-name="PatID" class="<?= $Grid->PatID->headerCellClass() ?>"><div id="elh_patient_services_PatID" class="patient_services_PatID"><?= $Grid->renderSort($Grid->PatID) ?></div></th>
<?php } ?>
<?php if ($Grid->PatientId->Visible) { // PatientId ?>
        <th data-name="PatientId" class="<?= $Grid->PatientId->headerCellClass() ?>"><div id="elh_patient_services_PatientId" class="patient_services_PatientId"><?= $Grid->renderSort($Grid->PatientId) ?></div></th>
<?php } ?>
<?php if ($Grid->Mobile->Visible) { // Mobile ?>
        <th data-name="Mobile" class="<?= $Grid->Mobile->headerCellClass() ?>"><div id="elh_patient_services_Mobile" class="patient_services_Mobile"><?= $Grid->renderSort($Grid->Mobile) ?></div></th>
<?php } ?>
<?php if ($Grid->CId->Visible) { // CId ?>
        <th data-name="CId" class="<?= $Grid->CId->headerCellClass() ?>"><div id="elh_patient_services_CId" class="patient_services_CId"><?= $Grid->renderSort($Grid->CId) ?></div></th>
<?php } ?>
<?php if ($Grid->Order->Visible) { // Order ?>
        <th data-name="Order" class="<?= $Grid->Order->headerCellClass() ?>"><div id="elh_patient_services_Order" class="patient_services_Order"><?= $Grid->renderSort($Grid->Order) ?></div></th>
<?php } ?>
<?php if ($Grid->ResType->Visible) { // ResType ?>
        <th data-name="ResType" class="<?= $Grid->ResType->headerCellClass() ?>"><div id="elh_patient_services_ResType" class="patient_services_ResType"><?= $Grid->renderSort($Grid->ResType) ?></div></th>
<?php } ?>
<?php if ($Grid->Sample->Visible) { // Sample ?>
        <th data-name="Sample" class="<?= $Grid->Sample->headerCellClass() ?>"><div id="elh_patient_services_Sample" class="patient_services_Sample"><?= $Grid->renderSort($Grid->Sample) ?></div></th>
<?php } ?>
<?php if ($Grid->NoD->Visible) { // NoD ?>
        <th data-name="NoD" class="<?= $Grid->NoD->headerCellClass() ?>"><div id="elh_patient_services_NoD" class="patient_services_NoD"><?= $Grid->renderSort($Grid->NoD) ?></div></th>
<?php } ?>
<?php if ($Grid->BillOrder->Visible) { // BillOrder ?>
        <th data-name="BillOrder" class="<?= $Grid->BillOrder->headerCellClass() ?>"><div id="elh_patient_services_BillOrder" class="patient_services_BillOrder"><?= $Grid->renderSort($Grid->BillOrder) ?></div></th>
<?php } ?>
<?php if ($Grid->Inactive->Visible) { // Inactive ?>
        <th data-name="Inactive" class="<?= $Grid->Inactive->headerCellClass() ?>"><div id="elh_patient_services_Inactive" class="patient_services_Inactive"><?= $Grid->renderSort($Grid->Inactive) ?></div></th>
<?php } ?>
<?php if ($Grid->CollSample->Visible) { // CollSample ?>
        <th data-name="CollSample" class="<?= $Grid->CollSample->headerCellClass() ?>"><div id="elh_patient_services_CollSample" class="patient_services_CollSample"><?= $Grid->renderSort($Grid->CollSample) ?></div></th>
<?php } ?>
<?php if ($Grid->TestType->Visible) { // TestType ?>
        <th data-name="TestType" class="<?= $Grid->TestType->headerCellClass() ?>"><div id="elh_patient_services_TestType" class="patient_services_TestType"><?= $Grid->renderSort($Grid->TestType) ?></div></th>
<?php } ?>
<?php if ($Grid->Repeated->Visible) { // Repeated ?>
        <th data-name="Repeated" class="<?= $Grid->Repeated->headerCellClass() ?>"><div id="elh_patient_services_Repeated" class="patient_services_Repeated"><?= $Grid->renderSort($Grid->Repeated) ?></div></th>
<?php } ?>
<?php if ($Grid->RepeatedBy->Visible) { // RepeatedBy ?>
        <th data-name="RepeatedBy" class="<?= $Grid->RepeatedBy->headerCellClass() ?>"><div id="elh_patient_services_RepeatedBy" class="patient_services_RepeatedBy"><?= $Grid->renderSort($Grid->RepeatedBy) ?></div></th>
<?php } ?>
<?php if ($Grid->RepeatedDate->Visible) { // RepeatedDate ?>
        <th data-name="RepeatedDate" class="<?= $Grid->RepeatedDate->headerCellClass() ?>"><div id="elh_patient_services_RepeatedDate" class="patient_services_RepeatedDate"><?= $Grid->renderSort($Grid->RepeatedDate) ?></div></th>
<?php } ?>
<?php if ($Grid->serviceID->Visible) { // serviceID ?>
        <th data-name="serviceID" class="<?= $Grid->serviceID->headerCellClass() ?>"><div id="elh_patient_services_serviceID" class="patient_services_serviceID"><?= $Grid->renderSort($Grid->serviceID) ?></div></th>
<?php } ?>
<?php if ($Grid->Service_Type->Visible) { // Service_Type ?>
        <th data-name="Service_Type" class="<?= $Grid->Service_Type->headerCellClass() ?>"><div id="elh_patient_services_Service_Type" class="patient_services_Service_Type"><?= $Grid->renderSort($Grid->Service_Type) ?></div></th>
<?php } ?>
<?php if ($Grid->Service_Department->Visible) { // Service_Department ?>
        <th data-name="Service_Department" class="<?= $Grid->Service_Department->headerCellClass() ?>"><div id="elh_patient_services_Service_Department" class="patient_services_Service_Department"><?= $Grid->renderSort($Grid->Service_Department) ?></div></th>
<?php } ?>
<?php if ($Grid->RequestNo->Visible) { // RequestNo ?>
        <th data-name="RequestNo" class="<?= $Grid->RequestNo->headerCellClass() ?>"><div id="elh_patient_services_RequestNo" class="patient_services_RequestNo"><?= $Grid->renderSort($Grid->RequestNo) ?></div></th>
<?php } ?>
<?php
// Render list options (header, right)
$Grid->ListOptions->render("header", "right");
?>
    </tr>
</thead>
<tbody>
<?php
$Grid->StartRecord = 1;
$Grid->StopRecord = $Grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($Grid->isConfirm() || $Grid->EventCancelled)) {
    $CurrentForm->Index = -1;
    if ($CurrentForm->hasValue($Grid->FormKeyCountName) && ($Grid->isGridAdd() || $Grid->isGridEdit() || $Grid->isConfirm())) {
        $Grid->KeyCount = $CurrentForm->getValue($Grid->FormKeyCountName);
        $Grid->StopRecord = $Grid->StartRecord + $Grid->KeyCount - 1;
    }
}
$Grid->RecordCount = $Grid->StartRecord - 1;
if ($Grid->Recordset && !$Grid->Recordset->EOF) {
    // Nothing to do
} elseif (!$Grid->AllowAddDeleteRow && $Grid->StopRecord == 0) {
    $Grid->StopRecord = $Grid->GridAddRowCount;
}

// Initialize aggregate
$Grid->RowType = ROWTYPE_AGGREGATEINIT;
$Grid->resetAttributes();
$Grid->renderRow();
if ($Grid->isGridAdd())
    $Grid->RowIndex = 0;
if ($Grid->isGridEdit())
    $Grid->RowIndex = 0;
while ($Grid->RecordCount < $Grid->StopRecord) {
    $Grid->RecordCount++;
    if ($Grid->RecordCount >= $Grid->StartRecord) {
        $Grid->RowCount++;
        if ($Grid->isGridAdd() || $Grid->isGridEdit() || $Grid->isConfirm()) {
            $Grid->RowIndex++;
            $CurrentForm->Index = $Grid->RowIndex;
            if ($CurrentForm->hasValue($Grid->FormActionName) && ($Grid->isConfirm() || $Grid->EventCancelled)) {
                $Grid->RowAction = strval($CurrentForm->getValue($Grid->FormActionName));
            } elseif ($Grid->isGridAdd()) {
                $Grid->RowAction = "insert";
            } else {
                $Grid->RowAction = "";
            }
        }

        // Set up key count
        $Grid->KeyCount = $Grid->RowIndex;

        // Init row class and style
        $Grid->resetAttributes();
        $Grid->CssClass = "";
        if ($Grid->isGridAdd()) {
            if ($Grid->CurrentMode == "copy") {
                $Grid->loadRowValues($Grid->Recordset); // Load row values
                $Grid->OldKey = $Grid->getKey(true); // Get from CurrentValue
            } else {
                $Grid->loadRowValues(); // Load default values
                $Grid->OldKey = "";
            }
        } else {
            $Grid->loadRowValues($Grid->Recordset); // Load row values
            $Grid->OldKey = $Grid->getKey(true); // Get from CurrentValue
        }
        $Grid->setKey($Grid->OldKey);
        $Grid->RowType = ROWTYPE_VIEW; // Render view
        if ($Grid->isGridAdd()) { // Grid add
            $Grid->RowType = ROWTYPE_ADD; // Render add
        }
        if ($Grid->isGridAdd() && $Grid->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) { // Insert failed
            $Grid->restoreCurrentRowFormValues($Grid->RowIndex); // Restore form values
        }
        if ($Grid->isGridEdit()) { // Grid edit
            if ($Grid->EventCancelled) {
                $Grid->restoreCurrentRowFormValues($Grid->RowIndex); // Restore form values
            }
            if ($Grid->RowAction == "insert") {
                $Grid->RowType = ROWTYPE_ADD; // Render add
            } else {
                $Grid->RowType = ROWTYPE_EDIT; // Render edit
            }
        }
        if ($Grid->isGridEdit() && ($Grid->RowType == ROWTYPE_EDIT || $Grid->RowType == ROWTYPE_ADD) && $Grid->EventCancelled) { // Update failed
            $Grid->restoreCurrentRowFormValues($Grid->RowIndex); // Restore form values
        }
        if ($Grid->RowType == ROWTYPE_EDIT) { // Edit row
            $Grid->EditRowCount++;
        }
        if ($Grid->isConfirm()) { // Confirm row
            $Grid->restoreCurrentRowFormValues($Grid->RowIndex); // Restore form values
        }

        // Set up row id / data-rowindex
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowCount, "id" => "r" . $Grid->RowCount . "_patient_services", "data-rowtype" => $Grid->RowType]);

        // Render row
        $Grid->renderRow();

        // Render list options
        $Grid->renderListOptions();

        // Skip delete row / empty row for confirm page
        if ($Grid->RowAction != "delete" && $Grid->RowAction != "insertdelete" && !($Grid->RowAction == "insert" && $Grid->isConfirm() && $Grid->emptyRow())) {
?>
    <tr <?= $Grid->rowAttributes() ?>>
<?php
// Render list options (body, left)
$Grid->ListOptions->render("body", "left", $Grid->RowCount);
?>
    <?php if ($Grid->id->Visible) { // id ?>
        <td data-name="id" <?= $Grid->id->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_id" class="form-group"></span>
<input type="hidden" data-table="patient_services" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_id" class="form-group">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_id">
<span<?= $Grid->id->viewAttributes() ?>>
<?= $Grid->id->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_id" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_id" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_id" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_id" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="patient_services" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Grid->Reception->Visible) { // Reception ?>
        <td data-name="Reception" <?= $Grid->Reception->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->Reception->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Reception" class="form-group">
<span<?= $Grid->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Reception->getDisplayValue($Grid->Reception->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_Reception" name="x<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Reception" class="form-group">
<input type="<?= $Grid->Reception->getInputTextType() ?>" data-table="patient_services" data-field="x_Reception" name="x<?= $Grid->RowIndex ?>_Reception" id="x<?= $Grid->RowIndex ?>_Reception" size="30" placeholder="<?= HtmlEncode($Grid->Reception->getPlaceHolder()) ?>" value="<?= $Grid->Reception->EditValue ?>"<?= $Grid->Reception->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Reception->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Reception" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Reception" id="o<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Reception" class="form-group">
<span<?= $Grid->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Reception->getDisplayValue($Grid->Reception->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Reception" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Reception" id="x<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Reception">
<span<?= $Grid->Reception->viewAttributes() ?>>
<?= $Grid->Reception->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Reception" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Reception" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Reception" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Reception" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Services->Visible) { // Services ?>
        <td data-name="Services" <?= $Grid->Services->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Services" class="form-group">
<?php
$onchange = $Grid->Services->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->Services->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_Services" class="ew-auto-suggest">
    <input type="<?= $Grid->Services->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_Services" id="sv_x<?= $Grid->RowIndex ?>_Services" value="<?= RemoveHtml($Grid->Services->EditValue) ?>" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->Services->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->Services->getPlaceHolder()) ?>"<?= $Grid->Services->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient_services" data-field="x_Services" data-input="sv_x<?= $Grid->RowIndex ?>_Services" data-value-separator="<?= $Grid->Services->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_Services" id="x<?= $Grid->RowIndex ?>_Services" value="<?= HtmlEncode($Grid->Services->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->Services->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_servicesgrid"], function() {
    fpatient_servicesgrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_Services","forceSelect":true}, ew.vars.tables.patient_services.fields.Services.autoSuggestOptions));
});
</script>
<?= $Grid->Services->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_Services") ?>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Services" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Services" id="o<?= $Grid->RowIndex ?>_Services" value="<?= HtmlEncode($Grid->Services->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Services" class="form-group">
<?php
$onchange = $Grid->Services->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->Services->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_Services" class="ew-auto-suggest">
    <input type="<?= $Grid->Services->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_Services" id="sv_x<?= $Grid->RowIndex ?>_Services" value="<?= RemoveHtml($Grid->Services->EditValue) ?>" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->Services->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->Services->getPlaceHolder()) ?>"<?= $Grid->Services->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient_services" data-field="x_Services" data-input="sv_x<?= $Grid->RowIndex ?>_Services" data-value-separator="<?= $Grid->Services->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_Services" id="x<?= $Grid->RowIndex ?>_Services" value="<?= HtmlEncode($Grid->Services->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->Services->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_servicesgrid"], function() {
    fpatient_servicesgrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_Services","forceSelect":true}, ew.vars.tables.patient_services.fields.Services.autoSuggestOptions));
});
</script>
<?= $Grid->Services->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_Services") ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Services">
<span<?= $Grid->Services->viewAttributes() ?>>
<?= $Grid->Services->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Services" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Services" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Services" value="<?= HtmlEncode($Grid->Services->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Services" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Services" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Services" value="<?= HtmlEncode($Grid->Services->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->amount->Visible) { // amount ?>
        <td data-name="amount" <?= $Grid->amount->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_amount" class="form-group">
<input type="<?= $Grid->amount->getInputTextType() ?>" data-table="patient_services" data-field="x_amount" name="x<?= $Grid->RowIndex ?>_amount" id="x<?= $Grid->RowIndex ?>_amount" size="8" maxlength="13" placeholder="<?= HtmlEncode($Grid->amount->getPlaceHolder()) ?>" value="<?= $Grid->amount->EditValue ?>"<?= $Grid->amount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->amount->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_amount" data-hidden="1" name="o<?= $Grid->RowIndex ?>_amount" id="o<?= $Grid->RowIndex ?>_amount" value="<?= HtmlEncode($Grid->amount->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_amount" class="form-group">
<input type="<?= $Grid->amount->getInputTextType() ?>" data-table="patient_services" data-field="x_amount" name="x<?= $Grid->RowIndex ?>_amount" id="x<?= $Grid->RowIndex ?>_amount" size="8" maxlength="13" placeholder="<?= HtmlEncode($Grid->amount->getPlaceHolder()) ?>" value="<?= $Grid->amount->EditValue ?>"<?= $Grid->amount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->amount->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_amount">
<span<?= $Grid->amount->viewAttributes() ?>>
<?= $Grid->amount->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_amount" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_amount" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_amount" value="<?= HtmlEncode($Grid->amount->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_amount" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_amount" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_amount" value="<?= HtmlEncode($Grid->amount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->description->Visible) { // description ?>
        <td data-name="description" <?= $Grid->description->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_description" class="form-group">
<input type="<?= $Grid->description->getInputTextType() ?>" data-table="patient_services" data-field="x_description" name="x<?= $Grid->RowIndex ?>_description" id="x<?= $Grid->RowIndex ?>_description" placeholder="<?= HtmlEncode($Grid->description->getPlaceHolder()) ?>" value="<?= $Grid->description->EditValue ?>"<?= $Grid->description->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->description->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_description" data-hidden="1" name="o<?= $Grid->RowIndex ?>_description" id="o<?= $Grid->RowIndex ?>_description" value="<?= HtmlEncode($Grid->description->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_description" class="form-group">
<input type="<?= $Grid->description->getInputTextType() ?>" data-table="patient_services" data-field="x_description" name="x<?= $Grid->RowIndex ?>_description" id="x<?= $Grid->RowIndex ?>_description" placeholder="<?= HtmlEncode($Grid->description->getPlaceHolder()) ?>" value="<?= $Grid->description->EditValue ?>"<?= $Grid->description->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->description->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_description">
<span<?= $Grid->description->viewAttributes() ?>>
<?= $Grid->description->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_description" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_description" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_description" value="<?= HtmlEncode($Grid->description->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_description" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_description" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_description" value="<?= HtmlEncode($Grid->description->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->patient_type->Visible) { // patient_type ?>
        <td data-name="patient_type" <?= $Grid->patient_type->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_patient_type" class="form-group">
<input type="<?= $Grid->patient_type->getInputTextType() ?>" data-table="patient_services" data-field="x_patient_type" name="x<?= $Grid->RowIndex ?>_patient_type" id="x<?= $Grid->RowIndex ?>_patient_type" size="30" placeholder="<?= HtmlEncode($Grid->patient_type->getPlaceHolder()) ?>" value="<?= $Grid->patient_type->EditValue ?>"<?= $Grid->patient_type->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->patient_type->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_patient_type" data-hidden="1" name="o<?= $Grid->RowIndex ?>_patient_type" id="o<?= $Grid->RowIndex ?>_patient_type" value="<?= HtmlEncode($Grid->patient_type->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_patient_type" class="form-group">
<input type="<?= $Grid->patient_type->getInputTextType() ?>" data-table="patient_services" data-field="x_patient_type" name="x<?= $Grid->RowIndex ?>_patient_type" id="x<?= $Grid->RowIndex ?>_patient_type" size="30" placeholder="<?= HtmlEncode($Grid->patient_type->getPlaceHolder()) ?>" value="<?= $Grid->patient_type->EditValue ?>"<?= $Grid->patient_type->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->patient_type->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_patient_type">
<span<?= $Grid->patient_type->viewAttributes() ?>>
<?= $Grid->patient_type->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_patient_type" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_patient_type" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_patient_type" value="<?= HtmlEncode($Grid->patient_type->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_patient_type" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_patient_type" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_patient_type" value="<?= HtmlEncode($Grid->patient_type->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->charged_date->Visible) { // charged_date ?>
        <td data-name="charged_date" <?= $Grid->charged_date->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_services" data-field="x_charged_date" data-hidden="1" name="o<?= $Grid->RowIndex ?>_charged_date" id="o<?= $Grid->RowIndex ?>_charged_date" value="<?= HtmlEncode($Grid->charged_date->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_charged_date">
<span<?= $Grid->charged_date->viewAttributes() ?>>
<?= $Grid->charged_date->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_charged_date" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_charged_date" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_charged_date" value="<?= HtmlEncode($Grid->charged_date->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_charged_date" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_charged_date" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_charged_date" value="<?= HtmlEncode($Grid->charged_date->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->status->Visible) { // status ?>
        <td data-name="status" <?= $Grid->status->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_status" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_status"
        name="x<?= $Grid->RowIndex ?>_status"
        class="form-control ew-select<?= $Grid->status->isInvalidClass() ?>"
        data-select2-id="patient_services_x<?= $Grid->RowIndex ?>_status"
        data-table="patient_services"
        data-field="x_status"
        data-value-separator="<?= $Grid->status->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->status->getPlaceHolder()) ?>"
        <?= $Grid->status->editAttributes() ?>>
        <?= $Grid->status->selectOptionListHtml("x{$Grid->RowIndex}_status") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->status->getErrorMessage() ?></div>
<?= $Grid->status->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_status") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_services_x<?= $Grid->RowIndex ?>_status']"),
        options = { name: "x<?= $Grid->RowIndex ?>_status", selectId: "patient_services_x<?= $Grid->RowIndex ?>_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_services.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="patient_services" data-field="x_status" data-hidden="1" name="o<?= $Grid->RowIndex ?>_status" id="o<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_status" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_status"
        name="x<?= $Grid->RowIndex ?>_status"
        class="form-control ew-select<?= $Grid->status->isInvalidClass() ?>"
        data-select2-id="patient_services_x<?= $Grid->RowIndex ?>_status"
        data-table="patient_services"
        data-field="x_status"
        data-value-separator="<?= $Grid->status->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->status->getPlaceHolder()) ?>"
        <?= $Grid->status->editAttributes() ?>>
        <?= $Grid->status->selectOptionListHtml("x{$Grid->RowIndex}_status") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->status->getErrorMessage() ?></div>
<?= $Grid->status->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_status") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_services_x<?= $Grid->RowIndex ?>_status']"),
        options = { name: "x<?= $Grid->RowIndex ?>_status", selectId: "patient_services_x<?= $Grid->RowIndex ?>_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_services.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_status">
<span<?= $Grid->status->viewAttributes() ?>>
<?= $Grid->status->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_status" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_status" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_status" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_status" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->mrnno->Visible) { // mrnno ?>
        <td data-name="mrnno" <?= $Grid->mrnno->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->mrnno->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_mrnno" class="form-group">
<span<?= $Grid->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->mrnno->getDisplayValue($Grid->mrnno->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_mrnno" name="x<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_mrnno" class="form-group">
<input type="<?= $Grid->mrnno->getInputTextType() ?>" data-table="patient_services" data-field="x_mrnno" name="x<?= $Grid->RowIndex ?>_mrnno" id="x<?= $Grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->mrnno->getPlaceHolder()) ?>" value="<?= $Grid->mrnno->EditValue ?>"<?= $Grid->mrnno->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->mrnno->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_mrnno" data-hidden="1" name="o<?= $Grid->RowIndex ?>_mrnno" id="o<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_mrnno" class="form-group">
<span<?= $Grid->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->mrnno->getDisplayValue($Grid->mrnno->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_mrnno" data-hidden="1" name="x<?= $Grid->RowIndex ?>_mrnno" id="x<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_mrnno">
<span<?= $Grid->mrnno->viewAttributes() ?>>
<?= $Grid->mrnno->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_mrnno" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_mrnno" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_mrnno" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_mrnno" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName" <?= $Grid->PatientName->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_PatientName" class="form-group">
<input type="<?= $Grid->PatientName->getInputTextType() ?>" data-table="patient_services" data-field="x_PatientName" name="x<?= $Grid->RowIndex ?>_PatientName" id="x<?= $Grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatientName->getPlaceHolder()) ?>" value="<?= $Grid->PatientName->EditValue ?>"<?= $Grid->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientName->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_PatientName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatientName" id="o<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_PatientName" class="form-group">
<input type="<?= $Grid->PatientName->getInputTextType() ?>" data-table="patient_services" data-field="x_PatientName" name="x<?= $Grid->RowIndex ?>_PatientName" id="x<?= $Grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatientName->getPlaceHolder()) ?>" value="<?= $Grid->PatientName->EditValue ?>"<?= $Grid->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientName->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_PatientName">
<span<?= $Grid->PatientName->viewAttributes() ?>>
<?= $Grid->PatientName->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_PatientName" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_PatientName" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_PatientName" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_PatientName" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Age->Visible) { // Age ?>
        <td data-name="Age" <?= $Grid->Age->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Age" class="form-group">
<input type="<?= $Grid->Age->getInputTextType() ?>" data-table="patient_services" data-field="x_Age" name="x<?= $Grid->RowIndex ?>_Age" id="x<?= $Grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Age->getPlaceHolder()) ?>" value="<?= $Grid->Age->EditValue ?>"<?= $Grid->Age->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Age->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Age" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Age" id="o<?= $Grid->RowIndex ?>_Age" value="<?= HtmlEncode($Grid->Age->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Age" class="form-group">
<input type="<?= $Grid->Age->getInputTextType() ?>" data-table="patient_services" data-field="x_Age" name="x<?= $Grid->RowIndex ?>_Age" id="x<?= $Grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Age->getPlaceHolder()) ?>" value="<?= $Grid->Age->EditValue ?>"<?= $Grid->Age->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Age->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Age">
<span<?= $Grid->Age->viewAttributes() ?>>
<?= $Grid->Age->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Age" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Age" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Age" value="<?= HtmlEncode($Grid->Age->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Age" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Age" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Age" value="<?= HtmlEncode($Grid->Age->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Gender->Visible) { // Gender ?>
        <td data-name="Gender" <?= $Grid->Gender->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Gender" class="form-group">
<input type="<?= $Grid->Gender->getInputTextType() ?>" data-table="patient_services" data-field="x_Gender" name="x<?= $Grid->RowIndex ?>_Gender" id="x<?= $Grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Gender->getPlaceHolder()) ?>" value="<?= $Grid->Gender->EditValue ?>"<?= $Grid->Gender->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Gender->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Gender" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Gender" id="o<?= $Grid->RowIndex ?>_Gender" value="<?= HtmlEncode($Grid->Gender->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Gender" class="form-group">
<input type="<?= $Grid->Gender->getInputTextType() ?>" data-table="patient_services" data-field="x_Gender" name="x<?= $Grid->RowIndex ?>_Gender" id="x<?= $Grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Gender->getPlaceHolder()) ?>" value="<?= $Grid->Gender->EditValue ?>"<?= $Grid->Gender->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Gender->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Gender">
<span<?= $Grid->Gender->viewAttributes() ?>>
<?= $Grid->Gender->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Gender" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Gender" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Gender" value="<?= HtmlEncode($Grid->Gender->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Gender" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Gender" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Gender" value="<?= HtmlEncode($Grid->Gender->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Unit->Visible) { // Unit ?>
        <td data-name="Unit" <?= $Grid->Unit->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Unit" class="form-group">
<input type="<?= $Grid->Unit->getInputTextType() ?>" data-table="patient_services" data-field="x_Unit" name="x<?= $Grid->RowIndex ?>_Unit" id="x<?= $Grid->RowIndex ?>_Unit" size="30" placeholder="<?= HtmlEncode($Grid->Unit->getPlaceHolder()) ?>" value="<?= $Grid->Unit->EditValue ?>"<?= $Grid->Unit->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Unit->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Unit" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Unit" id="o<?= $Grid->RowIndex ?>_Unit" value="<?= HtmlEncode($Grid->Unit->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Unit" class="form-group">
<input type="<?= $Grid->Unit->getInputTextType() ?>" data-table="patient_services" data-field="x_Unit" name="x<?= $Grid->RowIndex ?>_Unit" id="x<?= $Grid->RowIndex ?>_Unit" size="30" placeholder="<?= HtmlEncode($Grid->Unit->getPlaceHolder()) ?>" value="<?= $Grid->Unit->EditValue ?>"<?= $Grid->Unit->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Unit->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Unit">
<span<?= $Grid->Unit->viewAttributes() ?>>
<?= $Grid->Unit->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Unit" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Unit" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Unit" value="<?= HtmlEncode($Grid->Unit->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Unit" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Unit" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Unit" value="<?= HtmlEncode($Grid->Unit->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Quantity->Visible) { // Quantity ?>
        <td data-name="Quantity" <?= $Grid->Quantity->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Quantity" class="form-group">
<input type="<?= $Grid->Quantity->getInputTextType() ?>" data-table="patient_services" data-field="x_Quantity" name="x<?= $Grid->RowIndex ?>_Quantity" id="x<?= $Grid->RowIndex ?>_Quantity" size="2" maxlength="4" placeholder="<?= HtmlEncode($Grid->Quantity->getPlaceHolder()) ?>" value="<?= $Grid->Quantity->EditValue ?>"<?= $Grid->Quantity->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Quantity->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Quantity" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Quantity" id="o<?= $Grid->RowIndex ?>_Quantity" value="<?= HtmlEncode($Grid->Quantity->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Quantity" class="form-group">
<input type="<?= $Grid->Quantity->getInputTextType() ?>" data-table="patient_services" data-field="x_Quantity" name="x<?= $Grid->RowIndex ?>_Quantity" id="x<?= $Grid->RowIndex ?>_Quantity" size="2" maxlength="4" placeholder="<?= HtmlEncode($Grid->Quantity->getPlaceHolder()) ?>" value="<?= $Grid->Quantity->EditValue ?>"<?= $Grid->Quantity->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Quantity->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Quantity">
<span<?= $Grid->Quantity->viewAttributes() ?>>
<?= $Grid->Quantity->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Quantity" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Quantity" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Quantity" value="<?= HtmlEncode($Grid->Quantity->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Quantity" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Quantity" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Quantity" value="<?= HtmlEncode($Grid->Quantity->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Discount->Visible) { // Discount ?>
        <td data-name="Discount" <?= $Grid->Discount->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Discount" class="form-group">
<input type="<?= $Grid->Discount->getInputTextType() ?>" data-table="patient_services" data-field="x_Discount" name="x<?= $Grid->RowIndex ?>_Discount" id="x<?= $Grid->RowIndex ?>_Discount" size="4" maxlength="8" placeholder="<?= HtmlEncode($Grid->Discount->getPlaceHolder()) ?>" value="<?= $Grid->Discount->EditValue ?>"<?= $Grid->Discount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Discount->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Discount" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Discount" id="o<?= $Grid->RowIndex ?>_Discount" value="<?= HtmlEncode($Grid->Discount->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Discount" class="form-group">
<input type="<?= $Grid->Discount->getInputTextType() ?>" data-table="patient_services" data-field="x_Discount" name="x<?= $Grid->RowIndex ?>_Discount" id="x<?= $Grid->RowIndex ?>_Discount" size="4" maxlength="8" placeholder="<?= HtmlEncode($Grid->Discount->getPlaceHolder()) ?>" value="<?= $Grid->Discount->EditValue ?>"<?= $Grid->Discount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Discount->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Discount">
<span<?= $Grid->Discount->viewAttributes() ?>>
<?= $Grid->Discount->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Discount" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Discount" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Discount" value="<?= HtmlEncode($Grid->Discount->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Discount" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Discount" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Discount" value="<?= HtmlEncode($Grid->Discount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->SubTotal->Visible) { // SubTotal ?>
        <td data-name="SubTotal" <?= $Grid->SubTotal->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_SubTotal" class="form-group">
<input type="<?= $Grid->SubTotal->getInputTextType() ?>" data-table="patient_services" data-field="x_SubTotal" name="x<?= $Grid->RowIndex ?>_SubTotal" id="x<?= $Grid->RowIndex ?>_SubTotal" size="8" maxlength="13" placeholder="<?= HtmlEncode($Grid->SubTotal->getPlaceHolder()) ?>" value="<?= $Grid->SubTotal->EditValue ?>"<?= $Grid->SubTotal->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SubTotal->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_SubTotal" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SubTotal" id="o<?= $Grid->RowIndex ?>_SubTotal" value="<?= HtmlEncode($Grid->SubTotal->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_SubTotal" class="form-group">
<input type="<?= $Grid->SubTotal->getInputTextType() ?>" data-table="patient_services" data-field="x_SubTotal" name="x<?= $Grid->RowIndex ?>_SubTotal" id="x<?= $Grid->RowIndex ?>_SubTotal" size="8" maxlength="13" placeholder="<?= HtmlEncode($Grid->SubTotal->getPlaceHolder()) ?>" value="<?= $Grid->SubTotal->EditValue ?>"<?= $Grid->SubTotal->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SubTotal->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_SubTotal">
<span<?= $Grid->SubTotal->viewAttributes() ?>>
<?= $Grid->SubTotal->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_SubTotal" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_SubTotal" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_SubTotal" value="<?= HtmlEncode($Grid->SubTotal->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_SubTotal" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_SubTotal" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_SubTotal" value="<?= HtmlEncode($Grid->SubTotal->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ServiceSelect->Visible) { // ServiceSelect ?>
        <td data-name="ServiceSelect" <?= $Grid->ServiceSelect->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_ServiceSelect" class="form-group">
<template id="tp_x<?= $Grid->RowIndex ?>_ServiceSelect">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="patient_services" data-field="x_ServiceSelect" name="x<?= $Grid->RowIndex ?>_ServiceSelect" id="x<?= $Grid->RowIndex ?>_ServiceSelect"<?= $Grid->ServiceSelect->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_ServiceSelect" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_ServiceSelect[]"
    name="x<?= $Grid->RowIndex ?>_ServiceSelect[]"
    value="<?= HtmlEncode($Grid->ServiceSelect->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Grid->RowIndex ?>_ServiceSelect"
    data-target="dsl_x<?= $Grid->RowIndex ?>_ServiceSelect"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->ServiceSelect->isInvalidClass() ?>"
    data-table="patient_services"
    data-field="x_ServiceSelect"
    data-value-separator="<?= $Grid->ServiceSelect->displayValueSeparatorAttribute() ?>"
    <?= $Grid->ServiceSelect->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ServiceSelect->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_ServiceSelect" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ServiceSelect[]" id="o<?= $Grid->RowIndex ?>_ServiceSelect[]" value="<?= HtmlEncode($Grid->ServiceSelect->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_ServiceSelect" class="form-group">
<template id="tp_x<?= $Grid->RowIndex ?>_ServiceSelect">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="patient_services" data-field="x_ServiceSelect" name="x<?= $Grid->RowIndex ?>_ServiceSelect" id="x<?= $Grid->RowIndex ?>_ServiceSelect"<?= $Grid->ServiceSelect->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_ServiceSelect" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_ServiceSelect[]"
    name="x<?= $Grid->RowIndex ?>_ServiceSelect[]"
    value="<?= HtmlEncode($Grid->ServiceSelect->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Grid->RowIndex ?>_ServiceSelect"
    data-target="dsl_x<?= $Grid->RowIndex ?>_ServiceSelect"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->ServiceSelect->isInvalidClass() ?>"
    data-table="patient_services"
    data-field="x_ServiceSelect"
    data-value-separator="<?= $Grid->ServiceSelect->displayValueSeparatorAttribute() ?>"
    <?= $Grid->ServiceSelect->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ServiceSelect->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_ServiceSelect">
<span<?= $Grid->ServiceSelect->viewAttributes() ?>>
<?= $Grid->ServiceSelect->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_ServiceSelect" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_ServiceSelect" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_ServiceSelect" value="<?= HtmlEncode($Grid->ServiceSelect->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_ServiceSelect" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_ServiceSelect[]" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_ServiceSelect[]" value="<?= HtmlEncode($Grid->ServiceSelect->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Aid->Visible) { // Aid ?>
        <td data-name="Aid" <?= $Grid->Aid->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Aid" class="form-group">
<input type="<?= $Grid->Aid->getInputTextType() ?>" data-table="patient_services" data-field="x_Aid" name="x<?= $Grid->RowIndex ?>_Aid" id="x<?= $Grid->RowIndex ?>_Aid" size="30" placeholder="<?= HtmlEncode($Grid->Aid->getPlaceHolder()) ?>" value="<?= $Grid->Aid->EditValue ?>"<?= $Grid->Aid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Aid->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Aid" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Aid" id="o<?= $Grid->RowIndex ?>_Aid" value="<?= HtmlEncode($Grid->Aid->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Aid" class="form-group">
<input type="<?= $Grid->Aid->getInputTextType() ?>" data-table="patient_services" data-field="x_Aid" name="x<?= $Grid->RowIndex ?>_Aid" id="x<?= $Grid->RowIndex ?>_Aid" size="30" placeholder="<?= HtmlEncode($Grid->Aid->getPlaceHolder()) ?>" value="<?= $Grid->Aid->EditValue ?>"<?= $Grid->Aid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Aid->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Aid">
<span<?= $Grid->Aid->viewAttributes() ?>>
<?= $Grid->Aid->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Aid" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Aid" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Aid" value="<?= HtmlEncode($Grid->Aid->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Aid" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Aid" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Aid" value="<?= HtmlEncode($Grid->Aid->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Vid->Visible) { // Vid ?>
        <td data-name="Vid" <?= $Grid->Vid->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->Vid->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Vid" class="form-group">
<span<?= $Grid->Vid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Vid->getDisplayValue($Grid->Vid->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_Vid" name="x<?= $Grid->RowIndex ?>_Vid" value="<?= HtmlEncode($Grid->Vid->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Vid" class="form-group">
<input type="<?= $Grid->Vid->getInputTextType() ?>" data-table="patient_services" data-field="x_Vid" name="x<?= $Grid->RowIndex ?>_Vid" id="x<?= $Grid->RowIndex ?>_Vid" size="30" placeholder="<?= HtmlEncode($Grid->Vid->getPlaceHolder()) ?>" value="<?= $Grid->Vid->EditValue ?>"<?= $Grid->Vid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Vid->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Vid" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Vid" id="o<?= $Grid->RowIndex ?>_Vid" value="<?= HtmlEncode($Grid->Vid->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Grid->Vid->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Vid" class="form-group">
<span<?= $Grid->Vid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Vid->getDisplayValue($Grid->Vid->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_Vid" name="x<?= $Grid->RowIndex ?>_Vid" value="<?= HtmlEncode($Grid->Vid->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Vid" class="form-group">
<input type="<?= $Grid->Vid->getInputTextType() ?>" data-table="patient_services" data-field="x_Vid" name="x<?= $Grid->RowIndex ?>_Vid" id="x<?= $Grid->RowIndex ?>_Vid" size="30" placeholder="<?= HtmlEncode($Grid->Vid->getPlaceHolder()) ?>" value="<?= $Grid->Vid->EditValue ?>"<?= $Grid->Vid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Vid->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Vid">
<span<?= $Grid->Vid->viewAttributes() ?>>
<?= $Grid->Vid->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Vid" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Vid" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Vid" value="<?= HtmlEncode($Grid->Vid->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Vid" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Vid" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Vid" value="<?= HtmlEncode($Grid->Vid->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->DrID->Visible) { // DrID ?>
        <td data-name="DrID" <?= $Grid->DrID->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_DrID" class="form-group">
<input type="<?= $Grid->DrID->getInputTextType() ?>" data-table="patient_services" data-field="x_DrID" name="x<?= $Grid->RowIndex ?>_DrID" id="x<?= $Grid->RowIndex ?>_DrID" size="30" placeholder="<?= HtmlEncode($Grid->DrID->getPlaceHolder()) ?>" value="<?= $Grid->DrID->EditValue ?>"<?= $Grid->DrID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DrID->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DrID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DrID" id="o<?= $Grid->RowIndex ?>_DrID" value="<?= HtmlEncode($Grid->DrID->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_DrID" class="form-group">
<input type="<?= $Grid->DrID->getInputTextType() ?>" data-table="patient_services" data-field="x_DrID" name="x<?= $Grid->RowIndex ?>_DrID" id="x<?= $Grid->RowIndex ?>_DrID" size="30" placeholder="<?= HtmlEncode($Grid->DrID->getPlaceHolder()) ?>" value="<?= $Grid->DrID->EditValue ?>"<?= $Grid->DrID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DrID->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_DrID">
<span<?= $Grid->DrID->viewAttributes() ?>>
<?= $Grid->DrID->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_DrID" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_DrID" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_DrID" value="<?= HtmlEncode($Grid->DrID->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DrID" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_DrID" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_DrID" value="<?= HtmlEncode($Grid->DrID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->DrCODE->Visible) { // DrCODE ?>
        <td data-name="DrCODE" <?= $Grid->DrCODE->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_DrCODE" class="form-group">
<input type="<?= $Grid->DrCODE->getInputTextType() ?>" data-table="patient_services" data-field="x_DrCODE" name="x<?= $Grid->RowIndex ?>_DrCODE" id="x<?= $Grid->RowIndex ?>_DrCODE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DrCODE->getPlaceHolder()) ?>" value="<?= $Grid->DrCODE->EditValue ?>"<?= $Grid->DrCODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DrCODE->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DrCODE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DrCODE" id="o<?= $Grid->RowIndex ?>_DrCODE" value="<?= HtmlEncode($Grid->DrCODE->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_DrCODE" class="form-group">
<input type="<?= $Grid->DrCODE->getInputTextType() ?>" data-table="patient_services" data-field="x_DrCODE" name="x<?= $Grid->RowIndex ?>_DrCODE" id="x<?= $Grid->RowIndex ?>_DrCODE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DrCODE->getPlaceHolder()) ?>" value="<?= $Grid->DrCODE->EditValue ?>"<?= $Grid->DrCODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DrCODE->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_DrCODE">
<span<?= $Grid->DrCODE->viewAttributes() ?>>
<?= $Grid->DrCODE->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_DrCODE" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_DrCODE" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_DrCODE" value="<?= HtmlEncode($Grid->DrCODE->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DrCODE" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_DrCODE" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_DrCODE" value="<?= HtmlEncode($Grid->DrCODE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->DrName->Visible) { // DrName ?>
        <td data-name="DrName" <?= $Grid->DrName->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_DrName" class="form-group">
<input type="<?= $Grid->DrName->getInputTextType() ?>" data-table="patient_services" data-field="x_DrName" name="x<?= $Grid->RowIndex ?>_DrName" id="x<?= $Grid->RowIndex ?>_DrName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DrName->getPlaceHolder()) ?>" value="<?= $Grid->DrName->EditValue ?>"<?= $Grid->DrName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DrName->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DrName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DrName" id="o<?= $Grid->RowIndex ?>_DrName" value="<?= HtmlEncode($Grid->DrName->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_DrName" class="form-group">
<input type="<?= $Grid->DrName->getInputTextType() ?>" data-table="patient_services" data-field="x_DrName" name="x<?= $Grid->RowIndex ?>_DrName" id="x<?= $Grid->RowIndex ?>_DrName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DrName->getPlaceHolder()) ?>" value="<?= $Grid->DrName->EditValue ?>"<?= $Grid->DrName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DrName->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_DrName">
<span<?= $Grid->DrName->viewAttributes() ?>>
<?= $Grid->DrName->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_DrName" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_DrName" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_DrName" value="<?= HtmlEncode($Grid->DrName->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DrName" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_DrName" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_DrName" value="<?= HtmlEncode($Grid->DrName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Department->Visible) { // Department ?>
        <td data-name="Department" <?= $Grid->Department->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Department" class="form-group">
<input type="<?= $Grid->Department->getInputTextType() ?>" data-table="patient_services" data-field="x_Department" name="x<?= $Grid->RowIndex ?>_Department" id="x<?= $Grid->RowIndex ?>_Department" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Department->getPlaceHolder()) ?>" value="<?= $Grid->Department->EditValue ?>"<?= $Grid->Department->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Department->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Department" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Department" id="o<?= $Grid->RowIndex ?>_Department" value="<?= HtmlEncode($Grid->Department->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Department" class="form-group">
<input type="<?= $Grid->Department->getInputTextType() ?>" data-table="patient_services" data-field="x_Department" name="x<?= $Grid->RowIndex ?>_Department" id="x<?= $Grid->RowIndex ?>_Department" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Department->getPlaceHolder()) ?>" value="<?= $Grid->Department->EditValue ?>"<?= $Grid->Department->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Department->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Department">
<span<?= $Grid->Department->viewAttributes() ?>>
<?= $Grid->Department->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Department" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Department" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Department" value="<?= HtmlEncode($Grid->Department->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Department" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Department" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Department" value="<?= HtmlEncode($Grid->Department->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->DrSharePres->Visible) { // DrSharePres ?>
        <td data-name="DrSharePres" <?= $Grid->DrSharePres->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_DrSharePres" class="form-group">
<input type="<?= $Grid->DrSharePres->getInputTextType() ?>" data-table="patient_services" data-field="x_DrSharePres" name="x<?= $Grid->RowIndex ?>_DrSharePres" id="x<?= $Grid->RowIndex ?>_DrSharePres" size="30" placeholder="<?= HtmlEncode($Grid->DrSharePres->getPlaceHolder()) ?>" value="<?= $Grid->DrSharePres->EditValue ?>"<?= $Grid->DrSharePres->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DrSharePres->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DrSharePres" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DrSharePres" id="o<?= $Grid->RowIndex ?>_DrSharePres" value="<?= HtmlEncode($Grid->DrSharePres->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_DrSharePres" class="form-group">
<input type="<?= $Grid->DrSharePres->getInputTextType() ?>" data-table="patient_services" data-field="x_DrSharePres" name="x<?= $Grid->RowIndex ?>_DrSharePres" id="x<?= $Grid->RowIndex ?>_DrSharePres" size="30" placeholder="<?= HtmlEncode($Grid->DrSharePres->getPlaceHolder()) ?>" value="<?= $Grid->DrSharePres->EditValue ?>"<?= $Grid->DrSharePres->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DrSharePres->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_DrSharePres">
<span<?= $Grid->DrSharePres->viewAttributes() ?>>
<?= $Grid->DrSharePres->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_DrSharePres" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_DrSharePres" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_DrSharePres" value="<?= HtmlEncode($Grid->DrSharePres->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DrSharePres" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_DrSharePres" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_DrSharePres" value="<?= HtmlEncode($Grid->DrSharePres->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->HospSharePres->Visible) { // HospSharePres ?>
        <td data-name="HospSharePres" <?= $Grid->HospSharePres->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_HospSharePres" class="form-group">
<input type="<?= $Grid->HospSharePres->getInputTextType() ?>" data-table="patient_services" data-field="x_HospSharePres" name="x<?= $Grid->RowIndex ?>_HospSharePres" id="x<?= $Grid->RowIndex ?>_HospSharePres" size="30" placeholder="<?= HtmlEncode($Grid->HospSharePres->getPlaceHolder()) ?>" value="<?= $Grid->HospSharePres->EditValue ?>"<?= $Grid->HospSharePres->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->HospSharePres->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_HospSharePres" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HospSharePres" id="o<?= $Grid->RowIndex ?>_HospSharePres" value="<?= HtmlEncode($Grid->HospSharePres->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_HospSharePres" class="form-group">
<input type="<?= $Grid->HospSharePres->getInputTextType() ?>" data-table="patient_services" data-field="x_HospSharePres" name="x<?= $Grid->RowIndex ?>_HospSharePres" id="x<?= $Grid->RowIndex ?>_HospSharePres" size="30" placeholder="<?= HtmlEncode($Grid->HospSharePres->getPlaceHolder()) ?>" value="<?= $Grid->HospSharePres->EditValue ?>"<?= $Grid->HospSharePres->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->HospSharePres->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_HospSharePres">
<span<?= $Grid->HospSharePres->viewAttributes() ?>>
<?= $Grid->HospSharePres->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_HospSharePres" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_HospSharePres" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_HospSharePres" value="<?= HtmlEncode($Grid->HospSharePres->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_HospSharePres" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_HospSharePres" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_HospSharePres" value="<?= HtmlEncode($Grid->HospSharePres->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->DrShareAmount->Visible) { // DrShareAmount ?>
        <td data-name="DrShareAmount" <?= $Grid->DrShareAmount->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_DrShareAmount" class="form-group">
<input type="<?= $Grid->DrShareAmount->getInputTextType() ?>" data-table="patient_services" data-field="x_DrShareAmount" name="x<?= $Grid->RowIndex ?>_DrShareAmount" id="x<?= $Grid->RowIndex ?>_DrShareAmount" size="30" placeholder="<?= HtmlEncode($Grid->DrShareAmount->getPlaceHolder()) ?>" value="<?= $Grid->DrShareAmount->EditValue ?>"<?= $Grid->DrShareAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DrShareAmount->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DrShareAmount" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DrShareAmount" id="o<?= $Grid->RowIndex ?>_DrShareAmount" value="<?= HtmlEncode($Grid->DrShareAmount->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_DrShareAmount" class="form-group">
<input type="<?= $Grid->DrShareAmount->getInputTextType() ?>" data-table="patient_services" data-field="x_DrShareAmount" name="x<?= $Grid->RowIndex ?>_DrShareAmount" id="x<?= $Grid->RowIndex ?>_DrShareAmount" size="30" placeholder="<?= HtmlEncode($Grid->DrShareAmount->getPlaceHolder()) ?>" value="<?= $Grid->DrShareAmount->EditValue ?>"<?= $Grid->DrShareAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DrShareAmount->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_DrShareAmount">
<span<?= $Grid->DrShareAmount->viewAttributes() ?>>
<?= $Grid->DrShareAmount->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_DrShareAmount" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_DrShareAmount" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_DrShareAmount" value="<?= HtmlEncode($Grid->DrShareAmount->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DrShareAmount" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_DrShareAmount" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_DrShareAmount" value="<?= HtmlEncode($Grid->DrShareAmount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->HospShareAmount->Visible) { // HospShareAmount ?>
        <td data-name="HospShareAmount" <?= $Grid->HospShareAmount->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_HospShareAmount" class="form-group">
<input type="<?= $Grid->HospShareAmount->getInputTextType() ?>" data-table="patient_services" data-field="x_HospShareAmount" name="x<?= $Grid->RowIndex ?>_HospShareAmount" id="x<?= $Grid->RowIndex ?>_HospShareAmount" size="30" placeholder="<?= HtmlEncode($Grid->HospShareAmount->getPlaceHolder()) ?>" value="<?= $Grid->HospShareAmount->EditValue ?>"<?= $Grid->HospShareAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->HospShareAmount->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_HospShareAmount" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HospShareAmount" id="o<?= $Grid->RowIndex ?>_HospShareAmount" value="<?= HtmlEncode($Grid->HospShareAmount->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_HospShareAmount" class="form-group">
<input type="<?= $Grid->HospShareAmount->getInputTextType() ?>" data-table="patient_services" data-field="x_HospShareAmount" name="x<?= $Grid->RowIndex ?>_HospShareAmount" id="x<?= $Grid->RowIndex ?>_HospShareAmount" size="30" placeholder="<?= HtmlEncode($Grid->HospShareAmount->getPlaceHolder()) ?>" value="<?= $Grid->HospShareAmount->EditValue ?>"<?= $Grid->HospShareAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->HospShareAmount->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_HospShareAmount">
<span<?= $Grid->HospShareAmount->viewAttributes() ?>>
<?= $Grid->HospShareAmount->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_HospShareAmount" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_HospShareAmount" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_HospShareAmount" value="<?= HtmlEncode($Grid->HospShareAmount->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_HospShareAmount" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_HospShareAmount" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_HospShareAmount" value="<?= HtmlEncode($Grid->HospShareAmount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
        <td data-name="DrShareSettiledAmount" <?= $Grid->DrShareSettiledAmount->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_DrShareSettiledAmount" class="form-group">
<input type="<?= $Grid->DrShareSettiledAmount->getInputTextType() ?>" data-table="patient_services" data-field="x_DrShareSettiledAmount" name="x<?= $Grid->RowIndex ?>_DrShareSettiledAmount" id="x<?= $Grid->RowIndex ?>_DrShareSettiledAmount" size="30" placeholder="<?= HtmlEncode($Grid->DrShareSettiledAmount->getPlaceHolder()) ?>" value="<?= $Grid->DrShareSettiledAmount->EditValue ?>"<?= $Grid->DrShareSettiledAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DrShareSettiledAmount->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettiledAmount" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DrShareSettiledAmount" id="o<?= $Grid->RowIndex ?>_DrShareSettiledAmount" value="<?= HtmlEncode($Grid->DrShareSettiledAmount->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_DrShareSettiledAmount" class="form-group">
<input type="<?= $Grid->DrShareSettiledAmount->getInputTextType() ?>" data-table="patient_services" data-field="x_DrShareSettiledAmount" name="x<?= $Grid->RowIndex ?>_DrShareSettiledAmount" id="x<?= $Grid->RowIndex ?>_DrShareSettiledAmount" size="30" placeholder="<?= HtmlEncode($Grid->DrShareSettiledAmount->getPlaceHolder()) ?>" value="<?= $Grid->DrShareSettiledAmount->EditValue ?>"<?= $Grid->DrShareSettiledAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DrShareSettiledAmount->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_DrShareSettiledAmount">
<span<?= $Grid->DrShareSettiledAmount->viewAttributes() ?>>
<?= $Grid->DrShareSettiledAmount->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettiledAmount" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_DrShareSettiledAmount" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_DrShareSettiledAmount" value="<?= HtmlEncode($Grid->DrShareSettiledAmount->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettiledAmount" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_DrShareSettiledAmount" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_DrShareSettiledAmount" value="<?= HtmlEncode($Grid->DrShareSettiledAmount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->DrShareSettledId->Visible) { // DrShareSettledId ?>
        <td data-name="DrShareSettledId" <?= $Grid->DrShareSettledId->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_DrShareSettledId" class="form-group">
<input type="<?= $Grid->DrShareSettledId->getInputTextType() ?>" data-table="patient_services" data-field="x_DrShareSettledId" name="x<?= $Grid->RowIndex ?>_DrShareSettledId" id="x<?= $Grid->RowIndex ?>_DrShareSettledId" size="30" placeholder="<?= HtmlEncode($Grid->DrShareSettledId->getPlaceHolder()) ?>" value="<?= $Grid->DrShareSettledId->EditValue ?>"<?= $Grid->DrShareSettledId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DrShareSettledId->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettledId" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DrShareSettledId" id="o<?= $Grid->RowIndex ?>_DrShareSettledId" value="<?= HtmlEncode($Grid->DrShareSettledId->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_DrShareSettledId" class="form-group">
<input type="<?= $Grid->DrShareSettledId->getInputTextType() ?>" data-table="patient_services" data-field="x_DrShareSettledId" name="x<?= $Grid->RowIndex ?>_DrShareSettledId" id="x<?= $Grid->RowIndex ?>_DrShareSettledId" size="30" placeholder="<?= HtmlEncode($Grid->DrShareSettledId->getPlaceHolder()) ?>" value="<?= $Grid->DrShareSettledId->EditValue ?>"<?= $Grid->DrShareSettledId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DrShareSettledId->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_DrShareSettledId">
<span<?= $Grid->DrShareSettledId->viewAttributes() ?>>
<?= $Grid->DrShareSettledId->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettledId" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_DrShareSettledId" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_DrShareSettledId" value="<?= HtmlEncode($Grid->DrShareSettledId->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettledId" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_DrShareSettledId" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_DrShareSettledId" value="<?= HtmlEncode($Grid->DrShareSettledId->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
        <td data-name="DrShareSettiledStatus" <?= $Grid->DrShareSettiledStatus->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_DrShareSettiledStatus" class="form-group">
<input type="<?= $Grid->DrShareSettiledStatus->getInputTextType() ?>" data-table="patient_services" data-field="x_DrShareSettiledStatus" name="x<?= $Grid->RowIndex ?>_DrShareSettiledStatus" id="x<?= $Grid->RowIndex ?>_DrShareSettiledStatus" size="30" placeholder="<?= HtmlEncode($Grid->DrShareSettiledStatus->getPlaceHolder()) ?>" value="<?= $Grid->DrShareSettiledStatus->EditValue ?>"<?= $Grid->DrShareSettiledStatus->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DrShareSettiledStatus->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettiledStatus" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DrShareSettiledStatus" id="o<?= $Grid->RowIndex ?>_DrShareSettiledStatus" value="<?= HtmlEncode($Grid->DrShareSettiledStatus->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_DrShareSettiledStatus" class="form-group">
<input type="<?= $Grid->DrShareSettiledStatus->getInputTextType() ?>" data-table="patient_services" data-field="x_DrShareSettiledStatus" name="x<?= $Grid->RowIndex ?>_DrShareSettiledStatus" id="x<?= $Grid->RowIndex ?>_DrShareSettiledStatus" size="30" placeholder="<?= HtmlEncode($Grid->DrShareSettiledStatus->getPlaceHolder()) ?>" value="<?= $Grid->DrShareSettiledStatus->EditValue ?>"<?= $Grid->DrShareSettiledStatus->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DrShareSettiledStatus->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_DrShareSettiledStatus">
<span<?= $Grid->DrShareSettiledStatus->viewAttributes() ?>>
<?= $Grid->DrShareSettiledStatus->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettiledStatus" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_DrShareSettiledStatus" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_DrShareSettiledStatus" value="<?= HtmlEncode($Grid->DrShareSettiledStatus->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettiledStatus" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_DrShareSettiledStatus" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_DrShareSettiledStatus" value="<?= HtmlEncode($Grid->DrShareSettiledStatus->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->invoiceId->Visible) { // invoiceId ?>
        <td data-name="invoiceId" <?= $Grid->invoiceId->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_invoiceId" class="form-group">
<input type="<?= $Grid->invoiceId->getInputTextType() ?>" data-table="patient_services" data-field="x_invoiceId" name="x<?= $Grid->RowIndex ?>_invoiceId" id="x<?= $Grid->RowIndex ?>_invoiceId" size="30" placeholder="<?= HtmlEncode($Grid->invoiceId->getPlaceHolder()) ?>" value="<?= $Grid->invoiceId->EditValue ?>"<?= $Grid->invoiceId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->invoiceId->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_invoiceId" data-hidden="1" name="o<?= $Grid->RowIndex ?>_invoiceId" id="o<?= $Grid->RowIndex ?>_invoiceId" value="<?= HtmlEncode($Grid->invoiceId->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_invoiceId" class="form-group">
<input type="<?= $Grid->invoiceId->getInputTextType() ?>" data-table="patient_services" data-field="x_invoiceId" name="x<?= $Grid->RowIndex ?>_invoiceId" id="x<?= $Grid->RowIndex ?>_invoiceId" size="30" placeholder="<?= HtmlEncode($Grid->invoiceId->getPlaceHolder()) ?>" value="<?= $Grid->invoiceId->EditValue ?>"<?= $Grid->invoiceId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->invoiceId->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_invoiceId">
<span<?= $Grid->invoiceId->viewAttributes() ?>>
<?= $Grid->invoiceId->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_invoiceId" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_invoiceId" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_invoiceId" value="<?= HtmlEncode($Grid->invoiceId->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_invoiceId" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_invoiceId" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_invoiceId" value="<?= HtmlEncode($Grid->invoiceId->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->invoiceAmount->Visible) { // invoiceAmount ?>
        <td data-name="invoiceAmount" <?= $Grid->invoiceAmount->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_invoiceAmount" class="form-group">
<input type="<?= $Grid->invoiceAmount->getInputTextType() ?>" data-table="patient_services" data-field="x_invoiceAmount" name="x<?= $Grid->RowIndex ?>_invoiceAmount" id="x<?= $Grid->RowIndex ?>_invoiceAmount" size="30" placeholder="<?= HtmlEncode($Grid->invoiceAmount->getPlaceHolder()) ?>" value="<?= $Grid->invoiceAmount->EditValue ?>"<?= $Grid->invoiceAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->invoiceAmount->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_invoiceAmount" data-hidden="1" name="o<?= $Grid->RowIndex ?>_invoiceAmount" id="o<?= $Grid->RowIndex ?>_invoiceAmount" value="<?= HtmlEncode($Grid->invoiceAmount->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_invoiceAmount" class="form-group">
<input type="<?= $Grid->invoiceAmount->getInputTextType() ?>" data-table="patient_services" data-field="x_invoiceAmount" name="x<?= $Grid->RowIndex ?>_invoiceAmount" id="x<?= $Grid->RowIndex ?>_invoiceAmount" size="30" placeholder="<?= HtmlEncode($Grid->invoiceAmount->getPlaceHolder()) ?>" value="<?= $Grid->invoiceAmount->EditValue ?>"<?= $Grid->invoiceAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->invoiceAmount->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_invoiceAmount">
<span<?= $Grid->invoiceAmount->viewAttributes() ?>>
<?= $Grid->invoiceAmount->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_invoiceAmount" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_invoiceAmount" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_invoiceAmount" value="<?= HtmlEncode($Grid->invoiceAmount->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_invoiceAmount" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_invoiceAmount" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_invoiceAmount" value="<?= HtmlEncode($Grid->invoiceAmount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->invoiceStatus->Visible) { // invoiceStatus ?>
        <td data-name="invoiceStatus" <?= $Grid->invoiceStatus->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_invoiceStatus" class="form-group">
<input type="<?= $Grid->invoiceStatus->getInputTextType() ?>" data-table="patient_services" data-field="x_invoiceStatus" name="x<?= $Grid->RowIndex ?>_invoiceStatus" id="x<?= $Grid->RowIndex ?>_invoiceStatus" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->invoiceStatus->getPlaceHolder()) ?>" value="<?= $Grid->invoiceStatus->EditValue ?>"<?= $Grid->invoiceStatus->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->invoiceStatus->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_invoiceStatus" data-hidden="1" name="o<?= $Grid->RowIndex ?>_invoiceStatus" id="o<?= $Grid->RowIndex ?>_invoiceStatus" value="<?= HtmlEncode($Grid->invoiceStatus->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_invoiceStatus" class="form-group">
<input type="<?= $Grid->invoiceStatus->getInputTextType() ?>" data-table="patient_services" data-field="x_invoiceStatus" name="x<?= $Grid->RowIndex ?>_invoiceStatus" id="x<?= $Grid->RowIndex ?>_invoiceStatus" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->invoiceStatus->getPlaceHolder()) ?>" value="<?= $Grid->invoiceStatus->EditValue ?>"<?= $Grid->invoiceStatus->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->invoiceStatus->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_invoiceStatus">
<span<?= $Grid->invoiceStatus->viewAttributes() ?>>
<?= $Grid->invoiceStatus->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_invoiceStatus" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_invoiceStatus" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_invoiceStatus" value="<?= HtmlEncode($Grid->invoiceStatus->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_invoiceStatus" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_invoiceStatus" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_invoiceStatus" value="<?= HtmlEncode($Grid->invoiceStatus->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->modeOfPayment->Visible) { // modeOfPayment ?>
        <td data-name="modeOfPayment" <?= $Grid->modeOfPayment->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_modeOfPayment" class="form-group">
<input type="<?= $Grid->modeOfPayment->getInputTextType() ?>" data-table="patient_services" data-field="x_modeOfPayment" name="x<?= $Grid->RowIndex ?>_modeOfPayment" id="x<?= $Grid->RowIndex ?>_modeOfPayment" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->modeOfPayment->getPlaceHolder()) ?>" value="<?= $Grid->modeOfPayment->EditValue ?>"<?= $Grid->modeOfPayment->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->modeOfPayment->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_modeOfPayment" data-hidden="1" name="o<?= $Grid->RowIndex ?>_modeOfPayment" id="o<?= $Grid->RowIndex ?>_modeOfPayment" value="<?= HtmlEncode($Grid->modeOfPayment->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_modeOfPayment" class="form-group">
<input type="<?= $Grid->modeOfPayment->getInputTextType() ?>" data-table="patient_services" data-field="x_modeOfPayment" name="x<?= $Grid->RowIndex ?>_modeOfPayment" id="x<?= $Grid->RowIndex ?>_modeOfPayment" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->modeOfPayment->getPlaceHolder()) ?>" value="<?= $Grid->modeOfPayment->EditValue ?>"<?= $Grid->modeOfPayment->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->modeOfPayment->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_modeOfPayment">
<span<?= $Grid->modeOfPayment->viewAttributes() ?>>
<?= $Grid->modeOfPayment->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_modeOfPayment" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_modeOfPayment" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_modeOfPayment" value="<?= HtmlEncode($Grid->modeOfPayment->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_modeOfPayment" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_modeOfPayment" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_modeOfPayment" value="<?= HtmlEncode($Grid->modeOfPayment->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Grid->HospID->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_services" data-field="x_HospID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HospID" id="o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_HospID">
<span<?= $Grid->HospID->viewAttributes() ?>>
<?= $Grid->HospID->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_HospID" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_HospID" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_HospID" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_HospID" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->RIDNO->Visible) { // RIDNO ?>
        <td data-name="RIDNO" <?= $Grid->RIDNO->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_RIDNO" class="form-group">
<input type="<?= $Grid->RIDNO->getInputTextType() ?>" data-table="patient_services" data-field="x_RIDNO" name="x<?= $Grid->RowIndex ?>_RIDNO" id="x<?= $Grid->RowIndex ?>_RIDNO" size="30" placeholder="<?= HtmlEncode($Grid->RIDNO->getPlaceHolder()) ?>" value="<?= $Grid->RIDNO->EditValue ?>"<?= $Grid->RIDNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->RIDNO->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_RIDNO" data-hidden="1" name="o<?= $Grid->RowIndex ?>_RIDNO" id="o<?= $Grid->RowIndex ?>_RIDNO" value="<?= HtmlEncode($Grid->RIDNO->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_RIDNO" class="form-group">
<span<?= $Grid->RIDNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->RIDNO->getDisplayValue($Grid->RIDNO->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_RIDNO" data-hidden="1" name="x<?= $Grid->RowIndex ?>_RIDNO" id="x<?= $Grid->RowIndex ?>_RIDNO" value="<?= HtmlEncode($Grid->RIDNO->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_RIDNO">
<span<?= $Grid->RIDNO->viewAttributes() ?>>
<?= $Grid->RIDNO->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_RIDNO" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_RIDNO" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_RIDNO" value="<?= HtmlEncode($Grid->RIDNO->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_RIDNO" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_RIDNO" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_RIDNO" value="<?= HtmlEncode($Grid->RIDNO->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->TidNo->Visible) { // TidNo ?>
        <td data-name="TidNo" <?= $Grid->TidNo->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_TidNo" class="form-group">
<input type="<?= $Grid->TidNo->getInputTextType() ?>" data-table="patient_services" data-field="x_TidNo" name="x<?= $Grid->RowIndex ?>_TidNo" id="x<?= $Grid->RowIndex ?>_TidNo" size="30" placeholder="<?= HtmlEncode($Grid->TidNo->getPlaceHolder()) ?>" value="<?= $Grid->TidNo->EditValue ?>"<?= $Grid->TidNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TidNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_TidNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TidNo" id="o<?= $Grid->RowIndex ?>_TidNo" value="<?= HtmlEncode($Grid->TidNo->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_TidNo" class="form-group">
<span<?= $Grid->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->TidNo->getDisplayValue($Grid->TidNo->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_TidNo" data-hidden="1" name="x<?= $Grid->RowIndex ?>_TidNo" id="x<?= $Grid->RowIndex ?>_TidNo" value="<?= HtmlEncode($Grid->TidNo->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_TidNo">
<span<?= $Grid->TidNo->viewAttributes() ?>>
<?= $Grid->TidNo->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_TidNo" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_TidNo" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_TidNo" value="<?= HtmlEncode($Grid->TidNo->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_TidNo" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_TidNo" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_TidNo" value="<?= HtmlEncode($Grid->TidNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->DiscountCategory->Visible) { // DiscountCategory ?>
        <td data-name="DiscountCategory" <?= $Grid->DiscountCategory->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_DiscountCategory" class="form-group">
<input type="<?= $Grid->DiscountCategory->getInputTextType() ?>" data-table="patient_services" data-field="x_DiscountCategory" name="x<?= $Grid->RowIndex ?>_DiscountCategory" id="x<?= $Grid->RowIndex ?>_DiscountCategory" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DiscountCategory->getPlaceHolder()) ?>" value="<?= $Grid->DiscountCategory->EditValue ?>"<?= $Grid->DiscountCategory->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DiscountCategory->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DiscountCategory" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DiscountCategory" id="o<?= $Grid->RowIndex ?>_DiscountCategory" value="<?= HtmlEncode($Grid->DiscountCategory->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_DiscountCategory" class="form-group">
<input type="<?= $Grid->DiscountCategory->getInputTextType() ?>" data-table="patient_services" data-field="x_DiscountCategory" name="x<?= $Grid->RowIndex ?>_DiscountCategory" id="x<?= $Grid->RowIndex ?>_DiscountCategory" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DiscountCategory->getPlaceHolder()) ?>" value="<?= $Grid->DiscountCategory->EditValue ?>"<?= $Grid->DiscountCategory->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DiscountCategory->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_DiscountCategory">
<span<?= $Grid->DiscountCategory->viewAttributes() ?>>
<?= $Grid->DiscountCategory->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_DiscountCategory" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_DiscountCategory" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_DiscountCategory" value="<?= HtmlEncode($Grid->DiscountCategory->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DiscountCategory" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_DiscountCategory" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_DiscountCategory" value="<?= HtmlEncode($Grid->DiscountCategory->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->sid->Visible) { // sid ?>
        <td data-name="sid" <?= $Grid->sid->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_sid" class="form-group">
<input type="<?= $Grid->sid->getInputTextType() ?>" data-table="patient_services" data-field="x_sid" name="x<?= $Grid->RowIndex ?>_sid" id="x<?= $Grid->RowIndex ?>_sid" size="8" maxlength="8" placeholder="<?= HtmlEncode($Grid->sid->getPlaceHolder()) ?>" value="<?= $Grid->sid->EditValue ?>"<?= $Grid->sid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->sid->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_sid" data-hidden="1" name="o<?= $Grid->RowIndex ?>_sid" id="o<?= $Grid->RowIndex ?>_sid" value="<?= HtmlEncode($Grid->sid->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_sid" class="form-group">
<input type="<?= $Grid->sid->getInputTextType() ?>" data-table="patient_services" data-field="x_sid" name="x<?= $Grid->RowIndex ?>_sid" id="x<?= $Grid->RowIndex ?>_sid" size="8" maxlength="8" placeholder="<?= HtmlEncode($Grid->sid->getPlaceHolder()) ?>" value="<?= $Grid->sid->EditValue ?>"<?= $Grid->sid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->sid->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_sid">
<span<?= $Grid->sid->viewAttributes() ?>>
<?= $Grid->sid->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_sid" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_sid" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_sid" value="<?= HtmlEncode($Grid->sid->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_sid" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_sid" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_sid" value="<?= HtmlEncode($Grid->sid->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ItemCode->Visible) { // ItemCode ?>
        <td data-name="ItemCode" <?= $Grid->ItemCode->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_ItemCode" class="form-group">
<input type="<?= $Grid->ItemCode->getInputTextType() ?>" data-table="patient_services" data-field="x_ItemCode" name="x<?= $Grid->RowIndex ?>_ItemCode" id="x<?= $Grid->RowIndex ?>_ItemCode" size="8" maxlength="8" placeholder="<?= HtmlEncode($Grid->ItemCode->getPlaceHolder()) ?>" value="<?= $Grid->ItemCode->EditValue ?>"<?= $Grid->ItemCode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ItemCode->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_ItemCode" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ItemCode" id="o<?= $Grid->RowIndex ?>_ItemCode" value="<?= HtmlEncode($Grid->ItemCode->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_ItemCode" class="form-group">
<input type="<?= $Grid->ItemCode->getInputTextType() ?>" data-table="patient_services" data-field="x_ItemCode" name="x<?= $Grid->RowIndex ?>_ItemCode" id="x<?= $Grid->RowIndex ?>_ItemCode" size="8" maxlength="8" placeholder="<?= HtmlEncode($Grid->ItemCode->getPlaceHolder()) ?>" value="<?= $Grid->ItemCode->EditValue ?>"<?= $Grid->ItemCode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ItemCode->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_ItemCode">
<span<?= $Grid->ItemCode->viewAttributes() ?>>
<?= $Grid->ItemCode->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_ItemCode" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_ItemCode" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_ItemCode" value="<?= HtmlEncode($Grid->ItemCode->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_ItemCode" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_ItemCode" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_ItemCode" value="<?= HtmlEncode($Grid->ItemCode->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->TestSubCd->Visible) { // TestSubCd ?>
        <td data-name="TestSubCd" <?= $Grid->TestSubCd->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_TestSubCd" class="form-group">
<input type="<?= $Grid->TestSubCd->getInputTextType() ?>" data-table="patient_services" data-field="x_TestSubCd" name="x<?= $Grid->RowIndex ?>_TestSubCd" id="x<?= $Grid->RowIndex ?>_TestSubCd" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->TestSubCd->getPlaceHolder()) ?>" value="<?= $Grid->TestSubCd->EditValue ?>"<?= $Grid->TestSubCd->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TestSubCd->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_TestSubCd" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TestSubCd" id="o<?= $Grid->RowIndex ?>_TestSubCd" value="<?= HtmlEncode($Grid->TestSubCd->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_TestSubCd" class="form-group">
<input type="<?= $Grid->TestSubCd->getInputTextType() ?>" data-table="patient_services" data-field="x_TestSubCd" name="x<?= $Grid->RowIndex ?>_TestSubCd" id="x<?= $Grid->RowIndex ?>_TestSubCd" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->TestSubCd->getPlaceHolder()) ?>" value="<?= $Grid->TestSubCd->EditValue ?>"<?= $Grid->TestSubCd->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TestSubCd->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_TestSubCd">
<span<?= $Grid->TestSubCd->viewAttributes() ?>>
<?= $Grid->TestSubCd->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_TestSubCd" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_TestSubCd" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_TestSubCd" value="<?= HtmlEncode($Grid->TestSubCd->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_TestSubCd" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_TestSubCd" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_TestSubCd" value="<?= HtmlEncode($Grid->TestSubCd->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->DEptCd->Visible) { // DEptCd ?>
        <td data-name="DEptCd" <?= $Grid->DEptCd->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_DEptCd" class="form-group">
<input type="<?= $Grid->DEptCd->getInputTextType() ?>" data-table="patient_services" data-field="x_DEptCd" name="x<?= $Grid->RowIndex ?>_DEptCd" id="x<?= $Grid->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DEptCd->getPlaceHolder()) ?>" value="<?= $Grid->DEptCd->EditValue ?>"<?= $Grid->DEptCd->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DEptCd->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DEptCd" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DEptCd" id="o<?= $Grid->RowIndex ?>_DEptCd" value="<?= HtmlEncode($Grid->DEptCd->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_DEptCd" class="form-group">
<input type="<?= $Grid->DEptCd->getInputTextType() ?>" data-table="patient_services" data-field="x_DEptCd" name="x<?= $Grid->RowIndex ?>_DEptCd" id="x<?= $Grid->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DEptCd->getPlaceHolder()) ?>" value="<?= $Grid->DEptCd->EditValue ?>"<?= $Grid->DEptCd->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DEptCd->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_DEptCd">
<span<?= $Grid->DEptCd->viewAttributes() ?>>
<?= $Grid->DEptCd->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_DEptCd" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_DEptCd" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_DEptCd" value="<?= HtmlEncode($Grid->DEptCd->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DEptCd" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_DEptCd" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_DEptCd" value="<?= HtmlEncode($Grid->DEptCd->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ProfCd->Visible) { // ProfCd ?>
        <td data-name="ProfCd" <?= $Grid->ProfCd->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_ProfCd" class="form-group">
<input type="<?= $Grid->ProfCd->getInputTextType() ?>" data-table="patient_services" data-field="x_ProfCd" name="x<?= $Grid->RowIndex ?>_ProfCd" id="x<?= $Grid->RowIndex ?>_ProfCd" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ProfCd->getPlaceHolder()) ?>" value="<?= $Grid->ProfCd->EditValue ?>"<?= $Grid->ProfCd->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ProfCd->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_ProfCd" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ProfCd" id="o<?= $Grid->RowIndex ?>_ProfCd" value="<?= HtmlEncode($Grid->ProfCd->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_ProfCd" class="form-group">
<input type="<?= $Grid->ProfCd->getInputTextType() ?>" data-table="patient_services" data-field="x_ProfCd" name="x<?= $Grid->RowIndex ?>_ProfCd" id="x<?= $Grid->RowIndex ?>_ProfCd" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ProfCd->getPlaceHolder()) ?>" value="<?= $Grid->ProfCd->EditValue ?>"<?= $Grid->ProfCd->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ProfCd->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_ProfCd">
<span<?= $Grid->ProfCd->viewAttributes() ?>>
<?= $Grid->ProfCd->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_ProfCd" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_ProfCd" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_ProfCd" value="<?= HtmlEncode($Grid->ProfCd->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_ProfCd" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_ProfCd" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_ProfCd" value="<?= HtmlEncode($Grid->ProfCd->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Comments->Visible) { // Comments ?>
        <td data-name="Comments" <?= $Grid->Comments->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Comments" class="form-group">
<input type="<?= $Grid->Comments->getInputTextType() ?>" data-table="patient_services" data-field="x_Comments" name="x<?= $Grid->RowIndex ?>_Comments" id="x<?= $Grid->RowIndex ?>_Comments" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Comments->getPlaceHolder()) ?>" value="<?= $Grid->Comments->EditValue ?>"<?= $Grid->Comments->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Comments->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Comments" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Comments" id="o<?= $Grid->RowIndex ?>_Comments" value="<?= HtmlEncode($Grid->Comments->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Comments" class="form-group">
<input type="<?= $Grid->Comments->getInputTextType() ?>" data-table="patient_services" data-field="x_Comments" name="x<?= $Grid->RowIndex ?>_Comments" id="x<?= $Grid->RowIndex ?>_Comments" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Comments->getPlaceHolder()) ?>" value="<?= $Grid->Comments->EditValue ?>"<?= $Grid->Comments->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Comments->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Comments">
<span<?= $Grid->Comments->viewAttributes() ?>>
<?= $Grid->Comments->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Comments" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Comments" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Comments" value="<?= HtmlEncode($Grid->Comments->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Comments" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Comments" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Comments" value="<?= HtmlEncode($Grid->Comments->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Method->Visible) { // Method ?>
        <td data-name="Method" <?= $Grid->Method->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Method" class="form-group">
<input type="<?= $Grid->Method->getInputTextType() ?>" data-table="patient_services" data-field="x_Method" name="x<?= $Grid->RowIndex ?>_Method" id="x<?= $Grid->RowIndex ?>_Method" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Method->getPlaceHolder()) ?>" value="<?= $Grid->Method->EditValue ?>"<?= $Grid->Method->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Method->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Method" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Method" id="o<?= $Grid->RowIndex ?>_Method" value="<?= HtmlEncode($Grid->Method->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Method" class="form-group">
<input type="<?= $Grid->Method->getInputTextType() ?>" data-table="patient_services" data-field="x_Method" name="x<?= $Grid->RowIndex ?>_Method" id="x<?= $Grid->RowIndex ?>_Method" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Method->getPlaceHolder()) ?>" value="<?= $Grid->Method->EditValue ?>"<?= $Grid->Method->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Method->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Method">
<span<?= $Grid->Method->viewAttributes() ?>>
<?= $Grid->Method->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Method" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Method" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Method" value="<?= HtmlEncode($Grid->Method->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Method" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Method" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Method" value="<?= HtmlEncode($Grid->Method->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Specimen->Visible) { // Specimen ?>
        <td data-name="Specimen" <?= $Grid->Specimen->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Specimen" class="form-group">
<input type="<?= $Grid->Specimen->getInputTextType() ?>" data-table="patient_services" data-field="x_Specimen" name="x<?= $Grid->RowIndex ?>_Specimen" id="x<?= $Grid->RowIndex ?>_Specimen" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Specimen->getPlaceHolder()) ?>" value="<?= $Grid->Specimen->EditValue ?>"<?= $Grid->Specimen->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Specimen->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Specimen" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Specimen" id="o<?= $Grid->RowIndex ?>_Specimen" value="<?= HtmlEncode($Grid->Specimen->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Specimen" class="form-group">
<input type="<?= $Grid->Specimen->getInputTextType() ?>" data-table="patient_services" data-field="x_Specimen" name="x<?= $Grid->RowIndex ?>_Specimen" id="x<?= $Grid->RowIndex ?>_Specimen" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Specimen->getPlaceHolder()) ?>" value="<?= $Grid->Specimen->EditValue ?>"<?= $Grid->Specimen->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Specimen->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Specimen">
<span<?= $Grid->Specimen->viewAttributes() ?>>
<?= $Grid->Specimen->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Specimen" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Specimen" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Specimen" value="<?= HtmlEncode($Grid->Specimen->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Specimen" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Specimen" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Specimen" value="<?= HtmlEncode($Grid->Specimen->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Abnormal->Visible) { // Abnormal ?>
        <td data-name="Abnormal" <?= $Grid->Abnormal->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Abnormal" class="form-group">
<input type="<?= $Grid->Abnormal->getInputTextType() ?>" data-table="patient_services" data-field="x_Abnormal" name="x<?= $Grid->RowIndex ?>_Abnormal" id="x<?= $Grid->RowIndex ?>_Abnormal" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Abnormal->getPlaceHolder()) ?>" value="<?= $Grid->Abnormal->EditValue ?>"<?= $Grid->Abnormal->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Abnormal->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Abnormal" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Abnormal" id="o<?= $Grid->RowIndex ?>_Abnormal" value="<?= HtmlEncode($Grid->Abnormal->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Abnormal" class="form-group">
<input type="<?= $Grid->Abnormal->getInputTextType() ?>" data-table="patient_services" data-field="x_Abnormal" name="x<?= $Grid->RowIndex ?>_Abnormal" id="x<?= $Grid->RowIndex ?>_Abnormal" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Abnormal->getPlaceHolder()) ?>" value="<?= $Grid->Abnormal->EditValue ?>"<?= $Grid->Abnormal->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Abnormal->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Abnormal">
<span<?= $Grid->Abnormal->viewAttributes() ?>>
<?= $Grid->Abnormal->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Abnormal" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Abnormal" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Abnormal" value="<?= HtmlEncode($Grid->Abnormal->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Abnormal" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Abnormal" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Abnormal" value="<?= HtmlEncode($Grid->Abnormal->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->TestUnit->Visible) { // TestUnit ?>
        <td data-name="TestUnit" <?= $Grid->TestUnit->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_TestUnit" class="form-group">
<input type="<?= $Grid->TestUnit->getInputTextType() ?>" data-table="patient_services" data-field="x_TestUnit" name="x<?= $Grid->RowIndex ?>_TestUnit" id="x<?= $Grid->RowIndex ?>_TestUnit" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->TestUnit->getPlaceHolder()) ?>" value="<?= $Grid->TestUnit->EditValue ?>"<?= $Grid->TestUnit->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TestUnit->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_TestUnit" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TestUnit" id="o<?= $Grid->RowIndex ?>_TestUnit" value="<?= HtmlEncode($Grid->TestUnit->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_TestUnit" class="form-group">
<input type="<?= $Grid->TestUnit->getInputTextType() ?>" data-table="patient_services" data-field="x_TestUnit" name="x<?= $Grid->RowIndex ?>_TestUnit" id="x<?= $Grid->RowIndex ?>_TestUnit" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->TestUnit->getPlaceHolder()) ?>" value="<?= $Grid->TestUnit->EditValue ?>"<?= $Grid->TestUnit->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TestUnit->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_TestUnit">
<span<?= $Grid->TestUnit->viewAttributes() ?>>
<?= $Grid->TestUnit->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_TestUnit" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_TestUnit" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_TestUnit" value="<?= HtmlEncode($Grid->TestUnit->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_TestUnit" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_TestUnit" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_TestUnit" value="<?= HtmlEncode($Grid->TestUnit->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->LOWHIGH->Visible) { // LOWHIGH ?>
        <td data-name="LOWHIGH" <?= $Grid->LOWHIGH->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_LOWHIGH" class="form-group">
<input type="<?= $Grid->LOWHIGH->getInputTextType() ?>" data-table="patient_services" data-field="x_LOWHIGH" name="x<?= $Grid->RowIndex ?>_LOWHIGH" id="x<?= $Grid->RowIndex ?>_LOWHIGH" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->LOWHIGH->getPlaceHolder()) ?>" value="<?= $Grid->LOWHIGH->EditValue ?>"<?= $Grid->LOWHIGH->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->LOWHIGH->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_LOWHIGH" data-hidden="1" name="o<?= $Grid->RowIndex ?>_LOWHIGH" id="o<?= $Grid->RowIndex ?>_LOWHIGH" value="<?= HtmlEncode($Grid->LOWHIGH->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_LOWHIGH" class="form-group">
<input type="<?= $Grid->LOWHIGH->getInputTextType() ?>" data-table="patient_services" data-field="x_LOWHIGH" name="x<?= $Grid->RowIndex ?>_LOWHIGH" id="x<?= $Grid->RowIndex ?>_LOWHIGH" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->LOWHIGH->getPlaceHolder()) ?>" value="<?= $Grid->LOWHIGH->EditValue ?>"<?= $Grid->LOWHIGH->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->LOWHIGH->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_LOWHIGH">
<span<?= $Grid->LOWHIGH->viewAttributes() ?>>
<?= $Grid->LOWHIGH->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_LOWHIGH" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_LOWHIGH" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_LOWHIGH" value="<?= HtmlEncode($Grid->LOWHIGH->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_LOWHIGH" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_LOWHIGH" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_LOWHIGH" value="<?= HtmlEncode($Grid->LOWHIGH->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Branch->Visible) { // Branch ?>
        <td data-name="Branch" <?= $Grid->Branch->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Branch" class="form-group">
<input type="<?= $Grid->Branch->getInputTextType() ?>" data-table="patient_services" data-field="x_Branch" name="x<?= $Grid->RowIndex ?>_Branch" id="x<?= $Grid->RowIndex ?>_Branch" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Branch->getPlaceHolder()) ?>" value="<?= $Grid->Branch->EditValue ?>"<?= $Grid->Branch->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Branch->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Branch" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Branch" id="o<?= $Grid->RowIndex ?>_Branch" value="<?= HtmlEncode($Grid->Branch->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Branch" class="form-group">
<input type="<?= $Grid->Branch->getInputTextType() ?>" data-table="patient_services" data-field="x_Branch" name="x<?= $Grid->RowIndex ?>_Branch" id="x<?= $Grid->RowIndex ?>_Branch" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Branch->getPlaceHolder()) ?>" value="<?= $Grid->Branch->EditValue ?>"<?= $Grid->Branch->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Branch->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Branch">
<span<?= $Grid->Branch->viewAttributes() ?>>
<?= $Grid->Branch->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Branch" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Branch" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Branch" value="<?= HtmlEncode($Grid->Branch->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Branch" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Branch" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Branch" value="<?= HtmlEncode($Grid->Branch->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Dispatch->Visible) { // Dispatch ?>
        <td data-name="Dispatch" <?= $Grid->Dispatch->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Dispatch" class="form-group">
<input type="<?= $Grid->Dispatch->getInputTextType() ?>" data-table="patient_services" data-field="x_Dispatch" name="x<?= $Grid->RowIndex ?>_Dispatch" id="x<?= $Grid->RowIndex ?>_Dispatch" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Dispatch->getPlaceHolder()) ?>" value="<?= $Grid->Dispatch->EditValue ?>"<?= $Grid->Dispatch->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Dispatch->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Dispatch" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Dispatch" id="o<?= $Grid->RowIndex ?>_Dispatch" value="<?= HtmlEncode($Grid->Dispatch->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Dispatch" class="form-group">
<input type="<?= $Grid->Dispatch->getInputTextType() ?>" data-table="patient_services" data-field="x_Dispatch" name="x<?= $Grid->RowIndex ?>_Dispatch" id="x<?= $Grid->RowIndex ?>_Dispatch" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Dispatch->getPlaceHolder()) ?>" value="<?= $Grid->Dispatch->EditValue ?>"<?= $Grid->Dispatch->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Dispatch->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Dispatch">
<span<?= $Grid->Dispatch->viewAttributes() ?>>
<?= $Grid->Dispatch->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Dispatch" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Dispatch" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Dispatch" value="<?= HtmlEncode($Grid->Dispatch->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Dispatch" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Dispatch" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Dispatch" value="<?= HtmlEncode($Grid->Dispatch->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Pic1->Visible) { // Pic1 ?>
        <td data-name="Pic1" <?= $Grid->Pic1->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Pic1" class="form-group">
<input type="<?= $Grid->Pic1->getInputTextType() ?>" data-table="patient_services" data-field="x_Pic1" name="x<?= $Grid->RowIndex ?>_Pic1" id="x<?= $Grid->RowIndex ?>_Pic1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Pic1->getPlaceHolder()) ?>" value="<?= $Grid->Pic1->EditValue ?>"<?= $Grid->Pic1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Pic1->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Pic1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Pic1" id="o<?= $Grid->RowIndex ?>_Pic1" value="<?= HtmlEncode($Grid->Pic1->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Pic1" class="form-group">
<input type="<?= $Grid->Pic1->getInputTextType() ?>" data-table="patient_services" data-field="x_Pic1" name="x<?= $Grid->RowIndex ?>_Pic1" id="x<?= $Grid->RowIndex ?>_Pic1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Pic1->getPlaceHolder()) ?>" value="<?= $Grid->Pic1->EditValue ?>"<?= $Grid->Pic1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Pic1->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Pic1">
<span<?= $Grid->Pic1->viewAttributes() ?>>
<?= $Grid->Pic1->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Pic1" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Pic1" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Pic1" value="<?= HtmlEncode($Grid->Pic1->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Pic1" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Pic1" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Pic1" value="<?= HtmlEncode($Grid->Pic1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Pic2->Visible) { // Pic2 ?>
        <td data-name="Pic2" <?= $Grid->Pic2->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Pic2" class="form-group">
<input type="<?= $Grid->Pic2->getInputTextType() ?>" data-table="patient_services" data-field="x_Pic2" name="x<?= $Grid->RowIndex ?>_Pic2" id="x<?= $Grid->RowIndex ?>_Pic2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Pic2->getPlaceHolder()) ?>" value="<?= $Grid->Pic2->EditValue ?>"<?= $Grid->Pic2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Pic2->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Pic2" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Pic2" id="o<?= $Grid->RowIndex ?>_Pic2" value="<?= HtmlEncode($Grid->Pic2->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Pic2" class="form-group">
<input type="<?= $Grid->Pic2->getInputTextType() ?>" data-table="patient_services" data-field="x_Pic2" name="x<?= $Grid->RowIndex ?>_Pic2" id="x<?= $Grid->RowIndex ?>_Pic2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Pic2->getPlaceHolder()) ?>" value="<?= $Grid->Pic2->EditValue ?>"<?= $Grid->Pic2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Pic2->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Pic2">
<span<?= $Grid->Pic2->viewAttributes() ?>>
<?= $Grid->Pic2->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Pic2" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Pic2" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Pic2" value="<?= HtmlEncode($Grid->Pic2->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Pic2" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Pic2" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Pic2" value="<?= HtmlEncode($Grid->Pic2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->GraphPath->Visible) { // GraphPath ?>
        <td data-name="GraphPath" <?= $Grid->GraphPath->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_GraphPath" class="form-group">
<input type="<?= $Grid->GraphPath->getInputTextType() ?>" data-table="patient_services" data-field="x_GraphPath" name="x<?= $Grid->RowIndex ?>_GraphPath" id="x<?= $Grid->RowIndex ?>_GraphPath" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->GraphPath->getPlaceHolder()) ?>" value="<?= $Grid->GraphPath->EditValue ?>"<?= $Grid->GraphPath->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->GraphPath->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_GraphPath" data-hidden="1" name="o<?= $Grid->RowIndex ?>_GraphPath" id="o<?= $Grid->RowIndex ?>_GraphPath" value="<?= HtmlEncode($Grid->GraphPath->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_GraphPath" class="form-group">
<input type="<?= $Grid->GraphPath->getInputTextType() ?>" data-table="patient_services" data-field="x_GraphPath" name="x<?= $Grid->RowIndex ?>_GraphPath" id="x<?= $Grid->RowIndex ?>_GraphPath" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->GraphPath->getPlaceHolder()) ?>" value="<?= $Grid->GraphPath->EditValue ?>"<?= $Grid->GraphPath->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->GraphPath->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_GraphPath">
<span<?= $Grid->GraphPath->viewAttributes() ?>>
<?= $Grid->GraphPath->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_GraphPath" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_GraphPath" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_GraphPath" value="<?= HtmlEncode($Grid->GraphPath->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_GraphPath" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_GraphPath" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_GraphPath" value="<?= HtmlEncode($Grid->GraphPath->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->MachineCD->Visible) { // MachineCD ?>
        <td data-name="MachineCD" <?= $Grid->MachineCD->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_MachineCD" class="form-group">
<input type="<?= $Grid->MachineCD->getInputTextType() ?>" data-table="patient_services" data-field="x_MachineCD" name="x<?= $Grid->RowIndex ?>_MachineCD" id="x<?= $Grid->RowIndex ?>_MachineCD" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->MachineCD->getPlaceHolder()) ?>" value="<?= $Grid->MachineCD->EditValue ?>"<?= $Grid->MachineCD->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->MachineCD->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_MachineCD" data-hidden="1" name="o<?= $Grid->RowIndex ?>_MachineCD" id="o<?= $Grid->RowIndex ?>_MachineCD" value="<?= HtmlEncode($Grid->MachineCD->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_MachineCD" class="form-group">
<input type="<?= $Grid->MachineCD->getInputTextType() ?>" data-table="patient_services" data-field="x_MachineCD" name="x<?= $Grid->RowIndex ?>_MachineCD" id="x<?= $Grid->RowIndex ?>_MachineCD" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->MachineCD->getPlaceHolder()) ?>" value="<?= $Grid->MachineCD->EditValue ?>"<?= $Grid->MachineCD->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->MachineCD->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_MachineCD">
<span<?= $Grid->MachineCD->viewAttributes() ?>>
<?= $Grid->MachineCD->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_MachineCD" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_MachineCD" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_MachineCD" value="<?= HtmlEncode($Grid->MachineCD->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_MachineCD" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_MachineCD" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_MachineCD" value="<?= HtmlEncode($Grid->MachineCD->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->TestCancel->Visible) { // TestCancel ?>
        <td data-name="TestCancel" <?= $Grid->TestCancel->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_TestCancel" class="form-group">
<input type="<?= $Grid->TestCancel->getInputTextType() ?>" data-table="patient_services" data-field="x_TestCancel" name="x<?= $Grid->RowIndex ?>_TestCancel" id="x<?= $Grid->RowIndex ?>_TestCancel" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->TestCancel->getPlaceHolder()) ?>" value="<?= $Grid->TestCancel->EditValue ?>"<?= $Grid->TestCancel->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TestCancel->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_TestCancel" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TestCancel" id="o<?= $Grid->RowIndex ?>_TestCancel" value="<?= HtmlEncode($Grid->TestCancel->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_TestCancel" class="form-group">
<input type="<?= $Grid->TestCancel->getInputTextType() ?>" data-table="patient_services" data-field="x_TestCancel" name="x<?= $Grid->RowIndex ?>_TestCancel" id="x<?= $Grid->RowIndex ?>_TestCancel" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->TestCancel->getPlaceHolder()) ?>" value="<?= $Grid->TestCancel->EditValue ?>"<?= $Grid->TestCancel->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TestCancel->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_TestCancel">
<span<?= $Grid->TestCancel->viewAttributes() ?>>
<?= $Grid->TestCancel->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_TestCancel" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_TestCancel" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_TestCancel" value="<?= HtmlEncode($Grid->TestCancel->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_TestCancel" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_TestCancel" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_TestCancel" value="<?= HtmlEncode($Grid->TestCancel->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->OutSource->Visible) { // OutSource ?>
        <td data-name="OutSource" <?= $Grid->OutSource->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_OutSource" class="form-group">
<input type="<?= $Grid->OutSource->getInputTextType() ?>" data-table="patient_services" data-field="x_OutSource" name="x<?= $Grid->RowIndex ?>_OutSource" id="x<?= $Grid->RowIndex ?>_OutSource" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->OutSource->getPlaceHolder()) ?>" value="<?= $Grid->OutSource->EditValue ?>"<?= $Grid->OutSource->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->OutSource->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_OutSource" data-hidden="1" name="o<?= $Grid->RowIndex ?>_OutSource" id="o<?= $Grid->RowIndex ?>_OutSource" value="<?= HtmlEncode($Grid->OutSource->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_OutSource" class="form-group">
<input type="<?= $Grid->OutSource->getInputTextType() ?>" data-table="patient_services" data-field="x_OutSource" name="x<?= $Grid->RowIndex ?>_OutSource" id="x<?= $Grid->RowIndex ?>_OutSource" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->OutSource->getPlaceHolder()) ?>" value="<?= $Grid->OutSource->EditValue ?>"<?= $Grid->OutSource->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->OutSource->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_OutSource">
<span<?= $Grid->OutSource->viewAttributes() ?>>
<?= $Grid->OutSource->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_OutSource" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_OutSource" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_OutSource" value="<?= HtmlEncode($Grid->OutSource->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_OutSource" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_OutSource" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_OutSource" value="<?= HtmlEncode($Grid->OutSource->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Printed->Visible) { // Printed ?>
        <td data-name="Printed" <?= $Grid->Printed->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Printed" class="form-group">
<input type="<?= $Grid->Printed->getInputTextType() ?>" data-table="patient_services" data-field="x_Printed" name="x<?= $Grid->RowIndex ?>_Printed" id="x<?= $Grid->RowIndex ?>_Printed" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Printed->getPlaceHolder()) ?>" value="<?= $Grid->Printed->EditValue ?>"<?= $Grid->Printed->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Printed->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Printed" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Printed" id="o<?= $Grid->RowIndex ?>_Printed" value="<?= HtmlEncode($Grid->Printed->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Printed" class="form-group">
<input type="<?= $Grid->Printed->getInputTextType() ?>" data-table="patient_services" data-field="x_Printed" name="x<?= $Grid->RowIndex ?>_Printed" id="x<?= $Grid->RowIndex ?>_Printed" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Printed->getPlaceHolder()) ?>" value="<?= $Grid->Printed->EditValue ?>"<?= $Grid->Printed->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Printed->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Printed">
<span<?= $Grid->Printed->viewAttributes() ?>>
<?= $Grid->Printed->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Printed" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Printed" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Printed" value="<?= HtmlEncode($Grid->Printed->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Printed" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Printed" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Printed" value="<?= HtmlEncode($Grid->Printed->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PrintBy->Visible) { // PrintBy ?>
        <td data-name="PrintBy" <?= $Grid->PrintBy->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_PrintBy" class="form-group">
<input type="<?= $Grid->PrintBy->getInputTextType() ?>" data-table="patient_services" data-field="x_PrintBy" name="x<?= $Grid->RowIndex ?>_PrintBy" id="x<?= $Grid->RowIndex ?>_PrintBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PrintBy->getPlaceHolder()) ?>" value="<?= $Grid->PrintBy->EditValue ?>"<?= $Grid->PrintBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PrintBy->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_PrintBy" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PrintBy" id="o<?= $Grid->RowIndex ?>_PrintBy" value="<?= HtmlEncode($Grid->PrintBy->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_PrintBy" class="form-group">
<input type="<?= $Grid->PrintBy->getInputTextType() ?>" data-table="patient_services" data-field="x_PrintBy" name="x<?= $Grid->RowIndex ?>_PrintBy" id="x<?= $Grid->RowIndex ?>_PrintBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PrintBy->getPlaceHolder()) ?>" value="<?= $Grid->PrintBy->EditValue ?>"<?= $Grid->PrintBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PrintBy->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_PrintBy">
<span<?= $Grid->PrintBy->viewAttributes() ?>>
<?= $Grid->PrintBy->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_PrintBy" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_PrintBy" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_PrintBy" value="<?= HtmlEncode($Grid->PrintBy->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_PrintBy" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_PrintBy" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_PrintBy" value="<?= HtmlEncode($Grid->PrintBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PrintDate->Visible) { // PrintDate ?>
        <td data-name="PrintDate" <?= $Grid->PrintDate->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_PrintDate" class="form-group">
<input type="<?= $Grid->PrintDate->getInputTextType() ?>" data-table="patient_services" data-field="x_PrintDate" name="x<?= $Grid->RowIndex ?>_PrintDate" id="x<?= $Grid->RowIndex ?>_PrintDate" placeholder="<?= HtmlEncode($Grid->PrintDate->getPlaceHolder()) ?>" value="<?= $Grid->PrintDate->EditValue ?>"<?= $Grid->PrintDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PrintDate->getErrorMessage() ?></div>
<?php if (!$Grid->PrintDate->ReadOnly && !$Grid->PrintDate->Disabled && !isset($Grid->PrintDate->EditAttrs["readonly"]) && !isset($Grid->PrintDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_servicesgrid", "x<?= $Grid->RowIndex ?>_PrintDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_services" data-field="x_PrintDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PrintDate" id="o<?= $Grid->RowIndex ?>_PrintDate" value="<?= HtmlEncode($Grid->PrintDate->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_PrintDate" class="form-group">
<input type="<?= $Grid->PrintDate->getInputTextType() ?>" data-table="patient_services" data-field="x_PrintDate" name="x<?= $Grid->RowIndex ?>_PrintDate" id="x<?= $Grid->RowIndex ?>_PrintDate" placeholder="<?= HtmlEncode($Grid->PrintDate->getPlaceHolder()) ?>" value="<?= $Grid->PrintDate->EditValue ?>"<?= $Grid->PrintDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PrintDate->getErrorMessage() ?></div>
<?php if (!$Grid->PrintDate->ReadOnly && !$Grid->PrintDate->Disabled && !isset($Grid->PrintDate->EditAttrs["readonly"]) && !isset($Grid->PrintDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_servicesgrid", "x<?= $Grid->RowIndex ?>_PrintDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_PrintDate">
<span<?= $Grid->PrintDate->viewAttributes() ?>>
<?= $Grid->PrintDate->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_PrintDate" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_PrintDate" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_PrintDate" value="<?= HtmlEncode($Grid->PrintDate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_PrintDate" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_PrintDate" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_PrintDate" value="<?= HtmlEncode($Grid->PrintDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->BillingDate->Visible) { // BillingDate ?>
        <td data-name="BillingDate" <?= $Grid->BillingDate->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_BillingDate" class="form-group">
<input type="<?= $Grid->BillingDate->getInputTextType() ?>" data-table="patient_services" data-field="x_BillingDate" name="x<?= $Grid->RowIndex ?>_BillingDate" id="x<?= $Grid->RowIndex ?>_BillingDate" placeholder="<?= HtmlEncode($Grid->BillingDate->getPlaceHolder()) ?>" value="<?= $Grid->BillingDate->EditValue ?>"<?= $Grid->BillingDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BillingDate->getErrorMessage() ?></div>
<?php if (!$Grid->BillingDate->ReadOnly && !$Grid->BillingDate->Disabled && !isset($Grid->BillingDate->EditAttrs["readonly"]) && !isset($Grid->BillingDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_servicesgrid", "x<?= $Grid->RowIndex ?>_BillingDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_services" data-field="x_BillingDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BillingDate" id="o<?= $Grid->RowIndex ?>_BillingDate" value="<?= HtmlEncode($Grid->BillingDate->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_BillingDate" class="form-group">
<input type="<?= $Grid->BillingDate->getInputTextType() ?>" data-table="patient_services" data-field="x_BillingDate" name="x<?= $Grid->RowIndex ?>_BillingDate" id="x<?= $Grid->RowIndex ?>_BillingDate" placeholder="<?= HtmlEncode($Grid->BillingDate->getPlaceHolder()) ?>" value="<?= $Grid->BillingDate->EditValue ?>"<?= $Grid->BillingDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BillingDate->getErrorMessage() ?></div>
<?php if (!$Grid->BillingDate->ReadOnly && !$Grid->BillingDate->Disabled && !isset($Grid->BillingDate->EditAttrs["readonly"]) && !isset($Grid->BillingDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_servicesgrid", "x<?= $Grid->RowIndex ?>_BillingDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_BillingDate">
<span<?= $Grid->BillingDate->viewAttributes() ?>>
<?= $Grid->BillingDate->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_BillingDate" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_BillingDate" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_BillingDate" value="<?= HtmlEncode($Grid->BillingDate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_BillingDate" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_BillingDate" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_BillingDate" value="<?= HtmlEncode($Grid->BillingDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->BilledBy->Visible) { // BilledBy ?>
        <td data-name="BilledBy" <?= $Grid->BilledBy->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_BilledBy" class="form-group">
<input type="<?= $Grid->BilledBy->getInputTextType() ?>" data-table="patient_services" data-field="x_BilledBy" name="x<?= $Grid->RowIndex ?>_BilledBy" id="x<?= $Grid->RowIndex ?>_BilledBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->BilledBy->getPlaceHolder()) ?>" value="<?= $Grid->BilledBy->EditValue ?>"<?= $Grid->BilledBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BilledBy->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_BilledBy" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BilledBy" id="o<?= $Grid->RowIndex ?>_BilledBy" value="<?= HtmlEncode($Grid->BilledBy->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_BilledBy" class="form-group">
<input type="<?= $Grid->BilledBy->getInputTextType() ?>" data-table="patient_services" data-field="x_BilledBy" name="x<?= $Grid->RowIndex ?>_BilledBy" id="x<?= $Grid->RowIndex ?>_BilledBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->BilledBy->getPlaceHolder()) ?>" value="<?= $Grid->BilledBy->EditValue ?>"<?= $Grid->BilledBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BilledBy->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_BilledBy">
<span<?= $Grid->BilledBy->viewAttributes() ?>>
<?= $Grid->BilledBy->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_BilledBy" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_BilledBy" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_BilledBy" value="<?= HtmlEncode($Grid->BilledBy->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_BilledBy" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_BilledBy" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_BilledBy" value="<?= HtmlEncode($Grid->BilledBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Resulted->Visible) { // Resulted ?>
        <td data-name="Resulted" <?= $Grid->Resulted->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Resulted" class="form-group">
<input type="<?= $Grid->Resulted->getInputTextType() ?>" data-table="patient_services" data-field="x_Resulted" name="x<?= $Grid->RowIndex ?>_Resulted" id="x<?= $Grid->RowIndex ?>_Resulted" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Resulted->getPlaceHolder()) ?>" value="<?= $Grid->Resulted->EditValue ?>"<?= $Grid->Resulted->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Resulted->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Resulted" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Resulted" id="o<?= $Grid->RowIndex ?>_Resulted" value="<?= HtmlEncode($Grid->Resulted->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Resulted" class="form-group">
<input type="<?= $Grid->Resulted->getInputTextType() ?>" data-table="patient_services" data-field="x_Resulted" name="x<?= $Grid->RowIndex ?>_Resulted" id="x<?= $Grid->RowIndex ?>_Resulted" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Resulted->getPlaceHolder()) ?>" value="<?= $Grid->Resulted->EditValue ?>"<?= $Grid->Resulted->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Resulted->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Resulted">
<span<?= $Grid->Resulted->viewAttributes() ?>>
<?= $Grid->Resulted->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Resulted" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Resulted" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Resulted" value="<?= HtmlEncode($Grid->Resulted->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Resulted" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Resulted" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Resulted" value="<?= HtmlEncode($Grid->Resulted->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ResultDate->Visible) { // ResultDate ?>
        <td data-name="ResultDate" <?= $Grid->ResultDate->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_ResultDate" class="form-group">
<input type="<?= $Grid->ResultDate->getInputTextType() ?>" data-table="patient_services" data-field="x_ResultDate" name="x<?= $Grid->RowIndex ?>_ResultDate" id="x<?= $Grid->RowIndex ?>_ResultDate" placeholder="<?= HtmlEncode($Grid->ResultDate->getPlaceHolder()) ?>" value="<?= $Grid->ResultDate->EditValue ?>"<?= $Grid->ResultDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ResultDate->getErrorMessage() ?></div>
<?php if (!$Grid->ResultDate->ReadOnly && !$Grid->ResultDate->Disabled && !isset($Grid->ResultDate->EditAttrs["readonly"]) && !isset($Grid->ResultDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_servicesgrid", "x<?= $Grid->RowIndex ?>_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_services" data-field="x_ResultDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ResultDate" id="o<?= $Grid->RowIndex ?>_ResultDate" value="<?= HtmlEncode($Grid->ResultDate->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_ResultDate" class="form-group">
<input type="<?= $Grid->ResultDate->getInputTextType() ?>" data-table="patient_services" data-field="x_ResultDate" name="x<?= $Grid->RowIndex ?>_ResultDate" id="x<?= $Grid->RowIndex ?>_ResultDate" placeholder="<?= HtmlEncode($Grid->ResultDate->getPlaceHolder()) ?>" value="<?= $Grid->ResultDate->EditValue ?>"<?= $Grid->ResultDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ResultDate->getErrorMessage() ?></div>
<?php if (!$Grid->ResultDate->ReadOnly && !$Grid->ResultDate->Disabled && !isset($Grid->ResultDate->EditAttrs["readonly"]) && !isset($Grid->ResultDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_servicesgrid", "x<?= $Grid->RowIndex ?>_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_ResultDate">
<span<?= $Grid->ResultDate->viewAttributes() ?>>
<?= $Grid->ResultDate->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_ResultDate" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_ResultDate" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_ResultDate" value="<?= HtmlEncode($Grid->ResultDate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_ResultDate" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_ResultDate" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_ResultDate" value="<?= HtmlEncode($Grid->ResultDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ResultedBy->Visible) { // ResultedBy ?>
        <td data-name="ResultedBy" <?= $Grid->ResultedBy->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_ResultedBy" class="form-group">
<input type="<?= $Grid->ResultedBy->getInputTextType() ?>" data-table="patient_services" data-field="x_ResultedBy" name="x<?= $Grid->RowIndex ?>_ResultedBy" id="x<?= $Grid->RowIndex ?>_ResultedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ResultedBy->getPlaceHolder()) ?>" value="<?= $Grid->ResultedBy->EditValue ?>"<?= $Grid->ResultedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ResultedBy->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_ResultedBy" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ResultedBy" id="o<?= $Grid->RowIndex ?>_ResultedBy" value="<?= HtmlEncode($Grid->ResultedBy->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_ResultedBy" class="form-group">
<input type="<?= $Grid->ResultedBy->getInputTextType() ?>" data-table="patient_services" data-field="x_ResultedBy" name="x<?= $Grid->RowIndex ?>_ResultedBy" id="x<?= $Grid->RowIndex ?>_ResultedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ResultedBy->getPlaceHolder()) ?>" value="<?= $Grid->ResultedBy->EditValue ?>"<?= $Grid->ResultedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ResultedBy->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_ResultedBy">
<span<?= $Grid->ResultedBy->viewAttributes() ?>>
<?= $Grid->ResultedBy->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_ResultedBy" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_ResultedBy" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_ResultedBy" value="<?= HtmlEncode($Grid->ResultedBy->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_ResultedBy" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_ResultedBy" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_ResultedBy" value="<?= HtmlEncode($Grid->ResultedBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->SampleDate->Visible) { // SampleDate ?>
        <td data-name="SampleDate" <?= $Grid->SampleDate->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_SampleDate" class="form-group">
<input type="<?= $Grid->SampleDate->getInputTextType() ?>" data-table="patient_services" data-field="x_SampleDate" name="x<?= $Grid->RowIndex ?>_SampleDate" id="x<?= $Grid->RowIndex ?>_SampleDate" placeholder="<?= HtmlEncode($Grid->SampleDate->getPlaceHolder()) ?>" value="<?= $Grid->SampleDate->EditValue ?>"<?= $Grid->SampleDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SampleDate->getErrorMessage() ?></div>
<?php if (!$Grid->SampleDate->ReadOnly && !$Grid->SampleDate->Disabled && !isset($Grid->SampleDate->EditAttrs["readonly"]) && !isset($Grid->SampleDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_servicesgrid", "x<?= $Grid->RowIndex ?>_SampleDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_services" data-field="x_SampleDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SampleDate" id="o<?= $Grid->RowIndex ?>_SampleDate" value="<?= HtmlEncode($Grid->SampleDate->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_SampleDate" class="form-group">
<input type="<?= $Grid->SampleDate->getInputTextType() ?>" data-table="patient_services" data-field="x_SampleDate" name="x<?= $Grid->RowIndex ?>_SampleDate" id="x<?= $Grid->RowIndex ?>_SampleDate" placeholder="<?= HtmlEncode($Grid->SampleDate->getPlaceHolder()) ?>" value="<?= $Grid->SampleDate->EditValue ?>"<?= $Grid->SampleDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SampleDate->getErrorMessage() ?></div>
<?php if (!$Grid->SampleDate->ReadOnly && !$Grid->SampleDate->Disabled && !isset($Grid->SampleDate->EditAttrs["readonly"]) && !isset($Grid->SampleDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_servicesgrid", "x<?= $Grid->RowIndex ?>_SampleDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_SampleDate">
<span<?= $Grid->SampleDate->viewAttributes() ?>>
<?= $Grid->SampleDate->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_SampleDate" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_SampleDate" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_SampleDate" value="<?= HtmlEncode($Grid->SampleDate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_SampleDate" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_SampleDate" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_SampleDate" value="<?= HtmlEncode($Grid->SampleDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->SampleUser->Visible) { // SampleUser ?>
        <td data-name="SampleUser" <?= $Grid->SampleUser->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_SampleUser" class="form-group">
<input type="<?= $Grid->SampleUser->getInputTextType() ?>" data-table="patient_services" data-field="x_SampleUser" name="x<?= $Grid->RowIndex ?>_SampleUser" id="x<?= $Grid->RowIndex ?>_SampleUser" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->SampleUser->getPlaceHolder()) ?>" value="<?= $Grid->SampleUser->EditValue ?>"<?= $Grid->SampleUser->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SampleUser->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_SampleUser" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SampleUser" id="o<?= $Grid->RowIndex ?>_SampleUser" value="<?= HtmlEncode($Grid->SampleUser->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_SampleUser" class="form-group">
<input type="<?= $Grid->SampleUser->getInputTextType() ?>" data-table="patient_services" data-field="x_SampleUser" name="x<?= $Grid->RowIndex ?>_SampleUser" id="x<?= $Grid->RowIndex ?>_SampleUser" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->SampleUser->getPlaceHolder()) ?>" value="<?= $Grid->SampleUser->EditValue ?>"<?= $Grid->SampleUser->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SampleUser->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_SampleUser">
<span<?= $Grid->SampleUser->viewAttributes() ?>>
<?= $Grid->SampleUser->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_SampleUser" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_SampleUser" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_SampleUser" value="<?= HtmlEncode($Grid->SampleUser->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_SampleUser" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_SampleUser" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_SampleUser" value="<?= HtmlEncode($Grid->SampleUser->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Sampled->Visible) { // Sampled ?>
        <td data-name="Sampled" <?= $Grid->Sampled->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Sampled" class="form-group">
<input type="<?= $Grid->Sampled->getInputTextType() ?>" data-table="patient_services" data-field="x_Sampled" name="x<?= $Grid->RowIndex ?>_Sampled" id="x<?= $Grid->RowIndex ?>_Sampled" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Sampled->getPlaceHolder()) ?>" value="<?= $Grid->Sampled->EditValue ?>"<?= $Grid->Sampled->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Sampled->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Sampled" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Sampled" id="o<?= $Grid->RowIndex ?>_Sampled" value="<?= HtmlEncode($Grid->Sampled->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Sampled" class="form-group">
<input type="<?= $Grid->Sampled->getInputTextType() ?>" data-table="patient_services" data-field="x_Sampled" name="x<?= $Grid->RowIndex ?>_Sampled" id="x<?= $Grid->RowIndex ?>_Sampled" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Sampled->getPlaceHolder()) ?>" value="<?= $Grid->Sampled->EditValue ?>"<?= $Grid->Sampled->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Sampled->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Sampled">
<span<?= $Grid->Sampled->viewAttributes() ?>>
<?= $Grid->Sampled->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Sampled" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Sampled" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Sampled" value="<?= HtmlEncode($Grid->Sampled->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Sampled" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Sampled" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Sampled" value="<?= HtmlEncode($Grid->Sampled->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ReceivedDate->Visible) { // ReceivedDate ?>
        <td data-name="ReceivedDate" <?= $Grid->ReceivedDate->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_ReceivedDate" class="form-group">
<input type="<?= $Grid->ReceivedDate->getInputTextType() ?>" data-table="patient_services" data-field="x_ReceivedDate" name="x<?= $Grid->RowIndex ?>_ReceivedDate" id="x<?= $Grid->RowIndex ?>_ReceivedDate" placeholder="<?= HtmlEncode($Grid->ReceivedDate->getPlaceHolder()) ?>" value="<?= $Grid->ReceivedDate->EditValue ?>"<?= $Grid->ReceivedDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ReceivedDate->getErrorMessage() ?></div>
<?php if (!$Grid->ReceivedDate->ReadOnly && !$Grid->ReceivedDate->Disabled && !isset($Grid->ReceivedDate->EditAttrs["readonly"]) && !isset($Grid->ReceivedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_servicesgrid", "x<?= $Grid->RowIndex ?>_ReceivedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_services" data-field="x_ReceivedDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ReceivedDate" id="o<?= $Grid->RowIndex ?>_ReceivedDate" value="<?= HtmlEncode($Grid->ReceivedDate->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_ReceivedDate" class="form-group">
<input type="<?= $Grid->ReceivedDate->getInputTextType() ?>" data-table="patient_services" data-field="x_ReceivedDate" name="x<?= $Grid->RowIndex ?>_ReceivedDate" id="x<?= $Grid->RowIndex ?>_ReceivedDate" placeholder="<?= HtmlEncode($Grid->ReceivedDate->getPlaceHolder()) ?>" value="<?= $Grid->ReceivedDate->EditValue ?>"<?= $Grid->ReceivedDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ReceivedDate->getErrorMessage() ?></div>
<?php if (!$Grid->ReceivedDate->ReadOnly && !$Grid->ReceivedDate->Disabled && !isset($Grid->ReceivedDate->EditAttrs["readonly"]) && !isset($Grid->ReceivedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_servicesgrid", "x<?= $Grid->RowIndex ?>_ReceivedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_ReceivedDate">
<span<?= $Grid->ReceivedDate->viewAttributes() ?>>
<?= $Grid->ReceivedDate->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_ReceivedDate" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_ReceivedDate" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_ReceivedDate" value="<?= HtmlEncode($Grid->ReceivedDate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_ReceivedDate" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_ReceivedDate" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_ReceivedDate" value="<?= HtmlEncode($Grid->ReceivedDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ReceivedUser->Visible) { // ReceivedUser ?>
        <td data-name="ReceivedUser" <?= $Grid->ReceivedUser->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_ReceivedUser" class="form-group">
<input type="<?= $Grid->ReceivedUser->getInputTextType() ?>" data-table="patient_services" data-field="x_ReceivedUser" name="x<?= $Grid->RowIndex ?>_ReceivedUser" id="x<?= $Grid->RowIndex ?>_ReceivedUser" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ReceivedUser->getPlaceHolder()) ?>" value="<?= $Grid->ReceivedUser->EditValue ?>"<?= $Grid->ReceivedUser->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ReceivedUser->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_ReceivedUser" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ReceivedUser" id="o<?= $Grid->RowIndex ?>_ReceivedUser" value="<?= HtmlEncode($Grid->ReceivedUser->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_ReceivedUser" class="form-group">
<input type="<?= $Grid->ReceivedUser->getInputTextType() ?>" data-table="patient_services" data-field="x_ReceivedUser" name="x<?= $Grid->RowIndex ?>_ReceivedUser" id="x<?= $Grid->RowIndex ?>_ReceivedUser" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ReceivedUser->getPlaceHolder()) ?>" value="<?= $Grid->ReceivedUser->EditValue ?>"<?= $Grid->ReceivedUser->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ReceivedUser->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_ReceivedUser">
<span<?= $Grid->ReceivedUser->viewAttributes() ?>>
<?= $Grid->ReceivedUser->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_ReceivedUser" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_ReceivedUser" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_ReceivedUser" value="<?= HtmlEncode($Grid->ReceivedUser->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_ReceivedUser" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_ReceivedUser" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_ReceivedUser" value="<?= HtmlEncode($Grid->ReceivedUser->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Recevied->Visible) { // Recevied ?>
        <td data-name="Recevied" <?= $Grid->Recevied->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Recevied" class="form-group">
<input type="<?= $Grid->Recevied->getInputTextType() ?>" data-table="patient_services" data-field="x_Recevied" name="x<?= $Grid->RowIndex ?>_Recevied" id="x<?= $Grid->RowIndex ?>_Recevied" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Recevied->getPlaceHolder()) ?>" value="<?= $Grid->Recevied->EditValue ?>"<?= $Grid->Recevied->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Recevied->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Recevied" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Recevied" id="o<?= $Grid->RowIndex ?>_Recevied" value="<?= HtmlEncode($Grid->Recevied->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Recevied" class="form-group">
<input type="<?= $Grid->Recevied->getInputTextType() ?>" data-table="patient_services" data-field="x_Recevied" name="x<?= $Grid->RowIndex ?>_Recevied" id="x<?= $Grid->RowIndex ?>_Recevied" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Recevied->getPlaceHolder()) ?>" value="<?= $Grid->Recevied->EditValue ?>"<?= $Grid->Recevied->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Recevied->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Recevied">
<span<?= $Grid->Recevied->viewAttributes() ?>>
<?= $Grid->Recevied->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Recevied" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Recevied" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Recevied" value="<?= HtmlEncode($Grid->Recevied->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Recevied" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Recevied" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Recevied" value="<?= HtmlEncode($Grid->Recevied->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->DeptRecvDate->Visible) { // DeptRecvDate ?>
        <td data-name="DeptRecvDate" <?= $Grid->DeptRecvDate->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_DeptRecvDate" class="form-group">
<input type="<?= $Grid->DeptRecvDate->getInputTextType() ?>" data-table="patient_services" data-field="x_DeptRecvDate" name="x<?= $Grid->RowIndex ?>_DeptRecvDate" id="x<?= $Grid->RowIndex ?>_DeptRecvDate" placeholder="<?= HtmlEncode($Grid->DeptRecvDate->getPlaceHolder()) ?>" value="<?= $Grid->DeptRecvDate->EditValue ?>"<?= $Grid->DeptRecvDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DeptRecvDate->getErrorMessage() ?></div>
<?php if (!$Grid->DeptRecvDate->ReadOnly && !$Grid->DeptRecvDate->Disabled && !isset($Grid->DeptRecvDate->EditAttrs["readonly"]) && !isset($Grid->DeptRecvDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_servicesgrid", "x<?= $Grid->RowIndex ?>_DeptRecvDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DeptRecvDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DeptRecvDate" id="o<?= $Grid->RowIndex ?>_DeptRecvDate" value="<?= HtmlEncode($Grid->DeptRecvDate->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_DeptRecvDate" class="form-group">
<input type="<?= $Grid->DeptRecvDate->getInputTextType() ?>" data-table="patient_services" data-field="x_DeptRecvDate" name="x<?= $Grid->RowIndex ?>_DeptRecvDate" id="x<?= $Grid->RowIndex ?>_DeptRecvDate" placeholder="<?= HtmlEncode($Grid->DeptRecvDate->getPlaceHolder()) ?>" value="<?= $Grid->DeptRecvDate->EditValue ?>"<?= $Grid->DeptRecvDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DeptRecvDate->getErrorMessage() ?></div>
<?php if (!$Grid->DeptRecvDate->ReadOnly && !$Grid->DeptRecvDate->Disabled && !isset($Grid->DeptRecvDate->EditAttrs["readonly"]) && !isset($Grid->DeptRecvDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_servicesgrid", "x<?= $Grid->RowIndex ?>_DeptRecvDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_DeptRecvDate">
<span<?= $Grid->DeptRecvDate->viewAttributes() ?>>
<?= $Grid->DeptRecvDate->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_DeptRecvDate" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_DeptRecvDate" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_DeptRecvDate" value="<?= HtmlEncode($Grid->DeptRecvDate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DeptRecvDate" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_DeptRecvDate" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_DeptRecvDate" value="<?= HtmlEncode($Grid->DeptRecvDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->DeptRecvUser->Visible) { // DeptRecvUser ?>
        <td data-name="DeptRecvUser" <?= $Grid->DeptRecvUser->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_DeptRecvUser" class="form-group">
<input type="<?= $Grid->DeptRecvUser->getInputTextType() ?>" data-table="patient_services" data-field="x_DeptRecvUser" name="x<?= $Grid->RowIndex ?>_DeptRecvUser" id="x<?= $Grid->RowIndex ?>_DeptRecvUser" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DeptRecvUser->getPlaceHolder()) ?>" value="<?= $Grid->DeptRecvUser->EditValue ?>"<?= $Grid->DeptRecvUser->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DeptRecvUser->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DeptRecvUser" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DeptRecvUser" id="o<?= $Grid->RowIndex ?>_DeptRecvUser" value="<?= HtmlEncode($Grid->DeptRecvUser->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_DeptRecvUser" class="form-group">
<input type="<?= $Grid->DeptRecvUser->getInputTextType() ?>" data-table="patient_services" data-field="x_DeptRecvUser" name="x<?= $Grid->RowIndex ?>_DeptRecvUser" id="x<?= $Grid->RowIndex ?>_DeptRecvUser" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DeptRecvUser->getPlaceHolder()) ?>" value="<?= $Grid->DeptRecvUser->EditValue ?>"<?= $Grid->DeptRecvUser->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DeptRecvUser->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_DeptRecvUser">
<span<?= $Grid->DeptRecvUser->viewAttributes() ?>>
<?= $Grid->DeptRecvUser->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_DeptRecvUser" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_DeptRecvUser" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_DeptRecvUser" value="<?= HtmlEncode($Grid->DeptRecvUser->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DeptRecvUser" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_DeptRecvUser" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_DeptRecvUser" value="<?= HtmlEncode($Grid->DeptRecvUser->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->DeptRecived->Visible) { // DeptRecived ?>
        <td data-name="DeptRecived" <?= $Grid->DeptRecived->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_DeptRecived" class="form-group">
<input type="<?= $Grid->DeptRecived->getInputTextType() ?>" data-table="patient_services" data-field="x_DeptRecived" name="x<?= $Grid->RowIndex ?>_DeptRecived" id="x<?= $Grid->RowIndex ?>_DeptRecived" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DeptRecived->getPlaceHolder()) ?>" value="<?= $Grid->DeptRecived->EditValue ?>"<?= $Grid->DeptRecived->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DeptRecived->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DeptRecived" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DeptRecived" id="o<?= $Grid->RowIndex ?>_DeptRecived" value="<?= HtmlEncode($Grid->DeptRecived->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_DeptRecived" class="form-group">
<input type="<?= $Grid->DeptRecived->getInputTextType() ?>" data-table="patient_services" data-field="x_DeptRecived" name="x<?= $Grid->RowIndex ?>_DeptRecived" id="x<?= $Grid->RowIndex ?>_DeptRecived" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DeptRecived->getPlaceHolder()) ?>" value="<?= $Grid->DeptRecived->EditValue ?>"<?= $Grid->DeptRecived->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DeptRecived->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_DeptRecived">
<span<?= $Grid->DeptRecived->viewAttributes() ?>>
<?= $Grid->DeptRecived->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_DeptRecived" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_DeptRecived" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_DeptRecived" value="<?= HtmlEncode($Grid->DeptRecived->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_DeptRecived" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_DeptRecived" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_DeptRecived" value="<?= HtmlEncode($Grid->DeptRecived->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->SAuthDate->Visible) { // SAuthDate ?>
        <td data-name="SAuthDate" <?= $Grid->SAuthDate->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_SAuthDate" class="form-group">
<input type="<?= $Grid->SAuthDate->getInputTextType() ?>" data-table="patient_services" data-field="x_SAuthDate" name="x<?= $Grid->RowIndex ?>_SAuthDate" id="x<?= $Grid->RowIndex ?>_SAuthDate" placeholder="<?= HtmlEncode($Grid->SAuthDate->getPlaceHolder()) ?>" value="<?= $Grid->SAuthDate->EditValue ?>"<?= $Grid->SAuthDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SAuthDate->getErrorMessage() ?></div>
<?php if (!$Grid->SAuthDate->ReadOnly && !$Grid->SAuthDate->Disabled && !isset($Grid->SAuthDate->EditAttrs["readonly"]) && !isset($Grid->SAuthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_servicesgrid", "x<?= $Grid->RowIndex ?>_SAuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_services" data-field="x_SAuthDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SAuthDate" id="o<?= $Grid->RowIndex ?>_SAuthDate" value="<?= HtmlEncode($Grid->SAuthDate->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_SAuthDate" class="form-group">
<input type="<?= $Grid->SAuthDate->getInputTextType() ?>" data-table="patient_services" data-field="x_SAuthDate" name="x<?= $Grid->RowIndex ?>_SAuthDate" id="x<?= $Grid->RowIndex ?>_SAuthDate" placeholder="<?= HtmlEncode($Grid->SAuthDate->getPlaceHolder()) ?>" value="<?= $Grid->SAuthDate->EditValue ?>"<?= $Grid->SAuthDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SAuthDate->getErrorMessage() ?></div>
<?php if (!$Grid->SAuthDate->ReadOnly && !$Grid->SAuthDate->Disabled && !isset($Grid->SAuthDate->EditAttrs["readonly"]) && !isset($Grid->SAuthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_servicesgrid", "x<?= $Grid->RowIndex ?>_SAuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_SAuthDate">
<span<?= $Grid->SAuthDate->viewAttributes() ?>>
<?= $Grid->SAuthDate->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_SAuthDate" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_SAuthDate" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_SAuthDate" value="<?= HtmlEncode($Grid->SAuthDate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_SAuthDate" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_SAuthDate" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_SAuthDate" value="<?= HtmlEncode($Grid->SAuthDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->SAuthBy->Visible) { // SAuthBy ?>
        <td data-name="SAuthBy" <?= $Grid->SAuthBy->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_SAuthBy" class="form-group">
<input type="<?= $Grid->SAuthBy->getInputTextType() ?>" data-table="patient_services" data-field="x_SAuthBy" name="x<?= $Grid->RowIndex ?>_SAuthBy" id="x<?= $Grid->RowIndex ?>_SAuthBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->SAuthBy->getPlaceHolder()) ?>" value="<?= $Grid->SAuthBy->EditValue ?>"<?= $Grid->SAuthBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SAuthBy->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_SAuthBy" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SAuthBy" id="o<?= $Grid->RowIndex ?>_SAuthBy" value="<?= HtmlEncode($Grid->SAuthBy->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_SAuthBy" class="form-group">
<input type="<?= $Grid->SAuthBy->getInputTextType() ?>" data-table="patient_services" data-field="x_SAuthBy" name="x<?= $Grid->RowIndex ?>_SAuthBy" id="x<?= $Grid->RowIndex ?>_SAuthBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->SAuthBy->getPlaceHolder()) ?>" value="<?= $Grid->SAuthBy->EditValue ?>"<?= $Grid->SAuthBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SAuthBy->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_SAuthBy">
<span<?= $Grid->SAuthBy->viewAttributes() ?>>
<?= $Grid->SAuthBy->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_SAuthBy" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_SAuthBy" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_SAuthBy" value="<?= HtmlEncode($Grid->SAuthBy->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_SAuthBy" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_SAuthBy" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_SAuthBy" value="<?= HtmlEncode($Grid->SAuthBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->SAuthendicate->Visible) { // SAuthendicate ?>
        <td data-name="SAuthendicate" <?= $Grid->SAuthendicate->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_SAuthendicate" class="form-group">
<input type="<?= $Grid->SAuthendicate->getInputTextType() ?>" data-table="patient_services" data-field="x_SAuthendicate" name="x<?= $Grid->RowIndex ?>_SAuthendicate" id="x<?= $Grid->RowIndex ?>_SAuthendicate" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->SAuthendicate->getPlaceHolder()) ?>" value="<?= $Grid->SAuthendicate->EditValue ?>"<?= $Grid->SAuthendicate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SAuthendicate->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_SAuthendicate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SAuthendicate" id="o<?= $Grid->RowIndex ?>_SAuthendicate" value="<?= HtmlEncode($Grid->SAuthendicate->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_SAuthendicate" class="form-group">
<input type="<?= $Grid->SAuthendicate->getInputTextType() ?>" data-table="patient_services" data-field="x_SAuthendicate" name="x<?= $Grid->RowIndex ?>_SAuthendicate" id="x<?= $Grid->RowIndex ?>_SAuthendicate" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->SAuthendicate->getPlaceHolder()) ?>" value="<?= $Grid->SAuthendicate->EditValue ?>"<?= $Grid->SAuthendicate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SAuthendicate->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_SAuthendicate">
<span<?= $Grid->SAuthendicate->viewAttributes() ?>>
<?= $Grid->SAuthendicate->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_SAuthendicate" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_SAuthendicate" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_SAuthendicate" value="<?= HtmlEncode($Grid->SAuthendicate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_SAuthendicate" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_SAuthendicate" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_SAuthendicate" value="<?= HtmlEncode($Grid->SAuthendicate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->AuthDate->Visible) { // AuthDate ?>
        <td data-name="AuthDate" <?= $Grid->AuthDate->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_AuthDate" class="form-group">
<input type="<?= $Grid->AuthDate->getInputTextType() ?>" data-table="patient_services" data-field="x_AuthDate" name="x<?= $Grid->RowIndex ?>_AuthDate" id="x<?= $Grid->RowIndex ?>_AuthDate" placeholder="<?= HtmlEncode($Grid->AuthDate->getPlaceHolder()) ?>" value="<?= $Grid->AuthDate->EditValue ?>"<?= $Grid->AuthDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->AuthDate->getErrorMessage() ?></div>
<?php if (!$Grid->AuthDate->ReadOnly && !$Grid->AuthDate->Disabled && !isset($Grid->AuthDate->EditAttrs["readonly"]) && !isset($Grid->AuthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_servicesgrid", "x<?= $Grid->RowIndex ?>_AuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_services" data-field="x_AuthDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_AuthDate" id="o<?= $Grid->RowIndex ?>_AuthDate" value="<?= HtmlEncode($Grid->AuthDate->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_AuthDate" class="form-group">
<input type="<?= $Grid->AuthDate->getInputTextType() ?>" data-table="patient_services" data-field="x_AuthDate" name="x<?= $Grid->RowIndex ?>_AuthDate" id="x<?= $Grid->RowIndex ?>_AuthDate" placeholder="<?= HtmlEncode($Grid->AuthDate->getPlaceHolder()) ?>" value="<?= $Grid->AuthDate->EditValue ?>"<?= $Grid->AuthDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->AuthDate->getErrorMessage() ?></div>
<?php if (!$Grid->AuthDate->ReadOnly && !$Grid->AuthDate->Disabled && !isset($Grid->AuthDate->EditAttrs["readonly"]) && !isset($Grid->AuthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_servicesgrid", "x<?= $Grid->RowIndex ?>_AuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_AuthDate">
<span<?= $Grid->AuthDate->viewAttributes() ?>>
<?= $Grid->AuthDate->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_AuthDate" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_AuthDate" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_AuthDate" value="<?= HtmlEncode($Grid->AuthDate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_AuthDate" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_AuthDate" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_AuthDate" value="<?= HtmlEncode($Grid->AuthDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->AuthBy->Visible) { // AuthBy ?>
        <td data-name="AuthBy" <?= $Grid->AuthBy->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_AuthBy" class="form-group">
<input type="<?= $Grid->AuthBy->getInputTextType() ?>" data-table="patient_services" data-field="x_AuthBy" name="x<?= $Grid->RowIndex ?>_AuthBy" id="x<?= $Grid->RowIndex ?>_AuthBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->AuthBy->getPlaceHolder()) ?>" value="<?= $Grid->AuthBy->EditValue ?>"<?= $Grid->AuthBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->AuthBy->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_AuthBy" data-hidden="1" name="o<?= $Grid->RowIndex ?>_AuthBy" id="o<?= $Grid->RowIndex ?>_AuthBy" value="<?= HtmlEncode($Grid->AuthBy->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_AuthBy" class="form-group">
<input type="<?= $Grid->AuthBy->getInputTextType() ?>" data-table="patient_services" data-field="x_AuthBy" name="x<?= $Grid->RowIndex ?>_AuthBy" id="x<?= $Grid->RowIndex ?>_AuthBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->AuthBy->getPlaceHolder()) ?>" value="<?= $Grid->AuthBy->EditValue ?>"<?= $Grid->AuthBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->AuthBy->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_AuthBy">
<span<?= $Grid->AuthBy->viewAttributes() ?>>
<?= $Grid->AuthBy->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_AuthBy" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_AuthBy" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_AuthBy" value="<?= HtmlEncode($Grid->AuthBy->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_AuthBy" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_AuthBy" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_AuthBy" value="<?= HtmlEncode($Grid->AuthBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Authencate->Visible) { // Authencate ?>
        <td data-name="Authencate" <?= $Grid->Authencate->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Authencate" class="form-group">
<input type="<?= $Grid->Authencate->getInputTextType() ?>" data-table="patient_services" data-field="x_Authencate" name="x<?= $Grid->RowIndex ?>_Authencate" id="x<?= $Grid->RowIndex ?>_Authencate" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Authencate->getPlaceHolder()) ?>" value="<?= $Grid->Authencate->EditValue ?>"<?= $Grid->Authencate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Authencate->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Authencate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Authencate" id="o<?= $Grid->RowIndex ?>_Authencate" value="<?= HtmlEncode($Grid->Authencate->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Authencate" class="form-group">
<input type="<?= $Grid->Authencate->getInputTextType() ?>" data-table="patient_services" data-field="x_Authencate" name="x<?= $Grid->RowIndex ?>_Authencate" id="x<?= $Grid->RowIndex ?>_Authencate" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Authencate->getPlaceHolder()) ?>" value="<?= $Grid->Authencate->EditValue ?>"<?= $Grid->Authencate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Authencate->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Authencate">
<span<?= $Grid->Authencate->viewAttributes() ?>>
<?= $Grid->Authencate->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Authencate" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Authencate" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Authencate" value="<?= HtmlEncode($Grid->Authencate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Authencate" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Authencate" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Authencate" value="<?= HtmlEncode($Grid->Authencate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->EditDate->Visible) { // EditDate ?>
        <td data-name="EditDate" <?= $Grid->EditDate->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_EditDate" class="form-group">
<input type="<?= $Grid->EditDate->getInputTextType() ?>" data-table="patient_services" data-field="x_EditDate" name="x<?= $Grid->RowIndex ?>_EditDate" id="x<?= $Grid->RowIndex ?>_EditDate" placeholder="<?= HtmlEncode($Grid->EditDate->getPlaceHolder()) ?>" value="<?= $Grid->EditDate->EditValue ?>"<?= $Grid->EditDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->EditDate->getErrorMessage() ?></div>
<?php if (!$Grid->EditDate->ReadOnly && !$Grid->EditDate->Disabled && !isset($Grid->EditDate->EditAttrs["readonly"]) && !isset($Grid->EditDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_servicesgrid", "x<?= $Grid->RowIndex ?>_EditDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_services" data-field="x_EditDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_EditDate" id="o<?= $Grid->RowIndex ?>_EditDate" value="<?= HtmlEncode($Grid->EditDate->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_EditDate" class="form-group">
<input type="<?= $Grid->EditDate->getInputTextType() ?>" data-table="patient_services" data-field="x_EditDate" name="x<?= $Grid->RowIndex ?>_EditDate" id="x<?= $Grid->RowIndex ?>_EditDate" placeholder="<?= HtmlEncode($Grid->EditDate->getPlaceHolder()) ?>" value="<?= $Grid->EditDate->EditValue ?>"<?= $Grid->EditDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->EditDate->getErrorMessage() ?></div>
<?php if (!$Grid->EditDate->ReadOnly && !$Grid->EditDate->Disabled && !isset($Grid->EditDate->EditAttrs["readonly"]) && !isset($Grid->EditDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_servicesgrid", "x<?= $Grid->RowIndex ?>_EditDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_EditDate">
<span<?= $Grid->EditDate->viewAttributes() ?>>
<?= $Grid->EditDate->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_EditDate" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_EditDate" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_EditDate" value="<?= HtmlEncode($Grid->EditDate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_EditDate" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_EditDate" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_EditDate" value="<?= HtmlEncode($Grid->EditDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->EditBy->Visible) { // EditBy ?>
        <td data-name="EditBy" <?= $Grid->EditBy->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_EditBy" class="form-group">
<input type="<?= $Grid->EditBy->getInputTextType() ?>" data-table="patient_services" data-field="x_EditBy" name="x<?= $Grid->RowIndex ?>_EditBy" id="x<?= $Grid->RowIndex ?>_EditBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->EditBy->getPlaceHolder()) ?>" value="<?= $Grid->EditBy->EditValue ?>"<?= $Grid->EditBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->EditBy->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_EditBy" data-hidden="1" name="o<?= $Grid->RowIndex ?>_EditBy" id="o<?= $Grid->RowIndex ?>_EditBy" value="<?= HtmlEncode($Grid->EditBy->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_EditBy" class="form-group">
<input type="<?= $Grid->EditBy->getInputTextType() ?>" data-table="patient_services" data-field="x_EditBy" name="x<?= $Grid->RowIndex ?>_EditBy" id="x<?= $Grid->RowIndex ?>_EditBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->EditBy->getPlaceHolder()) ?>" value="<?= $Grid->EditBy->EditValue ?>"<?= $Grid->EditBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->EditBy->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_EditBy">
<span<?= $Grid->EditBy->viewAttributes() ?>>
<?= $Grid->EditBy->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_EditBy" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_EditBy" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_EditBy" value="<?= HtmlEncode($Grid->EditBy->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_EditBy" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_EditBy" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_EditBy" value="<?= HtmlEncode($Grid->EditBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Editted->Visible) { // Editted ?>
        <td data-name="Editted" <?= $Grid->Editted->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Editted" class="form-group">
<input type="<?= $Grid->Editted->getInputTextType() ?>" data-table="patient_services" data-field="x_Editted" name="x<?= $Grid->RowIndex ?>_Editted" id="x<?= $Grid->RowIndex ?>_Editted" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Editted->getPlaceHolder()) ?>" value="<?= $Grid->Editted->EditValue ?>"<?= $Grid->Editted->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Editted->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Editted" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Editted" id="o<?= $Grid->RowIndex ?>_Editted" value="<?= HtmlEncode($Grid->Editted->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Editted" class="form-group">
<input type="<?= $Grid->Editted->getInputTextType() ?>" data-table="patient_services" data-field="x_Editted" name="x<?= $Grid->RowIndex ?>_Editted" id="x<?= $Grid->RowIndex ?>_Editted" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Editted->getPlaceHolder()) ?>" value="<?= $Grid->Editted->EditValue ?>"<?= $Grid->Editted->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Editted->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Editted">
<span<?= $Grid->Editted->viewAttributes() ?>>
<?= $Grid->Editted->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Editted" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Editted" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Editted" value="<?= HtmlEncode($Grid->Editted->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Editted" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Editted" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Editted" value="<?= HtmlEncode($Grid->Editted->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PatID->Visible) { // PatID ?>
        <td data-name="PatID" <?= $Grid->PatID->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->PatID->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_PatID" class="form-group">
<span<?= $Grid->PatID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatID->getDisplayValue($Grid->PatID->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_PatID" name="x<?= $Grid->RowIndex ?>_PatID" value="<?= HtmlEncode($Grid->PatID->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_PatID" class="form-group">
<input type="<?= $Grid->PatID->getInputTextType() ?>" data-table="patient_services" data-field="x_PatID" name="x<?= $Grid->RowIndex ?>_PatID" id="x<?= $Grid->RowIndex ?>_PatID" size="30" placeholder="<?= HtmlEncode($Grid->PatID->getPlaceHolder()) ?>" value="<?= $Grid->PatID->EditValue ?>"<?= $Grid->PatID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatID->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_PatID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatID" id="o<?= $Grid->RowIndex ?>_PatID" value="<?= HtmlEncode($Grid->PatID->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Grid->PatID->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_PatID" class="form-group">
<span<?= $Grid->PatID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatID->getDisplayValue($Grid->PatID->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_PatID" name="x<?= $Grid->RowIndex ?>_PatID" value="<?= HtmlEncode($Grid->PatID->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_PatID" class="form-group">
<input type="<?= $Grid->PatID->getInputTextType() ?>" data-table="patient_services" data-field="x_PatID" name="x<?= $Grid->RowIndex ?>_PatID" id="x<?= $Grid->RowIndex ?>_PatID" size="30" placeholder="<?= HtmlEncode($Grid->PatID->getPlaceHolder()) ?>" value="<?= $Grid->PatID->EditValue ?>"<?= $Grid->PatID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatID->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_PatID">
<span<?= $Grid->PatID->viewAttributes() ?>>
<?= $Grid->PatID->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_PatID" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_PatID" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_PatID" value="<?= HtmlEncode($Grid->PatID->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_PatID" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_PatID" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_PatID" value="<?= HtmlEncode($Grid->PatID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PatientId->Visible) { // PatientId ?>
        <td data-name="PatientId" <?= $Grid->PatientId->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_PatientId" class="form-group">
<input type="<?= $Grid->PatientId->getInputTextType() ?>" data-table="patient_services" data-field="x_PatientId" name="x<?= $Grid->RowIndex ?>_PatientId" id="x<?= $Grid->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatientId->getPlaceHolder()) ?>" value="<?= $Grid->PatientId->EditValue ?>"<?= $Grid->PatientId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientId->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_PatientId" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatientId" id="o<?= $Grid->RowIndex ?>_PatientId" value="<?= HtmlEncode($Grid->PatientId->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_PatientId" class="form-group">
<input type="<?= $Grid->PatientId->getInputTextType() ?>" data-table="patient_services" data-field="x_PatientId" name="x<?= $Grid->RowIndex ?>_PatientId" id="x<?= $Grid->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatientId->getPlaceHolder()) ?>" value="<?= $Grid->PatientId->EditValue ?>"<?= $Grid->PatientId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientId->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_PatientId">
<span<?= $Grid->PatientId->viewAttributes() ?>>
<?= $Grid->PatientId->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_PatientId" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_PatientId" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_PatientId" value="<?= HtmlEncode($Grid->PatientId->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_PatientId" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_PatientId" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_PatientId" value="<?= HtmlEncode($Grid->PatientId->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Mobile->Visible) { // Mobile ?>
        <td data-name="Mobile" <?= $Grid->Mobile->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Mobile" class="form-group">
<input type="<?= $Grid->Mobile->getInputTextType() ?>" data-table="patient_services" data-field="x_Mobile" name="x<?= $Grid->RowIndex ?>_Mobile" id="x<?= $Grid->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Mobile->getPlaceHolder()) ?>" value="<?= $Grid->Mobile->EditValue ?>"<?= $Grid->Mobile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Mobile->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Mobile" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Mobile" id="o<?= $Grid->RowIndex ?>_Mobile" value="<?= HtmlEncode($Grid->Mobile->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Mobile" class="form-group">
<input type="<?= $Grid->Mobile->getInputTextType() ?>" data-table="patient_services" data-field="x_Mobile" name="x<?= $Grid->RowIndex ?>_Mobile" id="x<?= $Grid->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Mobile->getPlaceHolder()) ?>" value="<?= $Grid->Mobile->EditValue ?>"<?= $Grid->Mobile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Mobile->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Mobile">
<span<?= $Grid->Mobile->viewAttributes() ?>>
<?= $Grid->Mobile->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Mobile" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Mobile" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Mobile" value="<?= HtmlEncode($Grid->Mobile->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Mobile" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Mobile" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Mobile" value="<?= HtmlEncode($Grid->Mobile->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->CId->Visible) { // CId ?>
        <td data-name="CId" <?= $Grid->CId->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_CId" class="form-group">
<input type="<?= $Grid->CId->getInputTextType() ?>" data-table="patient_services" data-field="x_CId" name="x<?= $Grid->RowIndex ?>_CId" id="x<?= $Grid->RowIndex ?>_CId" size="30" placeholder="<?= HtmlEncode($Grid->CId->getPlaceHolder()) ?>" value="<?= $Grid->CId->EditValue ?>"<?= $Grid->CId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->CId->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_CId" data-hidden="1" name="o<?= $Grid->RowIndex ?>_CId" id="o<?= $Grid->RowIndex ?>_CId" value="<?= HtmlEncode($Grid->CId->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_CId" class="form-group">
<input type="<?= $Grid->CId->getInputTextType() ?>" data-table="patient_services" data-field="x_CId" name="x<?= $Grid->RowIndex ?>_CId" id="x<?= $Grid->RowIndex ?>_CId" size="30" placeholder="<?= HtmlEncode($Grid->CId->getPlaceHolder()) ?>" value="<?= $Grid->CId->EditValue ?>"<?= $Grid->CId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->CId->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_CId">
<span<?= $Grid->CId->viewAttributes() ?>>
<?= $Grid->CId->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_CId" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_CId" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_CId" value="<?= HtmlEncode($Grid->CId->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_CId" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_CId" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_CId" value="<?= HtmlEncode($Grid->CId->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Order->Visible) { // Order ?>
        <td data-name="Order" <?= $Grid->Order->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Order" class="form-group">
<input type="<?= $Grid->Order->getInputTextType() ?>" data-table="patient_services" data-field="x_Order" name="x<?= $Grid->RowIndex ?>_Order" id="x<?= $Grid->RowIndex ?>_Order" size="30" placeholder="<?= HtmlEncode($Grid->Order->getPlaceHolder()) ?>" value="<?= $Grid->Order->EditValue ?>"<?= $Grid->Order->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Order->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Order" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Order" id="o<?= $Grid->RowIndex ?>_Order" value="<?= HtmlEncode($Grid->Order->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Order" class="form-group">
<input type="<?= $Grid->Order->getInputTextType() ?>" data-table="patient_services" data-field="x_Order" name="x<?= $Grid->RowIndex ?>_Order" id="x<?= $Grid->RowIndex ?>_Order" size="30" placeholder="<?= HtmlEncode($Grid->Order->getPlaceHolder()) ?>" value="<?= $Grid->Order->EditValue ?>"<?= $Grid->Order->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Order->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Order">
<span<?= $Grid->Order->viewAttributes() ?>>
<?= $Grid->Order->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Order" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Order" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Order" value="<?= HtmlEncode($Grid->Order->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Order" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Order" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Order" value="<?= HtmlEncode($Grid->Order->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ResType->Visible) { // ResType ?>
        <td data-name="ResType" <?= $Grid->ResType->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_ResType" class="form-group">
<input type="<?= $Grid->ResType->getInputTextType() ?>" data-table="patient_services" data-field="x_ResType" name="x<?= $Grid->RowIndex ?>_ResType" id="x<?= $Grid->RowIndex ?>_ResType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ResType->getPlaceHolder()) ?>" value="<?= $Grid->ResType->EditValue ?>"<?= $Grid->ResType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ResType->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_ResType" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ResType" id="o<?= $Grid->RowIndex ?>_ResType" value="<?= HtmlEncode($Grid->ResType->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_ResType" class="form-group">
<input type="<?= $Grid->ResType->getInputTextType() ?>" data-table="patient_services" data-field="x_ResType" name="x<?= $Grid->RowIndex ?>_ResType" id="x<?= $Grid->RowIndex ?>_ResType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ResType->getPlaceHolder()) ?>" value="<?= $Grid->ResType->EditValue ?>"<?= $Grid->ResType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ResType->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_ResType">
<span<?= $Grid->ResType->viewAttributes() ?>>
<?= $Grid->ResType->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_ResType" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_ResType" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_ResType" value="<?= HtmlEncode($Grid->ResType->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_ResType" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_ResType" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_ResType" value="<?= HtmlEncode($Grid->ResType->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Sample->Visible) { // Sample ?>
        <td data-name="Sample" <?= $Grid->Sample->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Sample" class="form-group">
<input type="<?= $Grid->Sample->getInputTextType() ?>" data-table="patient_services" data-field="x_Sample" name="x<?= $Grid->RowIndex ?>_Sample" id="x<?= $Grid->RowIndex ?>_Sample" size="30" maxlength="150" placeholder="<?= HtmlEncode($Grid->Sample->getPlaceHolder()) ?>" value="<?= $Grid->Sample->EditValue ?>"<?= $Grid->Sample->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Sample->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Sample" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Sample" id="o<?= $Grid->RowIndex ?>_Sample" value="<?= HtmlEncode($Grid->Sample->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Sample" class="form-group">
<input type="<?= $Grid->Sample->getInputTextType() ?>" data-table="patient_services" data-field="x_Sample" name="x<?= $Grid->RowIndex ?>_Sample" id="x<?= $Grid->RowIndex ?>_Sample" size="30" maxlength="150" placeholder="<?= HtmlEncode($Grid->Sample->getPlaceHolder()) ?>" value="<?= $Grid->Sample->EditValue ?>"<?= $Grid->Sample->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Sample->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Sample">
<span<?= $Grid->Sample->viewAttributes() ?>>
<?= $Grid->Sample->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Sample" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Sample" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Sample" value="<?= HtmlEncode($Grid->Sample->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Sample" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Sample" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Sample" value="<?= HtmlEncode($Grid->Sample->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->NoD->Visible) { // NoD ?>
        <td data-name="NoD" <?= $Grid->NoD->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_NoD" class="form-group">
<input type="<?= $Grid->NoD->getInputTextType() ?>" data-table="patient_services" data-field="x_NoD" name="x<?= $Grid->RowIndex ?>_NoD" id="x<?= $Grid->RowIndex ?>_NoD" size="30" placeholder="<?= HtmlEncode($Grid->NoD->getPlaceHolder()) ?>" value="<?= $Grid->NoD->EditValue ?>"<?= $Grid->NoD->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->NoD->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_NoD" data-hidden="1" name="o<?= $Grid->RowIndex ?>_NoD" id="o<?= $Grid->RowIndex ?>_NoD" value="<?= HtmlEncode($Grid->NoD->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_NoD" class="form-group">
<input type="<?= $Grid->NoD->getInputTextType() ?>" data-table="patient_services" data-field="x_NoD" name="x<?= $Grid->RowIndex ?>_NoD" id="x<?= $Grid->RowIndex ?>_NoD" size="30" placeholder="<?= HtmlEncode($Grid->NoD->getPlaceHolder()) ?>" value="<?= $Grid->NoD->EditValue ?>"<?= $Grid->NoD->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->NoD->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_NoD">
<span<?= $Grid->NoD->viewAttributes() ?>>
<?= $Grid->NoD->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_NoD" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_NoD" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_NoD" value="<?= HtmlEncode($Grid->NoD->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_NoD" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_NoD" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_NoD" value="<?= HtmlEncode($Grid->NoD->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->BillOrder->Visible) { // BillOrder ?>
        <td data-name="BillOrder" <?= $Grid->BillOrder->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_BillOrder" class="form-group">
<input type="<?= $Grid->BillOrder->getInputTextType() ?>" data-table="patient_services" data-field="x_BillOrder" name="x<?= $Grid->RowIndex ?>_BillOrder" id="x<?= $Grid->RowIndex ?>_BillOrder" size="30" placeholder="<?= HtmlEncode($Grid->BillOrder->getPlaceHolder()) ?>" value="<?= $Grid->BillOrder->EditValue ?>"<?= $Grid->BillOrder->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BillOrder->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_BillOrder" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BillOrder" id="o<?= $Grid->RowIndex ?>_BillOrder" value="<?= HtmlEncode($Grid->BillOrder->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_BillOrder" class="form-group">
<input type="<?= $Grid->BillOrder->getInputTextType() ?>" data-table="patient_services" data-field="x_BillOrder" name="x<?= $Grid->RowIndex ?>_BillOrder" id="x<?= $Grid->RowIndex ?>_BillOrder" size="30" placeholder="<?= HtmlEncode($Grid->BillOrder->getPlaceHolder()) ?>" value="<?= $Grid->BillOrder->EditValue ?>"<?= $Grid->BillOrder->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BillOrder->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_BillOrder">
<span<?= $Grid->BillOrder->viewAttributes() ?>>
<?= $Grid->BillOrder->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_BillOrder" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_BillOrder" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_BillOrder" value="<?= HtmlEncode($Grid->BillOrder->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_BillOrder" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_BillOrder" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_BillOrder" value="<?= HtmlEncode($Grid->BillOrder->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Inactive->Visible) { // Inactive ?>
        <td data-name="Inactive" <?= $Grid->Inactive->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Inactive" class="form-group">
<input type="<?= $Grid->Inactive->getInputTextType() ?>" data-table="patient_services" data-field="x_Inactive" name="x<?= $Grid->RowIndex ?>_Inactive" id="x<?= $Grid->RowIndex ?>_Inactive" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Inactive->getPlaceHolder()) ?>" value="<?= $Grid->Inactive->EditValue ?>"<?= $Grid->Inactive->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Inactive->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Inactive" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Inactive" id="o<?= $Grid->RowIndex ?>_Inactive" value="<?= HtmlEncode($Grid->Inactive->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Inactive" class="form-group">
<input type="<?= $Grid->Inactive->getInputTextType() ?>" data-table="patient_services" data-field="x_Inactive" name="x<?= $Grid->RowIndex ?>_Inactive" id="x<?= $Grid->RowIndex ?>_Inactive" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Inactive->getPlaceHolder()) ?>" value="<?= $Grid->Inactive->EditValue ?>"<?= $Grid->Inactive->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Inactive->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Inactive">
<span<?= $Grid->Inactive->viewAttributes() ?>>
<?= $Grid->Inactive->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Inactive" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Inactive" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Inactive" value="<?= HtmlEncode($Grid->Inactive->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Inactive" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Inactive" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Inactive" value="<?= HtmlEncode($Grid->Inactive->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->CollSample->Visible) { // CollSample ?>
        <td data-name="CollSample" <?= $Grid->CollSample->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_CollSample" class="form-group">
<input type="<?= $Grid->CollSample->getInputTextType() ?>" data-table="patient_services" data-field="x_CollSample" name="x<?= $Grid->RowIndex ?>_CollSample" id="x<?= $Grid->RowIndex ?>_CollSample" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->CollSample->getPlaceHolder()) ?>" value="<?= $Grid->CollSample->EditValue ?>"<?= $Grid->CollSample->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->CollSample->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_CollSample" data-hidden="1" name="o<?= $Grid->RowIndex ?>_CollSample" id="o<?= $Grid->RowIndex ?>_CollSample" value="<?= HtmlEncode($Grid->CollSample->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_CollSample" class="form-group">
<input type="<?= $Grid->CollSample->getInputTextType() ?>" data-table="patient_services" data-field="x_CollSample" name="x<?= $Grid->RowIndex ?>_CollSample" id="x<?= $Grid->RowIndex ?>_CollSample" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->CollSample->getPlaceHolder()) ?>" value="<?= $Grid->CollSample->EditValue ?>"<?= $Grid->CollSample->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->CollSample->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_CollSample">
<span<?= $Grid->CollSample->viewAttributes() ?>>
<?= $Grid->CollSample->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_CollSample" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_CollSample" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_CollSample" value="<?= HtmlEncode($Grid->CollSample->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_CollSample" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_CollSample" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_CollSample" value="<?= HtmlEncode($Grid->CollSample->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->TestType->Visible) { // TestType ?>
        <td data-name="TestType" <?= $Grid->TestType->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_TestType" class="form-group">
<input type="<?= $Grid->TestType->getInputTextType() ?>" data-table="patient_services" data-field="x_TestType" name="x<?= $Grid->RowIndex ?>_TestType" id="x<?= $Grid->RowIndex ?>_TestType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->TestType->getPlaceHolder()) ?>" value="<?= $Grid->TestType->EditValue ?>"<?= $Grid->TestType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TestType->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_TestType" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TestType" id="o<?= $Grid->RowIndex ?>_TestType" value="<?= HtmlEncode($Grid->TestType->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_TestType" class="form-group">
<input type="<?= $Grid->TestType->getInputTextType() ?>" data-table="patient_services" data-field="x_TestType" name="x<?= $Grid->RowIndex ?>_TestType" id="x<?= $Grid->RowIndex ?>_TestType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->TestType->getPlaceHolder()) ?>" value="<?= $Grid->TestType->EditValue ?>"<?= $Grid->TestType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TestType->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_TestType">
<span<?= $Grid->TestType->viewAttributes() ?>>
<?= $Grid->TestType->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_TestType" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_TestType" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_TestType" value="<?= HtmlEncode($Grid->TestType->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_TestType" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_TestType" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_TestType" value="<?= HtmlEncode($Grid->TestType->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Repeated->Visible) { // Repeated ?>
        <td data-name="Repeated" <?= $Grid->Repeated->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Repeated" class="form-group">
<input type="<?= $Grid->Repeated->getInputTextType() ?>" data-table="patient_services" data-field="x_Repeated" name="x<?= $Grid->RowIndex ?>_Repeated" id="x<?= $Grid->RowIndex ?>_Repeated" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Repeated->getPlaceHolder()) ?>" value="<?= $Grid->Repeated->EditValue ?>"<?= $Grid->Repeated->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Repeated->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Repeated" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Repeated" id="o<?= $Grid->RowIndex ?>_Repeated" value="<?= HtmlEncode($Grid->Repeated->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Repeated" class="form-group">
<input type="<?= $Grid->Repeated->getInputTextType() ?>" data-table="patient_services" data-field="x_Repeated" name="x<?= $Grid->RowIndex ?>_Repeated" id="x<?= $Grid->RowIndex ?>_Repeated" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Repeated->getPlaceHolder()) ?>" value="<?= $Grid->Repeated->EditValue ?>"<?= $Grid->Repeated->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Repeated->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Repeated">
<span<?= $Grid->Repeated->viewAttributes() ?>>
<?= $Grid->Repeated->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Repeated" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Repeated" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Repeated" value="<?= HtmlEncode($Grid->Repeated->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Repeated" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Repeated" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Repeated" value="<?= HtmlEncode($Grid->Repeated->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->RepeatedBy->Visible) { // RepeatedBy ?>
        <td data-name="RepeatedBy" <?= $Grid->RepeatedBy->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_RepeatedBy" class="form-group">
<input type="<?= $Grid->RepeatedBy->getInputTextType() ?>" data-table="patient_services" data-field="x_RepeatedBy" name="x<?= $Grid->RowIndex ?>_RepeatedBy" id="x<?= $Grid->RowIndex ?>_RepeatedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->RepeatedBy->getPlaceHolder()) ?>" value="<?= $Grid->RepeatedBy->EditValue ?>"<?= $Grid->RepeatedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->RepeatedBy->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_RepeatedBy" data-hidden="1" name="o<?= $Grid->RowIndex ?>_RepeatedBy" id="o<?= $Grid->RowIndex ?>_RepeatedBy" value="<?= HtmlEncode($Grid->RepeatedBy->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_RepeatedBy" class="form-group">
<input type="<?= $Grid->RepeatedBy->getInputTextType() ?>" data-table="patient_services" data-field="x_RepeatedBy" name="x<?= $Grid->RowIndex ?>_RepeatedBy" id="x<?= $Grid->RowIndex ?>_RepeatedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->RepeatedBy->getPlaceHolder()) ?>" value="<?= $Grid->RepeatedBy->EditValue ?>"<?= $Grid->RepeatedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->RepeatedBy->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_RepeatedBy">
<span<?= $Grid->RepeatedBy->viewAttributes() ?>>
<?= $Grid->RepeatedBy->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_RepeatedBy" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_RepeatedBy" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_RepeatedBy" value="<?= HtmlEncode($Grid->RepeatedBy->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_RepeatedBy" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_RepeatedBy" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_RepeatedBy" value="<?= HtmlEncode($Grid->RepeatedBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->RepeatedDate->Visible) { // RepeatedDate ?>
        <td data-name="RepeatedDate" <?= $Grid->RepeatedDate->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_RepeatedDate" class="form-group">
<input type="<?= $Grid->RepeatedDate->getInputTextType() ?>" data-table="patient_services" data-field="x_RepeatedDate" name="x<?= $Grid->RowIndex ?>_RepeatedDate" id="x<?= $Grid->RowIndex ?>_RepeatedDate" placeholder="<?= HtmlEncode($Grid->RepeatedDate->getPlaceHolder()) ?>" value="<?= $Grid->RepeatedDate->EditValue ?>"<?= $Grid->RepeatedDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->RepeatedDate->getErrorMessage() ?></div>
<?php if (!$Grid->RepeatedDate->ReadOnly && !$Grid->RepeatedDate->Disabled && !isset($Grid->RepeatedDate->EditAttrs["readonly"]) && !isset($Grid->RepeatedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_servicesgrid", "x<?= $Grid->RowIndex ?>_RepeatedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_services" data-field="x_RepeatedDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_RepeatedDate" id="o<?= $Grid->RowIndex ?>_RepeatedDate" value="<?= HtmlEncode($Grid->RepeatedDate->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_RepeatedDate" class="form-group">
<input type="<?= $Grid->RepeatedDate->getInputTextType() ?>" data-table="patient_services" data-field="x_RepeatedDate" name="x<?= $Grid->RowIndex ?>_RepeatedDate" id="x<?= $Grid->RowIndex ?>_RepeatedDate" placeholder="<?= HtmlEncode($Grid->RepeatedDate->getPlaceHolder()) ?>" value="<?= $Grid->RepeatedDate->EditValue ?>"<?= $Grid->RepeatedDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->RepeatedDate->getErrorMessage() ?></div>
<?php if (!$Grid->RepeatedDate->ReadOnly && !$Grid->RepeatedDate->Disabled && !isset($Grid->RepeatedDate->EditAttrs["readonly"]) && !isset($Grid->RepeatedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_servicesgrid", "x<?= $Grid->RowIndex ?>_RepeatedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_RepeatedDate">
<span<?= $Grid->RepeatedDate->viewAttributes() ?>>
<?= $Grid->RepeatedDate->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_RepeatedDate" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_RepeatedDate" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_RepeatedDate" value="<?= HtmlEncode($Grid->RepeatedDate->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_RepeatedDate" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_RepeatedDate" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_RepeatedDate" value="<?= HtmlEncode($Grid->RepeatedDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->serviceID->Visible) { // serviceID ?>
        <td data-name="serviceID" <?= $Grid->serviceID->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_serviceID" class="form-group">
<input type="<?= $Grid->serviceID->getInputTextType() ?>" data-table="patient_services" data-field="x_serviceID" name="x<?= $Grid->RowIndex ?>_serviceID" id="x<?= $Grid->RowIndex ?>_serviceID" size="30" placeholder="<?= HtmlEncode($Grid->serviceID->getPlaceHolder()) ?>" value="<?= $Grid->serviceID->EditValue ?>"<?= $Grid->serviceID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->serviceID->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_serviceID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_serviceID" id="o<?= $Grid->RowIndex ?>_serviceID" value="<?= HtmlEncode($Grid->serviceID->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_serviceID" class="form-group">
<input type="<?= $Grid->serviceID->getInputTextType() ?>" data-table="patient_services" data-field="x_serviceID" name="x<?= $Grid->RowIndex ?>_serviceID" id="x<?= $Grid->RowIndex ?>_serviceID" size="30" placeholder="<?= HtmlEncode($Grid->serviceID->getPlaceHolder()) ?>" value="<?= $Grid->serviceID->EditValue ?>"<?= $Grid->serviceID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->serviceID->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_serviceID">
<span<?= $Grid->serviceID->viewAttributes() ?>>
<?= $Grid->serviceID->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_serviceID" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_serviceID" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_serviceID" value="<?= HtmlEncode($Grid->serviceID->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_serviceID" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_serviceID" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_serviceID" value="<?= HtmlEncode($Grid->serviceID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Service_Type->Visible) { // Service_Type ?>
        <td data-name="Service_Type" <?= $Grid->Service_Type->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Service_Type" class="form-group">
<input type="<?= $Grid->Service_Type->getInputTextType() ?>" data-table="patient_services" data-field="x_Service_Type" name="x<?= $Grid->RowIndex ?>_Service_Type" id="x<?= $Grid->RowIndex ?>_Service_Type" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Service_Type->getPlaceHolder()) ?>" value="<?= $Grid->Service_Type->EditValue ?>"<?= $Grid->Service_Type->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Service_Type->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Service_Type" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Service_Type" id="o<?= $Grid->RowIndex ?>_Service_Type" value="<?= HtmlEncode($Grid->Service_Type->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Service_Type" class="form-group">
<input type="<?= $Grid->Service_Type->getInputTextType() ?>" data-table="patient_services" data-field="x_Service_Type" name="x<?= $Grid->RowIndex ?>_Service_Type" id="x<?= $Grid->RowIndex ?>_Service_Type" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Service_Type->getPlaceHolder()) ?>" value="<?= $Grid->Service_Type->EditValue ?>"<?= $Grid->Service_Type->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Service_Type->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Service_Type">
<span<?= $Grid->Service_Type->viewAttributes() ?>>
<?= $Grid->Service_Type->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Service_Type" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Service_Type" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Service_Type" value="<?= HtmlEncode($Grid->Service_Type->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Service_Type" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Service_Type" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Service_Type" value="<?= HtmlEncode($Grid->Service_Type->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Service_Department->Visible) { // Service_Department ?>
        <td data-name="Service_Department" <?= $Grid->Service_Department->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Service_Department" class="form-group">
<input type="<?= $Grid->Service_Department->getInputTextType() ?>" data-table="patient_services" data-field="x_Service_Department" name="x<?= $Grid->RowIndex ?>_Service_Department" id="x<?= $Grid->RowIndex ?>_Service_Department" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Service_Department->getPlaceHolder()) ?>" value="<?= $Grid->Service_Department->EditValue ?>"<?= $Grid->Service_Department->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Service_Department->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Service_Department" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Service_Department" id="o<?= $Grid->RowIndex ?>_Service_Department" value="<?= HtmlEncode($Grid->Service_Department->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Service_Department" class="form-group">
<input type="<?= $Grid->Service_Department->getInputTextType() ?>" data-table="patient_services" data-field="x_Service_Department" name="x<?= $Grid->RowIndex ?>_Service_Department" id="x<?= $Grid->RowIndex ?>_Service_Department" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Service_Department->getPlaceHolder()) ?>" value="<?= $Grid->Service_Department->EditValue ?>"<?= $Grid->Service_Department->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Service_Department->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_Service_Department">
<span<?= $Grid->Service_Department->viewAttributes() ?>>
<?= $Grid->Service_Department->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_Service_Department" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Service_Department" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_Service_Department" value="<?= HtmlEncode($Grid->Service_Department->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_Service_Department" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Service_Department" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_Service_Department" value="<?= HtmlEncode($Grid->Service_Department->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->RequestNo->Visible) { // RequestNo ?>
        <td data-name="RequestNo" <?= $Grid->RequestNo->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_RequestNo" class="form-group">
<input type="<?= $Grid->RequestNo->getInputTextType() ?>" data-table="patient_services" data-field="x_RequestNo" name="x<?= $Grid->RowIndex ?>_RequestNo" id="x<?= $Grid->RowIndex ?>_RequestNo" size="30" placeholder="<?= HtmlEncode($Grid->RequestNo->getPlaceHolder()) ?>" value="<?= $Grid->RequestNo->EditValue ?>"<?= $Grid->RequestNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->RequestNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_services" data-field="x_RequestNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_RequestNo" id="o<?= $Grid->RowIndex ?>_RequestNo" value="<?= HtmlEncode($Grid->RequestNo->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_RequestNo" class="form-group">
<input type="<?= $Grid->RequestNo->getInputTextType() ?>" data-table="patient_services" data-field="x_RequestNo" name="x<?= $Grid->RowIndex ?>_RequestNo" id="x<?= $Grid->RowIndex ?>_RequestNo" size="30" placeholder="<?= HtmlEncode($Grid->RequestNo->getPlaceHolder()) ?>" value="<?= $Grid->RequestNo->EditValue ?>"<?= $Grid->RequestNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->RequestNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_services_RequestNo">
<span<?= $Grid->RequestNo->viewAttributes() ?>>
<?= $Grid->RequestNo->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_services" data-field="x_RequestNo" data-hidden="1" name="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_RequestNo" id="fpatient_servicesgrid$x<?= $Grid->RowIndex ?>_RequestNo" value="<?= HtmlEncode($Grid->RequestNo->FormValue) ?>">
<input type="hidden" data-table="patient_services" data-field="x_RequestNo" data-hidden="1" name="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_RequestNo" id="fpatient_servicesgrid$o<?= $Grid->RowIndex ?>_RequestNo" value="<?= HtmlEncode($Grid->RequestNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Grid->ListOptions->render("body", "right", $Grid->RowCount);
?>
    </tr>
<?php if ($Grid->RowType == ROWTYPE_ADD || $Grid->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid","load"], function () {
    fpatient_servicesgrid.updateLists(<?= $Grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
    }
    } // End delete row checking
    if (!$Grid->isGridAdd() || $Grid->CurrentMode == "copy")
        if (!$Grid->Recordset->EOF) {
            $Grid->Recordset->moveNext();
        }
}
?>
<?php
    if ($Grid->CurrentMode == "add" || $Grid->CurrentMode == "copy" || $Grid->CurrentMode == "edit") {
        $Grid->RowIndex = '$rowindex$';
        $Grid->loadRowValues();

        // Set row properties
        $Grid->resetAttributes();
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowIndex, "id" => "r0_patient_services", "data-rowtype" => ROWTYPE_ADD]);
        $Grid->RowAttrs->appendClass("ew-template");
        $Grid->RowType = ROWTYPE_ADD;

        // Render row
        $Grid->renderRow();

        // Render list options
        $Grid->renderListOptions();
        $Grid->StartRowCount = 0;
?>
    <tr <?= $Grid->rowAttributes() ?>>
<?php
// Render list options (body, left)
$Grid->ListOptions->render("body", "left", $Grid->RowIndex);
?>
    <?php if ($Grid->id->Visible) { // id ?>
        <td data-name="id">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_id" class="form-group patient_services_id"></span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_id" class="form-group patient_services_id">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Reception->Visible) { // Reception ?>
        <td data-name="Reception">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->Reception->getSessionValue() != "") { ?>
<span id="el$rowindex$_patient_services_Reception" class="form-group patient_services_Reception">
<span<?= $Grid->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Reception->getDisplayValue($Grid->Reception->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_Reception" name="x<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_patient_services_Reception" class="form-group patient_services_Reception">
<input type="<?= $Grid->Reception->getInputTextType() ?>" data-table="patient_services" data-field="x_Reception" name="x<?= $Grid->RowIndex ?>_Reception" id="x<?= $Grid->RowIndex ?>_Reception" size="30" placeholder="<?= HtmlEncode($Grid->Reception->getPlaceHolder()) ?>" value="<?= $Grid->Reception->EditValue ?>"<?= $Grid->Reception->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Reception->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Reception" class="form-group patient_services_Reception">
<span<?= $Grid->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Reception->getDisplayValue($Grid->Reception->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Reception" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Reception" id="x<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Reception" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Reception" id="o<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Services->Visible) { // Services ?>
        <td data-name="Services">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Services" class="form-group patient_services_Services">
<?php
$onchange = $Grid->Services->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->Services->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_Services" class="ew-auto-suggest">
    <input type="<?= $Grid->Services->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_Services" id="sv_x<?= $Grid->RowIndex ?>_Services" value="<?= RemoveHtml($Grid->Services->EditValue) ?>" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->Services->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->Services->getPlaceHolder()) ?>"<?= $Grid->Services->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient_services" data-field="x_Services" data-input="sv_x<?= $Grid->RowIndex ?>_Services" data-value-separator="<?= $Grid->Services->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_Services" id="x<?= $Grid->RowIndex ?>_Services" value="<?= HtmlEncode($Grid->Services->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->Services->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_servicesgrid"], function() {
    fpatient_servicesgrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_Services","forceSelect":true}, ew.vars.tables.patient_services.fields.Services.autoSuggestOptions));
});
</script>
<?= $Grid->Services->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_Services") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Services" class="form-group patient_services_Services">
<span<?= $Grid->Services->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Services->getDisplayValue($Grid->Services->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Services" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Services" id="x<?= $Grid->RowIndex ?>_Services" value="<?= HtmlEncode($Grid->Services->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Services" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Services" id="o<?= $Grid->RowIndex ?>_Services" value="<?= HtmlEncode($Grid->Services->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->amount->Visible) { // amount ?>
        <td data-name="amount">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_amount" class="form-group patient_services_amount">
<input type="<?= $Grid->amount->getInputTextType() ?>" data-table="patient_services" data-field="x_amount" name="x<?= $Grid->RowIndex ?>_amount" id="x<?= $Grid->RowIndex ?>_amount" size="8" maxlength="13" placeholder="<?= HtmlEncode($Grid->amount->getPlaceHolder()) ?>" value="<?= $Grid->amount->EditValue ?>"<?= $Grid->amount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->amount->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_amount" class="form-group patient_services_amount">
<span<?= $Grid->amount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->amount->getDisplayValue($Grid->amount->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_amount" data-hidden="1" name="x<?= $Grid->RowIndex ?>_amount" id="x<?= $Grid->RowIndex ?>_amount" value="<?= HtmlEncode($Grid->amount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_amount" data-hidden="1" name="o<?= $Grid->RowIndex ?>_amount" id="o<?= $Grid->RowIndex ?>_amount" value="<?= HtmlEncode($Grid->amount->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->description->Visible) { // description ?>
        <td data-name="description">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_description" class="form-group patient_services_description">
<input type="<?= $Grid->description->getInputTextType() ?>" data-table="patient_services" data-field="x_description" name="x<?= $Grid->RowIndex ?>_description" id="x<?= $Grid->RowIndex ?>_description" placeholder="<?= HtmlEncode($Grid->description->getPlaceHolder()) ?>" value="<?= $Grid->description->EditValue ?>"<?= $Grid->description->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->description->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_description" class="form-group patient_services_description">
<span<?= $Grid->description->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->description->getDisplayValue($Grid->description->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_description" data-hidden="1" name="x<?= $Grid->RowIndex ?>_description" id="x<?= $Grid->RowIndex ?>_description" value="<?= HtmlEncode($Grid->description->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_description" data-hidden="1" name="o<?= $Grid->RowIndex ?>_description" id="o<?= $Grid->RowIndex ?>_description" value="<?= HtmlEncode($Grid->description->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->patient_type->Visible) { // patient_type ?>
        <td data-name="patient_type">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_patient_type" class="form-group patient_services_patient_type">
<input type="<?= $Grid->patient_type->getInputTextType() ?>" data-table="patient_services" data-field="x_patient_type" name="x<?= $Grid->RowIndex ?>_patient_type" id="x<?= $Grid->RowIndex ?>_patient_type" size="30" placeholder="<?= HtmlEncode($Grid->patient_type->getPlaceHolder()) ?>" value="<?= $Grid->patient_type->EditValue ?>"<?= $Grid->patient_type->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->patient_type->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_patient_type" class="form-group patient_services_patient_type">
<span<?= $Grid->patient_type->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->patient_type->getDisplayValue($Grid->patient_type->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_patient_type" data-hidden="1" name="x<?= $Grid->RowIndex ?>_patient_type" id="x<?= $Grid->RowIndex ?>_patient_type" value="<?= HtmlEncode($Grid->patient_type->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_patient_type" data-hidden="1" name="o<?= $Grid->RowIndex ?>_patient_type" id="o<?= $Grid->RowIndex ?>_patient_type" value="<?= HtmlEncode($Grid->patient_type->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->charged_date->Visible) { // charged_date ?>
        <td data-name="charged_date">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_services_charged_date" class="form-group patient_services_charged_date">
<span<?= $Grid->charged_date->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->charged_date->getDisplayValue($Grid->charged_date->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_charged_date" data-hidden="1" name="x<?= $Grid->RowIndex ?>_charged_date" id="x<?= $Grid->RowIndex ?>_charged_date" value="<?= HtmlEncode($Grid->charged_date->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_charged_date" data-hidden="1" name="o<?= $Grid->RowIndex ?>_charged_date" id="o<?= $Grid->RowIndex ?>_charged_date" value="<?= HtmlEncode($Grid->charged_date->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->status->Visible) { // status ?>
        <td data-name="status">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_status" class="form-group patient_services_status">
    <select
        id="x<?= $Grid->RowIndex ?>_status"
        name="x<?= $Grid->RowIndex ?>_status"
        class="form-control ew-select<?= $Grid->status->isInvalidClass() ?>"
        data-select2-id="patient_services_x<?= $Grid->RowIndex ?>_status"
        data-table="patient_services"
        data-field="x_status"
        data-value-separator="<?= $Grid->status->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->status->getPlaceHolder()) ?>"
        <?= $Grid->status->editAttributes() ?>>
        <?= $Grid->status->selectOptionListHtml("x{$Grid->RowIndex}_status") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->status->getErrorMessage() ?></div>
<?= $Grid->status->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_status") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_services_x<?= $Grid->RowIndex ?>_status']"),
        options = { name: "x<?= $Grid->RowIndex ?>_status", selectId: "patient_services_x<?= $Grid->RowIndex ?>_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_services.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_status" class="form-group patient_services_status">
<span<?= $Grid->status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->status->getDisplayValue($Grid->status->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_status" data-hidden="1" name="x<?= $Grid->RowIndex ?>_status" id="x<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_status" data-hidden="1" name="o<?= $Grid->RowIndex ?>_status" id="o<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->mrnno->Visible) { // mrnno ?>
        <td data-name="mrnno">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->mrnno->getSessionValue() != "") { ?>
<span id="el$rowindex$_patient_services_mrnno" class="form-group patient_services_mrnno">
<span<?= $Grid->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->mrnno->getDisplayValue($Grid->mrnno->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_mrnno" name="x<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_patient_services_mrnno" class="form-group patient_services_mrnno">
<input type="<?= $Grid->mrnno->getInputTextType() ?>" data-table="patient_services" data-field="x_mrnno" name="x<?= $Grid->RowIndex ?>_mrnno" id="x<?= $Grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->mrnno->getPlaceHolder()) ?>" value="<?= $Grid->mrnno->EditValue ?>"<?= $Grid->mrnno->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->mrnno->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_services_mrnno" class="form-group patient_services_mrnno">
<span<?= $Grid->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->mrnno->getDisplayValue($Grid->mrnno->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_mrnno" data-hidden="1" name="x<?= $Grid->RowIndex ?>_mrnno" id="x<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_mrnno" data-hidden="1" name="o<?= $Grid->RowIndex ?>_mrnno" id="o<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_PatientName" class="form-group patient_services_PatientName">
<input type="<?= $Grid->PatientName->getInputTextType() ?>" data-table="patient_services" data-field="x_PatientName" name="x<?= $Grid->RowIndex ?>_PatientName" id="x<?= $Grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatientName->getPlaceHolder()) ?>" value="<?= $Grid->PatientName->EditValue ?>"<?= $Grid->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientName->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_PatientName" class="form-group patient_services_PatientName">
<span<?= $Grid->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatientName->getDisplayValue($Grid->PatientName->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_PatientName" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PatientName" id="x<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_PatientName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatientName" id="o<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Age->Visible) { // Age ?>
        <td data-name="Age">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Age" class="form-group patient_services_Age">
<input type="<?= $Grid->Age->getInputTextType() ?>" data-table="patient_services" data-field="x_Age" name="x<?= $Grid->RowIndex ?>_Age" id="x<?= $Grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Age->getPlaceHolder()) ?>" value="<?= $Grid->Age->EditValue ?>"<?= $Grid->Age->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Age->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Age" class="form-group patient_services_Age">
<span<?= $Grid->Age->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Age->getDisplayValue($Grid->Age->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Age" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Age" id="x<?= $Grid->RowIndex ?>_Age" value="<?= HtmlEncode($Grid->Age->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Age" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Age" id="o<?= $Grid->RowIndex ?>_Age" value="<?= HtmlEncode($Grid->Age->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Gender->Visible) { // Gender ?>
        <td data-name="Gender">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Gender" class="form-group patient_services_Gender">
<input type="<?= $Grid->Gender->getInputTextType() ?>" data-table="patient_services" data-field="x_Gender" name="x<?= $Grid->RowIndex ?>_Gender" id="x<?= $Grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Gender->getPlaceHolder()) ?>" value="<?= $Grid->Gender->EditValue ?>"<?= $Grid->Gender->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Gender->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Gender" class="form-group patient_services_Gender">
<span<?= $Grid->Gender->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Gender->getDisplayValue($Grid->Gender->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Gender" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Gender" id="x<?= $Grid->RowIndex ?>_Gender" value="<?= HtmlEncode($Grid->Gender->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Gender" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Gender" id="o<?= $Grid->RowIndex ?>_Gender" value="<?= HtmlEncode($Grid->Gender->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Unit->Visible) { // Unit ?>
        <td data-name="Unit">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Unit" class="form-group patient_services_Unit">
<input type="<?= $Grid->Unit->getInputTextType() ?>" data-table="patient_services" data-field="x_Unit" name="x<?= $Grid->RowIndex ?>_Unit" id="x<?= $Grid->RowIndex ?>_Unit" size="30" placeholder="<?= HtmlEncode($Grid->Unit->getPlaceHolder()) ?>" value="<?= $Grid->Unit->EditValue ?>"<?= $Grid->Unit->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Unit->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Unit" class="form-group patient_services_Unit">
<span<?= $Grid->Unit->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Unit->getDisplayValue($Grid->Unit->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Unit" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Unit" id="x<?= $Grid->RowIndex ?>_Unit" value="<?= HtmlEncode($Grid->Unit->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Unit" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Unit" id="o<?= $Grid->RowIndex ?>_Unit" value="<?= HtmlEncode($Grid->Unit->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Quantity->Visible) { // Quantity ?>
        <td data-name="Quantity">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Quantity" class="form-group patient_services_Quantity">
<input type="<?= $Grid->Quantity->getInputTextType() ?>" data-table="patient_services" data-field="x_Quantity" name="x<?= $Grid->RowIndex ?>_Quantity" id="x<?= $Grid->RowIndex ?>_Quantity" size="2" maxlength="4" placeholder="<?= HtmlEncode($Grid->Quantity->getPlaceHolder()) ?>" value="<?= $Grid->Quantity->EditValue ?>"<?= $Grid->Quantity->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Quantity->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Quantity" class="form-group patient_services_Quantity">
<span<?= $Grid->Quantity->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Quantity->getDisplayValue($Grid->Quantity->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Quantity" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Quantity" id="x<?= $Grid->RowIndex ?>_Quantity" value="<?= HtmlEncode($Grid->Quantity->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Quantity" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Quantity" id="o<?= $Grid->RowIndex ?>_Quantity" value="<?= HtmlEncode($Grid->Quantity->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Discount->Visible) { // Discount ?>
        <td data-name="Discount">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Discount" class="form-group patient_services_Discount">
<input type="<?= $Grid->Discount->getInputTextType() ?>" data-table="patient_services" data-field="x_Discount" name="x<?= $Grid->RowIndex ?>_Discount" id="x<?= $Grid->RowIndex ?>_Discount" size="4" maxlength="8" placeholder="<?= HtmlEncode($Grid->Discount->getPlaceHolder()) ?>" value="<?= $Grid->Discount->EditValue ?>"<?= $Grid->Discount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Discount->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Discount" class="form-group patient_services_Discount">
<span<?= $Grid->Discount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Discount->getDisplayValue($Grid->Discount->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Discount" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Discount" id="x<?= $Grid->RowIndex ?>_Discount" value="<?= HtmlEncode($Grid->Discount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Discount" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Discount" id="o<?= $Grid->RowIndex ?>_Discount" value="<?= HtmlEncode($Grid->Discount->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->SubTotal->Visible) { // SubTotal ?>
        <td data-name="SubTotal">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_SubTotal" class="form-group patient_services_SubTotal">
<input type="<?= $Grid->SubTotal->getInputTextType() ?>" data-table="patient_services" data-field="x_SubTotal" name="x<?= $Grid->RowIndex ?>_SubTotal" id="x<?= $Grid->RowIndex ?>_SubTotal" size="8" maxlength="13" placeholder="<?= HtmlEncode($Grid->SubTotal->getPlaceHolder()) ?>" value="<?= $Grid->SubTotal->EditValue ?>"<?= $Grid->SubTotal->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SubTotal->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_SubTotal" class="form-group patient_services_SubTotal">
<span<?= $Grid->SubTotal->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->SubTotal->getDisplayValue($Grid->SubTotal->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_SubTotal" data-hidden="1" name="x<?= $Grid->RowIndex ?>_SubTotal" id="x<?= $Grid->RowIndex ?>_SubTotal" value="<?= HtmlEncode($Grid->SubTotal->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_SubTotal" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SubTotal" id="o<?= $Grid->RowIndex ?>_SubTotal" value="<?= HtmlEncode($Grid->SubTotal->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ServiceSelect->Visible) { // ServiceSelect ?>
        <td data-name="ServiceSelect">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_ServiceSelect" class="form-group patient_services_ServiceSelect">
<template id="tp_x<?= $Grid->RowIndex ?>_ServiceSelect">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="patient_services" data-field="x_ServiceSelect" name="x<?= $Grid->RowIndex ?>_ServiceSelect" id="x<?= $Grid->RowIndex ?>_ServiceSelect"<?= $Grid->ServiceSelect->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_ServiceSelect" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_ServiceSelect[]"
    name="x<?= $Grid->RowIndex ?>_ServiceSelect[]"
    value="<?= HtmlEncode($Grid->ServiceSelect->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Grid->RowIndex ?>_ServiceSelect"
    data-target="dsl_x<?= $Grid->RowIndex ?>_ServiceSelect"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->ServiceSelect->isInvalidClass() ?>"
    data-table="patient_services"
    data-field="x_ServiceSelect"
    data-value-separator="<?= $Grid->ServiceSelect->displayValueSeparatorAttribute() ?>"
    <?= $Grid->ServiceSelect->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ServiceSelect->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_ServiceSelect" class="form-group patient_services_ServiceSelect">
<span<?= $Grid->ServiceSelect->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ServiceSelect->getDisplayValue($Grid->ServiceSelect->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_ServiceSelect" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ServiceSelect" id="x<?= $Grid->RowIndex ?>_ServiceSelect" value="<?= HtmlEncode($Grid->ServiceSelect->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_ServiceSelect" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ServiceSelect[]" id="o<?= $Grid->RowIndex ?>_ServiceSelect[]" value="<?= HtmlEncode($Grid->ServiceSelect->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Aid->Visible) { // Aid ?>
        <td data-name="Aid">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Aid" class="form-group patient_services_Aid">
<input type="<?= $Grid->Aid->getInputTextType() ?>" data-table="patient_services" data-field="x_Aid" name="x<?= $Grid->RowIndex ?>_Aid" id="x<?= $Grid->RowIndex ?>_Aid" size="30" placeholder="<?= HtmlEncode($Grid->Aid->getPlaceHolder()) ?>" value="<?= $Grid->Aid->EditValue ?>"<?= $Grid->Aid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Aid->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Aid" class="form-group patient_services_Aid">
<span<?= $Grid->Aid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Aid->getDisplayValue($Grid->Aid->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Aid" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Aid" id="x<?= $Grid->RowIndex ?>_Aid" value="<?= HtmlEncode($Grid->Aid->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Aid" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Aid" id="o<?= $Grid->RowIndex ?>_Aid" value="<?= HtmlEncode($Grid->Aid->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Vid->Visible) { // Vid ?>
        <td data-name="Vid">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->Vid->getSessionValue() != "") { ?>
<span id="el$rowindex$_patient_services_Vid" class="form-group patient_services_Vid">
<span<?= $Grid->Vid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Vid->getDisplayValue($Grid->Vid->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_Vid" name="x<?= $Grid->RowIndex ?>_Vid" value="<?= HtmlEncode($Grid->Vid->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_patient_services_Vid" class="form-group patient_services_Vid">
<input type="<?= $Grid->Vid->getInputTextType() ?>" data-table="patient_services" data-field="x_Vid" name="x<?= $Grid->RowIndex ?>_Vid" id="x<?= $Grid->RowIndex ?>_Vid" size="30" placeholder="<?= HtmlEncode($Grid->Vid->getPlaceHolder()) ?>" value="<?= $Grid->Vid->EditValue ?>"<?= $Grid->Vid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Vid->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Vid" class="form-group patient_services_Vid">
<span<?= $Grid->Vid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Vid->getDisplayValue($Grid->Vid->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Vid" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Vid" id="x<?= $Grid->RowIndex ?>_Vid" value="<?= HtmlEncode($Grid->Vid->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Vid" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Vid" id="o<?= $Grid->RowIndex ?>_Vid" value="<?= HtmlEncode($Grid->Vid->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->DrID->Visible) { // DrID ?>
        <td data-name="DrID">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_DrID" class="form-group patient_services_DrID">
<input type="<?= $Grid->DrID->getInputTextType() ?>" data-table="patient_services" data-field="x_DrID" name="x<?= $Grid->RowIndex ?>_DrID" id="x<?= $Grid->RowIndex ?>_DrID" size="30" placeholder="<?= HtmlEncode($Grid->DrID->getPlaceHolder()) ?>" value="<?= $Grid->DrID->EditValue ?>"<?= $Grid->DrID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DrID->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_DrID" class="form-group patient_services_DrID">
<span<?= $Grid->DrID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DrID->getDisplayValue($Grid->DrID->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DrID" data-hidden="1" name="x<?= $Grid->RowIndex ?>_DrID" id="x<?= $Grid->RowIndex ?>_DrID" value="<?= HtmlEncode($Grid->DrID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_DrID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DrID" id="o<?= $Grid->RowIndex ?>_DrID" value="<?= HtmlEncode($Grid->DrID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->DrCODE->Visible) { // DrCODE ?>
        <td data-name="DrCODE">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_DrCODE" class="form-group patient_services_DrCODE">
<input type="<?= $Grid->DrCODE->getInputTextType() ?>" data-table="patient_services" data-field="x_DrCODE" name="x<?= $Grid->RowIndex ?>_DrCODE" id="x<?= $Grid->RowIndex ?>_DrCODE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DrCODE->getPlaceHolder()) ?>" value="<?= $Grid->DrCODE->EditValue ?>"<?= $Grid->DrCODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DrCODE->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_DrCODE" class="form-group patient_services_DrCODE">
<span<?= $Grid->DrCODE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DrCODE->getDisplayValue($Grid->DrCODE->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DrCODE" data-hidden="1" name="x<?= $Grid->RowIndex ?>_DrCODE" id="x<?= $Grid->RowIndex ?>_DrCODE" value="<?= HtmlEncode($Grid->DrCODE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_DrCODE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DrCODE" id="o<?= $Grid->RowIndex ?>_DrCODE" value="<?= HtmlEncode($Grid->DrCODE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->DrName->Visible) { // DrName ?>
        <td data-name="DrName">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_DrName" class="form-group patient_services_DrName">
<input type="<?= $Grid->DrName->getInputTextType() ?>" data-table="patient_services" data-field="x_DrName" name="x<?= $Grid->RowIndex ?>_DrName" id="x<?= $Grid->RowIndex ?>_DrName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DrName->getPlaceHolder()) ?>" value="<?= $Grid->DrName->EditValue ?>"<?= $Grid->DrName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DrName->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_DrName" class="form-group patient_services_DrName">
<span<?= $Grid->DrName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DrName->getDisplayValue($Grid->DrName->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DrName" data-hidden="1" name="x<?= $Grid->RowIndex ?>_DrName" id="x<?= $Grid->RowIndex ?>_DrName" value="<?= HtmlEncode($Grid->DrName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_DrName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DrName" id="o<?= $Grid->RowIndex ?>_DrName" value="<?= HtmlEncode($Grid->DrName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Department->Visible) { // Department ?>
        <td data-name="Department">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Department" class="form-group patient_services_Department">
<input type="<?= $Grid->Department->getInputTextType() ?>" data-table="patient_services" data-field="x_Department" name="x<?= $Grid->RowIndex ?>_Department" id="x<?= $Grid->RowIndex ?>_Department" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Department->getPlaceHolder()) ?>" value="<?= $Grid->Department->EditValue ?>"<?= $Grid->Department->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Department->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Department" class="form-group patient_services_Department">
<span<?= $Grid->Department->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Department->getDisplayValue($Grid->Department->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Department" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Department" id="x<?= $Grid->RowIndex ?>_Department" value="<?= HtmlEncode($Grid->Department->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Department" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Department" id="o<?= $Grid->RowIndex ?>_Department" value="<?= HtmlEncode($Grid->Department->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->DrSharePres->Visible) { // DrSharePres ?>
        <td data-name="DrSharePres">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_DrSharePres" class="form-group patient_services_DrSharePres">
<input type="<?= $Grid->DrSharePres->getInputTextType() ?>" data-table="patient_services" data-field="x_DrSharePres" name="x<?= $Grid->RowIndex ?>_DrSharePres" id="x<?= $Grid->RowIndex ?>_DrSharePres" size="30" placeholder="<?= HtmlEncode($Grid->DrSharePres->getPlaceHolder()) ?>" value="<?= $Grid->DrSharePres->EditValue ?>"<?= $Grid->DrSharePres->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DrSharePres->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_DrSharePres" class="form-group patient_services_DrSharePres">
<span<?= $Grid->DrSharePres->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DrSharePres->getDisplayValue($Grid->DrSharePres->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DrSharePres" data-hidden="1" name="x<?= $Grid->RowIndex ?>_DrSharePres" id="x<?= $Grid->RowIndex ?>_DrSharePres" value="<?= HtmlEncode($Grid->DrSharePres->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_DrSharePres" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DrSharePres" id="o<?= $Grid->RowIndex ?>_DrSharePres" value="<?= HtmlEncode($Grid->DrSharePres->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->HospSharePres->Visible) { // HospSharePres ?>
        <td data-name="HospSharePres">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_HospSharePres" class="form-group patient_services_HospSharePres">
<input type="<?= $Grid->HospSharePres->getInputTextType() ?>" data-table="patient_services" data-field="x_HospSharePres" name="x<?= $Grid->RowIndex ?>_HospSharePres" id="x<?= $Grid->RowIndex ?>_HospSharePres" size="30" placeholder="<?= HtmlEncode($Grid->HospSharePres->getPlaceHolder()) ?>" value="<?= $Grid->HospSharePres->EditValue ?>"<?= $Grid->HospSharePres->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->HospSharePres->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_HospSharePres" class="form-group patient_services_HospSharePres">
<span<?= $Grid->HospSharePres->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->HospSharePres->getDisplayValue($Grid->HospSharePres->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_HospSharePres" data-hidden="1" name="x<?= $Grid->RowIndex ?>_HospSharePres" id="x<?= $Grid->RowIndex ?>_HospSharePres" value="<?= HtmlEncode($Grid->HospSharePres->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_HospSharePres" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HospSharePres" id="o<?= $Grid->RowIndex ?>_HospSharePres" value="<?= HtmlEncode($Grid->HospSharePres->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->DrShareAmount->Visible) { // DrShareAmount ?>
        <td data-name="DrShareAmount">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_DrShareAmount" class="form-group patient_services_DrShareAmount">
<input type="<?= $Grid->DrShareAmount->getInputTextType() ?>" data-table="patient_services" data-field="x_DrShareAmount" name="x<?= $Grid->RowIndex ?>_DrShareAmount" id="x<?= $Grid->RowIndex ?>_DrShareAmount" size="30" placeholder="<?= HtmlEncode($Grid->DrShareAmount->getPlaceHolder()) ?>" value="<?= $Grid->DrShareAmount->EditValue ?>"<?= $Grid->DrShareAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DrShareAmount->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_DrShareAmount" class="form-group patient_services_DrShareAmount">
<span<?= $Grid->DrShareAmount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DrShareAmount->getDisplayValue($Grid->DrShareAmount->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DrShareAmount" data-hidden="1" name="x<?= $Grid->RowIndex ?>_DrShareAmount" id="x<?= $Grid->RowIndex ?>_DrShareAmount" value="<?= HtmlEncode($Grid->DrShareAmount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_DrShareAmount" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DrShareAmount" id="o<?= $Grid->RowIndex ?>_DrShareAmount" value="<?= HtmlEncode($Grid->DrShareAmount->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->HospShareAmount->Visible) { // HospShareAmount ?>
        <td data-name="HospShareAmount">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_HospShareAmount" class="form-group patient_services_HospShareAmount">
<input type="<?= $Grid->HospShareAmount->getInputTextType() ?>" data-table="patient_services" data-field="x_HospShareAmount" name="x<?= $Grid->RowIndex ?>_HospShareAmount" id="x<?= $Grid->RowIndex ?>_HospShareAmount" size="30" placeholder="<?= HtmlEncode($Grid->HospShareAmount->getPlaceHolder()) ?>" value="<?= $Grid->HospShareAmount->EditValue ?>"<?= $Grid->HospShareAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->HospShareAmount->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_HospShareAmount" class="form-group patient_services_HospShareAmount">
<span<?= $Grid->HospShareAmount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->HospShareAmount->getDisplayValue($Grid->HospShareAmount->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_HospShareAmount" data-hidden="1" name="x<?= $Grid->RowIndex ?>_HospShareAmount" id="x<?= $Grid->RowIndex ?>_HospShareAmount" value="<?= HtmlEncode($Grid->HospShareAmount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_HospShareAmount" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HospShareAmount" id="o<?= $Grid->RowIndex ?>_HospShareAmount" value="<?= HtmlEncode($Grid->HospShareAmount->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
        <td data-name="DrShareSettiledAmount">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_DrShareSettiledAmount" class="form-group patient_services_DrShareSettiledAmount">
<input type="<?= $Grid->DrShareSettiledAmount->getInputTextType() ?>" data-table="patient_services" data-field="x_DrShareSettiledAmount" name="x<?= $Grid->RowIndex ?>_DrShareSettiledAmount" id="x<?= $Grid->RowIndex ?>_DrShareSettiledAmount" size="30" placeholder="<?= HtmlEncode($Grid->DrShareSettiledAmount->getPlaceHolder()) ?>" value="<?= $Grid->DrShareSettiledAmount->EditValue ?>"<?= $Grid->DrShareSettiledAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DrShareSettiledAmount->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_DrShareSettiledAmount" class="form-group patient_services_DrShareSettiledAmount">
<span<?= $Grid->DrShareSettiledAmount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DrShareSettiledAmount->getDisplayValue($Grid->DrShareSettiledAmount->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettiledAmount" data-hidden="1" name="x<?= $Grid->RowIndex ?>_DrShareSettiledAmount" id="x<?= $Grid->RowIndex ?>_DrShareSettiledAmount" value="<?= HtmlEncode($Grid->DrShareSettiledAmount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettiledAmount" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DrShareSettiledAmount" id="o<?= $Grid->RowIndex ?>_DrShareSettiledAmount" value="<?= HtmlEncode($Grid->DrShareSettiledAmount->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->DrShareSettledId->Visible) { // DrShareSettledId ?>
        <td data-name="DrShareSettledId">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_DrShareSettledId" class="form-group patient_services_DrShareSettledId">
<input type="<?= $Grid->DrShareSettledId->getInputTextType() ?>" data-table="patient_services" data-field="x_DrShareSettledId" name="x<?= $Grid->RowIndex ?>_DrShareSettledId" id="x<?= $Grid->RowIndex ?>_DrShareSettledId" size="30" placeholder="<?= HtmlEncode($Grid->DrShareSettledId->getPlaceHolder()) ?>" value="<?= $Grid->DrShareSettledId->EditValue ?>"<?= $Grid->DrShareSettledId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DrShareSettledId->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_DrShareSettledId" class="form-group patient_services_DrShareSettledId">
<span<?= $Grid->DrShareSettledId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DrShareSettledId->getDisplayValue($Grid->DrShareSettledId->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettledId" data-hidden="1" name="x<?= $Grid->RowIndex ?>_DrShareSettledId" id="x<?= $Grid->RowIndex ?>_DrShareSettledId" value="<?= HtmlEncode($Grid->DrShareSettledId->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettledId" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DrShareSettledId" id="o<?= $Grid->RowIndex ?>_DrShareSettledId" value="<?= HtmlEncode($Grid->DrShareSettledId->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
        <td data-name="DrShareSettiledStatus">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_DrShareSettiledStatus" class="form-group patient_services_DrShareSettiledStatus">
<input type="<?= $Grid->DrShareSettiledStatus->getInputTextType() ?>" data-table="patient_services" data-field="x_DrShareSettiledStatus" name="x<?= $Grid->RowIndex ?>_DrShareSettiledStatus" id="x<?= $Grid->RowIndex ?>_DrShareSettiledStatus" size="30" placeholder="<?= HtmlEncode($Grid->DrShareSettiledStatus->getPlaceHolder()) ?>" value="<?= $Grid->DrShareSettiledStatus->EditValue ?>"<?= $Grid->DrShareSettiledStatus->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DrShareSettiledStatus->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_DrShareSettiledStatus" class="form-group patient_services_DrShareSettiledStatus">
<span<?= $Grid->DrShareSettiledStatus->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DrShareSettiledStatus->getDisplayValue($Grid->DrShareSettiledStatus->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettiledStatus" data-hidden="1" name="x<?= $Grid->RowIndex ?>_DrShareSettiledStatus" id="x<?= $Grid->RowIndex ?>_DrShareSettiledStatus" value="<?= HtmlEncode($Grid->DrShareSettiledStatus->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettiledStatus" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DrShareSettiledStatus" id="o<?= $Grid->RowIndex ?>_DrShareSettiledStatus" value="<?= HtmlEncode($Grid->DrShareSettiledStatus->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->invoiceId->Visible) { // invoiceId ?>
        <td data-name="invoiceId">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_invoiceId" class="form-group patient_services_invoiceId">
<input type="<?= $Grid->invoiceId->getInputTextType() ?>" data-table="patient_services" data-field="x_invoiceId" name="x<?= $Grid->RowIndex ?>_invoiceId" id="x<?= $Grid->RowIndex ?>_invoiceId" size="30" placeholder="<?= HtmlEncode($Grid->invoiceId->getPlaceHolder()) ?>" value="<?= $Grid->invoiceId->EditValue ?>"<?= $Grid->invoiceId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->invoiceId->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_invoiceId" class="form-group patient_services_invoiceId">
<span<?= $Grid->invoiceId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->invoiceId->getDisplayValue($Grid->invoiceId->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_invoiceId" data-hidden="1" name="x<?= $Grid->RowIndex ?>_invoiceId" id="x<?= $Grid->RowIndex ?>_invoiceId" value="<?= HtmlEncode($Grid->invoiceId->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_invoiceId" data-hidden="1" name="o<?= $Grid->RowIndex ?>_invoiceId" id="o<?= $Grid->RowIndex ?>_invoiceId" value="<?= HtmlEncode($Grid->invoiceId->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->invoiceAmount->Visible) { // invoiceAmount ?>
        <td data-name="invoiceAmount">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_invoiceAmount" class="form-group patient_services_invoiceAmount">
<input type="<?= $Grid->invoiceAmount->getInputTextType() ?>" data-table="patient_services" data-field="x_invoiceAmount" name="x<?= $Grid->RowIndex ?>_invoiceAmount" id="x<?= $Grid->RowIndex ?>_invoiceAmount" size="30" placeholder="<?= HtmlEncode($Grid->invoiceAmount->getPlaceHolder()) ?>" value="<?= $Grid->invoiceAmount->EditValue ?>"<?= $Grid->invoiceAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->invoiceAmount->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_invoiceAmount" class="form-group patient_services_invoiceAmount">
<span<?= $Grid->invoiceAmount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->invoiceAmount->getDisplayValue($Grid->invoiceAmount->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_invoiceAmount" data-hidden="1" name="x<?= $Grid->RowIndex ?>_invoiceAmount" id="x<?= $Grid->RowIndex ?>_invoiceAmount" value="<?= HtmlEncode($Grid->invoiceAmount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_invoiceAmount" data-hidden="1" name="o<?= $Grid->RowIndex ?>_invoiceAmount" id="o<?= $Grid->RowIndex ?>_invoiceAmount" value="<?= HtmlEncode($Grid->invoiceAmount->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->invoiceStatus->Visible) { // invoiceStatus ?>
        <td data-name="invoiceStatus">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_invoiceStatus" class="form-group patient_services_invoiceStatus">
<input type="<?= $Grid->invoiceStatus->getInputTextType() ?>" data-table="patient_services" data-field="x_invoiceStatus" name="x<?= $Grid->RowIndex ?>_invoiceStatus" id="x<?= $Grid->RowIndex ?>_invoiceStatus" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->invoiceStatus->getPlaceHolder()) ?>" value="<?= $Grid->invoiceStatus->EditValue ?>"<?= $Grid->invoiceStatus->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->invoiceStatus->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_invoiceStatus" class="form-group patient_services_invoiceStatus">
<span<?= $Grid->invoiceStatus->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->invoiceStatus->getDisplayValue($Grid->invoiceStatus->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_invoiceStatus" data-hidden="1" name="x<?= $Grid->RowIndex ?>_invoiceStatus" id="x<?= $Grid->RowIndex ?>_invoiceStatus" value="<?= HtmlEncode($Grid->invoiceStatus->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_invoiceStatus" data-hidden="1" name="o<?= $Grid->RowIndex ?>_invoiceStatus" id="o<?= $Grid->RowIndex ?>_invoiceStatus" value="<?= HtmlEncode($Grid->invoiceStatus->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->modeOfPayment->Visible) { // modeOfPayment ?>
        <td data-name="modeOfPayment">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_modeOfPayment" class="form-group patient_services_modeOfPayment">
<input type="<?= $Grid->modeOfPayment->getInputTextType() ?>" data-table="patient_services" data-field="x_modeOfPayment" name="x<?= $Grid->RowIndex ?>_modeOfPayment" id="x<?= $Grid->RowIndex ?>_modeOfPayment" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->modeOfPayment->getPlaceHolder()) ?>" value="<?= $Grid->modeOfPayment->EditValue ?>"<?= $Grid->modeOfPayment->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->modeOfPayment->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_modeOfPayment" class="form-group patient_services_modeOfPayment">
<span<?= $Grid->modeOfPayment->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->modeOfPayment->getDisplayValue($Grid->modeOfPayment->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_modeOfPayment" data-hidden="1" name="x<?= $Grid->RowIndex ?>_modeOfPayment" id="x<?= $Grid->RowIndex ?>_modeOfPayment" value="<?= HtmlEncode($Grid->modeOfPayment->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_modeOfPayment" data-hidden="1" name="o<?= $Grid->RowIndex ?>_modeOfPayment" id="o<?= $Grid->RowIndex ?>_modeOfPayment" value="<?= HtmlEncode($Grid->modeOfPayment->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->HospID->Visible) { // HospID ?>
        <td data-name="HospID">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_services_HospID" class="form-group patient_services_HospID">
<span<?= $Grid->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->HospID->getDisplayValue($Grid->HospID->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_HospID" data-hidden="1" name="x<?= $Grid->RowIndex ?>_HospID" id="x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_HospID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HospID" id="o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->RIDNO->Visible) { // RIDNO ?>
        <td data-name="RIDNO">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_RIDNO" class="form-group patient_services_RIDNO">
<input type="<?= $Grid->RIDNO->getInputTextType() ?>" data-table="patient_services" data-field="x_RIDNO" name="x<?= $Grid->RowIndex ?>_RIDNO" id="x<?= $Grid->RowIndex ?>_RIDNO" size="30" placeholder="<?= HtmlEncode($Grid->RIDNO->getPlaceHolder()) ?>" value="<?= $Grid->RIDNO->EditValue ?>"<?= $Grid->RIDNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->RIDNO->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_RIDNO" class="form-group patient_services_RIDNO">
<span<?= $Grid->RIDNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->RIDNO->getDisplayValue($Grid->RIDNO->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_RIDNO" data-hidden="1" name="x<?= $Grid->RowIndex ?>_RIDNO" id="x<?= $Grid->RowIndex ?>_RIDNO" value="<?= HtmlEncode($Grid->RIDNO->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_RIDNO" data-hidden="1" name="o<?= $Grid->RowIndex ?>_RIDNO" id="o<?= $Grid->RowIndex ?>_RIDNO" value="<?= HtmlEncode($Grid->RIDNO->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->TidNo->Visible) { // TidNo ?>
        <td data-name="TidNo">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_TidNo" class="form-group patient_services_TidNo">
<input type="<?= $Grid->TidNo->getInputTextType() ?>" data-table="patient_services" data-field="x_TidNo" name="x<?= $Grid->RowIndex ?>_TidNo" id="x<?= $Grid->RowIndex ?>_TidNo" size="30" placeholder="<?= HtmlEncode($Grid->TidNo->getPlaceHolder()) ?>" value="<?= $Grid->TidNo->EditValue ?>"<?= $Grid->TidNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TidNo->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_TidNo" class="form-group patient_services_TidNo">
<span<?= $Grid->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->TidNo->getDisplayValue($Grid->TidNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_TidNo" data-hidden="1" name="x<?= $Grid->RowIndex ?>_TidNo" id="x<?= $Grid->RowIndex ?>_TidNo" value="<?= HtmlEncode($Grid->TidNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_TidNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TidNo" id="o<?= $Grid->RowIndex ?>_TidNo" value="<?= HtmlEncode($Grid->TidNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->DiscountCategory->Visible) { // DiscountCategory ?>
        <td data-name="DiscountCategory">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_DiscountCategory" class="form-group patient_services_DiscountCategory">
<input type="<?= $Grid->DiscountCategory->getInputTextType() ?>" data-table="patient_services" data-field="x_DiscountCategory" name="x<?= $Grid->RowIndex ?>_DiscountCategory" id="x<?= $Grid->RowIndex ?>_DiscountCategory" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DiscountCategory->getPlaceHolder()) ?>" value="<?= $Grid->DiscountCategory->EditValue ?>"<?= $Grid->DiscountCategory->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DiscountCategory->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_DiscountCategory" class="form-group patient_services_DiscountCategory">
<span<?= $Grid->DiscountCategory->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DiscountCategory->getDisplayValue($Grid->DiscountCategory->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DiscountCategory" data-hidden="1" name="x<?= $Grid->RowIndex ?>_DiscountCategory" id="x<?= $Grid->RowIndex ?>_DiscountCategory" value="<?= HtmlEncode($Grid->DiscountCategory->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_DiscountCategory" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DiscountCategory" id="o<?= $Grid->RowIndex ?>_DiscountCategory" value="<?= HtmlEncode($Grid->DiscountCategory->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->sid->Visible) { // sid ?>
        <td data-name="sid">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_sid" class="form-group patient_services_sid">
<input type="<?= $Grid->sid->getInputTextType() ?>" data-table="patient_services" data-field="x_sid" name="x<?= $Grid->RowIndex ?>_sid" id="x<?= $Grid->RowIndex ?>_sid" size="8" maxlength="8" placeholder="<?= HtmlEncode($Grid->sid->getPlaceHolder()) ?>" value="<?= $Grid->sid->EditValue ?>"<?= $Grid->sid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->sid->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_sid" class="form-group patient_services_sid">
<span<?= $Grid->sid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->sid->getDisplayValue($Grid->sid->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_sid" data-hidden="1" name="x<?= $Grid->RowIndex ?>_sid" id="x<?= $Grid->RowIndex ?>_sid" value="<?= HtmlEncode($Grid->sid->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_sid" data-hidden="1" name="o<?= $Grid->RowIndex ?>_sid" id="o<?= $Grid->RowIndex ?>_sid" value="<?= HtmlEncode($Grid->sid->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ItemCode->Visible) { // ItemCode ?>
        <td data-name="ItemCode">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_ItemCode" class="form-group patient_services_ItemCode">
<input type="<?= $Grid->ItemCode->getInputTextType() ?>" data-table="patient_services" data-field="x_ItemCode" name="x<?= $Grid->RowIndex ?>_ItemCode" id="x<?= $Grid->RowIndex ?>_ItemCode" size="8" maxlength="8" placeholder="<?= HtmlEncode($Grid->ItemCode->getPlaceHolder()) ?>" value="<?= $Grid->ItemCode->EditValue ?>"<?= $Grid->ItemCode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ItemCode->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_ItemCode" class="form-group patient_services_ItemCode">
<span<?= $Grid->ItemCode->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ItemCode->getDisplayValue($Grid->ItemCode->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_ItemCode" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ItemCode" id="x<?= $Grid->RowIndex ?>_ItemCode" value="<?= HtmlEncode($Grid->ItemCode->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_ItemCode" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ItemCode" id="o<?= $Grid->RowIndex ?>_ItemCode" value="<?= HtmlEncode($Grid->ItemCode->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->TestSubCd->Visible) { // TestSubCd ?>
        <td data-name="TestSubCd">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_TestSubCd" class="form-group patient_services_TestSubCd">
<input type="<?= $Grid->TestSubCd->getInputTextType() ?>" data-table="patient_services" data-field="x_TestSubCd" name="x<?= $Grid->RowIndex ?>_TestSubCd" id="x<?= $Grid->RowIndex ?>_TestSubCd" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->TestSubCd->getPlaceHolder()) ?>" value="<?= $Grid->TestSubCd->EditValue ?>"<?= $Grid->TestSubCd->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TestSubCd->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_TestSubCd" class="form-group patient_services_TestSubCd">
<span<?= $Grid->TestSubCd->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->TestSubCd->getDisplayValue($Grid->TestSubCd->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_TestSubCd" data-hidden="1" name="x<?= $Grid->RowIndex ?>_TestSubCd" id="x<?= $Grid->RowIndex ?>_TestSubCd" value="<?= HtmlEncode($Grid->TestSubCd->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_TestSubCd" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TestSubCd" id="o<?= $Grid->RowIndex ?>_TestSubCd" value="<?= HtmlEncode($Grid->TestSubCd->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->DEptCd->Visible) { // DEptCd ?>
        <td data-name="DEptCd">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_DEptCd" class="form-group patient_services_DEptCd">
<input type="<?= $Grid->DEptCd->getInputTextType() ?>" data-table="patient_services" data-field="x_DEptCd" name="x<?= $Grid->RowIndex ?>_DEptCd" id="x<?= $Grid->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DEptCd->getPlaceHolder()) ?>" value="<?= $Grid->DEptCd->EditValue ?>"<?= $Grid->DEptCd->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DEptCd->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_DEptCd" class="form-group patient_services_DEptCd">
<span<?= $Grid->DEptCd->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DEptCd->getDisplayValue($Grid->DEptCd->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DEptCd" data-hidden="1" name="x<?= $Grid->RowIndex ?>_DEptCd" id="x<?= $Grid->RowIndex ?>_DEptCd" value="<?= HtmlEncode($Grid->DEptCd->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_DEptCd" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DEptCd" id="o<?= $Grid->RowIndex ?>_DEptCd" value="<?= HtmlEncode($Grid->DEptCd->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ProfCd->Visible) { // ProfCd ?>
        <td data-name="ProfCd">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_ProfCd" class="form-group patient_services_ProfCd">
<input type="<?= $Grid->ProfCd->getInputTextType() ?>" data-table="patient_services" data-field="x_ProfCd" name="x<?= $Grid->RowIndex ?>_ProfCd" id="x<?= $Grid->RowIndex ?>_ProfCd" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ProfCd->getPlaceHolder()) ?>" value="<?= $Grid->ProfCd->EditValue ?>"<?= $Grid->ProfCd->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ProfCd->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_ProfCd" class="form-group patient_services_ProfCd">
<span<?= $Grid->ProfCd->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ProfCd->getDisplayValue($Grid->ProfCd->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_ProfCd" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ProfCd" id="x<?= $Grid->RowIndex ?>_ProfCd" value="<?= HtmlEncode($Grid->ProfCd->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_ProfCd" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ProfCd" id="o<?= $Grid->RowIndex ?>_ProfCd" value="<?= HtmlEncode($Grid->ProfCd->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Comments->Visible) { // Comments ?>
        <td data-name="Comments">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Comments" class="form-group patient_services_Comments">
<input type="<?= $Grid->Comments->getInputTextType() ?>" data-table="patient_services" data-field="x_Comments" name="x<?= $Grid->RowIndex ?>_Comments" id="x<?= $Grid->RowIndex ?>_Comments" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Comments->getPlaceHolder()) ?>" value="<?= $Grid->Comments->EditValue ?>"<?= $Grid->Comments->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Comments->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Comments" class="form-group patient_services_Comments">
<span<?= $Grid->Comments->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Comments->getDisplayValue($Grid->Comments->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Comments" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Comments" id="x<?= $Grid->RowIndex ?>_Comments" value="<?= HtmlEncode($Grid->Comments->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Comments" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Comments" id="o<?= $Grid->RowIndex ?>_Comments" value="<?= HtmlEncode($Grid->Comments->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Method->Visible) { // Method ?>
        <td data-name="Method">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Method" class="form-group patient_services_Method">
<input type="<?= $Grid->Method->getInputTextType() ?>" data-table="patient_services" data-field="x_Method" name="x<?= $Grid->RowIndex ?>_Method" id="x<?= $Grid->RowIndex ?>_Method" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Method->getPlaceHolder()) ?>" value="<?= $Grid->Method->EditValue ?>"<?= $Grid->Method->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Method->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Method" class="form-group patient_services_Method">
<span<?= $Grid->Method->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Method->getDisplayValue($Grid->Method->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Method" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Method" id="x<?= $Grid->RowIndex ?>_Method" value="<?= HtmlEncode($Grid->Method->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Method" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Method" id="o<?= $Grid->RowIndex ?>_Method" value="<?= HtmlEncode($Grid->Method->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Specimen->Visible) { // Specimen ?>
        <td data-name="Specimen">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Specimen" class="form-group patient_services_Specimen">
<input type="<?= $Grid->Specimen->getInputTextType() ?>" data-table="patient_services" data-field="x_Specimen" name="x<?= $Grid->RowIndex ?>_Specimen" id="x<?= $Grid->RowIndex ?>_Specimen" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Specimen->getPlaceHolder()) ?>" value="<?= $Grid->Specimen->EditValue ?>"<?= $Grid->Specimen->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Specimen->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Specimen" class="form-group patient_services_Specimen">
<span<?= $Grid->Specimen->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Specimen->getDisplayValue($Grid->Specimen->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Specimen" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Specimen" id="x<?= $Grid->RowIndex ?>_Specimen" value="<?= HtmlEncode($Grid->Specimen->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Specimen" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Specimen" id="o<?= $Grid->RowIndex ?>_Specimen" value="<?= HtmlEncode($Grid->Specimen->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Abnormal->Visible) { // Abnormal ?>
        <td data-name="Abnormal">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Abnormal" class="form-group patient_services_Abnormal">
<input type="<?= $Grid->Abnormal->getInputTextType() ?>" data-table="patient_services" data-field="x_Abnormal" name="x<?= $Grid->RowIndex ?>_Abnormal" id="x<?= $Grid->RowIndex ?>_Abnormal" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Abnormal->getPlaceHolder()) ?>" value="<?= $Grid->Abnormal->EditValue ?>"<?= $Grid->Abnormal->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Abnormal->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Abnormal" class="form-group patient_services_Abnormal">
<span<?= $Grid->Abnormal->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Abnormal->getDisplayValue($Grid->Abnormal->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Abnormal" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Abnormal" id="x<?= $Grid->RowIndex ?>_Abnormal" value="<?= HtmlEncode($Grid->Abnormal->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Abnormal" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Abnormal" id="o<?= $Grid->RowIndex ?>_Abnormal" value="<?= HtmlEncode($Grid->Abnormal->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->TestUnit->Visible) { // TestUnit ?>
        <td data-name="TestUnit">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_TestUnit" class="form-group patient_services_TestUnit">
<input type="<?= $Grid->TestUnit->getInputTextType() ?>" data-table="patient_services" data-field="x_TestUnit" name="x<?= $Grid->RowIndex ?>_TestUnit" id="x<?= $Grid->RowIndex ?>_TestUnit" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->TestUnit->getPlaceHolder()) ?>" value="<?= $Grid->TestUnit->EditValue ?>"<?= $Grid->TestUnit->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TestUnit->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_TestUnit" class="form-group patient_services_TestUnit">
<span<?= $Grid->TestUnit->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->TestUnit->getDisplayValue($Grid->TestUnit->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_TestUnit" data-hidden="1" name="x<?= $Grid->RowIndex ?>_TestUnit" id="x<?= $Grid->RowIndex ?>_TestUnit" value="<?= HtmlEncode($Grid->TestUnit->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_TestUnit" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TestUnit" id="o<?= $Grid->RowIndex ?>_TestUnit" value="<?= HtmlEncode($Grid->TestUnit->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->LOWHIGH->Visible) { // LOWHIGH ?>
        <td data-name="LOWHIGH">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_LOWHIGH" class="form-group patient_services_LOWHIGH">
<input type="<?= $Grid->LOWHIGH->getInputTextType() ?>" data-table="patient_services" data-field="x_LOWHIGH" name="x<?= $Grid->RowIndex ?>_LOWHIGH" id="x<?= $Grid->RowIndex ?>_LOWHIGH" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->LOWHIGH->getPlaceHolder()) ?>" value="<?= $Grid->LOWHIGH->EditValue ?>"<?= $Grid->LOWHIGH->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->LOWHIGH->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_LOWHIGH" class="form-group patient_services_LOWHIGH">
<span<?= $Grid->LOWHIGH->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->LOWHIGH->getDisplayValue($Grid->LOWHIGH->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_LOWHIGH" data-hidden="1" name="x<?= $Grid->RowIndex ?>_LOWHIGH" id="x<?= $Grid->RowIndex ?>_LOWHIGH" value="<?= HtmlEncode($Grid->LOWHIGH->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_LOWHIGH" data-hidden="1" name="o<?= $Grid->RowIndex ?>_LOWHIGH" id="o<?= $Grid->RowIndex ?>_LOWHIGH" value="<?= HtmlEncode($Grid->LOWHIGH->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Branch->Visible) { // Branch ?>
        <td data-name="Branch">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Branch" class="form-group patient_services_Branch">
<input type="<?= $Grid->Branch->getInputTextType() ?>" data-table="patient_services" data-field="x_Branch" name="x<?= $Grid->RowIndex ?>_Branch" id="x<?= $Grid->RowIndex ?>_Branch" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Branch->getPlaceHolder()) ?>" value="<?= $Grid->Branch->EditValue ?>"<?= $Grid->Branch->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Branch->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Branch" class="form-group patient_services_Branch">
<span<?= $Grid->Branch->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Branch->getDisplayValue($Grid->Branch->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Branch" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Branch" id="x<?= $Grid->RowIndex ?>_Branch" value="<?= HtmlEncode($Grid->Branch->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Branch" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Branch" id="o<?= $Grid->RowIndex ?>_Branch" value="<?= HtmlEncode($Grid->Branch->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Dispatch->Visible) { // Dispatch ?>
        <td data-name="Dispatch">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Dispatch" class="form-group patient_services_Dispatch">
<input type="<?= $Grid->Dispatch->getInputTextType() ?>" data-table="patient_services" data-field="x_Dispatch" name="x<?= $Grid->RowIndex ?>_Dispatch" id="x<?= $Grid->RowIndex ?>_Dispatch" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Dispatch->getPlaceHolder()) ?>" value="<?= $Grid->Dispatch->EditValue ?>"<?= $Grid->Dispatch->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Dispatch->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Dispatch" class="form-group patient_services_Dispatch">
<span<?= $Grid->Dispatch->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Dispatch->getDisplayValue($Grid->Dispatch->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Dispatch" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Dispatch" id="x<?= $Grid->RowIndex ?>_Dispatch" value="<?= HtmlEncode($Grid->Dispatch->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Dispatch" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Dispatch" id="o<?= $Grid->RowIndex ?>_Dispatch" value="<?= HtmlEncode($Grid->Dispatch->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Pic1->Visible) { // Pic1 ?>
        <td data-name="Pic1">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Pic1" class="form-group patient_services_Pic1">
<input type="<?= $Grid->Pic1->getInputTextType() ?>" data-table="patient_services" data-field="x_Pic1" name="x<?= $Grid->RowIndex ?>_Pic1" id="x<?= $Grid->RowIndex ?>_Pic1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Pic1->getPlaceHolder()) ?>" value="<?= $Grid->Pic1->EditValue ?>"<?= $Grid->Pic1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Pic1->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Pic1" class="form-group patient_services_Pic1">
<span<?= $Grid->Pic1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Pic1->getDisplayValue($Grid->Pic1->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Pic1" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Pic1" id="x<?= $Grid->RowIndex ?>_Pic1" value="<?= HtmlEncode($Grid->Pic1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Pic1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Pic1" id="o<?= $Grid->RowIndex ?>_Pic1" value="<?= HtmlEncode($Grid->Pic1->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Pic2->Visible) { // Pic2 ?>
        <td data-name="Pic2">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Pic2" class="form-group patient_services_Pic2">
<input type="<?= $Grid->Pic2->getInputTextType() ?>" data-table="patient_services" data-field="x_Pic2" name="x<?= $Grid->RowIndex ?>_Pic2" id="x<?= $Grid->RowIndex ?>_Pic2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Pic2->getPlaceHolder()) ?>" value="<?= $Grid->Pic2->EditValue ?>"<?= $Grid->Pic2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Pic2->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Pic2" class="form-group patient_services_Pic2">
<span<?= $Grid->Pic2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Pic2->getDisplayValue($Grid->Pic2->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Pic2" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Pic2" id="x<?= $Grid->RowIndex ?>_Pic2" value="<?= HtmlEncode($Grid->Pic2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Pic2" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Pic2" id="o<?= $Grid->RowIndex ?>_Pic2" value="<?= HtmlEncode($Grid->Pic2->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->GraphPath->Visible) { // GraphPath ?>
        <td data-name="GraphPath">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_GraphPath" class="form-group patient_services_GraphPath">
<input type="<?= $Grid->GraphPath->getInputTextType() ?>" data-table="patient_services" data-field="x_GraphPath" name="x<?= $Grid->RowIndex ?>_GraphPath" id="x<?= $Grid->RowIndex ?>_GraphPath" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->GraphPath->getPlaceHolder()) ?>" value="<?= $Grid->GraphPath->EditValue ?>"<?= $Grid->GraphPath->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->GraphPath->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_GraphPath" class="form-group patient_services_GraphPath">
<span<?= $Grid->GraphPath->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->GraphPath->getDisplayValue($Grid->GraphPath->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_GraphPath" data-hidden="1" name="x<?= $Grid->RowIndex ?>_GraphPath" id="x<?= $Grid->RowIndex ?>_GraphPath" value="<?= HtmlEncode($Grid->GraphPath->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_GraphPath" data-hidden="1" name="o<?= $Grid->RowIndex ?>_GraphPath" id="o<?= $Grid->RowIndex ?>_GraphPath" value="<?= HtmlEncode($Grid->GraphPath->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->MachineCD->Visible) { // MachineCD ?>
        <td data-name="MachineCD">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_MachineCD" class="form-group patient_services_MachineCD">
<input type="<?= $Grid->MachineCD->getInputTextType() ?>" data-table="patient_services" data-field="x_MachineCD" name="x<?= $Grid->RowIndex ?>_MachineCD" id="x<?= $Grid->RowIndex ?>_MachineCD" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->MachineCD->getPlaceHolder()) ?>" value="<?= $Grid->MachineCD->EditValue ?>"<?= $Grid->MachineCD->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->MachineCD->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_MachineCD" class="form-group patient_services_MachineCD">
<span<?= $Grid->MachineCD->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->MachineCD->getDisplayValue($Grid->MachineCD->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_MachineCD" data-hidden="1" name="x<?= $Grid->RowIndex ?>_MachineCD" id="x<?= $Grid->RowIndex ?>_MachineCD" value="<?= HtmlEncode($Grid->MachineCD->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_MachineCD" data-hidden="1" name="o<?= $Grid->RowIndex ?>_MachineCD" id="o<?= $Grid->RowIndex ?>_MachineCD" value="<?= HtmlEncode($Grid->MachineCD->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->TestCancel->Visible) { // TestCancel ?>
        <td data-name="TestCancel">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_TestCancel" class="form-group patient_services_TestCancel">
<input type="<?= $Grid->TestCancel->getInputTextType() ?>" data-table="patient_services" data-field="x_TestCancel" name="x<?= $Grid->RowIndex ?>_TestCancel" id="x<?= $Grid->RowIndex ?>_TestCancel" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->TestCancel->getPlaceHolder()) ?>" value="<?= $Grid->TestCancel->EditValue ?>"<?= $Grid->TestCancel->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TestCancel->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_TestCancel" class="form-group patient_services_TestCancel">
<span<?= $Grid->TestCancel->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->TestCancel->getDisplayValue($Grid->TestCancel->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_TestCancel" data-hidden="1" name="x<?= $Grid->RowIndex ?>_TestCancel" id="x<?= $Grid->RowIndex ?>_TestCancel" value="<?= HtmlEncode($Grid->TestCancel->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_TestCancel" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TestCancel" id="o<?= $Grid->RowIndex ?>_TestCancel" value="<?= HtmlEncode($Grid->TestCancel->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->OutSource->Visible) { // OutSource ?>
        <td data-name="OutSource">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_OutSource" class="form-group patient_services_OutSource">
<input type="<?= $Grid->OutSource->getInputTextType() ?>" data-table="patient_services" data-field="x_OutSource" name="x<?= $Grid->RowIndex ?>_OutSource" id="x<?= $Grid->RowIndex ?>_OutSource" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->OutSource->getPlaceHolder()) ?>" value="<?= $Grid->OutSource->EditValue ?>"<?= $Grid->OutSource->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->OutSource->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_OutSource" class="form-group patient_services_OutSource">
<span<?= $Grid->OutSource->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->OutSource->getDisplayValue($Grid->OutSource->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_OutSource" data-hidden="1" name="x<?= $Grid->RowIndex ?>_OutSource" id="x<?= $Grid->RowIndex ?>_OutSource" value="<?= HtmlEncode($Grid->OutSource->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_OutSource" data-hidden="1" name="o<?= $Grid->RowIndex ?>_OutSource" id="o<?= $Grid->RowIndex ?>_OutSource" value="<?= HtmlEncode($Grid->OutSource->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Printed->Visible) { // Printed ?>
        <td data-name="Printed">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Printed" class="form-group patient_services_Printed">
<input type="<?= $Grid->Printed->getInputTextType() ?>" data-table="patient_services" data-field="x_Printed" name="x<?= $Grid->RowIndex ?>_Printed" id="x<?= $Grid->RowIndex ?>_Printed" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Printed->getPlaceHolder()) ?>" value="<?= $Grid->Printed->EditValue ?>"<?= $Grid->Printed->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Printed->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Printed" class="form-group patient_services_Printed">
<span<?= $Grid->Printed->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Printed->getDisplayValue($Grid->Printed->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Printed" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Printed" id="x<?= $Grid->RowIndex ?>_Printed" value="<?= HtmlEncode($Grid->Printed->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Printed" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Printed" id="o<?= $Grid->RowIndex ?>_Printed" value="<?= HtmlEncode($Grid->Printed->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PrintBy->Visible) { // PrintBy ?>
        <td data-name="PrintBy">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_PrintBy" class="form-group patient_services_PrintBy">
<input type="<?= $Grid->PrintBy->getInputTextType() ?>" data-table="patient_services" data-field="x_PrintBy" name="x<?= $Grid->RowIndex ?>_PrintBy" id="x<?= $Grid->RowIndex ?>_PrintBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PrintBy->getPlaceHolder()) ?>" value="<?= $Grid->PrintBy->EditValue ?>"<?= $Grid->PrintBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PrintBy->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_PrintBy" class="form-group patient_services_PrintBy">
<span<?= $Grid->PrintBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PrintBy->getDisplayValue($Grid->PrintBy->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_PrintBy" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PrintBy" id="x<?= $Grid->RowIndex ?>_PrintBy" value="<?= HtmlEncode($Grid->PrintBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_PrintBy" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PrintBy" id="o<?= $Grid->RowIndex ?>_PrintBy" value="<?= HtmlEncode($Grid->PrintBy->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PrintDate->Visible) { // PrintDate ?>
        <td data-name="PrintDate">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_PrintDate" class="form-group patient_services_PrintDate">
<input type="<?= $Grid->PrintDate->getInputTextType() ?>" data-table="patient_services" data-field="x_PrintDate" name="x<?= $Grid->RowIndex ?>_PrintDate" id="x<?= $Grid->RowIndex ?>_PrintDate" placeholder="<?= HtmlEncode($Grid->PrintDate->getPlaceHolder()) ?>" value="<?= $Grid->PrintDate->EditValue ?>"<?= $Grid->PrintDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PrintDate->getErrorMessage() ?></div>
<?php if (!$Grid->PrintDate->ReadOnly && !$Grid->PrintDate->Disabled && !isset($Grid->PrintDate->EditAttrs["readonly"]) && !isset($Grid->PrintDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_servicesgrid", "x<?= $Grid->RowIndex ?>_PrintDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_PrintDate" class="form-group patient_services_PrintDate">
<span<?= $Grid->PrintDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PrintDate->getDisplayValue($Grid->PrintDate->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_PrintDate" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PrintDate" id="x<?= $Grid->RowIndex ?>_PrintDate" value="<?= HtmlEncode($Grid->PrintDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_PrintDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PrintDate" id="o<?= $Grid->RowIndex ?>_PrintDate" value="<?= HtmlEncode($Grid->PrintDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->BillingDate->Visible) { // BillingDate ?>
        <td data-name="BillingDate">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_BillingDate" class="form-group patient_services_BillingDate">
<input type="<?= $Grid->BillingDate->getInputTextType() ?>" data-table="patient_services" data-field="x_BillingDate" name="x<?= $Grid->RowIndex ?>_BillingDate" id="x<?= $Grid->RowIndex ?>_BillingDate" placeholder="<?= HtmlEncode($Grid->BillingDate->getPlaceHolder()) ?>" value="<?= $Grid->BillingDate->EditValue ?>"<?= $Grid->BillingDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BillingDate->getErrorMessage() ?></div>
<?php if (!$Grid->BillingDate->ReadOnly && !$Grid->BillingDate->Disabled && !isset($Grid->BillingDate->EditAttrs["readonly"]) && !isset($Grid->BillingDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_servicesgrid", "x<?= $Grid->RowIndex ?>_BillingDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_BillingDate" class="form-group patient_services_BillingDate">
<span<?= $Grid->BillingDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->BillingDate->getDisplayValue($Grid->BillingDate->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_BillingDate" data-hidden="1" name="x<?= $Grid->RowIndex ?>_BillingDate" id="x<?= $Grid->RowIndex ?>_BillingDate" value="<?= HtmlEncode($Grid->BillingDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_BillingDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BillingDate" id="o<?= $Grid->RowIndex ?>_BillingDate" value="<?= HtmlEncode($Grid->BillingDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->BilledBy->Visible) { // BilledBy ?>
        <td data-name="BilledBy">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_BilledBy" class="form-group patient_services_BilledBy">
<input type="<?= $Grid->BilledBy->getInputTextType() ?>" data-table="patient_services" data-field="x_BilledBy" name="x<?= $Grid->RowIndex ?>_BilledBy" id="x<?= $Grid->RowIndex ?>_BilledBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->BilledBy->getPlaceHolder()) ?>" value="<?= $Grid->BilledBy->EditValue ?>"<?= $Grid->BilledBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BilledBy->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_BilledBy" class="form-group patient_services_BilledBy">
<span<?= $Grid->BilledBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->BilledBy->getDisplayValue($Grid->BilledBy->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_BilledBy" data-hidden="1" name="x<?= $Grid->RowIndex ?>_BilledBy" id="x<?= $Grid->RowIndex ?>_BilledBy" value="<?= HtmlEncode($Grid->BilledBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_BilledBy" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BilledBy" id="o<?= $Grid->RowIndex ?>_BilledBy" value="<?= HtmlEncode($Grid->BilledBy->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Resulted->Visible) { // Resulted ?>
        <td data-name="Resulted">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Resulted" class="form-group patient_services_Resulted">
<input type="<?= $Grid->Resulted->getInputTextType() ?>" data-table="patient_services" data-field="x_Resulted" name="x<?= $Grid->RowIndex ?>_Resulted" id="x<?= $Grid->RowIndex ?>_Resulted" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Resulted->getPlaceHolder()) ?>" value="<?= $Grid->Resulted->EditValue ?>"<?= $Grid->Resulted->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Resulted->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Resulted" class="form-group patient_services_Resulted">
<span<?= $Grid->Resulted->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Resulted->getDisplayValue($Grid->Resulted->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Resulted" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Resulted" id="x<?= $Grid->RowIndex ?>_Resulted" value="<?= HtmlEncode($Grid->Resulted->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Resulted" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Resulted" id="o<?= $Grid->RowIndex ?>_Resulted" value="<?= HtmlEncode($Grid->Resulted->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ResultDate->Visible) { // ResultDate ?>
        <td data-name="ResultDate">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_ResultDate" class="form-group patient_services_ResultDate">
<input type="<?= $Grid->ResultDate->getInputTextType() ?>" data-table="patient_services" data-field="x_ResultDate" name="x<?= $Grid->RowIndex ?>_ResultDate" id="x<?= $Grid->RowIndex ?>_ResultDate" placeholder="<?= HtmlEncode($Grid->ResultDate->getPlaceHolder()) ?>" value="<?= $Grid->ResultDate->EditValue ?>"<?= $Grid->ResultDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ResultDate->getErrorMessage() ?></div>
<?php if (!$Grid->ResultDate->ReadOnly && !$Grid->ResultDate->Disabled && !isset($Grid->ResultDate->EditAttrs["readonly"]) && !isset($Grid->ResultDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_servicesgrid", "x<?= $Grid->RowIndex ?>_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_ResultDate" class="form-group patient_services_ResultDate">
<span<?= $Grid->ResultDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ResultDate->getDisplayValue($Grid->ResultDate->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_ResultDate" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ResultDate" id="x<?= $Grid->RowIndex ?>_ResultDate" value="<?= HtmlEncode($Grid->ResultDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_ResultDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ResultDate" id="o<?= $Grid->RowIndex ?>_ResultDate" value="<?= HtmlEncode($Grid->ResultDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ResultedBy->Visible) { // ResultedBy ?>
        <td data-name="ResultedBy">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_ResultedBy" class="form-group patient_services_ResultedBy">
<input type="<?= $Grid->ResultedBy->getInputTextType() ?>" data-table="patient_services" data-field="x_ResultedBy" name="x<?= $Grid->RowIndex ?>_ResultedBy" id="x<?= $Grid->RowIndex ?>_ResultedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ResultedBy->getPlaceHolder()) ?>" value="<?= $Grid->ResultedBy->EditValue ?>"<?= $Grid->ResultedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ResultedBy->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_ResultedBy" class="form-group patient_services_ResultedBy">
<span<?= $Grid->ResultedBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ResultedBy->getDisplayValue($Grid->ResultedBy->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_ResultedBy" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ResultedBy" id="x<?= $Grid->RowIndex ?>_ResultedBy" value="<?= HtmlEncode($Grid->ResultedBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_ResultedBy" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ResultedBy" id="o<?= $Grid->RowIndex ?>_ResultedBy" value="<?= HtmlEncode($Grid->ResultedBy->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->SampleDate->Visible) { // SampleDate ?>
        <td data-name="SampleDate">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_SampleDate" class="form-group patient_services_SampleDate">
<input type="<?= $Grid->SampleDate->getInputTextType() ?>" data-table="patient_services" data-field="x_SampleDate" name="x<?= $Grid->RowIndex ?>_SampleDate" id="x<?= $Grid->RowIndex ?>_SampleDate" placeholder="<?= HtmlEncode($Grid->SampleDate->getPlaceHolder()) ?>" value="<?= $Grid->SampleDate->EditValue ?>"<?= $Grid->SampleDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SampleDate->getErrorMessage() ?></div>
<?php if (!$Grid->SampleDate->ReadOnly && !$Grid->SampleDate->Disabled && !isset($Grid->SampleDate->EditAttrs["readonly"]) && !isset($Grid->SampleDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_servicesgrid", "x<?= $Grid->RowIndex ?>_SampleDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_SampleDate" class="form-group patient_services_SampleDate">
<span<?= $Grid->SampleDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->SampleDate->getDisplayValue($Grid->SampleDate->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_SampleDate" data-hidden="1" name="x<?= $Grid->RowIndex ?>_SampleDate" id="x<?= $Grid->RowIndex ?>_SampleDate" value="<?= HtmlEncode($Grid->SampleDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_SampleDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SampleDate" id="o<?= $Grid->RowIndex ?>_SampleDate" value="<?= HtmlEncode($Grid->SampleDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->SampleUser->Visible) { // SampleUser ?>
        <td data-name="SampleUser">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_SampleUser" class="form-group patient_services_SampleUser">
<input type="<?= $Grid->SampleUser->getInputTextType() ?>" data-table="patient_services" data-field="x_SampleUser" name="x<?= $Grid->RowIndex ?>_SampleUser" id="x<?= $Grid->RowIndex ?>_SampleUser" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->SampleUser->getPlaceHolder()) ?>" value="<?= $Grid->SampleUser->EditValue ?>"<?= $Grid->SampleUser->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SampleUser->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_SampleUser" class="form-group patient_services_SampleUser">
<span<?= $Grid->SampleUser->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->SampleUser->getDisplayValue($Grid->SampleUser->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_SampleUser" data-hidden="1" name="x<?= $Grid->RowIndex ?>_SampleUser" id="x<?= $Grid->RowIndex ?>_SampleUser" value="<?= HtmlEncode($Grid->SampleUser->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_SampleUser" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SampleUser" id="o<?= $Grid->RowIndex ?>_SampleUser" value="<?= HtmlEncode($Grid->SampleUser->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Sampled->Visible) { // Sampled ?>
        <td data-name="Sampled">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Sampled" class="form-group patient_services_Sampled">
<input type="<?= $Grid->Sampled->getInputTextType() ?>" data-table="patient_services" data-field="x_Sampled" name="x<?= $Grid->RowIndex ?>_Sampled" id="x<?= $Grid->RowIndex ?>_Sampled" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Sampled->getPlaceHolder()) ?>" value="<?= $Grid->Sampled->EditValue ?>"<?= $Grid->Sampled->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Sampled->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Sampled" class="form-group patient_services_Sampled">
<span<?= $Grid->Sampled->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Sampled->getDisplayValue($Grid->Sampled->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Sampled" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Sampled" id="x<?= $Grid->RowIndex ?>_Sampled" value="<?= HtmlEncode($Grid->Sampled->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Sampled" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Sampled" id="o<?= $Grid->RowIndex ?>_Sampled" value="<?= HtmlEncode($Grid->Sampled->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ReceivedDate->Visible) { // ReceivedDate ?>
        <td data-name="ReceivedDate">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_ReceivedDate" class="form-group patient_services_ReceivedDate">
<input type="<?= $Grid->ReceivedDate->getInputTextType() ?>" data-table="patient_services" data-field="x_ReceivedDate" name="x<?= $Grid->RowIndex ?>_ReceivedDate" id="x<?= $Grid->RowIndex ?>_ReceivedDate" placeholder="<?= HtmlEncode($Grid->ReceivedDate->getPlaceHolder()) ?>" value="<?= $Grid->ReceivedDate->EditValue ?>"<?= $Grid->ReceivedDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ReceivedDate->getErrorMessage() ?></div>
<?php if (!$Grid->ReceivedDate->ReadOnly && !$Grid->ReceivedDate->Disabled && !isset($Grid->ReceivedDate->EditAttrs["readonly"]) && !isset($Grid->ReceivedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_servicesgrid", "x<?= $Grid->RowIndex ?>_ReceivedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_ReceivedDate" class="form-group patient_services_ReceivedDate">
<span<?= $Grid->ReceivedDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ReceivedDate->getDisplayValue($Grid->ReceivedDate->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_ReceivedDate" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ReceivedDate" id="x<?= $Grid->RowIndex ?>_ReceivedDate" value="<?= HtmlEncode($Grid->ReceivedDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_ReceivedDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ReceivedDate" id="o<?= $Grid->RowIndex ?>_ReceivedDate" value="<?= HtmlEncode($Grid->ReceivedDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ReceivedUser->Visible) { // ReceivedUser ?>
        <td data-name="ReceivedUser">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_ReceivedUser" class="form-group patient_services_ReceivedUser">
<input type="<?= $Grid->ReceivedUser->getInputTextType() ?>" data-table="patient_services" data-field="x_ReceivedUser" name="x<?= $Grid->RowIndex ?>_ReceivedUser" id="x<?= $Grid->RowIndex ?>_ReceivedUser" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ReceivedUser->getPlaceHolder()) ?>" value="<?= $Grid->ReceivedUser->EditValue ?>"<?= $Grid->ReceivedUser->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ReceivedUser->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_ReceivedUser" class="form-group patient_services_ReceivedUser">
<span<?= $Grid->ReceivedUser->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ReceivedUser->getDisplayValue($Grid->ReceivedUser->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_ReceivedUser" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ReceivedUser" id="x<?= $Grid->RowIndex ?>_ReceivedUser" value="<?= HtmlEncode($Grid->ReceivedUser->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_ReceivedUser" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ReceivedUser" id="o<?= $Grid->RowIndex ?>_ReceivedUser" value="<?= HtmlEncode($Grid->ReceivedUser->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Recevied->Visible) { // Recevied ?>
        <td data-name="Recevied">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Recevied" class="form-group patient_services_Recevied">
<input type="<?= $Grid->Recevied->getInputTextType() ?>" data-table="patient_services" data-field="x_Recevied" name="x<?= $Grid->RowIndex ?>_Recevied" id="x<?= $Grid->RowIndex ?>_Recevied" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Recevied->getPlaceHolder()) ?>" value="<?= $Grid->Recevied->EditValue ?>"<?= $Grid->Recevied->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Recevied->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Recevied" class="form-group patient_services_Recevied">
<span<?= $Grid->Recevied->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Recevied->getDisplayValue($Grid->Recevied->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Recevied" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Recevied" id="x<?= $Grid->RowIndex ?>_Recevied" value="<?= HtmlEncode($Grid->Recevied->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Recevied" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Recevied" id="o<?= $Grid->RowIndex ?>_Recevied" value="<?= HtmlEncode($Grid->Recevied->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->DeptRecvDate->Visible) { // DeptRecvDate ?>
        <td data-name="DeptRecvDate">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_DeptRecvDate" class="form-group patient_services_DeptRecvDate">
<input type="<?= $Grid->DeptRecvDate->getInputTextType() ?>" data-table="patient_services" data-field="x_DeptRecvDate" name="x<?= $Grid->RowIndex ?>_DeptRecvDate" id="x<?= $Grid->RowIndex ?>_DeptRecvDate" placeholder="<?= HtmlEncode($Grid->DeptRecvDate->getPlaceHolder()) ?>" value="<?= $Grid->DeptRecvDate->EditValue ?>"<?= $Grid->DeptRecvDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DeptRecvDate->getErrorMessage() ?></div>
<?php if (!$Grid->DeptRecvDate->ReadOnly && !$Grid->DeptRecvDate->Disabled && !isset($Grid->DeptRecvDate->EditAttrs["readonly"]) && !isset($Grid->DeptRecvDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_servicesgrid", "x<?= $Grid->RowIndex ?>_DeptRecvDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_DeptRecvDate" class="form-group patient_services_DeptRecvDate">
<span<?= $Grid->DeptRecvDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DeptRecvDate->getDisplayValue($Grid->DeptRecvDate->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DeptRecvDate" data-hidden="1" name="x<?= $Grid->RowIndex ?>_DeptRecvDate" id="x<?= $Grid->RowIndex ?>_DeptRecvDate" value="<?= HtmlEncode($Grid->DeptRecvDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_DeptRecvDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DeptRecvDate" id="o<?= $Grid->RowIndex ?>_DeptRecvDate" value="<?= HtmlEncode($Grid->DeptRecvDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->DeptRecvUser->Visible) { // DeptRecvUser ?>
        <td data-name="DeptRecvUser">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_DeptRecvUser" class="form-group patient_services_DeptRecvUser">
<input type="<?= $Grid->DeptRecvUser->getInputTextType() ?>" data-table="patient_services" data-field="x_DeptRecvUser" name="x<?= $Grid->RowIndex ?>_DeptRecvUser" id="x<?= $Grid->RowIndex ?>_DeptRecvUser" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DeptRecvUser->getPlaceHolder()) ?>" value="<?= $Grid->DeptRecvUser->EditValue ?>"<?= $Grid->DeptRecvUser->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DeptRecvUser->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_DeptRecvUser" class="form-group patient_services_DeptRecvUser">
<span<?= $Grid->DeptRecvUser->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DeptRecvUser->getDisplayValue($Grid->DeptRecvUser->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DeptRecvUser" data-hidden="1" name="x<?= $Grid->RowIndex ?>_DeptRecvUser" id="x<?= $Grid->RowIndex ?>_DeptRecvUser" value="<?= HtmlEncode($Grid->DeptRecvUser->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_DeptRecvUser" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DeptRecvUser" id="o<?= $Grid->RowIndex ?>_DeptRecvUser" value="<?= HtmlEncode($Grid->DeptRecvUser->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->DeptRecived->Visible) { // DeptRecived ?>
        <td data-name="DeptRecived">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_DeptRecived" class="form-group patient_services_DeptRecived">
<input type="<?= $Grid->DeptRecived->getInputTextType() ?>" data-table="patient_services" data-field="x_DeptRecived" name="x<?= $Grid->RowIndex ?>_DeptRecived" id="x<?= $Grid->RowIndex ?>_DeptRecived" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DeptRecived->getPlaceHolder()) ?>" value="<?= $Grid->DeptRecived->EditValue ?>"<?= $Grid->DeptRecived->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DeptRecived->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_DeptRecived" class="form-group patient_services_DeptRecived">
<span<?= $Grid->DeptRecived->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DeptRecived->getDisplayValue($Grid->DeptRecived->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_DeptRecived" data-hidden="1" name="x<?= $Grid->RowIndex ?>_DeptRecived" id="x<?= $Grid->RowIndex ?>_DeptRecived" value="<?= HtmlEncode($Grid->DeptRecived->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_DeptRecived" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DeptRecived" id="o<?= $Grid->RowIndex ?>_DeptRecived" value="<?= HtmlEncode($Grid->DeptRecived->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->SAuthDate->Visible) { // SAuthDate ?>
        <td data-name="SAuthDate">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_SAuthDate" class="form-group patient_services_SAuthDate">
<input type="<?= $Grid->SAuthDate->getInputTextType() ?>" data-table="patient_services" data-field="x_SAuthDate" name="x<?= $Grid->RowIndex ?>_SAuthDate" id="x<?= $Grid->RowIndex ?>_SAuthDate" placeholder="<?= HtmlEncode($Grid->SAuthDate->getPlaceHolder()) ?>" value="<?= $Grid->SAuthDate->EditValue ?>"<?= $Grid->SAuthDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SAuthDate->getErrorMessage() ?></div>
<?php if (!$Grid->SAuthDate->ReadOnly && !$Grid->SAuthDate->Disabled && !isset($Grid->SAuthDate->EditAttrs["readonly"]) && !isset($Grid->SAuthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_servicesgrid", "x<?= $Grid->RowIndex ?>_SAuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_SAuthDate" class="form-group patient_services_SAuthDate">
<span<?= $Grid->SAuthDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->SAuthDate->getDisplayValue($Grid->SAuthDate->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_SAuthDate" data-hidden="1" name="x<?= $Grid->RowIndex ?>_SAuthDate" id="x<?= $Grid->RowIndex ?>_SAuthDate" value="<?= HtmlEncode($Grid->SAuthDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_SAuthDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SAuthDate" id="o<?= $Grid->RowIndex ?>_SAuthDate" value="<?= HtmlEncode($Grid->SAuthDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->SAuthBy->Visible) { // SAuthBy ?>
        <td data-name="SAuthBy">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_SAuthBy" class="form-group patient_services_SAuthBy">
<input type="<?= $Grid->SAuthBy->getInputTextType() ?>" data-table="patient_services" data-field="x_SAuthBy" name="x<?= $Grid->RowIndex ?>_SAuthBy" id="x<?= $Grid->RowIndex ?>_SAuthBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->SAuthBy->getPlaceHolder()) ?>" value="<?= $Grid->SAuthBy->EditValue ?>"<?= $Grid->SAuthBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SAuthBy->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_SAuthBy" class="form-group patient_services_SAuthBy">
<span<?= $Grid->SAuthBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->SAuthBy->getDisplayValue($Grid->SAuthBy->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_SAuthBy" data-hidden="1" name="x<?= $Grid->RowIndex ?>_SAuthBy" id="x<?= $Grid->RowIndex ?>_SAuthBy" value="<?= HtmlEncode($Grid->SAuthBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_SAuthBy" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SAuthBy" id="o<?= $Grid->RowIndex ?>_SAuthBy" value="<?= HtmlEncode($Grid->SAuthBy->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->SAuthendicate->Visible) { // SAuthendicate ?>
        <td data-name="SAuthendicate">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_SAuthendicate" class="form-group patient_services_SAuthendicate">
<input type="<?= $Grid->SAuthendicate->getInputTextType() ?>" data-table="patient_services" data-field="x_SAuthendicate" name="x<?= $Grid->RowIndex ?>_SAuthendicate" id="x<?= $Grid->RowIndex ?>_SAuthendicate" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->SAuthendicate->getPlaceHolder()) ?>" value="<?= $Grid->SAuthendicate->EditValue ?>"<?= $Grid->SAuthendicate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SAuthendicate->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_SAuthendicate" class="form-group patient_services_SAuthendicate">
<span<?= $Grid->SAuthendicate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->SAuthendicate->getDisplayValue($Grid->SAuthendicate->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_SAuthendicate" data-hidden="1" name="x<?= $Grid->RowIndex ?>_SAuthendicate" id="x<?= $Grid->RowIndex ?>_SAuthendicate" value="<?= HtmlEncode($Grid->SAuthendicate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_SAuthendicate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SAuthendicate" id="o<?= $Grid->RowIndex ?>_SAuthendicate" value="<?= HtmlEncode($Grid->SAuthendicate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->AuthDate->Visible) { // AuthDate ?>
        <td data-name="AuthDate">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_AuthDate" class="form-group patient_services_AuthDate">
<input type="<?= $Grid->AuthDate->getInputTextType() ?>" data-table="patient_services" data-field="x_AuthDate" name="x<?= $Grid->RowIndex ?>_AuthDate" id="x<?= $Grid->RowIndex ?>_AuthDate" placeholder="<?= HtmlEncode($Grid->AuthDate->getPlaceHolder()) ?>" value="<?= $Grid->AuthDate->EditValue ?>"<?= $Grid->AuthDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->AuthDate->getErrorMessage() ?></div>
<?php if (!$Grid->AuthDate->ReadOnly && !$Grid->AuthDate->Disabled && !isset($Grid->AuthDate->EditAttrs["readonly"]) && !isset($Grid->AuthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_servicesgrid", "x<?= $Grid->RowIndex ?>_AuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_AuthDate" class="form-group patient_services_AuthDate">
<span<?= $Grid->AuthDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->AuthDate->getDisplayValue($Grid->AuthDate->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_AuthDate" data-hidden="1" name="x<?= $Grid->RowIndex ?>_AuthDate" id="x<?= $Grid->RowIndex ?>_AuthDate" value="<?= HtmlEncode($Grid->AuthDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_AuthDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_AuthDate" id="o<?= $Grid->RowIndex ?>_AuthDate" value="<?= HtmlEncode($Grid->AuthDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->AuthBy->Visible) { // AuthBy ?>
        <td data-name="AuthBy">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_AuthBy" class="form-group patient_services_AuthBy">
<input type="<?= $Grid->AuthBy->getInputTextType() ?>" data-table="patient_services" data-field="x_AuthBy" name="x<?= $Grid->RowIndex ?>_AuthBy" id="x<?= $Grid->RowIndex ?>_AuthBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->AuthBy->getPlaceHolder()) ?>" value="<?= $Grid->AuthBy->EditValue ?>"<?= $Grid->AuthBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->AuthBy->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_AuthBy" class="form-group patient_services_AuthBy">
<span<?= $Grid->AuthBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->AuthBy->getDisplayValue($Grid->AuthBy->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_AuthBy" data-hidden="1" name="x<?= $Grid->RowIndex ?>_AuthBy" id="x<?= $Grid->RowIndex ?>_AuthBy" value="<?= HtmlEncode($Grid->AuthBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_AuthBy" data-hidden="1" name="o<?= $Grid->RowIndex ?>_AuthBy" id="o<?= $Grid->RowIndex ?>_AuthBy" value="<?= HtmlEncode($Grid->AuthBy->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Authencate->Visible) { // Authencate ?>
        <td data-name="Authencate">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Authencate" class="form-group patient_services_Authencate">
<input type="<?= $Grid->Authencate->getInputTextType() ?>" data-table="patient_services" data-field="x_Authencate" name="x<?= $Grid->RowIndex ?>_Authencate" id="x<?= $Grid->RowIndex ?>_Authencate" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Authencate->getPlaceHolder()) ?>" value="<?= $Grid->Authencate->EditValue ?>"<?= $Grid->Authencate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Authencate->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Authencate" class="form-group patient_services_Authencate">
<span<?= $Grid->Authencate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Authencate->getDisplayValue($Grid->Authencate->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Authencate" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Authencate" id="x<?= $Grid->RowIndex ?>_Authencate" value="<?= HtmlEncode($Grid->Authencate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Authencate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Authencate" id="o<?= $Grid->RowIndex ?>_Authencate" value="<?= HtmlEncode($Grid->Authencate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->EditDate->Visible) { // EditDate ?>
        <td data-name="EditDate">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_EditDate" class="form-group patient_services_EditDate">
<input type="<?= $Grid->EditDate->getInputTextType() ?>" data-table="patient_services" data-field="x_EditDate" name="x<?= $Grid->RowIndex ?>_EditDate" id="x<?= $Grid->RowIndex ?>_EditDate" placeholder="<?= HtmlEncode($Grid->EditDate->getPlaceHolder()) ?>" value="<?= $Grid->EditDate->EditValue ?>"<?= $Grid->EditDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->EditDate->getErrorMessage() ?></div>
<?php if (!$Grid->EditDate->ReadOnly && !$Grid->EditDate->Disabled && !isset($Grid->EditDate->EditAttrs["readonly"]) && !isset($Grid->EditDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_servicesgrid", "x<?= $Grid->RowIndex ?>_EditDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_EditDate" class="form-group patient_services_EditDate">
<span<?= $Grid->EditDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->EditDate->getDisplayValue($Grid->EditDate->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_EditDate" data-hidden="1" name="x<?= $Grid->RowIndex ?>_EditDate" id="x<?= $Grid->RowIndex ?>_EditDate" value="<?= HtmlEncode($Grid->EditDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_EditDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_EditDate" id="o<?= $Grid->RowIndex ?>_EditDate" value="<?= HtmlEncode($Grid->EditDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->EditBy->Visible) { // EditBy ?>
        <td data-name="EditBy">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_EditBy" class="form-group patient_services_EditBy">
<input type="<?= $Grid->EditBy->getInputTextType() ?>" data-table="patient_services" data-field="x_EditBy" name="x<?= $Grid->RowIndex ?>_EditBy" id="x<?= $Grid->RowIndex ?>_EditBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->EditBy->getPlaceHolder()) ?>" value="<?= $Grid->EditBy->EditValue ?>"<?= $Grid->EditBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->EditBy->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_EditBy" class="form-group patient_services_EditBy">
<span<?= $Grid->EditBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->EditBy->getDisplayValue($Grid->EditBy->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_EditBy" data-hidden="1" name="x<?= $Grid->RowIndex ?>_EditBy" id="x<?= $Grid->RowIndex ?>_EditBy" value="<?= HtmlEncode($Grid->EditBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_EditBy" data-hidden="1" name="o<?= $Grid->RowIndex ?>_EditBy" id="o<?= $Grid->RowIndex ?>_EditBy" value="<?= HtmlEncode($Grid->EditBy->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Editted->Visible) { // Editted ?>
        <td data-name="Editted">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Editted" class="form-group patient_services_Editted">
<input type="<?= $Grid->Editted->getInputTextType() ?>" data-table="patient_services" data-field="x_Editted" name="x<?= $Grid->RowIndex ?>_Editted" id="x<?= $Grid->RowIndex ?>_Editted" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Editted->getPlaceHolder()) ?>" value="<?= $Grid->Editted->EditValue ?>"<?= $Grid->Editted->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Editted->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Editted" class="form-group patient_services_Editted">
<span<?= $Grid->Editted->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Editted->getDisplayValue($Grid->Editted->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Editted" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Editted" id="x<?= $Grid->RowIndex ?>_Editted" value="<?= HtmlEncode($Grid->Editted->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Editted" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Editted" id="o<?= $Grid->RowIndex ?>_Editted" value="<?= HtmlEncode($Grid->Editted->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PatID->Visible) { // PatID ?>
        <td data-name="PatID">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->PatID->getSessionValue() != "") { ?>
<span id="el$rowindex$_patient_services_PatID" class="form-group patient_services_PatID">
<span<?= $Grid->PatID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatID->getDisplayValue($Grid->PatID->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_PatID" name="x<?= $Grid->RowIndex ?>_PatID" value="<?= HtmlEncode($Grid->PatID->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_patient_services_PatID" class="form-group patient_services_PatID">
<input type="<?= $Grid->PatID->getInputTextType() ?>" data-table="patient_services" data-field="x_PatID" name="x<?= $Grid->RowIndex ?>_PatID" id="x<?= $Grid->RowIndex ?>_PatID" size="30" placeholder="<?= HtmlEncode($Grid->PatID->getPlaceHolder()) ?>" value="<?= $Grid->PatID->EditValue ?>"<?= $Grid->PatID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatID->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_services_PatID" class="form-group patient_services_PatID">
<span<?= $Grid->PatID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatID->getDisplayValue($Grid->PatID->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_PatID" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PatID" id="x<?= $Grid->RowIndex ?>_PatID" value="<?= HtmlEncode($Grid->PatID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_PatID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatID" id="o<?= $Grid->RowIndex ?>_PatID" value="<?= HtmlEncode($Grid->PatID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PatientId->Visible) { // PatientId ?>
        <td data-name="PatientId">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_PatientId" class="form-group patient_services_PatientId">
<input type="<?= $Grid->PatientId->getInputTextType() ?>" data-table="patient_services" data-field="x_PatientId" name="x<?= $Grid->RowIndex ?>_PatientId" id="x<?= $Grid->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatientId->getPlaceHolder()) ?>" value="<?= $Grid->PatientId->EditValue ?>"<?= $Grid->PatientId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientId->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_PatientId" class="form-group patient_services_PatientId">
<span<?= $Grid->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatientId->getDisplayValue($Grid->PatientId->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_PatientId" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PatientId" id="x<?= $Grid->RowIndex ?>_PatientId" value="<?= HtmlEncode($Grid->PatientId->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_PatientId" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatientId" id="o<?= $Grid->RowIndex ?>_PatientId" value="<?= HtmlEncode($Grid->PatientId->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Mobile->Visible) { // Mobile ?>
        <td data-name="Mobile">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Mobile" class="form-group patient_services_Mobile">
<input type="<?= $Grid->Mobile->getInputTextType() ?>" data-table="patient_services" data-field="x_Mobile" name="x<?= $Grid->RowIndex ?>_Mobile" id="x<?= $Grid->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Mobile->getPlaceHolder()) ?>" value="<?= $Grid->Mobile->EditValue ?>"<?= $Grid->Mobile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Mobile->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Mobile" class="form-group patient_services_Mobile">
<span<?= $Grid->Mobile->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Mobile->getDisplayValue($Grid->Mobile->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Mobile" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Mobile" id="x<?= $Grid->RowIndex ?>_Mobile" value="<?= HtmlEncode($Grid->Mobile->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Mobile" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Mobile" id="o<?= $Grid->RowIndex ?>_Mobile" value="<?= HtmlEncode($Grid->Mobile->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->CId->Visible) { // CId ?>
        <td data-name="CId">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_CId" class="form-group patient_services_CId">
<input type="<?= $Grid->CId->getInputTextType() ?>" data-table="patient_services" data-field="x_CId" name="x<?= $Grid->RowIndex ?>_CId" id="x<?= $Grid->RowIndex ?>_CId" size="30" placeholder="<?= HtmlEncode($Grid->CId->getPlaceHolder()) ?>" value="<?= $Grid->CId->EditValue ?>"<?= $Grid->CId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->CId->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_CId" class="form-group patient_services_CId">
<span<?= $Grid->CId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->CId->getDisplayValue($Grid->CId->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_CId" data-hidden="1" name="x<?= $Grid->RowIndex ?>_CId" id="x<?= $Grid->RowIndex ?>_CId" value="<?= HtmlEncode($Grid->CId->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_CId" data-hidden="1" name="o<?= $Grid->RowIndex ?>_CId" id="o<?= $Grid->RowIndex ?>_CId" value="<?= HtmlEncode($Grid->CId->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Order->Visible) { // Order ?>
        <td data-name="Order">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Order" class="form-group patient_services_Order">
<input type="<?= $Grid->Order->getInputTextType() ?>" data-table="patient_services" data-field="x_Order" name="x<?= $Grid->RowIndex ?>_Order" id="x<?= $Grid->RowIndex ?>_Order" size="30" placeholder="<?= HtmlEncode($Grid->Order->getPlaceHolder()) ?>" value="<?= $Grid->Order->EditValue ?>"<?= $Grid->Order->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Order->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Order" class="form-group patient_services_Order">
<span<?= $Grid->Order->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Order->getDisplayValue($Grid->Order->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Order" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Order" id="x<?= $Grid->RowIndex ?>_Order" value="<?= HtmlEncode($Grid->Order->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Order" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Order" id="o<?= $Grid->RowIndex ?>_Order" value="<?= HtmlEncode($Grid->Order->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ResType->Visible) { // ResType ?>
        <td data-name="ResType">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_ResType" class="form-group patient_services_ResType">
<input type="<?= $Grid->ResType->getInputTextType() ?>" data-table="patient_services" data-field="x_ResType" name="x<?= $Grid->RowIndex ?>_ResType" id="x<?= $Grid->RowIndex ?>_ResType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ResType->getPlaceHolder()) ?>" value="<?= $Grid->ResType->EditValue ?>"<?= $Grid->ResType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ResType->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_ResType" class="form-group patient_services_ResType">
<span<?= $Grid->ResType->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ResType->getDisplayValue($Grid->ResType->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_ResType" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ResType" id="x<?= $Grid->RowIndex ?>_ResType" value="<?= HtmlEncode($Grid->ResType->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_ResType" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ResType" id="o<?= $Grid->RowIndex ?>_ResType" value="<?= HtmlEncode($Grid->ResType->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Sample->Visible) { // Sample ?>
        <td data-name="Sample">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Sample" class="form-group patient_services_Sample">
<input type="<?= $Grid->Sample->getInputTextType() ?>" data-table="patient_services" data-field="x_Sample" name="x<?= $Grid->RowIndex ?>_Sample" id="x<?= $Grid->RowIndex ?>_Sample" size="30" maxlength="150" placeholder="<?= HtmlEncode($Grid->Sample->getPlaceHolder()) ?>" value="<?= $Grid->Sample->EditValue ?>"<?= $Grid->Sample->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Sample->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Sample" class="form-group patient_services_Sample">
<span<?= $Grid->Sample->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Sample->getDisplayValue($Grid->Sample->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Sample" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Sample" id="x<?= $Grid->RowIndex ?>_Sample" value="<?= HtmlEncode($Grid->Sample->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Sample" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Sample" id="o<?= $Grid->RowIndex ?>_Sample" value="<?= HtmlEncode($Grid->Sample->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->NoD->Visible) { // NoD ?>
        <td data-name="NoD">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_NoD" class="form-group patient_services_NoD">
<input type="<?= $Grid->NoD->getInputTextType() ?>" data-table="patient_services" data-field="x_NoD" name="x<?= $Grid->RowIndex ?>_NoD" id="x<?= $Grid->RowIndex ?>_NoD" size="30" placeholder="<?= HtmlEncode($Grid->NoD->getPlaceHolder()) ?>" value="<?= $Grid->NoD->EditValue ?>"<?= $Grid->NoD->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->NoD->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_NoD" class="form-group patient_services_NoD">
<span<?= $Grid->NoD->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->NoD->getDisplayValue($Grid->NoD->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_NoD" data-hidden="1" name="x<?= $Grid->RowIndex ?>_NoD" id="x<?= $Grid->RowIndex ?>_NoD" value="<?= HtmlEncode($Grid->NoD->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_NoD" data-hidden="1" name="o<?= $Grid->RowIndex ?>_NoD" id="o<?= $Grid->RowIndex ?>_NoD" value="<?= HtmlEncode($Grid->NoD->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->BillOrder->Visible) { // BillOrder ?>
        <td data-name="BillOrder">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_BillOrder" class="form-group patient_services_BillOrder">
<input type="<?= $Grid->BillOrder->getInputTextType() ?>" data-table="patient_services" data-field="x_BillOrder" name="x<?= $Grid->RowIndex ?>_BillOrder" id="x<?= $Grid->RowIndex ?>_BillOrder" size="30" placeholder="<?= HtmlEncode($Grid->BillOrder->getPlaceHolder()) ?>" value="<?= $Grid->BillOrder->EditValue ?>"<?= $Grid->BillOrder->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BillOrder->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_BillOrder" class="form-group patient_services_BillOrder">
<span<?= $Grid->BillOrder->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->BillOrder->getDisplayValue($Grid->BillOrder->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_BillOrder" data-hidden="1" name="x<?= $Grid->RowIndex ?>_BillOrder" id="x<?= $Grid->RowIndex ?>_BillOrder" value="<?= HtmlEncode($Grid->BillOrder->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_BillOrder" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BillOrder" id="o<?= $Grid->RowIndex ?>_BillOrder" value="<?= HtmlEncode($Grid->BillOrder->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Inactive->Visible) { // Inactive ?>
        <td data-name="Inactive">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Inactive" class="form-group patient_services_Inactive">
<input type="<?= $Grid->Inactive->getInputTextType() ?>" data-table="patient_services" data-field="x_Inactive" name="x<?= $Grid->RowIndex ?>_Inactive" id="x<?= $Grid->RowIndex ?>_Inactive" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Inactive->getPlaceHolder()) ?>" value="<?= $Grid->Inactive->EditValue ?>"<?= $Grid->Inactive->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Inactive->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Inactive" class="form-group patient_services_Inactive">
<span<?= $Grid->Inactive->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Inactive->getDisplayValue($Grid->Inactive->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Inactive" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Inactive" id="x<?= $Grid->RowIndex ?>_Inactive" value="<?= HtmlEncode($Grid->Inactive->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Inactive" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Inactive" id="o<?= $Grid->RowIndex ?>_Inactive" value="<?= HtmlEncode($Grid->Inactive->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->CollSample->Visible) { // CollSample ?>
        <td data-name="CollSample">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_CollSample" class="form-group patient_services_CollSample">
<input type="<?= $Grid->CollSample->getInputTextType() ?>" data-table="patient_services" data-field="x_CollSample" name="x<?= $Grid->RowIndex ?>_CollSample" id="x<?= $Grid->RowIndex ?>_CollSample" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->CollSample->getPlaceHolder()) ?>" value="<?= $Grid->CollSample->EditValue ?>"<?= $Grid->CollSample->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->CollSample->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_CollSample" class="form-group patient_services_CollSample">
<span<?= $Grid->CollSample->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->CollSample->getDisplayValue($Grid->CollSample->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_CollSample" data-hidden="1" name="x<?= $Grid->RowIndex ?>_CollSample" id="x<?= $Grid->RowIndex ?>_CollSample" value="<?= HtmlEncode($Grid->CollSample->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_CollSample" data-hidden="1" name="o<?= $Grid->RowIndex ?>_CollSample" id="o<?= $Grid->RowIndex ?>_CollSample" value="<?= HtmlEncode($Grid->CollSample->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->TestType->Visible) { // TestType ?>
        <td data-name="TestType">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_TestType" class="form-group patient_services_TestType">
<input type="<?= $Grid->TestType->getInputTextType() ?>" data-table="patient_services" data-field="x_TestType" name="x<?= $Grid->RowIndex ?>_TestType" id="x<?= $Grid->RowIndex ?>_TestType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->TestType->getPlaceHolder()) ?>" value="<?= $Grid->TestType->EditValue ?>"<?= $Grid->TestType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TestType->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_TestType" class="form-group patient_services_TestType">
<span<?= $Grid->TestType->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->TestType->getDisplayValue($Grid->TestType->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_TestType" data-hidden="1" name="x<?= $Grid->RowIndex ?>_TestType" id="x<?= $Grid->RowIndex ?>_TestType" value="<?= HtmlEncode($Grid->TestType->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_TestType" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TestType" id="o<?= $Grid->RowIndex ?>_TestType" value="<?= HtmlEncode($Grid->TestType->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Repeated->Visible) { // Repeated ?>
        <td data-name="Repeated">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Repeated" class="form-group patient_services_Repeated">
<input type="<?= $Grid->Repeated->getInputTextType() ?>" data-table="patient_services" data-field="x_Repeated" name="x<?= $Grid->RowIndex ?>_Repeated" id="x<?= $Grid->RowIndex ?>_Repeated" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Repeated->getPlaceHolder()) ?>" value="<?= $Grid->Repeated->EditValue ?>"<?= $Grid->Repeated->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Repeated->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Repeated" class="form-group patient_services_Repeated">
<span<?= $Grid->Repeated->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Repeated->getDisplayValue($Grid->Repeated->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Repeated" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Repeated" id="x<?= $Grid->RowIndex ?>_Repeated" value="<?= HtmlEncode($Grid->Repeated->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Repeated" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Repeated" id="o<?= $Grid->RowIndex ?>_Repeated" value="<?= HtmlEncode($Grid->Repeated->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->RepeatedBy->Visible) { // RepeatedBy ?>
        <td data-name="RepeatedBy">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_RepeatedBy" class="form-group patient_services_RepeatedBy">
<input type="<?= $Grid->RepeatedBy->getInputTextType() ?>" data-table="patient_services" data-field="x_RepeatedBy" name="x<?= $Grid->RowIndex ?>_RepeatedBy" id="x<?= $Grid->RowIndex ?>_RepeatedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->RepeatedBy->getPlaceHolder()) ?>" value="<?= $Grid->RepeatedBy->EditValue ?>"<?= $Grid->RepeatedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->RepeatedBy->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_RepeatedBy" class="form-group patient_services_RepeatedBy">
<span<?= $Grid->RepeatedBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->RepeatedBy->getDisplayValue($Grid->RepeatedBy->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_RepeatedBy" data-hidden="1" name="x<?= $Grid->RowIndex ?>_RepeatedBy" id="x<?= $Grid->RowIndex ?>_RepeatedBy" value="<?= HtmlEncode($Grid->RepeatedBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_RepeatedBy" data-hidden="1" name="o<?= $Grid->RowIndex ?>_RepeatedBy" id="o<?= $Grid->RowIndex ?>_RepeatedBy" value="<?= HtmlEncode($Grid->RepeatedBy->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->RepeatedDate->Visible) { // RepeatedDate ?>
        <td data-name="RepeatedDate">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_RepeatedDate" class="form-group patient_services_RepeatedDate">
<input type="<?= $Grid->RepeatedDate->getInputTextType() ?>" data-table="patient_services" data-field="x_RepeatedDate" name="x<?= $Grid->RowIndex ?>_RepeatedDate" id="x<?= $Grid->RowIndex ?>_RepeatedDate" placeholder="<?= HtmlEncode($Grid->RepeatedDate->getPlaceHolder()) ?>" value="<?= $Grid->RepeatedDate->EditValue ?>"<?= $Grid->RepeatedDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->RepeatedDate->getErrorMessage() ?></div>
<?php if (!$Grid->RepeatedDate->ReadOnly && !$Grid->RepeatedDate->Disabled && !isset($Grid->RepeatedDate->EditAttrs["readonly"]) && !isset($Grid->RepeatedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicesgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_servicesgrid", "x<?= $Grid->RowIndex ?>_RepeatedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_RepeatedDate" class="form-group patient_services_RepeatedDate">
<span<?= $Grid->RepeatedDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->RepeatedDate->getDisplayValue($Grid->RepeatedDate->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_RepeatedDate" data-hidden="1" name="x<?= $Grid->RowIndex ?>_RepeatedDate" id="x<?= $Grid->RowIndex ?>_RepeatedDate" value="<?= HtmlEncode($Grid->RepeatedDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_RepeatedDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_RepeatedDate" id="o<?= $Grid->RowIndex ?>_RepeatedDate" value="<?= HtmlEncode($Grid->RepeatedDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->serviceID->Visible) { // serviceID ?>
        <td data-name="serviceID">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_serviceID" class="form-group patient_services_serviceID">
<input type="<?= $Grid->serviceID->getInputTextType() ?>" data-table="patient_services" data-field="x_serviceID" name="x<?= $Grid->RowIndex ?>_serviceID" id="x<?= $Grid->RowIndex ?>_serviceID" size="30" placeholder="<?= HtmlEncode($Grid->serviceID->getPlaceHolder()) ?>" value="<?= $Grid->serviceID->EditValue ?>"<?= $Grid->serviceID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->serviceID->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_serviceID" class="form-group patient_services_serviceID">
<span<?= $Grid->serviceID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->serviceID->getDisplayValue($Grid->serviceID->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_serviceID" data-hidden="1" name="x<?= $Grid->RowIndex ?>_serviceID" id="x<?= $Grid->RowIndex ?>_serviceID" value="<?= HtmlEncode($Grid->serviceID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_serviceID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_serviceID" id="o<?= $Grid->RowIndex ?>_serviceID" value="<?= HtmlEncode($Grid->serviceID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Service_Type->Visible) { // Service_Type ?>
        <td data-name="Service_Type">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Service_Type" class="form-group patient_services_Service_Type">
<input type="<?= $Grid->Service_Type->getInputTextType() ?>" data-table="patient_services" data-field="x_Service_Type" name="x<?= $Grid->RowIndex ?>_Service_Type" id="x<?= $Grid->RowIndex ?>_Service_Type" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Service_Type->getPlaceHolder()) ?>" value="<?= $Grid->Service_Type->EditValue ?>"<?= $Grid->Service_Type->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Service_Type->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Service_Type" class="form-group patient_services_Service_Type">
<span<?= $Grid->Service_Type->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Service_Type->getDisplayValue($Grid->Service_Type->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Service_Type" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Service_Type" id="x<?= $Grid->RowIndex ?>_Service_Type" value="<?= HtmlEncode($Grid->Service_Type->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Service_Type" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Service_Type" id="o<?= $Grid->RowIndex ?>_Service_Type" value="<?= HtmlEncode($Grid->Service_Type->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Service_Department->Visible) { // Service_Department ?>
        <td data-name="Service_Department">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_Service_Department" class="form-group patient_services_Service_Department">
<input type="<?= $Grid->Service_Department->getInputTextType() ?>" data-table="patient_services" data-field="x_Service_Department" name="x<?= $Grid->RowIndex ?>_Service_Department" id="x<?= $Grid->RowIndex ?>_Service_Department" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Service_Department->getPlaceHolder()) ?>" value="<?= $Grid->Service_Department->EditValue ?>"<?= $Grid->Service_Department->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Service_Department->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_Service_Department" class="form-group patient_services_Service_Department">
<span<?= $Grid->Service_Department->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Service_Department->getDisplayValue($Grid->Service_Department->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_Service_Department" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Service_Department" id="x<?= $Grid->RowIndex ?>_Service_Department" value="<?= HtmlEncode($Grid->Service_Department->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Service_Department" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Service_Department" id="o<?= $Grid->RowIndex ?>_Service_Department" value="<?= HtmlEncode($Grid->Service_Department->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->RequestNo->Visible) { // RequestNo ?>
        <td data-name="RequestNo">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_services_RequestNo" class="form-group patient_services_RequestNo">
<input type="<?= $Grid->RequestNo->getInputTextType() ?>" data-table="patient_services" data-field="x_RequestNo" name="x<?= $Grid->RowIndex ?>_RequestNo" id="x<?= $Grid->RowIndex ?>_RequestNo" size="30" placeholder="<?= HtmlEncode($Grid->RequestNo->getPlaceHolder()) ?>" value="<?= $Grid->RequestNo->EditValue ?>"<?= $Grid->RequestNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->RequestNo->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_services_RequestNo" class="form-group patient_services_RequestNo">
<span<?= $Grid->RequestNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->RequestNo->getDisplayValue($Grid->RequestNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_services" data-field="x_RequestNo" data-hidden="1" name="x<?= $Grid->RowIndex ?>_RequestNo" id="x<?= $Grid->RowIndex ?>_RequestNo" value="<?= HtmlEncode($Grid->RequestNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_RequestNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_RequestNo" id="o<?= $Grid->RowIndex ?>_RequestNo" value="<?= HtmlEncode($Grid->RequestNo->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Grid->ListOptions->render("body", "right", $Grid->RowIndex);
?>
<script>
loadjs.ready(["fpatient_servicesgrid","load"], function() {
    fpatient_servicesgrid.updateLists(<?= $Grid->RowIndex ?>);
});
</script>
    </tr>
<?php
    }
?>
</tbody>
<?php
// Render aggregate row
$Grid->RowType = ROWTYPE_AGGREGATE;
$Grid->resetAttributes();
$Grid->renderRow();
?>
<?php if ($Grid->TotalRecords > 0 && $Grid->CurrentMode == "view") { ?>
<tfoot><!-- Table footer -->
    <tr class="ew-table-footer">
<?php
// Render list options
$Grid->renderListOptions();

// Render list options (footer, left)
$Grid->ListOptions->render("footer", "left");
?>
    <?php if ($Grid->id->Visible) { // id ?>
        <td data-name="id" class="<?= $Grid->id->footerCellClass() ?>"><span id="elf_patient_services_id" class="patient_services_id">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->Reception->Visible) { // Reception ?>
        <td data-name="Reception" class="<?= $Grid->Reception->footerCellClass() ?>"><span id="elf_patient_services_Reception" class="patient_services_Reception">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->Services->Visible) { // Services ?>
        <td data-name="Services" class="<?= $Grid->Services->footerCellClass() ?>"><span id="elf_patient_services_Services" class="patient_services_Services">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->amount->Visible) { // amount ?>
        <td data-name="amount" class="<?= $Grid->amount->footerCellClass() ?>"><span id="elf_patient_services_amount" class="patient_services_amount">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->description->Visible) { // description ?>
        <td data-name="description" class="<?= $Grid->description->footerCellClass() ?>"><span id="elf_patient_services_description" class="patient_services_description">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->patient_type->Visible) { // patient_type ?>
        <td data-name="patient_type" class="<?= $Grid->patient_type->footerCellClass() ?>"><span id="elf_patient_services_patient_type" class="patient_services_patient_type">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->charged_date->Visible) { // charged_date ?>
        <td data-name="charged_date" class="<?= $Grid->charged_date->footerCellClass() ?>"><span id="elf_patient_services_charged_date" class="patient_services_charged_date">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->status->Visible) { // status ?>
        <td data-name="status" class="<?= $Grid->status->footerCellClass() ?>"><span id="elf_patient_services_status" class="patient_services_status">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->mrnno->Visible) { // mrnno ?>
        <td data-name="mrnno" class="<?= $Grid->mrnno->footerCellClass() ?>"><span id="elf_patient_services_mrnno" class="patient_services_mrnno">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName" class="<?= $Grid->PatientName->footerCellClass() ?>"><span id="elf_patient_services_PatientName" class="patient_services_PatientName">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->Age->Visible) { // Age ?>
        <td data-name="Age" class="<?= $Grid->Age->footerCellClass() ?>"><span id="elf_patient_services_Age" class="patient_services_Age">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->Gender->Visible) { // Gender ?>
        <td data-name="Gender" class="<?= $Grid->Gender->footerCellClass() ?>"><span id="elf_patient_services_Gender" class="patient_services_Gender">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->Unit->Visible) { // Unit ?>
        <td data-name="Unit" class="<?= $Grid->Unit->footerCellClass() ?>"><span id="elf_patient_services_Unit" class="patient_services_Unit">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->Quantity->Visible) { // Quantity ?>
        <td data-name="Quantity" class="<?= $Grid->Quantity->footerCellClass() ?>"><span id="elf_patient_services_Quantity" class="patient_services_Quantity">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->Discount->Visible) { // Discount ?>
        <td data-name="Discount" class="<?= $Grid->Discount->footerCellClass() ?>"><span id="elf_patient_services_Discount" class="patient_services_Discount">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->SubTotal->Visible) { // SubTotal ?>
        <td data-name="SubTotal" class="<?= $Grid->SubTotal->footerCellClass() ?>"><span id="elf_patient_services_SubTotal" class="patient_services_SubTotal">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Grid->SubTotal->ViewValue ?></span>
        </span></td>
    <?php } ?>
    <?php if ($Grid->ServiceSelect->Visible) { // ServiceSelect ?>
        <td data-name="ServiceSelect" class="<?= $Grid->ServiceSelect->footerCellClass() ?>"><span id="elf_patient_services_ServiceSelect" class="patient_services_ServiceSelect">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->Aid->Visible) { // Aid ?>
        <td data-name="Aid" class="<?= $Grid->Aid->footerCellClass() ?>"><span id="elf_patient_services_Aid" class="patient_services_Aid">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->Vid->Visible) { // Vid ?>
        <td data-name="Vid" class="<?= $Grid->Vid->footerCellClass() ?>"><span id="elf_patient_services_Vid" class="patient_services_Vid">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->DrID->Visible) { // DrID ?>
        <td data-name="DrID" class="<?= $Grid->DrID->footerCellClass() ?>"><span id="elf_patient_services_DrID" class="patient_services_DrID">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->DrCODE->Visible) { // DrCODE ?>
        <td data-name="DrCODE" class="<?= $Grid->DrCODE->footerCellClass() ?>"><span id="elf_patient_services_DrCODE" class="patient_services_DrCODE">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->DrName->Visible) { // DrName ?>
        <td data-name="DrName" class="<?= $Grid->DrName->footerCellClass() ?>"><span id="elf_patient_services_DrName" class="patient_services_DrName">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->Department->Visible) { // Department ?>
        <td data-name="Department" class="<?= $Grid->Department->footerCellClass() ?>"><span id="elf_patient_services_Department" class="patient_services_Department">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->DrSharePres->Visible) { // DrSharePres ?>
        <td data-name="DrSharePres" class="<?= $Grid->DrSharePres->footerCellClass() ?>"><span id="elf_patient_services_DrSharePres" class="patient_services_DrSharePres">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->HospSharePres->Visible) { // HospSharePres ?>
        <td data-name="HospSharePres" class="<?= $Grid->HospSharePres->footerCellClass() ?>"><span id="elf_patient_services_HospSharePres" class="patient_services_HospSharePres">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->DrShareAmount->Visible) { // DrShareAmount ?>
        <td data-name="DrShareAmount" class="<?= $Grid->DrShareAmount->footerCellClass() ?>"><span id="elf_patient_services_DrShareAmount" class="patient_services_DrShareAmount">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->HospShareAmount->Visible) { // HospShareAmount ?>
        <td data-name="HospShareAmount" class="<?= $Grid->HospShareAmount->footerCellClass() ?>"><span id="elf_patient_services_HospShareAmount" class="patient_services_HospShareAmount">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
        <td data-name="DrShareSettiledAmount" class="<?= $Grid->DrShareSettiledAmount->footerCellClass() ?>"><span id="elf_patient_services_DrShareSettiledAmount" class="patient_services_DrShareSettiledAmount">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->DrShareSettledId->Visible) { // DrShareSettledId ?>
        <td data-name="DrShareSettledId" class="<?= $Grid->DrShareSettledId->footerCellClass() ?>"><span id="elf_patient_services_DrShareSettledId" class="patient_services_DrShareSettledId">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
        <td data-name="DrShareSettiledStatus" class="<?= $Grid->DrShareSettiledStatus->footerCellClass() ?>"><span id="elf_patient_services_DrShareSettiledStatus" class="patient_services_DrShareSettiledStatus">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->invoiceId->Visible) { // invoiceId ?>
        <td data-name="invoiceId" class="<?= $Grid->invoiceId->footerCellClass() ?>"><span id="elf_patient_services_invoiceId" class="patient_services_invoiceId">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->invoiceAmount->Visible) { // invoiceAmount ?>
        <td data-name="invoiceAmount" class="<?= $Grid->invoiceAmount->footerCellClass() ?>"><span id="elf_patient_services_invoiceAmount" class="patient_services_invoiceAmount">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->invoiceStatus->Visible) { // invoiceStatus ?>
        <td data-name="invoiceStatus" class="<?= $Grid->invoiceStatus->footerCellClass() ?>"><span id="elf_patient_services_invoiceStatus" class="patient_services_invoiceStatus">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->modeOfPayment->Visible) { // modeOfPayment ?>
        <td data-name="modeOfPayment" class="<?= $Grid->modeOfPayment->footerCellClass() ?>"><span id="elf_patient_services_modeOfPayment" class="patient_services_modeOfPayment">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->HospID->Visible) { // HospID ?>
        <td data-name="HospID" class="<?= $Grid->HospID->footerCellClass() ?>"><span id="elf_patient_services_HospID" class="patient_services_HospID">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->RIDNO->Visible) { // RIDNO ?>
        <td data-name="RIDNO" class="<?= $Grid->RIDNO->footerCellClass() ?>"><span id="elf_patient_services_RIDNO" class="patient_services_RIDNO">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->TidNo->Visible) { // TidNo ?>
        <td data-name="TidNo" class="<?= $Grid->TidNo->footerCellClass() ?>"><span id="elf_patient_services_TidNo" class="patient_services_TidNo">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->DiscountCategory->Visible) { // DiscountCategory ?>
        <td data-name="DiscountCategory" class="<?= $Grid->DiscountCategory->footerCellClass() ?>"><span id="elf_patient_services_DiscountCategory" class="patient_services_DiscountCategory">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->sid->Visible) { // sid ?>
        <td data-name="sid" class="<?= $Grid->sid->footerCellClass() ?>"><span id="elf_patient_services_sid" class="patient_services_sid">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->ItemCode->Visible) { // ItemCode ?>
        <td data-name="ItemCode" class="<?= $Grid->ItemCode->footerCellClass() ?>"><span id="elf_patient_services_ItemCode" class="patient_services_ItemCode">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->TestSubCd->Visible) { // TestSubCd ?>
        <td data-name="TestSubCd" class="<?= $Grid->TestSubCd->footerCellClass() ?>"><span id="elf_patient_services_TestSubCd" class="patient_services_TestSubCd">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->DEptCd->Visible) { // DEptCd ?>
        <td data-name="DEptCd" class="<?= $Grid->DEptCd->footerCellClass() ?>"><span id="elf_patient_services_DEptCd" class="patient_services_DEptCd">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->ProfCd->Visible) { // ProfCd ?>
        <td data-name="ProfCd" class="<?= $Grid->ProfCd->footerCellClass() ?>"><span id="elf_patient_services_ProfCd" class="patient_services_ProfCd">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->Comments->Visible) { // Comments ?>
        <td data-name="Comments" class="<?= $Grid->Comments->footerCellClass() ?>"><span id="elf_patient_services_Comments" class="patient_services_Comments">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->Method->Visible) { // Method ?>
        <td data-name="Method" class="<?= $Grid->Method->footerCellClass() ?>"><span id="elf_patient_services_Method" class="patient_services_Method">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->Specimen->Visible) { // Specimen ?>
        <td data-name="Specimen" class="<?= $Grid->Specimen->footerCellClass() ?>"><span id="elf_patient_services_Specimen" class="patient_services_Specimen">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->Abnormal->Visible) { // Abnormal ?>
        <td data-name="Abnormal" class="<?= $Grid->Abnormal->footerCellClass() ?>"><span id="elf_patient_services_Abnormal" class="patient_services_Abnormal">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->TestUnit->Visible) { // TestUnit ?>
        <td data-name="TestUnit" class="<?= $Grid->TestUnit->footerCellClass() ?>"><span id="elf_patient_services_TestUnit" class="patient_services_TestUnit">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->LOWHIGH->Visible) { // LOWHIGH ?>
        <td data-name="LOWHIGH" class="<?= $Grid->LOWHIGH->footerCellClass() ?>"><span id="elf_patient_services_LOWHIGH" class="patient_services_LOWHIGH">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->Branch->Visible) { // Branch ?>
        <td data-name="Branch" class="<?= $Grid->Branch->footerCellClass() ?>"><span id="elf_patient_services_Branch" class="patient_services_Branch">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->Dispatch->Visible) { // Dispatch ?>
        <td data-name="Dispatch" class="<?= $Grid->Dispatch->footerCellClass() ?>"><span id="elf_patient_services_Dispatch" class="patient_services_Dispatch">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->Pic1->Visible) { // Pic1 ?>
        <td data-name="Pic1" class="<?= $Grid->Pic1->footerCellClass() ?>"><span id="elf_patient_services_Pic1" class="patient_services_Pic1">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->Pic2->Visible) { // Pic2 ?>
        <td data-name="Pic2" class="<?= $Grid->Pic2->footerCellClass() ?>"><span id="elf_patient_services_Pic2" class="patient_services_Pic2">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->GraphPath->Visible) { // GraphPath ?>
        <td data-name="GraphPath" class="<?= $Grid->GraphPath->footerCellClass() ?>"><span id="elf_patient_services_GraphPath" class="patient_services_GraphPath">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->MachineCD->Visible) { // MachineCD ?>
        <td data-name="MachineCD" class="<?= $Grid->MachineCD->footerCellClass() ?>"><span id="elf_patient_services_MachineCD" class="patient_services_MachineCD">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->TestCancel->Visible) { // TestCancel ?>
        <td data-name="TestCancel" class="<?= $Grid->TestCancel->footerCellClass() ?>"><span id="elf_patient_services_TestCancel" class="patient_services_TestCancel">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->OutSource->Visible) { // OutSource ?>
        <td data-name="OutSource" class="<?= $Grid->OutSource->footerCellClass() ?>"><span id="elf_patient_services_OutSource" class="patient_services_OutSource">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->Printed->Visible) { // Printed ?>
        <td data-name="Printed" class="<?= $Grid->Printed->footerCellClass() ?>"><span id="elf_patient_services_Printed" class="patient_services_Printed">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->PrintBy->Visible) { // PrintBy ?>
        <td data-name="PrintBy" class="<?= $Grid->PrintBy->footerCellClass() ?>"><span id="elf_patient_services_PrintBy" class="patient_services_PrintBy">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->PrintDate->Visible) { // PrintDate ?>
        <td data-name="PrintDate" class="<?= $Grid->PrintDate->footerCellClass() ?>"><span id="elf_patient_services_PrintDate" class="patient_services_PrintDate">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->BillingDate->Visible) { // BillingDate ?>
        <td data-name="BillingDate" class="<?= $Grid->BillingDate->footerCellClass() ?>"><span id="elf_patient_services_BillingDate" class="patient_services_BillingDate">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->BilledBy->Visible) { // BilledBy ?>
        <td data-name="BilledBy" class="<?= $Grid->BilledBy->footerCellClass() ?>"><span id="elf_patient_services_BilledBy" class="patient_services_BilledBy">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->Resulted->Visible) { // Resulted ?>
        <td data-name="Resulted" class="<?= $Grid->Resulted->footerCellClass() ?>"><span id="elf_patient_services_Resulted" class="patient_services_Resulted">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->ResultDate->Visible) { // ResultDate ?>
        <td data-name="ResultDate" class="<?= $Grid->ResultDate->footerCellClass() ?>"><span id="elf_patient_services_ResultDate" class="patient_services_ResultDate">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->ResultedBy->Visible) { // ResultedBy ?>
        <td data-name="ResultedBy" class="<?= $Grid->ResultedBy->footerCellClass() ?>"><span id="elf_patient_services_ResultedBy" class="patient_services_ResultedBy">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->SampleDate->Visible) { // SampleDate ?>
        <td data-name="SampleDate" class="<?= $Grid->SampleDate->footerCellClass() ?>"><span id="elf_patient_services_SampleDate" class="patient_services_SampleDate">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->SampleUser->Visible) { // SampleUser ?>
        <td data-name="SampleUser" class="<?= $Grid->SampleUser->footerCellClass() ?>"><span id="elf_patient_services_SampleUser" class="patient_services_SampleUser">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->Sampled->Visible) { // Sampled ?>
        <td data-name="Sampled" class="<?= $Grid->Sampled->footerCellClass() ?>"><span id="elf_patient_services_Sampled" class="patient_services_Sampled">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->ReceivedDate->Visible) { // ReceivedDate ?>
        <td data-name="ReceivedDate" class="<?= $Grid->ReceivedDate->footerCellClass() ?>"><span id="elf_patient_services_ReceivedDate" class="patient_services_ReceivedDate">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->ReceivedUser->Visible) { // ReceivedUser ?>
        <td data-name="ReceivedUser" class="<?= $Grid->ReceivedUser->footerCellClass() ?>"><span id="elf_patient_services_ReceivedUser" class="patient_services_ReceivedUser">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->Recevied->Visible) { // Recevied ?>
        <td data-name="Recevied" class="<?= $Grid->Recevied->footerCellClass() ?>"><span id="elf_patient_services_Recevied" class="patient_services_Recevied">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->DeptRecvDate->Visible) { // DeptRecvDate ?>
        <td data-name="DeptRecvDate" class="<?= $Grid->DeptRecvDate->footerCellClass() ?>"><span id="elf_patient_services_DeptRecvDate" class="patient_services_DeptRecvDate">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->DeptRecvUser->Visible) { // DeptRecvUser ?>
        <td data-name="DeptRecvUser" class="<?= $Grid->DeptRecvUser->footerCellClass() ?>"><span id="elf_patient_services_DeptRecvUser" class="patient_services_DeptRecvUser">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->DeptRecived->Visible) { // DeptRecived ?>
        <td data-name="DeptRecived" class="<?= $Grid->DeptRecived->footerCellClass() ?>"><span id="elf_patient_services_DeptRecived" class="patient_services_DeptRecived">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->SAuthDate->Visible) { // SAuthDate ?>
        <td data-name="SAuthDate" class="<?= $Grid->SAuthDate->footerCellClass() ?>"><span id="elf_patient_services_SAuthDate" class="patient_services_SAuthDate">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->SAuthBy->Visible) { // SAuthBy ?>
        <td data-name="SAuthBy" class="<?= $Grid->SAuthBy->footerCellClass() ?>"><span id="elf_patient_services_SAuthBy" class="patient_services_SAuthBy">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->SAuthendicate->Visible) { // SAuthendicate ?>
        <td data-name="SAuthendicate" class="<?= $Grid->SAuthendicate->footerCellClass() ?>"><span id="elf_patient_services_SAuthendicate" class="patient_services_SAuthendicate">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->AuthDate->Visible) { // AuthDate ?>
        <td data-name="AuthDate" class="<?= $Grid->AuthDate->footerCellClass() ?>"><span id="elf_patient_services_AuthDate" class="patient_services_AuthDate">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->AuthBy->Visible) { // AuthBy ?>
        <td data-name="AuthBy" class="<?= $Grid->AuthBy->footerCellClass() ?>"><span id="elf_patient_services_AuthBy" class="patient_services_AuthBy">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->Authencate->Visible) { // Authencate ?>
        <td data-name="Authencate" class="<?= $Grid->Authencate->footerCellClass() ?>"><span id="elf_patient_services_Authencate" class="patient_services_Authencate">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->EditDate->Visible) { // EditDate ?>
        <td data-name="EditDate" class="<?= $Grid->EditDate->footerCellClass() ?>"><span id="elf_patient_services_EditDate" class="patient_services_EditDate">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->EditBy->Visible) { // EditBy ?>
        <td data-name="EditBy" class="<?= $Grid->EditBy->footerCellClass() ?>"><span id="elf_patient_services_EditBy" class="patient_services_EditBy">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->Editted->Visible) { // Editted ?>
        <td data-name="Editted" class="<?= $Grid->Editted->footerCellClass() ?>"><span id="elf_patient_services_Editted" class="patient_services_Editted">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->PatID->Visible) { // PatID ?>
        <td data-name="PatID" class="<?= $Grid->PatID->footerCellClass() ?>"><span id="elf_patient_services_PatID" class="patient_services_PatID">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->PatientId->Visible) { // PatientId ?>
        <td data-name="PatientId" class="<?= $Grid->PatientId->footerCellClass() ?>"><span id="elf_patient_services_PatientId" class="patient_services_PatientId">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->Mobile->Visible) { // Mobile ?>
        <td data-name="Mobile" class="<?= $Grid->Mobile->footerCellClass() ?>"><span id="elf_patient_services_Mobile" class="patient_services_Mobile">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->CId->Visible) { // CId ?>
        <td data-name="CId" class="<?= $Grid->CId->footerCellClass() ?>"><span id="elf_patient_services_CId" class="patient_services_CId">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->Order->Visible) { // Order ?>
        <td data-name="Order" class="<?= $Grid->Order->footerCellClass() ?>"><span id="elf_patient_services_Order" class="patient_services_Order">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->ResType->Visible) { // ResType ?>
        <td data-name="ResType" class="<?= $Grid->ResType->footerCellClass() ?>"><span id="elf_patient_services_ResType" class="patient_services_ResType">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->Sample->Visible) { // Sample ?>
        <td data-name="Sample" class="<?= $Grid->Sample->footerCellClass() ?>"><span id="elf_patient_services_Sample" class="patient_services_Sample">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->NoD->Visible) { // NoD ?>
        <td data-name="NoD" class="<?= $Grid->NoD->footerCellClass() ?>"><span id="elf_patient_services_NoD" class="patient_services_NoD">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->BillOrder->Visible) { // BillOrder ?>
        <td data-name="BillOrder" class="<?= $Grid->BillOrder->footerCellClass() ?>"><span id="elf_patient_services_BillOrder" class="patient_services_BillOrder">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->Inactive->Visible) { // Inactive ?>
        <td data-name="Inactive" class="<?= $Grid->Inactive->footerCellClass() ?>"><span id="elf_patient_services_Inactive" class="patient_services_Inactive">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->CollSample->Visible) { // CollSample ?>
        <td data-name="CollSample" class="<?= $Grid->CollSample->footerCellClass() ?>"><span id="elf_patient_services_CollSample" class="patient_services_CollSample">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->TestType->Visible) { // TestType ?>
        <td data-name="TestType" class="<?= $Grid->TestType->footerCellClass() ?>"><span id="elf_patient_services_TestType" class="patient_services_TestType">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->Repeated->Visible) { // Repeated ?>
        <td data-name="Repeated" class="<?= $Grid->Repeated->footerCellClass() ?>"><span id="elf_patient_services_Repeated" class="patient_services_Repeated">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->RepeatedBy->Visible) { // RepeatedBy ?>
        <td data-name="RepeatedBy" class="<?= $Grid->RepeatedBy->footerCellClass() ?>"><span id="elf_patient_services_RepeatedBy" class="patient_services_RepeatedBy">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->RepeatedDate->Visible) { // RepeatedDate ?>
        <td data-name="RepeatedDate" class="<?= $Grid->RepeatedDate->footerCellClass() ?>"><span id="elf_patient_services_RepeatedDate" class="patient_services_RepeatedDate">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->serviceID->Visible) { // serviceID ?>
        <td data-name="serviceID" class="<?= $Grid->serviceID->footerCellClass() ?>"><span id="elf_patient_services_serviceID" class="patient_services_serviceID">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->Service_Type->Visible) { // Service_Type ?>
        <td data-name="Service_Type" class="<?= $Grid->Service_Type->footerCellClass() ?>"><span id="elf_patient_services_Service_Type" class="patient_services_Service_Type">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->Service_Department->Visible) { // Service_Department ?>
        <td data-name="Service_Department" class="<?= $Grid->Service_Department->footerCellClass() ?>"><span id="elf_patient_services_Service_Department" class="patient_services_Service_Department">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->RequestNo->Visible) { // RequestNo ?>
        <td data-name="RequestNo" class="<?= $Grid->RequestNo->footerCellClass() ?>"><span id="elf_patient_services_RequestNo" class="patient_services_RequestNo">
        &nbsp;
        </span></td>
    <?php } ?>
<?php
// Render list options (footer, right)
$Grid->ListOptions->render("footer", "right");
?>
    </tr>
</tfoot>
<?php } ?>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
<?php if ($Grid->CurrentMode == "add" || $Grid->CurrentMode == "copy") { ?>
<input type="hidden" name="<?= $Grid->FormKeyCountName ?>" id="<?= $Grid->FormKeyCountName ?>" value="<?= $Grid->KeyCount ?>">
<?= $Grid->MultiSelectKey ?>
<?php } ?>
<?php if ($Grid->CurrentMode == "edit") { ?>
<input type="hidden" name="<?= $Grid->FormKeyCountName ?>" id="<?= $Grid->FormKeyCountName ?>" value="<?= $Grid->KeyCount ?>">
<?= $Grid->MultiSelectKey ?>
<?php } ?>
<?php if ($Grid->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fpatient_servicesgrid">
</div><!-- /.ew-list-form -->
<?php
// Close recordset
if ($Grid->Recordset) {
    $Grid->Recordset->close();
}
?>
<?php if ($Grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $Grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($Grid->TotalRecords == 0 && !$Grid->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $Grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$Grid->isExport()) { ?>
<script>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("patient_services");
});
</script>
<script>
loadjs.ready("load", function () {
    // Startup script
    // Write your table-specific startup script here
    // document.write("page loaded");
    	var myParent =  document.getElementById("tpd_ip_admissionmaster");
    //		var myParent =  document.getElementById("fpatient_serviceslistsrch");
    	var t = document.createTextNode("Select Activity Card : ");
    	try {
    		myParent.appendChild(t);
    	} catch{
    		var myParent = document.getElementById("tpd_view_appointment_schedulermaster");
    		myParent.appendChild(t);
    	}

    //Create array of options to be added
    var array = ["Volvo","Saab","Mercades","Audi"];

    //Create and append select list
    var selectList = document.createElement("select");
    selectList.id = "mySelect";
    myParent.appendChild(selectList);

    //Create and append the options
    //for (var i = 0; i < array.length; i++) {
    //    var option = document.createElement("option");
    //    option.value = array[i];
    //    option.text = array[i];
    //    selectList.appendChild(option);
    //}
    	var btn = document.createElement("BUTTON");   // Create a <button> element
    	btn.innerHTML = "Select";                   // Insert text
    	btn.addEventListener("click", myScriptSelect);
    myParent.appendChild(btn);               // Append <button> to <body>
    		var user = [{
    			'CustomerName': '<?php  echo CurrentUserName();  ?>'                    
    		}];

    	//v
    		var jsonString = JSON.stringify(user);
    			$.ajax({
    				type: "POST",
    				url: "ajaxinsert.php?control=selectActivityCardGroup",
    				data: { data: jsonString },
    				cache: false,
    				success: function (data) {
    					let jsonObject = JSON.parse(data);
    					var json = jsonObject["records"];
    					for(var i = 0; i < json.length; i++) {
    						var obj = json[i];

    						//console.log(obj.id);
    						 var option = document.createElement("option");
    	option.value = obj.Type;
    	option.text = obj.Type;
    	selectList.appendChild(option);
    					  }

    					//alert(data + "Saved Sucessfully...........");
    					//swal({ text: "Saved Sucessfully......", icon: "success", });
    				   // Receiptreset();
    				  //  document.getElementById("VoucherAmt0").focus();
    				}
    			});
    	for (var i = 0; i < 40; i++) {
    		var kkk = $('*[data-caption="Add Blank Row"]')
    		ew.addGridRow(kkk);
    	}

    	function myScriptSelect() {
    	   // alert("hai");
    //n
    		var hhhh = document.getElementById("mySelect");
    				var user = [{
    					'CustomerName': '<?php  echo CurrentUserName();  ?>',
    					'ActivityCard': hhhh.value
    		}];

    	//v
    		var jsonString = JSON.stringify(user);
    			$.ajax({
    				type: "POST",
    				url: "ajaxinsert.php?control=selectActivityCard",
    				data: { data: jsonString },
    				cache: false,
    				success: function (data) {
    					let jsonObject = JSON.parse(data);
    					var json = jsonObject["records"];
    					for (var i = 0; i < json.length; i++) {
    					//	var kkk  = $('*[data-caption="Add Blank Row"]')
    					//	ew.addGridRow(kkk);
    						var obj = json[i];
    						console.log(obj.id);
    						  //var Services = document.getElementById("lu_x" + (i + 1) + "_Services");
    						   var Services = document.getElementById("sv_x" + (i + 1) + "_Services");
    						Services.innerHTML  = obj.SERVICE;
    						Services.selectedIndex = obj.SERVICE;
    						Services.value = obj.SERVICE;
    						Services.text = obj.SERVICE;

    					  //  Services.innerHTML  = obj.SERVICE;
    					  //  Services.selectedIndex = obj.id;
    					 var Services = document.getElementById("x" + (i + 1) + "_Services");
    					 Services.value = obj.SERVICE;
    						var amount = document.getElementById("x"+(i+1)+"_amount");
    						amount.value = obj.Amount;
    						var serviceID = document.getElementById("x"+(i+1)+"_serviceID");
    						serviceID.value = obj.serviceID;
    						var sid = document.getElementById("x"+(i+1)+"_sid");
    						sid.value = obj.serviceID;
    						var ItemCode = document.getElementById("x"+(i+1)+"_ItemCode");
    						ItemCode.value = obj.ItemCode;
    						var Service_Type = document.getElementById("x"+(i+1)+"_Service_Type");
    						Service_Type.value = obj.Service_Type;
    						var Service_Department = document.getElementById("x"+(i+1)+"_Service_Department");
    						Service_Department.value = obj.Service_Department;

    						//var M = document.getElementById("x"+(i+1)+"_M");
    						//M.value = obj.M;
    						//var A = document.getElementById("x"+(i+1)+"_A");
    						//A.value = obj.A;
    						//var N = document.getElementById("x"+(i+1)+"_N");
    						//N.value = obj.N;
    						//var NoOfDays = document.getElementById("x"+(i+1)+"_NoOfDays");
    						//NoOfDays.value = obj.NoOfDays;
    						//var PreRoute = document.getElementById("sv_x"+(i+1)+"_PreRoute");
    						//PreRoute.value = obj.PreRoute;
    						//var TimeOfTaking = document.getElementById("sv_x"+(i+1)+"_TimeOfTaking");
    						//TimeOfTaking.value = obj.TimeOfTaking;
    						//   var TimeOfTaking = document.getElementById("x"+(i+1)+"_Type");
    						//TimeOfTaking.value = 'Normal';
    						//var TimeOfTaking = document.getElementById("x"+(i+1)+"_Status");
    						//TimeOfTaking.value = 'Live';
    					  }

    					//alert(data + "Saved Sucessfully...........");
    					//swal({ text: "Saved Sucessfully......", icon: "success", });
    				   // Receiptreset();
    				  //  document.getElementById("VoucherAmt0").focus();
    				}
    			});
    	}
    	document.getElementById("ct_patient_services_list").style.overflow = "auto";
     </script>
    <style>
    .input-group {
    	position: relative;
    	display: flex;
    	flex-wrap: unset;
    	align-items: stretch;
    	width: 100%;
    }
    .ew-grid .ew-table>tbody>tr>td, .ew-grid .ew-table>tfoot>tr>td {
    	padding: .0rem;
    	border-bottom: 1px solid;
    	border-top: 0;
    	border-left: 0;
    	border-right: 1px solid;
    	border-color: silver;
    }
    .text-nowrap {
    	white-space: nowrap !important;
    	line-height: 1;
    	height: 33px;
    }
    input[type=text]:not([size]):not([name=pageno]):not(.cke_dialog_ui_input_text):not(.form-control-plaintext), input[type=password]:not([size]) {
    	min-width: 25px;
    }
    </style>
    <script>

    	function ModeOfPaymentSelected(hh) {
    		//alert(hh.value);
    		var str = hh.value;
    		var res = str.split("###");
    		//alert(res[0]);
    		if (res[1]==2) {
    			document.getElementById("BankDetailsShowHide").style.display = "none";
    		} else {
    			document.getElementById("BankDetailsShowHide").style.display = "block";
    		}
    	}

    	function BillingTypeSelected(hh) {
    		var str = hh.value;
    		document.getElementById("SaveBill").innerHTML = 'Create ' + str;
    	}

    	function SaveBill() {
    //	b
    //alert('Save Bill');
    	for (var i = 1; i < 40; i++) {
    	//	var deletebilll = $('*[data-caption="Delete"]');
    	//	RowDeleteButton
    			var deletebilll =	document.getElementById("RowDeleteButton"+i);
    	var QUel =	document.getElementById("x"+i+"_Quantity");
    		if(QUel.value=='')
    		{
    			 // var Services = document.getElementById("lu_x"+i+"_Services");
    			    var Services = document.getElementById("sv_x" + i + "_Services");
    						Services.innerHTML  = '';
    						Services.selectedIndex = '';
    						Services.value = '';
    						Services.text = '';

    					  //  Services.innerHTML  = obj.SERVICE;
    					  //  Services.selectedIndex = obj.id;
    					 var Services = document.getElementById("x"+i+"_Services");
    					 Services.value = '';
    						var amount = document.getElementById("x"+i+"_amount");
    			amount.value = '';
    						var serviceID = document.getElementById("x"+i+"_serviceID");
    						serviceID.value = '';
    						var sid = document.getElementById("x"+i+"_sid");
    						sid.value = '';
    						var ItemCode = document.getElementById("x"+i+"_ItemCode");
    						ItemCode.value = '';
    						var Service_Type = document.getElementById("x"+i+"_Service_Type");
    						Service_Type.value = '';
    						var Service_Department = document.getElementById("x"+i+"_Service_Department");
    						Service_Department.value = '';

    			//ew.deleteGridRow(deletebilll, i);
    		}
    	}
    //	var savebillll = $('*[data-caption="Insert"]');
    //ew.forms(savebillll).submit('patient_serviceslist.php');

    	//	var fk_mrnNoA = getUrlVars()["fk_mrnNo"];
    	//	var fk_patient_idA = getUrlVars()["fk_patient_id"];
    	//	var fk_idA = getUrlVars()["fk_id"];

    	//	var ModeOfPayment = document.getElementById("ModeOfPayment");
    	//	var ModeOfPaymentV = ModeOfPayment.value;
    	///	var BillingType = document.getElementById("BillingType");
    	//	var BillingTypeV = BillingType.value;
    	//	var BillAmount = document.getElementById("BillAmount");
    	//	var BillAmountV = BillAmount.value;

    	//	ew.forms(savebillll).submit('patient_serviceslist.php?showmaster=ip_admission&fk_mrnNo=' + fk_mrnNoA + '&fk_patient_id=' + fk_patient_idA + '&fk_id=' + fk_idA  + '&PBillingType=' + BillingTypeV + '&PBillAmount=' + BillAmountV + '&PModeOfPayment=' + ModeOfPaymentV);

    	//	ew.forms(savebillll).submit('patient_serviceslist.php?showmaster=ip_admission&fk_mrnNo=' + fk_mrnNoA + '&fk_patient_id=' + fk_patient_idA + '&fk_id=' + fk_idA + '&PModeOfPayment=' + ModeOfPaymentV + '&PBillingType=' + BillingTypeV + '&PBillAmount=' + BillAmountV);
    		//alert('Save Bill ---  AAAAAAA ');
    	}

     function getUrlVars() {
    	var vars = {};
    	var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
    		vars[key] = value;
    	});
    	return vars;
    }

    function addtotalSum()
    {	
    	var totSum = 0;
    	for (var i = 1; i < 40; i++) {
    			try {
    				var amount = document.getElementById("x" + i + "_SubTotal");
    				if (amount.value != '') {
    					totSum = parseInt(totSum) + parseInt(amount.value);
    				}
    			}
    			catch(err) {
    			}
    	}
    		var BillAmount = document.getElementById("BillAmount");
    		BillAmount.value = totSum;
    }	
    </script>
    <div class="row">
    		  <div class="col-md-12">
    			<div class="card">
    			  <div class="card-header">
    				<h3 class="card-title">Final Bill / Receipt</h3>
    			  </div>
    			  <!-- /.card-header -->
    			  <div class="card-body">
    <table class="table table-bordered">
    	 <tbody>
    		<tr hidden ><td style="width: 50%">
    			 <div class="form-group row">
    					<label for="inputEmail3" class="col-sm-4 col-form-label">Mode Of Payment</label>
    					<div class="col-sm-8">
    			<select class="custom-select" id="ModeOfPayment" name="ModeOfPayment" onchange="ModeOfPaymentSelected(this)">
    <?php
    $dbhelper = &DbHelper();
    $sql = "SELECT * FROM ganeshkumar_bjhims.mas_modepayment;";
    $rs = $dbhelper->LoadRecordset($sql);
    $optioon = '';
    while (!$rs->EOF) {
    	$row = &$rs->fields;
    	$ModeId =  $row["id"];
    	$PayMode =  $row["Mode"];
    	$BankingDatails =  $row["BankingDatails"];
    	$optioon .= '  <option value="'.$PayMode.'###'.$BankingDatails.'">'.$PayMode.'</option>';
    	$rs->MoveNext();
    }
    echo $optioon;
     ?>
    				</select>
    						</div>
    			 </div>
    		  </td>
    		 <td style="width: 50%">
    <div class="form-group row">
    					<label for="inputEmail3" class="col-sm-4 col-form-label">Billing Type</label>
    					<div class="col-sm-8">
    			<select class="custom-select"  id="BillingType" name="BillingType"  onchange="BillingTypeSelected(this)">
    <?php
    $dbhelper = &DbHelper();
    $sql = "SELECT * FROM ganeshkumar_bjhims.billing_type;";
    $rs = $dbhelper->LoadRecordset($sql);
    $optioon = '';
    while (!$rs->EOF) {
    	$row = &$rs->fields;
    	$ModeId =  $row["id"];
    	$PayMode =  $row["Type"];
    	$optioon .= '  <option value="'.$PayMode.'">'.$PayMode.'</option>';
    	$rs->MoveNext();
    }
    echo $optioon;
     ?>
    				</select>
    						</div>
    			 </div>
    		 </td>
    		 </tr>
    		<tr>
    		 <td>
    			<div class="form-group row">
    					<label for="inputEmail3" class="col-sm-4 col-form-label">Amount</label>
    					<div class="col-sm-8">
    					  <input type="text" class="form-control" id="BillAmount" name="BillAmount" placeholder="Amount">
    					</div>
    			 </div>
    		 </td>
    		 <td>
    			<div class="form-group row">
    					<button onclick="SaveBill()" type="button" id="SaveBill" class="btn btn-info">Save</button>
    			 </div>
    		 </td>
    		</tr>
    	</tbody>
    </table>
     </div>
    			  <!-- /.card-body -->
    			</div>
    			<!-- /.card -->
    		  </div>
    		  <!-- /.col -->
    		</div>
    <div class="row" id="BankDetailsShowHide">
    		  <div class="col-md-12">
    			<div class="card bg-success">
    			  <div class="card-header">
    				<h3 class="card-title">Bank Details</h3>
    			  </div>
    			  <!-- /.card-header -->
    			  <div class="card-body">
    <table class="table table-bordered">
    	 <tbody>
    		<tr>
    			<td style="width: 25%">
    							<div class="form-group row">
    					<label for="inputEmail3" class="col-sm-4 col-form-label">Card/Acc No</label>
    					<div class="col-sm-6">
    					  <input type="text" class="form-control" id="CardAccNo" name="CardAccNo" placeholder="Card/Acc No">
    					</div>
    			 </div>
    			</td>
    			 <td style="width: 25%">
    				 			<div class="form-group row">
    					<label for="inputEmail3" class="col-sm-4 col-form-label">BankName</label>
    					<div class="col-sm-6">
    					  <input type="text" class="form-control" id="BankName" name="BankName" placeholder="Bank Name">
    					</div>
    			 </div>
    			</td>
    			 <td style="width: 25%">
    				 			<div class="form-group row">
    					<label for="inputEmail3" class="col-sm-4 col-form-label">Acc Holder Name</label>
    					<div class="col-sm-6">
    					  <input type="text" class="form-control" id="AccHolderName" name="AccHolderName" placeholder="Acc Holder Name">
    					</div>
    			 </div>
    			</td>
    		</tr>
    		 <tr>
    			<td style="width: 25%">
    							<div class="form-group row">
    					<label for="inputEmail3" class="col-sm-4 col-form-label">Type</label>
    					<div class="col-sm-6">
    					  <input type="text" class="form-control" id="BankingType" name="BankingType" placeholder="Type">
    					</div>
    			 </div>
    			</td>
    			 <td style="width: 25%">
    				 			<div class="form-group row">
    					<label for="inputEmail3" class="col-sm-4 col-form-label">Machine</label>
    					<div class="col-sm-6">
    					  <input type="text" class="form-control" id="Machine" name="Machine" placeholder="Machine">
    					</div>
    			 </div>
    			</td>
    			 <td style="width: 25%">
    				 			<div class="form-group row">
    					<label for="inputEmail3" class="col-sm-4 col-form-label">Batch No</label>
    					<div class="col-sm-6">
    					  <input type="text" class="form-control" id="BatchNo" name="BatchNo" placeholder="BatchNo">
    					</div>
    			 </div>
    			</td>
    		</tr>
    		 <tr>
    			<td style="width: 25%">
    				 			<div class="form-group row">
    					<label for="inputEmail3" class="col-sm-4 col-form-label">Tax</label>
    					<div class="col-sm-6">
    					  <input type="text" class="form-control" id="BankingTax" name="BankingTax" placeholder="Tax">
    					</div>
    			 </div>
    			</td>
    				<td style="width: 25%">
    				 			<div class="form-group row">
    					<label for="inputEmail3" class="col-sm-4 col-form-label">Deduction Amount</label>
    					<div class="col-sm-6">
    					  <input type="text" class="form-control" id="DeductionAmount" name="DeductionAmount" placeholder="Deduction Amount">
    					</div>
    			 </div>
    			</td>
    				<td style="width: 25%">
    				 			<div class="form-group row">
    					<label for="inputEmail3" class="col-sm-4 col-form-label">Acc Holder Mobile No</label>
    					<div class="col-sm-6">
    					  <input type="text" class="form-control" id="AccHolderMobileNo" name="AccHolderMobileNo" placeholder="Acc Holder Mobile No">
    					</div>
    			 </div>
    			</td>
    		 </tr>
    	</tbody>
    </table>
     </div>
    			  <!-- /.card-body -->
    			</div>
    			<!-- /.card -->
    		  </div>
    		  <!-- /.col -->
    		</div>
    <script>
    	document.getElementById("BankDetailsShowHide").style.display = "none";
    	document.getElementById("SaveBill").innerHTML = 'Create Final Bill' ;
    	jQuery("#tpd_patient_serviceslist th.ew-list-option-header").each(function() {this.rowSpan = 1});
    jQuery("#tpd_patient_serviceslist td.ew-list-option-body").each(function() {this.rowSpan = 1});
});
</script>
<?php if (!$Grid->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function () {
    ew.fixedHeaderTable({
        delay: 0,
        container: "gmp_patient_services",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>
