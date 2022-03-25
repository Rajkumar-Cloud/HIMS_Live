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
$view_appointment_scheduler_new_view = new view_appointment_scheduler_new_view();

// Run the page
$view_appointment_scheduler_new_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_appointment_scheduler_new_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_appointment_scheduler_new->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fview_appointment_scheduler_newview = currentForm = new ew.Form("fview_appointment_scheduler_newview", "view");

// Form_CustomValidate event
fview_appointment_scheduler_newview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_appointment_scheduler_newview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_appointment_scheduler_newview.lists["x_Referal"] = <?php echo $view_appointment_scheduler_new_view->Referal->Lookup->toClientList() ?>;
fview_appointment_scheduler_newview.lists["x_Referal"].options = <?php echo JsonEncode($view_appointment_scheduler_new_view->Referal->lookupOptions()) ?>;
fview_appointment_scheduler_newview.autoSuggests["x_Referal"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fview_appointment_scheduler_newview.lists["x_DoctorName"] = <?php echo $view_appointment_scheduler_new_view->DoctorName->Lookup->toClientList() ?>;
fview_appointment_scheduler_newview.lists["x_DoctorName"].options = <?php echo JsonEncode($view_appointment_scheduler_new_view->DoctorName->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$view_appointment_scheduler_new->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $view_appointment_scheduler_new_view->ExportOptions->render("body") ?>
<?php $view_appointment_scheduler_new_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $view_appointment_scheduler_new_view->showPageHeader(); ?>
<?php
$view_appointment_scheduler_new_view->showMessage();
?>
<form name="fview_appointment_scheduler_newview" id="fview_appointment_scheduler_newview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_appointment_scheduler_new_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_appointment_scheduler_new_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_appointment_scheduler_new">
<input type="hidden" name="modal" value="<?php echo (int)$view_appointment_scheduler_new_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($view_appointment_scheduler_new->patientID->Visible) { // patientID ?>
	<tr id="r_patientID">
		<td class="<?php echo $view_appointment_scheduler_new_view->TableLeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_patientID"><?php echo $view_appointment_scheduler_new->patientID->caption() ?></span></td>
		<td data-name="patientID"<?php echo $view_appointment_scheduler_new->patientID->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_patientID">
<span<?php echo $view_appointment_scheduler_new->patientID->viewAttributes() ?>>
<?php echo $view_appointment_scheduler_new->patientID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_appointment_scheduler_new->patientName->Visible) { // patientName ?>
	<tr id="r_patientName">
		<td class="<?php echo $view_appointment_scheduler_new_view->TableLeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_patientName"><?php echo $view_appointment_scheduler_new->patientName->caption() ?></span></td>
		<td data-name="patientName"<?php echo $view_appointment_scheduler_new->patientName->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_patientName">
<span<?php echo $view_appointment_scheduler_new->patientName->viewAttributes() ?>>
<?php echo $view_appointment_scheduler_new->patientName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_appointment_scheduler_new->MobileNumber->Visible) { // MobileNumber ?>
	<tr id="r_MobileNumber">
		<td class="<?php echo $view_appointment_scheduler_new_view->TableLeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_MobileNumber"><?php echo $view_appointment_scheduler_new->MobileNumber->caption() ?></span></td>
		<td data-name="MobileNumber"<?php echo $view_appointment_scheduler_new->MobileNumber->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_MobileNumber">
<span<?php echo $view_appointment_scheduler_new->MobileNumber->viewAttributes() ?>>
<?php echo $view_appointment_scheduler_new->MobileNumber->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_appointment_scheduler_new->start_time->Visible) { // start_time ?>
	<tr id="r_start_time">
		<td class="<?php echo $view_appointment_scheduler_new_view->TableLeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_start_time"><?php echo $view_appointment_scheduler_new->start_time->caption() ?></span></td>
		<td data-name="start_time"<?php echo $view_appointment_scheduler_new->start_time->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_start_time">
<span<?php echo $view_appointment_scheduler_new->start_time->viewAttributes() ?>>
<?php echo $view_appointment_scheduler_new->start_time->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_appointment_scheduler_new->Purpose->Visible) { // Purpose ?>
	<tr id="r_Purpose">
		<td class="<?php echo $view_appointment_scheduler_new_view->TableLeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_Purpose"><?php echo $view_appointment_scheduler_new->Purpose->caption() ?></span></td>
		<td data-name="Purpose"<?php echo $view_appointment_scheduler_new->Purpose->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_Purpose">
<span<?php echo $view_appointment_scheduler_new->Purpose->viewAttributes() ?>>
<?php echo $view_appointment_scheduler_new->Purpose->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_appointment_scheduler_new->patienttype->Visible) { // patienttype ?>
	<tr id="r_patienttype">
		<td class="<?php echo $view_appointment_scheduler_new_view->TableLeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_patienttype"><?php echo $view_appointment_scheduler_new->patienttype->caption() ?></span></td>
		<td data-name="patienttype"<?php echo $view_appointment_scheduler_new->patienttype->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_patienttype">
<span<?php echo $view_appointment_scheduler_new->patienttype->viewAttributes() ?>>
<?php echo $view_appointment_scheduler_new->patienttype->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_appointment_scheduler_new->Referal->Visible) { // Referal ?>
	<tr id="r_Referal">
		<td class="<?php echo $view_appointment_scheduler_new_view->TableLeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_Referal"><?php echo $view_appointment_scheduler_new->Referal->caption() ?></span></td>
		<td data-name="Referal"<?php echo $view_appointment_scheduler_new->Referal->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_Referal">
<span<?php echo $view_appointment_scheduler_new->Referal->viewAttributes() ?>>
<?php echo $view_appointment_scheduler_new->Referal->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_appointment_scheduler_new->start_date->Visible) { // start_date ?>
	<tr id="r_start_date">
		<td class="<?php echo $view_appointment_scheduler_new_view->TableLeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_start_date"><?php echo $view_appointment_scheduler_new->start_date->caption() ?></span></td>
		<td data-name="start_date"<?php echo $view_appointment_scheduler_new->start_date->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_start_date">
<span<?php echo $view_appointment_scheduler_new->start_date->viewAttributes() ?>>
<?php echo $view_appointment_scheduler_new->start_date->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_appointment_scheduler_new->DoctorName->Visible) { // DoctorName ?>
	<tr id="r_DoctorName">
		<td class="<?php echo $view_appointment_scheduler_new_view->TableLeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_DoctorName"><?php echo $view_appointment_scheduler_new->DoctorName->caption() ?></span></td>
		<td data-name="DoctorName"<?php echo $view_appointment_scheduler_new->DoctorName->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_DoctorName">
<span<?php echo $view_appointment_scheduler_new->DoctorName->viewAttributes() ?>>
<?php echo $view_appointment_scheduler_new->DoctorName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_appointment_scheduler_new->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $view_appointment_scheduler_new_view->TableLeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_HospID"><?php echo $view_appointment_scheduler_new->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $view_appointment_scheduler_new->HospID->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_HospID">
<span<?php echo $view_appointment_scheduler_new->HospID->viewAttributes() ?>>
<?php echo $view_appointment_scheduler_new->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_appointment_scheduler_new->Id->Visible) { // Id ?>
	<tr id="r_Id">
		<td class="<?php echo $view_appointment_scheduler_new_view->TableLeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_Id"><?php echo $view_appointment_scheduler_new->Id->caption() ?></span></td>
		<td data-name="Id"<?php echo $view_appointment_scheduler_new->Id->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_Id">
<span<?php echo $view_appointment_scheduler_new->Id->viewAttributes() ?>>
<?php echo $view_appointment_scheduler_new->Id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_appointment_scheduler_new->PatientTypee->Visible) { // PatientTypee ?>
	<tr id="r_PatientTypee">
		<td class="<?php echo $view_appointment_scheduler_new_view->TableLeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_PatientTypee"><?php echo $view_appointment_scheduler_new->PatientTypee->caption() ?></span></td>
		<td data-name="PatientTypee"<?php echo $view_appointment_scheduler_new->PatientTypee->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_PatientTypee">
<span<?php echo $view_appointment_scheduler_new->PatientTypee->viewAttributes() ?>>
<?php echo $view_appointment_scheduler_new->PatientTypee->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_appointment_scheduler_new->Notes->Visible) { // Notes ?>
	<tr id="r_Notes">
		<td class="<?php echo $view_appointment_scheduler_new_view->TableLeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_Notes"><?php echo $view_appointment_scheduler_new->Notes->caption() ?></span></td>
		<td data-name="Notes"<?php echo $view_appointment_scheduler_new->Notes->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_Notes">
<span<?php echo $view_appointment_scheduler_new->Notes->viewAttributes() ?>>
<?php echo $view_appointment_scheduler_new->Notes->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$view_appointment_scheduler_new_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_appointment_scheduler_new->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_appointment_scheduler_new_view->terminate();
?>