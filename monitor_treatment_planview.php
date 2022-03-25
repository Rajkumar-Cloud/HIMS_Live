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
$monitor_treatment_plan_view = new monitor_treatment_plan_view();

// Run the page
$monitor_treatment_plan_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$monitor_treatment_plan_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$monitor_treatment_plan->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fmonitor_treatment_planview = currentForm = new ew.Form("fmonitor_treatment_planview", "view");

// Form_CustomValidate event
fmonitor_treatment_planview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmonitor_treatment_planview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fmonitor_treatment_planview.lists["x_PatId"] = <?php echo $monitor_treatment_plan_view->PatId->Lookup->toClientList() ?>;
fmonitor_treatment_planview.lists["x_PatId"].options = <?php echo JsonEncode($monitor_treatment_plan_view->PatId->lookupOptions()) ?>;
fmonitor_treatment_planview.lists["x_NewVisitYesNo[]"] = <?php echo $monitor_treatment_plan_view->NewVisitYesNo->Lookup->toClientList() ?>;
fmonitor_treatment_planview.lists["x_NewVisitYesNo[]"].options = <?php echo JsonEncode($monitor_treatment_plan_view->NewVisitYesNo->options(FALSE, TRUE)) ?>;
fmonitor_treatment_planview.lists["x_Treatment"] = <?php echo $monitor_treatment_plan_view->Treatment->Lookup->toClientList() ?>;
fmonitor_treatment_planview.lists["x_Treatment"].options = <?php echo JsonEncode($monitor_treatment_plan_view->Treatment->options(FALSE, TRUE)) ?>;
fmonitor_treatment_planview.lists["x_IUIDoneYesNo1[]"] = <?php echo $monitor_treatment_plan_view->IUIDoneYesNo1->Lookup->toClientList() ?>;
fmonitor_treatment_planview.lists["x_IUIDoneYesNo1[]"].options = <?php echo JsonEncode($monitor_treatment_plan_view->IUIDoneYesNo1->options(FALSE, TRUE)) ?>;
fmonitor_treatment_planview.lists["x_UPTTestYesNo1[]"] = <?php echo $monitor_treatment_plan_view->UPTTestYesNo1->Lookup->toClientList() ?>;
fmonitor_treatment_planview.lists["x_UPTTestYesNo1[]"].options = <?php echo JsonEncode($monitor_treatment_plan_view->UPTTestYesNo1->options(FALSE, TRUE)) ?>;
fmonitor_treatment_planview.lists["x_IUIDoneYesNo2[]"] = <?php echo $monitor_treatment_plan_view->IUIDoneYesNo2->Lookup->toClientList() ?>;
fmonitor_treatment_planview.lists["x_IUIDoneYesNo2[]"].options = <?php echo JsonEncode($monitor_treatment_plan_view->IUIDoneYesNo2->options(FALSE, TRUE)) ?>;
fmonitor_treatment_planview.lists["x_UPTTestYesNo2[]"] = <?php echo $monitor_treatment_plan_view->UPTTestYesNo2->Lookup->toClientList() ?>;
fmonitor_treatment_planview.lists["x_UPTTestYesNo2[]"].options = <?php echo JsonEncode($monitor_treatment_plan_view->UPTTestYesNo2->options(FALSE, TRUE)) ?>;
fmonitor_treatment_planview.lists["x_IUIDoneYesNo3[]"] = <?php echo $monitor_treatment_plan_view->IUIDoneYesNo3->Lookup->toClientList() ?>;
fmonitor_treatment_planview.lists["x_IUIDoneYesNo3[]"].options = <?php echo JsonEncode($monitor_treatment_plan_view->IUIDoneYesNo3->options(FALSE, TRUE)) ?>;
fmonitor_treatment_planview.lists["x_UPTTestYesNo3[]"] = <?php echo $monitor_treatment_plan_view->UPTTestYesNo3->Lookup->toClientList() ?>;
fmonitor_treatment_planview.lists["x_UPTTestYesNo3[]"].options = <?php echo JsonEncode($monitor_treatment_plan_view->UPTTestYesNo3->options(FALSE, TRUE)) ?>;
fmonitor_treatment_planview.lists["x_IUIDoneYesNo4[]"] = <?php echo $monitor_treatment_plan_view->IUIDoneYesNo4->Lookup->toClientList() ?>;
fmonitor_treatment_planview.lists["x_IUIDoneYesNo4[]"].options = <?php echo JsonEncode($monitor_treatment_plan_view->IUIDoneYesNo4->options(FALSE, TRUE)) ?>;
fmonitor_treatment_planview.lists["x_UPTTestYesNo4[]"] = <?php echo $monitor_treatment_plan_view->UPTTestYesNo4->Lookup->toClientList() ?>;
fmonitor_treatment_planview.lists["x_UPTTestYesNo4[]"].options = <?php echo JsonEncode($monitor_treatment_plan_view->UPTTestYesNo4->options(FALSE, TRUE)) ?>;
fmonitor_treatment_planview.lists["x_IVFStimulationYesNo[]"] = <?php echo $monitor_treatment_plan_view->IVFStimulationYesNo->Lookup->toClientList() ?>;
fmonitor_treatment_planview.lists["x_IVFStimulationYesNo[]"].options = <?php echo JsonEncode($monitor_treatment_plan_view->IVFStimulationYesNo->options(FALSE, TRUE)) ?>;
fmonitor_treatment_planview.lists["x_OPUYesNo[]"] = <?php echo $monitor_treatment_plan_view->OPUYesNo->Lookup->toClientList() ?>;
fmonitor_treatment_planview.lists["x_OPUYesNo[]"].options = <?php echo JsonEncode($monitor_treatment_plan_view->OPUYesNo->options(FALSE, TRUE)) ?>;
fmonitor_treatment_planview.lists["x_ETYesNo[]"] = <?php echo $monitor_treatment_plan_view->ETYesNo->Lookup->toClientList() ?>;
fmonitor_treatment_planview.lists["x_ETYesNo[]"].options = <?php echo JsonEncode($monitor_treatment_plan_view->ETYesNo->options(FALSE, TRUE)) ?>;
fmonitor_treatment_planview.lists["x_BetaHCGYesNo[]"] = <?php echo $monitor_treatment_plan_view->BetaHCGYesNo->Lookup->toClientList() ?>;
fmonitor_treatment_planview.lists["x_BetaHCGYesNo[]"].options = <?php echo JsonEncode($monitor_treatment_plan_view->BetaHCGYesNo->options(FALSE, TRUE)) ?>;
fmonitor_treatment_planview.lists["x_FETYesNo[]"] = <?php echo $monitor_treatment_plan_view->FETYesNo->Lookup->toClientList() ?>;
fmonitor_treatment_planview.lists["x_FETYesNo[]"].options = <?php echo JsonEncode($monitor_treatment_plan_view->FETYesNo->options(FALSE, TRUE)) ?>;
fmonitor_treatment_planview.lists["x_FBetaHCGYesNo[]"] = <?php echo $monitor_treatment_plan_view->FBetaHCGYesNo->Lookup->toClientList() ?>;
fmonitor_treatment_planview.lists["x_FBetaHCGYesNo[]"].options = <?php echo JsonEncode($monitor_treatment_plan_view->FBetaHCGYesNo->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$monitor_treatment_plan->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $monitor_treatment_plan_view->ExportOptions->render("body") ?>
<?php $monitor_treatment_plan_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $monitor_treatment_plan_view->showPageHeader(); ?>
<?php
$monitor_treatment_plan_view->showMessage();
?>
<form name="fmonitor_treatment_planview" id="fmonitor_treatment_planview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($monitor_treatment_plan_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $monitor_treatment_plan_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="monitor_treatment_plan">
<input type="hidden" name="modal" value="<?php echo (int)$monitor_treatment_plan_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($monitor_treatment_plan->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_id"><?php echo $monitor_treatment_plan->id->caption() ?></span></td>
		<td data-name="id"<?php echo $monitor_treatment_plan->id->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_id">
<span<?php echo $monitor_treatment_plan->id->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan->PatId->Visible) { // PatId ?>
	<tr id="r_PatId">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_PatId"><?php echo $monitor_treatment_plan->PatId->caption() ?></span></td>
		<td data-name="PatId"<?php echo $monitor_treatment_plan->PatId->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_PatId">
<span<?php echo $monitor_treatment_plan->PatId->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->PatId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan->PatientId->Visible) { // PatientId ?>
	<tr id="r_PatientId">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_PatientId"><?php echo $monitor_treatment_plan->PatientId->caption() ?></span></td>
		<td data-name="PatientId"<?php echo $monitor_treatment_plan->PatientId->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_PatientId">
<span<?php echo $monitor_treatment_plan->PatientId->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->PatientId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan->PatientName->Visible) { // PatientName ?>
	<tr id="r_PatientName">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_PatientName"><?php echo $monitor_treatment_plan->PatientName->caption() ?></span></td>
		<td data-name="PatientName"<?php echo $monitor_treatment_plan->PatientName->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_PatientName">
<span<?php echo $monitor_treatment_plan->PatientName->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->PatientName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan->Age->Visible) { // Age ?>
	<tr id="r_Age">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_Age"><?php echo $monitor_treatment_plan->Age->caption() ?></span></td>
		<td data-name="Age"<?php echo $monitor_treatment_plan->Age->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_Age">
<span<?php echo $monitor_treatment_plan->Age->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->Age->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan->MobileNo->Visible) { // MobileNo ?>
	<tr id="r_MobileNo">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_MobileNo"><?php echo $monitor_treatment_plan->MobileNo->caption() ?></span></td>
		<td data-name="MobileNo"<?php echo $monitor_treatment_plan->MobileNo->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_MobileNo">
<span<?php echo $monitor_treatment_plan->MobileNo->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->MobileNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan->ConsultantName->Visible) { // ConsultantName ?>
	<tr id="r_ConsultantName">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_ConsultantName"><?php echo $monitor_treatment_plan->ConsultantName->caption() ?></span></td>
		<td data-name="ConsultantName"<?php echo $monitor_treatment_plan->ConsultantName->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_ConsultantName">
<span<?php echo $monitor_treatment_plan->ConsultantName->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->ConsultantName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan->RefDrName->Visible) { // RefDrName ?>
	<tr id="r_RefDrName">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_RefDrName"><?php echo $monitor_treatment_plan->RefDrName->caption() ?></span></td>
		<td data-name="RefDrName"<?php echo $monitor_treatment_plan->RefDrName->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_RefDrName">
<span<?php echo $monitor_treatment_plan->RefDrName->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->RefDrName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan->RefDrMobileNo->Visible) { // RefDrMobileNo ?>
	<tr id="r_RefDrMobileNo">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_RefDrMobileNo"><?php echo $monitor_treatment_plan->RefDrMobileNo->caption() ?></span></td>
		<td data-name="RefDrMobileNo"<?php echo $monitor_treatment_plan->RefDrMobileNo->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_RefDrMobileNo">
<span<?php echo $monitor_treatment_plan->RefDrMobileNo->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->RefDrMobileNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan->NewVisitDate->Visible) { // NewVisitDate ?>
	<tr id="r_NewVisitDate">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_NewVisitDate"><?php echo $monitor_treatment_plan->NewVisitDate->caption() ?></span></td>
		<td data-name="NewVisitDate"<?php echo $monitor_treatment_plan->NewVisitDate->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_NewVisitDate">
<span<?php echo $monitor_treatment_plan->NewVisitDate->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->NewVisitDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan->NewVisitYesNo->Visible) { // NewVisitYesNo ?>
	<tr id="r_NewVisitYesNo">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_NewVisitYesNo"><?php echo $monitor_treatment_plan->NewVisitYesNo->caption() ?></span></td>
		<td data-name="NewVisitYesNo"<?php echo $monitor_treatment_plan->NewVisitYesNo->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_NewVisitYesNo">
<span<?php echo $monitor_treatment_plan->NewVisitYesNo->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->NewVisitYesNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan->Treatment->Visible) { // Treatment ?>
	<tr id="r_Treatment">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_Treatment"><?php echo $monitor_treatment_plan->Treatment->caption() ?></span></td>
		<td data-name="Treatment"<?php echo $monitor_treatment_plan->Treatment->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_Treatment">
<span<?php echo $monitor_treatment_plan->Treatment->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->Treatment->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan->IUIDoneDate1->Visible) { // IUIDoneDate1 ?>
	<tr id="r_IUIDoneDate1">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_IUIDoneDate1"><?php echo $monitor_treatment_plan->IUIDoneDate1->caption() ?></span></td>
		<td data-name="IUIDoneDate1"<?php echo $monitor_treatment_plan->IUIDoneDate1->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_IUIDoneDate1">
<span<?php echo $monitor_treatment_plan->IUIDoneDate1->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->IUIDoneDate1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan->IUIDoneYesNo1->Visible) { // IUIDoneYesNo1 ?>
	<tr id="r_IUIDoneYesNo1">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_IUIDoneYesNo1"><?php echo $monitor_treatment_plan->IUIDoneYesNo1->caption() ?></span></td>
		<td data-name="IUIDoneYesNo1"<?php echo $monitor_treatment_plan->IUIDoneYesNo1->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_IUIDoneYesNo1">
<span<?php echo $monitor_treatment_plan->IUIDoneYesNo1->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->IUIDoneYesNo1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan->UPTTestDate1->Visible) { // UPTTestDate1 ?>
	<tr id="r_UPTTestDate1">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_UPTTestDate1"><?php echo $monitor_treatment_plan->UPTTestDate1->caption() ?></span></td>
		<td data-name="UPTTestDate1"<?php echo $monitor_treatment_plan->UPTTestDate1->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_UPTTestDate1">
<span<?php echo $monitor_treatment_plan->UPTTestDate1->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->UPTTestDate1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan->UPTTestYesNo1->Visible) { // UPTTestYesNo1 ?>
	<tr id="r_UPTTestYesNo1">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_UPTTestYesNo1"><?php echo $monitor_treatment_plan->UPTTestYesNo1->caption() ?></span></td>
		<td data-name="UPTTestYesNo1"<?php echo $monitor_treatment_plan->UPTTestYesNo1->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_UPTTestYesNo1">
<span<?php echo $monitor_treatment_plan->UPTTestYesNo1->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->UPTTestYesNo1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan->IUIDoneDate2->Visible) { // IUIDoneDate2 ?>
	<tr id="r_IUIDoneDate2">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_IUIDoneDate2"><?php echo $monitor_treatment_plan->IUIDoneDate2->caption() ?></span></td>
		<td data-name="IUIDoneDate2"<?php echo $monitor_treatment_plan->IUIDoneDate2->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_IUIDoneDate2">
<span<?php echo $monitor_treatment_plan->IUIDoneDate2->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->IUIDoneDate2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan->IUIDoneYesNo2->Visible) { // IUIDoneYesNo2 ?>
	<tr id="r_IUIDoneYesNo2">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_IUIDoneYesNo2"><?php echo $monitor_treatment_plan->IUIDoneYesNo2->caption() ?></span></td>
		<td data-name="IUIDoneYesNo2"<?php echo $monitor_treatment_plan->IUIDoneYesNo2->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_IUIDoneYesNo2">
<span<?php echo $monitor_treatment_plan->IUIDoneYesNo2->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->IUIDoneYesNo2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan->UPTTestDate2->Visible) { // UPTTestDate2 ?>
	<tr id="r_UPTTestDate2">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_UPTTestDate2"><?php echo $monitor_treatment_plan->UPTTestDate2->caption() ?></span></td>
		<td data-name="UPTTestDate2"<?php echo $monitor_treatment_plan->UPTTestDate2->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_UPTTestDate2">
<span<?php echo $monitor_treatment_plan->UPTTestDate2->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->UPTTestDate2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan->UPTTestYesNo2->Visible) { // UPTTestYesNo2 ?>
	<tr id="r_UPTTestYesNo2">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_UPTTestYesNo2"><?php echo $monitor_treatment_plan->UPTTestYesNo2->caption() ?></span></td>
		<td data-name="UPTTestYesNo2"<?php echo $monitor_treatment_plan->UPTTestYesNo2->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_UPTTestYesNo2">
<span<?php echo $monitor_treatment_plan->UPTTestYesNo2->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->UPTTestYesNo2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan->IUIDoneDate3->Visible) { // IUIDoneDate3 ?>
	<tr id="r_IUIDoneDate3">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_IUIDoneDate3"><?php echo $monitor_treatment_plan->IUIDoneDate3->caption() ?></span></td>
		<td data-name="IUIDoneDate3"<?php echo $monitor_treatment_plan->IUIDoneDate3->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_IUIDoneDate3">
<span<?php echo $monitor_treatment_plan->IUIDoneDate3->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->IUIDoneDate3->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan->IUIDoneYesNo3->Visible) { // IUIDoneYesNo3 ?>
	<tr id="r_IUIDoneYesNo3">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_IUIDoneYesNo3"><?php echo $monitor_treatment_plan->IUIDoneYesNo3->caption() ?></span></td>
		<td data-name="IUIDoneYesNo3"<?php echo $monitor_treatment_plan->IUIDoneYesNo3->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_IUIDoneYesNo3">
<span<?php echo $monitor_treatment_plan->IUIDoneYesNo3->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->IUIDoneYesNo3->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan->UPTTestDate3->Visible) { // UPTTestDate3 ?>
	<tr id="r_UPTTestDate3">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_UPTTestDate3"><?php echo $monitor_treatment_plan->UPTTestDate3->caption() ?></span></td>
		<td data-name="UPTTestDate3"<?php echo $monitor_treatment_plan->UPTTestDate3->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_UPTTestDate3">
<span<?php echo $monitor_treatment_plan->UPTTestDate3->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->UPTTestDate3->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan->UPTTestYesNo3->Visible) { // UPTTestYesNo3 ?>
	<tr id="r_UPTTestYesNo3">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_UPTTestYesNo3"><?php echo $monitor_treatment_plan->UPTTestYesNo3->caption() ?></span></td>
		<td data-name="UPTTestYesNo3"<?php echo $monitor_treatment_plan->UPTTestYesNo3->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_UPTTestYesNo3">
<span<?php echo $monitor_treatment_plan->UPTTestYesNo3->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->UPTTestYesNo3->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan->IUIDoneDate4->Visible) { // IUIDoneDate4 ?>
	<tr id="r_IUIDoneDate4">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_IUIDoneDate4"><?php echo $monitor_treatment_plan->IUIDoneDate4->caption() ?></span></td>
		<td data-name="IUIDoneDate4"<?php echo $monitor_treatment_plan->IUIDoneDate4->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_IUIDoneDate4">
<span<?php echo $monitor_treatment_plan->IUIDoneDate4->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->IUIDoneDate4->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan->IUIDoneYesNo4->Visible) { // IUIDoneYesNo4 ?>
	<tr id="r_IUIDoneYesNo4">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_IUIDoneYesNo4"><?php echo $monitor_treatment_plan->IUIDoneYesNo4->caption() ?></span></td>
		<td data-name="IUIDoneYesNo4"<?php echo $monitor_treatment_plan->IUIDoneYesNo4->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_IUIDoneYesNo4">
<span<?php echo $monitor_treatment_plan->IUIDoneYesNo4->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->IUIDoneYesNo4->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan->UPTTestDate4->Visible) { // UPTTestDate4 ?>
	<tr id="r_UPTTestDate4">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_UPTTestDate4"><?php echo $monitor_treatment_plan->UPTTestDate4->caption() ?></span></td>
		<td data-name="UPTTestDate4"<?php echo $monitor_treatment_plan->UPTTestDate4->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_UPTTestDate4">
<span<?php echo $monitor_treatment_plan->UPTTestDate4->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->UPTTestDate4->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan->UPTTestYesNo4->Visible) { // UPTTestYesNo4 ?>
	<tr id="r_UPTTestYesNo4">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_UPTTestYesNo4"><?php echo $monitor_treatment_plan->UPTTestYesNo4->caption() ?></span></td>
		<td data-name="UPTTestYesNo4"<?php echo $monitor_treatment_plan->UPTTestYesNo4->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_UPTTestYesNo4">
<span<?php echo $monitor_treatment_plan->UPTTestYesNo4->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->UPTTestYesNo4->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan->IVFStimulationDate->Visible) { // IVFStimulationDate ?>
	<tr id="r_IVFStimulationDate">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_IVFStimulationDate"><?php echo $monitor_treatment_plan->IVFStimulationDate->caption() ?></span></td>
		<td data-name="IVFStimulationDate"<?php echo $monitor_treatment_plan->IVFStimulationDate->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_IVFStimulationDate">
<span<?php echo $monitor_treatment_plan->IVFStimulationDate->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->IVFStimulationDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan->IVFStimulationYesNo->Visible) { // IVFStimulationYesNo ?>
	<tr id="r_IVFStimulationYesNo">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_IVFStimulationYesNo"><?php echo $monitor_treatment_plan->IVFStimulationYesNo->caption() ?></span></td>
		<td data-name="IVFStimulationYesNo"<?php echo $monitor_treatment_plan->IVFStimulationYesNo->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_IVFStimulationYesNo">
<span<?php echo $monitor_treatment_plan->IVFStimulationYesNo->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->IVFStimulationYesNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan->OPUDate->Visible) { // OPUDate ?>
	<tr id="r_OPUDate">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_OPUDate"><?php echo $monitor_treatment_plan->OPUDate->caption() ?></span></td>
		<td data-name="OPUDate"<?php echo $monitor_treatment_plan->OPUDate->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_OPUDate">
<span<?php echo $monitor_treatment_plan->OPUDate->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->OPUDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan->OPUYesNo->Visible) { // OPUYesNo ?>
	<tr id="r_OPUYesNo">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_OPUYesNo"><?php echo $monitor_treatment_plan->OPUYesNo->caption() ?></span></td>
		<td data-name="OPUYesNo"<?php echo $monitor_treatment_plan->OPUYesNo->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_OPUYesNo">
<span<?php echo $monitor_treatment_plan->OPUYesNo->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->OPUYesNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan->ETDate->Visible) { // ETDate ?>
	<tr id="r_ETDate">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_ETDate"><?php echo $monitor_treatment_plan->ETDate->caption() ?></span></td>
		<td data-name="ETDate"<?php echo $monitor_treatment_plan->ETDate->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_ETDate">
<span<?php echo $monitor_treatment_plan->ETDate->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->ETDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan->ETYesNo->Visible) { // ETYesNo ?>
	<tr id="r_ETYesNo">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_ETYesNo"><?php echo $monitor_treatment_plan->ETYesNo->caption() ?></span></td>
		<td data-name="ETYesNo"<?php echo $monitor_treatment_plan->ETYesNo->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_ETYesNo">
<span<?php echo $monitor_treatment_plan->ETYesNo->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->ETYesNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan->BetaHCGDate->Visible) { // BetaHCGDate ?>
	<tr id="r_BetaHCGDate">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_BetaHCGDate"><?php echo $monitor_treatment_plan->BetaHCGDate->caption() ?></span></td>
		<td data-name="BetaHCGDate"<?php echo $monitor_treatment_plan->BetaHCGDate->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_BetaHCGDate">
<span<?php echo $monitor_treatment_plan->BetaHCGDate->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->BetaHCGDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan->BetaHCGYesNo->Visible) { // BetaHCGYesNo ?>
	<tr id="r_BetaHCGYesNo">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_BetaHCGYesNo"><?php echo $monitor_treatment_plan->BetaHCGYesNo->caption() ?></span></td>
		<td data-name="BetaHCGYesNo"<?php echo $monitor_treatment_plan->BetaHCGYesNo->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_BetaHCGYesNo">
<span<?php echo $monitor_treatment_plan->BetaHCGYesNo->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->BetaHCGYesNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan->FETDate->Visible) { // FETDate ?>
	<tr id="r_FETDate">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_FETDate"><?php echo $monitor_treatment_plan->FETDate->caption() ?></span></td>
		<td data-name="FETDate"<?php echo $monitor_treatment_plan->FETDate->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_FETDate">
<span<?php echo $monitor_treatment_plan->FETDate->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->FETDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan->FETYesNo->Visible) { // FETYesNo ?>
	<tr id="r_FETYesNo">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_FETYesNo"><?php echo $monitor_treatment_plan->FETYesNo->caption() ?></span></td>
		<td data-name="FETYesNo"<?php echo $monitor_treatment_plan->FETYesNo->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_FETYesNo">
<span<?php echo $monitor_treatment_plan->FETYesNo->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->FETYesNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan->FBetaHCGDate->Visible) { // FBetaHCGDate ?>
	<tr id="r_FBetaHCGDate">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_FBetaHCGDate"><?php echo $monitor_treatment_plan->FBetaHCGDate->caption() ?></span></td>
		<td data-name="FBetaHCGDate"<?php echo $monitor_treatment_plan->FBetaHCGDate->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_FBetaHCGDate">
<span<?php echo $monitor_treatment_plan->FBetaHCGDate->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->FBetaHCGDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan->FBetaHCGYesNo->Visible) { // FBetaHCGYesNo ?>
	<tr id="r_FBetaHCGYesNo">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_FBetaHCGYesNo"><?php echo $monitor_treatment_plan->FBetaHCGYesNo->caption() ?></span></td>
		<td data-name="FBetaHCGYesNo"<?php echo $monitor_treatment_plan->FBetaHCGYesNo->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_FBetaHCGYesNo">
<span<?php echo $monitor_treatment_plan->FBetaHCGYesNo->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->FBetaHCGYesNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_createdby"><?php echo $monitor_treatment_plan->createdby->caption() ?></span></td>
		<td data-name="createdby"<?php echo $monitor_treatment_plan->createdby->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_createdby">
<span<?php echo $monitor_treatment_plan->createdby->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_createddatetime"><?php echo $monitor_treatment_plan->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime"<?php echo $monitor_treatment_plan->createddatetime->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_createddatetime">
<span<?php echo $monitor_treatment_plan->createddatetime->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_modifiedby"><?php echo $monitor_treatment_plan->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby"<?php echo $monitor_treatment_plan->modifiedby->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_modifiedby">
<span<?php echo $monitor_treatment_plan->modifiedby->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_modifieddatetime"><?php echo $monitor_treatment_plan->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime"<?php echo $monitor_treatment_plan->modifieddatetime->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_modifieddatetime">
<span<?php echo $monitor_treatment_plan->modifieddatetime->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_HospID"><?php echo $monitor_treatment_plan->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $monitor_treatment_plan->HospID->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_HospID">
<span<?php echo $monitor_treatment_plan->HospID->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$monitor_treatment_plan_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$monitor_treatment_plan->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$monitor_treatment_plan_view->terminate();
?>