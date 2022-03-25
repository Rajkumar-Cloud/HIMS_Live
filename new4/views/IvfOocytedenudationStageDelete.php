<?php

namespace PHPMaker2021\HIMS;

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
<script>
if (!ew.vars.tables.ivf_oocytedenudation_stage) ew.vars.tables.ivf_oocytedenudation_stage = <?= JsonEncode(GetClientVar("tables", "ivf_oocytedenudation_stage")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fivf_oocytedenudation_stagedelete" id="fivf_oocytedenudation_stagedelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
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
<?php if ($Page->OocyteNo->Visible) { // OocyteNo ?>
        <th class="<?= $Page->OocyteNo->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_stage_OocyteNo" class="ivf_oocytedenudation_stage_OocyteNo"><?= $Page->OocyteNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Stage->Visible) { // Stage ?>
        <th class="<?= $Page->Stage->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_stage_Stage" class="ivf_oocytedenudation_stage_Stage"><?= $Page->Stage->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ReMarks->Visible) { // ReMarks ?>
        <th class="<?= $Page->ReMarks->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_stage_ReMarks" class="ivf_oocytedenudation_stage_ReMarks"><?= $Page->ReMarks->caption() ?></span></th>
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
