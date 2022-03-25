<?php

namespace PHPMaker2021\project3;

// Page object
$IvfOocytedenudationStageDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fivf_oocytedenudation_stagedelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fivf_oocytedenudation_stagedelete = currentForm = new ew.Form("fivf_oocytedenudation_stagedelete", "delete");
    loadjs.done("fivf_oocytedenudation_stagedelete");
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
<form name="fivf_oocytedenudation_stagedelete" id="fivf_oocytedenudation_stagedelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_oocytedenudation_stage">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_stage_id" class="ivf_oocytedenudation_stage_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
        <th class="<?= $Page->RIDNo->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_stage_RIDNo" class="ivf_oocytedenudation_stage_RIDNo"><?= $Page->RIDNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
        <th class="<?= $Page->Name->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_stage_Name" class="ivf_oocytedenudation_stage_Name"><?= $Page->Name->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <th class="<?= $Page->TidNo->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_stage_TidNo" class="ivf_oocytedenudation_stage_TidNo"><?= $Page->TidNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->OidNo->Visible) { // OidNo ?>
        <th class="<?= $Page->OidNo->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_stage_OidNo" class="ivf_oocytedenudation_stage_OidNo"><?= $Page->OidNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->OocyteNo->Visible) { // OocyteNo ?>
        <th class="<?= $Page->OocyteNo->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_stage_OocyteNo" class="ivf_oocytedenudation_stage_OocyteNo"><?= $Page->OocyteNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Stage->Visible) { // Stage ?>
        <th class="<?= $Page->Stage->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_stage_Stage" class="ivf_oocytedenudation_stage_Stage"><?= $Page->Stage->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ReMarks->Visible) { // ReMarks ?>
        <th class="<?= $Page->ReMarks->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_stage_ReMarks" class="ivf_oocytedenudation_stage_ReMarks"><?= $Page->ReMarks->caption() ?></span></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th class="<?= $Page->status->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_stage_status" class="ivf_oocytedenudation_stage_status"><?= $Page->status->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th class="<?= $Page->createdby->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_stage_createdby" class="ivf_oocytedenudation_stage_createdby"><?= $Page->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th class="<?= $Page->createddatetime->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_stage_createddatetime" class="ivf_oocytedenudation_stage_createddatetime"><?= $Page->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th class="<?= $Page->modifiedby->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_stage_modifiedby" class="ivf_oocytedenudation_stage_modifiedby"><?= $Page->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th class="<?= $Page->modifieddatetime->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_stage_modifieddatetime" class="ivf_oocytedenudation_stage_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_stage_id" class="ivf_oocytedenudation_stage_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
        <td <?= $Page->RIDNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_stage_RIDNo" class="ivf_oocytedenudation_stage_RIDNo">
<span<?= $Page->RIDNo->viewAttributes() ?>>
<?= $Page->RIDNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
        <td <?= $Page->Name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_stage_Name" class="ivf_oocytedenudation_stage_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <td <?= $Page->TidNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_stage_TidNo" class="ivf_oocytedenudation_stage_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->OidNo->Visible) { // OidNo ?>
        <td <?= $Page->OidNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_stage_OidNo" class="ivf_oocytedenudation_stage_OidNo">
<span<?= $Page->OidNo->viewAttributes() ?>>
<?= $Page->OidNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->OocyteNo->Visible) { // OocyteNo ?>
        <td <?= $Page->OocyteNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_stage_OocyteNo" class="ivf_oocytedenudation_stage_OocyteNo">
<span<?= $Page->OocyteNo->viewAttributes() ?>>
<?= $Page->OocyteNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Stage->Visible) { // Stage ?>
        <td <?= $Page->Stage->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_stage_Stage" class="ivf_oocytedenudation_stage_Stage">
<span<?= $Page->Stage->viewAttributes() ?>>
<?= $Page->Stage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ReMarks->Visible) { // ReMarks ?>
        <td <?= $Page->ReMarks->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_stage_ReMarks" class="ivf_oocytedenudation_stage_ReMarks">
<span<?= $Page->ReMarks->viewAttributes() ?>>
<?= $Page->ReMarks->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <td <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_stage_status" class="ivf_oocytedenudation_stage_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <td <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_stage_createdby" class="ivf_oocytedenudation_stage_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_stage_createddatetime" class="ivf_oocytedenudation_stage_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_stage_modifiedby" class="ivf_oocytedenudation_stage_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_stage_modifieddatetime" class="ivf_oocytedenudation_stage_modifieddatetime">
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
