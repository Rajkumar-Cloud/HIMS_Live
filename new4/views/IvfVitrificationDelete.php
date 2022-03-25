<?php

namespace PHPMaker2021\HIMS;

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
<script>
if (!ew.vars.tables.ivf_vitrification) ew.vars.tables.ivf_vitrification = <?= JsonEncode(GetClientVar("tables", "ivf_vitrification")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fivf_vitrificationdelete" id="fivf_vitrificationdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
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
