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
<?php include_once "header.php"; ?>
<?php if (!$appointment_reminder_view->isExport()) { ?>
<script>
var fappointment_reminderview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fappointment_reminderview = currentForm = new ew.Form("fappointment_reminderview", "view");
	loadjs.done("fappointment_reminderview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$appointment_reminder_view->isExport()) { ?>
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
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="appointment_reminder">
<input type="hidden" name="modal" value="<?php echo (int)$appointment_reminder_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($appointment_reminder_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $appointment_reminder_view->TableLeftColumnClass ?>"><span id="elh_appointment_reminder_id"><?php echo $appointment_reminder_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $appointment_reminder_view->id->cellAttributes() ?>>
<span id="el_appointment_reminder_id">
<span<?php echo $appointment_reminder_view->id->viewAttributes() ?>><?php echo $appointment_reminder_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($appointment_reminder_view->reminder->Visible) { // reminder ?>
	<tr id="r_reminder">
		<td class="<?php echo $appointment_reminder_view->TableLeftColumnClass ?>"><span id="elh_appointment_reminder_reminder"><?php echo $appointment_reminder_view->reminder->caption() ?></span></td>
		<td data-name="reminder" <?php echo $appointment_reminder_view->reminder->cellAttributes() ?>>
<span id="el_appointment_reminder_reminder">
<span<?php echo $appointment_reminder_view->reminder->viewAttributes() ?>><?php echo $appointment_reminder_view->reminder->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($appointment_reminder_view->Drid->Visible) { // Drid ?>
	<tr id="r_Drid">
		<td class="<?php echo $appointment_reminder_view->TableLeftColumnClass ?>"><span id="elh_appointment_reminder_Drid"><?php echo $appointment_reminder_view->Drid->caption() ?></span></td>
		<td data-name="Drid" <?php echo $appointment_reminder_view->Drid->cellAttributes() ?>>
<span id="el_appointment_reminder_Drid">
<span<?php echo $appointment_reminder_view->Drid->viewAttributes() ?>><?php echo $appointment_reminder_view->Drid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($appointment_reminder_view->DrName->Visible) { // DrName ?>
	<tr id="r_DrName">
		<td class="<?php echo $appointment_reminder_view->TableLeftColumnClass ?>"><span id="elh_appointment_reminder_DrName"><?php echo $appointment_reminder_view->DrName->caption() ?></span></td>
		<td data-name="DrName" <?php echo $appointment_reminder_view->DrName->cellAttributes() ?>>
<span id="el_appointment_reminder_DrName">
<span<?php echo $appointment_reminder_view->DrName->viewAttributes() ?>><?php echo $appointment_reminder_view->DrName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($appointment_reminder_view->Duration->Visible) { // Duration ?>
	<tr id="r_Duration">
		<td class="<?php echo $appointment_reminder_view->TableLeftColumnClass ?>"><span id="elh_appointment_reminder_Duration"><?php echo $appointment_reminder_view->Duration->caption() ?></span></td>
		<td data-name="Duration" <?php echo $appointment_reminder_view->Duration->cellAttributes() ?>>
<span id="el_appointment_reminder_Duration">
<span<?php echo $appointment_reminder_view->Duration->viewAttributes() ?>><?php echo $appointment_reminder_view->Duration->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($appointment_reminder_view->Date->Visible) { // Date ?>
	<tr id="r_Date">
		<td class="<?php echo $appointment_reminder_view->TableLeftColumnClass ?>"><span id="elh_appointment_reminder_Date"><?php echo $appointment_reminder_view->Date->caption() ?></span></td>
		<td data-name="Date" <?php echo $appointment_reminder_view->Date->cellAttributes() ?>>
<span id="el_appointment_reminder_Date">
<span<?php echo $appointment_reminder_view->Date->viewAttributes() ?>><?php echo $appointment_reminder_view->Date->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($appointment_reminder_view->SMSSend->Visible) { // SMSSend ?>
	<tr id="r_SMSSend">
		<td class="<?php echo $appointment_reminder_view->TableLeftColumnClass ?>"><span id="elh_appointment_reminder_SMSSend"><?php echo $appointment_reminder_view->SMSSend->caption() ?></span></td>
		<td data-name="SMSSend" <?php echo $appointment_reminder_view->SMSSend->cellAttributes() ?>>
<span id="el_appointment_reminder_SMSSend">
<span<?php echo $appointment_reminder_view->SMSSend->viewAttributes() ?>><?php echo $appointment_reminder_view->SMSSend->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($appointment_reminder_view->EmailSend->Visible) { // EmailSend ?>
	<tr id="r_EmailSend">
		<td class="<?php echo $appointment_reminder_view->TableLeftColumnClass ?>"><span id="elh_appointment_reminder_EmailSend"><?php echo $appointment_reminder_view->EmailSend->caption() ?></span></td>
		<td data-name="EmailSend" <?php echo $appointment_reminder_view->EmailSend->cellAttributes() ?>>
<span id="el_appointment_reminder_EmailSend">
<span<?php echo $appointment_reminder_view->EmailSend->viewAttributes() ?>><?php echo $appointment_reminder_view->EmailSend->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$appointment_reminder_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$appointment_reminder_view->isExport()) { ?>
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
$appointment_reminder_view->terminate();
?>