<?php

namespace PHPMaker2021\project3;

// Page object
$TaskManagementView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var ftask_managementview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    ftask_managementview = currentForm = new ew.Form("ftask_managementview", "view");
    loadjs.done("ftask_managementview");
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
<?php $Page->ExportOptions->render("body") ?>
<?php $Page->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="ftask_managementview" id="ftask_managementview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="task_management">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_task_management_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_task_management_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TaskName->Visible) { // TaskName ?>
    <tr id="r_TaskName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_task_management_TaskName"><?= $Page->TaskName->caption() ?></span></td>
        <td data-name="TaskName" <?= $Page->TaskName->cellAttributes() ?>>
<span id="el_task_management_TaskName">
<span<?= $Page->TaskName->viewAttributes() ?>>
<?= $Page->TaskName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AssignTo->Visible) { // AssignTo ?>
    <tr id="r_AssignTo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_task_management_AssignTo"><?= $Page->AssignTo->caption() ?></span></td>
        <td data-name="AssignTo" <?= $Page->AssignTo->cellAttributes() ?>>
<span id="el_task_management_AssignTo">
<span<?= $Page->AssignTo->viewAttributes() ?>>
<?= $Page->AssignTo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Description->Visible) { // Description ?>
    <tr id="r_Description">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_task_management_Description"><?= $Page->Description->caption() ?></span></td>
        <td data-name="Description" <?= $Page->Description->cellAttributes() ?>>
<span id="el_task_management_Description">
<span<?= $Page->Description->viewAttributes() ?>>
<?= $Page->Description->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StartDate->Visible) { // StartDate ?>
    <tr id="r_StartDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_task_management_StartDate"><?= $Page->StartDate->caption() ?></span></td>
        <td data-name="StartDate" <?= $Page->StartDate->cellAttributes() ?>>
<span id="el_task_management_StartDate">
<span<?= $Page->StartDate->viewAttributes() ?>>
<?= $Page->StartDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EndDate->Visible) { // EndDate ?>
    <tr id="r_EndDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_task_management_EndDate"><?= $Page->EndDate->caption() ?></span></td>
        <td data-name="EndDate" <?= $Page->EndDate->cellAttributes() ?>>
<span id="el_task_management_EndDate">
<span<?= $Page->EndDate->viewAttributes() ?>>
<?= $Page->EndDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StatusOfTask->Visible) { // StatusOfTask ?>
    <tr id="r_StatusOfTask">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_task_management_StatusOfTask"><?= $Page->StatusOfTask->caption() ?></span></td>
        <td data-name="StatusOfTask" <?= $Page->StatusOfTask->cellAttributes() ?>>
<span id="el_task_management_StatusOfTask">
<span<?= $Page->StatusOfTask->viewAttributes() ?>>
<?= $Page->StatusOfTask->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ForwardTo->Visible) { // ForwardTo ?>
    <tr id="r_ForwardTo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_task_management_ForwardTo"><?= $Page->ForwardTo->caption() ?></span></td>
        <td data-name="ForwardTo" <?= $Page->ForwardTo->cellAttributes() ?>>
<span id="el_task_management_ForwardTo">
<span<?= $Page->ForwardTo->viewAttributes() ?>>
<?= $Page->ForwardTo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <tr id="r_createdby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_task_management_createdby"><?= $Page->createdby->caption() ?></span></td>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<span id="el_task_management_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <tr id="r_createddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_task_management_createddatetime"><?= $Page->createddatetime->caption() ?></span></td>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_task_management_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <tr id="r_modifiedby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_task_management_modifiedby"><?= $Page->modifiedby->caption() ?></span></td>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_task_management_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <tr id="r_modifieddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_task_management_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></td>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_task_management_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GetUserName->Visible) { // GetUserName ?>
    <tr id="r_GetUserName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_task_management_GetUserName"><?= $Page->GetUserName->caption() ?></span></td>
        <td data-name="GetUserName" <?= $Page->GetUserName->cellAttributes() ?>>
<span id="el_task_management_GetUserName">
<span<?= $Page->GetUserName->viewAttributes() ?>>
<?= $Page->GetUserName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GetModifiedName->Visible) { // GetModifiedName ?>
    <tr id="r_GetModifiedName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_task_management_GetModifiedName"><?= $Page->GetModifiedName->caption() ?></span></td>
        <td data-name="GetModifiedName" <?= $Page->GetModifiedName->cellAttributes() ?>>
<span id="el_task_management_GetModifiedName">
<span<?= $Page->GetModifiedName->viewAttributes() ?>>
<?= $Page->GetModifiedName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <tr id="r_HospID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_task_management_HospID"><?= $Page->HospID->caption() ?></span></td>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el_task_management_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
</table>
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<?php if (!$Page->isExport()) { ?>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>
