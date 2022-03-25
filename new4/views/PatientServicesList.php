<?php

namespace PHPMaker2021\HIMS;

// Page object
$PatientServicesList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpatient_serviceslist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fpatient_serviceslist = currentForm = new ew.Form("fpatient_serviceslist", "list");
    fpatient_serviceslist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "patient_services")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.patient_services)
        ew.vars.tables.patient_services = currentTable;
    fpatient_serviceslist.addFields([
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
        var f = fpatient_serviceslist,
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
    fpatient_serviceslist.validate = function () {
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
        return true;
    }

    // Form_CustomValidate
    fpatient_serviceslist.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpatient_serviceslist.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpatient_serviceslist.lists.Services = <?= $Page->Services->toClientList($Page) ?>;
    fpatient_serviceslist.lists.status = <?= $Page->status->toClientList($Page) ?>;
    fpatient_serviceslist.lists.ServiceSelect = <?= $Page->ServiceSelect->toClientList($Page) ?>;
    loadjs.done("fpatient_serviceslist");
});
var fpatient_serviceslistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fpatient_serviceslistsrch = currentSearchForm = new ew.Form("fpatient_serviceslistsrch");

    // Dynamic selection lists

    // Filters
    fpatient_serviceslistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fpatient_serviceslistsrch");
});
</script>
<style type="text/css">
.ew-table-preview-row { /* main table preview row color */
    background-color: #FFFFFF; /* preview row color */
}
.ew-table-preview-row .ew-grid {
    display: table;
}
</style>
<div id="ew-preview" class="d-none"><!-- preview -->
    <div class="ew-nav-tabs"><!-- .ew-nav-tabs -->
        <ul class="nav nav-tabs"></ul>
        <div class="tab-content"><!-- .tab-content -->
            <div class="tab-pane fade active show"></div>
        </div><!-- /.tab-content -->
    </div><!-- /.ew-nav-tabs -->
</div><!-- /preview -->
<script>
loadjs.ready("head", function() {
    ew.PREVIEW_PLACEMENT = ew.CSS_FLIP ? "left" : "right";
    ew.PREVIEW_SINGLE_ROW = false;
    ew.PREVIEW_OVERLAY = false;
    loadjs(ew.PATH_BASE + "js/ewpreview.js", "preview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<?php if (!$Page->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($Page->TotalRecords > 0 && $Page->ExportOptions->visible()) { ?>
<?php $Page->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($Page->ImportOptions->visible()) { ?>
<?php $Page->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($Page->SearchOptions->visible()) { ?>
<?php $Page->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($Page->FilterOptions->visible()) { ?>
<?php $Page->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$Page->isExport() || Config("EXPORT_MASTER_RECORD") && $Page->isExport("print")) { ?>
<?php
if ($Page->DbMasterFilter != "" && $Page->getCurrentMasterTable() == "billing_voucher") {
    if ($Page->MasterRecordExists) {
        include_once "views/BillingVoucherMaster.php";
    }
}
?>
<?php
if ($Page->DbMasterFilter != "" && $Page->getCurrentMasterTable() == "ip_admission") {
    if ($Page->MasterRecordExists) {
        include_once "views/IpAdmissionMaster.php";
    }
}
?>
<?php } ?>
<?php
$Page->renderOtherOptions();
?>
<?php if ($Security->canSearch()) { ?>
<?php if (!$Page->isExport() && !$Page->CurrentAction) { ?>
<form name="fpatient_serviceslistsrch" id="fpatient_serviceslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fpatient_serviceslistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="patient_services">
    <div class="ew-extended-search">
<div id="xsr_<?= $Page->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
    <div class="ew-quick-search input-group">
        <input type="text" name="<?= Config("TABLE_BASIC_SEARCH") ?>" id="<?= Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?= HtmlEncode($Page->BasicSearch->getKeyword()) ?>" placeholder="<?= HtmlEncode($Language->phrase("Search")) ?>">
        <input type="hidden" name="<?= Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?= Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?= HtmlEncode($Page->BasicSearch->getType()) ?>">
        <div class="input-group-append">
            <button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?= $Language->phrase("SearchBtn") ?></button>
            <button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?= $Page->BasicSearch->getTypeNameShort() ?></span></button>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item<?php if ($Page->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?= $Language->phrase("QuickSearchAuto") ?></a>
                <a class="dropdown-item<?php if ($Page->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?= $Language->phrase("QuickSearchExact") ?></a>
                <a class="dropdown-item<?php if ($Page->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?= $Language->phrase("QuickSearchAll") ?></a>
                <a class="dropdown-item<?php if ($Page->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?= $Language->phrase("QuickSearchAny") ?></a>
            </div>
        </div>
    </div>
</div>
    </div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<?php if ($Page->TotalRecords > 0 || $Page->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_services">
<?php if (!$Page->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$Page->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?= CurrentPageUrl(false) ?>">
<?= $Page->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $Page->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpatient_serviceslist" id="fpatient_serviceslist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_services">
<?php if ($Page->getCurrentMasterTable() == "billing_voucher" && $Page->CurrentAction) { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="billing_voucher">
<input type="hidden" name="fk_id" value="<?= HtmlEncode($Page->Vid->getSessionValue()) ?>">
<?php } ?>
<?php if ($Page->getCurrentMasterTable() == "ip_admission" && $Page->CurrentAction) { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="ip_admission">
<input type="hidden" name="fk_id" value="<?= HtmlEncode($Page->Reception->getSessionValue()) ?>">
<input type="hidden" name="fk_mrnNo" value="<?= HtmlEncode($Page->mrnno->getSessionValue()) ?>">
<input type="hidden" name="fk_patient_id" value="<?= HtmlEncode($Page->PatID->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_patient_services" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_patient_serviceslist" class="table ew-table d-none"><!-- .ew-table -->
<thead>
    <tr class="ew-table-header">
<?php
// Header row
$Page->RowType = ROWTYPE_HEADER;

// Render list options
$Page->renderListOptions();

// Render list options (header, left)
$Page->ListOptions->render("header", "left", "", "block", $Page->TableVar, "patient_serviceslist");
?>
<?php if ($Page->id->Visible) { // id ?>
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_patient_services_id" class="patient_services_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
        <th data-name="Reception" class="<?= $Page->Reception->headerCellClass() ?>"><div id="elh_patient_services_Reception" class="patient_services_Reception"><?= $Page->renderSort($Page->Reception) ?></div></th>
<?php } ?>
<?php if ($Page->Services->Visible) { // Services ?>
        <th data-name="Services" class="<?= $Page->Services->headerCellClass() ?>"><div id="elh_patient_services_Services" class="patient_services_Services"><?= $Page->renderSort($Page->Services) ?></div></th>
<?php } ?>
<?php if ($Page->amount->Visible) { // amount ?>
        <th data-name="amount" class="<?= $Page->amount->headerCellClass() ?>"><div id="elh_patient_services_amount" class="patient_services_amount"><?= $Page->renderSort($Page->amount) ?></div></th>
<?php } ?>
<?php if ($Page->description->Visible) { // description ?>
        <th data-name="description" class="<?= $Page->description->headerCellClass() ?>"><div id="elh_patient_services_description" class="patient_services_description"><?= $Page->renderSort($Page->description) ?></div></th>
<?php } ?>
<?php if ($Page->patient_type->Visible) { // patient_type ?>
        <th data-name="patient_type" class="<?= $Page->patient_type->headerCellClass() ?>"><div id="elh_patient_services_patient_type" class="patient_services_patient_type"><?= $Page->renderSort($Page->patient_type) ?></div></th>
<?php } ?>
<?php if ($Page->charged_date->Visible) { // charged_date ?>
        <th data-name="charged_date" class="<?= $Page->charged_date->headerCellClass() ?>"><div id="elh_patient_services_charged_date" class="patient_services_charged_date"><?= $Page->renderSort($Page->charged_date) ?></div></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th data-name="status" class="<?= $Page->status->headerCellClass() ?>"><div id="elh_patient_services_status" class="patient_services_status"><?= $Page->renderSort($Page->status) ?></div></th>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
        <th data-name="mrnno" class="<?= $Page->mrnno->headerCellClass() ?>"><div id="elh_patient_services_mrnno" class="patient_services_mrnno"><?= $Page->renderSort($Page->mrnno) ?></div></th>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <th data-name="PatientName" class="<?= $Page->PatientName->headerCellClass() ?>"><div id="elh_patient_services_PatientName" class="patient_services_PatientName"><?= $Page->renderSort($Page->PatientName) ?></div></th>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
        <th data-name="Age" class="<?= $Page->Age->headerCellClass() ?>"><div id="elh_patient_services_Age" class="patient_services_Age"><?= $Page->renderSort($Page->Age) ?></div></th>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
        <th data-name="Gender" class="<?= $Page->Gender->headerCellClass() ?>"><div id="elh_patient_services_Gender" class="patient_services_Gender"><?= $Page->renderSort($Page->Gender) ?></div></th>
<?php } ?>
<?php if ($Page->Unit->Visible) { // Unit ?>
        <th data-name="Unit" class="<?= $Page->Unit->headerCellClass() ?>"><div id="elh_patient_services_Unit" class="patient_services_Unit"><?= $Page->renderSort($Page->Unit) ?></div></th>
<?php } ?>
<?php if ($Page->Quantity->Visible) { // Quantity ?>
        <th data-name="Quantity" class="<?= $Page->Quantity->headerCellClass() ?>"><div id="elh_patient_services_Quantity" class="patient_services_Quantity"><?= $Page->renderSort($Page->Quantity) ?></div></th>
<?php } ?>
<?php if ($Page->Discount->Visible) { // Discount ?>
        <th data-name="Discount" class="<?= $Page->Discount->headerCellClass() ?>"><div id="elh_patient_services_Discount" class="patient_services_Discount"><?= $Page->renderSort($Page->Discount) ?></div></th>
<?php } ?>
<?php if ($Page->SubTotal->Visible) { // SubTotal ?>
        <th data-name="SubTotal" class="<?= $Page->SubTotal->headerCellClass() ?>"><div id="elh_patient_services_SubTotal" class="patient_services_SubTotal"><?= $Page->renderSort($Page->SubTotal) ?></div></th>
<?php } ?>
<?php if ($Page->ServiceSelect->Visible) { // ServiceSelect ?>
        <th data-name="ServiceSelect" class="<?= $Page->ServiceSelect->headerCellClass() ?>"><div id="elh_patient_services_ServiceSelect" class="patient_services_ServiceSelect"><?= $Page->renderSort($Page->ServiceSelect) ?></div></th>
<?php } ?>
<?php if ($Page->Aid->Visible) { // Aid ?>
        <th data-name="Aid" class="<?= $Page->Aid->headerCellClass() ?>"><div id="elh_patient_services_Aid" class="patient_services_Aid"><?= $Page->renderSort($Page->Aid) ?></div></th>
<?php } ?>
<?php if ($Page->Vid->Visible) { // Vid ?>
        <th data-name="Vid" class="<?= $Page->Vid->headerCellClass() ?>"><div id="elh_patient_services_Vid" class="patient_services_Vid"><?= $Page->renderSort($Page->Vid) ?></div></th>
<?php } ?>
<?php if ($Page->DrID->Visible) { // DrID ?>
        <th data-name="DrID" class="<?= $Page->DrID->headerCellClass() ?>"><div id="elh_patient_services_DrID" class="patient_services_DrID"><?= $Page->renderSort($Page->DrID) ?></div></th>
<?php } ?>
<?php if ($Page->DrCODE->Visible) { // DrCODE ?>
        <th data-name="DrCODE" class="<?= $Page->DrCODE->headerCellClass() ?>"><div id="elh_patient_services_DrCODE" class="patient_services_DrCODE"><?= $Page->renderSort($Page->DrCODE) ?></div></th>
<?php } ?>
<?php if ($Page->DrName->Visible) { // DrName ?>
        <th data-name="DrName" class="<?= $Page->DrName->headerCellClass() ?>"><div id="elh_patient_services_DrName" class="patient_services_DrName"><?= $Page->renderSort($Page->DrName) ?></div></th>
<?php } ?>
<?php if ($Page->Department->Visible) { // Department ?>
        <th data-name="Department" class="<?= $Page->Department->headerCellClass() ?>"><div id="elh_patient_services_Department" class="patient_services_Department"><?= $Page->renderSort($Page->Department) ?></div></th>
<?php } ?>
<?php if ($Page->DrSharePres->Visible) { // DrSharePres ?>
        <th data-name="DrSharePres" class="<?= $Page->DrSharePres->headerCellClass() ?>"><div id="elh_patient_services_DrSharePres" class="patient_services_DrSharePres"><?= $Page->renderSort($Page->DrSharePres) ?></div></th>
<?php } ?>
<?php if ($Page->HospSharePres->Visible) { // HospSharePres ?>
        <th data-name="HospSharePres" class="<?= $Page->HospSharePres->headerCellClass() ?>"><div id="elh_patient_services_HospSharePres" class="patient_services_HospSharePres"><?= $Page->renderSort($Page->HospSharePres) ?></div></th>
<?php } ?>
<?php if ($Page->DrShareAmount->Visible) { // DrShareAmount ?>
        <th data-name="DrShareAmount" class="<?= $Page->DrShareAmount->headerCellClass() ?>"><div id="elh_patient_services_DrShareAmount" class="patient_services_DrShareAmount"><?= $Page->renderSort($Page->DrShareAmount) ?></div></th>
<?php } ?>
<?php if ($Page->HospShareAmount->Visible) { // HospShareAmount ?>
        <th data-name="HospShareAmount" class="<?= $Page->HospShareAmount->headerCellClass() ?>"><div id="elh_patient_services_HospShareAmount" class="patient_services_HospShareAmount"><?= $Page->renderSort($Page->HospShareAmount) ?></div></th>
<?php } ?>
<?php if ($Page->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
        <th data-name="DrShareSettiledAmount" class="<?= $Page->DrShareSettiledAmount->headerCellClass() ?>"><div id="elh_patient_services_DrShareSettiledAmount" class="patient_services_DrShareSettiledAmount"><?= $Page->renderSort($Page->DrShareSettiledAmount) ?></div></th>
<?php } ?>
<?php if ($Page->DrShareSettledId->Visible) { // DrShareSettledId ?>
        <th data-name="DrShareSettledId" class="<?= $Page->DrShareSettledId->headerCellClass() ?>"><div id="elh_patient_services_DrShareSettledId" class="patient_services_DrShareSettledId"><?= $Page->renderSort($Page->DrShareSettledId) ?></div></th>
<?php } ?>
<?php if ($Page->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
        <th data-name="DrShareSettiledStatus" class="<?= $Page->DrShareSettiledStatus->headerCellClass() ?>"><div id="elh_patient_services_DrShareSettiledStatus" class="patient_services_DrShareSettiledStatus"><?= $Page->renderSort($Page->DrShareSettiledStatus) ?></div></th>
<?php } ?>
<?php if ($Page->invoiceId->Visible) { // invoiceId ?>
        <th data-name="invoiceId" class="<?= $Page->invoiceId->headerCellClass() ?>"><div id="elh_patient_services_invoiceId" class="patient_services_invoiceId"><?= $Page->renderSort($Page->invoiceId) ?></div></th>
<?php } ?>
<?php if ($Page->invoiceAmount->Visible) { // invoiceAmount ?>
        <th data-name="invoiceAmount" class="<?= $Page->invoiceAmount->headerCellClass() ?>"><div id="elh_patient_services_invoiceAmount" class="patient_services_invoiceAmount"><?= $Page->renderSort($Page->invoiceAmount) ?></div></th>
<?php } ?>
<?php if ($Page->invoiceStatus->Visible) { // invoiceStatus ?>
        <th data-name="invoiceStatus" class="<?= $Page->invoiceStatus->headerCellClass() ?>"><div id="elh_patient_services_invoiceStatus" class="patient_services_invoiceStatus"><?= $Page->renderSort($Page->invoiceStatus) ?></div></th>
<?php } ?>
<?php if ($Page->modeOfPayment->Visible) { // modeOfPayment ?>
        <th data-name="modeOfPayment" class="<?= $Page->modeOfPayment->headerCellClass() ?>"><div id="elh_patient_services_modeOfPayment" class="patient_services_modeOfPayment"><?= $Page->renderSort($Page->modeOfPayment) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_patient_services_HospID" class="patient_services_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
        <th data-name="RIDNO" class="<?= $Page->RIDNO->headerCellClass() ?>"><div id="elh_patient_services_RIDNO" class="patient_services_RIDNO"><?= $Page->renderSort($Page->RIDNO) ?></div></th>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <th data-name="TidNo" class="<?= $Page->TidNo->headerCellClass() ?>"><div id="elh_patient_services_TidNo" class="patient_services_TidNo"><?= $Page->renderSort($Page->TidNo) ?></div></th>
<?php } ?>
<?php if ($Page->DiscountCategory->Visible) { // DiscountCategory ?>
        <th data-name="DiscountCategory" class="<?= $Page->DiscountCategory->headerCellClass() ?>"><div id="elh_patient_services_DiscountCategory" class="patient_services_DiscountCategory"><?= $Page->renderSort($Page->DiscountCategory) ?></div></th>
<?php } ?>
<?php if ($Page->sid->Visible) { // sid ?>
        <th data-name="sid" class="<?= $Page->sid->headerCellClass() ?>"><div id="elh_patient_services_sid" class="patient_services_sid"><?= $Page->renderSort($Page->sid) ?></div></th>
<?php } ?>
<?php if ($Page->ItemCode->Visible) { // ItemCode ?>
        <th data-name="ItemCode" class="<?= $Page->ItemCode->headerCellClass() ?>"><div id="elh_patient_services_ItemCode" class="patient_services_ItemCode"><?= $Page->renderSort($Page->ItemCode) ?></div></th>
<?php } ?>
<?php if ($Page->TestSubCd->Visible) { // TestSubCd ?>
        <th data-name="TestSubCd" class="<?= $Page->TestSubCd->headerCellClass() ?>"><div id="elh_patient_services_TestSubCd" class="patient_services_TestSubCd"><?= $Page->renderSort($Page->TestSubCd) ?></div></th>
<?php } ?>
<?php if ($Page->DEptCd->Visible) { // DEptCd ?>
        <th data-name="DEptCd" class="<?= $Page->DEptCd->headerCellClass() ?>"><div id="elh_patient_services_DEptCd" class="patient_services_DEptCd"><?= $Page->renderSort($Page->DEptCd) ?></div></th>
<?php } ?>
<?php if ($Page->ProfCd->Visible) { // ProfCd ?>
        <th data-name="ProfCd" class="<?= $Page->ProfCd->headerCellClass() ?>"><div id="elh_patient_services_ProfCd" class="patient_services_ProfCd"><?= $Page->renderSort($Page->ProfCd) ?></div></th>
<?php } ?>
<?php if ($Page->Comments->Visible) { // Comments ?>
        <th data-name="Comments" class="<?= $Page->Comments->headerCellClass() ?>"><div id="elh_patient_services_Comments" class="patient_services_Comments"><?= $Page->renderSort($Page->Comments) ?></div></th>
<?php } ?>
<?php if ($Page->Method->Visible) { // Method ?>
        <th data-name="Method" class="<?= $Page->Method->headerCellClass() ?>"><div id="elh_patient_services_Method" class="patient_services_Method"><?= $Page->renderSort($Page->Method) ?></div></th>
<?php } ?>
<?php if ($Page->Specimen->Visible) { // Specimen ?>
        <th data-name="Specimen" class="<?= $Page->Specimen->headerCellClass() ?>"><div id="elh_patient_services_Specimen" class="patient_services_Specimen"><?= $Page->renderSort($Page->Specimen) ?></div></th>
<?php } ?>
<?php if ($Page->Abnormal->Visible) { // Abnormal ?>
        <th data-name="Abnormal" class="<?= $Page->Abnormal->headerCellClass() ?>"><div id="elh_patient_services_Abnormal" class="patient_services_Abnormal"><?= $Page->renderSort($Page->Abnormal) ?></div></th>
<?php } ?>
<?php if ($Page->TestUnit->Visible) { // TestUnit ?>
        <th data-name="TestUnit" class="<?= $Page->TestUnit->headerCellClass() ?>"><div id="elh_patient_services_TestUnit" class="patient_services_TestUnit"><?= $Page->renderSort($Page->TestUnit) ?></div></th>
<?php } ?>
<?php if ($Page->LOWHIGH->Visible) { // LOWHIGH ?>
        <th data-name="LOWHIGH" class="<?= $Page->LOWHIGH->headerCellClass() ?>"><div id="elh_patient_services_LOWHIGH" class="patient_services_LOWHIGH"><?= $Page->renderSort($Page->LOWHIGH) ?></div></th>
<?php } ?>
<?php if ($Page->Branch->Visible) { // Branch ?>
        <th data-name="Branch" class="<?= $Page->Branch->headerCellClass() ?>"><div id="elh_patient_services_Branch" class="patient_services_Branch"><?= $Page->renderSort($Page->Branch) ?></div></th>
<?php } ?>
<?php if ($Page->Dispatch->Visible) { // Dispatch ?>
        <th data-name="Dispatch" class="<?= $Page->Dispatch->headerCellClass() ?>"><div id="elh_patient_services_Dispatch" class="patient_services_Dispatch"><?= $Page->renderSort($Page->Dispatch) ?></div></th>
<?php } ?>
<?php if ($Page->Pic1->Visible) { // Pic1 ?>
        <th data-name="Pic1" class="<?= $Page->Pic1->headerCellClass() ?>"><div id="elh_patient_services_Pic1" class="patient_services_Pic1"><?= $Page->renderSort($Page->Pic1) ?></div></th>
<?php } ?>
<?php if ($Page->Pic2->Visible) { // Pic2 ?>
        <th data-name="Pic2" class="<?= $Page->Pic2->headerCellClass() ?>"><div id="elh_patient_services_Pic2" class="patient_services_Pic2"><?= $Page->renderSort($Page->Pic2) ?></div></th>
<?php } ?>
<?php if ($Page->GraphPath->Visible) { // GraphPath ?>
        <th data-name="GraphPath" class="<?= $Page->GraphPath->headerCellClass() ?>"><div id="elh_patient_services_GraphPath" class="patient_services_GraphPath"><?= $Page->renderSort($Page->GraphPath) ?></div></th>
<?php } ?>
<?php if ($Page->MachineCD->Visible) { // MachineCD ?>
        <th data-name="MachineCD" class="<?= $Page->MachineCD->headerCellClass() ?>"><div id="elh_patient_services_MachineCD" class="patient_services_MachineCD"><?= $Page->renderSort($Page->MachineCD) ?></div></th>
<?php } ?>
<?php if ($Page->TestCancel->Visible) { // TestCancel ?>
        <th data-name="TestCancel" class="<?= $Page->TestCancel->headerCellClass() ?>"><div id="elh_patient_services_TestCancel" class="patient_services_TestCancel"><?= $Page->renderSort($Page->TestCancel) ?></div></th>
<?php } ?>
<?php if ($Page->OutSource->Visible) { // OutSource ?>
        <th data-name="OutSource" class="<?= $Page->OutSource->headerCellClass() ?>"><div id="elh_patient_services_OutSource" class="patient_services_OutSource"><?= $Page->renderSort($Page->OutSource) ?></div></th>
<?php } ?>
<?php if ($Page->Printed->Visible) { // Printed ?>
        <th data-name="Printed" class="<?= $Page->Printed->headerCellClass() ?>"><div id="elh_patient_services_Printed" class="patient_services_Printed"><?= $Page->renderSort($Page->Printed) ?></div></th>
<?php } ?>
<?php if ($Page->PrintBy->Visible) { // PrintBy ?>
        <th data-name="PrintBy" class="<?= $Page->PrintBy->headerCellClass() ?>"><div id="elh_patient_services_PrintBy" class="patient_services_PrintBy"><?= $Page->renderSort($Page->PrintBy) ?></div></th>
<?php } ?>
<?php if ($Page->PrintDate->Visible) { // PrintDate ?>
        <th data-name="PrintDate" class="<?= $Page->PrintDate->headerCellClass() ?>"><div id="elh_patient_services_PrintDate" class="patient_services_PrintDate"><?= $Page->renderSort($Page->PrintDate) ?></div></th>
<?php } ?>
<?php if ($Page->BillingDate->Visible) { // BillingDate ?>
        <th data-name="BillingDate" class="<?= $Page->BillingDate->headerCellClass() ?>"><div id="elh_patient_services_BillingDate" class="patient_services_BillingDate"><?= $Page->renderSort($Page->BillingDate) ?></div></th>
<?php } ?>
<?php if ($Page->BilledBy->Visible) { // BilledBy ?>
        <th data-name="BilledBy" class="<?= $Page->BilledBy->headerCellClass() ?>"><div id="elh_patient_services_BilledBy" class="patient_services_BilledBy"><?= $Page->renderSort($Page->BilledBy) ?></div></th>
<?php } ?>
<?php if ($Page->Resulted->Visible) { // Resulted ?>
        <th data-name="Resulted" class="<?= $Page->Resulted->headerCellClass() ?>"><div id="elh_patient_services_Resulted" class="patient_services_Resulted"><?= $Page->renderSort($Page->Resulted) ?></div></th>
<?php } ?>
<?php if ($Page->ResultDate->Visible) { // ResultDate ?>
        <th data-name="ResultDate" class="<?= $Page->ResultDate->headerCellClass() ?>"><div id="elh_patient_services_ResultDate" class="patient_services_ResultDate"><?= $Page->renderSort($Page->ResultDate) ?></div></th>
<?php } ?>
<?php if ($Page->ResultedBy->Visible) { // ResultedBy ?>
        <th data-name="ResultedBy" class="<?= $Page->ResultedBy->headerCellClass() ?>"><div id="elh_patient_services_ResultedBy" class="patient_services_ResultedBy"><?= $Page->renderSort($Page->ResultedBy) ?></div></th>
<?php } ?>
<?php if ($Page->SampleDate->Visible) { // SampleDate ?>
        <th data-name="SampleDate" class="<?= $Page->SampleDate->headerCellClass() ?>"><div id="elh_patient_services_SampleDate" class="patient_services_SampleDate"><?= $Page->renderSort($Page->SampleDate) ?></div></th>
<?php } ?>
<?php if ($Page->SampleUser->Visible) { // SampleUser ?>
        <th data-name="SampleUser" class="<?= $Page->SampleUser->headerCellClass() ?>"><div id="elh_patient_services_SampleUser" class="patient_services_SampleUser"><?= $Page->renderSort($Page->SampleUser) ?></div></th>
<?php } ?>
<?php if ($Page->Sampled->Visible) { // Sampled ?>
        <th data-name="Sampled" class="<?= $Page->Sampled->headerCellClass() ?>"><div id="elh_patient_services_Sampled" class="patient_services_Sampled"><?= $Page->renderSort($Page->Sampled) ?></div></th>
<?php } ?>
<?php if ($Page->ReceivedDate->Visible) { // ReceivedDate ?>
        <th data-name="ReceivedDate" class="<?= $Page->ReceivedDate->headerCellClass() ?>"><div id="elh_patient_services_ReceivedDate" class="patient_services_ReceivedDate"><?= $Page->renderSort($Page->ReceivedDate) ?></div></th>
<?php } ?>
<?php if ($Page->ReceivedUser->Visible) { // ReceivedUser ?>
        <th data-name="ReceivedUser" class="<?= $Page->ReceivedUser->headerCellClass() ?>"><div id="elh_patient_services_ReceivedUser" class="patient_services_ReceivedUser"><?= $Page->renderSort($Page->ReceivedUser) ?></div></th>
<?php } ?>
<?php if ($Page->Recevied->Visible) { // Recevied ?>
        <th data-name="Recevied" class="<?= $Page->Recevied->headerCellClass() ?>"><div id="elh_patient_services_Recevied" class="patient_services_Recevied"><?= $Page->renderSort($Page->Recevied) ?></div></th>
<?php } ?>
<?php if ($Page->DeptRecvDate->Visible) { // DeptRecvDate ?>
        <th data-name="DeptRecvDate" class="<?= $Page->DeptRecvDate->headerCellClass() ?>"><div id="elh_patient_services_DeptRecvDate" class="patient_services_DeptRecvDate"><?= $Page->renderSort($Page->DeptRecvDate) ?></div></th>
<?php } ?>
<?php if ($Page->DeptRecvUser->Visible) { // DeptRecvUser ?>
        <th data-name="DeptRecvUser" class="<?= $Page->DeptRecvUser->headerCellClass() ?>"><div id="elh_patient_services_DeptRecvUser" class="patient_services_DeptRecvUser"><?= $Page->renderSort($Page->DeptRecvUser) ?></div></th>
<?php } ?>
<?php if ($Page->DeptRecived->Visible) { // DeptRecived ?>
        <th data-name="DeptRecived" class="<?= $Page->DeptRecived->headerCellClass() ?>"><div id="elh_patient_services_DeptRecived" class="patient_services_DeptRecived"><?= $Page->renderSort($Page->DeptRecived) ?></div></th>
<?php } ?>
<?php if ($Page->SAuthDate->Visible) { // SAuthDate ?>
        <th data-name="SAuthDate" class="<?= $Page->SAuthDate->headerCellClass() ?>"><div id="elh_patient_services_SAuthDate" class="patient_services_SAuthDate"><?= $Page->renderSort($Page->SAuthDate) ?></div></th>
<?php } ?>
<?php if ($Page->SAuthBy->Visible) { // SAuthBy ?>
        <th data-name="SAuthBy" class="<?= $Page->SAuthBy->headerCellClass() ?>"><div id="elh_patient_services_SAuthBy" class="patient_services_SAuthBy"><?= $Page->renderSort($Page->SAuthBy) ?></div></th>
<?php } ?>
<?php if ($Page->SAuthendicate->Visible) { // SAuthendicate ?>
        <th data-name="SAuthendicate" class="<?= $Page->SAuthendicate->headerCellClass() ?>"><div id="elh_patient_services_SAuthendicate" class="patient_services_SAuthendicate"><?= $Page->renderSort($Page->SAuthendicate) ?></div></th>
<?php } ?>
<?php if ($Page->AuthDate->Visible) { // AuthDate ?>
        <th data-name="AuthDate" class="<?= $Page->AuthDate->headerCellClass() ?>"><div id="elh_patient_services_AuthDate" class="patient_services_AuthDate"><?= $Page->renderSort($Page->AuthDate) ?></div></th>
<?php } ?>
<?php if ($Page->AuthBy->Visible) { // AuthBy ?>
        <th data-name="AuthBy" class="<?= $Page->AuthBy->headerCellClass() ?>"><div id="elh_patient_services_AuthBy" class="patient_services_AuthBy"><?= $Page->renderSort($Page->AuthBy) ?></div></th>
<?php } ?>
<?php if ($Page->Authencate->Visible) { // Authencate ?>
        <th data-name="Authencate" class="<?= $Page->Authencate->headerCellClass() ?>"><div id="elh_patient_services_Authencate" class="patient_services_Authencate"><?= $Page->renderSort($Page->Authencate) ?></div></th>
<?php } ?>
<?php if ($Page->EditDate->Visible) { // EditDate ?>
        <th data-name="EditDate" class="<?= $Page->EditDate->headerCellClass() ?>"><div id="elh_patient_services_EditDate" class="patient_services_EditDate"><?= $Page->renderSort($Page->EditDate) ?></div></th>
<?php } ?>
<?php if ($Page->EditBy->Visible) { // EditBy ?>
        <th data-name="EditBy" class="<?= $Page->EditBy->headerCellClass() ?>"><div id="elh_patient_services_EditBy" class="patient_services_EditBy"><?= $Page->renderSort($Page->EditBy) ?></div></th>
<?php } ?>
<?php if ($Page->Editted->Visible) { // Editted ?>
        <th data-name="Editted" class="<?= $Page->Editted->headerCellClass() ?>"><div id="elh_patient_services_Editted" class="patient_services_Editted"><?= $Page->renderSort($Page->Editted) ?></div></th>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
        <th data-name="PatID" class="<?= $Page->PatID->headerCellClass() ?>"><div id="elh_patient_services_PatID" class="patient_services_PatID"><?= $Page->renderSort($Page->PatID) ?></div></th>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
        <th data-name="PatientId" class="<?= $Page->PatientId->headerCellClass() ?>"><div id="elh_patient_services_PatientId" class="patient_services_PatientId"><?= $Page->renderSort($Page->PatientId) ?></div></th>
<?php } ?>
<?php if ($Page->Mobile->Visible) { // Mobile ?>
        <th data-name="Mobile" class="<?= $Page->Mobile->headerCellClass() ?>"><div id="elh_patient_services_Mobile" class="patient_services_Mobile"><?= $Page->renderSort($Page->Mobile) ?></div></th>
<?php } ?>
<?php if ($Page->CId->Visible) { // CId ?>
        <th data-name="CId" class="<?= $Page->CId->headerCellClass() ?>"><div id="elh_patient_services_CId" class="patient_services_CId"><?= $Page->renderSort($Page->CId) ?></div></th>
<?php } ?>
<?php if ($Page->Order->Visible) { // Order ?>
        <th data-name="Order" class="<?= $Page->Order->headerCellClass() ?>"><div id="elh_patient_services_Order" class="patient_services_Order"><?= $Page->renderSort($Page->Order) ?></div></th>
<?php } ?>
<?php if ($Page->ResType->Visible) { // ResType ?>
        <th data-name="ResType" class="<?= $Page->ResType->headerCellClass() ?>"><div id="elh_patient_services_ResType" class="patient_services_ResType"><?= $Page->renderSort($Page->ResType) ?></div></th>
<?php } ?>
<?php if ($Page->Sample->Visible) { // Sample ?>
        <th data-name="Sample" class="<?= $Page->Sample->headerCellClass() ?>"><div id="elh_patient_services_Sample" class="patient_services_Sample"><?= $Page->renderSort($Page->Sample) ?></div></th>
<?php } ?>
<?php if ($Page->NoD->Visible) { // NoD ?>
        <th data-name="NoD" class="<?= $Page->NoD->headerCellClass() ?>"><div id="elh_patient_services_NoD" class="patient_services_NoD"><?= $Page->renderSort($Page->NoD) ?></div></th>
<?php } ?>
<?php if ($Page->BillOrder->Visible) { // BillOrder ?>
        <th data-name="BillOrder" class="<?= $Page->BillOrder->headerCellClass() ?>"><div id="elh_patient_services_BillOrder" class="patient_services_BillOrder"><?= $Page->renderSort($Page->BillOrder) ?></div></th>
<?php } ?>
<?php if ($Page->Inactive->Visible) { // Inactive ?>
        <th data-name="Inactive" class="<?= $Page->Inactive->headerCellClass() ?>"><div id="elh_patient_services_Inactive" class="patient_services_Inactive"><?= $Page->renderSort($Page->Inactive) ?></div></th>
<?php } ?>
<?php if ($Page->CollSample->Visible) { // CollSample ?>
        <th data-name="CollSample" class="<?= $Page->CollSample->headerCellClass() ?>"><div id="elh_patient_services_CollSample" class="patient_services_CollSample"><?= $Page->renderSort($Page->CollSample) ?></div></th>
<?php } ?>
<?php if ($Page->TestType->Visible) { // TestType ?>
        <th data-name="TestType" class="<?= $Page->TestType->headerCellClass() ?>"><div id="elh_patient_services_TestType" class="patient_services_TestType"><?= $Page->renderSort($Page->TestType) ?></div></th>
<?php } ?>
<?php if ($Page->Repeated->Visible) { // Repeated ?>
        <th data-name="Repeated" class="<?= $Page->Repeated->headerCellClass() ?>"><div id="elh_patient_services_Repeated" class="patient_services_Repeated"><?= $Page->renderSort($Page->Repeated) ?></div></th>
<?php } ?>
<?php if ($Page->RepeatedBy->Visible) { // RepeatedBy ?>
        <th data-name="RepeatedBy" class="<?= $Page->RepeatedBy->headerCellClass() ?>"><div id="elh_patient_services_RepeatedBy" class="patient_services_RepeatedBy"><?= $Page->renderSort($Page->RepeatedBy) ?></div></th>
<?php } ?>
<?php if ($Page->RepeatedDate->Visible) { // RepeatedDate ?>
        <th data-name="RepeatedDate" class="<?= $Page->RepeatedDate->headerCellClass() ?>"><div id="elh_patient_services_RepeatedDate" class="patient_services_RepeatedDate"><?= $Page->renderSort($Page->RepeatedDate) ?></div></th>
<?php } ?>
<?php if ($Page->serviceID->Visible) { // serviceID ?>
        <th data-name="serviceID" class="<?= $Page->serviceID->headerCellClass() ?>"><div id="elh_patient_services_serviceID" class="patient_services_serviceID"><?= $Page->renderSort($Page->serviceID) ?></div></th>
<?php } ?>
<?php if ($Page->Service_Type->Visible) { // Service_Type ?>
        <th data-name="Service_Type" class="<?= $Page->Service_Type->headerCellClass() ?>"><div id="elh_patient_services_Service_Type" class="patient_services_Service_Type"><?= $Page->renderSort($Page->Service_Type) ?></div></th>
<?php } ?>
<?php if ($Page->Service_Department->Visible) { // Service_Department ?>
        <th data-name="Service_Department" class="<?= $Page->Service_Department->headerCellClass() ?>"><div id="elh_patient_services_Service_Department" class="patient_services_Service_Department"><?= $Page->renderSort($Page->Service_Department) ?></div></th>
<?php } ?>
<?php if ($Page->RequestNo->Visible) { // RequestNo ?>
        <th data-name="RequestNo" class="<?= $Page->RequestNo->headerCellClass() ?>"><div id="elh_patient_services_RequestNo" class="patient_services_RequestNo"><?= $Page->renderSort($Page->RequestNo) ?></div></th>
<?php } ?>
<?php
// Render list options (header, right)
$Page->ListOptions->render("header", "right", "", "block", $Page->TableVar, "patient_serviceslist");
?>
    </tr>
</thead>
<tbody>
<?php
if ($Page->ExportAll && $Page->isExport()) {
    $Page->StopRecord = $Page->TotalRecords;
} else {
    // Set the last record to display
    if ($Page->TotalRecords > $Page->StartRecord + $Page->DisplayRecords - 1) {
        $Page->StopRecord = $Page->StartRecord + $Page->DisplayRecords - 1;
    } else {
        $Page->StopRecord = $Page->TotalRecords;
    }
}

// Restore number of post back records
if ($CurrentForm && ($Page->isConfirm() || $Page->EventCancelled)) {
    $CurrentForm->Index = -1;
    if ($CurrentForm->hasValue($Page->FormKeyCountName) && ($Page->isGridAdd() || $Page->isGridEdit() || $Page->isConfirm())) {
        $Page->KeyCount = $CurrentForm->getValue($Page->FormKeyCountName);
        $Page->StopRecord = $Page->StartRecord + $Page->KeyCount - 1;
    }
}
$Page->RecordCount = $Page->StartRecord - 1;
if ($Page->Recordset && !$Page->Recordset->EOF) {
    // Nothing to do
} elseif (!$Page->AllowAddDeleteRow && $Page->StopRecord == 0) {
    $Page->StopRecord = $Page->GridAddRowCount;
}

// Initialize aggregate
$Page->RowType = ROWTYPE_AGGREGATEINIT;
$Page->resetAttributes();
$Page->renderRow();
if ($Page->isGridEdit())
    $Page->RowIndex = 0;
while ($Page->RecordCount < $Page->StopRecord) {
    $Page->RecordCount++;
    if ($Page->RecordCount >= $Page->StartRecord) {
        $Page->RowCount++;
        if ($Page->isGridAdd() || $Page->isGridEdit() || $Page->isConfirm()) {
            $Page->RowIndex++;
            $CurrentForm->Index = $Page->RowIndex;
            if ($CurrentForm->hasValue($Page->FormActionName) && ($Page->isConfirm() || $Page->EventCancelled)) {
                $Page->RowAction = strval($CurrentForm->getValue($Page->FormActionName));
            } elseif ($Page->isGridAdd()) {
                $Page->RowAction = "insert";
            } else {
                $Page->RowAction = "";
            }
        }

        // Set up key count
        $Page->KeyCount = $Page->RowIndex;

        // Init row class and style
        $Page->resetAttributes();
        $Page->CssClass = "";
        if ($Page->isGridAdd()) {
            $Page->loadRowValues(); // Load default values
            $Page->OldKey = "";
            $Page->setKey($Page->OldKey);
        } else {
            $Page->loadRowValues($Page->Recordset); // Load row values
            if ($Page->isGridEdit()) {
                $Page->OldKey = $Page->getKey(true); // Get from CurrentValue
                $Page->setKey($Page->OldKey);
            }
        }
        $Page->RowType = ROWTYPE_VIEW; // Render view
        if ($Page->isGridEdit()) { // Grid edit
            if ($Page->EventCancelled) {
                $Page->restoreCurrentRowFormValues($Page->RowIndex); // Restore form values
            }
            if ($Page->RowAction == "insert") {
                $Page->RowType = ROWTYPE_ADD; // Render add
            } else {
                $Page->RowType = ROWTYPE_EDIT; // Render edit
            }
        }
        if ($Page->isGridEdit() && ($Page->RowType == ROWTYPE_EDIT || $Page->RowType == ROWTYPE_ADD) && $Page->EventCancelled) { // Update failed
            $Page->restoreCurrentRowFormValues($Page->RowIndex); // Restore form values
        }
        if ($Page->RowType == ROWTYPE_EDIT) { // Edit row
            $Page->EditRowCount++;
        }

        // Set up row id / data-rowindex
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_patient_services", "data-rowtype" => $Page->RowType]);

        // Render row
        $Page->renderRow();

        // Render list options
        $Page->renderListOptions();

        // Save row and cell attributes
        $Page->Attrs[$Page->RowCount] = ["row_attrs" => $Page->rowAttributes(), "cell_attrs" => []];
        $Page->Attrs[$Page->RowCount]["cell_attrs"] = $Page->fieldCellAttributes();

        // Skip delete row / empty row for confirm page
        if ($Page->RowAction != "delete" && $Page->RowAction != "insertdelete" && !($Page->RowAction == "insert" && $Page->isConfirm() && $Page->emptyRow())) {
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php
// Render list options (body, left)
$Page->ListOptions->render("body", "left", $Page->RowCount, "block", $Page->TableVar, "patient_serviceslist");
?>
    <?php if ($Page->id->Visible) { // id ?>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_id"><span id="el<?= $Page->RowCount ?>_patient_services_id" class="form-group"></span></template>
<input type="hidden" data-table="patient_services" data-field="x_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_id" id="o<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_id"><span id="el<?= $Page->RowCount ?>_patient_services_id" class="form-group">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_id" data-hidden="1" name="x<?= $Page->RowIndex ?>_id" id="x<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_id"><span id="el<?= $Page->RowCount ?>_patient_services_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="patient_services" data-field="x_id" data-hidden="1" name="x<?= $Page->RowIndex ?>_id" id="x<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Page->Reception->Visible) { // Reception ?>
        <td data-name="Reception" <?= $Page->Reception->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Page->Reception->getSessionValue() != "") { ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Reception"><span id="el<?= $Page->RowCount ?>_patient_services_Reception" class="form-group">
<span<?= $Page->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Reception->getDisplayValue($Page->Reception->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" id="x<?= $Page->RowIndex ?>_Reception" name="x<?= $Page->RowIndex ?>_Reception" value="<?= HtmlEncode($Page->Reception->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Reception"><span id="el<?= $Page->RowCount ?>_patient_services_Reception" class="form-group">
<input type="<?= $Page->Reception->getInputTextType() ?>" data-table="patient_services" data-field="x_Reception" name="x<?= $Page->RowIndex ?>_Reception" id="x<?= $Page->RowIndex ?>_Reception" size="30" placeholder="<?= HtmlEncode($Page->Reception->getPlaceHolder()) ?>" value="<?= $Page->Reception->EditValue ?>"<?= $Page->Reception->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Reception->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Reception" data-hidden="1" name="o<?= $Page->RowIndex ?>_Reception" id="o<?= $Page->RowIndex ?>_Reception" value="<?= HtmlEncode($Page->Reception->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Reception"><span id="el<?= $Page->RowCount ?>_patient_services_Reception" class="form-group">
<span<?= $Page->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Reception->getDisplayValue($Page->Reception->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_Reception" data-hidden="1" name="x<?= $Page->RowIndex ?>_Reception" id="x<?= $Page->RowIndex ?>_Reception" value="<?= HtmlEncode($Page->Reception->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Reception"><span id="el<?= $Page->RowCount ?>_patient_services_Reception">
<span<?= $Page->Reception->viewAttributes() ?>>
<?= $Page->Reception->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Services->Visible) { // Services ?>
        <td data-name="Services" <?= $Page->Services->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Services"><span id="el<?= $Page->RowCount ?>_patient_services_Services" class="form-group">
<?php
$onchange = $Page->Services->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->Services->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Page->RowIndex ?>_Services" class="ew-auto-suggest">
    <input type="<?= $Page->Services->getInputTextType() ?>" class="form-control" name="sv_x<?= $Page->RowIndex ?>_Services" id="sv_x<?= $Page->RowIndex ?>_Services" value="<?= RemoveHtml($Page->Services->EditValue) ?>" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Services->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->Services->getPlaceHolder()) ?>"<?= $Page->Services->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient_services" data-field="x_Services" data-input="sv_x<?= $Page->RowIndex ?>_Services" data-value-separator="<?= $Page->Services->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_Services" id="x<?= $Page->RowIndex ?>_Services" value="<?= HtmlEncode($Page->Services->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->Services->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_serviceslist"], function() {
    fpatient_serviceslist.createAutoSuggest(Object.assign({"id":"x<?= $Page->RowIndex ?>_Services","forceSelect":true}, ew.vars.tables.patient_services.fields.Services.autoSuggestOptions));
});
</script>
<?= $Page->Services->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_Services") ?>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_Services" data-hidden="1" name="o<?= $Page->RowIndex ?>_Services" id="o<?= $Page->RowIndex ?>_Services" value="<?= HtmlEncode($Page->Services->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Services"><span id="el<?= $Page->RowCount ?>_patient_services_Services" class="form-group">
<?php
$onchange = $Page->Services->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->Services->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Page->RowIndex ?>_Services" class="ew-auto-suggest">
    <input type="<?= $Page->Services->getInputTextType() ?>" class="form-control" name="sv_x<?= $Page->RowIndex ?>_Services" id="sv_x<?= $Page->RowIndex ?>_Services" value="<?= RemoveHtml($Page->Services->EditValue) ?>" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Services->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->Services->getPlaceHolder()) ?>"<?= $Page->Services->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient_services" data-field="x_Services" data-input="sv_x<?= $Page->RowIndex ?>_Services" data-value-separator="<?= $Page->Services->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_Services" id="x<?= $Page->RowIndex ?>_Services" value="<?= HtmlEncode($Page->Services->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->Services->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_serviceslist"], function() {
    fpatient_serviceslist.createAutoSuggest(Object.assign({"id":"x<?= $Page->RowIndex ?>_Services","forceSelect":true}, ew.vars.tables.patient_services.fields.Services.autoSuggestOptions));
});
</script>
<?= $Page->Services->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_Services") ?>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Services"><span id="el<?= $Page->RowCount ?>_patient_services_Services">
<span<?= $Page->Services->viewAttributes() ?>>
<?= $Page->Services->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->amount->Visible) { // amount ?>
        <td data-name="amount" <?= $Page->amount->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_amount"><span id="el<?= $Page->RowCount ?>_patient_services_amount" class="form-group">
<input type="<?= $Page->amount->getInputTextType() ?>" data-table="patient_services" data-field="x_amount" name="x<?= $Page->RowIndex ?>_amount" id="x<?= $Page->RowIndex ?>_amount" size="8" maxlength="13" placeholder="<?= HtmlEncode($Page->amount->getPlaceHolder()) ?>" value="<?= $Page->amount->EditValue ?>"<?= $Page->amount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->amount->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_amount" data-hidden="1" name="o<?= $Page->RowIndex ?>_amount" id="o<?= $Page->RowIndex ?>_amount" value="<?= HtmlEncode($Page->amount->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_amount"><span id="el<?= $Page->RowCount ?>_patient_services_amount" class="form-group">
<input type="<?= $Page->amount->getInputTextType() ?>" data-table="patient_services" data-field="x_amount" name="x<?= $Page->RowIndex ?>_amount" id="x<?= $Page->RowIndex ?>_amount" size="8" maxlength="13" placeholder="<?= HtmlEncode($Page->amount->getPlaceHolder()) ?>" value="<?= $Page->amount->EditValue ?>"<?= $Page->amount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->amount->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_amount"><span id="el<?= $Page->RowCount ?>_patient_services_amount">
<span<?= $Page->amount->viewAttributes() ?>>
<?= $Page->amount->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->description->Visible) { // description ?>
        <td data-name="description" <?= $Page->description->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_description"><span id="el<?= $Page->RowCount ?>_patient_services_description" class="form-group">
<input type="<?= $Page->description->getInputTextType() ?>" data-table="patient_services" data-field="x_description" name="x<?= $Page->RowIndex ?>_description" id="x<?= $Page->RowIndex ?>_description" placeholder="<?= HtmlEncode($Page->description->getPlaceHolder()) ?>" value="<?= $Page->description->EditValue ?>"<?= $Page->description->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->description->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_description" data-hidden="1" name="o<?= $Page->RowIndex ?>_description" id="o<?= $Page->RowIndex ?>_description" value="<?= HtmlEncode($Page->description->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_description"><span id="el<?= $Page->RowCount ?>_patient_services_description" class="form-group">
<input type="<?= $Page->description->getInputTextType() ?>" data-table="patient_services" data-field="x_description" name="x<?= $Page->RowIndex ?>_description" id="x<?= $Page->RowIndex ?>_description" placeholder="<?= HtmlEncode($Page->description->getPlaceHolder()) ?>" value="<?= $Page->description->EditValue ?>"<?= $Page->description->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->description->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_description"><span id="el<?= $Page->RowCount ?>_patient_services_description">
<span<?= $Page->description->viewAttributes() ?>>
<?= $Page->description->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->patient_type->Visible) { // patient_type ?>
        <td data-name="patient_type" <?= $Page->patient_type->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_patient_type"><span id="el<?= $Page->RowCount ?>_patient_services_patient_type" class="form-group">
<input type="<?= $Page->patient_type->getInputTextType() ?>" data-table="patient_services" data-field="x_patient_type" name="x<?= $Page->RowIndex ?>_patient_type" id="x<?= $Page->RowIndex ?>_patient_type" size="30" placeholder="<?= HtmlEncode($Page->patient_type->getPlaceHolder()) ?>" value="<?= $Page->patient_type->EditValue ?>"<?= $Page->patient_type->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->patient_type->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_patient_type" data-hidden="1" name="o<?= $Page->RowIndex ?>_patient_type" id="o<?= $Page->RowIndex ?>_patient_type" value="<?= HtmlEncode($Page->patient_type->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_patient_type"><span id="el<?= $Page->RowCount ?>_patient_services_patient_type" class="form-group">
<input type="<?= $Page->patient_type->getInputTextType() ?>" data-table="patient_services" data-field="x_patient_type" name="x<?= $Page->RowIndex ?>_patient_type" id="x<?= $Page->RowIndex ?>_patient_type" size="30" placeholder="<?= HtmlEncode($Page->patient_type->getPlaceHolder()) ?>" value="<?= $Page->patient_type->EditValue ?>"<?= $Page->patient_type->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->patient_type->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_patient_type"><span id="el<?= $Page->RowCount ?>_patient_services_patient_type">
<span<?= $Page->patient_type->viewAttributes() ?>>
<?= $Page->patient_type->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->charged_date->Visible) { // charged_date ?>
        <td data-name="charged_date" <?= $Page->charged_date->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_services" data-field="x_charged_date" data-hidden="1" name="o<?= $Page->RowIndex ?>_charged_date" id="o<?= $Page->RowIndex ?>_charged_date" value="<?= HtmlEncode($Page->charged_date->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_charged_date"><span id="el<?= $Page->RowCount ?>_patient_services_charged_date">
<span<?= $Page->charged_date->viewAttributes() ?>>
<?= $Page->charged_date->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->status->Visible) { // status ?>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_status"><span id="el<?= $Page->RowCount ?>_patient_services_status" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_status"
        name="x<?= $Page->RowIndex ?>_status"
        class="form-control ew-select<?= $Page->status->isInvalidClass() ?>"
        data-select2-id="patient_services_x<?= $Page->RowIndex ?>_status"
        data-table="patient_services"
        data-field="x_status"
        data-value-separator="<?= $Page->status->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->status->getPlaceHolder()) ?>"
        <?= $Page->status->editAttributes() ?>>
        <?= $Page->status->selectOptionListHtml("x{$Page->RowIndex}_status") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
<?= $Page->status->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_status") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_services_x<?= $Page->RowIndex ?>_status']"),
        options = { name: "x<?= $Page->RowIndex ?>_status", selectId: "patient_services_x<?= $Page->RowIndex ?>_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_services.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_status" data-hidden="1" name="o<?= $Page->RowIndex ?>_status" id="o<?= $Page->RowIndex ?>_status" value="<?= HtmlEncode($Page->status->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_status"><span id="el<?= $Page->RowCount ?>_patient_services_status" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_status"
        name="x<?= $Page->RowIndex ?>_status"
        class="form-control ew-select<?= $Page->status->isInvalidClass() ?>"
        data-select2-id="patient_services_x<?= $Page->RowIndex ?>_status"
        data-table="patient_services"
        data-field="x_status"
        data-value-separator="<?= $Page->status->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->status->getPlaceHolder()) ?>"
        <?= $Page->status->editAttributes() ?>>
        <?= $Page->status->selectOptionListHtml("x{$Page->RowIndex}_status") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
<?= $Page->status->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_status") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_services_x<?= $Page->RowIndex ?>_status']"),
        options = { name: "x<?= $Page->RowIndex ?>_status", selectId: "patient_services_x<?= $Page->RowIndex ?>_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_services.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_status"><span id="el<?= $Page->RowCount ?>_patient_services_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->mrnno->Visible) { // mrnno ?>
        <td data-name="mrnno" <?= $Page->mrnno->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Page->mrnno->getSessionValue() != "") { ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_mrnno"><span id="el<?= $Page->RowCount ?>_patient_services_mrnno" class="form-group">
<span<?= $Page->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->mrnno->getDisplayValue($Page->mrnno->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" id="x<?= $Page->RowIndex ?>_mrnno" name="x<?= $Page->RowIndex ?>_mrnno" value="<?= HtmlEncode($Page->mrnno->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_mrnno"><span id="el<?= $Page->RowCount ?>_patient_services_mrnno" class="form-group">
<input type="<?= $Page->mrnno->getInputTextType() ?>" data-table="patient_services" data-field="x_mrnno" name="x<?= $Page->RowIndex ?>_mrnno" id="x<?= $Page->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mrnno->getPlaceHolder()) ?>" value="<?= $Page->mrnno->EditValue ?>"<?= $Page->mrnno->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->mrnno->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_mrnno" data-hidden="1" name="o<?= $Page->RowIndex ?>_mrnno" id="o<?= $Page->RowIndex ?>_mrnno" value="<?= HtmlEncode($Page->mrnno->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_mrnno"><span id="el<?= $Page->RowCount ?>_patient_services_mrnno" class="form-group">
<span<?= $Page->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->mrnno->getDisplayValue($Page->mrnno->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_mrnno" data-hidden="1" name="x<?= $Page->RowIndex ?>_mrnno" id="x<?= $Page->RowIndex ?>_mrnno" value="<?= HtmlEncode($Page->mrnno->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_mrnno"><span id="el<?= $Page->RowCount ?>_patient_services_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<?= $Page->mrnno->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_PatientName"><span id="el<?= $Page->RowCount ?>_patient_services_PatientName" class="form-group">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="patient_services" data-field="x_PatientName" name="x<?= $Page->RowIndex ?>_PatientName" id="x<?= $Page->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_PatientName" data-hidden="1" name="o<?= $Page->RowIndex ?>_PatientName" id="o<?= $Page->RowIndex ?>_PatientName" value="<?= HtmlEncode($Page->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_PatientName"><span id="el<?= $Page->RowCount ?>_patient_services_PatientName" class="form-group">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="patient_services" data-field="x_PatientName" name="x<?= $Page->RowIndex ?>_PatientName" id="x<?= $Page->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_PatientName"><span id="el<?= $Page->RowCount ?>_patient_services_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Age->Visible) { // Age ?>
        <td data-name="Age" <?= $Page->Age->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Age"><span id="el<?= $Page->RowCount ?>_patient_services_Age" class="form-group">
<input type="<?= $Page->Age->getInputTextType() ?>" data-table="patient_services" data-field="x_Age" name="x<?= $Page->RowIndex ?>_Age" id="x<?= $Page->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Age->getPlaceHolder()) ?>" value="<?= $Page->Age->EditValue ?>"<?= $Page->Age->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Age->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_Age" data-hidden="1" name="o<?= $Page->RowIndex ?>_Age" id="o<?= $Page->RowIndex ?>_Age" value="<?= HtmlEncode($Page->Age->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Age"><span id="el<?= $Page->RowCount ?>_patient_services_Age" class="form-group">
<input type="<?= $Page->Age->getInputTextType() ?>" data-table="patient_services" data-field="x_Age" name="x<?= $Page->RowIndex ?>_Age" id="x<?= $Page->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Age->getPlaceHolder()) ?>" value="<?= $Page->Age->EditValue ?>"<?= $Page->Age->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Age->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Age"><span id="el<?= $Page->RowCount ?>_patient_services_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Gender->Visible) { // Gender ?>
        <td data-name="Gender" <?= $Page->Gender->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Gender"><span id="el<?= $Page->RowCount ?>_patient_services_Gender" class="form-group">
<input type="<?= $Page->Gender->getInputTextType() ?>" data-table="patient_services" data-field="x_Gender" name="x<?= $Page->RowIndex ?>_Gender" id="x<?= $Page->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Gender->getPlaceHolder()) ?>" value="<?= $Page->Gender->EditValue ?>"<?= $Page->Gender->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Gender->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_Gender" data-hidden="1" name="o<?= $Page->RowIndex ?>_Gender" id="o<?= $Page->RowIndex ?>_Gender" value="<?= HtmlEncode($Page->Gender->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Gender"><span id="el<?= $Page->RowCount ?>_patient_services_Gender" class="form-group">
<input type="<?= $Page->Gender->getInputTextType() ?>" data-table="patient_services" data-field="x_Gender" name="x<?= $Page->RowIndex ?>_Gender" id="x<?= $Page->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Gender->getPlaceHolder()) ?>" value="<?= $Page->Gender->EditValue ?>"<?= $Page->Gender->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Gender->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Gender"><span id="el<?= $Page->RowCount ?>_patient_services_Gender">
<span<?= $Page->Gender->viewAttributes() ?>>
<?= $Page->Gender->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Unit->Visible) { // Unit ?>
        <td data-name="Unit" <?= $Page->Unit->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Unit"><span id="el<?= $Page->RowCount ?>_patient_services_Unit" class="form-group">
<input type="<?= $Page->Unit->getInputTextType() ?>" data-table="patient_services" data-field="x_Unit" name="x<?= $Page->RowIndex ?>_Unit" id="x<?= $Page->RowIndex ?>_Unit" size="30" placeholder="<?= HtmlEncode($Page->Unit->getPlaceHolder()) ?>" value="<?= $Page->Unit->EditValue ?>"<?= $Page->Unit->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Unit->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_Unit" data-hidden="1" name="o<?= $Page->RowIndex ?>_Unit" id="o<?= $Page->RowIndex ?>_Unit" value="<?= HtmlEncode($Page->Unit->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Unit"><span id="el<?= $Page->RowCount ?>_patient_services_Unit" class="form-group">
<input type="<?= $Page->Unit->getInputTextType() ?>" data-table="patient_services" data-field="x_Unit" name="x<?= $Page->RowIndex ?>_Unit" id="x<?= $Page->RowIndex ?>_Unit" size="30" placeholder="<?= HtmlEncode($Page->Unit->getPlaceHolder()) ?>" value="<?= $Page->Unit->EditValue ?>"<?= $Page->Unit->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Unit->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Unit"><span id="el<?= $Page->RowCount ?>_patient_services_Unit">
<span<?= $Page->Unit->viewAttributes() ?>>
<?= $Page->Unit->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Quantity->Visible) { // Quantity ?>
        <td data-name="Quantity" <?= $Page->Quantity->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Quantity"><span id="el<?= $Page->RowCount ?>_patient_services_Quantity" class="form-group">
<input type="<?= $Page->Quantity->getInputTextType() ?>" data-table="patient_services" data-field="x_Quantity" name="x<?= $Page->RowIndex ?>_Quantity" id="x<?= $Page->RowIndex ?>_Quantity" size="2" maxlength="4" placeholder="<?= HtmlEncode($Page->Quantity->getPlaceHolder()) ?>" value="<?= $Page->Quantity->EditValue ?>"<?= $Page->Quantity->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Quantity->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_Quantity" data-hidden="1" name="o<?= $Page->RowIndex ?>_Quantity" id="o<?= $Page->RowIndex ?>_Quantity" value="<?= HtmlEncode($Page->Quantity->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Quantity"><span id="el<?= $Page->RowCount ?>_patient_services_Quantity" class="form-group">
<input type="<?= $Page->Quantity->getInputTextType() ?>" data-table="patient_services" data-field="x_Quantity" name="x<?= $Page->RowIndex ?>_Quantity" id="x<?= $Page->RowIndex ?>_Quantity" size="2" maxlength="4" placeholder="<?= HtmlEncode($Page->Quantity->getPlaceHolder()) ?>" value="<?= $Page->Quantity->EditValue ?>"<?= $Page->Quantity->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Quantity->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Quantity"><span id="el<?= $Page->RowCount ?>_patient_services_Quantity">
<span<?= $Page->Quantity->viewAttributes() ?>>
<?= $Page->Quantity->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Discount->Visible) { // Discount ?>
        <td data-name="Discount" <?= $Page->Discount->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Discount"><span id="el<?= $Page->RowCount ?>_patient_services_Discount" class="form-group">
<input type="<?= $Page->Discount->getInputTextType() ?>" data-table="patient_services" data-field="x_Discount" name="x<?= $Page->RowIndex ?>_Discount" id="x<?= $Page->RowIndex ?>_Discount" size="4" maxlength="8" placeholder="<?= HtmlEncode($Page->Discount->getPlaceHolder()) ?>" value="<?= $Page->Discount->EditValue ?>"<?= $Page->Discount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Discount->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_Discount" data-hidden="1" name="o<?= $Page->RowIndex ?>_Discount" id="o<?= $Page->RowIndex ?>_Discount" value="<?= HtmlEncode($Page->Discount->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Discount"><span id="el<?= $Page->RowCount ?>_patient_services_Discount" class="form-group">
<input type="<?= $Page->Discount->getInputTextType() ?>" data-table="patient_services" data-field="x_Discount" name="x<?= $Page->RowIndex ?>_Discount" id="x<?= $Page->RowIndex ?>_Discount" size="4" maxlength="8" placeholder="<?= HtmlEncode($Page->Discount->getPlaceHolder()) ?>" value="<?= $Page->Discount->EditValue ?>"<?= $Page->Discount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Discount->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Discount"><span id="el<?= $Page->RowCount ?>_patient_services_Discount">
<span<?= $Page->Discount->viewAttributes() ?>>
<?= $Page->Discount->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->SubTotal->Visible) { // SubTotal ?>
        <td data-name="SubTotal" <?= $Page->SubTotal->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_SubTotal"><span id="el<?= $Page->RowCount ?>_patient_services_SubTotal" class="form-group">
<input type="<?= $Page->SubTotal->getInputTextType() ?>" data-table="patient_services" data-field="x_SubTotal" name="x<?= $Page->RowIndex ?>_SubTotal" id="x<?= $Page->RowIndex ?>_SubTotal" size="8" maxlength="13" placeholder="<?= HtmlEncode($Page->SubTotal->getPlaceHolder()) ?>" value="<?= $Page->SubTotal->EditValue ?>"<?= $Page->SubTotal->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SubTotal->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_SubTotal" data-hidden="1" name="o<?= $Page->RowIndex ?>_SubTotal" id="o<?= $Page->RowIndex ?>_SubTotal" value="<?= HtmlEncode($Page->SubTotal->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_SubTotal"><span id="el<?= $Page->RowCount ?>_patient_services_SubTotal" class="form-group">
<input type="<?= $Page->SubTotal->getInputTextType() ?>" data-table="patient_services" data-field="x_SubTotal" name="x<?= $Page->RowIndex ?>_SubTotal" id="x<?= $Page->RowIndex ?>_SubTotal" size="8" maxlength="13" placeholder="<?= HtmlEncode($Page->SubTotal->getPlaceHolder()) ?>" value="<?= $Page->SubTotal->EditValue ?>"<?= $Page->SubTotal->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SubTotal->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_SubTotal"><span id="el<?= $Page->RowCount ?>_patient_services_SubTotal">
<span<?= $Page->SubTotal->viewAttributes() ?>>
<?= $Page->SubTotal->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->ServiceSelect->Visible) { // ServiceSelect ?>
        <td data-name="ServiceSelect" <?= $Page->ServiceSelect->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_ServiceSelect"><span id="el<?= $Page->RowCount ?>_patient_services_ServiceSelect" class="form-group">
<template id="tp_x<?= $Page->RowIndex ?>_ServiceSelect">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="patient_services" data-field="x_ServiceSelect" name="x<?= $Page->RowIndex ?>_ServiceSelect" id="x<?= $Page->RowIndex ?>_ServiceSelect"<?= $Page->ServiceSelect->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_ServiceSelect" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_ServiceSelect[]"
    name="x<?= $Page->RowIndex ?>_ServiceSelect[]"
    value="<?= HtmlEncode($Page->ServiceSelect->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_ServiceSelect"
    data-target="dsl_x<?= $Page->RowIndex ?>_ServiceSelect"
    data-repeatcolumn="5"
    class="form-control<?= $Page->ServiceSelect->isInvalidClass() ?>"
    data-table="patient_services"
    data-field="x_ServiceSelect"
    data-value-separator="<?= $Page->ServiceSelect->displayValueSeparatorAttribute() ?>"
    <?= $Page->ServiceSelect->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ServiceSelect->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_ServiceSelect" data-hidden="1" name="o<?= $Page->RowIndex ?>_ServiceSelect[]" id="o<?= $Page->RowIndex ?>_ServiceSelect[]" value="<?= HtmlEncode($Page->ServiceSelect->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_ServiceSelect"><span id="el<?= $Page->RowCount ?>_patient_services_ServiceSelect" class="form-group">
<template id="tp_x<?= $Page->RowIndex ?>_ServiceSelect">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="patient_services" data-field="x_ServiceSelect" name="x<?= $Page->RowIndex ?>_ServiceSelect" id="x<?= $Page->RowIndex ?>_ServiceSelect"<?= $Page->ServiceSelect->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_ServiceSelect" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_ServiceSelect[]"
    name="x<?= $Page->RowIndex ?>_ServiceSelect[]"
    value="<?= HtmlEncode($Page->ServiceSelect->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_ServiceSelect"
    data-target="dsl_x<?= $Page->RowIndex ?>_ServiceSelect"
    data-repeatcolumn="5"
    class="form-control<?= $Page->ServiceSelect->isInvalidClass() ?>"
    data-table="patient_services"
    data-field="x_ServiceSelect"
    data-value-separator="<?= $Page->ServiceSelect->displayValueSeparatorAttribute() ?>"
    <?= $Page->ServiceSelect->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ServiceSelect->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_ServiceSelect"><span id="el<?= $Page->RowCount ?>_patient_services_ServiceSelect">
<span<?= $Page->ServiceSelect->viewAttributes() ?>>
<?= $Page->ServiceSelect->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Aid->Visible) { // Aid ?>
        <td data-name="Aid" <?= $Page->Aid->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Aid"><span id="el<?= $Page->RowCount ?>_patient_services_Aid" class="form-group">
<input type="<?= $Page->Aid->getInputTextType() ?>" data-table="patient_services" data-field="x_Aid" name="x<?= $Page->RowIndex ?>_Aid" id="x<?= $Page->RowIndex ?>_Aid" size="30" placeholder="<?= HtmlEncode($Page->Aid->getPlaceHolder()) ?>" value="<?= $Page->Aid->EditValue ?>"<?= $Page->Aid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Aid->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_Aid" data-hidden="1" name="o<?= $Page->RowIndex ?>_Aid" id="o<?= $Page->RowIndex ?>_Aid" value="<?= HtmlEncode($Page->Aid->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Aid"><span id="el<?= $Page->RowCount ?>_patient_services_Aid" class="form-group">
<input type="<?= $Page->Aid->getInputTextType() ?>" data-table="patient_services" data-field="x_Aid" name="x<?= $Page->RowIndex ?>_Aid" id="x<?= $Page->RowIndex ?>_Aid" size="30" placeholder="<?= HtmlEncode($Page->Aid->getPlaceHolder()) ?>" value="<?= $Page->Aid->EditValue ?>"<?= $Page->Aid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Aid->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Aid"><span id="el<?= $Page->RowCount ?>_patient_services_Aid">
<span<?= $Page->Aid->viewAttributes() ?>>
<?= $Page->Aid->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Vid->Visible) { // Vid ?>
        <td data-name="Vid" <?= $Page->Vid->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Page->Vid->getSessionValue() != "") { ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Vid"><span id="el<?= $Page->RowCount ?>_patient_services_Vid" class="form-group">
<span<?= $Page->Vid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Vid->getDisplayValue($Page->Vid->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" id="x<?= $Page->RowIndex ?>_Vid" name="x<?= $Page->RowIndex ?>_Vid" value="<?= HtmlEncode($Page->Vid->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Vid"><span id="el<?= $Page->RowCount ?>_patient_services_Vid" class="form-group">
<input type="<?= $Page->Vid->getInputTextType() ?>" data-table="patient_services" data-field="x_Vid" name="x<?= $Page->RowIndex ?>_Vid" id="x<?= $Page->RowIndex ?>_Vid" size="30" placeholder="<?= HtmlEncode($Page->Vid->getPlaceHolder()) ?>" value="<?= $Page->Vid->EditValue ?>"<?= $Page->Vid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Vid->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_Vid" data-hidden="1" name="o<?= $Page->RowIndex ?>_Vid" id="o<?= $Page->RowIndex ?>_Vid" value="<?= HtmlEncode($Page->Vid->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Page->Vid->getSessionValue() != "") { ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Vid"><span id="el<?= $Page->RowCount ?>_patient_services_Vid" class="form-group">
<span<?= $Page->Vid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Vid->getDisplayValue($Page->Vid->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" id="x<?= $Page->RowIndex ?>_Vid" name="x<?= $Page->RowIndex ?>_Vid" value="<?= HtmlEncode($Page->Vid->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Vid"><span id="el<?= $Page->RowCount ?>_patient_services_Vid" class="form-group">
<input type="<?= $Page->Vid->getInputTextType() ?>" data-table="patient_services" data-field="x_Vid" name="x<?= $Page->RowIndex ?>_Vid" id="x<?= $Page->RowIndex ?>_Vid" size="30" placeholder="<?= HtmlEncode($Page->Vid->getPlaceHolder()) ?>" value="<?= $Page->Vid->EditValue ?>"<?= $Page->Vid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Vid->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Vid"><span id="el<?= $Page->RowCount ?>_patient_services_Vid">
<span<?= $Page->Vid->viewAttributes() ?>>
<?= $Page->Vid->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->DrID->Visible) { // DrID ?>
        <td data-name="DrID" <?= $Page->DrID->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_DrID"><span id="el<?= $Page->RowCount ?>_patient_services_DrID" class="form-group">
<input type="<?= $Page->DrID->getInputTextType() ?>" data-table="patient_services" data-field="x_DrID" name="x<?= $Page->RowIndex ?>_DrID" id="x<?= $Page->RowIndex ?>_DrID" size="30" placeholder="<?= HtmlEncode($Page->DrID->getPlaceHolder()) ?>" value="<?= $Page->DrID->EditValue ?>"<?= $Page->DrID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DrID->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_DrID" data-hidden="1" name="o<?= $Page->RowIndex ?>_DrID" id="o<?= $Page->RowIndex ?>_DrID" value="<?= HtmlEncode($Page->DrID->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_DrID"><span id="el<?= $Page->RowCount ?>_patient_services_DrID" class="form-group">
<input type="<?= $Page->DrID->getInputTextType() ?>" data-table="patient_services" data-field="x_DrID" name="x<?= $Page->RowIndex ?>_DrID" id="x<?= $Page->RowIndex ?>_DrID" size="30" placeholder="<?= HtmlEncode($Page->DrID->getPlaceHolder()) ?>" value="<?= $Page->DrID->EditValue ?>"<?= $Page->DrID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DrID->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_DrID"><span id="el<?= $Page->RowCount ?>_patient_services_DrID">
<span<?= $Page->DrID->viewAttributes() ?>>
<?= $Page->DrID->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->DrCODE->Visible) { // DrCODE ?>
        <td data-name="DrCODE" <?= $Page->DrCODE->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_DrCODE"><span id="el<?= $Page->RowCount ?>_patient_services_DrCODE" class="form-group">
<input type="<?= $Page->DrCODE->getInputTextType() ?>" data-table="patient_services" data-field="x_DrCODE" name="x<?= $Page->RowIndex ?>_DrCODE" id="x<?= $Page->RowIndex ?>_DrCODE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DrCODE->getPlaceHolder()) ?>" value="<?= $Page->DrCODE->EditValue ?>"<?= $Page->DrCODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DrCODE->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_DrCODE" data-hidden="1" name="o<?= $Page->RowIndex ?>_DrCODE" id="o<?= $Page->RowIndex ?>_DrCODE" value="<?= HtmlEncode($Page->DrCODE->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_DrCODE"><span id="el<?= $Page->RowCount ?>_patient_services_DrCODE" class="form-group">
<input type="<?= $Page->DrCODE->getInputTextType() ?>" data-table="patient_services" data-field="x_DrCODE" name="x<?= $Page->RowIndex ?>_DrCODE" id="x<?= $Page->RowIndex ?>_DrCODE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DrCODE->getPlaceHolder()) ?>" value="<?= $Page->DrCODE->EditValue ?>"<?= $Page->DrCODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DrCODE->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_DrCODE"><span id="el<?= $Page->RowCount ?>_patient_services_DrCODE">
<span<?= $Page->DrCODE->viewAttributes() ?>>
<?= $Page->DrCODE->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->DrName->Visible) { // DrName ?>
        <td data-name="DrName" <?= $Page->DrName->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_DrName"><span id="el<?= $Page->RowCount ?>_patient_services_DrName" class="form-group">
<input type="<?= $Page->DrName->getInputTextType() ?>" data-table="patient_services" data-field="x_DrName" name="x<?= $Page->RowIndex ?>_DrName" id="x<?= $Page->RowIndex ?>_DrName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DrName->getPlaceHolder()) ?>" value="<?= $Page->DrName->EditValue ?>"<?= $Page->DrName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DrName->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_DrName" data-hidden="1" name="o<?= $Page->RowIndex ?>_DrName" id="o<?= $Page->RowIndex ?>_DrName" value="<?= HtmlEncode($Page->DrName->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_DrName"><span id="el<?= $Page->RowCount ?>_patient_services_DrName" class="form-group">
<input type="<?= $Page->DrName->getInputTextType() ?>" data-table="patient_services" data-field="x_DrName" name="x<?= $Page->RowIndex ?>_DrName" id="x<?= $Page->RowIndex ?>_DrName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DrName->getPlaceHolder()) ?>" value="<?= $Page->DrName->EditValue ?>"<?= $Page->DrName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DrName->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_DrName"><span id="el<?= $Page->RowCount ?>_patient_services_DrName">
<span<?= $Page->DrName->viewAttributes() ?>>
<?= $Page->DrName->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Department->Visible) { // Department ?>
        <td data-name="Department" <?= $Page->Department->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Department"><span id="el<?= $Page->RowCount ?>_patient_services_Department" class="form-group">
<input type="<?= $Page->Department->getInputTextType() ?>" data-table="patient_services" data-field="x_Department" name="x<?= $Page->RowIndex ?>_Department" id="x<?= $Page->RowIndex ?>_Department" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Department->getPlaceHolder()) ?>" value="<?= $Page->Department->EditValue ?>"<?= $Page->Department->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Department->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_Department" data-hidden="1" name="o<?= $Page->RowIndex ?>_Department" id="o<?= $Page->RowIndex ?>_Department" value="<?= HtmlEncode($Page->Department->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Department"><span id="el<?= $Page->RowCount ?>_patient_services_Department" class="form-group">
<input type="<?= $Page->Department->getInputTextType() ?>" data-table="patient_services" data-field="x_Department" name="x<?= $Page->RowIndex ?>_Department" id="x<?= $Page->RowIndex ?>_Department" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Department->getPlaceHolder()) ?>" value="<?= $Page->Department->EditValue ?>"<?= $Page->Department->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Department->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Department"><span id="el<?= $Page->RowCount ?>_patient_services_Department">
<span<?= $Page->Department->viewAttributes() ?>>
<?= $Page->Department->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->DrSharePres->Visible) { // DrSharePres ?>
        <td data-name="DrSharePres" <?= $Page->DrSharePres->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_DrSharePres"><span id="el<?= $Page->RowCount ?>_patient_services_DrSharePres" class="form-group">
<input type="<?= $Page->DrSharePres->getInputTextType() ?>" data-table="patient_services" data-field="x_DrSharePres" name="x<?= $Page->RowIndex ?>_DrSharePres" id="x<?= $Page->RowIndex ?>_DrSharePres" size="30" placeholder="<?= HtmlEncode($Page->DrSharePres->getPlaceHolder()) ?>" value="<?= $Page->DrSharePres->EditValue ?>"<?= $Page->DrSharePres->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DrSharePres->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_DrSharePres" data-hidden="1" name="o<?= $Page->RowIndex ?>_DrSharePres" id="o<?= $Page->RowIndex ?>_DrSharePres" value="<?= HtmlEncode($Page->DrSharePres->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_DrSharePres"><span id="el<?= $Page->RowCount ?>_patient_services_DrSharePres" class="form-group">
<input type="<?= $Page->DrSharePres->getInputTextType() ?>" data-table="patient_services" data-field="x_DrSharePres" name="x<?= $Page->RowIndex ?>_DrSharePres" id="x<?= $Page->RowIndex ?>_DrSharePres" size="30" placeholder="<?= HtmlEncode($Page->DrSharePres->getPlaceHolder()) ?>" value="<?= $Page->DrSharePres->EditValue ?>"<?= $Page->DrSharePres->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DrSharePres->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_DrSharePres"><span id="el<?= $Page->RowCount ?>_patient_services_DrSharePres">
<span<?= $Page->DrSharePres->viewAttributes() ?>>
<?= $Page->DrSharePres->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->HospSharePres->Visible) { // HospSharePres ?>
        <td data-name="HospSharePres" <?= $Page->HospSharePres->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_HospSharePres"><span id="el<?= $Page->RowCount ?>_patient_services_HospSharePres" class="form-group">
<input type="<?= $Page->HospSharePres->getInputTextType() ?>" data-table="patient_services" data-field="x_HospSharePres" name="x<?= $Page->RowIndex ?>_HospSharePres" id="x<?= $Page->RowIndex ?>_HospSharePres" size="30" placeholder="<?= HtmlEncode($Page->HospSharePres->getPlaceHolder()) ?>" value="<?= $Page->HospSharePres->EditValue ?>"<?= $Page->HospSharePres->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HospSharePres->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_HospSharePres" data-hidden="1" name="o<?= $Page->RowIndex ?>_HospSharePres" id="o<?= $Page->RowIndex ?>_HospSharePres" value="<?= HtmlEncode($Page->HospSharePres->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_HospSharePres"><span id="el<?= $Page->RowCount ?>_patient_services_HospSharePres" class="form-group">
<input type="<?= $Page->HospSharePres->getInputTextType() ?>" data-table="patient_services" data-field="x_HospSharePres" name="x<?= $Page->RowIndex ?>_HospSharePres" id="x<?= $Page->RowIndex ?>_HospSharePres" size="30" placeholder="<?= HtmlEncode($Page->HospSharePres->getPlaceHolder()) ?>" value="<?= $Page->HospSharePres->EditValue ?>"<?= $Page->HospSharePres->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HospSharePres->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_HospSharePres"><span id="el<?= $Page->RowCount ?>_patient_services_HospSharePres">
<span<?= $Page->HospSharePres->viewAttributes() ?>>
<?= $Page->HospSharePres->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->DrShareAmount->Visible) { // DrShareAmount ?>
        <td data-name="DrShareAmount" <?= $Page->DrShareAmount->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_DrShareAmount"><span id="el<?= $Page->RowCount ?>_patient_services_DrShareAmount" class="form-group">
<input type="<?= $Page->DrShareAmount->getInputTextType() ?>" data-table="patient_services" data-field="x_DrShareAmount" name="x<?= $Page->RowIndex ?>_DrShareAmount" id="x<?= $Page->RowIndex ?>_DrShareAmount" size="30" placeholder="<?= HtmlEncode($Page->DrShareAmount->getPlaceHolder()) ?>" value="<?= $Page->DrShareAmount->EditValue ?>"<?= $Page->DrShareAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DrShareAmount->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_DrShareAmount" data-hidden="1" name="o<?= $Page->RowIndex ?>_DrShareAmount" id="o<?= $Page->RowIndex ?>_DrShareAmount" value="<?= HtmlEncode($Page->DrShareAmount->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_DrShareAmount"><span id="el<?= $Page->RowCount ?>_patient_services_DrShareAmount" class="form-group">
<input type="<?= $Page->DrShareAmount->getInputTextType() ?>" data-table="patient_services" data-field="x_DrShareAmount" name="x<?= $Page->RowIndex ?>_DrShareAmount" id="x<?= $Page->RowIndex ?>_DrShareAmount" size="30" placeholder="<?= HtmlEncode($Page->DrShareAmount->getPlaceHolder()) ?>" value="<?= $Page->DrShareAmount->EditValue ?>"<?= $Page->DrShareAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DrShareAmount->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_DrShareAmount"><span id="el<?= $Page->RowCount ?>_patient_services_DrShareAmount">
<span<?= $Page->DrShareAmount->viewAttributes() ?>>
<?= $Page->DrShareAmount->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->HospShareAmount->Visible) { // HospShareAmount ?>
        <td data-name="HospShareAmount" <?= $Page->HospShareAmount->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_HospShareAmount"><span id="el<?= $Page->RowCount ?>_patient_services_HospShareAmount" class="form-group">
<input type="<?= $Page->HospShareAmount->getInputTextType() ?>" data-table="patient_services" data-field="x_HospShareAmount" name="x<?= $Page->RowIndex ?>_HospShareAmount" id="x<?= $Page->RowIndex ?>_HospShareAmount" size="30" placeholder="<?= HtmlEncode($Page->HospShareAmount->getPlaceHolder()) ?>" value="<?= $Page->HospShareAmount->EditValue ?>"<?= $Page->HospShareAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HospShareAmount->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_HospShareAmount" data-hidden="1" name="o<?= $Page->RowIndex ?>_HospShareAmount" id="o<?= $Page->RowIndex ?>_HospShareAmount" value="<?= HtmlEncode($Page->HospShareAmount->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_HospShareAmount"><span id="el<?= $Page->RowCount ?>_patient_services_HospShareAmount" class="form-group">
<input type="<?= $Page->HospShareAmount->getInputTextType() ?>" data-table="patient_services" data-field="x_HospShareAmount" name="x<?= $Page->RowIndex ?>_HospShareAmount" id="x<?= $Page->RowIndex ?>_HospShareAmount" size="30" placeholder="<?= HtmlEncode($Page->HospShareAmount->getPlaceHolder()) ?>" value="<?= $Page->HospShareAmount->EditValue ?>"<?= $Page->HospShareAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HospShareAmount->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_HospShareAmount"><span id="el<?= $Page->RowCount ?>_patient_services_HospShareAmount">
<span<?= $Page->HospShareAmount->viewAttributes() ?>>
<?= $Page->HospShareAmount->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
        <td data-name="DrShareSettiledAmount" <?= $Page->DrShareSettiledAmount->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_DrShareSettiledAmount"><span id="el<?= $Page->RowCount ?>_patient_services_DrShareSettiledAmount" class="form-group">
<input type="<?= $Page->DrShareSettiledAmount->getInputTextType() ?>" data-table="patient_services" data-field="x_DrShareSettiledAmount" name="x<?= $Page->RowIndex ?>_DrShareSettiledAmount" id="x<?= $Page->RowIndex ?>_DrShareSettiledAmount" size="30" placeholder="<?= HtmlEncode($Page->DrShareSettiledAmount->getPlaceHolder()) ?>" value="<?= $Page->DrShareSettiledAmount->EditValue ?>"<?= $Page->DrShareSettiledAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DrShareSettiledAmount->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettiledAmount" data-hidden="1" name="o<?= $Page->RowIndex ?>_DrShareSettiledAmount" id="o<?= $Page->RowIndex ?>_DrShareSettiledAmount" value="<?= HtmlEncode($Page->DrShareSettiledAmount->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_DrShareSettiledAmount"><span id="el<?= $Page->RowCount ?>_patient_services_DrShareSettiledAmount" class="form-group">
<input type="<?= $Page->DrShareSettiledAmount->getInputTextType() ?>" data-table="patient_services" data-field="x_DrShareSettiledAmount" name="x<?= $Page->RowIndex ?>_DrShareSettiledAmount" id="x<?= $Page->RowIndex ?>_DrShareSettiledAmount" size="30" placeholder="<?= HtmlEncode($Page->DrShareSettiledAmount->getPlaceHolder()) ?>" value="<?= $Page->DrShareSettiledAmount->EditValue ?>"<?= $Page->DrShareSettiledAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DrShareSettiledAmount->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_DrShareSettiledAmount"><span id="el<?= $Page->RowCount ?>_patient_services_DrShareSettiledAmount">
<span<?= $Page->DrShareSettiledAmount->viewAttributes() ?>>
<?= $Page->DrShareSettiledAmount->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->DrShareSettledId->Visible) { // DrShareSettledId ?>
        <td data-name="DrShareSettledId" <?= $Page->DrShareSettledId->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_DrShareSettledId"><span id="el<?= $Page->RowCount ?>_patient_services_DrShareSettledId" class="form-group">
<input type="<?= $Page->DrShareSettledId->getInputTextType() ?>" data-table="patient_services" data-field="x_DrShareSettledId" name="x<?= $Page->RowIndex ?>_DrShareSettledId" id="x<?= $Page->RowIndex ?>_DrShareSettledId" size="30" placeholder="<?= HtmlEncode($Page->DrShareSettledId->getPlaceHolder()) ?>" value="<?= $Page->DrShareSettledId->EditValue ?>"<?= $Page->DrShareSettledId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DrShareSettledId->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettledId" data-hidden="1" name="o<?= $Page->RowIndex ?>_DrShareSettledId" id="o<?= $Page->RowIndex ?>_DrShareSettledId" value="<?= HtmlEncode($Page->DrShareSettledId->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_DrShareSettledId"><span id="el<?= $Page->RowCount ?>_patient_services_DrShareSettledId" class="form-group">
<input type="<?= $Page->DrShareSettledId->getInputTextType() ?>" data-table="patient_services" data-field="x_DrShareSettledId" name="x<?= $Page->RowIndex ?>_DrShareSettledId" id="x<?= $Page->RowIndex ?>_DrShareSettledId" size="30" placeholder="<?= HtmlEncode($Page->DrShareSettledId->getPlaceHolder()) ?>" value="<?= $Page->DrShareSettledId->EditValue ?>"<?= $Page->DrShareSettledId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DrShareSettledId->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_DrShareSettledId"><span id="el<?= $Page->RowCount ?>_patient_services_DrShareSettledId">
<span<?= $Page->DrShareSettledId->viewAttributes() ?>>
<?= $Page->DrShareSettledId->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
        <td data-name="DrShareSettiledStatus" <?= $Page->DrShareSettiledStatus->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_DrShareSettiledStatus"><span id="el<?= $Page->RowCount ?>_patient_services_DrShareSettiledStatus" class="form-group">
<input type="<?= $Page->DrShareSettiledStatus->getInputTextType() ?>" data-table="patient_services" data-field="x_DrShareSettiledStatus" name="x<?= $Page->RowIndex ?>_DrShareSettiledStatus" id="x<?= $Page->RowIndex ?>_DrShareSettiledStatus" size="30" placeholder="<?= HtmlEncode($Page->DrShareSettiledStatus->getPlaceHolder()) ?>" value="<?= $Page->DrShareSettiledStatus->EditValue ?>"<?= $Page->DrShareSettiledStatus->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DrShareSettiledStatus->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_DrShareSettiledStatus" data-hidden="1" name="o<?= $Page->RowIndex ?>_DrShareSettiledStatus" id="o<?= $Page->RowIndex ?>_DrShareSettiledStatus" value="<?= HtmlEncode($Page->DrShareSettiledStatus->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_DrShareSettiledStatus"><span id="el<?= $Page->RowCount ?>_patient_services_DrShareSettiledStatus" class="form-group">
<input type="<?= $Page->DrShareSettiledStatus->getInputTextType() ?>" data-table="patient_services" data-field="x_DrShareSettiledStatus" name="x<?= $Page->RowIndex ?>_DrShareSettiledStatus" id="x<?= $Page->RowIndex ?>_DrShareSettiledStatus" size="30" placeholder="<?= HtmlEncode($Page->DrShareSettiledStatus->getPlaceHolder()) ?>" value="<?= $Page->DrShareSettiledStatus->EditValue ?>"<?= $Page->DrShareSettiledStatus->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DrShareSettiledStatus->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_DrShareSettiledStatus"><span id="el<?= $Page->RowCount ?>_patient_services_DrShareSettiledStatus">
<span<?= $Page->DrShareSettiledStatus->viewAttributes() ?>>
<?= $Page->DrShareSettiledStatus->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->invoiceId->Visible) { // invoiceId ?>
        <td data-name="invoiceId" <?= $Page->invoiceId->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_invoiceId"><span id="el<?= $Page->RowCount ?>_patient_services_invoiceId" class="form-group">
<input type="<?= $Page->invoiceId->getInputTextType() ?>" data-table="patient_services" data-field="x_invoiceId" name="x<?= $Page->RowIndex ?>_invoiceId" id="x<?= $Page->RowIndex ?>_invoiceId" size="30" placeholder="<?= HtmlEncode($Page->invoiceId->getPlaceHolder()) ?>" value="<?= $Page->invoiceId->EditValue ?>"<?= $Page->invoiceId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->invoiceId->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_invoiceId" data-hidden="1" name="o<?= $Page->RowIndex ?>_invoiceId" id="o<?= $Page->RowIndex ?>_invoiceId" value="<?= HtmlEncode($Page->invoiceId->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_invoiceId"><span id="el<?= $Page->RowCount ?>_patient_services_invoiceId" class="form-group">
<input type="<?= $Page->invoiceId->getInputTextType() ?>" data-table="patient_services" data-field="x_invoiceId" name="x<?= $Page->RowIndex ?>_invoiceId" id="x<?= $Page->RowIndex ?>_invoiceId" size="30" placeholder="<?= HtmlEncode($Page->invoiceId->getPlaceHolder()) ?>" value="<?= $Page->invoiceId->EditValue ?>"<?= $Page->invoiceId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->invoiceId->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_invoiceId"><span id="el<?= $Page->RowCount ?>_patient_services_invoiceId">
<span<?= $Page->invoiceId->viewAttributes() ?>>
<?= $Page->invoiceId->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->invoiceAmount->Visible) { // invoiceAmount ?>
        <td data-name="invoiceAmount" <?= $Page->invoiceAmount->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_invoiceAmount"><span id="el<?= $Page->RowCount ?>_patient_services_invoiceAmount" class="form-group">
<input type="<?= $Page->invoiceAmount->getInputTextType() ?>" data-table="patient_services" data-field="x_invoiceAmount" name="x<?= $Page->RowIndex ?>_invoiceAmount" id="x<?= $Page->RowIndex ?>_invoiceAmount" size="30" placeholder="<?= HtmlEncode($Page->invoiceAmount->getPlaceHolder()) ?>" value="<?= $Page->invoiceAmount->EditValue ?>"<?= $Page->invoiceAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->invoiceAmount->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_invoiceAmount" data-hidden="1" name="o<?= $Page->RowIndex ?>_invoiceAmount" id="o<?= $Page->RowIndex ?>_invoiceAmount" value="<?= HtmlEncode($Page->invoiceAmount->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_invoiceAmount"><span id="el<?= $Page->RowCount ?>_patient_services_invoiceAmount" class="form-group">
<input type="<?= $Page->invoiceAmount->getInputTextType() ?>" data-table="patient_services" data-field="x_invoiceAmount" name="x<?= $Page->RowIndex ?>_invoiceAmount" id="x<?= $Page->RowIndex ?>_invoiceAmount" size="30" placeholder="<?= HtmlEncode($Page->invoiceAmount->getPlaceHolder()) ?>" value="<?= $Page->invoiceAmount->EditValue ?>"<?= $Page->invoiceAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->invoiceAmount->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_invoiceAmount"><span id="el<?= $Page->RowCount ?>_patient_services_invoiceAmount">
<span<?= $Page->invoiceAmount->viewAttributes() ?>>
<?= $Page->invoiceAmount->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->invoiceStatus->Visible) { // invoiceStatus ?>
        <td data-name="invoiceStatus" <?= $Page->invoiceStatus->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_invoiceStatus"><span id="el<?= $Page->RowCount ?>_patient_services_invoiceStatus" class="form-group">
<input type="<?= $Page->invoiceStatus->getInputTextType() ?>" data-table="patient_services" data-field="x_invoiceStatus" name="x<?= $Page->RowIndex ?>_invoiceStatus" id="x<?= $Page->RowIndex ?>_invoiceStatus" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->invoiceStatus->getPlaceHolder()) ?>" value="<?= $Page->invoiceStatus->EditValue ?>"<?= $Page->invoiceStatus->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->invoiceStatus->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_invoiceStatus" data-hidden="1" name="o<?= $Page->RowIndex ?>_invoiceStatus" id="o<?= $Page->RowIndex ?>_invoiceStatus" value="<?= HtmlEncode($Page->invoiceStatus->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_invoiceStatus"><span id="el<?= $Page->RowCount ?>_patient_services_invoiceStatus" class="form-group">
<input type="<?= $Page->invoiceStatus->getInputTextType() ?>" data-table="patient_services" data-field="x_invoiceStatus" name="x<?= $Page->RowIndex ?>_invoiceStatus" id="x<?= $Page->RowIndex ?>_invoiceStatus" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->invoiceStatus->getPlaceHolder()) ?>" value="<?= $Page->invoiceStatus->EditValue ?>"<?= $Page->invoiceStatus->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->invoiceStatus->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_invoiceStatus"><span id="el<?= $Page->RowCount ?>_patient_services_invoiceStatus">
<span<?= $Page->invoiceStatus->viewAttributes() ?>>
<?= $Page->invoiceStatus->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->modeOfPayment->Visible) { // modeOfPayment ?>
        <td data-name="modeOfPayment" <?= $Page->modeOfPayment->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_modeOfPayment"><span id="el<?= $Page->RowCount ?>_patient_services_modeOfPayment" class="form-group">
<input type="<?= $Page->modeOfPayment->getInputTextType() ?>" data-table="patient_services" data-field="x_modeOfPayment" name="x<?= $Page->RowIndex ?>_modeOfPayment" id="x<?= $Page->RowIndex ?>_modeOfPayment" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->modeOfPayment->getPlaceHolder()) ?>" value="<?= $Page->modeOfPayment->EditValue ?>"<?= $Page->modeOfPayment->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->modeOfPayment->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_modeOfPayment" data-hidden="1" name="o<?= $Page->RowIndex ?>_modeOfPayment" id="o<?= $Page->RowIndex ?>_modeOfPayment" value="<?= HtmlEncode($Page->modeOfPayment->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_modeOfPayment"><span id="el<?= $Page->RowCount ?>_patient_services_modeOfPayment" class="form-group">
<input type="<?= $Page->modeOfPayment->getInputTextType() ?>" data-table="patient_services" data-field="x_modeOfPayment" name="x<?= $Page->RowIndex ?>_modeOfPayment" id="x<?= $Page->RowIndex ?>_modeOfPayment" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->modeOfPayment->getPlaceHolder()) ?>" value="<?= $Page->modeOfPayment->EditValue ?>"<?= $Page->modeOfPayment->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->modeOfPayment->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_modeOfPayment"><span id="el<?= $Page->RowCount ?>_patient_services_modeOfPayment">
<span<?= $Page->modeOfPayment->viewAttributes() ?>>
<?= $Page->modeOfPayment->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_services" data-field="x_HospID" data-hidden="1" name="o<?= $Page->RowIndex ?>_HospID" id="o<?= $Page->RowIndex ?>_HospID" value="<?= HtmlEncode($Page->HospID->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_HospID"><span id="el<?= $Page->RowCount ?>_patient_services_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->RIDNO->Visible) { // RIDNO ?>
        <td data-name="RIDNO" <?= $Page->RIDNO->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_RIDNO"><span id="el<?= $Page->RowCount ?>_patient_services_RIDNO" class="form-group">
<input type="<?= $Page->RIDNO->getInputTextType() ?>" data-table="patient_services" data-field="x_RIDNO" name="x<?= $Page->RowIndex ?>_RIDNO" id="x<?= $Page->RowIndex ?>_RIDNO" size="30" placeholder="<?= HtmlEncode($Page->RIDNO->getPlaceHolder()) ?>" value="<?= $Page->RIDNO->EditValue ?>"<?= $Page->RIDNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RIDNO->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_RIDNO" data-hidden="1" name="o<?= $Page->RowIndex ?>_RIDNO" id="o<?= $Page->RowIndex ?>_RIDNO" value="<?= HtmlEncode($Page->RIDNO->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_RIDNO"><span id="el<?= $Page->RowCount ?>_patient_services_RIDNO" class="form-group">
<span<?= $Page->RIDNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->RIDNO->getDisplayValue($Page->RIDNO->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_RIDNO" data-hidden="1" name="x<?= $Page->RowIndex ?>_RIDNO" id="x<?= $Page->RowIndex ?>_RIDNO" value="<?= HtmlEncode($Page->RIDNO->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_RIDNO"><span id="el<?= $Page->RowCount ?>_patient_services_RIDNO">
<span<?= $Page->RIDNO->viewAttributes() ?>>
<?= $Page->RIDNO->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->TidNo->Visible) { // TidNo ?>
        <td data-name="TidNo" <?= $Page->TidNo->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_TidNo"><span id="el<?= $Page->RowCount ?>_patient_services_TidNo" class="form-group">
<input type="<?= $Page->TidNo->getInputTextType() ?>" data-table="patient_services" data-field="x_TidNo" name="x<?= $Page->RowIndex ?>_TidNo" id="x<?= $Page->RowIndex ?>_TidNo" size="30" placeholder="<?= HtmlEncode($Page->TidNo->getPlaceHolder()) ?>" value="<?= $Page->TidNo->EditValue ?>"<?= $Page->TidNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TidNo->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_TidNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_TidNo" id="o<?= $Page->RowIndex ?>_TidNo" value="<?= HtmlEncode($Page->TidNo->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_TidNo"><span id="el<?= $Page->RowCount ?>_patient_services_TidNo" class="form-group">
<span<?= $Page->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->TidNo->getDisplayValue($Page->TidNo->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_TidNo" data-hidden="1" name="x<?= $Page->RowIndex ?>_TidNo" id="x<?= $Page->RowIndex ?>_TidNo" value="<?= HtmlEncode($Page->TidNo->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_TidNo"><span id="el<?= $Page->RowCount ?>_patient_services_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->DiscountCategory->Visible) { // DiscountCategory ?>
        <td data-name="DiscountCategory" <?= $Page->DiscountCategory->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_DiscountCategory"><span id="el<?= $Page->RowCount ?>_patient_services_DiscountCategory" class="form-group">
<input type="<?= $Page->DiscountCategory->getInputTextType() ?>" data-table="patient_services" data-field="x_DiscountCategory" name="x<?= $Page->RowIndex ?>_DiscountCategory" id="x<?= $Page->RowIndex ?>_DiscountCategory" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DiscountCategory->getPlaceHolder()) ?>" value="<?= $Page->DiscountCategory->EditValue ?>"<?= $Page->DiscountCategory->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DiscountCategory->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_DiscountCategory" data-hidden="1" name="o<?= $Page->RowIndex ?>_DiscountCategory" id="o<?= $Page->RowIndex ?>_DiscountCategory" value="<?= HtmlEncode($Page->DiscountCategory->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_DiscountCategory"><span id="el<?= $Page->RowCount ?>_patient_services_DiscountCategory" class="form-group">
<input type="<?= $Page->DiscountCategory->getInputTextType() ?>" data-table="patient_services" data-field="x_DiscountCategory" name="x<?= $Page->RowIndex ?>_DiscountCategory" id="x<?= $Page->RowIndex ?>_DiscountCategory" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DiscountCategory->getPlaceHolder()) ?>" value="<?= $Page->DiscountCategory->EditValue ?>"<?= $Page->DiscountCategory->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DiscountCategory->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_DiscountCategory"><span id="el<?= $Page->RowCount ?>_patient_services_DiscountCategory">
<span<?= $Page->DiscountCategory->viewAttributes() ?>>
<?= $Page->DiscountCategory->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->sid->Visible) { // sid ?>
        <td data-name="sid" <?= $Page->sid->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_sid"><span id="el<?= $Page->RowCount ?>_patient_services_sid" class="form-group">
<input type="<?= $Page->sid->getInputTextType() ?>" data-table="patient_services" data-field="x_sid" name="x<?= $Page->RowIndex ?>_sid" id="x<?= $Page->RowIndex ?>_sid" size="8" maxlength="8" placeholder="<?= HtmlEncode($Page->sid->getPlaceHolder()) ?>" value="<?= $Page->sid->EditValue ?>"<?= $Page->sid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->sid->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_sid" data-hidden="1" name="o<?= $Page->RowIndex ?>_sid" id="o<?= $Page->RowIndex ?>_sid" value="<?= HtmlEncode($Page->sid->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_sid"><span id="el<?= $Page->RowCount ?>_patient_services_sid" class="form-group">
<input type="<?= $Page->sid->getInputTextType() ?>" data-table="patient_services" data-field="x_sid" name="x<?= $Page->RowIndex ?>_sid" id="x<?= $Page->RowIndex ?>_sid" size="8" maxlength="8" placeholder="<?= HtmlEncode($Page->sid->getPlaceHolder()) ?>" value="<?= $Page->sid->EditValue ?>"<?= $Page->sid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->sid->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_sid"><span id="el<?= $Page->RowCount ?>_patient_services_sid">
<span<?= $Page->sid->viewAttributes() ?>>
<?= $Page->sid->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->ItemCode->Visible) { // ItemCode ?>
        <td data-name="ItemCode" <?= $Page->ItemCode->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_ItemCode"><span id="el<?= $Page->RowCount ?>_patient_services_ItemCode" class="form-group">
<input type="<?= $Page->ItemCode->getInputTextType() ?>" data-table="patient_services" data-field="x_ItemCode" name="x<?= $Page->RowIndex ?>_ItemCode" id="x<?= $Page->RowIndex ?>_ItemCode" size="8" maxlength="8" placeholder="<?= HtmlEncode($Page->ItemCode->getPlaceHolder()) ?>" value="<?= $Page->ItemCode->EditValue ?>"<?= $Page->ItemCode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ItemCode->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_ItemCode" data-hidden="1" name="o<?= $Page->RowIndex ?>_ItemCode" id="o<?= $Page->RowIndex ?>_ItemCode" value="<?= HtmlEncode($Page->ItemCode->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_ItemCode"><span id="el<?= $Page->RowCount ?>_patient_services_ItemCode" class="form-group">
<input type="<?= $Page->ItemCode->getInputTextType() ?>" data-table="patient_services" data-field="x_ItemCode" name="x<?= $Page->RowIndex ?>_ItemCode" id="x<?= $Page->RowIndex ?>_ItemCode" size="8" maxlength="8" placeholder="<?= HtmlEncode($Page->ItemCode->getPlaceHolder()) ?>" value="<?= $Page->ItemCode->EditValue ?>"<?= $Page->ItemCode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ItemCode->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_ItemCode"><span id="el<?= $Page->RowCount ?>_patient_services_ItemCode">
<span<?= $Page->ItemCode->viewAttributes() ?>>
<?= $Page->ItemCode->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->TestSubCd->Visible) { // TestSubCd ?>
        <td data-name="TestSubCd" <?= $Page->TestSubCd->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_TestSubCd"><span id="el<?= $Page->RowCount ?>_patient_services_TestSubCd" class="form-group">
<input type="<?= $Page->TestSubCd->getInputTextType() ?>" data-table="patient_services" data-field="x_TestSubCd" name="x<?= $Page->RowIndex ?>_TestSubCd" id="x<?= $Page->RowIndex ?>_TestSubCd" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TestSubCd->getPlaceHolder()) ?>" value="<?= $Page->TestSubCd->EditValue ?>"<?= $Page->TestSubCd->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TestSubCd->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_TestSubCd" data-hidden="1" name="o<?= $Page->RowIndex ?>_TestSubCd" id="o<?= $Page->RowIndex ?>_TestSubCd" value="<?= HtmlEncode($Page->TestSubCd->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_TestSubCd"><span id="el<?= $Page->RowCount ?>_patient_services_TestSubCd" class="form-group">
<input type="<?= $Page->TestSubCd->getInputTextType() ?>" data-table="patient_services" data-field="x_TestSubCd" name="x<?= $Page->RowIndex ?>_TestSubCd" id="x<?= $Page->RowIndex ?>_TestSubCd" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TestSubCd->getPlaceHolder()) ?>" value="<?= $Page->TestSubCd->EditValue ?>"<?= $Page->TestSubCd->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TestSubCd->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_TestSubCd"><span id="el<?= $Page->RowCount ?>_patient_services_TestSubCd">
<span<?= $Page->TestSubCd->viewAttributes() ?>>
<?= $Page->TestSubCd->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->DEptCd->Visible) { // DEptCd ?>
        <td data-name="DEptCd" <?= $Page->DEptCd->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_DEptCd"><span id="el<?= $Page->RowCount ?>_patient_services_DEptCd" class="form-group">
<input type="<?= $Page->DEptCd->getInputTextType() ?>" data-table="patient_services" data-field="x_DEptCd" name="x<?= $Page->RowIndex ?>_DEptCd" id="x<?= $Page->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DEptCd->getPlaceHolder()) ?>" value="<?= $Page->DEptCd->EditValue ?>"<?= $Page->DEptCd->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DEptCd->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_DEptCd" data-hidden="1" name="o<?= $Page->RowIndex ?>_DEptCd" id="o<?= $Page->RowIndex ?>_DEptCd" value="<?= HtmlEncode($Page->DEptCd->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_DEptCd"><span id="el<?= $Page->RowCount ?>_patient_services_DEptCd" class="form-group">
<input type="<?= $Page->DEptCd->getInputTextType() ?>" data-table="patient_services" data-field="x_DEptCd" name="x<?= $Page->RowIndex ?>_DEptCd" id="x<?= $Page->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DEptCd->getPlaceHolder()) ?>" value="<?= $Page->DEptCd->EditValue ?>"<?= $Page->DEptCd->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DEptCd->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_DEptCd"><span id="el<?= $Page->RowCount ?>_patient_services_DEptCd">
<span<?= $Page->DEptCd->viewAttributes() ?>>
<?= $Page->DEptCd->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->ProfCd->Visible) { // ProfCd ?>
        <td data-name="ProfCd" <?= $Page->ProfCd->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_ProfCd"><span id="el<?= $Page->RowCount ?>_patient_services_ProfCd" class="form-group">
<input type="<?= $Page->ProfCd->getInputTextType() ?>" data-table="patient_services" data-field="x_ProfCd" name="x<?= $Page->RowIndex ?>_ProfCd" id="x<?= $Page->RowIndex ?>_ProfCd" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ProfCd->getPlaceHolder()) ?>" value="<?= $Page->ProfCd->EditValue ?>"<?= $Page->ProfCd->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ProfCd->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_ProfCd" data-hidden="1" name="o<?= $Page->RowIndex ?>_ProfCd" id="o<?= $Page->RowIndex ?>_ProfCd" value="<?= HtmlEncode($Page->ProfCd->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_ProfCd"><span id="el<?= $Page->RowCount ?>_patient_services_ProfCd" class="form-group">
<input type="<?= $Page->ProfCd->getInputTextType() ?>" data-table="patient_services" data-field="x_ProfCd" name="x<?= $Page->RowIndex ?>_ProfCd" id="x<?= $Page->RowIndex ?>_ProfCd" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ProfCd->getPlaceHolder()) ?>" value="<?= $Page->ProfCd->EditValue ?>"<?= $Page->ProfCd->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ProfCd->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_ProfCd"><span id="el<?= $Page->RowCount ?>_patient_services_ProfCd">
<span<?= $Page->ProfCd->viewAttributes() ?>>
<?= $Page->ProfCd->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Comments->Visible) { // Comments ?>
        <td data-name="Comments" <?= $Page->Comments->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Comments"><span id="el<?= $Page->RowCount ?>_patient_services_Comments" class="form-group">
<input type="<?= $Page->Comments->getInputTextType() ?>" data-table="patient_services" data-field="x_Comments" name="x<?= $Page->RowIndex ?>_Comments" id="x<?= $Page->RowIndex ?>_Comments" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Comments->getPlaceHolder()) ?>" value="<?= $Page->Comments->EditValue ?>"<?= $Page->Comments->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Comments->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_Comments" data-hidden="1" name="o<?= $Page->RowIndex ?>_Comments" id="o<?= $Page->RowIndex ?>_Comments" value="<?= HtmlEncode($Page->Comments->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Comments"><span id="el<?= $Page->RowCount ?>_patient_services_Comments" class="form-group">
<input type="<?= $Page->Comments->getInputTextType() ?>" data-table="patient_services" data-field="x_Comments" name="x<?= $Page->RowIndex ?>_Comments" id="x<?= $Page->RowIndex ?>_Comments" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Comments->getPlaceHolder()) ?>" value="<?= $Page->Comments->EditValue ?>"<?= $Page->Comments->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Comments->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Comments"><span id="el<?= $Page->RowCount ?>_patient_services_Comments">
<span<?= $Page->Comments->viewAttributes() ?>>
<?= $Page->Comments->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Method->Visible) { // Method ?>
        <td data-name="Method" <?= $Page->Method->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Method"><span id="el<?= $Page->RowCount ?>_patient_services_Method" class="form-group">
<input type="<?= $Page->Method->getInputTextType() ?>" data-table="patient_services" data-field="x_Method" name="x<?= $Page->RowIndex ?>_Method" id="x<?= $Page->RowIndex ?>_Method" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Method->getPlaceHolder()) ?>" value="<?= $Page->Method->EditValue ?>"<?= $Page->Method->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Method->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_Method" data-hidden="1" name="o<?= $Page->RowIndex ?>_Method" id="o<?= $Page->RowIndex ?>_Method" value="<?= HtmlEncode($Page->Method->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Method"><span id="el<?= $Page->RowCount ?>_patient_services_Method" class="form-group">
<input type="<?= $Page->Method->getInputTextType() ?>" data-table="patient_services" data-field="x_Method" name="x<?= $Page->RowIndex ?>_Method" id="x<?= $Page->RowIndex ?>_Method" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Method->getPlaceHolder()) ?>" value="<?= $Page->Method->EditValue ?>"<?= $Page->Method->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Method->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Method"><span id="el<?= $Page->RowCount ?>_patient_services_Method">
<span<?= $Page->Method->viewAttributes() ?>>
<?= $Page->Method->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Specimen->Visible) { // Specimen ?>
        <td data-name="Specimen" <?= $Page->Specimen->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Specimen"><span id="el<?= $Page->RowCount ?>_patient_services_Specimen" class="form-group">
<input type="<?= $Page->Specimen->getInputTextType() ?>" data-table="patient_services" data-field="x_Specimen" name="x<?= $Page->RowIndex ?>_Specimen" id="x<?= $Page->RowIndex ?>_Specimen" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Specimen->getPlaceHolder()) ?>" value="<?= $Page->Specimen->EditValue ?>"<?= $Page->Specimen->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Specimen->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_Specimen" data-hidden="1" name="o<?= $Page->RowIndex ?>_Specimen" id="o<?= $Page->RowIndex ?>_Specimen" value="<?= HtmlEncode($Page->Specimen->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Specimen"><span id="el<?= $Page->RowCount ?>_patient_services_Specimen" class="form-group">
<input type="<?= $Page->Specimen->getInputTextType() ?>" data-table="patient_services" data-field="x_Specimen" name="x<?= $Page->RowIndex ?>_Specimen" id="x<?= $Page->RowIndex ?>_Specimen" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Specimen->getPlaceHolder()) ?>" value="<?= $Page->Specimen->EditValue ?>"<?= $Page->Specimen->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Specimen->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Specimen"><span id="el<?= $Page->RowCount ?>_patient_services_Specimen">
<span<?= $Page->Specimen->viewAttributes() ?>>
<?= $Page->Specimen->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Abnormal->Visible) { // Abnormal ?>
        <td data-name="Abnormal" <?= $Page->Abnormal->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Abnormal"><span id="el<?= $Page->RowCount ?>_patient_services_Abnormal" class="form-group">
<input type="<?= $Page->Abnormal->getInputTextType() ?>" data-table="patient_services" data-field="x_Abnormal" name="x<?= $Page->RowIndex ?>_Abnormal" id="x<?= $Page->RowIndex ?>_Abnormal" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Abnormal->getPlaceHolder()) ?>" value="<?= $Page->Abnormal->EditValue ?>"<?= $Page->Abnormal->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Abnormal->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_Abnormal" data-hidden="1" name="o<?= $Page->RowIndex ?>_Abnormal" id="o<?= $Page->RowIndex ?>_Abnormal" value="<?= HtmlEncode($Page->Abnormal->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Abnormal"><span id="el<?= $Page->RowCount ?>_patient_services_Abnormal" class="form-group">
<input type="<?= $Page->Abnormal->getInputTextType() ?>" data-table="patient_services" data-field="x_Abnormal" name="x<?= $Page->RowIndex ?>_Abnormal" id="x<?= $Page->RowIndex ?>_Abnormal" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Abnormal->getPlaceHolder()) ?>" value="<?= $Page->Abnormal->EditValue ?>"<?= $Page->Abnormal->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Abnormal->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Abnormal"><span id="el<?= $Page->RowCount ?>_patient_services_Abnormal">
<span<?= $Page->Abnormal->viewAttributes() ?>>
<?= $Page->Abnormal->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->TestUnit->Visible) { // TestUnit ?>
        <td data-name="TestUnit" <?= $Page->TestUnit->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_TestUnit"><span id="el<?= $Page->RowCount ?>_patient_services_TestUnit" class="form-group">
<input type="<?= $Page->TestUnit->getInputTextType() ?>" data-table="patient_services" data-field="x_TestUnit" name="x<?= $Page->RowIndex ?>_TestUnit" id="x<?= $Page->RowIndex ?>_TestUnit" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TestUnit->getPlaceHolder()) ?>" value="<?= $Page->TestUnit->EditValue ?>"<?= $Page->TestUnit->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TestUnit->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_TestUnit" data-hidden="1" name="o<?= $Page->RowIndex ?>_TestUnit" id="o<?= $Page->RowIndex ?>_TestUnit" value="<?= HtmlEncode($Page->TestUnit->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_TestUnit"><span id="el<?= $Page->RowCount ?>_patient_services_TestUnit" class="form-group">
<input type="<?= $Page->TestUnit->getInputTextType() ?>" data-table="patient_services" data-field="x_TestUnit" name="x<?= $Page->RowIndex ?>_TestUnit" id="x<?= $Page->RowIndex ?>_TestUnit" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TestUnit->getPlaceHolder()) ?>" value="<?= $Page->TestUnit->EditValue ?>"<?= $Page->TestUnit->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TestUnit->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_TestUnit"><span id="el<?= $Page->RowCount ?>_patient_services_TestUnit">
<span<?= $Page->TestUnit->viewAttributes() ?>>
<?= $Page->TestUnit->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->LOWHIGH->Visible) { // LOWHIGH ?>
        <td data-name="LOWHIGH" <?= $Page->LOWHIGH->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_LOWHIGH"><span id="el<?= $Page->RowCount ?>_patient_services_LOWHIGH" class="form-group">
<input type="<?= $Page->LOWHIGH->getInputTextType() ?>" data-table="patient_services" data-field="x_LOWHIGH" name="x<?= $Page->RowIndex ?>_LOWHIGH" id="x<?= $Page->RowIndex ?>_LOWHIGH" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->LOWHIGH->getPlaceHolder()) ?>" value="<?= $Page->LOWHIGH->EditValue ?>"<?= $Page->LOWHIGH->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->LOWHIGH->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_LOWHIGH" data-hidden="1" name="o<?= $Page->RowIndex ?>_LOWHIGH" id="o<?= $Page->RowIndex ?>_LOWHIGH" value="<?= HtmlEncode($Page->LOWHIGH->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_LOWHIGH"><span id="el<?= $Page->RowCount ?>_patient_services_LOWHIGH" class="form-group">
<input type="<?= $Page->LOWHIGH->getInputTextType() ?>" data-table="patient_services" data-field="x_LOWHIGH" name="x<?= $Page->RowIndex ?>_LOWHIGH" id="x<?= $Page->RowIndex ?>_LOWHIGH" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->LOWHIGH->getPlaceHolder()) ?>" value="<?= $Page->LOWHIGH->EditValue ?>"<?= $Page->LOWHIGH->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->LOWHIGH->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_LOWHIGH"><span id="el<?= $Page->RowCount ?>_patient_services_LOWHIGH">
<span<?= $Page->LOWHIGH->viewAttributes() ?>>
<?= $Page->LOWHIGH->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Branch->Visible) { // Branch ?>
        <td data-name="Branch" <?= $Page->Branch->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Branch"><span id="el<?= $Page->RowCount ?>_patient_services_Branch" class="form-group">
<input type="<?= $Page->Branch->getInputTextType() ?>" data-table="patient_services" data-field="x_Branch" name="x<?= $Page->RowIndex ?>_Branch" id="x<?= $Page->RowIndex ?>_Branch" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Branch->getPlaceHolder()) ?>" value="<?= $Page->Branch->EditValue ?>"<?= $Page->Branch->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Branch->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_Branch" data-hidden="1" name="o<?= $Page->RowIndex ?>_Branch" id="o<?= $Page->RowIndex ?>_Branch" value="<?= HtmlEncode($Page->Branch->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Branch"><span id="el<?= $Page->RowCount ?>_patient_services_Branch" class="form-group">
<input type="<?= $Page->Branch->getInputTextType() ?>" data-table="patient_services" data-field="x_Branch" name="x<?= $Page->RowIndex ?>_Branch" id="x<?= $Page->RowIndex ?>_Branch" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Branch->getPlaceHolder()) ?>" value="<?= $Page->Branch->EditValue ?>"<?= $Page->Branch->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Branch->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Branch"><span id="el<?= $Page->RowCount ?>_patient_services_Branch">
<span<?= $Page->Branch->viewAttributes() ?>>
<?= $Page->Branch->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Dispatch->Visible) { // Dispatch ?>
        <td data-name="Dispatch" <?= $Page->Dispatch->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Dispatch"><span id="el<?= $Page->RowCount ?>_patient_services_Dispatch" class="form-group">
<input type="<?= $Page->Dispatch->getInputTextType() ?>" data-table="patient_services" data-field="x_Dispatch" name="x<?= $Page->RowIndex ?>_Dispatch" id="x<?= $Page->RowIndex ?>_Dispatch" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Dispatch->getPlaceHolder()) ?>" value="<?= $Page->Dispatch->EditValue ?>"<?= $Page->Dispatch->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Dispatch->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_Dispatch" data-hidden="1" name="o<?= $Page->RowIndex ?>_Dispatch" id="o<?= $Page->RowIndex ?>_Dispatch" value="<?= HtmlEncode($Page->Dispatch->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Dispatch"><span id="el<?= $Page->RowCount ?>_patient_services_Dispatch" class="form-group">
<input type="<?= $Page->Dispatch->getInputTextType() ?>" data-table="patient_services" data-field="x_Dispatch" name="x<?= $Page->RowIndex ?>_Dispatch" id="x<?= $Page->RowIndex ?>_Dispatch" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Dispatch->getPlaceHolder()) ?>" value="<?= $Page->Dispatch->EditValue ?>"<?= $Page->Dispatch->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Dispatch->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Dispatch"><span id="el<?= $Page->RowCount ?>_patient_services_Dispatch">
<span<?= $Page->Dispatch->viewAttributes() ?>>
<?= $Page->Dispatch->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Pic1->Visible) { // Pic1 ?>
        <td data-name="Pic1" <?= $Page->Pic1->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Pic1"><span id="el<?= $Page->RowCount ?>_patient_services_Pic1" class="form-group">
<input type="<?= $Page->Pic1->getInputTextType() ?>" data-table="patient_services" data-field="x_Pic1" name="x<?= $Page->RowIndex ?>_Pic1" id="x<?= $Page->RowIndex ?>_Pic1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Pic1->getPlaceHolder()) ?>" value="<?= $Page->Pic1->EditValue ?>"<?= $Page->Pic1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Pic1->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_Pic1" data-hidden="1" name="o<?= $Page->RowIndex ?>_Pic1" id="o<?= $Page->RowIndex ?>_Pic1" value="<?= HtmlEncode($Page->Pic1->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Pic1"><span id="el<?= $Page->RowCount ?>_patient_services_Pic1" class="form-group">
<input type="<?= $Page->Pic1->getInputTextType() ?>" data-table="patient_services" data-field="x_Pic1" name="x<?= $Page->RowIndex ?>_Pic1" id="x<?= $Page->RowIndex ?>_Pic1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Pic1->getPlaceHolder()) ?>" value="<?= $Page->Pic1->EditValue ?>"<?= $Page->Pic1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Pic1->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Pic1"><span id="el<?= $Page->RowCount ?>_patient_services_Pic1">
<span<?= $Page->Pic1->viewAttributes() ?>>
<?= $Page->Pic1->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Pic2->Visible) { // Pic2 ?>
        <td data-name="Pic2" <?= $Page->Pic2->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Pic2"><span id="el<?= $Page->RowCount ?>_patient_services_Pic2" class="form-group">
<input type="<?= $Page->Pic2->getInputTextType() ?>" data-table="patient_services" data-field="x_Pic2" name="x<?= $Page->RowIndex ?>_Pic2" id="x<?= $Page->RowIndex ?>_Pic2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Pic2->getPlaceHolder()) ?>" value="<?= $Page->Pic2->EditValue ?>"<?= $Page->Pic2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Pic2->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_Pic2" data-hidden="1" name="o<?= $Page->RowIndex ?>_Pic2" id="o<?= $Page->RowIndex ?>_Pic2" value="<?= HtmlEncode($Page->Pic2->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Pic2"><span id="el<?= $Page->RowCount ?>_patient_services_Pic2" class="form-group">
<input type="<?= $Page->Pic2->getInputTextType() ?>" data-table="patient_services" data-field="x_Pic2" name="x<?= $Page->RowIndex ?>_Pic2" id="x<?= $Page->RowIndex ?>_Pic2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Pic2->getPlaceHolder()) ?>" value="<?= $Page->Pic2->EditValue ?>"<?= $Page->Pic2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Pic2->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Pic2"><span id="el<?= $Page->RowCount ?>_patient_services_Pic2">
<span<?= $Page->Pic2->viewAttributes() ?>>
<?= $Page->Pic2->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->GraphPath->Visible) { // GraphPath ?>
        <td data-name="GraphPath" <?= $Page->GraphPath->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_GraphPath"><span id="el<?= $Page->RowCount ?>_patient_services_GraphPath" class="form-group">
<input type="<?= $Page->GraphPath->getInputTextType() ?>" data-table="patient_services" data-field="x_GraphPath" name="x<?= $Page->RowIndex ?>_GraphPath" id="x<?= $Page->RowIndex ?>_GraphPath" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->GraphPath->getPlaceHolder()) ?>" value="<?= $Page->GraphPath->EditValue ?>"<?= $Page->GraphPath->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->GraphPath->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_GraphPath" data-hidden="1" name="o<?= $Page->RowIndex ?>_GraphPath" id="o<?= $Page->RowIndex ?>_GraphPath" value="<?= HtmlEncode($Page->GraphPath->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_GraphPath"><span id="el<?= $Page->RowCount ?>_patient_services_GraphPath" class="form-group">
<input type="<?= $Page->GraphPath->getInputTextType() ?>" data-table="patient_services" data-field="x_GraphPath" name="x<?= $Page->RowIndex ?>_GraphPath" id="x<?= $Page->RowIndex ?>_GraphPath" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->GraphPath->getPlaceHolder()) ?>" value="<?= $Page->GraphPath->EditValue ?>"<?= $Page->GraphPath->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->GraphPath->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_GraphPath"><span id="el<?= $Page->RowCount ?>_patient_services_GraphPath">
<span<?= $Page->GraphPath->viewAttributes() ?>>
<?= $Page->GraphPath->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->MachineCD->Visible) { // MachineCD ?>
        <td data-name="MachineCD" <?= $Page->MachineCD->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_MachineCD"><span id="el<?= $Page->RowCount ?>_patient_services_MachineCD" class="form-group">
<input type="<?= $Page->MachineCD->getInputTextType() ?>" data-table="patient_services" data-field="x_MachineCD" name="x<?= $Page->RowIndex ?>_MachineCD" id="x<?= $Page->RowIndex ?>_MachineCD" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MachineCD->getPlaceHolder()) ?>" value="<?= $Page->MachineCD->EditValue ?>"<?= $Page->MachineCD->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->MachineCD->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_MachineCD" data-hidden="1" name="o<?= $Page->RowIndex ?>_MachineCD" id="o<?= $Page->RowIndex ?>_MachineCD" value="<?= HtmlEncode($Page->MachineCD->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_MachineCD"><span id="el<?= $Page->RowCount ?>_patient_services_MachineCD" class="form-group">
<input type="<?= $Page->MachineCD->getInputTextType() ?>" data-table="patient_services" data-field="x_MachineCD" name="x<?= $Page->RowIndex ?>_MachineCD" id="x<?= $Page->RowIndex ?>_MachineCD" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MachineCD->getPlaceHolder()) ?>" value="<?= $Page->MachineCD->EditValue ?>"<?= $Page->MachineCD->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->MachineCD->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_MachineCD"><span id="el<?= $Page->RowCount ?>_patient_services_MachineCD">
<span<?= $Page->MachineCD->viewAttributes() ?>>
<?= $Page->MachineCD->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->TestCancel->Visible) { // TestCancel ?>
        <td data-name="TestCancel" <?= $Page->TestCancel->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_TestCancel"><span id="el<?= $Page->RowCount ?>_patient_services_TestCancel" class="form-group">
<input type="<?= $Page->TestCancel->getInputTextType() ?>" data-table="patient_services" data-field="x_TestCancel" name="x<?= $Page->RowIndex ?>_TestCancel" id="x<?= $Page->RowIndex ?>_TestCancel" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TestCancel->getPlaceHolder()) ?>" value="<?= $Page->TestCancel->EditValue ?>"<?= $Page->TestCancel->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TestCancel->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_TestCancel" data-hidden="1" name="o<?= $Page->RowIndex ?>_TestCancel" id="o<?= $Page->RowIndex ?>_TestCancel" value="<?= HtmlEncode($Page->TestCancel->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_TestCancel"><span id="el<?= $Page->RowCount ?>_patient_services_TestCancel" class="form-group">
<input type="<?= $Page->TestCancel->getInputTextType() ?>" data-table="patient_services" data-field="x_TestCancel" name="x<?= $Page->RowIndex ?>_TestCancel" id="x<?= $Page->RowIndex ?>_TestCancel" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TestCancel->getPlaceHolder()) ?>" value="<?= $Page->TestCancel->EditValue ?>"<?= $Page->TestCancel->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TestCancel->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_TestCancel"><span id="el<?= $Page->RowCount ?>_patient_services_TestCancel">
<span<?= $Page->TestCancel->viewAttributes() ?>>
<?= $Page->TestCancel->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->OutSource->Visible) { // OutSource ?>
        <td data-name="OutSource" <?= $Page->OutSource->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_OutSource"><span id="el<?= $Page->RowCount ?>_patient_services_OutSource" class="form-group">
<input type="<?= $Page->OutSource->getInputTextType() ?>" data-table="patient_services" data-field="x_OutSource" name="x<?= $Page->RowIndex ?>_OutSource" id="x<?= $Page->RowIndex ?>_OutSource" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->OutSource->getPlaceHolder()) ?>" value="<?= $Page->OutSource->EditValue ?>"<?= $Page->OutSource->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->OutSource->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_OutSource" data-hidden="1" name="o<?= $Page->RowIndex ?>_OutSource" id="o<?= $Page->RowIndex ?>_OutSource" value="<?= HtmlEncode($Page->OutSource->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_OutSource"><span id="el<?= $Page->RowCount ?>_patient_services_OutSource" class="form-group">
<input type="<?= $Page->OutSource->getInputTextType() ?>" data-table="patient_services" data-field="x_OutSource" name="x<?= $Page->RowIndex ?>_OutSource" id="x<?= $Page->RowIndex ?>_OutSource" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->OutSource->getPlaceHolder()) ?>" value="<?= $Page->OutSource->EditValue ?>"<?= $Page->OutSource->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->OutSource->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_OutSource"><span id="el<?= $Page->RowCount ?>_patient_services_OutSource">
<span<?= $Page->OutSource->viewAttributes() ?>>
<?= $Page->OutSource->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Printed->Visible) { // Printed ?>
        <td data-name="Printed" <?= $Page->Printed->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Printed"><span id="el<?= $Page->RowCount ?>_patient_services_Printed" class="form-group">
<input type="<?= $Page->Printed->getInputTextType() ?>" data-table="patient_services" data-field="x_Printed" name="x<?= $Page->RowIndex ?>_Printed" id="x<?= $Page->RowIndex ?>_Printed" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Printed->getPlaceHolder()) ?>" value="<?= $Page->Printed->EditValue ?>"<?= $Page->Printed->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Printed->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_Printed" data-hidden="1" name="o<?= $Page->RowIndex ?>_Printed" id="o<?= $Page->RowIndex ?>_Printed" value="<?= HtmlEncode($Page->Printed->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Printed"><span id="el<?= $Page->RowCount ?>_patient_services_Printed" class="form-group">
<input type="<?= $Page->Printed->getInputTextType() ?>" data-table="patient_services" data-field="x_Printed" name="x<?= $Page->RowIndex ?>_Printed" id="x<?= $Page->RowIndex ?>_Printed" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Printed->getPlaceHolder()) ?>" value="<?= $Page->Printed->EditValue ?>"<?= $Page->Printed->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Printed->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Printed"><span id="el<?= $Page->RowCount ?>_patient_services_Printed">
<span<?= $Page->Printed->viewAttributes() ?>>
<?= $Page->Printed->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->PrintBy->Visible) { // PrintBy ?>
        <td data-name="PrintBy" <?= $Page->PrintBy->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_PrintBy"><span id="el<?= $Page->RowCount ?>_patient_services_PrintBy" class="form-group">
<input type="<?= $Page->PrintBy->getInputTextType() ?>" data-table="patient_services" data-field="x_PrintBy" name="x<?= $Page->RowIndex ?>_PrintBy" id="x<?= $Page->RowIndex ?>_PrintBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PrintBy->getPlaceHolder()) ?>" value="<?= $Page->PrintBy->EditValue ?>"<?= $Page->PrintBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PrintBy->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_PrintBy" data-hidden="1" name="o<?= $Page->RowIndex ?>_PrintBy" id="o<?= $Page->RowIndex ?>_PrintBy" value="<?= HtmlEncode($Page->PrintBy->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_PrintBy"><span id="el<?= $Page->RowCount ?>_patient_services_PrintBy" class="form-group">
<input type="<?= $Page->PrintBy->getInputTextType() ?>" data-table="patient_services" data-field="x_PrintBy" name="x<?= $Page->RowIndex ?>_PrintBy" id="x<?= $Page->RowIndex ?>_PrintBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PrintBy->getPlaceHolder()) ?>" value="<?= $Page->PrintBy->EditValue ?>"<?= $Page->PrintBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PrintBy->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_PrintBy"><span id="el<?= $Page->RowCount ?>_patient_services_PrintBy">
<span<?= $Page->PrintBy->viewAttributes() ?>>
<?= $Page->PrintBy->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->PrintDate->Visible) { // PrintDate ?>
        <td data-name="PrintDate" <?= $Page->PrintDate->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_PrintDate"><span id="el<?= $Page->RowCount ?>_patient_services_PrintDate" class="form-group">
<input type="<?= $Page->PrintDate->getInputTextType() ?>" data-table="patient_services" data-field="x_PrintDate" name="x<?= $Page->RowIndex ?>_PrintDate" id="x<?= $Page->RowIndex ?>_PrintDate" placeholder="<?= HtmlEncode($Page->PrintDate->getPlaceHolder()) ?>" value="<?= $Page->PrintDate->EditValue ?>"<?= $Page->PrintDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PrintDate->getErrorMessage() ?></div>
<?php if (!$Page->PrintDate->ReadOnly && !$Page->PrintDate->Disabled && !isset($Page->PrintDate->EditAttrs["readonly"]) && !isset($Page->PrintDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_serviceslist", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_serviceslist", "x<?= $Page->RowIndex ?>_PrintDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_PrintDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_PrintDate" id="o<?= $Page->RowIndex ?>_PrintDate" value="<?= HtmlEncode($Page->PrintDate->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_PrintDate"><span id="el<?= $Page->RowCount ?>_patient_services_PrintDate" class="form-group">
<input type="<?= $Page->PrintDate->getInputTextType() ?>" data-table="patient_services" data-field="x_PrintDate" name="x<?= $Page->RowIndex ?>_PrintDate" id="x<?= $Page->RowIndex ?>_PrintDate" placeholder="<?= HtmlEncode($Page->PrintDate->getPlaceHolder()) ?>" value="<?= $Page->PrintDate->EditValue ?>"<?= $Page->PrintDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PrintDate->getErrorMessage() ?></div>
<?php if (!$Page->PrintDate->ReadOnly && !$Page->PrintDate->Disabled && !isset($Page->PrintDate->EditAttrs["readonly"]) && !isset($Page->PrintDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_serviceslist", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_serviceslist", "x<?= $Page->RowIndex ?>_PrintDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_PrintDate"><span id="el<?= $Page->RowCount ?>_patient_services_PrintDate">
<span<?= $Page->PrintDate->viewAttributes() ?>>
<?= $Page->PrintDate->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->BillingDate->Visible) { // BillingDate ?>
        <td data-name="BillingDate" <?= $Page->BillingDate->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_BillingDate"><span id="el<?= $Page->RowCount ?>_patient_services_BillingDate" class="form-group">
<input type="<?= $Page->BillingDate->getInputTextType() ?>" data-table="patient_services" data-field="x_BillingDate" name="x<?= $Page->RowIndex ?>_BillingDate" id="x<?= $Page->RowIndex ?>_BillingDate" placeholder="<?= HtmlEncode($Page->BillingDate->getPlaceHolder()) ?>" value="<?= $Page->BillingDate->EditValue ?>"<?= $Page->BillingDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BillingDate->getErrorMessage() ?></div>
<?php if (!$Page->BillingDate->ReadOnly && !$Page->BillingDate->Disabled && !isset($Page->BillingDate->EditAttrs["readonly"]) && !isset($Page->BillingDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_serviceslist", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_serviceslist", "x<?= $Page->RowIndex ?>_BillingDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_BillingDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_BillingDate" id="o<?= $Page->RowIndex ?>_BillingDate" value="<?= HtmlEncode($Page->BillingDate->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_BillingDate"><span id="el<?= $Page->RowCount ?>_patient_services_BillingDate" class="form-group">
<input type="<?= $Page->BillingDate->getInputTextType() ?>" data-table="patient_services" data-field="x_BillingDate" name="x<?= $Page->RowIndex ?>_BillingDate" id="x<?= $Page->RowIndex ?>_BillingDate" placeholder="<?= HtmlEncode($Page->BillingDate->getPlaceHolder()) ?>" value="<?= $Page->BillingDate->EditValue ?>"<?= $Page->BillingDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BillingDate->getErrorMessage() ?></div>
<?php if (!$Page->BillingDate->ReadOnly && !$Page->BillingDate->Disabled && !isset($Page->BillingDate->EditAttrs["readonly"]) && !isset($Page->BillingDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_serviceslist", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_serviceslist", "x<?= $Page->RowIndex ?>_BillingDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_BillingDate"><span id="el<?= $Page->RowCount ?>_patient_services_BillingDate">
<span<?= $Page->BillingDate->viewAttributes() ?>>
<?= $Page->BillingDate->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->BilledBy->Visible) { // BilledBy ?>
        <td data-name="BilledBy" <?= $Page->BilledBy->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_BilledBy"><span id="el<?= $Page->RowCount ?>_patient_services_BilledBy" class="form-group">
<input type="<?= $Page->BilledBy->getInputTextType() ?>" data-table="patient_services" data-field="x_BilledBy" name="x<?= $Page->RowIndex ?>_BilledBy" id="x<?= $Page->RowIndex ?>_BilledBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BilledBy->getPlaceHolder()) ?>" value="<?= $Page->BilledBy->EditValue ?>"<?= $Page->BilledBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BilledBy->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_BilledBy" data-hidden="1" name="o<?= $Page->RowIndex ?>_BilledBy" id="o<?= $Page->RowIndex ?>_BilledBy" value="<?= HtmlEncode($Page->BilledBy->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_BilledBy"><span id="el<?= $Page->RowCount ?>_patient_services_BilledBy" class="form-group">
<input type="<?= $Page->BilledBy->getInputTextType() ?>" data-table="patient_services" data-field="x_BilledBy" name="x<?= $Page->RowIndex ?>_BilledBy" id="x<?= $Page->RowIndex ?>_BilledBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BilledBy->getPlaceHolder()) ?>" value="<?= $Page->BilledBy->EditValue ?>"<?= $Page->BilledBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BilledBy->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_BilledBy"><span id="el<?= $Page->RowCount ?>_patient_services_BilledBy">
<span<?= $Page->BilledBy->viewAttributes() ?>>
<?= $Page->BilledBy->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Resulted->Visible) { // Resulted ?>
        <td data-name="Resulted" <?= $Page->Resulted->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Resulted"><span id="el<?= $Page->RowCount ?>_patient_services_Resulted" class="form-group">
<input type="<?= $Page->Resulted->getInputTextType() ?>" data-table="patient_services" data-field="x_Resulted" name="x<?= $Page->RowIndex ?>_Resulted" id="x<?= $Page->RowIndex ?>_Resulted" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Resulted->getPlaceHolder()) ?>" value="<?= $Page->Resulted->EditValue ?>"<?= $Page->Resulted->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Resulted->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_Resulted" data-hidden="1" name="o<?= $Page->RowIndex ?>_Resulted" id="o<?= $Page->RowIndex ?>_Resulted" value="<?= HtmlEncode($Page->Resulted->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Resulted"><span id="el<?= $Page->RowCount ?>_patient_services_Resulted" class="form-group">
<input type="<?= $Page->Resulted->getInputTextType() ?>" data-table="patient_services" data-field="x_Resulted" name="x<?= $Page->RowIndex ?>_Resulted" id="x<?= $Page->RowIndex ?>_Resulted" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Resulted->getPlaceHolder()) ?>" value="<?= $Page->Resulted->EditValue ?>"<?= $Page->Resulted->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Resulted->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Resulted"><span id="el<?= $Page->RowCount ?>_patient_services_Resulted">
<span<?= $Page->Resulted->viewAttributes() ?>>
<?= $Page->Resulted->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->ResultDate->Visible) { // ResultDate ?>
        <td data-name="ResultDate" <?= $Page->ResultDate->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_ResultDate"><span id="el<?= $Page->RowCount ?>_patient_services_ResultDate" class="form-group">
<input type="<?= $Page->ResultDate->getInputTextType() ?>" data-table="patient_services" data-field="x_ResultDate" name="x<?= $Page->RowIndex ?>_ResultDate" id="x<?= $Page->RowIndex ?>_ResultDate" placeholder="<?= HtmlEncode($Page->ResultDate->getPlaceHolder()) ?>" value="<?= $Page->ResultDate->EditValue ?>"<?= $Page->ResultDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ResultDate->getErrorMessage() ?></div>
<?php if (!$Page->ResultDate->ReadOnly && !$Page->ResultDate->Disabled && !isset($Page->ResultDate->EditAttrs["readonly"]) && !isset($Page->ResultDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_serviceslist", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_serviceslist", "x<?= $Page->RowIndex ?>_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_ResultDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_ResultDate" id="o<?= $Page->RowIndex ?>_ResultDate" value="<?= HtmlEncode($Page->ResultDate->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_ResultDate"><span id="el<?= $Page->RowCount ?>_patient_services_ResultDate" class="form-group">
<input type="<?= $Page->ResultDate->getInputTextType() ?>" data-table="patient_services" data-field="x_ResultDate" name="x<?= $Page->RowIndex ?>_ResultDate" id="x<?= $Page->RowIndex ?>_ResultDate" placeholder="<?= HtmlEncode($Page->ResultDate->getPlaceHolder()) ?>" value="<?= $Page->ResultDate->EditValue ?>"<?= $Page->ResultDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ResultDate->getErrorMessage() ?></div>
<?php if (!$Page->ResultDate->ReadOnly && !$Page->ResultDate->Disabled && !isset($Page->ResultDate->EditAttrs["readonly"]) && !isset($Page->ResultDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_serviceslist", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_serviceslist", "x<?= $Page->RowIndex ?>_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_ResultDate"><span id="el<?= $Page->RowCount ?>_patient_services_ResultDate">
<span<?= $Page->ResultDate->viewAttributes() ?>>
<?= $Page->ResultDate->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->ResultedBy->Visible) { // ResultedBy ?>
        <td data-name="ResultedBy" <?= $Page->ResultedBy->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_ResultedBy"><span id="el<?= $Page->RowCount ?>_patient_services_ResultedBy" class="form-group">
<input type="<?= $Page->ResultedBy->getInputTextType() ?>" data-table="patient_services" data-field="x_ResultedBy" name="x<?= $Page->RowIndex ?>_ResultedBy" id="x<?= $Page->RowIndex ?>_ResultedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ResultedBy->getPlaceHolder()) ?>" value="<?= $Page->ResultedBy->EditValue ?>"<?= $Page->ResultedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ResultedBy->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_ResultedBy" data-hidden="1" name="o<?= $Page->RowIndex ?>_ResultedBy" id="o<?= $Page->RowIndex ?>_ResultedBy" value="<?= HtmlEncode($Page->ResultedBy->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_ResultedBy"><span id="el<?= $Page->RowCount ?>_patient_services_ResultedBy" class="form-group">
<input type="<?= $Page->ResultedBy->getInputTextType() ?>" data-table="patient_services" data-field="x_ResultedBy" name="x<?= $Page->RowIndex ?>_ResultedBy" id="x<?= $Page->RowIndex ?>_ResultedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ResultedBy->getPlaceHolder()) ?>" value="<?= $Page->ResultedBy->EditValue ?>"<?= $Page->ResultedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ResultedBy->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_ResultedBy"><span id="el<?= $Page->RowCount ?>_patient_services_ResultedBy">
<span<?= $Page->ResultedBy->viewAttributes() ?>>
<?= $Page->ResultedBy->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->SampleDate->Visible) { // SampleDate ?>
        <td data-name="SampleDate" <?= $Page->SampleDate->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_SampleDate"><span id="el<?= $Page->RowCount ?>_patient_services_SampleDate" class="form-group">
<input type="<?= $Page->SampleDate->getInputTextType() ?>" data-table="patient_services" data-field="x_SampleDate" name="x<?= $Page->RowIndex ?>_SampleDate" id="x<?= $Page->RowIndex ?>_SampleDate" placeholder="<?= HtmlEncode($Page->SampleDate->getPlaceHolder()) ?>" value="<?= $Page->SampleDate->EditValue ?>"<?= $Page->SampleDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SampleDate->getErrorMessage() ?></div>
<?php if (!$Page->SampleDate->ReadOnly && !$Page->SampleDate->Disabled && !isset($Page->SampleDate->EditAttrs["readonly"]) && !isset($Page->SampleDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_serviceslist", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_serviceslist", "x<?= $Page->RowIndex ?>_SampleDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_SampleDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_SampleDate" id="o<?= $Page->RowIndex ?>_SampleDate" value="<?= HtmlEncode($Page->SampleDate->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_SampleDate"><span id="el<?= $Page->RowCount ?>_patient_services_SampleDate" class="form-group">
<input type="<?= $Page->SampleDate->getInputTextType() ?>" data-table="patient_services" data-field="x_SampleDate" name="x<?= $Page->RowIndex ?>_SampleDate" id="x<?= $Page->RowIndex ?>_SampleDate" placeholder="<?= HtmlEncode($Page->SampleDate->getPlaceHolder()) ?>" value="<?= $Page->SampleDate->EditValue ?>"<?= $Page->SampleDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SampleDate->getErrorMessage() ?></div>
<?php if (!$Page->SampleDate->ReadOnly && !$Page->SampleDate->Disabled && !isset($Page->SampleDate->EditAttrs["readonly"]) && !isset($Page->SampleDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_serviceslist", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_serviceslist", "x<?= $Page->RowIndex ?>_SampleDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_SampleDate"><span id="el<?= $Page->RowCount ?>_patient_services_SampleDate">
<span<?= $Page->SampleDate->viewAttributes() ?>>
<?= $Page->SampleDate->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->SampleUser->Visible) { // SampleUser ?>
        <td data-name="SampleUser" <?= $Page->SampleUser->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_SampleUser"><span id="el<?= $Page->RowCount ?>_patient_services_SampleUser" class="form-group">
<input type="<?= $Page->SampleUser->getInputTextType() ?>" data-table="patient_services" data-field="x_SampleUser" name="x<?= $Page->RowIndex ?>_SampleUser" id="x<?= $Page->RowIndex ?>_SampleUser" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SampleUser->getPlaceHolder()) ?>" value="<?= $Page->SampleUser->EditValue ?>"<?= $Page->SampleUser->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SampleUser->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_SampleUser" data-hidden="1" name="o<?= $Page->RowIndex ?>_SampleUser" id="o<?= $Page->RowIndex ?>_SampleUser" value="<?= HtmlEncode($Page->SampleUser->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_SampleUser"><span id="el<?= $Page->RowCount ?>_patient_services_SampleUser" class="form-group">
<input type="<?= $Page->SampleUser->getInputTextType() ?>" data-table="patient_services" data-field="x_SampleUser" name="x<?= $Page->RowIndex ?>_SampleUser" id="x<?= $Page->RowIndex ?>_SampleUser" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SampleUser->getPlaceHolder()) ?>" value="<?= $Page->SampleUser->EditValue ?>"<?= $Page->SampleUser->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SampleUser->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_SampleUser"><span id="el<?= $Page->RowCount ?>_patient_services_SampleUser">
<span<?= $Page->SampleUser->viewAttributes() ?>>
<?= $Page->SampleUser->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Sampled->Visible) { // Sampled ?>
        <td data-name="Sampled" <?= $Page->Sampled->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Sampled"><span id="el<?= $Page->RowCount ?>_patient_services_Sampled" class="form-group">
<input type="<?= $Page->Sampled->getInputTextType() ?>" data-table="patient_services" data-field="x_Sampled" name="x<?= $Page->RowIndex ?>_Sampled" id="x<?= $Page->RowIndex ?>_Sampled" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Sampled->getPlaceHolder()) ?>" value="<?= $Page->Sampled->EditValue ?>"<?= $Page->Sampled->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Sampled->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_Sampled" data-hidden="1" name="o<?= $Page->RowIndex ?>_Sampled" id="o<?= $Page->RowIndex ?>_Sampled" value="<?= HtmlEncode($Page->Sampled->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Sampled"><span id="el<?= $Page->RowCount ?>_patient_services_Sampled" class="form-group">
<input type="<?= $Page->Sampled->getInputTextType() ?>" data-table="patient_services" data-field="x_Sampled" name="x<?= $Page->RowIndex ?>_Sampled" id="x<?= $Page->RowIndex ?>_Sampled" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Sampled->getPlaceHolder()) ?>" value="<?= $Page->Sampled->EditValue ?>"<?= $Page->Sampled->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Sampled->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Sampled"><span id="el<?= $Page->RowCount ?>_patient_services_Sampled">
<span<?= $Page->Sampled->viewAttributes() ?>>
<?= $Page->Sampled->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->ReceivedDate->Visible) { // ReceivedDate ?>
        <td data-name="ReceivedDate" <?= $Page->ReceivedDate->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_ReceivedDate"><span id="el<?= $Page->RowCount ?>_patient_services_ReceivedDate" class="form-group">
<input type="<?= $Page->ReceivedDate->getInputTextType() ?>" data-table="patient_services" data-field="x_ReceivedDate" name="x<?= $Page->RowIndex ?>_ReceivedDate" id="x<?= $Page->RowIndex ?>_ReceivedDate" placeholder="<?= HtmlEncode($Page->ReceivedDate->getPlaceHolder()) ?>" value="<?= $Page->ReceivedDate->EditValue ?>"<?= $Page->ReceivedDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ReceivedDate->getErrorMessage() ?></div>
<?php if (!$Page->ReceivedDate->ReadOnly && !$Page->ReceivedDate->Disabled && !isset($Page->ReceivedDate->EditAttrs["readonly"]) && !isset($Page->ReceivedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_serviceslist", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_serviceslist", "x<?= $Page->RowIndex ?>_ReceivedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_ReceivedDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_ReceivedDate" id="o<?= $Page->RowIndex ?>_ReceivedDate" value="<?= HtmlEncode($Page->ReceivedDate->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_ReceivedDate"><span id="el<?= $Page->RowCount ?>_patient_services_ReceivedDate" class="form-group">
<input type="<?= $Page->ReceivedDate->getInputTextType() ?>" data-table="patient_services" data-field="x_ReceivedDate" name="x<?= $Page->RowIndex ?>_ReceivedDate" id="x<?= $Page->RowIndex ?>_ReceivedDate" placeholder="<?= HtmlEncode($Page->ReceivedDate->getPlaceHolder()) ?>" value="<?= $Page->ReceivedDate->EditValue ?>"<?= $Page->ReceivedDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ReceivedDate->getErrorMessage() ?></div>
<?php if (!$Page->ReceivedDate->ReadOnly && !$Page->ReceivedDate->Disabled && !isset($Page->ReceivedDate->EditAttrs["readonly"]) && !isset($Page->ReceivedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_serviceslist", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_serviceslist", "x<?= $Page->RowIndex ?>_ReceivedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_ReceivedDate"><span id="el<?= $Page->RowCount ?>_patient_services_ReceivedDate">
<span<?= $Page->ReceivedDate->viewAttributes() ?>>
<?= $Page->ReceivedDate->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->ReceivedUser->Visible) { // ReceivedUser ?>
        <td data-name="ReceivedUser" <?= $Page->ReceivedUser->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_ReceivedUser"><span id="el<?= $Page->RowCount ?>_patient_services_ReceivedUser" class="form-group">
<input type="<?= $Page->ReceivedUser->getInputTextType() ?>" data-table="patient_services" data-field="x_ReceivedUser" name="x<?= $Page->RowIndex ?>_ReceivedUser" id="x<?= $Page->RowIndex ?>_ReceivedUser" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ReceivedUser->getPlaceHolder()) ?>" value="<?= $Page->ReceivedUser->EditValue ?>"<?= $Page->ReceivedUser->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ReceivedUser->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_ReceivedUser" data-hidden="1" name="o<?= $Page->RowIndex ?>_ReceivedUser" id="o<?= $Page->RowIndex ?>_ReceivedUser" value="<?= HtmlEncode($Page->ReceivedUser->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_ReceivedUser"><span id="el<?= $Page->RowCount ?>_patient_services_ReceivedUser" class="form-group">
<input type="<?= $Page->ReceivedUser->getInputTextType() ?>" data-table="patient_services" data-field="x_ReceivedUser" name="x<?= $Page->RowIndex ?>_ReceivedUser" id="x<?= $Page->RowIndex ?>_ReceivedUser" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ReceivedUser->getPlaceHolder()) ?>" value="<?= $Page->ReceivedUser->EditValue ?>"<?= $Page->ReceivedUser->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ReceivedUser->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_ReceivedUser"><span id="el<?= $Page->RowCount ?>_patient_services_ReceivedUser">
<span<?= $Page->ReceivedUser->viewAttributes() ?>>
<?= $Page->ReceivedUser->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Recevied->Visible) { // Recevied ?>
        <td data-name="Recevied" <?= $Page->Recevied->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Recevied"><span id="el<?= $Page->RowCount ?>_patient_services_Recevied" class="form-group">
<input type="<?= $Page->Recevied->getInputTextType() ?>" data-table="patient_services" data-field="x_Recevied" name="x<?= $Page->RowIndex ?>_Recevied" id="x<?= $Page->RowIndex ?>_Recevied" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Recevied->getPlaceHolder()) ?>" value="<?= $Page->Recevied->EditValue ?>"<?= $Page->Recevied->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Recevied->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_Recevied" data-hidden="1" name="o<?= $Page->RowIndex ?>_Recevied" id="o<?= $Page->RowIndex ?>_Recevied" value="<?= HtmlEncode($Page->Recevied->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Recevied"><span id="el<?= $Page->RowCount ?>_patient_services_Recevied" class="form-group">
<input type="<?= $Page->Recevied->getInputTextType() ?>" data-table="patient_services" data-field="x_Recevied" name="x<?= $Page->RowIndex ?>_Recevied" id="x<?= $Page->RowIndex ?>_Recevied" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Recevied->getPlaceHolder()) ?>" value="<?= $Page->Recevied->EditValue ?>"<?= $Page->Recevied->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Recevied->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Recevied"><span id="el<?= $Page->RowCount ?>_patient_services_Recevied">
<span<?= $Page->Recevied->viewAttributes() ?>>
<?= $Page->Recevied->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->DeptRecvDate->Visible) { // DeptRecvDate ?>
        <td data-name="DeptRecvDate" <?= $Page->DeptRecvDate->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_DeptRecvDate"><span id="el<?= $Page->RowCount ?>_patient_services_DeptRecvDate" class="form-group">
<input type="<?= $Page->DeptRecvDate->getInputTextType() ?>" data-table="patient_services" data-field="x_DeptRecvDate" name="x<?= $Page->RowIndex ?>_DeptRecvDate" id="x<?= $Page->RowIndex ?>_DeptRecvDate" placeholder="<?= HtmlEncode($Page->DeptRecvDate->getPlaceHolder()) ?>" value="<?= $Page->DeptRecvDate->EditValue ?>"<?= $Page->DeptRecvDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DeptRecvDate->getErrorMessage() ?></div>
<?php if (!$Page->DeptRecvDate->ReadOnly && !$Page->DeptRecvDate->Disabled && !isset($Page->DeptRecvDate->EditAttrs["readonly"]) && !isset($Page->DeptRecvDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_serviceslist", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_serviceslist", "x<?= $Page->RowIndex ?>_DeptRecvDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_DeptRecvDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_DeptRecvDate" id="o<?= $Page->RowIndex ?>_DeptRecvDate" value="<?= HtmlEncode($Page->DeptRecvDate->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_DeptRecvDate"><span id="el<?= $Page->RowCount ?>_patient_services_DeptRecvDate" class="form-group">
<input type="<?= $Page->DeptRecvDate->getInputTextType() ?>" data-table="patient_services" data-field="x_DeptRecvDate" name="x<?= $Page->RowIndex ?>_DeptRecvDate" id="x<?= $Page->RowIndex ?>_DeptRecvDate" placeholder="<?= HtmlEncode($Page->DeptRecvDate->getPlaceHolder()) ?>" value="<?= $Page->DeptRecvDate->EditValue ?>"<?= $Page->DeptRecvDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DeptRecvDate->getErrorMessage() ?></div>
<?php if (!$Page->DeptRecvDate->ReadOnly && !$Page->DeptRecvDate->Disabled && !isset($Page->DeptRecvDate->EditAttrs["readonly"]) && !isset($Page->DeptRecvDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_serviceslist", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_serviceslist", "x<?= $Page->RowIndex ?>_DeptRecvDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_DeptRecvDate"><span id="el<?= $Page->RowCount ?>_patient_services_DeptRecvDate">
<span<?= $Page->DeptRecvDate->viewAttributes() ?>>
<?= $Page->DeptRecvDate->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->DeptRecvUser->Visible) { // DeptRecvUser ?>
        <td data-name="DeptRecvUser" <?= $Page->DeptRecvUser->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_DeptRecvUser"><span id="el<?= $Page->RowCount ?>_patient_services_DeptRecvUser" class="form-group">
<input type="<?= $Page->DeptRecvUser->getInputTextType() ?>" data-table="patient_services" data-field="x_DeptRecvUser" name="x<?= $Page->RowIndex ?>_DeptRecvUser" id="x<?= $Page->RowIndex ?>_DeptRecvUser" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DeptRecvUser->getPlaceHolder()) ?>" value="<?= $Page->DeptRecvUser->EditValue ?>"<?= $Page->DeptRecvUser->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DeptRecvUser->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_DeptRecvUser" data-hidden="1" name="o<?= $Page->RowIndex ?>_DeptRecvUser" id="o<?= $Page->RowIndex ?>_DeptRecvUser" value="<?= HtmlEncode($Page->DeptRecvUser->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_DeptRecvUser"><span id="el<?= $Page->RowCount ?>_patient_services_DeptRecvUser" class="form-group">
<input type="<?= $Page->DeptRecvUser->getInputTextType() ?>" data-table="patient_services" data-field="x_DeptRecvUser" name="x<?= $Page->RowIndex ?>_DeptRecvUser" id="x<?= $Page->RowIndex ?>_DeptRecvUser" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DeptRecvUser->getPlaceHolder()) ?>" value="<?= $Page->DeptRecvUser->EditValue ?>"<?= $Page->DeptRecvUser->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DeptRecvUser->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_DeptRecvUser"><span id="el<?= $Page->RowCount ?>_patient_services_DeptRecvUser">
<span<?= $Page->DeptRecvUser->viewAttributes() ?>>
<?= $Page->DeptRecvUser->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->DeptRecived->Visible) { // DeptRecived ?>
        <td data-name="DeptRecived" <?= $Page->DeptRecived->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_DeptRecived"><span id="el<?= $Page->RowCount ?>_patient_services_DeptRecived" class="form-group">
<input type="<?= $Page->DeptRecived->getInputTextType() ?>" data-table="patient_services" data-field="x_DeptRecived" name="x<?= $Page->RowIndex ?>_DeptRecived" id="x<?= $Page->RowIndex ?>_DeptRecived" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DeptRecived->getPlaceHolder()) ?>" value="<?= $Page->DeptRecived->EditValue ?>"<?= $Page->DeptRecived->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DeptRecived->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_DeptRecived" data-hidden="1" name="o<?= $Page->RowIndex ?>_DeptRecived" id="o<?= $Page->RowIndex ?>_DeptRecived" value="<?= HtmlEncode($Page->DeptRecived->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_DeptRecived"><span id="el<?= $Page->RowCount ?>_patient_services_DeptRecived" class="form-group">
<input type="<?= $Page->DeptRecived->getInputTextType() ?>" data-table="patient_services" data-field="x_DeptRecived" name="x<?= $Page->RowIndex ?>_DeptRecived" id="x<?= $Page->RowIndex ?>_DeptRecived" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DeptRecived->getPlaceHolder()) ?>" value="<?= $Page->DeptRecived->EditValue ?>"<?= $Page->DeptRecived->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DeptRecived->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_DeptRecived"><span id="el<?= $Page->RowCount ?>_patient_services_DeptRecived">
<span<?= $Page->DeptRecived->viewAttributes() ?>>
<?= $Page->DeptRecived->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->SAuthDate->Visible) { // SAuthDate ?>
        <td data-name="SAuthDate" <?= $Page->SAuthDate->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_SAuthDate"><span id="el<?= $Page->RowCount ?>_patient_services_SAuthDate" class="form-group">
<input type="<?= $Page->SAuthDate->getInputTextType() ?>" data-table="patient_services" data-field="x_SAuthDate" name="x<?= $Page->RowIndex ?>_SAuthDate" id="x<?= $Page->RowIndex ?>_SAuthDate" placeholder="<?= HtmlEncode($Page->SAuthDate->getPlaceHolder()) ?>" value="<?= $Page->SAuthDate->EditValue ?>"<?= $Page->SAuthDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SAuthDate->getErrorMessage() ?></div>
<?php if (!$Page->SAuthDate->ReadOnly && !$Page->SAuthDate->Disabled && !isset($Page->SAuthDate->EditAttrs["readonly"]) && !isset($Page->SAuthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_serviceslist", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_serviceslist", "x<?= $Page->RowIndex ?>_SAuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_SAuthDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_SAuthDate" id="o<?= $Page->RowIndex ?>_SAuthDate" value="<?= HtmlEncode($Page->SAuthDate->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_SAuthDate"><span id="el<?= $Page->RowCount ?>_patient_services_SAuthDate" class="form-group">
<input type="<?= $Page->SAuthDate->getInputTextType() ?>" data-table="patient_services" data-field="x_SAuthDate" name="x<?= $Page->RowIndex ?>_SAuthDate" id="x<?= $Page->RowIndex ?>_SAuthDate" placeholder="<?= HtmlEncode($Page->SAuthDate->getPlaceHolder()) ?>" value="<?= $Page->SAuthDate->EditValue ?>"<?= $Page->SAuthDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SAuthDate->getErrorMessage() ?></div>
<?php if (!$Page->SAuthDate->ReadOnly && !$Page->SAuthDate->Disabled && !isset($Page->SAuthDate->EditAttrs["readonly"]) && !isset($Page->SAuthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_serviceslist", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_serviceslist", "x<?= $Page->RowIndex ?>_SAuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_SAuthDate"><span id="el<?= $Page->RowCount ?>_patient_services_SAuthDate">
<span<?= $Page->SAuthDate->viewAttributes() ?>>
<?= $Page->SAuthDate->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->SAuthBy->Visible) { // SAuthBy ?>
        <td data-name="SAuthBy" <?= $Page->SAuthBy->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_SAuthBy"><span id="el<?= $Page->RowCount ?>_patient_services_SAuthBy" class="form-group">
<input type="<?= $Page->SAuthBy->getInputTextType() ?>" data-table="patient_services" data-field="x_SAuthBy" name="x<?= $Page->RowIndex ?>_SAuthBy" id="x<?= $Page->RowIndex ?>_SAuthBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SAuthBy->getPlaceHolder()) ?>" value="<?= $Page->SAuthBy->EditValue ?>"<?= $Page->SAuthBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SAuthBy->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_SAuthBy" data-hidden="1" name="o<?= $Page->RowIndex ?>_SAuthBy" id="o<?= $Page->RowIndex ?>_SAuthBy" value="<?= HtmlEncode($Page->SAuthBy->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_SAuthBy"><span id="el<?= $Page->RowCount ?>_patient_services_SAuthBy" class="form-group">
<input type="<?= $Page->SAuthBy->getInputTextType() ?>" data-table="patient_services" data-field="x_SAuthBy" name="x<?= $Page->RowIndex ?>_SAuthBy" id="x<?= $Page->RowIndex ?>_SAuthBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SAuthBy->getPlaceHolder()) ?>" value="<?= $Page->SAuthBy->EditValue ?>"<?= $Page->SAuthBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SAuthBy->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_SAuthBy"><span id="el<?= $Page->RowCount ?>_patient_services_SAuthBy">
<span<?= $Page->SAuthBy->viewAttributes() ?>>
<?= $Page->SAuthBy->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->SAuthendicate->Visible) { // SAuthendicate ?>
        <td data-name="SAuthendicate" <?= $Page->SAuthendicate->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_SAuthendicate"><span id="el<?= $Page->RowCount ?>_patient_services_SAuthendicate" class="form-group">
<input type="<?= $Page->SAuthendicate->getInputTextType() ?>" data-table="patient_services" data-field="x_SAuthendicate" name="x<?= $Page->RowIndex ?>_SAuthendicate" id="x<?= $Page->RowIndex ?>_SAuthendicate" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SAuthendicate->getPlaceHolder()) ?>" value="<?= $Page->SAuthendicate->EditValue ?>"<?= $Page->SAuthendicate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SAuthendicate->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_SAuthendicate" data-hidden="1" name="o<?= $Page->RowIndex ?>_SAuthendicate" id="o<?= $Page->RowIndex ?>_SAuthendicate" value="<?= HtmlEncode($Page->SAuthendicate->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_SAuthendicate"><span id="el<?= $Page->RowCount ?>_patient_services_SAuthendicate" class="form-group">
<input type="<?= $Page->SAuthendicate->getInputTextType() ?>" data-table="patient_services" data-field="x_SAuthendicate" name="x<?= $Page->RowIndex ?>_SAuthendicate" id="x<?= $Page->RowIndex ?>_SAuthendicate" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SAuthendicate->getPlaceHolder()) ?>" value="<?= $Page->SAuthendicate->EditValue ?>"<?= $Page->SAuthendicate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SAuthendicate->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_SAuthendicate"><span id="el<?= $Page->RowCount ?>_patient_services_SAuthendicate">
<span<?= $Page->SAuthendicate->viewAttributes() ?>>
<?= $Page->SAuthendicate->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->AuthDate->Visible) { // AuthDate ?>
        <td data-name="AuthDate" <?= $Page->AuthDate->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_AuthDate"><span id="el<?= $Page->RowCount ?>_patient_services_AuthDate" class="form-group">
<input type="<?= $Page->AuthDate->getInputTextType() ?>" data-table="patient_services" data-field="x_AuthDate" name="x<?= $Page->RowIndex ?>_AuthDate" id="x<?= $Page->RowIndex ?>_AuthDate" placeholder="<?= HtmlEncode($Page->AuthDate->getPlaceHolder()) ?>" value="<?= $Page->AuthDate->EditValue ?>"<?= $Page->AuthDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->AuthDate->getErrorMessage() ?></div>
<?php if (!$Page->AuthDate->ReadOnly && !$Page->AuthDate->Disabled && !isset($Page->AuthDate->EditAttrs["readonly"]) && !isset($Page->AuthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_serviceslist", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_serviceslist", "x<?= $Page->RowIndex ?>_AuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_AuthDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_AuthDate" id="o<?= $Page->RowIndex ?>_AuthDate" value="<?= HtmlEncode($Page->AuthDate->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_AuthDate"><span id="el<?= $Page->RowCount ?>_patient_services_AuthDate" class="form-group">
<input type="<?= $Page->AuthDate->getInputTextType() ?>" data-table="patient_services" data-field="x_AuthDate" name="x<?= $Page->RowIndex ?>_AuthDate" id="x<?= $Page->RowIndex ?>_AuthDate" placeholder="<?= HtmlEncode($Page->AuthDate->getPlaceHolder()) ?>" value="<?= $Page->AuthDate->EditValue ?>"<?= $Page->AuthDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->AuthDate->getErrorMessage() ?></div>
<?php if (!$Page->AuthDate->ReadOnly && !$Page->AuthDate->Disabled && !isset($Page->AuthDate->EditAttrs["readonly"]) && !isset($Page->AuthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_serviceslist", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_serviceslist", "x<?= $Page->RowIndex ?>_AuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_AuthDate"><span id="el<?= $Page->RowCount ?>_patient_services_AuthDate">
<span<?= $Page->AuthDate->viewAttributes() ?>>
<?= $Page->AuthDate->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->AuthBy->Visible) { // AuthBy ?>
        <td data-name="AuthBy" <?= $Page->AuthBy->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_AuthBy"><span id="el<?= $Page->RowCount ?>_patient_services_AuthBy" class="form-group">
<input type="<?= $Page->AuthBy->getInputTextType() ?>" data-table="patient_services" data-field="x_AuthBy" name="x<?= $Page->RowIndex ?>_AuthBy" id="x<?= $Page->RowIndex ?>_AuthBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AuthBy->getPlaceHolder()) ?>" value="<?= $Page->AuthBy->EditValue ?>"<?= $Page->AuthBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->AuthBy->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_AuthBy" data-hidden="1" name="o<?= $Page->RowIndex ?>_AuthBy" id="o<?= $Page->RowIndex ?>_AuthBy" value="<?= HtmlEncode($Page->AuthBy->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_AuthBy"><span id="el<?= $Page->RowCount ?>_patient_services_AuthBy" class="form-group">
<input type="<?= $Page->AuthBy->getInputTextType() ?>" data-table="patient_services" data-field="x_AuthBy" name="x<?= $Page->RowIndex ?>_AuthBy" id="x<?= $Page->RowIndex ?>_AuthBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AuthBy->getPlaceHolder()) ?>" value="<?= $Page->AuthBy->EditValue ?>"<?= $Page->AuthBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->AuthBy->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_AuthBy"><span id="el<?= $Page->RowCount ?>_patient_services_AuthBy">
<span<?= $Page->AuthBy->viewAttributes() ?>>
<?= $Page->AuthBy->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Authencate->Visible) { // Authencate ?>
        <td data-name="Authencate" <?= $Page->Authencate->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Authencate"><span id="el<?= $Page->RowCount ?>_patient_services_Authencate" class="form-group">
<input type="<?= $Page->Authencate->getInputTextType() ?>" data-table="patient_services" data-field="x_Authencate" name="x<?= $Page->RowIndex ?>_Authencate" id="x<?= $Page->RowIndex ?>_Authencate" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Authencate->getPlaceHolder()) ?>" value="<?= $Page->Authencate->EditValue ?>"<?= $Page->Authencate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Authencate->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_Authencate" data-hidden="1" name="o<?= $Page->RowIndex ?>_Authencate" id="o<?= $Page->RowIndex ?>_Authencate" value="<?= HtmlEncode($Page->Authencate->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Authencate"><span id="el<?= $Page->RowCount ?>_patient_services_Authencate" class="form-group">
<input type="<?= $Page->Authencate->getInputTextType() ?>" data-table="patient_services" data-field="x_Authencate" name="x<?= $Page->RowIndex ?>_Authencate" id="x<?= $Page->RowIndex ?>_Authencate" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Authencate->getPlaceHolder()) ?>" value="<?= $Page->Authencate->EditValue ?>"<?= $Page->Authencate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Authencate->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Authencate"><span id="el<?= $Page->RowCount ?>_patient_services_Authencate">
<span<?= $Page->Authencate->viewAttributes() ?>>
<?= $Page->Authencate->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->EditDate->Visible) { // EditDate ?>
        <td data-name="EditDate" <?= $Page->EditDate->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_EditDate"><span id="el<?= $Page->RowCount ?>_patient_services_EditDate" class="form-group">
<input type="<?= $Page->EditDate->getInputTextType() ?>" data-table="patient_services" data-field="x_EditDate" name="x<?= $Page->RowIndex ?>_EditDate" id="x<?= $Page->RowIndex ?>_EditDate" placeholder="<?= HtmlEncode($Page->EditDate->getPlaceHolder()) ?>" value="<?= $Page->EditDate->EditValue ?>"<?= $Page->EditDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->EditDate->getErrorMessage() ?></div>
<?php if (!$Page->EditDate->ReadOnly && !$Page->EditDate->Disabled && !isset($Page->EditDate->EditAttrs["readonly"]) && !isset($Page->EditDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_serviceslist", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_serviceslist", "x<?= $Page->RowIndex ?>_EditDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_EditDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_EditDate" id="o<?= $Page->RowIndex ?>_EditDate" value="<?= HtmlEncode($Page->EditDate->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_EditDate"><span id="el<?= $Page->RowCount ?>_patient_services_EditDate" class="form-group">
<input type="<?= $Page->EditDate->getInputTextType() ?>" data-table="patient_services" data-field="x_EditDate" name="x<?= $Page->RowIndex ?>_EditDate" id="x<?= $Page->RowIndex ?>_EditDate" placeholder="<?= HtmlEncode($Page->EditDate->getPlaceHolder()) ?>" value="<?= $Page->EditDate->EditValue ?>"<?= $Page->EditDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->EditDate->getErrorMessage() ?></div>
<?php if (!$Page->EditDate->ReadOnly && !$Page->EditDate->Disabled && !isset($Page->EditDate->EditAttrs["readonly"]) && !isset($Page->EditDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_serviceslist", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_serviceslist", "x<?= $Page->RowIndex ?>_EditDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_EditDate"><span id="el<?= $Page->RowCount ?>_patient_services_EditDate">
<span<?= $Page->EditDate->viewAttributes() ?>>
<?= $Page->EditDate->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->EditBy->Visible) { // EditBy ?>
        <td data-name="EditBy" <?= $Page->EditBy->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_EditBy"><span id="el<?= $Page->RowCount ?>_patient_services_EditBy" class="form-group">
<input type="<?= $Page->EditBy->getInputTextType() ?>" data-table="patient_services" data-field="x_EditBy" name="x<?= $Page->RowIndex ?>_EditBy" id="x<?= $Page->RowIndex ?>_EditBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EditBy->getPlaceHolder()) ?>" value="<?= $Page->EditBy->EditValue ?>"<?= $Page->EditBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->EditBy->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_EditBy" data-hidden="1" name="o<?= $Page->RowIndex ?>_EditBy" id="o<?= $Page->RowIndex ?>_EditBy" value="<?= HtmlEncode($Page->EditBy->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_EditBy"><span id="el<?= $Page->RowCount ?>_patient_services_EditBy" class="form-group">
<input type="<?= $Page->EditBy->getInputTextType() ?>" data-table="patient_services" data-field="x_EditBy" name="x<?= $Page->RowIndex ?>_EditBy" id="x<?= $Page->RowIndex ?>_EditBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EditBy->getPlaceHolder()) ?>" value="<?= $Page->EditBy->EditValue ?>"<?= $Page->EditBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->EditBy->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_EditBy"><span id="el<?= $Page->RowCount ?>_patient_services_EditBy">
<span<?= $Page->EditBy->viewAttributes() ?>>
<?= $Page->EditBy->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Editted->Visible) { // Editted ?>
        <td data-name="Editted" <?= $Page->Editted->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Editted"><span id="el<?= $Page->RowCount ?>_patient_services_Editted" class="form-group">
<input type="<?= $Page->Editted->getInputTextType() ?>" data-table="patient_services" data-field="x_Editted" name="x<?= $Page->RowIndex ?>_Editted" id="x<?= $Page->RowIndex ?>_Editted" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Editted->getPlaceHolder()) ?>" value="<?= $Page->Editted->EditValue ?>"<?= $Page->Editted->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Editted->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_Editted" data-hidden="1" name="o<?= $Page->RowIndex ?>_Editted" id="o<?= $Page->RowIndex ?>_Editted" value="<?= HtmlEncode($Page->Editted->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Editted"><span id="el<?= $Page->RowCount ?>_patient_services_Editted" class="form-group">
<input type="<?= $Page->Editted->getInputTextType() ?>" data-table="patient_services" data-field="x_Editted" name="x<?= $Page->RowIndex ?>_Editted" id="x<?= $Page->RowIndex ?>_Editted" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Editted->getPlaceHolder()) ?>" value="<?= $Page->Editted->EditValue ?>"<?= $Page->Editted->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Editted->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Editted"><span id="el<?= $Page->RowCount ?>_patient_services_Editted">
<span<?= $Page->Editted->viewAttributes() ?>>
<?= $Page->Editted->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->PatID->Visible) { // PatID ?>
        <td data-name="PatID" <?= $Page->PatID->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Page->PatID->getSessionValue() != "") { ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_PatID"><span id="el<?= $Page->RowCount ?>_patient_services_PatID" class="form-group">
<span<?= $Page->PatID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PatID->getDisplayValue($Page->PatID->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" id="x<?= $Page->RowIndex ?>_PatID" name="x<?= $Page->RowIndex ?>_PatID" value="<?= HtmlEncode($Page->PatID->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_PatID"><span id="el<?= $Page->RowCount ?>_patient_services_PatID" class="form-group">
<input type="<?= $Page->PatID->getInputTextType() ?>" data-table="patient_services" data-field="x_PatID" name="x<?= $Page->RowIndex ?>_PatID" id="x<?= $Page->RowIndex ?>_PatID" size="30" placeholder="<?= HtmlEncode($Page->PatID->getPlaceHolder()) ?>" value="<?= $Page->PatID->EditValue ?>"<?= $Page->PatID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatID->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<input type="hidden" data-table="patient_services" data-field="x_PatID" data-hidden="1" name="o<?= $Page->RowIndex ?>_PatID" id="o<?= $Page->RowIndex ?>_PatID" value="<?= HtmlEncode($Page->PatID->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Page->PatID->getSessionValue() != "") { ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_PatID"><span id="el<?= $Page->RowCount ?>_patient_services_PatID" class="form-group">
<span<?= $Page->PatID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PatID->getDisplayValue($Page->PatID->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" id="x<?= $Page->RowIndex ?>_PatID" name="x<?= $Page->RowIndex ?>_PatID" value="<?= HtmlEncode($Page->PatID->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_PatID"><span id="el<?= $Page->RowCount ?>_patient_services_PatID" class="form-group">
<input type="<?= $Page->PatID->getInputTextType() ?>" data-table="patient_services" data-field="x_PatID" name="x<?= $Page->RowIndex ?>_PatID" id="x<?= $Page->RowIndex ?>_PatID" size="30" placeholder="<?= HtmlEncode($Page->PatID->getPlaceHolder()) ?>" value="<?= $Page->PatID->EditValue ?>"<?= $Page->PatID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatID->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_PatID"><span id="el<?= $Page->RowCount ?>_patient_services_PatID">
<span<?= $Page->PatID->viewAttributes() ?>>
<?= $Page->PatID->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->PatientId->Visible) { // PatientId ?>
        <td data-name="PatientId" <?= $Page->PatientId->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_PatientId"><span id="el<?= $Page->RowCount ?>_patient_services_PatientId" class="form-group">
<input type="<?= $Page->PatientId->getInputTextType() ?>" data-table="patient_services" data-field="x_PatientId" name="x<?= $Page->RowIndex ?>_PatientId" id="x<?= $Page->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientId->getPlaceHolder()) ?>" value="<?= $Page->PatientId->EditValue ?>"<?= $Page->PatientId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientId->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_PatientId" data-hidden="1" name="o<?= $Page->RowIndex ?>_PatientId" id="o<?= $Page->RowIndex ?>_PatientId" value="<?= HtmlEncode($Page->PatientId->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_PatientId"><span id="el<?= $Page->RowCount ?>_patient_services_PatientId" class="form-group">
<input type="<?= $Page->PatientId->getInputTextType() ?>" data-table="patient_services" data-field="x_PatientId" name="x<?= $Page->RowIndex ?>_PatientId" id="x<?= $Page->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientId->getPlaceHolder()) ?>" value="<?= $Page->PatientId->EditValue ?>"<?= $Page->PatientId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientId->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_PatientId"><span id="el<?= $Page->RowCount ?>_patient_services_PatientId">
<span<?= $Page->PatientId->viewAttributes() ?>>
<?= $Page->PatientId->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Mobile->Visible) { // Mobile ?>
        <td data-name="Mobile" <?= $Page->Mobile->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Mobile"><span id="el<?= $Page->RowCount ?>_patient_services_Mobile" class="form-group">
<input type="<?= $Page->Mobile->getInputTextType() ?>" data-table="patient_services" data-field="x_Mobile" name="x<?= $Page->RowIndex ?>_Mobile" id="x<?= $Page->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Mobile->getPlaceHolder()) ?>" value="<?= $Page->Mobile->EditValue ?>"<?= $Page->Mobile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Mobile->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_Mobile" data-hidden="1" name="o<?= $Page->RowIndex ?>_Mobile" id="o<?= $Page->RowIndex ?>_Mobile" value="<?= HtmlEncode($Page->Mobile->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Mobile"><span id="el<?= $Page->RowCount ?>_patient_services_Mobile" class="form-group">
<input type="<?= $Page->Mobile->getInputTextType() ?>" data-table="patient_services" data-field="x_Mobile" name="x<?= $Page->RowIndex ?>_Mobile" id="x<?= $Page->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Mobile->getPlaceHolder()) ?>" value="<?= $Page->Mobile->EditValue ?>"<?= $Page->Mobile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Mobile->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Mobile"><span id="el<?= $Page->RowCount ?>_patient_services_Mobile">
<span<?= $Page->Mobile->viewAttributes() ?>>
<?= $Page->Mobile->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->CId->Visible) { // CId ?>
        <td data-name="CId" <?= $Page->CId->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_CId"><span id="el<?= $Page->RowCount ?>_patient_services_CId" class="form-group">
<input type="<?= $Page->CId->getInputTextType() ?>" data-table="patient_services" data-field="x_CId" name="x<?= $Page->RowIndex ?>_CId" id="x<?= $Page->RowIndex ?>_CId" size="30" placeholder="<?= HtmlEncode($Page->CId->getPlaceHolder()) ?>" value="<?= $Page->CId->EditValue ?>"<?= $Page->CId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CId->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_CId" data-hidden="1" name="o<?= $Page->RowIndex ?>_CId" id="o<?= $Page->RowIndex ?>_CId" value="<?= HtmlEncode($Page->CId->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_CId"><span id="el<?= $Page->RowCount ?>_patient_services_CId" class="form-group">
<input type="<?= $Page->CId->getInputTextType() ?>" data-table="patient_services" data-field="x_CId" name="x<?= $Page->RowIndex ?>_CId" id="x<?= $Page->RowIndex ?>_CId" size="30" placeholder="<?= HtmlEncode($Page->CId->getPlaceHolder()) ?>" value="<?= $Page->CId->EditValue ?>"<?= $Page->CId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CId->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_CId"><span id="el<?= $Page->RowCount ?>_patient_services_CId">
<span<?= $Page->CId->viewAttributes() ?>>
<?= $Page->CId->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Order->Visible) { // Order ?>
        <td data-name="Order" <?= $Page->Order->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Order"><span id="el<?= $Page->RowCount ?>_patient_services_Order" class="form-group">
<input type="<?= $Page->Order->getInputTextType() ?>" data-table="patient_services" data-field="x_Order" name="x<?= $Page->RowIndex ?>_Order" id="x<?= $Page->RowIndex ?>_Order" size="30" placeholder="<?= HtmlEncode($Page->Order->getPlaceHolder()) ?>" value="<?= $Page->Order->EditValue ?>"<?= $Page->Order->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Order->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_Order" data-hidden="1" name="o<?= $Page->RowIndex ?>_Order" id="o<?= $Page->RowIndex ?>_Order" value="<?= HtmlEncode($Page->Order->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Order"><span id="el<?= $Page->RowCount ?>_patient_services_Order" class="form-group">
<input type="<?= $Page->Order->getInputTextType() ?>" data-table="patient_services" data-field="x_Order" name="x<?= $Page->RowIndex ?>_Order" id="x<?= $Page->RowIndex ?>_Order" size="30" placeholder="<?= HtmlEncode($Page->Order->getPlaceHolder()) ?>" value="<?= $Page->Order->EditValue ?>"<?= $Page->Order->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Order->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Order"><span id="el<?= $Page->RowCount ?>_patient_services_Order">
<span<?= $Page->Order->viewAttributes() ?>>
<?= $Page->Order->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->ResType->Visible) { // ResType ?>
        <td data-name="ResType" <?= $Page->ResType->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_ResType"><span id="el<?= $Page->RowCount ?>_patient_services_ResType" class="form-group">
<input type="<?= $Page->ResType->getInputTextType() ?>" data-table="patient_services" data-field="x_ResType" name="x<?= $Page->RowIndex ?>_ResType" id="x<?= $Page->RowIndex ?>_ResType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ResType->getPlaceHolder()) ?>" value="<?= $Page->ResType->EditValue ?>"<?= $Page->ResType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ResType->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_ResType" data-hidden="1" name="o<?= $Page->RowIndex ?>_ResType" id="o<?= $Page->RowIndex ?>_ResType" value="<?= HtmlEncode($Page->ResType->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_ResType"><span id="el<?= $Page->RowCount ?>_patient_services_ResType" class="form-group">
<input type="<?= $Page->ResType->getInputTextType() ?>" data-table="patient_services" data-field="x_ResType" name="x<?= $Page->RowIndex ?>_ResType" id="x<?= $Page->RowIndex ?>_ResType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ResType->getPlaceHolder()) ?>" value="<?= $Page->ResType->EditValue ?>"<?= $Page->ResType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ResType->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_ResType"><span id="el<?= $Page->RowCount ?>_patient_services_ResType">
<span<?= $Page->ResType->viewAttributes() ?>>
<?= $Page->ResType->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Sample->Visible) { // Sample ?>
        <td data-name="Sample" <?= $Page->Sample->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Sample"><span id="el<?= $Page->RowCount ?>_patient_services_Sample" class="form-group">
<input type="<?= $Page->Sample->getInputTextType() ?>" data-table="patient_services" data-field="x_Sample" name="x<?= $Page->RowIndex ?>_Sample" id="x<?= $Page->RowIndex ?>_Sample" size="30" maxlength="150" placeholder="<?= HtmlEncode($Page->Sample->getPlaceHolder()) ?>" value="<?= $Page->Sample->EditValue ?>"<?= $Page->Sample->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Sample->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_Sample" data-hidden="1" name="o<?= $Page->RowIndex ?>_Sample" id="o<?= $Page->RowIndex ?>_Sample" value="<?= HtmlEncode($Page->Sample->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Sample"><span id="el<?= $Page->RowCount ?>_patient_services_Sample" class="form-group">
<input type="<?= $Page->Sample->getInputTextType() ?>" data-table="patient_services" data-field="x_Sample" name="x<?= $Page->RowIndex ?>_Sample" id="x<?= $Page->RowIndex ?>_Sample" size="30" maxlength="150" placeholder="<?= HtmlEncode($Page->Sample->getPlaceHolder()) ?>" value="<?= $Page->Sample->EditValue ?>"<?= $Page->Sample->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Sample->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Sample"><span id="el<?= $Page->RowCount ?>_patient_services_Sample">
<span<?= $Page->Sample->viewAttributes() ?>>
<?= $Page->Sample->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->NoD->Visible) { // NoD ?>
        <td data-name="NoD" <?= $Page->NoD->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_NoD"><span id="el<?= $Page->RowCount ?>_patient_services_NoD" class="form-group">
<input type="<?= $Page->NoD->getInputTextType() ?>" data-table="patient_services" data-field="x_NoD" name="x<?= $Page->RowIndex ?>_NoD" id="x<?= $Page->RowIndex ?>_NoD" size="30" placeholder="<?= HtmlEncode($Page->NoD->getPlaceHolder()) ?>" value="<?= $Page->NoD->EditValue ?>"<?= $Page->NoD->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->NoD->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_NoD" data-hidden="1" name="o<?= $Page->RowIndex ?>_NoD" id="o<?= $Page->RowIndex ?>_NoD" value="<?= HtmlEncode($Page->NoD->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_NoD"><span id="el<?= $Page->RowCount ?>_patient_services_NoD" class="form-group">
<input type="<?= $Page->NoD->getInputTextType() ?>" data-table="patient_services" data-field="x_NoD" name="x<?= $Page->RowIndex ?>_NoD" id="x<?= $Page->RowIndex ?>_NoD" size="30" placeholder="<?= HtmlEncode($Page->NoD->getPlaceHolder()) ?>" value="<?= $Page->NoD->EditValue ?>"<?= $Page->NoD->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->NoD->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_NoD"><span id="el<?= $Page->RowCount ?>_patient_services_NoD">
<span<?= $Page->NoD->viewAttributes() ?>>
<?= $Page->NoD->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->BillOrder->Visible) { // BillOrder ?>
        <td data-name="BillOrder" <?= $Page->BillOrder->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_BillOrder"><span id="el<?= $Page->RowCount ?>_patient_services_BillOrder" class="form-group">
<input type="<?= $Page->BillOrder->getInputTextType() ?>" data-table="patient_services" data-field="x_BillOrder" name="x<?= $Page->RowIndex ?>_BillOrder" id="x<?= $Page->RowIndex ?>_BillOrder" size="30" placeholder="<?= HtmlEncode($Page->BillOrder->getPlaceHolder()) ?>" value="<?= $Page->BillOrder->EditValue ?>"<?= $Page->BillOrder->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BillOrder->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_BillOrder" data-hidden="1" name="o<?= $Page->RowIndex ?>_BillOrder" id="o<?= $Page->RowIndex ?>_BillOrder" value="<?= HtmlEncode($Page->BillOrder->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_BillOrder"><span id="el<?= $Page->RowCount ?>_patient_services_BillOrder" class="form-group">
<input type="<?= $Page->BillOrder->getInputTextType() ?>" data-table="patient_services" data-field="x_BillOrder" name="x<?= $Page->RowIndex ?>_BillOrder" id="x<?= $Page->RowIndex ?>_BillOrder" size="30" placeholder="<?= HtmlEncode($Page->BillOrder->getPlaceHolder()) ?>" value="<?= $Page->BillOrder->EditValue ?>"<?= $Page->BillOrder->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BillOrder->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_BillOrder"><span id="el<?= $Page->RowCount ?>_patient_services_BillOrder">
<span<?= $Page->BillOrder->viewAttributes() ?>>
<?= $Page->BillOrder->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Inactive->Visible) { // Inactive ?>
        <td data-name="Inactive" <?= $Page->Inactive->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Inactive"><span id="el<?= $Page->RowCount ?>_patient_services_Inactive" class="form-group">
<input type="<?= $Page->Inactive->getInputTextType() ?>" data-table="patient_services" data-field="x_Inactive" name="x<?= $Page->RowIndex ?>_Inactive" id="x<?= $Page->RowIndex ?>_Inactive" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Inactive->getPlaceHolder()) ?>" value="<?= $Page->Inactive->EditValue ?>"<?= $Page->Inactive->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Inactive->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_Inactive" data-hidden="1" name="o<?= $Page->RowIndex ?>_Inactive" id="o<?= $Page->RowIndex ?>_Inactive" value="<?= HtmlEncode($Page->Inactive->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Inactive"><span id="el<?= $Page->RowCount ?>_patient_services_Inactive" class="form-group">
<input type="<?= $Page->Inactive->getInputTextType() ?>" data-table="patient_services" data-field="x_Inactive" name="x<?= $Page->RowIndex ?>_Inactive" id="x<?= $Page->RowIndex ?>_Inactive" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Inactive->getPlaceHolder()) ?>" value="<?= $Page->Inactive->EditValue ?>"<?= $Page->Inactive->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Inactive->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Inactive"><span id="el<?= $Page->RowCount ?>_patient_services_Inactive">
<span<?= $Page->Inactive->viewAttributes() ?>>
<?= $Page->Inactive->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->CollSample->Visible) { // CollSample ?>
        <td data-name="CollSample" <?= $Page->CollSample->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_CollSample"><span id="el<?= $Page->RowCount ?>_patient_services_CollSample" class="form-group">
<input type="<?= $Page->CollSample->getInputTextType() ?>" data-table="patient_services" data-field="x_CollSample" name="x<?= $Page->RowIndex ?>_CollSample" id="x<?= $Page->RowIndex ?>_CollSample" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CollSample->getPlaceHolder()) ?>" value="<?= $Page->CollSample->EditValue ?>"<?= $Page->CollSample->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CollSample->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_CollSample" data-hidden="1" name="o<?= $Page->RowIndex ?>_CollSample" id="o<?= $Page->RowIndex ?>_CollSample" value="<?= HtmlEncode($Page->CollSample->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_CollSample"><span id="el<?= $Page->RowCount ?>_patient_services_CollSample" class="form-group">
<input type="<?= $Page->CollSample->getInputTextType() ?>" data-table="patient_services" data-field="x_CollSample" name="x<?= $Page->RowIndex ?>_CollSample" id="x<?= $Page->RowIndex ?>_CollSample" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CollSample->getPlaceHolder()) ?>" value="<?= $Page->CollSample->EditValue ?>"<?= $Page->CollSample->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CollSample->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_CollSample"><span id="el<?= $Page->RowCount ?>_patient_services_CollSample">
<span<?= $Page->CollSample->viewAttributes() ?>>
<?= $Page->CollSample->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->TestType->Visible) { // TestType ?>
        <td data-name="TestType" <?= $Page->TestType->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_TestType"><span id="el<?= $Page->RowCount ?>_patient_services_TestType" class="form-group">
<input type="<?= $Page->TestType->getInputTextType() ?>" data-table="patient_services" data-field="x_TestType" name="x<?= $Page->RowIndex ?>_TestType" id="x<?= $Page->RowIndex ?>_TestType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TestType->getPlaceHolder()) ?>" value="<?= $Page->TestType->EditValue ?>"<?= $Page->TestType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TestType->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_TestType" data-hidden="1" name="o<?= $Page->RowIndex ?>_TestType" id="o<?= $Page->RowIndex ?>_TestType" value="<?= HtmlEncode($Page->TestType->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_TestType"><span id="el<?= $Page->RowCount ?>_patient_services_TestType" class="form-group">
<input type="<?= $Page->TestType->getInputTextType() ?>" data-table="patient_services" data-field="x_TestType" name="x<?= $Page->RowIndex ?>_TestType" id="x<?= $Page->RowIndex ?>_TestType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TestType->getPlaceHolder()) ?>" value="<?= $Page->TestType->EditValue ?>"<?= $Page->TestType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TestType->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_TestType"><span id="el<?= $Page->RowCount ?>_patient_services_TestType">
<span<?= $Page->TestType->viewAttributes() ?>>
<?= $Page->TestType->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Repeated->Visible) { // Repeated ?>
        <td data-name="Repeated" <?= $Page->Repeated->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Repeated"><span id="el<?= $Page->RowCount ?>_patient_services_Repeated" class="form-group">
<input type="<?= $Page->Repeated->getInputTextType() ?>" data-table="patient_services" data-field="x_Repeated" name="x<?= $Page->RowIndex ?>_Repeated" id="x<?= $Page->RowIndex ?>_Repeated" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Repeated->getPlaceHolder()) ?>" value="<?= $Page->Repeated->EditValue ?>"<?= $Page->Repeated->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Repeated->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_Repeated" data-hidden="1" name="o<?= $Page->RowIndex ?>_Repeated" id="o<?= $Page->RowIndex ?>_Repeated" value="<?= HtmlEncode($Page->Repeated->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Repeated"><span id="el<?= $Page->RowCount ?>_patient_services_Repeated" class="form-group">
<input type="<?= $Page->Repeated->getInputTextType() ?>" data-table="patient_services" data-field="x_Repeated" name="x<?= $Page->RowIndex ?>_Repeated" id="x<?= $Page->RowIndex ?>_Repeated" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Repeated->getPlaceHolder()) ?>" value="<?= $Page->Repeated->EditValue ?>"<?= $Page->Repeated->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Repeated->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Repeated"><span id="el<?= $Page->RowCount ?>_patient_services_Repeated">
<span<?= $Page->Repeated->viewAttributes() ?>>
<?= $Page->Repeated->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->RepeatedBy->Visible) { // RepeatedBy ?>
        <td data-name="RepeatedBy" <?= $Page->RepeatedBy->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_RepeatedBy"><span id="el<?= $Page->RowCount ?>_patient_services_RepeatedBy" class="form-group">
<input type="<?= $Page->RepeatedBy->getInputTextType() ?>" data-table="patient_services" data-field="x_RepeatedBy" name="x<?= $Page->RowIndex ?>_RepeatedBy" id="x<?= $Page->RowIndex ?>_RepeatedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RepeatedBy->getPlaceHolder()) ?>" value="<?= $Page->RepeatedBy->EditValue ?>"<?= $Page->RepeatedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RepeatedBy->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_RepeatedBy" data-hidden="1" name="o<?= $Page->RowIndex ?>_RepeatedBy" id="o<?= $Page->RowIndex ?>_RepeatedBy" value="<?= HtmlEncode($Page->RepeatedBy->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_RepeatedBy"><span id="el<?= $Page->RowCount ?>_patient_services_RepeatedBy" class="form-group">
<input type="<?= $Page->RepeatedBy->getInputTextType() ?>" data-table="patient_services" data-field="x_RepeatedBy" name="x<?= $Page->RowIndex ?>_RepeatedBy" id="x<?= $Page->RowIndex ?>_RepeatedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RepeatedBy->getPlaceHolder()) ?>" value="<?= $Page->RepeatedBy->EditValue ?>"<?= $Page->RepeatedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RepeatedBy->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_RepeatedBy"><span id="el<?= $Page->RowCount ?>_patient_services_RepeatedBy">
<span<?= $Page->RepeatedBy->viewAttributes() ?>>
<?= $Page->RepeatedBy->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->RepeatedDate->Visible) { // RepeatedDate ?>
        <td data-name="RepeatedDate" <?= $Page->RepeatedDate->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_RepeatedDate"><span id="el<?= $Page->RowCount ?>_patient_services_RepeatedDate" class="form-group">
<input type="<?= $Page->RepeatedDate->getInputTextType() ?>" data-table="patient_services" data-field="x_RepeatedDate" name="x<?= $Page->RowIndex ?>_RepeatedDate" id="x<?= $Page->RowIndex ?>_RepeatedDate" placeholder="<?= HtmlEncode($Page->RepeatedDate->getPlaceHolder()) ?>" value="<?= $Page->RepeatedDate->EditValue ?>"<?= $Page->RepeatedDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RepeatedDate->getErrorMessage() ?></div>
<?php if (!$Page->RepeatedDate->ReadOnly && !$Page->RepeatedDate->Disabled && !isset($Page->RepeatedDate->EditAttrs["readonly"]) && !isset($Page->RepeatedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_serviceslist", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_serviceslist", "x<?= $Page->RowIndex ?>_RepeatedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_RepeatedDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_RepeatedDate" id="o<?= $Page->RowIndex ?>_RepeatedDate" value="<?= HtmlEncode($Page->RepeatedDate->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_RepeatedDate"><span id="el<?= $Page->RowCount ?>_patient_services_RepeatedDate" class="form-group">
<input type="<?= $Page->RepeatedDate->getInputTextType() ?>" data-table="patient_services" data-field="x_RepeatedDate" name="x<?= $Page->RowIndex ?>_RepeatedDate" id="x<?= $Page->RowIndex ?>_RepeatedDate" placeholder="<?= HtmlEncode($Page->RepeatedDate->getPlaceHolder()) ?>" value="<?= $Page->RepeatedDate->EditValue ?>"<?= $Page->RepeatedDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RepeatedDate->getErrorMessage() ?></div>
<?php if (!$Page->RepeatedDate->ReadOnly && !$Page->RepeatedDate->Disabled && !isset($Page->RepeatedDate->EditAttrs["readonly"]) && !isset($Page->RepeatedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_serviceslist", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_serviceslist", "x<?= $Page->RowIndex ?>_RepeatedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_RepeatedDate"><span id="el<?= $Page->RowCount ?>_patient_services_RepeatedDate">
<span<?= $Page->RepeatedDate->viewAttributes() ?>>
<?= $Page->RepeatedDate->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->serviceID->Visible) { // serviceID ?>
        <td data-name="serviceID" <?= $Page->serviceID->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_serviceID"><span id="el<?= $Page->RowCount ?>_patient_services_serviceID" class="form-group">
<input type="<?= $Page->serviceID->getInputTextType() ?>" data-table="patient_services" data-field="x_serviceID" name="x<?= $Page->RowIndex ?>_serviceID" id="x<?= $Page->RowIndex ?>_serviceID" size="30" placeholder="<?= HtmlEncode($Page->serviceID->getPlaceHolder()) ?>" value="<?= $Page->serviceID->EditValue ?>"<?= $Page->serviceID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->serviceID->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_serviceID" data-hidden="1" name="o<?= $Page->RowIndex ?>_serviceID" id="o<?= $Page->RowIndex ?>_serviceID" value="<?= HtmlEncode($Page->serviceID->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_serviceID"><span id="el<?= $Page->RowCount ?>_patient_services_serviceID" class="form-group">
<input type="<?= $Page->serviceID->getInputTextType() ?>" data-table="patient_services" data-field="x_serviceID" name="x<?= $Page->RowIndex ?>_serviceID" id="x<?= $Page->RowIndex ?>_serviceID" size="30" placeholder="<?= HtmlEncode($Page->serviceID->getPlaceHolder()) ?>" value="<?= $Page->serviceID->EditValue ?>"<?= $Page->serviceID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->serviceID->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_serviceID"><span id="el<?= $Page->RowCount ?>_patient_services_serviceID">
<span<?= $Page->serviceID->viewAttributes() ?>>
<?= $Page->serviceID->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Service_Type->Visible) { // Service_Type ?>
        <td data-name="Service_Type" <?= $Page->Service_Type->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Service_Type"><span id="el<?= $Page->RowCount ?>_patient_services_Service_Type" class="form-group">
<input type="<?= $Page->Service_Type->getInputTextType() ?>" data-table="patient_services" data-field="x_Service_Type" name="x<?= $Page->RowIndex ?>_Service_Type" id="x<?= $Page->RowIndex ?>_Service_Type" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Service_Type->getPlaceHolder()) ?>" value="<?= $Page->Service_Type->EditValue ?>"<?= $Page->Service_Type->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Service_Type->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_Service_Type" data-hidden="1" name="o<?= $Page->RowIndex ?>_Service_Type" id="o<?= $Page->RowIndex ?>_Service_Type" value="<?= HtmlEncode($Page->Service_Type->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Service_Type"><span id="el<?= $Page->RowCount ?>_patient_services_Service_Type" class="form-group">
<input type="<?= $Page->Service_Type->getInputTextType() ?>" data-table="patient_services" data-field="x_Service_Type" name="x<?= $Page->RowIndex ?>_Service_Type" id="x<?= $Page->RowIndex ?>_Service_Type" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Service_Type->getPlaceHolder()) ?>" value="<?= $Page->Service_Type->EditValue ?>"<?= $Page->Service_Type->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Service_Type->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Service_Type"><span id="el<?= $Page->RowCount ?>_patient_services_Service_Type">
<span<?= $Page->Service_Type->viewAttributes() ?>>
<?= $Page->Service_Type->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Service_Department->Visible) { // Service_Department ?>
        <td data-name="Service_Department" <?= $Page->Service_Department->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Service_Department"><span id="el<?= $Page->RowCount ?>_patient_services_Service_Department" class="form-group">
<input type="<?= $Page->Service_Department->getInputTextType() ?>" data-table="patient_services" data-field="x_Service_Department" name="x<?= $Page->RowIndex ?>_Service_Department" id="x<?= $Page->RowIndex ?>_Service_Department" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Service_Department->getPlaceHolder()) ?>" value="<?= $Page->Service_Department->EditValue ?>"<?= $Page->Service_Department->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Service_Department->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_Service_Department" data-hidden="1" name="o<?= $Page->RowIndex ?>_Service_Department" id="o<?= $Page->RowIndex ?>_Service_Department" value="<?= HtmlEncode($Page->Service_Department->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Service_Department"><span id="el<?= $Page->RowCount ?>_patient_services_Service_Department" class="form-group">
<input type="<?= $Page->Service_Department->getInputTextType() ?>" data-table="patient_services" data-field="x_Service_Department" name="x<?= $Page->RowIndex ?>_Service_Department" id="x<?= $Page->RowIndex ?>_Service_Department" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Service_Department->getPlaceHolder()) ?>" value="<?= $Page->Service_Department->EditValue ?>"<?= $Page->Service_Department->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Service_Department->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_Service_Department"><span id="el<?= $Page->RowCount ?>_patient_services_Service_Department">
<span<?= $Page->Service_Department->viewAttributes() ?>>
<?= $Page->Service_Department->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->RequestNo->Visible) { // RequestNo ?>
        <td data-name="RequestNo" <?= $Page->RequestNo->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_RequestNo"><span id="el<?= $Page->RowCount ?>_patient_services_RequestNo" class="form-group">
<input type="<?= $Page->RequestNo->getInputTextType() ?>" data-table="patient_services" data-field="x_RequestNo" name="x<?= $Page->RowIndex ?>_RequestNo" id="x<?= $Page->RowIndex ?>_RequestNo" size="30" placeholder="<?= HtmlEncode($Page->RequestNo->getPlaceHolder()) ?>" value="<?= $Page->RequestNo->EditValue ?>"<?= $Page->RequestNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RequestNo->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_services" data-field="x_RequestNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_RequestNo" id="o<?= $Page->RowIndex ?>_RequestNo" value="<?= HtmlEncode($Page->RequestNo->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_RequestNo"><span id="el<?= $Page->RowCount ?>_patient_services_RequestNo" class="form-group">
<input type="<?= $Page->RequestNo->getInputTextType() ?>" data-table="patient_services" data-field="x_RequestNo" name="x<?= $Page->RowIndex ?>_RequestNo" id="x<?= $Page->RowIndex ?>_RequestNo" size="30" placeholder="<?= HtmlEncode($Page->RequestNo->getPlaceHolder()) ?>" value="<?= $Page->RequestNo->EditValue ?>"<?= $Page->RequestNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RequestNo->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_services_RequestNo"><span id="el<?= $Page->RowCount ?>_patient_services_RequestNo">
<span<?= $Page->RequestNo->viewAttributes() ?>>
<?= $Page->RequestNo->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowCount, "block", $Page->TableVar, "patient_serviceslist");
?>
    </tr>
<?php if ($Page->RowType == ROWTYPE_ADD || $Page->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fpatient_serviceslist","load","customtemplate"], function () {
    fpatient_serviceslist.updateLists(<?= $Page->RowIndex ?>);
});
</script>
<?php } ?>
<?php
    }
    } // End delete row checking
    if (!$Page->isGridAdd())
        if (!$Page->Recordset->EOF) {
            $Page->Recordset->moveNext();
        }
}
?>
</tbody>
<?php
// Render aggregate row
$Page->RowType = ROWTYPE_AGGREGATE;
$Page->resetAttributes();
$Page->renderRow();
?>
<?php if ($Page->TotalRecords > 0 && !$Page->isGridAdd() && !$Page->isGridEdit()) { ?>
<tfoot><!-- Table footer -->
    <tr class="ew-table-footer">
<?php
// Render list options
$Page->renderListOptions();

// Render list options (footer, left)
$Page->ListOptions->render("footer", "left", "", "block", $Page->TableVar, "patient_serviceslist");
?>
    <?php if ($Page->id->Visible) { // id ?>
        <td data-name="id" class="<?= $Page->id->footerCellClass() ?>"><span id="elf_patient_services_id" class="patient_services_id">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->Reception->Visible) { // Reception ?>
        <td data-name="Reception" class="<?= $Page->Reception->footerCellClass() ?>"><span id="elf_patient_services_Reception" class="patient_services_Reception">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->Services->Visible) { // Services ?>
        <td data-name="Services" class="<?= $Page->Services->footerCellClass() ?>"><span id="elf_patient_services_Services" class="patient_services_Services">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->amount->Visible) { // amount ?>
        <td data-name="amount" class="<?= $Page->amount->footerCellClass() ?>"><span id="elf_patient_services_amount" class="patient_services_amount">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->description->Visible) { // description ?>
        <td data-name="description" class="<?= $Page->description->footerCellClass() ?>"><span id="elf_patient_services_description" class="patient_services_description">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->patient_type->Visible) { // patient_type ?>
        <td data-name="patient_type" class="<?= $Page->patient_type->footerCellClass() ?>"><span id="elf_patient_services_patient_type" class="patient_services_patient_type">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->charged_date->Visible) { // charged_date ?>
        <td data-name="charged_date" class="<?= $Page->charged_date->footerCellClass() ?>"><span id="elf_patient_services_charged_date" class="patient_services_charged_date">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->status->Visible) { // status ?>
        <td data-name="status" class="<?= $Page->status->footerCellClass() ?>"><span id="elf_patient_services_status" class="patient_services_status">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->mrnno->Visible) { // mrnno ?>
        <td data-name="mrnno" class="<?= $Page->mrnno->footerCellClass() ?>"><span id="elf_patient_services_mrnno" class="patient_services_mrnno">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName" class="<?= $Page->PatientName->footerCellClass() ?>"><span id="elf_patient_services_PatientName" class="patient_services_PatientName">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->Age->Visible) { // Age ?>
        <td data-name="Age" class="<?= $Page->Age->footerCellClass() ?>"><span id="elf_patient_services_Age" class="patient_services_Age">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->Gender->Visible) { // Gender ?>
        <td data-name="Gender" class="<?= $Page->Gender->footerCellClass() ?>"><span id="elf_patient_services_Gender" class="patient_services_Gender">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->Unit->Visible) { // Unit ?>
        <td data-name="Unit" class="<?= $Page->Unit->footerCellClass() ?>"><span id="elf_patient_services_Unit" class="patient_services_Unit">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->Quantity->Visible) { // Quantity ?>
        <td data-name="Quantity" class="<?= $Page->Quantity->footerCellClass() ?>"><span id="elf_patient_services_Quantity" class="patient_services_Quantity">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->Discount->Visible) { // Discount ?>
        <td data-name="Discount" class="<?= $Page->Discount->footerCellClass() ?>"><span id="elf_patient_services_Discount" class="patient_services_Discount">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->SubTotal->Visible) { // SubTotal ?>
        <td data-name="SubTotal" class="<?= $Page->SubTotal->footerCellClass() ?>"><span id="elf_patient_services_SubTotal" class="patient_services_SubTotal">
        <template id="tpg_patient_services_SubTotal" class="patient_serviceslist"><span<?= $Page->SubTotal->viewAttributes() ?>><span class="ew-aggregate-value"><span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->SubTotal->ViewValue ?></span></span></span></template>
        </span></td>
    <?php } ?>
    <?php if ($Page->ServiceSelect->Visible) { // ServiceSelect ?>
        <td data-name="ServiceSelect" class="<?= $Page->ServiceSelect->footerCellClass() ?>"><span id="elf_patient_services_ServiceSelect" class="patient_services_ServiceSelect">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->Aid->Visible) { // Aid ?>
        <td data-name="Aid" class="<?= $Page->Aid->footerCellClass() ?>"><span id="elf_patient_services_Aid" class="patient_services_Aid">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->Vid->Visible) { // Vid ?>
        <td data-name="Vid" class="<?= $Page->Vid->footerCellClass() ?>"><span id="elf_patient_services_Vid" class="patient_services_Vid">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->DrID->Visible) { // DrID ?>
        <td data-name="DrID" class="<?= $Page->DrID->footerCellClass() ?>"><span id="elf_patient_services_DrID" class="patient_services_DrID">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->DrCODE->Visible) { // DrCODE ?>
        <td data-name="DrCODE" class="<?= $Page->DrCODE->footerCellClass() ?>"><span id="elf_patient_services_DrCODE" class="patient_services_DrCODE">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->DrName->Visible) { // DrName ?>
        <td data-name="DrName" class="<?= $Page->DrName->footerCellClass() ?>"><span id="elf_patient_services_DrName" class="patient_services_DrName">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->Department->Visible) { // Department ?>
        <td data-name="Department" class="<?= $Page->Department->footerCellClass() ?>"><span id="elf_patient_services_Department" class="patient_services_Department">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->DrSharePres->Visible) { // DrSharePres ?>
        <td data-name="DrSharePres" class="<?= $Page->DrSharePres->footerCellClass() ?>"><span id="elf_patient_services_DrSharePres" class="patient_services_DrSharePres">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->HospSharePres->Visible) { // HospSharePres ?>
        <td data-name="HospSharePres" class="<?= $Page->HospSharePres->footerCellClass() ?>"><span id="elf_patient_services_HospSharePres" class="patient_services_HospSharePres">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->DrShareAmount->Visible) { // DrShareAmount ?>
        <td data-name="DrShareAmount" class="<?= $Page->DrShareAmount->footerCellClass() ?>"><span id="elf_patient_services_DrShareAmount" class="patient_services_DrShareAmount">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->HospShareAmount->Visible) { // HospShareAmount ?>
        <td data-name="HospShareAmount" class="<?= $Page->HospShareAmount->footerCellClass() ?>"><span id="elf_patient_services_HospShareAmount" class="patient_services_HospShareAmount">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
        <td data-name="DrShareSettiledAmount" class="<?= $Page->DrShareSettiledAmount->footerCellClass() ?>"><span id="elf_patient_services_DrShareSettiledAmount" class="patient_services_DrShareSettiledAmount">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->DrShareSettledId->Visible) { // DrShareSettledId ?>
        <td data-name="DrShareSettledId" class="<?= $Page->DrShareSettledId->footerCellClass() ?>"><span id="elf_patient_services_DrShareSettledId" class="patient_services_DrShareSettledId">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
        <td data-name="DrShareSettiledStatus" class="<?= $Page->DrShareSettiledStatus->footerCellClass() ?>"><span id="elf_patient_services_DrShareSettiledStatus" class="patient_services_DrShareSettiledStatus">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->invoiceId->Visible) { // invoiceId ?>
        <td data-name="invoiceId" class="<?= $Page->invoiceId->footerCellClass() ?>"><span id="elf_patient_services_invoiceId" class="patient_services_invoiceId">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->invoiceAmount->Visible) { // invoiceAmount ?>
        <td data-name="invoiceAmount" class="<?= $Page->invoiceAmount->footerCellClass() ?>"><span id="elf_patient_services_invoiceAmount" class="patient_services_invoiceAmount">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->invoiceStatus->Visible) { // invoiceStatus ?>
        <td data-name="invoiceStatus" class="<?= $Page->invoiceStatus->footerCellClass() ?>"><span id="elf_patient_services_invoiceStatus" class="patient_services_invoiceStatus">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->modeOfPayment->Visible) { // modeOfPayment ?>
        <td data-name="modeOfPayment" class="<?= $Page->modeOfPayment->footerCellClass() ?>"><span id="elf_patient_services_modeOfPayment" class="patient_services_modeOfPayment">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" class="<?= $Page->HospID->footerCellClass() ?>"><span id="elf_patient_services_HospID" class="patient_services_HospID">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->RIDNO->Visible) { // RIDNO ?>
        <td data-name="RIDNO" class="<?= $Page->RIDNO->footerCellClass() ?>"><span id="elf_patient_services_RIDNO" class="patient_services_RIDNO">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->TidNo->Visible) { // TidNo ?>
        <td data-name="TidNo" class="<?= $Page->TidNo->footerCellClass() ?>"><span id="elf_patient_services_TidNo" class="patient_services_TidNo">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->DiscountCategory->Visible) { // DiscountCategory ?>
        <td data-name="DiscountCategory" class="<?= $Page->DiscountCategory->footerCellClass() ?>"><span id="elf_patient_services_DiscountCategory" class="patient_services_DiscountCategory">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->sid->Visible) { // sid ?>
        <td data-name="sid" class="<?= $Page->sid->footerCellClass() ?>"><span id="elf_patient_services_sid" class="patient_services_sid">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->ItemCode->Visible) { // ItemCode ?>
        <td data-name="ItemCode" class="<?= $Page->ItemCode->footerCellClass() ?>"><span id="elf_patient_services_ItemCode" class="patient_services_ItemCode">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->TestSubCd->Visible) { // TestSubCd ?>
        <td data-name="TestSubCd" class="<?= $Page->TestSubCd->footerCellClass() ?>"><span id="elf_patient_services_TestSubCd" class="patient_services_TestSubCd">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->DEptCd->Visible) { // DEptCd ?>
        <td data-name="DEptCd" class="<?= $Page->DEptCd->footerCellClass() ?>"><span id="elf_patient_services_DEptCd" class="patient_services_DEptCd">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->ProfCd->Visible) { // ProfCd ?>
        <td data-name="ProfCd" class="<?= $Page->ProfCd->footerCellClass() ?>"><span id="elf_patient_services_ProfCd" class="patient_services_ProfCd">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->Comments->Visible) { // Comments ?>
        <td data-name="Comments" class="<?= $Page->Comments->footerCellClass() ?>"><span id="elf_patient_services_Comments" class="patient_services_Comments">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->Method->Visible) { // Method ?>
        <td data-name="Method" class="<?= $Page->Method->footerCellClass() ?>"><span id="elf_patient_services_Method" class="patient_services_Method">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->Specimen->Visible) { // Specimen ?>
        <td data-name="Specimen" class="<?= $Page->Specimen->footerCellClass() ?>"><span id="elf_patient_services_Specimen" class="patient_services_Specimen">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->Abnormal->Visible) { // Abnormal ?>
        <td data-name="Abnormal" class="<?= $Page->Abnormal->footerCellClass() ?>"><span id="elf_patient_services_Abnormal" class="patient_services_Abnormal">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->TestUnit->Visible) { // TestUnit ?>
        <td data-name="TestUnit" class="<?= $Page->TestUnit->footerCellClass() ?>"><span id="elf_patient_services_TestUnit" class="patient_services_TestUnit">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->LOWHIGH->Visible) { // LOWHIGH ?>
        <td data-name="LOWHIGH" class="<?= $Page->LOWHIGH->footerCellClass() ?>"><span id="elf_patient_services_LOWHIGH" class="patient_services_LOWHIGH">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->Branch->Visible) { // Branch ?>
        <td data-name="Branch" class="<?= $Page->Branch->footerCellClass() ?>"><span id="elf_patient_services_Branch" class="patient_services_Branch">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->Dispatch->Visible) { // Dispatch ?>
        <td data-name="Dispatch" class="<?= $Page->Dispatch->footerCellClass() ?>"><span id="elf_patient_services_Dispatch" class="patient_services_Dispatch">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->Pic1->Visible) { // Pic1 ?>
        <td data-name="Pic1" class="<?= $Page->Pic1->footerCellClass() ?>"><span id="elf_patient_services_Pic1" class="patient_services_Pic1">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->Pic2->Visible) { // Pic2 ?>
        <td data-name="Pic2" class="<?= $Page->Pic2->footerCellClass() ?>"><span id="elf_patient_services_Pic2" class="patient_services_Pic2">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->GraphPath->Visible) { // GraphPath ?>
        <td data-name="GraphPath" class="<?= $Page->GraphPath->footerCellClass() ?>"><span id="elf_patient_services_GraphPath" class="patient_services_GraphPath">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->MachineCD->Visible) { // MachineCD ?>
        <td data-name="MachineCD" class="<?= $Page->MachineCD->footerCellClass() ?>"><span id="elf_patient_services_MachineCD" class="patient_services_MachineCD">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->TestCancel->Visible) { // TestCancel ?>
        <td data-name="TestCancel" class="<?= $Page->TestCancel->footerCellClass() ?>"><span id="elf_patient_services_TestCancel" class="patient_services_TestCancel">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->OutSource->Visible) { // OutSource ?>
        <td data-name="OutSource" class="<?= $Page->OutSource->footerCellClass() ?>"><span id="elf_patient_services_OutSource" class="patient_services_OutSource">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->Printed->Visible) { // Printed ?>
        <td data-name="Printed" class="<?= $Page->Printed->footerCellClass() ?>"><span id="elf_patient_services_Printed" class="patient_services_Printed">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->PrintBy->Visible) { // PrintBy ?>
        <td data-name="PrintBy" class="<?= $Page->PrintBy->footerCellClass() ?>"><span id="elf_patient_services_PrintBy" class="patient_services_PrintBy">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->PrintDate->Visible) { // PrintDate ?>
        <td data-name="PrintDate" class="<?= $Page->PrintDate->footerCellClass() ?>"><span id="elf_patient_services_PrintDate" class="patient_services_PrintDate">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->BillingDate->Visible) { // BillingDate ?>
        <td data-name="BillingDate" class="<?= $Page->BillingDate->footerCellClass() ?>"><span id="elf_patient_services_BillingDate" class="patient_services_BillingDate">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->BilledBy->Visible) { // BilledBy ?>
        <td data-name="BilledBy" class="<?= $Page->BilledBy->footerCellClass() ?>"><span id="elf_patient_services_BilledBy" class="patient_services_BilledBy">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->Resulted->Visible) { // Resulted ?>
        <td data-name="Resulted" class="<?= $Page->Resulted->footerCellClass() ?>"><span id="elf_patient_services_Resulted" class="patient_services_Resulted">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->ResultDate->Visible) { // ResultDate ?>
        <td data-name="ResultDate" class="<?= $Page->ResultDate->footerCellClass() ?>"><span id="elf_patient_services_ResultDate" class="patient_services_ResultDate">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->ResultedBy->Visible) { // ResultedBy ?>
        <td data-name="ResultedBy" class="<?= $Page->ResultedBy->footerCellClass() ?>"><span id="elf_patient_services_ResultedBy" class="patient_services_ResultedBy">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->SampleDate->Visible) { // SampleDate ?>
        <td data-name="SampleDate" class="<?= $Page->SampleDate->footerCellClass() ?>"><span id="elf_patient_services_SampleDate" class="patient_services_SampleDate">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->SampleUser->Visible) { // SampleUser ?>
        <td data-name="SampleUser" class="<?= $Page->SampleUser->footerCellClass() ?>"><span id="elf_patient_services_SampleUser" class="patient_services_SampleUser">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->Sampled->Visible) { // Sampled ?>
        <td data-name="Sampled" class="<?= $Page->Sampled->footerCellClass() ?>"><span id="elf_patient_services_Sampled" class="patient_services_Sampled">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->ReceivedDate->Visible) { // ReceivedDate ?>
        <td data-name="ReceivedDate" class="<?= $Page->ReceivedDate->footerCellClass() ?>"><span id="elf_patient_services_ReceivedDate" class="patient_services_ReceivedDate">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->ReceivedUser->Visible) { // ReceivedUser ?>
        <td data-name="ReceivedUser" class="<?= $Page->ReceivedUser->footerCellClass() ?>"><span id="elf_patient_services_ReceivedUser" class="patient_services_ReceivedUser">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->Recevied->Visible) { // Recevied ?>
        <td data-name="Recevied" class="<?= $Page->Recevied->footerCellClass() ?>"><span id="elf_patient_services_Recevied" class="patient_services_Recevied">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->DeptRecvDate->Visible) { // DeptRecvDate ?>
        <td data-name="DeptRecvDate" class="<?= $Page->DeptRecvDate->footerCellClass() ?>"><span id="elf_patient_services_DeptRecvDate" class="patient_services_DeptRecvDate">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->DeptRecvUser->Visible) { // DeptRecvUser ?>
        <td data-name="DeptRecvUser" class="<?= $Page->DeptRecvUser->footerCellClass() ?>"><span id="elf_patient_services_DeptRecvUser" class="patient_services_DeptRecvUser">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->DeptRecived->Visible) { // DeptRecived ?>
        <td data-name="DeptRecived" class="<?= $Page->DeptRecived->footerCellClass() ?>"><span id="elf_patient_services_DeptRecived" class="patient_services_DeptRecived">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->SAuthDate->Visible) { // SAuthDate ?>
        <td data-name="SAuthDate" class="<?= $Page->SAuthDate->footerCellClass() ?>"><span id="elf_patient_services_SAuthDate" class="patient_services_SAuthDate">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->SAuthBy->Visible) { // SAuthBy ?>
        <td data-name="SAuthBy" class="<?= $Page->SAuthBy->footerCellClass() ?>"><span id="elf_patient_services_SAuthBy" class="patient_services_SAuthBy">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->SAuthendicate->Visible) { // SAuthendicate ?>
        <td data-name="SAuthendicate" class="<?= $Page->SAuthendicate->footerCellClass() ?>"><span id="elf_patient_services_SAuthendicate" class="patient_services_SAuthendicate">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->AuthDate->Visible) { // AuthDate ?>
        <td data-name="AuthDate" class="<?= $Page->AuthDate->footerCellClass() ?>"><span id="elf_patient_services_AuthDate" class="patient_services_AuthDate">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->AuthBy->Visible) { // AuthBy ?>
        <td data-name="AuthBy" class="<?= $Page->AuthBy->footerCellClass() ?>"><span id="elf_patient_services_AuthBy" class="patient_services_AuthBy">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->Authencate->Visible) { // Authencate ?>
        <td data-name="Authencate" class="<?= $Page->Authencate->footerCellClass() ?>"><span id="elf_patient_services_Authencate" class="patient_services_Authencate">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->EditDate->Visible) { // EditDate ?>
        <td data-name="EditDate" class="<?= $Page->EditDate->footerCellClass() ?>"><span id="elf_patient_services_EditDate" class="patient_services_EditDate">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->EditBy->Visible) { // EditBy ?>
        <td data-name="EditBy" class="<?= $Page->EditBy->footerCellClass() ?>"><span id="elf_patient_services_EditBy" class="patient_services_EditBy">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->Editted->Visible) { // Editted ?>
        <td data-name="Editted" class="<?= $Page->Editted->footerCellClass() ?>"><span id="elf_patient_services_Editted" class="patient_services_Editted">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->PatID->Visible) { // PatID ?>
        <td data-name="PatID" class="<?= $Page->PatID->footerCellClass() ?>"><span id="elf_patient_services_PatID" class="patient_services_PatID">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->PatientId->Visible) { // PatientId ?>
        <td data-name="PatientId" class="<?= $Page->PatientId->footerCellClass() ?>"><span id="elf_patient_services_PatientId" class="patient_services_PatientId">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->Mobile->Visible) { // Mobile ?>
        <td data-name="Mobile" class="<?= $Page->Mobile->footerCellClass() ?>"><span id="elf_patient_services_Mobile" class="patient_services_Mobile">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->CId->Visible) { // CId ?>
        <td data-name="CId" class="<?= $Page->CId->footerCellClass() ?>"><span id="elf_patient_services_CId" class="patient_services_CId">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->Order->Visible) { // Order ?>
        <td data-name="Order" class="<?= $Page->Order->footerCellClass() ?>"><span id="elf_patient_services_Order" class="patient_services_Order">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->ResType->Visible) { // ResType ?>
        <td data-name="ResType" class="<?= $Page->ResType->footerCellClass() ?>"><span id="elf_patient_services_ResType" class="patient_services_ResType">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->Sample->Visible) { // Sample ?>
        <td data-name="Sample" class="<?= $Page->Sample->footerCellClass() ?>"><span id="elf_patient_services_Sample" class="patient_services_Sample">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->NoD->Visible) { // NoD ?>
        <td data-name="NoD" class="<?= $Page->NoD->footerCellClass() ?>"><span id="elf_patient_services_NoD" class="patient_services_NoD">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->BillOrder->Visible) { // BillOrder ?>
        <td data-name="BillOrder" class="<?= $Page->BillOrder->footerCellClass() ?>"><span id="elf_patient_services_BillOrder" class="patient_services_BillOrder">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->Inactive->Visible) { // Inactive ?>
        <td data-name="Inactive" class="<?= $Page->Inactive->footerCellClass() ?>"><span id="elf_patient_services_Inactive" class="patient_services_Inactive">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->CollSample->Visible) { // CollSample ?>
        <td data-name="CollSample" class="<?= $Page->CollSample->footerCellClass() ?>"><span id="elf_patient_services_CollSample" class="patient_services_CollSample">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->TestType->Visible) { // TestType ?>
        <td data-name="TestType" class="<?= $Page->TestType->footerCellClass() ?>"><span id="elf_patient_services_TestType" class="patient_services_TestType">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->Repeated->Visible) { // Repeated ?>
        <td data-name="Repeated" class="<?= $Page->Repeated->footerCellClass() ?>"><span id="elf_patient_services_Repeated" class="patient_services_Repeated">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->RepeatedBy->Visible) { // RepeatedBy ?>
        <td data-name="RepeatedBy" class="<?= $Page->RepeatedBy->footerCellClass() ?>"><span id="elf_patient_services_RepeatedBy" class="patient_services_RepeatedBy">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->RepeatedDate->Visible) { // RepeatedDate ?>
        <td data-name="RepeatedDate" class="<?= $Page->RepeatedDate->footerCellClass() ?>"><span id="elf_patient_services_RepeatedDate" class="patient_services_RepeatedDate">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->serviceID->Visible) { // serviceID ?>
        <td data-name="serviceID" class="<?= $Page->serviceID->footerCellClass() ?>"><span id="elf_patient_services_serviceID" class="patient_services_serviceID">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->Service_Type->Visible) { // Service_Type ?>
        <td data-name="Service_Type" class="<?= $Page->Service_Type->footerCellClass() ?>"><span id="elf_patient_services_Service_Type" class="patient_services_Service_Type">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->Service_Department->Visible) { // Service_Department ?>
        <td data-name="Service_Department" class="<?= $Page->Service_Department->footerCellClass() ?>"><span id="elf_patient_services_Service_Department" class="patient_services_Service_Department">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->RequestNo->Visible) { // RequestNo ?>
        <td data-name="RequestNo" class="<?= $Page->RequestNo->footerCellClass() ?>"><span id="elf_patient_services_RequestNo" class="patient_services_RequestNo">
        &nbsp;
        </span></td>
    <?php } ?>
<?php
// Render list options (footer, right)
$Page->ListOptions->render("footer", "right", "", "block", $Page->TableVar, "patient_serviceslist");
?>
    </tr>
</tfoot>
<?php } ?>
</table><!-- /.ew-table -->
<?php } ?>
<div id="tpd_patient_serviceslist" class="ew-custom-template"></div>
<template id="tpm_patient_serviceslist">
<div id="ct_PatientServicesList"><?php if ($Page->RowCount > 0) { ?>
<table class="ew-table">
  <thead>
	<tr class="ew-table-header">
	<th  class="text-center" >*</th>
	  <th  class="text-center" ><slot class="ew-slot" name="tpc_patient_services_Services"></slot></th>
	  <th  class="text-center" ><slot class="ew-slot" name="tpc_patient_services_amount"></slot></th>
	  <th  class="text-center" ><slot class="ew-slot" name="tpc_patient_services_ServiceSelect"></slot></th>
	  <th  class="text-center" ><slot class="ew-slot" name="tpc_patient_services_Quantity"></slot></th>
	  <th  class="text-center" ><slot class="ew-slot" name="tpc_patient_services_Discount"></slot></th>
	  <th  class="text-center" ><slot class="ew-slot" name="tpc_patient_services_SubTotal"></slot></th>
	  <th  class="text-center" ><slot class="ew-slot" name="tpc_patient_services_description"></slot></th>
	   <th hidden class="text-center" ><slot class="ew-slot" name="tpc_patient_services_serviceID"></slot></th>
	    <th hidden class="text-center" ><slot class="ew-slot" name="tpc_patient_services_Service_Type"></slot></th>
	     <th hidden class="text-center" ><slot class="ew-slot" name="tpc_patient_services_Service_Department"></slot></th>
	     <th  class="text-center" ><slot class="ew-slot" name="tpc_patient_services_sid"></slot></th>
	     <th  class="text-center" ><slot class="ew-slot" name="tpc_patient_services_ItemCode"></slot></th>
	</tr>
  </thead>
  <tbody>
<?php for ($i = $Page->StartRowCount; $i <= $Page->RowCount; $i++) { ?>
<tr>
<td class="ew-list-option-body text-nowrap" data-name="button" rowspan="1"><div style="width: 25px;"><div class="btn-group btn-group-sm ew-btn-group"><a class="btn btn-default ew-grid-link ew-grid-delete" id="RowDeleteButton<?php echo $i ?>" title="" data-caption="Delete" onclick="return ew.deleteGridRow(this, <?php echo $i ?>);" data-original-title="Delete"><i data-phrase="DeleteLink" class="fa fa-trash ew-icon" data-caption="Delete"></i></a></div></div></td>
	  <td><slot class="ew-slot" name="tpx<?= $i ?>_patient_services_Services"></slot></td>
	  <td><slot class="ew-slot" name="tpx<?= $i ?>_patient_services_amount"></slot></td>
	  <td><slot class="ew-slot" name="tpx<?= $i ?>_patient_services_ServiceSelect"></slot></td>
	  <td><slot class="ew-slot" name="tpx<?= $i ?>_patient_services_Quantity"></slot></td>
	  <td><slot class="ew-slot" name="tpx<?= $i ?>_patient_services_Discount"></slot></td>
	  <td><slot class="ew-slot" name="tpx<?= $i ?>_patient_services_SubTotal"></slot></td>
	  <td><slot class="ew-slot" name="tpx<?= $i ?>_patient_services_description"></slot></td>
	   <td hidden ><slot class="ew-slot" name="tpx<?= $i ?>_patient_services_serviceID"></slot></td>
	   <td hidden ><slot class="ew-slot" name="tpx<?= $i ?>_patient_services_Service_Type"></slot></td>
	   <td hidden ><slot class="ew-slot" name="tpx<?= $i ?>_patient_services_Service_Department"></slot></td>
	    <td  ><slot class="ew-slot" name="tpx<?= $i ?>_patient_services_sid"></slot></td>
	     <td  ><slot class="ew-slot" name="tpx<?= $i ?>_patient_services_ItemCode"></slot></td>
</tr>
<?php } ?>
</tbody>
	<?php if ($Page->TotalRecords > 0 && !$patient_services->isGridAdd() && !$patient_services->isGridEdit()) { ?>
<tfoot>
		<tr class="ew-table-footer"><td class="ew-slot" id="tpof_patient_services" data-rowspan="1"></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td><slot class="ew-slot" name="tpg_patient_services_SubTotal"></slot></td>
			<td>&nbsp;</td>
		</tr>
	</tfoot>
<?php } ?>
</table>
<?php } ?>
</div>
</template>
</div><!-- /.ew-grid-middle-panel -->
<?php if ($Page->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?= $Page->FormKeyCountName ?>" id="<?= $Page->FormKeyCountName ?>" value="<?= $Page->KeyCount ?>">
<?= $Page->MultiSelectKey ?>
<?php } ?>
<?php if (!$Page->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php
// Close recordset
if ($Page->Recordset) {
    $Page->Recordset->close();
}
?>
<?php if (!$Page->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$Page->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?= CurrentPageUrl(false) ?>">
<?= $Page->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $Page->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($Page->TotalRecords == 0 && !$Page->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $Page->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($Page->Rows) ?> };
    ew.applyTemplate("tpd_patient_serviceslist", "tpm_patient_serviceslist", "patient_serviceslist", "<?= $Page->CustomExport ?>", ew.templateData);
    loadjs.done("customtemplate");
});
</script>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<?php if (!$Page->isExport()) { ?>
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
<?php if (!$Page->isExport()) { ?>
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
