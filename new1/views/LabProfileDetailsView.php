<?php

namespace PHPMaker2021\project3;

// Page object
$LabProfileDetailsView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var flab_profile_detailsview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    flab_profile_detailsview = currentForm = new ew.Form("flab_profile_detailsview", "view");
    loadjs.done("flab_profile_detailsview");
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
<form name="flab_profile_detailsview" id="flab_profile_detailsview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="lab_profile_details">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_profile_details_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_lab_profile_details_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ProfileCode->Visible) { // ProfileCode ?>
    <tr id="r_ProfileCode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_profile_details_ProfileCode"><?= $Page->ProfileCode->caption() ?></span></td>
        <td data-name="ProfileCode" <?= $Page->ProfileCode->cellAttributes() ?>>
<span id="el_lab_profile_details_ProfileCode">
<span<?= $Page->ProfileCode->viewAttributes() ?>>
<?= $Page->ProfileCode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SubProfileCode->Visible) { // SubProfileCode ?>
    <tr id="r_SubProfileCode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_profile_details_SubProfileCode"><?= $Page->SubProfileCode->caption() ?></span></td>
        <td data-name="SubProfileCode" <?= $Page->SubProfileCode->cellAttributes() ?>>
<span id="el_lab_profile_details_SubProfileCode">
<span<?= $Page->SubProfileCode->viewAttributes() ?>>
<?= $Page->SubProfileCode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ProfileTestCode->Visible) { // ProfileTestCode ?>
    <tr id="r_ProfileTestCode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_profile_details_ProfileTestCode"><?= $Page->ProfileTestCode->caption() ?></span></td>
        <td data-name="ProfileTestCode" <?= $Page->ProfileTestCode->cellAttributes() ?>>
<span id="el_lab_profile_details_ProfileTestCode">
<span<?= $Page->ProfileTestCode->viewAttributes() ?>>
<?= $Page->ProfileTestCode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ProfileSubTestCode->Visible) { // ProfileSubTestCode ?>
    <tr id="r_ProfileSubTestCode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_profile_details_ProfileSubTestCode"><?= $Page->ProfileSubTestCode->caption() ?></span></td>
        <td data-name="ProfileSubTestCode" <?= $Page->ProfileSubTestCode->cellAttributes() ?>>
<span id="el_lab_profile_details_ProfileSubTestCode">
<span<?= $Page->ProfileSubTestCode->viewAttributes() ?>>
<?= $Page->ProfileSubTestCode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TestOrder->Visible) { // TestOrder ?>
    <tr id="r_TestOrder">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_profile_details_TestOrder"><?= $Page->TestOrder->caption() ?></span></td>
        <td data-name="TestOrder" <?= $Page->TestOrder->cellAttributes() ?>>
<span id="el_lab_profile_details_TestOrder">
<span<?= $Page->TestOrder->viewAttributes() ?>>
<?= $Page->TestOrder->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TestAmount->Visible) { // TestAmount ?>
    <tr id="r_TestAmount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_profile_details_TestAmount"><?= $Page->TestAmount->caption() ?></span></td>
        <td data-name="TestAmount" <?= $Page->TestAmount->cellAttributes() ?>>
<span id="el_lab_profile_details_TestAmount">
<span<?= $Page->TestAmount->viewAttributes() ?>>
<?= $Page->TestAmount->getViewValue() ?></span>
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
