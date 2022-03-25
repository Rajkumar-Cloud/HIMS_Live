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
<?php include_once "header.php"; ?>
<?php if (!$appointment_patienttypee_view->isExport()) { ?>
<script>
var fappointment_patienttypeeview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fappointment_patienttypeeview = currentForm = new ew.Form("fappointment_patienttypeeview", "view");
	loadjs.done("fappointment_patienttypeeview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$appointment_patienttypee_view->isExport()) { ?>
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
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="appointment_patienttypee">
<input type="hidden" name="modal" value="<?php echo (int)$appointment_patienttypee_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($appointment_patienttypee_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $appointment_patienttypee_view->TableLeftColumnClass ?>"><span id="elh_appointment_patienttypee_id"><?php echo $appointment_patienttypee_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $appointment_patienttypee_view->id->cellAttributes() ?>>
<span id="el_appointment_patienttypee_id">
<span<?php echo $appointment_patienttypee_view->id->viewAttributes() ?>><?php echo $appointment_patienttypee_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($appointment_patienttypee_view->Name->Visible) { // Name ?>
	<tr id="r_Name">
		<td class="<?php echo $appointment_patienttypee_view->TableLeftColumnClass ?>"><span id="elh_appointment_patienttypee_Name"><?php echo $appointment_patienttypee_view->Name->caption() ?></span></td>
		<td data-name="Name" <?php echo $appointment_patienttypee_view->Name->cellAttributes() ?>>
<span id="el_appointment_patienttypee_Name">
<span<?php echo $appointment_patienttypee_view->Name->viewAttributes() ?>><?php echo $appointment_patienttypee_view->Name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($appointment_patienttypee_view->Type->Visible) { // Type ?>
	<tr id="r_Type">
		<td class="<?php echo $appointment_patienttypee_view->TableLeftColumnClass ?>"><span id="elh_appointment_patienttypee_Type"><?php echo $appointment_patienttypee_view->Type->caption() ?></span></td>
		<td data-name="Type" <?php echo $appointment_patienttypee_view->Type->cellAttributes() ?>>
<span id="el_appointment_patienttypee_Type">
<span<?php echo $appointment_patienttypee_view->Type->viewAttributes() ?>><?php echo $appointment_patienttypee_view->Type->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$appointment_patienttypee_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$appointment_patienttypee_view->isExport()) { ?>
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
$appointment_patienttypee_view->terminate();
?>