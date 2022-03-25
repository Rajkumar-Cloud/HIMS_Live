<?php

namespace PHPMaker2021\HIMS;

// Page object
$UserLoginDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fuser_logindelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fuser_logindelete = currentForm = new ew.Form("fuser_logindelete", "delete");
    loadjs.done("fuser_logindelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.user_login) ew.vars.tables.user_login = <?= JsonEncode(GetClientVar("tables", "user_login")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fuser_logindelete" id="fuser_logindelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="user_login">
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
<?php if ($Page->id->Visible) { // id ?>
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_user_login_id" class="user_login_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->User_Name->Visible) { // User_Name ?>
        <th class="<?= $Page->User_Name->headerCellClass() ?>"><span id="elh_user_login_User_Name" class="user_login_User_Name"><?= $Page->User_Name->caption() ?></span></th>
<?php } ?>
<?php if ($Page->mail_id->Visible) { // mail_id ?>
        <th class="<?= $Page->mail_id->headerCellClass() ?>"><span id="elh_user_login_mail_id" class="user_login_mail_id"><?= $Page->mail_id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->mobile_no->Visible) { // mobile_no ?>
        <th class="<?= $Page->mobile_no->headerCellClass() ?>"><span id="elh_user_login_mobile_no" class="user_login_mobile_no"><?= $Page->mobile_no->caption() ?></span></th>
<?php } ?>
<?php if ($Page->_password->Visible) { // password ?>
        <th class="<?= $Page->_password->headerCellClass() ?>"><span id="elh_user_login__password" class="user_login__password"><?= $Page->_password->caption() ?></span></th>
<?php } ?>
<?php if ($Page->email_verified->Visible) { // email_verified ?>
        <th class="<?= $Page->email_verified->headerCellClass() ?>"><span id="elh_user_login_email_verified" class="user_login_email_verified"><?= $Page->email_verified->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ReportTo->Visible) { // ReportTo ?>
        <th class="<?= $Page->ReportTo->headerCellClass() ?>"><span id="elh_user_login_ReportTo" class="user_login_ReportTo"><?= $Page->ReportTo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->_UserLevel->Visible) { // UserLevel ?>
        <th class="<?= $Page->_UserLevel->headerCellClass() ?>"><span id="elh_user_login__UserLevel" class="user_login__UserLevel"><?= $Page->_UserLevel->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CreatedDateTime->Visible) { // CreatedDateTime ?>
        <th class="<?= $Page->CreatedDateTime->headerCellClass() ?>"><span id="elh_user_login_CreatedDateTime" class="user_login_CreatedDateTime"><?= $Page->CreatedDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->profilefield->Visible) { // profilefield ?>
        <th class="<?= $Page->profilefield->headerCellClass() ?>"><span id="elh_user_login_profilefield" class="user_login_profilefield"><?= $Page->profilefield->caption() ?></span></th>
<?php } ?>
<?php if ($Page->_UserID->Visible) { // UserID ?>
        <th class="<?= $Page->_UserID->headerCellClass() ?>"><span id="elh_user_login__UserID" class="user_login__UserID"><?= $Page->_UserID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GroupID->Visible) { // GroupID ?>
        <th class="<?= $Page->GroupID->headerCellClass() ?>"><span id="elh_user_login_GroupID" class="user_login_GroupID"><?= $Page->GroupID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th class="<?= $Page->HospID->headerCellClass() ?>"><span id="elh_user_login_HospID" class="user_login_HospID"><?= $Page->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PharID->Visible) { // PharID ?>
        <th class="<?= $Page->PharID->headerCellClass() ?>"><span id="elh_user_login_PharID" class="user_login_PharID"><?= $Page->PharID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StoreID->Visible) { // StoreID ?>
        <th class="<?= $Page->StoreID->headerCellClass() ?>"><span id="elh_user_login_StoreID" class="user_login_StoreID"><?= $Page->StoreID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->OTP->Visible) { // OTP ?>
        <th class="<?= $Page->OTP->headerCellClass() ?>"><span id="elh_user_login_OTP" class="user_login_OTP"><?= $Page->OTP->caption() ?></span></th>
<?php } ?>
<?php if ($Page->_LoginType->Visible) { // LoginType ?>
        <th class="<?= $Page->_LoginType->headerCellClass() ?>"><span id="elh_user_login__LoginType" class="user_login__LoginType"><?= $Page->_LoginType->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BranchId->Visible) { // BranchId ?>
        <th class="<?= $Page->BranchId->headerCellClass() ?>"><span id="elh_user_login_BranchId" class="user_login_BranchId"><?= $Page->BranchId->caption() ?></span></th>
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
<?php if ($Page->id->Visible) { // id ?>
        <td <?= $Page->id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_user_login_id" class="user_login_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->User_Name->Visible) { // User_Name ?>
        <td <?= $Page->User_Name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_user_login_User_Name" class="user_login_User_Name">
<span<?= $Page->User_Name->viewAttributes() ?>>
<?= $Page->User_Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->mail_id->Visible) { // mail_id ?>
        <td <?= $Page->mail_id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_user_login_mail_id" class="user_login_mail_id">
<span<?= $Page->mail_id->viewAttributes() ?>>
<?= $Page->mail_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->mobile_no->Visible) { // mobile_no ?>
        <td <?= $Page->mobile_no->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_user_login_mobile_no" class="user_login_mobile_no">
<span<?= $Page->mobile_no->viewAttributes() ?>>
<?= $Page->mobile_no->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->_password->Visible) { // password ?>
        <td <?= $Page->_password->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_user_login__password" class="user_login__password">
<span<?= $Page->_password->viewAttributes() ?>>
<?= $Page->_password->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->email_verified->Visible) { // email_verified ?>
        <td <?= $Page->email_verified->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_user_login_email_verified" class="user_login_email_verified">
<span<?= $Page->email_verified->viewAttributes() ?>>
<?= $Page->email_verified->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ReportTo->Visible) { // ReportTo ?>
        <td <?= $Page->ReportTo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_user_login_ReportTo" class="user_login_ReportTo">
<span<?= $Page->ReportTo->viewAttributes() ?>>
<?= $Page->ReportTo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->_UserLevel->Visible) { // UserLevel ?>
        <td <?= $Page->_UserLevel->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_user_login__UserLevel" class="user_login__UserLevel">
<span<?= $Page->_UserLevel->viewAttributes() ?>>
<?= $Page->_UserLevel->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CreatedDateTime->Visible) { // CreatedDateTime ?>
        <td <?= $Page->CreatedDateTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_user_login_CreatedDateTime" class="user_login_CreatedDateTime">
<span<?= $Page->CreatedDateTime->viewAttributes() ?>>
<?= $Page->CreatedDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->profilefield->Visible) { // profilefield ?>
        <td <?= $Page->profilefield->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_user_login_profilefield" class="user_login_profilefield">
<span<?= $Page->profilefield->viewAttributes() ?>>
<?= $Page->profilefield->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->_UserID->Visible) { // UserID ?>
        <td <?= $Page->_UserID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_user_login__UserID" class="user_login__UserID">
<span<?= $Page->_UserID->viewAttributes() ?>>
<?= $Page->_UserID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GroupID->Visible) { // GroupID ?>
        <td <?= $Page->GroupID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_user_login_GroupID" class="user_login_GroupID">
<span<?= $Page->GroupID->viewAttributes() ?>>
<?= $Page->GroupID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <td <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_user_login_HospID" class="user_login_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PharID->Visible) { // PharID ?>
        <td <?= $Page->PharID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_user_login_PharID" class="user_login_PharID">
<span<?= $Page->PharID->viewAttributes() ?>>
<?= $Page->PharID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StoreID->Visible) { // StoreID ?>
        <td <?= $Page->StoreID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_user_login_StoreID" class="user_login_StoreID">
<span<?= $Page->StoreID->viewAttributes() ?>>
<?= $Page->StoreID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->OTP->Visible) { // OTP ?>
        <td <?= $Page->OTP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_user_login_OTP" class="user_login_OTP">
<span<?= $Page->OTP->viewAttributes() ?>>
<?= $Page->OTP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->_LoginType->Visible) { // LoginType ?>
        <td <?= $Page->_LoginType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_user_login__LoginType" class="user_login__LoginType">
<span<?= $Page->_LoginType->viewAttributes() ?>>
<?= $Page->_LoginType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BranchId->Visible) { // BranchId ?>
        <td <?= $Page->BranchId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_user_login_BranchId" class="user_login_BranchId">
<span<?= $Page->BranchId->viewAttributes() ?>>
<?= $Page->BranchId->getViewValue() ?></span>
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
