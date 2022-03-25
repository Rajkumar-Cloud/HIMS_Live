<?php

namespace PHPMaker2021\HIMS;

// Page object
$CrmLeadsubdetailsView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fcrm_leadsubdetailsview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fcrm_leadsubdetailsview = currentForm = new ew.Form("fcrm_leadsubdetailsview", "view");
    loadjs.done("fcrm_leadsubdetailsview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.crm_leadsubdetails) ew.vars.tables.crm_leadsubdetails = <?= JsonEncode(GetClientVar("tables", "crm_leadsubdetails")) ?>;
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
<form name="fcrm_leadsubdetailsview" id="fcrm_leadsubdetailsview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="crm_leadsubdetails">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->leadsubscriptionid->Visible) { // leadsubscriptionid ?>
    <tr id="r_leadsubscriptionid">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leadsubdetails_leadsubscriptionid"><?= $Page->leadsubscriptionid->caption() ?></span></td>
        <td data-name="leadsubscriptionid" <?= $Page->leadsubscriptionid->cellAttributes() ?>>
<span id="el_crm_leadsubdetails_leadsubscriptionid">
<span<?= $Page->leadsubscriptionid->viewAttributes() ?>>
<?= $Page->leadsubscriptionid->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->website->Visible) { // website ?>
    <tr id="r_website">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leadsubdetails_website"><?= $Page->website->caption() ?></span></td>
        <td data-name="website" <?= $Page->website->cellAttributes() ?>>
<span id="el_crm_leadsubdetails_website">
<span<?= $Page->website->viewAttributes() ?>>
<?= $Page->website->getViewValue() ?></span>
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
