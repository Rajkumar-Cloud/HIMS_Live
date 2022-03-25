<?php

namespace PHPMaker2021\project3;

// Page object
$ReceptionDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var freceptiondelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    freceptiondelete = currentForm = new ew.Form("freceptiondelete", "delete");
    loadjs.done("freceptiondelete");
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
<form name="freceptiondelete" id="freceptiondelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="reception">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_reception_id" class="reception_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
        <th class="<?= $Page->PatientID->headerCellClass() ?>"><span id="elh_reception_PatientID" class="reception_PatientID"><?= $Page->PatientID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <th class="<?= $Page->PatientName->headerCellClass() ?>"><span id="elh_reception_PatientName" class="reception_PatientName"><?= $Page->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->OorN->Visible) { // OorN ?>
        <th class="<?= $Page->OorN->headerCellClass() ?>"><span id="elh_reception_OorN" class="reception_OorN"><?= $Page->OorN->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PRIMARY_CONSULTANT->Visible) { // PRIMARY_CONSULTANT ?>
        <th class="<?= $Page->PRIMARY_CONSULTANT->headerCellClass() ?>"><span id="elh_reception_PRIMARY_CONSULTANT" class="reception_PRIMARY_CONSULTANT"><?= $Page->PRIMARY_CONSULTANT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CATEGORY->Visible) { // CATEGORY ?>
        <th class="<?= $Page->CATEGORY->headerCellClass() ?>"><span id="elh_reception_CATEGORY" class="reception_CATEGORY"><?= $Page->CATEGORY->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PROCEDURE->Visible) { // PROCEDURE ?>
        <th class="<?= $Page->PROCEDURE->headerCellClass() ?>"><span id="elh_reception_PROCEDURE" class="reception_PROCEDURE"><?= $Page->PROCEDURE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
        <th class="<?= $Page->Amount->headerCellClass() ?>"><span id="elh_reception_Amount" class="reception_Amount"><?= $Page->Amount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MODE_OF_PAYMENT->Visible) { // MODE OF PAYMENT ?>
        <th class="<?= $Page->MODE_OF_PAYMENT->headerCellClass() ?>"><span id="elh_reception_MODE_OF_PAYMENT" class="reception_MODE_OF_PAYMENT"><?= $Page->MODE_OF_PAYMENT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->NEXT_REVIEW_DATE->Visible) { // NEXT REVIEW DATE ?>
        <th class="<?= $Page->NEXT_REVIEW_DATE->headerCellClass() ?>"><span id="elh_reception_NEXT_REVIEW_DATE" class="reception_NEXT_REVIEW_DATE"><?= $Page->NEXT_REVIEW_DATE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->REMARKS->Visible) { // REMARKS ?>
        <th class="<?= $Page->REMARKS->headerCellClass() ?>"><span id="elh_reception_REMARKS" class="reception_REMARKS"><?= $Page->REMARKS->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_reception_id" class="reception_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
        <td <?= $Page->PatientID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_reception_PatientID" class="reception_PatientID">
<span<?= $Page->PatientID->viewAttributes() ?>>
<?= $Page->PatientID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td <?= $Page->PatientName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_reception_PatientName" class="reception_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->OorN->Visible) { // OorN ?>
        <td <?= $Page->OorN->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_reception_OorN" class="reception_OorN">
<span<?= $Page->OorN->viewAttributes() ?>>
<?= $Page->OorN->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PRIMARY_CONSULTANT->Visible) { // PRIMARY_CONSULTANT ?>
        <td <?= $Page->PRIMARY_CONSULTANT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_reception_PRIMARY_CONSULTANT" class="reception_PRIMARY_CONSULTANT">
<span<?= $Page->PRIMARY_CONSULTANT->viewAttributes() ?>>
<?= $Page->PRIMARY_CONSULTANT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CATEGORY->Visible) { // CATEGORY ?>
        <td <?= $Page->CATEGORY->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_reception_CATEGORY" class="reception_CATEGORY">
<span<?= $Page->CATEGORY->viewAttributes() ?>>
<?= $Page->CATEGORY->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PROCEDURE->Visible) { // PROCEDURE ?>
        <td <?= $Page->PROCEDURE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_reception_PROCEDURE" class="reception_PROCEDURE">
<span<?= $Page->PROCEDURE->viewAttributes() ?>>
<?= $Page->PROCEDURE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
        <td <?= $Page->Amount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_reception_Amount" class="reception_Amount">
<span<?= $Page->Amount->viewAttributes() ?>>
<?= $Page->Amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MODE_OF_PAYMENT->Visible) { // MODE OF PAYMENT ?>
        <td <?= $Page->MODE_OF_PAYMENT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_reception_MODE_OF_PAYMENT" class="reception_MODE_OF_PAYMENT">
<span<?= $Page->MODE_OF_PAYMENT->viewAttributes() ?>>
<?= $Page->MODE_OF_PAYMENT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->NEXT_REVIEW_DATE->Visible) { // NEXT REVIEW DATE ?>
        <td <?= $Page->NEXT_REVIEW_DATE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_reception_NEXT_REVIEW_DATE" class="reception_NEXT_REVIEW_DATE">
<span<?= $Page->NEXT_REVIEW_DATE->viewAttributes() ?>>
<?= $Page->NEXT_REVIEW_DATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->REMARKS->Visible) { // REMARKS ?>
        <td <?= $Page->REMARKS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_reception_REMARKS" class="reception_REMARKS">
<span<?= $Page->REMARKS->viewAttributes() ?>>
<?= $Page->REMARKS->getViewValue() ?></span>
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
