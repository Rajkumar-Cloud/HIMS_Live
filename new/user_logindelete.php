<?php
namespace PHPMaker2020\HIMS;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$user_login_delete = new user_login_delete();

// Run the page
$user_login_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$user_login_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fuser_logindelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fuser_logindelete = currentForm = new ew.Form("fuser_logindelete", "delete");
	loadjs.done("fuser_logindelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $user_login_delete->showPageHeader(); ?>
<?php
$user_login_delete->showMessage();
?>
<form name="fuser_logindelete" id="fuser_logindelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="user_login">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($user_login_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($user_login_delete->id->Visible) { // id ?>
		<th class="<?php echo $user_login_delete->id->headerCellClass() ?>"><span id="elh_user_login_id" class="user_login_id"><?php echo $user_login_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($user_login_delete->User_Name->Visible) { // User_Name ?>
		<th class="<?php echo $user_login_delete->User_Name->headerCellClass() ?>"><span id="elh_user_login_User_Name" class="user_login_User_Name"><?php echo $user_login_delete->User_Name->caption() ?></span></th>
<?php } ?>
<?php if ($user_login_delete->mail_id->Visible) { // mail_id ?>
		<th class="<?php echo $user_login_delete->mail_id->headerCellClass() ?>"><span id="elh_user_login_mail_id" class="user_login_mail_id"><?php echo $user_login_delete->mail_id->caption() ?></span></th>
<?php } ?>
<?php if ($user_login_delete->mobile_no->Visible) { // mobile_no ?>
		<th class="<?php echo $user_login_delete->mobile_no->headerCellClass() ?>"><span id="elh_user_login_mobile_no" class="user_login_mobile_no"><?php echo $user_login_delete->mobile_no->caption() ?></span></th>
<?php } ?>
<?php if ($user_login_delete->password->Visible) { // password ?>
		<th class="<?php echo $user_login_delete->password->headerCellClass() ?>"><span id="elh_user_login_password" class="user_login_password"><?php echo $user_login_delete->password->caption() ?></span></th>
<?php } ?>
<?php if ($user_login_delete->email_verified->Visible) { // email_verified ?>
		<th class="<?php echo $user_login_delete->email_verified->headerCellClass() ?>"><span id="elh_user_login_email_verified" class="user_login_email_verified"><?php echo $user_login_delete->email_verified->caption() ?></span></th>
<?php } ?>
<?php if ($user_login_delete->ReportTo->Visible) { // ReportTo ?>
		<th class="<?php echo $user_login_delete->ReportTo->headerCellClass() ?>"><span id="elh_user_login_ReportTo" class="user_login_ReportTo"><?php echo $user_login_delete->ReportTo->caption() ?></span></th>
<?php } ?>
<?php if ($user_login_delete->_UserLevel->Visible) { // UserLevel ?>
		<th class="<?php echo $user_login_delete->_UserLevel->headerCellClass() ?>"><span id="elh_user_login__UserLevel" class="user_login__UserLevel"><?php echo $user_login_delete->_UserLevel->caption() ?></span></th>
<?php } ?>
<?php if ($user_login_delete->CreatedDateTime->Visible) { // CreatedDateTime ?>
		<th class="<?php echo $user_login_delete->CreatedDateTime->headerCellClass() ?>"><span id="elh_user_login_CreatedDateTime" class="user_login_CreatedDateTime"><?php echo $user_login_delete->CreatedDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($user_login_delete->profilefield->Visible) { // profilefield ?>
		<th class="<?php echo $user_login_delete->profilefield->headerCellClass() ?>"><span id="elh_user_login_profilefield" class="user_login_profilefield"><?php echo $user_login_delete->profilefield->caption() ?></span></th>
<?php } ?>
<?php if ($user_login_delete->_UserID->Visible) { // UserID ?>
		<th class="<?php echo $user_login_delete->_UserID->headerCellClass() ?>"><span id="elh_user_login__UserID" class="user_login__UserID"><?php echo $user_login_delete->_UserID->caption() ?></span></th>
<?php } ?>
<?php if ($user_login_delete->GroupID->Visible) { // GroupID ?>
		<th class="<?php echo $user_login_delete->GroupID->headerCellClass() ?>"><span id="elh_user_login_GroupID" class="user_login_GroupID"><?php echo $user_login_delete->GroupID->caption() ?></span></th>
<?php } ?>
<?php if ($user_login_delete->HospID->Visible) { // HospID ?>
		<th class="<?php echo $user_login_delete->HospID->headerCellClass() ?>"><span id="elh_user_login_HospID" class="user_login_HospID"><?php echo $user_login_delete->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($user_login_delete->PharID->Visible) { // PharID ?>
		<th class="<?php echo $user_login_delete->PharID->headerCellClass() ?>"><span id="elh_user_login_PharID" class="user_login_PharID"><?php echo $user_login_delete->PharID->caption() ?></span></th>
<?php } ?>
<?php if ($user_login_delete->StoreID->Visible) { // StoreID ?>
		<th class="<?php echo $user_login_delete->StoreID->headerCellClass() ?>"><span id="elh_user_login_StoreID" class="user_login_StoreID"><?php echo $user_login_delete->StoreID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$user_login_delete->RecordCount = 0;
$i = 0;
while (!$user_login_delete->Recordset->EOF) {
	$user_login_delete->RecordCount++;
	$user_login_delete->RowCount++;

	// Set row properties
	$user_login->resetAttributes();
	$user_login->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$user_login_delete->loadRowValues($user_login_delete->Recordset);

	// Render row
	$user_login_delete->renderRow();
?>
	<tr <?php echo $user_login->rowAttributes() ?>>
<?php if ($user_login_delete->id->Visible) { // id ?>
		<td <?php echo $user_login_delete->id->cellAttributes() ?>>
<span id="el<?php echo $user_login_delete->RowCount ?>_user_login_id" class="user_login_id">
<span<?php echo $user_login_delete->id->viewAttributes() ?>><?php echo $user_login_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($user_login_delete->User_Name->Visible) { // User_Name ?>
		<td <?php echo $user_login_delete->User_Name->cellAttributes() ?>>
<span id="el<?php echo $user_login_delete->RowCount ?>_user_login_User_Name" class="user_login_User_Name">
<span<?php echo $user_login_delete->User_Name->viewAttributes() ?>><?php echo $user_login_delete->User_Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($user_login_delete->mail_id->Visible) { // mail_id ?>
		<td <?php echo $user_login_delete->mail_id->cellAttributes() ?>>
<span id="el<?php echo $user_login_delete->RowCount ?>_user_login_mail_id" class="user_login_mail_id">
<span<?php echo $user_login_delete->mail_id->viewAttributes() ?>><?php echo $user_login_delete->mail_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($user_login_delete->mobile_no->Visible) { // mobile_no ?>
		<td <?php echo $user_login_delete->mobile_no->cellAttributes() ?>>
<span id="el<?php echo $user_login_delete->RowCount ?>_user_login_mobile_no" class="user_login_mobile_no">
<span<?php echo $user_login_delete->mobile_no->viewAttributes() ?>><?php echo $user_login_delete->mobile_no->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($user_login_delete->password->Visible) { // password ?>
		<td <?php echo $user_login_delete->password->cellAttributes() ?>>
<span id="el<?php echo $user_login_delete->RowCount ?>_user_login_password" class="user_login_password">
<span<?php echo $user_login_delete->password->viewAttributes() ?>><?php echo $user_login_delete->password->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($user_login_delete->email_verified->Visible) { // email_verified ?>
		<td <?php echo $user_login_delete->email_verified->cellAttributes() ?>>
<span id="el<?php echo $user_login_delete->RowCount ?>_user_login_email_verified" class="user_login_email_verified">
<span<?php echo $user_login_delete->email_verified->viewAttributes() ?>><?php echo $user_login_delete->email_verified->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($user_login_delete->ReportTo->Visible) { // ReportTo ?>
		<td <?php echo $user_login_delete->ReportTo->cellAttributes() ?>>
<span id="el<?php echo $user_login_delete->RowCount ?>_user_login_ReportTo" class="user_login_ReportTo">
<span<?php echo $user_login_delete->ReportTo->viewAttributes() ?>><?php echo $user_login_delete->ReportTo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($user_login_delete->_UserLevel->Visible) { // UserLevel ?>
		<td <?php echo $user_login_delete->_UserLevel->cellAttributes() ?>>
<span id="el<?php echo $user_login_delete->RowCount ?>_user_login__UserLevel" class="user_login__UserLevel">
<span<?php echo $user_login_delete->_UserLevel->viewAttributes() ?>><?php echo $user_login_delete->_UserLevel->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($user_login_delete->CreatedDateTime->Visible) { // CreatedDateTime ?>
		<td <?php echo $user_login_delete->CreatedDateTime->cellAttributes() ?>>
<span id="el<?php echo $user_login_delete->RowCount ?>_user_login_CreatedDateTime" class="user_login_CreatedDateTime">
<span<?php echo $user_login_delete->CreatedDateTime->viewAttributes() ?>><?php echo $user_login_delete->CreatedDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($user_login_delete->profilefield->Visible) { // profilefield ?>
		<td <?php echo $user_login_delete->profilefield->cellAttributes() ?>>
<span id="el<?php echo $user_login_delete->RowCount ?>_user_login_profilefield" class="user_login_profilefield">
<span<?php echo $user_login_delete->profilefield->viewAttributes() ?>><?php echo $user_login_delete->profilefield->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($user_login_delete->_UserID->Visible) { // UserID ?>
		<td <?php echo $user_login_delete->_UserID->cellAttributes() ?>>
<span id="el<?php echo $user_login_delete->RowCount ?>_user_login__UserID" class="user_login__UserID">
<span<?php echo $user_login_delete->_UserID->viewAttributes() ?>><?php echo $user_login_delete->_UserID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($user_login_delete->GroupID->Visible) { // GroupID ?>
		<td <?php echo $user_login_delete->GroupID->cellAttributes() ?>>
<span id="el<?php echo $user_login_delete->RowCount ?>_user_login_GroupID" class="user_login_GroupID">
<span<?php echo $user_login_delete->GroupID->viewAttributes() ?>><?php echo $user_login_delete->GroupID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($user_login_delete->HospID->Visible) { // HospID ?>
		<td <?php echo $user_login_delete->HospID->cellAttributes() ?>>
<span id="el<?php echo $user_login_delete->RowCount ?>_user_login_HospID" class="user_login_HospID">
<span<?php echo $user_login_delete->HospID->viewAttributes() ?>><?php echo $user_login_delete->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($user_login_delete->PharID->Visible) { // PharID ?>
		<td <?php echo $user_login_delete->PharID->cellAttributes() ?>>
<span id="el<?php echo $user_login_delete->RowCount ?>_user_login_PharID" class="user_login_PharID">
<span<?php echo $user_login_delete->PharID->viewAttributes() ?>><?php echo $user_login_delete->PharID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($user_login_delete->StoreID->Visible) { // StoreID ?>
		<td <?php echo $user_login_delete->StoreID->cellAttributes() ?>>
<span id="el<?php echo $user_login_delete->RowCount ?>_user_login_StoreID" class="user_login_StoreID">
<span<?php echo $user_login_delete->StoreID->viewAttributes() ?>><?php echo $user_login_delete->StoreID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$user_login_delete->Recordset->moveNext();
}
$user_login_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $user_login_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$user_login_delete->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$user_login_delete->terminate();
?>