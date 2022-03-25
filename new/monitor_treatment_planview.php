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
<?php include_once "header.php"; ?>
<?php if (!$monitor_treatment_plan_view->isExport()) { ?>
<script>
var fmonitor_treatment_planview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fmonitor_treatment_planview = currentForm = new ew.Form("fmonitor_treatment_planview", "view");
	loadjs.done("fmonitor_treatment_planview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$monitor_treatment_plan_view->isExport()) { ?>
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
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="monitor_treatment_plan">
<input type="hidden" name="modal" value="<?php echo (int)$monitor_treatment_plan_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($monitor_treatment_plan_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_id"><?php echo $monitor_treatment_plan_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $monitor_treatment_plan_view->id->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_id">
<span<?php echo $monitor_treatment_plan_view->id->viewAttributes() ?>><?php echo $monitor_treatment_plan_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan_view->PatId->Visible) { // PatId ?>
	<tr id="r_PatId">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_PatId"><?php echo $monitor_treatment_plan_view->PatId->caption() ?></span></td>
		<td data-name="PatId" <?php echo $monitor_treatment_plan_view->PatId->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_PatId">
<span<?php echo $monitor_treatment_plan_view->PatId->viewAttributes() ?>><?php echo $monitor_treatment_plan_view->PatId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan_view->PatientId->Visible) { // PatientId ?>
	<tr id="r_PatientId">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_PatientId"><?php echo $monitor_treatment_plan_view->PatientId->caption() ?></span></td>
		<td data-name="PatientId" <?php echo $monitor_treatment_plan_view->PatientId->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_PatientId">
<span<?php echo $monitor_treatment_plan_view->PatientId->viewAttributes() ?>><?php echo $monitor_treatment_plan_view->PatientId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan_view->PatientName->Visible) { // PatientName ?>
	<tr id="r_PatientName">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_PatientName"><?php echo $monitor_treatment_plan_view->PatientName->caption() ?></span></td>
		<td data-name="PatientName" <?php echo $monitor_treatment_plan_view->PatientName->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_PatientName">
<span<?php echo $monitor_treatment_plan_view->PatientName->viewAttributes() ?>><?php echo $monitor_treatment_plan_view->PatientName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan_view->Age->Visible) { // Age ?>
	<tr id="r_Age">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_Age"><?php echo $monitor_treatment_plan_view->Age->caption() ?></span></td>
		<td data-name="Age" <?php echo $monitor_treatment_plan_view->Age->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_Age">
<span<?php echo $monitor_treatment_plan_view->Age->viewAttributes() ?>><?php echo $monitor_treatment_plan_view->Age->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan_view->MobileNo->Visible) { // MobileNo ?>
	<tr id="r_MobileNo">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_MobileNo"><?php echo $monitor_treatment_plan_view->MobileNo->caption() ?></span></td>
		<td data-name="MobileNo" <?php echo $monitor_treatment_plan_view->MobileNo->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_MobileNo">
<span<?php echo $monitor_treatment_plan_view->MobileNo->viewAttributes() ?>><?php echo $monitor_treatment_plan_view->MobileNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan_view->ConsultantName->Visible) { // ConsultantName ?>
	<tr id="r_ConsultantName">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_ConsultantName"><?php echo $monitor_treatment_plan_view->ConsultantName->caption() ?></span></td>
		<td data-name="ConsultantName" <?php echo $monitor_treatment_plan_view->ConsultantName->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_ConsultantName">
<span<?php echo $monitor_treatment_plan_view->ConsultantName->viewAttributes() ?>><?php echo $monitor_treatment_plan_view->ConsultantName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan_view->RefDrName->Visible) { // RefDrName ?>
	<tr id="r_RefDrName">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_RefDrName"><?php echo $monitor_treatment_plan_view->RefDrName->caption() ?></span></td>
		<td data-name="RefDrName" <?php echo $monitor_treatment_plan_view->RefDrName->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_RefDrName">
<span<?php echo $monitor_treatment_plan_view->RefDrName->viewAttributes() ?>><?php echo $monitor_treatment_plan_view->RefDrName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan_view->RefDrMobileNo->Visible) { // RefDrMobileNo ?>
	<tr id="r_RefDrMobileNo">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_RefDrMobileNo"><?php echo $monitor_treatment_plan_view->RefDrMobileNo->caption() ?></span></td>
		<td data-name="RefDrMobileNo" <?php echo $monitor_treatment_plan_view->RefDrMobileNo->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_RefDrMobileNo">
<span<?php echo $monitor_treatment_plan_view->RefDrMobileNo->viewAttributes() ?>><?php echo $monitor_treatment_plan_view->RefDrMobileNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan_view->NewVisitDate->Visible) { // NewVisitDate ?>
	<tr id="r_NewVisitDate">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_NewVisitDate"><?php echo $monitor_treatment_plan_view->NewVisitDate->caption() ?></span></td>
		<td data-name="NewVisitDate" <?php echo $monitor_treatment_plan_view->NewVisitDate->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_NewVisitDate">
<span<?php echo $monitor_treatment_plan_view->NewVisitDate->viewAttributes() ?>><?php echo $monitor_treatment_plan_view->NewVisitDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan_view->NewVisitYesNo->Visible) { // NewVisitYesNo ?>
	<tr id="r_NewVisitYesNo">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_NewVisitYesNo"><?php echo $monitor_treatment_plan_view->NewVisitYesNo->caption() ?></span></td>
		<td data-name="NewVisitYesNo" <?php echo $monitor_treatment_plan_view->NewVisitYesNo->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_NewVisitYesNo">
<span<?php echo $monitor_treatment_plan_view->NewVisitYesNo->viewAttributes() ?>><?php echo $monitor_treatment_plan_view->NewVisitYesNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan_view->Treatment->Visible) { // Treatment ?>
	<tr id="r_Treatment">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_Treatment"><?php echo $monitor_treatment_plan_view->Treatment->caption() ?></span></td>
		<td data-name="Treatment" <?php echo $monitor_treatment_plan_view->Treatment->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_Treatment">
<span<?php echo $monitor_treatment_plan_view->Treatment->viewAttributes() ?>><?php echo $monitor_treatment_plan_view->Treatment->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan_view->IUIDoneDate1->Visible) { // IUIDoneDate1 ?>
	<tr id="r_IUIDoneDate1">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_IUIDoneDate1"><?php echo $monitor_treatment_plan_view->IUIDoneDate1->caption() ?></span></td>
		<td data-name="IUIDoneDate1" <?php echo $monitor_treatment_plan_view->IUIDoneDate1->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_IUIDoneDate1">
<span<?php echo $monitor_treatment_plan_view->IUIDoneDate1->viewAttributes() ?>><?php echo $monitor_treatment_plan_view->IUIDoneDate1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan_view->IUIDoneYesNo1->Visible) { // IUIDoneYesNo1 ?>
	<tr id="r_IUIDoneYesNo1">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_IUIDoneYesNo1"><?php echo $monitor_treatment_plan_view->IUIDoneYesNo1->caption() ?></span></td>
		<td data-name="IUIDoneYesNo1" <?php echo $monitor_treatment_plan_view->IUIDoneYesNo1->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_IUIDoneYesNo1">
<span<?php echo $monitor_treatment_plan_view->IUIDoneYesNo1->viewAttributes() ?>><?php echo $monitor_treatment_plan_view->IUIDoneYesNo1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan_view->UPTTestDate1->Visible) { // UPTTestDate1 ?>
	<tr id="r_UPTTestDate1">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_UPTTestDate1"><?php echo $monitor_treatment_plan_view->UPTTestDate1->caption() ?></span></td>
		<td data-name="UPTTestDate1" <?php echo $monitor_treatment_plan_view->UPTTestDate1->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_UPTTestDate1">
<span<?php echo $monitor_treatment_plan_view->UPTTestDate1->viewAttributes() ?>><?php echo $monitor_treatment_plan_view->UPTTestDate1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan_view->UPTTestYesNo1->Visible) { // UPTTestYesNo1 ?>
	<tr id="r_UPTTestYesNo1">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_UPTTestYesNo1"><?php echo $monitor_treatment_plan_view->UPTTestYesNo1->caption() ?></span></td>
		<td data-name="UPTTestYesNo1" <?php echo $monitor_treatment_plan_view->UPTTestYesNo1->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_UPTTestYesNo1">
<span<?php echo $monitor_treatment_plan_view->UPTTestYesNo1->viewAttributes() ?>><?php echo $monitor_treatment_plan_view->UPTTestYesNo1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan_view->IUIDoneDate2->Visible) { // IUIDoneDate2 ?>
	<tr id="r_IUIDoneDate2">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_IUIDoneDate2"><?php echo $monitor_treatment_plan_view->IUIDoneDate2->caption() ?></span></td>
		<td data-name="IUIDoneDate2" <?php echo $monitor_treatment_plan_view->IUIDoneDate2->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_IUIDoneDate2">
<span<?php echo $monitor_treatment_plan_view->IUIDoneDate2->viewAttributes() ?>><?php echo $monitor_treatment_plan_view->IUIDoneDate2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan_view->IUIDoneYesNo2->Visible) { // IUIDoneYesNo2 ?>
	<tr id="r_IUIDoneYesNo2">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_IUIDoneYesNo2"><?php echo $monitor_treatment_plan_view->IUIDoneYesNo2->caption() ?></span></td>
		<td data-name="IUIDoneYesNo2" <?php echo $monitor_treatment_plan_view->IUIDoneYesNo2->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_IUIDoneYesNo2">
<span<?php echo $monitor_treatment_plan_view->IUIDoneYesNo2->viewAttributes() ?>><?php echo $monitor_treatment_plan_view->IUIDoneYesNo2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan_view->UPTTestDate2->Visible) { // UPTTestDate2 ?>
	<tr id="r_UPTTestDate2">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_UPTTestDate2"><?php echo $monitor_treatment_plan_view->UPTTestDate2->caption() ?></span></td>
		<td data-name="UPTTestDate2" <?php echo $monitor_treatment_plan_view->UPTTestDate2->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_UPTTestDate2">
<span<?php echo $monitor_treatment_plan_view->UPTTestDate2->viewAttributes() ?>><?php echo $monitor_treatment_plan_view->UPTTestDate2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan_view->UPTTestYesNo2->Visible) { // UPTTestYesNo2 ?>
	<tr id="r_UPTTestYesNo2">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_UPTTestYesNo2"><?php echo $monitor_treatment_plan_view->UPTTestYesNo2->caption() ?></span></td>
		<td data-name="UPTTestYesNo2" <?php echo $monitor_treatment_plan_view->UPTTestYesNo2->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_UPTTestYesNo2">
<span<?php echo $monitor_treatment_plan_view->UPTTestYesNo2->viewAttributes() ?>><?php echo $monitor_treatment_plan_view->UPTTestYesNo2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan_view->IUIDoneDate3->Visible) { // IUIDoneDate3 ?>
	<tr id="r_IUIDoneDate3">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_IUIDoneDate3"><?php echo $monitor_treatment_plan_view->IUIDoneDate3->caption() ?></span></td>
		<td data-name="IUIDoneDate3" <?php echo $monitor_treatment_plan_view->IUIDoneDate3->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_IUIDoneDate3">
<span<?php echo $monitor_treatment_plan_view->IUIDoneDate3->viewAttributes() ?>><?php echo $monitor_treatment_plan_view->IUIDoneDate3->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan_view->IUIDoneYesNo3->Visible) { // IUIDoneYesNo3 ?>
	<tr id="r_IUIDoneYesNo3">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_IUIDoneYesNo3"><?php echo $monitor_treatment_plan_view->IUIDoneYesNo3->caption() ?></span></td>
		<td data-name="IUIDoneYesNo3" <?php echo $monitor_treatment_plan_view->IUIDoneYesNo3->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_IUIDoneYesNo3">
<span<?php echo $monitor_treatment_plan_view->IUIDoneYesNo3->viewAttributes() ?>><?php echo $monitor_treatment_plan_view->IUIDoneYesNo3->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan_view->UPTTestDate3->Visible) { // UPTTestDate3 ?>
	<tr id="r_UPTTestDate3">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_UPTTestDate3"><?php echo $monitor_treatment_plan_view->UPTTestDate3->caption() ?></span></td>
		<td data-name="UPTTestDate3" <?php echo $monitor_treatment_plan_view->UPTTestDate3->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_UPTTestDate3">
<span<?php echo $monitor_treatment_plan_view->UPTTestDate3->viewAttributes() ?>><?php echo $monitor_treatment_plan_view->UPTTestDate3->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan_view->UPTTestYesNo3->Visible) { // UPTTestYesNo3 ?>
	<tr id="r_UPTTestYesNo3">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_UPTTestYesNo3"><?php echo $monitor_treatment_plan_view->UPTTestYesNo3->caption() ?></span></td>
		<td data-name="UPTTestYesNo3" <?php echo $monitor_treatment_plan_view->UPTTestYesNo3->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_UPTTestYesNo3">
<span<?php echo $monitor_treatment_plan_view->UPTTestYesNo3->viewAttributes() ?>><?php echo $monitor_treatment_plan_view->UPTTestYesNo3->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan_view->IUIDoneDate4->Visible) { // IUIDoneDate4 ?>
	<tr id="r_IUIDoneDate4">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_IUIDoneDate4"><?php echo $monitor_treatment_plan_view->IUIDoneDate4->caption() ?></span></td>
		<td data-name="IUIDoneDate4" <?php echo $monitor_treatment_plan_view->IUIDoneDate4->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_IUIDoneDate4">
<span<?php echo $monitor_treatment_plan_view->IUIDoneDate4->viewAttributes() ?>><?php echo $monitor_treatment_plan_view->IUIDoneDate4->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan_view->IUIDoneYesNo4->Visible) { // IUIDoneYesNo4 ?>
	<tr id="r_IUIDoneYesNo4">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_IUIDoneYesNo4"><?php echo $monitor_treatment_plan_view->IUIDoneYesNo4->caption() ?></span></td>
		<td data-name="IUIDoneYesNo4" <?php echo $monitor_treatment_plan_view->IUIDoneYesNo4->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_IUIDoneYesNo4">
<span<?php echo $monitor_treatment_plan_view->IUIDoneYesNo4->viewAttributes() ?>><?php echo $monitor_treatment_plan_view->IUIDoneYesNo4->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan_view->UPTTestDate4->Visible) { // UPTTestDate4 ?>
	<tr id="r_UPTTestDate4">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_UPTTestDate4"><?php echo $monitor_treatment_plan_view->UPTTestDate4->caption() ?></span></td>
		<td data-name="UPTTestDate4" <?php echo $monitor_treatment_plan_view->UPTTestDate4->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_UPTTestDate4">
<span<?php echo $monitor_treatment_plan_view->UPTTestDate4->viewAttributes() ?>><?php echo $monitor_treatment_plan_view->UPTTestDate4->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan_view->UPTTestYesNo4->Visible) { // UPTTestYesNo4 ?>
	<tr id="r_UPTTestYesNo4">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_UPTTestYesNo4"><?php echo $monitor_treatment_plan_view->UPTTestYesNo4->caption() ?></span></td>
		<td data-name="UPTTestYesNo4" <?php echo $monitor_treatment_plan_view->UPTTestYesNo4->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_UPTTestYesNo4">
<span<?php echo $monitor_treatment_plan_view->UPTTestYesNo4->viewAttributes() ?>><?php echo $monitor_treatment_plan_view->UPTTestYesNo4->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan_view->IVFStimulationDate->Visible) { // IVFStimulationDate ?>
	<tr id="r_IVFStimulationDate">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_IVFStimulationDate"><?php echo $monitor_treatment_plan_view->IVFStimulationDate->caption() ?></span></td>
		<td data-name="IVFStimulationDate" <?php echo $monitor_treatment_plan_view->IVFStimulationDate->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_IVFStimulationDate">
<span<?php echo $monitor_treatment_plan_view->IVFStimulationDate->viewAttributes() ?>><?php echo $monitor_treatment_plan_view->IVFStimulationDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan_view->IVFStimulationYesNo->Visible) { // IVFStimulationYesNo ?>
	<tr id="r_IVFStimulationYesNo">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_IVFStimulationYesNo"><?php echo $monitor_treatment_plan_view->IVFStimulationYesNo->caption() ?></span></td>
		<td data-name="IVFStimulationYesNo" <?php echo $monitor_treatment_plan_view->IVFStimulationYesNo->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_IVFStimulationYesNo">
<span<?php echo $monitor_treatment_plan_view->IVFStimulationYesNo->viewAttributes() ?>><?php echo $monitor_treatment_plan_view->IVFStimulationYesNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan_view->OPUDate->Visible) { // OPUDate ?>
	<tr id="r_OPUDate">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_OPUDate"><?php echo $monitor_treatment_plan_view->OPUDate->caption() ?></span></td>
		<td data-name="OPUDate" <?php echo $monitor_treatment_plan_view->OPUDate->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_OPUDate">
<span<?php echo $monitor_treatment_plan_view->OPUDate->viewAttributes() ?>><?php echo $monitor_treatment_plan_view->OPUDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan_view->OPUYesNo->Visible) { // OPUYesNo ?>
	<tr id="r_OPUYesNo">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_OPUYesNo"><?php echo $monitor_treatment_plan_view->OPUYesNo->caption() ?></span></td>
		<td data-name="OPUYesNo" <?php echo $monitor_treatment_plan_view->OPUYesNo->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_OPUYesNo">
<span<?php echo $monitor_treatment_plan_view->OPUYesNo->viewAttributes() ?>><?php echo $monitor_treatment_plan_view->OPUYesNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan_view->ETDate->Visible) { // ETDate ?>
	<tr id="r_ETDate">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_ETDate"><?php echo $monitor_treatment_plan_view->ETDate->caption() ?></span></td>
		<td data-name="ETDate" <?php echo $monitor_treatment_plan_view->ETDate->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_ETDate">
<span<?php echo $monitor_treatment_plan_view->ETDate->viewAttributes() ?>><?php echo $monitor_treatment_plan_view->ETDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan_view->ETYesNo->Visible) { // ETYesNo ?>
	<tr id="r_ETYesNo">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_ETYesNo"><?php echo $monitor_treatment_plan_view->ETYesNo->caption() ?></span></td>
		<td data-name="ETYesNo" <?php echo $monitor_treatment_plan_view->ETYesNo->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_ETYesNo">
<span<?php echo $monitor_treatment_plan_view->ETYesNo->viewAttributes() ?>><?php echo $monitor_treatment_plan_view->ETYesNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan_view->BetaHCGDate->Visible) { // BetaHCGDate ?>
	<tr id="r_BetaHCGDate">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_BetaHCGDate"><?php echo $monitor_treatment_plan_view->BetaHCGDate->caption() ?></span></td>
		<td data-name="BetaHCGDate" <?php echo $monitor_treatment_plan_view->BetaHCGDate->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_BetaHCGDate">
<span<?php echo $monitor_treatment_plan_view->BetaHCGDate->viewAttributes() ?>><?php echo $monitor_treatment_plan_view->BetaHCGDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan_view->BetaHCGYesNo->Visible) { // BetaHCGYesNo ?>
	<tr id="r_BetaHCGYesNo">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_BetaHCGYesNo"><?php echo $monitor_treatment_plan_view->BetaHCGYesNo->caption() ?></span></td>
		<td data-name="BetaHCGYesNo" <?php echo $monitor_treatment_plan_view->BetaHCGYesNo->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_BetaHCGYesNo">
<span<?php echo $monitor_treatment_plan_view->BetaHCGYesNo->viewAttributes() ?>><?php echo $monitor_treatment_plan_view->BetaHCGYesNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan_view->FETDate->Visible) { // FETDate ?>
	<tr id="r_FETDate">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_FETDate"><?php echo $monitor_treatment_plan_view->FETDate->caption() ?></span></td>
		<td data-name="FETDate" <?php echo $monitor_treatment_plan_view->FETDate->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_FETDate">
<span<?php echo $monitor_treatment_plan_view->FETDate->viewAttributes() ?>><?php echo $monitor_treatment_plan_view->FETDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan_view->FETYesNo->Visible) { // FETYesNo ?>
	<tr id="r_FETYesNo">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_FETYesNo"><?php echo $monitor_treatment_plan_view->FETYesNo->caption() ?></span></td>
		<td data-name="FETYesNo" <?php echo $monitor_treatment_plan_view->FETYesNo->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_FETYesNo">
<span<?php echo $monitor_treatment_plan_view->FETYesNo->viewAttributes() ?>><?php echo $monitor_treatment_plan_view->FETYesNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan_view->FBetaHCGDate->Visible) { // FBetaHCGDate ?>
	<tr id="r_FBetaHCGDate">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_FBetaHCGDate"><?php echo $monitor_treatment_plan_view->FBetaHCGDate->caption() ?></span></td>
		<td data-name="FBetaHCGDate" <?php echo $monitor_treatment_plan_view->FBetaHCGDate->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_FBetaHCGDate">
<span<?php echo $monitor_treatment_plan_view->FBetaHCGDate->viewAttributes() ?>><?php echo $monitor_treatment_plan_view->FBetaHCGDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan_view->FBetaHCGYesNo->Visible) { // FBetaHCGYesNo ?>
	<tr id="r_FBetaHCGYesNo">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_FBetaHCGYesNo"><?php echo $monitor_treatment_plan_view->FBetaHCGYesNo->caption() ?></span></td>
		<td data-name="FBetaHCGYesNo" <?php echo $monitor_treatment_plan_view->FBetaHCGYesNo->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_FBetaHCGYesNo">
<span<?php echo $monitor_treatment_plan_view->FBetaHCGYesNo->viewAttributes() ?>><?php echo $monitor_treatment_plan_view->FBetaHCGYesNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan_view->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_createdby"><?php echo $monitor_treatment_plan_view->createdby->caption() ?></span></td>
		<td data-name="createdby" <?php echo $monitor_treatment_plan_view->createdby->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_createdby">
<span<?php echo $monitor_treatment_plan_view->createdby->viewAttributes() ?>><?php echo $monitor_treatment_plan_view->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan_view->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_createddatetime"><?php echo $monitor_treatment_plan_view->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime" <?php echo $monitor_treatment_plan_view->createddatetime->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_createddatetime">
<span<?php echo $monitor_treatment_plan_view->createddatetime->viewAttributes() ?>><?php echo $monitor_treatment_plan_view->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan_view->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_modifiedby"><?php echo $monitor_treatment_plan_view->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby" <?php echo $monitor_treatment_plan_view->modifiedby->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_modifiedby">
<span<?php echo $monitor_treatment_plan_view->modifiedby->viewAttributes() ?>><?php echo $monitor_treatment_plan_view->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan_view->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_modifieddatetime"><?php echo $monitor_treatment_plan_view->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime" <?php echo $monitor_treatment_plan_view->modifieddatetime->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_modifieddatetime">
<span<?php echo $monitor_treatment_plan_view->modifieddatetime->viewAttributes() ?>><?php echo $monitor_treatment_plan_view->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($monitor_treatment_plan_view->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $monitor_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_HospID"><?php echo $monitor_treatment_plan_view->HospID->caption() ?></span></td>
		<td data-name="HospID" <?php echo $monitor_treatment_plan_view->HospID->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_HospID">
<span<?php echo $monitor_treatment_plan_view->HospID->viewAttributes() ?>><?php echo $monitor_treatment_plan_view->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$monitor_treatment_plan_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$monitor_treatment_plan_view->isExport()) { ?>
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
$monitor_treatment_plan_view->terminate();
?>