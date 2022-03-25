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
$hr_immigrationstatus_view = new hr_immigrationstatus_view();

// Run the page
$hr_immigrationstatus_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_immigrationstatus_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$hr_immigrationstatus->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fhr_immigrationstatusview = currentForm = new ew.Form("fhr_immigrationstatusview", "view");

// Form_CustomValidate event
fhr_immigrationstatusview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_immigrationstatusview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$hr_immigrationstatus->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $hr_immigrationstatus_view->ExportOptions->render("body") ?>
<?php $hr_immigrationstatus_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $hr_immigrationstatus_view->showPageHeader(); ?>
<?php
$hr_immigrationstatus_view->showMessage();
?>
<form name="fhr_immigrationstatusview" id="fhr_immigrationstatusview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_immigrationstatus_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_immigrationstatus_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_immigrationstatus">
<input type="hidden" name="modal" value="<?php echo (int)$hr_immigrationstatus_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($hr_immigrationstatus->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $hr_immigrationstatus_view->TableLeftColumnClass ?>"><span id="elh_hr_immigrationstatus_id"><?php echo $hr_immigrationstatus->id->caption() ?></span></td>
		<td data-name="id"<?php echo $hr_immigrationstatus->id->cellAttributes() ?>>
<span id="el_hr_immigrationstatus_id">
<span<?php echo $hr_immigrationstatus->id->viewAttributes() ?>>
<?php echo $hr_immigrationstatus->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_immigrationstatus->name->Visible) { // name ?>
	<tr id="r_name">
		<td class="<?php echo $hr_immigrationstatus_view->TableLeftColumnClass ?>"><span id="elh_hr_immigrationstatus_name"><?php echo $hr_immigrationstatus->name->caption() ?></span></td>
		<td data-name="name"<?php echo $hr_immigrationstatus->name->cellAttributes() ?>>
<span id="el_hr_immigrationstatus_name">
<span<?php echo $hr_immigrationstatus->name->viewAttributes() ?>>
<?php echo $hr_immigrationstatus->name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($hr_immigrationstatus->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $hr_immigrationstatus_view->TableLeftColumnClass ?>"><span id="elh_hr_immigrationstatus_HospID"><?php echo $hr_immigrationstatus->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $hr_immigrationstatus->HospID->cellAttributes() ?>>
<span id="el_hr_immigrationstatus_HospID">
<span<?php echo $hr_immigrationstatus->HospID->viewAttributes() ?>>
<?php echo $hr_immigrationstatus->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$hr_immigrationstatus_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$hr_immigrationstatus->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$hr_immigrationstatus_view->terminate();
?>