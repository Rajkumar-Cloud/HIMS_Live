<?php

namespace PHPMaker2021\project3;

// Page object
$IvfVitrificationDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fivf_vitrificationdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fivf_vitrificationdelete = currentForm = new ew.Form("fivf_vitrificationdelete", "delete");
    loadjs.done("fivf_vitrificationdelete");
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
<form name="fivf_vitrificationdelete" id="fivf_vitrificationdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_vitrification">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_ivf_vitrification_id" class="ivf_vitrification_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
        <th class="<?= $Page->RIDNo->headerCellClass() ?>"><span id="elh_ivf_vitrification_RIDNo" class="ivf_vitrification_RIDNo"><?= $Page->RIDNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <th class="<?= $Page->PatientName->headerCellClass() ?>"><span id="elh_ivf_vitrification_PatientName" class="ivf_vitrification_PatientName"><?= $Page->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TiDNo->Visible) { // TiDNo ?>
        <th class="<?= $Page->TiDNo->headerCellClass() ?>"><span id="elh_ivf_vitrification_TiDNo" class="ivf_vitrification_TiDNo"><?= $Page->TiDNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->vitrificationDate->Visible) { // vitrificationDate ?>
        <th class="<?= $Page->vitrificationDate->headerCellClass() ?>"><span id="elh_ivf_vitrification_vitrificationDate" class="ivf_vitrification_vitrificationDate"><?= $Page->vitrificationDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
        <th class="<?= $Page->PrimaryEmbryologist->headerCellClass() ?>"><span id="elh_ivf_vitrification_PrimaryEmbryologist" class="ivf_vitrification_PrimaryEmbryologist"><?= $Page->PrimaryEmbryologist->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
        <th class="<?= $Page->SecondaryEmbryologist->headerCellClass() ?>"><span id="elh_ivf_vitrification_SecondaryEmbryologist" class="ivf_vitrification_SecondaryEmbryologist"><?= $Page->SecondaryEmbryologist->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EmbryoNo->Visible) { // EmbryoNo ?>
        <th class="<?= $Page->EmbryoNo->headerCellClass() ?>"><span id="elh_ivf_vitrification_EmbryoNo" class="ivf_vitrification_EmbryoNo"><?= $Page->EmbryoNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->FertilisationDate->Visible) { // FertilisationDate ?>
        <th class="<?= $Page->FertilisationDate->headerCellClass() ?>"><span id="elh_ivf_vitrification_FertilisationDate" class="ivf_vitrification_FertilisationDate"><?= $Page->FertilisationDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day->Visible) { // Day ?>
        <th class="<?= $Page->Day->headerCellClass() ?>"><span id="elh_ivf_vitrification_Day" class="ivf_vitrification_Day"><?= $Page->Day->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Grade->Visible) { // Grade ?>
        <th class="<?= $Page->Grade->headerCellClass() ?>"><span id="elh_ivf_vitrification_Grade" class="ivf_vitrification_Grade"><?= $Page->Grade->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Incubator->Visible) { // Incubator ?>
        <th class="<?= $Page->Incubator->headerCellClass() ?>"><span id="elh_ivf_vitrification_Incubator" class="ivf_vitrification_Incubator"><?= $Page->Incubator->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Tank->Visible) { // Tank ?>
        <th class="<?= $Page->Tank->headerCellClass() ?>"><span id="elh_ivf_vitrification_Tank" class="ivf_vitrification_Tank"><?= $Page->Tank->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Canister->Visible) { // Canister ?>
        <th class="<?= $Page->Canister->headerCellClass() ?>"><span id="elh_ivf_vitrification_Canister" class="ivf_vitrification_Canister"><?= $Page->Canister->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Gobiet->Visible) { // Gobiet ?>
        <th class="<?= $Page->Gobiet->headerCellClass() ?>"><span id="elh_ivf_vitrification_Gobiet" class="ivf_vitrification_Gobiet"><?= $Page->Gobiet->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CryolockNo->Visible) { // CryolockNo ?>
        <th class="<?= $Page->CryolockNo->headerCellClass() ?>"><span id="elh_ivf_vitrification_CryolockNo" class="ivf_vitrification_CryolockNo"><?= $Page->CryolockNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CryolockColour->Visible) { // CryolockColour ?>
        <th class="<?= $Page->CryolockColour->headerCellClass() ?>"><span id="elh_ivf_vitrification_CryolockColour" class="ivf_vitrification_CryolockColour"><?= $Page->CryolockColour->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Stage->Visible) { // Stage ?>
        <th class="<?= $Page->Stage->headerCellClass() ?>"><span id="elh_ivf_vitrification_Stage" class="ivf_vitrification_Stage"><?= $Page->Stage->caption() ?></span></th>
<?php } ?>
<?php if ($Page->thawDate->Visible) { // thawDate ?>
        <th class="<?= $Page->thawDate->headerCellClass() ?>"><span id="elh_ivf_vitrification_thawDate" class="ivf_vitrification_thawDate"><?= $Page->thawDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->thawPrimaryEmbryologist->Visible) { // thawPrimaryEmbryologist ?>
        <th class="<?= $Page->thawPrimaryEmbryologist->headerCellClass() ?>"><span id="elh_ivf_vitrification_thawPrimaryEmbryologist" class="ivf_vitrification_thawPrimaryEmbryologist"><?= $Page->thawPrimaryEmbryologist->caption() ?></span></th>
<?php } ?>
<?php if ($Page->thawSecondaryEmbryologist->Visible) { // thawSecondaryEmbryologist ?>
        <th class="<?= $Page->thawSecondaryEmbryologist->headerCellClass() ?>"><span id="elh_ivf_vitrification_thawSecondaryEmbryologist" class="ivf_vitrification_thawSecondaryEmbryologist"><?= $Page->thawSecondaryEmbryologist->caption() ?></span></th>
<?php } ?>
<?php if ($Page->thawET->Visible) { // thawET ?>
        <th class="<?= $Page->thawET->headerCellClass() ?>"><span id="elh_ivf_vitrification_thawET" class="ivf_vitrification_thawET"><?= $Page->thawET->caption() ?></span></th>
<?php } ?>
<?php if ($Page->thawReFrozen->Visible) { // thawReFrozen ?>
        <th class="<?= $Page->thawReFrozen->headerCellClass() ?>"><span id="elh_ivf_vitrification_thawReFrozen" class="ivf_vitrification_thawReFrozen"><?= $Page->thawReFrozen->caption() ?></span></th>
<?php } ?>
<?php if ($Page->thawAbserve->Visible) { // thawAbserve ?>
        <th class="<?= $Page->thawAbserve->headerCellClass() ?>"><span id="elh_ivf_vitrification_thawAbserve" class="ivf_vitrification_thawAbserve"><?= $Page->thawAbserve->caption() ?></span></th>
<?php } ?>
<?php if ($Page->thawDiscard->Visible) { // thawDiscard ?>
        <th class="<?= $Page->thawDiscard->headerCellClass() ?>"><span id="elh_ivf_vitrification_thawDiscard" class="ivf_vitrification_thawDiscard"><?= $Page->thawDiscard->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Catheter->Visible) { // Catheter ?>
        <th class="<?= $Page->Catheter->headerCellClass() ?>"><span id="elh_ivf_vitrification_Catheter" class="ivf_vitrification_Catheter"><?= $Page->Catheter->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Difficulty->Visible) { // Difficulty ?>
        <th class="<?= $Page->Difficulty->headerCellClass() ?>"><span id="elh_ivf_vitrification_Difficulty" class="ivf_vitrification_Difficulty"><?= $Page->Difficulty->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Easy->Visible) { // Easy ?>
        <th class="<?= $Page->Easy->headerCellClass() ?>"><span id="elh_ivf_vitrification_Easy" class="ivf_vitrification_Easy"><?= $Page->Easy->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Comments->Visible) { // Comments ?>
        <th class="<?= $Page->Comments->headerCellClass() ?>"><span id="elh_ivf_vitrification_Comments" class="ivf_vitrification_Comments"><?= $Page->Comments->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Doctor->Visible) { // Doctor ?>
        <th class="<?= $Page->Doctor->headerCellClass() ?>"><span id="elh_ivf_vitrification_Doctor" class="ivf_vitrification_Doctor"><?= $Page->Doctor->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Embryologist->Visible) { // Embryologist ?>
        <th class="<?= $Page->Embryologist->headerCellClass() ?>"><span id="elh_ivf_vitrification_Embryologist" class="ivf_vitrification_Embryologist"><?= $Page->Embryologist->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_id" class="ivf_vitrification_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
        <td <?= $Page->RIDNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_RIDNo" class="ivf_vitrification_RIDNo">
<span<?= $Page->RIDNo->viewAttributes() ?>>
<?= $Page->RIDNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td <?= $Page->PatientName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_PatientName" class="ivf_vitrification_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TiDNo->Visible) { // TiDNo ?>
        <td <?= $Page->TiDNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_TiDNo" class="ivf_vitrification_TiDNo">
<span<?= $Page->TiDNo->viewAttributes() ?>>
<?= $Page->TiDNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->vitrificationDate->Visible) { // vitrificationDate ?>
        <td <?= $Page->vitrificationDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_vitrificationDate" class="ivf_vitrification_vitrificationDate">
<span<?= $Page->vitrificationDate->viewAttributes() ?>>
<?= $Page->vitrificationDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
        <td <?= $Page->PrimaryEmbryologist->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_PrimaryEmbryologist" class="ivf_vitrification_PrimaryEmbryologist">
<span<?= $Page->PrimaryEmbryologist->viewAttributes() ?>>
<?= $Page->PrimaryEmbryologist->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
        <td <?= $Page->SecondaryEmbryologist->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_SecondaryEmbryologist" class="ivf_vitrification_SecondaryEmbryologist">
<span<?= $Page->SecondaryEmbryologist->viewAttributes() ?>>
<?= $Page->SecondaryEmbryologist->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EmbryoNo->Visible) { // EmbryoNo ?>
        <td <?= $Page->EmbryoNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_EmbryoNo" class="ivf_vitrification_EmbryoNo">
<span<?= $Page->EmbryoNo->viewAttributes() ?>>
<?= $Page->EmbryoNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->FertilisationDate->Visible) { // FertilisationDate ?>
        <td <?= $Page->FertilisationDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_FertilisationDate" class="ivf_vitrification_FertilisationDate">
<span<?= $Page->FertilisationDate->viewAttributes() ?>>
<?= $Page->FertilisationDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day->Visible) { // Day ?>
        <td <?= $Page->Day->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_Day" class="ivf_vitrification_Day">
<span<?= $Page->Day->viewAttributes() ?>>
<?= $Page->Day->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Grade->Visible) { // Grade ?>
        <td <?= $Page->Grade->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_Grade" class="ivf_vitrification_Grade">
<span<?= $Page->Grade->viewAttributes() ?>>
<?= $Page->Grade->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Incubator->Visible) { // Incubator ?>
        <td <?= $Page->Incubator->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_Incubator" class="ivf_vitrification_Incubator">
<span<?= $Page->Incubator->viewAttributes() ?>>
<?= $Page->Incubator->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Tank->Visible) { // Tank ?>
        <td <?= $Page->Tank->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_Tank" class="ivf_vitrification_Tank">
<span<?= $Page->Tank->viewAttributes() ?>>
<?= $Page->Tank->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Canister->Visible) { // Canister ?>
        <td <?= $Page->Canister->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_Canister" class="ivf_vitrification_Canister">
<span<?= $Page->Canister->viewAttributes() ?>>
<?= $Page->Canister->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Gobiet->Visible) { // Gobiet ?>
        <td <?= $Page->Gobiet->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_Gobiet" class="ivf_vitrification_Gobiet">
<span<?= $Page->Gobiet->viewAttributes() ?>>
<?= $Page->Gobiet->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CryolockNo->Visible) { // CryolockNo ?>
        <td <?= $Page->CryolockNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_CryolockNo" class="ivf_vitrification_CryolockNo">
<span<?= $Page->CryolockNo->viewAttributes() ?>>
<?= $Page->CryolockNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CryolockColour->Visible) { // CryolockColour ?>
        <td <?= $Page->CryolockColour->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_CryolockColour" class="ivf_vitrification_CryolockColour">
<span<?= $Page->CryolockColour->viewAttributes() ?>>
<?= $Page->CryolockColour->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Stage->Visible) { // Stage ?>
        <td <?= $Page->Stage->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_Stage" class="ivf_vitrification_Stage">
<span<?= $Page->Stage->viewAttributes() ?>>
<?= $Page->Stage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->thawDate->Visible) { // thawDate ?>
        <td <?= $Page->thawDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_thawDate" class="ivf_vitrification_thawDate">
<span<?= $Page->thawDate->viewAttributes() ?>>
<?= $Page->thawDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->thawPrimaryEmbryologist->Visible) { // thawPrimaryEmbryologist ?>
        <td <?= $Page->thawPrimaryEmbryologist->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_thawPrimaryEmbryologist" class="ivf_vitrification_thawPrimaryEmbryologist">
<span<?= $Page->thawPrimaryEmbryologist->viewAttributes() ?>>
<?= $Page->thawPrimaryEmbryologist->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->thawSecondaryEmbryologist->Visible) { // thawSecondaryEmbryologist ?>
        <td <?= $Page->thawSecondaryEmbryologist->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_thawSecondaryEmbryologist" class="ivf_vitrification_thawSecondaryEmbryologist">
<span<?= $Page->thawSecondaryEmbryologist->viewAttributes() ?>>
<?= $Page->thawSecondaryEmbryologist->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->thawET->Visible) { // thawET ?>
        <td <?= $Page->thawET->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_thawET" class="ivf_vitrification_thawET">
<span<?= $Page->thawET->viewAttributes() ?>>
<?= $Page->thawET->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->thawReFrozen->Visible) { // thawReFrozen ?>
        <td <?= $Page->thawReFrozen->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_thawReFrozen" class="ivf_vitrification_thawReFrozen">
<span<?= $Page->thawReFrozen->viewAttributes() ?>>
<?= $Page->thawReFrozen->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->thawAbserve->Visible) { // thawAbserve ?>
        <td <?= $Page->thawAbserve->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_thawAbserve" class="ivf_vitrification_thawAbserve">
<span<?= $Page->thawAbserve->viewAttributes() ?>>
<?= $Page->thawAbserve->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->thawDiscard->Visible) { // thawDiscard ?>
        <td <?= $Page->thawDiscard->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_thawDiscard" class="ivf_vitrification_thawDiscard">
<span<?= $Page->thawDiscard->viewAttributes() ?>>
<?= $Page->thawDiscard->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Catheter->Visible) { // Catheter ?>
        <td <?= $Page->Catheter->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_Catheter" class="ivf_vitrification_Catheter">
<span<?= $Page->Catheter->viewAttributes() ?>>
<?= $Page->Catheter->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Difficulty->Visible) { // Difficulty ?>
        <td <?= $Page->Difficulty->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_Difficulty" class="ivf_vitrification_Difficulty">
<span<?= $Page->Difficulty->viewAttributes() ?>>
<?= $Page->Difficulty->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Easy->Visible) { // Easy ?>
        <td <?= $Page->Easy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_Easy" class="ivf_vitrification_Easy">
<span<?= $Page->Easy->viewAttributes() ?>>
<?= $Page->Easy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Comments->Visible) { // Comments ?>
        <td <?= $Page->Comments->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_Comments" class="ivf_vitrification_Comments">
<span<?= $Page->Comments->viewAttributes() ?>>
<?= $Page->Comments->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Doctor->Visible) { // Doctor ?>
        <td <?= $Page->Doctor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_Doctor" class="ivf_vitrification_Doctor">
<span<?= $Page->Doctor->viewAttributes() ?>>
<?= $Page->Doctor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Embryologist->Visible) { // Embryologist ?>
        <td <?= $Page->Embryologist->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitrification_Embryologist" class="ivf_vitrification_Embryologist">
<span<?= $Page->Embryologist->viewAttributes() ?>>
<?= $Page->Embryologist->getViewValue() ?></span>
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
