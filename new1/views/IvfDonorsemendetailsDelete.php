<?php

namespace PHPMaker2021\project3;

// Page object
$IvfDonorsemendetailsDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fivf_donorsemendetailsdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fivf_donorsemendetailsdelete = currentForm = new ew.Form("fivf_donorsemendetailsdelete", "delete");
    loadjs.done("fivf_donorsemendetailsdelete");
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
<form name="fivf_donorsemendetailsdelete" id="fivf_donorsemendetailsdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_donorsemendetails">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_ivf_donorsemendetails_id" class="ivf_donorsemendetails_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
        <th class="<?= $Page->RIDNo->headerCellClass() ?>"><span id="elh_ivf_donorsemendetails_RIDNo" class="ivf_donorsemendetails_RIDNo"><?= $Page->RIDNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <th class="<?= $Page->TidNo->headerCellClass() ?>"><span id="elh_ivf_donorsemendetails_TidNo" class="ivf_donorsemendetails_TidNo"><?= $Page->TidNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Agency->Visible) { // Agency ?>
        <th class="<?= $Page->Agency->headerCellClass() ?>"><span id="elh_ivf_donorsemendetails_Agency" class="ivf_donorsemendetails_Agency"><?= $Page->Agency->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ReceivedOn->Visible) { // ReceivedOn ?>
        <th class="<?= $Page->ReceivedOn->headerCellClass() ?>"><span id="elh_ivf_donorsemendetails_ReceivedOn" class="ivf_donorsemendetails_ReceivedOn"><?= $Page->ReceivedOn->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ReceivedBy->Visible) { // ReceivedBy ?>
        <th class="<?= $Page->ReceivedBy->headerCellClass() ?>"><span id="elh_ivf_donorsemendetails_ReceivedBy" class="ivf_donorsemendetails_ReceivedBy"><?= $Page->ReceivedBy->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DonorNo->Visible) { // DonorNo ?>
        <th class="<?= $Page->DonorNo->headerCellClass() ?>"><span id="elh_ivf_donorsemendetails_DonorNo" class="ivf_donorsemendetails_DonorNo"><?= $Page->DonorNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BatchNo->Visible) { // BatchNo ?>
        <th class="<?= $Page->BatchNo->headerCellClass() ?>"><span id="elh_ivf_donorsemendetails_BatchNo" class="ivf_donorsemendetails_BatchNo"><?= $Page->BatchNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BloodGroup->Visible) { // BloodGroup ?>
        <th class="<?= $Page->BloodGroup->headerCellClass() ?>"><span id="elh_ivf_donorsemendetails_BloodGroup" class="ivf_donorsemendetails_BloodGroup"><?= $Page->BloodGroup->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Height->Visible) { // Height ?>
        <th class="<?= $Page->Height->headerCellClass() ?>"><span id="elh_ivf_donorsemendetails_Height" class="ivf_donorsemendetails_Height"><?= $Page->Height->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SkinColor->Visible) { // SkinColor ?>
        <th class="<?= $Page->SkinColor->headerCellClass() ?>"><span id="elh_ivf_donorsemendetails_SkinColor" class="ivf_donorsemendetails_SkinColor"><?= $Page->SkinColor->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EyeColor->Visible) { // EyeColor ?>
        <th class="<?= $Page->EyeColor->headerCellClass() ?>"><span id="elh_ivf_donorsemendetails_EyeColor" class="ivf_donorsemendetails_EyeColor"><?= $Page->EyeColor->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HairColor->Visible) { // HairColor ?>
        <th class="<?= $Page->HairColor->headerCellClass() ?>"><span id="elh_ivf_donorsemendetails_HairColor" class="ivf_donorsemendetails_HairColor"><?= $Page->HairColor->caption() ?></span></th>
<?php } ?>
<?php if ($Page->NoOfVials->Visible) { // NoOfVials ?>
        <th class="<?= $Page->NoOfVials->headerCellClass() ?>"><span id="elh_ivf_donorsemendetails_NoOfVials" class="ivf_donorsemendetails_NoOfVials"><?= $Page->NoOfVials->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Tank->Visible) { // Tank ?>
        <th class="<?= $Page->Tank->headerCellClass() ?>"><span id="elh_ivf_donorsemendetails_Tank" class="ivf_donorsemendetails_Tank"><?= $Page->Tank->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Canister->Visible) { // Canister ?>
        <th class="<?= $Page->Canister->headerCellClass() ?>"><span id="elh_ivf_donorsemendetails_Canister" class="ivf_donorsemendetails_Canister"><?= $Page->Canister->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
        <th class="<?= $Page->Remarks->headerCellClass() ?>"><span id="elh_ivf_donorsemendetails_Remarks" class="ivf_donorsemendetails_Remarks"><?= $Page->Remarks->caption() ?></span></th>
<?php } ?>
<?php if ($Page->patientid->Visible) { // patientid ?>
        <th class="<?= $Page->patientid->headerCellClass() ?>"><span id="elh_ivf_donorsemendetails_patientid" class="ivf_donorsemendetails_patientid"><?= $Page->patientid->caption() ?></span></th>
<?php } ?>
<?php if ($Page->coupleid->Visible) { // coupleid ?>
        <th class="<?= $Page->coupleid->headerCellClass() ?>"><span id="elh_ivf_donorsemendetails_coupleid" class="ivf_donorsemendetails_coupleid"><?= $Page->coupleid->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Usedstatus->Visible) { // Usedstatus ?>
        <th class="<?= $Page->Usedstatus->headerCellClass() ?>"><span id="elh_ivf_donorsemendetails_Usedstatus" class="ivf_donorsemendetails_Usedstatus"><?= $Page->Usedstatus->caption() ?></span></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th class="<?= $Page->status->headerCellClass() ?>"><span id="elh_ivf_donorsemendetails_status" class="ivf_donorsemendetails_status"><?= $Page->status->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th class="<?= $Page->createdby->headerCellClass() ?>"><span id="elh_ivf_donorsemendetails_createdby" class="ivf_donorsemendetails_createdby"><?= $Page->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th class="<?= $Page->createddatetime->headerCellClass() ?>"><span id="elh_ivf_donorsemendetails_createddatetime" class="ivf_donorsemendetails_createddatetime"><?= $Page->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th class="<?= $Page->modifiedby->headerCellClass() ?>"><span id="elh_ivf_donorsemendetails_modifiedby" class="ivf_donorsemendetails_modifiedby"><?= $Page->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th class="<?= $Page->modifieddatetime->headerCellClass() ?>"><span id="elh_ivf_donorsemendetails_modifieddatetime" class="ivf_donorsemendetails_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_id" class="ivf_donorsemendetails_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
        <td <?= $Page->RIDNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_RIDNo" class="ivf_donorsemendetails_RIDNo">
<span<?= $Page->RIDNo->viewAttributes() ?>>
<?= $Page->RIDNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <td <?= $Page->TidNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_TidNo" class="ivf_donorsemendetails_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Agency->Visible) { // Agency ?>
        <td <?= $Page->Agency->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_Agency" class="ivf_donorsemendetails_Agency">
<span<?= $Page->Agency->viewAttributes() ?>>
<?= $Page->Agency->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ReceivedOn->Visible) { // ReceivedOn ?>
        <td <?= $Page->ReceivedOn->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_ReceivedOn" class="ivf_donorsemendetails_ReceivedOn">
<span<?= $Page->ReceivedOn->viewAttributes() ?>>
<?= $Page->ReceivedOn->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ReceivedBy->Visible) { // ReceivedBy ?>
        <td <?= $Page->ReceivedBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_ReceivedBy" class="ivf_donorsemendetails_ReceivedBy">
<span<?= $Page->ReceivedBy->viewAttributes() ?>>
<?= $Page->ReceivedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DonorNo->Visible) { // DonorNo ?>
        <td <?= $Page->DonorNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_DonorNo" class="ivf_donorsemendetails_DonorNo">
<span<?= $Page->DonorNo->viewAttributes() ?>>
<?= $Page->DonorNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BatchNo->Visible) { // BatchNo ?>
        <td <?= $Page->BatchNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_BatchNo" class="ivf_donorsemendetails_BatchNo">
<span<?= $Page->BatchNo->viewAttributes() ?>>
<?= $Page->BatchNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BloodGroup->Visible) { // BloodGroup ?>
        <td <?= $Page->BloodGroup->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_BloodGroup" class="ivf_donorsemendetails_BloodGroup">
<span<?= $Page->BloodGroup->viewAttributes() ?>>
<?= $Page->BloodGroup->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Height->Visible) { // Height ?>
        <td <?= $Page->Height->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_Height" class="ivf_donorsemendetails_Height">
<span<?= $Page->Height->viewAttributes() ?>>
<?= $Page->Height->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SkinColor->Visible) { // SkinColor ?>
        <td <?= $Page->SkinColor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_SkinColor" class="ivf_donorsemendetails_SkinColor">
<span<?= $Page->SkinColor->viewAttributes() ?>>
<?= $Page->SkinColor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EyeColor->Visible) { // EyeColor ?>
        <td <?= $Page->EyeColor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_EyeColor" class="ivf_donorsemendetails_EyeColor">
<span<?= $Page->EyeColor->viewAttributes() ?>>
<?= $Page->EyeColor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HairColor->Visible) { // HairColor ?>
        <td <?= $Page->HairColor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_HairColor" class="ivf_donorsemendetails_HairColor">
<span<?= $Page->HairColor->viewAttributes() ?>>
<?= $Page->HairColor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->NoOfVials->Visible) { // NoOfVials ?>
        <td <?= $Page->NoOfVials->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_NoOfVials" class="ivf_donorsemendetails_NoOfVials">
<span<?= $Page->NoOfVials->viewAttributes() ?>>
<?= $Page->NoOfVials->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Tank->Visible) { // Tank ?>
        <td <?= $Page->Tank->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_Tank" class="ivf_donorsemendetails_Tank">
<span<?= $Page->Tank->viewAttributes() ?>>
<?= $Page->Tank->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Canister->Visible) { // Canister ?>
        <td <?= $Page->Canister->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_Canister" class="ivf_donorsemendetails_Canister">
<span<?= $Page->Canister->viewAttributes() ?>>
<?= $Page->Canister->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
        <td <?= $Page->Remarks->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_Remarks" class="ivf_donorsemendetails_Remarks">
<span<?= $Page->Remarks->viewAttributes() ?>>
<?= $Page->Remarks->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->patientid->Visible) { // patientid ?>
        <td <?= $Page->patientid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_patientid" class="ivf_donorsemendetails_patientid">
<span<?= $Page->patientid->viewAttributes() ?>>
<?= $Page->patientid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->coupleid->Visible) { // coupleid ?>
        <td <?= $Page->coupleid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_coupleid" class="ivf_donorsemendetails_coupleid">
<span<?= $Page->coupleid->viewAttributes() ?>>
<?= $Page->coupleid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Usedstatus->Visible) { // Usedstatus ?>
        <td <?= $Page->Usedstatus->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_Usedstatus" class="ivf_donorsemendetails_Usedstatus">
<span<?= $Page->Usedstatus->viewAttributes() ?>>
<?= $Page->Usedstatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <td <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_status" class="ivf_donorsemendetails_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <td <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_createdby" class="ivf_donorsemendetails_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_createddatetime" class="ivf_donorsemendetails_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_modifiedby" class="ivf_donorsemendetails_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_donorsemendetails_modifieddatetime" class="ivf_donorsemendetails_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
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
