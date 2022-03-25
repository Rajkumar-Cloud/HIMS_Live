<?php

namespace PHPMaker2021\HIMS;

// Page object
$TaskManagementDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var ftask_managementdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    ftask_managementdelete = currentForm = new ew.Form("ftask_managementdelete", "delete");
    loadjs.done("ftask_managementdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.task_management) ew.vars.tables.task_management = <?= JsonEncode(GetClientVar("tables", "task_management")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="ftask_managementdelete" id="ftask_managementdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="task_management">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($Page->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?= HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
    <thead>
    <tr class="ew-table-header">
<?php if ($Page->id->Visible) { // id ?>
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_task_management_id" class="task_management_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TaskName->Visible) { // TaskName ?>
        <th class="<?= $Page->TaskName->headerCellClass() ?>"><span id="elh_task_management_TaskName" class="task_management_TaskName"><?= $Page->TaskName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AssignTo->Visible) { // AssignTo ?>
        <th class="<?= $Page->AssignTo->headerCellClass() ?>"><span id="elh_task_management_AssignTo" class="task_management_AssignTo"><?= $Page->AssignTo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StartDate->Visible) { // StartDate ?>
        <th class="<?= $Page->StartDate->headerCellClass() ?>"><span id="elh_task_management_StartDate" class="task_management_StartDate"><?= $Page->StartDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EndDate->Visible) { // EndDate ?>
        <th class="<?= $Page->EndDate->headerCellClass() ?>"><span id="elh_task_management_EndDate" class="task_management_EndDate"><?= $Page->EndDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StatusOfTask->Visible) { // StatusOfTask ?>
        <th class="<?= $Page->StatusOfTask->headerCellClass() ?>"><span id="elh_task_management_StatusOfTask" class="task_management_StatusOfTask"><?= $Page->StatusOfTask->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ForwardTo->Visible) { // ForwardTo ?>
        <th class="<?= $Page->ForwardTo->headerCellClass() ?>"><span id="elh_task_management_ForwardTo" class="task_management_ForwardTo"><?= $Page->ForwardTo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th class="<?= $Page->createdby->headerCellClass() ?>"><span id="elh_task_management_createdby" class="task_management_createdby"><?= $Page->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th class="<?= $Page->createddatetime->headerCellClass() ?>"><span id="elh_task_management_createddatetime" class="task_management_createddatetime"><?= $Page->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th class="<?= $Page->modifiedby->headerCellClass() ?>"><span id="elh_task_management_modifiedby" class="task_management_modifiedby"><?= $Page->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th class="<?= $Page->modifieddatetime->headerCellClass() ?>"><span id="elh_task_management_modifieddatetime" class="task_management_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GetUserName->Visible) { // GetUserName ?>
        <th class="<?= $Page->GetUserName->headerCellClass() ?>"><span id="elh_task_management_GetUserName" class="task_management_GetUserName"><?= $Page->GetUserName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GetModifiedName->Visible) { // GetModifiedName ?>
        <th class="<?= $Page->GetModifiedName->headerCellClass() ?>"><span id="elh_task_management_GetModifiedName" class="task_management_GetModifiedName"><?= $Page->GetModifiedName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th class="<?= $Page->HospID->headerCellClass() ?>"><span id="elh_task_management_HospID" class="task_management_HospID"><?= $Page->HospID->caption() ?></span></th>
<?php } ?>
    </tr>
    </thead>
    <tbody>
<?php
$Page->RecordCount = 0;
$i = 0;
while (!$Page->Recordset->EOF) {
    $Page->RecordCount++;
    $Page->RowCount++;

    // Set row properties
    $Page->resetAttributes();
    $Page->RowType = ROWTYPE_VIEW; // View

    // Get the field contents
    $Page->loadRowValues($Page->Recordset);

    // Render row
    $Page->renderRow();
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php if ($Page->id->Visible) { // id ?>
        <td <?= $Page->id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_task_management_id" class="task_management_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TaskName->Visible) { // TaskName ?>
        <td <?= $Page->TaskName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_task_management_TaskName" class="task_management_TaskName">
<span<?= $Page->TaskName->viewAttributes() ?>>
<?= $Page->TaskName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AssignTo->Visible) { // AssignTo ?>
        <td <?= $Page->AssignTo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_task_management_AssignTo" class="task_management_AssignTo">
<span<?= $Page->AssignTo->viewAttributes() ?>>
<?= $Page->AssignTo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StartDate->Visible) { // StartDate ?>
        <td <?= $Page->StartDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_task_management_StartDate" class="task_management_StartDate">
<span<?= $Page->StartDate->viewAttributes() ?>>
<?= $Page->StartDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EndDate->Visible) { // EndDate ?>
        <td <?= $Page->EndDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_task_management_EndDate" class="task_management_EndDate">
<span<?= $Page->EndDate->viewAttributes() ?>>
<?= $Page->EndDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StatusOfTask->Visible) { // StatusOfTask ?>
        <td <?= $Page->StatusOfTask->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_task_management_StatusOfTask" class="task_management_StatusOfTask">
<span<?= $Page->StatusOfTask->viewAttributes() ?>>
<?= $Page->StatusOfTask->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ForwardTo->Visible) { // ForwardTo ?>
        <td <?= $Page->ForwardTo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_task_management_ForwardTo" class="task_management_ForwardTo">
<span<?= $Page->ForwardTo->viewAttributes() ?>>
<?= $Page->ForwardTo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <td <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_task_management_createdby" class="task_management_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_task_management_createddatetime" class="task_management_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_task_management_modifiedby" class="task_management_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_task_management_modifieddatetime" class="task_management_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GetUserName->Visible) { // GetUserName ?>
        <td <?= $Page->GetUserName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_task_management_GetUserName" class="task_management_GetUserName">
<span<?= $Page->GetUserName->viewAttributes() ?>>
<?= $Page->GetUserName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GetModifiedName->Visible) { // GetModifiedName ?>
        <td <?= $Page->GetModifiedName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_task_management_GetModifiedName" class="task_management_GetModifiedName">
<span<?= $Page->GetModifiedName->viewAttributes() ?>>
<?= $Page->GetModifiedName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <td <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_task_management_HospID" class="task_management_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
    </tr>
<?php
    $Page->Recordset->moveNext();
}
$Page->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
