<?php

namespace PHPMaker2021\HIMS;

// Page object
$CrmContactdetailsView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fcrm_contactdetailsview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fcrm_contactdetailsview = currentForm = new ew.Form("fcrm_contactdetailsview", "view");
    loadjs.done("fcrm_contactdetailsview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.crm_contactdetails) ew.vars.tables.crm_contactdetails = <?= JsonEncode(GetClientVar("tables", "crm_contactdetails")) ?>;
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
<form name="fcrm_contactdetailsview" id="fcrm_contactdetailsview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="crm_contactdetails">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->contactid->Visible) { // contactid ?>
    <tr id="r_contactid">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails_contactid"><?= $Page->contactid->caption() ?></span></td>
        <td data-name="contactid" <?= $Page->contactid->cellAttributes() ?>>
<span id="el_crm_contactdetails_contactid">
<span<?= $Page->contactid->viewAttributes() ?>>
<?= $Page->contactid->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->contact_no->Visible) { // contact_no ?>
    <tr id="r_contact_no">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails_contact_no"><?= $Page->contact_no->caption() ?></span></td>
        <td data-name="contact_no" <?= $Page->contact_no->cellAttributes() ?>>
<span id="el_crm_contactdetails_contact_no">
<span<?= $Page->contact_no->viewAttributes() ?>>
<?= $Page->contact_no->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->parentid->Visible) { // parentid ?>
    <tr id="r_parentid">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails_parentid"><?= $Page->parentid->caption() ?></span></td>
        <td data-name="parentid" <?= $Page->parentid->cellAttributes() ?>>
<span id="el_crm_contactdetails_parentid">
<span<?= $Page->parentid->viewAttributes() ?>>
<?= $Page->parentid->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->salutation->Visible) { // salutation ?>
    <tr id="r_salutation">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails_salutation"><?= $Page->salutation->caption() ?></span></td>
        <td data-name="salutation" <?= $Page->salutation->cellAttributes() ?>>
<span id="el_crm_contactdetails_salutation">
<span<?= $Page->salutation->viewAttributes() ?>>
<?= $Page->salutation->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->firstname->Visible) { // firstname ?>
    <tr id="r_firstname">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails_firstname"><?= $Page->firstname->caption() ?></span></td>
        <td data-name="firstname" <?= $Page->firstname->cellAttributes() ?>>
<span id="el_crm_contactdetails_firstname">
<span<?= $Page->firstname->viewAttributes() ?>>
<?= $Page->firstname->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->lastname->Visible) { // lastname ?>
    <tr id="r_lastname">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails_lastname"><?= $Page->lastname->caption() ?></span></td>
        <td data-name="lastname" <?= $Page->lastname->cellAttributes() ?>>
<span id="el_crm_contactdetails_lastname">
<span<?= $Page->lastname->viewAttributes() ?>>
<?= $Page->lastname->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->_email->Visible) { // email ?>
    <tr id="r__email">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails__email"><?= $Page->_email->caption() ?></span></td>
        <td data-name="_email" <?= $Page->_email->cellAttributes() ?>>
<span id="el_crm_contactdetails__email">
<span<?= $Page->_email->viewAttributes() ?>>
<?= $Page->_email->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->phone->Visible) { // phone ?>
    <tr id="r_phone">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails_phone"><?= $Page->phone->caption() ?></span></td>
        <td data-name="phone" <?= $Page->phone->cellAttributes() ?>>
<span id="el_crm_contactdetails_phone">
<span<?= $Page->phone->viewAttributes() ?>>
<?= $Page->phone->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->mobile->Visible) { // mobile ?>
    <tr id="r_mobile">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails_mobile"><?= $Page->mobile->caption() ?></span></td>
        <td data-name="mobile" <?= $Page->mobile->cellAttributes() ?>>
<span id="el_crm_contactdetails_mobile">
<span<?= $Page->mobile->viewAttributes() ?>>
<?= $Page->mobile->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->reportsto->Visible) { // reportsto ?>
    <tr id="r_reportsto">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails_reportsto"><?= $Page->reportsto->caption() ?></span></td>
        <td data-name="reportsto" <?= $Page->reportsto->cellAttributes() ?>>
<span id="el_crm_contactdetails_reportsto">
<span<?= $Page->reportsto->viewAttributes() ?>>
<?= $Page->reportsto->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->training->Visible) { // training ?>
    <tr id="r_training">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails_training"><?= $Page->training->caption() ?></span></td>
        <td data-name="training" <?= $Page->training->cellAttributes() ?>>
<span id="el_crm_contactdetails_training">
<span<?= $Page->training->viewAttributes() ?>>
<?= $Page->training->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->usertype->Visible) { // usertype ?>
    <tr id="r_usertype">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails_usertype"><?= $Page->usertype->caption() ?></span></td>
        <td data-name="usertype" <?= $Page->usertype->cellAttributes() ?>>
<span id="el_crm_contactdetails_usertype">
<span<?= $Page->usertype->viewAttributes() ?>>
<?= $Page->usertype->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->contacttype->Visible) { // contacttype ?>
    <tr id="r_contacttype">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails_contacttype"><?= $Page->contacttype->caption() ?></span></td>
        <td data-name="contacttype" <?= $Page->contacttype->cellAttributes() ?>>
<span id="el_crm_contactdetails_contacttype">
<span<?= $Page->contacttype->viewAttributes() ?>>
<?= $Page->contacttype->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->otheremail->Visible) { // otheremail ?>
    <tr id="r_otheremail">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails_otheremail"><?= $Page->otheremail->caption() ?></span></td>
        <td data-name="otheremail" <?= $Page->otheremail->cellAttributes() ?>>
<span id="el_crm_contactdetails_otheremail">
<span<?= $Page->otheremail->viewAttributes() ?>>
<?= $Page->otheremail->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->donotcall->Visible) { // donotcall ?>
    <tr id="r_donotcall">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails_donotcall"><?= $Page->donotcall->caption() ?></span></td>
        <td data-name="donotcall" <?= $Page->donotcall->cellAttributes() ?>>
<span id="el_crm_contactdetails_donotcall">
<span<?= $Page->donotcall->viewAttributes() ?>>
<?= $Page->donotcall->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->emailoptout->Visible) { // emailoptout ?>
    <tr id="r_emailoptout">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails_emailoptout"><?= $Page->emailoptout->caption() ?></span></td>
        <td data-name="emailoptout" <?= $Page->emailoptout->cellAttributes() ?>>
<span id="el_crm_contactdetails_emailoptout">
<span<?= $Page->emailoptout->viewAttributes() ?>>
<?= $Page->emailoptout->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->imagename->Visible) { // imagename ?>
    <tr id="r_imagename">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails_imagename"><?= $Page->imagename->caption() ?></span></td>
        <td data-name="imagename" <?= $Page->imagename->cellAttributes() ?>>
<span id="el_crm_contactdetails_imagename">
<span<?= $Page->imagename->viewAttributes() ?>>
<?= $Page->imagename->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->isconvertedfromlead->Visible) { // isconvertedfromlead ?>
    <tr id="r_isconvertedfromlead">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails_isconvertedfromlead"><?= $Page->isconvertedfromlead->caption() ?></span></td>
        <td data-name="isconvertedfromlead" <?= $Page->isconvertedfromlead->cellAttributes() ?>>
<span id="el_crm_contactdetails_isconvertedfromlead">
<span<?= $Page->isconvertedfromlead->viewAttributes() ?>>
<?= $Page->isconvertedfromlead->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->verification->Visible) { // verification ?>
    <tr id="r_verification">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails_verification"><?= $Page->verification->caption() ?></span></td>
        <td data-name="verification" <?= $Page->verification->cellAttributes() ?>>
<span id="el_crm_contactdetails_verification">
<span<?= $Page->verification->viewAttributes() ?>>
<?= $Page->verification->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->secondary_email->Visible) { // secondary_email ?>
    <tr id="r_secondary_email">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails_secondary_email"><?= $Page->secondary_email->caption() ?></span></td>
        <td data-name="secondary_email" <?= $Page->secondary_email->cellAttributes() ?>>
<span id="el_crm_contactdetails_secondary_email">
<span<?= $Page->secondary_email->viewAttributes() ?>>
<?= $Page->secondary_email->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->notifilanguage->Visible) { // notifilanguage ?>
    <tr id="r_notifilanguage">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails_notifilanguage"><?= $Page->notifilanguage->caption() ?></span></td>
        <td data-name="notifilanguage" <?= $Page->notifilanguage->cellAttributes() ?>>
<span id="el_crm_contactdetails_notifilanguage">
<span<?= $Page->notifilanguage->viewAttributes() ?>>
<?= $Page->notifilanguage->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->contactstatus->Visible) { // contactstatus ?>
    <tr id="r_contactstatus">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails_contactstatus"><?= $Page->contactstatus->caption() ?></span></td>
        <td data-name="contactstatus" <?= $Page->contactstatus->cellAttributes() ?>>
<span id="el_crm_contactdetails_contactstatus">
<span<?= $Page->contactstatus->viewAttributes() ?>>
<?= $Page->contactstatus->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->dav_status->Visible) { // dav_status ?>
    <tr id="r_dav_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails_dav_status"><?= $Page->dav_status->caption() ?></span></td>
        <td data-name="dav_status" <?= $Page->dav_status->cellAttributes() ?>>
<span id="el_crm_contactdetails_dav_status">
<span<?= $Page->dav_status->viewAttributes() ?>>
<?= $Page->dav_status->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->jobtitle->Visible) { // jobtitle ?>
    <tr id="r_jobtitle">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails_jobtitle"><?= $Page->jobtitle->caption() ?></span></td>
        <td data-name="jobtitle" <?= $Page->jobtitle->cellAttributes() ?>>
<span id="el_crm_contactdetails_jobtitle">
<span<?= $Page->jobtitle->viewAttributes() ?>>
<?= $Page->jobtitle->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->decision_maker->Visible) { // decision_maker ?>
    <tr id="r_decision_maker">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails_decision_maker"><?= $Page->decision_maker->caption() ?></span></td>
        <td data-name="decision_maker" <?= $Page->decision_maker->cellAttributes() ?>>
<span id="el_crm_contactdetails_decision_maker">
<span<?= $Page->decision_maker->viewAttributes() ?>>
<?= $Page->decision_maker->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->sum_time->Visible) { // sum_time ?>
    <tr id="r_sum_time">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails_sum_time"><?= $Page->sum_time->caption() ?></span></td>
        <td data-name="sum_time" <?= $Page->sum_time->cellAttributes() ?>>
<span id="el_crm_contactdetails_sum_time">
<span<?= $Page->sum_time->viewAttributes() ?>>
<?= $Page->sum_time->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->phone_extra->Visible) { // phone_extra ?>
    <tr id="r_phone_extra">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails_phone_extra"><?= $Page->phone_extra->caption() ?></span></td>
        <td data-name="phone_extra" <?= $Page->phone_extra->cellAttributes() ?>>
<span id="el_crm_contactdetails_phone_extra">
<span<?= $Page->phone_extra->viewAttributes() ?>>
<?= $Page->phone_extra->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->mobile_extra->Visible) { // mobile_extra ?>
    <tr id="r_mobile_extra">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails_mobile_extra"><?= $Page->mobile_extra->caption() ?></span></td>
        <td data-name="mobile_extra" <?= $Page->mobile_extra->cellAttributes() ?>>
<span id="el_crm_contactdetails_mobile_extra">
<span<?= $Page->mobile_extra->viewAttributes() ?>>
<?= $Page->mobile_extra->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->approvals->Visible) { // approvals ?>
    <tr id="r_approvals">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails_approvals"><?= $Page->approvals->caption() ?></span></td>
        <td data-name="approvals" <?= $Page->approvals->cellAttributes() ?>>
<span id="el_crm_contactdetails_approvals">
<span<?= $Page->approvals->viewAttributes() ?>>
<?= $Page->approvals->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->gender->Visible) { // gender ?>
    <tr id="r_gender">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_contactdetails_gender"><?= $Page->gender->caption() ?></span></td>
        <td data-name="gender" <?= $Page->gender->cellAttributes() ?>>
<span id="el_crm_contactdetails_gender">
<span<?= $Page->gender->viewAttributes() ?>>
<?= $Page->gender->getViewValue() ?></span>
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
