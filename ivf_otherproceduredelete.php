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
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fivf_otherproceduredelete = currentForm = new ew.Form("fivf_otherproceduredelete", "delete");

// Form_CustomValidate event
fivf_otherproceduredelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_otherproceduredelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivf_otherproceduredelete.lists["x_Name"] = <?php echo $ivf_otherprocedure_delete->Name->Lookup->toClientList() ?>;
fivf_otherproceduredelete.lists["x_Name"].options = <?php echo JsonEncode($ivf_otherprocedure_delete->Name->lookupOptions()) ?>;
fivf_otherproceduredelete.autoSuggests["x_Name"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fivf_otherproceduredelete.lists["x_Consultant"] = <?php echo $ivf_otherprocedure_delete->Consultant->Lookup->toClientList() ?>;
fivf_otherproceduredelete.lists["x_Consultant"].options = <?php echo JsonEncode($ivf_otherprocedure_delete->Consultant->lookupOptions()) ?>;
fivf_otherproceduredelete.lists["x_Surgeon"] = <?php echo $ivf_otherprocedure_delete->Surgeon->Lookup->toClientList() ?>;
fivf_otherproceduredelete.lists["x_Surgeon"].options = <?php echo JsonEncode($ivf_otherprocedure_delete->Surgeon->lookupOptions()) ?>;
fivf_otherproceduredelete.lists["x_Anesthetist"] = <?php echo $ivf_otherprocedure_delete->Anesthetist->Lookup->toClientList() ?>;
fivf_otherproceduredelete.lists["x_Anesthetist"].options = <?php echo JsonEncode($ivf_otherprocedure_delete->Anesthetist->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $ivf_otherprocedure_delete->showPageHeader(); ?>
<?php
$ivf_otherprocedure_delete->showMessage();
?>
<form name="fivf_otherproceduredelete" id="fivf_otherproceduredelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_otherprocedure_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_otherprocedure_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_otherprocedure">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($ivf_otherprocedure_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($ivf_otherprocedure->id->Visible) { // id ?>
		<th class="<?php echo $ivf_otherprocedure->id->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_id" class="ivf_otherprocedure_id"><?php echo $ivf_otherprocedure->id->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_otherprocedure->RIDNO->Visible) { // RIDNO ?>
		<th class="<?php echo $ivf_otherprocedure->RIDNO->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_RIDNO" class="ivf_otherprocedure_RIDNO"><?php echo $ivf_otherprocedure->RIDNO->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_otherprocedure->Name->Visible) { // Name ?>
		<th class="<?php echo $ivf_otherprocedure->Name->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_Name" class="ivf_otherprocedure_Name"><?php echo $ivf_otherprocedure->Name->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_otherprocedure->DateofAdmission->Visible) { // DateofAdmission ?>
		<th class="<?php echo $ivf_otherprocedure->DateofAdmission->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_DateofAdmission" class="ivf_otherprocedure_DateofAdmission"><?php echo $ivf_otherprocedure->DateofAdmission->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_otherprocedure->DateofProcedure->Visible) { // DateofProcedure ?>
		<th class="<?php echo $ivf_otherprocedure->DateofProcedure->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_DateofProcedure" class="ivf_otherprocedure_DateofProcedure"><?php echo $ivf_otherprocedure->DateofProcedure->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_otherprocedure->DateofDischarge->Visible) { // DateofDischarge ?>
		<th class="<?php echo $ivf_otherprocedure->DateofDischarge->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_DateofDischarge" class="ivf_otherprocedure_DateofDischarge"><?php echo $ivf_otherprocedure->DateofDischarge->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_otherprocedure->Consultant->Visible) { // Consultant ?>
		<th class="<?php echo $ivf_otherprocedure->Consultant->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_Consultant" class="ivf_otherprocedure_Consultant"><?php echo $ivf_otherprocedure->Consultant->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_otherprocedure->Surgeon->Visible) { // Surgeon ?>
		<th class="<?php echo $ivf_otherprocedure->Surgeon->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_Surgeon" class="ivf_otherprocedure_Surgeon"><?php echo $ivf_otherprocedure->Surgeon->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_otherprocedure->Anesthetist->Visible) { // Anesthetist ?>
		<th class="<?php echo $ivf_otherprocedure->Anesthetist->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_Anesthetist" class="ivf_otherprocedure_Anesthetist"><?php echo $ivf_otherprocedure->Anesthetist->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_otherprocedure->IdentificationMark->Visible) { // IdentificationMark ?>
		<th class="<?php echo $ivf_otherprocedure->IdentificationMark->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_IdentificationMark" class="ivf_otherprocedure_IdentificationMark"><?php echo $ivf_otherprocedure->IdentificationMark->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_otherprocedure->ProcedureDone->Visible) { // ProcedureDone ?>
		<th class="<?php echo $ivf_otherprocedure->ProcedureDone->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_ProcedureDone" class="ivf_otherprocedure_ProcedureDone"><?php echo $ivf_otherprocedure->ProcedureDone->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_otherprocedure->PROVISIONALDIAGNOSIS->Visible) { // PROVISIONALDIAGNOSIS ?>
		<th class="<?php echo $ivf_otherprocedure->PROVISIONALDIAGNOSIS->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_PROVISIONALDIAGNOSIS" class="ivf_otherprocedure_PROVISIONALDIAGNOSIS"><?php echo $ivf_otherprocedure->PROVISIONALDIAGNOSIS->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_otherprocedure->Chiefcomplaints->Visible) { // Chiefcomplaints ?>
		<th class="<?php echo $ivf_otherprocedure->Chiefcomplaints->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_Chiefcomplaints" class="ivf_otherprocedure_Chiefcomplaints"><?php echo $ivf_otherprocedure->Chiefcomplaints->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_otherprocedure->MaritallHistory->Visible) { // MaritallHistory ?>
		<th class="<?php echo $ivf_otherprocedure->MaritallHistory->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_MaritallHistory" class="ivf_otherprocedure_MaritallHistory"><?php echo $ivf_otherprocedure->MaritallHistory->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_otherprocedure->MenstrualHistory->Visible) { // MenstrualHistory ?>
		<th class="<?php echo $ivf_otherprocedure->MenstrualHistory->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_MenstrualHistory" class="ivf_otherprocedure_MenstrualHistory"><?php echo $ivf_otherprocedure->MenstrualHistory->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_otherprocedure->SurgicalHistory->Visible) { // SurgicalHistory ?>
		<th class="<?php echo $ivf_otherprocedure->SurgicalHistory->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_SurgicalHistory" class="ivf_otherprocedure_SurgicalHistory"><?php echo $ivf_otherprocedure->SurgicalHistory->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_otherprocedure->PastHistory->Visible) { // PastHistory ?>
		<th class="<?php echo $ivf_otherprocedure->PastHistory->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_PastHistory" class="ivf_otherprocedure_PastHistory"><?php echo $ivf_otherprocedure->PastHistory->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_otherprocedure->FamilyHistory->Visible) { // FamilyHistory ?>
		<th class="<?php echo $ivf_otherprocedure->FamilyHistory->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_FamilyHistory" class="ivf_otherprocedure_FamilyHistory"><?php echo $ivf_otherprocedure->FamilyHistory->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_otherprocedure->Temp->Visible) { // Temp ?>
		<th class="<?php echo $ivf_otherprocedure->Temp->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_Temp" class="ivf_otherprocedure_Temp"><?php echo $ivf_otherprocedure->Temp->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_otherprocedure->Pulse->Visible) { // Pulse ?>
		<th class="<?php echo $ivf_otherprocedure->Pulse->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_Pulse" class="ivf_otherprocedure_Pulse"><?php echo $ivf_otherprocedure->Pulse->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_otherprocedure->BP->Visible) { // BP ?>
		<th class="<?php echo $ivf_otherprocedure->BP->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_BP" class="ivf_otherprocedure_BP"><?php echo $ivf_otherprocedure->BP->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_otherprocedure->CNS->Visible) { // CNS ?>
		<th class="<?php echo $ivf_otherprocedure->CNS->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_CNS" class="ivf_otherprocedure_CNS"><?php echo $ivf_otherprocedure->CNS->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_otherprocedure->_RS->Visible) { // RS ?>
		<th class="<?php echo $ivf_otherprocedure->_RS->headerCellClass() ?>"><span id="elh_ivf_otherprocedure__RS" class="ivf_otherprocedure__RS"><?php echo $ivf_otherprocedure->_RS->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_otherprocedure->CVS->Visible) { // CVS ?>
		<th class="<?php echo $ivf_otherprocedure->CVS->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_CVS" class="ivf_otherprocedure_CVS"><?php echo $ivf_otherprocedure->CVS->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_otherprocedure->PA->Visible) { // PA ?>
		<th class="<?php echo $ivf_otherprocedure->PA->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_PA" class="ivf_otherprocedure_PA"><?php echo $ivf_otherprocedure->PA->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_otherprocedure->InvestigationReport->Visible) { // InvestigationReport ?>
		<th class="<?php echo $ivf_otherprocedure->InvestigationReport->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_InvestigationReport" class="ivf_otherprocedure_InvestigationReport"><?php echo $ivf_otherprocedure->InvestigationReport->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_otherprocedure->TidNo->Visible) { // TidNo ?>
		<th class="<?php echo $ivf_otherprocedure->TidNo->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_TidNo" class="ivf_otherprocedure_TidNo"><?php echo $ivf_otherprocedure->TidNo->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$ivf_otherprocedure_delete->RecCnt = 0;
$i = 0;
while (!$ivf_otherprocedure_delete->Recordset->EOF) {
	$ivf_otherprocedure_delete->RecCnt++;
	$ivf_otherprocedure_delete->RowCnt++;

	// Set row properties
	$ivf_otherprocedure->resetAttributes();
	$ivf_otherprocedure->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$ivf_otherprocedure_delete->loadRowValues($ivf_otherprocedure_delete->Recordset);

	// Render row
	$ivf_otherprocedure_delete->renderRow();
?>
	<tr<?php echo $ivf_otherprocedure->rowAttributes() ?>>
<?php if ($ivf_otherprocedure->id->Visible) { // id ?>
		<td<?php echo $ivf_otherprocedure->id->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_delete->RowCnt ?>_ivf_otherprocedure_id" class="ivf_otherprocedure_id">
<span<?php echo $ivf_otherprocedure->id->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure->RIDNO->Visible) { // RIDNO ?>
		<td<?php echo $ivf_otherprocedure->RIDNO->cellAttributes() ?>>
<script id="orig<?php echo $ivf_otherprocedure_delete->RowCnt ?>_ivf_otherprocedure_RIDNO" class="ivf_otherprocedureedit" type="text/html">
<?php echo $ivf_otherprocedure->RIDNO->getViewValue() ?>
</script>
<span id="el<?php echo $ivf_otherprocedure_delete->RowCnt ?>_ivf_otherprocedure_RIDNO" class="ivf_otherprocedure_RIDNO">
<span<?php echo $ivf_otherprocedure->RIDNO->viewAttributes() ?>><?php echo Barcode()->show($ivf_otherprocedure->RIDNO->CurrentValue, 'EAN-13', 60) ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure->Name->Visible) { // Name ?>
		<td<?php echo $ivf_otherprocedure->Name->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_delete->RowCnt ?>_ivf_otherprocedure_Name" class="ivf_otherprocedure_Name">
<span<?php echo $ivf_otherprocedure->Name->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure->DateofAdmission->Visible) { // DateofAdmission ?>
		<td<?php echo $ivf_otherprocedure->DateofAdmission->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_delete->RowCnt ?>_ivf_otherprocedure_DateofAdmission" class="ivf_otherprocedure_DateofAdmission">
<span<?php echo $ivf_otherprocedure->DateofAdmission->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->DateofAdmission->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure->DateofProcedure->Visible) { // DateofProcedure ?>
		<td<?php echo $ivf_otherprocedure->DateofProcedure->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_delete->RowCnt ?>_ivf_otherprocedure_DateofProcedure" class="ivf_otherprocedure_DateofProcedure">
<span<?php echo $ivf_otherprocedure->DateofProcedure->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->DateofProcedure->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure->DateofDischarge->Visible) { // DateofDischarge ?>
		<td<?php echo $ivf_otherprocedure->DateofDischarge->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_delete->RowCnt ?>_ivf_otherprocedure_DateofDischarge" class="ivf_otherprocedure_DateofDischarge">
<span<?php echo $ivf_otherprocedure->DateofDischarge->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->DateofDischarge->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure->Consultant->Visible) { // Consultant ?>
		<td<?php echo $ivf_otherprocedure->Consultant->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_delete->RowCnt ?>_ivf_otherprocedure_Consultant" class="ivf_otherprocedure_Consultant">
<span<?php echo $ivf_otherprocedure->Consultant->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->Consultant->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure->Surgeon->Visible) { // Surgeon ?>
		<td<?php echo $ivf_otherprocedure->Surgeon->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_delete->RowCnt ?>_ivf_otherprocedure_Surgeon" class="ivf_otherprocedure_Surgeon">
<span<?php echo $ivf_otherprocedure->Surgeon->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->Surgeon->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure->Anesthetist->Visible) { // Anesthetist ?>
		<td<?php echo $ivf_otherprocedure->Anesthetist->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_delete->RowCnt ?>_ivf_otherprocedure_Anesthetist" class="ivf_otherprocedure_Anesthetist">
<span<?php echo $ivf_otherprocedure->Anesthetist->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->Anesthetist->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure->IdentificationMark->Visible) { // IdentificationMark ?>
		<td<?php echo $ivf_otherprocedure->IdentificationMark->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_delete->RowCnt ?>_ivf_otherprocedure_IdentificationMark" class="ivf_otherprocedure_IdentificationMark">
<span<?php echo $ivf_otherprocedure->IdentificationMark->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->IdentificationMark->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure->ProcedureDone->Visible) { // ProcedureDone ?>
		<td<?php echo $ivf_otherprocedure->ProcedureDone->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_delete->RowCnt ?>_ivf_otherprocedure_ProcedureDone" class="ivf_otherprocedure_ProcedureDone">
<span<?php echo $ivf_otherprocedure->ProcedureDone->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->ProcedureDone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure->PROVISIONALDIAGNOSIS->Visible) { // PROVISIONALDIAGNOSIS ?>
		<td<?php echo $ivf_otherprocedure->PROVISIONALDIAGNOSIS->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_delete->RowCnt ?>_ivf_otherprocedure_PROVISIONALDIAGNOSIS" class="ivf_otherprocedure_PROVISIONALDIAGNOSIS">
<span<?php echo $ivf_otherprocedure->PROVISIONALDIAGNOSIS->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->PROVISIONALDIAGNOSIS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure->Chiefcomplaints->Visible) { // Chiefcomplaints ?>
		<td<?php echo $ivf_otherprocedure->Chiefcomplaints->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_delete->RowCnt ?>_ivf_otherprocedure_Chiefcomplaints" class="ivf_otherprocedure_Chiefcomplaints">
<span<?php echo $ivf_otherprocedure->Chiefcomplaints->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->Chiefcomplaints->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure->MaritallHistory->Visible) { // MaritallHistory ?>
		<td<?php echo $ivf_otherprocedure->MaritallHistory->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_delete->RowCnt ?>_ivf_otherprocedure_MaritallHistory" class="ivf_otherprocedure_MaritallHistory">
<span<?php echo $ivf_otherprocedure->MaritallHistory->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->MaritallHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure->MenstrualHistory->Visible) { // MenstrualHistory ?>
		<td<?php echo $ivf_otherprocedure->MenstrualHistory->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_delete->RowCnt ?>_ivf_otherprocedure_MenstrualHistory" class="ivf_otherprocedure_MenstrualHistory">
<span<?php echo $ivf_otherprocedure->MenstrualHistory->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->MenstrualHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure->SurgicalHistory->Visible) { // SurgicalHistory ?>
		<td<?php echo $ivf_otherprocedure->SurgicalHistory->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_delete->RowCnt ?>_ivf_otherprocedure_SurgicalHistory" class="ivf_otherprocedure_SurgicalHistory">
<span<?php echo $ivf_otherprocedure->SurgicalHistory->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->SurgicalHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure->PastHistory->Visible) { // PastHistory ?>
		<td<?php echo $ivf_otherprocedure->PastHistory->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_delete->RowCnt ?>_ivf_otherprocedure_PastHistory" class="ivf_otherprocedure_PastHistory">
<span<?php echo $ivf_otherprocedure->PastHistory->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->PastHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure->FamilyHistory->Visible) { // FamilyHistory ?>
		<td<?php echo $ivf_otherprocedure->FamilyHistory->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_delete->RowCnt ?>_ivf_otherprocedure_FamilyHistory" class="ivf_otherprocedure_FamilyHistory">
<span<?php echo $ivf_otherprocedure->FamilyHistory->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->FamilyHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure->Temp->Visible) { // Temp ?>
		<td<?php echo $ivf_otherprocedure->Temp->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_delete->RowCnt ?>_ivf_otherprocedure_Temp" class="ivf_otherprocedure_Temp">
<span<?php echo $ivf_otherprocedure->Temp->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->Temp->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure->Pulse->Visible) { // Pulse ?>
		<td<?php echo $ivf_otherprocedure->Pulse->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_delete->RowCnt ?>_ivf_otherprocedure_Pulse" class="ivf_otherprocedure_Pulse">
<span<?php echo $ivf_otherprocedure->Pulse->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->Pulse->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure->BP->Visible) { // BP ?>
		<td<?php echo $ivf_otherprocedure->BP->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_delete->RowCnt ?>_ivf_otherprocedure_BP" class="ivf_otherprocedure_BP">
<span<?php echo $ivf_otherprocedure->BP->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->BP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure->CNS->Visible) { // CNS ?>
		<td<?php echo $ivf_otherprocedure->CNS->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_delete->RowCnt ?>_ivf_otherprocedure_CNS" class="ivf_otherprocedure_CNS">
<span<?php echo $ivf_otherprocedure->CNS->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->CNS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure->_RS->Visible) { // RS ?>
		<td<?php echo $ivf_otherprocedure->_RS->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_delete->RowCnt ?>_ivf_otherprocedure__RS" class="ivf_otherprocedure__RS">
<span<?php echo $ivf_otherprocedure->_RS->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->_RS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure->CVS->Visible) { // CVS ?>
		<td<?php echo $ivf_otherprocedure->CVS->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_delete->RowCnt ?>_ivf_otherprocedure_CVS" class="ivf_otherprocedure_CVS">
<span<?php echo $ivf_otherprocedure->CVS->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->CVS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure->PA->Visible) { // PA ?>
		<td<?php echo $ivf_otherprocedure->PA->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_delete->RowCnt ?>_ivf_otherprocedure_PA" class="ivf_otherprocedure_PA">
<span<?php echo $ivf_otherprocedure->PA->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->PA->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure->InvestigationReport->Visible) { // InvestigationReport ?>
		<td<?php echo $ivf_otherprocedure->InvestigationReport->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_delete->RowCnt ?>_ivf_otherprocedure_InvestigationReport" class="ivf_otherprocedure_InvestigationReport">
<span<?php echo $ivf_otherprocedure->InvestigationReport->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->InvestigationReport->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_otherprocedure->TidNo->Visible) { // TidNo ?>
		<td<?php echo $ivf_otherprocedure->TidNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_delete->RowCnt ?>_ivf_otherprocedure_TidNo" class="ivf_otherprocedure_TidNo">
<span<?php echo $ivf_otherprocedure->TidNo->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->TidNo->getViewValue() ?></span>
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
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$ivf_otherprocedure_delete->terminate();
?>