<?php

namespace PHPMaker2021\HIMS;

// Page object
$LabTestResultList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var flab_test_resultlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    flab_test_resultlist = currentForm = new ew.Form("flab_test_resultlist", "list");
    flab_test_resultlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "lab_test_result")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.lab_test_result)
        ew.vars.tables.lab_test_result = currentTable;
    flab_test_resultlist.addFields([
        ["Branch", [fields.Branch.visible && fields.Branch.required ? ew.Validators.required(fields.Branch.caption) : null], fields.Branch.isInvalid],
        ["SidNo", [fields.SidNo.visible && fields.SidNo.required ? ew.Validators.required(fields.SidNo.caption) : null], fields.SidNo.isInvalid],
        ["SidDate", [fields.SidDate.visible && fields.SidDate.required ? ew.Validators.required(fields.SidDate.caption) : null, ew.Validators.datetime(0)], fields.SidDate.isInvalid],
        ["TestCd", [fields.TestCd.visible && fields.TestCd.required ? ew.Validators.required(fields.TestCd.caption) : null], fields.TestCd.isInvalid],
        ["TestSubCd", [fields.TestSubCd.visible && fields.TestSubCd.required ? ew.Validators.required(fields.TestSubCd.caption) : null], fields.TestSubCd.isInvalid],
        ["DEptCd", [fields.DEptCd.visible && fields.DEptCd.required ? ew.Validators.required(fields.DEptCd.caption) : null], fields.DEptCd.isInvalid],
        ["ProfCd", [fields.ProfCd.visible && fields.ProfCd.required ? ew.Validators.required(fields.ProfCd.caption) : null], fields.ProfCd.isInvalid],
        ["ResultDate", [fields.ResultDate.visible && fields.ResultDate.required ? ew.Validators.required(fields.ResultDate.caption) : null, ew.Validators.datetime(0)], fields.ResultDate.isInvalid],
        ["Method", [fields.Method.visible && fields.Method.required ? ew.Validators.required(fields.Method.caption) : null], fields.Method.isInvalid],
        ["Specimen", [fields.Specimen.visible && fields.Specimen.required ? ew.Validators.required(fields.Specimen.caption) : null], fields.Specimen.isInvalid],
        ["Amount", [fields.Amount.visible && fields.Amount.required ? ew.Validators.required(fields.Amount.caption) : null, ew.Validators.float], fields.Amount.isInvalid],
        ["ResultBy", [fields.ResultBy.visible && fields.ResultBy.required ? ew.Validators.required(fields.ResultBy.caption) : null], fields.ResultBy.isInvalid],
        ["AuthBy", [fields.AuthBy.visible && fields.AuthBy.required ? ew.Validators.required(fields.AuthBy.caption) : null], fields.AuthBy.isInvalid],
        ["AuthDate", [fields.AuthDate.visible && fields.AuthDate.required ? ew.Validators.required(fields.AuthDate.caption) : null, ew.Validators.datetime(0)], fields.AuthDate.isInvalid],
        ["Abnormal", [fields.Abnormal.visible && fields.Abnormal.required ? ew.Validators.required(fields.Abnormal.caption) : null], fields.Abnormal.isInvalid],
        ["Printed", [fields.Printed.visible && fields.Printed.required ? ew.Validators.required(fields.Printed.caption) : null], fields.Printed.isInvalid],
        ["Dispatch", [fields.Dispatch.visible && fields.Dispatch.required ? ew.Validators.required(fields.Dispatch.caption) : null], fields.Dispatch.isInvalid],
        ["LOWHIGH", [fields.LOWHIGH.visible && fields.LOWHIGH.required ? ew.Validators.required(fields.LOWHIGH.caption) : null], fields.LOWHIGH.isInvalid],
        ["Unit", [fields.Unit.visible && fields.Unit.required ? ew.Validators.required(fields.Unit.caption) : null], fields.Unit.isInvalid],
        ["ResDate", [fields.ResDate.visible && fields.ResDate.required ? ew.Validators.required(fields.ResDate.caption) : null, ew.Validators.datetime(0)], fields.ResDate.isInvalid],
        ["Pic1", [fields.Pic1.visible && fields.Pic1.required ? ew.Validators.required(fields.Pic1.caption) : null], fields.Pic1.isInvalid],
        ["Pic2", [fields.Pic2.visible && fields.Pic2.required ? ew.Validators.required(fields.Pic2.caption) : null], fields.Pic2.isInvalid],
        ["GraphPath", [fields.GraphPath.visible && fields.GraphPath.required ? ew.Validators.required(fields.GraphPath.caption) : null], fields.GraphPath.isInvalid],
        ["SampleDate", [fields.SampleDate.visible && fields.SampleDate.required ? ew.Validators.required(fields.SampleDate.caption) : null, ew.Validators.datetime(0)], fields.SampleDate.isInvalid],
        ["SampleUser", [fields.SampleUser.visible && fields.SampleUser.required ? ew.Validators.required(fields.SampleUser.caption) : null], fields.SampleUser.isInvalid],
        ["ReceivedDate", [fields.ReceivedDate.visible && fields.ReceivedDate.required ? ew.Validators.required(fields.ReceivedDate.caption) : null, ew.Validators.datetime(0)], fields.ReceivedDate.isInvalid],
        ["ReceivedUser", [fields.ReceivedUser.visible && fields.ReceivedUser.required ? ew.Validators.required(fields.ReceivedUser.caption) : null], fields.ReceivedUser.isInvalid],
        ["DeptRecvDate", [fields.DeptRecvDate.visible && fields.DeptRecvDate.required ? ew.Validators.required(fields.DeptRecvDate.caption) : null, ew.Validators.datetime(0)], fields.DeptRecvDate.isInvalid],
        ["DeptRecvUser", [fields.DeptRecvUser.visible && fields.DeptRecvUser.required ? ew.Validators.required(fields.DeptRecvUser.caption) : null], fields.DeptRecvUser.isInvalid],
        ["PrintBy", [fields.PrintBy.visible && fields.PrintBy.required ? ew.Validators.required(fields.PrintBy.caption) : null], fields.PrintBy.isInvalid],
        ["PrintDate", [fields.PrintDate.visible && fields.PrintDate.required ? ew.Validators.required(fields.PrintDate.caption) : null, ew.Validators.datetime(0)], fields.PrintDate.isInvalid],
        ["MachineCD", [fields.MachineCD.visible && fields.MachineCD.required ? ew.Validators.required(fields.MachineCD.caption) : null], fields.MachineCD.isInvalid],
        ["TestCancel", [fields.TestCancel.visible && fields.TestCancel.required ? ew.Validators.required(fields.TestCancel.caption) : null], fields.TestCancel.isInvalid],
        ["OutSource", [fields.OutSource.visible && fields.OutSource.required ? ew.Validators.required(fields.OutSource.caption) : null], fields.OutSource.isInvalid],
        ["Tariff", [fields.Tariff.visible && fields.Tariff.required ? ew.Validators.required(fields.Tariff.caption) : null, ew.Validators.float], fields.Tariff.isInvalid],
        ["EDITDATE", [fields.EDITDATE.visible && fields.EDITDATE.required ? ew.Validators.required(fields.EDITDATE.caption) : null, ew.Validators.datetime(0)], fields.EDITDATE.isInvalid],
        ["UPLOAD", [fields.UPLOAD.visible && fields.UPLOAD.required ? ew.Validators.required(fields.UPLOAD.caption) : null], fields.UPLOAD.isInvalid],
        ["SAuthDate", [fields.SAuthDate.visible && fields.SAuthDate.required ? ew.Validators.required(fields.SAuthDate.caption) : null, ew.Validators.datetime(0)], fields.SAuthDate.isInvalid],
        ["SAuthBy", [fields.SAuthBy.visible && fields.SAuthBy.required ? ew.Validators.required(fields.SAuthBy.caption) : null], fields.SAuthBy.isInvalid],
        ["NoRC", [fields.NoRC.visible && fields.NoRC.required ? ew.Validators.required(fields.NoRC.caption) : null], fields.NoRC.isInvalid],
        ["DispDt", [fields.DispDt.visible && fields.DispDt.required ? ew.Validators.required(fields.DispDt.caption) : null, ew.Validators.datetime(0)], fields.DispDt.isInvalid],
        ["DispUser", [fields.DispUser.visible && fields.DispUser.required ? ew.Validators.required(fields.DispUser.caption) : null], fields.DispUser.isInvalid],
        ["DispRemarks", [fields.DispRemarks.visible && fields.DispRemarks.required ? ew.Validators.required(fields.DispRemarks.caption) : null], fields.DispRemarks.isInvalid],
        ["DispMode", [fields.DispMode.visible && fields.DispMode.required ? ew.Validators.required(fields.DispMode.caption) : null], fields.DispMode.isInvalid],
        ["ProductCD", [fields.ProductCD.visible && fields.ProductCD.required ? ew.Validators.required(fields.ProductCD.caption) : null], fields.ProductCD.isInvalid],
        ["Nos", [fields.Nos.visible && fields.Nos.required ? ew.Validators.required(fields.Nos.caption) : null, ew.Validators.float], fields.Nos.isInvalid],
        ["WBCPath", [fields.WBCPath.visible && fields.WBCPath.required ? ew.Validators.required(fields.WBCPath.caption) : null], fields.WBCPath.isInvalid],
        ["RBCPath", [fields.RBCPath.visible && fields.RBCPath.required ? ew.Validators.required(fields.RBCPath.caption) : null], fields.RBCPath.isInvalid],
        ["PTPath", [fields.PTPath.visible && fields.PTPath.required ? ew.Validators.required(fields.PTPath.caption) : null], fields.PTPath.isInvalid],
        ["ActualAmt", [fields.ActualAmt.visible && fields.ActualAmt.required ? ew.Validators.required(fields.ActualAmt.caption) : null, ew.Validators.float], fields.ActualAmt.isInvalid],
        ["NoSign", [fields.NoSign.visible && fields.NoSign.required ? ew.Validators.required(fields.NoSign.caption) : null], fields.NoSign.isInvalid],
        ["_Barcode", [fields._Barcode.visible && fields._Barcode.required ? ew.Validators.required(fields._Barcode.caption) : null], fields._Barcode.isInvalid],
        ["ReadTime", [fields.ReadTime.visible && fields.ReadTime.required ? ew.Validators.required(fields.ReadTime.caption) : null, ew.Validators.datetime(0)], fields.ReadTime.isInvalid],
        ["VailID", [fields.VailID.visible && fields.VailID.required ? ew.Validators.required(fields.VailID.caption) : null], fields.VailID.isInvalid],
        ["ReadMachine", [fields.ReadMachine.visible && fields.ReadMachine.required ? ew.Validators.required(fields.ReadMachine.caption) : null], fields.ReadMachine.isInvalid],
        ["LabCD", [fields.LabCD.visible && fields.LabCD.required ? ew.Validators.required(fields.LabCD.caption) : null], fields.LabCD.isInvalid],
        ["OutLabAmt", [fields.OutLabAmt.visible && fields.OutLabAmt.required ? ew.Validators.required(fields.OutLabAmt.caption) : null, ew.Validators.float], fields.OutLabAmt.isInvalid],
        ["ProductQty", [fields.ProductQty.visible && fields.ProductQty.required ? ew.Validators.required(fields.ProductQty.caption) : null, ew.Validators.float], fields.ProductQty.isInvalid],
        ["Repeat", [fields.Repeat.visible && fields.Repeat.required ? ew.Validators.required(fields.Repeat.caption) : null], fields.Repeat.isInvalid],
        ["DeptNo", [fields.DeptNo.visible && fields.DeptNo.required ? ew.Validators.required(fields.DeptNo.caption) : null], fields.DeptNo.isInvalid],
        ["Desc1", [fields.Desc1.visible && fields.Desc1.required ? ew.Validators.required(fields.Desc1.caption) : null], fields.Desc1.isInvalid],
        ["Desc2", [fields.Desc2.visible && fields.Desc2.required ? ew.Validators.required(fields.Desc2.caption) : null], fields.Desc2.isInvalid],
        ["RptResult", [fields.RptResult.visible && fields.RptResult.required ? ew.Validators.required(fields.RptResult.caption) : null], fields.RptResult.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = flab_test_resultlist,
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
    flab_test_resultlist.validate = function () {
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
        if (gridinsert && addcnt == 0) { // No row added
            ew.alert(ew.language.phrase("NoAddRecord"));
            return false;
        }
        return true;
    }

    // Check empty row
    flab_test_resultlist.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "Branch", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SidNo", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SidDate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "TestCd", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "TestSubCd", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DEptCd", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ProfCd", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ResultDate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Method", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Specimen", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Amount", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ResultBy", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "AuthBy", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "AuthDate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Abnormal", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Printed", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Dispatch", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "LOWHIGH", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Unit", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ResDate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Pic1", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Pic2", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "GraphPath", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SampleDate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SampleUser", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ReceivedDate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ReceivedUser", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DeptRecvDate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DeptRecvUser", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PrintBy", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PrintDate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "MachineCD", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "TestCancel", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "OutSource", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Tariff", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "EDITDATE", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "UPLOAD", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SAuthDate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SAuthBy", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "NoRC", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DispDt", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DispUser", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DispRemarks", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DispMode", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ProductCD", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Nos", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "WBCPath", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "RBCPath", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PTPath", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ActualAmt", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "NoSign", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "_Barcode", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ReadTime", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "VailID", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ReadMachine", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "LabCD", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "OutLabAmt", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ProductQty", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Repeat", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DeptNo", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Desc1", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Desc2", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "RptResult", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    flab_test_resultlist.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    flab_test_resultlist.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("flab_test_resultlist");
});
var flab_test_resultlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    flab_test_resultlistsrch = currentSearchForm = new ew.Form("flab_test_resultlistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "lab_test_result")) ?>,
        fields = currentTable.fields;
    flab_test_resultlistsrch.addFields([
        ["Branch", [], fields.Branch.isInvalid],
        ["SidNo", [], fields.SidNo.isInvalid],
        ["SidDate", [ew.Validators.datetime(0)], fields.SidDate.isInvalid],
        ["TestCd", [], fields.TestCd.isInvalid],
        ["TestSubCd", [], fields.TestSubCd.isInvalid],
        ["DEptCd", [], fields.DEptCd.isInvalid],
        ["ProfCd", [], fields.ProfCd.isInvalid],
        ["ResultDate", [], fields.ResultDate.isInvalid],
        ["Method", [], fields.Method.isInvalid],
        ["Specimen", [], fields.Specimen.isInvalid],
        ["Amount", [], fields.Amount.isInvalid],
        ["ResultBy", [], fields.ResultBy.isInvalid],
        ["AuthBy", [], fields.AuthBy.isInvalid],
        ["AuthDate", [], fields.AuthDate.isInvalid],
        ["Abnormal", [], fields.Abnormal.isInvalid],
        ["Printed", [], fields.Printed.isInvalid],
        ["Dispatch", [], fields.Dispatch.isInvalid],
        ["LOWHIGH", [], fields.LOWHIGH.isInvalid],
        ["Unit", [], fields.Unit.isInvalid],
        ["ResDate", [], fields.ResDate.isInvalid],
        ["Pic1", [], fields.Pic1.isInvalid],
        ["Pic2", [], fields.Pic2.isInvalid],
        ["GraphPath", [], fields.GraphPath.isInvalid],
        ["SampleDate", [], fields.SampleDate.isInvalid],
        ["SampleUser", [], fields.SampleUser.isInvalid],
        ["ReceivedDate", [], fields.ReceivedDate.isInvalid],
        ["ReceivedUser", [], fields.ReceivedUser.isInvalid],
        ["DeptRecvDate", [], fields.DeptRecvDate.isInvalid],
        ["DeptRecvUser", [], fields.DeptRecvUser.isInvalid],
        ["PrintBy", [], fields.PrintBy.isInvalid],
        ["PrintDate", [], fields.PrintDate.isInvalid],
        ["MachineCD", [], fields.MachineCD.isInvalid],
        ["TestCancel", [], fields.TestCancel.isInvalid],
        ["OutSource", [], fields.OutSource.isInvalid],
        ["Tariff", [], fields.Tariff.isInvalid],
        ["EDITDATE", [], fields.EDITDATE.isInvalid],
        ["UPLOAD", [], fields.UPLOAD.isInvalid],
        ["SAuthDate", [], fields.SAuthDate.isInvalid],
        ["SAuthBy", [], fields.SAuthBy.isInvalid],
        ["NoRC", [], fields.NoRC.isInvalid],
        ["DispDt", [], fields.DispDt.isInvalid],
        ["DispUser", [], fields.DispUser.isInvalid],
        ["DispRemarks", [], fields.DispRemarks.isInvalid],
        ["DispMode", [], fields.DispMode.isInvalid],
        ["ProductCD", [], fields.ProductCD.isInvalid],
        ["Nos", [], fields.Nos.isInvalid],
        ["WBCPath", [], fields.WBCPath.isInvalid],
        ["RBCPath", [], fields.RBCPath.isInvalid],
        ["PTPath", [], fields.PTPath.isInvalid],
        ["ActualAmt", [], fields.ActualAmt.isInvalid],
        ["NoSign", [], fields.NoSign.isInvalid],
        ["_Barcode", [], fields._Barcode.isInvalid],
        ["ReadTime", [], fields.ReadTime.isInvalid],
        ["VailID", [], fields.VailID.isInvalid],
        ["ReadMachine", [], fields.ReadMachine.isInvalid],
        ["LabCD", [], fields.LabCD.isInvalid],
        ["OutLabAmt", [], fields.OutLabAmt.isInvalid],
        ["ProductQty", [], fields.ProductQty.isInvalid],
        ["Repeat", [], fields.Repeat.isInvalid],
        ["DeptNo", [], fields.DeptNo.isInvalid],
        ["Desc1", [], fields.Desc1.isInvalid],
        ["Desc2", [], fields.Desc2.isInvalid],
        ["RptResult", [], fields.RptResult.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        flab_test_resultlistsrch.setInvalid();
    });

    // Validate form
    flab_test_resultlistsrch.validate = function () {
        if (!this.validateRequired)
            return true; // Ignore validation
        var fobj = this.getForm(),
            $fobj = $(fobj),
            rowIndex = "";
        $fobj.data("rowindex", rowIndex);

        // Validate fields
        if (!this.validateFields(rowIndex))
            return false;

        // Call Form_CustomValidate event
        if (!this.customValidate(fobj)) {
            this.focus();
            return false;
        }
        return true;
    }

    // Form_CustomValidate
    flab_test_resultlistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    flab_test_resultlistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists

    // Filters
    flab_test_resultlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("flab_test_resultlistsrch");
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
<?php
$Page->renderOtherOptions();
?>
<?php if ($Security->canSearch()) { ?>
<?php if (!$Page->isExport() && !$Page->CurrentAction) { ?>
<form name="flab_test_resultlistsrch" id="flab_test_resultlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="flab_test_resultlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="lab_test_result">
    <div class="ew-extended-search">
<?php
// Render search row
$Page->RowType = ROWTYPE_SEARCH;
$Page->resetAttributes();
$Page->renderRow();
?>
<?php if ($Page->SidNo->Visible) { // SidNo ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_SidNo" class="ew-cell form-group">
        <label for="x_SidNo" class="ew-search-caption ew-label"><?= $Page->SidNo->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_SidNo" id="z_SidNo" value="LIKE">
</span>
        <span id="el_lab_test_result_SidNo" class="ew-search-field">
<input type="<?= $Page->SidNo->getInputTextType() ?>" data-table="lab_test_result" data-field="x_SidNo" name="x_SidNo" id="x_SidNo" size="30" maxlength="6" placeholder="<?= HtmlEncode($Page->SidNo->getPlaceHolder()) ?>" value="<?= $Page->SidNo->EditValue ?>"<?= $Page->SidNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SidNo->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->SidDate->Visible) { // SidDate ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_SidDate" class="ew-cell form-group">
        <label for="x_SidDate" class="ew-search-caption ew-label"><?= $Page->SidDate->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_SidDate" id="z_SidDate" value="=">
</span>
        <span id="el_lab_test_result_SidDate" class="ew-search-field">
<input type="<?= $Page->SidDate->getInputTextType() ?>" data-table="lab_test_result" data-field="x_SidDate" name="x_SidDate" id="x_SidDate" placeholder="<?= HtmlEncode($Page->SidDate->getPlaceHolder()) ?>" value="<?= $Page->SidDate->EditValue ?>"<?= $Page->SidDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SidDate->getErrorMessage(false) ?></div>
<?php if (!$Page->SidDate->ReadOnly && !$Page->SidDate->Disabled && !isset($Page->SidDate->EditAttrs["readonly"]) && !isset($Page->SidDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultlistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("flab_test_resultlistsrch", "x_SidDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow > 0) { ?>
</div>
    <?php } ?>
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> lab_test_result">
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
<form name="flab_test_resultlist" id="flab_test_resultlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="lab_test_result">
<div id="gmp_lab_test_result" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_lab_test_resultlist" class="table ew-table"><!-- .ew-table -->
<thead>
    <tr class="ew-table-header">
<?php
// Header row
$Page->RowType = ROWTYPE_HEADER;

// Render list options
$Page->renderListOptions();

// Render list options (header, left)
$Page->ListOptions->render("header", "left");
?>
<?php if ($Page->Branch->Visible) { // Branch ?>
        <th data-name="Branch" class="<?= $Page->Branch->headerCellClass() ?>"><div id="elh_lab_test_result_Branch" class="lab_test_result_Branch"><?= $Page->renderSort($Page->Branch) ?></div></th>
<?php } ?>
<?php if ($Page->SidNo->Visible) { // SidNo ?>
        <th data-name="SidNo" class="<?= $Page->SidNo->headerCellClass() ?>"><div id="elh_lab_test_result_SidNo" class="lab_test_result_SidNo"><?= $Page->renderSort($Page->SidNo) ?></div></th>
<?php } ?>
<?php if ($Page->SidDate->Visible) { // SidDate ?>
        <th data-name="SidDate" class="<?= $Page->SidDate->headerCellClass() ?>"><div id="elh_lab_test_result_SidDate" class="lab_test_result_SidDate"><?= $Page->renderSort($Page->SidDate) ?></div></th>
<?php } ?>
<?php if ($Page->TestCd->Visible) { // TestCd ?>
        <th data-name="TestCd" class="<?= $Page->TestCd->headerCellClass() ?>"><div id="elh_lab_test_result_TestCd" class="lab_test_result_TestCd"><?= $Page->renderSort($Page->TestCd) ?></div></th>
<?php } ?>
<?php if ($Page->TestSubCd->Visible) { // TestSubCd ?>
        <th data-name="TestSubCd" class="<?= $Page->TestSubCd->headerCellClass() ?>"><div id="elh_lab_test_result_TestSubCd" class="lab_test_result_TestSubCd"><?= $Page->renderSort($Page->TestSubCd) ?></div></th>
<?php } ?>
<?php if ($Page->DEptCd->Visible) { // DEptCd ?>
        <th data-name="DEptCd" class="<?= $Page->DEptCd->headerCellClass() ?>"><div id="elh_lab_test_result_DEptCd" class="lab_test_result_DEptCd"><?= $Page->renderSort($Page->DEptCd) ?></div></th>
<?php } ?>
<?php if ($Page->ProfCd->Visible) { // ProfCd ?>
        <th data-name="ProfCd" class="<?= $Page->ProfCd->headerCellClass() ?>"><div id="elh_lab_test_result_ProfCd" class="lab_test_result_ProfCd"><?= $Page->renderSort($Page->ProfCd) ?></div></th>
<?php } ?>
<?php if ($Page->ResultDate->Visible) { // ResultDate ?>
        <th data-name="ResultDate" class="<?= $Page->ResultDate->headerCellClass() ?>"><div id="elh_lab_test_result_ResultDate" class="lab_test_result_ResultDate"><?= $Page->renderSort($Page->ResultDate) ?></div></th>
<?php } ?>
<?php if ($Page->Method->Visible) { // Method ?>
        <th data-name="Method" class="<?= $Page->Method->headerCellClass() ?>"><div id="elh_lab_test_result_Method" class="lab_test_result_Method"><?= $Page->renderSort($Page->Method) ?></div></th>
<?php } ?>
<?php if ($Page->Specimen->Visible) { // Specimen ?>
        <th data-name="Specimen" class="<?= $Page->Specimen->headerCellClass() ?>"><div id="elh_lab_test_result_Specimen" class="lab_test_result_Specimen"><?= $Page->renderSort($Page->Specimen) ?></div></th>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
        <th data-name="Amount" class="<?= $Page->Amount->headerCellClass() ?>"><div id="elh_lab_test_result_Amount" class="lab_test_result_Amount"><?= $Page->renderSort($Page->Amount) ?></div></th>
<?php } ?>
<?php if ($Page->ResultBy->Visible) { // ResultBy ?>
        <th data-name="ResultBy" class="<?= $Page->ResultBy->headerCellClass() ?>"><div id="elh_lab_test_result_ResultBy" class="lab_test_result_ResultBy"><?= $Page->renderSort($Page->ResultBy) ?></div></th>
<?php } ?>
<?php if ($Page->AuthBy->Visible) { // AuthBy ?>
        <th data-name="AuthBy" class="<?= $Page->AuthBy->headerCellClass() ?>"><div id="elh_lab_test_result_AuthBy" class="lab_test_result_AuthBy"><?= $Page->renderSort($Page->AuthBy) ?></div></th>
<?php } ?>
<?php if ($Page->AuthDate->Visible) { // AuthDate ?>
        <th data-name="AuthDate" class="<?= $Page->AuthDate->headerCellClass() ?>"><div id="elh_lab_test_result_AuthDate" class="lab_test_result_AuthDate"><?= $Page->renderSort($Page->AuthDate) ?></div></th>
<?php } ?>
<?php if ($Page->Abnormal->Visible) { // Abnormal ?>
        <th data-name="Abnormal" class="<?= $Page->Abnormal->headerCellClass() ?>"><div id="elh_lab_test_result_Abnormal" class="lab_test_result_Abnormal"><?= $Page->renderSort($Page->Abnormal) ?></div></th>
<?php } ?>
<?php if ($Page->Printed->Visible) { // Printed ?>
        <th data-name="Printed" class="<?= $Page->Printed->headerCellClass() ?>"><div id="elh_lab_test_result_Printed" class="lab_test_result_Printed"><?= $Page->renderSort($Page->Printed) ?></div></th>
<?php } ?>
<?php if ($Page->Dispatch->Visible) { // Dispatch ?>
        <th data-name="Dispatch" class="<?= $Page->Dispatch->headerCellClass() ?>"><div id="elh_lab_test_result_Dispatch" class="lab_test_result_Dispatch"><?= $Page->renderSort($Page->Dispatch) ?></div></th>
<?php } ?>
<?php if ($Page->LOWHIGH->Visible) { // LOWHIGH ?>
        <th data-name="LOWHIGH" class="<?= $Page->LOWHIGH->headerCellClass() ?>"><div id="elh_lab_test_result_LOWHIGH" class="lab_test_result_LOWHIGH"><?= $Page->renderSort($Page->LOWHIGH) ?></div></th>
<?php } ?>
<?php if ($Page->Unit->Visible) { // Unit ?>
        <th data-name="Unit" class="<?= $Page->Unit->headerCellClass() ?>"><div id="elh_lab_test_result_Unit" class="lab_test_result_Unit"><?= $Page->renderSort($Page->Unit) ?></div></th>
<?php } ?>
<?php if ($Page->ResDate->Visible) { // ResDate ?>
        <th data-name="ResDate" class="<?= $Page->ResDate->headerCellClass() ?>"><div id="elh_lab_test_result_ResDate" class="lab_test_result_ResDate"><?= $Page->renderSort($Page->ResDate) ?></div></th>
<?php } ?>
<?php if ($Page->Pic1->Visible) { // Pic1 ?>
        <th data-name="Pic1" class="<?= $Page->Pic1->headerCellClass() ?>"><div id="elh_lab_test_result_Pic1" class="lab_test_result_Pic1"><?= $Page->renderSort($Page->Pic1) ?></div></th>
<?php } ?>
<?php if ($Page->Pic2->Visible) { // Pic2 ?>
        <th data-name="Pic2" class="<?= $Page->Pic2->headerCellClass() ?>"><div id="elh_lab_test_result_Pic2" class="lab_test_result_Pic2"><?= $Page->renderSort($Page->Pic2) ?></div></th>
<?php } ?>
<?php if ($Page->GraphPath->Visible) { // GraphPath ?>
        <th data-name="GraphPath" class="<?= $Page->GraphPath->headerCellClass() ?>"><div id="elh_lab_test_result_GraphPath" class="lab_test_result_GraphPath"><?= $Page->renderSort($Page->GraphPath) ?></div></th>
<?php } ?>
<?php if ($Page->SampleDate->Visible) { // SampleDate ?>
        <th data-name="SampleDate" class="<?= $Page->SampleDate->headerCellClass() ?>"><div id="elh_lab_test_result_SampleDate" class="lab_test_result_SampleDate"><?= $Page->renderSort($Page->SampleDate) ?></div></th>
<?php } ?>
<?php if ($Page->SampleUser->Visible) { // SampleUser ?>
        <th data-name="SampleUser" class="<?= $Page->SampleUser->headerCellClass() ?>"><div id="elh_lab_test_result_SampleUser" class="lab_test_result_SampleUser"><?= $Page->renderSort($Page->SampleUser) ?></div></th>
<?php } ?>
<?php if ($Page->ReceivedDate->Visible) { // ReceivedDate ?>
        <th data-name="ReceivedDate" class="<?= $Page->ReceivedDate->headerCellClass() ?>"><div id="elh_lab_test_result_ReceivedDate" class="lab_test_result_ReceivedDate"><?= $Page->renderSort($Page->ReceivedDate) ?></div></th>
<?php } ?>
<?php if ($Page->ReceivedUser->Visible) { // ReceivedUser ?>
        <th data-name="ReceivedUser" class="<?= $Page->ReceivedUser->headerCellClass() ?>"><div id="elh_lab_test_result_ReceivedUser" class="lab_test_result_ReceivedUser"><?= $Page->renderSort($Page->ReceivedUser) ?></div></th>
<?php } ?>
<?php if ($Page->DeptRecvDate->Visible) { // DeptRecvDate ?>
        <th data-name="DeptRecvDate" class="<?= $Page->DeptRecvDate->headerCellClass() ?>"><div id="elh_lab_test_result_DeptRecvDate" class="lab_test_result_DeptRecvDate"><?= $Page->renderSort($Page->DeptRecvDate) ?></div></th>
<?php } ?>
<?php if ($Page->DeptRecvUser->Visible) { // DeptRecvUser ?>
        <th data-name="DeptRecvUser" class="<?= $Page->DeptRecvUser->headerCellClass() ?>"><div id="elh_lab_test_result_DeptRecvUser" class="lab_test_result_DeptRecvUser"><?= $Page->renderSort($Page->DeptRecvUser) ?></div></th>
<?php } ?>
<?php if ($Page->PrintBy->Visible) { // PrintBy ?>
        <th data-name="PrintBy" class="<?= $Page->PrintBy->headerCellClass() ?>"><div id="elh_lab_test_result_PrintBy" class="lab_test_result_PrintBy"><?= $Page->renderSort($Page->PrintBy) ?></div></th>
<?php } ?>
<?php if ($Page->PrintDate->Visible) { // PrintDate ?>
        <th data-name="PrintDate" class="<?= $Page->PrintDate->headerCellClass() ?>"><div id="elh_lab_test_result_PrintDate" class="lab_test_result_PrintDate"><?= $Page->renderSort($Page->PrintDate) ?></div></th>
<?php } ?>
<?php if ($Page->MachineCD->Visible) { // MachineCD ?>
        <th data-name="MachineCD" class="<?= $Page->MachineCD->headerCellClass() ?>"><div id="elh_lab_test_result_MachineCD" class="lab_test_result_MachineCD"><?= $Page->renderSort($Page->MachineCD) ?></div></th>
<?php } ?>
<?php if ($Page->TestCancel->Visible) { // TestCancel ?>
        <th data-name="TestCancel" class="<?= $Page->TestCancel->headerCellClass() ?>"><div id="elh_lab_test_result_TestCancel" class="lab_test_result_TestCancel"><?= $Page->renderSort($Page->TestCancel) ?></div></th>
<?php } ?>
<?php if ($Page->OutSource->Visible) { // OutSource ?>
        <th data-name="OutSource" class="<?= $Page->OutSource->headerCellClass() ?>"><div id="elh_lab_test_result_OutSource" class="lab_test_result_OutSource"><?= $Page->renderSort($Page->OutSource) ?></div></th>
<?php } ?>
<?php if ($Page->Tariff->Visible) { // Tariff ?>
        <th data-name="Tariff" class="<?= $Page->Tariff->headerCellClass() ?>"><div id="elh_lab_test_result_Tariff" class="lab_test_result_Tariff"><?= $Page->renderSort($Page->Tariff) ?></div></th>
<?php } ?>
<?php if ($Page->EDITDATE->Visible) { // EDITDATE ?>
        <th data-name="EDITDATE" class="<?= $Page->EDITDATE->headerCellClass() ?>"><div id="elh_lab_test_result_EDITDATE" class="lab_test_result_EDITDATE"><?= $Page->renderSort($Page->EDITDATE) ?></div></th>
<?php } ?>
<?php if ($Page->UPLOAD->Visible) { // UPLOAD ?>
        <th data-name="UPLOAD" class="<?= $Page->UPLOAD->headerCellClass() ?>"><div id="elh_lab_test_result_UPLOAD" class="lab_test_result_UPLOAD"><?= $Page->renderSort($Page->UPLOAD) ?></div></th>
<?php } ?>
<?php if ($Page->SAuthDate->Visible) { // SAuthDate ?>
        <th data-name="SAuthDate" class="<?= $Page->SAuthDate->headerCellClass() ?>"><div id="elh_lab_test_result_SAuthDate" class="lab_test_result_SAuthDate"><?= $Page->renderSort($Page->SAuthDate) ?></div></th>
<?php } ?>
<?php if ($Page->SAuthBy->Visible) { // SAuthBy ?>
        <th data-name="SAuthBy" class="<?= $Page->SAuthBy->headerCellClass() ?>"><div id="elh_lab_test_result_SAuthBy" class="lab_test_result_SAuthBy"><?= $Page->renderSort($Page->SAuthBy) ?></div></th>
<?php } ?>
<?php if ($Page->NoRC->Visible) { // NoRC ?>
        <th data-name="NoRC" class="<?= $Page->NoRC->headerCellClass() ?>"><div id="elh_lab_test_result_NoRC" class="lab_test_result_NoRC"><?= $Page->renderSort($Page->NoRC) ?></div></th>
<?php } ?>
<?php if ($Page->DispDt->Visible) { // DispDt ?>
        <th data-name="DispDt" class="<?= $Page->DispDt->headerCellClass() ?>"><div id="elh_lab_test_result_DispDt" class="lab_test_result_DispDt"><?= $Page->renderSort($Page->DispDt) ?></div></th>
<?php } ?>
<?php if ($Page->DispUser->Visible) { // DispUser ?>
        <th data-name="DispUser" class="<?= $Page->DispUser->headerCellClass() ?>"><div id="elh_lab_test_result_DispUser" class="lab_test_result_DispUser"><?= $Page->renderSort($Page->DispUser) ?></div></th>
<?php } ?>
<?php if ($Page->DispRemarks->Visible) { // DispRemarks ?>
        <th data-name="DispRemarks" class="<?= $Page->DispRemarks->headerCellClass() ?>"><div id="elh_lab_test_result_DispRemarks" class="lab_test_result_DispRemarks"><?= $Page->renderSort($Page->DispRemarks) ?></div></th>
<?php } ?>
<?php if ($Page->DispMode->Visible) { // DispMode ?>
        <th data-name="DispMode" class="<?= $Page->DispMode->headerCellClass() ?>"><div id="elh_lab_test_result_DispMode" class="lab_test_result_DispMode"><?= $Page->renderSort($Page->DispMode) ?></div></th>
<?php } ?>
<?php if ($Page->ProductCD->Visible) { // ProductCD ?>
        <th data-name="ProductCD" class="<?= $Page->ProductCD->headerCellClass() ?>"><div id="elh_lab_test_result_ProductCD" class="lab_test_result_ProductCD"><?= $Page->renderSort($Page->ProductCD) ?></div></th>
<?php } ?>
<?php if ($Page->Nos->Visible) { // Nos ?>
        <th data-name="Nos" class="<?= $Page->Nos->headerCellClass() ?>"><div id="elh_lab_test_result_Nos" class="lab_test_result_Nos"><?= $Page->renderSort($Page->Nos) ?></div></th>
<?php } ?>
<?php if ($Page->WBCPath->Visible) { // WBCPath ?>
        <th data-name="WBCPath" class="<?= $Page->WBCPath->headerCellClass() ?>"><div id="elh_lab_test_result_WBCPath" class="lab_test_result_WBCPath"><?= $Page->renderSort($Page->WBCPath) ?></div></th>
<?php } ?>
<?php if ($Page->RBCPath->Visible) { // RBCPath ?>
        <th data-name="RBCPath" class="<?= $Page->RBCPath->headerCellClass() ?>"><div id="elh_lab_test_result_RBCPath" class="lab_test_result_RBCPath"><?= $Page->renderSort($Page->RBCPath) ?></div></th>
<?php } ?>
<?php if ($Page->PTPath->Visible) { // PTPath ?>
        <th data-name="PTPath" class="<?= $Page->PTPath->headerCellClass() ?>"><div id="elh_lab_test_result_PTPath" class="lab_test_result_PTPath"><?= $Page->renderSort($Page->PTPath) ?></div></th>
<?php } ?>
<?php if ($Page->ActualAmt->Visible) { // ActualAmt ?>
        <th data-name="ActualAmt" class="<?= $Page->ActualAmt->headerCellClass() ?>"><div id="elh_lab_test_result_ActualAmt" class="lab_test_result_ActualAmt"><?= $Page->renderSort($Page->ActualAmt) ?></div></th>
<?php } ?>
<?php if ($Page->NoSign->Visible) { // NoSign ?>
        <th data-name="NoSign" class="<?= $Page->NoSign->headerCellClass() ?>"><div id="elh_lab_test_result_NoSign" class="lab_test_result_NoSign"><?= $Page->renderSort($Page->NoSign) ?></div></th>
<?php } ?>
<?php if ($Page->_Barcode->Visible) { // Barcode ?>
        <th data-name="_Barcode" class="<?= $Page->_Barcode->headerCellClass() ?>"><div id="elh_lab_test_result__Barcode" class="lab_test_result__Barcode"><?= $Page->renderSort($Page->_Barcode) ?></div></th>
<?php } ?>
<?php if ($Page->ReadTime->Visible) { // ReadTime ?>
        <th data-name="ReadTime" class="<?= $Page->ReadTime->headerCellClass() ?>"><div id="elh_lab_test_result_ReadTime" class="lab_test_result_ReadTime"><?= $Page->renderSort($Page->ReadTime) ?></div></th>
<?php } ?>
<?php if ($Page->VailID->Visible) { // VailID ?>
        <th data-name="VailID" class="<?= $Page->VailID->headerCellClass() ?>"><div id="elh_lab_test_result_VailID" class="lab_test_result_VailID"><?= $Page->renderSort($Page->VailID) ?></div></th>
<?php } ?>
<?php if ($Page->ReadMachine->Visible) { // ReadMachine ?>
        <th data-name="ReadMachine" class="<?= $Page->ReadMachine->headerCellClass() ?>"><div id="elh_lab_test_result_ReadMachine" class="lab_test_result_ReadMachine"><?= $Page->renderSort($Page->ReadMachine) ?></div></th>
<?php } ?>
<?php if ($Page->LabCD->Visible) { // LabCD ?>
        <th data-name="LabCD" class="<?= $Page->LabCD->headerCellClass() ?>"><div id="elh_lab_test_result_LabCD" class="lab_test_result_LabCD"><?= $Page->renderSort($Page->LabCD) ?></div></th>
<?php } ?>
<?php if ($Page->OutLabAmt->Visible) { // OutLabAmt ?>
        <th data-name="OutLabAmt" class="<?= $Page->OutLabAmt->headerCellClass() ?>"><div id="elh_lab_test_result_OutLabAmt" class="lab_test_result_OutLabAmt"><?= $Page->renderSort($Page->OutLabAmt) ?></div></th>
<?php } ?>
<?php if ($Page->ProductQty->Visible) { // ProductQty ?>
        <th data-name="ProductQty" class="<?= $Page->ProductQty->headerCellClass() ?>"><div id="elh_lab_test_result_ProductQty" class="lab_test_result_ProductQty"><?= $Page->renderSort($Page->ProductQty) ?></div></th>
<?php } ?>
<?php if ($Page->Repeat->Visible) { // Repeat ?>
        <th data-name="Repeat" class="<?= $Page->Repeat->headerCellClass() ?>"><div id="elh_lab_test_result_Repeat" class="lab_test_result_Repeat"><?= $Page->renderSort($Page->Repeat) ?></div></th>
<?php } ?>
<?php if ($Page->DeptNo->Visible) { // DeptNo ?>
        <th data-name="DeptNo" class="<?= $Page->DeptNo->headerCellClass() ?>"><div id="elh_lab_test_result_DeptNo" class="lab_test_result_DeptNo"><?= $Page->renderSort($Page->DeptNo) ?></div></th>
<?php } ?>
<?php if ($Page->Desc1->Visible) { // Desc1 ?>
        <th data-name="Desc1" class="<?= $Page->Desc1->headerCellClass() ?>"><div id="elh_lab_test_result_Desc1" class="lab_test_result_Desc1"><?= $Page->renderSort($Page->Desc1) ?></div></th>
<?php } ?>
<?php if ($Page->Desc2->Visible) { // Desc2 ?>
        <th data-name="Desc2" class="<?= $Page->Desc2->headerCellClass() ?>"><div id="elh_lab_test_result_Desc2" class="lab_test_result_Desc2"><?= $Page->renderSort($Page->Desc2) ?></div></th>
<?php } ?>
<?php if ($Page->RptResult->Visible) { // RptResult ?>
        <th data-name="RptResult" class="<?= $Page->RptResult->headerCellClass() ?>"><div id="elh_lab_test_result_RptResult" class="lab_test_result_RptResult"><?= $Page->renderSort($Page->RptResult) ?></div></th>
<?php } ?>
<?php
// Render list options (header, right)
$Page->ListOptions->render("header", "right");
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
if ($Page->isGridAdd())
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
        if ($Page->isGridAdd()) { // Grid add
            $Page->RowType = ROWTYPE_ADD; // Render add
        }
        if ($Page->isGridAdd() && $Page->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) { // Insert failed
            $Page->restoreCurrentRowFormValues($Page->RowIndex); // Restore form values
        }

        // Set up row id / data-rowindex
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_lab_test_result", "data-rowtype" => $Page->RowType]);

        // Render row
        $Page->renderRow();

        // Render list options
        $Page->renderListOptions();

        // Skip delete row / empty row for confirm page
        if ($Page->RowAction != "delete" && $Page->RowAction != "insertdelete" && !($Page->RowAction == "insert" && $Page->isConfirm() && $Page->emptyRow())) {
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php
// Render list options (body, left)
$Page->ListOptions->render("body", "left", $Page->RowCount);
?>
    <?php if ($Page->Branch->Visible) { // Branch ?>
        <td data-name="Branch" <?= $Page->Branch->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_Branch" class="form-group">
<input type="<?= $Page->Branch->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Branch" name="x<?= $Page->RowIndex ?>_Branch" id="x<?= $Page->RowIndex ?>_Branch" size="30" maxlength="4" placeholder="<?= HtmlEncode($Page->Branch->getPlaceHolder()) ?>" value="<?= $Page->Branch->EditValue ?>"<?= $Page->Branch->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Branch->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Branch" data-hidden="1" name="o<?= $Page->RowIndex ?>_Branch" id="o<?= $Page->RowIndex ?>_Branch" value="<?= HtmlEncode($Page->Branch->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_Branch">
<span<?= $Page->Branch->viewAttributes() ?>>
<?= $Page->Branch->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->SidNo->Visible) { // SidNo ?>
        <td data-name="SidNo" <?= $Page->SidNo->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_SidNo" class="form-group">
<input type="<?= $Page->SidNo->getInputTextType() ?>" data-table="lab_test_result" data-field="x_SidNo" name="x<?= $Page->RowIndex ?>_SidNo" id="x<?= $Page->RowIndex ?>_SidNo" size="30" maxlength="6" placeholder="<?= HtmlEncode($Page->SidNo->getPlaceHolder()) ?>" value="<?= $Page->SidNo->EditValue ?>"<?= $Page->SidNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SidNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_SidNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_SidNo" id="o<?= $Page->RowIndex ?>_SidNo" value="<?= HtmlEncode($Page->SidNo->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_SidNo">
<span<?= $Page->SidNo->viewAttributes() ?>>
<?= $Page->SidNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->SidDate->Visible) { // SidDate ?>
        <td data-name="SidDate" <?= $Page->SidDate->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_SidDate" class="form-group">
<input type="<?= $Page->SidDate->getInputTextType() ?>" data-table="lab_test_result" data-field="x_SidDate" name="x<?= $Page->RowIndex ?>_SidDate" id="x<?= $Page->RowIndex ?>_SidDate" placeholder="<?= HtmlEncode($Page->SidDate->getPlaceHolder()) ?>" value="<?= $Page->SidDate->EditValue ?>"<?= $Page->SidDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SidDate->getErrorMessage() ?></div>
<?php if (!$Page->SidDate->ReadOnly && !$Page->SidDate->Disabled && !isset($Page->SidDate->EditAttrs["readonly"]) && !isset($Page->SidDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultlist", "datetimepicker"], function() {
    ew.createDateTimePicker("flab_test_resultlist", "x<?= $Page->RowIndex ?>_SidDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_SidDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_SidDate" id="o<?= $Page->RowIndex ?>_SidDate" value="<?= HtmlEncode($Page->SidDate->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_SidDate">
<span<?= $Page->SidDate->viewAttributes() ?>>
<?= $Page->SidDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->TestCd->Visible) { // TestCd ?>
        <td data-name="TestCd" <?= $Page->TestCd->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_TestCd" class="form-group">
<input type="<?= $Page->TestCd->getInputTextType() ?>" data-table="lab_test_result" data-field="x_TestCd" name="x<?= $Page->RowIndex ?>_TestCd" id="x<?= $Page->RowIndex ?>_TestCd" size="30" maxlength="6" placeholder="<?= HtmlEncode($Page->TestCd->getPlaceHolder()) ?>" value="<?= $Page->TestCd->EditValue ?>"<?= $Page->TestCd->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TestCd->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_TestCd" data-hidden="1" name="o<?= $Page->RowIndex ?>_TestCd" id="o<?= $Page->RowIndex ?>_TestCd" value="<?= HtmlEncode($Page->TestCd->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_TestCd">
<span<?= $Page->TestCd->viewAttributes() ?>>
<?= $Page->TestCd->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->TestSubCd->Visible) { // TestSubCd ?>
        <td data-name="TestSubCd" <?= $Page->TestSubCd->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_TestSubCd" class="form-group">
<input type="<?= $Page->TestSubCd->getInputTextType() ?>" data-table="lab_test_result" data-field="x_TestSubCd" name="x<?= $Page->RowIndex ?>_TestSubCd" id="x<?= $Page->RowIndex ?>_TestSubCd" size="30" maxlength="3" placeholder="<?= HtmlEncode($Page->TestSubCd->getPlaceHolder()) ?>" value="<?= $Page->TestSubCd->EditValue ?>"<?= $Page->TestSubCd->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TestSubCd->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_TestSubCd" data-hidden="1" name="o<?= $Page->RowIndex ?>_TestSubCd" id="o<?= $Page->RowIndex ?>_TestSubCd" value="<?= HtmlEncode($Page->TestSubCd->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_TestSubCd">
<span<?= $Page->TestSubCd->viewAttributes() ?>>
<?= $Page->TestSubCd->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->DEptCd->Visible) { // DEptCd ?>
        <td data-name="DEptCd" <?= $Page->DEptCd->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_DEptCd" class="form-group">
<input type="<?= $Page->DEptCd->getInputTextType() ?>" data-table="lab_test_result" data-field="x_DEptCd" name="x<?= $Page->RowIndex ?>_DEptCd" id="x<?= $Page->RowIndex ?>_DEptCd" size="30" maxlength="2" placeholder="<?= HtmlEncode($Page->DEptCd->getPlaceHolder()) ?>" value="<?= $Page->DEptCd->EditValue ?>"<?= $Page->DEptCd->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DEptCd->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_DEptCd" data-hidden="1" name="o<?= $Page->RowIndex ?>_DEptCd" id="o<?= $Page->RowIndex ?>_DEptCd" value="<?= HtmlEncode($Page->DEptCd->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_DEptCd">
<span<?= $Page->DEptCd->viewAttributes() ?>>
<?= $Page->DEptCd->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->ProfCd->Visible) { // ProfCd ?>
        <td data-name="ProfCd" <?= $Page->ProfCd->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_ProfCd" class="form-group">
<input type="<?= $Page->ProfCd->getInputTextType() ?>" data-table="lab_test_result" data-field="x_ProfCd" name="x<?= $Page->RowIndex ?>_ProfCd" id="x<?= $Page->RowIndex ?>_ProfCd" size="30" maxlength="6" placeholder="<?= HtmlEncode($Page->ProfCd->getPlaceHolder()) ?>" value="<?= $Page->ProfCd->EditValue ?>"<?= $Page->ProfCd->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ProfCd->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ProfCd" data-hidden="1" name="o<?= $Page->RowIndex ?>_ProfCd" id="o<?= $Page->RowIndex ?>_ProfCd" value="<?= HtmlEncode($Page->ProfCd->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_ProfCd">
<span<?= $Page->ProfCd->viewAttributes() ?>>
<?= $Page->ProfCd->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->ResultDate->Visible) { // ResultDate ?>
        <td data-name="ResultDate" <?= $Page->ResultDate->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_ResultDate" class="form-group">
<input type="<?= $Page->ResultDate->getInputTextType() ?>" data-table="lab_test_result" data-field="x_ResultDate" name="x<?= $Page->RowIndex ?>_ResultDate" id="x<?= $Page->RowIndex ?>_ResultDate" placeholder="<?= HtmlEncode($Page->ResultDate->getPlaceHolder()) ?>" value="<?= $Page->ResultDate->EditValue ?>"<?= $Page->ResultDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ResultDate->getErrorMessage() ?></div>
<?php if (!$Page->ResultDate->ReadOnly && !$Page->ResultDate->Disabled && !isset($Page->ResultDate->EditAttrs["readonly"]) && !isset($Page->ResultDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultlist", "datetimepicker"], function() {
    ew.createDateTimePicker("flab_test_resultlist", "x<?= $Page->RowIndex ?>_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ResultDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_ResultDate" id="o<?= $Page->RowIndex ?>_ResultDate" value="<?= HtmlEncode($Page->ResultDate->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_ResultDate">
<span<?= $Page->ResultDate->viewAttributes() ?>>
<?= $Page->ResultDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Method->Visible) { // Method ?>
        <td data-name="Method" <?= $Page->Method->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_Method" class="form-group">
<input type="<?= $Page->Method->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Method" name="x<?= $Page->RowIndex ?>_Method" id="x<?= $Page->RowIndex ?>_Method" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Method->getPlaceHolder()) ?>" value="<?= $Page->Method->EditValue ?>"<?= $Page->Method->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Method->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Method" data-hidden="1" name="o<?= $Page->RowIndex ?>_Method" id="o<?= $Page->RowIndex ?>_Method" value="<?= HtmlEncode($Page->Method->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_Method">
<span<?= $Page->Method->viewAttributes() ?>>
<?= $Page->Method->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Specimen->Visible) { // Specimen ?>
        <td data-name="Specimen" <?= $Page->Specimen->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_Specimen" class="form-group">
<input type="<?= $Page->Specimen->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Specimen" name="x<?= $Page->RowIndex ?>_Specimen" id="x<?= $Page->RowIndex ?>_Specimen" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Specimen->getPlaceHolder()) ?>" value="<?= $Page->Specimen->EditValue ?>"<?= $Page->Specimen->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Specimen->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Specimen" data-hidden="1" name="o<?= $Page->RowIndex ?>_Specimen" id="o<?= $Page->RowIndex ?>_Specimen" value="<?= HtmlEncode($Page->Specimen->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_Specimen">
<span<?= $Page->Specimen->viewAttributes() ?>>
<?= $Page->Specimen->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Amount->Visible) { // Amount ?>
        <td data-name="Amount" <?= $Page->Amount->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_Amount" class="form-group">
<input type="<?= $Page->Amount->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Amount" name="x<?= $Page->RowIndex ?>_Amount" id="x<?= $Page->RowIndex ?>_Amount" size="30" placeholder="<?= HtmlEncode($Page->Amount->getPlaceHolder()) ?>" value="<?= $Page->Amount->EditValue ?>"<?= $Page->Amount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Amount->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Amount" data-hidden="1" name="o<?= $Page->RowIndex ?>_Amount" id="o<?= $Page->RowIndex ?>_Amount" value="<?= HtmlEncode($Page->Amount->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_Amount">
<span<?= $Page->Amount->viewAttributes() ?>>
<?= $Page->Amount->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->ResultBy->Visible) { // ResultBy ?>
        <td data-name="ResultBy" <?= $Page->ResultBy->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_ResultBy" class="form-group">
<input type="<?= $Page->ResultBy->getInputTextType() ?>" data-table="lab_test_result" data-field="x_ResultBy" name="x<?= $Page->RowIndex ?>_ResultBy" id="x<?= $Page->RowIndex ?>_ResultBy" size="30" maxlength="20" placeholder="<?= HtmlEncode($Page->ResultBy->getPlaceHolder()) ?>" value="<?= $Page->ResultBy->EditValue ?>"<?= $Page->ResultBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ResultBy->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ResultBy" data-hidden="1" name="o<?= $Page->RowIndex ?>_ResultBy" id="o<?= $Page->RowIndex ?>_ResultBy" value="<?= HtmlEncode($Page->ResultBy->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_ResultBy">
<span<?= $Page->ResultBy->viewAttributes() ?>>
<?= $Page->ResultBy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->AuthBy->Visible) { // AuthBy ?>
        <td data-name="AuthBy" <?= $Page->AuthBy->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_AuthBy" class="form-group">
<input type="<?= $Page->AuthBy->getInputTextType() ?>" data-table="lab_test_result" data-field="x_AuthBy" name="x<?= $Page->RowIndex ?>_AuthBy" id="x<?= $Page->RowIndex ?>_AuthBy" size="30" maxlength="20" placeholder="<?= HtmlEncode($Page->AuthBy->getPlaceHolder()) ?>" value="<?= $Page->AuthBy->EditValue ?>"<?= $Page->AuthBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->AuthBy->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_AuthBy" data-hidden="1" name="o<?= $Page->RowIndex ?>_AuthBy" id="o<?= $Page->RowIndex ?>_AuthBy" value="<?= HtmlEncode($Page->AuthBy->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_AuthBy">
<span<?= $Page->AuthBy->viewAttributes() ?>>
<?= $Page->AuthBy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->AuthDate->Visible) { // AuthDate ?>
        <td data-name="AuthDate" <?= $Page->AuthDate->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_AuthDate" class="form-group">
<input type="<?= $Page->AuthDate->getInputTextType() ?>" data-table="lab_test_result" data-field="x_AuthDate" name="x<?= $Page->RowIndex ?>_AuthDate" id="x<?= $Page->RowIndex ?>_AuthDate" placeholder="<?= HtmlEncode($Page->AuthDate->getPlaceHolder()) ?>" value="<?= $Page->AuthDate->EditValue ?>"<?= $Page->AuthDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->AuthDate->getErrorMessage() ?></div>
<?php if (!$Page->AuthDate->ReadOnly && !$Page->AuthDate->Disabled && !isset($Page->AuthDate->EditAttrs["readonly"]) && !isset($Page->AuthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultlist", "datetimepicker"], function() {
    ew.createDateTimePicker("flab_test_resultlist", "x<?= $Page->RowIndex ?>_AuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_AuthDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_AuthDate" id="o<?= $Page->RowIndex ?>_AuthDate" value="<?= HtmlEncode($Page->AuthDate->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_AuthDate">
<span<?= $Page->AuthDate->viewAttributes() ?>>
<?= $Page->AuthDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Abnormal->Visible) { // Abnormal ?>
        <td data-name="Abnormal" <?= $Page->Abnormal->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_Abnormal" class="form-group">
<input type="<?= $Page->Abnormal->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Abnormal" name="x<?= $Page->RowIndex ?>_Abnormal" id="x<?= $Page->RowIndex ?>_Abnormal" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->Abnormal->getPlaceHolder()) ?>" value="<?= $Page->Abnormal->EditValue ?>"<?= $Page->Abnormal->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Abnormal->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Abnormal" data-hidden="1" name="o<?= $Page->RowIndex ?>_Abnormal" id="o<?= $Page->RowIndex ?>_Abnormal" value="<?= HtmlEncode($Page->Abnormal->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_Abnormal">
<span<?= $Page->Abnormal->viewAttributes() ?>>
<?= $Page->Abnormal->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Printed->Visible) { // Printed ?>
        <td data-name="Printed" <?= $Page->Printed->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_Printed" class="form-group">
<input type="<?= $Page->Printed->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Printed" name="x<?= $Page->RowIndex ?>_Printed" id="x<?= $Page->RowIndex ?>_Printed" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->Printed->getPlaceHolder()) ?>" value="<?= $Page->Printed->EditValue ?>"<?= $Page->Printed->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Printed->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Printed" data-hidden="1" name="o<?= $Page->RowIndex ?>_Printed" id="o<?= $Page->RowIndex ?>_Printed" value="<?= HtmlEncode($Page->Printed->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_Printed">
<span<?= $Page->Printed->viewAttributes() ?>>
<?= $Page->Printed->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Dispatch->Visible) { // Dispatch ?>
        <td data-name="Dispatch" <?= $Page->Dispatch->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_Dispatch" class="form-group">
<input type="<?= $Page->Dispatch->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Dispatch" name="x<?= $Page->RowIndex ?>_Dispatch" id="x<?= $Page->RowIndex ?>_Dispatch" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->Dispatch->getPlaceHolder()) ?>" value="<?= $Page->Dispatch->EditValue ?>"<?= $Page->Dispatch->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Dispatch->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Dispatch" data-hidden="1" name="o<?= $Page->RowIndex ?>_Dispatch" id="o<?= $Page->RowIndex ?>_Dispatch" value="<?= HtmlEncode($Page->Dispatch->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_Dispatch">
<span<?= $Page->Dispatch->viewAttributes() ?>>
<?= $Page->Dispatch->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->LOWHIGH->Visible) { // LOWHIGH ?>
        <td data-name="LOWHIGH" <?= $Page->LOWHIGH->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_LOWHIGH" class="form-group">
<input type="<?= $Page->LOWHIGH->getInputTextType() ?>" data-table="lab_test_result" data-field="x_LOWHIGH" name="x<?= $Page->RowIndex ?>_LOWHIGH" id="x<?= $Page->RowIndex ?>_LOWHIGH" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->LOWHIGH->getPlaceHolder()) ?>" value="<?= $Page->LOWHIGH->EditValue ?>"<?= $Page->LOWHIGH->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->LOWHIGH->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_LOWHIGH" data-hidden="1" name="o<?= $Page->RowIndex ?>_LOWHIGH" id="o<?= $Page->RowIndex ?>_LOWHIGH" value="<?= HtmlEncode($Page->LOWHIGH->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_LOWHIGH">
<span<?= $Page->LOWHIGH->viewAttributes() ?>>
<?= $Page->LOWHIGH->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Unit->Visible) { // Unit ?>
        <td data-name="Unit" <?= $Page->Unit->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_Unit" class="form-group">
<input type="<?= $Page->Unit->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Unit" name="x<?= $Page->RowIndex ?>_Unit" id="x<?= $Page->RowIndex ?>_Unit" size="30" maxlength="20" placeholder="<?= HtmlEncode($Page->Unit->getPlaceHolder()) ?>" value="<?= $Page->Unit->EditValue ?>"<?= $Page->Unit->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Unit->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Unit" data-hidden="1" name="o<?= $Page->RowIndex ?>_Unit" id="o<?= $Page->RowIndex ?>_Unit" value="<?= HtmlEncode($Page->Unit->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_Unit">
<span<?= $Page->Unit->viewAttributes() ?>>
<?= $Page->Unit->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->ResDate->Visible) { // ResDate ?>
        <td data-name="ResDate" <?= $Page->ResDate->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_ResDate" class="form-group">
<input type="<?= $Page->ResDate->getInputTextType() ?>" data-table="lab_test_result" data-field="x_ResDate" name="x<?= $Page->RowIndex ?>_ResDate" id="x<?= $Page->RowIndex ?>_ResDate" placeholder="<?= HtmlEncode($Page->ResDate->getPlaceHolder()) ?>" value="<?= $Page->ResDate->EditValue ?>"<?= $Page->ResDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ResDate->getErrorMessage() ?></div>
<?php if (!$Page->ResDate->ReadOnly && !$Page->ResDate->Disabled && !isset($Page->ResDate->EditAttrs["readonly"]) && !isset($Page->ResDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultlist", "datetimepicker"], function() {
    ew.createDateTimePicker("flab_test_resultlist", "x<?= $Page->RowIndex ?>_ResDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ResDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_ResDate" id="o<?= $Page->RowIndex ?>_ResDate" value="<?= HtmlEncode($Page->ResDate->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_ResDate">
<span<?= $Page->ResDate->viewAttributes() ?>>
<?= $Page->ResDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Pic1->Visible) { // Pic1 ?>
        <td data-name="Pic1" <?= $Page->Pic1->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_Pic1" class="form-group">
<input type="<?= $Page->Pic1->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Pic1" name="x<?= $Page->RowIndex ?>_Pic1" id="x<?= $Page->RowIndex ?>_Pic1" size="30" maxlength="200" placeholder="<?= HtmlEncode($Page->Pic1->getPlaceHolder()) ?>" value="<?= $Page->Pic1->EditValue ?>"<?= $Page->Pic1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Pic1->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Pic1" data-hidden="1" name="o<?= $Page->RowIndex ?>_Pic1" id="o<?= $Page->RowIndex ?>_Pic1" value="<?= HtmlEncode($Page->Pic1->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_Pic1">
<span<?= $Page->Pic1->viewAttributes() ?>>
<?= $Page->Pic1->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Pic2->Visible) { // Pic2 ?>
        <td data-name="Pic2" <?= $Page->Pic2->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_Pic2" class="form-group">
<input type="<?= $Page->Pic2->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Pic2" name="x<?= $Page->RowIndex ?>_Pic2" id="x<?= $Page->RowIndex ?>_Pic2" size="30" maxlength="200" placeholder="<?= HtmlEncode($Page->Pic2->getPlaceHolder()) ?>" value="<?= $Page->Pic2->EditValue ?>"<?= $Page->Pic2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Pic2->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Pic2" data-hidden="1" name="o<?= $Page->RowIndex ?>_Pic2" id="o<?= $Page->RowIndex ?>_Pic2" value="<?= HtmlEncode($Page->Pic2->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_Pic2">
<span<?= $Page->Pic2->viewAttributes() ?>>
<?= $Page->Pic2->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->GraphPath->Visible) { // GraphPath ?>
        <td data-name="GraphPath" <?= $Page->GraphPath->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_GraphPath" class="form-group">
<input type="<?= $Page->GraphPath->getInputTextType() ?>" data-table="lab_test_result" data-field="x_GraphPath" name="x<?= $Page->RowIndex ?>_GraphPath" id="x<?= $Page->RowIndex ?>_GraphPath" size="30" maxlength="200" placeholder="<?= HtmlEncode($Page->GraphPath->getPlaceHolder()) ?>" value="<?= $Page->GraphPath->EditValue ?>"<?= $Page->GraphPath->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->GraphPath->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_GraphPath" data-hidden="1" name="o<?= $Page->RowIndex ?>_GraphPath" id="o<?= $Page->RowIndex ?>_GraphPath" value="<?= HtmlEncode($Page->GraphPath->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_GraphPath">
<span<?= $Page->GraphPath->viewAttributes() ?>>
<?= $Page->GraphPath->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->SampleDate->Visible) { // SampleDate ?>
        <td data-name="SampleDate" <?= $Page->SampleDate->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_SampleDate" class="form-group">
<input type="<?= $Page->SampleDate->getInputTextType() ?>" data-table="lab_test_result" data-field="x_SampleDate" name="x<?= $Page->RowIndex ?>_SampleDate" id="x<?= $Page->RowIndex ?>_SampleDate" placeholder="<?= HtmlEncode($Page->SampleDate->getPlaceHolder()) ?>" value="<?= $Page->SampleDate->EditValue ?>"<?= $Page->SampleDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SampleDate->getErrorMessage() ?></div>
<?php if (!$Page->SampleDate->ReadOnly && !$Page->SampleDate->Disabled && !isset($Page->SampleDate->EditAttrs["readonly"]) && !isset($Page->SampleDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultlist", "datetimepicker"], function() {
    ew.createDateTimePicker("flab_test_resultlist", "x<?= $Page->RowIndex ?>_SampleDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_SampleDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_SampleDate" id="o<?= $Page->RowIndex ?>_SampleDate" value="<?= HtmlEncode($Page->SampleDate->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_SampleDate">
<span<?= $Page->SampleDate->viewAttributes() ?>>
<?= $Page->SampleDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->SampleUser->Visible) { // SampleUser ?>
        <td data-name="SampleUser" <?= $Page->SampleUser->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_SampleUser" class="form-group">
<input type="<?= $Page->SampleUser->getInputTextType() ?>" data-table="lab_test_result" data-field="x_SampleUser" name="x<?= $Page->RowIndex ?>_SampleUser" id="x<?= $Page->RowIndex ?>_SampleUser" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->SampleUser->getPlaceHolder()) ?>" value="<?= $Page->SampleUser->EditValue ?>"<?= $Page->SampleUser->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SampleUser->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_SampleUser" data-hidden="1" name="o<?= $Page->RowIndex ?>_SampleUser" id="o<?= $Page->RowIndex ?>_SampleUser" value="<?= HtmlEncode($Page->SampleUser->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_SampleUser">
<span<?= $Page->SampleUser->viewAttributes() ?>>
<?= $Page->SampleUser->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->ReceivedDate->Visible) { // ReceivedDate ?>
        <td data-name="ReceivedDate" <?= $Page->ReceivedDate->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_ReceivedDate" class="form-group">
<input type="<?= $Page->ReceivedDate->getInputTextType() ?>" data-table="lab_test_result" data-field="x_ReceivedDate" name="x<?= $Page->RowIndex ?>_ReceivedDate" id="x<?= $Page->RowIndex ?>_ReceivedDate" placeholder="<?= HtmlEncode($Page->ReceivedDate->getPlaceHolder()) ?>" value="<?= $Page->ReceivedDate->EditValue ?>"<?= $Page->ReceivedDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ReceivedDate->getErrorMessage() ?></div>
<?php if (!$Page->ReceivedDate->ReadOnly && !$Page->ReceivedDate->Disabled && !isset($Page->ReceivedDate->EditAttrs["readonly"]) && !isset($Page->ReceivedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultlist", "datetimepicker"], function() {
    ew.createDateTimePicker("flab_test_resultlist", "x<?= $Page->RowIndex ?>_ReceivedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ReceivedDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_ReceivedDate" id="o<?= $Page->RowIndex ?>_ReceivedDate" value="<?= HtmlEncode($Page->ReceivedDate->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_ReceivedDate">
<span<?= $Page->ReceivedDate->viewAttributes() ?>>
<?= $Page->ReceivedDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->ReceivedUser->Visible) { // ReceivedUser ?>
        <td data-name="ReceivedUser" <?= $Page->ReceivedUser->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_ReceivedUser" class="form-group">
<input type="<?= $Page->ReceivedUser->getInputTextType() ?>" data-table="lab_test_result" data-field="x_ReceivedUser" name="x<?= $Page->RowIndex ?>_ReceivedUser" id="x<?= $Page->RowIndex ?>_ReceivedUser" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->ReceivedUser->getPlaceHolder()) ?>" value="<?= $Page->ReceivedUser->EditValue ?>"<?= $Page->ReceivedUser->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ReceivedUser->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ReceivedUser" data-hidden="1" name="o<?= $Page->RowIndex ?>_ReceivedUser" id="o<?= $Page->RowIndex ?>_ReceivedUser" value="<?= HtmlEncode($Page->ReceivedUser->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_ReceivedUser">
<span<?= $Page->ReceivedUser->viewAttributes() ?>>
<?= $Page->ReceivedUser->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->DeptRecvDate->Visible) { // DeptRecvDate ?>
        <td data-name="DeptRecvDate" <?= $Page->DeptRecvDate->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_DeptRecvDate" class="form-group">
<input type="<?= $Page->DeptRecvDate->getInputTextType() ?>" data-table="lab_test_result" data-field="x_DeptRecvDate" name="x<?= $Page->RowIndex ?>_DeptRecvDate" id="x<?= $Page->RowIndex ?>_DeptRecvDate" placeholder="<?= HtmlEncode($Page->DeptRecvDate->getPlaceHolder()) ?>" value="<?= $Page->DeptRecvDate->EditValue ?>"<?= $Page->DeptRecvDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DeptRecvDate->getErrorMessage() ?></div>
<?php if (!$Page->DeptRecvDate->ReadOnly && !$Page->DeptRecvDate->Disabled && !isset($Page->DeptRecvDate->EditAttrs["readonly"]) && !isset($Page->DeptRecvDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultlist", "datetimepicker"], function() {
    ew.createDateTimePicker("flab_test_resultlist", "x<?= $Page->RowIndex ?>_DeptRecvDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_DeptRecvDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_DeptRecvDate" id="o<?= $Page->RowIndex ?>_DeptRecvDate" value="<?= HtmlEncode($Page->DeptRecvDate->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_DeptRecvDate">
<span<?= $Page->DeptRecvDate->viewAttributes() ?>>
<?= $Page->DeptRecvDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->DeptRecvUser->Visible) { // DeptRecvUser ?>
        <td data-name="DeptRecvUser" <?= $Page->DeptRecvUser->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_DeptRecvUser" class="form-group">
<input type="<?= $Page->DeptRecvUser->getInputTextType() ?>" data-table="lab_test_result" data-field="x_DeptRecvUser" name="x<?= $Page->RowIndex ?>_DeptRecvUser" id="x<?= $Page->RowIndex ?>_DeptRecvUser" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->DeptRecvUser->getPlaceHolder()) ?>" value="<?= $Page->DeptRecvUser->EditValue ?>"<?= $Page->DeptRecvUser->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DeptRecvUser->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_DeptRecvUser" data-hidden="1" name="o<?= $Page->RowIndex ?>_DeptRecvUser" id="o<?= $Page->RowIndex ?>_DeptRecvUser" value="<?= HtmlEncode($Page->DeptRecvUser->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_DeptRecvUser">
<span<?= $Page->DeptRecvUser->viewAttributes() ?>>
<?= $Page->DeptRecvUser->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->PrintBy->Visible) { // PrintBy ?>
        <td data-name="PrintBy" <?= $Page->PrintBy->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_PrintBy" class="form-group">
<input type="<?= $Page->PrintBy->getInputTextType() ?>" data-table="lab_test_result" data-field="x_PrintBy" name="x<?= $Page->RowIndex ?>_PrintBy" id="x<?= $Page->RowIndex ?>_PrintBy" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->PrintBy->getPlaceHolder()) ?>" value="<?= $Page->PrintBy->EditValue ?>"<?= $Page->PrintBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PrintBy->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_PrintBy" data-hidden="1" name="o<?= $Page->RowIndex ?>_PrintBy" id="o<?= $Page->RowIndex ?>_PrintBy" value="<?= HtmlEncode($Page->PrintBy->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_PrintBy">
<span<?= $Page->PrintBy->viewAttributes() ?>>
<?= $Page->PrintBy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->PrintDate->Visible) { // PrintDate ?>
        <td data-name="PrintDate" <?= $Page->PrintDate->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_PrintDate" class="form-group">
<input type="<?= $Page->PrintDate->getInputTextType() ?>" data-table="lab_test_result" data-field="x_PrintDate" name="x<?= $Page->RowIndex ?>_PrintDate" id="x<?= $Page->RowIndex ?>_PrintDate" placeholder="<?= HtmlEncode($Page->PrintDate->getPlaceHolder()) ?>" value="<?= $Page->PrintDate->EditValue ?>"<?= $Page->PrintDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PrintDate->getErrorMessage() ?></div>
<?php if (!$Page->PrintDate->ReadOnly && !$Page->PrintDate->Disabled && !isset($Page->PrintDate->EditAttrs["readonly"]) && !isset($Page->PrintDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultlist", "datetimepicker"], function() {
    ew.createDateTimePicker("flab_test_resultlist", "x<?= $Page->RowIndex ?>_PrintDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_PrintDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_PrintDate" id="o<?= $Page->RowIndex ?>_PrintDate" value="<?= HtmlEncode($Page->PrintDate->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_PrintDate">
<span<?= $Page->PrintDate->viewAttributes() ?>>
<?= $Page->PrintDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->MachineCD->Visible) { // MachineCD ?>
        <td data-name="MachineCD" <?= $Page->MachineCD->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_MachineCD" class="form-group">
<input type="<?= $Page->MachineCD->getInputTextType() ?>" data-table="lab_test_result" data-field="x_MachineCD" name="x<?= $Page->RowIndex ?>_MachineCD" id="x<?= $Page->RowIndex ?>_MachineCD" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->MachineCD->getPlaceHolder()) ?>" value="<?= $Page->MachineCD->EditValue ?>"<?= $Page->MachineCD->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->MachineCD->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_MachineCD" data-hidden="1" name="o<?= $Page->RowIndex ?>_MachineCD" id="o<?= $Page->RowIndex ?>_MachineCD" value="<?= HtmlEncode($Page->MachineCD->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_MachineCD">
<span<?= $Page->MachineCD->viewAttributes() ?>>
<?= $Page->MachineCD->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->TestCancel->Visible) { // TestCancel ?>
        <td data-name="TestCancel" <?= $Page->TestCancel->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_TestCancel" class="form-group">
<input type="<?= $Page->TestCancel->getInputTextType() ?>" data-table="lab_test_result" data-field="x_TestCancel" name="x<?= $Page->RowIndex ?>_TestCancel" id="x<?= $Page->RowIndex ?>_TestCancel" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->TestCancel->getPlaceHolder()) ?>" value="<?= $Page->TestCancel->EditValue ?>"<?= $Page->TestCancel->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TestCancel->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_TestCancel" data-hidden="1" name="o<?= $Page->RowIndex ?>_TestCancel" id="o<?= $Page->RowIndex ?>_TestCancel" value="<?= HtmlEncode($Page->TestCancel->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_TestCancel">
<span<?= $Page->TestCancel->viewAttributes() ?>>
<?= $Page->TestCancel->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->OutSource->Visible) { // OutSource ?>
        <td data-name="OutSource" <?= $Page->OutSource->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_OutSource" class="form-group">
<input type="<?= $Page->OutSource->getInputTextType() ?>" data-table="lab_test_result" data-field="x_OutSource" name="x<?= $Page->RowIndex ?>_OutSource" id="x<?= $Page->RowIndex ?>_OutSource" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->OutSource->getPlaceHolder()) ?>" value="<?= $Page->OutSource->EditValue ?>"<?= $Page->OutSource->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->OutSource->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_OutSource" data-hidden="1" name="o<?= $Page->RowIndex ?>_OutSource" id="o<?= $Page->RowIndex ?>_OutSource" value="<?= HtmlEncode($Page->OutSource->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_OutSource">
<span<?= $Page->OutSource->viewAttributes() ?>>
<?= $Page->OutSource->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Tariff->Visible) { // Tariff ?>
        <td data-name="Tariff" <?= $Page->Tariff->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_Tariff" class="form-group">
<input type="<?= $Page->Tariff->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Tariff" name="x<?= $Page->RowIndex ?>_Tariff" id="x<?= $Page->RowIndex ?>_Tariff" size="30" placeholder="<?= HtmlEncode($Page->Tariff->getPlaceHolder()) ?>" value="<?= $Page->Tariff->EditValue ?>"<?= $Page->Tariff->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Tariff->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Tariff" data-hidden="1" name="o<?= $Page->RowIndex ?>_Tariff" id="o<?= $Page->RowIndex ?>_Tariff" value="<?= HtmlEncode($Page->Tariff->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_Tariff">
<span<?= $Page->Tariff->viewAttributes() ?>>
<?= $Page->Tariff->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->EDITDATE->Visible) { // EDITDATE ?>
        <td data-name="EDITDATE" <?= $Page->EDITDATE->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_EDITDATE" class="form-group">
<input type="<?= $Page->EDITDATE->getInputTextType() ?>" data-table="lab_test_result" data-field="x_EDITDATE" name="x<?= $Page->RowIndex ?>_EDITDATE" id="x<?= $Page->RowIndex ?>_EDITDATE" placeholder="<?= HtmlEncode($Page->EDITDATE->getPlaceHolder()) ?>" value="<?= $Page->EDITDATE->EditValue ?>"<?= $Page->EDITDATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->EDITDATE->getErrorMessage() ?></div>
<?php if (!$Page->EDITDATE->ReadOnly && !$Page->EDITDATE->Disabled && !isset($Page->EDITDATE->EditAttrs["readonly"]) && !isset($Page->EDITDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultlist", "datetimepicker"], function() {
    ew.createDateTimePicker("flab_test_resultlist", "x<?= $Page->RowIndex ?>_EDITDATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_EDITDATE" data-hidden="1" name="o<?= $Page->RowIndex ?>_EDITDATE" id="o<?= $Page->RowIndex ?>_EDITDATE" value="<?= HtmlEncode($Page->EDITDATE->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_EDITDATE">
<span<?= $Page->EDITDATE->viewAttributes() ?>>
<?= $Page->EDITDATE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->UPLOAD->Visible) { // UPLOAD ?>
        <td data-name="UPLOAD" <?= $Page->UPLOAD->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_UPLOAD" class="form-group">
<input type="<?= $Page->UPLOAD->getInputTextType() ?>" data-table="lab_test_result" data-field="x_UPLOAD" name="x<?= $Page->RowIndex ?>_UPLOAD" id="x<?= $Page->RowIndex ?>_UPLOAD" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->UPLOAD->getPlaceHolder()) ?>" value="<?= $Page->UPLOAD->EditValue ?>"<?= $Page->UPLOAD->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->UPLOAD->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_UPLOAD" data-hidden="1" name="o<?= $Page->RowIndex ?>_UPLOAD" id="o<?= $Page->RowIndex ?>_UPLOAD" value="<?= HtmlEncode($Page->UPLOAD->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_UPLOAD">
<span<?= $Page->UPLOAD->viewAttributes() ?>>
<?= $Page->UPLOAD->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->SAuthDate->Visible) { // SAuthDate ?>
        <td data-name="SAuthDate" <?= $Page->SAuthDate->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_SAuthDate" class="form-group">
<input type="<?= $Page->SAuthDate->getInputTextType() ?>" data-table="lab_test_result" data-field="x_SAuthDate" name="x<?= $Page->RowIndex ?>_SAuthDate" id="x<?= $Page->RowIndex ?>_SAuthDate" placeholder="<?= HtmlEncode($Page->SAuthDate->getPlaceHolder()) ?>" value="<?= $Page->SAuthDate->EditValue ?>"<?= $Page->SAuthDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SAuthDate->getErrorMessage() ?></div>
<?php if (!$Page->SAuthDate->ReadOnly && !$Page->SAuthDate->Disabled && !isset($Page->SAuthDate->EditAttrs["readonly"]) && !isset($Page->SAuthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultlist", "datetimepicker"], function() {
    ew.createDateTimePicker("flab_test_resultlist", "x<?= $Page->RowIndex ?>_SAuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_SAuthDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_SAuthDate" id="o<?= $Page->RowIndex ?>_SAuthDate" value="<?= HtmlEncode($Page->SAuthDate->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_SAuthDate">
<span<?= $Page->SAuthDate->viewAttributes() ?>>
<?= $Page->SAuthDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->SAuthBy->Visible) { // SAuthBy ?>
        <td data-name="SAuthBy" <?= $Page->SAuthBy->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_SAuthBy" class="form-group">
<input type="<?= $Page->SAuthBy->getInputTextType() ?>" data-table="lab_test_result" data-field="x_SAuthBy" name="x<?= $Page->RowIndex ?>_SAuthBy" id="x<?= $Page->RowIndex ?>_SAuthBy" size="30" maxlength="3" placeholder="<?= HtmlEncode($Page->SAuthBy->getPlaceHolder()) ?>" value="<?= $Page->SAuthBy->EditValue ?>"<?= $Page->SAuthBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SAuthBy->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_SAuthBy" data-hidden="1" name="o<?= $Page->RowIndex ?>_SAuthBy" id="o<?= $Page->RowIndex ?>_SAuthBy" value="<?= HtmlEncode($Page->SAuthBy->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_SAuthBy">
<span<?= $Page->SAuthBy->viewAttributes() ?>>
<?= $Page->SAuthBy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->NoRC->Visible) { // NoRC ?>
        <td data-name="NoRC" <?= $Page->NoRC->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_NoRC" class="form-group">
<input type="<?= $Page->NoRC->getInputTextType() ?>" data-table="lab_test_result" data-field="x_NoRC" name="x<?= $Page->RowIndex ?>_NoRC" id="x<?= $Page->RowIndex ?>_NoRC" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->NoRC->getPlaceHolder()) ?>" value="<?= $Page->NoRC->EditValue ?>"<?= $Page->NoRC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->NoRC->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_NoRC" data-hidden="1" name="o<?= $Page->RowIndex ?>_NoRC" id="o<?= $Page->RowIndex ?>_NoRC" value="<?= HtmlEncode($Page->NoRC->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_NoRC">
<span<?= $Page->NoRC->viewAttributes() ?>>
<?= $Page->NoRC->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->DispDt->Visible) { // DispDt ?>
        <td data-name="DispDt" <?= $Page->DispDt->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_DispDt" class="form-group">
<input type="<?= $Page->DispDt->getInputTextType() ?>" data-table="lab_test_result" data-field="x_DispDt" name="x<?= $Page->RowIndex ?>_DispDt" id="x<?= $Page->RowIndex ?>_DispDt" placeholder="<?= HtmlEncode($Page->DispDt->getPlaceHolder()) ?>" value="<?= $Page->DispDt->EditValue ?>"<?= $Page->DispDt->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DispDt->getErrorMessage() ?></div>
<?php if (!$Page->DispDt->ReadOnly && !$Page->DispDt->Disabled && !isset($Page->DispDt->EditAttrs["readonly"]) && !isset($Page->DispDt->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultlist", "datetimepicker"], function() {
    ew.createDateTimePicker("flab_test_resultlist", "x<?= $Page->RowIndex ?>_DispDt", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_DispDt" data-hidden="1" name="o<?= $Page->RowIndex ?>_DispDt" id="o<?= $Page->RowIndex ?>_DispDt" value="<?= HtmlEncode($Page->DispDt->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_DispDt">
<span<?= $Page->DispDt->viewAttributes() ?>>
<?= $Page->DispDt->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->DispUser->Visible) { // DispUser ?>
        <td data-name="DispUser" <?= $Page->DispUser->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_DispUser" class="form-group">
<input type="<?= $Page->DispUser->getInputTextType() ?>" data-table="lab_test_result" data-field="x_DispUser" name="x<?= $Page->RowIndex ?>_DispUser" id="x<?= $Page->RowIndex ?>_DispUser" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->DispUser->getPlaceHolder()) ?>" value="<?= $Page->DispUser->EditValue ?>"<?= $Page->DispUser->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DispUser->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_DispUser" data-hidden="1" name="o<?= $Page->RowIndex ?>_DispUser" id="o<?= $Page->RowIndex ?>_DispUser" value="<?= HtmlEncode($Page->DispUser->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_DispUser">
<span<?= $Page->DispUser->viewAttributes() ?>>
<?= $Page->DispUser->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->DispRemarks->Visible) { // DispRemarks ?>
        <td data-name="DispRemarks" <?= $Page->DispRemarks->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_DispRemarks" class="form-group">
<input type="<?= $Page->DispRemarks->getInputTextType() ?>" data-table="lab_test_result" data-field="x_DispRemarks" name="x<?= $Page->RowIndex ?>_DispRemarks" id="x<?= $Page->RowIndex ?>_DispRemarks" size="30" maxlength="250" placeholder="<?= HtmlEncode($Page->DispRemarks->getPlaceHolder()) ?>" value="<?= $Page->DispRemarks->EditValue ?>"<?= $Page->DispRemarks->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DispRemarks->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_DispRemarks" data-hidden="1" name="o<?= $Page->RowIndex ?>_DispRemarks" id="o<?= $Page->RowIndex ?>_DispRemarks" value="<?= HtmlEncode($Page->DispRemarks->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_DispRemarks">
<span<?= $Page->DispRemarks->viewAttributes() ?>>
<?= $Page->DispRemarks->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->DispMode->Visible) { // DispMode ?>
        <td data-name="DispMode" <?= $Page->DispMode->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_DispMode" class="form-group">
<input type="<?= $Page->DispMode->getInputTextType() ?>" data-table="lab_test_result" data-field="x_DispMode" name="x<?= $Page->RowIndex ?>_DispMode" id="x<?= $Page->RowIndex ?>_DispMode" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->DispMode->getPlaceHolder()) ?>" value="<?= $Page->DispMode->EditValue ?>"<?= $Page->DispMode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DispMode->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_DispMode" data-hidden="1" name="o<?= $Page->RowIndex ?>_DispMode" id="o<?= $Page->RowIndex ?>_DispMode" value="<?= HtmlEncode($Page->DispMode->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_DispMode">
<span<?= $Page->DispMode->viewAttributes() ?>>
<?= $Page->DispMode->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->ProductCD->Visible) { // ProductCD ?>
        <td data-name="ProductCD" <?= $Page->ProductCD->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_ProductCD" class="form-group">
<input type="<?= $Page->ProductCD->getInputTextType() ?>" data-table="lab_test_result" data-field="x_ProductCD" name="x<?= $Page->RowIndex ?>_ProductCD" id="x<?= $Page->RowIndex ?>_ProductCD" size="30" maxlength="6" placeholder="<?= HtmlEncode($Page->ProductCD->getPlaceHolder()) ?>" value="<?= $Page->ProductCD->EditValue ?>"<?= $Page->ProductCD->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ProductCD->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ProductCD" data-hidden="1" name="o<?= $Page->RowIndex ?>_ProductCD" id="o<?= $Page->RowIndex ?>_ProductCD" value="<?= HtmlEncode($Page->ProductCD->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_ProductCD">
<span<?= $Page->ProductCD->viewAttributes() ?>>
<?= $Page->ProductCD->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Nos->Visible) { // Nos ?>
        <td data-name="Nos" <?= $Page->Nos->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_Nos" class="form-group">
<input type="<?= $Page->Nos->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Nos" name="x<?= $Page->RowIndex ?>_Nos" id="x<?= $Page->RowIndex ?>_Nos" size="30" placeholder="<?= HtmlEncode($Page->Nos->getPlaceHolder()) ?>" value="<?= $Page->Nos->EditValue ?>"<?= $Page->Nos->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Nos->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Nos" data-hidden="1" name="o<?= $Page->RowIndex ?>_Nos" id="o<?= $Page->RowIndex ?>_Nos" value="<?= HtmlEncode($Page->Nos->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_Nos">
<span<?= $Page->Nos->viewAttributes() ?>>
<?= $Page->Nos->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->WBCPath->Visible) { // WBCPath ?>
        <td data-name="WBCPath" <?= $Page->WBCPath->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_WBCPath" class="form-group">
<input type="<?= $Page->WBCPath->getInputTextType() ?>" data-table="lab_test_result" data-field="x_WBCPath" name="x<?= $Page->RowIndex ?>_WBCPath" id="x<?= $Page->RowIndex ?>_WBCPath" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->WBCPath->getPlaceHolder()) ?>" value="<?= $Page->WBCPath->EditValue ?>"<?= $Page->WBCPath->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->WBCPath->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_WBCPath" data-hidden="1" name="o<?= $Page->RowIndex ?>_WBCPath" id="o<?= $Page->RowIndex ?>_WBCPath" value="<?= HtmlEncode($Page->WBCPath->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_WBCPath">
<span<?= $Page->WBCPath->viewAttributes() ?>>
<?= $Page->WBCPath->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->RBCPath->Visible) { // RBCPath ?>
        <td data-name="RBCPath" <?= $Page->RBCPath->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_RBCPath" class="form-group">
<input type="<?= $Page->RBCPath->getInputTextType() ?>" data-table="lab_test_result" data-field="x_RBCPath" name="x<?= $Page->RowIndex ?>_RBCPath" id="x<?= $Page->RowIndex ?>_RBCPath" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->RBCPath->getPlaceHolder()) ?>" value="<?= $Page->RBCPath->EditValue ?>"<?= $Page->RBCPath->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RBCPath->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_RBCPath" data-hidden="1" name="o<?= $Page->RowIndex ?>_RBCPath" id="o<?= $Page->RowIndex ?>_RBCPath" value="<?= HtmlEncode($Page->RBCPath->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_RBCPath">
<span<?= $Page->RBCPath->viewAttributes() ?>>
<?= $Page->RBCPath->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->PTPath->Visible) { // PTPath ?>
        <td data-name="PTPath" <?= $Page->PTPath->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_PTPath" class="form-group">
<input type="<?= $Page->PTPath->getInputTextType() ?>" data-table="lab_test_result" data-field="x_PTPath" name="x<?= $Page->RowIndex ?>_PTPath" id="x<?= $Page->RowIndex ?>_PTPath" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->PTPath->getPlaceHolder()) ?>" value="<?= $Page->PTPath->EditValue ?>"<?= $Page->PTPath->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PTPath->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_PTPath" data-hidden="1" name="o<?= $Page->RowIndex ?>_PTPath" id="o<?= $Page->RowIndex ?>_PTPath" value="<?= HtmlEncode($Page->PTPath->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_PTPath">
<span<?= $Page->PTPath->viewAttributes() ?>>
<?= $Page->PTPath->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->ActualAmt->Visible) { // ActualAmt ?>
        <td data-name="ActualAmt" <?= $Page->ActualAmt->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_ActualAmt" class="form-group">
<input type="<?= $Page->ActualAmt->getInputTextType() ?>" data-table="lab_test_result" data-field="x_ActualAmt" name="x<?= $Page->RowIndex ?>_ActualAmt" id="x<?= $Page->RowIndex ?>_ActualAmt" size="30" placeholder="<?= HtmlEncode($Page->ActualAmt->getPlaceHolder()) ?>" value="<?= $Page->ActualAmt->EditValue ?>"<?= $Page->ActualAmt->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ActualAmt->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ActualAmt" data-hidden="1" name="o<?= $Page->RowIndex ?>_ActualAmt" id="o<?= $Page->RowIndex ?>_ActualAmt" value="<?= HtmlEncode($Page->ActualAmt->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_ActualAmt">
<span<?= $Page->ActualAmt->viewAttributes() ?>>
<?= $Page->ActualAmt->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->NoSign->Visible) { // NoSign ?>
        <td data-name="NoSign" <?= $Page->NoSign->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_NoSign" class="form-group">
<input type="<?= $Page->NoSign->getInputTextType() ?>" data-table="lab_test_result" data-field="x_NoSign" name="x<?= $Page->RowIndex ?>_NoSign" id="x<?= $Page->RowIndex ?>_NoSign" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->NoSign->getPlaceHolder()) ?>" value="<?= $Page->NoSign->EditValue ?>"<?= $Page->NoSign->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->NoSign->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_NoSign" data-hidden="1" name="o<?= $Page->RowIndex ?>_NoSign" id="o<?= $Page->RowIndex ?>_NoSign" value="<?= HtmlEncode($Page->NoSign->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_NoSign">
<span<?= $Page->NoSign->viewAttributes() ?>>
<?= $Page->NoSign->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->_Barcode->Visible) { // Barcode ?>
        <td data-name="_Barcode" <?= $Page->_Barcode->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result__Barcode" class="form-group">
<input type="<?= $Page->_Barcode->getInputTextType() ?>" data-table="lab_test_result" data-field="x__Barcode" name="x<?= $Page->RowIndex ?>__Barcode" id="x<?= $Page->RowIndex ?>__Barcode" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->_Barcode->getPlaceHolder()) ?>" value="<?= $Page->_Barcode->EditValue ?>"<?= $Page->_Barcode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->_Barcode->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x__Barcode" data-hidden="1" name="o<?= $Page->RowIndex ?>__Barcode" id="o<?= $Page->RowIndex ?>__Barcode" value="<?= HtmlEncode($Page->_Barcode->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result__Barcode">
<span<?= $Page->_Barcode->viewAttributes() ?>>
<?= $Page->_Barcode->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->ReadTime->Visible) { // ReadTime ?>
        <td data-name="ReadTime" <?= $Page->ReadTime->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_ReadTime" class="form-group">
<input type="<?= $Page->ReadTime->getInputTextType() ?>" data-table="lab_test_result" data-field="x_ReadTime" name="x<?= $Page->RowIndex ?>_ReadTime" id="x<?= $Page->RowIndex ?>_ReadTime" placeholder="<?= HtmlEncode($Page->ReadTime->getPlaceHolder()) ?>" value="<?= $Page->ReadTime->EditValue ?>"<?= $Page->ReadTime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ReadTime->getErrorMessage() ?></div>
<?php if (!$Page->ReadTime->ReadOnly && !$Page->ReadTime->Disabled && !isset($Page->ReadTime->EditAttrs["readonly"]) && !isset($Page->ReadTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultlist", "datetimepicker"], function() {
    ew.createDateTimePicker("flab_test_resultlist", "x<?= $Page->RowIndex ?>_ReadTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ReadTime" data-hidden="1" name="o<?= $Page->RowIndex ?>_ReadTime" id="o<?= $Page->RowIndex ?>_ReadTime" value="<?= HtmlEncode($Page->ReadTime->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_ReadTime">
<span<?= $Page->ReadTime->viewAttributes() ?>>
<?= $Page->ReadTime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->VailID->Visible) { // VailID ?>
        <td data-name="VailID" <?= $Page->VailID->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_VailID" class="form-group">
<input type="<?= $Page->VailID->getInputTextType() ?>" data-table="lab_test_result" data-field="x_VailID" name="x<?= $Page->RowIndex ?>_VailID" id="x<?= $Page->RowIndex ?>_VailID" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->VailID->getPlaceHolder()) ?>" value="<?= $Page->VailID->EditValue ?>"<?= $Page->VailID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->VailID->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_VailID" data-hidden="1" name="o<?= $Page->RowIndex ?>_VailID" id="o<?= $Page->RowIndex ?>_VailID" value="<?= HtmlEncode($Page->VailID->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_VailID">
<span<?= $Page->VailID->viewAttributes() ?>>
<?= $Page->VailID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->ReadMachine->Visible) { // ReadMachine ?>
        <td data-name="ReadMachine" <?= $Page->ReadMachine->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_ReadMachine" class="form-group">
<input type="<?= $Page->ReadMachine->getInputTextType() ?>" data-table="lab_test_result" data-field="x_ReadMachine" name="x<?= $Page->RowIndex ?>_ReadMachine" id="x<?= $Page->RowIndex ?>_ReadMachine" size="30" maxlength="20" placeholder="<?= HtmlEncode($Page->ReadMachine->getPlaceHolder()) ?>" value="<?= $Page->ReadMachine->EditValue ?>"<?= $Page->ReadMachine->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ReadMachine->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ReadMachine" data-hidden="1" name="o<?= $Page->RowIndex ?>_ReadMachine" id="o<?= $Page->RowIndex ?>_ReadMachine" value="<?= HtmlEncode($Page->ReadMachine->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_ReadMachine">
<span<?= $Page->ReadMachine->viewAttributes() ?>>
<?= $Page->ReadMachine->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->LabCD->Visible) { // LabCD ?>
        <td data-name="LabCD" <?= $Page->LabCD->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_LabCD" class="form-group">
<input type="<?= $Page->LabCD->getInputTextType() ?>" data-table="lab_test_result" data-field="x_LabCD" name="x<?= $Page->RowIndex ?>_LabCD" id="x<?= $Page->RowIndex ?>_LabCD" size="30" maxlength="6" placeholder="<?= HtmlEncode($Page->LabCD->getPlaceHolder()) ?>" value="<?= $Page->LabCD->EditValue ?>"<?= $Page->LabCD->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->LabCD->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_LabCD" data-hidden="1" name="o<?= $Page->RowIndex ?>_LabCD" id="o<?= $Page->RowIndex ?>_LabCD" value="<?= HtmlEncode($Page->LabCD->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_LabCD">
<span<?= $Page->LabCD->viewAttributes() ?>>
<?= $Page->LabCD->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->OutLabAmt->Visible) { // OutLabAmt ?>
        <td data-name="OutLabAmt" <?= $Page->OutLabAmt->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_OutLabAmt" class="form-group">
<input type="<?= $Page->OutLabAmt->getInputTextType() ?>" data-table="lab_test_result" data-field="x_OutLabAmt" name="x<?= $Page->RowIndex ?>_OutLabAmt" id="x<?= $Page->RowIndex ?>_OutLabAmt" size="30" placeholder="<?= HtmlEncode($Page->OutLabAmt->getPlaceHolder()) ?>" value="<?= $Page->OutLabAmt->EditValue ?>"<?= $Page->OutLabAmt->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->OutLabAmt->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_OutLabAmt" data-hidden="1" name="o<?= $Page->RowIndex ?>_OutLabAmt" id="o<?= $Page->RowIndex ?>_OutLabAmt" value="<?= HtmlEncode($Page->OutLabAmt->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_OutLabAmt">
<span<?= $Page->OutLabAmt->viewAttributes() ?>>
<?= $Page->OutLabAmt->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->ProductQty->Visible) { // ProductQty ?>
        <td data-name="ProductQty" <?= $Page->ProductQty->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_ProductQty" class="form-group">
<input type="<?= $Page->ProductQty->getInputTextType() ?>" data-table="lab_test_result" data-field="x_ProductQty" name="x<?= $Page->RowIndex ?>_ProductQty" id="x<?= $Page->RowIndex ?>_ProductQty" size="30" placeholder="<?= HtmlEncode($Page->ProductQty->getPlaceHolder()) ?>" value="<?= $Page->ProductQty->EditValue ?>"<?= $Page->ProductQty->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ProductQty->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ProductQty" data-hidden="1" name="o<?= $Page->RowIndex ?>_ProductQty" id="o<?= $Page->RowIndex ?>_ProductQty" value="<?= HtmlEncode($Page->ProductQty->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_ProductQty">
<span<?= $Page->ProductQty->viewAttributes() ?>>
<?= $Page->ProductQty->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Repeat->Visible) { // Repeat ?>
        <td data-name="Repeat" <?= $Page->Repeat->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_Repeat" class="form-group">
<input type="<?= $Page->Repeat->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Repeat" name="x<?= $Page->RowIndex ?>_Repeat" id="x<?= $Page->RowIndex ?>_Repeat" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->Repeat->getPlaceHolder()) ?>" value="<?= $Page->Repeat->EditValue ?>"<?= $Page->Repeat->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Repeat->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Repeat" data-hidden="1" name="o<?= $Page->RowIndex ?>_Repeat" id="o<?= $Page->RowIndex ?>_Repeat" value="<?= HtmlEncode($Page->Repeat->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_Repeat">
<span<?= $Page->Repeat->viewAttributes() ?>>
<?= $Page->Repeat->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->DeptNo->Visible) { // DeptNo ?>
        <td data-name="DeptNo" <?= $Page->DeptNo->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_DeptNo" class="form-group">
<input type="<?= $Page->DeptNo->getInputTextType() ?>" data-table="lab_test_result" data-field="x_DeptNo" name="x<?= $Page->RowIndex ?>_DeptNo" id="x<?= $Page->RowIndex ?>_DeptNo" size="30" maxlength="5" placeholder="<?= HtmlEncode($Page->DeptNo->getPlaceHolder()) ?>" value="<?= $Page->DeptNo->EditValue ?>"<?= $Page->DeptNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DeptNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_DeptNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_DeptNo" id="o<?= $Page->RowIndex ?>_DeptNo" value="<?= HtmlEncode($Page->DeptNo->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_DeptNo">
<span<?= $Page->DeptNo->viewAttributes() ?>>
<?= $Page->DeptNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Desc1->Visible) { // Desc1 ?>
        <td data-name="Desc1" <?= $Page->Desc1->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_Desc1" class="form-group">
<input type="<?= $Page->Desc1->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Desc1" name="x<?= $Page->RowIndex ?>_Desc1" id="x<?= $Page->RowIndex ?>_Desc1" size="30" maxlength="200" placeholder="<?= HtmlEncode($Page->Desc1->getPlaceHolder()) ?>" value="<?= $Page->Desc1->EditValue ?>"<?= $Page->Desc1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Desc1->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Desc1" data-hidden="1" name="o<?= $Page->RowIndex ?>_Desc1" id="o<?= $Page->RowIndex ?>_Desc1" value="<?= HtmlEncode($Page->Desc1->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_Desc1">
<span<?= $Page->Desc1->viewAttributes() ?>>
<?= $Page->Desc1->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Desc2->Visible) { // Desc2 ?>
        <td data-name="Desc2" <?= $Page->Desc2->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_Desc2" class="form-group">
<input type="<?= $Page->Desc2->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Desc2" name="x<?= $Page->RowIndex ?>_Desc2" id="x<?= $Page->RowIndex ?>_Desc2" size="30" maxlength="200" placeholder="<?= HtmlEncode($Page->Desc2->getPlaceHolder()) ?>" value="<?= $Page->Desc2->EditValue ?>"<?= $Page->Desc2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Desc2->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Desc2" data-hidden="1" name="o<?= $Page->RowIndex ?>_Desc2" id="o<?= $Page->RowIndex ?>_Desc2" value="<?= HtmlEncode($Page->Desc2->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_Desc2">
<span<?= $Page->Desc2->viewAttributes() ?>>
<?= $Page->Desc2->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->RptResult->Visible) { // RptResult ?>
        <td data-name="RptResult" <?= $Page->RptResult->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_RptResult" class="form-group">
<input type="<?= $Page->RptResult->getInputTextType() ?>" data-table="lab_test_result" data-field="x_RptResult" name="x<?= $Page->RowIndex ?>_RptResult" id="x<?= $Page->RowIndex ?>_RptResult" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->RptResult->getPlaceHolder()) ?>" value="<?= $Page->RptResult->EditValue ?>"<?= $Page->RptResult->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RptResult->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_RptResult" data-hidden="1" name="o<?= $Page->RowIndex ?>_RptResult" id="o<?= $Page->RowIndex ?>_RptResult" value="<?= HtmlEncode($Page->RptResult->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_lab_test_result_RptResult">
<span<?= $Page->RptResult->viewAttributes() ?>>
<?= $Page->RptResult->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowCount);
?>
    </tr>
<?php if ($Page->RowType == ROWTYPE_ADD || $Page->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["flab_test_resultlist","load"], function () {
    flab_test_resultlist.updateLists(<?= $Page->RowIndex ?>);
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
<?php
    if ($Page->isGridAdd() || $Page->isGridEdit()) {
        $Page->RowIndex = '$rowindex$';
        $Page->loadRowValues();

        // Set row properties
        $Page->resetAttributes();
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowIndex, "id" => "r0_lab_test_result", "data-rowtype" => ROWTYPE_ADD]);
        $Page->RowAttrs->appendClass("ew-template");
        $Page->RowType = ROWTYPE_ADD;

        // Render row
        $Page->renderRow();

        // Render list options
        $Page->renderListOptions();
        $Page->StartRowCount = 0;
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php
// Render list options (body, left)
$Page->ListOptions->render("body", "left", $Page->RowIndex);
?>
    <?php if ($Page->Branch->Visible) { // Branch ?>
        <td data-name="Branch">
<span id="el$rowindex$_lab_test_result_Branch" class="form-group lab_test_result_Branch">
<input type="<?= $Page->Branch->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Branch" name="x<?= $Page->RowIndex ?>_Branch" id="x<?= $Page->RowIndex ?>_Branch" size="30" maxlength="4" placeholder="<?= HtmlEncode($Page->Branch->getPlaceHolder()) ?>" value="<?= $Page->Branch->EditValue ?>"<?= $Page->Branch->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Branch->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Branch" data-hidden="1" name="o<?= $Page->RowIndex ?>_Branch" id="o<?= $Page->RowIndex ?>_Branch" value="<?= HtmlEncode($Page->Branch->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->SidNo->Visible) { // SidNo ?>
        <td data-name="SidNo">
<span id="el$rowindex$_lab_test_result_SidNo" class="form-group lab_test_result_SidNo">
<input type="<?= $Page->SidNo->getInputTextType() ?>" data-table="lab_test_result" data-field="x_SidNo" name="x<?= $Page->RowIndex ?>_SidNo" id="x<?= $Page->RowIndex ?>_SidNo" size="30" maxlength="6" placeholder="<?= HtmlEncode($Page->SidNo->getPlaceHolder()) ?>" value="<?= $Page->SidNo->EditValue ?>"<?= $Page->SidNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SidNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_SidNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_SidNo" id="o<?= $Page->RowIndex ?>_SidNo" value="<?= HtmlEncode($Page->SidNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->SidDate->Visible) { // SidDate ?>
        <td data-name="SidDate">
<span id="el$rowindex$_lab_test_result_SidDate" class="form-group lab_test_result_SidDate">
<input type="<?= $Page->SidDate->getInputTextType() ?>" data-table="lab_test_result" data-field="x_SidDate" name="x<?= $Page->RowIndex ?>_SidDate" id="x<?= $Page->RowIndex ?>_SidDate" placeholder="<?= HtmlEncode($Page->SidDate->getPlaceHolder()) ?>" value="<?= $Page->SidDate->EditValue ?>"<?= $Page->SidDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SidDate->getErrorMessage() ?></div>
<?php if (!$Page->SidDate->ReadOnly && !$Page->SidDate->Disabled && !isset($Page->SidDate->EditAttrs["readonly"]) && !isset($Page->SidDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultlist", "datetimepicker"], function() {
    ew.createDateTimePicker("flab_test_resultlist", "x<?= $Page->RowIndex ?>_SidDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_SidDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_SidDate" id="o<?= $Page->RowIndex ?>_SidDate" value="<?= HtmlEncode($Page->SidDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->TestCd->Visible) { // TestCd ?>
        <td data-name="TestCd">
<span id="el$rowindex$_lab_test_result_TestCd" class="form-group lab_test_result_TestCd">
<input type="<?= $Page->TestCd->getInputTextType() ?>" data-table="lab_test_result" data-field="x_TestCd" name="x<?= $Page->RowIndex ?>_TestCd" id="x<?= $Page->RowIndex ?>_TestCd" size="30" maxlength="6" placeholder="<?= HtmlEncode($Page->TestCd->getPlaceHolder()) ?>" value="<?= $Page->TestCd->EditValue ?>"<?= $Page->TestCd->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TestCd->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_TestCd" data-hidden="1" name="o<?= $Page->RowIndex ?>_TestCd" id="o<?= $Page->RowIndex ?>_TestCd" value="<?= HtmlEncode($Page->TestCd->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->TestSubCd->Visible) { // TestSubCd ?>
        <td data-name="TestSubCd">
<span id="el$rowindex$_lab_test_result_TestSubCd" class="form-group lab_test_result_TestSubCd">
<input type="<?= $Page->TestSubCd->getInputTextType() ?>" data-table="lab_test_result" data-field="x_TestSubCd" name="x<?= $Page->RowIndex ?>_TestSubCd" id="x<?= $Page->RowIndex ?>_TestSubCd" size="30" maxlength="3" placeholder="<?= HtmlEncode($Page->TestSubCd->getPlaceHolder()) ?>" value="<?= $Page->TestSubCd->EditValue ?>"<?= $Page->TestSubCd->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TestSubCd->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_TestSubCd" data-hidden="1" name="o<?= $Page->RowIndex ?>_TestSubCd" id="o<?= $Page->RowIndex ?>_TestSubCd" value="<?= HtmlEncode($Page->TestSubCd->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->DEptCd->Visible) { // DEptCd ?>
        <td data-name="DEptCd">
<span id="el$rowindex$_lab_test_result_DEptCd" class="form-group lab_test_result_DEptCd">
<input type="<?= $Page->DEptCd->getInputTextType() ?>" data-table="lab_test_result" data-field="x_DEptCd" name="x<?= $Page->RowIndex ?>_DEptCd" id="x<?= $Page->RowIndex ?>_DEptCd" size="30" maxlength="2" placeholder="<?= HtmlEncode($Page->DEptCd->getPlaceHolder()) ?>" value="<?= $Page->DEptCd->EditValue ?>"<?= $Page->DEptCd->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DEptCd->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_DEptCd" data-hidden="1" name="o<?= $Page->RowIndex ?>_DEptCd" id="o<?= $Page->RowIndex ?>_DEptCd" value="<?= HtmlEncode($Page->DEptCd->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ProfCd->Visible) { // ProfCd ?>
        <td data-name="ProfCd">
<span id="el$rowindex$_lab_test_result_ProfCd" class="form-group lab_test_result_ProfCd">
<input type="<?= $Page->ProfCd->getInputTextType() ?>" data-table="lab_test_result" data-field="x_ProfCd" name="x<?= $Page->RowIndex ?>_ProfCd" id="x<?= $Page->RowIndex ?>_ProfCd" size="30" maxlength="6" placeholder="<?= HtmlEncode($Page->ProfCd->getPlaceHolder()) ?>" value="<?= $Page->ProfCd->EditValue ?>"<?= $Page->ProfCd->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ProfCd->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ProfCd" data-hidden="1" name="o<?= $Page->RowIndex ?>_ProfCd" id="o<?= $Page->RowIndex ?>_ProfCd" value="<?= HtmlEncode($Page->ProfCd->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ResultDate->Visible) { // ResultDate ?>
        <td data-name="ResultDate">
<span id="el$rowindex$_lab_test_result_ResultDate" class="form-group lab_test_result_ResultDate">
<input type="<?= $Page->ResultDate->getInputTextType() ?>" data-table="lab_test_result" data-field="x_ResultDate" name="x<?= $Page->RowIndex ?>_ResultDate" id="x<?= $Page->RowIndex ?>_ResultDate" placeholder="<?= HtmlEncode($Page->ResultDate->getPlaceHolder()) ?>" value="<?= $Page->ResultDate->EditValue ?>"<?= $Page->ResultDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ResultDate->getErrorMessage() ?></div>
<?php if (!$Page->ResultDate->ReadOnly && !$Page->ResultDate->Disabled && !isset($Page->ResultDate->EditAttrs["readonly"]) && !isset($Page->ResultDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultlist", "datetimepicker"], function() {
    ew.createDateTimePicker("flab_test_resultlist", "x<?= $Page->RowIndex ?>_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ResultDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_ResultDate" id="o<?= $Page->RowIndex ?>_ResultDate" value="<?= HtmlEncode($Page->ResultDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Method->Visible) { // Method ?>
        <td data-name="Method">
<span id="el$rowindex$_lab_test_result_Method" class="form-group lab_test_result_Method">
<input type="<?= $Page->Method->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Method" name="x<?= $Page->RowIndex ?>_Method" id="x<?= $Page->RowIndex ?>_Method" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Method->getPlaceHolder()) ?>" value="<?= $Page->Method->EditValue ?>"<?= $Page->Method->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Method->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Method" data-hidden="1" name="o<?= $Page->RowIndex ?>_Method" id="o<?= $Page->RowIndex ?>_Method" value="<?= HtmlEncode($Page->Method->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Specimen->Visible) { // Specimen ?>
        <td data-name="Specimen">
<span id="el$rowindex$_lab_test_result_Specimen" class="form-group lab_test_result_Specimen">
<input type="<?= $Page->Specimen->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Specimen" name="x<?= $Page->RowIndex ?>_Specimen" id="x<?= $Page->RowIndex ?>_Specimen" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Specimen->getPlaceHolder()) ?>" value="<?= $Page->Specimen->EditValue ?>"<?= $Page->Specimen->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Specimen->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Specimen" data-hidden="1" name="o<?= $Page->RowIndex ?>_Specimen" id="o<?= $Page->RowIndex ?>_Specimen" value="<?= HtmlEncode($Page->Specimen->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Amount->Visible) { // Amount ?>
        <td data-name="Amount">
<span id="el$rowindex$_lab_test_result_Amount" class="form-group lab_test_result_Amount">
<input type="<?= $Page->Amount->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Amount" name="x<?= $Page->RowIndex ?>_Amount" id="x<?= $Page->RowIndex ?>_Amount" size="30" placeholder="<?= HtmlEncode($Page->Amount->getPlaceHolder()) ?>" value="<?= $Page->Amount->EditValue ?>"<?= $Page->Amount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Amount->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Amount" data-hidden="1" name="o<?= $Page->RowIndex ?>_Amount" id="o<?= $Page->RowIndex ?>_Amount" value="<?= HtmlEncode($Page->Amount->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ResultBy->Visible) { // ResultBy ?>
        <td data-name="ResultBy">
<span id="el$rowindex$_lab_test_result_ResultBy" class="form-group lab_test_result_ResultBy">
<input type="<?= $Page->ResultBy->getInputTextType() ?>" data-table="lab_test_result" data-field="x_ResultBy" name="x<?= $Page->RowIndex ?>_ResultBy" id="x<?= $Page->RowIndex ?>_ResultBy" size="30" maxlength="20" placeholder="<?= HtmlEncode($Page->ResultBy->getPlaceHolder()) ?>" value="<?= $Page->ResultBy->EditValue ?>"<?= $Page->ResultBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ResultBy->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ResultBy" data-hidden="1" name="o<?= $Page->RowIndex ?>_ResultBy" id="o<?= $Page->RowIndex ?>_ResultBy" value="<?= HtmlEncode($Page->ResultBy->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->AuthBy->Visible) { // AuthBy ?>
        <td data-name="AuthBy">
<span id="el$rowindex$_lab_test_result_AuthBy" class="form-group lab_test_result_AuthBy">
<input type="<?= $Page->AuthBy->getInputTextType() ?>" data-table="lab_test_result" data-field="x_AuthBy" name="x<?= $Page->RowIndex ?>_AuthBy" id="x<?= $Page->RowIndex ?>_AuthBy" size="30" maxlength="20" placeholder="<?= HtmlEncode($Page->AuthBy->getPlaceHolder()) ?>" value="<?= $Page->AuthBy->EditValue ?>"<?= $Page->AuthBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->AuthBy->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_AuthBy" data-hidden="1" name="o<?= $Page->RowIndex ?>_AuthBy" id="o<?= $Page->RowIndex ?>_AuthBy" value="<?= HtmlEncode($Page->AuthBy->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->AuthDate->Visible) { // AuthDate ?>
        <td data-name="AuthDate">
<span id="el$rowindex$_lab_test_result_AuthDate" class="form-group lab_test_result_AuthDate">
<input type="<?= $Page->AuthDate->getInputTextType() ?>" data-table="lab_test_result" data-field="x_AuthDate" name="x<?= $Page->RowIndex ?>_AuthDate" id="x<?= $Page->RowIndex ?>_AuthDate" placeholder="<?= HtmlEncode($Page->AuthDate->getPlaceHolder()) ?>" value="<?= $Page->AuthDate->EditValue ?>"<?= $Page->AuthDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->AuthDate->getErrorMessage() ?></div>
<?php if (!$Page->AuthDate->ReadOnly && !$Page->AuthDate->Disabled && !isset($Page->AuthDate->EditAttrs["readonly"]) && !isset($Page->AuthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultlist", "datetimepicker"], function() {
    ew.createDateTimePicker("flab_test_resultlist", "x<?= $Page->RowIndex ?>_AuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_AuthDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_AuthDate" id="o<?= $Page->RowIndex ?>_AuthDate" value="<?= HtmlEncode($Page->AuthDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Abnormal->Visible) { // Abnormal ?>
        <td data-name="Abnormal">
<span id="el$rowindex$_lab_test_result_Abnormal" class="form-group lab_test_result_Abnormal">
<input type="<?= $Page->Abnormal->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Abnormal" name="x<?= $Page->RowIndex ?>_Abnormal" id="x<?= $Page->RowIndex ?>_Abnormal" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->Abnormal->getPlaceHolder()) ?>" value="<?= $Page->Abnormal->EditValue ?>"<?= $Page->Abnormal->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Abnormal->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Abnormal" data-hidden="1" name="o<?= $Page->RowIndex ?>_Abnormal" id="o<?= $Page->RowIndex ?>_Abnormal" value="<?= HtmlEncode($Page->Abnormal->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Printed->Visible) { // Printed ?>
        <td data-name="Printed">
<span id="el$rowindex$_lab_test_result_Printed" class="form-group lab_test_result_Printed">
<input type="<?= $Page->Printed->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Printed" name="x<?= $Page->RowIndex ?>_Printed" id="x<?= $Page->RowIndex ?>_Printed" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->Printed->getPlaceHolder()) ?>" value="<?= $Page->Printed->EditValue ?>"<?= $Page->Printed->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Printed->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Printed" data-hidden="1" name="o<?= $Page->RowIndex ?>_Printed" id="o<?= $Page->RowIndex ?>_Printed" value="<?= HtmlEncode($Page->Printed->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Dispatch->Visible) { // Dispatch ?>
        <td data-name="Dispatch">
<span id="el$rowindex$_lab_test_result_Dispatch" class="form-group lab_test_result_Dispatch">
<input type="<?= $Page->Dispatch->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Dispatch" name="x<?= $Page->RowIndex ?>_Dispatch" id="x<?= $Page->RowIndex ?>_Dispatch" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->Dispatch->getPlaceHolder()) ?>" value="<?= $Page->Dispatch->EditValue ?>"<?= $Page->Dispatch->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Dispatch->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Dispatch" data-hidden="1" name="o<?= $Page->RowIndex ?>_Dispatch" id="o<?= $Page->RowIndex ?>_Dispatch" value="<?= HtmlEncode($Page->Dispatch->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->LOWHIGH->Visible) { // LOWHIGH ?>
        <td data-name="LOWHIGH">
<span id="el$rowindex$_lab_test_result_LOWHIGH" class="form-group lab_test_result_LOWHIGH">
<input type="<?= $Page->LOWHIGH->getInputTextType() ?>" data-table="lab_test_result" data-field="x_LOWHIGH" name="x<?= $Page->RowIndex ?>_LOWHIGH" id="x<?= $Page->RowIndex ?>_LOWHIGH" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->LOWHIGH->getPlaceHolder()) ?>" value="<?= $Page->LOWHIGH->EditValue ?>"<?= $Page->LOWHIGH->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->LOWHIGH->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_LOWHIGH" data-hidden="1" name="o<?= $Page->RowIndex ?>_LOWHIGH" id="o<?= $Page->RowIndex ?>_LOWHIGH" value="<?= HtmlEncode($Page->LOWHIGH->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Unit->Visible) { // Unit ?>
        <td data-name="Unit">
<span id="el$rowindex$_lab_test_result_Unit" class="form-group lab_test_result_Unit">
<input type="<?= $Page->Unit->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Unit" name="x<?= $Page->RowIndex ?>_Unit" id="x<?= $Page->RowIndex ?>_Unit" size="30" maxlength="20" placeholder="<?= HtmlEncode($Page->Unit->getPlaceHolder()) ?>" value="<?= $Page->Unit->EditValue ?>"<?= $Page->Unit->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Unit->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Unit" data-hidden="1" name="o<?= $Page->RowIndex ?>_Unit" id="o<?= $Page->RowIndex ?>_Unit" value="<?= HtmlEncode($Page->Unit->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ResDate->Visible) { // ResDate ?>
        <td data-name="ResDate">
<span id="el$rowindex$_lab_test_result_ResDate" class="form-group lab_test_result_ResDate">
<input type="<?= $Page->ResDate->getInputTextType() ?>" data-table="lab_test_result" data-field="x_ResDate" name="x<?= $Page->RowIndex ?>_ResDate" id="x<?= $Page->RowIndex ?>_ResDate" placeholder="<?= HtmlEncode($Page->ResDate->getPlaceHolder()) ?>" value="<?= $Page->ResDate->EditValue ?>"<?= $Page->ResDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ResDate->getErrorMessage() ?></div>
<?php if (!$Page->ResDate->ReadOnly && !$Page->ResDate->Disabled && !isset($Page->ResDate->EditAttrs["readonly"]) && !isset($Page->ResDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultlist", "datetimepicker"], function() {
    ew.createDateTimePicker("flab_test_resultlist", "x<?= $Page->RowIndex ?>_ResDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ResDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_ResDate" id="o<?= $Page->RowIndex ?>_ResDate" value="<?= HtmlEncode($Page->ResDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Pic1->Visible) { // Pic1 ?>
        <td data-name="Pic1">
<span id="el$rowindex$_lab_test_result_Pic1" class="form-group lab_test_result_Pic1">
<input type="<?= $Page->Pic1->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Pic1" name="x<?= $Page->RowIndex ?>_Pic1" id="x<?= $Page->RowIndex ?>_Pic1" size="30" maxlength="200" placeholder="<?= HtmlEncode($Page->Pic1->getPlaceHolder()) ?>" value="<?= $Page->Pic1->EditValue ?>"<?= $Page->Pic1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Pic1->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Pic1" data-hidden="1" name="o<?= $Page->RowIndex ?>_Pic1" id="o<?= $Page->RowIndex ?>_Pic1" value="<?= HtmlEncode($Page->Pic1->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Pic2->Visible) { // Pic2 ?>
        <td data-name="Pic2">
<span id="el$rowindex$_lab_test_result_Pic2" class="form-group lab_test_result_Pic2">
<input type="<?= $Page->Pic2->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Pic2" name="x<?= $Page->RowIndex ?>_Pic2" id="x<?= $Page->RowIndex ?>_Pic2" size="30" maxlength="200" placeholder="<?= HtmlEncode($Page->Pic2->getPlaceHolder()) ?>" value="<?= $Page->Pic2->EditValue ?>"<?= $Page->Pic2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Pic2->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Pic2" data-hidden="1" name="o<?= $Page->RowIndex ?>_Pic2" id="o<?= $Page->RowIndex ?>_Pic2" value="<?= HtmlEncode($Page->Pic2->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->GraphPath->Visible) { // GraphPath ?>
        <td data-name="GraphPath">
<span id="el$rowindex$_lab_test_result_GraphPath" class="form-group lab_test_result_GraphPath">
<input type="<?= $Page->GraphPath->getInputTextType() ?>" data-table="lab_test_result" data-field="x_GraphPath" name="x<?= $Page->RowIndex ?>_GraphPath" id="x<?= $Page->RowIndex ?>_GraphPath" size="30" maxlength="200" placeholder="<?= HtmlEncode($Page->GraphPath->getPlaceHolder()) ?>" value="<?= $Page->GraphPath->EditValue ?>"<?= $Page->GraphPath->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->GraphPath->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_GraphPath" data-hidden="1" name="o<?= $Page->RowIndex ?>_GraphPath" id="o<?= $Page->RowIndex ?>_GraphPath" value="<?= HtmlEncode($Page->GraphPath->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->SampleDate->Visible) { // SampleDate ?>
        <td data-name="SampleDate">
<span id="el$rowindex$_lab_test_result_SampleDate" class="form-group lab_test_result_SampleDate">
<input type="<?= $Page->SampleDate->getInputTextType() ?>" data-table="lab_test_result" data-field="x_SampleDate" name="x<?= $Page->RowIndex ?>_SampleDate" id="x<?= $Page->RowIndex ?>_SampleDate" placeholder="<?= HtmlEncode($Page->SampleDate->getPlaceHolder()) ?>" value="<?= $Page->SampleDate->EditValue ?>"<?= $Page->SampleDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SampleDate->getErrorMessage() ?></div>
<?php if (!$Page->SampleDate->ReadOnly && !$Page->SampleDate->Disabled && !isset($Page->SampleDate->EditAttrs["readonly"]) && !isset($Page->SampleDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultlist", "datetimepicker"], function() {
    ew.createDateTimePicker("flab_test_resultlist", "x<?= $Page->RowIndex ?>_SampleDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_SampleDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_SampleDate" id="o<?= $Page->RowIndex ?>_SampleDate" value="<?= HtmlEncode($Page->SampleDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->SampleUser->Visible) { // SampleUser ?>
        <td data-name="SampleUser">
<span id="el$rowindex$_lab_test_result_SampleUser" class="form-group lab_test_result_SampleUser">
<input type="<?= $Page->SampleUser->getInputTextType() ?>" data-table="lab_test_result" data-field="x_SampleUser" name="x<?= $Page->RowIndex ?>_SampleUser" id="x<?= $Page->RowIndex ?>_SampleUser" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->SampleUser->getPlaceHolder()) ?>" value="<?= $Page->SampleUser->EditValue ?>"<?= $Page->SampleUser->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SampleUser->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_SampleUser" data-hidden="1" name="o<?= $Page->RowIndex ?>_SampleUser" id="o<?= $Page->RowIndex ?>_SampleUser" value="<?= HtmlEncode($Page->SampleUser->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ReceivedDate->Visible) { // ReceivedDate ?>
        <td data-name="ReceivedDate">
<span id="el$rowindex$_lab_test_result_ReceivedDate" class="form-group lab_test_result_ReceivedDate">
<input type="<?= $Page->ReceivedDate->getInputTextType() ?>" data-table="lab_test_result" data-field="x_ReceivedDate" name="x<?= $Page->RowIndex ?>_ReceivedDate" id="x<?= $Page->RowIndex ?>_ReceivedDate" placeholder="<?= HtmlEncode($Page->ReceivedDate->getPlaceHolder()) ?>" value="<?= $Page->ReceivedDate->EditValue ?>"<?= $Page->ReceivedDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ReceivedDate->getErrorMessage() ?></div>
<?php if (!$Page->ReceivedDate->ReadOnly && !$Page->ReceivedDate->Disabled && !isset($Page->ReceivedDate->EditAttrs["readonly"]) && !isset($Page->ReceivedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultlist", "datetimepicker"], function() {
    ew.createDateTimePicker("flab_test_resultlist", "x<?= $Page->RowIndex ?>_ReceivedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ReceivedDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_ReceivedDate" id="o<?= $Page->RowIndex ?>_ReceivedDate" value="<?= HtmlEncode($Page->ReceivedDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ReceivedUser->Visible) { // ReceivedUser ?>
        <td data-name="ReceivedUser">
<span id="el$rowindex$_lab_test_result_ReceivedUser" class="form-group lab_test_result_ReceivedUser">
<input type="<?= $Page->ReceivedUser->getInputTextType() ?>" data-table="lab_test_result" data-field="x_ReceivedUser" name="x<?= $Page->RowIndex ?>_ReceivedUser" id="x<?= $Page->RowIndex ?>_ReceivedUser" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->ReceivedUser->getPlaceHolder()) ?>" value="<?= $Page->ReceivedUser->EditValue ?>"<?= $Page->ReceivedUser->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ReceivedUser->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ReceivedUser" data-hidden="1" name="o<?= $Page->RowIndex ?>_ReceivedUser" id="o<?= $Page->RowIndex ?>_ReceivedUser" value="<?= HtmlEncode($Page->ReceivedUser->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->DeptRecvDate->Visible) { // DeptRecvDate ?>
        <td data-name="DeptRecvDate">
<span id="el$rowindex$_lab_test_result_DeptRecvDate" class="form-group lab_test_result_DeptRecvDate">
<input type="<?= $Page->DeptRecvDate->getInputTextType() ?>" data-table="lab_test_result" data-field="x_DeptRecvDate" name="x<?= $Page->RowIndex ?>_DeptRecvDate" id="x<?= $Page->RowIndex ?>_DeptRecvDate" placeholder="<?= HtmlEncode($Page->DeptRecvDate->getPlaceHolder()) ?>" value="<?= $Page->DeptRecvDate->EditValue ?>"<?= $Page->DeptRecvDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DeptRecvDate->getErrorMessage() ?></div>
<?php if (!$Page->DeptRecvDate->ReadOnly && !$Page->DeptRecvDate->Disabled && !isset($Page->DeptRecvDate->EditAttrs["readonly"]) && !isset($Page->DeptRecvDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultlist", "datetimepicker"], function() {
    ew.createDateTimePicker("flab_test_resultlist", "x<?= $Page->RowIndex ?>_DeptRecvDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_DeptRecvDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_DeptRecvDate" id="o<?= $Page->RowIndex ?>_DeptRecvDate" value="<?= HtmlEncode($Page->DeptRecvDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->DeptRecvUser->Visible) { // DeptRecvUser ?>
        <td data-name="DeptRecvUser">
<span id="el$rowindex$_lab_test_result_DeptRecvUser" class="form-group lab_test_result_DeptRecvUser">
<input type="<?= $Page->DeptRecvUser->getInputTextType() ?>" data-table="lab_test_result" data-field="x_DeptRecvUser" name="x<?= $Page->RowIndex ?>_DeptRecvUser" id="x<?= $Page->RowIndex ?>_DeptRecvUser" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->DeptRecvUser->getPlaceHolder()) ?>" value="<?= $Page->DeptRecvUser->EditValue ?>"<?= $Page->DeptRecvUser->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DeptRecvUser->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_DeptRecvUser" data-hidden="1" name="o<?= $Page->RowIndex ?>_DeptRecvUser" id="o<?= $Page->RowIndex ?>_DeptRecvUser" value="<?= HtmlEncode($Page->DeptRecvUser->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->PrintBy->Visible) { // PrintBy ?>
        <td data-name="PrintBy">
<span id="el$rowindex$_lab_test_result_PrintBy" class="form-group lab_test_result_PrintBy">
<input type="<?= $Page->PrintBy->getInputTextType() ?>" data-table="lab_test_result" data-field="x_PrintBy" name="x<?= $Page->RowIndex ?>_PrintBy" id="x<?= $Page->RowIndex ?>_PrintBy" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->PrintBy->getPlaceHolder()) ?>" value="<?= $Page->PrintBy->EditValue ?>"<?= $Page->PrintBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PrintBy->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_PrintBy" data-hidden="1" name="o<?= $Page->RowIndex ?>_PrintBy" id="o<?= $Page->RowIndex ?>_PrintBy" value="<?= HtmlEncode($Page->PrintBy->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->PrintDate->Visible) { // PrintDate ?>
        <td data-name="PrintDate">
<span id="el$rowindex$_lab_test_result_PrintDate" class="form-group lab_test_result_PrintDate">
<input type="<?= $Page->PrintDate->getInputTextType() ?>" data-table="lab_test_result" data-field="x_PrintDate" name="x<?= $Page->RowIndex ?>_PrintDate" id="x<?= $Page->RowIndex ?>_PrintDate" placeholder="<?= HtmlEncode($Page->PrintDate->getPlaceHolder()) ?>" value="<?= $Page->PrintDate->EditValue ?>"<?= $Page->PrintDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PrintDate->getErrorMessage() ?></div>
<?php if (!$Page->PrintDate->ReadOnly && !$Page->PrintDate->Disabled && !isset($Page->PrintDate->EditAttrs["readonly"]) && !isset($Page->PrintDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultlist", "datetimepicker"], function() {
    ew.createDateTimePicker("flab_test_resultlist", "x<?= $Page->RowIndex ?>_PrintDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_PrintDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_PrintDate" id="o<?= $Page->RowIndex ?>_PrintDate" value="<?= HtmlEncode($Page->PrintDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->MachineCD->Visible) { // MachineCD ?>
        <td data-name="MachineCD">
<span id="el$rowindex$_lab_test_result_MachineCD" class="form-group lab_test_result_MachineCD">
<input type="<?= $Page->MachineCD->getInputTextType() ?>" data-table="lab_test_result" data-field="x_MachineCD" name="x<?= $Page->RowIndex ?>_MachineCD" id="x<?= $Page->RowIndex ?>_MachineCD" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->MachineCD->getPlaceHolder()) ?>" value="<?= $Page->MachineCD->EditValue ?>"<?= $Page->MachineCD->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->MachineCD->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_MachineCD" data-hidden="1" name="o<?= $Page->RowIndex ?>_MachineCD" id="o<?= $Page->RowIndex ?>_MachineCD" value="<?= HtmlEncode($Page->MachineCD->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->TestCancel->Visible) { // TestCancel ?>
        <td data-name="TestCancel">
<span id="el$rowindex$_lab_test_result_TestCancel" class="form-group lab_test_result_TestCancel">
<input type="<?= $Page->TestCancel->getInputTextType() ?>" data-table="lab_test_result" data-field="x_TestCancel" name="x<?= $Page->RowIndex ?>_TestCancel" id="x<?= $Page->RowIndex ?>_TestCancel" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->TestCancel->getPlaceHolder()) ?>" value="<?= $Page->TestCancel->EditValue ?>"<?= $Page->TestCancel->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TestCancel->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_TestCancel" data-hidden="1" name="o<?= $Page->RowIndex ?>_TestCancel" id="o<?= $Page->RowIndex ?>_TestCancel" value="<?= HtmlEncode($Page->TestCancel->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->OutSource->Visible) { // OutSource ?>
        <td data-name="OutSource">
<span id="el$rowindex$_lab_test_result_OutSource" class="form-group lab_test_result_OutSource">
<input type="<?= $Page->OutSource->getInputTextType() ?>" data-table="lab_test_result" data-field="x_OutSource" name="x<?= $Page->RowIndex ?>_OutSource" id="x<?= $Page->RowIndex ?>_OutSource" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->OutSource->getPlaceHolder()) ?>" value="<?= $Page->OutSource->EditValue ?>"<?= $Page->OutSource->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->OutSource->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_OutSource" data-hidden="1" name="o<?= $Page->RowIndex ?>_OutSource" id="o<?= $Page->RowIndex ?>_OutSource" value="<?= HtmlEncode($Page->OutSource->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Tariff->Visible) { // Tariff ?>
        <td data-name="Tariff">
<span id="el$rowindex$_lab_test_result_Tariff" class="form-group lab_test_result_Tariff">
<input type="<?= $Page->Tariff->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Tariff" name="x<?= $Page->RowIndex ?>_Tariff" id="x<?= $Page->RowIndex ?>_Tariff" size="30" placeholder="<?= HtmlEncode($Page->Tariff->getPlaceHolder()) ?>" value="<?= $Page->Tariff->EditValue ?>"<?= $Page->Tariff->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Tariff->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Tariff" data-hidden="1" name="o<?= $Page->RowIndex ?>_Tariff" id="o<?= $Page->RowIndex ?>_Tariff" value="<?= HtmlEncode($Page->Tariff->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->EDITDATE->Visible) { // EDITDATE ?>
        <td data-name="EDITDATE">
<span id="el$rowindex$_lab_test_result_EDITDATE" class="form-group lab_test_result_EDITDATE">
<input type="<?= $Page->EDITDATE->getInputTextType() ?>" data-table="lab_test_result" data-field="x_EDITDATE" name="x<?= $Page->RowIndex ?>_EDITDATE" id="x<?= $Page->RowIndex ?>_EDITDATE" placeholder="<?= HtmlEncode($Page->EDITDATE->getPlaceHolder()) ?>" value="<?= $Page->EDITDATE->EditValue ?>"<?= $Page->EDITDATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->EDITDATE->getErrorMessage() ?></div>
<?php if (!$Page->EDITDATE->ReadOnly && !$Page->EDITDATE->Disabled && !isset($Page->EDITDATE->EditAttrs["readonly"]) && !isset($Page->EDITDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultlist", "datetimepicker"], function() {
    ew.createDateTimePicker("flab_test_resultlist", "x<?= $Page->RowIndex ?>_EDITDATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_EDITDATE" data-hidden="1" name="o<?= $Page->RowIndex ?>_EDITDATE" id="o<?= $Page->RowIndex ?>_EDITDATE" value="<?= HtmlEncode($Page->EDITDATE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->UPLOAD->Visible) { // UPLOAD ?>
        <td data-name="UPLOAD">
<span id="el$rowindex$_lab_test_result_UPLOAD" class="form-group lab_test_result_UPLOAD">
<input type="<?= $Page->UPLOAD->getInputTextType() ?>" data-table="lab_test_result" data-field="x_UPLOAD" name="x<?= $Page->RowIndex ?>_UPLOAD" id="x<?= $Page->RowIndex ?>_UPLOAD" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->UPLOAD->getPlaceHolder()) ?>" value="<?= $Page->UPLOAD->EditValue ?>"<?= $Page->UPLOAD->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->UPLOAD->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_UPLOAD" data-hidden="1" name="o<?= $Page->RowIndex ?>_UPLOAD" id="o<?= $Page->RowIndex ?>_UPLOAD" value="<?= HtmlEncode($Page->UPLOAD->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->SAuthDate->Visible) { // SAuthDate ?>
        <td data-name="SAuthDate">
<span id="el$rowindex$_lab_test_result_SAuthDate" class="form-group lab_test_result_SAuthDate">
<input type="<?= $Page->SAuthDate->getInputTextType() ?>" data-table="lab_test_result" data-field="x_SAuthDate" name="x<?= $Page->RowIndex ?>_SAuthDate" id="x<?= $Page->RowIndex ?>_SAuthDate" placeholder="<?= HtmlEncode($Page->SAuthDate->getPlaceHolder()) ?>" value="<?= $Page->SAuthDate->EditValue ?>"<?= $Page->SAuthDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SAuthDate->getErrorMessage() ?></div>
<?php if (!$Page->SAuthDate->ReadOnly && !$Page->SAuthDate->Disabled && !isset($Page->SAuthDate->EditAttrs["readonly"]) && !isset($Page->SAuthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultlist", "datetimepicker"], function() {
    ew.createDateTimePicker("flab_test_resultlist", "x<?= $Page->RowIndex ?>_SAuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_SAuthDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_SAuthDate" id="o<?= $Page->RowIndex ?>_SAuthDate" value="<?= HtmlEncode($Page->SAuthDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->SAuthBy->Visible) { // SAuthBy ?>
        <td data-name="SAuthBy">
<span id="el$rowindex$_lab_test_result_SAuthBy" class="form-group lab_test_result_SAuthBy">
<input type="<?= $Page->SAuthBy->getInputTextType() ?>" data-table="lab_test_result" data-field="x_SAuthBy" name="x<?= $Page->RowIndex ?>_SAuthBy" id="x<?= $Page->RowIndex ?>_SAuthBy" size="30" maxlength="3" placeholder="<?= HtmlEncode($Page->SAuthBy->getPlaceHolder()) ?>" value="<?= $Page->SAuthBy->EditValue ?>"<?= $Page->SAuthBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SAuthBy->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_SAuthBy" data-hidden="1" name="o<?= $Page->RowIndex ?>_SAuthBy" id="o<?= $Page->RowIndex ?>_SAuthBy" value="<?= HtmlEncode($Page->SAuthBy->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->NoRC->Visible) { // NoRC ?>
        <td data-name="NoRC">
<span id="el$rowindex$_lab_test_result_NoRC" class="form-group lab_test_result_NoRC">
<input type="<?= $Page->NoRC->getInputTextType() ?>" data-table="lab_test_result" data-field="x_NoRC" name="x<?= $Page->RowIndex ?>_NoRC" id="x<?= $Page->RowIndex ?>_NoRC" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->NoRC->getPlaceHolder()) ?>" value="<?= $Page->NoRC->EditValue ?>"<?= $Page->NoRC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->NoRC->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_NoRC" data-hidden="1" name="o<?= $Page->RowIndex ?>_NoRC" id="o<?= $Page->RowIndex ?>_NoRC" value="<?= HtmlEncode($Page->NoRC->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->DispDt->Visible) { // DispDt ?>
        <td data-name="DispDt">
<span id="el$rowindex$_lab_test_result_DispDt" class="form-group lab_test_result_DispDt">
<input type="<?= $Page->DispDt->getInputTextType() ?>" data-table="lab_test_result" data-field="x_DispDt" name="x<?= $Page->RowIndex ?>_DispDt" id="x<?= $Page->RowIndex ?>_DispDt" placeholder="<?= HtmlEncode($Page->DispDt->getPlaceHolder()) ?>" value="<?= $Page->DispDt->EditValue ?>"<?= $Page->DispDt->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DispDt->getErrorMessage() ?></div>
<?php if (!$Page->DispDt->ReadOnly && !$Page->DispDt->Disabled && !isset($Page->DispDt->EditAttrs["readonly"]) && !isset($Page->DispDt->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultlist", "datetimepicker"], function() {
    ew.createDateTimePicker("flab_test_resultlist", "x<?= $Page->RowIndex ?>_DispDt", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_DispDt" data-hidden="1" name="o<?= $Page->RowIndex ?>_DispDt" id="o<?= $Page->RowIndex ?>_DispDt" value="<?= HtmlEncode($Page->DispDt->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->DispUser->Visible) { // DispUser ?>
        <td data-name="DispUser">
<span id="el$rowindex$_lab_test_result_DispUser" class="form-group lab_test_result_DispUser">
<input type="<?= $Page->DispUser->getInputTextType() ?>" data-table="lab_test_result" data-field="x_DispUser" name="x<?= $Page->RowIndex ?>_DispUser" id="x<?= $Page->RowIndex ?>_DispUser" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->DispUser->getPlaceHolder()) ?>" value="<?= $Page->DispUser->EditValue ?>"<?= $Page->DispUser->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DispUser->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_DispUser" data-hidden="1" name="o<?= $Page->RowIndex ?>_DispUser" id="o<?= $Page->RowIndex ?>_DispUser" value="<?= HtmlEncode($Page->DispUser->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->DispRemarks->Visible) { // DispRemarks ?>
        <td data-name="DispRemarks">
<span id="el$rowindex$_lab_test_result_DispRemarks" class="form-group lab_test_result_DispRemarks">
<input type="<?= $Page->DispRemarks->getInputTextType() ?>" data-table="lab_test_result" data-field="x_DispRemarks" name="x<?= $Page->RowIndex ?>_DispRemarks" id="x<?= $Page->RowIndex ?>_DispRemarks" size="30" maxlength="250" placeholder="<?= HtmlEncode($Page->DispRemarks->getPlaceHolder()) ?>" value="<?= $Page->DispRemarks->EditValue ?>"<?= $Page->DispRemarks->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DispRemarks->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_DispRemarks" data-hidden="1" name="o<?= $Page->RowIndex ?>_DispRemarks" id="o<?= $Page->RowIndex ?>_DispRemarks" value="<?= HtmlEncode($Page->DispRemarks->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->DispMode->Visible) { // DispMode ?>
        <td data-name="DispMode">
<span id="el$rowindex$_lab_test_result_DispMode" class="form-group lab_test_result_DispMode">
<input type="<?= $Page->DispMode->getInputTextType() ?>" data-table="lab_test_result" data-field="x_DispMode" name="x<?= $Page->RowIndex ?>_DispMode" id="x<?= $Page->RowIndex ?>_DispMode" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->DispMode->getPlaceHolder()) ?>" value="<?= $Page->DispMode->EditValue ?>"<?= $Page->DispMode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DispMode->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_DispMode" data-hidden="1" name="o<?= $Page->RowIndex ?>_DispMode" id="o<?= $Page->RowIndex ?>_DispMode" value="<?= HtmlEncode($Page->DispMode->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ProductCD->Visible) { // ProductCD ?>
        <td data-name="ProductCD">
<span id="el$rowindex$_lab_test_result_ProductCD" class="form-group lab_test_result_ProductCD">
<input type="<?= $Page->ProductCD->getInputTextType() ?>" data-table="lab_test_result" data-field="x_ProductCD" name="x<?= $Page->RowIndex ?>_ProductCD" id="x<?= $Page->RowIndex ?>_ProductCD" size="30" maxlength="6" placeholder="<?= HtmlEncode($Page->ProductCD->getPlaceHolder()) ?>" value="<?= $Page->ProductCD->EditValue ?>"<?= $Page->ProductCD->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ProductCD->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ProductCD" data-hidden="1" name="o<?= $Page->RowIndex ?>_ProductCD" id="o<?= $Page->RowIndex ?>_ProductCD" value="<?= HtmlEncode($Page->ProductCD->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Nos->Visible) { // Nos ?>
        <td data-name="Nos">
<span id="el$rowindex$_lab_test_result_Nos" class="form-group lab_test_result_Nos">
<input type="<?= $Page->Nos->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Nos" name="x<?= $Page->RowIndex ?>_Nos" id="x<?= $Page->RowIndex ?>_Nos" size="30" placeholder="<?= HtmlEncode($Page->Nos->getPlaceHolder()) ?>" value="<?= $Page->Nos->EditValue ?>"<?= $Page->Nos->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Nos->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Nos" data-hidden="1" name="o<?= $Page->RowIndex ?>_Nos" id="o<?= $Page->RowIndex ?>_Nos" value="<?= HtmlEncode($Page->Nos->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->WBCPath->Visible) { // WBCPath ?>
        <td data-name="WBCPath">
<span id="el$rowindex$_lab_test_result_WBCPath" class="form-group lab_test_result_WBCPath">
<input type="<?= $Page->WBCPath->getInputTextType() ?>" data-table="lab_test_result" data-field="x_WBCPath" name="x<?= $Page->RowIndex ?>_WBCPath" id="x<?= $Page->RowIndex ?>_WBCPath" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->WBCPath->getPlaceHolder()) ?>" value="<?= $Page->WBCPath->EditValue ?>"<?= $Page->WBCPath->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->WBCPath->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_WBCPath" data-hidden="1" name="o<?= $Page->RowIndex ?>_WBCPath" id="o<?= $Page->RowIndex ?>_WBCPath" value="<?= HtmlEncode($Page->WBCPath->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->RBCPath->Visible) { // RBCPath ?>
        <td data-name="RBCPath">
<span id="el$rowindex$_lab_test_result_RBCPath" class="form-group lab_test_result_RBCPath">
<input type="<?= $Page->RBCPath->getInputTextType() ?>" data-table="lab_test_result" data-field="x_RBCPath" name="x<?= $Page->RowIndex ?>_RBCPath" id="x<?= $Page->RowIndex ?>_RBCPath" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->RBCPath->getPlaceHolder()) ?>" value="<?= $Page->RBCPath->EditValue ?>"<?= $Page->RBCPath->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RBCPath->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_RBCPath" data-hidden="1" name="o<?= $Page->RowIndex ?>_RBCPath" id="o<?= $Page->RowIndex ?>_RBCPath" value="<?= HtmlEncode($Page->RBCPath->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->PTPath->Visible) { // PTPath ?>
        <td data-name="PTPath">
<span id="el$rowindex$_lab_test_result_PTPath" class="form-group lab_test_result_PTPath">
<input type="<?= $Page->PTPath->getInputTextType() ?>" data-table="lab_test_result" data-field="x_PTPath" name="x<?= $Page->RowIndex ?>_PTPath" id="x<?= $Page->RowIndex ?>_PTPath" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->PTPath->getPlaceHolder()) ?>" value="<?= $Page->PTPath->EditValue ?>"<?= $Page->PTPath->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PTPath->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_PTPath" data-hidden="1" name="o<?= $Page->RowIndex ?>_PTPath" id="o<?= $Page->RowIndex ?>_PTPath" value="<?= HtmlEncode($Page->PTPath->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ActualAmt->Visible) { // ActualAmt ?>
        <td data-name="ActualAmt">
<span id="el$rowindex$_lab_test_result_ActualAmt" class="form-group lab_test_result_ActualAmt">
<input type="<?= $Page->ActualAmt->getInputTextType() ?>" data-table="lab_test_result" data-field="x_ActualAmt" name="x<?= $Page->RowIndex ?>_ActualAmt" id="x<?= $Page->RowIndex ?>_ActualAmt" size="30" placeholder="<?= HtmlEncode($Page->ActualAmt->getPlaceHolder()) ?>" value="<?= $Page->ActualAmt->EditValue ?>"<?= $Page->ActualAmt->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ActualAmt->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ActualAmt" data-hidden="1" name="o<?= $Page->RowIndex ?>_ActualAmt" id="o<?= $Page->RowIndex ?>_ActualAmt" value="<?= HtmlEncode($Page->ActualAmt->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->NoSign->Visible) { // NoSign ?>
        <td data-name="NoSign">
<span id="el$rowindex$_lab_test_result_NoSign" class="form-group lab_test_result_NoSign">
<input type="<?= $Page->NoSign->getInputTextType() ?>" data-table="lab_test_result" data-field="x_NoSign" name="x<?= $Page->RowIndex ?>_NoSign" id="x<?= $Page->RowIndex ?>_NoSign" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->NoSign->getPlaceHolder()) ?>" value="<?= $Page->NoSign->EditValue ?>"<?= $Page->NoSign->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->NoSign->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_NoSign" data-hidden="1" name="o<?= $Page->RowIndex ?>_NoSign" id="o<?= $Page->RowIndex ?>_NoSign" value="<?= HtmlEncode($Page->NoSign->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->_Barcode->Visible) { // Barcode ?>
        <td data-name="_Barcode">
<span id="el$rowindex$_lab_test_result__Barcode" class="form-group lab_test_result__Barcode">
<input type="<?= $Page->_Barcode->getInputTextType() ?>" data-table="lab_test_result" data-field="x__Barcode" name="x<?= $Page->RowIndex ?>__Barcode" id="x<?= $Page->RowIndex ?>__Barcode" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->_Barcode->getPlaceHolder()) ?>" value="<?= $Page->_Barcode->EditValue ?>"<?= $Page->_Barcode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->_Barcode->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x__Barcode" data-hidden="1" name="o<?= $Page->RowIndex ?>__Barcode" id="o<?= $Page->RowIndex ?>__Barcode" value="<?= HtmlEncode($Page->_Barcode->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ReadTime->Visible) { // ReadTime ?>
        <td data-name="ReadTime">
<span id="el$rowindex$_lab_test_result_ReadTime" class="form-group lab_test_result_ReadTime">
<input type="<?= $Page->ReadTime->getInputTextType() ?>" data-table="lab_test_result" data-field="x_ReadTime" name="x<?= $Page->RowIndex ?>_ReadTime" id="x<?= $Page->RowIndex ?>_ReadTime" placeholder="<?= HtmlEncode($Page->ReadTime->getPlaceHolder()) ?>" value="<?= $Page->ReadTime->EditValue ?>"<?= $Page->ReadTime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ReadTime->getErrorMessage() ?></div>
<?php if (!$Page->ReadTime->ReadOnly && !$Page->ReadTime->Disabled && !isset($Page->ReadTime->EditAttrs["readonly"]) && !isset($Page->ReadTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultlist", "datetimepicker"], function() {
    ew.createDateTimePicker("flab_test_resultlist", "x<?= $Page->RowIndex ?>_ReadTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ReadTime" data-hidden="1" name="o<?= $Page->RowIndex ?>_ReadTime" id="o<?= $Page->RowIndex ?>_ReadTime" value="<?= HtmlEncode($Page->ReadTime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->VailID->Visible) { // VailID ?>
        <td data-name="VailID">
<span id="el$rowindex$_lab_test_result_VailID" class="form-group lab_test_result_VailID">
<input type="<?= $Page->VailID->getInputTextType() ?>" data-table="lab_test_result" data-field="x_VailID" name="x<?= $Page->RowIndex ?>_VailID" id="x<?= $Page->RowIndex ?>_VailID" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->VailID->getPlaceHolder()) ?>" value="<?= $Page->VailID->EditValue ?>"<?= $Page->VailID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->VailID->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_VailID" data-hidden="1" name="o<?= $Page->RowIndex ?>_VailID" id="o<?= $Page->RowIndex ?>_VailID" value="<?= HtmlEncode($Page->VailID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ReadMachine->Visible) { // ReadMachine ?>
        <td data-name="ReadMachine">
<span id="el$rowindex$_lab_test_result_ReadMachine" class="form-group lab_test_result_ReadMachine">
<input type="<?= $Page->ReadMachine->getInputTextType() ?>" data-table="lab_test_result" data-field="x_ReadMachine" name="x<?= $Page->RowIndex ?>_ReadMachine" id="x<?= $Page->RowIndex ?>_ReadMachine" size="30" maxlength="20" placeholder="<?= HtmlEncode($Page->ReadMachine->getPlaceHolder()) ?>" value="<?= $Page->ReadMachine->EditValue ?>"<?= $Page->ReadMachine->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ReadMachine->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ReadMachine" data-hidden="1" name="o<?= $Page->RowIndex ?>_ReadMachine" id="o<?= $Page->RowIndex ?>_ReadMachine" value="<?= HtmlEncode($Page->ReadMachine->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->LabCD->Visible) { // LabCD ?>
        <td data-name="LabCD">
<span id="el$rowindex$_lab_test_result_LabCD" class="form-group lab_test_result_LabCD">
<input type="<?= $Page->LabCD->getInputTextType() ?>" data-table="lab_test_result" data-field="x_LabCD" name="x<?= $Page->RowIndex ?>_LabCD" id="x<?= $Page->RowIndex ?>_LabCD" size="30" maxlength="6" placeholder="<?= HtmlEncode($Page->LabCD->getPlaceHolder()) ?>" value="<?= $Page->LabCD->EditValue ?>"<?= $Page->LabCD->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->LabCD->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_LabCD" data-hidden="1" name="o<?= $Page->RowIndex ?>_LabCD" id="o<?= $Page->RowIndex ?>_LabCD" value="<?= HtmlEncode($Page->LabCD->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->OutLabAmt->Visible) { // OutLabAmt ?>
        <td data-name="OutLabAmt">
<span id="el$rowindex$_lab_test_result_OutLabAmt" class="form-group lab_test_result_OutLabAmt">
<input type="<?= $Page->OutLabAmt->getInputTextType() ?>" data-table="lab_test_result" data-field="x_OutLabAmt" name="x<?= $Page->RowIndex ?>_OutLabAmt" id="x<?= $Page->RowIndex ?>_OutLabAmt" size="30" placeholder="<?= HtmlEncode($Page->OutLabAmt->getPlaceHolder()) ?>" value="<?= $Page->OutLabAmt->EditValue ?>"<?= $Page->OutLabAmt->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->OutLabAmt->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_OutLabAmt" data-hidden="1" name="o<?= $Page->RowIndex ?>_OutLabAmt" id="o<?= $Page->RowIndex ?>_OutLabAmt" value="<?= HtmlEncode($Page->OutLabAmt->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ProductQty->Visible) { // ProductQty ?>
        <td data-name="ProductQty">
<span id="el$rowindex$_lab_test_result_ProductQty" class="form-group lab_test_result_ProductQty">
<input type="<?= $Page->ProductQty->getInputTextType() ?>" data-table="lab_test_result" data-field="x_ProductQty" name="x<?= $Page->RowIndex ?>_ProductQty" id="x<?= $Page->RowIndex ?>_ProductQty" size="30" placeholder="<?= HtmlEncode($Page->ProductQty->getPlaceHolder()) ?>" value="<?= $Page->ProductQty->EditValue ?>"<?= $Page->ProductQty->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ProductQty->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ProductQty" data-hidden="1" name="o<?= $Page->RowIndex ?>_ProductQty" id="o<?= $Page->RowIndex ?>_ProductQty" value="<?= HtmlEncode($Page->ProductQty->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Repeat->Visible) { // Repeat ?>
        <td data-name="Repeat">
<span id="el$rowindex$_lab_test_result_Repeat" class="form-group lab_test_result_Repeat">
<input type="<?= $Page->Repeat->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Repeat" name="x<?= $Page->RowIndex ?>_Repeat" id="x<?= $Page->RowIndex ?>_Repeat" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->Repeat->getPlaceHolder()) ?>" value="<?= $Page->Repeat->EditValue ?>"<?= $Page->Repeat->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Repeat->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Repeat" data-hidden="1" name="o<?= $Page->RowIndex ?>_Repeat" id="o<?= $Page->RowIndex ?>_Repeat" value="<?= HtmlEncode($Page->Repeat->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->DeptNo->Visible) { // DeptNo ?>
        <td data-name="DeptNo">
<span id="el$rowindex$_lab_test_result_DeptNo" class="form-group lab_test_result_DeptNo">
<input type="<?= $Page->DeptNo->getInputTextType() ?>" data-table="lab_test_result" data-field="x_DeptNo" name="x<?= $Page->RowIndex ?>_DeptNo" id="x<?= $Page->RowIndex ?>_DeptNo" size="30" maxlength="5" placeholder="<?= HtmlEncode($Page->DeptNo->getPlaceHolder()) ?>" value="<?= $Page->DeptNo->EditValue ?>"<?= $Page->DeptNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DeptNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_DeptNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_DeptNo" id="o<?= $Page->RowIndex ?>_DeptNo" value="<?= HtmlEncode($Page->DeptNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Desc1->Visible) { // Desc1 ?>
        <td data-name="Desc1">
<span id="el$rowindex$_lab_test_result_Desc1" class="form-group lab_test_result_Desc1">
<input type="<?= $Page->Desc1->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Desc1" name="x<?= $Page->RowIndex ?>_Desc1" id="x<?= $Page->RowIndex ?>_Desc1" size="30" maxlength="200" placeholder="<?= HtmlEncode($Page->Desc1->getPlaceHolder()) ?>" value="<?= $Page->Desc1->EditValue ?>"<?= $Page->Desc1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Desc1->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Desc1" data-hidden="1" name="o<?= $Page->RowIndex ?>_Desc1" id="o<?= $Page->RowIndex ?>_Desc1" value="<?= HtmlEncode($Page->Desc1->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Desc2->Visible) { // Desc2 ?>
        <td data-name="Desc2">
<span id="el$rowindex$_lab_test_result_Desc2" class="form-group lab_test_result_Desc2">
<input type="<?= $Page->Desc2->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Desc2" name="x<?= $Page->RowIndex ?>_Desc2" id="x<?= $Page->RowIndex ?>_Desc2" size="30" maxlength="200" placeholder="<?= HtmlEncode($Page->Desc2->getPlaceHolder()) ?>" value="<?= $Page->Desc2->EditValue ?>"<?= $Page->Desc2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Desc2->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Desc2" data-hidden="1" name="o<?= $Page->RowIndex ?>_Desc2" id="o<?= $Page->RowIndex ?>_Desc2" value="<?= HtmlEncode($Page->Desc2->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->RptResult->Visible) { // RptResult ?>
        <td data-name="RptResult">
<span id="el$rowindex$_lab_test_result_RptResult" class="form-group lab_test_result_RptResult">
<input type="<?= $Page->RptResult->getInputTextType() ?>" data-table="lab_test_result" data-field="x_RptResult" name="x<?= $Page->RowIndex ?>_RptResult" id="x<?= $Page->RowIndex ?>_RptResult" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->RptResult->getPlaceHolder()) ?>" value="<?= $Page->RptResult->EditValue ?>"<?= $Page->RptResult->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RptResult->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_RptResult" data-hidden="1" name="o<?= $Page->RowIndex ?>_RptResult" id="o<?= $Page->RowIndex ?>_RptResult" value="<?= HtmlEncode($Page->RptResult->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowIndex);
?>
<script>
loadjs.ready(["flab_test_resultlist","load"], function() {
    flab_test_resultlist.updateLists(<?= $Page->RowIndex ?>);
});
</script>
    </tr>
<?php
    }
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if ($Page->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
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
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<?php if (!$Page->isExport()) { ?>
<script>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("lab_test_result");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php if (!$Page->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function () {
    ew.fixedHeaderTable({
        delay: 0,
        container: "gmp_lab_test_result",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>
