<?php

namespace PHPMaker2021\HIMS;

// Page object
$CrmLeadaddressDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fcrm_leadaddressdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fcrm_leadaddressdelete = currentForm = new ew.Form("fcrm_leadaddressdelete", "delete");
    loadjs.done("fcrm_leadaddressdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.crm_leadaddress) ew.vars.tables.crm_leadaddress = <?= JsonEncode(GetClientVar("tables", "crm_leadaddress")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fcrm_leadaddressdelete" id="fcrm_leadaddressdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="crm_leadaddress">
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
<?php if ($Page->leadaddressid->Visible) { // leadaddressid ?>
        <th class="<?= $Page->leadaddressid->headerCellClass() ?>"><span id="elh_crm_leadaddress_leadaddressid" class="crm_leadaddress_leadaddressid"><?= $Page->leadaddressid->caption() ?></span></th>
<?php } ?>
<?php if ($Page->phone->Visible) { // phone ?>
        <th class="<?= $Page->phone->headerCellClass() ?>"><span id="elh_crm_leadaddress_phone" class="crm_leadaddress_phone"><?= $Page->phone->caption() ?></span></th>
<?php } ?>
<?php if ($Page->mobile->Visible) { // mobile ?>
        <th class="<?= $Page->mobile->headerCellClass() ?>"><span id="elh_crm_leadaddress_mobile" class="crm_leadaddress_mobile"><?= $Page->mobile->caption() ?></span></th>
<?php } ?>
<?php if ($Page->fax->Visible) { // fax ?>
        <th class="<?= $Page->fax->headerCellClass() ?>"><span id="elh_crm_leadaddress_fax" class="crm_leadaddress_fax"><?= $Page->fax->caption() ?></span></th>
<?php } ?>
<?php if ($Page->addresslevel1a->Visible) { // addresslevel1a ?>
        <th class="<?= $Page->addresslevel1a->headerCellClass() ?>"><span id="elh_crm_leadaddress_addresslevel1a" class="crm_leadaddress_addresslevel1a"><?= $Page->addresslevel1a->caption() ?></span></th>
<?php } ?>
<?php if ($Page->addresslevel2a->Visible) { // addresslevel2a ?>
        <th class="<?= $Page->addresslevel2a->headerCellClass() ?>"><span id="elh_crm_leadaddress_addresslevel2a" class="crm_leadaddress_addresslevel2a"><?= $Page->addresslevel2a->caption() ?></span></th>
<?php } ?>
<?php if ($Page->addresslevel3a->Visible) { // addresslevel3a ?>
        <th class="<?= $Page->addresslevel3a->headerCellClass() ?>"><span id="elh_crm_leadaddress_addresslevel3a" class="crm_leadaddress_addresslevel3a"><?= $Page->addresslevel3a->caption() ?></span></th>
<?php } ?>
<?php if ($Page->addresslevel4a->Visible) { // addresslevel4a ?>
        <th class="<?= $Page->addresslevel4a->headerCellClass() ?>"><span id="elh_crm_leadaddress_addresslevel4a" class="crm_leadaddress_addresslevel4a"><?= $Page->addresslevel4a->caption() ?></span></th>
<?php } ?>
<?php if ($Page->addresslevel5a->Visible) { // addresslevel5a ?>
        <th class="<?= $Page->addresslevel5a->headerCellClass() ?>"><span id="elh_crm_leadaddress_addresslevel5a" class="crm_leadaddress_addresslevel5a"><?= $Page->addresslevel5a->caption() ?></span></th>
<?php } ?>
<?php if ($Page->addresslevel6a->Visible) { // addresslevel6a ?>
        <th class="<?= $Page->addresslevel6a->headerCellClass() ?>"><span id="elh_crm_leadaddress_addresslevel6a" class="crm_leadaddress_addresslevel6a"><?= $Page->addresslevel6a->caption() ?></span></th>
<?php } ?>
<?php if ($Page->addresslevel7a->Visible) { // addresslevel7a ?>
        <th class="<?= $Page->addresslevel7a->headerCellClass() ?>"><span id="elh_crm_leadaddress_addresslevel7a" class="crm_leadaddress_addresslevel7a"><?= $Page->addresslevel7a->caption() ?></span></th>
<?php } ?>
<?php if ($Page->addresslevel8a->Visible) { // addresslevel8a ?>
        <th class="<?= $Page->addresslevel8a->headerCellClass() ?>"><span id="elh_crm_leadaddress_addresslevel8a" class="crm_leadaddress_addresslevel8a"><?= $Page->addresslevel8a->caption() ?></span></th>
<?php } ?>
<?php if ($Page->buildingnumbera->Visible) { // buildingnumbera ?>
        <th class="<?= $Page->buildingnumbera->headerCellClass() ?>"><span id="elh_crm_leadaddress_buildingnumbera" class="crm_leadaddress_buildingnumbera"><?= $Page->buildingnumbera->caption() ?></span></th>
<?php } ?>
<?php if ($Page->localnumbera->Visible) { // localnumbera ?>
        <th class="<?= $Page->localnumbera->headerCellClass() ?>"><span id="elh_crm_leadaddress_localnumbera" class="crm_leadaddress_localnumbera"><?= $Page->localnumbera->caption() ?></span></th>
<?php } ?>
<?php if ($Page->poboxa->Visible) { // poboxa ?>
        <th class="<?= $Page->poboxa->headerCellClass() ?>"><span id="elh_crm_leadaddress_poboxa" class="crm_leadaddress_poboxa"><?= $Page->poboxa->caption() ?></span></th>
<?php } ?>
<?php if ($Page->phone_extra->Visible) { // phone_extra ?>
        <th class="<?= $Page->phone_extra->headerCellClass() ?>"><span id="elh_crm_leadaddress_phone_extra" class="crm_leadaddress_phone_extra"><?= $Page->phone_extra->caption() ?></span></th>
<?php } ?>
<?php if ($Page->mobile_extra->Visible) { // mobile_extra ?>
        <th class="<?= $Page->mobile_extra->headerCellClass() ?>"><span id="elh_crm_leadaddress_mobile_extra" class="crm_leadaddress_mobile_extra"><?= $Page->mobile_extra->caption() ?></span></th>
<?php } ?>
<?php if ($Page->fax_extra->Visible) { // fax_extra ?>
        <th class="<?= $Page->fax_extra->headerCellClass() ?>"><span id="elh_crm_leadaddress_fax_extra" class="crm_leadaddress_fax_extra"><?= $Page->fax_extra->caption() ?></span></th>
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
<?php if ($Page->leadaddressid->Visible) { // leadaddressid ?>
        <td <?= $Page->leadaddressid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leadaddress_leadaddressid" class="crm_leadaddress_leadaddressid">
<span<?= $Page->leadaddressid->viewAttributes() ?>>
<?= $Page->leadaddressid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->phone->Visible) { // phone ?>
        <td <?= $Page->phone->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leadaddress_phone" class="crm_leadaddress_phone">
<span<?= $Page->phone->viewAttributes() ?>>
<?= $Page->phone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->mobile->Visible) { // mobile ?>
        <td <?= $Page->mobile->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leadaddress_mobile" class="crm_leadaddress_mobile">
<span<?= $Page->mobile->viewAttributes() ?>>
<?= $Page->mobile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->fax->Visible) { // fax ?>
        <td <?= $Page->fax->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leadaddress_fax" class="crm_leadaddress_fax">
<span<?= $Page->fax->viewAttributes() ?>>
<?= $Page->fax->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->addresslevel1a->Visible) { // addresslevel1a ?>
        <td <?= $Page->addresslevel1a->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leadaddress_addresslevel1a" class="crm_leadaddress_addresslevel1a">
<span<?= $Page->addresslevel1a->viewAttributes() ?>>
<?= $Page->addresslevel1a->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->addresslevel2a->Visible) { // addresslevel2a ?>
        <td <?= $Page->addresslevel2a->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leadaddress_addresslevel2a" class="crm_leadaddress_addresslevel2a">
<span<?= $Page->addresslevel2a->viewAttributes() ?>>
<?= $Page->addresslevel2a->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->addresslevel3a->Visible) { // addresslevel3a ?>
        <td <?= $Page->addresslevel3a->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leadaddress_addresslevel3a" class="crm_leadaddress_addresslevel3a">
<span<?= $Page->addresslevel3a->viewAttributes() ?>>
<?= $Page->addresslevel3a->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->addresslevel4a->Visible) { // addresslevel4a ?>
        <td <?= $Page->addresslevel4a->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leadaddress_addresslevel4a" class="crm_leadaddress_addresslevel4a">
<span<?= $Page->addresslevel4a->viewAttributes() ?>>
<?= $Page->addresslevel4a->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->addresslevel5a->Visible) { // addresslevel5a ?>
        <td <?= $Page->addresslevel5a->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leadaddress_addresslevel5a" class="crm_leadaddress_addresslevel5a">
<span<?= $Page->addresslevel5a->viewAttributes() ?>>
<?= $Page->addresslevel5a->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->addresslevel6a->Visible) { // addresslevel6a ?>
        <td <?= $Page->addresslevel6a->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leadaddress_addresslevel6a" class="crm_leadaddress_addresslevel6a">
<span<?= $Page->addresslevel6a->viewAttributes() ?>>
<?= $Page->addresslevel6a->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->addresslevel7a->Visible) { // addresslevel7a ?>
        <td <?= $Page->addresslevel7a->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leadaddress_addresslevel7a" class="crm_leadaddress_addresslevel7a">
<span<?= $Page->addresslevel7a->viewAttributes() ?>>
<?= $Page->addresslevel7a->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->addresslevel8a->Visible) { // addresslevel8a ?>
        <td <?= $Page->addresslevel8a->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leadaddress_addresslevel8a" class="crm_leadaddress_addresslevel8a">
<span<?= $Page->addresslevel8a->viewAttributes() ?>>
<?= $Page->addresslevel8a->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->buildingnumbera->Visible) { // buildingnumbera ?>
        <td <?= $Page->buildingnumbera->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leadaddress_buildingnumbera" class="crm_leadaddress_buildingnumbera">
<span<?= $Page->buildingnumbera->viewAttributes() ?>>
<?= $Page->buildingnumbera->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->localnumbera->Visible) { // localnumbera ?>
        <td <?= $Page->localnumbera->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leadaddress_localnumbera" class="crm_leadaddress_localnumbera">
<span<?= $Page->localnumbera->viewAttributes() ?>>
<?= $Page->localnumbera->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->poboxa->Visible) { // poboxa ?>
        <td <?= $Page->poboxa->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leadaddress_poboxa" class="crm_leadaddress_poboxa">
<span<?= $Page->poboxa->viewAttributes() ?>>
<?= $Page->poboxa->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->phone_extra->Visible) { // phone_extra ?>
        <td <?= $Page->phone_extra->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leadaddress_phone_extra" class="crm_leadaddress_phone_extra">
<span<?= $Page->phone_extra->viewAttributes() ?>>
<?= $Page->phone_extra->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->mobile_extra->Visible) { // mobile_extra ?>
        <td <?= $Page->mobile_extra->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leadaddress_mobile_extra" class="crm_leadaddress_mobile_extra">
<span<?= $Page->mobile_extra->viewAttributes() ?>>
<?= $Page->mobile_extra->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->fax_extra->Visible) { // fax_extra ?>
        <td <?= $Page->fax_extra->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leadaddress_fax_extra" class="crm_leadaddress_fax_extra">
<span<?= $Page->fax_extra->viewAttributes() ?>>
<?= $Page->fax_extra->getViewValue() ?></span>
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
