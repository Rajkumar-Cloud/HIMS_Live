<?php

namespace PHPMaker2021\HIMS;

// Set up and run Grid object
$Grid = Container("ViewIpAdvanceGrid");
$Grid->run();
?>
<?php if (!$Grid->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_ip_advancegrid;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    fview_ip_advancegrid = new ew.Form("fview_ip_advancegrid", "grid");
    fview_ip_advancegrid.formKeyCountName = '<?= $Grid->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_ip_advance")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.view_ip_advance)
        ew.vars.tables.view_ip_advance = currentTable;
    fview_ip_advancegrid.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["Name", [fields.Name.visible && fields.Name.required ? ew.Validators.required(fields.Name.caption) : null], fields.Name.isInvalid],
        ["Mobile", [fields.Mobile.visible && fields.Mobile.required ? ew.Validators.required(fields.Mobile.caption) : null], fields.Mobile.isInvalid],
        ["voucher_type", [fields.voucher_type.visible && fields.voucher_type.required ? ew.Validators.required(fields.voucher_type.caption) : null], fields.voucher_type.isInvalid],
        ["Details", [fields.Details.visible && fields.Details.required ? ew.Validators.required(fields.Details.caption) : null], fields.Details.isInvalid],
        ["ModeofPayment", [fields.ModeofPayment.visible && fields.ModeofPayment.required ? ew.Validators.required(fields.ModeofPayment.caption) : null], fields.ModeofPayment.isInvalid],
        ["Amount", [fields.Amount.visible && fields.Amount.required ? ew.Validators.required(fields.Amount.caption) : null, ew.Validators.float], fields.Amount.isInvalid],
        ["AnyDues", [fields.AnyDues.visible && fields.AnyDues.required ? ew.Validators.required(fields.AnyDues.caption) : null], fields.AnyDues.isInvalid],
        ["createdby", [fields.createdby.visible && fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.visible && fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null], fields.createddatetime.isInvalid],
        ["modifiedby", [fields.modifiedby.visible && fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.visible && fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null], fields.modifieddatetime.isInvalid],
        ["PatID", [fields.PatID.visible && fields.PatID.required ? ew.Validators.required(fields.PatID.caption) : null], fields.PatID.isInvalid],
        ["PatientID", [fields.PatientID.visible && fields.PatientID.required ? ew.Validators.required(fields.PatientID.caption) : null], fields.PatientID.isInvalid],
        ["PatientName", [fields.PatientName.visible && fields.PatientName.required ? ew.Validators.required(fields.PatientName.caption) : null], fields.PatientName.isInvalid],
        ["VisiteType", [fields.VisiteType.visible && fields.VisiteType.required ? ew.Validators.required(fields.VisiteType.caption) : null], fields.VisiteType.isInvalid],
        ["VisitDate", [fields.VisitDate.visible && fields.VisitDate.required ? ew.Validators.required(fields.VisitDate.caption) : null, ew.Validators.datetime(0)], fields.VisitDate.isInvalid],
        ["AdvanceNo", [fields.AdvanceNo.visible && fields.AdvanceNo.required ? ew.Validators.required(fields.AdvanceNo.caption) : null], fields.AdvanceNo.isInvalid],
        ["Status", [fields.Status.visible && fields.Status.required ? ew.Validators.required(fields.Status.caption) : null], fields.Status.isInvalid],
        ["Date", [fields.Date.visible && fields.Date.required ? ew.Validators.required(fields.Date.caption) : null, ew.Validators.datetime(0)], fields.Date.isInvalid],
        ["AdvanceValidityDate", [fields.AdvanceValidityDate.visible && fields.AdvanceValidityDate.required ? ew.Validators.required(fields.AdvanceValidityDate.caption) : null, ew.Validators.datetime(0)], fields.AdvanceValidityDate.isInvalid],
        ["TotalRemainingAdvance", [fields.TotalRemainingAdvance.visible && fields.TotalRemainingAdvance.required ? ew.Validators.required(fields.TotalRemainingAdvance.caption) : null], fields.TotalRemainingAdvance.isInvalid],
        ["Remarks", [fields.Remarks.visible && fields.Remarks.required ? ew.Validators.required(fields.Remarks.caption) : null], fields.Remarks.isInvalid],
        ["SeectPaymentMode", [fields.SeectPaymentMode.visible && fields.SeectPaymentMode.required ? ew.Validators.required(fields.SeectPaymentMode.caption) : null], fields.SeectPaymentMode.isInvalid],
        ["PaidAmount", [fields.PaidAmount.visible && fields.PaidAmount.required ? ew.Validators.required(fields.PaidAmount.caption) : null], fields.PaidAmount.isInvalid],
        ["Currency", [fields.Currency.visible && fields.Currency.required ? ew.Validators.required(fields.Currency.caption) : null], fields.Currency.isInvalid],
        ["CardNumber", [fields.CardNumber.visible && fields.CardNumber.required ? ew.Validators.required(fields.CardNumber.caption) : null], fields.CardNumber.isInvalid],
        ["BankName", [fields.BankName.visible && fields.BankName.required ? ew.Validators.required(fields.BankName.caption) : null], fields.BankName.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid],
        ["Reception", [fields.Reception.visible && fields.Reception.required ? ew.Validators.required(fields.Reception.caption) : null], fields.Reception.isInvalid],
        ["mrnno", [fields.mrnno.visible && fields.mrnno.required ? ew.Validators.required(fields.mrnno.caption) : null], fields.mrnno.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fview_ip_advancegrid,
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
    fview_ip_advancegrid.validate = function () {
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
    fview_ip_advancegrid.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "Name", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Mobile", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "voucher_type", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Details", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ModeofPayment", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Amount", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "AnyDues", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PatID", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PatientID", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PatientName", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "VisiteType", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "VisitDate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "AdvanceNo", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Status", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Date", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "AdvanceValidityDate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "TotalRemainingAdvance", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Remarks", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SeectPaymentMode", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PaidAmount", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Currency", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "CardNumber", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "BankName", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Reception", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "mrnno", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    fview_ip_advancegrid.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_ip_advancegrid.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_ip_advancegrid.lists.ModeofPayment = <?= $Grid->ModeofPayment->toClientList($Grid) ?>;
    fview_ip_advancegrid.lists.Reception = <?= $Grid->Reception->toClientList($Grid) ?>;
    loadjs.done("fview_ip_advancegrid");
});
</script>
<?php } ?>
<?php
$Grid->renderOtherOptions();
?>
<?php if ($Grid->TotalRecords > 0 || $Grid->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_ip_advance">
<?php if ($Grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $Grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fview_ip_advancegrid" class="ew-form ew-list-form form-inline">
<div id="gmp_view_ip_advance" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_view_ip_advancegrid" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Grid->id->headerCellClass() ?>"><div id="elh_view_ip_advance_id" class="view_ip_advance_id"><?= $Grid->renderSort($Grid->id) ?></div></th>
<?php } ?>
<?php if ($Grid->Name->Visible) { // Name ?>
        <th data-name="Name" class="<?= $Grid->Name->headerCellClass() ?>"><div id="elh_view_ip_advance_Name" class="view_ip_advance_Name"><?= $Grid->renderSort($Grid->Name) ?></div></th>
<?php } ?>
<?php if ($Grid->Mobile->Visible) { // Mobile ?>
        <th data-name="Mobile" class="<?= $Grid->Mobile->headerCellClass() ?>"><div id="elh_view_ip_advance_Mobile" class="view_ip_advance_Mobile"><?= $Grid->renderSort($Grid->Mobile) ?></div></th>
<?php } ?>
<?php if ($Grid->voucher_type->Visible) { // voucher_type ?>
        <th data-name="voucher_type" class="<?= $Grid->voucher_type->headerCellClass() ?>"><div id="elh_view_ip_advance_voucher_type" class="view_ip_advance_voucher_type"><?= $Grid->renderSort($Grid->voucher_type) ?></div></th>
<?php } ?>
<?php if ($Grid->Details->Visible) { // Details ?>
        <th data-name="Details" class="<?= $Grid->Details->headerCellClass() ?>"><div id="elh_view_ip_advance_Details" class="view_ip_advance_Details"><?= $Grid->renderSort($Grid->Details) ?></div></th>
<?php } ?>
<?php if ($Grid->ModeofPayment->Visible) { // ModeofPayment ?>
        <th data-name="ModeofPayment" class="<?= $Grid->ModeofPayment->headerCellClass() ?>"><div id="elh_view_ip_advance_ModeofPayment" class="view_ip_advance_ModeofPayment"><?= $Grid->renderSort($Grid->ModeofPayment) ?></div></th>
<?php } ?>
<?php if ($Grid->Amount->Visible) { // Amount ?>
        <th data-name="Amount" class="<?= $Grid->Amount->headerCellClass() ?>"><div id="elh_view_ip_advance_Amount" class="view_ip_advance_Amount"><?= $Grid->renderSort($Grid->Amount) ?></div></th>
<?php } ?>
<?php if ($Grid->AnyDues->Visible) { // AnyDues ?>
        <th data-name="AnyDues" class="<?= $Grid->AnyDues->headerCellClass() ?>"><div id="elh_view_ip_advance_AnyDues" class="view_ip_advance_AnyDues"><?= $Grid->renderSort($Grid->AnyDues) ?></div></th>
<?php } ?>
<?php if ($Grid->createdby->Visible) { // createdby ?>
        <th data-name="createdby" class="<?= $Grid->createdby->headerCellClass() ?>"><div id="elh_view_ip_advance_createdby" class="view_ip_advance_createdby"><?= $Grid->renderSort($Grid->createdby) ?></div></th>
<?php } ?>
<?php if ($Grid->createddatetime->Visible) { // createddatetime ?>
        <th data-name="createddatetime" class="<?= $Grid->createddatetime->headerCellClass() ?>"><div id="elh_view_ip_advance_createddatetime" class="view_ip_advance_createddatetime"><?= $Grid->renderSort($Grid->createddatetime) ?></div></th>
<?php } ?>
<?php if ($Grid->modifiedby->Visible) { // modifiedby ?>
        <th data-name="modifiedby" class="<?= $Grid->modifiedby->headerCellClass() ?>"><div id="elh_view_ip_advance_modifiedby" class="view_ip_advance_modifiedby"><?= $Grid->renderSort($Grid->modifiedby) ?></div></th>
<?php } ?>
<?php if ($Grid->modifieddatetime->Visible) { // modifieddatetime ?>
        <th data-name="modifieddatetime" class="<?= $Grid->modifieddatetime->headerCellClass() ?>"><div id="elh_view_ip_advance_modifieddatetime" class="view_ip_advance_modifieddatetime"><?= $Grid->renderSort($Grid->modifieddatetime) ?></div></th>
<?php } ?>
<?php if ($Grid->PatID->Visible) { // PatID ?>
        <th data-name="PatID" class="<?= $Grid->PatID->headerCellClass() ?>"><div id="elh_view_ip_advance_PatID" class="view_ip_advance_PatID"><?= $Grid->renderSort($Grid->PatID) ?></div></th>
<?php } ?>
<?php if ($Grid->PatientID->Visible) { // PatientID ?>
        <th data-name="PatientID" class="<?= $Grid->PatientID->headerCellClass() ?>"><div id="elh_view_ip_advance_PatientID" class="view_ip_advance_PatientID"><?= $Grid->renderSort($Grid->PatientID) ?></div></th>
<?php } ?>
<?php if ($Grid->PatientName->Visible) { // PatientName ?>
        <th data-name="PatientName" class="<?= $Grid->PatientName->headerCellClass() ?>"><div id="elh_view_ip_advance_PatientName" class="view_ip_advance_PatientName"><?= $Grid->renderSort($Grid->PatientName) ?></div></th>
<?php } ?>
<?php if ($Grid->VisiteType->Visible) { // VisiteType ?>
        <th data-name="VisiteType" class="<?= $Grid->VisiteType->headerCellClass() ?>"><div id="elh_view_ip_advance_VisiteType" class="view_ip_advance_VisiteType"><?= $Grid->renderSort($Grid->VisiteType) ?></div></th>
<?php } ?>
<?php if ($Grid->VisitDate->Visible) { // VisitDate ?>
        <th data-name="VisitDate" class="<?= $Grid->VisitDate->headerCellClass() ?>"><div id="elh_view_ip_advance_VisitDate" class="view_ip_advance_VisitDate"><?= $Grid->renderSort($Grid->VisitDate) ?></div></th>
<?php } ?>
<?php if ($Grid->AdvanceNo->Visible) { // AdvanceNo ?>
        <th data-name="AdvanceNo" class="<?= $Grid->AdvanceNo->headerCellClass() ?>"><div id="elh_view_ip_advance_AdvanceNo" class="view_ip_advance_AdvanceNo"><?= $Grid->renderSort($Grid->AdvanceNo) ?></div></th>
<?php } ?>
<?php if ($Grid->Status->Visible) { // Status ?>
        <th data-name="Status" class="<?= $Grid->Status->headerCellClass() ?>"><div id="elh_view_ip_advance_Status" class="view_ip_advance_Status"><?= $Grid->renderSort($Grid->Status) ?></div></th>
<?php } ?>
<?php if ($Grid->Date->Visible) { // Date ?>
        <th data-name="Date" class="<?= $Grid->Date->headerCellClass() ?>"><div id="elh_view_ip_advance_Date" class="view_ip_advance_Date"><?= $Grid->renderSort($Grid->Date) ?></div></th>
<?php } ?>
<?php if ($Grid->AdvanceValidityDate->Visible) { // AdvanceValidityDate ?>
        <th data-name="AdvanceValidityDate" class="<?= $Grid->AdvanceValidityDate->headerCellClass() ?>"><div id="elh_view_ip_advance_AdvanceValidityDate" class="view_ip_advance_AdvanceValidityDate"><?= $Grid->renderSort($Grid->AdvanceValidityDate) ?></div></th>
<?php } ?>
<?php if ($Grid->TotalRemainingAdvance->Visible) { // TotalRemainingAdvance ?>
        <th data-name="TotalRemainingAdvance" class="<?= $Grid->TotalRemainingAdvance->headerCellClass() ?>"><div id="elh_view_ip_advance_TotalRemainingAdvance" class="view_ip_advance_TotalRemainingAdvance"><?= $Grid->renderSort($Grid->TotalRemainingAdvance) ?></div></th>
<?php } ?>
<?php if ($Grid->Remarks->Visible) { // Remarks ?>
        <th data-name="Remarks" class="<?= $Grid->Remarks->headerCellClass() ?>"><div id="elh_view_ip_advance_Remarks" class="view_ip_advance_Remarks"><?= $Grid->renderSort($Grid->Remarks) ?></div></th>
<?php } ?>
<?php if ($Grid->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
        <th data-name="SeectPaymentMode" class="<?= $Grid->SeectPaymentMode->headerCellClass() ?>"><div id="elh_view_ip_advance_SeectPaymentMode" class="view_ip_advance_SeectPaymentMode"><?= $Grid->renderSort($Grid->SeectPaymentMode) ?></div></th>
<?php } ?>
<?php if ($Grid->PaidAmount->Visible) { // PaidAmount ?>
        <th data-name="PaidAmount" class="<?= $Grid->PaidAmount->headerCellClass() ?>"><div id="elh_view_ip_advance_PaidAmount" class="view_ip_advance_PaidAmount"><?= $Grid->renderSort($Grid->PaidAmount) ?></div></th>
<?php } ?>
<?php if ($Grid->Currency->Visible) { // Currency ?>
        <th data-name="Currency" class="<?= $Grid->Currency->headerCellClass() ?>"><div id="elh_view_ip_advance_Currency" class="view_ip_advance_Currency"><?= $Grid->renderSort($Grid->Currency) ?></div></th>
<?php } ?>
<?php if ($Grid->CardNumber->Visible) { // CardNumber ?>
        <th data-name="CardNumber" class="<?= $Grid->CardNumber->headerCellClass() ?>"><div id="elh_view_ip_advance_CardNumber" class="view_ip_advance_CardNumber"><?= $Grid->renderSort($Grid->CardNumber) ?></div></th>
<?php } ?>
<?php if ($Grid->BankName->Visible) { // BankName ?>
        <th data-name="BankName" class="<?= $Grid->BankName->headerCellClass() ?>"><div id="elh_view_ip_advance_BankName" class="view_ip_advance_BankName"><?= $Grid->renderSort($Grid->BankName) ?></div></th>
<?php } ?>
<?php if ($Grid->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Grid->HospID->headerCellClass() ?>"><div id="elh_view_ip_advance_HospID" class="view_ip_advance_HospID"><?= $Grid->renderSort($Grid->HospID) ?></div></th>
<?php } ?>
<?php if ($Grid->Reception->Visible) { // Reception ?>
        <th data-name="Reception" class="<?= $Grid->Reception->headerCellClass() ?>"><div id="elh_view_ip_advance_Reception" class="view_ip_advance_Reception"><?= $Grid->renderSort($Grid->Reception) ?></div></th>
<?php } ?>
<?php if ($Grid->mrnno->Visible) { // mrnno ?>
        <th data-name="mrnno" class="<?= $Grid->mrnno->headerCellClass() ?>"><div id="elh_view_ip_advance_mrnno" class="view_ip_advance_mrnno"><?= $Grid->renderSort($Grid->mrnno) ?></div></th>
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowCount, "id" => "r" . $Grid->RowCount . "_view_ip_advance", "data-rowtype" => $Grid->RowType]);

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
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_id" class="form-group"></span>
<input type="hidden" data-table="view_ip_advance" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_id" class="form-group">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_id">
<span<?= $Grid->id->viewAttributes() ?>>
<?= $Grid->id->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_id" data-hidden="1" name="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_id" id="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_id" data-hidden="1" name="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_id" id="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="view_ip_advance" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Grid->Name->Visible) { // Name ?>
        <td data-name="Name" <?= $Grid->Name->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_Name" class="form-group">
<input type="<?= $Grid->Name->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_Name" name="x<?= $Grid->RowIndex ?>_Name" id="x<?= $Grid->RowIndex ?>_Name" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Name->getPlaceHolder()) ?>" value="<?= $Grid->Name->EditValue ?>"<?= $Grid->Name->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Name->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_Name" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Name" id="o<?= $Grid->RowIndex ?>_Name" value="<?= HtmlEncode($Grid->Name->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_Name" class="form-group">
<input type="<?= $Grid->Name->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_Name" name="x<?= $Grid->RowIndex ?>_Name" id="x<?= $Grid->RowIndex ?>_Name" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Name->getPlaceHolder()) ?>" value="<?= $Grid->Name->EditValue ?>"<?= $Grid->Name->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Name->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_Name">
<span<?= $Grid->Name->viewAttributes() ?>>
<?= $Grid->Name->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Name" data-hidden="1" name="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_Name" id="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_Name" value="<?= HtmlEncode($Grid->Name->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_Name" data-hidden="1" name="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_Name" id="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_Name" value="<?= HtmlEncode($Grid->Name->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Mobile->Visible) { // Mobile ?>
        <td data-name="Mobile" <?= $Grid->Mobile->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_Mobile" class="form-group">
<input type="<?= $Grid->Mobile->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_Mobile" name="x<?= $Grid->RowIndex ?>_Mobile" id="x<?= $Grid->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Mobile->getPlaceHolder()) ?>" value="<?= $Grid->Mobile->EditValue ?>"<?= $Grid->Mobile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Mobile->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_Mobile" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Mobile" id="o<?= $Grid->RowIndex ?>_Mobile" value="<?= HtmlEncode($Grid->Mobile->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_Mobile" class="form-group">
<input type="<?= $Grid->Mobile->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_Mobile" name="x<?= $Grid->RowIndex ?>_Mobile" id="x<?= $Grid->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Mobile->getPlaceHolder()) ?>" value="<?= $Grid->Mobile->EditValue ?>"<?= $Grid->Mobile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Mobile->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_Mobile">
<span<?= $Grid->Mobile->viewAttributes() ?>>
<?= $Grid->Mobile->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Mobile" data-hidden="1" name="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_Mobile" id="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_Mobile" value="<?= HtmlEncode($Grid->Mobile->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_Mobile" data-hidden="1" name="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_Mobile" id="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_Mobile" value="<?= HtmlEncode($Grid->Mobile->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->voucher_type->Visible) { // voucher_type ?>
        <td data-name="voucher_type" <?= $Grid->voucher_type->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_voucher_type" class="form-group">
<input type="<?= $Grid->voucher_type->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_voucher_type" name="x<?= $Grid->RowIndex ?>_voucher_type" id="x<?= $Grid->RowIndex ?>_voucher_type" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->voucher_type->getPlaceHolder()) ?>" value="<?= $Grid->voucher_type->EditValue ?>"<?= $Grid->voucher_type->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->voucher_type->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_voucher_type" data-hidden="1" name="o<?= $Grid->RowIndex ?>_voucher_type" id="o<?= $Grid->RowIndex ?>_voucher_type" value="<?= HtmlEncode($Grid->voucher_type->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_voucher_type" class="form-group">
<input type="<?= $Grid->voucher_type->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_voucher_type" name="x<?= $Grid->RowIndex ?>_voucher_type" id="x<?= $Grid->RowIndex ?>_voucher_type" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->voucher_type->getPlaceHolder()) ?>" value="<?= $Grid->voucher_type->EditValue ?>"<?= $Grid->voucher_type->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->voucher_type->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_voucher_type">
<span<?= $Grid->voucher_type->viewAttributes() ?>>
<?= $Grid->voucher_type->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_voucher_type" data-hidden="1" name="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_voucher_type" id="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_voucher_type" value="<?= HtmlEncode($Grid->voucher_type->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_voucher_type" data-hidden="1" name="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_voucher_type" id="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_voucher_type" value="<?= HtmlEncode($Grid->voucher_type->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Details->Visible) { // Details ?>
        <td data-name="Details" <?= $Grid->Details->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_Details" class="form-group">
<input type="<?= $Grid->Details->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_Details" name="x<?= $Grid->RowIndex ?>_Details" id="x<?= $Grid->RowIndex ?>_Details" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Details->getPlaceHolder()) ?>" value="<?= $Grid->Details->EditValue ?>"<?= $Grid->Details->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Details->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_Details" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Details" id="o<?= $Grid->RowIndex ?>_Details" value="<?= HtmlEncode($Grid->Details->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_Details" class="form-group">
<input type="<?= $Grid->Details->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_Details" name="x<?= $Grid->RowIndex ?>_Details" id="x<?= $Grid->RowIndex ?>_Details" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Details->getPlaceHolder()) ?>" value="<?= $Grid->Details->EditValue ?>"<?= $Grid->Details->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Details->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_Details">
<span<?= $Grid->Details->viewAttributes() ?>>
<?= $Grid->Details->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Details" data-hidden="1" name="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_Details" id="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_Details" value="<?= HtmlEncode($Grid->Details->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_Details" data-hidden="1" name="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_Details" id="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_Details" value="<?= HtmlEncode($Grid->Details->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ModeofPayment->Visible) { // ModeofPayment ?>
        <td data-name="ModeofPayment" <?= $Grid->ModeofPayment->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_ModeofPayment" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_ModeofPayment"
        name="x<?= $Grid->RowIndex ?>_ModeofPayment"
        class="form-control ew-select<?= $Grid->ModeofPayment->isInvalidClass() ?>"
        data-select2-id="view_ip_advance_x<?= $Grid->RowIndex ?>_ModeofPayment"
        data-table="view_ip_advance"
        data-field="x_ModeofPayment"
        data-value-separator="<?= $Grid->ModeofPayment->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->ModeofPayment->getPlaceHolder()) ?>"
        <?= $Grid->ModeofPayment->editAttributes() ?>>
        <?= $Grid->ModeofPayment->selectOptionListHtml("x{$Grid->RowIndex}_ModeofPayment") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->ModeofPayment->getErrorMessage() ?></div>
<?= $Grid->ModeofPayment->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_ModeofPayment") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_ip_advance_x<?= $Grid->RowIndex ?>_ModeofPayment']"),
        options = { name: "x<?= $Grid->RowIndex ?>_ModeofPayment", selectId: "view_ip_advance_x<?= $Grid->RowIndex ?>_ModeofPayment", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_ip_advance.fields.ModeofPayment.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_ModeofPayment" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ModeofPayment" id="o<?= $Grid->RowIndex ?>_ModeofPayment" value="<?= HtmlEncode($Grid->ModeofPayment->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_ModeofPayment" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_ModeofPayment"
        name="x<?= $Grid->RowIndex ?>_ModeofPayment"
        class="form-control ew-select<?= $Grid->ModeofPayment->isInvalidClass() ?>"
        data-select2-id="view_ip_advance_x<?= $Grid->RowIndex ?>_ModeofPayment"
        data-table="view_ip_advance"
        data-field="x_ModeofPayment"
        data-value-separator="<?= $Grid->ModeofPayment->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->ModeofPayment->getPlaceHolder()) ?>"
        <?= $Grid->ModeofPayment->editAttributes() ?>>
        <?= $Grid->ModeofPayment->selectOptionListHtml("x{$Grid->RowIndex}_ModeofPayment") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->ModeofPayment->getErrorMessage() ?></div>
<?= $Grid->ModeofPayment->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_ModeofPayment") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_ip_advance_x<?= $Grid->RowIndex ?>_ModeofPayment']"),
        options = { name: "x<?= $Grid->RowIndex ?>_ModeofPayment", selectId: "view_ip_advance_x<?= $Grid->RowIndex ?>_ModeofPayment", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_ip_advance.fields.ModeofPayment.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_ModeofPayment">
<span<?= $Grid->ModeofPayment->viewAttributes() ?>>
<?= $Grid->ModeofPayment->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_ModeofPayment" data-hidden="1" name="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_ModeofPayment" id="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_ModeofPayment" value="<?= HtmlEncode($Grid->ModeofPayment->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_ModeofPayment" data-hidden="1" name="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_ModeofPayment" id="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_ModeofPayment" value="<?= HtmlEncode($Grid->ModeofPayment->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Amount->Visible) { // Amount ?>
        <td data-name="Amount" <?= $Grid->Amount->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_Amount" class="form-group">
<input type="<?= $Grid->Amount->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_Amount" name="x<?= $Grid->RowIndex ?>_Amount" id="x<?= $Grid->RowIndex ?>_Amount" size="30" placeholder="<?= HtmlEncode($Grid->Amount->getPlaceHolder()) ?>" value="<?= $Grid->Amount->EditValue ?>"<?= $Grid->Amount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Amount->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_Amount" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Amount" id="o<?= $Grid->RowIndex ?>_Amount" value="<?= HtmlEncode($Grid->Amount->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_Amount" class="form-group">
<input type="<?= $Grid->Amount->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_Amount" name="x<?= $Grid->RowIndex ?>_Amount" id="x<?= $Grid->RowIndex ?>_Amount" size="30" placeholder="<?= HtmlEncode($Grid->Amount->getPlaceHolder()) ?>" value="<?= $Grid->Amount->EditValue ?>"<?= $Grid->Amount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Amount->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_Amount">
<span<?= $Grid->Amount->viewAttributes() ?>>
<?= $Grid->Amount->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Amount" data-hidden="1" name="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_Amount" id="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_Amount" value="<?= HtmlEncode($Grid->Amount->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_Amount" data-hidden="1" name="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_Amount" id="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_Amount" value="<?= HtmlEncode($Grid->Amount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->AnyDues->Visible) { // AnyDues ?>
        <td data-name="AnyDues" <?= $Grid->AnyDues->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_AnyDues" class="form-group">
<input type="<?= $Grid->AnyDues->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_AnyDues" name="x<?= $Grid->RowIndex ?>_AnyDues" id="x<?= $Grid->RowIndex ?>_AnyDues" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->AnyDues->getPlaceHolder()) ?>" value="<?= $Grid->AnyDues->EditValue ?>"<?= $Grid->AnyDues->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->AnyDues->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_AnyDues" data-hidden="1" name="o<?= $Grid->RowIndex ?>_AnyDues" id="o<?= $Grid->RowIndex ?>_AnyDues" value="<?= HtmlEncode($Grid->AnyDues->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_AnyDues" class="form-group">
<input type="<?= $Grid->AnyDues->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_AnyDues" name="x<?= $Grid->RowIndex ?>_AnyDues" id="x<?= $Grid->RowIndex ?>_AnyDues" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->AnyDues->getPlaceHolder()) ?>" value="<?= $Grid->AnyDues->EditValue ?>"<?= $Grid->AnyDues->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->AnyDues->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_AnyDues">
<span<?= $Grid->AnyDues->viewAttributes() ?>>
<?= $Grid->AnyDues->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_AnyDues" data-hidden="1" name="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_AnyDues" id="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_AnyDues" value="<?= HtmlEncode($Grid->AnyDues->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_AnyDues" data-hidden="1" name="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_AnyDues" id="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_AnyDues" value="<?= HtmlEncode($Grid->AnyDues->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->createdby->Visible) { // createdby ?>
        <td data-name="createdby" <?= $Grid->createdby->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_createdby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createdby" id="o<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_createdby">
<span<?= $Grid->createdby->viewAttributes() ?>>
<?= $Grid->createdby->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_createdby" data-hidden="1" name="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_createdby" id="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_createdby" data-hidden="1" name="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_createdby" id="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" <?= $Grid->createddatetime->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_createddatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createddatetime" id="o<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_createddatetime">
<span<?= $Grid->createddatetime->viewAttributes() ?>>
<?= $Grid->createddatetime->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_createddatetime" data-hidden="1" name="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_createddatetime" id="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_createddatetime" data-hidden="1" name="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_createddatetime" id="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby" <?= $Grid->modifiedby->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_modifiedby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_modifiedby" id="o<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_modifiedby">
<span<?= $Grid->modifiedby->viewAttributes() ?>>
<?= $Grid->modifiedby->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_modifiedby" data-hidden="1" name="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_modifiedby" id="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_modifiedby" data-hidden="1" name="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_modifiedby" id="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime" <?= $Grid->modifieddatetime->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_modifieddatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_modifieddatetime" id="o<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_modifieddatetime">
<span<?= $Grid->modifieddatetime->viewAttributes() ?>>
<?= $Grid->modifieddatetime->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_modifieddatetime" data-hidden="1" name="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_modifieddatetime" id="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_modifieddatetime" data-hidden="1" name="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_modifieddatetime" id="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PatID->Visible) { // PatID ?>
        <td data-name="PatID" <?= $Grid->PatID->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->PatID->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_PatID" class="form-group">
<span<?= $Grid->PatID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatID->getDisplayValue($Grid->PatID->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_PatID" name="x<?= $Grid->RowIndex ?>_PatID" value="<?= HtmlEncode($Grid->PatID->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_PatID" class="form-group">
<input type="<?= $Grid->PatID->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_PatID" name="x<?= $Grid->RowIndex ?>_PatID" id="x<?= $Grid->RowIndex ?>_PatID" size="30" placeholder="<?= HtmlEncode($Grid->PatID->getPlaceHolder()) ?>" value="<?= $Grid->PatID->EditValue ?>"<?= $Grid->PatID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatID->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_PatID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatID" id="o<?= $Grid->RowIndex ?>_PatID" value="<?= HtmlEncode($Grid->PatID->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_PatID" class="form-group">
<span<?= $Grid->PatID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatID->getDisplayValue($Grid->PatID->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_PatID" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PatID" id="x<?= $Grid->RowIndex ?>_PatID" value="<?= HtmlEncode($Grid->PatID->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_PatID">
<span<?= $Grid->PatID->viewAttributes() ?>>
<?= $Grid->PatID->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_PatID" data-hidden="1" name="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_PatID" id="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_PatID" value="<?= HtmlEncode($Grid->PatID->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_PatID" data-hidden="1" name="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_PatID" id="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_PatID" value="<?= HtmlEncode($Grid->PatID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PatientID->Visible) { // PatientID ?>
        <td data-name="PatientID" <?= $Grid->PatientID->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_PatientID" class="form-group">
<input type="<?= $Grid->PatientID->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_PatientID" name="x<?= $Grid->RowIndex ?>_PatientID" id="x<?= $Grid->RowIndex ?>_PatientID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatientID->getPlaceHolder()) ?>" value="<?= $Grid->PatientID->EditValue ?>"<?= $Grid->PatientID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientID->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_PatientID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatientID" id="o<?= $Grid->RowIndex ?>_PatientID" value="<?= HtmlEncode($Grid->PatientID->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_PatientID" class="form-group">
<input type="<?= $Grid->PatientID->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_PatientID" name="x<?= $Grid->RowIndex ?>_PatientID" id="x<?= $Grid->RowIndex ?>_PatientID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatientID->getPlaceHolder()) ?>" value="<?= $Grid->PatientID->EditValue ?>"<?= $Grid->PatientID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientID->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_PatientID">
<span<?= $Grid->PatientID->viewAttributes() ?>>
<?= $Grid->PatientID->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_PatientID" data-hidden="1" name="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_PatientID" id="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_PatientID" value="<?= HtmlEncode($Grid->PatientID->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_PatientID" data-hidden="1" name="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_PatientID" id="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_PatientID" value="<?= HtmlEncode($Grid->PatientID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName" <?= $Grid->PatientName->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_PatientName" class="form-group">
<input type="<?= $Grid->PatientName->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_PatientName" name="x<?= $Grid->RowIndex ?>_PatientName" id="x<?= $Grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatientName->getPlaceHolder()) ?>" value="<?= $Grid->PatientName->EditValue ?>"<?= $Grid->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientName->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_PatientName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatientName" id="o<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_PatientName" class="form-group">
<input type="<?= $Grid->PatientName->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_PatientName" name="x<?= $Grid->RowIndex ?>_PatientName" id="x<?= $Grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatientName->getPlaceHolder()) ?>" value="<?= $Grid->PatientName->EditValue ?>"<?= $Grid->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientName->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_PatientName">
<span<?= $Grid->PatientName->viewAttributes() ?>>
<?= $Grid->PatientName->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_PatientName" data-hidden="1" name="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_PatientName" id="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_PatientName" data-hidden="1" name="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_PatientName" id="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->VisiteType->Visible) { // VisiteType ?>
        <td data-name="VisiteType" <?= $Grid->VisiteType->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_VisiteType" class="form-group">
<input type="<?= $Grid->VisiteType->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_VisiteType" name="x<?= $Grid->RowIndex ?>_VisiteType" id="x<?= $Grid->RowIndex ?>_VisiteType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->VisiteType->getPlaceHolder()) ?>" value="<?= $Grid->VisiteType->EditValue ?>"<?= $Grid->VisiteType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->VisiteType->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_VisiteType" data-hidden="1" name="o<?= $Grid->RowIndex ?>_VisiteType" id="o<?= $Grid->RowIndex ?>_VisiteType" value="<?= HtmlEncode($Grid->VisiteType->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_VisiteType" class="form-group">
<input type="<?= $Grid->VisiteType->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_VisiteType" name="x<?= $Grid->RowIndex ?>_VisiteType" id="x<?= $Grid->RowIndex ?>_VisiteType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->VisiteType->getPlaceHolder()) ?>" value="<?= $Grid->VisiteType->EditValue ?>"<?= $Grid->VisiteType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->VisiteType->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_VisiteType">
<span<?= $Grid->VisiteType->viewAttributes() ?>>
<?= $Grid->VisiteType->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_VisiteType" data-hidden="1" name="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_VisiteType" id="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_VisiteType" value="<?= HtmlEncode($Grid->VisiteType->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_VisiteType" data-hidden="1" name="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_VisiteType" id="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_VisiteType" value="<?= HtmlEncode($Grid->VisiteType->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->VisitDate->Visible) { // VisitDate ?>
        <td data-name="VisitDate" <?= $Grid->VisitDate->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_VisitDate" class="form-group">
<input type="<?= $Grid->VisitDate->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_VisitDate" name="x<?= $Grid->RowIndex ?>_VisitDate" id="x<?= $Grid->RowIndex ?>_VisitDate" placeholder="<?= HtmlEncode($Grid->VisitDate->getPlaceHolder()) ?>" value="<?= $Grid->VisitDate->EditValue ?>"<?= $Grid->VisitDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->VisitDate->getErrorMessage() ?></div>
<?php if (!$Grid->VisitDate->ReadOnly && !$Grid->VisitDate->Disabled && !isset($Grid->VisitDate->EditAttrs["readonly"]) && !isset($Grid->VisitDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_ip_advancegrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_ip_advancegrid", "x<?= $Grid->RowIndex ?>_VisitDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_VisitDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_VisitDate" id="o<?= $Grid->RowIndex ?>_VisitDate" value="<?= HtmlEncode($Grid->VisitDate->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_VisitDate" class="form-group">
<input type="<?= $Grid->VisitDate->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_VisitDate" name="x<?= $Grid->RowIndex ?>_VisitDate" id="x<?= $Grid->RowIndex ?>_VisitDate" placeholder="<?= HtmlEncode($Grid->VisitDate->getPlaceHolder()) ?>" value="<?= $Grid->VisitDate->EditValue ?>"<?= $Grid->VisitDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->VisitDate->getErrorMessage() ?></div>
<?php if (!$Grid->VisitDate->ReadOnly && !$Grid->VisitDate->Disabled && !isset($Grid->VisitDate->EditAttrs["readonly"]) && !isset($Grid->VisitDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_ip_advancegrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_ip_advancegrid", "x<?= $Grid->RowIndex ?>_VisitDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_VisitDate">
<span<?= $Grid->VisitDate->viewAttributes() ?>>
<?= $Grid->VisitDate->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_VisitDate" data-hidden="1" name="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_VisitDate" id="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_VisitDate" value="<?= HtmlEncode($Grid->VisitDate->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_VisitDate" data-hidden="1" name="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_VisitDate" id="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_VisitDate" value="<?= HtmlEncode($Grid->VisitDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->AdvanceNo->Visible) { // AdvanceNo ?>
        <td data-name="AdvanceNo" <?= $Grid->AdvanceNo->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_AdvanceNo" class="form-group">
<input type="<?= $Grid->AdvanceNo->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_AdvanceNo" name="x<?= $Grid->RowIndex ?>_AdvanceNo" id="x<?= $Grid->RowIndex ?>_AdvanceNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->AdvanceNo->getPlaceHolder()) ?>" value="<?= $Grid->AdvanceNo->EditValue ?>"<?= $Grid->AdvanceNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->AdvanceNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_AdvanceNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_AdvanceNo" id="o<?= $Grid->RowIndex ?>_AdvanceNo" value="<?= HtmlEncode($Grid->AdvanceNo->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_AdvanceNo" class="form-group">
<input type="<?= $Grid->AdvanceNo->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_AdvanceNo" name="x<?= $Grid->RowIndex ?>_AdvanceNo" id="x<?= $Grid->RowIndex ?>_AdvanceNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->AdvanceNo->getPlaceHolder()) ?>" value="<?= $Grid->AdvanceNo->EditValue ?>"<?= $Grid->AdvanceNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->AdvanceNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_AdvanceNo">
<span<?= $Grid->AdvanceNo->viewAttributes() ?>>
<?= $Grid->AdvanceNo->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_AdvanceNo" data-hidden="1" name="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_AdvanceNo" id="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_AdvanceNo" value="<?= HtmlEncode($Grid->AdvanceNo->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_AdvanceNo" data-hidden="1" name="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_AdvanceNo" id="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_AdvanceNo" value="<?= HtmlEncode($Grid->AdvanceNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Status->Visible) { // Status ?>
        <td data-name="Status" <?= $Grid->Status->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_Status" class="form-group">
<input type="<?= $Grid->Status->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_Status" name="x<?= $Grid->RowIndex ?>_Status" id="x<?= $Grid->RowIndex ?>_Status" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Status->getPlaceHolder()) ?>" value="<?= $Grid->Status->EditValue ?>"<?= $Grid->Status->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Status->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_Status" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Status" id="o<?= $Grid->RowIndex ?>_Status" value="<?= HtmlEncode($Grid->Status->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_Status" class="form-group">
<input type="<?= $Grid->Status->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_Status" name="x<?= $Grid->RowIndex ?>_Status" id="x<?= $Grid->RowIndex ?>_Status" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Status->getPlaceHolder()) ?>" value="<?= $Grid->Status->EditValue ?>"<?= $Grid->Status->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Status->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_Status">
<span<?= $Grid->Status->viewAttributes() ?>>
<?= $Grid->Status->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Status" data-hidden="1" name="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_Status" id="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_Status" value="<?= HtmlEncode($Grid->Status->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_Status" data-hidden="1" name="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_Status" id="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_Status" value="<?= HtmlEncode($Grid->Status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Date->Visible) { // Date ?>
        <td data-name="Date" <?= $Grid->Date->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_Date" class="form-group">
<input type="<?= $Grid->Date->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_Date" name="x<?= $Grid->RowIndex ?>_Date" id="x<?= $Grid->RowIndex ?>_Date" placeholder="<?= HtmlEncode($Grid->Date->getPlaceHolder()) ?>" value="<?= $Grid->Date->EditValue ?>"<?= $Grid->Date->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Date->getErrorMessage() ?></div>
<?php if (!$Grid->Date->ReadOnly && !$Grid->Date->Disabled && !isset($Grid->Date->EditAttrs["readonly"]) && !isset($Grid->Date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_ip_advancegrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_ip_advancegrid", "x<?= $Grid->RowIndex ?>_Date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_Date" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Date" id="o<?= $Grid->RowIndex ?>_Date" value="<?= HtmlEncode($Grid->Date->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_Date" class="form-group">
<input type="<?= $Grid->Date->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_Date" name="x<?= $Grid->RowIndex ?>_Date" id="x<?= $Grid->RowIndex ?>_Date" placeholder="<?= HtmlEncode($Grid->Date->getPlaceHolder()) ?>" value="<?= $Grid->Date->EditValue ?>"<?= $Grid->Date->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Date->getErrorMessage() ?></div>
<?php if (!$Grid->Date->ReadOnly && !$Grid->Date->Disabled && !isset($Grid->Date->EditAttrs["readonly"]) && !isset($Grid->Date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_ip_advancegrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_ip_advancegrid", "x<?= $Grid->RowIndex ?>_Date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_Date">
<span<?= $Grid->Date->viewAttributes() ?>>
<?= $Grid->Date->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Date" data-hidden="1" name="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_Date" id="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_Date" value="<?= HtmlEncode($Grid->Date->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_Date" data-hidden="1" name="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_Date" id="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_Date" value="<?= HtmlEncode($Grid->Date->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->AdvanceValidityDate->Visible) { // AdvanceValidityDate ?>
        <td data-name="AdvanceValidityDate" <?= $Grid->AdvanceValidityDate->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_AdvanceValidityDate" class="form-group">
<input type="<?= $Grid->AdvanceValidityDate->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_AdvanceValidityDate" name="x<?= $Grid->RowIndex ?>_AdvanceValidityDate" id="x<?= $Grid->RowIndex ?>_AdvanceValidityDate" placeholder="<?= HtmlEncode($Grid->AdvanceValidityDate->getPlaceHolder()) ?>" value="<?= $Grid->AdvanceValidityDate->EditValue ?>"<?= $Grid->AdvanceValidityDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->AdvanceValidityDate->getErrorMessage() ?></div>
<?php if (!$Grid->AdvanceValidityDate->ReadOnly && !$Grid->AdvanceValidityDate->Disabled && !isset($Grid->AdvanceValidityDate->EditAttrs["readonly"]) && !isset($Grid->AdvanceValidityDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_ip_advancegrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_ip_advancegrid", "x<?= $Grid->RowIndex ?>_AdvanceValidityDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_AdvanceValidityDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_AdvanceValidityDate" id="o<?= $Grid->RowIndex ?>_AdvanceValidityDate" value="<?= HtmlEncode($Grid->AdvanceValidityDate->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_AdvanceValidityDate" class="form-group">
<input type="<?= $Grid->AdvanceValidityDate->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_AdvanceValidityDate" name="x<?= $Grid->RowIndex ?>_AdvanceValidityDate" id="x<?= $Grid->RowIndex ?>_AdvanceValidityDate" placeholder="<?= HtmlEncode($Grid->AdvanceValidityDate->getPlaceHolder()) ?>" value="<?= $Grid->AdvanceValidityDate->EditValue ?>"<?= $Grid->AdvanceValidityDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->AdvanceValidityDate->getErrorMessage() ?></div>
<?php if (!$Grid->AdvanceValidityDate->ReadOnly && !$Grid->AdvanceValidityDate->Disabled && !isset($Grid->AdvanceValidityDate->EditAttrs["readonly"]) && !isset($Grid->AdvanceValidityDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_ip_advancegrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_ip_advancegrid", "x<?= $Grid->RowIndex ?>_AdvanceValidityDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_AdvanceValidityDate">
<span<?= $Grid->AdvanceValidityDate->viewAttributes() ?>>
<?= $Grid->AdvanceValidityDate->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_AdvanceValidityDate" data-hidden="1" name="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_AdvanceValidityDate" id="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_AdvanceValidityDate" value="<?= HtmlEncode($Grid->AdvanceValidityDate->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_AdvanceValidityDate" data-hidden="1" name="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_AdvanceValidityDate" id="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_AdvanceValidityDate" value="<?= HtmlEncode($Grid->AdvanceValidityDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->TotalRemainingAdvance->Visible) { // TotalRemainingAdvance ?>
        <td data-name="TotalRemainingAdvance" <?= $Grid->TotalRemainingAdvance->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_TotalRemainingAdvance" class="form-group">
<input type="<?= $Grid->TotalRemainingAdvance->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_TotalRemainingAdvance" name="x<?= $Grid->RowIndex ?>_TotalRemainingAdvance" id="x<?= $Grid->RowIndex ?>_TotalRemainingAdvance" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->TotalRemainingAdvance->getPlaceHolder()) ?>" value="<?= $Grid->TotalRemainingAdvance->EditValue ?>"<?= $Grid->TotalRemainingAdvance->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TotalRemainingAdvance->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_TotalRemainingAdvance" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TotalRemainingAdvance" id="o<?= $Grid->RowIndex ?>_TotalRemainingAdvance" value="<?= HtmlEncode($Grid->TotalRemainingAdvance->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_TotalRemainingAdvance" class="form-group">
<input type="<?= $Grid->TotalRemainingAdvance->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_TotalRemainingAdvance" name="x<?= $Grid->RowIndex ?>_TotalRemainingAdvance" id="x<?= $Grid->RowIndex ?>_TotalRemainingAdvance" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->TotalRemainingAdvance->getPlaceHolder()) ?>" value="<?= $Grid->TotalRemainingAdvance->EditValue ?>"<?= $Grid->TotalRemainingAdvance->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TotalRemainingAdvance->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_TotalRemainingAdvance">
<span<?= $Grid->TotalRemainingAdvance->viewAttributes() ?>>
<?= $Grid->TotalRemainingAdvance->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_TotalRemainingAdvance" data-hidden="1" name="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_TotalRemainingAdvance" id="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_TotalRemainingAdvance" value="<?= HtmlEncode($Grid->TotalRemainingAdvance->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_TotalRemainingAdvance" data-hidden="1" name="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_TotalRemainingAdvance" id="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_TotalRemainingAdvance" value="<?= HtmlEncode($Grid->TotalRemainingAdvance->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Remarks->Visible) { // Remarks ?>
        <td data-name="Remarks" <?= $Grid->Remarks->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_Remarks" class="form-group">
<input type="<?= $Grid->Remarks->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_Remarks" name="x<?= $Grid->RowIndex ?>_Remarks" id="x<?= $Grid->RowIndex ?>_Remarks" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Remarks->getPlaceHolder()) ?>" value="<?= $Grid->Remarks->EditValue ?>"<?= $Grid->Remarks->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Remarks->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_Remarks" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Remarks" id="o<?= $Grid->RowIndex ?>_Remarks" value="<?= HtmlEncode($Grid->Remarks->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_Remarks" class="form-group">
<input type="<?= $Grid->Remarks->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_Remarks" name="x<?= $Grid->RowIndex ?>_Remarks" id="x<?= $Grid->RowIndex ?>_Remarks" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Remarks->getPlaceHolder()) ?>" value="<?= $Grid->Remarks->EditValue ?>"<?= $Grid->Remarks->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Remarks->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_Remarks">
<span<?= $Grid->Remarks->viewAttributes() ?>>
<?= $Grid->Remarks->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Remarks" data-hidden="1" name="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_Remarks" id="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_Remarks" value="<?= HtmlEncode($Grid->Remarks->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_Remarks" data-hidden="1" name="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_Remarks" id="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_Remarks" value="<?= HtmlEncode($Grid->Remarks->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
        <td data-name="SeectPaymentMode" <?= $Grid->SeectPaymentMode->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_SeectPaymentMode" class="form-group">
<input type="<?= $Grid->SeectPaymentMode->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_SeectPaymentMode" name="x<?= $Grid->RowIndex ?>_SeectPaymentMode" id="x<?= $Grid->RowIndex ?>_SeectPaymentMode" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->SeectPaymentMode->getPlaceHolder()) ?>" value="<?= $Grid->SeectPaymentMode->EditValue ?>"<?= $Grid->SeectPaymentMode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SeectPaymentMode->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_SeectPaymentMode" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SeectPaymentMode" id="o<?= $Grid->RowIndex ?>_SeectPaymentMode" value="<?= HtmlEncode($Grid->SeectPaymentMode->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_SeectPaymentMode" class="form-group">
<input type="<?= $Grid->SeectPaymentMode->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_SeectPaymentMode" name="x<?= $Grid->RowIndex ?>_SeectPaymentMode" id="x<?= $Grid->RowIndex ?>_SeectPaymentMode" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->SeectPaymentMode->getPlaceHolder()) ?>" value="<?= $Grid->SeectPaymentMode->EditValue ?>"<?= $Grid->SeectPaymentMode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SeectPaymentMode->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_SeectPaymentMode">
<span<?= $Grid->SeectPaymentMode->viewAttributes() ?>>
<?= $Grid->SeectPaymentMode->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_SeectPaymentMode" data-hidden="1" name="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_SeectPaymentMode" id="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_SeectPaymentMode" value="<?= HtmlEncode($Grid->SeectPaymentMode->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_SeectPaymentMode" data-hidden="1" name="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_SeectPaymentMode" id="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_SeectPaymentMode" value="<?= HtmlEncode($Grid->SeectPaymentMode->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PaidAmount->Visible) { // PaidAmount ?>
        <td data-name="PaidAmount" <?= $Grid->PaidAmount->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_PaidAmount" class="form-group">
<input type="<?= $Grid->PaidAmount->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_PaidAmount" name="x<?= $Grid->RowIndex ?>_PaidAmount" id="x<?= $Grid->RowIndex ?>_PaidAmount" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PaidAmount->getPlaceHolder()) ?>" value="<?= $Grid->PaidAmount->EditValue ?>"<?= $Grid->PaidAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PaidAmount->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_PaidAmount" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PaidAmount" id="o<?= $Grid->RowIndex ?>_PaidAmount" value="<?= HtmlEncode($Grid->PaidAmount->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_PaidAmount" class="form-group">
<input type="<?= $Grid->PaidAmount->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_PaidAmount" name="x<?= $Grid->RowIndex ?>_PaidAmount" id="x<?= $Grid->RowIndex ?>_PaidAmount" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PaidAmount->getPlaceHolder()) ?>" value="<?= $Grid->PaidAmount->EditValue ?>"<?= $Grid->PaidAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PaidAmount->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_PaidAmount">
<span<?= $Grid->PaidAmount->viewAttributes() ?>>
<?= $Grid->PaidAmount->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_PaidAmount" data-hidden="1" name="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_PaidAmount" id="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_PaidAmount" value="<?= HtmlEncode($Grid->PaidAmount->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_PaidAmount" data-hidden="1" name="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_PaidAmount" id="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_PaidAmount" value="<?= HtmlEncode($Grid->PaidAmount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Currency->Visible) { // Currency ?>
        <td data-name="Currency" <?= $Grid->Currency->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_Currency" class="form-group">
<input type="<?= $Grid->Currency->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_Currency" name="x<?= $Grid->RowIndex ?>_Currency" id="x<?= $Grid->RowIndex ?>_Currency" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Currency->getPlaceHolder()) ?>" value="<?= $Grid->Currency->EditValue ?>"<?= $Grid->Currency->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Currency->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_Currency" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Currency" id="o<?= $Grid->RowIndex ?>_Currency" value="<?= HtmlEncode($Grid->Currency->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_Currency" class="form-group">
<input type="<?= $Grid->Currency->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_Currency" name="x<?= $Grid->RowIndex ?>_Currency" id="x<?= $Grid->RowIndex ?>_Currency" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Currency->getPlaceHolder()) ?>" value="<?= $Grid->Currency->EditValue ?>"<?= $Grid->Currency->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Currency->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_Currency">
<span<?= $Grid->Currency->viewAttributes() ?>>
<?= $Grid->Currency->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Currency" data-hidden="1" name="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_Currency" id="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_Currency" value="<?= HtmlEncode($Grid->Currency->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_Currency" data-hidden="1" name="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_Currency" id="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_Currency" value="<?= HtmlEncode($Grid->Currency->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->CardNumber->Visible) { // CardNumber ?>
        <td data-name="CardNumber" <?= $Grid->CardNumber->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_CardNumber" class="form-group">
<input type="<?= $Grid->CardNumber->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_CardNumber" name="x<?= $Grid->RowIndex ?>_CardNumber" id="x<?= $Grid->RowIndex ?>_CardNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->CardNumber->getPlaceHolder()) ?>" value="<?= $Grid->CardNumber->EditValue ?>"<?= $Grid->CardNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->CardNumber->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_CardNumber" data-hidden="1" name="o<?= $Grid->RowIndex ?>_CardNumber" id="o<?= $Grid->RowIndex ?>_CardNumber" value="<?= HtmlEncode($Grid->CardNumber->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_CardNumber" class="form-group">
<input type="<?= $Grid->CardNumber->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_CardNumber" name="x<?= $Grid->RowIndex ?>_CardNumber" id="x<?= $Grid->RowIndex ?>_CardNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->CardNumber->getPlaceHolder()) ?>" value="<?= $Grid->CardNumber->EditValue ?>"<?= $Grid->CardNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->CardNumber->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_CardNumber">
<span<?= $Grid->CardNumber->viewAttributes() ?>>
<?= $Grid->CardNumber->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_CardNumber" data-hidden="1" name="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_CardNumber" id="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_CardNumber" value="<?= HtmlEncode($Grid->CardNumber->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_CardNumber" data-hidden="1" name="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_CardNumber" id="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_CardNumber" value="<?= HtmlEncode($Grid->CardNumber->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->BankName->Visible) { // BankName ?>
        <td data-name="BankName" <?= $Grid->BankName->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_BankName" class="form-group">
<input type="<?= $Grid->BankName->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_BankName" name="x<?= $Grid->RowIndex ?>_BankName" id="x<?= $Grid->RowIndex ?>_BankName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->BankName->getPlaceHolder()) ?>" value="<?= $Grid->BankName->EditValue ?>"<?= $Grid->BankName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BankName->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_BankName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BankName" id="o<?= $Grid->RowIndex ?>_BankName" value="<?= HtmlEncode($Grid->BankName->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_BankName" class="form-group">
<input type="<?= $Grid->BankName->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_BankName" name="x<?= $Grid->RowIndex ?>_BankName" id="x<?= $Grid->RowIndex ?>_BankName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->BankName->getPlaceHolder()) ?>" value="<?= $Grid->BankName->EditValue ?>"<?= $Grid->BankName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BankName->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_BankName">
<span<?= $Grid->BankName->viewAttributes() ?>>
<?= $Grid->BankName->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_BankName" data-hidden="1" name="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_BankName" id="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_BankName" value="<?= HtmlEncode($Grid->BankName->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_BankName" data-hidden="1" name="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_BankName" id="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_BankName" value="<?= HtmlEncode($Grid->BankName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Grid->HospID->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_HospID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HospID" id="o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_HospID">
<span<?= $Grid->HospID->viewAttributes() ?>>
<?= $Grid->HospID->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_HospID" data-hidden="1" name="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_HospID" id="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_HospID" data-hidden="1" name="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_HospID" id="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Reception->Visible) { // Reception ?>
        <td data-name="Reception" <?= $Grid->Reception->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->Reception->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_Reception" class="form-group">
<span<?= $Grid->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Reception->getDisplayValue($Grid->Reception->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_Reception" name="x<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_Reception" class="form-group">
<?php $Grid->Reception->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Grid->RowIndex ?>_Reception"><?= EmptyValue(strval($Grid->Reception->ViewValue)) ? $Language->phrase("PleaseSelect") : $Grid->Reception->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Grid->Reception->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Grid->Reception->ReadOnly || $Grid->Reception->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_Reception',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->Reception->getErrorMessage() ?></div>
<?= $Grid->Reception->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_Reception") ?>
<input type="hidden" is="selection-list" data-table="view_ip_advance" data-field="x_Reception" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Grid->Reception->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_Reception" id="x<?= $Grid->RowIndex ?>_Reception" value="<?= $Grid->Reception->CurrentValue ?>"<?= $Grid->Reception->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Reception" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Reception" id="o<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_Reception" class="form-group">
<span<?= $Grid->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Reception->getDisplayValue($Grid->Reception->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_Reception" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Reception" id="x<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_Reception">
<span<?= $Grid->Reception->viewAttributes() ?>>
<?= $Grid->Reception->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Reception" data-hidden="1" name="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_Reception" id="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_Reception" data-hidden="1" name="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_Reception" id="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->mrnno->Visible) { // mrnno ?>
        <td data-name="mrnno" <?= $Grid->mrnno->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->mrnno->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_mrnno" class="form-group">
<span<?= $Grid->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->mrnno->getDisplayValue($Grid->mrnno->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_mrnno" name="x<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_mrnno" class="form-group">
<input type="<?= $Grid->mrnno->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_mrnno" name="x<?= $Grid->RowIndex ?>_mrnno" id="x<?= $Grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->mrnno->getPlaceHolder()) ?>" value="<?= $Grid->mrnno->EditValue ?>"<?= $Grid->mrnno->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->mrnno->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_mrnno" data-hidden="1" name="o<?= $Grid->RowIndex ?>_mrnno" id="o<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_mrnno" class="form-group">
<span<?= $Grid->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->mrnno->getDisplayValue($Grid->mrnno->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_mrnno" data-hidden="1" name="x<?= $Grid->RowIndex ?>_mrnno" id="x<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_ip_advance_mrnno">
<span<?= $Grid->mrnno->viewAttributes() ?>>
<?= $Grid->mrnno->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_mrnno" data-hidden="1" name="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_mrnno" id="fview_ip_advancegrid$x<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->FormValue) ?>">
<input type="hidden" data-table="view_ip_advance" data-field="x_mrnno" data-hidden="1" name="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_mrnno" id="fview_ip_advancegrid$o<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->OldValue) ?>">
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
loadjs.ready(["fview_ip_advancegrid","load"], function () {
    fview_ip_advancegrid.updateLists(<?= $Grid->RowIndex ?>);
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowIndex, "id" => "r0_view_ip_advance", "data-rowtype" => ROWTYPE_ADD]);
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
<span id="el$rowindex$_view_ip_advance_id" class="form-group view_ip_advance_id"></span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_id" class="form-group view_ip_advance_id">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Name->Visible) { // Name ?>
        <td data-name="Name">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_Name" class="form-group view_ip_advance_Name">
<input type="<?= $Grid->Name->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_Name" name="x<?= $Grid->RowIndex ?>_Name" id="x<?= $Grid->RowIndex ?>_Name" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Name->getPlaceHolder()) ?>" value="<?= $Grid->Name->EditValue ?>"<?= $Grid->Name->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Name->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_Name" class="form-group view_ip_advance_Name">
<span<?= $Grid->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Name->getDisplayValue($Grid->Name->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_Name" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Name" id="x<?= $Grid->RowIndex ?>_Name" value="<?= HtmlEncode($Grid->Name->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Name" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Name" id="o<?= $Grid->RowIndex ?>_Name" value="<?= HtmlEncode($Grid->Name->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Mobile->Visible) { // Mobile ?>
        <td data-name="Mobile">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_Mobile" class="form-group view_ip_advance_Mobile">
<input type="<?= $Grid->Mobile->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_Mobile" name="x<?= $Grid->RowIndex ?>_Mobile" id="x<?= $Grid->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Mobile->getPlaceHolder()) ?>" value="<?= $Grid->Mobile->EditValue ?>"<?= $Grid->Mobile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Mobile->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_Mobile" class="form-group view_ip_advance_Mobile">
<span<?= $Grid->Mobile->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Mobile->getDisplayValue($Grid->Mobile->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_Mobile" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Mobile" id="x<?= $Grid->RowIndex ?>_Mobile" value="<?= HtmlEncode($Grid->Mobile->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Mobile" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Mobile" id="o<?= $Grid->RowIndex ?>_Mobile" value="<?= HtmlEncode($Grid->Mobile->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->voucher_type->Visible) { // voucher_type ?>
        <td data-name="voucher_type">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_voucher_type" class="form-group view_ip_advance_voucher_type">
<input type="<?= $Grid->voucher_type->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_voucher_type" name="x<?= $Grid->RowIndex ?>_voucher_type" id="x<?= $Grid->RowIndex ?>_voucher_type" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->voucher_type->getPlaceHolder()) ?>" value="<?= $Grid->voucher_type->EditValue ?>"<?= $Grid->voucher_type->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->voucher_type->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_voucher_type" class="form-group view_ip_advance_voucher_type">
<span<?= $Grid->voucher_type->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->voucher_type->getDisplayValue($Grid->voucher_type->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_voucher_type" data-hidden="1" name="x<?= $Grid->RowIndex ?>_voucher_type" id="x<?= $Grid->RowIndex ?>_voucher_type" value="<?= HtmlEncode($Grid->voucher_type->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_voucher_type" data-hidden="1" name="o<?= $Grid->RowIndex ?>_voucher_type" id="o<?= $Grid->RowIndex ?>_voucher_type" value="<?= HtmlEncode($Grid->voucher_type->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Details->Visible) { // Details ?>
        <td data-name="Details">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_Details" class="form-group view_ip_advance_Details">
<input type="<?= $Grid->Details->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_Details" name="x<?= $Grid->RowIndex ?>_Details" id="x<?= $Grid->RowIndex ?>_Details" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Details->getPlaceHolder()) ?>" value="<?= $Grid->Details->EditValue ?>"<?= $Grid->Details->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Details->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_Details" class="form-group view_ip_advance_Details">
<span<?= $Grid->Details->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Details->getDisplayValue($Grid->Details->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_Details" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Details" id="x<?= $Grid->RowIndex ?>_Details" value="<?= HtmlEncode($Grid->Details->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Details" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Details" id="o<?= $Grid->RowIndex ?>_Details" value="<?= HtmlEncode($Grid->Details->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ModeofPayment->Visible) { // ModeofPayment ?>
        <td data-name="ModeofPayment">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_ModeofPayment" class="form-group view_ip_advance_ModeofPayment">
    <select
        id="x<?= $Grid->RowIndex ?>_ModeofPayment"
        name="x<?= $Grid->RowIndex ?>_ModeofPayment"
        class="form-control ew-select<?= $Grid->ModeofPayment->isInvalidClass() ?>"
        data-select2-id="view_ip_advance_x<?= $Grid->RowIndex ?>_ModeofPayment"
        data-table="view_ip_advance"
        data-field="x_ModeofPayment"
        data-value-separator="<?= $Grid->ModeofPayment->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->ModeofPayment->getPlaceHolder()) ?>"
        <?= $Grid->ModeofPayment->editAttributes() ?>>
        <?= $Grid->ModeofPayment->selectOptionListHtml("x{$Grid->RowIndex}_ModeofPayment") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->ModeofPayment->getErrorMessage() ?></div>
<?= $Grid->ModeofPayment->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_ModeofPayment") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_ip_advance_x<?= $Grid->RowIndex ?>_ModeofPayment']"),
        options = { name: "x<?= $Grid->RowIndex ?>_ModeofPayment", selectId: "view_ip_advance_x<?= $Grid->RowIndex ?>_ModeofPayment", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_ip_advance.fields.ModeofPayment.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_ModeofPayment" class="form-group view_ip_advance_ModeofPayment">
<span<?= $Grid->ModeofPayment->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ModeofPayment->getDisplayValue($Grid->ModeofPayment->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_ModeofPayment" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ModeofPayment" id="x<?= $Grid->RowIndex ?>_ModeofPayment" value="<?= HtmlEncode($Grid->ModeofPayment->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_ModeofPayment" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ModeofPayment" id="o<?= $Grid->RowIndex ?>_ModeofPayment" value="<?= HtmlEncode($Grid->ModeofPayment->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Amount->Visible) { // Amount ?>
        <td data-name="Amount">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_Amount" class="form-group view_ip_advance_Amount">
<input type="<?= $Grid->Amount->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_Amount" name="x<?= $Grid->RowIndex ?>_Amount" id="x<?= $Grid->RowIndex ?>_Amount" size="30" placeholder="<?= HtmlEncode($Grid->Amount->getPlaceHolder()) ?>" value="<?= $Grid->Amount->EditValue ?>"<?= $Grid->Amount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Amount->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_Amount" class="form-group view_ip_advance_Amount">
<span<?= $Grid->Amount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Amount->getDisplayValue($Grid->Amount->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_Amount" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Amount" id="x<?= $Grid->RowIndex ?>_Amount" value="<?= HtmlEncode($Grid->Amount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Amount" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Amount" id="o<?= $Grid->RowIndex ?>_Amount" value="<?= HtmlEncode($Grid->Amount->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->AnyDues->Visible) { // AnyDues ?>
        <td data-name="AnyDues">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_AnyDues" class="form-group view_ip_advance_AnyDues">
<input type="<?= $Grid->AnyDues->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_AnyDues" name="x<?= $Grid->RowIndex ?>_AnyDues" id="x<?= $Grid->RowIndex ?>_AnyDues" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->AnyDues->getPlaceHolder()) ?>" value="<?= $Grid->AnyDues->EditValue ?>"<?= $Grid->AnyDues->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->AnyDues->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_AnyDues" class="form-group view_ip_advance_AnyDues">
<span<?= $Grid->AnyDues->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->AnyDues->getDisplayValue($Grid->AnyDues->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_AnyDues" data-hidden="1" name="x<?= $Grid->RowIndex ?>_AnyDues" id="x<?= $Grid->RowIndex ?>_AnyDues" value="<?= HtmlEncode($Grid->AnyDues->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_AnyDues" data-hidden="1" name="o<?= $Grid->RowIndex ?>_AnyDues" id="o<?= $Grid->RowIndex ?>_AnyDues" value="<?= HtmlEncode($Grid->AnyDues->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->createdby->Visible) { // createdby ?>
        <td data-name="createdby">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_createdby" class="form-group view_ip_advance_createdby">
<span<?= $Grid->createdby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->createdby->getDisplayValue($Grid->createdby->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_createdby" data-hidden="1" name="x<?= $Grid->RowIndex ?>_createdby" id="x<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_createdby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createdby" id="o<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_createddatetime" class="form-group view_ip_advance_createddatetime">
<span<?= $Grid->createddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->createddatetime->getDisplayValue($Grid->createddatetime->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_createddatetime" data-hidden="1" name="x<?= $Grid->RowIndex ?>_createddatetime" id="x<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_createddatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createddatetime" id="o<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_modifiedby" class="form-group view_ip_advance_modifiedby">
<span<?= $Grid->modifiedby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->modifiedby->getDisplayValue($Grid->modifiedby->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_modifiedby" data-hidden="1" name="x<?= $Grid->RowIndex ?>_modifiedby" id="x<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_modifiedby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_modifiedby" id="o<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_modifieddatetime" class="form-group view_ip_advance_modifieddatetime">
<span<?= $Grid->modifieddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->modifieddatetime->getDisplayValue($Grid->modifieddatetime->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_modifieddatetime" data-hidden="1" name="x<?= $Grid->RowIndex ?>_modifieddatetime" id="x<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_modifieddatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_modifieddatetime" id="o<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PatID->Visible) { // PatID ?>
        <td data-name="PatID">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->PatID->getSessionValue() != "") { ?>
<span id="el$rowindex$_view_ip_advance_PatID" class="form-group view_ip_advance_PatID">
<span<?= $Grid->PatID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatID->getDisplayValue($Grid->PatID->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_PatID" name="x<?= $Grid->RowIndex ?>_PatID" value="<?= HtmlEncode($Grid->PatID->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_PatID" class="form-group view_ip_advance_PatID">
<input type="<?= $Grid->PatID->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_PatID" name="x<?= $Grid->RowIndex ?>_PatID" id="x<?= $Grid->RowIndex ?>_PatID" size="30" placeholder="<?= HtmlEncode($Grid->PatID->getPlaceHolder()) ?>" value="<?= $Grid->PatID->EditValue ?>"<?= $Grid->PatID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatID->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_PatID" class="form-group view_ip_advance_PatID">
<span<?= $Grid->PatID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatID->getDisplayValue($Grid->PatID->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_PatID" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PatID" id="x<?= $Grid->RowIndex ?>_PatID" value="<?= HtmlEncode($Grid->PatID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_PatID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatID" id="o<?= $Grid->RowIndex ?>_PatID" value="<?= HtmlEncode($Grid->PatID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PatientID->Visible) { // PatientID ?>
        <td data-name="PatientID">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_PatientID" class="form-group view_ip_advance_PatientID">
<input type="<?= $Grid->PatientID->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_PatientID" name="x<?= $Grid->RowIndex ?>_PatientID" id="x<?= $Grid->RowIndex ?>_PatientID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatientID->getPlaceHolder()) ?>" value="<?= $Grid->PatientID->EditValue ?>"<?= $Grid->PatientID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientID->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_PatientID" class="form-group view_ip_advance_PatientID">
<span<?= $Grid->PatientID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatientID->getDisplayValue($Grid->PatientID->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_PatientID" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PatientID" id="x<?= $Grid->RowIndex ?>_PatientID" value="<?= HtmlEncode($Grid->PatientID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_PatientID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatientID" id="o<?= $Grid->RowIndex ?>_PatientID" value="<?= HtmlEncode($Grid->PatientID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_PatientName" class="form-group view_ip_advance_PatientName">
<input type="<?= $Grid->PatientName->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_PatientName" name="x<?= $Grid->RowIndex ?>_PatientName" id="x<?= $Grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatientName->getPlaceHolder()) ?>" value="<?= $Grid->PatientName->EditValue ?>"<?= $Grid->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientName->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_PatientName" class="form-group view_ip_advance_PatientName">
<span<?= $Grid->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatientName->getDisplayValue($Grid->PatientName->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_PatientName" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PatientName" id="x<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_PatientName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatientName" id="o<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->VisiteType->Visible) { // VisiteType ?>
        <td data-name="VisiteType">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_VisiteType" class="form-group view_ip_advance_VisiteType">
<input type="<?= $Grid->VisiteType->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_VisiteType" name="x<?= $Grid->RowIndex ?>_VisiteType" id="x<?= $Grid->RowIndex ?>_VisiteType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->VisiteType->getPlaceHolder()) ?>" value="<?= $Grid->VisiteType->EditValue ?>"<?= $Grid->VisiteType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->VisiteType->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_VisiteType" class="form-group view_ip_advance_VisiteType">
<span<?= $Grid->VisiteType->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->VisiteType->getDisplayValue($Grid->VisiteType->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_VisiteType" data-hidden="1" name="x<?= $Grid->RowIndex ?>_VisiteType" id="x<?= $Grid->RowIndex ?>_VisiteType" value="<?= HtmlEncode($Grid->VisiteType->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_VisiteType" data-hidden="1" name="o<?= $Grid->RowIndex ?>_VisiteType" id="o<?= $Grid->RowIndex ?>_VisiteType" value="<?= HtmlEncode($Grid->VisiteType->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->VisitDate->Visible) { // VisitDate ?>
        <td data-name="VisitDate">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_VisitDate" class="form-group view_ip_advance_VisitDate">
<input type="<?= $Grid->VisitDate->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_VisitDate" name="x<?= $Grid->RowIndex ?>_VisitDate" id="x<?= $Grid->RowIndex ?>_VisitDate" placeholder="<?= HtmlEncode($Grid->VisitDate->getPlaceHolder()) ?>" value="<?= $Grid->VisitDate->EditValue ?>"<?= $Grid->VisitDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->VisitDate->getErrorMessage() ?></div>
<?php if (!$Grid->VisitDate->ReadOnly && !$Grid->VisitDate->Disabled && !isset($Grid->VisitDate->EditAttrs["readonly"]) && !isset($Grid->VisitDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_ip_advancegrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_ip_advancegrid", "x<?= $Grid->RowIndex ?>_VisitDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_VisitDate" class="form-group view_ip_advance_VisitDate">
<span<?= $Grid->VisitDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->VisitDate->getDisplayValue($Grid->VisitDate->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_VisitDate" data-hidden="1" name="x<?= $Grid->RowIndex ?>_VisitDate" id="x<?= $Grid->RowIndex ?>_VisitDate" value="<?= HtmlEncode($Grid->VisitDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_VisitDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_VisitDate" id="o<?= $Grid->RowIndex ?>_VisitDate" value="<?= HtmlEncode($Grid->VisitDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->AdvanceNo->Visible) { // AdvanceNo ?>
        <td data-name="AdvanceNo">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_AdvanceNo" class="form-group view_ip_advance_AdvanceNo">
<input type="<?= $Grid->AdvanceNo->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_AdvanceNo" name="x<?= $Grid->RowIndex ?>_AdvanceNo" id="x<?= $Grid->RowIndex ?>_AdvanceNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->AdvanceNo->getPlaceHolder()) ?>" value="<?= $Grid->AdvanceNo->EditValue ?>"<?= $Grid->AdvanceNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->AdvanceNo->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_AdvanceNo" class="form-group view_ip_advance_AdvanceNo">
<span<?= $Grid->AdvanceNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->AdvanceNo->getDisplayValue($Grid->AdvanceNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_AdvanceNo" data-hidden="1" name="x<?= $Grid->RowIndex ?>_AdvanceNo" id="x<?= $Grid->RowIndex ?>_AdvanceNo" value="<?= HtmlEncode($Grid->AdvanceNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_AdvanceNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_AdvanceNo" id="o<?= $Grid->RowIndex ?>_AdvanceNo" value="<?= HtmlEncode($Grid->AdvanceNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Status->Visible) { // Status ?>
        <td data-name="Status">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_Status" class="form-group view_ip_advance_Status">
<input type="<?= $Grid->Status->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_Status" name="x<?= $Grid->RowIndex ?>_Status" id="x<?= $Grid->RowIndex ?>_Status" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Status->getPlaceHolder()) ?>" value="<?= $Grid->Status->EditValue ?>"<?= $Grid->Status->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Status->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_Status" class="form-group view_ip_advance_Status">
<span<?= $Grid->Status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Status->getDisplayValue($Grid->Status->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_Status" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Status" id="x<?= $Grid->RowIndex ?>_Status" value="<?= HtmlEncode($Grid->Status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Status" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Status" id="o<?= $Grid->RowIndex ?>_Status" value="<?= HtmlEncode($Grid->Status->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Date->Visible) { // Date ?>
        <td data-name="Date">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_Date" class="form-group view_ip_advance_Date">
<input type="<?= $Grid->Date->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_Date" name="x<?= $Grid->RowIndex ?>_Date" id="x<?= $Grid->RowIndex ?>_Date" placeholder="<?= HtmlEncode($Grid->Date->getPlaceHolder()) ?>" value="<?= $Grid->Date->EditValue ?>"<?= $Grid->Date->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Date->getErrorMessage() ?></div>
<?php if (!$Grid->Date->ReadOnly && !$Grid->Date->Disabled && !isset($Grid->Date->EditAttrs["readonly"]) && !isset($Grid->Date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_ip_advancegrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_ip_advancegrid", "x<?= $Grid->RowIndex ?>_Date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_Date" class="form-group view_ip_advance_Date">
<span<?= $Grid->Date->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Date->getDisplayValue($Grid->Date->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_Date" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Date" id="x<?= $Grid->RowIndex ?>_Date" value="<?= HtmlEncode($Grid->Date->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Date" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Date" id="o<?= $Grid->RowIndex ?>_Date" value="<?= HtmlEncode($Grid->Date->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->AdvanceValidityDate->Visible) { // AdvanceValidityDate ?>
        <td data-name="AdvanceValidityDate">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_AdvanceValidityDate" class="form-group view_ip_advance_AdvanceValidityDate">
<input type="<?= $Grid->AdvanceValidityDate->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_AdvanceValidityDate" name="x<?= $Grid->RowIndex ?>_AdvanceValidityDate" id="x<?= $Grid->RowIndex ?>_AdvanceValidityDate" placeholder="<?= HtmlEncode($Grid->AdvanceValidityDate->getPlaceHolder()) ?>" value="<?= $Grid->AdvanceValidityDate->EditValue ?>"<?= $Grid->AdvanceValidityDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->AdvanceValidityDate->getErrorMessage() ?></div>
<?php if (!$Grid->AdvanceValidityDate->ReadOnly && !$Grid->AdvanceValidityDate->Disabled && !isset($Grid->AdvanceValidityDate->EditAttrs["readonly"]) && !isset($Grid->AdvanceValidityDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_ip_advancegrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_ip_advancegrid", "x<?= $Grid->RowIndex ?>_AdvanceValidityDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_AdvanceValidityDate" class="form-group view_ip_advance_AdvanceValidityDate">
<span<?= $Grid->AdvanceValidityDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->AdvanceValidityDate->getDisplayValue($Grid->AdvanceValidityDate->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_AdvanceValidityDate" data-hidden="1" name="x<?= $Grid->RowIndex ?>_AdvanceValidityDate" id="x<?= $Grid->RowIndex ?>_AdvanceValidityDate" value="<?= HtmlEncode($Grid->AdvanceValidityDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_AdvanceValidityDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_AdvanceValidityDate" id="o<?= $Grid->RowIndex ?>_AdvanceValidityDate" value="<?= HtmlEncode($Grid->AdvanceValidityDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->TotalRemainingAdvance->Visible) { // TotalRemainingAdvance ?>
        <td data-name="TotalRemainingAdvance">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_TotalRemainingAdvance" class="form-group view_ip_advance_TotalRemainingAdvance">
<input type="<?= $Grid->TotalRemainingAdvance->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_TotalRemainingAdvance" name="x<?= $Grid->RowIndex ?>_TotalRemainingAdvance" id="x<?= $Grid->RowIndex ?>_TotalRemainingAdvance" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->TotalRemainingAdvance->getPlaceHolder()) ?>" value="<?= $Grid->TotalRemainingAdvance->EditValue ?>"<?= $Grid->TotalRemainingAdvance->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TotalRemainingAdvance->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_TotalRemainingAdvance" class="form-group view_ip_advance_TotalRemainingAdvance">
<span<?= $Grid->TotalRemainingAdvance->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->TotalRemainingAdvance->getDisplayValue($Grid->TotalRemainingAdvance->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_TotalRemainingAdvance" data-hidden="1" name="x<?= $Grid->RowIndex ?>_TotalRemainingAdvance" id="x<?= $Grid->RowIndex ?>_TotalRemainingAdvance" value="<?= HtmlEncode($Grid->TotalRemainingAdvance->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_TotalRemainingAdvance" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TotalRemainingAdvance" id="o<?= $Grid->RowIndex ?>_TotalRemainingAdvance" value="<?= HtmlEncode($Grid->TotalRemainingAdvance->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Remarks->Visible) { // Remarks ?>
        <td data-name="Remarks">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_Remarks" class="form-group view_ip_advance_Remarks">
<input type="<?= $Grid->Remarks->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_Remarks" name="x<?= $Grid->RowIndex ?>_Remarks" id="x<?= $Grid->RowIndex ?>_Remarks" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Remarks->getPlaceHolder()) ?>" value="<?= $Grid->Remarks->EditValue ?>"<?= $Grid->Remarks->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Remarks->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_Remarks" class="form-group view_ip_advance_Remarks">
<span<?= $Grid->Remarks->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Remarks->getDisplayValue($Grid->Remarks->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_Remarks" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Remarks" id="x<?= $Grid->RowIndex ?>_Remarks" value="<?= HtmlEncode($Grid->Remarks->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Remarks" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Remarks" id="o<?= $Grid->RowIndex ?>_Remarks" value="<?= HtmlEncode($Grid->Remarks->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
        <td data-name="SeectPaymentMode">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_SeectPaymentMode" class="form-group view_ip_advance_SeectPaymentMode">
<input type="<?= $Grid->SeectPaymentMode->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_SeectPaymentMode" name="x<?= $Grid->RowIndex ?>_SeectPaymentMode" id="x<?= $Grid->RowIndex ?>_SeectPaymentMode" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->SeectPaymentMode->getPlaceHolder()) ?>" value="<?= $Grid->SeectPaymentMode->EditValue ?>"<?= $Grid->SeectPaymentMode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SeectPaymentMode->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_SeectPaymentMode" class="form-group view_ip_advance_SeectPaymentMode">
<span<?= $Grid->SeectPaymentMode->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->SeectPaymentMode->getDisplayValue($Grid->SeectPaymentMode->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_SeectPaymentMode" data-hidden="1" name="x<?= $Grid->RowIndex ?>_SeectPaymentMode" id="x<?= $Grid->RowIndex ?>_SeectPaymentMode" value="<?= HtmlEncode($Grid->SeectPaymentMode->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_SeectPaymentMode" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SeectPaymentMode" id="o<?= $Grid->RowIndex ?>_SeectPaymentMode" value="<?= HtmlEncode($Grid->SeectPaymentMode->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PaidAmount->Visible) { // PaidAmount ?>
        <td data-name="PaidAmount">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_PaidAmount" class="form-group view_ip_advance_PaidAmount">
<input type="<?= $Grid->PaidAmount->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_PaidAmount" name="x<?= $Grid->RowIndex ?>_PaidAmount" id="x<?= $Grid->RowIndex ?>_PaidAmount" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PaidAmount->getPlaceHolder()) ?>" value="<?= $Grid->PaidAmount->EditValue ?>"<?= $Grid->PaidAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PaidAmount->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_PaidAmount" class="form-group view_ip_advance_PaidAmount">
<span<?= $Grid->PaidAmount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PaidAmount->getDisplayValue($Grid->PaidAmount->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_PaidAmount" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PaidAmount" id="x<?= $Grid->RowIndex ?>_PaidAmount" value="<?= HtmlEncode($Grid->PaidAmount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_PaidAmount" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PaidAmount" id="o<?= $Grid->RowIndex ?>_PaidAmount" value="<?= HtmlEncode($Grid->PaidAmount->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Currency->Visible) { // Currency ?>
        <td data-name="Currency">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_Currency" class="form-group view_ip_advance_Currency">
<input type="<?= $Grid->Currency->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_Currency" name="x<?= $Grid->RowIndex ?>_Currency" id="x<?= $Grid->RowIndex ?>_Currency" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Currency->getPlaceHolder()) ?>" value="<?= $Grid->Currency->EditValue ?>"<?= $Grid->Currency->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Currency->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_Currency" class="form-group view_ip_advance_Currency">
<span<?= $Grid->Currency->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Currency->getDisplayValue($Grid->Currency->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_Currency" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Currency" id="x<?= $Grid->RowIndex ?>_Currency" value="<?= HtmlEncode($Grid->Currency->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Currency" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Currency" id="o<?= $Grid->RowIndex ?>_Currency" value="<?= HtmlEncode($Grid->Currency->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->CardNumber->Visible) { // CardNumber ?>
        <td data-name="CardNumber">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_CardNumber" class="form-group view_ip_advance_CardNumber">
<input type="<?= $Grid->CardNumber->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_CardNumber" name="x<?= $Grid->RowIndex ?>_CardNumber" id="x<?= $Grid->RowIndex ?>_CardNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->CardNumber->getPlaceHolder()) ?>" value="<?= $Grid->CardNumber->EditValue ?>"<?= $Grid->CardNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->CardNumber->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_CardNumber" class="form-group view_ip_advance_CardNumber">
<span<?= $Grid->CardNumber->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->CardNumber->getDisplayValue($Grid->CardNumber->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_CardNumber" data-hidden="1" name="x<?= $Grid->RowIndex ?>_CardNumber" id="x<?= $Grid->RowIndex ?>_CardNumber" value="<?= HtmlEncode($Grid->CardNumber->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_CardNumber" data-hidden="1" name="o<?= $Grid->RowIndex ?>_CardNumber" id="o<?= $Grid->RowIndex ?>_CardNumber" value="<?= HtmlEncode($Grid->CardNumber->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->BankName->Visible) { // BankName ?>
        <td data-name="BankName">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_ip_advance_BankName" class="form-group view_ip_advance_BankName">
<input type="<?= $Grid->BankName->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_BankName" name="x<?= $Grid->RowIndex ?>_BankName" id="x<?= $Grid->RowIndex ?>_BankName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->BankName->getPlaceHolder()) ?>" value="<?= $Grid->BankName->EditValue ?>"<?= $Grid->BankName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BankName->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_BankName" class="form-group view_ip_advance_BankName">
<span<?= $Grid->BankName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->BankName->getDisplayValue($Grid->BankName->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_BankName" data-hidden="1" name="x<?= $Grid->RowIndex ?>_BankName" id="x<?= $Grid->RowIndex ?>_BankName" value="<?= HtmlEncode($Grid->BankName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_BankName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BankName" id="o<?= $Grid->RowIndex ?>_BankName" value="<?= HtmlEncode($Grid->BankName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->HospID->Visible) { // HospID ?>
        <td data-name="HospID">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_HospID" class="form-group view_ip_advance_HospID">
<span<?= $Grid->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->HospID->getDisplayValue($Grid->HospID->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_HospID" data-hidden="1" name="x<?= $Grid->RowIndex ?>_HospID" id="x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_HospID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HospID" id="o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Reception->Visible) { // Reception ?>
        <td data-name="Reception">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->Reception->getSessionValue() != "") { ?>
<span id="el$rowindex$_view_ip_advance_Reception" class="form-group view_ip_advance_Reception">
<span<?= $Grid->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Reception->getDisplayValue($Grid->Reception->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_Reception" name="x<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_Reception" class="form-group view_ip_advance_Reception">
<?php $Grid->Reception->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Grid->RowIndex ?>_Reception"><?= EmptyValue(strval($Grid->Reception->ViewValue)) ? $Language->phrase("PleaseSelect") : $Grid->Reception->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Grid->Reception->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Grid->Reception->ReadOnly || $Grid->Reception->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_Reception',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->Reception->getErrorMessage() ?></div>
<?= $Grid->Reception->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_Reception") ?>
<input type="hidden" is="selection-list" data-table="view_ip_advance" data-field="x_Reception" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Grid->Reception->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_Reception" id="x<?= $Grid->RowIndex ?>_Reception" value="<?= $Grid->Reception->CurrentValue ?>"<?= $Grid->Reception->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_Reception" class="form-group view_ip_advance_Reception">
<span<?= $Grid->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Reception->getDisplayValue($Grid->Reception->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_Reception" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Reception" id="x<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_Reception" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Reception" id="o<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->mrnno->Visible) { // mrnno ?>
        <td data-name="mrnno">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->mrnno->getSessionValue() != "") { ?>
<span id="el$rowindex$_view_ip_advance_mrnno" class="form-group view_ip_advance_mrnno">
<span<?= $Grid->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->mrnno->getDisplayValue($Grid->mrnno->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_mrnno" name="x<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_mrnno" class="form-group view_ip_advance_mrnno">
<input type="<?= $Grid->mrnno->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_mrnno" name="x<?= $Grid->RowIndex ?>_mrnno" id="x<?= $Grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->mrnno->getPlaceHolder()) ?>" value="<?= $Grid->mrnno->EditValue ?>"<?= $Grid->mrnno->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->mrnno->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_ip_advance_mrnno" class="form-group view_ip_advance_mrnno">
<span<?= $Grid->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->mrnno->getDisplayValue($Grid->mrnno->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_ip_advance" data-field="x_mrnno" data-hidden="1" name="x<?= $Grid->RowIndex ?>_mrnno" id="x<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_ip_advance" data-field="x_mrnno" data-hidden="1" name="o<?= $Grid->RowIndex ?>_mrnno" id="o<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Grid->ListOptions->render("body", "right", $Grid->RowIndex);
?>
<script>
loadjs.ready(["fview_ip_advancegrid","load"], function() {
    fview_ip_advancegrid.updateLists(<?= $Grid->RowIndex ?>);
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
<input type="hidden" name="detailpage" value="fview_ip_advancegrid">
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
    ew.addEventHandlers("view_ip_advance");
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
        container: "gmp_view_ip_advance",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>
