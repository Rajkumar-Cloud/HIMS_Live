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
$ivf_otherprocedure_delete = new ivf_otherprocedure_delete();

// Run the page
$ivf_otherprocedure_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_otherprocedure_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fivf_otherproceduredelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fivf_otherproceduredelete = currentForm = new ew.Form("fivf_otherproceduredelete", "delete");
	loadjs.done("fivf_otherproceduredelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $ivf_otherprocedure_delete->showPageHeader(); ?>
<?php
$ivf_otherprocedure_delete->showMessage();
?>
<form name="fivf_otherproceduredelete" id="fivf_otherproceduredelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_otherprocedure">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($ivf_otherprocedure_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($ivf_otherprocedure_delete->id->Visible) { // id ?>
		<th class="<?php echo $ivf_otherprocedure_delete->id->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_id" class="ivf_otherprocedure_id"><?php echo $ivf_otherprocedure_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_otherprocedure_delete->RIDNO->Visible) { // RIDNO ?>
		<th class="<?php echo $ivf_otherprocedure_delete->RIDNO->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_RIDNO" class="ivf_otherprocedure_RIDNO"><?php echo $ivf_otherprocedure_delete->RIDNO->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_otherprocedure_delete->Name->Visible) { // Name ?>
		<th class="<?php echo $ivf_otherprocedure_delete->Name->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_Name" class="ivf_otherprocedure_Name"><?php echo $ivf_otherprocedure_delete->Name->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_otherprocedure_delete->DateofAdmission->Visible) { // DateofAdmission ?>
		<th class="<?php echo $ivf_otherprocedure_delete->DateofAdmission->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_DateofAdmission" class="ivf_otherprocedure_DateofAdmission"><?php echo $ivf_otherprocedure_delete->DateofAdmission->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_otherprocedure_delete->DateofProcedure->Visible) { // DateofProcedure ?>
		<th class="<?php echo $ivf_otherprocedure_delete->DateofProcedure->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_DateofProcedure" class="ivf_otherprocedure_DateofProcedure"><?php echo $ivf_otherprocedure_delete->DateofProcedure->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_otherprocedure_delete->DateofDischarge->Visible) { // DateofDischarge ?>
		<th class="<?php echo $ivf_otherprocedure_delete->DateofDischarge->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_DateofDischarge" class="ivf_otherprocedure_DateofDischarge"><?php echo $ivf_otherprocedure_delete->DateofDischarge->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_otherprocedure_delete->Consultant->Visible) { // Consultant ?>
		<th class="<?php echo $ivf_otherprocedure_delete->Consultant->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_Consultant" class="ivf_otherprocedure_Consultant"><?php echo $ivf_otherprocedure_delete->Consultant->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_otherprocedure_delete->Surgeon->Visible) { // Surgeon ?>
		<th class="<?php echo $ivf_otherprocedure_delete->Surgeon->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_Surgeon" class="ivf_otherprocedure_Surgeon"><?php echo $ivf_otherprocedure_delete->Surgeon->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_otherprocedure_delete->Anesthetist->Visible) { // Anesthetist ?>
		<th class="<?php echo $ivf_otherprocedure_delete->Anesthetist->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_Anesthetist" class="ivf_otherprocedure_Anesthetist"><?php echo $ivf_otherprocedure_delete->Anesthetist->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_otherprocedure_delete->IdentificationMark->Visible) { // IdentificationMark ?>
		<th class="<?php echo $ivf_otherprocedure_delete->IdentificationMark->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_IdentificationMark" class="ivf_otherprocedure_IdentificationMark"><?php echo $ivf_otherprocedure_delete->IdentificationMark->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_otherprocedure_delete->ProcedureDone->Visible) { // ProcedureDone ?>
		<th class="<?php echo $ivf_otherprocedure_delete->ProcedureDone->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_ProcedureDone" class="ivf_otherprocedure_ProcedureDone"><?php echo $ivf_otherprocedure_delete->ProcedureDone->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_otherprocedure_delete->PROVISIONALDIAGNOSIS->Visible) { // PROVISIONALDIAGNOSIS ?>
		<th class="<?php echo $ivf_otherprocedure_delete->PROVISIONALDIAGNOSIS->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_PROVISIONALDIAGNOSIS" class="ivf_otherprocedure_PROVISIONALDIAGNOSIS"><?php echo $ivf_otherprocedure_delete->PROVISIONALDIAGNOSIS->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_otherprocedure_delete->Chiefcomplaints->Visible) { // Chiefcomplaints ?>
		<th class="<?php echo $ivf_otherprocedure_delete->Chiefcomplaints->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_Chiefcomplaints" class="ivf_otherprocedure_Chiefcomplaints"><?php echo $ivf_otherprocedure_delete->Chiefcomplaints->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_otherprocedure_delete->MaritallHistory->Visible) { // MaritallHistory ?>
		<th class="<?php echo $ivf_otherprocedure_delete->MaritallHistory->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_MaritallHistory" class="ivf_otherprocedure_MaritallHistory"><?php echo $ivf_otherprocedure_delete->MaritallHistory->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_otherprocedure_delete->MenstrualHistory->Visible) { // MenstrualHistory ?>
		<th class="<?php echo $ivf_otherprocedure_delete->MenstrualHistory->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_MenstrualHistory" class="ivf_otherprocedure_MenstrualHistory"><?php echo $ivf_otherprocedure_delete->MenstrualHistory->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_otherprocedure_delete->SurgicalHistory->Visible) { // SurgicalHistory ?>
		<th class="<?php echo $ivf_otherprocedure_delete->SurgicalHistory->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_SurgicalHistory" class="ivf_otherprocedure_SurgicalHistory"><?php echo $ivf_otherprocedure_delete->SurgicalHistory->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_otherprocedure_delete->PastHistory->Visible) { // PastHistory ?>
		<th class="<?php echo $ivf_otherprocedure_delete->PastHistory->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_PastHistory" class="ivf_otherprocedure_PastHistory"><?php echo $ivf_otherprocedure_delete->PastHistory->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_otherprocedure_delete->FamilyHistory->Visible) { // FamilyHistory ?>
		<th class="<?php echo $ivf_otherprocedure_delete->FamilyHistory->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_FamilyHistory" class="ivf_otherprocedure_FamilyHistory"><?php echo $ivf_otherprocedure_delete->FamilyHistory->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_otherprocedure_delete->Temp->Visible) { // Temp ?>
		<th class="<?php echo $ivf_otherprocedure_delete->Temp->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_Temp" class="ivf_otherprocedure_Temp"><?php echo $ivf_otherprocedure_delete->Temp->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_otherprocedure_delete->Pulse->Visible) { // Pulse ?>
		<th class="<?php echo $ivf_otherprocedure_delete->Pulse->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_Pulse" class="ivf_otherprocedure_Pulse"><?php echo $ivf_otherprocedure_delete->Pulse->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_otherprocedure_delete->BP->Visible) { // BP ?>
		<th class="<?php echo $ivf_otherprocedure_delete->BP->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_BP" class="ivf_otherprocedure_BP"><?php echo $ivf_otherprocedure_delete->BP->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_otherprocedure_delete->CNS->Visible) { // CNS ?>
		<th class="<?php echo $ivf_otherprocedure_delete->CNS->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_CNS" class="ivf_otherprocedure_CNS"><?php echo $ivf_otherprocedure_delete->CNS->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_otherprocedure_delete->_RS->Visible) { // RS ?>
		<th class="<?php echo $ivf_otherprocedure_delete->_RS->headerCellClass() ?>"><span id="elh_ivf_otherprocedure__RS" class="ivf_otherprocedure__RS"><?php echo $ivf_otherprocedure_delete->_RS->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_otherprocedure_delete->CVS->Visible) { // CVS ?>
		<th class="<?php echo $ivf_otherprocedure_delete->CVS->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_CVS" class="ivf_otherprocedure_CVS"><?php echo $ivf_otherprocedure_delete->CVS->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_otherprocedure_delete->PA->Visible) { // PA ?>
		<th class="<?php echo $ivf_otherprocedure_delete->PA->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_PA" class="ivf_otherprocedure_PA"><?php echo $ivf_otherprocedure_delete->PA->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_otherprocedure_delete->InvestigationReport->Visible) { // InvestigationReport ?>
		<th class="<?php echo $ivf_otherprocedure_delete->InvestigationReport->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_InvestigationReport" class="ivf_otherprocedure_InvestigationReport"><?php echo $ivf_otherprocedure_delete->InvestigationReport->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_otherprocedure_delete->TidNo->Visible) { // TidNo ?>
		<th class="<?php echo $ivf_otherprocedure_delete->TidNo->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_TidNo" class="ivf_otherprocedure_TidNo"><?php echo $ivf_otherprocedure_delete->TidNo->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$ivf_otherprocedure_delete->RecordCount = 0;
$i = 0;
while (!$ivf_otherprocedure_delete->Recordset->EOF) {
	$ivf_otherprocedure_delete->RecordCount++;
	$ivf_otherprocedure_delete->RowCount++;

	// Set row properties
	$ivf_otherprocedure->resetAttributes();
	$ivf_otherprocedure->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$ivf_otherprocedure_delete->loadRowValues($ivf_otherprocedure_delete->Recordset);

	// Render row
	$ivf_otherprocedure_delete->renderRow();
?>
	<tr <?php echo $ivf_otherprocedure->rowAttributes() ?>>
<?php if ($ivf_otherprocedure_delete->id->Visible) { // id ?>
		<td <?php echo $ivf_otherprocedure_delete->id->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_delete->RowCount ?>_ivf_otherprocedure_id" class="ivf_otherprocedure_id">
<span<?php echo $ivf_otherprocedure_delete->id->viewAttributes() ?>><?php echo $ivf_otherprocedure_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure_delete->RIDNO->Visible) { // RIDNO ?>
		<td <?php echo $ivf_otherprocedure_delete->RIDNO->cellAttributes() ?>>
<script id="orig<?php echo $ivf_otherprocedure_delete->RowCount ?>_ivf_otherprocedure_RIDNO" class="ivf_otherprocedureedit" type="text/html">
<?php echo $ivf_otherprocedure_delete->RIDNO->getViewValue() ?>
</script>
<span id="el<?php echo $ivf_otherprocedure_delete->RowCount ?>_ivf_otherprocedure_RIDNO" class="ivf_otherprocedure_RIDNO">
<span<?php echo $ivf_otherprocedure_delete->RIDNO->viewAttributes() ?>><?php echo Barcode()->show($ivf_otherprocedure_delete->RIDNO->CurrentValue, 'EAN-13', 60) ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure_delete->Name->Visible) { // Name ?>
		<td <?php echo $ivf_otherprocedure_delete->Name->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_delete->RowCount ?>_ivf_otherprocedure_Name" class="ivf_otherprocedure_Name">
<span<?php echo $ivf_otherprocedure_delete->Name->viewAttributes() ?>><?php echo $ivf_otherprocedure_delete->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure_delete->DateofAdmission->Visible) { // DateofAdmission ?>
		<td <?php echo $ivf_otherprocedure_delete->DateofAdmission->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_delete->RowCount ?>_ivf_otherprocedure_DateofAdmission" class="ivf_otherprocedure_DateofAdmission">
<span<?php echo $ivf_otherprocedure_delete->DateofAdmission->viewAttributes() ?>><?php echo $ivf_otherprocedure_delete->DateofAdmission->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure_delete->DateofProcedure->Visible) { // DateofProcedure ?>
		<td <?php echo $ivf_otherprocedure_delete->DateofProcedure->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_delete->RowCount ?>_ivf_otherprocedure_DateofProcedure" class="ivf_otherprocedure_DateofProcedure">
<span<?php echo $ivf_otherprocedure_delete->DateofProcedure->viewAttributes() ?>><?php echo $ivf_otherprocedure_delete->DateofProcedure->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure_delete->DateofDischarge->Visible) { // DateofDischarge ?>
		<td <?php echo $ivf_otherprocedure_delete->DateofDischarge->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_delete->RowCount ?>_ivf_otherprocedure_DateofDischarge" class="ivf_otherprocedure_DateofDischarge">
<span<?php echo $ivf_otherprocedure_delete->DateofDischarge->viewAttributes() ?>><?php echo $ivf_otherprocedure_delete->DateofDischarge->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure_delete->Consultant->Visible) { // Consultant ?>
		<td <?php echo $ivf_otherprocedure_delete->Consultant->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_delete->RowCount ?>_ivf_otherprocedure_Consultant" class="ivf_otherprocedure_Consultant">
<span<?php echo $ivf_otherprocedure_delete->Consultant->viewAttributes() ?>><?php echo $ivf_otherprocedure_delete->Consultant->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure_delete->Surgeon->Visible) { // Surgeon ?>
		<td <?php echo $ivf_otherprocedure_delete->Surgeon->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_delete->RowCount ?>_ivf_otherprocedure_Surgeon" class="ivf_otherprocedure_Surgeon">
<span<?php echo $ivf_otherprocedure_delete->Surgeon->viewAttributes() ?>><?php echo $ivf_otherprocedure_delete->Surgeon->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure_delete->Anesthetist->Visible) { // Anesthetist ?>
		<td <?php echo $ivf_otherprocedure_delete->Anesthetist->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_delete->RowCount ?>_ivf_otherprocedure_Anesthetist" class="ivf_otherprocedure_Anesthetist">
<span<?php echo $ivf_otherprocedure_delete->Anesthetist->viewAttributes() ?>><?php echo $ivf_otherprocedure_delete->Anesthetist->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure_delete->IdentificationMark->Visible) { // IdentificationMark ?>
		<td <?php echo $ivf_otherprocedure_delete->IdentificationMark->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_delete->RowCount ?>_ivf_otherprocedure_IdentificationMark" class="ivf_otherprocedure_IdentificationMark">
<span<?php echo $ivf_otherprocedure_delete->IdentificationMark->viewAttributes() ?>><?php echo $ivf_otherprocedure_delete->IdentificationMark->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure_delete->ProcedureDone->Visible) { // ProcedureDone ?>
		<td <?php echo $ivf_otherprocedure_delete->ProcedureDone->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_delete->RowCount ?>_ivf_otherprocedure_ProcedureDone" class="ivf_otherprocedure_ProcedureDone">
<span<?php echo $ivf_otherprocedure_delete->ProcedureDone->viewAttributes() ?>><?php echo $ivf_otherprocedure_delete->ProcedureDone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure_delete->PROVISIONALDIAGNOSIS->Visible) { // PROVISIONALDIAGNOSIS ?>
		<td <?php echo $ivf_otherprocedure_delete->PROVISIONALDIAGNOSIS->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_delete->RowCount ?>_ivf_otherprocedure_PROVISIONALDIAGNOSIS" class="ivf_otherprocedure_PROVISIONALDIAGNOSIS">
<span<?php echo $ivf_otherprocedure_delete->PROVISIONALDIAGNOSIS->viewAttributes() ?>><?php echo $ivf_otherprocedure_delete->PROVISIONALDIAGNOSIS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure_delete->Chiefcomplaints->Visible) { // Chiefcomplaints ?>
		<td <?php echo $ivf_otherprocedure_delete->Chiefcomplaints->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_delete->RowCount ?>_ivf_otherprocedure_Chiefcomplaints" class="ivf_otherprocedure_Chiefcomplaints">
<span<?php echo $ivf_otherprocedure_delete->Chiefcomplaints->viewAttributes() ?>><?php echo $ivf_otherprocedure_delete->Chiefcomplaints->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure_delete->MaritallHistory->Visible) { // MaritallHistory ?>
		<td <?php echo $ivf_otherprocedure_delete->MaritallHistory->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_delete->RowCount ?>_ivf_otherprocedure_MaritallHistory" class="ivf_otherprocedure_MaritallHistory">
<span<?php echo $ivf_otherprocedure_delete->MaritallHistory->viewAttributes() ?>><?php echo $ivf_otherprocedure_delete->MaritallHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure_delete->MenstrualHistory->Visible) { // MenstrualHistory ?>
		<td <?php echo $ivf_otherprocedure_delete->MenstrualHistory->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_delete->RowCount ?>_ivf_otherprocedure_MenstrualHistory" class="ivf_otherprocedure_MenstrualHistory">
<span<?php echo $ivf_otherprocedure_delete->MenstrualHistory->viewAttributes() ?>><?php echo $ivf_otherprocedure_delete->MenstrualHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure_delete->SurgicalHistory->Visible) { // SurgicalHistory ?>
		<td <?php echo $ivf_otherprocedure_delete->SurgicalHistory->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_delete->RowCount ?>_ivf_otherprocedure_SurgicalHistory" class="ivf_otherprocedure_SurgicalHistory">
<span<?php echo $ivf_otherprocedure_delete->SurgicalHistory->viewAttributes() ?>><?php echo $ivf_otherprocedure_delete->SurgicalHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure_delete->PastHistory->Visible) { // PastHistory ?>
		<td <?php echo $ivf_otherprocedure_delete->PastHistory->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_delete->RowCount ?>_ivf_otherprocedure_PastHistory" class="ivf_otherprocedure_PastHistory">
<span<?php echo $ivf_otherprocedure_delete->PastHistory->viewAttributes() ?>><?php echo $ivf_otherprocedure_delete->PastHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure_delete->FamilyHistory->Visible) { // FamilyHistory ?>
		<td <?php echo $ivf_otherprocedure_delete->FamilyHistory->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_delete->RowCount ?>_ivf_otherprocedure_FamilyHistory" class="ivf_otherprocedure_FamilyHistory">
<span<?php echo $ivf_otherprocedure_delete->FamilyHistory->viewAttributes() ?>><?php echo $ivf_otherprocedure_delete->FamilyHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure_delete->Temp->Visible) { // Temp ?>
		<td <?php echo $ivf_otherprocedure_delete->Temp->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_delete->RowCount ?>_ivf_otherprocedure_Temp" class="ivf_otherprocedure_Temp">
<span<?php echo $ivf_otherprocedure_delete->Temp->viewAttributes() ?>><?php echo $ivf_otherprocedure_delete->Temp->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure_delete->Pulse->Visible) { // Pulse ?>
		<td <?php echo $ivf_otherprocedure_delete->Pulse->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_delete->RowCount ?>_ivf_otherprocedure_Pulse" class="ivf_otherprocedure_Pulse">
<span<?php echo $ivf_otherprocedure_delete->Pulse->viewAttributes() ?>><?php echo $ivf_otherprocedure_delete->Pulse->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure_delete->BP->Visible) { // BP ?>
		<td <?php echo $ivf_otherprocedure_delete->BP->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_delete->RowCount ?>_ivf_otherprocedure_BP" class="ivf_otherprocedure_BP">
<span<?php echo $ivf_otherprocedure_delete->BP->viewAttributes() ?>><?php echo $ivf_otherprocedure_delete->BP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure_delete->CNS->Visible) { // CNS ?>
		<td <?php echo $ivf_otherprocedure_delete->CNS->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_delete->RowCount ?>_ivf_otherprocedure_CNS" class="ivf_otherprocedure_CNS">
<span<?php echo $ivf_otherprocedure_delete->CNS->viewAttributes() ?>><?php echo $ivf_otherprocedure_delete->CNS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure_delete->_RS->Visible) { // RS ?>
		<td <?php echo $ivf_otherprocedure_delete->_RS->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_delete->RowCount ?>_ivf_otherprocedure__RS" class="ivf_otherprocedure__RS">
<span<?php echo $ivf_otherprocedure_delete->_RS->viewAttributes() ?>><?php echo $ivf_otherprocedure_delete->_RS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure_delete->CVS->Visible) { // CVS ?>
		<td <?php echo $ivf_otherprocedure_delete->CVS->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_delete->RowCount ?>_ivf_otherprocedure_CVS" class="ivf_otherprocedure_CVS">
<span<?php echo $ivf_otherprocedure_delete->CVS->viewAttributes() ?>><?php echo $ivf_otherprocedure_delete->CVS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure_delete->PA->Visible) { // PA ?>
		<td <?php echo $ivf_otherprocedure_delete->PA->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_delete->RowCount ?>_ivf_otherprocedure_PA" class="ivf_otherprocedure_PA">
<span<?php echo $ivf_otherprocedure_delete->PA->viewAttributes() ?>><?php echo $ivf_otherprocedure_delete->PA->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure_delete->InvestigationReport->Visible) { // InvestigationReport ?>
		<td <?php echo $ivf_otherprocedure_delete->InvestigationReport->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_delete->RowCount ?>_ivf_otherprocedure_InvestigationReport" class="ivf_otherprocedure_InvestigationReport">
<span<?php echo $ivf_otherprocedure_delete->InvestigationReport->viewAttributes() ?>><?php echo $ivf_otherprocedure_delete->InvestigationReport->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure_delete->TidNo->Visible) { // TidNo ?>
		<td <?php echo $ivf_otherprocedure_delete->TidNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_delete->RowCount ?>_ivf_otherprocedure_TidNo" class="ivf_otherprocedure_TidNo">
<span<?php echo $ivf_otherprocedure_delete->TidNo->viewAttributes() ?>><?php echo $ivf_otherprocedure_delete->TidNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$ivf_otherprocedure_delete->Recordset->moveNext();
}
$ivf_otherprocedure_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_otherprocedure_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$ivf_otherprocedure_delete->showPageFooter();
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
$ivf_otherprocedure_delete->terminate();
?>