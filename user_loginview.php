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
$user_login_view = new user_login_view();

// Run the page
$user_login_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$user_login_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$user_login->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fuser_loginview = currentForm = new ew.Form("fuser_loginview", "view");

// Form_CustomValidate event
fuser_loginview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fuser_loginview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fuser_loginview.lists["x_User_Name"] = <?php echo $user_login_view->User_Name->Lookup->toClientList() ?>;
fuser_loginview.lists["x_User_Name"].options = <?php echo JsonEncode($user_login_view->User_Name->lookupOptions()) ?>;
fuser_loginview.autoSuggests["x_User_Name"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fuser_loginview.lists["x_email_verified"] = <?php echo $user_login_view->email_verified->Lookup->toClientList() ?>;
fuser_loginview.lists["x_email_verified"].options = <?php echo JsonEncode($user_login_view->email_verified->options(FALSE, TRUE)) ?>;
fuser_loginview.lists["x_UserLevel"] = <?php echo $user_login_view->UserLevel->Lookup->toClientList() ?>;
fuser_loginview.lists["x_UserLevel"].options = <?php echo JsonEncode($user_login_view->UserLevel->lookupOptions()) ?>;
fuser_loginview.lists["x_HospID"] = <?php echo $user_login_view->HospID->Lookup->toClientList() ?>;
fuser_loginview.lists["x_HospID"].options = <?php echo JsonEncode($user_login_view->HospID->lookupOptions()) ?>;
fuser_loginview.lists["x_PharID[]"] = <?php echo $user_login_view->PharID->Lookup->toClientList() ?>;
fuser_loginview.lists["x_PharID[]"].options = <?php echo JsonEncode($user_login_view->PharID->lookupOptions()) ?>;
fuser_loginview.lists["x_StoreID[]"] = <?php echo $user_login_view->StoreID->Lookup->toClientList() ?>;
fuser_loginview.lists["x_StoreID[]"].options = <?php echo JsonEncode($user_login_view->StoreID->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$user_login->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $user_login_view->ExportOptions->render("body") ?>
<?php $user_login_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $user_login_view->showPageHeader(); ?>
<?php
$user_login_view->showMessage();
?>
<form name="fuser_loginview" id="fuser_loginview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($user_login_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $user_login_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="user_login">
<input type="hidden" name="modal" value="<?php echo (int)$user_login_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($user_login->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $user_login_view->TableLeftColumnClass ?>"><span id="elh_user_login_id"><?php echo $user_login->id->caption() ?></span></td>
		<td data-name="id"<?php echo $user_login->id->cellAttributes() ?>>
<span id="el_user_login_id">
<span<?php echo $user_login->id->viewAttributes() ?>>
<?php echo $user_login->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($user_login->User_Name->Visible) { // User_Name ?>
	<tr id="r_User_Name">
		<td class="<?php echo $user_login_view->TableLeftColumnClass ?>"><span id="elh_user_login_User_Name"><?php echo $user_login->User_Name->caption() ?></span></td>
		<td data-name="User_Name"<?php echo $user_login->User_Name->cellAttributes() ?>>
<span id="el_user_login_User_Name">
<span<?php echo $user_login->User_Name->viewAttributes() ?>>
<?php echo $user_login->User_Name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($user_login->mail_id->Visible) { // mail_id ?>
	<tr id="r_mail_id">
		<td class="<?php echo $user_login_view->TableLeftColumnClass ?>"><span id="elh_user_login_mail_id"><?php echo $user_login->mail_id->caption() ?></span></td>
		<td data-name="mail_id"<?php echo $user_login->mail_id->cellAttributes() ?>>
<span id="el_user_login_mail_id">
<span<?php echo $user_login->mail_id->viewAttributes() ?>>
<?php echo $user_login->mail_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($user_login->mobile_no->Visible) { // mobile_no ?>
	<tr id="r_mobile_no">
		<td class="<?php echo $user_login_view->TableLeftColumnClass ?>"><span id="elh_user_login_mobile_no"><?php echo $user_login->mobile_no->caption() ?></span></td>
		<td data-name="mobile_no"<?php echo $user_login->mobile_no->cellAttributes() ?>>
<span id="el_user_login_mobile_no">
<span<?php echo $user_login->mobile_no->viewAttributes() ?>>
<?php echo $user_login->mobile_no->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($user_login->password->Visible) { // password ?>
	<tr id="r_password">
		<td class="<?php echo $user_login_view->TableLeftColumnClass ?>"><span id="elh_user_login_password"><?php echo $user_login->password->caption() ?></span></td>
		<td data-name="password"<?php echo $user_login->password->cellAttributes() ?>>
<span id="el_user_login_password">
<span<?php echo $user_login->password->viewAttributes() ?>>
<?php echo $user_login->password->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($user_login->email_verified->Visible) { // email_verified ?>
	<tr id="r_email_verified">
		<td class="<?php echo $user_login_view->TableLeftColumnClass ?>"><span id="elh_user_login_email_verified"><?php echo $user_login->email_verified->caption() ?></span></td>
		<td data-name="email_verified"<?php echo $user_login->email_verified->cellAttributes() ?>>
<span id="el_user_login_email_verified">
<span<?php echo $user_login->email_verified->viewAttributes() ?>>
<?php echo $user_login->email_verified->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($user_login->ReportTo->Visible) { // ReportTo ?>
	<tr id="r_ReportTo">
		<td class="<?php echo $user_login_view->TableLeftColumnClass ?>"><span id="elh_user_login_ReportTo"><?php echo $user_login->ReportTo->caption() ?></span></td>
		<td data-name="ReportTo"<?php echo $user_login->ReportTo->cellAttributes() ?>>
<span id="el_user_login_ReportTo">
<span<?php echo $user_login->ReportTo->viewAttributes() ?>>
<?php echo $user_login->ReportTo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($user_login->UserLevel->Visible) { // UserLevel ?>
	<tr id="r_UserLevel">
		<td class="<?php echo $user_login_view->TableLeftColumnClass ?>"><span id="elh_user_login_UserLevel"><?php echo $user_login->UserLevel->caption() ?></span></td>
		<td data-name="UserLevel"<?php echo $user_login->UserLevel->cellAttributes() ?>>
<span id="el_user_login_UserLevel">
<span<?php echo $user_login->UserLevel->viewAttributes() ?>>
<?php echo $user_login->UserLevel->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($user_login->CreatedDateTime->Visible) { // CreatedDateTime ?>
	<tr id="r_CreatedDateTime">
		<td class="<?php echo $user_login_view->TableLeftColumnClass ?>"><span id="elh_user_login_CreatedDateTime"><?php echo $user_login->CreatedDateTime->caption() ?></span></td>
		<td data-name="CreatedDateTime"<?php echo $user_login->CreatedDateTime->cellAttributes() ?>>
<span id="el_user_login_CreatedDateTime">
<span<?php echo $user_login->CreatedDateTime->viewAttributes() ?>>
<?php echo $user_login->CreatedDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($user_login->profilefield->Visible) { // profilefield ?>
	<tr id="r_profilefield">
		<td class="<?php echo $user_login_view->TableLeftColumnClass ?>"><span id="elh_user_login_profilefield"><?php echo $user_login->profilefield->caption() ?></span></td>
		<td data-name="profilefield"<?php echo $user_login->profilefield->cellAttributes() ?>>
<span id="el_user_login_profilefield">
<span<?php echo $user_login->profilefield->viewAttributes() ?>>
<?php echo $user_login->profilefield->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($user_login->_UserID->Visible) { // UserID ?>
	<tr id="r__UserID">
		<td class="<?php echo $user_login_view->TableLeftColumnClass ?>"><span id="elh_user_login__UserID"><?php echo $user_login->_UserID->caption() ?></span></td>
		<td data-name="_UserID"<?php echo $user_login->_UserID->cellAttributes() ?>>
<span id="el_user_login__UserID">
<span<?php echo $user_login->_UserID->viewAttributes() ?>>
<?php echo $user_login->_UserID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($user_login->GroupID->Visible) { // GroupID ?>
	<tr id="r_GroupID">
		<td class="<?php echo $user_login_view->TableLeftColumnClass ?>"><span id="elh_user_login_GroupID"><?php echo $user_login->GroupID->caption() ?></span></td>
		<td data-name="GroupID"<?php echo $user_login->GroupID->cellAttributes() ?>>
<span id="el_user_login_GroupID">
<span<?php echo $user_login->GroupID->viewAttributes() ?>>
<?php echo $user_login->GroupID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($user_login->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $user_login_view->TableLeftColumnClass ?>"><span id="elh_user_login_HospID"><?php echo $user_login->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $user_login->HospID->cellAttributes() ?>>
<span id="el_user_login_HospID">
<span<?php echo $user_login->HospID->viewAttributes() ?>>
<?php echo $user_login->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($user_login->PharID->Visible) { // PharID ?>
	<tr id="r_PharID">
		<td class="<?php echo $user_login_view->TableLeftColumnClass ?>"><span id="elh_user_login_PharID"><?php echo $user_login->PharID->caption() ?></span></td>
		<td data-name="PharID"<?php echo $user_login->PharID->cellAttributes() ?>>
<span id="el_user_login_PharID">
<span<?php echo $user_login->PharID->viewAttributes() ?>>
<?php echo $user_login->PharID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($user_login->StoreID->Visible) { // StoreID ?>
	<tr id="r_StoreID">
		<td class="<?php echo $user_login_view->TableLeftColumnClass ?>"><span id="elh_user_login_StoreID"><?php echo $user_login->StoreID->caption() ?></span></td>
		<td data-name="StoreID"<?php echo $user_login->StoreID->cellAttributes() ?>>
<span id="el_user_login_StoreID">
<span<?php echo $user_login->StoreID->viewAttributes() ?>>
<?php echo $user_login->StoreID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($user_login->OTP->Visible) { // OTP ?>
	<tr id="r_OTP">
		<td class="<?php echo $user_login_view->TableLeftColumnClass ?>"><span id="elh_user_login_OTP"><?php echo $user_login->OTP->caption() ?></span></td>
		<td data-name="OTP"<?php echo $user_login->OTP->cellAttributes() ?>>
<span id="el_user_login_OTP">
<span<?php echo $user_login->OTP->viewAttributes() ?>>
<?php echo $user_login->OTP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($user_login->LoginType->Visible) { // LoginType ?>
	<tr id="r_LoginType">
		<td class="<?php echo $user_login_view->TableLeftColumnClass ?>"><span id="elh_user_login_LoginType"><?php echo $user_login->LoginType->caption() ?></span></td>
		<td data-name="LoginType"<?php echo $user_login->LoginType->cellAttributes() ?>>
<span id="el_user_login_LoginType">
<span<?php echo $user_login->LoginType->viewAttributes() ?>>
<?php echo $user_login->LoginType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($user_login->BranchId->Visible) { // BranchId ?>
	<tr id="r_BranchId">
		<td class="<?php echo $user_login_view->TableLeftColumnClass ?>"><span id="elh_user_login_BranchId"><?php echo $user_login->BranchId->caption() ?></span></td>
		<td data-name="BranchId"<?php echo $user_login->BranchId->cellAttributes() ?>>
<span id="el_user_login_BranchId">
<span<?php echo $user_login->BranchId->viewAttributes() ?>>
<?php echo $user_login->BranchId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$user_login_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$user_login->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$user_login_view->terminate();
?>