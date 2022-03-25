<?php

namespace PHPMaker2021\project3;

// Page object
$IvfFollowUpTrackingView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fivf_follow_up_trackingview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fivf_follow_up_trackingview = currentForm = new ew.Form("fivf_follow_up_trackingview", "view");
    loadjs.done("fivf_follow_up_trackingview");
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
<form name="fivf_follow_up_trackingview" id="fivf_follow_up_trackingview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_follow_up_tracking">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_follow_up_tracking_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_ivf_follow_up_tracking_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
    <tr id="r_RIDNO">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_follow_up_tracking_RIDNO"><?= $Page->RIDNO->caption() ?></span></td>
        <td data-name="RIDNO" <?= $Page->RIDNO->cellAttributes() ?>>
<span id="el_ivf_follow_up_tracking_RIDNO">
<span<?= $Page->RIDNO->viewAttributes() ?>>
<?= $Page->RIDNO->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
    <tr id="r_Name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_follow_up_tracking_Name"><?= $Page->Name->caption() ?></span></td>
        <td data-name="Name" <?= $Page->Name->cellAttributes() ?>>
<span id="el_ivf_follow_up_tracking_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <tr id="r_Age">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_follow_up_tracking_Age"><?= $Page->Age->caption() ?></span></td>
        <td data-name="Age" <?= $Page->Age->cellAttributes() ?>>
<span id="el_ivf_follow_up_tracking_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MReadMore->Visible) { // MReadMore ?>
    <tr id="r_MReadMore">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_follow_up_tracking_MReadMore"><?= $Page->MReadMore->caption() ?></span></td>
        <td data-name="MReadMore" <?= $Page->MReadMore->cellAttributes() ?>>
<span id="el_ivf_follow_up_tracking_MReadMore">
<span<?= $Page->MReadMore->viewAttributes() ?>>
<?= $Page->MReadMore->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <tr id="r_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_follow_up_tracking_status"><?= $Page->status->caption() ?></span></td>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el_ivf_follow_up_tracking_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <tr id="r_createdby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_follow_up_tracking_createdby"><?= $Page->createdby->caption() ?></span></td>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<span id="el_ivf_follow_up_tracking_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <tr id="r_createddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_follow_up_tracking_createddatetime"><?= $Page->createddatetime->caption() ?></span></td>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_ivf_follow_up_tracking_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <tr id="r_modifiedby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_follow_up_tracking_modifiedby"><?= $Page->modifiedby->caption() ?></span></td>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_ivf_follow_up_tracking_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <tr id="r_modifieddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_follow_up_tracking_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></td>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_ivf_follow_up_tracking_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <tr id="r_TidNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_follow_up_tracking_TidNo"><?= $Page->TidNo->caption() ?></span></td>
        <td data-name="TidNo" <?= $Page->TidNo->cellAttributes() ?>>
<span id="el_ivf_follow_up_tracking_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdUserName->Visible) { // createdUserName ?>
    <tr id="r_createdUserName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_follow_up_tracking_createdUserName"><?= $Page->createdUserName->caption() ?></span></td>
        <td data-name="createdUserName" <?= $Page->createdUserName->cellAttributes() ?>>
<span id="el_ivf_follow_up_tracking_createdUserName">
<span<?= $Page->createdUserName->viewAttributes() ?>>
<?= $Page->createdUserName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FollowUpDate->Visible) { // FollowUpDate ?>
    <tr id="r_FollowUpDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_follow_up_tracking_FollowUpDate"><?= $Page->FollowUpDate->caption() ?></span></td>
        <td data-name="FollowUpDate" <?= $Page->FollowUpDate->cellAttributes() ?>>
<span id="el_ivf_follow_up_tracking_FollowUpDate">
<span<?= $Page->FollowUpDate->viewAttributes() ?>>
<?= $Page->FollowUpDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NextVistDate->Visible) { // NextVistDate ?>
    <tr id="r_NextVistDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_follow_up_tracking_NextVistDate"><?= $Page->NextVistDate->caption() ?></span></td>
        <td data-name="NextVistDate" <?= $Page->NextVistDate->cellAttributes() ?>>
<span id="el_ivf_follow_up_tracking_NextVistDate">
<span<?= $Page->NextVistDate->viewAttributes() ?>>
<?= $Page->NextVistDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <tr id="r_HospID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_follow_up_tracking_HospID"><?= $Page->HospID->caption() ?></span></td>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el_ivf_follow_up_tracking_HospID">
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
