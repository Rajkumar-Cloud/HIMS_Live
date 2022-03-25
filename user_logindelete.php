<?php
namespace PHPMaker2019\HIMS;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start(); 

// Autoload
include_once "autoload.php";
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
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fuser_logindelete = currentForm = new ew.Form("fuser_logindelete", "delete");

// Form_CustomValidate event
fuser_logindelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fuser_logindelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fuser_logindelete.lists["x_User_Name"] = <?php echo $user_login_delete->User_Name->Lookup->toClientList() ?>;
fuser_logindelete.lists["x_User_Name"].options = <?php echo JsonEncode($user_login_delete->User_Name->lookupOptions()) ?>;
fuser_logindelete.autoSuggests["x_User_Name"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fuser_logindelete.lists["x_email_verified"] = <?php echo $user_login_delete->email_verified->Lookup->toClientList() ?>;
fuser_logindelete.lists["x_email_verified"].options = <?php echo JsonEncode($user_login_delete->email_verified->options(FALSE, TRUE)) ?>;
fuser_logindelete.lists["x_UserLevel"] = <?php echo $user_login_delete->UserLevel->Lookup->toClientList() ?>;
fuser_logindelete.lists["x_UserLevel"].options = <?php echo JsonEncode($user_login_delete->UserLevel->lookupOptions()) ?>;
fuser_logindelete.lists["x_HospID"] = <?php echo $user_login_delete->HospID->Lookup->toClientList() ?>;
fuser_logindelete.lists["x_HospID"].options = <?php echo JsonEncode($user_login_delete->HospID->lookupOptions()) ?>;
fuser_logindelete.lists["x_PharID[]"] = <?php echo $user_login_delete->PharID->Lookup->toClientList() ?>;
fuser_logindelete.lists["x_PharID[]"].options = <?php echo JsonEncode($user_login_delete->PharID->lookupOptions()) ?>;
fuser_logindelete.lists["x_StoreID[]"] = <?php echo $user_login_delete->StoreID->Lookup->toClientList() ?>;
fuser_logindelete.lists["x_StoreID[]"].options = <?php echo JsonEncode($user_login_delete->StoreID->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $user_login_delete->showPageHeader(); ?>
<?php
$user_login_delete->showMessage();
?>
<form name="fuser_logindelete" id="fuser_logindelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($user_login_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $user_login_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="user_login">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($user_login_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($user_login->id->Visible) { // id ?>
		<th class="<?php echo $user_login->id->headerCellClass() ?>"><span id="elh_user_login_id" class="user_login_id"><?php echo $user_login->id->caption() ?></span></th>
<?php } ?>
<?php if ($user_login->User_Name->Visible) { // User_Name ?>
		<th class="<?php echo $user_login->User_Name->headerCellClass() ?>"><span id="elh_user_login_User_Name" class="user_login_User_Name"><?php echo $user_login->User_Name->caption() ?></span></th>
<?php } ?>
<?php if ($user_login->mail_id->Visible) { // mail_id ?>
		<th class="<?php echo $user_login->mail_id->headerCellClass() ?>"><span id="elh_user_login_mail_id" class="user_login_mail_id"><?php echo $user_login->mail_id->caption() ?></span></th>
<?php } ?>
<?php if ($user_login->mobile_no->Visible) { // mobile_no ?>
		<th class="<?php echo $user_login->mobile_no->headerCellClass() ?>"><span id="elh_user_login_mobile_no" class="user_login_mobile_no"><?php echo $user_login->mobile_no->caption() ?></span></th>
<?php } ?>
<?php if ($user_login->password->Visible) { // password ?>
		<th class="<?php echo $user_login->password->headerCellClass() ?>"><span id="elh_user_login_password" class="user_login_password"><?php echo $user_login->password->caption() ?></span></th>
<?php } ?>
<?php if ($user_login->email_verified->Visible) { // email_verified ?>
		<th class="<?php echo $user_login->email_verified->headerCellClass() ?>"><span id="elh_user_login_email_verified" class="user_login_email_verified"><?php echo $user_login->email_verified->caption() ?></span></th>
<?php } ?>
<?php if ($user_login->ReportTo->Visible) { // ReportTo ?>
		<th class="<?php echo $user_login->ReportTo->headerCellClass() ?>"><span id="elh_user_login_ReportTo" class="user_login_ReportTo"><?php echo $user_login->ReportTo->caption() ?></span></th>
<?php } ?>
<?php if ($user_login->UserLevel->Visible) { // UserLevel ?>
		<th class="<?php echo $user_login->UserLevel->headerCellClass() ?>"><span id="elh_user_login_UserLevel" class="user_login_UserLevel"><?php echo $user_login->UserLevel->caption() ?></span></th>
<?php } ?>
<?php if ($user_login->CreatedDateTime->Visible) { // CreatedDateTime ?>
		<th class="<?php echo $user_login->CreatedDateTime->headerCellClass() ?>"><span id="elh_user_login_CreatedDateTime" class="user_login_CreatedDateTime"><?php echo $user_login->CreatedDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($user_login->profilefield->Visible) { // profilefield ?>
		<th class="<?php echo $user_login->profilefield->headerCellClass() ?>"><span id="elh_user_login_profilefield" class="user_login_profilefield"><?php echo $user_login->profilefield->caption() ?></span></th>
<?php } ?>
<?php if ($user_login->_UserID->Visible) { // UserID ?>
		<th class="<?php echo $user_login->_UserID->headerCellClass() ?>"><span id="elh_user_login__UserID" class="user_login__UserID"><?php echo $user_login->_UserID->caption() ?></span></th>
<?php } ?>
<?php if ($user_login->GroupID->Visible) { // GroupID ?>
		<th class="<?php echo $user_login->GroupID->headerCellClass() ?>"><span id="elh_user_login_GroupID" class="user_login_GroupID"><?php echo $user_login->GroupID->caption() ?></span></th>
<?php } ?>
<?php if ($user_login->HospID->Visible) { // HospID ?>
		<th class="<?php echo $user_login->HospID->headerCellClass() ?>"><span id="elh_user_login_HospID" class="user_login_HospID"><?php echo $user_login->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($user_login->PharID->Visible) { // PharID ?>
		<th class="<?php echo $user_login->PharID->headerCellClass() ?>"><span id="elh_user_login_PharID" class="user_login_PharID"><?php echo $user_login->PharID->caption() ?></span></th>
<?php } ?>
<?php if ($user_login->StoreID->Visible) { // StoreID ?>
		<th class="<?php echo $user_login->StoreID->headerCellClass() ?>"><span id="elh_user_login_StoreID" class="user_login_StoreID"><?php echo $user_login->StoreID->caption() ?></span></th>
<?php } ?>
<?php if ($user_login->OTP->Visible) { // OTP ?>
		<th class="<?php echo $user_login->OTP->headerCellClass() ?>"><span id="elh_user_login_OTP" class="user_login_OTP"><?php echo $user_login->OTP->caption() ?></span></th>
<?php } ?>
<?php if ($user_login->LoginType->Visible) { // LoginType ?>
		<th class="<?php echo $user_login->LoginType->headerCellClass() ?>"><span id="elh_user_login_LoginType" class="user_login_LoginType"><?php echo $user_login->LoginType->caption() ?></span></th>
<?php } ?>
<?php if ($user_login->BranchId->Visible) { // BranchId ?>
		<th class="<?php echo $user_login->BranchId->headerCellClass() ?>"><span id="elh_user_login_BranchId" class="user_login_BranchId"><?php echo $user_login->BranchId->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$user_login_delete->RecCnt = 0;
$i = 0;
while (!$user_login_delete->Recordset->EOF) {
	$user_login_delete->RecCnt++;
	$user_login_delete->RowCnt++;

	// Set row properties
	$user_login->resetAttributes();
	$user_login->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$user_login_delete->loadRowValues($user_login_delete->Recordset);

	// Render row
	$user_login_delete->renderRow();
?>
	<tr<?php echo $user_login->rowAttributes() ?>>
<?php if ($user_login->id->Visible) { // id ?>
		<td<?php echo $user_login->id->cellAttributes() ?>>
<span id="el<?php echo $user_login_delete->RowCnt ?>_user_login_id" class="user_login_id">
<span<?php echo $user_login->id->viewAttributes() ?>>
<?php echo $user_login->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($user_login->User_Name->Visible) { // User_Name ?>
		<td<?php echo $user_login->User_Name->cellAttributes() ?>>
<span id="el<?php echo $user_login_delete->RowCnt ?>_user_login_User_Name" class="user_login_User_Name">
<span<?php echo $user_login->User_Name->viewAttributes() ?>>
<?php echo $user_login->User_Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($user_login->mail_id->Visible) { // mail_id ?>
		<td<?php echo $user_login->mail_id->cellAttributes() ?>>
<span id="el<?php echo $user_login_delete->RowCnt ?>_user_login_mail_id" class="user_login_mail_id">
<span<?php echo $user_login->mail_id->viewAttributes() ?>>
<?php echo $user_login->mail_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($user_login->mobile_no->Visible) { // mobile_no ?>
		<td<?php echo $user_login->mobile_no->cellAttributes() ?>>
<span id="el<?php echo $user_login_delete->RowCnt ?>_user_login_mobile_no" class="user_login_mobile_no">
<span<?php echo $user_login->mobile_no->viewAttributes() ?>>
<?php echo $user_login->mobile_no->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($user_login->password->Visible) { // password ?>
		<td<?php echo $user_login->password->cellAttributes() ?>>
<span id="el<?php echo $user_login_delete->RowCnt ?>_user_login_password" class="user_login_password">
<span<?php echo $user_login->password->viewAttributes() ?>>
<?php echo $user_login->password->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($user_login->email_verified->Visible) { // email_verified ?>
		<td<?php echo $user_login->email_verified->cellAttributes() ?>>
<span id="el<?php echo $user_login_delete->RowCnt ?>_user_login_email_verified" class="user_login_email_verified">
<span<?php echo $user_login->email_verified->viewAttributes() ?>>
<?php echo $user_login->email_verified->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($user_login->ReportTo->Visible) { // ReportTo ?>
		<td<?php echo $user_login->ReportTo->cellAttributes() ?>>
<span id="el<?php echo $user_login_delete->RowCnt ?>_user_login_ReportTo" class="user_login_ReportTo">
<span<?php echo $user_login->ReportTo->viewAttributes() ?>>
<?php echo $user_login->ReportTo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($user_login->UserLevel->Visible) { // UserLevel ?>
		<td<?php echo $user_login->UserLevel->cellAttributes() ?>>
<span id="el<?php echo $user_login_delete->RowCnt ?>_user_login_UserLevel" class="user_login_UserLevel">
<span<?php echo $user_login->UserLevel->viewAttributes() ?>>
<?php echo $user_login->UserLevel->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($user_login->CreatedDateTime->Visible) { // CreatedDateTime ?>
		<td<?php echo $user_login->CreatedDateTime->cellAttributes() ?>>
<span id="el<?php echo $user_login_delete->RowCnt ?>_user_login_CreatedDateTime" class="user_login_CreatedDateTime">
<span<?php echo $user_login->CreatedDateTime->viewAttributes() ?>>
<?php echo $user_login->CreatedDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($user_login->profilefield->Visible) { // profilefield ?>
		<td<?php echo $user_login->profilefield->cellAttributes() ?>>
<span id="el<?php echo $user_login_delete->RowCnt ?>_user_login_profilefield" class="user_login_profilefield">
<span<?php echo $user_login->profilefield->viewAttributes() ?>>
<?php echo $user_login->profilefield->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($user_login->_UserID->Visible) { // UserID ?>
		<td<?php echo $user_login->_UserID->cellAttributes() ?>>
<span id="el<?php echo $user_login_delete->RowCnt ?>_user_login__UserID" class="user_login__UserID">
<span<?php echo $user_login->_UserID->viewAttributes() ?>>
<?php echo $user_login->_UserID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($user_login->GroupID->Visible) { // GroupID ?>
		<td<?php echo $user_login->GroupID->cellAttributes() ?>>
<span id="el<?php echo $user_login_delete->RowCnt ?>_user_login_GroupID" class="user_login_GroupID">
<span<?php echo $user_login->GroupID->viewAttributes() ?>>
<?php echo $user_login->GroupID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($user_login->HospID->Visible) { // HospID ?>
		<td<?php echo $user_login->HospID->cellAttributes() ?>>
<span id="el<?php echo $user_login_delete->RowCnt ?>_user_login_HospID" class="user_login_HospID">
<span<?php echo $user_login->HospID->viewAttributes() ?>>
<?php echo $user_login->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($user_login->PharID->Visible) { // PharID ?>
		<td<?php echo $user_login->PharID->cellAttributes() ?>>
<span id="el<?php echo $user_login_delete->RowCnt ?>_user_login_PharID" class="user_login_PharID">
<span<?php echo $user_login->PharID->viewAttributes() ?>>
<?php echo $user_login->PharID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($user_login->StoreID->Visible) { // StoreID ?>
		<td<?php echo $user_login->StoreID->cellAttributes() ?>>
<span id="el<?php echo $user_login_delete->RowCnt ?>_user_login_StoreID" class="user_login_StoreID">
<span<?php echo $user_login->StoreID->viewAttributes() ?>>
<?php echo $user_login->StoreID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($user_login->OTP->Visible) { // OTP ?>
		<td<?php echo $user_login->OTP->cellAttributes() ?>>
<span id="el<?php echo $user_login_delete->RowCnt ?>_user_login_OTP" class="user_login_OTP">
<span<?php echo $user_login->OTP->viewAttributes() ?>>
<?php echo $user_login->OTP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($user_login->LoginType->Visible) { // LoginType ?>
		<td<?php echo $user_login->LoginType->cellAttributes() ?>>
<span id="el<?php echo $user_login_delete->RowCnt ?>_user_login_LoginType" class="user_login_LoginType">
<span<?php echo $user_login->LoginType->viewAttributes() ?>>
<?php echo $user_login->LoginType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($user_login->BranchId->Visible) { // BranchId ?>
		<td<?php echo $user_login->BranchId->cellAttributes() ?>>
<span id="el<?php echo $user_login_delete->RowCnt ?>_user_login_BranchId" class="user_login_BranchId">
<span<?php echo $user_login->BranchId->viewAttributes() ?>>
<?php echo $user_login->BranchId->getViewValue() ?></span>
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
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$user_login_delete->terminate();
?>