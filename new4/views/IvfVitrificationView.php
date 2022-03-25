<?php

namespace PHPMaker2021\HIMS;

// Page object
$IvfVitrificationView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fivf_vitrificationview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fivf_vitrificationview = currentForm = new ew.Form("fivf_vitrificationview", "view");
    loadjs.done("fivf_vitrificationview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.ivf_vitrification) ew.vars.tables.ivf_vitrification = <?= JsonEncode(GetClientVar("tables", "ivf_vitrification")) ?>;
</script>
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
<form name="fivf_vitrificationview" id="fivf_vitrificationview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_vitrification">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_ivf_vitrification_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
    <tr id="r_RIDNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_RIDNo"><?= $Page->RIDNo->caption() ?></span></td>
        <td data-name="RIDNo" <?= $Page->RIDNo->cellAttributes() ?>>
<span id="el_ivf_vitrification_RIDNo">
<span<?= $Page->RIDNo->viewAttributes() ?>>
<?= $Page->RIDNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <tr id="r_PatientName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_PatientName"><?= $Page->PatientName->caption() ?></span></td>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<span id="el_ivf_vitrification_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TiDNo->Visible) { // TiDNo ?>
    <tr id="r_TiDNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_TiDNo"><?= $Page->TiDNo->caption() ?></span></td>
        <td data-name="TiDNo" <?= $Page->TiDNo->cellAttributes() ?>>
<span id="el_ivf_vitrification_TiDNo">
<span<?= $Page->TiDNo->viewAttributes() ?>>
<?= $Page->TiDNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->vitrificationDate->Visible) { // vitrificationDate ?>
    <tr id="r_vitrificationDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_vitrificationDate"><?= $Page->vitrificationDate->caption() ?></span></td>
        <td data-name="vitrificationDate" <?= $Page->vitrificationDate->cellAttributes() ?>>
<span id="el_ivf_vitrification_vitrificationDate">
<span<?= $Page->vitrificationDate->viewAttributes() ?>>
<?= $Page->vitrificationDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
    <tr id="r_PrimaryEmbryologist">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_PrimaryEmbryologist"><?= $Page->PrimaryEmbryologist->caption() ?></span></td>
        <td data-name="PrimaryEmbryologist" <?= $Page->PrimaryEmbryologist->cellAttributes() ?>>
<span id="el_ivf_vitrification_PrimaryEmbryologist">
<span<?= $Page->PrimaryEmbryologist->viewAttributes() ?>>
<?= $Page->PrimaryEmbryologist->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
    <tr id="r_SecondaryEmbryologist">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_SecondaryEmbryologist"><?= $Page->SecondaryEmbryologist->caption() ?></span></td>
        <td data-name="SecondaryEmbryologist" <?= $Page->SecondaryEmbryologist->cellAttributes() ?>>
<span id="el_ivf_vitrification_SecondaryEmbryologist">
<span<?= $Page->SecondaryEmbryologist->viewAttributes() ?>>
<?= $Page->SecondaryEmbryologist->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EmbryoNo->Visible) { // EmbryoNo ?>
    <tr id="r_EmbryoNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_EmbryoNo"><?= $Page->EmbryoNo->caption() ?></span></td>
        <td data-name="EmbryoNo" <?= $Page->EmbryoNo->cellAttributes() ?>>
<span id="el_ivf_vitrification_EmbryoNo">
<span<?= $Page->EmbryoNo->viewAttributes() ?>>
<?= $Page->EmbryoNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FertilisationDate->Visible) { // FertilisationDate ?>
    <tr id="r_FertilisationDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_FertilisationDate"><?= $Page->FertilisationDate->caption() ?></span></td>
        <td data-name="FertilisationDate" <?= $Page->FertilisationDate->cellAttributes() ?>>
<span id="el_ivf_vitrification_FertilisationDate">
<span<?= $Page->FertilisationDate->viewAttributes() ?>>
<?= $Page->FertilisationDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day->Visible) { // Day ?>
    <tr id="r_Day">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_Day"><?= $Page->Day->caption() ?></span></td>
        <td data-name="Day" <?= $Page->Day->cellAttributes() ?>>
<span id="el_ivf_vitrification_Day">
<span<?= $Page->Day->viewAttributes() ?>>
<?= $Page->Day->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Grade->Visible) { // Grade ?>
    <tr id="r_Grade">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_Grade"><?= $Page->Grade->caption() ?></span></td>
        <td data-name="Grade" <?= $Page->Grade->cellAttributes() ?>>
<span id="el_ivf_vitrification_Grade">
<span<?= $Page->Grade->viewAttributes() ?>>
<?= $Page->Grade->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Incubator->Visible) { // Incubator ?>
    <tr id="r_Incubator">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_Incubator"><?= $Page->Incubator->caption() ?></span></td>
        <td data-name="Incubator" <?= $Page->Incubator->cellAttributes() ?>>
<span id="el_ivf_vitrification_Incubator">
<span<?= $Page->Incubator->viewAttributes() ?>>
<?= $Page->Incubator->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tank->Visible) { // Tank ?>
    <tr id="r_Tank">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_Tank"><?= $Page->Tank->caption() ?></span></td>
        <td data-name="Tank" <?= $Page->Tank->cellAttributes() ?>>
<span id="el_ivf_vitrification_Tank">
<span<?= $Page->Tank->viewAttributes() ?>>
<?= $Page->Tank->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Canister->Visible) { // Canister ?>
    <tr id="r_Canister">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_Canister"><?= $Page->Canister->caption() ?></span></td>
        <td data-name="Canister" <?= $Page->Canister->cellAttributes() ?>>
<span id="el_ivf_vitrification_Canister">
<span<?= $Page->Canister->viewAttributes() ?>>
<?= $Page->Canister->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Gobiet->Visible) { // Gobiet ?>
    <tr id="r_Gobiet">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_Gobiet"><?= $Page->Gobiet->caption() ?></span></td>
        <td data-name="Gobiet" <?= $Page->Gobiet->cellAttributes() ?>>
<span id="el_ivf_vitrification_Gobiet">
<span<?= $Page->Gobiet->viewAttributes() ?>>
<?= $Page->Gobiet->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CryolockNo->Visible) { // CryolockNo ?>
    <tr id="r_CryolockNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_CryolockNo"><?= $Page->CryolockNo->caption() ?></span></td>
        <td data-name="CryolockNo" <?= $Page->CryolockNo->cellAttributes() ?>>
<span id="el_ivf_vitrification_CryolockNo">
<span<?= $Page->CryolockNo->viewAttributes() ?>>
<?= $Page->CryolockNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CryolockColour->Visible) { // CryolockColour ?>
    <tr id="r_CryolockColour">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_CryolockColour"><?= $Page->CryolockColour->caption() ?></span></td>
        <td data-name="CryolockColour" <?= $Page->CryolockColour->cellAttributes() ?>>
<span id="el_ivf_vitrification_CryolockColour">
<span<?= $Page->CryolockColour->viewAttributes() ?>>
<?= $Page->CryolockColour->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Stage->Visible) { // Stage ?>
    <tr id="r_Stage">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_Stage"><?= $Page->Stage->caption() ?></span></td>
        <td data-name="Stage" <?= $Page->Stage->cellAttributes() ?>>
<span id="el_ivf_vitrification_Stage">
<span<?= $Page->Stage->viewAttributes() ?>>
<?= $Page->Stage->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->thawDate->Visible) { // thawDate ?>
    <tr id="r_thawDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_thawDate"><?= $Page->thawDate->caption() ?></span></td>
        <td data-name="thawDate" <?= $Page->thawDate->cellAttributes() ?>>
<span id="el_ivf_vitrification_thawDate">
<span<?= $Page->thawDate->viewAttributes() ?>>
<?= $Page->thawDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->thawPrimaryEmbryologist->Visible) { // thawPrimaryEmbryologist ?>
    <tr id="r_thawPrimaryEmbryologist">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_thawPrimaryEmbryologist"><?= $Page->thawPrimaryEmbryologist->caption() ?></span></td>
        <td data-name="thawPrimaryEmbryologist" <?= $Page->thawPrimaryEmbryologist->cellAttributes() ?>>
<span id="el_ivf_vitrification_thawPrimaryEmbryologist">
<span<?= $Page->thawPrimaryEmbryologist->viewAttributes() ?>>
<?= $Page->thawPrimaryEmbryologist->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->thawSecondaryEmbryologist->Visible) { // thawSecondaryEmbryologist ?>
    <tr id="r_thawSecondaryEmbryologist">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_thawSecondaryEmbryologist"><?= $Page->thawSecondaryEmbryologist->caption() ?></span></td>
        <td data-name="thawSecondaryEmbryologist" <?= $Page->thawSecondaryEmbryologist->cellAttributes() ?>>
<span id="el_ivf_vitrification_thawSecondaryEmbryologist">
<span<?= $Page->thawSecondaryEmbryologist->viewAttributes() ?>>
<?= $Page->thawSecondaryEmbryologist->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->thawET->Visible) { // thawET ?>
    <tr id="r_thawET">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_thawET"><?= $Page->thawET->caption() ?></span></td>
        <td data-name="thawET" <?= $Page->thawET->cellAttributes() ?>>
<span id="el_ivf_vitrification_thawET">
<span<?= $Page->thawET->viewAttributes() ?>>
<?= $Page->thawET->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->thawReFrozen->Visible) { // thawReFrozen ?>
    <tr id="r_thawReFrozen">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_thawReFrozen"><?= $Page->thawReFrozen->caption() ?></span></td>
        <td data-name="thawReFrozen" <?= $Page->thawReFrozen->cellAttributes() ?>>
<span id="el_ivf_vitrification_thawReFrozen">
<span<?= $Page->thawReFrozen->viewAttributes() ?>>
<?= $Page->thawReFrozen->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->thawAbserve->Visible) { // thawAbserve ?>
    <tr id="r_thawAbserve">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_thawAbserve"><?= $Page->thawAbserve->caption() ?></span></td>
        <td data-name="thawAbserve" <?= $Page->thawAbserve->cellAttributes() ?>>
<span id="el_ivf_vitrification_thawAbserve">
<span<?= $Page->thawAbserve->viewAttributes() ?>>
<?= $Page->thawAbserve->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->thawDiscard->Visible) { // thawDiscard ?>
    <tr id="r_thawDiscard">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_thawDiscard"><?= $Page->thawDiscard->caption() ?></span></td>
        <td data-name="thawDiscard" <?= $Page->thawDiscard->cellAttributes() ?>>
<span id="el_ivf_vitrification_thawDiscard">
<span<?= $Page->thawDiscard->viewAttributes() ?>>
<?= $Page->thawDiscard->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Catheter->Visible) { // Catheter ?>
    <tr id="r_Catheter">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_Catheter"><?= $Page->Catheter->caption() ?></span></td>
        <td data-name="Catheter" <?= $Page->Catheter->cellAttributes() ?>>
<span id="el_ivf_vitrification_Catheter">
<span<?= $Page->Catheter->viewAttributes() ?>>
<?= $Page->Catheter->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Difficulty->Visible) { // Difficulty ?>
    <tr id="r_Difficulty">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_Difficulty"><?= $Page->Difficulty->caption() ?></span></td>
        <td data-name="Difficulty" <?= $Page->Difficulty->cellAttributes() ?>>
<span id="el_ivf_vitrification_Difficulty">
<span<?= $Page->Difficulty->viewAttributes() ?>>
<?= $Page->Difficulty->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Easy->Visible) { // Easy ?>
    <tr id="r_Easy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_Easy"><?= $Page->Easy->caption() ?></span></td>
        <td data-name="Easy" <?= $Page->Easy->cellAttributes() ?>>
<span id="el_ivf_vitrification_Easy">
<span<?= $Page->Easy->viewAttributes() ?>>
<?= $Page->Easy->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Comments->Visible) { // Comments ?>
    <tr id="r_Comments">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_Comments"><?= $Page->Comments->caption() ?></span></td>
        <td data-name="Comments" <?= $Page->Comments->cellAttributes() ?>>
<span id="el_ivf_vitrification_Comments">
<span<?= $Page->Comments->viewAttributes() ?>>
<?= $Page->Comments->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Doctor->Visible) { // Doctor ?>
    <tr id="r_Doctor">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_Doctor"><?= $Page->Doctor->caption() ?></span></td>
        <td data-name="Doctor" <?= $Page->Doctor->cellAttributes() ?>>
<span id="el_ivf_vitrification_Doctor">
<span<?= $Page->Doctor->viewAttributes() ?>>
<?= $Page->Doctor->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Embryologist->Visible) { // Embryologist ?>
    <tr id="r_Embryologist">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_Embryologist"><?= $Page->Embryologist->caption() ?></span></td>
        <td data-name="Embryologist" <?= $Page->Embryologist->cellAttributes() ?>>
<span id="el_ivf_vitrification_Embryologist">
<span<?= $Page->Embryologist->viewAttributes() ?>>
<?= $Page->Embryologist->getViewValue() ?></span>
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
