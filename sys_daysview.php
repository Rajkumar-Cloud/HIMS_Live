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
$sys_days_view = new sys_days_view();

// Run the page
$sys_days_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sys_days_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$sys_days->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fsys_daysview = currentForm = new ew.Form("fsys_daysview", "view");

// Form_CustomValidate event
fsys_daysview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsys_daysview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$sys_days->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $sys_days_view->ExportOptions->render("body") ?>
<?php $sys_days_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $sys_days_view->showPageHeader(); ?>
<?php
$sys_days_view->showMessage();
?>
<form name="fsys_daysview" id="fsys_daysview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($sys_days_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $sys_days_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sys_days">
<input type="hidden" name="modal" value="<?php echo (int)$sys_days_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($sys_days->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $sys_days_view->TableLeftColumnClass ?>"><span id="elh_sys_days_id"><?php echo $sys_days->id->caption() ?></span></td>
		<td data-name="id"<?php echo $sys_days->id->cellAttributes() ?>>
<span id="el_sys_days_id">
<span<?php echo $sys_days->id->viewAttributes() ?>>
<?php echo $sys_days->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sys_days->Days->Visible) { // Days ?>
	<tr id="r_Days">
		<td class="<?php echo $sys_days_view->TableLeftColumnClass ?>"><span id="elh_sys_days_Days"><?php echo $sys_days->Days->caption() ?></span></td>
		<td data-name="Days"<?php echo $sys_days->Days->cellAttributes() ?>>
<span id="el_sys_days_Days">
<span<?php echo $sys_days->Days->viewAttributes() ?>>
<?php echo $sys_days->Days->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$sys_days_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$sys_days->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$sys_days_view->terminate();
?>