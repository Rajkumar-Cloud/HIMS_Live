<?php

namespace PHPMaker2021\HIMS;

// Page object
$UserLoginView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fuser_loginview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fuser_loginview = currentForm = new ew.Form("fuser_loginview", "view");
    loadjs.done("fuser_loginview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.user_login) ew.vars.tables.user_login = <?= JsonEncode(GetClientVar("tables", "user_login")) ?>;
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
<form name="fuser_loginview" id="fuser_loginview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="user_login">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_user_login_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_user_login_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->User_Name->Visible) { // User_Name ?>
    <tr id="r_User_Name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_user_login_User_Name"><?= $Page->User_Name->caption() ?></span></td>
        <td data-name="User_Name" <?= $Page->User_Name->cellAttributes() ?>>
<span id="el_user_login_User_Name">
<span<?= $Page->User_Name->viewAttributes() ?>>
<?= $Page->User_Name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->mail_id->Visible) { // mail_id ?>
    <tr id="r_mail_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_user_login_mail_id"><?= $Page->mail_id->caption() ?></span></td>
        <td data-name="mail_id" <?= $Page->mail_id->cellAttributes() ?>>
<span id="el_user_login_mail_id">
<span<?= $Page->mail_id->viewAttributes() ?>>
<?= $Page->mail_id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->mobile_no->Visible) { // mobile_no ?>
    <tr id="r_mobile_no">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_user_login_mobile_no"><?= $Page->mobile_no->caption() ?></span></td>
        <td data-name="mobile_no" <?= $Page->mobile_no->cellAttributes() ?>>
<span id="el_user_login_mobile_no">
<span<?= $Page->mobile_no->viewAttributes() ?>>
<?= $Page->mobile_no->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->_password->Visible) { // password ?>
    <tr id="r__password">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_user_login__password"><?= $Page->_password->caption() ?></span></td>
        <td data-name="_password" <?= $Page->_password->cellAttributes() ?>>
<span id="el_user_login__password">
<span<?= $Page->_password->viewAttributes() ?>>
<?= $Page->_password->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->email_verified->Visible) { // email_verified ?>
    <tr id="r_email_verified">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_user_login_email_verified"><?= $Page->email_verified->caption() ?></span></td>
        <td data-name="email_verified" <?= $Page->email_verified->cellAttributes() ?>>
<span id="el_user_login_email_verified">
<span<?= $Page->email_verified->viewAttributes() ?>>
<?= $Page->email_verified->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReportTo->Visible) { // ReportTo ?>
    <tr id="r_ReportTo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_user_login_ReportTo"><?= $Page->ReportTo->caption() ?></span></td>
        <td data-name="ReportTo" <?= $Page->ReportTo->cellAttributes() ?>>
<span id="el_user_login_ReportTo">
<span<?= $Page->ReportTo->viewAttributes() ?>>
<?= $Page->ReportTo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->_UserLevel->Visible) { // UserLevel ?>
    <tr id="r__UserLevel">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_user_login__UserLevel"><?= $Page->_UserLevel->caption() ?></span></td>
        <td data-name="_UserLevel" <?= $Page->_UserLevel->cellAttributes() ?>>
<span id="el_user_login__UserLevel">
<span<?= $Page->_UserLevel->viewAttributes() ?>>
<?= $Page->_UserLevel->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CreatedDateTime->Visible) { // CreatedDateTime ?>
    <tr id="r_CreatedDateTime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_user_login_CreatedDateTime"><?= $Page->CreatedDateTime->caption() ?></span></td>
        <td data-name="CreatedDateTime" <?= $Page->CreatedDateTime->cellAttributes() ?>>
<span id="el_user_login_CreatedDateTime">
<span<?= $Page->CreatedDateTime->viewAttributes() ?>>
<?= $Page->CreatedDateTime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->profilefield->Visible) { // profilefield ?>
    <tr id="r_profilefield">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_user_login_profilefield"><?= $Page->profilefield->caption() ?></span></td>
        <td data-name="profilefield" <?= $Page->profilefield->cellAttributes() ?>>
<span id="el_user_login_profilefield">
<span<?= $Page->profilefield->viewAttributes() ?>>
<?= $Page->profilefield->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->_UserID->Visible) { // UserID ?>
    <tr id="r__UserID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_user_login__UserID"><?= $Page->_UserID->caption() ?></span></td>
        <td data-name="_UserID" <?= $Page->_UserID->cellAttributes() ?>>
<span id="el_user_login__UserID">
<span<?= $Page->_UserID->viewAttributes() ?>>
<?= $Page->_UserID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GroupID->Visible) { // GroupID ?>
    <tr id="r_GroupID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_user_login_GroupID"><?= $Page->GroupID->caption() ?></span></td>
        <td data-name="GroupID" <?= $Page->GroupID->cellAttributes() ?>>
<span id="el_user_login_GroupID">
<span<?= $Page->GroupID->viewAttributes() ?>>
<?= $Page->GroupID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <tr id="r_HospID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_user_login_HospID"><?= $Page->HospID->caption() ?></span></td>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el_user_login_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PharID->Visible) { // PharID ?>
    <tr id="r_PharID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_user_login_PharID"><?= $Page->PharID->caption() ?></span></td>
        <td data-name="PharID" <?= $Page->PharID->cellAttributes() ?>>
<span id="el_user_login_PharID">
<span<?= $Page->PharID->viewAttributes() ?>>
<?= $Page->PharID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StoreID->Visible) { // StoreID ?>
    <tr id="r_StoreID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_user_login_StoreID"><?= $Page->StoreID->caption() ?></span></td>
        <td data-name="StoreID" <?= $Page->StoreID->cellAttributes() ?>>
<span id="el_user_login_StoreID">
<span<?= $Page->StoreID->viewAttributes() ?>>
<?= $Page->StoreID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->OTP->Visible) { // OTP ?>
    <tr id="r_OTP">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_user_login_OTP"><?= $Page->OTP->caption() ?></span></td>
        <td data-name="OTP" <?= $Page->OTP->cellAttributes() ?>>
<span id="el_user_login_OTP">
<span<?= $Page->OTP->viewAttributes() ?>>
<?= $Page->OTP->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->_LoginType->Visible) { // LoginType ?>
    <tr id="r__LoginType">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_user_login__LoginType"><?= $Page->_LoginType->caption() ?></span></td>
        <td data-name="_LoginType" <?= $Page->_LoginType->cellAttributes() ?>>
<span id="el_user_login__LoginType">
<span<?= $Page->_LoginType->viewAttributes() ?>>
<?= $Page->_LoginType->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BranchId->Visible) { // BranchId ?>
    <tr id="r_BranchId">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_user_login_BranchId"><?= $Page->BranchId->caption() ?></span></td>
        <td data-name="BranchId" <?= $Page->BranchId->cellAttributes() ?>>
<span id="el_user_login_BranchId">
<span<?= $Page->BranchId->viewAttributes() ?>>
<?= $Page->BranchId->getViewValue() ?></span>
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
