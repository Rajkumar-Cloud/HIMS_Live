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
$appointment_patienttypee_view = new appointment_patienttypee_view();

// Run the page
$appointment_patienttypee_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$appointment_patienttypee_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$appointment_patienttypee->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fappointment_patienttypeeview = currentForm = new ew.Form("fappointment_patienttypeeview", "view");

// Form_CustomValidate event
fappointment_patienttypeeview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fappointment_patienttypeeview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fappointment_patienttypeeview.lists["x_Type"] = <?php echo $appointment_patienttypee_view->Type->Lookup->toClientList() ?>;
fappointment_patienttypeeview.lists["x_Type"].options = <?php echo JsonEncode($appointment_patienttypee_view->Type->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$appointment_patienttypee->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $appointment_patienttypee_view->ExportOptions->render("body") ?>
<?php $appointment_patienttypee_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $appointment_patienttypee_view->showPageHeader(); ?>
<?php
$appointment_patienttypee_view->showMessage();
?>
<form name="fappointment_patienttypeeview" id="fappointment_patienttypeeview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($appointment_patienttypee_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $appointment_patienttypee_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="appointment_patienttypee">
<input type="hidden" name="modal" value="<?php echo (int)$appointment_patienttypee_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($appointment_patienttypee->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $appointment_patienttypee_view->TableLeftColumnClass ?>"><span id="elh_appointment_patienttypee_id"><?php echo $appointment_patienttypee->id->caption() ?></span></td>
		<td data-name="id"<?php echo $appointment_patienttypee->id->cellAttributes() ?>>
<span id="el_appointment_patienttypee_id">
<span<?php echo $appointment_patienttypee->id->viewAttributes() ?>>
<?php echo $appointment_patienttypee->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($appointment_patienttypee->Name->Visible) { // Name ?>
	<tr id="r_Name">
		<td class="<?php echo $appointment_patienttypee_view->TableLeftColumnClass ?>"><span id="elh_appointment_patienttypee_Name"><?php echo $appointment_patienttypee->Name->caption() ?></span></td>
		<td data-name="Name"<?php echo $appointment_patienttypee->Name->cellAttributes() ?>>
<span id="el_appointment_patienttypee_Name">
<span<?php echo $appointment_patienttypee->Name->viewAttributes() ?>>
<?php echo $appointment_patienttypee->Name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($appointment_patienttypee->Type->Visible) { // Type ?>
	<tr id="r_Type">
		<td class="<?php echo $appointment_patienttypee_view->TableLeftColumnClass ?>"><span id="elh_appointment_patienttypee_Type"><?php echo $appointment_patienttypee->Type->caption() ?></span></td>
		<td data-name="Type"<?php echo $appointment_patienttypee->Type->cellAttributes() ?>>
<span id="el_appointment_patienttypee_Type">
<span<?php echo $appointment_patienttypee->Type->viewAttributes() ?>>
<?php echo $appointment_patienttypee->Type->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$appointment_patienttypee_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$appointment_patienttypee->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$appointment_patienttypee_view->terminate();
?>