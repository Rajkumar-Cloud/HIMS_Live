<?php

namespace PHPMaker2021\project3;

// Page object
$BankbranchesView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fbankbranchesview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fbankbranchesview = currentForm = new ew.Form("fbankbranchesview", "view");
    loadjs.done("fbankbranchesview");
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
<form name="fbankbranchesview" id="fbankbranchesview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="bankbranches">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_bankbranches_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_bankbranches_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Branch_Name->Visible) { // Branch_Name ?>
    <tr id="r_Branch_Name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_bankbranches_Branch_Name"><?= $Page->Branch_Name->caption() ?></span></td>
        <td data-name="Branch_Name" <?= $Page->Branch_Name->cellAttributes() ?>>
<span id="el_bankbranches_Branch_Name">
<span<?= $Page->Branch_Name->viewAttributes() ?>>
<?= $Page->Branch_Name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Street_Address->Visible) { // Street_Address ?>
    <tr id="r_Street_Address">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_bankbranches_Street_Address"><?= $Page->Street_Address->caption() ?></span></td>
        <td data-name="Street_Address" <?= $Page->Street_Address->cellAttributes() ?>>
<span id="el_bankbranches_Street_Address">
<span<?= $Page->Street_Address->viewAttributes() ?>>
<?= $Page->Street_Address->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->City->Visible) { // City ?>
    <tr id="r_City">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_bankbranches_City"><?= $Page->City->caption() ?></span></td>
        <td data-name="City" <?= $Page->City->cellAttributes() ?>>
<span id="el_bankbranches_City">
<span<?= $Page->City->viewAttributes() ?>>
<?= $Page->City->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->State->Visible) { // State ?>
    <tr id="r_State">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_bankbranches_State"><?= $Page->State->caption() ?></span></td>
        <td data-name="State" <?= $Page->State->cellAttributes() ?>>
<span id="el_bankbranches_State">
<span<?= $Page->State->viewAttributes() ?>>
<?= $Page->State->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Zipcode->Visible) { // Zipcode ?>
    <tr id="r_Zipcode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_bankbranches_Zipcode"><?= $Page->Zipcode->caption() ?></span></td>
        <td data-name="Zipcode" <?= $Page->Zipcode->cellAttributes() ?>>
<span id="el_bankbranches_Zipcode">
<span<?= $Page->Zipcode->viewAttributes() ?>>
<?= $Page->Zipcode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Phone_Number->Visible) { // Phone_Number ?>
    <tr id="r_Phone_Number">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_bankbranches_Phone_Number"><?= $Page->Phone_Number->caption() ?></span></td>
        <td data-name="Phone_Number" <?= $Page->Phone_Number->cellAttributes() ?>>
<span id="el_bankbranches_Phone_Number">
<span<?= $Page->Phone_Number->viewAttributes() ?>>
<?= $Page->Phone_Number->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AccountNo->Visible) { // AccountNo ?>
    <tr id="r_AccountNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_bankbranches_AccountNo"><?= $Page->AccountNo->caption() ?></span></td>
        <td data-name="AccountNo" <?= $Page->AccountNo->cellAttributes() ?>>
<span id="el_bankbranches_AccountNo">
<span<?= $Page->AccountNo->viewAttributes() ?>>
<?= $Page->AccountNo->getViewValue() ?></span>
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
