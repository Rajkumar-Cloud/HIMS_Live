<?php

namespace PHPMaker2021\HIMS;

// Page object
$CrmLeadstatusView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fcrm_leadstatusview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fcrm_leadstatusview = currentForm = new ew.Form("fcrm_leadstatusview", "view");
    loadjs.done("fcrm_leadstatusview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.crm_leadstatus) ew.vars.tables.crm_leadstatus = <?= JsonEncode(GetClientVar("tables", "crm_leadstatus")) ?>;
</script>
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
<form name="fcrm_leadstatusview" id="fcrm_leadstatusview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="crm_leadstatus">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->leadstatusid->Visible) { // leadstatusid ?>
    <tr id="r_leadstatusid">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leadstatus_leadstatusid"><?= $Page->leadstatusid->caption() ?></span></td>
        <td data-name="leadstatusid" <?= $Page->leadstatusid->cellAttributes() ?>>
<span id="el_crm_leadstatus_leadstatusid">
<span<?= $Page->leadstatusid->viewAttributes() ?>>
<?= $Page->leadstatusid->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->leadstatus->Visible) { // leadstatus ?>
    <tr id="r_leadstatus">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leadstatus_leadstatus"><?= $Page->leadstatus->caption() ?></span></td>
        <td data-name="leadstatus" <?= $Page->leadstatus->cellAttributes() ?>>
<span id="el_crm_leadstatus_leadstatus">
<span<?= $Page->leadstatus->viewAttributes() ?>>
<?= $Page->leadstatus->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->presence->Visible) { // presence ?>
    <tr id="r_presence">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leadstatus_presence"><?= $Page->presence->caption() ?></span></td>
        <td data-name="presence" <?= $Page->presence->cellAttributes() ?>>
<span id="el_crm_leadstatus_presence">
<span<?= $Page->presence->viewAttributes() ?>>
<?= $Page->presence->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->picklist_valueid->Visible) { // picklist_valueid ?>
    <tr id="r_picklist_valueid">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leadstatus_picklist_valueid"><?= $Page->picklist_valueid->caption() ?></span></td>
        <td data-name="picklist_valueid" <?= $Page->picklist_valueid->cellAttributes() ?>>
<span id="el_crm_leadstatus_picklist_valueid">
<span<?= $Page->picklist_valueid->viewAttributes() ?>>
<?= $Page->picklist_valueid->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->sortorderid->Visible) { // sortorderid ?>
    <tr id="r_sortorderid">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leadstatus_sortorderid"><?= $Page->sortorderid->caption() ?></span></td>
        <td data-name="sortorderid" <?= $Page->sortorderid->cellAttributes() ?>>
<span id="el_crm_leadstatus_sortorderid">
<span<?= $Page->sortorderid->viewAttributes() ?>>
<?= $Page->sortorderid->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->color->Visible) { // color ?>
    <tr id="r_color">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leadstatus_color"><?= $Page->color->caption() ?></span></td>
        <td data-name="color" <?= $Page->color->cellAttributes() ?>>
<span id="el_crm_leadstatus_color">
<span<?= $Page->color->viewAttributes() ?>>
<?= $Page->color->getViewValue() ?></span>
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
