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
$sys_timezones_view = new sys_timezones_view();

// Run the page
$sys_timezones_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sys_timezones_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$sys_timezones->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fsys_timezonesview = currentForm = new ew.Form("fsys_timezonesview", "view");

// Form_CustomValidate event
fsys_timezonesview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsys_timezonesview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$sys_timezones->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $sys_timezones_view->ExportOptions->render("body") ?>
<?php $sys_timezones_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $sys_timezones_view->showPageHeader(); ?>
<?php
$sys_timezones_view->showMessage();
?>
<form name="fsys_timezonesview" id="fsys_timezonesview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($sys_timezones_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $sys_timezones_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sys_timezones">
<input type="hidden" name="modal" value="<?php echo (int)$sys_timezones_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($sys_timezones->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $sys_timezones_view->TableLeftColumnClass ?>"><span id="elh_sys_timezones_id"><?php echo $sys_timezones->id->caption() ?></span></td>
		<td data-name="id"<?php echo $sys_timezones->id->cellAttributes() ?>>
<span id="el_sys_timezones_id">
<span<?php echo $sys_timezones->id->viewAttributes() ?>>
<?php echo $sys_timezones->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sys_timezones->name->Visible) { // name ?>
	<tr id="r_name">
		<td class="<?php echo $sys_timezones_view->TableLeftColumnClass ?>"><span id="elh_sys_timezones_name"><?php echo $sys_timezones->name->caption() ?></span></td>
		<td data-name="name"<?php echo $sys_timezones->name->cellAttributes() ?>>
<span id="el_sys_timezones_name">
<span<?php echo $sys_timezones->name->viewAttributes() ?>>
<?php echo $sys_timezones->name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sys_timezones->details->Visible) { // details ?>
	<tr id="r_details">
		<td class="<?php echo $sys_timezones_view->TableLeftColumnClass ?>"><span id="elh_sys_timezones_details"><?php echo $sys_timezones->details->caption() ?></span></td>
		<td data-name="details"<?php echo $sys_timezones->details->cellAttributes() ?>>
<span id="el_sys_timezones_details">
<span<?php echo $sys_timezones->details->viewAttributes() ?>>
<?php echo $sys_timezones->details->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$sys_timezones_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$sys_timezones->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$sys_timezones_view->terminate();
?>