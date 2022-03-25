<?php

namespace PHPMaker2021\project3;

// Page object
$EmployeeAddressView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var femployee_addressview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    femployee_addressview = currentForm = new ew.Form("femployee_addressview", "view");
    loadjs.done("femployee_addressview");
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
<form name="femployee_addressview" id="femployee_addressview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_address">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_address_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_employee_address_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->employee_id->Visible) { // employee_id ?>
    <tr id="r_employee_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_address_employee_id"><?= $Page->employee_id->caption() ?></span></td>
        <td data-name="employee_id" <?= $Page->employee_id->cellAttributes() ?>>
<span id="el_employee_address_employee_id">
<span<?= $Page->employee_id->viewAttributes() ?>>
<?= $Page->employee_id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->contact_persion->Visible) { // contact_persion ?>
    <tr id="r_contact_persion">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_address_contact_persion"><?= $Page->contact_persion->caption() ?></span></td>
        <td data-name="contact_persion" <?= $Page->contact_persion->cellAttributes() ?>>
<span id="el_employee_address_contact_persion">
<span<?= $Page->contact_persion->viewAttributes() ?>>
<?= $Page->contact_persion->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->street->Visible) { // street ?>
    <tr id="r_street">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_address_street"><?= $Page->street->caption() ?></span></td>
        <td data-name="street" <?= $Page->street->cellAttributes() ?>>
<span id="el_employee_address_street">
<span<?= $Page->street->viewAttributes() ?>>
<?= $Page->street->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->town->Visible) { // town ?>
    <tr id="r_town">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_address_town"><?= $Page->town->caption() ?></span></td>
        <td data-name="town" <?= $Page->town->cellAttributes() ?>>
<span id="el_employee_address_town">
<span<?= $Page->town->viewAttributes() ?>>
<?= $Page->town->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->province->Visible) { // province ?>
    <tr id="r_province">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_address_province"><?= $Page->province->caption() ?></span></td>
        <td data-name="province" <?= $Page->province->cellAttributes() ?>>
<span id="el_employee_address_province">
<span<?= $Page->province->viewAttributes() ?>>
<?= $Page->province->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->postal_code->Visible) { // postal_code ?>
    <tr id="r_postal_code">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_address_postal_code"><?= $Page->postal_code->caption() ?></span></td>
        <td data-name="postal_code" <?= $Page->postal_code->cellAttributes() ?>>
<span id="el_employee_address_postal_code">
<span<?= $Page->postal_code->viewAttributes() ?>>
<?= $Page->postal_code->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->address_type->Visible) { // address_type ?>
    <tr id="r_address_type">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_address_address_type"><?= $Page->address_type->caption() ?></span></td>
        <td data-name="address_type" <?= $Page->address_type->cellAttributes() ?>>
<span id="el_employee_address_address_type">
<span<?= $Page->address_type->viewAttributes() ?>>
<?= $Page->address_type->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <tr id="r_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_address_status"><?= $Page->status->caption() ?></span></td>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el_employee_address_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <tr id="r_createdby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_address_createdby"><?= $Page->createdby->caption() ?></span></td>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<span id="el_employee_address_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <tr id="r_createddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_address_createddatetime"><?= $Page->createddatetime->caption() ?></span></td>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_employee_address_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <tr id="r_modifiedby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_address_modifiedby"><?= $Page->modifiedby->caption() ?></span></td>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_employee_address_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <tr id="r_modifieddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_address_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></td>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_employee_address_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
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
