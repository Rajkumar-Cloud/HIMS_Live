<?php

namespace PHPMaker2021\HIMS;

// Set up and run Grid object
$Grid = Container("PatientInsuranceGrid");
$Grid->run();
?>
<?php if (!$Grid->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpatient_insurancegrid;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    fpatient_insurancegrid = new ew.Form("fpatient_insurancegrid", "grid");
    fpatient_insurancegrid.formKeyCountName = '<?= $Grid->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "patient_insurance")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.patient_insurance)
        ew.vars.tables.patient_insurance = currentTable;
    fpatient_insurancegrid.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["Reception", [fields.Reception.visible && fields.Reception.required ? ew.Validators.required(fields.Reception.caption) : null], fields.Reception.isInvalid],
        ["PatientId", [fields.PatientId.visible && fields.PatientId.required ? ew.Validators.required(fields.PatientId.caption) : null], fields.PatientId.isInvalid],
        ["PatientName", [fields.PatientName.visible && fields.PatientName.required ? ew.Validators.required(fields.PatientName.caption) : null], fields.PatientName.isInvalid],
        ["Company", [fields.Company.visible && fields.Company.required ? ew.Validators.required(fields.Company.caption) : null], fields.Company.isInvalid],
        ["AddressInsuranceCarierName", [fields.AddressInsuranceCarierName.visible && fields.AddressInsuranceCarierName.required ? ew.Validators.required(fields.AddressInsuranceCarierName.caption) : null], fields.AddressInsuranceCarierName.isInvalid],
        ["ContactName", [fields.ContactName.visible && fields.ContactName.required ? ew.Validators.required(fields.ContactName.caption) : null], fields.ContactName.isInvalid],
        ["ContactMobile", [fields.ContactMobile.visible && fields.ContactMobile.required ? ew.Validators.required(fields.ContactMobile.caption) : null], fields.ContactMobile.isInvalid],
        ["PolicyType", [fields.PolicyType.visible && fields.PolicyType.required ? ew.Validators.required(fields.PolicyType.caption) : null], fields.PolicyType.isInvalid],
        ["PolicyName", [fields.PolicyName.visible && fields.PolicyName.required ? ew.Validators.required(fields.PolicyName.caption) : null], fields.PolicyName.isInvalid],
        ["PolicyNo", [fields.PolicyNo.visible && fields.PolicyNo.required ? ew.Validators.required(fields.PolicyNo.caption) : null], fields.PolicyNo.isInvalid],
        ["PolicyAmount", [fields.PolicyAmount.visible && fields.PolicyAmount.required ? ew.Validators.required(fields.PolicyAmount.caption) : null], fields.PolicyAmount.isInvalid],
        ["RefLetterNo", [fields.RefLetterNo.visible && fields.RefLetterNo.required ? ew.Validators.required(fields.RefLetterNo.caption) : null], fields.RefLetterNo.isInvalid],
        ["ReferenceBy", [fields.ReferenceBy.visible && fields.ReferenceBy.required ? ew.Validators.required(fields.ReferenceBy.caption) : null], fields.ReferenceBy.isInvalid],
        ["ReferenceDate", [fields.ReferenceDate.visible && fields.ReferenceDate.required ? ew.Validators.required(fields.ReferenceDate.caption) : null, ew.Validators.datetime(0)], fields.ReferenceDate.isInvalid],
        ["createdby", [fields.createdby.visible && fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.visible && fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null], fields.createddatetime.isInvalid],
        ["modifiedby", [fields.modifiedby.visible && fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.visible && fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null], fields.modifieddatetime.isInvalid],
        ["mrnno", [fields.mrnno.visible && fields.mrnno.required ? ew.Validators.required(fields.mrnno.caption) : null], fields.mrnno.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpatient_insurancegrid,
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
    fpatient_insurancegrid.validate = function () {
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
    fpatient_insurancegrid.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "Reception", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PatientId", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PatientName", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Company", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "AddressInsuranceCarierName", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ContactName", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ContactMobile", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PolicyType", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PolicyName", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PolicyNo", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PolicyAmount", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "RefLetterNo", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ReferenceBy", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ReferenceDate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "mrnno", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    fpatient_insurancegrid.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpatient_insurancegrid.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fpatient_insurancegrid");
});
</script>
<?php } ?>
<?php
$Grid->renderOtherOptions();
?>
<?php if ($Grid->TotalRecords > 0 || $Grid->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_insurance">
<?php if ($Grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $Grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fpatient_insurancegrid" class="ew-form ew-list-form form-inline">
<div id="gmp_patient_insurance" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_patient_insurancegrid" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Grid->id->headerCellClass() ?>"><div id="elh_patient_insurance_id" class="patient_insurance_id"><?= $Grid->renderSort($Grid->id) ?></div></th>
<?php } ?>
<?php if ($Grid->Reception->Visible) { // Reception ?>
        <th data-name="Reception" class="<?= $Grid->Reception->headerCellClass() ?>"><div id="elh_patient_insurance_Reception" class="patient_insurance_Reception"><?= $Grid->renderSort($Grid->Reception) ?></div></th>
<?php } ?>
<?php if ($Grid->PatientId->Visible) { // PatientId ?>
        <th data-name="PatientId" class="<?= $Grid->PatientId->headerCellClass() ?>"><div id="elh_patient_insurance_PatientId" class="patient_insurance_PatientId"><?= $Grid->renderSort($Grid->PatientId) ?></div></th>
<?php } ?>
<?php if ($Grid->PatientName->Visible) { // PatientName ?>
        <th data-name="PatientName" class="<?= $Grid->PatientName->headerCellClass() ?>"><div id="elh_patient_insurance_PatientName" class="patient_insurance_PatientName"><?= $Grid->renderSort($Grid->PatientName) ?></div></th>
<?php } ?>
<?php if ($Grid->Company->Visible) { // Company ?>
        <th data-name="Company" class="<?= $Grid->Company->headerCellClass() ?>"><div id="elh_patient_insurance_Company" class="patient_insurance_Company"><?= $Grid->renderSort($Grid->Company) ?></div></th>
<?php } ?>
<?php if ($Grid->AddressInsuranceCarierName->Visible) { // AddressInsuranceCarierName ?>
        <th data-name="AddressInsuranceCarierName" class="<?= $Grid->AddressInsuranceCarierName->headerCellClass() ?>"><div id="elh_patient_insurance_AddressInsuranceCarierName" class="patient_insurance_AddressInsuranceCarierName"><?= $Grid->renderSort($Grid->AddressInsuranceCarierName) ?></div></th>
<?php } ?>
<?php if ($Grid->ContactName->Visible) { // ContactName ?>
        <th data-name="ContactName" class="<?= $Grid->ContactName->headerCellClass() ?>"><div id="elh_patient_insurance_ContactName" class="patient_insurance_ContactName"><?= $Grid->renderSort($Grid->ContactName) ?></div></th>
<?php } ?>
<?php if ($Grid->ContactMobile->Visible) { // ContactMobile ?>
        <th data-name="ContactMobile" class="<?= $Grid->ContactMobile->headerCellClass() ?>"><div id="elh_patient_insurance_ContactMobile" class="patient_insurance_ContactMobile"><?= $Grid->renderSort($Grid->ContactMobile) ?></div></th>
<?php } ?>
<?php if ($Grid->PolicyType->Visible) { // PolicyType ?>
        <th data-name="PolicyType" class="<?= $Grid->PolicyType->headerCellClass() ?>"><div id="elh_patient_insurance_PolicyType" class="patient_insurance_PolicyType"><?= $Grid->renderSort($Grid->PolicyType) ?></div></th>
<?php } ?>
<?php if ($Grid->PolicyName->Visible) { // PolicyName ?>
        <th data-name="PolicyName" class="<?= $Grid->PolicyName->headerCellClass() ?>"><div id="elh_patient_insurance_PolicyName" class="patient_insurance_PolicyName"><?= $Grid->renderSort($Grid->PolicyName) ?></div></th>
<?php } ?>
<?php if ($Grid->PolicyNo->Visible) { // PolicyNo ?>
        <th data-name="PolicyNo" class="<?= $Grid->PolicyNo->headerCellClass() ?>"><div id="elh_patient_insurance_PolicyNo" class="patient_insurance_PolicyNo"><?= $Grid->renderSort($Grid->PolicyNo) ?></div></th>
<?php } ?>
<?php if ($Grid->PolicyAmount->Visible) { // PolicyAmount ?>
        <th data-name="PolicyAmount" class="<?= $Grid->PolicyAmount->headerCellClass() ?>"><div id="elh_patient_insurance_PolicyAmount" class="patient_insurance_PolicyAmount"><?= $Grid->renderSort($Grid->PolicyAmount) ?></div></th>
<?php } ?>
<?php if ($Grid->RefLetterNo->Visible) { // RefLetterNo ?>
        <th data-name="RefLetterNo" class="<?= $Grid->RefLetterNo->headerCellClass() ?>"><div id="elh_patient_insurance_RefLetterNo" class="patient_insurance_RefLetterNo"><?= $Grid->renderSort($Grid->RefLetterNo) ?></div></th>
<?php } ?>
<?php if ($Grid->ReferenceBy->Visible) { // ReferenceBy ?>
        <th data-name="ReferenceBy" class="<?= $Grid->ReferenceBy->headerCellClass() ?>"><div id="elh_patient_insurance_ReferenceBy" class="patient_insurance_ReferenceBy"><?= $Grid->renderSort($Grid->ReferenceBy) ?></div></th>
<?php } ?>
<?php if ($Grid->ReferenceDate->Visible) { // ReferenceDate ?>
        <th data-name="ReferenceDate" class="<?= $Grid->ReferenceDate->headerCellClass() ?>"><div id="elh_patient_insurance_ReferenceDate" class="patient_insurance_ReferenceDate"><?= $Grid->renderSort($Grid->ReferenceDate) ?></div></th>
<?php } ?>
<?php if ($Grid->createdby->Visible) { // createdby ?>
        <th data-name="createdby" class="<?= $Grid->createdby->headerCellClass() ?>"><div id="elh_patient_insurance_createdby" class="patient_insurance_createdby"><?= $Grid->renderSort($Grid->createdby) ?></div></th>
<?php } ?>
<?php if ($Grid->createddatetime->Visible) { // createddatetime ?>
        <th data-name="createddatetime" class="<?= $Grid->createddatetime->headerCellClass() ?>"><div id="elh_patient_insurance_createddatetime" class="patient_insurance_createddatetime"><?= $Grid->renderSort($Grid->createddatetime) ?></div></th>
<?php } ?>
<?php if ($Grid->modifiedby->Visible) { // modifiedby ?>
        <th data-name="modifiedby" class="<?= $Grid->modifiedby->headerCellClass() ?>"><div id="elh_patient_insurance_modifiedby" class="patient_insurance_modifiedby"><?= $Grid->renderSort($Grid->modifiedby) ?></div></th>
<?php } ?>
<?php if ($Grid->modifieddatetime->Visible) { // modifieddatetime ?>
        <th data-name="modifieddatetime" class="<?= $Grid->modifieddatetime->headerCellClass() ?>"><div id="elh_patient_insurance_modifieddatetime" class="patient_insurance_modifieddatetime"><?= $Grid->renderSort($Grid->modifieddatetime) ?></div></th>
<?php } ?>
<?php if ($Grid->mrnno->Visible) { // mrnno ?>
        <th data-name="mrnno" class="<?= $Grid->mrnno->headerCellClass() ?>"><div id="elh_patient_insurance_mrnno" class="patient_insurance_mrnno"><?= $Grid->renderSort($Grid->mrnno) ?></div></th>
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowCount, "id" => "r" . $Grid->RowCount . "_patient_insurance", "data-rowtype" => $Grid->RowType]);

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
<span id="el<?= $Grid->RowCount ?>_patient_insurance_id" class="form-group"></span>
<input type="hidden" data-table="patient_insurance" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_insurance_id" class="form-group">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_insurance_id">
<span<?= $Grid->id->viewAttributes() ?>>
<?= $Grid->id->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_id" data-hidden="1" name="fpatient_insurancegrid$x<?= $Grid->RowIndex ?>_id" id="fpatient_insurancegrid$x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_id" data-hidden="1" name="fpatient_insurancegrid$o<?= $Grid->RowIndex ?>_id" id="fpatient_insurancegrid$o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="patient_insurance" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Grid->Reception->Visible) { // Reception ?>
        <td data-name="Reception" <?= $Grid->Reception->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->Reception->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_patient_insurance_Reception" class="form-group">
<span<?= $Grid->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Reception->getDisplayValue($Grid->Reception->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_Reception" name="x<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_patient_insurance_Reception" class="form-group">
<input type="<?= $Grid->Reception->getInputTextType() ?>" data-table="patient_insurance" data-field="x_Reception" name="x<?= $Grid->RowIndex ?>_Reception" id="x<?= $Grid->RowIndex ?>_Reception" size="30" placeholder="<?= HtmlEncode($Grid->Reception->getPlaceHolder()) ?>" value="<?= $Grid->Reception->EditValue ?>"<?= $Grid->Reception->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Reception->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="patient_insurance" data-field="x_Reception" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Reception" id="o<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_insurance_Reception" class="form-group">
<span<?= $Grid->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Reception->getDisplayValue($Grid->Reception->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_Reception" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Reception" id="x<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_insurance_Reception">
<span<?= $Grid->Reception->viewAttributes() ?>>
<?= $Grid->Reception->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_Reception" data-hidden="1" name="fpatient_insurancegrid$x<?= $Grid->RowIndex ?>_Reception" id="fpatient_insurancegrid$x<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_Reception" data-hidden="1" name="fpatient_insurancegrid$o<?= $Grid->RowIndex ?>_Reception" id="fpatient_insurancegrid$o<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PatientId->Visible) { // PatientId ?>
        <td data-name="PatientId" <?= $Grid->PatientId->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->PatientId->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_patient_insurance_PatientId" class="form-group">
<span<?= $Grid->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatientId->getDisplayValue($Grid->PatientId->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_PatientId" name="x<?= $Grid->RowIndex ?>_PatientId" value="<?= HtmlEncode($Grid->PatientId->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_patient_insurance_PatientId" class="form-group">
<input type="<?= $Grid->PatientId->getInputTextType() ?>" data-table="patient_insurance" data-field="x_PatientId" name="x<?= $Grid->RowIndex ?>_PatientId" id="x<?= $Grid->RowIndex ?>_PatientId" size="30" placeholder="<?= HtmlEncode($Grid->PatientId->getPlaceHolder()) ?>" value="<?= $Grid->PatientId->EditValue ?>"<?= $Grid->PatientId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientId->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="patient_insurance" data-field="x_PatientId" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatientId" id="o<?= $Grid->RowIndex ?>_PatientId" value="<?= HtmlEncode($Grid->PatientId->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_insurance_PatientId" class="form-group">
<span<?= $Grid->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatientId->getDisplayValue($Grid->PatientId->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_PatientId" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PatientId" id="x<?= $Grid->RowIndex ?>_PatientId" value="<?= HtmlEncode($Grid->PatientId->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_insurance_PatientId">
<span<?= $Grid->PatientId->viewAttributes() ?>>
<?= $Grid->PatientId->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_PatientId" data-hidden="1" name="fpatient_insurancegrid$x<?= $Grid->RowIndex ?>_PatientId" id="fpatient_insurancegrid$x<?= $Grid->RowIndex ?>_PatientId" value="<?= HtmlEncode($Grid->PatientId->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_PatientId" data-hidden="1" name="fpatient_insurancegrid$o<?= $Grid->RowIndex ?>_PatientId" id="fpatient_insurancegrid$o<?= $Grid->RowIndex ?>_PatientId" value="<?= HtmlEncode($Grid->PatientId->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName" <?= $Grid->PatientName->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_insurance_PatientName" class="form-group">
<input type="<?= $Grid->PatientName->getInputTextType() ?>" data-table="patient_insurance" data-field="x_PatientName" name="x<?= $Grid->RowIndex ?>_PatientName" id="x<?= $Grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatientName->getPlaceHolder()) ?>" value="<?= $Grid->PatientName->EditValue ?>"<?= $Grid->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientName->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_PatientName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatientName" id="o<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_insurance_PatientName" class="form-group">
<input type="<?= $Grid->PatientName->getInputTextType() ?>" data-table="patient_insurance" data-field="x_PatientName" name="x<?= $Grid->RowIndex ?>_PatientName" id="x<?= $Grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatientName->getPlaceHolder()) ?>" value="<?= $Grid->PatientName->EditValue ?>"<?= $Grid->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientName->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_insurance_PatientName">
<span<?= $Grid->PatientName->viewAttributes() ?>>
<?= $Grid->PatientName->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_PatientName" data-hidden="1" name="fpatient_insurancegrid$x<?= $Grid->RowIndex ?>_PatientName" id="fpatient_insurancegrid$x<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_PatientName" data-hidden="1" name="fpatient_insurancegrid$o<?= $Grid->RowIndex ?>_PatientName" id="fpatient_insurancegrid$o<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Company->Visible) { // Company ?>
        <td data-name="Company" <?= $Grid->Company->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_insurance_Company" class="form-group">
<input type="<?= $Grid->Company->getInputTextType() ?>" data-table="patient_insurance" data-field="x_Company" name="x<?= $Grid->RowIndex ?>_Company" id="x<?= $Grid->RowIndex ?>_Company" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Company->getPlaceHolder()) ?>" value="<?= $Grid->Company->EditValue ?>"<?= $Grid->Company->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Company->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_Company" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Company" id="o<?= $Grid->RowIndex ?>_Company" value="<?= HtmlEncode($Grid->Company->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_insurance_Company" class="form-group">
<input type="<?= $Grid->Company->getInputTextType() ?>" data-table="patient_insurance" data-field="x_Company" name="x<?= $Grid->RowIndex ?>_Company" id="x<?= $Grid->RowIndex ?>_Company" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Company->getPlaceHolder()) ?>" value="<?= $Grid->Company->EditValue ?>"<?= $Grid->Company->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Company->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_insurance_Company">
<span<?= $Grid->Company->viewAttributes() ?>>
<?= $Grid->Company->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_Company" data-hidden="1" name="fpatient_insurancegrid$x<?= $Grid->RowIndex ?>_Company" id="fpatient_insurancegrid$x<?= $Grid->RowIndex ?>_Company" value="<?= HtmlEncode($Grid->Company->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_Company" data-hidden="1" name="fpatient_insurancegrid$o<?= $Grid->RowIndex ?>_Company" id="fpatient_insurancegrid$o<?= $Grid->RowIndex ?>_Company" value="<?= HtmlEncode($Grid->Company->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->AddressInsuranceCarierName->Visible) { // AddressInsuranceCarierName ?>
        <td data-name="AddressInsuranceCarierName" <?= $Grid->AddressInsuranceCarierName->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_insurance_AddressInsuranceCarierName" class="form-group">
<input type="<?= $Grid->AddressInsuranceCarierName->getInputTextType() ?>" data-table="patient_insurance" data-field="x_AddressInsuranceCarierName" name="x<?= $Grid->RowIndex ?>_AddressInsuranceCarierName" id="x<?= $Grid->RowIndex ?>_AddressInsuranceCarierName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->AddressInsuranceCarierName->getPlaceHolder()) ?>" value="<?= $Grid->AddressInsuranceCarierName->EditValue ?>"<?= $Grid->AddressInsuranceCarierName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->AddressInsuranceCarierName->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_AddressInsuranceCarierName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_AddressInsuranceCarierName" id="o<?= $Grid->RowIndex ?>_AddressInsuranceCarierName" value="<?= HtmlEncode($Grid->AddressInsuranceCarierName->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_insurance_AddressInsuranceCarierName" class="form-group">
<input type="<?= $Grid->AddressInsuranceCarierName->getInputTextType() ?>" data-table="patient_insurance" data-field="x_AddressInsuranceCarierName" name="x<?= $Grid->RowIndex ?>_AddressInsuranceCarierName" id="x<?= $Grid->RowIndex ?>_AddressInsuranceCarierName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->AddressInsuranceCarierName->getPlaceHolder()) ?>" value="<?= $Grid->AddressInsuranceCarierName->EditValue ?>"<?= $Grid->AddressInsuranceCarierName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->AddressInsuranceCarierName->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_insurance_AddressInsuranceCarierName">
<span<?= $Grid->AddressInsuranceCarierName->viewAttributes() ?>>
<?= $Grid->AddressInsuranceCarierName->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_AddressInsuranceCarierName" data-hidden="1" name="fpatient_insurancegrid$x<?= $Grid->RowIndex ?>_AddressInsuranceCarierName" id="fpatient_insurancegrid$x<?= $Grid->RowIndex ?>_AddressInsuranceCarierName" value="<?= HtmlEncode($Grid->AddressInsuranceCarierName->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_AddressInsuranceCarierName" data-hidden="1" name="fpatient_insurancegrid$o<?= $Grid->RowIndex ?>_AddressInsuranceCarierName" id="fpatient_insurancegrid$o<?= $Grid->RowIndex ?>_AddressInsuranceCarierName" value="<?= HtmlEncode($Grid->AddressInsuranceCarierName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ContactName->Visible) { // ContactName ?>
        <td data-name="ContactName" <?= $Grid->ContactName->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_insurance_ContactName" class="form-group">
<input type="<?= $Grid->ContactName->getInputTextType() ?>" data-table="patient_insurance" data-field="x_ContactName" name="x<?= $Grid->RowIndex ?>_ContactName" id="x<?= $Grid->RowIndex ?>_ContactName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ContactName->getPlaceHolder()) ?>" value="<?= $Grid->ContactName->EditValue ?>"<?= $Grid->ContactName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ContactName->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_ContactName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ContactName" id="o<?= $Grid->RowIndex ?>_ContactName" value="<?= HtmlEncode($Grid->ContactName->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_insurance_ContactName" class="form-group">
<input type="<?= $Grid->ContactName->getInputTextType() ?>" data-table="patient_insurance" data-field="x_ContactName" name="x<?= $Grid->RowIndex ?>_ContactName" id="x<?= $Grid->RowIndex ?>_ContactName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ContactName->getPlaceHolder()) ?>" value="<?= $Grid->ContactName->EditValue ?>"<?= $Grid->ContactName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ContactName->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_insurance_ContactName">
<span<?= $Grid->ContactName->viewAttributes() ?>>
<?= $Grid->ContactName->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_ContactName" data-hidden="1" name="fpatient_insurancegrid$x<?= $Grid->RowIndex ?>_ContactName" id="fpatient_insurancegrid$x<?= $Grid->RowIndex ?>_ContactName" value="<?= HtmlEncode($Grid->ContactName->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_ContactName" data-hidden="1" name="fpatient_insurancegrid$o<?= $Grid->RowIndex ?>_ContactName" id="fpatient_insurancegrid$o<?= $Grid->RowIndex ?>_ContactName" value="<?= HtmlEncode($Grid->ContactName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ContactMobile->Visible) { // ContactMobile ?>
        <td data-name="ContactMobile" <?= $Grid->ContactMobile->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_insurance_ContactMobile" class="form-group">
<input type="<?= $Grid->ContactMobile->getInputTextType() ?>" data-table="patient_insurance" data-field="x_ContactMobile" name="x<?= $Grid->RowIndex ?>_ContactMobile" id="x<?= $Grid->RowIndex ?>_ContactMobile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ContactMobile->getPlaceHolder()) ?>" value="<?= $Grid->ContactMobile->EditValue ?>"<?= $Grid->ContactMobile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ContactMobile->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_ContactMobile" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ContactMobile" id="o<?= $Grid->RowIndex ?>_ContactMobile" value="<?= HtmlEncode($Grid->ContactMobile->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_insurance_ContactMobile" class="form-group">
<input type="<?= $Grid->ContactMobile->getInputTextType() ?>" data-table="patient_insurance" data-field="x_ContactMobile" name="x<?= $Grid->RowIndex ?>_ContactMobile" id="x<?= $Grid->RowIndex ?>_ContactMobile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ContactMobile->getPlaceHolder()) ?>" value="<?= $Grid->ContactMobile->EditValue ?>"<?= $Grid->ContactMobile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ContactMobile->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_insurance_ContactMobile">
<span<?= $Grid->ContactMobile->viewAttributes() ?>>
<?= $Grid->ContactMobile->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_ContactMobile" data-hidden="1" name="fpatient_insurancegrid$x<?= $Grid->RowIndex ?>_ContactMobile" id="fpatient_insurancegrid$x<?= $Grid->RowIndex ?>_ContactMobile" value="<?= HtmlEncode($Grid->ContactMobile->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_ContactMobile" data-hidden="1" name="fpatient_insurancegrid$o<?= $Grid->RowIndex ?>_ContactMobile" id="fpatient_insurancegrid$o<?= $Grid->RowIndex ?>_ContactMobile" value="<?= HtmlEncode($Grid->ContactMobile->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PolicyType->Visible) { // PolicyType ?>
        <td data-name="PolicyType" <?= $Grid->PolicyType->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_insurance_PolicyType" class="form-group">
<input type="<?= $Grid->PolicyType->getInputTextType() ?>" data-table="patient_insurance" data-field="x_PolicyType" name="x<?= $Grid->RowIndex ?>_PolicyType" id="x<?= $Grid->RowIndex ?>_PolicyType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PolicyType->getPlaceHolder()) ?>" value="<?= $Grid->PolicyType->EditValue ?>"<?= $Grid->PolicyType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PolicyType->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_PolicyType" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PolicyType" id="o<?= $Grid->RowIndex ?>_PolicyType" value="<?= HtmlEncode($Grid->PolicyType->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_insurance_PolicyType" class="form-group">
<input type="<?= $Grid->PolicyType->getInputTextType() ?>" data-table="patient_insurance" data-field="x_PolicyType" name="x<?= $Grid->RowIndex ?>_PolicyType" id="x<?= $Grid->RowIndex ?>_PolicyType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PolicyType->getPlaceHolder()) ?>" value="<?= $Grid->PolicyType->EditValue ?>"<?= $Grid->PolicyType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PolicyType->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_insurance_PolicyType">
<span<?= $Grid->PolicyType->viewAttributes() ?>>
<?= $Grid->PolicyType->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_PolicyType" data-hidden="1" name="fpatient_insurancegrid$x<?= $Grid->RowIndex ?>_PolicyType" id="fpatient_insurancegrid$x<?= $Grid->RowIndex ?>_PolicyType" value="<?= HtmlEncode($Grid->PolicyType->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_PolicyType" data-hidden="1" name="fpatient_insurancegrid$o<?= $Grid->RowIndex ?>_PolicyType" id="fpatient_insurancegrid$o<?= $Grid->RowIndex ?>_PolicyType" value="<?= HtmlEncode($Grid->PolicyType->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PolicyName->Visible) { // PolicyName ?>
        <td data-name="PolicyName" <?= $Grid->PolicyName->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_insurance_PolicyName" class="form-group">
<input type="<?= $Grid->PolicyName->getInputTextType() ?>" data-table="patient_insurance" data-field="x_PolicyName" name="x<?= $Grid->RowIndex ?>_PolicyName" id="x<?= $Grid->RowIndex ?>_PolicyName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PolicyName->getPlaceHolder()) ?>" value="<?= $Grid->PolicyName->EditValue ?>"<?= $Grid->PolicyName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PolicyName->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_PolicyName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PolicyName" id="o<?= $Grid->RowIndex ?>_PolicyName" value="<?= HtmlEncode($Grid->PolicyName->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_insurance_PolicyName" class="form-group">
<input type="<?= $Grid->PolicyName->getInputTextType() ?>" data-table="patient_insurance" data-field="x_PolicyName" name="x<?= $Grid->RowIndex ?>_PolicyName" id="x<?= $Grid->RowIndex ?>_PolicyName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PolicyName->getPlaceHolder()) ?>" value="<?= $Grid->PolicyName->EditValue ?>"<?= $Grid->PolicyName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PolicyName->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_insurance_PolicyName">
<span<?= $Grid->PolicyName->viewAttributes() ?>>
<?= $Grid->PolicyName->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_PolicyName" data-hidden="1" name="fpatient_insurancegrid$x<?= $Grid->RowIndex ?>_PolicyName" id="fpatient_insurancegrid$x<?= $Grid->RowIndex ?>_PolicyName" value="<?= HtmlEncode($Grid->PolicyName->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_PolicyName" data-hidden="1" name="fpatient_insurancegrid$o<?= $Grid->RowIndex ?>_PolicyName" id="fpatient_insurancegrid$o<?= $Grid->RowIndex ?>_PolicyName" value="<?= HtmlEncode($Grid->PolicyName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PolicyNo->Visible) { // PolicyNo ?>
        <td data-name="PolicyNo" <?= $Grid->PolicyNo->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_insurance_PolicyNo" class="form-group">
<input type="<?= $Grid->PolicyNo->getInputTextType() ?>" data-table="patient_insurance" data-field="x_PolicyNo" name="x<?= $Grid->RowIndex ?>_PolicyNo" id="x<?= $Grid->RowIndex ?>_PolicyNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PolicyNo->getPlaceHolder()) ?>" value="<?= $Grid->PolicyNo->EditValue ?>"<?= $Grid->PolicyNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PolicyNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_PolicyNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PolicyNo" id="o<?= $Grid->RowIndex ?>_PolicyNo" value="<?= HtmlEncode($Grid->PolicyNo->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_insurance_PolicyNo" class="form-group">
<input type="<?= $Grid->PolicyNo->getInputTextType() ?>" data-table="patient_insurance" data-field="x_PolicyNo" name="x<?= $Grid->RowIndex ?>_PolicyNo" id="x<?= $Grid->RowIndex ?>_PolicyNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PolicyNo->getPlaceHolder()) ?>" value="<?= $Grid->PolicyNo->EditValue ?>"<?= $Grid->PolicyNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PolicyNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_insurance_PolicyNo">
<span<?= $Grid->PolicyNo->viewAttributes() ?>>
<?= $Grid->PolicyNo->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_PolicyNo" data-hidden="1" name="fpatient_insurancegrid$x<?= $Grid->RowIndex ?>_PolicyNo" id="fpatient_insurancegrid$x<?= $Grid->RowIndex ?>_PolicyNo" value="<?= HtmlEncode($Grid->PolicyNo->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_PolicyNo" data-hidden="1" name="fpatient_insurancegrid$o<?= $Grid->RowIndex ?>_PolicyNo" id="fpatient_insurancegrid$o<?= $Grid->RowIndex ?>_PolicyNo" value="<?= HtmlEncode($Grid->PolicyNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PolicyAmount->Visible) { // PolicyAmount ?>
        <td data-name="PolicyAmount" <?= $Grid->PolicyAmount->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_insurance_PolicyAmount" class="form-group">
<input type="<?= $Grid->PolicyAmount->getInputTextType() ?>" data-table="patient_insurance" data-field="x_PolicyAmount" name="x<?= $Grid->RowIndex ?>_PolicyAmount" id="x<?= $Grid->RowIndex ?>_PolicyAmount" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PolicyAmount->getPlaceHolder()) ?>" value="<?= $Grid->PolicyAmount->EditValue ?>"<?= $Grid->PolicyAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PolicyAmount->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_PolicyAmount" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PolicyAmount" id="o<?= $Grid->RowIndex ?>_PolicyAmount" value="<?= HtmlEncode($Grid->PolicyAmount->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_insurance_PolicyAmount" class="form-group">
<input type="<?= $Grid->PolicyAmount->getInputTextType() ?>" data-table="patient_insurance" data-field="x_PolicyAmount" name="x<?= $Grid->RowIndex ?>_PolicyAmount" id="x<?= $Grid->RowIndex ?>_PolicyAmount" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PolicyAmount->getPlaceHolder()) ?>" value="<?= $Grid->PolicyAmount->EditValue ?>"<?= $Grid->PolicyAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PolicyAmount->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_insurance_PolicyAmount">
<span<?= $Grid->PolicyAmount->viewAttributes() ?>>
<?= $Grid->PolicyAmount->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_PolicyAmount" data-hidden="1" name="fpatient_insurancegrid$x<?= $Grid->RowIndex ?>_PolicyAmount" id="fpatient_insurancegrid$x<?= $Grid->RowIndex ?>_PolicyAmount" value="<?= HtmlEncode($Grid->PolicyAmount->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_PolicyAmount" data-hidden="1" name="fpatient_insurancegrid$o<?= $Grid->RowIndex ?>_PolicyAmount" id="fpatient_insurancegrid$o<?= $Grid->RowIndex ?>_PolicyAmount" value="<?= HtmlEncode($Grid->PolicyAmount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->RefLetterNo->Visible) { // RefLetterNo ?>
        <td data-name="RefLetterNo" <?= $Grid->RefLetterNo->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_insurance_RefLetterNo" class="form-group">
<input type="<?= $Grid->RefLetterNo->getInputTextType() ?>" data-table="patient_insurance" data-field="x_RefLetterNo" name="x<?= $Grid->RowIndex ?>_RefLetterNo" id="x<?= $Grid->RowIndex ?>_RefLetterNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->RefLetterNo->getPlaceHolder()) ?>" value="<?= $Grid->RefLetterNo->EditValue ?>"<?= $Grid->RefLetterNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->RefLetterNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_RefLetterNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_RefLetterNo" id="o<?= $Grid->RowIndex ?>_RefLetterNo" value="<?= HtmlEncode($Grid->RefLetterNo->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_insurance_RefLetterNo" class="form-group">
<input type="<?= $Grid->RefLetterNo->getInputTextType() ?>" data-table="patient_insurance" data-field="x_RefLetterNo" name="x<?= $Grid->RowIndex ?>_RefLetterNo" id="x<?= $Grid->RowIndex ?>_RefLetterNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->RefLetterNo->getPlaceHolder()) ?>" value="<?= $Grid->RefLetterNo->EditValue ?>"<?= $Grid->RefLetterNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->RefLetterNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_insurance_RefLetterNo">
<span<?= $Grid->RefLetterNo->viewAttributes() ?>>
<?= $Grid->RefLetterNo->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_RefLetterNo" data-hidden="1" name="fpatient_insurancegrid$x<?= $Grid->RowIndex ?>_RefLetterNo" id="fpatient_insurancegrid$x<?= $Grid->RowIndex ?>_RefLetterNo" value="<?= HtmlEncode($Grid->RefLetterNo->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_RefLetterNo" data-hidden="1" name="fpatient_insurancegrid$o<?= $Grid->RowIndex ?>_RefLetterNo" id="fpatient_insurancegrid$o<?= $Grid->RowIndex ?>_RefLetterNo" value="<?= HtmlEncode($Grid->RefLetterNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ReferenceBy->Visible) { // ReferenceBy ?>
        <td data-name="ReferenceBy" <?= $Grid->ReferenceBy->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_insurance_ReferenceBy" class="form-group">
<input type="<?= $Grid->ReferenceBy->getInputTextType() ?>" data-table="patient_insurance" data-field="x_ReferenceBy" name="x<?= $Grid->RowIndex ?>_ReferenceBy" id="x<?= $Grid->RowIndex ?>_ReferenceBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ReferenceBy->getPlaceHolder()) ?>" value="<?= $Grid->ReferenceBy->EditValue ?>"<?= $Grid->ReferenceBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ReferenceBy->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_ReferenceBy" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ReferenceBy" id="o<?= $Grid->RowIndex ?>_ReferenceBy" value="<?= HtmlEncode($Grid->ReferenceBy->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_insurance_ReferenceBy" class="form-group">
<input type="<?= $Grid->ReferenceBy->getInputTextType() ?>" data-table="patient_insurance" data-field="x_ReferenceBy" name="x<?= $Grid->RowIndex ?>_ReferenceBy" id="x<?= $Grid->RowIndex ?>_ReferenceBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ReferenceBy->getPlaceHolder()) ?>" value="<?= $Grid->ReferenceBy->EditValue ?>"<?= $Grid->ReferenceBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ReferenceBy->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_insurance_ReferenceBy">
<span<?= $Grid->ReferenceBy->viewAttributes() ?>>
<?= $Grid->ReferenceBy->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_ReferenceBy" data-hidden="1" name="fpatient_insurancegrid$x<?= $Grid->RowIndex ?>_ReferenceBy" id="fpatient_insurancegrid$x<?= $Grid->RowIndex ?>_ReferenceBy" value="<?= HtmlEncode($Grid->ReferenceBy->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_ReferenceBy" data-hidden="1" name="fpatient_insurancegrid$o<?= $Grid->RowIndex ?>_ReferenceBy" id="fpatient_insurancegrid$o<?= $Grid->RowIndex ?>_ReferenceBy" value="<?= HtmlEncode($Grid->ReferenceBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ReferenceDate->Visible) { // ReferenceDate ?>
        <td data-name="ReferenceDate" <?= $Grid->ReferenceDate->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_insurance_ReferenceDate" class="form-group">
<input type="<?= $Grid->ReferenceDate->getInputTextType() ?>" data-table="patient_insurance" data-field="x_ReferenceDate" name="x<?= $Grid->RowIndex ?>_ReferenceDate" id="x<?= $Grid->RowIndex ?>_ReferenceDate" placeholder="<?= HtmlEncode($Grid->ReferenceDate->getPlaceHolder()) ?>" value="<?= $Grid->ReferenceDate->EditValue ?>"<?= $Grid->ReferenceDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ReferenceDate->getErrorMessage() ?></div>
<?php if (!$Grid->ReferenceDate->ReadOnly && !$Grid->ReferenceDate->Disabled && !isset($Grid->ReferenceDate->EditAttrs["readonly"]) && !isset($Grid->ReferenceDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_insurancegrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_insurancegrid", "x<?= $Grid->RowIndex ?>_ReferenceDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_ReferenceDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ReferenceDate" id="o<?= $Grid->RowIndex ?>_ReferenceDate" value="<?= HtmlEncode($Grid->ReferenceDate->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_insurance_ReferenceDate" class="form-group">
<input type="<?= $Grid->ReferenceDate->getInputTextType() ?>" data-table="patient_insurance" data-field="x_ReferenceDate" name="x<?= $Grid->RowIndex ?>_ReferenceDate" id="x<?= $Grid->RowIndex ?>_ReferenceDate" placeholder="<?= HtmlEncode($Grid->ReferenceDate->getPlaceHolder()) ?>" value="<?= $Grid->ReferenceDate->EditValue ?>"<?= $Grid->ReferenceDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ReferenceDate->getErrorMessage() ?></div>
<?php if (!$Grid->ReferenceDate->ReadOnly && !$Grid->ReferenceDate->Disabled && !isset($Grid->ReferenceDate->EditAttrs["readonly"]) && !isset($Grid->ReferenceDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_insurancegrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_insurancegrid", "x<?= $Grid->RowIndex ?>_ReferenceDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_insurance_ReferenceDate">
<span<?= $Grid->ReferenceDate->viewAttributes() ?>>
<?= $Grid->ReferenceDate->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_ReferenceDate" data-hidden="1" name="fpatient_insurancegrid$x<?= $Grid->RowIndex ?>_ReferenceDate" id="fpatient_insurancegrid$x<?= $Grid->RowIndex ?>_ReferenceDate" value="<?= HtmlEncode($Grid->ReferenceDate->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_ReferenceDate" data-hidden="1" name="fpatient_insurancegrid$o<?= $Grid->RowIndex ?>_ReferenceDate" id="fpatient_insurancegrid$o<?= $Grid->RowIndex ?>_ReferenceDate" value="<?= HtmlEncode($Grid->ReferenceDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->createdby->Visible) { // createdby ?>
        <td data-name="createdby" <?= $Grid->createdby->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_insurance" data-field="x_createdby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createdby" id="o<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_insurance_createdby">
<span<?= $Grid->createdby->viewAttributes() ?>>
<?= $Grid->createdby->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_createdby" data-hidden="1" name="fpatient_insurancegrid$x<?= $Grid->RowIndex ?>_createdby" id="fpatient_insurancegrid$x<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_createdby" data-hidden="1" name="fpatient_insurancegrid$o<?= $Grid->RowIndex ?>_createdby" id="fpatient_insurancegrid$o<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" <?= $Grid->createddatetime->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_insurance" data-field="x_createddatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createddatetime" id="o<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_insurance_createddatetime">
<span<?= $Grid->createddatetime->viewAttributes() ?>>
<?= $Grid->createddatetime->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_createddatetime" data-hidden="1" name="fpatient_insurancegrid$x<?= $Grid->RowIndex ?>_createddatetime" id="fpatient_insurancegrid$x<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_createddatetime" data-hidden="1" name="fpatient_insurancegrid$o<?= $Grid->RowIndex ?>_createddatetime" id="fpatient_insurancegrid$o<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby" <?= $Grid->modifiedby->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_insurance" data-field="x_modifiedby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_modifiedby" id="o<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_insurance_modifiedby">
<span<?= $Grid->modifiedby->viewAttributes() ?>>
<?= $Grid->modifiedby->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_modifiedby" data-hidden="1" name="fpatient_insurancegrid$x<?= $Grid->RowIndex ?>_modifiedby" id="fpatient_insurancegrid$x<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_modifiedby" data-hidden="1" name="fpatient_insurancegrid$o<?= $Grid->RowIndex ?>_modifiedby" id="fpatient_insurancegrid$o<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime" <?= $Grid->modifieddatetime->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_insurance" data-field="x_modifieddatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_modifieddatetime" id="o<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_insurance_modifieddatetime">
<span<?= $Grid->modifieddatetime->viewAttributes() ?>>
<?= $Grid->modifieddatetime->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_modifieddatetime" data-hidden="1" name="fpatient_insurancegrid$x<?= $Grid->RowIndex ?>_modifieddatetime" id="fpatient_insurancegrid$x<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_modifieddatetime" data-hidden="1" name="fpatient_insurancegrid$o<?= $Grid->RowIndex ?>_modifieddatetime" id="fpatient_insurancegrid$o<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->mrnno->Visible) { // mrnno ?>
        <td data-name="mrnno" <?= $Grid->mrnno->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->mrnno->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_patient_insurance_mrnno" class="form-group">
<span<?= $Grid->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->mrnno->getDisplayValue($Grid->mrnno->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_mrnno" name="x<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_patient_insurance_mrnno" class="form-group">
<input type="<?= $Grid->mrnno->getInputTextType() ?>" data-table="patient_insurance" data-field="x_mrnno" name="x<?= $Grid->RowIndex ?>_mrnno" id="x<?= $Grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->mrnno->getPlaceHolder()) ?>" value="<?= $Grid->mrnno->EditValue ?>"<?= $Grid->mrnno->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->mrnno->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="patient_insurance" data-field="x_mrnno" data-hidden="1" name="o<?= $Grid->RowIndex ?>_mrnno" id="o<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Grid->mrnno->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_patient_insurance_mrnno" class="form-group">
<span<?= $Grid->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->mrnno->getDisplayValue($Grid->mrnno->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_mrnno" name="x<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_patient_insurance_mrnno" class="form-group">
<input type="<?= $Grid->mrnno->getInputTextType() ?>" data-table="patient_insurance" data-field="x_mrnno" name="x<?= $Grid->RowIndex ?>_mrnno" id="x<?= $Grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->mrnno->getPlaceHolder()) ?>" value="<?= $Grid->mrnno->EditValue ?>"<?= $Grid->mrnno->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->mrnno->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_insurance_mrnno">
<span<?= $Grid->mrnno->viewAttributes() ?>>
<?= $Grid->mrnno->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_insurance" data-field="x_mrnno" data-hidden="1" name="fpatient_insurancegrid$x<?= $Grid->RowIndex ?>_mrnno" id="fpatient_insurancegrid$x<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->FormValue) ?>">
<input type="hidden" data-table="patient_insurance" data-field="x_mrnno" data-hidden="1" name="fpatient_insurancegrid$o<?= $Grid->RowIndex ?>_mrnno" id="fpatient_insurancegrid$o<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->OldValue) ?>">
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
loadjs.ready(["fpatient_insurancegrid","load"], function () {
    fpatient_insurancegrid.updateLists(<?= $Grid->RowIndex ?>);
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowIndex, "id" => "r0_patient_insurance", "data-rowtype" => ROWTYPE_ADD]);
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
<span id="el$rowindex$_patient_insurance_id" class="form-group patient_insurance_id"></span>
<?php } else { ?>
<span id="el$rowindex$_patient_insurance_id" class="form-group patient_insurance_id">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_insurance" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Reception->Visible) { // Reception ?>
        <td data-name="Reception">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->Reception->getSessionValue() != "") { ?>
<span id="el$rowindex$_patient_insurance_Reception" class="form-group patient_insurance_Reception">
<span<?= $Grid->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Reception->getDisplayValue($Grid->Reception->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_Reception" name="x<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_patient_insurance_Reception" class="form-group patient_insurance_Reception">
<input type="<?= $Grid->Reception->getInputTextType() ?>" data-table="patient_insurance" data-field="x_Reception" name="x<?= $Grid->RowIndex ?>_Reception" id="x<?= $Grid->RowIndex ?>_Reception" size="30" placeholder="<?= HtmlEncode($Grid->Reception->getPlaceHolder()) ?>" value="<?= $Grid->Reception->EditValue ?>"<?= $Grid->Reception->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Reception->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_insurance_Reception" class="form-group patient_insurance_Reception">
<span<?= $Grid->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Reception->getDisplayValue($Grid->Reception->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_Reception" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Reception" id="x<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_insurance" data-field="x_Reception" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Reception" id="o<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PatientId->Visible) { // PatientId ?>
        <td data-name="PatientId">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->PatientId->getSessionValue() != "") { ?>
<span id="el$rowindex$_patient_insurance_PatientId" class="form-group patient_insurance_PatientId">
<span<?= $Grid->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatientId->getDisplayValue($Grid->PatientId->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_PatientId" name="x<?= $Grid->RowIndex ?>_PatientId" value="<?= HtmlEncode($Grid->PatientId->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_patient_insurance_PatientId" class="form-group patient_insurance_PatientId">
<input type="<?= $Grid->PatientId->getInputTextType() ?>" data-table="patient_insurance" data-field="x_PatientId" name="x<?= $Grid->RowIndex ?>_PatientId" id="x<?= $Grid->RowIndex ?>_PatientId" size="30" placeholder="<?= HtmlEncode($Grid->PatientId->getPlaceHolder()) ?>" value="<?= $Grid->PatientId->EditValue ?>"<?= $Grid->PatientId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientId->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_insurance_PatientId" class="form-group patient_insurance_PatientId">
<span<?= $Grid->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatientId->getDisplayValue($Grid->PatientId->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_PatientId" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PatientId" id="x<?= $Grid->RowIndex ?>_PatientId" value="<?= HtmlEncode($Grid->PatientId->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_insurance" data-field="x_PatientId" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatientId" id="o<?= $Grid->RowIndex ?>_PatientId" value="<?= HtmlEncode($Grid->PatientId->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_insurance_PatientName" class="form-group patient_insurance_PatientName">
<input type="<?= $Grid->PatientName->getInputTextType() ?>" data-table="patient_insurance" data-field="x_PatientName" name="x<?= $Grid->RowIndex ?>_PatientName" id="x<?= $Grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatientName->getPlaceHolder()) ?>" value="<?= $Grid->PatientName->EditValue ?>"<?= $Grid->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientName->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_insurance_PatientName" class="form-group patient_insurance_PatientName">
<span<?= $Grid->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatientName->getDisplayValue($Grid->PatientName->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_PatientName" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PatientName" id="x<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_insurance" data-field="x_PatientName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatientName" id="o<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Company->Visible) { // Company ?>
        <td data-name="Company">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_insurance_Company" class="form-group patient_insurance_Company">
<input type="<?= $Grid->Company->getInputTextType() ?>" data-table="patient_insurance" data-field="x_Company" name="x<?= $Grid->RowIndex ?>_Company" id="x<?= $Grid->RowIndex ?>_Company" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Company->getPlaceHolder()) ?>" value="<?= $Grid->Company->EditValue ?>"<?= $Grid->Company->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Company->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_insurance_Company" class="form-group patient_insurance_Company">
<span<?= $Grid->Company->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Company->getDisplayValue($Grid->Company->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_Company" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Company" id="x<?= $Grid->RowIndex ?>_Company" value="<?= HtmlEncode($Grid->Company->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_insurance" data-field="x_Company" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Company" id="o<?= $Grid->RowIndex ?>_Company" value="<?= HtmlEncode($Grid->Company->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->AddressInsuranceCarierName->Visible) { // AddressInsuranceCarierName ?>
        <td data-name="AddressInsuranceCarierName">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_insurance_AddressInsuranceCarierName" class="form-group patient_insurance_AddressInsuranceCarierName">
<input type="<?= $Grid->AddressInsuranceCarierName->getInputTextType() ?>" data-table="patient_insurance" data-field="x_AddressInsuranceCarierName" name="x<?= $Grid->RowIndex ?>_AddressInsuranceCarierName" id="x<?= $Grid->RowIndex ?>_AddressInsuranceCarierName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->AddressInsuranceCarierName->getPlaceHolder()) ?>" value="<?= $Grid->AddressInsuranceCarierName->EditValue ?>"<?= $Grid->AddressInsuranceCarierName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->AddressInsuranceCarierName->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_insurance_AddressInsuranceCarierName" class="form-group patient_insurance_AddressInsuranceCarierName">
<span<?= $Grid->AddressInsuranceCarierName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->AddressInsuranceCarierName->getDisplayValue($Grid->AddressInsuranceCarierName->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_AddressInsuranceCarierName" data-hidden="1" name="x<?= $Grid->RowIndex ?>_AddressInsuranceCarierName" id="x<?= $Grid->RowIndex ?>_AddressInsuranceCarierName" value="<?= HtmlEncode($Grid->AddressInsuranceCarierName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_insurance" data-field="x_AddressInsuranceCarierName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_AddressInsuranceCarierName" id="o<?= $Grid->RowIndex ?>_AddressInsuranceCarierName" value="<?= HtmlEncode($Grid->AddressInsuranceCarierName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ContactName->Visible) { // ContactName ?>
        <td data-name="ContactName">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_insurance_ContactName" class="form-group patient_insurance_ContactName">
<input type="<?= $Grid->ContactName->getInputTextType() ?>" data-table="patient_insurance" data-field="x_ContactName" name="x<?= $Grid->RowIndex ?>_ContactName" id="x<?= $Grid->RowIndex ?>_ContactName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ContactName->getPlaceHolder()) ?>" value="<?= $Grid->ContactName->EditValue ?>"<?= $Grid->ContactName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ContactName->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_insurance_ContactName" class="form-group patient_insurance_ContactName">
<span<?= $Grid->ContactName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ContactName->getDisplayValue($Grid->ContactName->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_ContactName" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ContactName" id="x<?= $Grid->RowIndex ?>_ContactName" value="<?= HtmlEncode($Grid->ContactName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_insurance" data-field="x_ContactName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ContactName" id="o<?= $Grid->RowIndex ?>_ContactName" value="<?= HtmlEncode($Grid->ContactName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ContactMobile->Visible) { // ContactMobile ?>
        <td data-name="ContactMobile">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_insurance_ContactMobile" class="form-group patient_insurance_ContactMobile">
<input type="<?= $Grid->ContactMobile->getInputTextType() ?>" data-table="patient_insurance" data-field="x_ContactMobile" name="x<?= $Grid->RowIndex ?>_ContactMobile" id="x<?= $Grid->RowIndex ?>_ContactMobile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ContactMobile->getPlaceHolder()) ?>" value="<?= $Grid->ContactMobile->EditValue ?>"<?= $Grid->ContactMobile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ContactMobile->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_insurance_ContactMobile" class="form-group patient_insurance_ContactMobile">
<span<?= $Grid->ContactMobile->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ContactMobile->getDisplayValue($Grid->ContactMobile->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_ContactMobile" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ContactMobile" id="x<?= $Grid->RowIndex ?>_ContactMobile" value="<?= HtmlEncode($Grid->ContactMobile->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_insurance" data-field="x_ContactMobile" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ContactMobile" id="o<?= $Grid->RowIndex ?>_ContactMobile" value="<?= HtmlEncode($Grid->ContactMobile->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PolicyType->Visible) { // PolicyType ?>
        <td data-name="PolicyType">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_insurance_PolicyType" class="form-group patient_insurance_PolicyType">
<input type="<?= $Grid->PolicyType->getInputTextType() ?>" data-table="patient_insurance" data-field="x_PolicyType" name="x<?= $Grid->RowIndex ?>_PolicyType" id="x<?= $Grid->RowIndex ?>_PolicyType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PolicyType->getPlaceHolder()) ?>" value="<?= $Grid->PolicyType->EditValue ?>"<?= $Grid->PolicyType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PolicyType->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_insurance_PolicyType" class="form-group patient_insurance_PolicyType">
<span<?= $Grid->PolicyType->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PolicyType->getDisplayValue($Grid->PolicyType->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_PolicyType" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PolicyType" id="x<?= $Grid->RowIndex ?>_PolicyType" value="<?= HtmlEncode($Grid->PolicyType->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_insurance" data-field="x_PolicyType" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PolicyType" id="o<?= $Grid->RowIndex ?>_PolicyType" value="<?= HtmlEncode($Grid->PolicyType->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PolicyName->Visible) { // PolicyName ?>
        <td data-name="PolicyName">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_insurance_PolicyName" class="form-group patient_insurance_PolicyName">
<input type="<?= $Grid->PolicyName->getInputTextType() ?>" data-table="patient_insurance" data-field="x_PolicyName" name="x<?= $Grid->RowIndex ?>_PolicyName" id="x<?= $Grid->RowIndex ?>_PolicyName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PolicyName->getPlaceHolder()) ?>" value="<?= $Grid->PolicyName->EditValue ?>"<?= $Grid->PolicyName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PolicyName->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_insurance_PolicyName" class="form-group patient_insurance_PolicyName">
<span<?= $Grid->PolicyName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PolicyName->getDisplayValue($Grid->PolicyName->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_PolicyName" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PolicyName" id="x<?= $Grid->RowIndex ?>_PolicyName" value="<?= HtmlEncode($Grid->PolicyName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_insurance" data-field="x_PolicyName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PolicyName" id="o<?= $Grid->RowIndex ?>_PolicyName" value="<?= HtmlEncode($Grid->PolicyName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PolicyNo->Visible) { // PolicyNo ?>
        <td data-name="PolicyNo">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_insurance_PolicyNo" class="form-group patient_insurance_PolicyNo">
<input type="<?= $Grid->PolicyNo->getInputTextType() ?>" data-table="patient_insurance" data-field="x_PolicyNo" name="x<?= $Grid->RowIndex ?>_PolicyNo" id="x<?= $Grid->RowIndex ?>_PolicyNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PolicyNo->getPlaceHolder()) ?>" value="<?= $Grid->PolicyNo->EditValue ?>"<?= $Grid->PolicyNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PolicyNo->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_insurance_PolicyNo" class="form-group patient_insurance_PolicyNo">
<span<?= $Grid->PolicyNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PolicyNo->getDisplayValue($Grid->PolicyNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_PolicyNo" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PolicyNo" id="x<?= $Grid->RowIndex ?>_PolicyNo" value="<?= HtmlEncode($Grid->PolicyNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_insurance" data-field="x_PolicyNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PolicyNo" id="o<?= $Grid->RowIndex ?>_PolicyNo" value="<?= HtmlEncode($Grid->PolicyNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PolicyAmount->Visible) { // PolicyAmount ?>
        <td data-name="PolicyAmount">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_insurance_PolicyAmount" class="form-group patient_insurance_PolicyAmount">
<input type="<?= $Grid->PolicyAmount->getInputTextType() ?>" data-table="patient_insurance" data-field="x_PolicyAmount" name="x<?= $Grid->RowIndex ?>_PolicyAmount" id="x<?= $Grid->RowIndex ?>_PolicyAmount" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PolicyAmount->getPlaceHolder()) ?>" value="<?= $Grid->PolicyAmount->EditValue ?>"<?= $Grid->PolicyAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PolicyAmount->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_insurance_PolicyAmount" class="form-group patient_insurance_PolicyAmount">
<span<?= $Grid->PolicyAmount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PolicyAmount->getDisplayValue($Grid->PolicyAmount->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_PolicyAmount" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PolicyAmount" id="x<?= $Grid->RowIndex ?>_PolicyAmount" value="<?= HtmlEncode($Grid->PolicyAmount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_insurance" data-field="x_PolicyAmount" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PolicyAmount" id="o<?= $Grid->RowIndex ?>_PolicyAmount" value="<?= HtmlEncode($Grid->PolicyAmount->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->RefLetterNo->Visible) { // RefLetterNo ?>
        <td data-name="RefLetterNo">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_insurance_RefLetterNo" class="form-group patient_insurance_RefLetterNo">
<input type="<?= $Grid->RefLetterNo->getInputTextType() ?>" data-table="patient_insurance" data-field="x_RefLetterNo" name="x<?= $Grid->RowIndex ?>_RefLetterNo" id="x<?= $Grid->RowIndex ?>_RefLetterNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->RefLetterNo->getPlaceHolder()) ?>" value="<?= $Grid->RefLetterNo->EditValue ?>"<?= $Grid->RefLetterNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->RefLetterNo->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_insurance_RefLetterNo" class="form-group patient_insurance_RefLetterNo">
<span<?= $Grid->RefLetterNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->RefLetterNo->getDisplayValue($Grid->RefLetterNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_RefLetterNo" data-hidden="1" name="x<?= $Grid->RowIndex ?>_RefLetterNo" id="x<?= $Grid->RowIndex ?>_RefLetterNo" value="<?= HtmlEncode($Grid->RefLetterNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_insurance" data-field="x_RefLetterNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_RefLetterNo" id="o<?= $Grid->RowIndex ?>_RefLetterNo" value="<?= HtmlEncode($Grid->RefLetterNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ReferenceBy->Visible) { // ReferenceBy ?>
        <td data-name="ReferenceBy">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_insurance_ReferenceBy" class="form-group patient_insurance_ReferenceBy">
<input type="<?= $Grid->ReferenceBy->getInputTextType() ?>" data-table="patient_insurance" data-field="x_ReferenceBy" name="x<?= $Grid->RowIndex ?>_ReferenceBy" id="x<?= $Grid->RowIndex ?>_ReferenceBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ReferenceBy->getPlaceHolder()) ?>" value="<?= $Grid->ReferenceBy->EditValue ?>"<?= $Grid->ReferenceBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ReferenceBy->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_insurance_ReferenceBy" class="form-group patient_insurance_ReferenceBy">
<span<?= $Grid->ReferenceBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ReferenceBy->getDisplayValue($Grid->ReferenceBy->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_ReferenceBy" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ReferenceBy" id="x<?= $Grid->RowIndex ?>_ReferenceBy" value="<?= HtmlEncode($Grid->ReferenceBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_insurance" data-field="x_ReferenceBy" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ReferenceBy" id="o<?= $Grid->RowIndex ?>_ReferenceBy" value="<?= HtmlEncode($Grid->ReferenceBy->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ReferenceDate->Visible) { // ReferenceDate ?>
        <td data-name="ReferenceDate">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_insurance_ReferenceDate" class="form-group patient_insurance_ReferenceDate">
<input type="<?= $Grid->ReferenceDate->getInputTextType() ?>" data-table="patient_insurance" data-field="x_ReferenceDate" name="x<?= $Grid->RowIndex ?>_ReferenceDate" id="x<?= $Grid->RowIndex ?>_ReferenceDate" placeholder="<?= HtmlEncode($Grid->ReferenceDate->getPlaceHolder()) ?>" value="<?= $Grid->ReferenceDate->EditValue ?>"<?= $Grid->ReferenceDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ReferenceDate->getErrorMessage() ?></div>
<?php if (!$Grid->ReferenceDate->ReadOnly && !$Grid->ReferenceDate->Disabled && !isset($Grid->ReferenceDate->EditAttrs["readonly"]) && !isset($Grid->ReferenceDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_insurancegrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_insurancegrid", "x<?= $Grid->RowIndex ?>_ReferenceDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_insurance_ReferenceDate" class="form-group patient_insurance_ReferenceDate">
<span<?= $Grid->ReferenceDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ReferenceDate->getDisplayValue($Grid->ReferenceDate->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_ReferenceDate" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ReferenceDate" id="x<?= $Grid->RowIndex ?>_ReferenceDate" value="<?= HtmlEncode($Grid->ReferenceDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_insurance" data-field="x_ReferenceDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ReferenceDate" id="o<?= $Grid->RowIndex ?>_ReferenceDate" value="<?= HtmlEncode($Grid->ReferenceDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->createdby->Visible) { // createdby ?>
        <td data-name="createdby">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_insurance_createdby" class="form-group patient_insurance_createdby">
<span<?= $Grid->createdby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->createdby->getDisplayValue($Grid->createdby->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_createdby" data-hidden="1" name="x<?= $Grid->RowIndex ?>_createdby" id="x<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_insurance" data-field="x_createdby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createdby" id="o<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_insurance_createddatetime" class="form-group patient_insurance_createddatetime">
<span<?= $Grid->createddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->createddatetime->getDisplayValue($Grid->createddatetime->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_createddatetime" data-hidden="1" name="x<?= $Grid->RowIndex ?>_createddatetime" id="x<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_insurance" data-field="x_createddatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createddatetime" id="o<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_insurance_modifiedby" class="form-group patient_insurance_modifiedby">
<span<?= $Grid->modifiedby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->modifiedby->getDisplayValue($Grid->modifiedby->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_modifiedby" data-hidden="1" name="x<?= $Grid->RowIndex ?>_modifiedby" id="x<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_insurance" data-field="x_modifiedby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_modifiedby" id="o<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_insurance_modifieddatetime" class="form-group patient_insurance_modifieddatetime">
<span<?= $Grid->modifieddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->modifieddatetime->getDisplayValue($Grid->modifieddatetime->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_modifieddatetime" data-hidden="1" name="x<?= $Grid->RowIndex ?>_modifieddatetime" id="x<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_insurance" data-field="x_modifieddatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_modifieddatetime" id="o<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->mrnno->Visible) { // mrnno ?>
        <td data-name="mrnno">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->mrnno->getSessionValue() != "") { ?>
<span id="el$rowindex$_patient_insurance_mrnno" class="form-group patient_insurance_mrnno">
<span<?= $Grid->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->mrnno->getDisplayValue($Grid->mrnno->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_mrnno" name="x<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_patient_insurance_mrnno" class="form-group patient_insurance_mrnno">
<input type="<?= $Grid->mrnno->getInputTextType() ?>" data-table="patient_insurance" data-field="x_mrnno" name="x<?= $Grid->RowIndex ?>_mrnno" id="x<?= $Grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->mrnno->getPlaceHolder()) ?>" value="<?= $Grid->mrnno->EditValue ?>"<?= $Grid->mrnno->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->mrnno->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_insurance_mrnno" class="form-group patient_insurance_mrnno">
<span<?= $Grid->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->mrnno->getDisplayValue($Grid->mrnno->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_mrnno" data-hidden="1" name="x<?= $Grid->RowIndex ?>_mrnno" id="x<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_insurance" data-field="x_mrnno" data-hidden="1" name="o<?= $Grid->RowIndex ?>_mrnno" id="o<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Grid->ListOptions->render("body", "right", $Grid->RowIndex);
?>
<script>
loadjs.ready(["fpatient_insurancegrid","load"], function() {
    fpatient_insurancegrid.updateLists(<?= $Grid->RowIndex ?>);
});
</script>
    </tr>
<?php
    }
?>
</tbody>
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
<input type="hidden" name="detailpage" value="fpatient_insurancegrid">
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
    ew.addEventHandlers("patient_insurance");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php if (!$Grid->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function () {
    ew.fixedHeaderTable({
        delay: 0,
        container: "gmp_patient_insurance",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>
