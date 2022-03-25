<?php

namespace PHPMaker2021\HIMS;

// Page object
$LabDeptMastDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var flab_dept_mastdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    flab_dept_mastdelete = currentForm = new ew.Form("flab_dept_mastdelete", "delete");
    loadjs.done("flab_dept_mastdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.lab_dept_mast) ew.vars.tables.lab_dept_mast = <?= JsonEncode(GetClientVar("tables", "lab_dept_mast")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="flab_dept_mastdelete" id="flab_dept_mastdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="lab_dept_mast">
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
<?php if ($Page->MainCD->Visible) { // MainCD ?>
        <th class="<?= $Page->MainCD->headerCellClass() ?>"><span id="elh_lab_dept_mast_MainCD" class="lab_dept_mast_MainCD"><?= $Page->MainCD->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Code->Visible) { // Code ?>
        <th class="<?= $Page->Code->headerCellClass() ?>"><span id="elh_lab_dept_mast_Code" class="lab_dept_mast_Code"><?= $Page->Code->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
        <th class="<?= $Page->Name->headerCellClass() ?>"><span id="elh_lab_dept_mast_Name" class="lab_dept_mast_Name"><?= $Page->Name->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Order->Visible) { // Order ?>
        <th class="<?= $Page->Order->headerCellClass() ?>"><span id="elh_lab_dept_mast_Order" class="lab_dept_mast_Order"><?= $Page->Order->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SignCD->Visible) { // SignCD ?>
        <th class="<?= $Page->SignCD->headerCellClass() ?>"><span id="elh_lab_dept_mast_SignCD" class="lab_dept_mast_SignCD"><?= $Page->SignCD->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Collection->Visible) { // Collection ?>
        <th class="<?= $Page->Collection->headerCellClass() ?>"><span id="elh_lab_dept_mast_Collection" class="lab_dept_mast_Collection"><?= $Page->Collection->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EditDate->Visible) { // EditDate ?>
        <th class="<?= $Page->EditDate->headerCellClass() ?>"><span id="elh_lab_dept_mast_EditDate" class="lab_dept_mast_EditDate"><?= $Page->EditDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SMS->Visible) { // SMS ?>
        <th class="<?= $Page->SMS->headerCellClass() ?>"><span id="elh_lab_dept_mast_SMS" class="lab_dept_mast_SMS"><?= $Page->SMS->caption() ?></span></th>
<?php } ?>
<?php if ($Page->WorkList->Visible) { // WorkList ?>
        <th class="<?= $Page->WorkList->headerCellClass() ?>"><span id="elh_lab_dept_mast_WorkList" class="lab_dept_mast_WorkList"><?= $Page->WorkList->caption() ?></span></th>
<?php } ?>
<?php if ($Page->_Page->Visible) { // Page ?>
        <th class="<?= $Page->_Page->headerCellClass() ?>"><span id="elh_lab_dept_mast__Page" class="lab_dept_mast__Page"><?= $Page->_Page->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Incharge->Visible) { // Incharge ?>
        <th class="<?= $Page->Incharge->headerCellClass() ?>"><span id="elh_lab_dept_mast_Incharge" class="lab_dept_mast_Incharge"><?= $Page->Incharge->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AutoNum->Visible) { // AutoNum ?>
        <th class="<?= $Page->AutoNum->headerCellClass() ?>"><span id="elh_lab_dept_mast_AutoNum" class="lab_dept_mast_AutoNum"><?= $Page->AutoNum->caption() ?></span></th>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_lab_dept_mast_id" class="lab_dept_mast_id"><?= $Page->id->caption() ?></span></th>
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
<?php if ($Page->MainCD->Visible) { // MainCD ?>
        <td <?= $Page->MainCD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_dept_mast_MainCD" class="lab_dept_mast_MainCD">
<span<?= $Page->MainCD->viewAttributes() ?>>
<?= $Page->MainCD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Code->Visible) { // Code ?>
        <td <?= $Page->Code->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_dept_mast_Code" class="lab_dept_mast_Code">
<span<?= $Page->Code->viewAttributes() ?>>
<?= $Page->Code->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
        <td <?= $Page->Name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_dept_mast_Name" class="lab_dept_mast_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Order->Visible) { // Order ?>
        <td <?= $Page->Order->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_dept_mast_Order" class="lab_dept_mast_Order">
<span<?= $Page->Order->viewAttributes() ?>>
<?= $Page->Order->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SignCD->Visible) { // SignCD ?>
        <td <?= $Page->SignCD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_dept_mast_SignCD" class="lab_dept_mast_SignCD">
<span<?= $Page->SignCD->viewAttributes() ?>>
<?= $Page->SignCD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Collection->Visible) { // Collection ?>
        <td <?= $Page->Collection->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_dept_mast_Collection" class="lab_dept_mast_Collection">
<span<?= $Page->Collection->viewAttributes() ?>>
<?= $Page->Collection->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EditDate->Visible) { // EditDate ?>
        <td <?= $Page->EditDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_dept_mast_EditDate" class="lab_dept_mast_EditDate">
<span<?= $Page->EditDate->viewAttributes() ?>>
<?= $Page->EditDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SMS->Visible) { // SMS ?>
        <td <?= $Page->SMS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_dept_mast_SMS" class="lab_dept_mast_SMS">
<span<?= $Page->SMS->viewAttributes() ?>>
<?= $Page->SMS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->WorkList->Visible) { // WorkList ?>
        <td <?= $Page->WorkList->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_dept_mast_WorkList" class="lab_dept_mast_WorkList">
<span<?= $Page->WorkList->viewAttributes() ?>>
<?= $Page->WorkList->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->_Page->Visible) { // Page ?>
        <td <?= $Page->_Page->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_dept_mast__Page" class="lab_dept_mast__Page">
<span<?= $Page->_Page->viewAttributes() ?>>
<?= $Page->_Page->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Incharge->Visible) { // Incharge ?>
        <td <?= $Page->Incharge->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_dept_mast_Incharge" class="lab_dept_mast_Incharge">
<span<?= $Page->Incharge->viewAttributes() ?>>
<?= $Page->Incharge->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AutoNum->Visible) { // AutoNum ?>
        <td <?= $Page->AutoNum->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_dept_mast_AutoNum" class="lab_dept_mast_AutoNum">
<span<?= $Page->AutoNum->viewAttributes() ?>>
<?= $Page->AutoNum->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
        <td <?= $Page->id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_dept_mast_id" class="lab_dept_mast_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
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
