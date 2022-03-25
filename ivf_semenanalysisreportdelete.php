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
$ivf_semenanalysisreport_delete = new ivf_semenanalysisreport_delete();

// Run the page
$ivf_semenanalysisreport_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_semenanalysisreport_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fivf_semenanalysisreportdelete = currentForm = new ew.Form("fivf_semenanalysisreportdelete", "delete");

// Form_CustomValidate event
fivf_semenanalysisreportdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_semenanalysisreportdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivf_semenanalysisreportdelete.lists["x_RequestSample"] = <?php echo $ivf_semenanalysisreport_delete->RequestSample->Lookup->toClientList() ?>;
fivf_semenanalysisreportdelete.lists["x_RequestSample"].options = <?php echo JsonEncode($ivf_semenanalysisreport_delete->RequestSample->options(FALSE, TRUE)) ?>;
fivf_semenanalysisreportdelete.lists["x_CollectionType"] = <?php echo $ivf_semenanalysisreport_delete->CollectionType->Lookup->toClientList() ?>;
fivf_semenanalysisreportdelete.lists["x_CollectionType"].options = <?php echo JsonEncode($ivf_semenanalysisreport_delete->CollectionType->options(FALSE, TRUE)) ?>;
fivf_semenanalysisreportdelete.lists["x_CollectionMethod"] = <?php echo $ivf_semenanalysisreport_delete->CollectionMethod->Lookup->toClientList() ?>;
fivf_semenanalysisreportdelete.lists["x_CollectionMethod"].options = <?php echo JsonEncode($ivf_semenanalysisreport_delete->CollectionMethod->options(FALSE, TRUE)) ?>;
fivf_semenanalysisreportdelete.lists["x_Medicationused"] = <?php echo $ivf_semenanalysisreport_delete->Medicationused->Lookup->toClientList() ?>;
fivf_semenanalysisreportdelete.lists["x_Medicationused"].options = <?php echo JsonEncode($ivf_semenanalysisreport_delete->Medicationused->options(FALSE, TRUE)) ?>;
fivf_semenanalysisreportdelete.lists["x_DifficultiesinCollection"] = <?php echo $ivf_semenanalysisreport_delete->DifficultiesinCollection->Lookup->toClientList() ?>;
fivf_semenanalysisreportdelete.lists["x_DifficultiesinCollection"].options = <?php echo JsonEncode($ivf_semenanalysisreport_delete->DifficultiesinCollection->options(FALSE, TRUE)) ?>;
fivf_semenanalysisreportdelete.lists["x_Homogenosity"] = <?php echo $ivf_semenanalysisreport_delete->Homogenosity->Lookup->toClientList() ?>;
fivf_semenanalysisreportdelete.lists["x_Homogenosity"].options = <?php echo JsonEncode($ivf_semenanalysisreport_delete->Homogenosity->options(FALSE, TRUE)) ?>;
fivf_semenanalysisreportdelete.lists["x_CompleteSample"] = <?php echo $ivf_semenanalysisreport_delete->CompleteSample->Lookup->toClientList() ?>;
fivf_semenanalysisreportdelete.lists["x_CompleteSample"].options = <?php echo JsonEncode($ivf_semenanalysisreport_delete->CompleteSample->options(FALSE, TRUE)) ?>;
fivf_semenanalysisreportdelete.lists["x_SemenOrgin"] = <?php echo $ivf_semenanalysisreport_delete->SemenOrgin->Lookup->toClientList() ?>;
fivf_semenanalysisreportdelete.lists["x_SemenOrgin"].options = <?php echo JsonEncode($ivf_semenanalysisreport_delete->SemenOrgin->options(FALSE, TRUE)) ?>;
fivf_semenanalysisreportdelete.lists["x_Donor"] = <?php echo $ivf_semenanalysisreport_delete->Donor->Lookup->toClientList() ?>;
fivf_semenanalysisreportdelete.lists["x_Donor"].options = <?php echo JsonEncode($ivf_semenanalysisreport_delete->Donor->lookupOptions()) ?>;
fivf_semenanalysisreportdelete.lists["x_SPECIFIC_PROBLEMS"] = <?php echo $ivf_semenanalysisreport_delete->SPECIFIC_PROBLEMS->Lookup->toClientList() ?>;
fivf_semenanalysisreportdelete.lists["x_SPECIFIC_PROBLEMS"].options = <?php echo JsonEncode($ivf_semenanalysisreport_delete->SPECIFIC_PROBLEMS->options(FALSE, TRUE)) ?>;
fivf_semenanalysisreportdelete.lists["x_LIQUIFACTION_STORAGE"] = <?php echo $ivf_semenanalysisreport_delete->LIQUIFACTION_STORAGE->Lookup->toClientList() ?>;
fivf_semenanalysisreportdelete.lists["x_LIQUIFACTION_STORAGE"].options = <?php echo JsonEncode($ivf_semenanalysisreport_delete->LIQUIFACTION_STORAGE->options(FALSE, TRUE)) ?>;
fivf_semenanalysisreportdelete.lists["x_IUI_PREP_METHOD"] = <?php echo $ivf_semenanalysisreport_delete->IUI_PREP_METHOD->Lookup->toClientList() ?>;
fivf_semenanalysisreportdelete.lists["x_IUI_PREP_METHOD"].options = <?php echo JsonEncode($ivf_semenanalysisreport_delete->IUI_PREP_METHOD->options(FALSE, TRUE)) ?>;
fivf_semenanalysisreportdelete.lists["x_TIME_FROM_TRIGGER"] = <?php echo $ivf_semenanalysisreport_delete->TIME_FROM_TRIGGER->Lookup->toClientList() ?>;
fivf_semenanalysisreportdelete.lists["x_TIME_FROM_TRIGGER"].options = <?php echo JsonEncode($ivf_semenanalysisreport_delete->TIME_FROM_TRIGGER->options(FALSE, TRUE)) ?>;
fivf_semenanalysisreportdelete.lists["x_COLLECTION_TO_PREPARATION"] = <?php echo $ivf_semenanalysisreport_delete->COLLECTION_TO_PREPARATION->Lookup->toClientList() ?>;
fivf_semenanalysisreportdelete.lists["x_COLLECTION_TO_PREPARATION"].options = <?php echo JsonEncode($ivf_semenanalysisreport_delete->COLLECTION_TO_PREPARATION->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $ivf_semenanalysisreport_delete->showPageHeader(); ?>
<?php
$ivf_semenanalysisreport_delete->showMessage();
?>
<form name="fivf_semenanalysisreportdelete" id="fivf_semenanalysisreportdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_semenanalysisreport_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_semenanalysisreport_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_semenanalysisreport">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($ivf_semenanalysisreport_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($ivf_semenanalysisreport->id->Visible) { // id ?>
		<th class="<?php echo $ivf_semenanalysisreport->id->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_id" class="ivf_semenanalysisreport_id"><?php echo $ivf_semenanalysisreport->id->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RIDNo->Visible) { // RIDNo ?>
		<th class="<?php echo $ivf_semenanalysisreport->RIDNo->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_RIDNo" class="ivf_semenanalysisreport_RIDNo"><?php echo $ivf_semenanalysisreport->RIDNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->PatientName->Visible) { // PatientName ?>
		<th class="<?php echo $ivf_semenanalysisreport->PatientName->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_PatientName" class="ivf_semenanalysisreport_PatientName"><?php echo $ivf_semenanalysisreport->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->HusbandName->Visible) { // HusbandName ?>
		<th class="<?php echo $ivf_semenanalysisreport->HusbandName->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_HusbandName" class="ivf_semenanalysisreport_HusbandName"><?php echo $ivf_semenanalysisreport->HusbandName->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RequestDr->Visible) { // RequestDr ?>
		<th class="<?php echo $ivf_semenanalysisreport->RequestDr->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_RequestDr" class="ivf_semenanalysisreport_RequestDr"><?php echo $ivf_semenanalysisreport->RequestDr->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->CollectionDate->Visible) { // CollectionDate ?>
		<th class="<?php echo $ivf_semenanalysisreport->CollectionDate->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_CollectionDate" class="ivf_semenanalysisreport_CollectionDate"><?php echo $ivf_semenanalysisreport->CollectionDate->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->ResultDate->Visible) { // ResultDate ?>
		<th class="<?php echo $ivf_semenanalysisreport->ResultDate->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_ResultDate" class="ivf_semenanalysisreport_ResultDate"><?php echo $ivf_semenanalysisreport->ResultDate->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RequestSample->Visible) { // RequestSample ?>
		<th class="<?php echo $ivf_semenanalysisreport->RequestSample->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_RequestSample" class="ivf_semenanalysisreport_RequestSample"><?php echo $ivf_semenanalysisreport->RequestSample->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->CollectionType->Visible) { // CollectionType ?>
		<th class="<?php echo $ivf_semenanalysisreport->CollectionType->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_CollectionType" class="ivf_semenanalysisreport_CollectionType"><?php echo $ivf_semenanalysisreport->CollectionType->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->CollectionMethod->Visible) { // CollectionMethod ?>
		<th class="<?php echo $ivf_semenanalysisreport->CollectionMethod->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_CollectionMethod" class="ivf_semenanalysisreport_CollectionMethod"><?php echo $ivf_semenanalysisreport->CollectionMethod->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Medicationused->Visible) { // Medicationused ?>
		<th class="<?php echo $ivf_semenanalysisreport->Medicationused->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Medicationused" class="ivf_semenanalysisreport_Medicationused"><?php echo $ivf_semenanalysisreport->Medicationused->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->DifficultiesinCollection->Visible) { // DifficultiesinCollection ?>
		<th class="<?php echo $ivf_semenanalysisreport->DifficultiesinCollection->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_DifficultiesinCollection" class="ivf_semenanalysisreport_DifficultiesinCollection"><?php echo $ivf_semenanalysisreport->DifficultiesinCollection->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->pH->Visible) { // pH ?>
		<th class="<?php echo $ivf_semenanalysisreport->pH->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_pH" class="ivf_semenanalysisreport_pH"><?php echo $ivf_semenanalysisreport->pH->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Timeofcollection->Visible) { // Timeofcollection ?>
		<th class="<?php echo $ivf_semenanalysisreport->Timeofcollection->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Timeofcollection" class="ivf_semenanalysisreport_Timeofcollection"><?php echo $ivf_semenanalysisreport->Timeofcollection->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Timeofexamination->Visible) { // Timeofexamination ?>
		<th class="<?php echo $ivf_semenanalysisreport->Timeofexamination->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Timeofexamination" class="ivf_semenanalysisreport_Timeofexamination"><?php echo $ivf_semenanalysisreport->Timeofexamination->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Volume->Visible) { // Volume ?>
		<th class="<?php echo $ivf_semenanalysisreport->Volume->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Volume" class="ivf_semenanalysisreport_Volume"><?php echo $ivf_semenanalysisreport->Volume->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Concentration->Visible) { // Concentration ?>
		<th class="<?php echo $ivf_semenanalysisreport->Concentration->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Concentration" class="ivf_semenanalysisreport_Concentration"><?php echo $ivf_semenanalysisreport->Concentration->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Total->Visible) { // Total ?>
		<th class="<?php echo $ivf_semenanalysisreport->Total->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Total" class="ivf_semenanalysisreport_Total"><?php echo $ivf_semenanalysisreport->Total->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->ProgressiveMotility->Visible) { // ProgressiveMotility ?>
		<th class="<?php echo $ivf_semenanalysisreport->ProgressiveMotility->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_ProgressiveMotility" class="ivf_semenanalysisreport_ProgressiveMotility"><?php echo $ivf_semenanalysisreport->ProgressiveMotility->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->NonProgrssiveMotile->Visible) { // NonProgrssiveMotile ?>
		<th class="<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_NonProgrssiveMotile" class="ivf_semenanalysisreport_NonProgrssiveMotile"><?php echo $ivf_semenanalysisreport->NonProgrssiveMotile->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Immotile->Visible) { // Immotile ?>
		<th class="<?php echo $ivf_semenanalysisreport->Immotile->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Immotile" class="ivf_semenanalysisreport_Immotile"><?php echo $ivf_semenanalysisreport->Immotile->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->TotalProgrssiveMotile->Visible) { // TotalProgrssiveMotile ?>
		<th class="<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_TotalProgrssiveMotile" class="ivf_semenanalysisreport_TotalProgrssiveMotile"><?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Appearance->Visible) { // Appearance ?>
		<th class="<?php echo $ivf_semenanalysisreport->Appearance->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Appearance" class="ivf_semenanalysisreport_Appearance"><?php echo $ivf_semenanalysisreport->Appearance->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Homogenosity->Visible) { // Homogenosity ?>
		<th class="<?php echo $ivf_semenanalysisreport->Homogenosity->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Homogenosity" class="ivf_semenanalysisreport_Homogenosity"><?php echo $ivf_semenanalysisreport->Homogenosity->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->CompleteSample->Visible) { // CompleteSample ?>
		<th class="<?php echo $ivf_semenanalysisreport->CompleteSample->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_CompleteSample" class="ivf_semenanalysisreport_CompleteSample"><?php echo $ivf_semenanalysisreport->CompleteSample->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Liquefactiontime->Visible) { // Liquefactiontime ?>
		<th class="<?php echo $ivf_semenanalysisreport->Liquefactiontime->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Liquefactiontime" class="ivf_semenanalysisreport_Liquefactiontime"><?php echo $ivf_semenanalysisreport->Liquefactiontime->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Normal->Visible) { // Normal ?>
		<th class="<?php echo $ivf_semenanalysisreport->Normal->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Normal" class="ivf_semenanalysisreport_Normal"><?php echo $ivf_semenanalysisreport->Normal->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Abnormal->Visible) { // Abnormal ?>
		<th class="<?php echo $ivf_semenanalysisreport->Abnormal->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Abnormal" class="ivf_semenanalysisreport_Abnormal"><?php echo $ivf_semenanalysisreport->Abnormal->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Headdefects->Visible) { // Headdefects ?>
		<th class="<?php echo $ivf_semenanalysisreport->Headdefects->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Headdefects" class="ivf_semenanalysisreport_Headdefects"><?php echo $ivf_semenanalysisreport->Headdefects->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->MidpieceDefects->Visible) { // MidpieceDefects ?>
		<th class="<?php echo $ivf_semenanalysisreport->MidpieceDefects->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_MidpieceDefects" class="ivf_semenanalysisreport_MidpieceDefects"><?php echo $ivf_semenanalysisreport->MidpieceDefects->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->TailDefects->Visible) { // TailDefects ?>
		<th class="<?php echo $ivf_semenanalysisreport->TailDefects->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_TailDefects" class="ivf_semenanalysisreport_TailDefects"><?php echo $ivf_semenanalysisreport->TailDefects->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->NormalProgMotile->Visible) { // NormalProgMotile ?>
		<th class="<?php echo $ivf_semenanalysisreport->NormalProgMotile->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_NormalProgMotile" class="ivf_semenanalysisreport_NormalProgMotile"><?php echo $ivf_semenanalysisreport->NormalProgMotile->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->ImmatureForms->Visible) { // ImmatureForms ?>
		<th class="<?php echo $ivf_semenanalysisreport->ImmatureForms->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_ImmatureForms" class="ivf_semenanalysisreport_ImmatureForms"><?php echo $ivf_semenanalysisreport->ImmatureForms->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Leucocytes->Visible) { // Leucocytes ?>
		<th class="<?php echo $ivf_semenanalysisreport->Leucocytes->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Leucocytes" class="ivf_semenanalysisreport_Leucocytes"><?php echo $ivf_semenanalysisreport->Leucocytes->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Agglutination->Visible) { // Agglutination ?>
		<th class="<?php echo $ivf_semenanalysisreport->Agglutination->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Agglutination" class="ivf_semenanalysisreport_Agglutination"><?php echo $ivf_semenanalysisreport->Agglutination->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Debris->Visible) { // Debris ?>
		<th class="<?php echo $ivf_semenanalysisreport->Debris->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Debris" class="ivf_semenanalysisreport_Debris"><?php echo $ivf_semenanalysisreport->Debris->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Diagnosis->Visible) { // Diagnosis ?>
		<th class="<?php echo $ivf_semenanalysisreport->Diagnosis->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Diagnosis" class="ivf_semenanalysisreport_Diagnosis"><?php echo $ivf_semenanalysisreport->Diagnosis->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Observations->Visible) { // Observations ?>
		<th class="<?php echo $ivf_semenanalysisreport->Observations->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Observations" class="ivf_semenanalysisreport_Observations"><?php echo $ivf_semenanalysisreport->Observations->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Signature->Visible) { // Signature ?>
		<th class="<?php echo $ivf_semenanalysisreport->Signature->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Signature" class="ivf_semenanalysisreport_Signature"><?php echo $ivf_semenanalysisreport->Signature->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->SemenOrgin->Visible) { // SemenOrgin ?>
		<th class="<?php echo $ivf_semenanalysisreport->SemenOrgin->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_SemenOrgin" class="ivf_semenanalysisreport_SemenOrgin"><?php echo $ivf_semenanalysisreport->SemenOrgin->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Donor->Visible) { // Donor ?>
		<th class="<?php echo $ivf_semenanalysisreport->Donor->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Donor" class="ivf_semenanalysisreport_Donor"><?php echo $ivf_semenanalysisreport->Donor->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->DonorBloodgroup->Visible) { // DonorBloodgroup ?>
		<th class="<?php echo $ivf_semenanalysisreport->DonorBloodgroup->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_DonorBloodgroup" class="ivf_semenanalysisreport_DonorBloodgroup"><?php echo $ivf_semenanalysisreport->DonorBloodgroup->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Tank->Visible) { // Tank ?>
		<th class="<?php echo $ivf_semenanalysisreport->Tank->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Tank" class="ivf_semenanalysisreport_Tank"><?php echo $ivf_semenanalysisreport->Tank->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Location->Visible) { // Location ?>
		<th class="<?php echo $ivf_semenanalysisreport->Location->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Location" class="ivf_semenanalysisreport_Location"><?php echo $ivf_semenanalysisreport->Location->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Volume1->Visible) { // Volume1 ?>
		<th class="<?php echo $ivf_semenanalysisreport->Volume1->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Volume1" class="ivf_semenanalysisreport_Volume1"><?php echo $ivf_semenanalysisreport->Volume1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Concentration1->Visible) { // Concentration1 ?>
		<th class="<?php echo $ivf_semenanalysisreport->Concentration1->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Concentration1" class="ivf_semenanalysisreport_Concentration1"><?php echo $ivf_semenanalysisreport->Concentration1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Total1->Visible) { // Total1 ?>
		<th class="<?php echo $ivf_semenanalysisreport->Total1->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Total1" class="ivf_semenanalysisreport_Total1"><?php echo $ivf_semenanalysisreport->Total1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->ProgressiveMotility1->Visible) { // ProgressiveMotility1 ?>
		<th class="<?php echo $ivf_semenanalysisreport->ProgressiveMotility1->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_ProgressiveMotility1" class="ivf_semenanalysisreport_ProgressiveMotility1"><?php echo $ivf_semenanalysisreport->ProgressiveMotility1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->NonProgrssiveMotile1->Visible) { // NonProgrssiveMotile1 ?>
		<th class="<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile1->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_NonProgrssiveMotile1" class="ivf_semenanalysisreport_NonProgrssiveMotile1"><?php echo $ivf_semenanalysisreport->NonProgrssiveMotile1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Immotile1->Visible) { // Immotile1 ?>
		<th class="<?php echo $ivf_semenanalysisreport->Immotile1->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Immotile1" class="ivf_semenanalysisreport_Immotile1"><?php echo $ivf_semenanalysisreport->Immotile1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->TotalProgrssiveMotile1->Visible) { // TotalProgrssiveMotile1 ?>
		<th class="<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile1->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_TotalProgrssiveMotile1" class="ivf_semenanalysisreport_TotalProgrssiveMotile1"><?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->TidNo->Visible) { // TidNo ?>
		<th class="<?php echo $ivf_semenanalysisreport->TidNo->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_TidNo" class="ivf_semenanalysisreport_TidNo"><?php echo $ivf_semenanalysisreport->TidNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Color->Visible) { // Color ?>
		<th class="<?php echo $ivf_semenanalysisreport->Color->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Color" class="ivf_semenanalysisreport_Color"><?php echo $ivf_semenanalysisreport->Color->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->DoneBy->Visible) { // DoneBy ?>
		<th class="<?php echo $ivf_semenanalysisreport->DoneBy->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_DoneBy" class="ivf_semenanalysisreport_DoneBy"><?php echo $ivf_semenanalysisreport->DoneBy->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Method->Visible) { // Method ?>
		<th class="<?php echo $ivf_semenanalysisreport->Method->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Method" class="ivf_semenanalysisreport_Method"><?php echo $ivf_semenanalysisreport->Method->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Abstinence->Visible) { // Abstinence ?>
		<th class="<?php echo $ivf_semenanalysisreport->Abstinence->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Abstinence" class="ivf_semenanalysisreport_Abstinence"><?php echo $ivf_semenanalysisreport->Abstinence->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->ProcessedBy->Visible) { // ProcessedBy ?>
		<th class="<?php echo $ivf_semenanalysisreport->ProcessedBy->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_ProcessedBy" class="ivf_semenanalysisreport_ProcessedBy"><?php echo $ivf_semenanalysisreport->ProcessedBy->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->InseminationTime->Visible) { // InseminationTime ?>
		<th class="<?php echo $ivf_semenanalysisreport->InseminationTime->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_InseminationTime" class="ivf_semenanalysisreport_InseminationTime"><?php echo $ivf_semenanalysisreport->InseminationTime->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->InseminationBy->Visible) { // InseminationBy ?>
		<th class="<?php echo $ivf_semenanalysisreport->InseminationBy->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_InseminationBy" class="ivf_semenanalysisreport_InseminationBy"><?php echo $ivf_semenanalysisreport->InseminationBy->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Big->Visible) { // Big ?>
		<th class="<?php echo $ivf_semenanalysisreport->Big->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Big" class="ivf_semenanalysisreport_Big"><?php echo $ivf_semenanalysisreport->Big->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Medium->Visible) { // Medium ?>
		<th class="<?php echo $ivf_semenanalysisreport->Medium->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Medium" class="ivf_semenanalysisreport_Medium"><?php echo $ivf_semenanalysisreport->Medium->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Small->Visible) { // Small ?>
		<th class="<?php echo $ivf_semenanalysisreport->Small->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Small" class="ivf_semenanalysisreport_Small"><?php echo $ivf_semenanalysisreport->Small->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->NoHalo->Visible) { // NoHalo ?>
		<th class="<?php echo $ivf_semenanalysisreport->NoHalo->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_NoHalo" class="ivf_semenanalysisreport_NoHalo"><?php echo $ivf_semenanalysisreport->NoHalo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Fragmented->Visible) { // Fragmented ?>
		<th class="<?php echo $ivf_semenanalysisreport->Fragmented->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Fragmented" class="ivf_semenanalysisreport_Fragmented"><?php echo $ivf_semenanalysisreport->Fragmented->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->NonFragmented->Visible) { // NonFragmented ?>
		<th class="<?php echo $ivf_semenanalysisreport->NonFragmented->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_NonFragmented" class="ivf_semenanalysisreport_NonFragmented"><?php echo $ivf_semenanalysisreport->NonFragmented->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->DFI->Visible) { // DFI ?>
		<th class="<?php echo $ivf_semenanalysisreport->DFI->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_DFI" class="ivf_semenanalysisreport_DFI"><?php echo $ivf_semenanalysisreport->DFI->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->IsueBy->Visible) { // IsueBy ?>
		<th class="<?php echo $ivf_semenanalysisreport->IsueBy->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_IsueBy" class="ivf_semenanalysisreport_IsueBy"><?php echo $ivf_semenanalysisreport->IsueBy->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Volume2->Visible) { // Volume2 ?>
		<th class="<?php echo $ivf_semenanalysisreport->Volume2->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Volume2" class="ivf_semenanalysisreport_Volume2"><?php echo $ivf_semenanalysisreport->Volume2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Concentration2->Visible) { // Concentration2 ?>
		<th class="<?php echo $ivf_semenanalysisreport->Concentration2->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Concentration2" class="ivf_semenanalysisreport_Concentration2"><?php echo $ivf_semenanalysisreport->Concentration2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Total2->Visible) { // Total2 ?>
		<th class="<?php echo $ivf_semenanalysisreport->Total2->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Total2" class="ivf_semenanalysisreport_Total2"><?php echo $ivf_semenanalysisreport->Total2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->ProgressiveMotility2->Visible) { // ProgressiveMotility2 ?>
		<th class="<?php echo $ivf_semenanalysisreport->ProgressiveMotility2->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_ProgressiveMotility2" class="ivf_semenanalysisreport_ProgressiveMotility2"><?php echo $ivf_semenanalysisreport->ProgressiveMotility2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->NonProgrssiveMotile2->Visible) { // NonProgrssiveMotile2 ?>
		<th class="<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile2->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_NonProgrssiveMotile2" class="ivf_semenanalysisreport_NonProgrssiveMotile2"><?php echo $ivf_semenanalysisreport->NonProgrssiveMotile2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Immotile2->Visible) { // Immotile2 ?>
		<th class="<?php echo $ivf_semenanalysisreport->Immotile2->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Immotile2" class="ivf_semenanalysisreport_Immotile2"><?php echo $ivf_semenanalysisreport->Immotile2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->TotalProgrssiveMotile2->Visible) { // TotalProgrssiveMotile2 ?>
		<th class="<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile2->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_TotalProgrssiveMotile2" class="ivf_semenanalysisreport_TotalProgrssiveMotile2"><?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->IssuedBy->Visible) { // IssuedBy ?>
		<th class="<?php echo $ivf_semenanalysisreport->IssuedBy->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_IssuedBy" class="ivf_semenanalysisreport_IssuedBy"><?php echo $ivf_semenanalysisreport->IssuedBy->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->IssuedTo->Visible) { // IssuedTo ?>
		<th class="<?php echo $ivf_semenanalysisreport->IssuedTo->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_IssuedTo" class="ivf_semenanalysisreport_IssuedTo"><?php echo $ivf_semenanalysisreport->IssuedTo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->PaID->Visible) { // PaID ?>
		<th class="<?php echo $ivf_semenanalysisreport->PaID->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_PaID" class="ivf_semenanalysisreport_PaID"><?php echo $ivf_semenanalysisreport->PaID->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->PaName->Visible) { // PaName ?>
		<th class="<?php echo $ivf_semenanalysisreport->PaName->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_PaName" class="ivf_semenanalysisreport_PaName"><?php echo $ivf_semenanalysisreport->PaName->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->PaMobile->Visible) { // PaMobile ?>
		<th class="<?php echo $ivf_semenanalysisreport->PaMobile->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_PaMobile" class="ivf_semenanalysisreport_PaMobile"><?php echo $ivf_semenanalysisreport->PaMobile->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->PartnerID->Visible) { // PartnerID ?>
		<th class="<?php echo $ivf_semenanalysisreport->PartnerID->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_PartnerID" class="ivf_semenanalysisreport_PartnerID"><?php echo $ivf_semenanalysisreport->PartnerID->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->PartnerName->Visible) { // PartnerName ?>
		<th class="<?php echo $ivf_semenanalysisreport->PartnerName->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_PartnerName" class="ivf_semenanalysisreport_PartnerName"><?php echo $ivf_semenanalysisreport->PartnerName->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->PartnerMobile->Visible) { // PartnerMobile ?>
		<th class="<?php echo $ivf_semenanalysisreport->PartnerMobile->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_PartnerMobile" class="ivf_semenanalysisreport_PartnerMobile"><?php echo $ivf_semenanalysisreport->PartnerMobile->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
		<th class="<?php echo $ivf_semenanalysisreport->PREG_TEST_DATE->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_PREG_TEST_DATE" class="ivf_semenanalysisreport_PREG_TEST_DATE"><?php echo $ivf_semenanalysisreport->PREG_TEST_DATE->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->SPECIFIC_PROBLEMS->Visible) { // SPECIFIC_PROBLEMS ?>
		<th class="<?php echo $ivf_semenanalysisreport->SPECIFIC_PROBLEMS->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_SPECIFIC_PROBLEMS" class="ivf_semenanalysisreport_SPECIFIC_PROBLEMS"><?php echo $ivf_semenanalysisreport->SPECIFIC_PROBLEMS->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->IMSC_1->Visible) { // IMSC_1 ?>
		<th class="<?php echo $ivf_semenanalysisreport->IMSC_1->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_IMSC_1" class="ivf_semenanalysisreport_IMSC_1"><?php echo $ivf_semenanalysisreport->IMSC_1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->IMSC_2->Visible) { // IMSC_2 ?>
		<th class="<?php echo $ivf_semenanalysisreport->IMSC_2->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_IMSC_2" class="ivf_semenanalysisreport_IMSC_2"><?php echo $ivf_semenanalysisreport->IMSC_2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->LIQUIFACTION_STORAGE->Visible) { // LIQUIFACTION_STORAGE ?>
		<th class="<?php echo $ivf_semenanalysisreport->LIQUIFACTION_STORAGE->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_LIQUIFACTION_STORAGE" class="ivf_semenanalysisreport_LIQUIFACTION_STORAGE"><?php echo $ivf_semenanalysisreport->LIQUIFACTION_STORAGE->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->IUI_PREP_METHOD->Visible) { // IUI_PREP_METHOD ?>
		<th class="<?php echo $ivf_semenanalysisreport->IUI_PREP_METHOD->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_IUI_PREP_METHOD" class="ivf_semenanalysisreport_IUI_PREP_METHOD"><?php echo $ivf_semenanalysisreport->IUI_PREP_METHOD->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->TIME_FROM_TRIGGER->Visible) { // TIME_FROM_TRIGGER ?>
		<th class="<?php echo $ivf_semenanalysisreport->TIME_FROM_TRIGGER->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_TIME_FROM_TRIGGER" class="ivf_semenanalysisreport_TIME_FROM_TRIGGER"><?php echo $ivf_semenanalysisreport->TIME_FROM_TRIGGER->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->Visible) { // COLLECTION_TO_PREPARATION ?>
		<th class="<?php echo $ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_COLLECTION_TO_PREPARATION" class="ivf_semenanalysisreport_COLLECTION_TO_PREPARATION"><?php echo $ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->Visible) { // TIME_FROM_PREP_TO_INSEM ?>
		<th class="<?php echo $ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM" class="ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM"><?php echo $ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$ivf_semenanalysisreport_delete->RecCnt = 0;
$i = 0;
while (!$ivf_semenanalysisreport_delete->Recordset->EOF) {
	$ivf_semenanalysisreport_delete->RecCnt++;
	$ivf_semenanalysisreport_delete->RowCnt++;

	// Set row properties
	$ivf_semenanalysisreport->resetAttributes();
	$ivf_semenanalysisreport->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$ivf_semenanalysisreport_delete->loadRowValues($ivf_semenanalysisreport_delete->Recordset);

	// Render row
	$ivf_semenanalysisreport_delete->renderRow();
?>
	<tr<?php echo $ivf_semenanalysisreport->rowAttributes() ?>>
<?php if ($ivf_semenanalysisreport->id->Visible) { // id ?>
		<td<?php echo $ivf_semenanalysisreport->id->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_id" class="ivf_semenanalysisreport_id">
<span<?php echo $ivf_semenanalysisreport->id->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RIDNo->Visible) { // RIDNo ?>
		<td<?php echo $ivf_semenanalysisreport->RIDNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_RIDNo" class="ivf_semenanalysisreport_RIDNo">
<span<?php echo $ivf_semenanalysisreport->RIDNo->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->RIDNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->PatientName->Visible) { // PatientName ?>
		<td<?php echo $ivf_semenanalysisreport->PatientName->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_PatientName" class="ivf_semenanalysisreport_PatientName">
<span<?php echo $ivf_semenanalysisreport->PatientName->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->HusbandName->Visible) { // HusbandName ?>
		<td<?php echo $ivf_semenanalysisreport->HusbandName->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_HusbandName" class="ivf_semenanalysisreport_HusbandName">
<span<?php echo $ivf_semenanalysisreport->HusbandName->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->HusbandName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RequestDr->Visible) { // RequestDr ?>
		<td<?php echo $ivf_semenanalysisreport->RequestDr->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_RequestDr" class="ivf_semenanalysisreport_RequestDr">
<span<?php echo $ivf_semenanalysisreport->RequestDr->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->RequestDr->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->CollectionDate->Visible) { // CollectionDate ?>
		<td<?php echo $ivf_semenanalysisreport->CollectionDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_CollectionDate" class="ivf_semenanalysisreport_CollectionDate">
<span<?php echo $ivf_semenanalysisreport->CollectionDate->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->CollectionDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->ResultDate->Visible) { // ResultDate ?>
		<td<?php echo $ivf_semenanalysisreport->ResultDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_ResultDate" class="ivf_semenanalysisreport_ResultDate">
<span<?php echo $ivf_semenanalysisreport->ResultDate->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->ResultDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RequestSample->Visible) { // RequestSample ?>
		<td<?php echo $ivf_semenanalysisreport->RequestSample->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_RequestSample" class="ivf_semenanalysisreport_RequestSample">
<span<?php echo $ivf_semenanalysisreport->RequestSample->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->RequestSample->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->CollectionType->Visible) { // CollectionType ?>
		<td<?php echo $ivf_semenanalysisreport->CollectionType->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_CollectionType" class="ivf_semenanalysisreport_CollectionType">
<span<?php echo $ivf_semenanalysisreport->CollectionType->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->CollectionType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->CollectionMethod->Visible) { // CollectionMethod ?>
		<td<?php echo $ivf_semenanalysisreport->CollectionMethod->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_CollectionMethod" class="ivf_semenanalysisreport_CollectionMethod">
<span<?php echo $ivf_semenanalysisreport->CollectionMethod->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->CollectionMethod->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Medicationused->Visible) { // Medicationused ?>
		<td<?php echo $ivf_semenanalysisreport->Medicationused->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_Medicationused" class="ivf_semenanalysisreport_Medicationused">
<span<?php echo $ivf_semenanalysisreport->Medicationused->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Medicationused->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->DifficultiesinCollection->Visible) { // DifficultiesinCollection ?>
		<td<?php echo $ivf_semenanalysisreport->DifficultiesinCollection->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_DifficultiesinCollection" class="ivf_semenanalysisreport_DifficultiesinCollection">
<span<?php echo $ivf_semenanalysisreport->DifficultiesinCollection->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->DifficultiesinCollection->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->pH->Visible) { // pH ?>
		<td<?php echo $ivf_semenanalysisreport->pH->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_pH" class="ivf_semenanalysisreport_pH">
<span<?php echo $ivf_semenanalysisreport->pH->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->pH->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Timeofcollection->Visible) { // Timeofcollection ?>
		<td<?php echo $ivf_semenanalysisreport->Timeofcollection->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_Timeofcollection" class="ivf_semenanalysisreport_Timeofcollection">
<span<?php echo $ivf_semenanalysisreport->Timeofcollection->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Timeofcollection->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Timeofexamination->Visible) { // Timeofexamination ?>
		<td<?php echo $ivf_semenanalysisreport->Timeofexamination->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_Timeofexamination" class="ivf_semenanalysisreport_Timeofexamination">
<span<?php echo $ivf_semenanalysisreport->Timeofexamination->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Timeofexamination->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Volume->Visible) { // Volume ?>
		<td<?php echo $ivf_semenanalysisreport->Volume->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_Volume" class="ivf_semenanalysisreport_Volume">
<span<?php echo $ivf_semenanalysisreport->Volume->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Volume->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Concentration->Visible) { // Concentration ?>
		<td<?php echo $ivf_semenanalysisreport->Concentration->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_Concentration" class="ivf_semenanalysisreport_Concentration">
<span<?php echo $ivf_semenanalysisreport->Concentration->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Concentration->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Total->Visible) { // Total ?>
		<td<?php echo $ivf_semenanalysisreport->Total->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_Total" class="ivf_semenanalysisreport_Total">
<span<?php echo $ivf_semenanalysisreport->Total->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Total->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->ProgressiveMotility->Visible) { // ProgressiveMotility ?>
		<td<?php echo $ivf_semenanalysisreport->ProgressiveMotility->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_ProgressiveMotility" class="ivf_semenanalysisreport_ProgressiveMotility">
<span<?php echo $ivf_semenanalysisreport->ProgressiveMotility->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->ProgressiveMotility->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->NonProgrssiveMotile->Visible) { // NonProgrssiveMotile ?>
		<td<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_NonProgrssiveMotile" class="ivf_semenanalysisreport_NonProgrssiveMotile">
<span<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Immotile->Visible) { // Immotile ?>
		<td<?php echo $ivf_semenanalysisreport->Immotile->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_Immotile" class="ivf_semenanalysisreport_Immotile">
<span<?php echo $ivf_semenanalysisreport->Immotile->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Immotile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->TotalProgrssiveMotile->Visible) { // TotalProgrssiveMotile ?>
		<td<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_TotalProgrssiveMotile" class="ivf_semenanalysisreport_TotalProgrssiveMotile">
<span<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Appearance->Visible) { // Appearance ?>
		<td<?php echo $ivf_semenanalysisreport->Appearance->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_Appearance" class="ivf_semenanalysisreport_Appearance">
<span<?php echo $ivf_semenanalysisreport->Appearance->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Appearance->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Homogenosity->Visible) { // Homogenosity ?>
		<td<?php echo $ivf_semenanalysisreport->Homogenosity->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_Homogenosity" class="ivf_semenanalysisreport_Homogenosity">
<span<?php echo $ivf_semenanalysisreport->Homogenosity->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Homogenosity->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->CompleteSample->Visible) { // CompleteSample ?>
		<td<?php echo $ivf_semenanalysisreport->CompleteSample->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_CompleteSample" class="ivf_semenanalysisreport_CompleteSample">
<span<?php echo $ivf_semenanalysisreport->CompleteSample->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->CompleteSample->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Liquefactiontime->Visible) { // Liquefactiontime ?>
		<td<?php echo $ivf_semenanalysisreport->Liquefactiontime->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_Liquefactiontime" class="ivf_semenanalysisreport_Liquefactiontime">
<span<?php echo $ivf_semenanalysisreport->Liquefactiontime->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Liquefactiontime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Normal->Visible) { // Normal ?>
		<td<?php echo $ivf_semenanalysisreport->Normal->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_Normal" class="ivf_semenanalysisreport_Normal">
<span<?php echo $ivf_semenanalysisreport->Normal->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Normal->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Abnormal->Visible) { // Abnormal ?>
		<td<?php echo $ivf_semenanalysisreport->Abnormal->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_Abnormal" class="ivf_semenanalysisreport_Abnormal">
<span<?php echo $ivf_semenanalysisreport->Abnormal->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Abnormal->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Headdefects->Visible) { // Headdefects ?>
		<td<?php echo $ivf_semenanalysisreport->Headdefects->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_Headdefects" class="ivf_semenanalysisreport_Headdefects">
<span<?php echo $ivf_semenanalysisreport->Headdefects->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Headdefects->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->MidpieceDefects->Visible) { // MidpieceDefects ?>
		<td<?php echo $ivf_semenanalysisreport->MidpieceDefects->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_MidpieceDefects" class="ivf_semenanalysisreport_MidpieceDefects">
<span<?php echo $ivf_semenanalysisreport->MidpieceDefects->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->MidpieceDefects->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->TailDefects->Visible) { // TailDefects ?>
		<td<?php echo $ivf_semenanalysisreport->TailDefects->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_TailDefects" class="ivf_semenanalysisreport_TailDefects">
<span<?php echo $ivf_semenanalysisreport->TailDefects->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->TailDefects->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->NormalProgMotile->Visible) { // NormalProgMotile ?>
		<td<?php echo $ivf_semenanalysisreport->NormalProgMotile->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_NormalProgMotile" class="ivf_semenanalysisreport_NormalProgMotile">
<span<?php echo $ivf_semenanalysisreport->NormalProgMotile->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->NormalProgMotile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->ImmatureForms->Visible) { // ImmatureForms ?>
		<td<?php echo $ivf_semenanalysisreport->ImmatureForms->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_ImmatureForms" class="ivf_semenanalysisreport_ImmatureForms">
<span<?php echo $ivf_semenanalysisreport->ImmatureForms->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->ImmatureForms->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Leucocytes->Visible) { // Leucocytes ?>
		<td<?php echo $ivf_semenanalysisreport->Leucocytes->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_Leucocytes" class="ivf_semenanalysisreport_Leucocytes">
<span<?php echo $ivf_semenanalysisreport->Leucocytes->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Leucocytes->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Agglutination->Visible) { // Agglutination ?>
		<td<?php echo $ivf_semenanalysisreport->Agglutination->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_Agglutination" class="ivf_semenanalysisreport_Agglutination">
<span<?php echo $ivf_semenanalysisreport->Agglutination->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Agglutination->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Debris->Visible) { // Debris ?>
		<td<?php echo $ivf_semenanalysisreport->Debris->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_Debris" class="ivf_semenanalysisreport_Debris">
<span<?php echo $ivf_semenanalysisreport->Debris->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Debris->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Diagnosis->Visible) { // Diagnosis ?>
		<td<?php echo $ivf_semenanalysisreport->Diagnosis->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_Diagnosis" class="ivf_semenanalysisreport_Diagnosis">
<span<?php echo $ivf_semenanalysisreport->Diagnosis->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Diagnosis->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Observations->Visible) { // Observations ?>
		<td<?php echo $ivf_semenanalysisreport->Observations->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_Observations" class="ivf_semenanalysisreport_Observations">
<span<?php echo $ivf_semenanalysisreport->Observations->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Observations->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Signature->Visible) { // Signature ?>
		<td<?php echo $ivf_semenanalysisreport->Signature->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_Signature" class="ivf_semenanalysisreport_Signature">
<span<?php echo $ivf_semenanalysisreport->Signature->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Signature->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->SemenOrgin->Visible) { // SemenOrgin ?>
		<td<?php echo $ivf_semenanalysisreport->SemenOrgin->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_SemenOrgin" class="ivf_semenanalysisreport_SemenOrgin">
<span<?php echo $ivf_semenanalysisreport->SemenOrgin->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->SemenOrgin->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Donor->Visible) { // Donor ?>
		<td<?php echo $ivf_semenanalysisreport->Donor->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_Donor" class="ivf_semenanalysisreport_Donor">
<span<?php echo $ivf_semenanalysisreport->Donor->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Donor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->DonorBloodgroup->Visible) { // DonorBloodgroup ?>
		<td<?php echo $ivf_semenanalysisreport->DonorBloodgroup->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_DonorBloodgroup" class="ivf_semenanalysisreport_DonorBloodgroup">
<span<?php echo $ivf_semenanalysisreport->DonorBloodgroup->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->DonorBloodgroup->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Tank->Visible) { // Tank ?>
		<td<?php echo $ivf_semenanalysisreport->Tank->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_Tank" class="ivf_semenanalysisreport_Tank">
<span<?php echo $ivf_semenanalysisreport->Tank->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Tank->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Location->Visible) { // Location ?>
		<td<?php echo $ivf_semenanalysisreport->Location->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_Location" class="ivf_semenanalysisreport_Location">
<span<?php echo $ivf_semenanalysisreport->Location->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Location->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Volume1->Visible) { // Volume1 ?>
		<td<?php echo $ivf_semenanalysisreport->Volume1->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_Volume1" class="ivf_semenanalysisreport_Volume1">
<span<?php echo $ivf_semenanalysisreport->Volume1->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Volume1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Concentration1->Visible) { // Concentration1 ?>
		<td<?php echo $ivf_semenanalysisreport->Concentration1->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_Concentration1" class="ivf_semenanalysisreport_Concentration1">
<span<?php echo $ivf_semenanalysisreport->Concentration1->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Concentration1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Total1->Visible) { // Total1 ?>
		<td<?php echo $ivf_semenanalysisreport->Total1->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_Total1" class="ivf_semenanalysisreport_Total1">
<span<?php echo $ivf_semenanalysisreport->Total1->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Total1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->ProgressiveMotility1->Visible) { // ProgressiveMotility1 ?>
		<td<?php echo $ivf_semenanalysisreport->ProgressiveMotility1->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_ProgressiveMotility1" class="ivf_semenanalysisreport_ProgressiveMotility1">
<span<?php echo $ivf_semenanalysisreport->ProgressiveMotility1->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->ProgressiveMotility1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->NonProgrssiveMotile1->Visible) { // NonProgrssiveMotile1 ?>
		<td<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile1->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_NonProgrssiveMotile1" class="ivf_semenanalysisreport_NonProgrssiveMotile1">
<span<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile1->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Immotile1->Visible) { // Immotile1 ?>
		<td<?php echo $ivf_semenanalysisreport->Immotile1->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_Immotile1" class="ivf_semenanalysisreport_Immotile1">
<span<?php echo $ivf_semenanalysisreport->Immotile1->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Immotile1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->TotalProgrssiveMotile1->Visible) { // TotalProgrssiveMotile1 ?>
		<td<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile1->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_TotalProgrssiveMotile1" class="ivf_semenanalysisreport_TotalProgrssiveMotile1">
<span<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile1->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->TidNo->Visible) { // TidNo ?>
		<td<?php echo $ivf_semenanalysisreport->TidNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_TidNo" class="ivf_semenanalysisreport_TidNo">
<span<?php echo $ivf_semenanalysisreport->TidNo->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->TidNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Color->Visible) { // Color ?>
		<td<?php echo $ivf_semenanalysisreport->Color->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_Color" class="ivf_semenanalysisreport_Color">
<span<?php echo $ivf_semenanalysisreport->Color->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Color->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->DoneBy->Visible) { // DoneBy ?>
		<td<?php echo $ivf_semenanalysisreport->DoneBy->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_DoneBy" class="ivf_semenanalysisreport_DoneBy">
<span<?php echo $ivf_semenanalysisreport->DoneBy->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->DoneBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Method->Visible) { // Method ?>
		<td<?php echo $ivf_semenanalysisreport->Method->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_Method" class="ivf_semenanalysisreport_Method">
<span<?php echo $ivf_semenanalysisreport->Method->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Method->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Abstinence->Visible) { // Abstinence ?>
		<td<?php echo $ivf_semenanalysisreport->Abstinence->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_Abstinence" class="ivf_semenanalysisreport_Abstinence">
<span<?php echo $ivf_semenanalysisreport->Abstinence->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Abstinence->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->ProcessedBy->Visible) { // ProcessedBy ?>
		<td<?php echo $ivf_semenanalysisreport->ProcessedBy->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_ProcessedBy" class="ivf_semenanalysisreport_ProcessedBy">
<span<?php echo $ivf_semenanalysisreport->ProcessedBy->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->ProcessedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->InseminationTime->Visible) { // InseminationTime ?>
		<td<?php echo $ivf_semenanalysisreport->InseminationTime->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_InseminationTime" class="ivf_semenanalysisreport_InseminationTime">
<span<?php echo $ivf_semenanalysisreport->InseminationTime->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->InseminationTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->InseminationBy->Visible) { // InseminationBy ?>
		<td<?php echo $ivf_semenanalysisreport->InseminationBy->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_InseminationBy" class="ivf_semenanalysisreport_InseminationBy">
<span<?php echo $ivf_semenanalysisreport->InseminationBy->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->InseminationBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Big->Visible) { // Big ?>
		<td<?php echo $ivf_semenanalysisreport->Big->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_Big" class="ivf_semenanalysisreport_Big">
<span<?php echo $ivf_semenanalysisreport->Big->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Big->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Medium->Visible) { // Medium ?>
		<td<?php echo $ivf_semenanalysisreport->Medium->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_Medium" class="ivf_semenanalysisreport_Medium">
<span<?php echo $ivf_semenanalysisreport->Medium->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Medium->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Small->Visible) { // Small ?>
		<td<?php echo $ivf_semenanalysisreport->Small->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_Small" class="ivf_semenanalysisreport_Small">
<span<?php echo $ivf_semenanalysisreport->Small->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Small->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->NoHalo->Visible) { // NoHalo ?>
		<td<?php echo $ivf_semenanalysisreport->NoHalo->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_NoHalo" class="ivf_semenanalysisreport_NoHalo">
<span<?php echo $ivf_semenanalysisreport->NoHalo->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->NoHalo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Fragmented->Visible) { // Fragmented ?>
		<td<?php echo $ivf_semenanalysisreport->Fragmented->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_Fragmented" class="ivf_semenanalysisreport_Fragmented">
<span<?php echo $ivf_semenanalysisreport->Fragmented->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Fragmented->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->NonFragmented->Visible) { // NonFragmented ?>
		<td<?php echo $ivf_semenanalysisreport->NonFragmented->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_NonFragmented" class="ivf_semenanalysisreport_NonFragmented">
<span<?php echo $ivf_semenanalysisreport->NonFragmented->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->NonFragmented->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->DFI->Visible) { // DFI ?>
		<td<?php echo $ivf_semenanalysisreport->DFI->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_DFI" class="ivf_semenanalysisreport_DFI">
<span<?php echo $ivf_semenanalysisreport->DFI->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->DFI->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->IsueBy->Visible) { // IsueBy ?>
		<td<?php echo $ivf_semenanalysisreport->IsueBy->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_IsueBy" class="ivf_semenanalysisreport_IsueBy">
<span<?php echo $ivf_semenanalysisreport->IsueBy->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->IsueBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Volume2->Visible) { // Volume2 ?>
		<td<?php echo $ivf_semenanalysisreport->Volume2->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_Volume2" class="ivf_semenanalysisreport_Volume2">
<span<?php echo $ivf_semenanalysisreport->Volume2->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Volume2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Concentration2->Visible) { // Concentration2 ?>
		<td<?php echo $ivf_semenanalysisreport->Concentration2->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_Concentration2" class="ivf_semenanalysisreport_Concentration2">
<span<?php echo $ivf_semenanalysisreport->Concentration2->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Concentration2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Total2->Visible) { // Total2 ?>
		<td<?php echo $ivf_semenanalysisreport->Total2->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_Total2" class="ivf_semenanalysisreport_Total2">
<span<?php echo $ivf_semenanalysisreport->Total2->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Total2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->ProgressiveMotility2->Visible) { // ProgressiveMotility2 ?>
		<td<?php echo $ivf_semenanalysisreport->ProgressiveMotility2->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_ProgressiveMotility2" class="ivf_semenanalysisreport_ProgressiveMotility2">
<span<?php echo $ivf_semenanalysisreport->ProgressiveMotility2->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->ProgressiveMotility2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->NonProgrssiveMotile2->Visible) { // NonProgrssiveMotile2 ?>
		<td<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile2->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_NonProgrssiveMotile2" class="ivf_semenanalysisreport_NonProgrssiveMotile2">
<span<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile2->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Immotile2->Visible) { // Immotile2 ?>
		<td<?php echo $ivf_semenanalysisreport->Immotile2->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_Immotile2" class="ivf_semenanalysisreport_Immotile2">
<span<?php echo $ivf_semenanalysisreport->Immotile2->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Immotile2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->TotalProgrssiveMotile2->Visible) { // TotalProgrssiveMotile2 ?>
		<td<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile2->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_TotalProgrssiveMotile2" class="ivf_semenanalysisreport_TotalProgrssiveMotile2">
<span<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile2->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->IssuedBy->Visible) { // IssuedBy ?>
		<td<?php echo $ivf_semenanalysisreport->IssuedBy->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_IssuedBy" class="ivf_semenanalysisreport_IssuedBy">
<span<?php echo $ivf_semenanalysisreport->IssuedBy->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->IssuedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->IssuedTo->Visible) { // IssuedTo ?>
		<td<?php echo $ivf_semenanalysisreport->IssuedTo->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_IssuedTo" class="ivf_semenanalysisreport_IssuedTo">
<span<?php echo $ivf_semenanalysisreport->IssuedTo->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->IssuedTo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->PaID->Visible) { // PaID ?>
		<td<?php echo $ivf_semenanalysisreport->PaID->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_PaID" class="ivf_semenanalysisreport_PaID">
<span<?php echo $ivf_semenanalysisreport->PaID->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->PaID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->PaName->Visible) { // PaName ?>
		<td<?php echo $ivf_semenanalysisreport->PaName->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_PaName" class="ivf_semenanalysisreport_PaName">
<span<?php echo $ivf_semenanalysisreport->PaName->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->PaName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->PaMobile->Visible) { // PaMobile ?>
		<td<?php echo $ivf_semenanalysisreport->PaMobile->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_PaMobile" class="ivf_semenanalysisreport_PaMobile">
<span<?php echo $ivf_semenanalysisreport->PaMobile->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->PaMobile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->PartnerID->Visible) { // PartnerID ?>
		<td<?php echo $ivf_semenanalysisreport->PartnerID->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_PartnerID" class="ivf_semenanalysisreport_PartnerID">
<span<?php echo $ivf_semenanalysisreport->PartnerID->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->PartnerID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->PartnerName->Visible) { // PartnerName ?>
		<td<?php echo $ivf_semenanalysisreport->PartnerName->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_PartnerName" class="ivf_semenanalysisreport_PartnerName">
<span<?php echo $ivf_semenanalysisreport->PartnerName->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->PartnerName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->PartnerMobile->Visible) { // PartnerMobile ?>
		<td<?php echo $ivf_semenanalysisreport->PartnerMobile->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_PartnerMobile" class="ivf_semenanalysisreport_PartnerMobile">
<span<?php echo $ivf_semenanalysisreport->PartnerMobile->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->PartnerMobile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
		<td<?php echo $ivf_semenanalysisreport->PREG_TEST_DATE->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_PREG_TEST_DATE" class="ivf_semenanalysisreport_PREG_TEST_DATE">
<span<?php echo $ivf_semenanalysisreport->PREG_TEST_DATE->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->PREG_TEST_DATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->SPECIFIC_PROBLEMS->Visible) { // SPECIFIC_PROBLEMS ?>
		<td<?php echo $ivf_semenanalysisreport->SPECIFIC_PROBLEMS->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_SPECIFIC_PROBLEMS" class="ivf_semenanalysisreport_SPECIFIC_PROBLEMS">
<span<?php echo $ivf_semenanalysisreport->SPECIFIC_PROBLEMS->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->SPECIFIC_PROBLEMS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->IMSC_1->Visible) { // IMSC_1 ?>
		<td<?php echo $ivf_semenanalysisreport->IMSC_1->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_IMSC_1" class="ivf_semenanalysisreport_IMSC_1">
<span<?php echo $ivf_semenanalysisreport->IMSC_1->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->IMSC_1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->IMSC_2->Visible) { // IMSC_2 ?>
		<td<?php echo $ivf_semenanalysisreport->IMSC_2->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_IMSC_2" class="ivf_semenanalysisreport_IMSC_2">
<span<?php echo $ivf_semenanalysisreport->IMSC_2->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->IMSC_2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->LIQUIFACTION_STORAGE->Visible) { // LIQUIFACTION_STORAGE ?>
		<td<?php echo $ivf_semenanalysisreport->LIQUIFACTION_STORAGE->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_LIQUIFACTION_STORAGE" class="ivf_semenanalysisreport_LIQUIFACTION_STORAGE">
<span<?php echo $ivf_semenanalysisreport->LIQUIFACTION_STORAGE->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->LIQUIFACTION_STORAGE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->IUI_PREP_METHOD->Visible) { // IUI_PREP_METHOD ?>
		<td<?php echo $ivf_semenanalysisreport->IUI_PREP_METHOD->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_IUI_PREP_METHOD" class="ivf_semenanalysisreport_IUI_PREP_METHOD">
<span<?php echo $ivf_semenanalysisreport->IUI_PREP_METHOD->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->IUI_PREP_METHOD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->TIME_FROM_TRIGGER->Visible) { // TIME_FROM_TRIGGER ?>
		<td<?php echo $ivf_semenanalysisreport->TIME_FROM_TRIGGER->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_TIME_FROM_TRIGGER" class="ivf_semenanalysisreport_TIME_FROM_TRIGGER">
<span<?php echo $ivf_semenanalysisreport->TIME_FROM_TRIGGER->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->TIME_FROM_TRIGGER->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->Visible) { // COLLECTION_TO_PREPARATION ?>
		<td<?php echo $ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_COLLECTION_TO_PREPARATION" class="ivf_semenanalysisreport_COLLECTION_TO_PREPARATION">
<span<?php echo $ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->Visible) { // TIME_FROM_PREP_TO_INSEM ?>
		<td<?php echo $ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCnt ?>_ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM" class="ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM">
<span<?php echo $ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$ivf_semenanalysisreport_delete->Recordset->moveNext();
}
$ivf_semenanalysisreport_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_semenanalysisreport_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$ivf_semenanalysisreport_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$ivf_semenanalysisreport_delete->terminate();
?>