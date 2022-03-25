<?php

namespace PHPMaker2021\HIMS;

// Page object
$HrProjectsView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fhr_projectsview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fhr_projectsview = currentForm = new ew.Form("fhr_projectsview", "view");
    loadjs.done("fhr_projectsview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.hr_projects) ew.vars.tables.hr_projects = <?= JsonEncode(GetClientVar("tables", "hr_projects")) ?>;
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
<form name="fhr_projectsview" id="fhr_projectsview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="hr_projects">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_projects_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_hr_projects_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->name->Visible) { // name ?>
    <tr id="r_name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_projects_name"><?= $Page->name->caption() ?></span></td>
        <td data-name="name" <?= $Page->name->cellAttributes() ?>>
<span id="el_hr_projects_name">
<span<?= $Page->name->viewAttributes() ?>>
<?= $Page->name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->client->Visible) { // client ?>
    <tr id="r_client">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_projects_client"><?= $Page->client->caption() ?></span></td>
        <td data-name="client" <?= $Page->client->cellAttributes() ?>>
<span id="el_hr_projects_client">
<span<?= $Page->client->viewAttributes() ?>>
<?= $Page->client->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->details->Visible) { // details ?>
    <tr id="r_details">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_projects_details"><?= $Page->details->caption() ?></span></td>
        <td data-name="details" <?= $Page->details->cellAttributes() ?>>
<span id="el_hr_projects_details">
<span<?= $Page->details->viewAttributes() ?>>
<?= $Page->details->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->created->Visible) { // created ?>
    <tr id="r_created">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_projects_created"><?= $Page->created->caption() ?></span></td>
        <td data-name="created" <?= $Page->created->cellAttributes() ?>>
<span id="el_hr_projects_created">
<span<?= $Page->created->viewAttributes() ?>>
<?= $Page->created->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <tr id="r_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_projects_status"><?= $Page->status->caption() ?></span></td>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el_hr_projects_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <tr id="r_HospID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_projects_HospID"><?= $Page->HospID->caption() ?></span></td>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el_hr_projects_HospID">
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
