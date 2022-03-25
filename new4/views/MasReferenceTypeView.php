<?php

namespace PHPMaker2021\HIMS;

// Page object
$MasReferenceTypeView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fmas_reference_typeview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fmas_reference_typeview = currentForm = new ew.Form("fmas_reference_typeview", "view");
    loadjs.done("fmas_reference_typeview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.mas_reference_type) ew.vars.tables.mas_reference_type = <?= JsonEncode(GetClientVar("tables", "mas_reference_type")) ?>;
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
<form name="fmas_reference_typeview" id="fmas_reference_typeview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="mas_reference_type">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_mas_reference_type_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_mas_reference_type_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->reference->Visible) { // reference ?>
    <tr id="r_reference">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_mas_reference_type_reference"><?= $Page->reference->caption() ?></span></td>
        <td data-name="reference" <?= $Page->reference->cellAttributes() ?>>
<span id="el_mas_reference_type_reference">
<span<?= $Page->reference->viewAttributes() ?>>
<?= $Page->reference->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReferMobileNo->Visible) { // ReferMobileNo ?>
    <tr id="r_ReferMobileNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_mas_reference_type_ReferMobileNo"><?= $Page->ReferMobileNo->caption() ?></span></td>
        <td data-name="ReferMobileNo" <?= $Page->ReferMobileNo->cellAttributes() ?>>
<span id="el_mas_reference_type_ReferMobileNo">
<span<?= $Page->ReferMobileNo->viewAttributes() ?>>
<?= $Page->ReferMobileNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReferClinicname->Visible) { // ReferClinicname ?>
    <tr id="r_ReferClinicname">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_mas_reference_type_ReferClinicname"><?= $Page->ReferClinicname->caption() ?></span></td>
        <td data-name="ReferClinicname" <?= $Page->ReferClinicname->cellAttributes() ?>>
<span id="el_mas_reference_type_ReferClinicname">
<span<?= $Page->ReferClinicname->viewAttributes() ?>>
<?= $Page->ReferClinicname->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReferCity->Visible) { // ReferCity ?>
    <tr id="r_ReferCity">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_mas_reference_type_ReferCity"><?= $Page->ReferCity->caption() ?></span></td>
        <td data-name="ReferCity" <?= $Page->ReferCity->cellAttributes() ?>>
<span id="el_mas_reference_type_ReferCity">
<span<?= $Page->ReferCity->viewAttributes() ?>>
<?= $Page->ReferCity->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <tr id="r_HospID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_mas_reference_type_HospID"><?= $Page->HospID->caption() ?></span></td>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el_mas_reference_type_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->_email->Visible) { // email ?>
    <tr id="r__email">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_mas_reference_type__email"><?= $Page->_email->caption() ?></span></td>
        <td data-name="_email" <?= $Page->_email->cellAttributes() ?>>
<span id="el_mas_reference_type__email">
<span<?= $Page->_email->viewAttributes() ?>>
<?= $Page->_email->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->whatapp->Visible) { // whatapp ?>
    <tr id="r_whatapp">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_mas_reference_type_whatapp"><?= $Page->whatapp->caption() ?></span></td>
        <td data-name="whatapp" <?= $Page->whatapp->cellAttributes() ?>>
<span id="el_mas_reference_type_whatapp">
<span<?= $Page->whatapp->viewAttributes() ?>>
<?= $Page->whatapp->getViewValue() ?></span>
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
