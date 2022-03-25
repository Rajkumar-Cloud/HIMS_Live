<?php

namespace PHPMaker2021\HIMS;

// Page object
$CrmLeadaddressView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fcrm_leadaddressview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fcrm_leadaddressview = currentForm = new ew.Form("fcrm_leadaddressview", "view");
    loadjs.done("fcrm_leadaddressview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.crm_leadaddress) ew.vars.tables.crm_leadaddress = <?= JsonEncode(GetClientVar("tables", "crm_leadaddress")) ?>;
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
<form name="fcrm_leadaddressview" id="fcrm_leadaddressview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="crm_leadaddress">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->leadaddressid->Visible) { // leadaddressid ?>
    <tr id="r_leadaddressid">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leadaddress_leadaddressid"><?= $Page->leadaddressid->caption() ?></span></td>
        <td data-name="leadaddressid" <?= $Page->leadaddressid->cellAttributes() ?>>
<span id="el_crm_leadaddress_leadaddressid">
<span<?= $Page->leadaddressid->viewAttributes() ?>>
<?= $Page->leadaddressid->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->phone->Visible) { // phone ?>
    <tr id="r_phone">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leadaddress_phone"><?= $Page->phone->caption() ?></span></td>
        <td data-name="phone" <?= $Page->phone->cellAttributes() ?>>
<span id="el_crm_leadaddress_phone">
<span<?= $Page->phone->viewAttributes() ?>>
<?= $Page->phone->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->mobile->Visible) { // mobile ?>
    <tr id="r_mobile">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leadaddress_mobile"><?= $Page->mobile->caption() ?></span></td>
        <td data-name="mobile" <?= $Page->mobile->cellAttributes() ?>>
<span id="el_crm_leadaddress_mobile">
<span<?= $Page->mobile->viewAttributes() ?>>
<?= $Page->mobile->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->fax->Visible) { // fax ?>
    <tr id="r_fax">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leadaddress_fax"><?= $Page->fax->caption() ?></span></td>
        <td data-name="fax" <?= $Page->fax->cellAttributes() ?>>
<span id="el_crm_leadaddress_fax">
<span<?= $Page->fax->viewAttributes() ?>>
<?= $Page->fax->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->addresslevel1a->Visible) { // addresslevel1a ?>
    <tr id="r_addresslevel1a">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leadaddress_addresslevel1a"><?= $Page->addresslevel1a->caption() ?></span></td>
        <td data-name="addresslevel1a" <?= $Page->addresslevel1a->cellAttributes() ?>>
<span id="el_crm_leadaddress_addresslevel1a">
<span<?= $Page->addresslevel1a->viewAttributes() ?>>
<?= $Page->addresslevel1a->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->addresslevel2a->Visible) { // addresslevel2a ?>
    <tr id="r_addresslevel2a">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leadaddress_addresslevel2a"><?= $Page->addresslevel2a->caption() ?></span></td>
        <td data-name="addresslevel2a" <?= $Page->addresslevel2a->cellAttributes() ?>>
<span id="el_crm_leadaddress_addresslevel2a">
<span<?= $Page->addresslevel2a->viewAttributes() ?>>
<?= $Page->addresslevel2a->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->addresslevel3a->Visible) { // addresslevel3a ?>
    <tr id="r_addresslevel3a">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leadaddress_addresslevel3a"><?= $Page->addresslevel3a->caption() ?></span></td>
        <td data-name="addresslevel3a" <?= $Page->addresslevel3a->cellAttributes() ?>>
<span id="el_crm_leadaddress_addresslevel3a">
<span<?= $Page->addresslevel3a->viewAttributes() ?>>
<?= $Page->addresslevel3a->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->addresslevel4a->Visible) { // addresslevel4a ?>
    <tr id="r_addresslevel4a">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leadaddress_addresslevel4a"><?= $Page->addresslevel4a->caption() ?></span></td>
        <td data-name="addresslevel4a" <?= $Page->addresslevel4a->cellAttributes() ?>>
<span id="el_crm_leadaddress_addresslevel4a">
<span<?= $Page->addresslevel4a->viewAttributes() ?>>
<?= $Page->addresslevel4a->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->addresslevel5a->Visible) { // addresslevel5a ?>
    <tr id="r_addresslevel5a">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leadaddress_addresslevel5a"><?= $Page->addresslevel5a->caption() ?></span></td>
        <td data-name="addresslevel5a" <?= $Page->addresslevel5a->cellAttributes() ?>>
<span id="el_crm_leadaddress_addresslevel5a">
<span<?= $Page->addresslevel5a->viewAttributes() ?>>
<?= $Page->addresslevel5a->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->addresslevel6a->Visible) { // addresslevel6a ?>
    <tr id="r_addresslevel6a">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leadaddress_addresslevel6a"><?= $Page->addresslevel6a->caption() ?></span></td>
        <td data-name="addresslevel6a" <?= $Page->addresslevel6a->cellAttributes() ?>>
<span id="el_crm_leadaddress_addresslevel6a">
<span<?= $Page->addresslevel6a->viewAttributes() ?>>
<?= $Page->addresslevel6a->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->addresslevel7a->Visible) { // addresslevel7a ?>
    <tr id="r_addresslevel7a">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leadaddress_addresslevel7a"><?= $Page->addresslevel7a->caption() ?></span></td>
        <td data-name="addresslevel7a" <?= $Page->addresslevel7a->cellAttributes() ?>>
<span id="el_crm_leadaddress_addresslevel7a">
<span<?= $Page->addresslevel7a->viewAttributes() ?>>
<?= $Page->addresslevel7a->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->addresslevel8a->Visible) { // addresslevel8a ?>
    <tr id="r_addresslevel8a">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leadaddress_addresslevel8a"><?= $Page->addresslevel8a->caption() ?></span></td>
        <td data-name="addresslevel8a" <?= $Page->addresslevel8a->cellAttributes() ?>>
<span id="el_crm_leadaddress_addresslevel8a">
<span<?= $Page->addresslevel8a->viewAttributes() ?>>
<?= $Page->addresslevel8a->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->buildingnumbera->Visible) { // buildingnumbera ?>
    <tr id="r_buildingnumbera">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leadaddress_buildingnumbera"><?= $Page->buildingnumbera->caption() ?></span></td>
        <td data-name="buildingnumbera" <?= $Page->buildingnumbera->cellAttributes() ?>>
<span id="el_crm_leadaddress_buildingnumbera">
<span<?= $Page->buildingnumbera->viewAttributes() ?>>
<?= $Page->buildingnumbera->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->localnumbera->Visible) { // localnumbera ?>
    <tr id="r_localnumbera">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leadaddress_localnumbera"><?= $Page->localnumbera->caption() ?></span></td>
        <td data-name="localnumbera" <?= $Page->localnumbera->cellAttributes() ?>>
<span id="el_crm_leadaddress_localnumbera">
<span<?= $Page->localnumbera->viewAttributes() ?>>
<?= $Page->localnumbera->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->poboxa->Visible) { // poboxa ?>
    <tr id="r_poboxa">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leadaddress_poboxa"><?= $Page->poboxa->caption() ?></span></td>
        <td data-name="poboxa" <?= $Page->poboxa->cellAttributes() ?>>
<span id="el_crm_leadaddress_poboxa">
<span<?= $Page->poboxa->viewAttributes() ?>>
<?= $Page->poboxa->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->phone_extra->Visible) { // phone_extra ?>
    <tr id="r_phone_extra">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leadaddress_phone_extra"><?= $Page->phone_extra->caption() ?></span></td>
        <td data-name="phone_extra" <?= $Page->phone_extra->cellAttributes() ?>>
<span id="el_crm_leadaddress_phone_extra">
<span<?= $Page->phone_extra->viewAttributes() ?>>
<?= $Page->phone_extra->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->mobile_extra->Visible) { // mobile_extra ?>
    <tr id="r_mobile_extra">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leadaddress_mobile_extra"><?= $Page->mobile_extra->caption() ?></span></td>
        <td data-name="mobile_extra" <?= $Page->mobile_extra->cellAttributes() ?>>
<span id="el_crm_leadaddress_mobile_extra">
<span<?= $Page->mobile_extra->viewAttributes() ?>>
<?= $Page->mobile_extra->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->fax_extra->Visible) { // fax_extra ?>
    <tr id="r_fax_extra">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leadaddress_fax_extra"><?= $Page->fax_extra->caption() ?></span></td>
        <td data-name="fax_extra" <?= $Page->fax_extra->cellAttributes() ?>>
<span id="el_crm_leadaddress_fax_extra">
<span<?= $Page->fax_extra->viewAttributes() ?>>
<?= $Page->fax_extra->getViewValue() ?></span>
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
