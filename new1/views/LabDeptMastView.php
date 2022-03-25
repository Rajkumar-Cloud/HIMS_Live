<?php

namespace PHPMaker2021\project3;

// Page object
$LabDeptMastView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var flab_dept_mastview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    flab_dept_mastview = currentForm = new ew.Form("flab_dept_mastview", "view");
    loadjs.done("flab_dept_mastview");
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
<form name="flab_dept_mastview" id="flab_dept_mastview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="lab_dept_mast">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->MainCD->Visible) { // MainCD ?>
    <tr id="r_MainCD">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_dept_mast_MainCD"><?= $Page->MainCD->caption() ?></span></td>
        <td data-name="MainCD" <?= $Page->MainCD->cellAttributes() ?>>
<span id="el_lab_dept_mast_MainCD">
<span<?= $Page->MainCD->viewAttributes() ?>>
<?= $Page->MainCD->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Code->Visible) { // Code ?>
    <tr id="r_Code">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_dept_mast_Code"><?= $Page->Code->caption() ?></span></td>
        <td data-name="Code" <?= $Page->Code->cellAttributes() ?>>
<span id="el_lab_dept_mast_Code">
<span<?= $Page->Code->viewAttributes() ?>>
<?= $Page->Code->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
    <tr id="r_Name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_dept_mast_Name"><?= $Page->Name->caption() ?></span></td>
        <td data-name="Name" <?= $Page->Name->cellAttributes() ?>>
<span id="el_lab_dept_mast_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Order->Visible) { // Order ?>
    <tr id="r_Order">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_dept_mast_Order"><?= $Page->Order->caption() ?></span></td>
        <td data-name="Order" <?= $Page->Order->cellAttributes() ?>>
<span id="el_lab_dept_mast_Order">
<span<?= $Page->Order->viewAttributes() ?>>
<?= $Page->Order->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SignCD->Visible) { // SignCD ?>
    <tr id="r_SignCD">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_dept_mast_SignCD"><?= $Page->SignCD->caption() ?></span></td>
        <td data-name="SignCD" <?= $Page->SignCD->cellAttributes() ?>>
<span id="el_lab_dept_mast_SignCD">
<span<?= $Page->SignCD->viewAttributes() ?>>
<?= $Page->SignCD->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Collection->Visible) { // Collection ?>
    <tr id="r_Collection">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_dept_mast_Collection"><?= $Page->Collection->caption() ?></span></td>
        <td data-name="Collection" <?= $Page->Collection->cellAttributes() ?>>
<span id="el_lab_dept_mast_Collection">
<span<?= $Page->Collection->viewAttributes() ?>>
<?= $Page->Collection->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EditDate->Visible) { // EditDate ?>
    <tr id="r_EditDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_dept_mast_EditDate"><?= $Page->EditDate->caption() ?></span></td>
        <td data-name="EditDate" <?= $Page->EditDate->cellAttributes() ?>>
<span id="el_lab_dept_mast_EditDate">
<span<?= $Page->EditDate->viewAttributes() ?>>
<?= $Page->EditDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SMS->Visible) { // SMS ?>
    <tr id="r_SMS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_dept_mast_SMS"><?= $Page->SMS->caption() ?></span></td>
        <td data-name="SMS" <?= $Page->SMS->cellAttributes() ?>>
<span id="el_lab_dept_mast_SMS">
<span<?= $Page->SMS->viewAttributes() ?>>
<?= $Page->SMS->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Note->Visible) { // Note ?>
    <tr id="r_Note">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_dept_mast_Note"><?= $Page->Note->caption() ?></span></td>
        <td data-name="Note" <?= $Page->Note->cellAttributes() ?>>
<span id="el_lab_dept_mast_Note">
<span<?= $Page->Note->viewAttributes() ?>>
<?= $Page->Note->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->WorkList->Visible) { // WorkList ?>
    <tr id="r_WorkList">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_dept_mast_WorkList"><?= $Page->WorkList->caption() ?></span></td>
        <td data-name="WorkList" <?= $Page->WorkList->cellAttributes() ?>>
<span id="el_lab_dept_mast_WorkList">
<span<?= $Page->WorkList->viewAttributes() ?>>
<?= $Page->WorkList->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->_Page->Visible) { // Page ?>
    <tr id="r__Page">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_dept_mast__Page"><?= $Page->_Page->caption() ?></span></td>
        <td data-name="_Page" <?= $Page->_Page->cellAttributes() ?>>
<span id="el_lab_dept_mast__Page">
<span<?= $Page->_Page->viewAttributes() ?>>
<?= $Page->_Page->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Incharge->Visible) { // Incharge ?>
    <tr id="r_Incharge">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_dept_mast_Incharge"><?= $Page->Incharge->caption() ?></span></td>
        <td data-name="Incharge" <?= $Page->Incharge->cellAttributes() ?>>
<span id="el_lab_dept_mast_Incharge">
<span<?= $Page->Incharge->viewAttributes() ?>>
<?= $Page->Incharge->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AutoNum->Visible) { // AutoNum ?>
    <tr id="r_AutoNum">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_dept_mast_AutoNum"><?= $Page->AutoNum->caption() ?></span></td>
        <td data-name="AutoNum" <?= $Page->AutoNum->cellAttributes() ?>>
<span id="el_lab_dept_mast_AutoNum">
<span<?= $Page->AutoNum->viewAttributes() ?>>
<?= $Page->AutoNum->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_dept_mast_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_lab_dept_mast_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
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
