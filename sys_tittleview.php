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
$sys_tittle_view = new sys_tittle_view();

// Run the page
$sys_tittle_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sys_tittle_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$sys_tittle->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fsys_tittleview = currentForm = new ew.Form("fsys_tittleview", "view");

// Form_CustomValidate event
fsys_tittleview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsys_tittleview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$sys_tittle->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $sys_tittle_view->ExportOptions->render("body") ?>
<?php $sys_tittle_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $sys_tittle_view->showPageHeader(); ?>
<?php
$sys_tittle_view->showMessage();
?>
<form name="fsys_tittleview" id="fsys_tittleview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($sys_tittle_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $sys_tittle_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sys_tittle">
<input type="hidden" name="modal" value="<?php echo (int)$sys_tittle_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($sys_tittle->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $sys_tittle_view->TableLeftColumnClass ?>"><span id="elh_sys_tittle_id"><?php echo $sys_tittle->id->caption() ?></span></td>
		<td data-name="id"<?php echo $sys_tittle->id->cellAttributes() ?>>
<span id="el_sys_tittle_id">
<span<?php echo $sys_tittle->id->viewAttributes() ?>>
<?php echo $sys_tittle->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sys_tittle->Name->Visible) { // Name ?>
	<tr id="r_Name">
		<td class="<?php echo $sys_tittle_view->TableLeftColumnClass ?>"><span id="elh_sys_tittle_Name"><?php echo $sys_tittle->Name->caption() ?></span></td>
		<td data-name="Name"<?php echo $sys_tittle->Name->cellAttributes() ?>>
<span id="el_sys_tittle_Name">
<span<?php echo $sys_tittle->Name->viewAttributes() ?>>
<?php echo $sys_tittle->Name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$sys_tittle_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$sys_tittle->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$sys_tittle_view->terminate();
?>