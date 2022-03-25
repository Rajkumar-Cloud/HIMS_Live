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
<?php include_once "header.php"; ?>
<?php if (!$user_login_view->isExport()) { ?>
<script>
var fuser_loginview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fuser_loginview = currentForm = new ew.Form("fuser_loginview", "view");
	loadjs.done("fuser_loginview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$user_login_view->isExport()) { ?>
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
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="user_login">
<input type="hidden" name="modal" value="<?php echo (int)$user_login_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($user_login_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $user_login_view->TableLeftColumnClass ?>"><span id="elh_user_login_id"><?php echo $user_login_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $user_login_view->id->cellAttributes() ?>>
<span id="el_user_login_id">
<span<?php echo $user_login_view->id->viewAttributes() ?>><?php echo $user_login_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($user_login_view->User_Name->Visible) { // User_Name ?>
	<tr id="r_User_Name">
		<td class="<?php echo $user_login_view->TableLeftColumnClass ?>"><span id="elh_user_login_User_Name"><?php echo $user_login_view->User_Name->caption() ?></span></td>
		<td data-name="User_Name" <?php echo $user_login_view->User_Name->cellAttributes() ?>>
<span id="el_user_login_User_Name">
<span<?php echo $user_login_view->User_Name->viewAttributes() ?>><?php echo $user_login_view->User_Name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($user_login_view->mail_id->Visible) { // mail_id ?>
	<tr id="r_mail_id">
		<td class="<?php echo $user_login_view->TableLeftColumnClass ?>"><span id="elh_user_login_mail_id"><?php echo $user_login_view->mail_id->caption() ?></span></td>
		<td data-name="mail_id" <?php echo $user_login_view->mail_id->cellAttributes() ?>>
<span id="el_user_login_mail_id">
<span<?php echo $user_login_view->mail_id->viewAttributes() ?>><?php echo $user_login_view->mail_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($user_login_view->mobile_no->Visible) { // mobile_no ?>
	<tr id="r_mobile_no">
		<td class="<?php echo $user_login_view->TableLeftColumnClass ?>"><span id="elh_user_login_mobile_no"><?php echo $user_login_view->mobile_no->caption() ?></span></td>
		<td data-name="mobile_no" <?php echo $user_login_view->mobile_no->cellAttributes() ?>>
<span id="el_user_login_mobile_no">
<span<?php echo $user_login_view->mobile_no->viewAttributes() ?>><?php echo $user_login_view->mobile_no->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($user_login_view->password->Visible) { // password ?>
	<tr id="r_password">
		<td class="<?php echo $user_login_view->TableLeftColumnClass ?>"><span id="elh_user_login_password"><?php echo $user_login_view->password->caption() ?></span></td>
		<td data-name="password" <?php echo $user_login_view->password->cellAttributes() ?>>
<span id="el_user_login_password">
<span<?php echo $user_login_view->password->viewAttributes() ?>><?php echo $user_login_view->password->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($user_login_view->email_verified->Visible) { // email_verified ?>
	<tr id="r_email_verified">
		<td class="<?php echo $user_login_view->TableLeftColumnClass ?>"><span id="elh_user_login_email_verified"><?php echo $user_login_view->email_verified->caption() ?></span></td>
		<td data-name="email_verified" <?php echo $user_login_view->email_verified->cellAttributes() ?>>
<span id="el_user_login_email_verified">
<span<?php echo $user_login_view->email_verified->viewAttributes() ?>><?php echo $user_login_view->email_verified->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($user_login_view->ReportTo->Visible) { // ReportTo ?>
	<tr id="r_ReportTo">
		<td class="<?php echo $user_login_view->TableLeftColumnClass ?>"><span id="elh_user_login_ReportTo"><?php echo $user_login_view->ReportTo->caption() ?></span></td>
		<td data-name="ReportTo" <?php echo $user_login_view->ReportTo->cellAttributes() ?>>
<span id="el_user_login_ReportTo">
<span<?php echo $user_login_view->ReportTo->viewAttributes() ?>><?php echo $user_login_view->ReportTo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($user_login_view->_UserLevel->Visible) { // UserLevel ?>
	<tr id="r__UserLevel">
		<td class="<?php echo $user_login_view->TableLeftColumnClass ?>"><span id="elh_user_login__UserLevel"><?php echo $user_login_view->_UserLevel->caption() ?></span></td>
		<td data-name="_UserLevel" <?php echo $user_login_view->_UserLevel->cellAttributes() ?>>
<span id="el_user_login__UserLevel">
<span<?php echo $user_login_view->_UserLevel->viewAttributes() ?>><?php echo $user_login_view->_UserLevel->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($user_login_view->CreatedDateTime->Visible) { // CreatedDateTime ?>
	<tr id="r_CreatedDateTime">
		<td class="<?php echo $user_login_view->TableLeftColumnClass ?>"><span id="elh_user_login_CreatedDateTime"><?php echo $user_login_view->CreatedDateTime->caption() ?></span></td>
		<td data-name="CreatedDateTime" <?php echo $user_login_view->CreatedDateTime->cellAttributes() ?>>
<span id="el_user_login_CreatedDateTime">
<span<?php echo $user_login_view->CreatedDateTime->viewAttributes() ?>><?php echo $user_login_view->CreatedDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($user_login_view->profilefield->Visible) { // profilefield ?>
	<tr id="r_profilefield">
		<td class="<?php echo $user_login_view->TableLeftColumnClass ?>"><span id="elh_user_login_profilefield"><?php echo $user_login_view->profilefield->caption() ?></span></td>
		<td data-name="profilefield" <?php echo $user_login_view->profilefield->cellAttributes() ?>>
<span id="el_user_login_profilefield">
<span<?php echo $user_login_view->profilefield->viewAttributes() ?>><?php echo $user_login_view->profilefield->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($user_login_view->_UserID->Visible) { // UserID ?>
	<tr id="r__UserID">
		<td class="<?php echo $user_login_view->TableLeftColumnClass ?>"><span id="elh_user_login__UserID"><?php echo $user_login_view->_UserID->caption() ?></span></td>
		<td data-name="_UserID" <?php echo $user_login_view->_UserID->cellAttributes() ?>>
<span id="el_user_login__UserID">
<span<?php echo $user_login_view->_UserID->viewAttributes() ?>><?php echo $user_login_view->_UserID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($user_login_view->GroupID->Visible) { // GroupID ?>
	<tr id="r_GroupID">
		<td class="<?php echo $user_login_view->TableLeftColumnClass ?>"><span id="elh_user_login_GroupID"><?php echo $user_login_view->GroupID->caption() ?></span></td>
		<td data-name="GroupID" <?php echo $user_login_view->GroupID->cellAttributes() ?>>
<span id="el_user_login_GroupID">
<span<?php echo $user_login_view->GroupID->viewAttributes() ?>><?php echo $user_login_view->GroupID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($user_login_view->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $user_login_view->TableLeftColumnClass ?>"><span id="elh_user_login_HospID"><?php echo $user_login_view->HospID->caption() ?></span></td>
		<td data-name="HospID" <?php echo $user_login_view->HospID->cellAttributes() ?>>
<span id="el_user_login_HospID">
<span<?php echo $user_login_view->HospID->viewAttributes() ?>><?php echo $user_login_view->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($user_login_view->PharID->Visible) { // PharID ?>
	<tr id="r_PharID">
		<td class="<?php echo $user_login_view->TableLeftColumnClass ?>"><span id="elh_user_login_PharID"><?php echo $user_login_view->PharID->caption() ?></span></td>
		<td data-name="PharID" <?php echo $user_login_view->PharID->cellAttributes() ?>>
<span id="el_user_login_PharID">
<span<?php echo $user_login_view->PharID->viewAttributes() ?>><?php echo $user_login_view->PharID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($user_login_view->StoreID->Visible) { // StoreID ?>
	<tr id="r_StoreID">
		<td class="<?php echo $user_login_view->TableLeftColumnClass ?>"><span id="elh_user_login_StoreID"><?php echo $user_login_view->StoreID->caption() ?></span></td>
		<td data-name="StoreID" <?php echo $user_login_view->StoreID->cellAttributes() ?>>
<span id="el_user_login_StoreID">
<span<?php echo $user_login_view->StoreID->viewAttributes() ?>><?php echo $user_login_view->StoreID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$user_login_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$user_login_view->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$user_login_view->terminate();
?>