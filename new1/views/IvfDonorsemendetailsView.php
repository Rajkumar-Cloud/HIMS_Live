<?php

namespace PHPMaker2021\project3;

// Page object
$IvfDonorsemendetailsView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fivf_donorsemendetailsview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fivf_donorsemendetailsview = currentForm = new ew.Form("fivf_donorsemendetailsview", "view");
    loadjs.done("fivf_donorsemendetailsview");
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
<form name="fivf_donorsemendetailsview" id="fivf_donorsemendetailsview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_donorsemendetails">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
    <tr id="r_RIDNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_RIDNo"><?= $Page->RIDNo->caption() ?></span></td>
        <td data-name="RIDNo" <?= $Page->RIDNo->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_RIDNo">
<span<?= $Page->RIDNo->viewAttributes() ?>>
<?= $Page->RIDNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <tr id="r_TidNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_TidNo"><?= $Page->TidNo->caption() ?></span></td>
        <td data-name="TidNo" <?= $Page->TidNo->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Agency->Visible) { // Agency ?>
    <tr id="r_Agency">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_Agency"><?= $Page->Agency->caption() ?></span></td>
        <td data-name="Agency" <?= $Page->Agency->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_Agency">
<span<?= $Page->Agency->viewAttributes() ?>>
<?= $Page->Agency->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReceivedOn->Visible) { // ReceivedOn ?>
    <tr id="r_ReceivedOn">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_ReceivedOn"><?= $Page->ReceivedOn->caption() ?></span></td>
        <td data-name="ReceivedOn" <?= $Page->ReceivedOn->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_ReceivedOn">
<span<?= $Page->ReceivedOn->viewAttributes() ?>>
<?= $Page->ReceivedOn->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReceivedBy->Visible) { // ReceivedBy ?>
    <tr id="r_ReceivedBy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_ReceivedBy"><?= $Page->ReceivedBy->caption() ?></span></td>
        <td data-name="ReceivedBy" <?= $Page->ReceivedBy->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_ReceivedBy">
<span<?= $Page->ReceivedBy->viewAttributes() ?>>
<?= $Page->ReceivedBy->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DonorNo->Visible) { // DonorNo ?>
    <tr id="r_DonorNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_DonorNo"><?= $Page->DonorNo->caption() ?></span></td>
        <td data-name="DonorNo" <?= $Page->DonorNo->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_DonorNo">
<span<?= $Page->DonorNo->viewAttributes() ?>>
<?= $Page->DonorNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BatchNo->Visible) { // BatchNo ?>
    <tr id="r_BatchNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_BatchNo"><?= $Page->BatchNo->caption() ?></span></td>
        <td data-name="BatchNo" <?= $Page->BatchNo->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_BatchNo">
<span<?= $Page->BatchNo->viewAttributes() ?>>
<?= $Page->BatchNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BloodGroup->Visible) { // BloodGroup ?>
    <tr id="r_BloodGroup">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_BloodGroup"><?= $Page->BloodGroup->caption() ?></span></td>
        <td data-name="BloodGroup" <?= $Page->BloodGroup->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_BloodGroup">
<span<?= $Page->BloodGroup->viewAttributes() ?>>
<?= $Page->BloodGroup->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Height->Visible) { // Height ?>
    <tr id="r_Height">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_Height"><?= $Page->Height->caption() ?></span></td>
        <td data-name="Height" <?= $Page->Height->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_Height">
<span<?= $Page->Height->viewAttributes() ?>>
<?= $Page->Height->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SkinColor->Visible) { // SkinColor ?>
    <tr id="r_SkinColor">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_SkinColor"><?= $Page->SkinColor->caption() ?></span></td>
        <td data-name="SkinColor" <?= $Page->SkinColor->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_SkinColor">
<span<?= $Page->SkinColor->viewAttributes() ?>>
<?= $Page->SkinColor->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EyeColor->Visible) { // EyeColor ?>
    <tr id="r_EyeColor">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_EyeColor"><?= $Page->EyeColor->caption() ?></span></td>
        <td data-name="EyeColor" <?= $Page->EyeColor->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_EyeColor">
<span<?= $Page->EyeColor->viewAttributes() ?>>
<?= $Page->EyeColor->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HairColor->Visible) { // HairColor ?>
    <tr id="r_HairColor">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_HairColor"><?= $Page->HairColor->caption() ?></span></td>
        <td data-name="HairColor" <?= $Page->HairColor->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_HairColor">
<span<?= $Page->HairColor->viewAttributes() ?>>
<?= $Page->HairColor->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NoOfVials->Visible) { // NoOfVials ?>
    <tr id="r_NoOfVials">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_NoOfVials"><?= $Page->NoOfVials->caption() ?></span></td>
        <td data-name="NoOfVials" <?= $Page->NoOfVials->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_NoOfVials">
<span<?= $Page->NoOfVials->viewAttributes() ?>>
<?= $Page->NoOfVials->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tank->Visible) { // Tank ?>
    <tr id="r_Tank">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_Tank"><?= $Page->Tank->caption() ?></span></td>
        <td data-name="Tank" <?= $Page->Tank->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_Tank">
<span<?= $Page->Tank->viewAttributes() ?>>
<?= $Page->Tank->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Canister->Visible) { // Canister ?>
    <tr id="r_Canister">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_Canister"><?= $Page->Canister->caption() ?></span></td>
        <td data-name="Canister" <?= $Page->Canister->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_Canister">
<span<?= $Page->Canister->viewAttributes() ?>>
<?= $Page->Canister->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
    <tr id="r_Remarks">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_Remarks"><?= $Page->Remarks->caption() ?></span></td>
        <td data-name="Remarks" <?= $Page->Remarks->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_Remarks">
<span<?= $Page->Remarks->viewAttributes() ?>>
<?= $Page->Remarks->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->patientid->Visible) { // patientid ?>
    <tr id="r_patientid">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_patientid"><?= $Page->patientid->caption() ?></span></td>
        <td data-name="patientid" <?= $Page->patientid->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_patientid">
<span<?= $Page->patientid->viewAttributes() ?>>
<?= $Page->patientid->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->coupleid->Visible) { // coupleid ?>
    <tr id="r_coupleid">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_coupleid"><?= $Page->coupleid->caption() ?></span></td>
        <td data-name="coupleid" <?= $Page->coupleid->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_coupleid">
<span<?= $Page->coupleid->viewAttributes() ?>>
<?= $Page->coupleid->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Usedstatus->Visible) { // Usedstatus ?>
    <tr id="r_Usedstatus">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_Usedstatus"><?= $Page->Usedstatus->caption() ?></span></td>
        <td data-name="Usedstatus" <?= $Page->Usedstatus->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_Usedstatus">
<span<?= $Page->Usedstatus->viewAttributes() ?>>
<?= $Page->Usedstatus->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <tr id="r_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_status"><?= $Page->status->caption() ?></span></td>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <tr id="r_createdby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_createdby"><?= $Page->createdby->caption() ?></span></td>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <tr id="r_createddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_createddatetime"><?= $Page->createddatetime->caption() ?></span></td>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <tr id="r_modifiedby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_modifiedby"><?= $Page->modifiedby->caption() ?></span></td>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <tr id="r_modifieddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></td>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
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
