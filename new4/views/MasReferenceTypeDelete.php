<?php

namespace PHPMaker2021\HIMS;

// Page object
$MasReferenceTypeDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fmas_reference_typedelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fmas_reference_typedelete = currentForm = new ew.Form("fmas_reference_typedelete", "delete");
    loadjs.done("fmas_reference_typedelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.mas_reference_type) ew.vars.tables.mas_reference_type = <?= JsonEncode(GetClientVar("tables", "mas_reference_type")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fmas_reference_typedelete" id="fmas_reference_typedelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="mas_reference_type">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_mas_reference_type_id" class="mas_reference_type_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->reference->Visible) { // reference ?>
        <th class="<?= $Page->reference->headerCellClass() ?>"><span id="elh_mas_reference_type_reference" class="mas_reference_type_reference"><?= $Page->reference->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ReferMobileNo->Visible) { // ReferMobileNo ?>
        <th class="<?= $Page->ReferMobileNo->headerCellClass() ?>"><span id="elh_mas_reference_type_ReferMobileNo" class="mas_reference_type_ReferMobileNo"><?= $Page->ReferMobileNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ReferClinicname->Visible) { // ReferClinicname ?>
        <th class="<?= $Page->ReferClinicname->headerCellClass() ?>"><span id="elh_mas_reference_type_ReferClinicname" class="mas_reference_type_ReferClinicname"><?= $Page->ReferClinicname->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ReferCity->Visible) { // ReferCity ?>
        <th class="<?= $Page->ReferCity->headerCellClass() ?>"><span id="elh_mas_reference_type_ReferCity" class="mas_reference_type_ReferCity"><?= $Page->ReferCity->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th class="<?= $Page->HospID->headerCellClass() ?>"><span id="elh_mas_reference_type_HospID" class="mas_reference_type_HospID"><?= $Page->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->_email->Visible) { // email ?>
        <th class="<?= $Page->_email->headerCellClass() ?>"><span id="elh_mas_reference_type__email" class="mas_reference_type__email"><?= $Page->_email->caption() ?></span></th>
<?php } ?>
<?php if ($Page->whatapp->Visible) { // whatapp ?>
        <th class="<?= $Page->whatapp->headerCellClass() ?>"><span id="elh_mas_reference_type_whatapp" class="mas_reference_type_whatapp"><?= $Page->whatapp->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_mas_reference_type_id" class="mas_reference_type_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->reference->Visible) { // reference ?>
        <td <?= $Page->reference->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_reference_type_reference" class="mas_reference_type_reference">
<span<?= $Page->reference->viewAttributes() ?>>
<?= $Page->reference->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ReferMobileNo->Visible) { // ReferMobileNo ?>
        <td <?= $Page->ReferMobileNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_reference_type_ReferMobileNo" class="mas_reference_type_ReferMobileNo">
<span<?= $Page->ReferMobileNo->viewAttributes() ?>>
<?= $Page->ReferMobileNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ReferClinicname->Visible) { // ReferClinicname ?>
        <td <?= $Page->ReferClinicname->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_reference_type_ReferClinicname" class="mas_reference_type_ReferClinicname">
<span<?= $Page->ReferClinicname->viewAttributes() ?>>
<?= $Page->ReferClinicname->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ReferCity->Visible) { // ReferCity ?>
        <td <?= $Page->ReferCity->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_reference_type_ReferCity" class="mas_reference_type_ReferCity">
<span<?= $Page->ReferCity->viewAttributes() ?>>
<?= $Page->ReferCity->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <td <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_reference_type_HospID" class="mas_reference_type_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->_email->Visible) { // email ?>
        <td <?= $Page->_email->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_reference_type__email" class="mas_reference_type__email">
<span<?= $Page->_email->viewAttributes() ?>>
<?= $Page->_email->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->whatapp->Visible) { // whatapp ?>
        <td <?= $Page->whatapp->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_reference_type_whatapp" class="mas_reference_type_whatapp">
<span<?= $Page->whatapp->viewAttributes() ?>>
<?= $Page->whatapp->getViewValue() ?></span>
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
