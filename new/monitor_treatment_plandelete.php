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
$monitor_treatment_plan_delete = new monitor_treatment_plan_delete();

// Run the page
$monitor_treatment_plan_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$monitor_treatment_plan_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmonitor_treatment_plandelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fmonitor_treatment_plandelete = currentForm = new ew.Form("fmonitor_treatment_plandelete", "delete");
	loadjs.done("fmonitor_treatment_plandelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $monitor_treatment_plan_delete->showPageHeader(); ?>
<?php
$monitor_treatment_plan_delete->showMessage();
?>
<form name="fmonitor_treatment_plandelete" id="fmonitor_treatment_plandelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="monitor_treatment_plan">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($monitor_treatment_plan_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($monitor_treatment_plan_delete->id->Visible) { // id ?>
		<th class="<?php echo $monitor_treatment_plan_delete->id->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_id" class="monitor_treatment_plan_id"><?php echo $monitor_treatment_plan_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->PatId->Visible) { // PatId ?>
		<th class="<?php echo $monitor_treatment_plan_delete->PatId->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_PatId" class="monitor_treatment_plan_PatId"><?php echo $monitor_treatment_plan_delete->PatId->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->PatientId->Visible) { // PatientId ?>
		<th class="<?php echo $monitor_treatment_plan_delete->PatientId->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_PatientId" class="monitor_treatment_plan_PatientId"><?php echo $monitor_treatment_plan_delete->PatientId->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->PatientName->Visible) { // PatientName ?>
		<th class="<?php echo $monitor_treatment_plan_delete->PatientName->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_PatientName" class="monitor_treatment_plan_PatientName"><?php echo $monitor_treatment_plan_delete->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->Age->Visible) { // Age ?>
		<th class="<?php echo $monitor_treatment_plan_delete->Age->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_Age" class="monitor_treatment_plan_Age"><?php echo $monitor_treatment_plan_delete->Age->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->MobileNo->Visible) { // MobileNo ?>
		<th class="<?php echo $monitor_treatment_plan_delete->MobileNo->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_MobileNo" class="monitor_treatment_plan_MobileNo"><?php echo $monitor_treatment_plan_delete->MobileNo->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->ConsultantName->Visible) { // ConsultantName ?>
		<th class="<?php echo $monitor_treatment_plan_delete->ConsultantName->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_ConsultantName" class="monitor_treatment_plan_ConsultantName"><?php echo $monitor_treatment_plan_delete->ConsultantName->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->RefDrName->Visible) { // RefDrName ?>
		<th class="<?php echo $monitor_treatment_plan_delete->RefDrName->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_RefDrName" class="monitor_treatment_plan_RefDrName"><?php echo $monitor_treatment_plan_delete->RefDrName->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->RefDrMobileNo->Visible) { // RefDrMobileNo ?>
		<th class="<?php echo $monitor_treatment_plan_delete->RefDrMobileNo->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_RefDrMobileNo" class="monitor_treatment_plan_RefDrMobileNo"><?php echo $monitor_treatment_plan_delete->RefDrMobileNo->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->NewVisitDate->Visible) { // NewVisitDate ?>
		<th class="<?php echo $monitor_treatment_plan_delete->NewVisitDate->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_NewVisitDate" class="monitor_treatment_plan_NewVisitDate"><?php echo $monitor_treatment_plan_delete->NewVisitDate->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->NewVisitYesNo->Visible) { // NewVisitYesNo ?>
		<th class="<?php echo $monitor_treatment_plan_delete->NewVisitYesNo->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_NewVisitYesNo" class="monitor_treatment_plan_NewVisitYesNo"><?php echo $monitor_treatment_plan_delete->NewVisitYesNo->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->Treatment->Visible) { // Treatment ?>
		<th class="<?php echo $monitor_treatment_plan_delete->Treatment->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_Treatment" class="monitor_treatment_plan_Treatment"><?php echo $monitor_treatment_plan_delete->Treatment->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->IUIDoneDate1->Visible) { // IUIDoneDate1 ?>
		<th class="<?php echo $monitor_treatment_plan_delete->IUIDoneDate1->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_IUIDoneDate1" class="monitor_treatment_plan_IUIDoneDate1"><?php echo $monitor_treatment_plan_delete->IUIDoneDate1->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->IUIDoneYesNo1->Visible) { // IUIDoneYesNo1 ?>
		<th class="<?php echo $monitor_treatment_plan_delete->IUIDoneYesNo1->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_IUIDoneYesNo1" class="monitor_treatment_plan_IUIDoneYesNo1"><?php echo $monitor_treatment_plan_delete->IUIDoneYesNo1->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->UPTTestDate1->Visible) { // UPTTestDate1 ?>
		<th class="<?php echo $monitor_treatment_plan_delete->UPTTestDate1->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_UPTTestDate1" class="monitor_treatment_plan_UPTTestDate1"><?php echo $monitor_treatment_plan_delete->UPTTestDate1->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->UPTTestYesNo1->Visible) { // UPTTestYesNo1 ?>
		<th class="<?php echo $monitor_treatment_plan_delete->UPTTestYesNo1->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_UPTTestYesNo1" class="monitor_treatment_plan_UPTTestYesNo1"><?php echo $monitor_treatment_plan_delete->UPTTestYesNo1->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->IUIDoneDate2->Visible) { // IUIDoneDate2 ?>
		<th class="<?php echo $monitor_treatment_plan_delete->IUIDoneDate2->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_IUIDoneDate2" class="monitor_treatment_plan_IUIDoneDate2"><?php echo $monitor_treatment_plan_delete->IUIDoneDate2->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->IUIDoneYesNo2->Visible) { // IUIDoneYesNo2 ?>
		<th class="<?php echo $monitor_treatment_plan_delete->IUIDoneYesNo2->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_IUIDoneYesNo2" class="monitor_treatment_plan_IUIDoneYesNo2"><?php echo $monitor_treatment_plan_delete->IUIDoneYesNo2->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->UPTTestDate2->Visible) { // UPTTestDate2 ?>
		<th class="<?php echo $monitor_treatment_plan_delete->UPTTestDate2->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_UPTTestDate2" class="monitor_treatment_plan_UPTTestDate2"><?php echo $monitor_treatment_plan_delete->UPTTestDate2->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->UPTTestYesNo2->Visible) { // UPTTestYesNo2 ?>
		<th class="<?php echo $monitor_treatment_plan_delete->UPTTestYesNo2->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_UPTTestYesNo2" class="monitor_treatment_plan_UPTTestYesNo2"><?php echo $monitor_treatment_plan_delete->UPTTestYesNo2->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->IUIDoneDate3->Visible) { // IUIDoneDate3 ?>
		<th class="<?php echo $monitor_treatment_plan_delete->IUIDoneDate3->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_IUIDoneDate3" class="monitor_treatment_plan_IUIDoneDate3"><?php echo $monitor_treatment_plan_delete->IUIDoneDate3->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->IUIDoneYesNo3->Visible) { // IUIDoneYesNo3 ?>
		<th class="<?php echo $monitor_treatment_plan_delete->IUIDoneYesNo3->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_IUIDoneYesNo3" class="monitor_treatment_plan_IUIDoneYesNo3"><?php echo $monitor_treatment_plan_delete->IUIDoneYesNo3->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->UPTTestDate3->Visible) { // UPTTestDate3 ?>
		<th class="<?php echo $monitor_treatment_plan_delete->UPTTestDate3->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_UPTTestDate3" class="monitor_treatment_plan_UPTTestDate3"><?php echo $monitor_treatment_plan_delete->UPTTestDate3->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->UPTTestYesNo3->Visible) { // UPTTestYesNo3 ?>
		<th class="<?php echo $monitor_treatment_plan_delete->UPTTestYesNo3->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_UPTTestYesNo3" class="monitor_treatment_plan_UPTTestYesNo3"><?php echo $monitor_treatment_plan_delete->UPTTestYesNo3->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->IUIDoneDate4->Visible) { // IUIDoneDate4 ?>
		<th class="<?php echo $monitor_treatment_plan_delete->IUIDoneDate4->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_IUIDoneDate4" class="monitor_treatment_plan_IUIDoneDate4"><?php echo $monitor_treatment_plan_delete->IUIDoneDate4->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->IUIDoneYesNo4->Visible) { // IUIDoneYesNo4 ?>
		<th class="<?php echo $monitor_treatment_plan_delete->IUIDoneYesNo4->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_IUIDoneYesNo4" class="monitor_treatment_plan_IUIDoneYesNo4"><?php echo $monitor_treatment_plan_delete->IUIDoneYesNo4->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->UPTTestDate4->Visible) { // UPTTestDate4 ?>
		<th class="<?php echo $monitor_treatment_plan_delete->UPTTestDate4->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_UPTTestDate4" class="monitor_treatment_plan_UPTTestDate4"><?php echo $monitor_treatment_plan_delete->UPTTestDate4->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->UPTTestYesNo4->Visible) { // UPTTestYesNo4 ?>
		<th class="<?php echo $monitor_treatment_plan_delete->UPTTestYesNo4->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_UPTTestYesNo4" class="monitor_treatment_plan_UPTTestYesNo4"><?php echo $monitor_treatment_plan_delete->UPTTestYesNo4->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->IVFStimulationDate->Visible) { // IVFStimulationDate ?>
		<th class="<?php echo $monitor_treatment_plan_delete->IVFStimulationDate->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_IVFStimulationDate" class="monitor_treatment_plan_IVFStimulationDate"><?php echo $monitor_treatment_plan_delete->IVFStimulationDate->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->IVFStimulationYesNo->Visible) { // IVFStimulationYesNo ?>
		<th class="<?php echo $monitor_treatment_plan_delete->IVFStimulationYesNo->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_IVFStimulationYesNo" class="monitor_treatment_plan_IVFStimulationYesNo"><?php echo $monitor_treatment_plan_delete->IVFStimulationYesNo->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->OPUDate->Visible) { // OPUDate ?>
		<th class="<?php echo $monitor_treatment_plan_delete->OPUDate->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_OPUDate" class="monitor_treatment_plan_OPUDate"><?php echo $monitor_treatment_plan_delete->OPUDate->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->OPUYesNo->Visible) { // OPUYesNo ?>
		<th class="<?php echo $monitor_treatment_plan_delete->OPUYesNo->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_OPUYesNo" class="monitor_treatment_plan_OPUYesNo"><?php echo $monitor_treatment_plan_delete->OPUYesNo->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->ETDate->Visible) { // ETDate ?>
		<th class="<?php echo $monitor_treatment_plan_delete->ETDate->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_ETDate" class="monitor_treatment_plan_ETDate"><?php echo $monitor_treatment_plan_delete->ETDate->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->ETYesNo->Visible) { // ETYesNo ?>
		<th class="<?php echo $monitor_treatment_plan_delete->ETYesNo->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_ETYesNo" class="monitor_treatment_plan_ETYesNo"><?php echo $monitor_treatment_plan_delete->ETYesNo->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->BetaHCGDate->Visible) { // BetaHCGDate ?>
		<th class="<?php echo $monitor_treatment_plan_delete->BetaHCGDate->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_BetaHCGDate" class="monitor_treatment_plan_BetaHCGDate"><?php echo $monitor_treatment_plan_delete->BetaHCGDate->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->BetaHCGYesNo->Visible) { // BetaHCGYesNo ?>
		<th class="<?php echo $monitor_treatment_plan_delete->BetaHCGYesNo->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_BetaHCGYesNo" class="monitor_treatment_plan_BetaHCGYesNo"><?php echo $monitor_treatment_plan_delete->BetaHCGYesNo->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->FETDate->Visible) { // FETDate ?>
		<th class="<?php echo $monitor_treatment_plan_delete->FETDate->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_FETDate" class="monitor_treatment_plan_FETDate"><?php echo $monitor_treatment_plan_delete->FETDate->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->FETYesNo->Visible) { // FETYesNo ?>
		<th class="<?php echo $monitor_treatment_plan_delete->FETYesNo->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_FETYesNo" class="monitor_treatment_plan_FETYesNo"><?php echo $monitor_treatment_plan_delete->FETYesNo->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->FBetaHCGDate->Visible) { // FBetaHCGDate ?>
		<th class="<?php echo $monitor_treatment_plan_delete->FBetaHCGDate->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_FBetaHCGDate" class="monitor_treatment_plan_FBetaHCGDate"><?php echo $monitor_treatment_plan_delete->FBetaHCGDate->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->FBetaHCGYesNo->Visible) { // FBetaHCGYesNo ?>
		<th class="<?php echo $monitor_treatment_plan_delete->FBetaHCGYesNo->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_FBetaHCGYesNo" class="monitor_treatment_plan_FBetaHCGYesNo"><?php echo $monitor_treatment_plan_delete->FBetaHCGYesNo->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->createdby->Visible) { // createdby ?>
		<th class="<?php echo $monitor_treatment_plan_delete->createdby->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_createdby" class="monitor_treatment_plan_createdby"><?php echo $monitor_treatment_plan_delete->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $monitor_treatment_plan_delete->createddatetime->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_createddatetime" class="monitor_treatment_plan_createddatetime"><?php echo $monitor_treatment_plan_delete->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $monitor_treatment_plan_delete->modifiedby->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_modifiedby" class="monitor_treatment_plan_modifiedby"><?php echo $monitor_treatment_plan_delete->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $monitor_treatment_plan_delete->modifieddatetime->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_modifieddatetime" class="monitor_treatment_plan_modifieddatetime"><?php echo $monitor_treatment_plan_delete->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->HospID->Visible) { // HospID ?>
		<th class="<?php echo $monitor_treatment_plan_delete->HospID->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_HospID" class="monitor_treatment_plan_HospID"><?php echo $monitor_treatment_plan_delete->HospID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$monitor_treatment_plan_delete->RecordCount = 0;
$i = 0;
while (!$monitor_treatment_plan_delete->Recordset->EOF) {
	$monitor_treatment_plan_delete->RecordCount++;
	$monitor_treatment_plan_delete->RowCount++;

	// Set row properties
	$monitor_treatment_plan->resetAttributes();
	$monitor_treatment_plan->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$monitor_treatment_plan_delete->loadRowValues($monitor_treatment_plan_delete->Recordset);

	// Render row
	$monitor_treatment_plan_delete->renderRow();
?>
	<tr <?php echo $monitor_treatment_plan->rowAttributes() ?>>
<?php if ($monitor_treatment_plan_delete->id->Visible) { // id ?>
		<td <?php echo $monitor_treatment_plan_delete->id->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCount ?>_monitor_treatment_plan_id" class="monitor_treatment_plan_id">
<span<?php echo $monitor_treatment_plan_delete->id->viewAttributes() ?>><?php echo $monitor_treatment_plan_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->PatId->Visible) { // PatId ?>
		<td <?php echo $monitor_treatment_plan_delete->PatId->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCount ?>_monitor_treatment_plan_PatId" class="monitor_treatment_plan_PatId">
<span<?php echo $monitor_treatment_plan_delete->PatId->viewAttributes() ?>><?php echo $monitor_treatment_plan_delete->PatId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->PatientId->Visible) { // PatientId ?>
		<td <?php echo $monitor_treatment_plan_delete->PatientId->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCount ?>_monitor_treatment_plan_PatientId" class="monitor_treatment_plan_PatientId">
<span<?php echo $monitor_treatment_plan_delete->PatientId->viewAttributes() ?>><?php echo $monitor_treatment_plan_delete->PatientId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->PatientName->Visible) { // PatientName ?>
		<td <?php echo $monitor_treatment_plan_delete->PatientName->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCount ?>_monitor_treatment_plan_PatientName" class="monitor_treatment_plan_PatientName">
<span<?php echo $monitor_treatment_plan_delete->PatientName->viewAttributes() ?>><?php echo $monitor_treatment_plan_delete->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->Age->Visible) { // Age ?>
		<td <?php echo $monitor_treatment_plan_delete->Age->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCount ?>_monitor_treatment_plan_Age" class="monitor_treatment_plan_Age">
<span<?php echo $monitor_treatment_plan_delete->Age->viewAttributes() ?>><?php echo $monitor_treatment_plan_delete->Age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->MobileNo->Visible) { // MobileNo ?>
		<td <?php echo $monitor_treatment_plan_delete->MobileNo->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCount ?>_monitor_treatment_plan_MobileNo" class="monitor_treatment_plan_MobileNo">
<span<?php echo $monitor_treatment_plan_delete->MobileNo->viewAttributes() ?>><?php echo $monitor_treatment_plan_delete->MobileNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->ConsultantName->Visible) { // ConsultantName ?>
		<td <?php echo $monitor_treatment_plan_delete->ConsultantName->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCount ?>_monitor_treatment_plan_ConsultantName" class="monitor_treatment_plan_ConsultantName">
<span<?php echo $monitor_treatment_plan_delete->ConsultantName->viewAttributes() ?>><?php echo $monitor_treatment_plan_delete->ConsultantName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->RefDrName->Visible) { // RefDrName ?>
		<td <?php echo $monitor_treatment_plan_delete->RefDrName->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCount ?>_monitor_treatment_plan_RefDrName" class="monitor_treatment_plan_RefDrName">
<span<?php echo $monitor_treatment_plan_delete->RefDrName->viewAttributes() ?>><?php echo $monitor_treatment_plan_delete->RefDrName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->RefDrMobileNo->Visible) { // RefDrMobileNo ?>
		<td <?php echo $monitor_treatment_plan_delete->RefDrMobileNo->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCount ?>_monitor_treatment_plan_RefDrMobileNo" class="monitor_treatment_plan_RefDrMobileNo">
<span<?php echo $monitor_treatment_plan_delete->RefDrMobileNo->viewAttributes() ?>><?php echo $monitor_treatment_plan_delete->RefDrMobileNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->NewVisitDate->Visible) { // NewVisitDate ?>
		<td <?php echo $monitor_treatment_plan_delete->NewVisitDate->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCount ?>_monitor_treatment_plan_NewVisitDate" class="monitor_treatment_plan_NewVisitDate">
<span<?php echo $monitor_treatment_plan_delete->NewVisitDate->viewAttributes() ?>><?php echo $monitor_treatment_plan_delete->NewVisitDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->NewVisitYesNo->Visible) { // NewVisitYesNo ?>
		<td <?php echo $monitor_treatment_plan_delete->NewVisitYesNo->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCount ?>_monitor_treatment_plan_NewVisitYesNo" class="monitor_treatment_plan_NewVisitYesNo">
<span<?php echo $monitor_treatment_plan_delete->NewVisitYesNo->viewAttributes() ?>><?php echo $monitor_treatment_plan_delete->NewVisitYesNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->Treatment->Visible) { // Treatment ?>
		<td <?php echo $monitor_treatment_plan_delete->Treatment->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCount ?>_monitor_treatment_plan_Treatment" class="monitor_treatment_plan_Treatment">
<span<?php echo $monitor_treatment_plan_delete->Treatment->viewAttributes() ?>><?php echo $monitor_treatment_plan_delete->Treatment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->IUIDoneDate1->Visible) { // IUIDoneDate1 ?>
		<td <?php echo $monitor_treatment_plan_delete->IUIDoneDate1->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCount ?>_monitor_treatment_plan_IUIDoneDate1" class="monitor_treatment_plan_IUIDoneDate1">
<span<?php echo $monitor_treatment_plan_delete->IUIDoneDate1->viewAttributes() ?>><?php echo $monitor_treatment_plan_delete->IUIDoneDate1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->IUIDoneYesNo1->Visible) { // IUIDoneYesNo1 ?>
		<td <?php echo $monitor_treatment_plan_delete->IUIDoneYesNo1->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCount ?>_monitor_treatment_plan_IUIDoneYesNo1" class="monitor_treatment_plan_IUIDoneYesNo1">
<span<?php echo $monitor_treatment_plan_delete->IUIDoneYesNo1->viewAttributes() ?>><?php echo $monitor_treatment_plan_delete->IUIDoneYesNo1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->UPTTestDate1->Visible) { // UPTTestDate1 ?>
		<td <?php echo $monitor_treatment_plan_delete->UPTTestDate1->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCount ?>_monitor_treatment_plan_UPTTestDate1" class="monitor_treatment_plan_UPTTestDate1">
<span<?php echo $monitor_treatment_plan_delete->UPTTestDate1->viewAttributes() ?>><?php echo $monitor_treatment_plan_delete->UPTTestDate1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->UPTTestYesNo1->Visible) { // UPTTestYesNo1 ?>
		<td <?php echo $monitor_treatment_plan_delete->UPTTestYesNo1->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCount ?>_monitor_treatment_plan_UPTTestYesNo1" class="monitor_treatment_plan_UPTTestYesNo1">
<span<?php echo $monitor_treatment_plan_delete->UPTTestYesNo1->viewAttributes() ?>><?php echo $monitor_treatment_plan_delete->UPTTestYesNo1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->IUIDoneDate2->Visible) { // IUIDoneDate2 ?>
		<td <?php echo $monitor_treatment_plan_delete->IUIDoneDate2->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCount ?>_monitor_treatment_plan_IUIDoneDate2" class="monitor_treatment_plan_IUIDoneDate2">
<span<?php echo $monitor_treatment_plan_delete->IUIDoneDate2->viewAttributes() ?>><?php echo $monitor_treatment_plan_delete->IUIDoneDate2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->IUIDoneYesNo2->Visible) { // IUIDoneYesNo2 ?>
		<td <?php echo $monitor_treatment_plan_delete->IUIDoneYesNo2->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCount ?>_monitor_treatment_plan_IUIDoneYesNo2" class="monitor_treatment_plan_IUIDoneYesNo2">
<span<?php echo $monitor_treatment_plan_delete->IUIDoneYesNo2->viewAttributes() ?>><?php echo $monitor_treatment_plan_delete->IUIDoneYesNo2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->UPTTestDate2->Visible) { // UPTTestDate2 ?>
		<td <?php echo $monitor_treatment_plan_delete->UPTTestDate2->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCount ?>_monitor_treatment_plan_UPTTestDate2" class="monitor_treatment_plan_UPTTestDate2">
<span<?php echo $monitor_treatment_plan_delete->UPTTestDate2->viewAttributes() ?>><?php echo $monitor_treatment_plan_delete->UPTTestDate2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->UPTTestYesNo2->Visible) { // UPTTestYesNo2 ?>
		<td <?php echo $monitor_treatment_plan_delete->UPTTestYesNo2->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCount ?>_monitor_treatment_plan_UPTTestYesNo2" class="monitor_treatment_plan_UPTTestYesNo2">
<span<?php echo $monitor_treatment_plan_delete->UPTTestYesNo2->viewAttributes() ?>><?php echo $monitor_treatment_plan_delete->UPTTestYesNo2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->IUIDoneDate3->Visible) { // IUIDoneDate3 ?>
		<td <?php echo $monitor_treatment_plan_delete->IUIDoneDate3->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCount ?>_monitor_treatment_plan_IUIDoneDate3" class="monitor_treatment_plan_IUIDoneDate3">
<span<?php echo $monitor_treatment_plan_delete->IUIDoneDate3->viewAttributes() ?>><?php echo $monitor_treatment_plan_delete->IUIDoneDate3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->IUIDoneYesNo3->Visible) { // IUIDoneYesNo3 ?>
		<td <?php echo $monitor_treatment_plan_delete->IUIDoneYesNo3->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCount ?>_monitor_treatment_plan_IUIDoneYesNo3" class="monitor_treatment_plan_IUIDoneYesNo3">
<span<?php echo $monitor_treatment_plan_delete->IUIDoneYesNo3->viewAttributes() ?>><?php echo $monitor_treatment_plan_delete->IUIDoneYesNo3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->UPTTestDate3->Visible) { // UPTTestDate3 ?>
		<td <?php echo $monitor_treatment_plan_delete->UPTTestDate3->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCount ?>_monitor_treatment_plan_UPTTestDate3" class="monitor_treatment_plan_UPTTestDate3">
<span<?php echo $monitor_treatment_plan_delete->UPTTestDate3->viewAttributes() ?>><?php echo $monitor_treatment_plan_delete->UPTTestDate3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->UPTTestYesNo3->Visible) { // UPTTestYesNo3 ?>
		<td <?php echo $monitor_treatment_plan_delete->UPTTestYesNo3->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCount ?>_monitor_treatment_plan_UPTTestYesNo3" class="monitor_treatment_plan_UPTTestYesNo3">
<span<?php echo $monitor_treatment_plan_delete->UPTTestYesNo3->viewAttributes() ?>><?php echo $monitor_treatment_plan_delete->UPTTestYesNo3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->IUIDoneDate4->Visible) { // IUIDoneDate4 ?>
		<td <?php echo $monitor_treatment_plan_delete->IUIDoneDate4->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCount ?>_monitor_treatment_plan_IUIDoneDate4" class="monitor_treatment_plan_IUIDoneDate4">
<span<?php echo $monitor_treatment_plan_delete->IUIDoneDate4->viewAttributes() ?>><?php echo $monitor_treatment_plan_delete->IUIDoneDate4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->IUIDoneYesNo4->Visible) { // IUIDoneYesNo4 ?>
		<td <?php echo $monitor_treatment_plan_delete->IUIDoneYesNo4->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCount ?>_monitor_treatment_plan_IUIDoneYesNo4" class="monitor_treatment_plan_IUIDoneYesNo4">
<span<?php echo $monitor_treatment_plan_delete->IUIDoneYesNo4->viewAttributes() ?>><?php echo $monitor_treatment_plan_delete->IUIDoneYesNo4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->UPTTestDate4->Visible) { // UPTTestDate4 ?>
		<td <?php echo $monitor_treatment_plan_delete->UPTTestDate4->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCount ?>_monitor_treatment_plan_UPTTestDate4" class="monitor_treatment_plan_UPTTestDate4">
<span<?php echo $monitor_treatment_plan_delete->UPTTestDate4->viewAttributes() ?>><?php echo $monitor_treatment_plan_delete->UPTTestDate4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->UPTTestYesNo4->Visible) { // UPTTestYesNo4 ?>
		<td <?php echo $monitor_treatment_plan_delete->UPTTestYesNo4->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCount ?>_monitor_treatment_plan_UPTTestYesNo4" class="monitor_treatment_plan_UPTTestYesNo4">
<span<?php echo $monitor_treatment_plan_delete->UPTTestYesNo4->viewAttributes() ?>><?php echo $monitor_treatment_plan_delete->UPTTestYesNo4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->IVFStimulationDate->Visible) { // IVFStimulationDate ?>
		<td <?php echo $monitor_treatment_plan_delete->IVFStimulationDate->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCount ?>_monitor_treatment_plan_IVFStimulationDate" class="monitor_treatment_plan_IVFStimulationDate">
<span<?php echo $monitor_treatment_plan_delete->IVFStimulationDate->viewAttributes() ?>><?php echo $monitor_treatment_plan_delete->IVFStimulationDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->IVFStimulationYesNo->Visible) { // IVFStimulationYesNo ?>
		<td <?php echo $monitor_treatment_plan_delete->IVFStimulationYesNo->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCount ?>_monitor_treatment_plan_IVFStimulationYesNo" class="monitor_treatment_plan_IVFStimulationYesNo">
<span<?php echo $monitor_treatment_plan_delete->IVFStimulationYesNo->viewAttributes() ?>><?php echo $monitor_treatment_plan_delete->IVFStimulationYesNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->OPUDate->Visible) { // OPUDate ?>
		<td <?php echo $monitor_treatment_plan_delete->OPUDate->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCount ?>_monitor_treatment_plan_OPUDate" class="monitor_treatment_plan_OPUDate">
<span<?php echo $monitor_treatment_plan_delete->OPUDate->viewAttributes() ?>><?php echo $monitor_treatment_plan_delete->OPUDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->OPUYesNo->Visible) { // OPUYesNo ?>
		<td <?php echo $monitor_treatment_plan_delete->OPUYesNo->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCount ?>_monitor_treatment_plan_OPUYesNo" class="monitor_treatment_plan_OPUYesNo">
<span<?php echo $monitor_treatment_plan_delete->OPUYesNo->viewAttributes() ?>><?php echo $monitor_treatment_plan_delete->OPUYesNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->ETDate->Visible) { // ETDate ?>
		<td <?php echo $monitor_treatment_plan_delete->ETDate->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCount ?>_monitor_treatment_plan_ETDate" class="monitor_treatment_plan_ETDate">
<span<?php echo $monitor_treatment_plan_delete->ETDate->viewAttributes() ?>><?php echo $monitor_treatment_plan_delete->ETDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->ETYesNo->Visible) { // ETYesNo ?>
		<td <?php echo $monitor_treatment_plan_delete->ETYesNo->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCount ?>_monitor_treatment_plan_ETYesNo" class="monitor_treatment_plan_ETYesNo">
<span<?php echo $monitor_treatment_plan_delete->ETYesNo->viewAttributes() ?>><?php echo $monitor_treatment_plan_delete->ETYesNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->BetaHCGDate->Visible) { // BetaHCGDate ?>
		<td <?php echo $monitor_treatment_plan_delete->BetaHCGDate->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCount ?>_monitor_treatment_plan_BetaHCGDate" class="monitor_treatment_plan_BetaHCGDate">
<span<?php echo $monitor_treatment_plan_delete->BetaHCGDate->viewAttributes() ?>><?php echo $monitor_treatment_plan_delete->BetaHCGDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->BetaHCGYesNo->Visible) { // BetaHCGYesNo ?>
		<td <?php echo $monitor_treatment_plan_delete->BetaHCGYesNo->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCount ?>_monitor_treatment_plan_BetaHCGYesNo" class="monitor_treatment_plan_BetaHCGYesNo">
<span<?php echo $monitor_treatment_plan_delete->BetaHCGYesNo->viewAttributes() ?>><?php echo $monitor_treatment_plan_delete->BetaHCGYesNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->FETDate->Visible) { // FETDate ?>
		<td <?php echo $monitor_treatment_plan_delete->FETDate->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCount ?>_monitor_treatment_plan_FETDate" class="monitor_treatment_plan_FETDate">
<span<?php echo $monitor_treatment_plan_delete->FETDate->viewAttributes() ?>><?php echo $monitor_treatment_plan_delete->FETDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->FETYesNo->Visible) { // FETYesNo ?>
		<td <?php echo $monitor_treatment_plan_delete->FETYesNo->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCount ?>_monitor_treatment_plan_FETYesNo" class="monitor_treatment_plan_FETYesNo">
<span<?php echo $monitor_treatment_plan_delete->FETYesNo->viewAttributes() ?>><?php echo $monitor_treatment_plan_delete->FETYesNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->FBetaHCGDate->Visible) { // FBetaHCGDate ?>
		<td <?php echo $monitor_treatment_plan_delete->FBetaHCGDate->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCount ?>_monitor_treatment_plan_FBetaHCGDate" class="monitor_treatment_plan_FBetaHCGDate">
<span<?php echo $monitor_treatment_plan_delete->FBetaHCGDate->viewAttributes() ?>><?php echo $monitor_treatment_plan_delete->FBetaHCGDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->FBetaHCGYesNo->Visible) { // FBetaHCGYesNo ?>
		<td <?php echo $monitor_treatment_plan_delete->FBetaHCGYesNo->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCount ?>_monitor_treatment_plan_FBetaHCGYesNo" class="monitor_treatment_plan_FBetaHCGYesNo">
<span<?php echo $monitor_treatment_plan_delete->FBetaHCGYesNo->viewAttributes() ?>><?php echo $monitor_treatment_plan_delete->FBetaHCGYesNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->createdby->Visible) { // createdby ?>
		<td <?php echo $monitor_treatment_plan_delete->createdby->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCount ?>_monitor_treatment_plan_createdby" class="monitor_treatment_plan_createdby">
<span<?php echo $monitor_treatment_plan_delete->createdby->viewAttributes() ?>><?php echo $monitor_treatment_plan_delete->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->createddatetime->Visible) { // createddatetime ?>
		<td <?php echo $monitor_treatment_plan_delete->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCount ?>_monitor_treatment_plan_createddatetime" class="monitor_treatment_plan_createddatetime">
<span<?php echo $monitor_treatment_plan_delete->createddatetime->viewAttributes() ?>><?php echo $monitor_treatment_plan_delete->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->modifiedby->Visible) { // modifiedby ?>
		<td <?php echo $monitor_treatment_plan_delete->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCount ?>_monitor_treatment_plan_modifiedby" class="monitor_treatment_plan_modifiedby">
<span<?php echo $monitor_treatment_plan_delete->modifiedby->viewAttributes() ?>><?php echo $monitor_treatment_plan_delete->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<td <?php echo $monitor_treatment_plan_delete->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCount ?>_monitor_treatment_plan_modifieddatetime" class="monitor_treatment_plan_modifieddatetime">
<span<?php echo $monitor_treatment_plan_delete->modifieddatetime->viewAttributes() ?>><?php echo $monitor_treatment_plan_delete->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($monitor_treatment_plan_delete->HospID->Visible) { // HospID ?>
		<td <?php echo $monitor_treatment_plan_delete->HospID->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_delete->RowCount ?>_monitor_treatment_plan_HospID" class="monitor_treatment_plan_HospID">
<span<?php echo $monitor_treatment_plan_delete->HospID->viewAttributes() ?>><?php echo $monitor_treatment_plan_delete->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$monitor_treatment_plan_delete->Recordset->moveNext();
}
$monitor_treatment_plan_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $monitor_treatment_plan_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$monitor_treatment_plan_delete->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$monitor_treatment_plan_delete->terminate();
?>