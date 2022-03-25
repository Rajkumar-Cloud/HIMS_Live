<?php

namespace PHPMaker2021\HIMS;

// Page object
$LabTestResultSearch = &$Page;
?>
<script>
var currentForm, currentPageID;
var flab_test_resultsearch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    <?php if ($Page->IsModal) { ?>
    flab_test_resultsearch = currentAdvancedSearchForm = new ew.Form("flab_test_resultsearch", "search");
    <?php } else { ?>
    flab_test_resultsearch = currentForm = new ew.Form("flab_test_resultsearch", "search");
    <?php } ?>
    currentPageID = ew.PAGE_ID = "search";

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "lab_test_result")) ?>,
        fields = currentTable.fields;
    flab_test_resultsearch.addFields([
        ["Branch", [], fields.Branch.isInvalid],
        ["SidNo", [], fields.SidNo.isInvalid],
        ["SidDate", [ew.Validators.datetime(0)], fields.SidDate.isInvalid],
        ["TestCd", [], fields.TestCd.isInvalid],
        ["TestSubCd", [], fields.TestSubCd.isInvalid],
        ["DEptCd", [], fields.DEptCd.isInvalid],
        ["ProfCd", [], fields.ProfCd.isInvalid],
        ["LabReport", [], fields.LabReport.isInvalid],
        ["ResultDate", [ew.Validators.datetime(0)], fields.ResultDate.isInvalid],
        ["Comments", [], fields.Comments.isInvalid],
        ["Method", [], fields.Method.isInvalid],
        ["Specimen", [], fields.Specimen.isInvalid],
        ["Amount", [ew.Validators.float], fields.Amount.isInvalid],
        ["ResultBy", [], fields.ResultBy.isInvalid],
        ["AuthBy", [], fields.AuthBy.isInvalid],
        ["AuthDate", [ew.Validators.datetime(0)], fields.AuthDate.isInvalid],
        ["Abnormal", [], fields.Abnormal.isInvalid],
        ["Printed", [], fields.Printed.isInvalid],
        ["Dispatch", [], fields.Dispatch.isInvalid],
        ["LOWHIGH", [], fields.LOWHIGH.isInvalid],
        ["RefValue", [], fields.RefValue.isInvalid],
        ["Unit", [], fields.Unit.isInvalid],
        ["ResDate", [ew.Validators.datetime(0)], fields.ResDate.isInvalid],
        ["Pic1", [], fields.Pic1.isInvalid],
        ["Pic2", [], fields.Pic2.isInvalid],
        ["GraphPath", [], fields.GraphPath.isInvalid],
        ["SampleDate", [ew.Validators.datetime(0)], fields.SampleDate.isInvalid],
        ["SampleUser", [], fields.SampleUser.isInvalid],
        ["ReceivedDate", [ew.Validators.datetime(0)], fields.ReceivedDate.isInvalid],
        ["ReceivedUser", [], fields.ReceivedUser.isInvalid],
        ["DeptRecvDate", [ew.Validators.datetime(0)], fields.DeptRecvDate.isInvalid],
        ["DeptRecvUser", [], fields.DeptRecvUser.isInvalid],
        ["PrintBy", [], fields.PrintBy.isInvalid],
        ["PrintDate", [ew.Validators.datetime(0)], fields.PrintDate.isInvalid],
        ["MachineCD", [], fields.MachineCD.isInvalid],
        ["TestCancel", [], fields.TestCancel.isInvalid],
        ["OutSource", [], fields.OutSource.isInvalid],
        ["Tariff", [ew.Validators.float], fields.Tariff.isInvalid],
        ["EDITDATE", [ew.Validators.datetime(0)], fields.EDITDATE.isInvalid],
        ["UPLOAD", [], fields.UPLOAD.isInvalid],
        ["SAuthDate", [ew.Validators.datetime(0)], fields.SAuthDate.isInvalid],
        ["SAuthBy", [], fields.SAuthBy.isInvalid],
        ["NoRC", [], fields.NoRC.isInvalid],
        ["DispDt", [ew.Validators.datetime(0)], fields.DispDt.isInvalid],
        ["DispUser", [], fields.DispUser.isInvalid],
        ["DispRemarks", [], fields.DispRemarks.isInvalid],
        ["DispMode", [], fields.DispMode.isInvalid],
        ["ProductCD", [], fields.ProductCD.isInvalid],
        ["Nos", [ew.Validators.float], fields.Nos.isInvalid],
        ["WBCPath", [], fields.WBCPath.isInvalid],
        ["RBCPath", [], fields.RBCPath.isInvalid],
        ["PTPath", [], fields.PTPath.isInvalid],
        ["ActualAmt", [ew.Validators.float], fields.ActualAmt.isInvalid],
        ["NoSign", [], fields.NoSign.isInvalid],
        ["_Barcode", [], fields._Barcode.isInvalid],
        ["ReadTime", [ew.Validators.datetime(0)], fields.ReadTime.isInvalid],
        ["Result", [], fields.Result.isInvalid],
        ["VailID", [], fields.VailID.isInvalid],
        ["ReadMachine", [], fields.ReadMachine.isInvalid],
        ["LabCD", [], fields.LabCD.isInvalid],
        ["OutLabAmt", [ew.Validators.float], fields.OutLabAmt.isInvalid],
        ["ProductQty", [ew.Validators.float], fields.ProductQty.isInvalid],
        ["Repeat", [], fields.Repeat.isInvalid],
        ["DeptNo", [], fields.DeptNo.isInvalid],
        ["Desc1", [], fields.Desc1.isInvalid],
        ["Desc2", [], fields.Desc2.isInvalid],
        ["RptResult", [], fields.RptResult.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        flab_test_resultsearch.setInvalid();
    });

    // Validate form
    flab_test_resultsearch.validate = function () {
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
    flab_test_resultsearch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    flab_test_resultsearch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("flab_test_resultsearch");
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
<form name="flab_test_resultsearch" id="flab_test_resultsearch" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="lab_test_result">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($Page->Branch->Visible) { // Branch ?>
    <div id="r_Branch" class="form-group row">
        <label for="x_Branch" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_Branch"><?= $Page->Branch->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Branch" id="z_Branch" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Branch->cellAttributes() ?>>
            <span id="el_lab_test_result_Branch" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Branch->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Branch" name="x_Branch" id="x_Branch" size="30" maxlength="4" placeholder="<?= HtmlEncode($Page->Branch->getPlaceHolder()) ?>" value="<?= $Page->Branch->EditValue ?>"<?= $Page->Branch->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Branch->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->SidNo->Visible) { // SidNo ?>
    <div id="r_SidNo" class="form-group row">
        <label for="x_SidNo" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_SidNo"><?= $Page->SidNo->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_SidNo" id="z_SidNo" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SidNo->cellAttributes() ?>>
            <span id="el_lab_test_result_SidNo" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->SidNo->getInputTextType() ?>" data-table="lab_test_result" data-field="x_SidNo" name="x_SidNo" id="x_SidNo" size="30" maxlength="6" placeholder="<?= HtmlEncode($Page->SidNo->getPlaceHolder()) ?>" value="<?= $Page->SidNo->EditValue ?>"<?= $Page->SidNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SidNo->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->SidDate->Visible) { // SidDate ?>
    <div id="r_SidDate" class="form-group row">
        <label for="x_SidDate" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_SidDate"><?= $Page->SidDate->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_SidDate" id="z_SidDate" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SidDate->cellAttributes() ?>>
            <span id="el_lab_test_result_SidDate" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->SidDate->getInputTextType() ?>" data-table="lab_test_result" data-field="x_SidDate" name="x_SidDate" id="x_SidDate" placeholder="<?= HtmlEncode($Page->SidDate->getPlaceHolder()) ?>" value="<?= $Page->SidDate->EditValue ?>"<?= $Page->SidDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SidDate->getErrorMessage(false) ?></div>
<?php if (!$Page->SidDate->ReadOnly && !$Page->SidDate->Disabled && !isset($Page->SidDate->EditAttrs["readonly"]) && !isset($Page->SidDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultsearch", "datetimepicker"], function() {
    ew.createDateTimePicker("flab_test_resultsearch", "x_SidDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->TestCd->Visible) { // TestCd ?>
    <div id="r_TestCd" class="form-group row">
        <label for="x_TestCd" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_TestCd"><?= $Page->TestCd->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_TestCd" id="z_TestCd" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TestCd->cellAttributes() ?>>
            <span id="el_lab_test_result_TestCd" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->TestCd->getInputTextType() ?>" data-table="lab_test_result" data-field="x_TestCd" name="x_TestCd" id="x_TestCd" size="30" maxlength="6" placeholder="<?= HtmlEncode($Page->TestCd->getPlaceHolder()) ?>" value="<?= $Page->TestCd->EditValue ?>"<?= $Page->TestCd->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TestCd->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->TestSubCd->Visible) { // TestSubCd ?>
    <div id="r_TestSubCd" class="form-group row">
        <label for="x_TestSubCd" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_TestSubCd"><?= $Page->TestSubCd->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_TestSubCd" id="z_TestSubCd" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TestSubCd->cellAttributes() ?>>
            <span id="el_lab_test_result_TestSubCd" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->TestSubCd->getInputTextType() ?>" data-table="lab_test_result" data-field="x_TestSubCd" name="x_TestSubCd" id="x_TestSubCd" size="30" maxlength="3" placeholder="<?= HtmlEncode($Page->TestSubCd->getPlaceHolder()) ?>" value="<?= $Page->TestSubCd->EditValue ?>"<?= $Page->TestSubCd->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TestSubCd->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->DEptCd->Visible) { // DEptCd ?>
    <div id="r_DEptCd" class="form-group row">
        <label for="x_DEptCd" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_DEptCd"><?= $Page->DEptCd->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DEptCd" id="z_DEptCd" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DEptCd->cellAttributes() ?>>
            <span id="el_lab_test_result_DEptCd" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->DEptCd->getInputTextType() ?>" data-table="lab_test_result" data-field="x_DEptCd" name="x_DEptCd" id="x_DEptCd" size="30" maxlength="2" placeholder="<?= HtmlEncode($Page->DEptCd->getPlaceHolder()) ?>" value="<?= $Page->DEptCd->EditValue ?>"<?= $Page->DEptCd->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DEptCd->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ProfCd->Visible) { // ProfCd ?>
    <div id="r_ProfCd" class="form-group row">
        <label for="x_ProfCd" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_ProfCd"><?= $Page->ProfCd->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ProfCd" id="z_ProfCd" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProfCd->cellAttributes() ?>>
            <span id="el_lab_test_result_ProfCd" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ProfCd->getInputTextType() ?>" data-table="lab_test_result" data-field="x_ProfCd" name="x_ProfCd" id="x_ProfCd" size="30" maxlength="6" placeholder="<?= HtmlEncode($Page->ProfCd->getPlaceHolder()) ?>" value="<?= $Page->ProfCd->EditValue ?>"<?= $Page->ProfCd->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ProfCd->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->LabReport->Visible) { // LabReport ?>
    <div id="r_LabReport" class="form-group row">
        <label for="x_LabReport" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_LabReport"><?= $Page->LabReport->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_LabReport" id="z_LabReport" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LabReport->cellAttributes() ?>>
            <span id="el_lab_test_result_LabReport" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->LabReport->getInputTextType() ?>" data-table="lab_test_result" data-field="x_LabReport" name="x_LabReport" id="x_LabReport" size="35" placeholder="<?= HtmlEncode($Page->LabReport->getPlaceHolder()) ?>" value="<?= $Page->LabReport->EditValue ?>"<?= $Page->LabReport->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->LabReport->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ResultDate->Visible) { // ResultDate ?>
    <div id="r_ResultDate" class="form-group row">
        <label for="x_ResultDate" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_ResultDate"><?= $Page->ResultDate->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_ResultDate" id="z_ResultDate" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ResultDate->cellAttributes() ?>>
            <span id="el_lab_test_result_ResultDate" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ResultDate->getInputTextType() ?>" data-table="lab_test_result" data-field="x_ResultDate" name="x_ResultDate" id="x_ResultDate" placeholder="<?= HtmlEncode($Page->ResultDate->getPlaceHolder()) ?>" value="<?= $Page->ResultDate->EditValue ?>"<?= $Page->ResultDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ResultDate->getErrorMessage(false) ?></div>
<?php if (!$Page->ResultDate->ReadOnly && !$Page->ResultDate->Disabled && !isset($Page->ResultDate->EditAttrs["readonly"]) && !isset($Page->ResultDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultsearch", "datetimepicker"], function() {
    ew.createDateTimePicker("flab_test_resultsearch", "x_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Comments->Visible) { // Comments ?>
    <div id="r_Comments" class="form-group row">
        <label for="x_Comments" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_Comments"><?= $Page->Comments->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Comments" id="z_Comments" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Comments->cellAttributes() ?>>
            <span id="el_lab_test_result_Comments" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Comments->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Comments" name="x_Comments" id="x_Comments" size="35" placeholder="<?= HtmlEncode($Page->Comments->getPlaceHolder()) ?>" value="<?= $Page->Comments->EditValue ?>"<?= $Page->Comments->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Comments->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Method->Visible) { // Method ?>
    <div id="r_Method" class="form-group row">
        <label for="x_Method" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_Method"><?= $Page->Method->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Method" id="z_Method" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Method->cellAttributes() ?>>
            <span id="el_lab_test_result_Method" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Method->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Method" name="x_Method" id="x_Method" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Method->getPlaceHolder()) ?>" value="<?= $Page->Method->EditValue ?>"<?= $Page->Method->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Method->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Specimen->Visible) { // Specimen ?>
    <div id="r_Specimen" class="form-group row">
        <label for="x_Specimen" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_Specimen"><?= $Page->Specimen->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Specimen" id="z_Specimen" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Specimen->cellAttributes() ?>>
            <span id="el_lab_test_result_Specimen" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Specimen->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Specimen" name="x_Specimen" id="x_Specimen" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Specimen->getPlaceHolder()) ?>" value="<?= $Page->Specimen->EditValue ?>"<?= $Page->Specimen->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Specimen->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
    <div id="r_Amount" class="form-group row">
        <label for="x_Amount" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_Amount"><?= $Page->Amount->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_Amount" id="z_Amount" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Amount->cellAttributes() ?>>
            <span id="el_lab_test_result_Amount" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Amount->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Amount" name="x_Amount" id="x_Amount" size="30" placeholder="<?= HtmlEncode($Page->Amount->getPlaceHolder()) ?>" value="<?= $Page->Amount->EditValue ?>"<?= $Page->Amount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Amount->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ResultBy->Visible) { // ResultBy ?>
    <div id="r_ResultBy" class="form-group row">
        <label for="x_ResultBy" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_ResultBy"><?= $Page->ResultBy->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ResultBy" id="z_ResultBy" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ResultBy->cellAttributes() ?>>
            <span id="el_lab_test_result_ResultBy" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ResultBy->getInputTextType() ?>" data-table="lab_test_result" data-field="x_ResultBy" name="x_ResultBy" id="x_ResultBy" size="30" maxlength="20" placeholder="<?= HtmlEncode($Page->ResultBy->getPlaceHolder()) ?>" value="<?= $Page->ResultBy->EditValue ?>"<?= $Page->ResultBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ResultBy->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->AuthBy->Visible) { // AuthBy ?>
    <div id="r_AuthBy" class="form-group row">
        <label for="x_AuthBy" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_AuthBy"><?= $Page->AuthBy->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_AuthBy" id="z_AuthBy" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AuthBy->cellAttributes() ?>>
            <span id="el_lab_test_result_AuthBy" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->AuthBy->getInputTextType() ?>" data-table="lab_test_result" data-field="x_AuthBy" name="x_AuthBy" id="x_AuthBy" size="30" maxlength="20" placeholder="<?= HtmlEncode($Page->AuthBy->getPlaceHolder()) ?>" value="<?= $Page->AuthBy->EditValue ?>"<?= $Page->AuthBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->AuthBy->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->AuthDate->Visible) { // AuthDate ?>
    <div id="r_AuthDate" class="form-group row">
        <label for="x_AuthDate" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_AuthDate"><?= $Page->AuthDate->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_AuthDate" id="z_AuthDate" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AuthDate->cellAttributes() ?>>
            <span id="el_lab_test_result_AuthDate" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->AuthDate->getInputTextType() ?>" data-table="lab_test_result" data-field="x_AuthDate" name="x_AuthDate" id="x_AuthDate" placeholder="<?= HtmlEncode($Page->AuthDate->getPlaceHolder()) ?>" value="<?= $Page->AuthDate->EditValue ?>"<?= $Page->AuthDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->AuthDate->getErrorMessage(false) ?></div>
<?php if (!$Page->AuthDate->ReadOnly && !$Page->AuthDate->Disabled && !isset($Page->AuthDate->EditAttrs["readonly"]) && !isset($Page->AuthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultsearch", "datetimepicker"], function() {
    ew.createDateTimePicker("flab_test_resultsearch", "x_AuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Abnormal->Visible) { // Abnormal ?>
    <div id="r_Abnormal" class="form-group row">
        <label for="x_Abnormal" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_Abnormal"><?= $Page->Abnormal->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Abnormal" id="z_Abnormal" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Abnormal->cellAttributes() ?>>
            <span id="el_lab_test_result_Abnormal" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Abnormal->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Abnormal" name="x_Abnormal" id="x_Abnormal" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->Abnormal->getPlaceHolder()) ?>" value="<?= $Page->Abnormal->EditValue ?>"<?= $Page->Abnormal->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Abnormal->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Printed->Visible) { // Printed ?>
    <div id="r_Printed" class="form-group row">
        <label for="x_Printed" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_Printed"><?= $Page->Printed->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Printed" id="z_Printed" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Printed->cellAttributes() ?>>
            <span id="el_lab_test_result_Printed" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Printed->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Printed" name="x_Printed" id="x_Printed" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->Printed->getPlaceHolder()) ?>" value="<?= $Page->Printed->EditValue ?>"<?= $Page->Printed->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Printed->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Dispatch->Visible) { // Dispatch ?>
    <div id="r_Dispatch" class="form-group row">
        <label for="x_Dispatch" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_Dispatch"><?= $Page->Dispatch->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Dispatch" id="z_Dispatch" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Dispatch->cellAttributes() ?>>
            <span id="el_lab_test_result_Dispatch" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Dispatch->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Dispatch" name="x_Dispatch" id="x_Dispatch" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->Dispatch->getPlaceHolder()) ?>" value="<?= $Page->Dispatch->EditValue ?>"<?= $Page->Dispatch->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Dispatch->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->LOWHIGH->Visible) { // LOWHIGH ?>
    <div id="r_LOWHIGH" class="form-group row">
        <label for="x_LOWHIGH" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_LOWHIGH"><?= $Page->LOWHIGH->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_LOWHIGH" id="z_LOWHIGH" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LOWHIGH->cellAttributes() ?>>
            <span id="el_lab_test_result_LOWHIGH" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->LOWHIGH->getInputTextType() ?>" data-table="lab_test_result" data-field="x_LOWHIGH" name="x_LOWHIGH" id="x_LOWHIGH" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->LOWHIGH->getPlaceHolder()) ?>" value="<?= $Page->LOWHIGH->EditValue ?>"<?= $Page->LOWHIGH->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->LOWHIGH->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->RefValue->Visible) { // RefValue ?>
    <div id="r_RefValue" class="form-group row">
        <label for="x_RefValue" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_RefValue"><?= $Page->RefValue->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_RefValue" id="z_RefValue" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RefValue->cellAttributes() ?>>
            <span id="el_lab_test_result_RefValue" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->RefValue->getInputTextType() ?>" data-table="lab_test_result" data-field="x_RefValue" name="x_RefValue" id="x_RefValue" size="35" placeholder="<?= HtmlEncode($Page->RefValue->getPlaceHolder()) ?>" value="<?= $Page->RefValue->EditValue ?>"<?= $Page->RefValue->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RefValue->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Unit->Visible) { // Unit ?>
    <div id="r_Unit" class="form-group row">
        <label for="x_Unit" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_Unit"><?= $Page->Unit->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Unit" id="z_Unit" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Unit->cellAttributes() ?>>
            <span id="el_lab_test_result_Unit" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Unit->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Unit" name="x_Unit" id="x_Unit" size="30" maxlength="20" placeholder="<?= HtmlEncode($Page->Unit->getPlaceHolder()) ?>" value="<?= $Page->Unit->EditValue ?>"<?= $Page->Unit->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Unit->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ResDate->Visible) { // ResDate ?>
    <div id="r_ResDate" class="form-group row">
        <label for="x_ResDate" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_ResDate"><?= $Page->ResDate->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_ResDate" id="z_ResDate" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ResDate->cellAttributes() ?>>
            <span id="el_lab_test_result_ResDate" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ResDate->getInputTextType() ?>" data-table="lab_test_result" data-field="x_ResDate" name="x_ResDate" id="x_ResDate" placeholder="<?= HtmlEncode($Page->ResDate->getPlaceHolder()) ?>" value="<?= $Page->ResDate->EditValue ?>"<?= $Page->ResDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ResDate->getErrorMessage(false) ?></div>
<?php if (!$Page->ResDate->ReadOnly && !$Page->ResDate->Disabled && !isset($Page->ResDate->EditAttrs["readonly"]) && !isset($Page->ResDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultsearch", "datetimepicker"], function() {
    ew.createDateTimePicker("flab_test_resultsearch", "x_ResDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Pic1->Visible) { // Pic1 ?>
    <div id="r_Pic1" class="form-group row">
        <label for="x_Pic1" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_Pic1"><?= $Page->Pic1->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Pic1" id="z_Pic1" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Pic1->cellAttributes() ?>>
            <span id="el_lab_test_result_Pic1" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Pic1->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Pic1" name="x_Pic1" id="x_Pic1" size="30" maxlength="200" placeholder="<?= HtmlEncode($Page->Pic1->getPlaceHolder()) ?>" value="<?= $Page->Pic1->EditValue ?>"<?= $Page->Pic1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Pic1->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Pic2->Visible) { // Pic2 ?>
    <div id="r_Pic2" class="form-group row">
        <label for="x_Pic2" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_Pic2"><?= $Page->Pic2->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Pic2" id="z_Pic2" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Pic2->cellAttributes() ?>>
            <span id="el_lab_test_result_Pic2" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Pic2->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Pic2" name="x_Pic2" id="x_Pic2" size="30" maxlength="200" placeholder="<?= HtmlEncode($Page->Pic2->getPlaceHolder()) ?>" value="<?= $Page->Pic2->EditValue ?>"<?= $Page->Pic2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Pic2->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->GraphPath->Visible) { // GraphPath ?>
    <div id="r_GraphPath" class="form-group row">
        <label for="x_GraphPath" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_GraphPath"><?= $Page->GraphPath->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_GraphPath" id="z_GraphPath" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GraphPath->cellAttributes() ?>>
            <span id="el_lab_test_result_GraphPath" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->GraphPath->getInputTextType() ?>" data-table="lab_test_result" data-field="x_GraphPath" name="x_GraphPath" id="x_GraphPath" size="30" maxlength="200" placeholder="<?= HtmlEncode($Page->GraphPath->getPlaceHolder()) ?>" value="<?= $Page->GraphPath->EditValue ?>"<?= $Page->GraphPath->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->GraphPath->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->SampleDate->Visible) { // SampleDate ?>
    <div id="r_SampleDate" class="form-group row">
        <label for="x_SampleDate" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_SampleDate"><?= $Page->SampleDate->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_SampleDate" id="z_SampleDate" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SampleDate->cellAttributes() ?>>
            <span id="el_lab_test_result_SampleDate" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->SampleDate->getInputTextType() ?>" data-table="lab_test_result" data-field="x_SampleDate" name="x_SampleDate" id="x_SampleDate" placeholder="<?= HtmlEncode($Page->SampleDate->getPlaceHolder()) ?>" value="<?= $Page->SampleDate->EditValue ?>"<?= $Page->SampleDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SampleDate->getErrorMessage(false) ?></div>
<?php if (!$Page->SampleDate->ReadOnly && !$Page->SampleDate->Disabled && !isset($Page->SampleDate->EditAttrs["readonly"]) && !isset($Page->SampleDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultsearch", "datetimepicker"], function() {
    ew.createDateTimePicker("flab_test_resultsearch", "x_SampleDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->SampleUser->Visible) { // SampleUser ?>
    <div id="r_SampleUser" class="form-group row">
        <label for="x_SampleUser" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_SampleUser"><?= $Page->SampleUser->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_SampleUser" id="z_SampleUser" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SampleUser->cellAttributes() ?>>
            <span id="el_lab_test_result_SampleUser" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->SampleUser->getInputTextType() ?>" data-table="lab_test_result" data-field="x_SampleUser" name="x_SampleUser" id="x_SampleUser" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->SampleUser->getPlaceHolder()) ?>" value="<?= $Page->SampleUser->EditValue ?>"<?= $Page->SampleUser->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SampleUser->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ReceivedDate->Visible) { // ReceivedDate ?>
    <div id="r_ReceivedDate" class="form-group row">
        <label for="x_ReceivedDate" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_ReceivedDate"><?= $Page->ReceivedDate->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_ReceivedDate" id="z_ReceivedDate" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReceivedDate->cellAttributes() ?>>
            <span id="el_lab_test_result_ReceivedDate" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ReceivedDate->getInputTextType() ?>" data-table="lab_test_result" data-field="x_ReceivedDate" name="x_ReceivedDate" id="x_ReceivedDate" placeholder="<?= HtmlEncode($Page->ReceivedDate->getPlaceHolder()) ?>" value="<?= $Page->ReceivedDate->EditValue ?>"<?= $Page->ReceivedDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ReceivedDate->getErrorMessage(false) ?></div>
<?php if (!$Page->ReceivedDate->ReadOnly && !$Page->ReceivedDate->Disabled && !isset($Page->ReceivedDate->EditAttrs["readonly"]) && !isset($Page->ReceivedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultsearch", "datetimepicker"], function() {
    ew.createDateTimePicker("flab_test_resultsearch", "x_ReceivedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ReceivedUser->Visible) { // ReceivedUser ?>
    <div id="r_ReceivedUser" class="form-group row">
        <label for="x_ReceivedUser" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_ReceivedUser"><?= $Page->ReceivedUser->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ReceivedUser" id="z_ReceivedUser" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReceivedUser->cellAttributes() ?>>
            <span id="el_lab_test_result_ReceivedUser" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ReceivedUser->getInputTextType() ?>" data-table="lab_test_result" data-field="x_ReceivedUser" name="x_ReceivedUser" id="x_ReceivedUser" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->ReceivedUser->getPlaceHolder()) ?>" value="<?= $Page->ReceivedUser->EditValue ?>"<?= $Page->ReceivedUser->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ReceivedUser->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->DeptRecvDate->Visible) { // DeptRecvDate ?>
    <div id="r_DeptRecvDate" class="form-group row">
        <label for="x_DeptRecvDate" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_DeptRecvDate"><?= $Page->DeptRecvDate->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_DeptRecvDate" id="z_DeptRecvDate" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DeptRecvDate->cellAttributes() ?>>
            <span id="el_lab_test_result_DeptRecvDate" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->DeptRecvDate->getInputTextType() ?>" data-table="lab_test_result" data-field="x_DeptRecvDate" name="x_DeptRecvDate" id="x_DeptRecvDate" placeholder="<?= HtmlEncode($Page->DeptRecvDate->getPlaceHolder()) ?>" value="<?= $Page->DeptRecvDate->EditValue ?>"<?= $Page->DeptRecvDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DeptRecvDate->getErrorMessage(false) ?></div>
<?php if (!$Page->DeptRecvDate->ReadOnly && !$Page->DeptRecvDate->Disabled && !isset($Page->DeptRecvDate->EditAttrs["readonly"]) && !isset($Page->DeptRecvDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultsearch", "datetimepicker"], function() {
    ew.createDateTimePicker("flab_test_resultsearch", "x_DeptRecvDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->DeptRecvUser->Visible) { // DeptRecvUser ?>
    <div id="r_DeptRecvUser" class="form-group row">
        <label for="x_DeptRecvUser" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_DeptRecvUser"><?= $Page->DeptRecvUser->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DeptRecvUser" id="z_DeptRecvUser" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DeptRecvUser->cellAttributes() ?>>
            <span id="el_lab_test_result_DeptRecvUser" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->DeptRecvUser->getInputTextType() ?>" data-table="lab_test_result" data-field="x_DeptRecvUser" name="x_DeptRecvUser" id="x_DeptRecvUser" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->DeptRecvUser->getPlaceHolder()) ?>" value="<?= $Page->DeptRecvUser->EditValue ?>"<?= $Page->DeptRecvUser->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DeptRecvUser->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PrintBy->Visible) { // PrintBy ?>
    <div id="r_PrintBy" class="form-group row">
        <label for="x_PrintBy" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_PrintBy"><?= $Page->PrintBy->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PrintBy" id="z_PrintBy" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PrintBy->cellAttributes() ?>>
            <span id="el_lab_test_result_PrintBy" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PrintBy->getInputTextType() ?>" data-table="lab_test_result" data-field="x_PrintBy" name="x_PrintBy" id="x_PrintBy" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->PrintBy->getPlaceHolder()) ?>" value="<?= $Page->PrintBy->EditValue ?>"<?= $Page->PrintBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PrintBy->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PrintDate->Visible) { // PrintDate ?>
    <div id="r_PrintDate" class="form-group row">
        <label for="x_PrintDate" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_PrintDate"><?= $Page->PrintDate->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_PrintDate" id="z_PrintDate" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PrintDate->cellAttributes() ?>>
            <span id="el_lab_test_result_PrintDate" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PrintDate->getInputTextType() ?>" data-table="lab_test_result" data-field="x_PrintDate" name="x_PrintDate" id="x_PrintDate" placeholder="<?= HtmlEncode($Page->PrintDate->getPlaceHolder()) ?>" value="<?= $Page->PrintDate->EditValue ?>"<?= $Page->PrintDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PrintDate->getErrorMessage(false) ?></div>
<?php if (!$Page->PrintDate->ReadOnly && !$Page->PrintDate->Disabled && !isset($Page->PrintDate->EditAttrs["readonly"]) && !isset($Page->PrintDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultsearch", "datetimepicker"], function() {
    ew.createDateTimePicker("flab_test_resultsearch", "x_PrintDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->MachineCD->Visible) { // MachineCD ?>
    <div id="r_MachineCD" class="form-group row">
        <label for="x_MachineCD" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_MachineCD"><?= $Page->MachineCD->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_MachineCD" id="z_MachineCD" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MachineCD->cellAttributes() ?>>
            <span id="el_lab_test_result_MachineCD" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->MachineCD->getInputTextType() ?>" data-table="lab_test_result" data-field="x_MachineCD" name="x_MachineCD" id="x_MachineCD" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->MachineCD->getPlaceHolder()) ?>" value="<?= $Page->MachineCD->EditValue ?>"<?= $Page->MachineCD->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->MachineCD->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->TestCancel->Visible) { // TestCancel ?>
    <div id="r_TestCancel" class="form-group row">
        <label for="x_TestCancel" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_TestCancel"><?= $Page->TestCancel->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_TestCancel" id="z_TestCancel" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TestCancel->cellAttributes() ?>>
            <span id="el_lab_test_result_TestCancel" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->TestCancel->getInputTextType() ?>" data-table="lab_test_result" data-field="x_TestCancel" name="x_TestCancel" id="x_TestCancel" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->TestCancel->getPlaceHolder()) ?>" value="<?= $Page->TestCancel->EditValue ?>"<?= $Page->TestCancel->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TestCancel->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->OutSource->Visible) { // OutSource ?>
    <div id="r_OutSource" class="form-group row">
        <label for="x_OutSource" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_OutSource"><?= $Page->OutSource->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_OutSource" id="z_OutSource" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OutSource->cellAttributes() ?>>
            <span id="el_lab_test_result_OutSource" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->OutSource->getInputTextType() ?>" data-table="lab_test_result" data-field="x_OutSource" name="x_OutSource" id="x_OutSource" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->OutSource->getPlaceHolder()) ?>" value="<?= $Page->OutSource->EditValue ?>"<?= $Page->OutSource->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->OutSource->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Tariff->Visible) { // Tariff ?>
    <div id="r_Tariff" class="form-group row">
        <label for="x_Tariff" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_Tariff"><?= $Page->Tariff->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_Tariff" id="z_Tariff" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tariff->cellAttributes() ?>>
            <span id="el_lab_test_result_Tariff" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Tariff->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Tariff" name="x_Tariff" id="x_Tariff" size="30" placeholder="<?= HtmlEncode($Page->Tariff->getPlaceHolder()) ?>" value="<?= $Page->Tariff->EditValue ?>"<?= $Page->Tariff->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Tariff->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->EDITDATE->Visible) { // EDITDATE ?>
    <div id="r_EDITDATE" class="form-group row">
        <label for="x_EDITDATE" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_EDITDATE"><?= $Page->EDITDATE->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_EDITDATE" id="z_EDITDATE" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EDITDATE->cellAttributes() ?>>
            <span id="el_lab_test_result_EDITDATE" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->EDITDATE->getInputTextType() ?>" data-table="lab_test_result" data-field="x_EDITDATE" name="x_EDITDATE" id="x_EDITDATE" placeholder="<?= HtmlEncode($Page->EDITDATE->getPlaceHolder()) ?>" value="<?= $Page->EDITDATE->EditValue ?>"<?= $Page->EDITDATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->EDITDATE->getErrorMessage(false) ?></div>
<?php if (!$Page->EDITDATE->ReadOnly && !$Page->EDITDATE->Disabled && !isset($Page->EDITDATE->EditAttrs["readonly"]) && !isset($Page->EDITDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultsearch", "datetimepicker"], function() {
    ew.createDateTimePicker("flab_test_resultsearch", "x_EDITDATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->UPLOAD->Visible) { // UPLOAD ?>
    <div id="r_UPLOAD" class="form-group row">
        <label for="x_UPLOAD" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_UPLOAD"><?= $Page->UPLOAD->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_UPLOAD" id="z_UPLOAD" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->UPLOAD->cellAttributes() ?>>
            <span id="el_lab_test_result_UPLOAD" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->UPLOAD->getInputTextType() ?>" data-table="lab_test_result" data-field="x_UPLOAD" name="x_UPLOAD" id="x_UPLOAD" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->UPLOAD->getPlaceHolder()) ?>" value="<?= $Page->UPLOAD->EditValue ?>"<?= $Page->UPLOAD->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->UPLOAD->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->SAuthDate->Visible) { // SAuthDate ?>
    <div id="r_SAuthDate" class="form-group row">
        <label for="x_SAuthDate" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_SAuthDate"><?= $Page->SAuthDate->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_SAuthDate" id="z_SAuthDate" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SAuthDate->cellAttributes() ?>>
            <span id="el_lab_test_result_SAuthDate" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->SAuthDate->getInputTextType() ?>" data-table="lab_test_result" data-field="x_SAuthDate" name="x_SAuthDate" id="x_SAuthDate" placeholder="<?= HtmlEncode($Page->SAuthDate->getPlaceHolder()) ?>" value="<?= $Page->SAuthDate->EditValue ?>"<?= $Page->SAuthDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SAuthDate->getErrorMessage(false) ?></div>
<?php if (!$Page->SAuthDate->ReadOnly && !$Page->SAuthDate->Disabled && !isset($Page->SAuthDate->EditAttrs["readonly"]) && !isset($Page->SAuthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultsearch", "datetimepicker"], function() {
    ew.createDateTimePicker("flab_test_resultsearch", "x_SAuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->SAuthBy->Visible) { // SAuthBy ?>
    <div id="r_SAuthBy" class="form-group row">
        <label for="x_SAuthBy" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_SAuthBy"><?= $Page->SAuthBy->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_SAuthBy" id="z_SAuthBy" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SAuthBy->cellAttributes() ?>>
            <span id="el_lab_test_result_SAuthBy" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->SAuthBy->getInputTextType() ?>" data-table="lab_test_result" data-field="x_SAuthBy" name="x_SAuthBy" id="x_SAuthBy" size="30" maxlength="3" placeholder="<?= HtmlEncode($Page->SAuthBy->getPlaceHolder()) ?>" value="<?= $Page->SAuthBy->EditValue ?>"<?= $Page->SAuthBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SAuthBy->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->NoRC->Visible) { // NoRC ?>
    <div id="r_NoRC" class="form-group row">
        <label for="x_NoRC" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_NoRC"><?= $Page->NoRC->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_NoRC" id="z_NoRC" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NoRC->cellAttributes() ?>>
            <span id="el_lab_test_result_NoRC" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->NoRC->getInputTextType() ?>" data-table="lab_test_result" data-field="x_NoRC" name="x_NoRC" id="x_NoRC" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->NoRC->getPlaceHolder()) ?>" value="<?= $Page->NoRC->EditValue ?>"<?= $Page->NoRC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->NoRC->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->DispDt->Visible) { // DispDt ?>
    <div id="r_DispDt" class="form-group row">
        <label for="x_DispDt" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_DispDt"><?= $Page->DispDt->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_DispDt" id="z_DispDt" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DispDt->cellAttributes() ?>>
            <span id="el_lab_test_result_DispDt" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->DispDt->getInputTextType() ?>" data-table="lab_test_result" data-field="x_DispDt" name="x_DispDt" id="x_DispDt" placeholder="<?= HtmlEncode($Page->DispDt->getPlaceHolder()) ?>" value="<?= $Page->DispDt->EditValue ?>"<?= $Page->DispDt->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DispDt->getErrorMessage(false) ?></div>
<?php if (!$Page->DispDt->ReadOnly && !$Page->DispDt->Disabled && !isset($Page->DispDt->EditAttrs["readonly"]) && !isset($Page->DispDt->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultsearch", "datetimepicker"], function() {
    ew.createDateTimePicker("flab_test_resultsearch", "x_DispDt", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->DispUser->Visible) { // DispUser ?>
    <div id="r_DispUser" class="form-group row">
        <label for="x_DispUser" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_DispUser"><?= $Page->DispUser->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DispUser" id="z_DispUser" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DispUser->cellAttributes() ?>>
            <span id="el_lab_test_result_DispUser" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->DispUser->getInputTextType() ?>" data-table="lab_test_result" data-field="x_DispUser" name="x_DispUser" id="x_DispUser" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->DispUser->getPlaceHolder()) ?>" value="<?= $Page->DispUser->EditValue ?>"<?= $Page->DispUser->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DispUser->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->DispRemarks->Visible) { // DispRemarks ?>
    <div id="r_DispRemarks" class="form-group row">
        <label for="x_DispRemarks" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_DispRemarks"><?= $Page->DispRemarks->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DispRemarks" id="z_DispRemarks" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DispRemarks->cellAttributes() ?>>
            <span id="el_lab_test_result_DispRemarks" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->DispRemarks->getInputTextType() ?>" data-table="lab_test_result" data-field="x_DispRemarks" name="x_DispRemarks" id="x_DispRemarks" size="30" maxlength="250" placeholder="<?= HtmlEncode($Page->DispRemarks->getPlaceHolder()) ?>" value="<?= $Page->DispRemarks->EditValue ?>"<?= $Page->DispRemarks->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DispRemarks->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->DispMode->Visible) { // DispMode ?>
    <div id="r_DispMode" class="form-group row">
        <label for="x_DispMode" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_DispMode"><?= $Page->DispMode->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DispMode" id="z_DispMode" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DispMode->cellAttributes() ?>>
            <span id="el_lab_test_result_DispMode" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->DispMode->getInputTextType() ?>" data-table="lab_test_result" data-field="x_DispMode" name="x_DispMode" id="x_DispMode" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->DispMode->getPlaceHolder()) ?>" value="<?= $Page->DispMode->EditValue ?>"<?= $Page->DispMode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DispMode->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ProductCD->Visible) { // ProductCD ?>
    <div id="r_ProductCD" class="form-group row">
        <label for="x_ProductCD" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_ProductCD"><?= $Page->ProductCD->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ProductCD" id="z_ProductCD" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProductCD->cellAttributes() ?>>
            <span id="el_lab_test_result_ProductCD" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ProductCD->getInputTextType() ?>" data-table="lab_test_result" data-field="x_ProductCD" name="x_ProductCD" id="x_ProductCD" size="30" maxlength="6" placeholder="<?= HtmlEncode($Page->ProductCD->getPlaceHolder()) ?>" value="<?= $Page->ProductCD->EditValue ?>"<?= $Page->ProductCD->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ProductCD->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Nos->Visible) { // Nos ?>
    <div id="r_Nos" class="form-group row">
        <label for="x_Nos" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_Nos"><?= $Page->Nos->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_Nos" id="z_Nos" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Nos->cellAttributes() ?>>
            <span id="el_lab_test_result_Nos" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Nos->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Nos" name="x_Nos" id="x_Nos" size="30" placeholder="<?= HtmlEncode($Page->Nos->getPlaceHolder()) ?>" value="<?= $Page->Nos->EditValue ?>"<?= $Page->Nos->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Nos->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->WBCPath->Visible) { // WBCPath ?>
    <div id="r_WBCPath" class="form-group row">
        <label for="x_WBCPath" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_WBCPath"><?= $Page->WBCPath->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_WBCPath" id="z_WBCPath" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->WBCPath->cellAttributes() ?>>
            <span id="el_lab_test_result_WBCPath" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->WBCPath->getInputTextType() ?>" data-table="lab_test_result" data-field="x_WBCPath" name="x_WBCPath" id="x_WBCPath" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->WBCPath->getPlaceHolder()) ?>" value="<?= $Page->WBCPath->EditValue ?>"<?= $Page->WBCPath->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->WBCPath->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->RBCPath->Visible) { // RBCPath ?>
    <div id="r_RBCPath" class="form-group row">
        <label for="x_RBCPath" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_RBCPath"><?= $Page->RBCPath->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_RBCPath" id="z_RBCPath" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RBCPath->cellAttributes() ?>>
            <span id="el_lab_test_result_RBCPath" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->RBCPath->getInputTextType() ?>" data-table="lab_test_result" data-field="x_RBCPath" name="x_RBCPath" id="x_RBCPath" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->RBCPath->getPlaceHolder()) ?>" value="<?= $Page->RBCPath->EditValue ?>"<?= $Page->RBCPath->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RBCPath->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PTPath->Visible) { // PTPath ?>
    <div id="r_PTPath" class="form-group row">
        <label for="x_PTPath" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_PTPath"><?= $Page->PTPath->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PTPath" id="z_PTPath" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PTPath->cellAttributes() ?>>
            <span id="el_lab_test_result_PTPath" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PTPath->getInputTextType() ?>" data-table="lab_test_result" data-field="x_PTPath" name="x_PTPath" id="x_PTPath" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->PTPath->getPlaceHolder()) ?>" value="<?= $Page->PTPath->EditValue ?>"<?= $Page->PTPath->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PTPath->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ActualAmt->Visible) { // ActualAmt ?>
    <div id="r_ActualAmt" class="form-group row">
        <label for="x_ActualAmt" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_ActualAmt"><?= $Page->ActualAmt->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_ActualAmt" id="z_ActualAmt" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ActualAmt->cellAttributes() ?>>
            <span id="el_lab_test_result_ActualAmt" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ActualAmt->getInputTextType() ?>" data-table="lab_test_result" data-field="x_ActualAmt" name="x_ActualAmt" id="x_ActualAmt" size="30" placeholder="<?= HtmlEncode($Page->ActualAmt->getPlaceHolder()) ?>" value="<?= $Page->ActualAmt->EditValue ?>"<?= $Page->ActualAmt->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ActualAmt->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->NoSign->Visible) { // NoSign ?>
    <div id="r_NoSign" class="form-group row">
        <label for="x_NoSign" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_NoSign"><?= $Page->NoSign->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_NoSign" id="z_NoSign" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NoSign->cellAttributes() ?>>
            <span id="el_lab_test_result_NoSign" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->NoSign->getInputTextType() ?>" data-table="lab_test_result" data-field="x_NoSign" name="x_NoSign" id="x_NoSign" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->NoSign->getPlaceHolder()) ?>" value="<?= $Page->NoSign->EditValue ?>"<?= $Page->NoSign->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->NoSign->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->_Barcode->Visible) { // Barcode ?>
    <div id="r__Barcode" class="form-group row">
        <label for="x__Barcode" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result__Barcode"><?= $Page->_Barcode->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z__Barcode" id="z__Barcode" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->_Barcode->cellAttributes() ?>>
            <span id="el_lab_test_result__Barcode" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->_Barcode->getInputTextType() ?>" data-table="lab_test_result" data-field="x__Barcode" name="x__Barcode" id="x__Barcode" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->_Barcode->getPlaceHolder()) ?>" value="<?= $Page->_Barcode->EditValue ?>"<?= $Page->_Barcode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->_Barcode->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ReadTime->Visible) { // ReadTime ?>
    <div id="r_ReadTime" class="form-group row">
        <label for="x_ReadTime" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_ReadTime"><?= $Page->ReadTime->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_ReadTime" id="z_ReadTime" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReadTime->cellAttributes() ?>>
            <span id="el_lab_test_result_ReadTime" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ReadTime->getInputTextType() ?>" data-table="lab_test_result" data-field="x_ReadTime" name="x_ReadTime" id="x_ReadTime" placeholder="<?= HtmlEncode($Page->ReadTime->getPlaceHolder()) ?>" value="<?= $Page->ReadTime->EditValue ?>"<?= $Page->ReadTime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ReadTime->getErrorMessage(false) ?></div>
<?php if (!$Page->ReadTime->ReadOnly && !$Page->ReadTime->Disabled && !isset($Page->ReadTime->EditAttrs["readonly"]) && !isset($Page->ReadTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultsearch", "datetimepicker"], function() {
    ew.createDateTimePicker("flab_test_resultsearch", "x_ReadTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Result->Visible) { // Result ?>
    <div id="r_Result" class="form-group row">
        <label for="x_Result" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_Result"><?= $Page->Result->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Result" id="z_Result" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Result->cellAttributes() ?>>
            <span id="el_lab_test_result_Result" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Result->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Result" name="x_Result" id="x_Result" size="35" placeholder="<?= HtmlEncode($Page->Result->getPlaceHolder()) ?>" value="<?= $Page->Result->EditValue ?>"<?= $Page->Result->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Result->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->VailID->Visible) { // VailID ?>
    <div id="r_VailID" class="form-group row">
        <label for="x_VailID" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_VailID"><?= $Page->VailID->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_VailID" id="z_VailID" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->VailID->cellAttributes() ?>>
            <span id="el_lab_test_result_VailID" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->VailID->getInputTextType() ?>" data-table="lab_test_result" data-field="x_VailID" name="x_VailID" id="x_VailID" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->VailID->getPlaceHolder()) ?>" value="<?= $Page->VailID->EditValue ?>"<?= $Page->VailID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->VailID->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ReadMachine->Visible) { // ReadMachine ?>
    <div id="r_ReadMachine" class="form-group row">
        <label for="x_ReadMachine" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_ReadMachine"><?= $Page->ReadMachine->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ReadMachine" id="z_ReadMachine" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReadMachine->cellAttributes() ?>>
            <span id="el_lab_test_result_ReadMachine" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ReadMachine->getInputTextType() ?>" data-table="lab_test_result" data-field="x_ReadMachine" name="x_ReadMachine" id="x_ReadMachine" size="30" maxlength="20" placeholder="<?= HtmlEncode($Page->ReadMachine->getPlaceHolder()) ?>" value="<?= $Page->ReadMachine->EditValue ?>"<?= $Page->ReadMachine->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ReadMachine->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->LabCD->Visible) { // LabCD ?>
    <div id="r_LabCD" class="form-group row">
        <label for="x_LabCD" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_LabCD"><?= $Page->LabCD->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_LabCD" id="z_LabCD" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LabCD->cellAttributes() ?>>
            <span id="el_lab_test_result_LabCD" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->LabCD->getInputTextType() ?>" data-table="lab_test_result" data-field="x_LabCD" name="x_LabCD" id="x_LabCD" size="30" maxlength="6" placeholder="<?= HtmlEncode($Page->LabCD->getPlaceHolder()) ?>" value="<?= $Page->LabCD->EditValue ?>"<?= $Page->LabCD->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->LabCD->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->OutLabAmt->Visible) { // OutLabAmt ?>
    <div id="r_OutLabAmt" class="form-group row">
        <label for="x_OutLabAmt" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_OutLabAmt"><?= $Page->OutLabAmt->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_OutLabAmt" id="z_OutLabAmt" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OutLabAmt->cellAttributes() ?>>
            <span id="el_lab_test_result_OutLabAmt" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->OutLabAmt->getInputTextType() ?>" data-table="lab_test_result" data-field="x_OutLabAmt" name="x_OutLabAmt" id="x_OutLabAmt" size="30" placeholder="<?= HtmlEncode($Page->OutLabAmt->getPlaceHolder()) ?>" value="<?= $Page->OutLabAmt->EditValue ?>"<?= $Page->OutLabAmt->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->OutLabAmt->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ProductQty->Visible) { // ProductQty ?>
    <div id="r_ProductQty" class="form-group row">
        <label for="x_ProductQty" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_ProductQty"><?= $Page->ProductQty->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_ProductQty" id="z_ProductQty" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProductQty->cellAttributes() ?>>
            <span id="el_lab_test_result_ProductQty" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ProductQty->getInputTextType() ?>" data-table="lab_test_result" data-field="x_ProductQty" name="x_ProductQty" id="x_ProductQty" size="30" placeholder="<?= HtmlEncode($Page->ProductQty->getPlaceHolder()) ?>" value="<?= $Page->ProductQty->EditValue ?>"<?= $Page->ProductQty->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ProductQty->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Repeat->Visible) { // Repeat ?>
    <div id="r_Repeat" class="form-group row">
        <label for="x_Repeat" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_Repeat"><?= $Page->Repeat->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Repeat" id="z_Repeat" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Repeat->cellAttributes() ?>>
            <span id="el_lab_test_result_Repeat" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Repeat->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Repeat" name="x_Repeat" id="x_Repeat" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->Repeat->getPlaceHolder()) ?>" value="<?= $Page->Repeat->EditValue ?>"<?= $Page->Repeat->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Repeat->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->DeptNo->Visible) { // DeptNo ?>
    <div id="r_DeptNo" class="form-group row">
        <label for="x_DeptNo" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_DeptNo"><?= $Page->DeptNo->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DeptNo" id="z_DeptNo" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DeptNo->cellAttributes() ?>>
            <span id="el_lab_test_result_DeptNo" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->DeptNo->getInputTextType() ?>" data-table="lab_test_result" data-field="x_DeptNo" name="x_DeptNo" id="x_DeptNo" size="30" maxlength="5" placeholder="<?= HtmlEncode($Page->DeptNo->getPlaceHolder()) ?>" value="<?= $Page->DeptNo->EditValue ?>"<?= $Page->DeptNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DeptNo->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Desc1->Visible) { // Desc1 ?>
    <div id="r_Desc1" class="form-group row">
        <label for="x_Desc1" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_Desc1"><?= $Page->Desc1->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Desc1" id="z_Desc1" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Desc1->cellAttributes() ?>>
            <span id="el_lab_test_result_Desc1" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Desc1->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Desc1" name="x_Desc1" id="x_Desc1" size="30" maxlength="200" placeholder="<?= HtmlEncode($Page->Desc1->getPlaceHolder()) ?>" value="<?= $Page->Desc1->EditValue ?>"<?= $Page->Desc1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Desc1->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Desc2->Visible) { // Desc2 ?>
    <div id="r_Desc2" class="form-group row">
        <label for="x_Desc2" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_Desc2"><?= $Page->Desc2->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Desc2" id="z_Desc2" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Desc2->cellAttributes() ?>>
            <span id="el_lab_test_result_Desc2" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Desc2->getInputTextType() ?>" data-table="lab_test_result" data-field="x_Desc2" name="x_Desc2" id="x_Desc2" size="30" maxlength="200" placeholder="<?= HtmlEncode($Page->Desc2->getPlaceHolder()) ?>" value="<?= $Page->Desc2->EditValue ?>"<?= $Page->Desc2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Desc2->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->RptResult->Visible) { // RptResult ?>
    <div id="r_RptResult" class="form-group row">
        <label for="x_RptResult" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_test_result_RptResult"><?= $Page->RptResult->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_RptResult" id="z_RptResult" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RptResult->cellAttributes() ?>>
            <span id="el_lab_test_result_RptResult" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->RptResult->getInputTextType() ?>" data-table="lab_test_result" data-field="x_RptResult" name="x_RptResult" id="x_RptResult" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->RptResult->getPlaceHolder()) ?>" value="<?= $Page->RptResult->EditValue ?>"<?= $Page->RptResult->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RptResult->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
        <button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("Search") ?></button>
        <button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="location.reload();"><?= $Language->phrase("Reset") ?></button>
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
