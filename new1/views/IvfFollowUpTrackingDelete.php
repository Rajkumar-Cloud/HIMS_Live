<?php

namespace PHPMaker2021\project3;

// Page object
$IvfFollowUpTrackingDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fivf_follow_up_trackingdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fivf_follow_up_trackingdelete = currentForm = new ew.Form("fivf_follow_up_trackingdelete", "delete");
    loadjs.done("fivf_follow_up_trackingdelete");
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
<form name="fivf_follow_up_trackingdelete" id="fivf_follow_up_trackingdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_follow_up_tracking">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_ivf_follow_up_tracking_id" class="ivf_follow_up_tracking_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
        <th class="<?= $Page->RIDNO->headerCellClass() ?>"><span id="elh_ivf_follow_up_tracking_RIDNO" class="ivf_follow_up_tracking_RIDNO"><?= $Page->RIDNO->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
        <th class="<?= $Page->Name->headerCellClass() ?>"><span id="elh_ivf_follow_up_tracking_Name" class="ivf_follow_up_tracking_Name"><?= $Page->Name->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
        <th class="<?= $Page->Age->headerCellClass() ?>"><span id="elh_ivf_follow_up_tracking_Age" class="ivf_follow_up_tracking_Age"><?= $Page->Age->caption() ?></span></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th class="<?= $Page->status->headerCellClass() ?>"><span id="elh_ivf_follow_up_tracking_status" class="ivf_follow_up_tracking_status"><?= $Page->status->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th class="<?= $Page->createdby->headerCellClass() ?>"><span id="elh_ivf_follow_up_tracking_createdby" class="ivf_follow_up_tracking_createdby"><?= $Page->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th class="<?= $Page->createddatetime->headerCellClass() ?>"><span id="elh_ivf_follow_up_tracking_createddatetime" class="ivf_follow_up_tracking_createddatetime"><?= $Page->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th class="<?= $Page->modifiedby->headerCellClass() ?>"><span id="elh_ivf_follow_up_tracking_modifiedby" class="ivf_follow_up_tracking_modifiedby"><?= $Page->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th class="<?= $Page->modifieddatetime->headerCellClass() ?>"><span id="elh_ivf_follow_up_tracking_modifieddatetime" class="ivf_follow_up_tracking_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <th class="<?= $Page->TidNo->headerCellClass() ?>"><span id="elh_ivf_follow_up_tracking_TidNo" class="ivf_follow_up_tracking_TidNo"><?= $Page->TidNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createdUserName->Visible) { // createdUserName ?>
        <th class="<?= $Page->createdUserName->headerCellClass() ?>"><span id="elh_ivf_follow_up_tracking_createdUserName" class="ivf_follow_up_tracking_createdUserName"><?= $Page->createdUserName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->FollowUpDate->Visible) { // FollowUpDate ?>
        <th class="<?= $Page->FollowUpDate->headerCellClass() ?>"><span id="elh_ivf_follow_up_tracking_FollowUpDate" class="ivf_follow_up_tracking_FollowUpDate"><?= $Page->FollowUpDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->NextVistDate->Visible) { // NextVistDate ?>
        <th class="<?= $Page->NextVistDate->headerCellClass() ?>"><span id="elh_ivf_follow_up_tracking_NextVistDate" class="ivf_follow_up_tracking_NextVistDate"><?= $Page->NextVistDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th class="<?= $Page->HospID->headerCellClass() ?>"><span id="elh_ivf_follow_up_tracking_HospID" class="ivf_follow_up_tracking_HospID"><?= $Page->HospID->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_ivf_follow_up_tracking_id" class="ivf_follow_up_tracking_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
        <td <?= $Page->RIDNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_follow_up_tracking_RIDNO" class="ivf_follow_up_tracking_RIDNO">
<span<?= $Page->RIDNO->viewAttributes() ?>>
<?= $Page->RIDNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
        <td <?= $Page->Name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_follow_up_tracking_Name" class="ivf_follow_up_tracking_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
        <td <?= $Page->Age->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_follow_up_tracking_Age" class="ivf_follow_up_tracking_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <td <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_follow_up_tracking_status" class="ivf_follow_up_tracking_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <td <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_follow_up_tracking_createdby" class="ivf_follow_up_tracking_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_follow_up_tracking_createddatetime" class="ivf_follow_up_tracking_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_follow_up_tracking_modifiedby" class="ivf_follow_up_tracking_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_follow_up_tracking_modifieddatetime" class="ivf_follow_up_tracking_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <td <?= $Page->TidNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_follow_up_tracking_TidNo" class="ivf_follow_up_tracking_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createdUserName->Visible) { // createdUserName ?>
        <td <?= $Page->createdUserName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_follow_up_tracking_createdUserName" class="ivf_follow_up_tracking_createdUserName">
<span<?= $Page->createdUserName->viewAttributes() ?>>
<?= $Page->createdUserName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->FollowUpDate->Visible) { // FollowUpDate ?>
        <td <?= $Page->FollowUpDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_follow_up_tracking_FollowUpDate" class="ivf_follow_up_tracking_FollowUpDate">
<span<?= $Page->FollowUpDate->viewAttributes() ?>>
<?= $Page->FollowUpDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->NextVistDate->Visible) { // NextVistDate ?>
        <td <?= $Page->NextVistDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_follow_up_tracking_NextVistDate" class="ivf_follow_up_tracking_NextVistDate">
<span<?= $Page->NextVistDate->viewAttributes() ?>>
<?= $Page->NextVistDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <td <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_follow_up_tracking_HospID" class="ivf_follow_up_tracking_HospID">
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
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= GetUrl($Page->getReturnUrl()) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
