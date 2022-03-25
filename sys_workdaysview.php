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
$sys_workdays_view = new sys_workdays_view();

// Run the page
$sys_workdays_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sys_workdays_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$sys_workdays->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fsys_workdaysview = currentForm = new ew.Form("fsys_workdaysview", "view");

// Form_CustomValidate event
fsys_workdaysview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsys_workdaysview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fsys_workdaysview.lists["x_status"] = <?php echo $sys_workdays_view->status->Lookup->toClientList() ?>;
fsys_workdaysview.lists["x_status"].options = <?php echo JsonEncode($sys_workdays_view->status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$sys_workdays->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $sys_workdays_view->ExportOptions->render("body") ?>
<?php $sys_workdays_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $sys_workdays_view->showPageHeader(); ?>
<?php
$sys_workdays_view->showMessage();
?>
<form name="fsys_workdaysview" id="fsys_workdaysview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($sys_workdays_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $sys_workdays_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sys_workdays">
<input type="hidden" name="modal" value="<?php echo (int)$sys_workdays_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($sys_workdays->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $sys_workdays_view->TableLeftColumnClass ?>"><span id="elh_sys_workdays_id"><?php echo $sys_workdays->id->caption() ?></span></td>
		<td data-name="id"<?php echo $sys_workdays->id->cellAttributes() ?>>
<span id="el_sys_workdays_id">
<span<?php echo $sys_workdays->id->viewAttributes() ?>>
<?php echo $sys_workdays->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sys_workdays->name->Visible) { // name ?>
	<tr id="r_name">
		<td class="<?php echo $sys_workdays_view->TableLeftColumnClass ?>"><span id="elh_sys_workdays_name"><?php echo $sys_workdays->name->caption() ?></span></td>
		<td data-name="name"<?php echo $sys_workdays->name->cellAttributes() ?>>
<span id="el_sys_workdays_name">
<span<?php echo $sys_workdays->name->viewAttributes() ?>>
<?php echo $sys_workdays->name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sys_workdays->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $sys_workdays_view->TableLeftColumnClass ?>"><span id="elh_sys_workdays_status"><?php echo $sys_workdays->status->caption() ?></span></td>
		<td data-name="status"<?php echo $sys_workdays->status->cellAttributes() ?>>
<span id="el_sys_workdays_status">
<span<?php echo $sys_workdays->status->viewAttributes() ?>>
<?php echo $sys_workdays->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sys_workdays->country->Visible) { // country ?>
	<tr id="r_country">
		<td class="<?php echo $sys_workdays_view->TableLeftColumnClass ?>"><span id="elh_sys_workdays_country"><?php echo $sys_workdays->country->caption() ?></span></td>
		<td data-name="country"<?php echo $sys_workdays->country->cellAttributes() ?>>
<span id="el_sys_workdays_country">
<span<?php echo $sys_workdays->country->viewAttributes() ?>>
<?php echo $sys_workdays->country->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sys_workdays->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $sys_workdays_view->TableLeftColumnClass ?>"><span id="elh_sys_workdays_HospID"><?php echo $sys_workdays->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $sys_workdays->HospID->cellAttributes() ?>>
<span id="el_sys_workdays_HospID">
<span<?php echo $sys_workdays->HospID->viewAttributes() ?>>
<?php echo $sys_workdays->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$sys_workdays_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$sys_workdays->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$sys_workdays_view->terminate();
?>