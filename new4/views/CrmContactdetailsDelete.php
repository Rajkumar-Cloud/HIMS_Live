<?php

namespace PHPMaker2021\HIMS;

// Page object
$CrmContactdetailsDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fcrm_contactdetailsdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fcrm_contactdetailsdelete = currentForm = new ew.Form("fcrm_contactdetailsdelete", "delete");
    loadjs.done("fcrm_contactdetailsdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.crm_contactdetails) ew.vars.tables.crm_contactdetails = <?= JsonEncode(GetClientVar("tables", "crm_contactdetails")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fcrm_contactdetailsdelete" id="fcrm_contactdetailsdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="crm_contactdetails">
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
<?php if ($Page->contactid->Visible) { // contactid ?>
        <th class="<?= $Page->contactid->headerCellClass() ?>"><span id="elh_crm_contactdetails_contactid" class="crm_contactdetails_contactid"><?= $Page->contactid->caption() ?></span></th>
<?php } ?>
<?php if ($Page->contact_no->Visible) { // contact_no ?>
        <th class="<?= $Page->contact_no->headerCellClass() ?>"><span id="elh_crm_contactdetails_contact_no" class="crm_contactdetails_contact_no"><?= $Page->contact_no->caption() ?></span></th>
<?php } ?>
<?php if ($Page->parentid->Visible) { // parentid ?>
        <th class="<?= $Page->parentid->headerCellClass() ?>"><span id="elh_crm_contactdetails_parentid" class="crm_contactdetails_parentid"><?= $Page->parentid->caption() ?></span></th>
<?php } ?>
<?php if ($Page->salutation->Visible) { // salutation ?>
        <th class="<?= $Page->salutation->headerCellClass() ?>"><span id="elh_crm_contactdetails_salutation" class="crm_contactdetails_salutation"><?= $Page->salutation->caption() ?></span></th>
<?php } ?>
<?php if ($Page->firstname->Visible) { // firstname ?>
        <th class="<?= $Page->firstname->headerCellClass() ?>"><span id="elh_crm_contactdetails_firstname" class="crm_contactdetails_firstname"><?= $Page->firstname->caption() ?></span></th>
<?php } ?>
<?php if ($Page->lastname->Visible) { // lastname ?>
        <th class="<?= $Page->lastname->headerCellClass() ?>"><span id="elh_crm_contactdetails_lastname" class="crm_contactdetails_lastname"><?= $Page->lastname->caption() ?></span></th>
<?php } ?>
<?php if ($Page->_email->Visible) { // email ?>
        <th class="<?= $Page->_email->headerCellClass() ?>"><span id="elh_crm_contactdetails__email" class="crm_contactdetails__email"><?= $Page->_email->caption() ?></span></th>
<?php } ?>
<?php if ($Page->phone->Visible) { // phone ?>
        <th class="<?= $Page->phone->headerCellClass() ?>"><span id="elh_crm_contactdetails_phone" class="crm_contactdetails_phone"><?= $Page->phone->caption() ?></span></th>
<?php } ?>
<?php if ($Page->mobile->Visible) { // mobile ?>
        <th class="<?= $Page->mobile->headerCellClass() ?>"><span id="elh_crm_contactdetails_mobile" class="crm_contactdetails_mobile"><?= $Page->mobile->caption() ?></span></th>
<?php } ?>
<?php if ($Page->reportsto->Visible) { // reportsto ?>
        <th class="<?= $Page->reportsto->headerCellClass() ?>"><span id="elh_crm_contactdetails_reportsto" class="crm_contactdetails_reportsto"><?= $Page->reportsto->caption() ?></span></th>
<?php } ?>
<?php if ($Page->training->Visible) { // training ?>
        <th class="<?= $Page->training->headerCellClass() ?>"><span id="elh_crm_contactdetails_training" class="crm_contactdetails_training"><?= $Page->training->caption() ?></span></th>
<?php } ?>
<?php if ($Page->usertype->Visible) { // usertype ?>
        <th class="<?= $Page->usertype->headerCellClass() ?>"><span id="elh_crm_contactdetails_usertype" class="crm_contactdetails_usertype"><?= $Page->usertype->caption() ?></span></th>
<?php } ?>
<?php if ($Page->contacttype->Visible) { // contacttype ?>
        <th class="<?= $Page->contacttype->headerCellClass() ?>"><span id="elh_crm_contactdetails_contacttype" class="crm_contactdetails_contacttype"><?= $Page->contacttype->caption() ?></span></th>
<?php } ?>
<?php if ($Page->otheremail->Visible) { // otheremail ?>
        <th class="<?= $Page->otheremail->headerCellClass() ?>"><span id="elh_crm_contactdetails_otheremail" class="crm_contactdetails_otheremail"><?= $Page->otheremail->caption() ?></span></th>
<?php } ?>
<?php if ($Page->donotcall->Visible) { // donotcall ?>
        <th class="<?= $Page->donotcall->headerCellClass() ?>"><span id="elh_crm_contactdetails_donotcall" class="crm_contactdetails_donotcall"><?= $Page->donotcall->caption() ?></span></th>
<?php } ?>
<?php if ($Page->emailoptout->Visible) { // emailoptout ?>
        <th class="<?= $Page->emailoptout->headerCellClass() ?>"><span id="elh_crm_contactdetails_emailoptout" class="crm_contactdetails_emailoptout"><?= $Page->emailoptout->caption() ?></span></th>
<?php } ?>
<?php if ($Page->isconvertedfromlead->Visible) { // isconvertedfromlead ?>
        <th class="<?= $Page->isconvertedfromlead->headerCellClass() ?>"><span id="elh_crm_contactdetails_isconvertedfromlead" class="crm_contactdetails_isconvertedfromlead"><?= $Page->isconvertedfromlead->caption() ?></span></th>
<?php } ?>
<?php if ($Page->secondary_email->Visible) { // secondary_email ?>
        <th class="<?= $Page->secondary_email->headerCellClass() ?>"><span id="elh_crm_contactdetails_secondary_email" class="crm_contactdetails_secondary_email"><?= $Page->secondary_email->caption() ?></span></th>
<?php } ?>
<?php if ($Page->notifilanguage->Visible) { // notifilanguage ?>
        <th class="<?= $Page->notifilanguage->headerCellClass() ?>"><span id="elh_crm_contactdetails_notifilanguage" class="crm_contactdetails_notifilanguage"><?= $Page->notifilanguage->caption() ?></span></th>
<?php } ?>
<?php if ($Page->contactstatus->Visible) { // contactstatus ?>
        <th class="<?= $Page->contactstatus->headerCellClass() ?>"><span id="elh_crm_contactdetails_contactstatus" class="crm_contactdetails_contactstatus"><?= $Page->contactstatus->caption() ?></span></th>
<?php } ?>
<?php if ($Page->dav_status->Visible) { // dav_status ?>
        <th class="<?= $Page->dav_status->headerCellClass() ?>"><span id="elh_crm_contactdetails_dav_status" class="crm_contactdetails_dav_status"><?= $Page->dav_status->caption() ?></span></th>
<?php } ?>
<?php if ($Page->jobtitle->Visible) { // jobtitle ?>
        <th class="<?= $Page->jobtitle->headerCellClass() ?>"><span id="elh_crm_contactdetails_jobtitle" class="crm_contactdetails_jobtitle"><?= $Page->jobtitle->caption() ?></span></th>
<?php } ?>
<?php if ($Page->decision_maker->Visible) { // decision_maker ?>
        <th class="<?= $Page->decision_maker->headerCellClass() ?>"><span id="elh_crm_contactdetails_decision_maker" class="crm_contactdetails_decision_maker"><?= $Page->decision_maker->caption() ?></span></th>
<?php } ?>
<?php if ($Page->sum_time->Visible) { // sum_time ?>
        <th class="<?= $Page->sum_time->headerCellClass() ?>"><span id="elh_crm_contactdetails_sum_time" class="crm_contactdetails_sum_time"><?= $Page->sum_time->caption() ?></span></th>
<?php } ?>
<?php if ($Page->phone_extra->Visible) { // phone_extra ?>
        <th class="<?= $Page->phone_extra->headerCellClass() ?>"><span id="elh_crm_contactdetails_phone_extra" class="crm_contactdetails_phone_extra"><?= $Page->phone_extra->caption() ?></span></th>
<?php } ?>
<?php if ($Page->mobile_extra->Visible) { // mobile_extra ?>
        <th class="<?= $Page->mobile_extra->headerCellClass() ?>"><span id="elh_crm_contactdetails_mobile_extra" class="crm_contactdetails_mobile_extra"><?= $Page->mobile_extra->caption() ?></span></th>
<?php } ?>
<?php if ($Page->gender->Visible) { // gender ?>
        <th class="<?= $Page->gender->headerCellClass() ?>"><span id="elh_crm_contactdetails_gender" class="crm_contactdetails_gender"><?= $Page->gender->caption() ?></span></th>
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
<?php if ($Page->contactid->Visible) { // contactid ?>
        <td <?= $Page->contactid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_contactdetails_contactid" class="crm_contactdetails_contactid">
<span<?= $Page->contactid->viewAttributes() ?>>
<?= $Page->contactid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->contact_no->Visible) { // contact_no ?>
        <td <?= $Page->contact_no->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_contactdetails_contact_no" class="crm_contactdetails_contact_no">
<span<?= $Page->contact_no->viewAttributes() ?>>
<?= $Page->contact_no->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->parentid->Visible) { // parentid ?>
        <td <?= $Page->parentid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_contactdetails_parentid" class="crm_contactdetails_parentid">
<span<?= $Page->parentid->viewAttributes() ?>>
<?= $Page->parentid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->salutation->Visible) { // salutation ?>
        <td <?= $Page->salutation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_contactdetails_salutation" class="crm_contactdetails_salutation">
<span<?= $Page->salutation->viewAttributes() ?>>
<?= $Page->salutation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->firstname->Visible) { // firstname ?>
        <td <?= $Page->firstname->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_contactdetails_firstname" class="crm_contactdetails_firstname">
<span<?= $Page->firstname->viewAttributes() ?>>
<?= $Page->firstname->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->lastname->Visible) { // lastname ?>
        <td <?= $Page->lastname->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_contactdetails_lastname" class="crm_contactdetails_lastname">
<span<?= $Page->lastname->viewAttributes() ?>>
<?= $Page->lastname->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->_email->Visible) { // email ?>
        <td <?= $Page->_email->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_contactdetails__email" class="crm_contactdetails__email">
<span<?= $Page->_email->viewAttributes() ?>>
<?= $Page->_email->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->phone->Visible) { // phone ?>
        <td <?= $Page->phone->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_contactdetails_phone" class="crm_contactdetails_phone">
<span<?= $Page->phone->viewAttributes() ?>>
<?= $Page->phone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->mobile->Visible) { // mobile ?>
        <td <?= $Page->mobile->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_contactdetails_mobile" class="crm_contactdetails_mobile">
<span<?= $Page->mobile->viewAttributes() ?>>
<?= $Page->mobile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->reportsto->Visible) { // reportsto ?>
        <td <?= $Page->reportsto->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_contactdetails_reportsto" class="crm_contactdetails_reportsto">
<span<?= $Page->reportsto->viewAttributes() ?>>
<?= $Page->reportsto->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->training->Visible) { // training ?>
        <td <?= $Page->training->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_contactdetails_training" class="crm_contactdetails_training">
<span<?= $Page->training->viewAttributes() ?>>
<?= $Page->training->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->usertype->Visible) { // usertype ?>
        <td <?= $Page->usertype->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_contactdetails_usertype" class="crm_contactdetails_usertype">
<span<?= $Page->usertype->viewAttributes() ?>>
<?= $Page->usertype->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->contacttype->Visible) { // contacttype ?>
        <td <?= $Page->contacttype->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_contactdetails_contacttype" class="crm_contactdetails_contacttype">
<span<?= $Page->contacttype->viewAttributes() ?>>
<?= $Page->contacttype->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->otheremail->Visible) { // otheremail ?>
        <td <?= $Page->otheremail->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_contactdetails_otheremail" class="crm_contactdetails_otheremail">
<span<?= $Page->otheremail->viewAttributes() ?>>
<?= $Page->otheremail->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->donotcall->Visible) { // donotcall ?>
        <td <?= $Page->donotcall->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_contactdetails_donotcall" class="crm_contactdetails_donotcall">
<span<?= $Page->donotcall->viewAttributes() ?>>
<?= $Page->donotcall->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->emailoptout->Visible) { // emailoptout ?>
        <td <?= $Page->emailoptout->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_contactdetails_emailoptout" class="crm_contactdetails_emailoptout">
<span<?= $Page->emailoptout->viewAttributes() ?>>
<?= $Page->emailoptout->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->isconvertedfromlead->Visible) { // isconvertedfromlead ?>
        <td <?= $Page->isconvertedfromlead->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_contactdetails_isconvertedfromlead" class="crm_contactdetails_isconvertedfromlead">
<span<?= $Page->isconvertedfromlead->viewAttributes() ?>>
<?= $Page->isconvertedfromlead->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->secondary_email->Visible) { // secondary_email ?>
        <td <?= $Page->secondary_email->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_contactdetails_secondary_email" class="crm_contactdetails_secondary_email">
<span<?= $Page->secondary_email->viewAttributes() ?>>
<?= $Page->secondary_email->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->notifilanguage->Visible) { // notifilanguage ?>
        <td <?= $Page->notifilanguage->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_contactdetails_notifilanguage" class="crm_contactdetails_notifilanguage">
<span<?= $Page->notifilanguage->viewAttributes() ?>>
<?= $Page->notifilanguage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->contactstatus->Visible) { // contactstatus ?>
        <td <?= $Page->contactstatus->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_contactdetails_contactstatus" class="crm_contactdetails_contactstatus">
<span<?= $Page->contactstatus->viewAttributes() ?>>
<?= $Page->contactstatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->dav_status->Visible) { // dav_status ?>
        <td <?= $Page->dav_status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_contactdetails_dav_status" class="crm_contactdetails_dav_status">
<span<?= $Page->dav_status->viewAttributes() ?>>
<?= $Page->dav_status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->jobtitle->Visible) { // jobtitle ?>
        <td <?= $Page->jobtitle->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_contactdetails_jobtitle" class="crm_contactdetails_jobtitle">
<span<?= $Page->jobtitle->viewAttributes() ?>>
<?= $Page->jobtitle->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->decision_maker->Visible) { // decision_maker ?>
        <td <?= $Page->decision_maker->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_contactdetails_decision_maker" class="crm_contactdetails_decision_maker">
<span<?= $Page->decision_maker->viewAttributes() ?>>
<?= $Page->decision_maker->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->sum_time->Visible) { // sum_time ?>
        <td <?= $Page->sum_time->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_contactdetails_sum_time" class="crm_contactdetails_sum_time">
<span<?= $Page->sum_time->viewAttributes() ?>>
<?= $Page->sum_time->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->phone_extra->Visible) { // phone_extra ?>
        <td <?= $Page->phone_extra->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_contactdetails_phone_extra" class="crm_contactdetails_phone_extra">
<span<?= $Page->phone_extra->viewAttributes() ?>>
<?= $Page->phone_extra->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->mobile_extra->Visible) { // mobile_extra ?>
        <td <?= $Page->mobile_extra->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_contactdetails_mobile_extra" class="crm_contactdetails_mobile_extra">
<span<?= $Page->mobile_extra->viewAttributes() ?>>
<?= $Page->mobile_extra->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->gender->Visible) { // gender ?>
        <td <?= $Page->gender->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_contactdetails_gender" class="crm_contactdetails_gender">
<span<?= $Page->gender->viewAttributes() ?>>
<?= $Page->gender->getViewValue() ?></span>
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
