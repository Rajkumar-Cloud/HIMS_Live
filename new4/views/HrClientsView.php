<?php

namespace PHPMaker2021\HIMS;

// Page object
$HrClientsView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fhr_clientsview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fhr_clientsview = currentForm = new ew.Form("fhr_clientsview", "view");
    loadjs.done("fhr_clientsview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.hr_clients) ew.vars.tables.hr_clients = <?= JsonEncode(GetClientVar("tables", "hr_clients")) ?>;
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
<form name="fhr_clientsview" id="fhr_clientsview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="hr_clients">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_clients_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_hr_clients_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->name->Visible) { // name ?>
    <tr id="r_name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_clients_name"><?= $Page->name->caption() ?></span></td>
        <td data-name="name" <?= $Page->name->cellAttributes() ?>>
<span id="el_hr_clients_name">
<span<?= $Page->name->viewAttributes() ?>>
<?= $Page->name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->details->Visible) { // details ?>
    <tr id="r_details">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_clients_details"><?= $Page->details->caption() ?></span></td>
        <td data-name="details" <?= $Page->details->cellAttributes() ?>>
<span id="el_hr_clients_details">
<span<?= $Page->details->viewAttributes() ?>>
<?= $Page->details->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->first_contact_date->Visible) { // first_contact_date ?>
    <tr id="r_first_contact_date">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_clients_first_contact_date"><?= $Page->first_contact_date->caption() ?></span></td>
        <td data-name="first_contact_date" <?= $Page->first_contact_date->cellAttributes() ?>>
<span id="el_hr_clients_first_contact_date">
<span<?= $Page->first_contact_date->viewAttributes() ?>>
<?= $Page->first_contact_date->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->created->Visible) { // created ?>
    <tr id="r_created">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_clients_created"><?= $Page->created->caption() ?></span></td>
        <td data-name="created" <?= $Page->created->cellAttributes() ?>>
<span id="el_hr_clients_created">
<span<?= $Page->created->viewAttributes() ?>>
<?= $Page->created->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->address->Visible) { // address ?>
    <tr id="r_address">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_clients_address"><?= $Page->address->caption() ?></span></td>
        <td data-name="address" <?= $Page->address->cellAttributes() ?>>
<span id="el_hr_clients_address">
<span<?= $Page->address->viewAttributes() ?>>
<?= $Page->address->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->contact_number->Visible) { // contact_number ?>
    <tr id="r_contact_number">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_clients_contact_number"><?= $Page->contact_number->caption() ?></span></td>
        <td data-name="contact_number" <?= $Page->contact_number->cellAttributes() ?>>
<span id="el_hr_clients_contact_number">
<span<?= $Page->contact_number->viewAttributes() ?>>
<?= $Page->contact_number->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->contact_email->Visible) { // contact_email ?>
    <tr id="r_contact_email">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_clients_contact_email"><?= $Page->contact_email->caption() ?></span></td>
        <td data-name="contact_email" <?= $Page->contact_email->cellAttributes() ?>>
<span id="el_hr_clients_contact_email">
<span<?= $Page->contact_email->viewAttributes() ?>>
<?= $Page->contact_email->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->company_url->Visible) { // company_url ?>
    <tr id="r_company_url">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_clients_company_url"><?= $Page->company_url->caption() ?></span></td>
        <td data-name="company_url" <?= $Page->company_url->cellAttributes() ?>>
<span id="el_hr_clients_company_url">
<span<?= $Page->company_url->viewAttributes() ?>>
<?= $Page->company_url->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <tr id="r_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_clients_status"><?= $Page->status->caption() ?></span></td>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el_hr_clients_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <tr id="r_HospID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_clients_HospID"><?= $Page->HospID->caption() ?></span></td>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el_hr_clients_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
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
