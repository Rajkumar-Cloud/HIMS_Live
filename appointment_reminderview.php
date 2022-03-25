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
$appointment_reminder_view = new appointment_reminder_view();

// Run the page
$appointment_reminder_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$appointment_reminder_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$appointment_reminder->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fappointment_reminderview = currentForm = new ew.Form("fappointment_reminderview", "view");

// Form_CustomValidate event
fappointment_reminderview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fappointment_reminderview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$appointment_reminder->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $appointment_reminder_view->ExportOptions->render("body") ?>
<?php $appointment_reminder_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $appointment_reminder_view->showPageHeader(); ?>
<?php
$appointment_reminder_view->showMessage();
?>
<form name="fappointment_reminderview" id="fappointment_reminderview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($appointment_reminder_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $appointment_reminder_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="appointment_reminder">
<input type="hidden" name="modal" value="<?php echo (int)$appointment_reminder_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($appointment_reminder->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $appointment_reminder_view->TableLeftColumnClass ?>"><span id="elh_appointment_reminder_id"><?php echo $appointment_reminder->id->caption() ?></span></td>
		<td data-name="id"<?php echo $appointment_reminder->id->cellAttributes() ?>>
<span id="el_appointment_reminder_id">
<span<?php echo $appointment_reminder->id->viewAttributes() ?>>
<?php echo $appointment_reminder->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($appointment_reminder->reminder->Visible) { // reminder ?>
	<tr id="r_reminder">
		<td class="<?php echo $appointment_reminder_view->TableLeftColumnClass ?>"><span id="elh_appointment_reminder_reminder"><?php echo $appointment_reminder->reminder->caption() ?></span></td>
		<td data-name="reminder"<?php echo $appointment_reminder->reminder->cellAttributes() ?>>
<span id="el_appointment_reminder_reminder">
<span<?php echo $appointment_reminder->reminder->viewAttributes() ?>>
<?php echo $appointment_reminder->reminder->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($appointment_reminder->Drid->Visible) { // Drid ?>
	<tr id="r_Drid">
		<td class="<?php echo $appointment_reminder_view->TableLeftColumnClass ?>"><span id="elh_appointment_reminder_Drid"><?php echo $appointment_reminder->Drid->caption() ?></span></td>
		<td data-name="Drid"<?php echo $appointment_reminder->Drid->cellAttributes() ?>>
<span id="el_appointment_reminder_Drid">
<span<?php echo $appointment_reminder->Drid->viewAttributes() ?>>
<?php echo $appointment_reminder->Drid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($appointment_reminder->DrName->Visible) { // DrName ?>
	<tr id="r_DrName">
		<td class="<?php echo $appointment_reminder_view->TableLeftColumnClass ?>"><span id="elh_appointment_reminder_DrName"><?php echo $appointment_reminder->DrName->caption() ?></span></td>
		<td data-name="DrName"<?php echo $appointment_reminder->DrName->cellAttributes() ?>>
<span id="el_appointment_reminder_DrName">
<span<?php echo $appointment_reminder->DrName->viewAttributes() ?>>
<?php echo $appointment_reminder->DrName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($appointment_reminder->Duration->Visible) { // Duration ?>
	<tr id="r_Duration">
		<td class="<?php echo $appointment_reminder_view->TableLeftColumnClass ?>"><span id="elh_appointment_reminder_Duration"><?php echo $appointment_reminder->Duration->caption() ?></span></td>
		<td data-name="Duration"<?php echo $appointment_reminder->Duration->cellAttributes() ?>>
<span id="el_appointment_reminder_Duration">
<span<?php echo $appointment_reminder->Duration->viewAttributes() ?>>
<?php echo $appointment_reminder->Duration->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($appointment_reminder->Date->Visible) { // Date ?>
	<tr id="r_Date">
		<td class="<?php echo $appointment_reminder_view->TableLeftColumnClass ?>"><span id="elh_appointment_reminder_Date"><?php echo $appointment_reminder->Date->caption() ?></span></td>
		<td data-name="Date"<?php echo $appointment_reminder->Date->cellAttributes() ?>>
<span id="el_appointment_reminder_Date">
<span<?php echo $appointment_reminder->Date->viewAttributes() ?>>
<?php echo $appointment_reminder->Date->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($appointment_reminder->SMSSend->Visible) { // SMSSend ?>
	<tr id="r_SMSSend">
		<td class="<?php echo $appointment_reminder_view->TableLeftColumnClass ?>"><span id="elh_appointment_reminder_SMSSend"><?php echo $appointment_reminder->SMSSend->caption() ?></span></td>
		<td data-name="SMSSend"<?php echo $appointment_reminder->SMSSend->cellAttributes() ?>>
<span id="el_appointment_reminder_SMSSend">
<span<?php echo $appointment_reminder->SMSSend->viewAttributes() ?>>
<?php echo $appointment_reminder->SMSSend->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($appointment_reminder->EmailSend->Visible) { // EmailSend ?>
	<tr id="r_EmailSend">
		<td class="<?php echo $appointment_reminder_view->TableLeftColumnClass ?>"><span id="elh_appointment_reminder_EmailSend"><?php echo $appointment_reminder->EmailSend->caption() ?></span></td>
		<td data-name="EmailSend"<?php echo $appointment_reminder->EmailSend->cellAttributes() ?>>
<span id="el_appointment_reminder_EmailSend">
<span<?php echo $appointment_reminder->EmailSend->viewAttributes() ?>>
<?php echo $appointment_reminder->EmailSend->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$appointment_reminder_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$appointment_reminder->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$appointment_reminder_view->terminate();
?>