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
<?php include_once "header.php" ?>
<?php if (!$userlevels->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fuserlevelsview = currentForm = new ew.Form("fuserlevelsview", "view");

// Form_CustomValidate event
fuserlevelsview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fuserlevelsview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$userlevels->isExport()) { ?>
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
<?php if ($userlevels_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $userlevels_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="userlevels">
<input type="hidden" name="modal" value="<?php echo (int)$userlevels_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($userlevels->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $userlevels_view->TableLeftColumnClass ?>"><span id="elh_userlevels_id"><?php echo $userlevels->id->caption() ?></span></td>
		<td data-name="id"<?php echo $userlevels->id->cellAttributes() ?>>
<span id="el_userlevels_id">
<span<?php echo $userlevels->id->viewAttributes() ?>>
<?php echo $userlevels->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($userlevels->UserLevelsName->Visible) { // UserLevelsName ?>
	<tr id="r_UserLevelsName">
		<td class="<?php echo $userlevels_view->TableLeftColumnClass ?>"><span id="elh_userlevels_UserLevelsName"><?php echo $userlevels->UserLevelsName->caption() ?></span></td>
		<td data-name="UserLevelsName"<?php echo $userlevels->UserLevelsName->cellAttributes() ?>>
<span id="el_userlevels_UserLevelsName">
<span<?php echo $userlevels->UserLevelsName->viewAttributes() ?>>
<?php echo $userlevels->UserLevelsName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$userlevels_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$userlevels->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$userlevels_view->terminate();
?>