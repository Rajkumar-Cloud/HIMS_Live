<?php

namespace PHPMaker2021\HIMS;

// Page object
$LabTestResultAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var flab_test_resultadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    flab_test_resultadd = currentForm = new ew.Form("flab_test_resultadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "lab_test_result")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.lab_test_result)
        ew.vars.tables.lab_test_result = currentTable;
    flab_test_resultadd.addFields([
        ["Branch", [fields.Branch.visible && fields.Branch.required ? ew.Validators.required(fields.Branch.caption) : null], fields.Branch.isInvalid],
        ["SidNo", [fields.SidNo.visible && fields.SidNo.required ? ew.Validators.required(fields.SidNo.caption) : null], fields.SidNo.isInvalid],
        ["SidDate", [fields.SidDate.visible && fields.SidDate.required ? ew.Validators.required(fields.SidDate.caption) : null, ew.Validators.datetime(0)], fields.SidDate.isInvalid],
        ["TestCd", [fields.TestCd.visible && fields.TestCd.required ? ew.Validators.required(fields.TestCd.caption) : null], fields.TestCd.isInvalid],
        ["TestSubCd", [fields.TestSubCd.visible && fields.TestSubCd.required ? ew.Validators.required(fields.TestSubCd.caption) : null], fields.TestSubCd.isInvalid],
        ["DEptCd", [fields.DEptCd.visible && fields.DEptCd.required ? ew.Validators.required(fields.DEptCd.caption) : null], fields.DEptCd.isInvalid],
        ["ProfCd", [fields.ProfCd.visible && fields.ProfCd.required ? ew.Validators.required(fields.ProfCd.caption) : null], fields.ProfCd.isInvalid],
        ["LabReport", [fields.LabReport.visible && fields.LabReport.required ? ew.Validators.required(fields.LabReport.caption) : null], fields.LabReport.isInvalid],
        ["ResultDate", [fields.ResultDate.visible && fields.ResultDate.required ? ew.Validators.required(fields.ResultDate.caption) : null, ew.Validators.datetime(0)], fields.ResultDate.isInvalid],
        ["Comments", [fields.Comments.visible && fields.Comments.required ? ew.Validators.required(fields.Comments.caption) : null], fields.Comments.isInvalid],
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
        ["RefValue", [fields.RefValue.visible && fields.RefValue.required ? ew.Validators.required(fields.RefValue.caption) : null], fields.RefValue.isInvalid],
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
        ["Result", [fields.Result.visible && fields.Result.required ? ew.Validators.required(fields.Result.caption) : null], fields.Result.isInvalid],
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
        var f = flab_test_resultadd,
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
    flab_test_resultadd.validate = function () {
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
    flab_test_resultadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    flab_test_resultadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("flab_test_resultadd");
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
<form name="flab_test_resultadd" id="flab_test_resultadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="lab_test_result">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->Branch->Visible) { // Branch ?>
    <div id="r_Branch" class="form-group row">
        <label id="elh_lab_test_result_Branch" for="x_Branch" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Branch->caption() ?><?= $Page->Branch->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Branch->cellAttributes() ?>>
<span id="el_lab_test_result_Branch">
<input type="<?= $Page->Branch->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Branch" name="x_Branch" id="x_Branch" size="30" maxlength="4" placeholder="<?= HtmlEncode($Page->Branch->getPlaceHolder()) ?>" value="<?= $Page->Branch->EditValue ?>"<?= $Page->Branch->editAttributes() ?> aria-describedby="x_Branch_help">
<?= $Page->Branch->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Branch->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SidNo->Visible) { // SidNo ?>
    <div id="r_SidNo" class="form-group row">
        <label id="elh_lab_test_result_SidNo" for="x_SidNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SidNo->caption() ?><?= $Page->SidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SidNo->cellAttributes() ?>>
<span id="el_lab_test_result_SidNo">
<input type="<?= $Page->SidNo->getInputTextType() ?>" data-table="lab_test_result" data-field="x_SidNo" name="x_SidNo" id="x_SidNo" size="30" maxlength="6" placeholder="<?= HtmlEncode($Page->SidNo->getPlaceHolder()) ?>" value="<?= $Page->SidNo->EditValue ?>"<?= $Page->SidNo->editAttributes() ?> aria-describedby="x_SidNo_help">
<?= $Page->SidNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SidNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SidDate->Visible) { // SidDate ?>
    <div id="r_SidDate" class="form-group row">
        <label id="elh_lab_test_result_SidDate" for="x_SidDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SidDate->caption() ?><?= $Page->SidDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SidDate->cellAttributes() ?>>
<span id="el_lab_test_result_SidDate">
<input type="<?= $Page->SidDate->getInputTextType() ?>" data-table="lab_test_result" data-field="x_SidDate" name="x_SidDate" id="x_SidDate" placeholder="<?= HtmlEncode($Page->SidDate->getPlaceHolder()) ?>" value="<?= $Page->SidDate->EditValue ?>"<?= $Page->SidDate->editAttributes() ?> aria-describedby="x_SidDate_help">
<?= $Page->SidDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SidDate->getErrorMessage() ?></div>
<?php if (!$Page->SidDate->ReadOnly && !$Page->SidDate->Disabled && !isset($Page->SidDate->EditAttrs["readonly"]) && !isset($Page->SidDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultadd", "datetimepicker"], function() {
    ew.createDateTimePicker("flab_test_resultadd", "x_SidDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TestCd->Visible) { // TestCd ?>
    <div id="r_TestCd" class="form-group row">
        <label id="elh_lab_test_result_TestCd" for="x_TestCd" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TestCd->caption() ?><?= $Page->TestCd->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TestCd->cellAttributes() ?>>
<span id="el_lab_test_result_TestCd">
<input type="<?= $Page->TestCd->getInputTextType() ?>" data-table="lab_test_result" data-field="x_TestCd" name="x_TestCd" id="x_TestCd" size="30" maxlength="6" placeholder="<?= HtmlEncode($Page->TestCd->getPlaceHolder()) ?>" value="<?= $Page->TestCd->EditValue ?>"<?= $Page->TestCd->editAttributes() ?> aria-describedby="x_TestCd_help">
<?= $Page->TestCd->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TestCd->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TestSubCd->Visible) { // TestSubCd ?>
    <div id="r_TestSubCd" class="form-group row">
        <label id="elh_lab_test_result_TestSubCd" for="x_TestSubCd" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TestSubCd->caption() ?><?= $Page->TestSubCd->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TestSubCd->cellAttributes() ?>>
<span id="el_lab_test_result_TestSubCd">
<input type="<?= $Page->TestSubCd->getInputTextType() ?>" data-table="lab_test_result" data-field="x_TestSubCd" name="x_TestSubCd" id="x_TestSubCd" size="30" maxlength="3" placeholder="<?= HtmlEncode($Page->TestSubCd->getPlaceHolder()) ?>" value="<?= $Page->TestSubCd->EditValue ?>"<?= $Page->TestSubCd->editAttributes() ?> aria-describedby="x_TestSubCd_help">
<?= $Page->TestSubCd->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TestSubCd->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DEptCd->Visible) { // DEptCd ?>
    <div id="r_DEptCd" class="form-group row">
        <label id="elh_lab_test_result_DEptCd" for="x_DEptCd" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DEptCd->caption() ?><?= $Page->DEptCd->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DEptCd->cellAttributes() ?>>
<span id="el_lab_test_result_DEptCd">
<input type="<?= $Page->DEptCd->getInputTextType() ?>" data-table="lab_test_result" data-field="x_DEptCd" name="x_DEptCd" id="x_DEptCd" size="30" maxlength="2" placeholder="<?= HtmlEncode($Page->DEptCd->getPlaceHolder()) ?>" value="<?= $Page->DEptCd->EditValue ?>"<?= $Page->DEptCd->editAttributes() ?> aria-describedby="x_DEptCd_help">
<?= $Page->DEptCd->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DEptCd->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ProfCd->Visible) { // ProfCd ?>
    <div id="r_ProfCd" class="form-group row">
        <label id="elh_lab_test_result_ProfCd" for="x_ProfCd" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ProfCd->caption() ?><?= $Page->ProfCd->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProfCd->cellAttributes() ?>>
<span id="el_lab_test_result_ProfCd">
<input type="<?= $Page->ProfCd->getInputTextType() ?>" data-table="lab_test_result" data-field="x_ProfCd" name="x_ProfCd" id="x_ProfCd" size="30" maxlength="6" placeholder="<?= HtmlEncode($Page->ProfCd->getPlaceHolder()) ?>" value="<?= $Page->ProfCd->EditValue ?>"<?= $Page->ProfCd->editAttributes() ?> aria-describedby="x_ProfCd_help">
<?= $Page->ProfCd->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ProfCd->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->LabReport->Visible) { // LabReport ?>
    <div id="r_LabReport" class="form-group row">
        <label id="elh_lab_test_result_LabReport" for="x_LabReport" class="<?= $Page->LeftColumnClass ?>"><?= $Page->LabReport->caption() ?><?= $Page->LabReport->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LabReport->cellAttributes() ?>>
<span id="el_lab_test_result_LabReport">
<textarea data-table="lab_test_result" data-field="x_LabReport" name="x_LabReport" id="x_LabReport" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->LabReport->getPlaceHolder()) ?>"<?= $Page->LabReport->editAttributes() ?> aria-describedby="x_LabReport_help"><?= $Page->LabReport->EditValue ?></textarea>
<?= $Page->LabReport->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->LabReport->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ResultDate->Visible) { // ResultDate ?>
    <div id="r_ResultDate" class="form-group row">
        <label id="elh_lab_test_result_ResultDate" for="x_ResultDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ResultDate->caption() ?><?= $Page->ResultDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ResultDate->cellAttributes() ?>>
<span id="el_lab_test_result_ResultDate">
<input type="<?= $Page->ResultDate->getInputTextType() ?>" data-table="lab_test_result" data-field="x_ResultDate" name="x_ResultDate" id="x_ResultDate" placeholder="<?= HtmlEncode($Page->ResultDate->getPlaceHolder()) ?>" value="<?= $Page->ResultDate->EditValue ?>"<?= $Page->ResultDate->editAttributes() ?> aria-describedby="x_ResultDate_help">
<?= $Page->ResultDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ResultDate->getErrorMessage() ?></div>
<?php if (!$Page->ResultDate->ReadOnly && !$Page->ResultDate->Disabled && !isset($Page->ResultDate->EditAttrs["readonly"]) && !isset($Page->ResultDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultadd", "datetimepicker"], function() {
    ew.createDateTimePicker("flab_test_resultadd", "x_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Comments->Visible) { // Comments ?>
    <div id="r_Comments" class="form-group row">
        <label id="elh_lab_test_result_Comments" for="x_Comments" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Comments->caption() ?><?= $Page->Comments->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Comments->cellAttributes() ?>>
<span id="el_lab_test_result_Comments">
<textarea data-table="lab_test_result" data-field="x_Comments" name="x_Comments" id="x_Comments" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Comments->getPlaceHolder()) ?>"<?= $Page->Comments->editAttributes() ?> aria-describedby="x_Comments_help"><?= $Page->Comments->EditValue ?></textarea>
<?= $Page->Comments->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Comments->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Method->Visible) { // Method ?>
    <div id="r_Method" class="form-group row">
        <label id="elh_lab_test_result_Method" for="x_Method" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Method->caption() ?><?= $Page->Method->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Method->cellAttributes() ?>>
<span id="el_lab_test_result_Method">
<input type="<?= $Page->Method->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Method" name="x_Method" id="x_Method" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Method->getPlaceHolder()) ?>" value="<?= $Page->Method->EditValue ?>"<?= $Page->Method->editAttributes() ?> aria-describedby="x_Method_help">
<?= $Page->Method->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Method->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Specimen->Visible) { // Specimen ?>
    <div id="r_Specimen" class="form-group row">
        <label id="elh_lab_test_result_Specimen" for="x_Specimen" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Specimen->caption() ?><?= $Page->Specimen->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Specimen->cellAttributes() ?>>
<span id="el_lab_test_result_Specimen">
<input type="<?= $Page->Specimen->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Specimen" name="x_Specimen" id="x_Specimen" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Specimen->getPlaceHolder()) ?>" value="<?= $Page->Specimen->EditValue ?>"<?= $Page->Specimen->editAttributes() ?> aria-describedby="x_Specimen_help">
<?= $Page->Specimen->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Specimen->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
    <div id="r_Amount" class="form-group row">
        <label id="elh_lab_test_result_Amount" for="x_Amount" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Amount->caption() ?><?= $Page->Amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Amount->cellAttributes() ?>>
<span id="el_lab_test_result_Amount">
<input type="<?= $Page->Amount->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Amount" name="x_Amount" id="x_Amount" size="30" placeholder="<?= HtmlEncode($Page->Amount->getPlaceHolder()) ?>" value="<?= $Page->Amount->EditValue ?>"<?= $Page->Amount->editAttributes() ?> aria-describedby="x_Amount_help">
<?= $Page->Amount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Amount->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ResultBy->Visible) { // ResultBy ?>
    <div id="r_ResultBy" class="form-group row">
        <label id="elh_lab_test_result_ResultBy" for="x_ResultBy" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ResultBy->caption() ?><?= $Page->ResultBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ResultBy->cellAttributes() ?>>
<span id="el_lab_test_result_ResultBy">
<input type="<?= $Page->ResultBy->getInputTextType() ?>" data-table="lab_test_result" data-field="x_ResultBy" name="x_ResultBy" id="x_ResultBy" size="30" maxlength="20" placeholder="<?= HtmlEncode($Page->ResultBy->getPlaceHolder()) ?>" value="<?= $Page->ResultBy->EditValue ?>"<?= $Page->ResultBy->editAttributes() ?> aria-describedby="x_ResultBy_help">
<?= $Page->ResultBy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ResultBy->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AuthBy->Visible) { // AuthBy ?>
    <div id="r_AuthBy" class="form-group row">
        <label id="elh_lab_test_result_AuthBy" for="x_AuthBy" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AuthBy->caption() ?><?= $Page->AuthBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AuthBy->cellAttributes() ?>>
<span id="el_lab_test_result_AuthBy">
<input type="<?= $Page->AuthBy->getInputTextType() ?>" data-table="lab_test_result" data-field="x_AuthBy" name="x_AuthBy" id="x_AuthBy" size="30" maxlength="20" placeholder="<?= HtmlEncode($Page->AuthBy->getPlaceHolder()) ?>" value="<?= $Page->AuthBy->EditValue ?>"<?= $Page->AuthBy->editAttributes() ?> aria-describedby="x_AuthBy_help">
<?= $Page->AuthBy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AuthBy->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AuthDate->Visible) { // AuthDate ?>
    <div id="r_AuthDate" class="form-group row">
        <label id="elh_lab_test_result_AuthDate" for="x_AuthDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AuthDate->caption() ?><?= $Page->AuthDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AuthDate->cellAttributes() ?>>
<span id="el_lab_test_result_AuthDate">
<input type="<?= $Page->AuthDate->getInputTextType() ?>" data-table="lab_test_result" data-field="x_AuthDate" name="x_AuthDate" id="x_AuthDate" placeholder="<?= HtmlEncode($Page->AuthDate->getPlaceHolder()) ?>" value="<?= $Page->AuthDate->EditValue ?>"<?= $Page->AuthDate->editAttributes() ?> aria-describedby="x_AuthDate_help">
<?= $Page->AuthDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AuthDate->getErrorMessage() ?></div>
<?php if (!$Page->AuthDate->ReadOnly && !$Page->AuthDate->Disabled && !isset($Page->AuthDate->EditAttrs["readonly"]) && !isset($Page->AuthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultadd", "datetimepicker"], function() {
    ew.createDateTimePicker("flab_test_resultadd", "x_AuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Abnormal->Visible) { // Abnormal ?>
    <div id="r_Abnormal" class="form-group row">
        <label id="elh_lab_test_result_Abnormal" for="x_Abnormal" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Abnormal->caption() ?><?= $Page->Abnormal->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Abnormal->cellAttributes() ?>>
<span id="el_lab_test_result_Abnormal">
<input type="<?= $Page->Abnormal->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Abnormal" name="x_Abnormal" id="x_Abnormal" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->Abnormal->getPlaceHolder()) ?>" value="<?= $Page->Abnormal->EditValue ?>"<?= $Page->Abnormal->editAttributes() ?> aria-describedby="x_Abnormal_help">
<?= $Page->Abnormal->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Abnormal->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Printed->Visible) { // Printed ?>
    <div id="r_Printed" class="form-group row">
        <label id="elh_lab_test_result_Printed" for="x_Printed" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Printed->caption() ?><?= $Page->Printed->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Printed->cellAttributes() ?>>
<span id="el_lab_test_result_Printed">
<input type="<?= $Page->Printed->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Printed" name="x_Printed" id="x_Printed" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->Printed->getPlaceHolder()) ?>" value="<?= $Page->Printed->EditValue ?>"<?= $Page->Printed->editAttributes() ?> aria-describedby="x_Printed_help">
<?= $Page->Printed->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Printed->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Dispatch->Visible) { // Dispatch ?>
    <div id="r_Dispatch" class="form-group row">
        <label id="elh_lab_test_result_Dispatch" for="x_Dispatch" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Dispatch->caption() ?><?= $Page->Dispatch->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Dispatch->cellAttributes() ?>>
<span id="el_lab_test_result_Dispatch">
<input type="<?= $Page->Dispatch->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Dispatch" name="x_Dispatch" id="x_Dispatch" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->Dispatch->getPlaceHolder()) ?>" value="<?= $Page->Dispatch->EditValue ?>"<?= $Page->Dispatch->editAttributes() ?> aria-describedby="x_Dispatch_help">
<?= $Page->Dispatch->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Dispatch->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->LOWHIGH->Visible) { // LOWHIGH ?>
    <div id="r_LOWHIGH" class="form-group row">
        <label id="elh_lab_test_result_LOWHIGH" for="x_LOWHIGH" class="<?= $Page->LeftColumnClass ?>"><?= $Page->LOWHIGH->caption() ?><?= $Page->LOWHIGH->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LOWHIGH->cellAttributes() ?>>
<span id="el_lab_test_result_LOWHIGH">
<input type="<?= $Page->LOWHIGH->getInputTextType() ?>" data-table="lab_test_result" data-field="x_LOWHIGH" name="x_LOWHIGH" id="x_LOWHIGH" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->LOWHIGH->getPlaceHolder()) ?>" value="<?= $Page->LOWHIGH->EditValue ?>"<?= $Page->LOWHIGH->editAttributes() ?> aria-describedby="x_LOWHIGH_help">
<?= $Page->LOWHIGH->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->LOWHIGH->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RefValue->Visible) { // RefValue ?>
    <div id="r_RefValue" class="form-group row">
        <label id="elh_lab_test_result_RefValue" for="x_RefValue" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RefValue->caption() ?><?= $Page->RefValue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RefValue->cellAttributes() ?>>
<span id="el_lab_test_result_RefValue">
<textarea data-table="lab_test_result" data-field="x_RefValue" name="x_RefValue" id="x_RefValue" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->RefValue->getPlaceHolder()) ?>"<?= $Page->RefValue->editAttributes() ?> aria-describedby="x_RefValue_help"><?= $Page->RefValue->EditValue ?></textarea>
<?= $Page->RefValue->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RefValue->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Unit->Visible) { // Unit ?>
    <div id="r_Unit" class="form-group row">
        <label id="elh_lab_test_result_Unit" for="x_Unit" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Unit->caption() ?><?= $Page->Unit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Unit->cellAttributes() ?>>
<span id="el_lab_test_result_Unit">
<input type="<?= $Page->Unit->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Unit" name="x_Unit" id="x_Unit" size="30" maxlength="20" placeholder="<?= HtmlEncode($Page->Unit->getPlaceHolder()) ?>" value="<?= $Page->Unit->EditValue ?>"<?= $Page->Unit->editAttributes() ?> aria-describedby="x_Unit_help">
<?= $Page->Unit->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Unit->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ResDate->Visible) { // ResDate ?>
    <div id="r_ResDate" class="form-group row">
        <label id="elh_lab_test_result_ResDate" for="x_ResDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ResDate->caption() ?><?= $Page->ResDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ResDate->cellAttributes() ?>>
<span id="el_lab_test_result_ResDate">
<input type="<?= $Page->ResDate->getInputTextType() ?>" data-table="lab_test_result" data-field="x_ResDate" name="x_ResDate" id="x_ResDate" placeholder="<?= HtmlEncode($Page->ResDate->getPlaceHolder()) ?>" value="<?= $Page->ResDate->EditValue ?>"<?= $Page->ResDate->editAttributes() ?> aria-describedby="x_ResDate_help">
<?= $Page->ResDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ResDate->getErrorMessage() ?></div>
<?php if (!$Page->ResDate->ReadOnly && !$Page->ResDate->Disabled && !isset($Page->ResDate->EditAttrs["readonly"]) && !isset($Page->ResDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultadd", "datetimepicker"], function() {
    ew.createDateTimePicker("flab_test_resultadd", "x_ResDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Pic1->Visible) { // Pic1 ?>
    <div id="r_Pic1" class="form-group row">
        <label id="elh_lab_test_result_Pic1" for="x_Pic1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Pic1->caption() ?><?= $Page->Pic1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Pic1->cellAttributes() ?>>
<span id="el_lab_test_result_Pic1">
<input type="<?= $Page->Pic1->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Pic1" name="x_Pic1" id="x_Pic1" size="30" maxlength="200" placeholder="<?= HtmlEncode($Page->Pic1->getPlaceHolder()) ?>" value="<?= $Page->Pic1->EditValue ?>"<?= $Page->Pic1->editAttributes() ?> aria-describedby="x_Pic1_help">
<?= $Page->Pic1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Pic1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Pic2->Visible) { // Pic2 ?>
    <div id="r_Pic2" class="form-group row">
        <label id="elh_lab_test_result_Pic2" for="x_Pic2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Pic2->caption() ?><?= $Page->Pic2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Pic2->cellAttributes() ?>>
<span id="el_lab_test_result_Pic2">
<input type="<?= $Page->Pic2->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Pic2" name="x_Pic2" id="x_Pic2" size="30" maxlength="200" placeholder="<?= HtmlEncode($Page->Pic2->getPlaceHolder()) ?>" value="<?= $Page->Pic2->EditValue ?>"<?= $Page->Pic2->editAttributes() ?> aria-describedby="x_Pic2_help">
<?= $Page->Pic2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Pic2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GraphPath->Visible) { // GraphPath ?>
    <div id="r_GraphPath" class="form-group row">
        <label id="elh_lab_test_result_GraphPath" for="x_GraphPath" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GraphPath->caption() ?><?= $Page->GraphPath->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GraphPath->cellAttributes() ?>>
<span id="el_lab_test_result_GraphPath">
<input type="<?= $Page->GraphPath->getInputTextType() ?>" data-table="lab_test_result" data-field="x_GraphPath" name="x_GraphPath" id="x_GraphPath" size="30" maxlength="200" placeholder="<?= HtmlEncode($Page->GraphPath->getPlaceHolder()) ?>" value="<?= $Page->GraphPath->EditValue ?>"<?= $Page->GraphPath->editAttributes() ?> aria-describedby="x_GraphPath_help">
<?= $Page->GraphPath->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GraphPath->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SampleDate->Visible) { // SampleDate ?>
    <div id="r_SampleDate" class="form-group row">
        <label id="elh_lab_test_result_SampleDate" for="x_SampleDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SampleDate->caption() ?><?= $Page->SampleDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SampleDate->cellAttributes() ?>>
<span id="el_lab_test_result_SampleDate">
<input type="<?= $Page->SampleDate->getInputTextType() ?>" data-table="lab_test_result" data-field="x_SampleDate" name="x_SampleDate" id="x_SampleDate" placeholder="<?= HtmlEncode($Page->SampleDate->getPlaceHolder()) ?>" value="<?= $Page->SampleDate->EditValue ?>"<?= $Page->SampleDate->editAttributes() ?> aria-describedby="x_SampleDate_help">
<?= $Page->SampleDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SampleDate->getErrorMessage() ?></div>
<?php if (!$Page->SampleDate->ReadOnly && !$Page->SampleDate->Disabled && !isset($Page->SampleDate->EditAttrs["readonly"]) && !isset($Page->SampleDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultadd", "datetimepicker"], function() {
    ew.createDateTimePicker("flab_test_resultadd", "x_SampleDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SampleUser->Visible) { // SampleUser ?>
    <div id="r_SampleUser" class="form-group row">
        <label id="elh_lab_test_result_SampleUser" for="x_SampleUser" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SampleUser->caption() ?><?= $Page->SampleUser->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SampleUser->cellAttributes() ?>>
<span id="el_lab_test_result_SampleUser">
<input type="<?= $Page->SampleUser->getInputTextType() ?>" data-table="lab_test_result" data-field="x_SampleUser" name="x_SampleUser" id="x_SampleUser" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->SampleUser->getPlaceHolder()) ?>" value="<?= $Page->SampleUser->EditValue ?>"<?= $Page->SampleUser->editAttributes() ?> aria-describedby="x_SampleUser_help">
<?= $Page->SampleUser->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SampleUser->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReceivedDate->Visible) { // ReceivedDate ?>
    <div id="r_ReceivedDate" class="form-group row">
        <label id="elh_lab_test_result_ReceivedDate" for="x_ReceivedDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ReceivedDate->caption() ?><?= $Page->ReceivedDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReceivedDate->cellAttributes() ?>>
<span id="el_lab_test_result_ReceivedDate">
<input type="<?= $Page->ReceivedDate->getInputTextType() ?>" data-table="lab_test_result" data-field="x_ReceivedDate" name="x_ReceivedDate" id="x_ReceivedDate" placeholder="<?= HtmlEncode($Page->ReceivedDate->getPlaceHolder()) ?>" value="<?= $Page->ReceivedDate->EditValue ?>"<?= $Page->ReceivedDate->editAttributes() ?> aria-describedby="x_ReceivedDate_help">
<?= $Page->ReceivedDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ReceivedDate->getErrorMessage() ?></div>
<?php if (!$Page->ReceivedDate->ReadOnly && !$Page->ReceivedDate->Disabled && !isset($Page->ReceivedDate->EditAttrs["readonly"]) && !isset($Page->ReceivedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultadd", "datetimepicker"], function() {
    ew.createDateTimePicker("flab_test_resultadd", "x_ReceivedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReceivedUser->Visible) { // ReceivedUser ?>
    <div id="r_ReceivedUser" class="form-group row">
        <label id="elh_lab_test_result_ReceivedUser" for="x_ReceivedUser" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ReceivedUser->caption() ?><?= $Page->ReceivedUser->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReceivedUser->cellAttributes() ?>>
<span id="el_lab_test_result_ReceivedUser">
<input type="<?= $Page->ReceivedUser->getInputTextType() ?>" data-table="lab_test_result" data-field="x_ReceivedUser" name="x_ReceivedUser" id="x_ReceivedUser" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->ReceivedUser->getPlaceHolder()) ?>" value="<?= $Page->ReceivedUser->EditValue ?>"<?= $Page->ReceivedUser->editAttributes() ?> aria-describedby="x_ReceivedUser_help">
<?= $Page->ReceivedUser->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ReceivedUser->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DeptRecvDate->Visible) { // DeptRecvDate ?>
    <div id="r_DeptRecvDate" class="form-group row">
        <label id="elh_lab_test_result_DeptRecvDate" for="x_DeptRecvDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DeptRecvDate->caption() ?><?= $Page->DeptRecvDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DeptRecvDate->cellAttributes() ?>>
<span id="el_lab_test_result_DeptRecvDate">
<input type="<?= $Page->DeptRecvDate->getInputTextType() ?>" data-table="lab_test_result" data-field="x_DeptRecvDate" name="x_DeptRecvDate" id="x_DeptRecvDate" placeholder="<?= HtmlEncode($Page->DeptRecvDate->getPlaceHolder()) ?>" value="<?= $Page->DeptRecvDate->EditValue ?>"<?= $Page->DeptRecvDate->editAttributes() ?> aria-describedby="x_DeptRecvDate_help">
<?= $Page->DeptRecvDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DeptRecvDate->getErrorMessage() ?></div>
<?php if (!$Page->DeptRecvDate->ReadOnly && !$Page->DeptRecvDate->Disabled && !isset($Page->DeptRecvDate->EditAttrs["readonly"]) && !isset($Page->DeptRecvDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultadd", "datetimepicker"], function() {
    ew.createDateTimePicker("flab_test_resultadd", "x_DeptRecvDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DeptRecvUser->Visible) { // DeptRecvUser ?>
    <div id="r_DeptRecvUser" class="form-group row">
        <label id="elh_lab_test_result_DeptRecvUser" for="x_DeptRecvUser" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DeptRecvUser->caption() ?><?= $Page->DeptRecvUser->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DeptRecvUser->cellAttributes() ?>>
<span id="el_lab_test_result_DeptRecvUser">
<input type="<?= $Page->DeptRecvUser->getInputTextType() ?>" data-table="lab_test_result" data-field="x_DeptRecvUser" name="x_DeptRecvUser" id="x_DeptRecvUser" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->DeptRecvUser->getPlaceHolder()) ?>" value="<?= $Page->DeptRecvUser->EditValue ?>"<?= $Page->DeptRecvUser->editAttributes() ?> aria-describedby="x_DeptRecvUser_help">
<?= $Page->DeptRecvUser->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DeptRecvUser->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PrintBy->Visible) { // PrintBy ?>
    <div id="r_PrintBy" class="form-group row">
        <label id="elh_lab_test_result_PrintBy" for="x_PrintBy" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PrintBy->caption() ?><?= $Page->PrintBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PrintBy->cellAttributes() ?>>
<span id="el_lab_test_result_PrintBy">
<input type="<?= $Page->PrintBy->getInputTextType() ?>" data-table="lab_test_result" data-field="x_PrintBy" name="x_PrintBy" id="x_PrintBy" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->PrintBy->getPlaceHolder()) ?>" value="<?= $Page->PrintBy->EditValue ?>"<?= $Page->PrintBy->editAttributes() ?> aria-describedby="x_PrintBy_help">
<?= $Page->PrintBy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PrintBy->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PrintDate->Visible) { // PrintDate ?>
    <div id="r_PrintDate" class="form-group row">
        <label id="elh_lab_test_result_PrintDate" for="x_PrintDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PrintDate->caption() ?><?= $Page->PrintDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PrintDate->cellAttributes() ?>>
<span id="el_lab_test_result_PrintDate">
<input type="<?= $Page->PrintDate->getInputTextType() ?>" data-table="lab_test_result" data-field="x_PrintDate" name="x_PrintDate" id="x_PrintDate" placeholder="<?= HtmlEncode($Page->PrintDate->getPlaceHolder()) ?>" value="<?= $Page->PrintDate->EditValue ?>"<?= $Page->PrintDate->editAttributes() ?> aria-describedby="x_PrintDate_help">
<?= $Page->PrintDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PrintDate->getErrorMessage() ?></div>
<?php if (!$Page->PrintDate->ReadOnly && !$Page->PrintDate->Disabled && !isset($Page->PrintDate->EditAttrs["readonly"]) && !isset($Page->PrintDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultadd", "datetimepicker"], function() {
    ew.createDateTimePicker("flab_test_resultadd", "x_PrintDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MachineCD->Visible) { // MachineCD ?>
    <div id="r_MachineCD" class="form-group row">
        <label id="elh_lab_test_result_MachineCD" for="x_MachineCD" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MachineCD->caption() ?><?= $Page->MachineCD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MachineCD->cellAttributes() ?>>
<span id="el_lab_test_result_MachineCD">
<input type="<?= $Page->MachineCD->getInputTextType() ?>" data-table="lab_test_result" data-field="x_MachineCD" name="x_MachineCD" id="x_MachineCD" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->MachineCD->getPlaceHolder()) ?>" value="<?= $Page->MachineCD->EditValue ?>"<?= $Page->MachineCD->editAttributes() ?> aria-describedby="x_MachineCD_help">
<?= $Page->MachineCD->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MachineCD->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TestCancel->Visible) { // TestCancel ?>
    <div id="r_TestCancel" class="form-group row">
        <label id="elh_lab_test_result_TestCancel" for="x_TestCancel" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TestCancel->caption() ?><?= $Page->TestCancel->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TestCancel->cellAttributes() ?>>
<span id="el_lab_test_result_TestCancel">
<input type="<?= $Page->TestCancel->getInputTextType() ?>" data-table="lab_test_result" data-field="x_TestCancel" name="x_TestCancel" id="x_TestCancel" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->TestCancel->getPlaceHolder()) ?>" value="<?= $Page->TestCancel->EditValue ?>"<?= $Page->TestCancel->editAttributes() ?> aria-describedby="x_TestCancel_help">
<?= $Page->TestCancel->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TestCancel->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OutSource->Visible) { // OutSource ?>
    <div id="r_OutSource" class="form-group row">
        <label id="elh_lab_test_result_OutSource" for="x_OutSource" class="<?= $Page->LeftColumnClass ?>"><?= $Page->OutSource->caption() ?><?= $Page->OutSource->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OutSource->cellAttributes() ?>>
<span id="el_lab_test_result_OutSource">
<input type="<?= $Page->OutSource->getInputTextType() ?>" data-table="lab_test_result" data-field="x_OutSource" name="x_OutSource" id="x_OutSource" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->OutSource->getPlaceHolder()) ?>" value="<?= $Page->OutSource->EditValue ?>"<?= $Page->OutSource->editAttributes() ?> aria-describedby="x_OutSource_help">
<?= $Page->OutSource->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OutSource->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tariff->Visible) { // Tariff ?>
    <div id="r_Tariff" class="form-group row">
        <label id="elh_lab_test_result_Tariff" for="x_Tariff" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Tariff->caption() ?><?= $Page->Tariff->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tariff->cellAttributes() ?>>
<span id="el_lab_test_result_Tariff">
<input type="<?= $Page->Tariff->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Tariff" name="x_Tariff" id="x_Tariff" size="30" placeholder="<?= HtmlEncode($Page->Tariff->getPlaceHolder()) ?>" value="<?= $Page->Tariff->EditValue ?>"<?= $Page->Tariff->editAttributes() ?> aria-describedby="x_Tariff_help">
<?= $Page->Tariff->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Tariff->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EDITDATE->Visible) { // EDITDATE ?>
    <div id="r_EDITDATE" class="form-group row">
        <label id="elh_lab_test_result_EDITDATE" for="x_EDITDATE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EDITDATE->caption() ?><?= $Page->EDITDATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EDITDATE->cellAttributes() ?>>
<span id="el_lab_test_result_EDITDATE">
<input type="<?= $Page->EDITDATE->getInputTextType() ?>" data-table="lab_test_result" data-field="x_EDITDATE" name="x_EDITDATE" id="x_EDITDATE" placeholder="<?= HtmlEncode($Page->EDITDATE->getPlaceHolder()) ?>" value="<?= $Page->EDITDATE->EditValue ?>"<?= $Page->EDITDATE->editAttributes() ?> aria-describedby="x_EDITDATE_help">
<?= $Page->EDITDATE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EDITDATE->getErrorMessage() ?></div>
<?php if (!$Page->EDITDATE->ReadOnly && !$Page->EDITDATE->Disabled && !isset($Page->EDITDATE->EditAttrs["readonly"]) && !isset($Page->EDITDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultadd", "datetimepicker"], function() {
    ew.createDateTimePicker("flab_test_resultadd", "x_EDITDATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->UPLOAD->Visible) { // UPLOAD ?>
    <div id="r_UPLOAD" class="form-group row">
        <label id="elh_lab_test_result_UPLOAD" for="x_UPLOAD" class="<?= $Page->LeftColumnClass ?>"><?= $Page->UPLOAD->caption() ?><?= $Page->UPLOAD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->UPLOAD->cellAttributes() ?>>
<span id="el_lab_test_result_UPLOAD">
<input type="<?= $Page->UPLOAD->getInputTextType() ?>" data-table="lab_test_result" data-field="x_UPLOAD" name="x_UPLOAD" id="x_UPLOAD" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->UPLOAD->getPlaceHolder()) ?>" value="<?= $Page->UPLOAD->EditValue ?>"<?= $Page->UPLOAD->editAttributes() ?> aria-describedby="x_UPLOAD_help">
<?= $Page->UPLOAD->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->UPLOAD->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SAuthDate->Visible) { // SAuthDate ?>
    <div id="r_SAuthDate" class="form-group row">
        <label id="elh_lab_test_result_SAuthDate" for="x_SAuthDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SAuthDate->caption() ?><?= $Page->SAuthDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SAuthDate->cellAttributes() ?>>
<span id="el_lab_test_result_SAuthDate">
<input type="<?= $Page->SAuthDate->getInputTextType() ?>" data-table="lab_test_result" data-field="x_SAuthDate" name="x_SAuthDate" id="x_SAuthDate" placeholder="<?= HtmlEncode($Page->SAuthDate->getPlaceHolder()) ?>" value="<?= $Page->SAuthDate->EditValue ?>"<?= $Page->SAuthDate->editAttributes() ?> aria-describedby="x_SAuthDate_help">
<?= $Page->SAuthDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SAuthDate->getErrorMessage() ?></div>
<?php if (!$Page->SAuthDate->ReadOnly && !$Page->SAuthDate->Disabled && !isset($Page->SAuthDate->EditAttrs["readonly"]) && !isset($Page->SAuthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultadd", "datetimepicker"], function() {
    ew.createDateTimePicker("flab_test_resultadd", "x_SAuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SAuthBy->Visible) { // SAuthBy ?>
    <div id="r_SAuthBy" class="form-group row">
        <label id="elh_lab_test_result_SAuthBy" for="x_SAuthBy" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SAuthBy->caption() ?><?= $Page->SAuthBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SAuthBy->cellAttributes() ?>>
<span id="el_lab_test_result_SAuthBy">
<input type="<?= $Page->SAuthBy->getInputTextType() ?>" data-table="lab_test_result" data-field="x_SAuthBy" name="x_SAuthBy" id="x_SAuthBy" size="30" maxlength="3" placeholder="<?= HtmlEncode($Page->SAuthBy->getPlaceHolder()) ?>" value="<?= $Page->SAuthBy->EditValue ?>"<?= $Page->SAuthBy->editAttributes() ?> aria-describedby="x_SAuthBy_help">
<?= $Page->SAuthBy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SAuthBy->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NoRC->Visible) { // NoRC ?>
    <div id="r_NoRC" class="form-group row">
        <label id="elh_lab_test_result_NoRC" for="x_NoRC" class="<?= $Page->LeftColumnClass ?>"><?= $Page->NoRC->caption() ?><?= $Page->NoRC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NoRC->cellAttributes() ?>>
<span id="el_lab_test_result_NoRC">
<input type="<?= $Page->NoRC->getInputTextType() ?>" data-table="lab_test_result" data-field="x_NoRC" name="x_NoRC" id="x_NoRC" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->NoRC->getPlaceHolder()) ?>" value="<?= $Page->NoRC->EditValue ?>"<?= $Page->NoRC->editAttributes() ?> aria-describedby="x_NoRC_help">
<?= $Page->NoRC->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NoRC->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DispDt->Visible) { // DispDt ?>
    <div id="r_DispDt" class="form-group row">
        <label id="elh_lab_test_result_DispDt" for="x_DispDt" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DispDt->caption() ?><?= $Page->DispDt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DispDt->cellAttributes() ?>>
<span id="el_lab_test_result_DispDt">
<input type="<?= $Page->DispDt->getInputTextType() ?>" data-table="lab_test_result" data-field="x_DispDt" name="x_DispDt" id="x_DispDt" placeholder="<?= HtmlEncode($Page->DispDt->getPlaceHolder()) ?>" value="<?= $Page->DispDt->EditValue ?>"<?= $Page->DispDt->editAttributes() ?> aria-describedby="x_DispDt_help">
<?= $Page->DispDt->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DispDt->getErrorMessage() ?></div>
<?php if (!$Page->DispDt->ReadOnly && !$Page->DispDt->Disabled && !isset($Page->DispDt->EditAttrs["readonly"]) && !isset($Page->DispDt->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultadd", "datetimepicker"], function() {
    ew.createDateTimePicker("flab_test_resultadd", "x_DispDt", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DispUser->Visible) { // DispUser ?>
    <div id="r_DispUser" class="form-group row">
        <label id="elh_lab_test_result_DispUser" for="x_DispUser" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DispUser->caption() ?><?= $Page->DispUser->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DispUser->cellAttributes() ?>>
<span id="el_lab_test_result_DispUser">
<input type="<?= $Page->DispUser->getInputTextType() ?>" data-table="lab_test_result" data-field="x_DispUser" name="x_DispUser" id="x_DispUser" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->DispUser->getPlaceHolder()) ?>" value="<?= $Page->DispUser->EditValue ?>"<?= $Page->DispUser->editAttributes() ?> aria-describedby="x_DispUser_help">
<?= $Page->DispUser->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DispUser->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DispRemarks->Visible) { // DispRemarks ?>
    <div id="r_DispRemarks" class="form-group row">
        <label id="elh_lab_test_result_DispRemarks" for="x_DispRemarks" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DispRemarks->caption() ?><?= $Page->DispRemarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DispRemarks->cellAttributes() ?>>
<span id="el_lab_test_result_DispRemarks">
<input type="<?= $Page->DispRemarks->getInputTextType() ?>" data-table="lab_test_result" data-field="x_DispRemarks" name="x_DispRemarks" id="x_DispRemarks" size="30" maxlength="250" placeholder="<?= HtmlEncode($Page->DispRemarks->getPlaceHolder()) ?>" value="<?= $Page->DispRemarks->EditValue ?>"<?= $Page->DispRemarks->editAttributes() ?> aria-describedby="x_DispRemarks_help">
<?= $Page->DispRemarks->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DispRemarks->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DispMode->Visible) { // DispMode ?>
    <div id="r_DispMode" class="form-group row">
        <label id="elh_lab_test_result_DispMode" for="x_DispMode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DispMode->caption() ?><?= $Page->DispMode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DispMode->cellAttributes() ?>>
<span id="el_lab_test_result_DispMode">
<input type="<?= $Page->DispMode->getInputTextType() ?>" data-table="lab_test_result" data-field="x_DispMode" name="x_DispMode" id="x_DispMode" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->DispMode->getPlaceHolder()) ?>" value="<?= $Page->DispMode->EditValue ?>"<?= $Page->DispMode->editAttributes() ?> aria-describedby="x_DispMode_help">
<?= $Page->DispMode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DispMode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ProductCD->Visible) { // ProductCD ?>
    <div id="r_ProductCD" class="form-group row">
        <label id="elh_lab_test_result_ProductCD" for="x_ProductCD" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ProductCD->caption() ?><?= $Page->ProductCD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProductCD->cellAttributes() ?>>
<span id="el_lab_test_result_ProductCD">
<input type="<?= $Page->ProductCD->getInputTextType() ?>" data-table="lab_test_result" data-field="x_ProductCD" name="x_ProductCD" id="x_ProductCD" size="30" maxlength="6" placeholder="<?= HtmlEncode($Page->ProductCD->getPlaceHolder()) ?>" value="<?= $Page->ProductCD->EditValue ?>"<?= $Page->ProductCD->editAttributes() ?> aria-describedby="x_ProductCD_help">
<?= $Page->ProductCD->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ProductCD->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Nos->Visible) { // Nos ?>
    <div id="r_Nos" class="form-group row">
        <label id="elh_lab_test_result_Nos" for="x_Nos" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Nos->caption() ?><?= $Page->Nos->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Nos->cellAttributes() ?>>
<span id="el_lab_test_result_Nos">
<input type="<?= $Page->Nos->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Nos" name="x_Nos" id="x_Nos" size="30" placeholder="<?= HtmlEncode($Page->Nos->getPlaceHolder()) ?>" value="<?= $Page->Nos->EditValue ?>"<?= $Page->Nos->editAttributes() ?> aria-describedby="x_Nos_help">
<?= $Page->Nos->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Nos->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->WBCPath->Visible) { // WBCPath ?>
    <div id="r_WBCPath" class="form-group row">
        <label id="elh_lab_test_result_WBCPath" for="x_WBCPath" class="<?= $Page->LeftColumnClass ?>"><?= $Page->WBCPath->caption() ?><?= $Page->WBCPath->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->WBCPath->cellAttributes() ?>>
<span id="el_lab_test_result_WBCPath">
<input type="<?= $Page->WBCPath->getInputTextType() ?>" data-table="lab_test_result" data-field="x_WBCPath" name="x_WBCPath" id="x_WBCPath" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->WBCPath->getPlaceHolder()) ?>" value="<?= $Page->WBCPath->EditValue ?>"<?= $Page->WBCPath->editAttributes() ?> aria-describedby="x_WBCPath_help">
<?= $Page->WBCPath->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->WBCPath->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RBCPath->Visible) { // RBCPath ?>
    <div id="r_RBCPath" class="form-group row">
        <label id="elh_lab_test_result_RBCPath" for="x_RBCPath" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RBCPath->caption() ?><?= $Page->RBCPath->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RBCPath->cellAttributes() ?>>
<span id="el_lab_test_result_RBCPath">
<input type="<?= $Page->RBCPath->getInputTextType() ?>" data-table="lab_test_result" data-field="x_RBCPath" name="x_RBCPath" id="x_RBCPath" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->RBCPath->getPlaceHolder()) ?>" value="<?= $Page->RBCPath->EditValue ?>"<?= $Page->RBCPath->editAttributes() ?> aria-describedby="x_RBCPath_help">
<?= $Page->RBCPath->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RBCPath->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PTPath->Visible) { // PTPath ?>
    <div id="r_PTPath" class="form-group row">
        <label id="elh_lab_test_result_PTPath" for="x_PTPath" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PTPath->caption() ?><?= $Page->PTPath->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PTPath->cellAttributes() ?>>
<span id="el_lab_test_result_PTPath">
<input type="<?= $Page->PTPath->getInputTextType() ?>" data-table="lab_test_result" data-field="x_PTPath" name="x_PTPath" id="x_PTPath" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->PTPath->getPlaceHolder()) ?>" value="<?= $Page->PTPath->EditValue ?>"<?= $Page->PTPath->editAttributes() ?> aria-describedby="x_PTPath_help">
<?= $Page->PTPath->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PTPath->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ActualAmt->Visible) { // ActualAmt ?>
    <div id="r_ActualAmt" class="form-group row">
        <label id="elh_lab_test_result_ActualAmt" for="x_ActualAmt" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ActualAmt->caption() ?><?= $Page->ActualAmt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ActualAmt->cellAttributes() ?>>
<span id="el_lab_test_result_ActualAmt">
<input type="<?= $Page->ActualAmt->getInputTextType() ?>" data-table="lab_test_result" data-field="x_ActualAmt" name="x_ActualAmt" id="x_ActualAmt" size="30" placeholder="<?= HtmlEncode($Page->ActualAmt->getPlaceHolder()) ?>" value="<?= $Page->ActualAmt->EditValue ?>"<?= $Page->ActualAmt->editAttributes() ?> aria-describedby="x_ActualAmt_help">
<?= $Page->ActualAmt->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ActualAmt->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NoSign->Visible) { // NoSign ?>
    <div id="r_NoSign" class="form-group row">
        <label id="elh_lab_test_result_NoSign" for="x_NoSign" class="<?= $Page->LeftColumnClass ?>"><?= $Page->NoSign->caption() ?><?= $Page->NoSign->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NoSign->cellAttributes() ?>>
<span id="el_lab_test_result_NoSign">
<input type="<?= $Page->NoSign->getInputTextType() ?>" data-table="lab_test_result" data-field="x_NoSign" name="x_NoSign" id="x_NoSign" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->NoSign->getPlaceHolder()) ?>" value="<?= $Page->NoSign->EditValue ?>"<?= $Page->NoSign->editAttributes() ?> aria-describedby="x_NoSign_help">
<?= $Page->NoSign->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NoSign->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->_Barcode->Visible) { // Barcode ?>
    <div id="r__Barcode" class="form-group row">
        <label id="elh_lab_test_result__Barcode" for="x__Barcode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->_Barcode->caption() ?><?= $Page->_Barcode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->_Barcode->cellAttributes() ?>>
<span id="el_lab_test_result__Barcode">
<input type="<?= $Page->_Barcode->getInputTextType() ?>" data-table="lab_test_result" data-field="x__Barcode" name="x__Barcode" id="x__Barcode" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->_Barcode->getPlaceHolder()) ?>" value="<?= $Page->_Barcode->EditValue ?>"<?= $Page->_Barcode->editAttributes() ?> aria-describedby="x__Barcode_help">
<?= $Page->_Barcode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->_Barcode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReadTime->Visible) { // ReadTime ?>
    <div id="r_ReadTime" class="form-group row">
        <label id="elh_lab_test_result_ReadTime" for="x_ReadTime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ReadTime->caption() ?><?= $Page->ReadTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReadTime->cellAttributes() ?>>
<span id="el_lab_test_result_ReadTime">
<input type="<?= $Page->ReadTime->getInputTextType() ?>" data-table="lab_test_result" data-field="x_ReadTime" name="x_ReadTime" id="x_ReadTime" placeholder="<?= HtmlEncode($Page->ReadTime->getPlaceHolder()) ?>" value="<?= $Page->ReadTime->EditValue ?>"<?= $Page->ReadTime->editAttributes() ?> aria-describedby="x_ReadTime_help">
<?= $Page->ReadTime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ReadTime->getErrorMessage() ?></div>
<?php if (!$Page->ReadTime->ReadOnly && !$Page->ReadTime->Disabled && !isset($Page->ReadTime->EditAttrs["readonly"]) && !isset($Page->ReadTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultadd", "datetimepicker"], function() {
    ew.createDateTimePicker("flab_test_resultadd", "x_ReadTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Result->Visible) { // Result ?>
    <div id="r_Result" class="form-group row">
        <label id="elh_lab_test_result_Result" for="x_Result" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Result->caption() ?><?= $Page->Result->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Result->cellAttributes() ?>>
<span id="el_lab_test_result_Result">
<textarea data-table="lab_test_result" data-field="x_Result" name="x_Result" id="x_Result" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Result->getPlaceHolder()) ?>"<?= $Page->Result->editAttributes() ?> aria-describedby="x_Result_help"><?= $Page->Result->EditValue ?></textarea>
<?= $Page->Result->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Result->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->VailID->Visible) { // VailID ?>
    <div id="r_VailID" class="form-group row">
        <label id="elh_lab_test_result_VailID" for="x_VailID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->VailID->caption() ?><?= $Page->VailID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->VailID->cellAttributes() ?>>
<span id="el_lab_test_result_VailID">
<input type="<?= $Page->VailID->getInputTextType() ?>" data-table="lab_test_result" data-field="x_VailID" name="x_VailID" id="x_VailID" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->VailID->getPlaceHolder()) ?>" value="<?= $Page->VailID->EditValue ?>"<?= $Page->VailID->editAttributes() ?> aria-describedby="x_VailID_help">
<?= $Page->VailID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->VailID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReadMachine->Visible) { // ReadMachine ?>
    <div id="r_ReadMachine" class="form-group row">
        <label id="elh_lab_test_result_ReadMachine" for="x_ReadMachine" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ReadMachine->caption() ?><?= $Page->ReadMachine->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReadMachine->cellAttributes() ?>>
<span id="el_lab_test_result_ReadMachine">
<input type="<?= $Page->ReadMachine->getInputTextType() ?>" data-table="lab_test_result" data-field="x_ReadMachine" name="x_ReadMachine" id="x_ReadMachine" size="30" maxlength="20" placeholder="<?= HtmlEncode($Page->ReadMachine->getPlaceHolder()) ?>" value="<?= $Page->ReadMachine->EditValue ?>"<?= $Page->ReadMachine->editAttributes() ?> aria-describedby="x_ReadMachine_help">
<?= $Page->ReadMachine->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ReadMachine->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->LabCD->Visible) { // LabCD ?>
    <div id="r_LabCD" class="form-group row">
        <label id="elh_lab_test_result_LabCD" for="x_LabCD" class="<?= $Page->LeftColumnClass ?>"><?= $Page->LabCD->caption() ?><?= $Page->LabCD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LabCD->cellAttributes() ?>>
<span id="el_lab_test_result_LabCD">
<input type="<?= $Page->LabCD->getInputTextType() ?>" data-table="lab_test_result" data-field="x_LabCD" name="x_LabCD" id="x_LabCD" size="30" maxlength="6" placeholder="<?= HtmlEncode($Page->LabCD->getPlaceHolder()) ?>" value="<?= $Page->LabCD->EditValue ?>"<?= $Page->LabCD->editAttributes() ?> aria-describedby="x_LabCD_help">
<?= $Page->LabCD->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->LabCD->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OutLabAmt->Visible) { // OutLabAmt ?>
    <div id="r_OutLabAmt" class="form-group row">
        <label id="elh_lab_test_result_OutLabAmt" for="x_OutLabAmt" class="<?= $Page->LeftColumnClass ?>"><?= $Page->OutLabAmt->caption() ?><?= $Page->OutLabAmt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OutLabAmt->cellAttributes() ?>>
<span id="el_lab_test_result_OutLabAmt">
<input type="<?= $Page->OutLabAmt->getInputTextType() ?>" data-table="lab_test_result" data-field="x_OutLabAmt" name="x_OutLabAmt" id="x_OutLabAmt" size="30" placeholder="<?= HtmlEncode($Page->OutLabAmt->getPlaceHolder()) ?>" value="<?= $Page->OutLabAmt->EditValue ?>"<?= $Page->OutLabAmt->editAttributes() ?> aria-describedby="x_OutLabAmt_help">
<?= $Page->OutLabAmt->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OutLabAmt->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ProductQty->Visible) { // ProductQty ?>
    <div id="r_ProductQty" class="form-group row">
        <label id="elh_lab_test_result_ProductQty" for="x_ProductQty" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ProductQty->caption() ?><?= $Page->ProductQty->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProductQty->cellAttributes() ?>>
<span id="el_lab_test_result_ProductQty">
<input type="<?= $Page->ProductQty->getInputTextType() ?>" data-table="lab_test_result" data-field="x_ProductQty" name="x_ProductQty" id="x_ProductQty" size="30" placeholder="<?= HtmlEncode($Page->ProductQty->getPlaceHolder()) ?>" value="<?= $Page->ProductQty->EditValue ?>"<?= $Page->ProductQty->editAttributes() ?> aria-describedby="x_ProductQty_help">
<?= $Page->ProductQty->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ProductQty->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Repeat->Visible) { // Repeat ?>
    <div id="r_Repeat" class="form-group row">
        <label id="elh_lab_test_result_Repeat" for="x_Repeat" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Repeat->caption() ?><?= $Page->Repeat->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Repeat->cellAttributes() ?>>
<span id="el_lab_test_result_Repeat">
<input type="<?= $Page->Repeat->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Repeat" name="x_Repeat" id="x_Repeat" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->Repeat->getPlaceHolder()) ?>" value="<?= $Page->Repeat->EditValue ?>"<?= $Page->Repeat->editAttributes() ?> aria-describedby="x_Repeat_help">
<?= $Page->Repeat->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Repeat->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DeptNo->Visible) { // DeptNo ?>
    <div id="r_DeptNo" class="form-group row">
        <label id="elh_lab_test_result_DeptNo" for="x_DeptNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DeptNo->caption() ?><?= $Page->DeptNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DeptNo->cellAttributes() ?>>
<span id="el_lab_test_result_DeptNo">
<input type="<?= $Page->DeptNo->getInputTextType() ?>" data-table="lab_test_result" data-field="x_DeptNo" name="x_DeptNo" id="x_DeptNo" size="30" maxlength="5" placeholder="<?= HtmlEncode($Page->DeptNo->getPlaceHolder()) ?>" value="<?= $Page->DeptNo->EditValue ?>"<?= $Page->DeptNo->editAttributes() ?> aria-describedby="x_DeptNo_help">
<?= $Page->DeptNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DeptNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Desc1->Visible) { // Desc1 ?>
    <div id="r_Desc1" class="form-group row">
        <label id="elh_lab_test_result_Desc1" for="x_Desc1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Desc1->caption() ?><?= $Page->Desc1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Desc1->cellAttributes() ?>>
<span id="el_lab_test_result_Desc1">
<input type="<?= $Page->Desc1->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Desc1" name="x_Desc1" id="x_Desc1" size="30" maxlength="200" placeholder="<?= HtmlEncode($Page->Desc1->getPlaceHolder()) ?>" value="<?= $Page->Desc1->EditValue ?>"<?= $Page->Desc1->editAttributes() ?> aria-describedby="x_Desc1_help">
<?= $Page->Desc1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Desc1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Desc2->Visible) { // Desc2 ?>
    <div id="r_Desc2" class="form-group row">
        <label id="elh_lab_test_result_Desc2" for="x_Desc2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Desc2->caption() ?><?= $Page->Desc2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Desc2->cellAttributes() ?>>
<span id="el_lab_test_result_Desc2">
<input type="<?= $Page->Desc2->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Desc2" name="x_Desc2" id="x_Desc2" size="30" maxlength="200" placeholder="<?= HtmlEncode($Page->Desc2->getPlaceHolder()) ?>" value="<?= $Page->Desc2->EditValue ?>"<?= $Page->Desc2->editAttributes() ?> aria-describedby="x_Desc2_help">
<?= $Page->Desc2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Desc2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RptResult->Visible) { // RptResult ?>
    <div id="r_RptResult" class="form-group row">
        <label id="elh_lab_test_result_RptResult" for="x_RptResult" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RptResult->caption() ?><?= $Page->RptResult->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RptResult->cellAttributes() ?>>
<span id="el_lab_test_result_RptResult">
<input type="<?= $Page->RptResult->getInputTextType() ?>" data-table="lab_test_result" data-field="x_RptResult" name="x_RptResult" id="x_RptResult" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->RptResult->getPlaceHolder()) ?>" value="<?= $Page->RptResult->EditValue ?>"<?= $Page->RptResult->editAttributes() ?> aria-describedby="x_RptResult_help">
<?= $Page->RptResult->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RptResult->getErrorMessage() ?></div>
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
    ew.addEventHandlers("lab_test_result");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
