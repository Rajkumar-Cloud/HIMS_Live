<?php

namespace PHPMaker2021\project3;

// Page object
$IvfAgencyView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fivf_agencyview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fivf_agencyview = currentForm = new ew.Form("fivf_agencyview", "view");
    loadjs.done("fivf_agencyview");
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
<form name="fivf_agencyview" id="fivf_agencyview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_agency">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_agency_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_ivf_agency_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
    <tr id="r_Name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_agency_Name"><?= $Page->Name->caption() ?></span></td>
        <td data-name="Name" <?= $Page->Name->cellAttributes() ?>>
<span id="el_ivf_agency_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Street->Visible) { // Street ?>
    <tr id="r_Street">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_agency_Street"><?= $Page->Street->caption() ?></span></td>
        <td data-name="Street" <?= $Page->Street->cellAttributes() ?>>
<span id="el_ivf_agency_Street">
<span<?= $Page->Street->viewAttributes() ?>>
<?= $Page->Street->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Town->Visible) { // Town ?>
    <tr id="r_Town">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_agency_Town"><?= $Page->Town->caption() ?></span></td>
        <td data-name="Town" <?= $Page->Town->cellAttributes() ?>>
<span id="el_ivf_agency_Town">
<span<?= $Page->Town->viewAttributes() ?>>
<?= $Page->Town->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->State->Visible) { // State ?>
    <tr id="r_State">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_agency_State"><?= $Page->State->caption() ?></span></td>
        <td data-name="State" <?= $Page->State->cellAttributes() ?>>
<span id="el_ivf_agency_State">
<span<?= $Page->State->viewAttributes() ?>>
<?= $Page->State->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Pin->Visible) { // Pin ?>
    <tr id="r_Pin">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_agency_Pin"><?= $Page->Pin->caption() ?></span></td>
        <td data-name="Pin" <?= $Page->Pin->cellAttributes() ?>>
<span id="el_ivf_agency_Pin">
<span<?= $Page->Pin->viewAttributes() ?>>
<?= $Page->Pin->getViewValue() ?></span>
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
