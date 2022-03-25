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
$view_appointment_scheduler_view = new view_appointment_scheduler_view();

// Run the page
$view_appointment_scheduler_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_appointment_scheduler_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_appointment_scheduler->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fview_appointment_schedulerview = currentForm = new ew.Form("fview_appointment_schedulerview", "view");

// Form_CustomValidate event
fview_appointment_schedulerview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_appointment_schedulerview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_appointment_schedulerview.lists["x_Referal"] = <?php echo $view_appointment_scheduler_view->Referal->Lookup->toClientList() ?>;
fview_appointment_schedulerview.lists["x_Referal"].options = <?php echo JsonEncode($view_appointment_scheduler_view->Referal->lookupOptions()) ?>;
fview_appointment_schedulerview.autoSuggests["x_Referal"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fview_appointment_schedulerview.lists["x_DoctorName"] = <?php echo $view_appointment_scheduler_view->DoctorName->Lookup->toClientList() ?>;
fview_appointment_schedulerview.lists["x_DoctorName"].options = <?php echo JsonEncode($view_appointment_scheduler_view->DoctorName->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$view_appointment_scheduler->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $view_appointment_scheduler_view->ExportOptions->render("body") ?>
<?php $view_appointment_scheduler_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $view_appointment_scheduler_view->showPageHeader(); ?>
<?php
$view_appointment_scheduler_view->showMessage();
?>
<form name="fview_appointment_schedulerview" id="fview_appointment_schedulerview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_appointment_scheduler_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_appointment_scheduler_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_appointment_scheduler">
<input type="hidden" name="modal" value="<?php echo (int)$view_appointment_scheduler_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($view_appointment_scheduler->patientID->Visible) { // patientID ?>
	<tr id="r_patientID">
		<td class="<?php echo $view_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh_view_appointment_scheduler_patientID"><?php echo $view_appointment_scheduler->patientID->caption() ?></span></td>
		<td data-name="patientID"<?php echo $view_appointment_scheduler->patientID->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_patientID">
<span<?php echo $view_appointment_scheduler->patientID->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->patientID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_appointment_scheduler->patientName->Visible) { // patientName ?>
	<tr id="r_patientName">
		<td class="<?php echo $view_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh_view_appointment_scheduler_patientName"><?php echo $view_appointment_scheduler->patientName->caption() ?></span></td>
		<td data-name="patientName"<?php echo $view_appointment_scheduler->patientName->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_patientName">
<span<?php echo $view_appointment_scheduler->patientName->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->patientName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_appointment_scheduler->MobileNumber->Visible) { // MobileNumber ?>
	<tr id="r_MobileNumber">
		<td class="<?php echo $view_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh_view_appointment_scheduler_MobileNumber"><?php echo $view_appointment_scheduler->MobileNumber->caption() ?></span></td>
		<td data-name="MobileNumber"<?php echo $view_appointment_scheduler->MobileNumber->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_MobileNumber">
<span<?php echo $view_appointment_scheduler->MobileNumber->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->MobileNumber->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_appointment_scheduler->start_time->Visible) { // start_time ?>
	<tr id="r_start_time">
		<td class="<?php echo $view_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh_view_appointment_scheduler_start_time"><?php echo $view_appointment_scheduler->start_time->caption() ?></span></td>
		<td data-name="start_time"<?php echo $view_appointment_scheduler->start_time->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_start_time">
<span<?php echo $view_appointment_scheduler->start_time->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->start_time->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_appointment_scheduler->Purpose->Visible) { // Purpose ?>
	<tr id="r_Purpose">
		<td class="<?php echo $view_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh_view_appointment_scheduler_Purpose"><?php echo $view_appointment_scheduler->Purpose->caption() ?></span></td>
		<td data-name="Purpose"<?php echo $view_appointment_scheduler->Purpose->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_Purpose">
<span<?php echo $view_appointment_scheduler->Purpose->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->Purpose->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_appointment_scheduler->patienttype->Visible) { // patienttype ?>
	<tr id="r_patienttype">
		<td class="<?php echo $view_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh_view_appointment_scheduler_patienttype"><?php echo $view_appointment_scheduler->patienttype->caption() ?></span></td>
		<td data-name="patienttype"<?php echo $view_appointment_scheduler->patienttype->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_patienttype">
<span<?php echo $view_appointment_scheduler->patienttype->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->patienttype->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_appointment_scheduler->Referal->Visible) { // Referal ?>
	<tr id="r_Referal">
		<td class="<?php echo $view_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh_view_appointment_scheduler_Referal"><?php echo $view_appointment_scheduler->Referal->caption() ?></span></td>
		<td data-name="Referal"<?php echo $view_appointment_scheduler->Referal->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_Referal">
<span<?php echo $view_appointment_scheduler->Referal->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->Referal->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_appointment_scheduler->start_date->Visible) { // start_date ?>
	<tr id="r_start_date">
		<td class="<?php echo $view_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh_view_appointment_scheduler_start_date"><?php echo $view_appointment_scheduler->start_date->caption() ?></span></td>
		<td data-name="start_date"<?php echo $view_appointment_scheduler->start_date->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_start_date">
<span<?php echo $view_appointment_scheduler->start_date->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->start_date->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_appointment_scheduler->DoctorName->Visible) { // DoctorName ?>
	<tr id="r_DoctorName">
		<td class="<?php echo $view_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh_view_appointment_scheduler_DoctorName"><?php echo $view_appointment_scheduler->DoctorName->caption() ?></span></td>
		<td data-name="DoctorName"<?php echo $view_appointment_scheduler->DoctorName->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_DoctorName">
<span<?php echo $view_appointment_scheduler->DoctorName->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->DoctorName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_appointment_scheduler->Id->Visible) { // Id ?>
	<tr id="r_Id">
		<td class="<?php echo $view_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh_view_appointment_scheduler_Id"><?php echo $view_appointment_scheduler->Id->caption() ?></span></td>
		<td data-name="Id"<?php echo $view_appointment_scheduler->Id->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_Id">
<span<?php echo $view_appointment_scheduler->Id->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->Id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_appointment_scheduler->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $view_appointment_scheduler_view->TableLeftColumnClass ?>"><span id="elh_view_appointment_scheduler_HospID"><?php echo $view_appointment_scheduler->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $view_appointment_scheduler->HospID->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_HospID">
<span<?php echo $view_appointment_scheduler->HospID->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$view_appointment_scheduler_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_appointment_scheduler->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_appointment_scheduler_view->terminate();
?>