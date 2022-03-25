<?php

namespace PHPMaker2021\HIMS;

// Page object
$LabTestMasterAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var flab_test_masteradd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    flab_test_masteradd = currentForm = new ew.Form("flab_test_masteradd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "lab_test_master")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.lab_test_master)
        ew.vars.tables.lab_test_master = currentTable;
    flab_test_masteradd.addFields([
        ["MainDeptCd", [fields.MainDeptCd.visible && fields.MainDeptCd.required ? ew.Validators.required(fields.MainDeptCd.caption) : null], fields.MainDeptCd.isInvalid],
        ["DeptCd", [fields.DeptCd.visible && fields.DeptCd.required ? ew.Validators.required(fields.DeptCd.caption) : null], fields.DeptCd.isInvalid],
        ["TestCd", [fields.TestCd.visible && fields.TestCd.required ? ew.Validators.required(fields.TestCd.caption) : null], fields.TestCd.isInvalid],
        ["TestSubCd", [fields.TestSubCd.visible && fields.TestSubCd.required ? ew.Validators.required(fields.TestSubCd.caption) : null], fields.TestSubCd.isInvalid],
        ["TestName", [fields.TestName.visible && fields.TestName.required ? ew.Validators.required(fields.TestName.caption) : null], fields.TestName.isInvalid],
        ["XrayPart", [fields.XrayPart.visible && fields.XrayPart.required ? ew.Validators.required(fields.XrayPart.caption) : null], fields.XrayPart.isInvalid],
        ["Method", [fields.Method.visible && fields.Method.required ? ew.Validators.required(fields.Method.caption) : null], fields.Method.isInvalid],
        ["Order", [fields.Order.visible && fields.Order.required ? ew.Validators.required(fields.Order.caption) : null, ew.Validators.float], fields.Order.isInvalid],
        ["Form", [fields.Form.visible && fields.Form.required ? ew.Validators.required(fields.Form.caption) : null], fields.Form.isInvalid],
        ["Amt", [fields.Amt.visible && fields.Amt.required ? ew.Validators.required(fields.Amt.caption) : null, ew.Validators.float], fields.Amt.isInvalid],
        ["SplAmt", [fields.SplAmt.visible && fields.SplAmt.required ? ew.Validators.required(fields.SplAmt.caption) : null, ew.Validators.float], fields.SplAmt.isInvalid],
        ["ResType", [fields.ResType.visible && fields.ResType.required ? ew.Validators.required(fields.ResType.caption) : null], fields.ResType.isInvalid],
        ["UnitCD", [fields.UnitCD.visible && fields.UnitCD.required ? ew.Validators.required(fields.UnitCD.caption) : null], fields.UnitCD.isInvalid],
        ["RefValue", [fields.RefValue.visible && fields.RefValue.required ? ew.Validators.required(fields.RefValue.caption) : null], fields.RefValue.isInvalid],
        ["Sample", [fields.Sample.visible && fields.Sample.required ? ew.Validators.required(fields.Sample.caption) : null], fields.Sample.isInvalid],
        ["NoD", [fields.NoD.visible && fields.NoD.required ? ew.Validators.required(fields.NoD.caption) : null, ew.Validators.float], fields.NoD.isInvalid],
        ["BillOrder", [fields.BillOrder.visible && fields.BillOrder.required ? ew.Validators.required(fields.BillOrder.caption) : null, ew.Validators.float], fields.BillOrder.isInvalid],
        ["Formula", [fields.Formula.visible && fields.Formula.required ? ew.Validators.required(fields.Formula.caption) : null], fields.Formula.isInvalid],
        ["Inactive", [fields.Inactive.visible && fields.Inactive.required ? ew.Validators.required(fields.Inactive.caption) : null], fields.Inactive.isInvalid],
        ["ReagentAmt", [fields.ReagentAmt.visible && fields.ReagentAmt.required ? ew.Validators.required(fields.ReagentAmt.caption) : null, ew.Validators.float], fields.ReagentAmt.isInvalid],
        ["LabAmt", [fields.LabAmt.visible && fields.LabAmt.required ? ew.Validators.required(fields.LabAmt.caption) : null, ew.Validators.float], fields.LabAmt.isInvalid],
        ["RefAmt", [fields.RefAmt.visible && fields.RefAmt.required ? ew.Validators.required(fields.RefAmt.caption) : null, ew.Validators.float], fields.RefAmt.isInvalid],
        ["CreFrom", [fields.CreFrom.visible && fields.CreFrom.required ? ew.Validators.required(fields.CreFrom.caption) : null, ew.Validators.float], fields.CreFrom.isInvalid],
        ["CreTo", [fields.CreTo.visible && fields.CreTo.required ? ew.Validators.required(fields.CreTo.caption) : null, ew.Validators.float], fields.CreTo.isInvalid],
        ["Note", [fields.Note.visible && fields.Note.required ? ew.Validators.required(fields.Note.caption) : null], fields.Note.isInvalid],
        ["Sun", [fields.Sun.visible && fields.Sun.required ? ew.Validators.required(fields.Sun.caption) : null], fields.Sun.isInvalid],
        ["Mon", [fields.Mon.visible && fields.Mon.required ? ew.Validators.required(fields.Mon.caption) : null], fields.Mon.isInvalid],
        ["Tue", [fields.Tue.visible && fields.Tue.required ? ew.Validators.required(fields.Tue.caption) : null], fields.Tue.isInvalid],
        ["Wed", [fields.Wed.visible && fields.Wed.required ? ew.Validators.required(fields.Wed.caption) : null], fields.Wed.isInvalid],
        ["Thi", [fields.Thi.visible && fields.Thi.required ? ew.Validators.required(fields.Thi.caption) : null], fields.Thi.isInvalid],
        ["Fri", [fields.Fri.visible && fields.Fri.required ? ew.Validators.required(fields.Fri.caption) : null], fields.Fri.isInvalid],
        ["Sat", [fields.Sat.visible && fields.Sat.required ? ew.Validators.required(fields.Sat.caption) : null], fields.Sat.isInvalid],
        ["Days", [fields.Days.visible && fields.Days.required ? ew.Validators.required(fields.Days.caption) : null, ew.Validators.float], fields.Days.isInvalid],
        ["Cutoff", [fields.Cutoff.visible && fields.Cutoff.required ? ew.Validators.required(fields.Cutoff.caption) : null], fields.Cutoff.isInvalid],
        ["FontBold", [fields.FontBold.visible && fields.FontBold.required ? ew.Validators.required(fields.FontBold.caption) : null], fields.FontBold.isInvalid],
        ["TestHeading", [fields.TestHeading.visible && fields.TestHeading.required ? ew.Validators.required(fields.TestHeading.caption) : null], fields.TestHeading.isInvalid],
        ["Outsource", [fields.Outsource.visible && fields.Outsource.required ? ew.Validators.required(fields.Outsource.caption) : null], fields.Outsource.isInvalid],
        ["NoResult", [fields.NoResult.visible && fields.NoResult.required ? ew.Validators.required(fields.NoResult.caption) : null], fields.NoResult.isInvalid],
        ["GraphLow", [fields.GraphLow.visible && fields.GraphLow.required ? ew.Validators.required(fields.GraphLow.caption) : null, ew.Validators.float], fields.GraphLow.isInvalid],
        ["GraphHigh", [fields.GraphHigh.visible && fields.GraphHigh.required ? ew.Validators.required(fields.GraphHigh.caption) : null, ew.Validators.float], fields.GraphHigh.isInvalid],
        ["CollSample", [fields.CollSample.visible && fields.CollSample.required ? ew.Validators.required(fields.CollSample.caption) : null], fields.CollSample.isInvalid],
        ["ProcessTime", [fields.ProcessTime.visible && fields.ProcessTime.required ? ew.Validators.required(fields.ProcessTime.caption) : null], fields.ProcessTime.isInvalid],
        ["TamilName", [fields.TamilName.visible && fields.TamilName.required ? ew.Validators.required(fields.TamilName.caption) : null], fields.TamilName.isInvalid],
        ["ShortName", [fields.ShortName.visible && fields.ShortName.required ? ew.Validators.required(fields.ShortName.caption) : null], fields.ShortName.isInvalid],
        ["Individual", [fields.Individual.visible && fields.Individual.required ? ew.Validators.required(fields.Individual.caption) : null], fields.Individual.isInvalid],
        ["PrevAmt", [fields.PrevAmt.visible && fields.PrevAmt.required ? ew.Validators.required(fields.PrevAmt.caption) : null, ew.Validators.float], fields.PrevAmt.isInvalid],
        ["PrevSplAmt", [fields.PrevSplAmt.visible && fields.PrevSplAmt.required ? ew.Validators.required(fields.PrevSplAmt.caption) : null, ew.Validators.float], fields.PrevSplAmt.isInvalid],
        ["Remarks", [fields.Remarks.visible && fields.Remarks.required ? ew.Validators.required(fields.Remarks.caption) : null], fields.Remarks.isInvalid],
        ["EditDate", [fields.EditDate.visible && fields.EditDate.required ? ew.Validators.required(fields.EditDate.caption) : null, ew.Validators.datetime(0)], fields.EditDate.isInvalid],
        ["BillName", [fields.BillName.visible && fields.BillName.required ? ew.Validators.required(fields.BillName.caption) : null], fields.BillName.isInvalid],
        ["ActualAmt", [fields.ActualAmt.visible && fields.ActualAmt.required ? ew.Validators.required(fields.ActualAmt.caption) : null, ew.Validators.float], fields.ActualAmt.isInvalid],
        ["HISCD", [fields.HISCD.visible && fields.HISCD.required ? ew.Validators.required(fields.HISCD.caption) : null], fields.HISCD.isInvalid],
        ["PriceList", [fields.PriceList.visible && fields.PriceList.required ? ew.Validators.required(fields.PriceList.caption) : null], fields.PriceList.isInvalid],
        ["IPAmt", [fields.IPAmt.visible && fields.IPAmt.required ? ew.Validators.required(fields.IPAmt.caption) : null, ew.Validators.float], fields.IPAmt.isInvalid],
        ["InsAmt", [fields.InsAmt.visible && fields.InsAmt.required ? ew.Validators.required(fields.InsAmt.caption) : null, ew.Validators.float], fields.InsAmt.isInvalid],
        ["ManualCD", [fields.ManualCD.visible && fields.ManualCD.required ? ew.Validators.required(fields.ManualCD.caption) : null], fields.ManualCD.isInvalid],
        ["Free", [fields.Free.visible && fields.Free.required ? ew.Validators.required(fields.Free.caption) : null], fields.Free.isInvalid],
        ["AutoAuth", [fields.AutoAuth.visible && fields.AutoAuth.required ? ew.Validators.required(fields.AutoAuth.caption) : null], fields.AutoAuth.isInvalid],
        ["ProductCD", [fields.ProductCD.visible && fields.ProductCD.required ? ew.Validators.required(fields.ProductCD.caption) : null], fields.ProductCD.isInvalid],
        ["Inventory", [fields.Inventory.visible && fields.Inventory.required ? ew.Validators.required(fields.Inventory.caption) : null], fields.Inventory.isInvalid],
        ["IntimateTest", [fields.IntimateTest.visible && fields.IntimateTest.required ? ew.Validators.required(fields.IntimateTest.caption) : null], fields.IntimateTest.isInvalid],
        ["Manual", [fields.Manual.visible && fields.Manual.required ? ew.Validators.required(fields.Manual.caption) : null], fields.Manual.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = flab_test_masteradd,
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
    flab_test_masteradd.validate = function () {
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
    flab_test_masteradd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    flab_test_masteradd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("flab_test_masteradd");
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
<form name="flab_test_masteradd" id="flab_test_masteradd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="lab_test_master">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->MainDeptCd->Visible) { // MainDeptCd ?>
    <div id="r_MainDeptCd" class="form-group row">
        <label id="elh_lab_test_master_MainDeptCd" for="x_MainDeptCd" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MainDeptCd->caption() ?><?= $Page->MainDeptCd->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MainDeptCd->cellAttributes() ?>>
<span id="el_lab_test_master_MainDeptCd">
<input type="<?= $Page->MainDeptCd->getInputTextType() ?>" data-table="lab_test_master" data-field="x_MainDeptCd" name="x_MainDeptCd" id="x_MainDeptCd" size="30" maxlength="3" placeholder="<?= HtmlEncode($Page->MainDeptCd->getPlaceHolder()) ?>" value="<?= $Page->MainDeptCd->EditValue ?>"<?= $Page->MainDeptCd->editAttributes() ?> aria-describedby="x_MainDeptCd_help">
<?= $Page->MainDeptCd->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MainDeptCd->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DeptCd->Visible) { // DeptCd ?>
    <div id="r_DeptCd" class="form-group row">
        <label id="elh_lab_test_master_DeptCd" for="x_DeptCd" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DeptCd->caption() ?><?= $Page->DeptCd->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DeptCd->cellAttributes() ?>>
<span id="el_lab_test_master_DeptCd">
<input type="<?= $Page->DeptCd->getInputTextType() ?>" data-table="lab_test_master" data-field="x_DeptCd" name="x_DeptCd" id="x_DeptCd" size="30" maxlength="3" placeholder="<?= HtmlEncode($Page->DeptCd->getPlaceHolder()) ?>" value="<?= $Page->DeptCd->EditValue ?>"<?= $Page->DeptCd->editAttributes() ?> aria-describedby="x_DeptCd_help">
<?= $Page->DeptCd->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DeptCd->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TestCd->Visible) { // TestCd ?>
    <div id="r_TestCd" class="form-group row">
        <label id="elh_lab_test_master_TestCd" for="x_TestCd" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TestCd->caption() ?><?= $Page->TestCd->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TestCd->cellAttributes() ?>>
<span id="el_lab_test_master_TestCd">
<input type="<?= $Page->TestCd->getInputTextType() ?>" data-table="lab_test_master" data-field="x_TestCd" name="x_TestCd" id="x_TestCd" size="30" maxlength="6" placeholder="<?= HtmlEncode($Page->TestCd->getPlaceHolder()) ?>" value="<?= $Page->TestCd->EditValue ?>"<?= $Page->TestCd->editAttributes() ?> aria-describedby="x_TestCd_help">
<?= $Page->TestCd->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TestCd->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TestSubCd->Visible) { // TestSubCd ?>
    <div id="r_TestSubCd" class="form-group row">
        <label id="elh_lab_test_master_TestSubCd" for="x_TestSubCd" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TestSubCd->caption() ?><?= $Page->TestSubCd->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TestSubCd->cellAttributes() ?>>
<span id="el_lab_test_master_TestSubCd">
<input type="<?= $Page->TestSubCd->getInputTextType() ?>" data-table="lab_test_master" data-field="x_TestSubCd" name="x_TestSubCd" id="x_TestSubCd" size="30" maxlength="3" placeholder="<?= HtmlEncode($Page->TestSubCd->getPlaceHolder()) ?>" value="<?= $Page->TestSubCd->EditValue ?>"<?= $Page->TestSubCd->editAttributes() ?> aria-describedby="x_TestSubCd_help">
<?= $Page->TestSubCd->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TestSubCd->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TestName->Visible) { // TestName ?>
    <div id="r_TestName" class="form-group row">
        <label id="elh_lab_test_master_TestName" for="x_TestName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TestName->caption() ?><?= $Page->TestName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TestName->cellAttributes() ?>>
<span id="el_lab_test_master_TestName">
<input type="<?= $Page->TestName->getInputTextType() ?>" data-table="lab_test_master" data-field="x_TestName" name="x_TestName" id="x_TestName" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->TestName->getPlaceHolder()) ?>" value="<?= $Page->TestName->EditValue ?>"<?= $Page->TestName->editAttributes() ?> aria-describedby="x_TestName_help">
<?= $Page->TestName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TestName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->XrayPart->Visible) { // XrayPart ?>
    <div id="r_XrayPart" class="form-group row">
        <label id="elh_lab_test_master_XrayPart" for="x_XrayPart" class="<?= $Page->LeftColumnClass ?>"><?= $Page->XrayPart->caption() ?><?= $Page->XrayPart->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->XrayPart->cellAttributes() ?>>
<span id="el_lab_test_master_XrayPart">
<input type="<?= $Page->XrayPart->getInputTextType() ?>" data-table="lab_test_master" data-field="x_XrayPart" name="x_XrayPart" id="x_XrayPart" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->XrayPart->getPlaceHolder()) ?>" value="<?= $Page->XrayPart->EditValue ?>"<?= $Page->XrayPart->editAttributes() ?> aria-describedby="x_XrayPart_help">
<?= $Page->XrayPart->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->XrayPart->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Method->Visible) { // Method ?>
    <div id="r_Method" class="form-group row">
        <label id="elh_lab_test_master_Method" for="x_Method" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Method->caption() ?><?= $Page->Method->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Method->cellAttributes() ?>>
<span id="el_lab_test_master_Method">
<input type="<?= $Page->Method->getInputTextType() ?>" data-table="lab_test_master" data-field="x_Method" name="x_Method" id="x_Method" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Method->getPlaceHolder()) ?>" value="<?= $Page->Method->EditValue ?>"<?= $Page->Method->editAttributes() ?> aria-describedby="x_Method_help">
<?= $Page->Method->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Method->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Order->Visible) { // Order ?>
    <div id="r_Order" class="form-group row">
        <label id="elh_lab_test_master_Order" for="x_Order" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Order->caption() ?><?= $Page->Order->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Order->cellAttributes() ?>>
<span id="el_lab_test_master_Order">
<input type="<?= $Page->Order->getInputTextType() ?>" data-table="lab_test_master" data-field="x_Order" name="x_Order" id="x_Order" size="30" placeholder="<?= HtmlEncode($Page->Order->getPlaceHolder()) ?>" value="<?= $Page->Order->EditValue ?>"<?= $Page->Order->editAttributes() ?> aria-describedby="x_Order_help">
<?= $Page->Order->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Order->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Form->Visible) { // Form ?>
    <div id="r_Form" class="form-group row">
        <label id="elh_lab_test_master_Form" for="x_Form" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Form->caption() ?><?= $Page->Form->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Form->cellAttributes() ?>>
<span id="el_lab_test_master_Form">
<input type="<?= $Page->Form->getInputTextType() ?>" data-table="lab_test_master" data-field="x_Form" name="x_Form" id="x_Form" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->Form->getPlaceHolder()) ?>" value="<?= $Page->Form->EditValue ?>"<?= $Page->Form->editAttributes() ?> aria-describedby="x_Form_help">
<?= $Page->Form->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Form->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Amt->Visible) { // Amt ?>
    <div id="r_Amt" class="form-group row">
        <label id="elh_lab_test_master_Amt" for="x_Amt" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Amt->caption() ?><?= $Page->Amt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Amt->cellAttributes() ?>>
<span id="el_lab_test_master_Amt">
<input type="<?= $Page->Amt->getInputTextType() ?>" data-table="lab_test_master" data-field="x_Amt" name="x_Amt" id="x_Amt" size="30" placeholder="<?= HtmlEncode($Page->Amt->getPlaceHolder()) ?>" value="<?= $Page->Amt->EditValue ?>"<?= $Page->Amt->editAttributes() ?> aria-describedby="x_Amt_help">
<?= $Page->Amt->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Amt->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SplAmt->Visible) { // SplAmt ?>
    <div id="r_SplAmt" class="form-group row">
        <label id="elh_lab_test_master_SplAmt" for="x_SplAmt" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SplAmt->caption() ?><?= $Page->SplAmt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SplAmt->cellAttributes() ?>>
<span id="el_lab_test_master_SplAmt">
<input type="<?= $Page->SplAmt->getInputTextType() ?>" data-table="lab_test_master" data-field="x_SplAmt" name="x_SplAmt" id="x_SplAmt" size="30" placeholder="<?= HtmlEncode($Page->SplAmt->getPlaceHolder()) ?>" value="<?= $Page->SplAmt->EditValue ?>"<?= $Page->SplAmt->editAttributes() ?> aria-describedby="x_SplAmt_help">
<?= $Page->SplAmt->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SplAmt->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ResType->Visible) { // ResType ?>
    <div id="r_ResType" class="form-group row">
        <label id="elh_lab_test_master_ResType" for="x_ResType" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ResType->caption() ?><?= $Page->ResType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ResType->cellAttributes() ?>>
<span id="el_lab_test_master_ResType">
<input type="<?= $Page->ResType->getInputTextType() ?>" data-table="lab_test_master" data-field="x_ResType" name="x_ResType" id="x_ResType" size="30" maxlength="2" placeholder="<?= HtmlEncode($Page->ResType->getPlaceHolder()) ?>" value="<?= $Page->ResType->EditValue ?>"<?= $Page->ResType->editAttributes() ?> aria-describedby="x_ResType_help">
<?= $Page->ResType->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ResType->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->UnitCD->Visible) { // UnitCD ?>
    <div id="r_UnitCD" class="form-group row">
        <label id="elh_lab_test_master_UnitCD" for="x_UnitCD" class="<?= $Page->LeftColumnClass ?>"><?= $Page->UnitCD->caption() ?><?= $Page->UnitCD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->UnitCD->cellAttributes() ?>>
<span id="el_lab_test_master_UnitCD">
<input type="<?= $Page->UnitCD->getInputTextType() ?>" data-table="lab_test_master" data-field="x_UnitCD" name="x_UnitCD" id="x_UnitCD" size="30" maxlength="3" placeholder="<?= HtmlEncode($Page->UnitCD->getPlaceHolder()) ?>" value="<?= $Page->UnitCD->EditValue ?>"<?= $Page->UnitCD->editAttributes() ?> aria-describedby="x_UnitCD_help">
<?= $Page->UnitCD->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->UnitCD->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RefValue->Visible) { // RefValue ?>
    <div id="r_RefValue" class="form-group row">
        <label id="elh_lab_test_master_RefValue" for="x_RefValue" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RefValue->caption() ?><?= $Page->RefValue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RefValue->cellAttributes() ?>>
<span id="el_lab_test_master_RefValue">
<textarea data-table="lab_test_master" data-field="x_RefValue" name="x_RefValue" id="x_RefValue" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->RefValue->getPlaceHolder()) ?>"<?= $Page->RefValue->editAttributes() ?> aria-describedby="x_RefValue_help"><?= $Page->RefValue->EditValue ?></textarea>
<?= $Page->RefValue->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RefValue->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Sample->Visible) { // Sample ?>
    <div id="r_Sample" class="form-group row">
        <label id="elh_lab_test_master_Sample" for="x_Sample" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Sample->caption() ?><?= $Page->Sample->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Sample->cellAttributes() ?>>
<span id="el_lab_test_master_Sample">
<input type="<?= $Page->Sample->getInputTextType() ?>" data-table="lab_test_master" data-field="x_Sample" name="x_Sample" id="x_Sample" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Sample->getPlaceHolder()) ?>" value="<?= $Page->Sample->EditValue ?>"<?= $Page->Sample->editAttributes() ?> aria-describedby="x_Sample_help">
<?= $Page->Sample->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Sample->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NoD->Visible) { // NoD ?>
    <div id="r_NoD" class="form-group row">
        <label id="elh_lab_test_master_NoD" for="x_NoD" class="<?= $Page->LeftColumnClass ?>"><?= $Page->NoD->caption() ?><?= $Page->NoD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NoD->cellAttributes() ?>>
<span id="el_lab_test_master_NoD">
<input type="<?= $Page->NoD->getInputTextType() ?>" data-table="lab_test_master" data-field="x_NoD" name="x_NoD" id="x_NoD" size="30" placeholder="<?= HtmlEncode($Page->NoD->getPlaceHolder()) ?>" value="<?= $Page->NoD->EditValue ?>"<?= $Page->NoD->editAttributes() ?> aria-describedby="x_NoD_help">
<?= $Page->NoD->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NoD->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BillOrder->Visible) { // BillOrder ?>
    <div id="r_BillOrder" class="form-group row">
        <label id="elh_lab_test_master_BillOrder" for="x_BillOrder" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BillOrder->caption() ?><?= $Page->BillOrder->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillOrder->cellAttributes() ?>>
<span id="el_lab_test_master_BillOrder">
<input type="<?= $Page->BillOrder->getInputTextType() ?>" data-table="lab_test_master" data-field="x_BillOrder" name="x_BillOrder" id="x_BillOrder" size="30" placeholder="<?= HtmlEncode($Page->BillOrder->getPlaceHolder()) ?>" value="<?= $Page->BillOrder->EditValue ?>"<?= $Page->BillOrder->editAttributes() ?> aria-describedby="x_BillOrder_help">
<?= $Page->BillOrder->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BillOrder->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Formula->Visible) { // Formula ?>
    <div id="r_Formula" class="form-group row">
        <label id="elh_lab_test_master_Formula" for="x_Formula" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Formula->caption() ?><?= $Page->Formula->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Formula->cellAttributes() ?>>
<span id="el_lab_test_master_Formula">
<textarea data-table="lab_test_master" data-field="x_Formula" name="x_Formula" id="x_Formula" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Formula->getPlaceHolder()) ?>"<?= $Page->Formula->editAttributes() ?> aria-describedby="x_Formula_help"><?= $Page->Formula->EditValue ?></textarea>
<?= $Page->Formula->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Formula->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Inactive->Visible) { // Inactive ?>
    <div id="r_Inactive" class="form-group row">
        <label id="elh_lab_test_master_Inactive" for="x_Inactive" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Inactive->caption() ?><?= $Page->Inactive->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Inactive->cellAttributes() ?>>
<span id="el_lab_test_master_Inactive">
<input type="<?= $Page->Inactive->getInputTextType() ?>" data-table="lab_test_master" data-field="x_Inactive" name="x_Inactive" id="x_Inactive" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->Inactive->getPlaceHolder()) ?>" value="<?= $Page->Inactive->EditValue ?>"<?= $Page->Inactive->editAttributes() ?> aria-describedby="x_Inactive_help">
<?= $Page->Inactive->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Inactive->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReagentAmt->Visible) { // ReagentAmt ?>
    <div id="r_ReagentAmt" class="form-group row">
        <label id="elh_lab_test_master_ReagentAmt" for="x_ReagentAmt" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ReagentAmt->caption() ?><?= $Page->ReagentAmt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReagentAmt->cellAttributes() ?>>
<span id="el_lab_test_master_ReagentAmt">
<input type="<?= $Page->ReagentAmt->getInputTextType() ?>" data-table="lab_test_master" data-field="x_ReagentAmt" name="x_ReagentAmt" id="x_ReagentAmt" size="30" placeholder="<?= HtmlEncode($Page->ReagentAmt->getPlaceHolder()) ?>" value="<?= $Page->ReagentAmt->EditValue ?>"<?= $Page->ReagentAmt->editAttributes() ?> aria-describedby="x_ReagentAmt_help">
<?= $Page->ReagentAmt->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ReagentAmt->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->LabAmt->Visible) { // LabAmt ?>
    <div id="r_LabAmt" class="form-group row">
        <label id="elh_lab_test_master_LabAmt" for="x_LabAmt" class="<?= $Page->LeftColumnClass ?>"><?= $Page->LabAmt->caption() ?><?= $Page->LabAmt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LabAmt->cellAttributes() ?>>
<span id="el_lab_test_master_LabAmt">
<input type="<?= $Page->LabAmt->getInputTextType() ?>" data-table="lab_test_master" data-field="x_LabAmt" name="x_LabAmt" id="x_LabAmt" size="30" placeholder="<?= HtmlEncode($Page->LabAmt->getPlaceHolder()) ?>" value="<?= $Page->LabAmt->EditValue ?>"<?= $Page->LabAmt->editAttributes() ?> aria-describedby="x_LabAmt_help">
<?= $Page->LabAmt->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->LabAmt->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RefAmt->Visible) { // RefAmt ?>
    <div id="r_RefAmt" class="form-group row">
        <label id="elh_lab_test_master_RefAmt" for="x_RefAmt" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RefAmt->caption() ?><?= $Page->RefAmt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RefAmt->cellAttributes() ?>>
<span id="el_lab_test_master_RefAmt">
<input type="<?= $Page->RefAmt->getInputTextType() ?>" data-table="lab_test_master" data-field="x_RefAmt" name="x_RefAmt" id="x_RefAmt" size="30" placeholder="<?= HtmlEncode($Page->RefAmt->getPlaceHolder()) ?>" value="<?= $Page->RefAmt->EditValue ?>"<?= $Page->RefAmt->editAttributes() ?> aria-describedby="x_RefAmt_help">
<?= $Page->RefAmt->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RefAmt->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CreFrom->Visible) { // CreFrom ?>
    <div id="r_CreFrom" class="form-group row">
        <label id="elh_lab_test_master_CreFrom" for="x_CreFrom" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CreFrom->caption() ?><?= $Page->CreFrom->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CreFrom->cellAttributes() ?>>
<span id="el_lab_test_master_CreFrom">
<input type="<?= $Page->CreFrom->getInputTextType() ?>" data-table="lab_test_master" data-field="x_CreFrom" name="x_CreFrom" id="x_CreFrom" size="30" placeholder="<?= HtmlEncode($Page->CreFrom->getPlaceHolder()) ?>" value="<?= $Page->CreFrom->EditValue ?>"<?= $Page->CreFrom->editAttributes() ?> aria-describedby="x_CreFrom_help">
<?= $Page->CreFrom->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CreFrom->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CreTo->Visible) { // CreTo ?>
    <div id="r_CreTo" class="form-group row">
        <label id="elh_lab_test_master_CreTo" for="x_CreTo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CreTo->caption() ?><?= $Page->CreTo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CreTo->cellAttributes() ?>>
<span id="el_lab_test_master_CreTo">
<input type="<?= $Page->CreTo->getInputTextType() ?>" data-table="lab_test_master" data-field="x_CreTo" name="x_CreTo" id="x_CreTo" size="30" placeholder="<?= HtmlEncode($Page->CreTo->getPlaceHolder()) ?>" value="<?= $Page->CreTo->EditValue ?>"<?= $Page->CreTo->editAttributes() ?> aria-describedby="x_CreTo_help">
<?= $Page->CreTo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CreTo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Note->Visible) { // Note ?>
    <div id="r_Note" class="form-group row">
        <label id="elh_lab_test_master_Note" for="x_Note" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Note->caption() ?><?= $Page->Note->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Note->cellAttributes() ?>>
<span id="el_lab_test_master_Note">
<textarea data-table="lab_test_master" data-field="x_Note" name="x_Note" id="x_Note" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Note->getPlaceHolder()) ?>"<?= $Page->Note->editAttributes() ?> aria-describedby="x_Note_help"><?= $Page->Note->EditValue ?></textarea>
<?= $Page->Note->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Note->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Sun->Visible) { // Sun ?>
    <div id="r_Sun" class="form-group row">
        <label id="elh_lab_test_master_Sun" for="x_Sun" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Sun->caption() ?><?= $Page->Sun->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Sun->cellAttributes() ?>>
<span id="el_lab_test_master_Sun">
<input type="<?= $Page->Sun->getInputTextType() ?>" data-table="lab_test_master" data-field="x_Sun" name="x_Sun" id="x_Sun" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->Sun->getPlaceHolder()) ?>" value="<?= $Page->Sun->EditValue ?>"<?= $Page->Sun->editAttributes() ?> aria-describedby="x_Sun_help">
<?= $Page->Sun->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Sun->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Mon->Visible) { // Mon ?>
    <div id="r_Mon" class="form-group row">
        <label id="elh_lab_test_master_Mon" for="x_Mon" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Mon->caption() ?><?= $Page->Mon->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Mon->cellAttributes() ?>>
<span id="el_lab_test_master_Mon">
<input type="<?= $Page->Mon->getInputTextType() ?>" data-table="lab_test_master" data-field="x_Mon" name="x_Mon" id="x_Mon" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->Mon->getPlaceHolder()) ?>" value="<?= $Page->Mon->EditValue ?>"<?= $Page->Mon->editAttributes() ?> aria-describedby="x_Mon_help">
<?= $Page->Mon->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Mon->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tue->Visible) { // Tue ?>
    <div id="r_Tue" class="form-group row">
        <label id="elh_lab_test_master_Tue" for="x_Tue" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Tue->caption() ?><?= $Page->Tue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tue->cellAttributes() ?>>
<span id="el_lab_test_master_Tue">
<input type="<?= $Page->Tue->getInputTextType() ?>" data-table="lab_test_master" data-field="x_Tue" name="x_Tue" id="x_Tue" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->Tue->getPlaceHolder()) ?>" value="<?= $Page->Tue->EditValue ?>"<?= $Page->Tue->editAttributes() ?> aria-describedby="x_Tue_help">
<?= $Page->Tue->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Tue->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Wed->Visible) { // Wed ?>
    <div id="r_Wed" class="form-group row">
        <label id="elh_lab_test_master_Wed" for="x_Wed" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Wed->caption() ?><?= $Page->Wed->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Wed->cellAttributes() ?>>
<span id="el_lab_test_master_Wed">
<input type="<?= $Page->Wed->getInputTextType() ?>" data-table="lab_test_master" data-field="x_Wed" name="x_Wed" id="x_Wed" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->Wed->getPlaceHolder()) ?>" value="<?= $Page->Wed->EditValue ?>"<?= $Page->Wed->editAttributes() ?> aria-describedby="x_Wed_help">
<?= $Page->Wed->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Wed->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Thi->Visible) { // Thi ?>
    <div id="r_Thi" class="form-group row">
        <label id="elh_lab_test_master_Thi" for="x_Thi" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Thi->caption() ?><?= $Page->Thi->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Thi->cellAttributes() ?>>
<span id="el_lab_test_master_Thi">
<input type="<?= $Page->Thi->getInputTextType() ?>" data-table="lab_test_master" data-field="x_Thi" name="x_Thi" id="x_Thi" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->Thi->getPlaceHolder()) ?>" value="<?= $Page->Thi->EditValue ?>"<?= $Page->Thi->editAttributes() ?> aria-describedby="x_Thi_help">
<?= $Page->Thi->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Thi->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Fri->Visible) { // Fri ?>
    <div id="r_Fri" class="form-group row">
        <label id="elh_lab_test_master_Fri" for="x_Fri" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Fri->caption() ?><?= $Page->Fri->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Fri->cellAttributes() ?>>
<span id="el_lab_test_master_Fri">
<input type="<?= $Page->Fri->getInputTextType() ?>" data-table="lab_test_master" data-field="x_Fri" name="x_Fri" id="x_Fri" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->Fri->getPlaceHolder()) ?>" value="<?= $Page->Fri->EditValue ?>"<?= $Page->Fri->editAttributes() ?> aria-describedby="x_Fri_help">
<?= $Page->Fri->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Fri->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Sat->Visible) { // Sat ?>
    <div id="r_Sat" class="form-group row">
        <label id="elh_lab_test_master_Sat" for="x_Sat" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Sat->caption() ?><?= $Page->Sat->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Sat->cellAttributes() ?>>
<span id="el_lab_test_master_Sat">
<input type="<?= $Page->Sat->getInputTextType() ?>" data-table="lab_test_master" data-field="x_Sat" name="x_Sat" id="x_Sat" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->Sat->getPlaceHolder()) ?>" value="<?= $Page->Sat->EditValue ?>"<?= $Page->Sat->editAttributes() ?> aria-describedby="x_Sat_help">
<?= $Page->Sat->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Sat->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Days->Visible) { // Days ?>
    <div id="r_Days" class="form-group row">
        <label id="elh_lab_test_master_Days" for="x_Days" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Days->caption() ?><?= $Page->Days->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Days->cellAttributes() ?>>
<span id="el_lab_test_master_Days">
<input type="<?= $Page->Days->getInputTextType() ?>" data-table="lab_test_master" data-field="x_Days" name="x_Days" id="x_Days" size="30" placeholder="<?= HtmlEncode($Page->Days->getPlaceHolder()) ?>" value="<?= $Page->Days->EditValue ?>"<?= $Page->Days->editAttributes() ?> aria-describedby="x_Days_help">
<?= $Page->Days->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Days->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Cutoff->Visible) { // Cutoff ?>
    <div id="r_Cutoff" class="form-group row">
        <label id="elh_lab_test_master_Cutoff" for="x_Cutoff" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Cutoff->caption() ?><?= $Page->Cutoff->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Cutoff->cellAttributes() ?>>
<span id="el_lab_test_master_Cutoff">
<input type="<?= $Page->Cutoff->getInputTextType() ?>" data-table="lab_test_master" data-field="x_Cutoff" name="x_Cutoff" id="x_Cutoff" size="30" maxlength="5" placeholder="<?= HtmlEncode($Page->Cutoff->getPlaceHolder()) ?>" value="<?= $Page->Cutoff->EditValue ?>"<?= $Page->Cutoff->editAttributes() ?> aria-describedby="x_Cutoff_help">
<?= $Page->Cutoff->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Cutoff->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FontBold->Visible) { // FontBold ?>
    <div id="r_FontBold" class="form-group row">
        <label id="elh_lab_test_master_FontBold" for="x_FontBold" class="<?= $Page->LeftColumnClass ?>"><?= $Page->FontBold->caption() ?><?= $Page->FontBold->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FontBold->cellAttributes() ?>>
<span id="el_lab_test_master_FontBold">
<input type="<?= $Page->FontBold->getInputTextType() ?>" data-table="lab_test_master" data-field="x_FontBold" name="x_FontBold" id="x_FontBold" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->FontBold->getPlaceHolder()) ?>" value="<?= $Page->FontBold->EditValue ?>"<?= $Page->FontBold->editAttributes() ?> aria-describedby="x_FontBold_help">
<?= $Page->FontBold->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FontBold->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TestHeading->Visible) { // TestHeading ?>
    <div id="r_TestHeading" class="form-group row">
        <label id="elh_lab_test_master_TestHeading" for="x_TestHeading" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TestHeading->caption() ?><?= $Page->TestHeading->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TestHeading->cellAttributes() ?>>
<span id="el_lab_test_master_TestHeading">
<input type="<?= $Page->TestHeading->getInputTextType() ?>" data-table="lab_test_master" data-field="x_TestHeading" name="x_TestHeading" id="x_TestHeading" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->TestHeading->getPlaceHolder()) ?>" value="<?= $Page->TestHeading->EditValue ?>"<?= $Page->TestHeading->editAttributes() ?> aria-describedby="x_TestHeading_help">
<?= $Page->TestHeading->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TestHeading->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Outsource->Visible) { // Outsource ?>
    <div id="r_Outsource" class="form-group row">
        <label id="elh_lab_test_master_Outsource" for="x_Outsource" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Outsource->caption() ?><?= $Page->Outsource->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Outsource->cellAttributes() ?>>
<span id="el_lab_test_master_Outsource">
<input type="<?= $Page->Outsource->getInputTextType() ?>" data-table="lab_test_master" data-field="x_Outsource" name="x_Outsource" id="x_Outsource" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->Outsource->getPlaceHolder()) ?>" value="<?= $Page->Outsource->EditValue ?>"<?= $Page->Outsource->editAttributes() ?> aria-describedby="x_Outsource_help">
<?= $Page->Outsource->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Outsource->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NoResult->Visible) { // NoResult ?>
    <div id="r_NoResult" class="form-group row">
        <label id="elh_lab_test_master_NoResult" for="x_NoResult" class="<?= $Page->LeftColumnClass ?>"><?= $Page->NoResult->caption() ?><?= $Page->NoResult->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NoResult->cellAttributes() ?>>
<span id="el_lab_test_master_NoResult">
<input type="<?= $Page->NoResult->getInputTextType() ?>" data-table="lab_test_master" data-field="x_NoResult" name="x_NoResult" id="x_NoResult" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->NoResult->getPlaceHolder()) ?>" value="<?= $Page->NoResult->EditValue ?>"<?= $Page->NoResult->editAttributes() ?> aria-describedby="x_NoResult_help">
<?= $Page->NoResult->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NoResult->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GraphLow->Visible) { // GraphLow ?>
    <div id="r_GraphLow" class="form-group row">
        <label id="elh_lab_test_master_GraphLow" for="x_GraphLow" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GraphLow->caption() ?><?= $Page->GraphLow->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GraphLow->cellAttributes() ?>>
<span id="el_lab_test_master_GraphLow">
<input type="<?= $Page->GraphLow->getInputTextType() ?>" data-table="lab_test_master" data-field="x_GraphLow" name="x_GraphLow" id="x_GraphLow" size="30" placeholder="<?= HtmlEncode($Page->GraphLow->getPlaceHolder()) ?>" value="<?= $Page->GraphLow->EditValue ?>"<?= $Page->GraphLow->editAttributes() ?> aria-describedby="x_GraphLow_help">
<?= $Page->GraphLow->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GraphLow->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GraphHigh->Visible) { // GraphHigh ?>
    <div id="r_GraphHigh" class="form-group row">
        <label id="elh_lab_test_master_GraphHigh" for="x_GraphHigh" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GraphHigh->caption() ?><?= $Page->GraphHigh->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GraphHigh->cellAttributes() ?>>
<span id="el_lab_test_master_GraphHigh">
<input type="<?= $Page->GraphHigh->getInputTextType() ?>" data-table="lab_test_master" data-field="x_GraphHigh" name="x_GraphHigh" id="x_GraphHigh" size="30" placeholder="<?= HtmlEncode($Page->GraphHigh->getPlaceHolder()) ?>" value="<?= $Page->GraphHigh->EditValue ?>"<?= $Page->GraphHigh->editAttributes() ?> aria-describedby="x_GraphHigh_help">
<?= $Page->GraphHigh->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GraphHigh->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CollSample->Visible) { // CollSample ?>
    <div id="r_CollSample" class="form-group row">
        <label id="elh_lab_test_master_CollSample" for="x_CollSample" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CollSample->caption() ?><?= $Page->CollSample->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CollSample->cellAttributes() ?>>
<span id="el_lab_test_master_CollSample">
<input type="<?= $Page->CollSample->getInputTextType() ?>" data-table="lab_test_master" data-field="x_CollSample" name="x_CollSample" id="x_CollSample" size="30" maxlength="4" placeholder="<?= HtmlEncode($Page->CollSample->getPlaceHolder()) ?>" value="<?= $Page->CollSample->EditValue ?>"<?= $Page->CollSample->editAttributes() ?> aria-describedby="x_CollSample_help">
<?= $Page->CollSample->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CollSample->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ProcessTime->Visible) { // ProcessTime ?>
    <div id="r_ProcessTime" class="form-group row">
        <label id="elh_lab_test_master_ProcessTime" for="x_ProcessTime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ProcessTime->caption() ?><?= $Page->ProcessTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProcessTime->cellAttributes() ?>>
<span id="el_lab_test_master_ProcessTime">
<input type="<?= $Page->ProcessTime->getInputTextType() ?>" data-table="lab_test_master" data-field="x_ProcessTime" name="x_ProcessTime" id="x_ProcessTime" size="30" maxlength="5" placeholder="<?= HtmlEncode($Page->ProcessTime->getPlaceHolder()) ?>" value="<?= $Page->ProcessTime->EditValue ?>"<?= $Page->ProcessTime->editAttributes() ?> aria-describedby="x_ProcessTime_help">
<?= $Page->ProcessTime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ProcessTime->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TamilName->Visible) { // TamilName ?>
    <div id="r_TamilName" class="form-group row">
        <label id="elh_lab_test_master_TamilName" for="x_TamilName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TamilName->caption() ?><?= $Page->TamilName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TamilName->cellAttributes() ?>>
<span id="el_lab_test_master_TamilName">
<input type="<?= $Page->TamilName->getInputTextType() ?>" data-table="lab_test_master" data-field="x_TamilName" name="x_TamilName" id="x_TamilName" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->TamilName->getPlaceHolder()) ?>" value="<?= $Page->TamilName->EditValue ?>"<?= $Page->TamilName->editAttributes() ?> aria-describedby="x_TamilName_help">
<?= $Page->TamilName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TamilName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ShortName->Visible) { // ShortName ?>
    <div id="r_ShortName" class="form-group row">
        <label id="elh_lab_test_master_ShortName" for="x_ShortName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ShortName->caption() ?><?= $Page->ShortName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ShortName->cellAttributes() ?>>
<span id="el_lab_test_master_ShortName">
<input type="<?= $Page->ShortName->getInputTextType() ?>" data-table="lab_test_master" data-field="x_ShortName" name="x_ShortName" id="x_ShortName" size="30" maxlength="7" placeholder="<?= HtmlEncode($Page->ShortName->getPlaceHolder()) ?>" value="<?= $Page->ShortName->EditValue ?>"<?= $Page->ShortName->editAttributes() ?> aria-describedby="x_ShortName_help">
<?= $Page->ShortName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ShortName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Individual->Visible) { // Individual ?>
    <div id="r_Individual" class="form-group row">
        <label id="elh_lab_test_master_Individual" for="x_Individual" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Individual->caption() ?><?= $Page->Individual->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Individual->cellAttributes() ?>>
<span id="el_lab_test_master_Individual">
<input type="<?= $Page->Individual->getInputTextType() ?>" data-table="lab_test_master" data-field="x_Individual" name="x_Individual" id="x_Individual" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->Individual->getPlaceHolder()) ?>" value="<?= $Page->Individual->EditValue ?>"<?= $Page->Individual->editAttributes() ?> aria-describedby="x_Individual_help">
<?= $Page->Individual->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Individual->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PrevAmt->Visible) { // PrevAmt ?>
    <div id="r_PrevAmt" class="form-group row">
        <label id="elh_lab_test_master_PrevAmt" for="x_PrevAmt" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PrevAmt->caption() ?><?= $Page->PrevAmt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PrevAmt->cellAttributes() ?>>
<span id="el_lab_test_master_PrevAmt">
<input type="<?= $Page->PrevAmt->getInputTextType() ?>" data-table="lab_test_master" data-field="x_PrevAmt" name="x_PrevAmt" id="x_PrevAmt" size="30" placeholder="<?= HtmlEncode($Page->PrevAmt->getPlaceHolder()) ?>" value="<?= $Page->PrevAmt->EditValue ?>"<?= $Page->PrevAmt->editAttributes() ?> aria-describedby="x_PrevAmt_help">
<?= $Page->PrevAmt->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PrevAmt->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PrevSplAmt->Visible) { // PrevSplAmt ?>
    <div id="r_PrevSplAmt" class="form-group row">
        <label id="elh_lab_test_master_PrevSplAmt" for="x_PrevSplAmt" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PrevSplAmt->caption() ?><?= $Page->PrevSplAmt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PrevSplAmt->cellAttributes() ?>>
<span id="el_lab_test_master_PrevSplAmt">
<input type="<?= $Page->PrevSplAmt->getInputTextType() ?>" data-table="lab_test_master" data-field="x_PrevSplAmt" name="x_PrevSplAmt" id="x_PrevSplAmt" size="30" placeholder="<?= HtmlEncode($Page->PrevSplAmt->getPlaceHolder()) ?>" value="<?= $Page->PrevSplAmt->EditValue ?>"<?= $Page->PrevSplAmt->editAttributes() ?> aria-describedby="x_PrevSplAmt_help">
<?= $Page->PrevSplAmt->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PrevSplAmt->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
    <div id="r_Remarks" class="form-group row">
        <label id="elh_lab_test_master_Remarks" for="x_Remarks" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Remarks->caption() ?><?= $Page->Remarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Remarks->cellAttributes() ?>>
<span id="el_lab_test_master_Remarks">
<textarea data-table="lab_test_master" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Remarks->getPlaceHolder()) ?>"<?= $Page->Remarks->editAttributes() ?> aria-describedby="x_Remarks_help"><?= $Page->Remarks->EditValue ?></textarea>
<?= $Page->Remarks->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Remarks->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EditDate->Visible) { // EditDate ?>
    <div id="r_EditDate" class="form-group row">
        <label id="elh_lab_test_master_EditDate" for="x_EditDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EditDate->caption() ?><?= $Page->EditDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EditDate->cellAttributes() ?>>
<span id="el_lab_test_master_EditDate">
<input type="<?= $Page->EditDate->getInputTextType() ?>" data-table="lab_test_master" data-field="x_EditDate" name="x_EditDate" id="x_EditDate" placeholder="<?= HtmlEncode($Page->EditDate->getPlaceHolder()) ?>" value="<?= $Page->EditDate->EditValue ?>"<?= $Page->EditDate->editAttributes() ?> aria-describedby="x_EditDate_help">
<?= $Page->EditDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EditDate->getErrorMessage() ?></div>
<?php if (!$Page->EditDate->ReadOnly && !$Page->EditDate->Disabled && !isset($Page->EditDate->EditAttrs["readonly"]) && !isset($Page->EditDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_masteradd", "datetimepicker"], function() {
    ew.createDateTimePicker("flab_test_masteradd", "x_EditDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BillName->Visible) { // BillName ?>
    <div id="r_BillName" class="form-group row">
        <label id="elh_lab_test_master_BillName" for="x_BillName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BillName->caption() ?><?= $Page->BillName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillName->cellAttributes() ?>>
<span id="el_lab_test_master_BillName">
<input type="<?= $Page->BillName->getInputTextType() ?>" data-table="lab_test_master" data-field="x_BillName" name="x_BillName" id="x_BillName" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->BillName->getPlaceHolder()) ?>" value="<?= $Page->BillName->EditValue ?>"<?= $Page->BillName->editAttributes() ?> aria-describedby="x_BillName_help">
<?= $Page->BillName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BillName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ActualAmt->Visible) { // ActualAmt ?>
    <div id="r_ActualAmt" class="form-group row">
        <label id="elh_lab_test_master_ActualAmt" for="x_ActualAmt" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ActualAmt->caption() ?><?= $Page->ActualAmt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ActualAmt->cellAttributes() ?>>
<span id="el_lab_test_master_ActualAmt">
<input type="<?= $Page->ActualAmt->getInputTextType() ?>" data-table="lab_test_master" data-field="x_ActualAmt" name="x_ActualAmt" id="x_ActualAmt" size="30" placeholder="<?= HtmlEncode($Page->ActualAmt->getPlaceHolder()) ?>" value="<?= $Page->ActualAmt->EditValue ?>"<?= $Page->ActualAmt->editAttributes() ?> aria-describedby="x_ActualAmt_help">
<?= $Page->ActualAmt->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ActualAmt->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HISCD->Visible) { // HISCD ?>
    <div id="r_HISCD" class="form-group row">
        <label id="elh_lab_test_master_HISCD" for="x_HISCD" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HISCD->caption() ?><?= $Page->HISCD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HISCD->cellAttributes() ?>>
<span id="el_lab_test_master_HISCD">
<input type="<?= $Page->HISCD->getInputTextType() ?>" data-table="lab_test_master" data-field="x_HISCD" name="x_HISCD" id="x_HISCD" size="30" maxlength="20" placeholder="<?= HtmlEncode($Page->HISCD->getPlaceHolder()) ?>" value="<?= $Page->HISCD->EditValue ?>"<?= $Page->HISCD->editAttributes() ?> aria-describedby="x_HISCD_help">
<?= $Page->HISCD->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HISCD->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PriceList->Visible) { // PriceList ?>
    <div id="r_PriceList" class="form-group row">
        <label id="elh_lab_test_master_PriceList" for="x_PriceList" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PriceList->caption() ?><?= $Page->PriceList->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PriceList->cellAttributes() ?>>
<span id="el_lab_test_master_PriceList">
<input type="<?= $Page->PriceList->getInputTextType() ?>" data-table="lab_test_master" data-field="x_PriceList" name="x_PriceList" id="x_PriceList" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->PriceList->getPlaceHolder()) ?>" value="<?= $Page->PriceList->EditValue ?>"<?= $Page->PriceList->editAttributes() ?> aria-describedby="x_PriceList_help">
<?= $Page->PriceList->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PriceList->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IPAmt->Visible) { // IPAmt ?>
    <div id="r_IPAmt" class="form-group row">
        <label id="elh_lab_test_master_IPAmt" for="x_IPAmt" class="<?= $Page->LeftColumnClass ?>"><?= $Page->IPAmt->caption() ?><?= $Page->IPAmt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IPAmt->cellAttributes() ?>>
<span id="el_lab_test_master_IPAmt">
<input type="<?= $Page->IPAmt->getInputTextType() ?>" data-table="lab_test_master" data-field="x_IPAmt" name="x_IPAmt" id="x_IPAmt" size="30" placeholder="<?= HtmlEncode($Page->IPAmt->getPlaceHolder()) ?>" value="<?= $Page->IPAmt->EditValue ?>"<?= $Page->IPAmt->editAttributes() ?> aria-describedby="x_IPAmt_help">
<?= $Page->IPAmt->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IPAmt->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->InsAmt->Visible) { // InsAmt ?>
    <div id="r_InsAmt" class="form-group row">
        <label id="elh_lab_test_master_InsAmt" for="x_InsAmt" class="<?= $Page->LeftColumnClass ?>"><?= $Page->InsAmt->caption() ?><?= $Page->InsAmt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->InsAmt->cellAttributes() ?>>
<span id="el_lab_test_master_InsAmt">
<input type="<?= $Page->InsAmt->getInputTextType() ?>" data-table="lab_test_master" data-field="x_InsAmt" name="x_InsAmt" id="x_InsAmt" size="30" placeholder="<?= HtmlEncode($Page->InsAmt->getPlaceHolder()) ?>" value="<?= $Page->InsAmt->EditValue ?>"<?= $Page->InsAmt->editAttributes() ?> aria-describedby="x_InsAmt_help">
<?= $Page->InsAmt->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->InsAmt->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ManualCD->Visible) { // ManualCD ?>
    <div id="r_ManualCD" class="form-group row">
        <label id="elh_lab_test_master_ManualCD" for="x_ManualCD" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ManualCD->caption() ?><?= $Page->ManualCD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ManualCD->cellAttributes() ?>>
<span id="el_lab_test_master_ManualCD">
<input type="<?= $Page->ManualCD->getInputTextType() ?>" data-table="lab_test_master" data-field="x_ManualCD" name="x_ManualCD" id="x_ManualCD" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->ManualCD->getPlaceHolder()) ?>" value="<?= $Page->ManualCD->EditValue ?>"<?= $Page->ManualCD->editAttributes() ?> aria-describedby="x_ManualCD_help">
<?= $Page->ManualCD->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ManualCD->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Free->Visible) { // Free ?>
    <div id="r_Free" class="form-group row">
        <label id="elh_lab_test_master_Free" for="x_Free" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Free->caption() ?><?= $Page->Free->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Free->cellAttributes() ?>>
<span id="el_lab_test_master_Free">
<input type="<?= $Page->Free->getInputTextType() ?>" data-table="lab_test_master" data-field="x_Free" name="x_Free" id="x_Free" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->Free->getPlaceHolder()) ?>" value="<?= $Page->Free->EditValue ?>"<?= $Page->Free->editAttributes() ?> aria-describedby="x_Free_help">
<?= $Page->Free->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Free->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AutoAuth->Visible) { // AutoAuth ?>
    <div id="r_AutoAuth" class="form-group row">
        <label id="elh_lab_test_master_AutoAuth" for="x_AutoAuth" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AutoAuth->caption() ?><?= $Page->AutoAuth->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AutoAuth->cellAttributes() ?>>
<span id="el_lab_test_master_AutoAuth">
<input type="<?= $Page->AutoAuth->getInputTextType() ?>" data-table="lab_test_master" data-field="x_AutoAuth" name="x_AutoAuth" id="x_AutoAuth" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->AutoAuth->getPlaceHolder()) ?>" value="<?= $Page->AutoAuth->EditValue ?>"<?= $Page->AutoAuth->editAttributes() ?> aria-describedby="x_AutoAuth_help">
<?= $Page->AutoAuth->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AutoAuth->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ProductCD->Visible) { // ProductCD ?>
    <div id="r_ProductCD" class="form-group row">
        <label id="elh_lab_test_master_ProductCD" for="x_ProductCD" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ProductCD->caption() ?><?= $Page->ProductCD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProductCD->cellAttributes() ?>>
<span id="el_lab_test_master_ProductCD">
<input type="<?= $Page->ProductCD->getInputTextType() ?>" data-table="lab_test_master" data-field="x_ProductCD" name="x_ProductCD" id="x_ProductCD" size="30" maxlength="6" placeholder="<?= HtmlEncode($Page->ProductCD->getPlaceHolder()) ?>" value="<?= $Page->ProductCD->EditValue ?>"<?= $Page->ProductCD->editAttributes() ?> aria-describedby="x_ProductCD_help">
<?= $Page->ProductCD->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ProductCD->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Inventory->Visible) { // Inventory ?>
    <div id="r_Inventory" class="form-group row">
        <label id="elh_lab_test_master_Inventory" for="x_Inventory" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Inventory->caption() ?><?= $Page->Inventory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Inventory->cellAttributes() ?>>
<span id="el_lab_test_master_Inventory">
<input type="<?= $Page->Inventory->getInputTextType() ?>" data-table="lab_test_master" data-field="x_Inventory" name="x_Inventory" id="x_Inventory" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->Inventory->getPlaceHolder()) ?>" value="<?= $Page->Inventory->EditValue ?>"<?= $Page->Inventory->editAttributes() ?> aria-describedby="x_Inventory_help">
<?= $Page->Inventory->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Inventory->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IntimateTest->Visible) { // IntimateTest ?>
    <div id="r_IntimateTest" class="form-group row">
        <label id="elh_lab_test_master_IntimateTest" for="x_IntimateTest" class="<?= $Page->LeftColumnClass ?>"><?= $Page->IntimateTest->caption() ?><?= $Page->IntimateTest->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IntimateTest->cellAttributes() ?>>
<span id="el_lab_test_master_IntimateTest">
<input type="<?= $Page->IntimateTest->getInputTextType() ?>" data-table="lab_test_master" data-field="x_IntimateTest" name="x_IntimateTest" id="x_IntimateTest" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->IntimateTest->getPlaceHolder()) ?>" value="<?= $Page->IntimateTest->EditValue ?>"<?= $Page->IntimateTest->editAttributes() ?> aria-describedby="x_IntimateTest_help">
<?= $Page->IntimateTest->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IntimateTest->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Manual->Visible) { // Manual ?>
    <div id="r_Manual" class="form-group row">
        <label id="elh_lab_test_master_Manual" for="x_Manual" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Manual->caption() ?><?= $Page->Manual->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Manual->cellAttributes() ?>>
<span id="el_lab_test_master_Manual">
<input type="<?= $Page->Manual->getInputTextType() ?>" data-table="lab_test_master" data-field="x_Manual" name="x_Manual" id="x_Manual" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->Manual->getPlaceHolder()) ?>" value="<?= $Page->Manual->EditValue ?>"<?= $Page->Manual->editAttributes() ?> aria-describedby="x_Manual_help">
<?= $Page->Manual->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Manual->getErrorMessage() ?></div>
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
    ew.addEventHandlers("lab_test_master");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
