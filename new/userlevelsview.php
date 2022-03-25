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
$userlevels_view = new userlevels_view();

// Run the page
$userlevels_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$userlevels_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$userlevels_view->isExport()) { ?>
<script>
var fuserlevelsview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fuserlevelsview = currentForm = new ew.Form("fuserlevelsview", "view");
	loadjs.done("fuserlevelsview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$userlevels_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $userlevels_view->ExportOptions->render("body") ?>
<?php $userlevels_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $userlevels_view->showPageHeader(); ?>
<?php
$userlevels_view->showMessage();
?>
<form name="fuserlevelsview" id="fuserlevelsview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="userlevels">
<input type="hidden" name="modal" value="<?php echo (int)$userlevels_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($userlevels_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $userlevels_view->TableLeftColumnClass ?>"><span id="elh_userlevels_id"><?php echo $userlevels_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $userlevels_view->id->cellAttributes() ?>>
<span id="el_userlevels_id">
<span<?php echo $userlevels_view->id->viewAttributes() ?>><?php echo $userlevels_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($userlevels_view->UserLevelsName->Visible) { // UserLevelsName ?>
	<tr id="r_UserLevelsName">
		<td class="<?php echo $userlevels_view->TableLeftColumnClass ?>"><span id="elh_userlevels_UserLevelsName"><?php echo $userlevels_view->UserLevelsName->caption() ?></span></td>
		<td data-name="UserLevelsName" <?php echo $userlevels_view->UserLevelsName->cellAttributes() ?>>
<span id="el_userlevels_UserLevelsName">
<span<?php echo $userlevels_view->UserLevelsName->viewAttributes() ?>><?php echo $userlevels_view->UserLevelsName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$userlevels_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$userlevels_view->isExport()) { ?>
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
$userlevels_view->terminate();
?>