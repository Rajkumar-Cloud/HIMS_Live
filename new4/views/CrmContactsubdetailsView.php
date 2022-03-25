<?php

namespace PHPMaker2021\HIMS;

// Page object
$CrmContactsubdetailsView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fcrm_contactsubdetailsview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fcrm_contactsubdetailsview = currentForm = new ew.Form("fcrm_contactsubdetailsview", "view");
    loadjs.done("fcrm_contactsubdetailsview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.crm_contactsubdetails) ew.vars.tables.crm_contactsubdetails = <?= JsonEncode(GetClientVar("tables", "crm_contactsubdetails")) ?>;
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
<form name="fcrm_contactsubdetailsview" id="fcrm_contactsubdetailsview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="crm_contactsubdetails">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->contactsubscriptionid->Visible) { // contactsubscriptionid ?>
    <tr id="r_contactsubscriptionid">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_contactsubdetails_contactsubscriptionid"><?= $Page->contactsubscriptionid->caption() ?></span></td>
        <td data-name="contactsubscriptionid" <?= $Page->contactsubscriptionid->cellAttributes() ?>>
<span id="el_crm_contactsubdetails_contactsubscriptionid">
<span<?= $Page->contactsubscriptionid->viewAttributes() ?>>
<?= $Page->contactsubscriptionid->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->birthday->Visible) { // birthday ?>
    <tr id="r_birthday">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_contactsubdetails_birthday"><?= $Page->birthday->caption() ?></span></td>
        <td data-name="birthday" <?= $Page->birthday->cellAttributes() ?>>
<span id="el_crm_contactsubdetails_birthday">
<span<?= $Page->birthday->viewAttributes() ?>>
<?= $Page->birthday->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->laststayintouchrequest->Visible) { // laststayintouchrequest ?>
    <tr id="r_laststayintouchrequest">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_contactsubdetails_laststayintouchrequest"><?= $Page->laststayintouchrequest->caption() ?></span></td>
        <td data-name="laststayintouchrequest" <?= $Page->laststayintouchrequest->cellAttributes() ?>>
<span id="el_crm_contactsubdetails_laststayintouchrequest">
<span<?= $Page->laststayintouchrequest->viewAttributes() ?>>
<?= $Page->laststayintouchrequest->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->laststayintouchsavedate->Visible) { // laststayintouchsavedate ?>
    <tr id="r_laststayintouchsavedate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_contactsubdetails_laststayintouchsavedate"><?= $Page->laststayintouchsavedate->caption() ?></span></td>
        <td data-name="laststayintouchsavedate" <?= $Page->laststayintouchsavedate->cellAttributes() ?>>
<span id="el_crm_contactsubdetails_laststayintouchsavedate">
<span<?= $Page->laststayintouchsavedate->viewAttributes() ?>>
<?= $Page->laststayintouchsavedate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->leadsource->Visible) { // leadsource ?>
    <tr id="r_leadsource">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_contactsubdetails_leadsource"><?= $Page->leadsource->caption() ?></span></td>
        <td data-name="leadsource" <?= $Page->leadsource->cellAttributes() ?>>
<span id="el_crm_contactsubdetails_leadsource">
<span<?= $Page->leadsource->viewAttributes() ?>>
<?= $Page->leadsource->getViewValue() ?></span>
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
