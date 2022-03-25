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
<?php include_once "header.php"; ?>
<script>
var fivf_semenanalysisreportdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fivf_semenanalysisreportdelete = currentForm = new ew.Form("fivf_semenanalysisreportdelete", "delete");
	loadjs.done("fivf_semenanalysisreportdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $ivf_semenanalysisreport_delete->showPageHeader(); ?>
<?php
$ivf_semenanalysisreport_delete->showMessage();
?>
<form name="fivf_semenanalysisreportdelete" id="fivf_semenanalysisreportdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_semenanalysisreport">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($ivf_semenanalysisreport_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($ivf_semenanalysisreport_delete->id->Visible) { // id ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->id->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_id" class="ivf_semenanalysisreport_id"><?php echo $ivf_semenanalysisreport_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->RIDNo->Visible) { // RIDNo ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->RIDNo->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_RIDNo" class="ivf_semenanalysisreport_RIDNo"><?php echo $ivf_semenanalysisreport_delete->RIDNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->PatientName->Visible) { // PatientName ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->PatientName->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_PatientName" class="ivf_semenanalysisreport_PatientName"><?php echo $ivf_semenanalysisreport_delete->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->HusbandName->Visible) { // HusbandName ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->HusbandName->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_HusbandName" class="ivf_semenanalysisreport_HusbandName"><?php echo $ivf_semenanalysisreport_delete->HusbandName->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->RequestDr->Visible) { // RequestDr ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->RequestDr->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_RequestDr" class="ivf_semenanalysisreport_RequestDr"><?php echo $ivf_semenanalysisreport_delete->RequestDr->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->CollectionDate->Visible) { // CollectionDate ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->CollectionDate->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_CollectionDate" class="ivf_semenanalysisreport_CollectionDate"><?php echo $ivf_semenanalysisreport_delete->CollectionDate->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->ResultDate->Visible) { // ResultDate ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->ResultDate->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_ResultDate" class="ivf_semenanalysisreport_ResultDate"><?php echo $ivf_semenanalysisreport_delete->ResultDate->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->RequestSample->Visible) { // RequestSample ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->RequestSample->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_RequestSample" class="ivf_semenanalysisreport_RequestSample"><?php echo $ivf_semenanalysisreport_delete->RequestSample->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->CollectionType->Visible) { // CollectionType ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->CollectionType->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_CollectionType" class="ivf_semenanalysisreport_CollectionType"><?php echo $ivf_semenanalysisreport_delete->CollectionType->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->CollectionMethod->Visible) { // CollectionMethod ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->CollectionMethod->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_CollectionMethod" class="ivf_semenanalysisreport_CollectionMethod"><?php echo $ivf_semenanalysisreport_delete->CollectionMethod->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Medicationused->Visible) { // Medicationused ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->Medicationused->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Medicationused" class="ivf_semenanalysisreport_Medicationused"><?php echo $ivf_semenanalysisreport_delete->Medicationused->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->DifficultiesinCollection->Visible) { // DifficultiesinCollection ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->DifficultiesinCollection->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_DifficultiesinCollection" class="ivf_semenanalysisreport_DifficultiesinCollection"><?php echo $ivf_semenanalysisreport_delete->DifficultiesinCollection->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->pH->Visible) { // pH ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->pH->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_pH" class="ivf_semenanalysisreport_pH"><?php echo $ivf_semenanalysisreport_delete->pH->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Timeofcollection->Visible) { // Timeofcollection ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->Timeofcollection->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Timeofcollection" class="ivf_semenanalysisreport_Timeofcollection"><?php echo $ivf_semenanalysisreport_delete->Timeofcollection->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Timeofexamination->Visible) { // Timeofexamination ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->Timeofexamination->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Timeofexamination" class="ivf_semenanalysisreport_Timeofexamination"><?php echo $ivf_semenanalysisreport_delete->Timeofexamination->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Volume->Visible) { // Volume ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->Volume->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Volume" class="ivf_semenanalysisreport_Volume"><?php echo $ivf_semenanalysisreport_delete->Volume->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Concentration->Visible) { // Concentration ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->Concentration->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Concentration" class="ivf_semenanalysisreport_Concentration"><?php echo $ivf_semenanalysisreport_delete->Concentration->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Total->Visible) { // Total ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->Total->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Total" class="ivf_semenanalysisreport_Total"><?php echo $ivf_semenanalysisreport_delete->Total->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->ProgressiveMotility->Visible) { // ProgressiveMotility ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->ProgressiveMotility->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_ProgressiveMotility" class="ivf_semenanalysisreport_ProgressiveMotility"><?php echo $ivf_semenanalysisreport_delete->ProgressiveMotility->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->NonProgrssiveMotile->Visible) { // NonProgrssiveMotile ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->NonProgrssiveMotile->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_NonProgrssiveMotile" class="ivf_semenanalysisreport_NonProgrssiveMotile"><?php echo $ivf_semenanalysisreport_delete->NonProgrssiveMotile->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Immotile->Visible) { // Immotile ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->Immotile->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Immotile" class="ivf_semenanalysisreport_Immotile"><?php echo $ivf_semenanalysisreport_delete->Immotile->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->TotalProgrssiveMotile->Visible) { // TotalProgrssiveMotile ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->TotalProgrssiveMotile->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_TotalProgrssiveMotile" class="ivf_semenanalysisreport_TotalProgrssiveMotile"><?php echo $ivf_semenanalysisreport_delete->TotalProgrssiveMotile->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Appearance->Visible) { // Appearance ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->Appearance->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Appearance" class="ivf_semenanalysisreport_Appearance"><?php echo $ivf_semenanalysisreport_delete->Appearance->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Homogenosity->Visible) { // Homogenosity ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->Homogenosity->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Homogenosity" class="ivf_semenanalysisreport_Homogenosity"><?php echo $ivf_semenanalysisreport_delete->Homogenosity->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->CompleteSample->Visible) { // CompleteSample ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->CompleteSample->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_CompleteSample" class="ivf_semenanalysisreport_CompleteSample"><?php echo $ivf_semenanalysisreport_delete->CompleteSample->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Liquefactiontime->Visible) { // Liquefactiontime ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->Liquefactiontime->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Liquefactiontime" class="ivf_semenanalysisreport_Liquefactiontime"><?php echo $ivf_semenanalysisreport_delete->Liquefactiontime->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Normal->Visible) { // Normal ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->Normal->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Normal" class="ivf_semenanalysisreport_Normal"><?php echo $ivf_semenanalysisreport_delete->Normal->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Abnormal->Visible) { // Abnormal ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->Abnormal->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Abnormal" class="ivf_semenanalysisreport_Abnormal"><?php echo $ivf_semenanalysisreport_delete->Abnormal->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Headdefects->Visible) { // Headdefects ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->Headdefects->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Headdefects" class="ivf_semenanalysisreport_Headdefects"><?php echo $ivf_semenanalysisreport_delete->Headdefects->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->MidpieceDefects->Visible) { // MidpieceDefects ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->MidpieceDefects->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_MidpieceDefects" class="ivf_semenanalysisreport_MidpieceDefects"><?php echo $ivf_semenanalysisreport_delete->MidpieceDefects->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->TailDefects->Visible) { // TailDefects ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->TailDefects->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_TailDefects" class="ivf_semenanalysisreport_TailDefects"><?php echo $ivf_semenanalysisreport_delete->TailDefects->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->NormalProgMotile->Visible) { // NormalProgMotile ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->NormalProgMotile->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_NormalProgMotile" class="ivf_semenanalysisreport_NormalProgMotile"><?php echo $ivf_semenanalysisreport_delete->NormalProgMotile->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->ImmatureForms->Visible) { // ImmatureForms ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->ImmatureForms->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_ImmatureForms" class="ivf_semenanalysisreport_ImmatureForms"><?php echo $ivf_semenanalysisreport_delete->ImmatureForms->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Leucocytes->Visible) { // Leucocytes ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->Leucocytes->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Leucocytes" class="ivf_semenanalysisreport_Leucocytes"><?php echo $ivf_semenanalysisreport_delete->Leucocytes->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Agglutination->Visible) { // Agglutination ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->Agglutination->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Agglutination" class="ivf_semenanalysisreport_Agglutination"><?php echo $ivf_semenanalysisreport_delete->Agglutination->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Debris->Visible) { // Debris ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->Debris->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Debris" class="ivf_semenanalysisreport_Debris"><?php echo $ivf_semenanalysisreport_delete->Debris->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Diagnosis->Visible) { // Diagnosis ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->Diagnosis->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Diagnosis" class="ivf_semenanalysisreport_Diagnosis"><?php echo $ivf_semenanalysisreport_delete->Diagnosis->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Observations->Visible) { // Observations ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->Observations->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Observations" class="ivf_semenanalysisreport_Observations"><?php echo $ivf_semenanalysisreport_delete->Observations->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Signature->Visible) { // Signature ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->Signature->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Signature" class="ivf_semenanalysisreport_Signature"><?php echo $ivf_semenanalysisreport_delete->Signature->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->SemenOrgin->Visible) { // SemenOrgin ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->SemenOrgin->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_SemenOrgin" class="ivf_semenanalysisreport_SemenOrgin"><?php echo $ivf_semenanalysisreport_delete->SemenOrgin->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Donor->Visible) { // Donor ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->Donor->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Donor" class="ivf_semenanalysisreport_Donor"><?php echo $ivf_semenanalysisreport_delete->Donor->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->DonorBloodgroup->Visible) { // DonorBloodgroup ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->DonorBloodgroup->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_DonorBloodgroup" class="ivf_semenanalysisreport_DonorBloodgroup"><?php echo $ivf_semenanalysisreport_delete->DonorBloodgroup->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Tank->Visible) { // Tank ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->Tank->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Tank" class="ivf_semenanalysisreport_Tank"><?php echo $ivf_semenanalysisreport_delete->Tank->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Location->Visible) { // Location ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->Location->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Location" class="ivf_semenanalysisreport_Location"><?php echo $ivf_semenanalysisreport_delete->Location->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Volume1->Visible) { // Volume1 ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->Volume1->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Volume1" class="ivf_semenanalysisreport_Volume1"><?php echo $ivf_semenanalysisreport_delete->Volume1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Concentration1->Visible) { // Concentration1 ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->Concentration1->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Concentration1" class="ivf_semenanalysisreport_Concentration1"><?php echo $ivf_semenanalysisreport_delete->Concentration1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Total1->Visible) { // Total1 ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->Total1->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Total1" class="ivf_semenanalysisreport_Total1"><?php echo $ivf_semenanalysisreport_delete->Total1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->ProgressiveMotility1->Visible) { // ProgressiveMotility1 ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->ProgressiveMotility1->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_ProgressiveMotility1" class="ivf_semenanalysisreport_ProgressiveMotility1"><?php echo $ivf_semenanalysisreport_delete->ProgressiveMotility1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->NonProgrssiveMotile1->Visible) { // NonProgrssiveMotile1 ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->NonProgrssiveMotile1->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_NonProgrssiveMotile1" class="ivf_semenanalysisreport_NonProgrssiveMotile1"><?php echo $ivf_semenanalysisreport_delete->NonProgrssiveMotile1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Immotile1->Visible) { // Immotile1 ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->Immotile1->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Immotile1" class="ivf_semenanalysisreport_Immotile1"><?php echo $ivf_semenanalysisreport_delete->Immotile1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->TotalProgrssiveMotile1->Visible) { // TotalProgrssiveMotile1 ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->TotalProgrssiveMotile1->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_TotalProgrssiveMotile1" class="ivf_semenanalysisreport_TotalProgrssiveMotile1"><?php echo $ivf_semenanalysisreport_delete->TotalProgrssiveMotile1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->TidNo->Visible) { // TidNo ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->TidNo->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_TidNo" class="ivf_semenanalysisreport_TidNo"><?php echo $ivf_semenanalysisreport_delete->TidNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Color->Visible) { // Color ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->Color->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Color" class="ivf_semenanalysisreport_Color"><?php echo $ivf_semenanalysisreport_delete->Color->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->DoneBy->Visible) { // DoneBy ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->DoneBy->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_DoneBy" class="ivf_semenanalysisreport_DoneBy"><?php echo $ivf_semenanalysisreport_delete->DoneBy->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Method->Visible) { // Method ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->Method->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Method" class="ivf_semenanalysisreport_Method"><?php echo $ivf_semenanalysisreport_delete->Method->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Abstinence->Visible) { // Abstinence ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->Abstinence->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Abstinence" class="ivf_semenanalysisreport_Abstinence"><?php echo $ivf_semenanalysisreport_delete->Abstinence->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->ProcessedBy->Visible) { // ProcessedBy ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->ProcessedBy->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_ProcessedBy" class="ivf_semenanalysisreport_ProcessedBy"><?php echo $ivf_semenanalysisreport_delete->ProcessedBy->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->InseminationTime->Visible) { // InseminationTime ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->InseminationTime->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_InseminationTime" class="ivf_semenanalysisreport_InseminationTime"><?php echo $ivf_semenanalysisreport_delete->InseminationTime->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->InseminationBy->Visible) { // InseminationBy ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->InseminationBy->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_InseminationBy" class="ivf_semenanalysisreport_InseminationBy"><?php echo $ivf_semenanalysisreport_delete->InseminationBy->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Big->Visible) { // Big ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->Big->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Big" class="ivf_semenanalysisreport_Big"><?php echo $ivf_semenanalysisreport_delete->Big->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Medium->Visible) { // Medium ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->Medium->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Medium" class="ivf_semenanalysisreport_Medium"><?php echo $ivf_semenanalysisreport_delete->Medium->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Small->Visible) { // Small ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->Small->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Small" class="ivf_semenanalysisreport_Small"><?php echo $ivf_semenanalysisreport_delete->Small->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->NoHalo->Visible) { // NoHalo ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->NoHalo->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_NoHalo" class="ivf_semenanalysisreport_NoHalo"><?php echo $ivf_semenanalysisreport_delete->NoHalo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Fragmented->Visible) { // Fragmented ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->Fragmented->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Fragmented" class="ivf_semenanalysisreport_Fragmented"><?php echo $ivf_semenanalysisreport_delete->Fragmented->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->NonFragmented->Visible) { // NonFragmented ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->NonFragmented->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_NonFragmented" class="ivf_semenanalysisreport_NonFragmented"><?php echo $ivf_semenanalysisreport_delete->NonFragmented->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->DFI->Visible) { // DFI ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->DFI->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_DFI" class="ivf_semenanalysisreport_DFI"><?php echo $ivf_semenanalysisreport_delete->DFI->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->IsueBy->Visible) { // IsueBy ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->IsueBy->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_IsueBy" class="ivf_semenanalysisreport_IsueBy"><?php echo $ivf_semenanalysisreport_delete->IsueBy->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Volume2->Visible) { // Volume2 ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->Volume2->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Volume2" class="ivf_semenanalysisreport_Volume2"><?php echo $ivf_semenanalysisreport_delete->Volume2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Concentration2->Visible) { // Concentration2 ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->Concentration2->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Concentration2" class="ivf_semenanalysisreport_Concentration2"><?php echo $ivf_semenanalysisreport_delete->Concentration2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Total2->Visible) { // Total2 ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->Total2->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Total2" class="ivf_semenanalysisreport_Total2"><?php echo $ivf_semenanalysisreport_delete->Total2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->ProgressiveMotility2->Visible) { // ProgressiveMotility2 ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->ProgressiveMotility2->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_ProgressiveMotility2" class="ivf_semenanalysisreport_ProgressiveMotility2"><?php echo $ivf_semenanalysisreport_delete->ProgressiveMotility2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->NonProgrssiveMotile2->Visible) { // NonProgrssiveMotile2 ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->NonProgrssiveMotile2->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_NonProgrssiveMotile2" class="ivf_semenanalysisreport_NonProgrssiveMotile2"><?php echo $ivf_semenanalysisreport_delete->NonProgrssiveMotile2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Immotile2->Visible) { // Immotile2 ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->Immotile2->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Immotile2" class="ivf_semenanalysisreport_Immotile2"><?php echo $ivf_semenanalysisreport_delete->Immotile2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->TotalProgrssiveMotile2->Visible) { // TotalProgrssiveMotile2 ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->TotalProgrssiveMotile2->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_TotalProgrssiveMotile2" class="ivf_semenanalysisreport_TotalProgrssiveMotile2"><?php echo $ivf_semenanalysisreport_delete->TotalProgrssiveMotile2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->IssuedBy->Visible) { // IssuedBy ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->IssuedBy->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_IssuedBy" class="ivf_semenanalysisreport_IssuedBy"><?php echo $ivf_semenanalysisreport_delete->IssuedBy->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->IssuedTo->Visible) { // IssuedTo ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->IssuedTo->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_IssuedTo" class="ivf_semenanalysisreport_IssuedTo"><?php echo $ivf_semenanalysisreport_delete->IssuedTo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->PaID->Visible) { // PaID ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->PaID->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_PaID" class="ivf_semenanalysisreport_PaID"><?php echo $ivf_semenanalysisreport_delete->PaID->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->PaName->Visible) { // PaName ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->PaName->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_PaName" class="ivf_semenanalysisreport_PaName"><?php echo $ivf_semenanalysisreport_delete->PaName->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->PaMobile->Visible) { // PaMobile ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->PaMobile->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_PaMobile" class="ivf_semenanalysisreport_PaMobile"><?php echo $ivf_semenanalysisreport_delete->PaMobile->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->PartnerID->Visible) { // PartnerID ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->PartnerID->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_PartnerID" class="ivf_semenanalysisreport_PartnerID"><?php echo $ivf_semenanalysisreport_delete->PartnerID->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->PartnerName->Visible) { // PartnerName ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->PartnerName->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_PartnerName" class="ivf_semenanalysisreport_PartnerName"><?php echo $ivf_semenanalysisreport_delete->PartnerName->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->PartnerMobile->Visible) { // PartnerMobile ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->PartnerMobile->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_PartnerMobile" class="ivf_semenanalysisreport_PartnerMobile"><?php echo $ivf_semenanalysisreport_delete->PartnerMobile->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->PREG_TEST_DATE->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_PREG_TEST_DATE" class="ivf_semenanalysisreport_PREG_TEST_DATE"><?php echo $ivf_semenanalysisreport_delete->PREG_TEST_DATE->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->SPECIFIC_PROBLEMS->Visible) { // SPECIFIC_PROBLEMS ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->SPECIFIC_PROBLEMS->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_SPECIFIC_PROBLEMS" class="ivf_semenanalysisreport_SPECIFIC_PROBLEMS"><?php echo $ivf_semenanalysisreport_delete->SPECIFIC_PROBLEMS->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->IMSC_1->Visible) { // IMSC_1 ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->IMSC_1->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_IMSC_1" class="ivf_semenanalysisreport_IMSC_1"><?php echo $ivf_semenanalysisreport_delete->IMSC_1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->IMSC_2->Visible) { // IMSC_2 ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->IMSC_2->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_IMSC_2" class="ivf_semenanalysisreport_IMSC_2"><?php echo $ivf_semenanalysisreport_delete->IMSC_2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->LIQUIFACTION_STORAGE->Visible) { // LIQUIFACTION_STORAGE ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->LIQUIFACTION_STORAGE->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_LIQUIFACTION_STORAGE" class="ivf_semenanalysisreport_LIQUIFACTION_STORAGE"><?php echo $ivf_semenanalysisreport_delete->LIQUIFACTION_STORAGE->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->IUI_PREP_METHOD->Visible) { // IUI_PREP_METHOD ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->IUI_PREP_METHOD->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_IUI_PREP_METHOD" class="ivf_semenanalysisreport_IUI_PREP_METHOD"><?php echo $ivf_semenanalysisreport_delete->IUI_PREP_METHOD->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->TIME_FROM_TRIGGER->Visible) { // TIME_FROM_TRIGGER ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->TIME_FROM_TRIGGER->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_TIME_FROM_TRIGGER" class="ivf_semenanalysisreport_TIME_FROM_TRIGGER"><?php echo $ivf_semenanalysisreport_delete->TIME_FROM_TRIGGER->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->COLLECTION_TO_PREPARATION->Visible) { // COLLECTION_TO_PREPARATION ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->COLLECTION_TO_PREPARATION->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_COLLECTION_TO_PREPARATION" class="ivf_semenanalysisreport_COLLECTION_TO_PREPARATION"><?php echo $ivf_semenanalysisreport_delete->COLLECTION_TO_PREPARATION->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->TIME_FROM_PREP_TO_INSEM->Visible) { // TIME_FROM_PREP_TO_INSEM ?>
		<th class="<?php echo $ivf_semenanalysisreport_delete->TIME_FROM_PREP_TO_INSEM->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM" class="ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM"><?php echo $ivf_semenanalysisreport_delete->TIME_FROM_PREP_TO_INSEM->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$ivf_semenanalysisreport_delete->RecordCount = 0;
$i = 0;
while (!$ivf_semenanalysisreport_delete->Recordset->EOF) {
	$ivf_semenanalysisreport_delete->RecordCount++;
	$ivf_semenanalysisreport_delete->RowCount++;

	// Set row properties
	$ivf_semenanalysisreport->resetAttributes();
	$ivf_semenanalysisreport->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$ivf_semenanalysisreport_delete->loadRowValues($ivf_semenanalysisreport_delete->Recordset);

	// Render row
	$ivf_semenanalysisreport_delete->renderRow();
?>
	<tr <?php echo $ivf_semenanalysisreport->rowAttributes() ?>>
<?php if ($ivf_semenanalysisreport_delete->id->Visible) { // id ?>
		<td <?php echo $ivf_semenanalysisreport_delete->id->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_id" class="ivf_semenanalysisreport_id">
<span<?php echo $ivf_semenanalysisreport_delete->id->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->RIDNo->Visible) { // RIDNo ?>
		<td <?php echo $ivf_semenanalysisreport_delete->RIDNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_RIDNo" class="ivf_semenanalysisreport_RIDNo">
<span<?php echo $ivf_semenanalysisreport_delete->RIDNo->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->RIDNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->PatientName->Visible) { // PatientName ?>
		<td <?php echo $ivf_semenanalysisreport_delete->PatientName->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_PatientName" class="ivf_semenanalysisreport_PatientName">
<span<?php echo $ivf_semenanalysisreport_delete->PatientName->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->HusbandName->Visible) { // HusbandName ?>
		<td <?php echo $ivf_semenanalysisreport_delete->HusbandName->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_HusbandName" class="ivf_semenanalysisreport_HusbandName">
<span<?php echo $ivf_semenanalysisreport_delete->HusbandName->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->HusbandName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->RequestDr->Visible) { // RequestDr ?>
		<td <?php echo $ivf_semenanalysisreport_delete->RequestDr->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_RequestDr" class="ivf_semenanalysisreport_RequestDr">
<span<?php echo $ivf_semenanalysisreport_delete->RequestDr->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->RequestDr->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->CollectionDate->Visible) { // CollectionDate ?>
		<td <?php echo $ivf_semenanalysisreport_delete->CollectionDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_CollectionDate" class="ivf_semenanalysisreport_CollectionDate">
<span<?php echo $ivf_semenanalysisreport_delete->CollectionDate->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->CollectionDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->ResultDate->Visible) { // ResultDate ?>
		<td <?php echo $ivf_semenanalysisreport_delete->ResultDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_ResultDate" class="ivf_semenanalysisreport_ResultDate">
<span<?php echo $ivf_semenanalysisreport_delete->ResultDate->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->ResultDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->RequestSample->Visible) { // RequestSample ?>
		<td <?php echo $ivf_semenanalysisreport_delete->RequestSample->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_RequestSample" class="ivf_semenanalysisreport_RequestSample">
<span<?php echo $ivf_semenanalysisreport_delete->RequestSample->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->RequestSample->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->CollectionType->Visible) { // CollectionType ?>
		<td <?php echo $ivf_semenanalysisreport_delete->CollectionType->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_CollectionType" class="ivf_semenanalysisreport_CollectionType">
<span<?php echo $ivf_semenanalysisreport_delete->CollectionType->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->CollectionType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->CollectionMethod->Visible) { // CollectionMethod ?>
		<td <?php echo $ivf_semenanalysisreport_delete->CollectionMethod->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_CollectionMethod" class="ivf_semenanalysisreport_CollectionMethod">
<span<?php echo $ivf_semenanalysisreport_delete->CollectionMethod->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->CollectionMethod->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Medicationused->Visible) { // Medicationused ?>
		<td <?php echo $ivf_semenanalysisreport_delete->Medicationused->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_Medicationused" class="ivf_semenanalysisreport_Medicationused">
<span<?php echo $ivf_semenanalysisreport_delete->Medicationused->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->Medicationused->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->DifficultiesinCollection->Visible) { // DifficultiesinCollection ?>
		<td <?php echo $ivf_semenanalysisreport_delete->DifficultiesinCollection->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_DifficultiesinCollection" class="ivf_semenanalysisreport_DifficultiesinCollection">
<span<?php echo $ivf_semenanalysisreport_delete->DifficultiesinCollection->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->DifficultiesinCollection->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->pH->Visible) { // pH ?>
		<td <?php echo $ivf_semenanalysisreport_delete->pH->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_pH" class="ivf_semenanalysisreport_pH">
<span<?php echo $ivf_semenanalysisreport_delete->pH->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->pH->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Timeofcollection->Visible) { // Timeofcollection ?>
		<td <?php echo $ivf_semenanalysisreport_delete->Timeofcollection->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_Timeofcollection" class="ivf_semenanalysisreport_Timeofcollection">
<span<?php echo $ivf_semenanalysisreport_delete->Timeofcollection->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->Timeofcollection->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Timeofexamination->Visible) { // Timeofexamination ?>
		<td <?php echo $ivf_semenanalysisreport_delete->Timeofexamination->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_Timeofexamination" class="ivf_semenanalysisreport_Timeofexamination">
<span<?php echo $ivf_semenanalysisreport_delete->Timeofexamination->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->Timeofexamination->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Volume->Visible) { // Volume ?>
		<td <?php echo $ivf_semenanalysisreport_delete->Volume->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_Volume" class="ivf_semenanalysisreport_Volume">
<span<?php echo $ivf_semenanalysisreport_delete->Volume->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->Volume->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Concentration->Visible) { // Concentration ?>
		<td <?php echo $ivf_semenanalysisreport_delete->Concentration->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_Concentration" class="ivf_semenanalysisreport_Concentration">
<span<?php echo $ivf_semenanalysisreport_delete->Concentration->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->Concentration->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Total->Visible) { // Total ?>
		<td <?php echo $ivf_semenanalysisreport_delete->Total->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_Total" class="ivf_semenanalysisreport_Total">
<span<?php echo $ivf_semenanalysisreport_delete->Total->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->Total->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->ProgressiveMotility->Visible) { // ProgressiveMotility ?>
		<td <?php echo $ivf_semenanalysisreport_delete->ProgressiveMotility->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_ProgressiveMotility" class="ivf_semenanalysisreport_ProgressiveMotility">
<span<?php echo $ivf_semenanalysisreport_delete->ProgressiveMotility->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->ProgressiveMotility->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->NonProgrssiveMotile->Visible) { // NonProgrssiveMotile ?>
		<td <?php echo $ivf_semenanalysisreport_delete->NonProgrssiveMotile->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_NonProgrssiveMotile" class="ivf_semenanalysisreport_NonProgrssiveMotile">
<span<?php echo $ivf_semenanalysisreport_delete->NonProgrssiveMotile->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->NonProgrssiveMotile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Immotile->Visible) { // Immotile ?>
		<td <?php echo $ivf_semenanalysisreport_delete->Immotile->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_Immotile" class="ivf_semenanalysisreport_Immotile">
<span<?php echo $ivf_semenanalysisreport_delete->Immotile->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->Immotile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->TotalProgrssiveMotile->Visible) { // TotalProgrssiveMotile ?>
		<td <?php echo $ivf_semenanalysisreport_delete->TotalProgrssiveMotile->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_TotalProgrssiveMotile" class="ivf_semenanalysisreport_TotalProgrssiveMotile">
<span<?php echo $ivf_semenanalysisreport_delete->TotalProgrssiveMotile->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->TotalProgrssiveMotile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Appearance->Visible) { // Appearance ?>
		<td <?php echo $ivf_semenanalysisreport_delete->Appearance->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_Appearance" class="ivf_semenanalysisreport_Appearance">
<span<?php echo $ivf_semenanalysisreport_delete->Appearance->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->Appearance->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Homogenosity->Visible) { // Homogenosity ?>
		<td <?php echo $ivf_semenanalysisreport_delete->Homogenosity->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_Homogenosity" class="ivf_semenanalysisreport_Homogenosity">
<span<?php echo $ivf_semenanalysisreport_delete->Homogenosity->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->Homogenosity->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->CompleteSample->Visible) { // CompleteSample ?>
		<td <?php echo $ivf_semenanalysisreport_delete->CompleteSample->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_CompleteSample" class="ivf_semenanalysisreport_CompleteSample">
<span<?php echo $ivf_semenanalysisreport_delete->CompleteSample->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->CompleteSample->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Liquefactiontime->Visible) { // Liquefactiontime ?>
		<td <?php echo $ivf_semenanalysisreport_delete->Liquefactiontime->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_Liquefactiontime" class="ivf_semenanalysisreport_Liquefactiontime">
<span<?php echo $ivf_semenanalysisreport_delete->Liquefactiontime->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->Liquefactiontime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Normal->Visible) { // Normal ?>
		<td <?php echo $ivf_semenanalysisreport_delete->Normal->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_Normal" class="ivf_semenanalysisreport_Normal">
<span<?php echo $ivf_semenanalysisreport_delete->Normal->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->Normal->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Abnormal->Visible) { // Abnormal ?>
		<td <?php echo $ivf_semenanalysisreport_delete->Abnormal->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_Abnormal" class="ivf_semenanalysisreport_Abnormal">
<span<?php echo $ivf_semenanalysisreport_delete->Abnormal->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->Abnormal->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Headdefects->Visible) { // Headdefects ?>
		<td <?php echo $ivf_semenanalysisreport_delete->Headdefects->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_Headdefects" class="ivf_semenanalysisreport_Headdefects">
<span<?php echo $ivf_semenanalysisreport_delete->Headdefects->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->Headdefects->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->MidpieceDefects->Visible) { // MidpieceDefects ?>
		<td <?php echo $ivf_semenanalysisreport_delete->MidpieceDefects->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_MidpieceDefects" class="ivf_semenanalysisreport_MidpieceDefects">
<span<?php echo $ivf_semenanalysisreport_delete->MidpieceDefects->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->MidpieceDefects->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->TailDefects->Visible) { // TailDefects ?>
		<td <?php echo $ivf_semenanalysisreport_delete->TailDefects->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_TailDefects" class="ivf_semenanalysisreport_TailDefects">
<span<?php echo $ivf_semenanalysisreport_delete->TailDefects->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->TailDefects->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->NormalProgMotile->Visible) { // NormalProgMotile ?>
		<td <?php echo $ivf_semenanalysisreport_delete->NormalProgMotile->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_NormalProgMotile" class="ivf_semenanalysisreport_NormalProgMotile">
<span<?php echo $ivf_semenanalysisreport_delete->NormalProgMotile->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->NormalProgMotile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->ImmatureForms->Visible) { // ImmatureForms ?>
		<td <?php echo $ivf_semenanalysisreport_delete->ImmatureForms->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_ImmatureForms" class="ivf_semenanalysisreport_ImmatureForms">
<span<?php echo $ivf_semenanalysisreport_delete->ImmatureForms->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->ImmatureForms->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Leucocytes->Visible) { // Leucocytes ?>
		<td <?php echo $ivf_semenanalysisreport_delete->Leucocytes->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_Leucocytes" class="ivf_semenanalysisreport_Leucocytes">
<span<?php echo $ivf_semenanalysisreport_delete->Leucocytes->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->Leucocytes->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Agglutination->Visible) { // Agglutination ?>
		<td <?php echo $ivf_semenanalysisreport_delete->Agglutination->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_Agglutination" class="ivf_semenanalysisreport_Agglutination">
<span<?php echo $ivf_semenanalysisreport_delete->Agglutination->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->Agglutination->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Debris->Visible) { // Debris ?>
		<td <?php echo $ivf_semenanalysisreport_delete->Debris->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_Debris" class="ivf_semenanalysisreport_Debris">
<span<?php echo $ivf_semenanalysisreport_delete->Debris->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->Debris->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Diagnosis->Visible) { // Diagnosis ?>
		<td <?php echo $ivf_semenanalysisreport_delete->Diagnosis->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_Diagnosis" class="ivf_semenanalysisreport_Diagnosis">
<span<?php echo $ivf_semenanalysisreport_delete->Diagnosis->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->Diagnosis->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Observations->Visible) { // Observations ?>
		<td <?php echo $ivf_semenanalysisreport_delete->Observations->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_Observations" class="ivf_semenanalysisreport_Observations">
<span<?php echo $ivf_semenanalysisreport_delete->Observations->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->Observations->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Signature->Visible) { // Signature ?>
		<td <?php echo $ivf_semenanalysisreport_delete->Signature->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_Signature" class="ivf_semenanalysisreport_Signature">
<span<?php echo $ivf_semenanalysisreport_delete->Signature->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->Signature->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->SemenOrgin->Visible) { // SemenOrgin ?>
		<td <?php echo $ivf_semenanalysisreport_delete->SemenOrgin->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_SemenOrgin" class="ivf_semenanalysisreport_SemenOrgin">
<span<?php echo $ivf_semenanalysisreport_delete->SemenOrgin->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->SemenOrgin->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Donor->Visible) { // Donor ?>
		<td <?php echo $ivf_semenanalysisreport_delete->Donor->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_Donor" class="ivf_semenanalysisreport_Donor">
<span<?php echo $ivf_semenanalysisreport_delete->Donor->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->Donor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->DonorBloodgroup->Visible) { // DonorBloodgroup ?>
		<td <?php echo $ivf_semenanalysisreport_delete->DonorBloodgroup->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_DonorBloodgroup" class="ivf_semenanalysisreport_DonorBloodgroup">
<span<?php echo $ivf_semenanalysisreport_delete->DonorBloodgroup->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->DonorBloodgroup->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Tank->Visible) { // Tank ?>
		<td <?php echo $ivf_semenanalysisreport_delete->Tank->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_Tank" class="ivf_semenanalysisreport_Tank">
<span<?php echo $ivf_semenanalysisreport_delete->Tank->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->Tank->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Location->Visible) { // Location ?>
		<td <?php echo $ivf_semenanalysisreport_delete->Location->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_Location" class="ivf_semenanalysisreport_Location">
<span<?php echo $ivf_semenanalysisreport_delete->Location->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->Location->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Volume1->Visible) { // Volume1 ?>
		<td <?php echo $ivf_semenanalysisreport_delete->Volume1->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_Volume1" class="ivf_semenanalysisreport_Volume1">
<span<?php echo $ivf_semenanalysisreport_delete->Volume1->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->Volume1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Concentration1->Visible) { // Concentration1 ?>
		<td <?php echo $ivf_semenanalysisreport_delete->Concentration1->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_Concentration1" class="ivf_semenanalysisreport_Concentration1">
<span<?php echo $ivf_semenanalysisreport_delete->Concentration1->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->Concentration1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Total1->Visible) { // Total1 ?>
		<td <?php echo $ivf_semenanalysisreport_delete->Total1->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_Total1" class="ivf_semenanalysisreport_Total1">
<span<?php echo $ivf_semenanalysisreport_delete->Total1->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->Total1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->ProgressiveMotility1->Visible) { // ProgressiveMotility1 ?>
		<td <?php echo $ivf_semenanalysisreport_delete->ProgressiveMotility1->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_ProgressiveMotility1" class="ivf_semenanalysisreport_ProgressiveMotility1">
<span<?php echo $ivf_semenanalysisreport_delete->ProgressiveMotility1->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->ProgressiveMotility1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->NonProgrssiveMotile1->Visible) { // NonProgrssiveMotile1 ?>
		<td <?php echo $ivf_semenanalysisreport_delete->NonProgrssiveMotile1->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_NonProgrssiveMotile1" class="ivf_semenanalysisreport_NonProgrssiveMotile1">
<span<?php echo $ivf_semenanalysisreport_delete->NonProgrssiveMotile1->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->NonProgrssiveMotile1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Immotile1->Visible) { // Immotile1 ?>
		<td <?php echo $ivf_semenanalysisreport_delete->Immotile1->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_Immotile1" class="ivf_semenanalysisreport_Immotile1">
<span<?php echo $ivf_semenanalysisreport_delete->Immotile1->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->Immotile1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->TotalProgrssiveMotile1->Visible) { // TotalProgrssiveMotile1 ?>
		<td <?php echo $ivf_semenanalysisreport_delete->TotalProgrssiveMotile1->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_TotalProgrssiveMotile1" class="ivf_semenanalysisreport_TotalProgrssiveMotile1">
<span<?php echo $ivf_semenanalysisreport_delete->TotalProgrssiveMotile1->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->TotalProgrssiveMotile1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->TidNo->Visible) { // TidNo ?>
		<td <?php echo $ivf_semenanalysisreport_delete->TidNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_TidNo" class="ivf_semenanalysisreport_TidNo">
<span<?php echo $ivf_semenanalysisreport_delete->TidNo->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->TidNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Color->Visible) { // Color ?>
		<td <?php echo $ivf_semenanalysisreport_delete->Color->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_Color" class="ivf_semenanalysisreport_Color">
<span<?php echo $ivf_semenanalysisreport_delete->Color->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->Color->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->DoneBy->Visible) { // DoneBy ?>
		<td <?php echo $ivf_semenanalysisreport_delete->DoneBy->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_DoneBy" class="ivf_semenanalysisreport_DoneBy">
<span<?php echo $ivf_semenanalysisreport_delete->DoneBy->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->DoneBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Method->Visible) { // Method ?>
		<td <?php echo $ivf_semenanalysisreport_delete->Method->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_Method" class="ivf_semenanalysisreport_Method">
<span<?php echo $ivf_semenanalysisreport_delete->Method->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->Method->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Abstinence->Visible) { // Abstinence ?>
		<td <?php echo $ivf_semenanalysisreport_delete->Abstinence->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_Abstinence" class="ivf_semenanalysisreport_Abstinence">
<span<?php echo $ivf_semenanalysisreport_delete->Abstinence->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->Abstinence->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->ProcessedBy->Visible) { // ProcessedBy ?>
		<td <?php echo $ivf_semenanalysisreport_delete->ProcessedBy->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_ProcessedBy" class="ivf_semenanalysisreport_ProcessedBy">
<span<?php echo $ivf_semenanalysisreport_delete->ProcessedBy->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->ProcessedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->InseminationTime->Visible) { // InseminationTime ?>
		<td <?php echo $ivf_semenanalysisreport_delete->InseminationTime->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_InseminationTime" class="ivf_semenanalysisreport_InseminationTime">
<span<?php echo $ivf_semenanalysisreport_delete->InseminationTime->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->InseminationTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->InseminationBy->Visible) { // InseminationBy ?>
		<td <?php echo $ivf_semenanalysisreport_delete->InseminationBy->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_InseminationBy" class="ivf_semenanalysisreport_InseminationBy">
<span<?php echo $ivf_semenanalysisreport_delete->InseminationBy->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->InseminationBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Big->Visible) { // Big ?>
		<td <?php echo $ivf_semenanalysisreport_delete->Big->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_Big" class="ivf_semenanalysisreport_Big">
<span<?php echo $ivf_semenanalysisreport_delete->Big->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->Big->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Medium->Visible) { // Medium ?>
		<td <?php echo $ivf_semenanalysisreport_delete->Medium->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_Medium" class="ivf_semenanalysisreport_Medium">
<span<?php echo $ivf_semenanalysisreport_delete->Medium->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->Medium->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Small->Visible) { // Small ?>
		<td <?php echo $ivf_semenanalysisreport_delete->Small->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_Small" class="ivf_semenanalysisreport_Small">
<span<?php echo $ivf_semenanalysisreport_delete->Small->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->Small->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->NoHalo->Visible) { // NoHalo ?>
		<td <?php echo $ivf_semenanalysisreport_delete->NoHalo->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_NoHalo" class="ivf_semenanalysisreport_NoHalo">
<span<?php echo $ivf_semenanalysisreport_delete->NoHalo->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->NoHalo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Fragmented->Visible) { // Fragmented ?>
		<td <?php echo $ivf_semenanalysisreport_delete->Fragmented->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_Fragmented" class="ivf_semenanalysisreport_Fragmented">
<span<?php echo $ivf_semenanalysisreport_delete->Fragmented->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->Fragmented->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->NonFragmented->Visible) { // NonFragmented ?>
		<td <?php echo $ivf_semenanalysisreport_delete->NonFragmented->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_NonFragmented" class="ivf_semenanalysisreport_NonFragmented">
<span<?php echo $ivf_semenanalysisreport_delete->NonFragmented->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->NonFragmented->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->DFI->Visible) { // DFI ?>
		<td <?php echo $ivf_semenanalysisreport_delete->DFI->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_DFI" class="ivf_semenanalysisreport_DFI">
<span<?php echo $ivf_semenanalysisreport_delete->DFI->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->DFI->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->IsueBy->Visible) { // IsueBy ?>
		<td <?php echo $ivf_semenanalysisreport_delete->IsueBy->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_IsueBy" class="ivf_semenanalysisreport_IsueBy">
<span<?php echo $ivf_semenanalysisreport_delete->IsueBy->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->IsueBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Volume2->Visible) { // Volume2 ?>
		<td <?php echo $ivf_semenanalysisreport_delete->Volume2->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_Volume2" class="ivf_semenanalysisreport_Volume2">
<span<?php echo $ivf_semenanalysisreport_delete->Volume2->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->Volume2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Concentration2->Visible) { // Concentration2 ?>
		<td <?php echo $ivf_semenanalysisreport_delete->Concentration2->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_Concentration2" class="ivf_semenanalysisreport_Concentration2">
<span<?php echo $ivf_semenanalysisreport_delete->Concentration2->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->Concentration2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Total2->Visible) { // Total2 ?>
		<td <?php echo $ivf_semenanalysisreport_delete->Total2->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_Total2" class="ivf_semenanalysisreport_Total2">
<span<?php echo $ivf_semenanalysisreport_delete->Total2->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->Total2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->ProgressiveMotility2->Visible) { // ProgressiveMotility2 ?>
		<td <?php echo $ivf_semenanalysisreport_delete->ProgressiveMotility2->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_ProgressiveMotility2" class="ivf_semenanalysisreport_ProgressiveMotility2">
<span<?php echo $ivf_semenanalysisreport_delete->ProgressiveMotility2->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->ProgressiveMotility2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->NonProgrssiveMotile2->Visible) { // NonProgrssiveMotile2 ?>
		<td <?php echo $ivf_semenanalysisreport_delete->NonProgrssiveMotile2->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_NonProgrssiveMotile2" class="ivf_semenanalysisreport_NonProgrssiveMotile2">
<span<?php echo $ivf_semenanalysisreport_delete->NonProgrssiveMotile2->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->NonProgrssiveMotile2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->Immotile2->Visible) { // Immotile2 ?>
		<td <?php echo $ivf_semenanalysisreport_delete->Immotile2->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_Immotile2" class="ivf_semenanalysisreport_Immotile2">
<span<?php echo $ivf_semenanalysisreport_delete->Immotile2->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->Immotile2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->TotalProgrssiveMotile2->Visible) { // TotalProgrssiveMotile2 ?>
		<td <?php echo $ivf_semenanalysisreport_delete->TotalProgrssiveMotile2->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_TotalProgrssiveMotile2" class="ivf_semenanalysisreport_TotalProgrssiveMotile2">
<span<?php echo $ivf_semenanalysisreport_delete->TotalProgrssiveMotile2->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->TotalProgrssiveMotile2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->IssuedBy->Visible) { // IssuedBy ?>
		<td <?php echo $ivf_semenanalysisreport_delete->IssuedBy->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_IssuedBy" class="ivf_semenanalysisreport_IssuedBy">
<span<?php echo $ivf_semenanalysisreport_delete->IssuedBy->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->IssuedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->IssuedTo->Visible) { // IssuedTo ?>
		<td <?php echo $ivf_semenanalysisreport_delete->IssuedTo->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_IssuedTo" class="ivf_semenanalysisreport_IssuedTo">
<span<?php echo $ivf_semenanalysisreport_delete->IssuedTo->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->IssuedTo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->PaID->Visible) { // PaID ?>
		<td <?php echo $ivf_semenanalysisreport_delete->PaID->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_PaID" class="ivf_semenanalysisreport_PaID">
<span<?php echo $ivf_semenanalysisreport_delete->PaID->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->PaID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->PaName->Visible) { // PaName ?>
		<td <?php echo $ivf_semenanalysisreport_delete->PaName->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_PaName" class="ivf_semenanalysisreport_PaName">
<span<?php echo $ivf_semenanalysisreport_delete->PaName->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->PaName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->PaMobile->Visible) { // PaMobile ?>
		<td <?php echo $ivf_semenanalysisreport_delete->PaMobile->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_PaMobile" class="ivf_semenanalysisreport_PaMobile">
<span<?php echo $ivf_semenanalysisreport_delete->PaMobile->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->PaMobile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->PartnerID->Visible) { // PartnerID ?>
		<td <?php echo $ivf_semenanalysisreport_delete->PartnerID->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_PartnerID" class="ivf_semenanalysisreport_PartnerID">
<span<?php echo $ivf_semenanalysisreport_delete->PartnerID->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->PartnerID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->PartnerName->Visible) { // PartnerName ?>
		<td <?php echo $ivf_semenanalysisreport_delete->PartnerName->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_PartnerName" class="ivf_semenanalysisreport_PartnerName">
<span<?php echo $ivf_semenanalysisreport_delete->PartnerName->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->PartnerName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->PartnerMobile->Visible) { // PartnerMobile ?>
		<td <?php echo $ivf_semenanalysisreport_delete->PartnerMobile->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_PartnerMobile" class="ivf_semenanalysisreport_PartnerMobile">
<span<?php echo $ivf_semenanalysisreport_delete->PartnerMobile->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->PartnerMobile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
		<td <?php echo $ivf_semenanalysisreport_delete->PREG_TEST_DATE->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_PREG_TEST_DATE" class="ivf_semenanalysisreport_PREG_TEST_DATE">
<span<?php echo $ivf_semenanalysisreport_delete->PREG_TEST_DATE->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->PREG_TEST_DATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->SPECIFIC_PROBLEMS->Visible) { // SPECIFIC_PROBLEMS ?>
		<td <?php echo $ivf_semenanalysisreport_delete->SPECIFIC_PROBLEMS->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_SPECIFIC_PROBLEMS" class="ivf_semenanalysisreport_SPECIFIC_PROBLEMS">
<span<?php echo $ivf_semenanalysisreport_delete->SPECIFIC_PROBLEMS->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->SPECIFIC_PROBLEMS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->IMSC_1->Visible) { // IMSC_1 ?>
		<td <?php echo $ivf_semenanalysisreport_delete->IMSC_1->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_IMSC_1" class="ivf_semenanalysisreport_IMSC_1">
<span<?php echo $ivf_semenanalysisreport_delete->IMSC_1->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->IMSC_1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->IMSC_2->Visible) { // IMSC_2 ?>
		<td <?php echo $ivf_semenanalysisreport_delete->IMSC_2->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_IMSC_2" class="ivf_semenanalysisreport_IMSC_2">
<span<?php echo $ivf_semenanalysisreport_delete->IMSC_2->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->IMSC_2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->LIQUIFACTION_STORAGE->Visible) { // LIQUIFACTION_STORAGE ?>
		<td <?php echo $ivf_semenanalysisreport_delete->LIQUIFACTION_STORAGE->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_LIQUIFACTION_STORAGE" class="ivf_semenanalysisreport_LIQUIFACTION_STORAGE">
<span<?php echo $ivf_semenanalysisreport_delete->LIQUIFACTION_STORAGE->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->LIQUIFACTION_STORAGE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->IUI_PREP_METHOD->Visible) { // IUI_PREP_METHOD ?>
		<td <?php echo $ivf_semenanalysisreport_delete->IUI_PREP_METHOD->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_IUI_PREP_METHOD" class="ivf_semenanalysisreport_IUI_PREP_METHOD">
<span<?php echo $ivf_semenanalysisreport_delete->IUI_PREP_METHOD->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->IUI_PREP_METHOD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->TIME_FROM_TRIGGER->Visible) { // TIME_FROM_TRIGGER ?>
		<td <?php echo $ivf_semenanalysisreport_delete->TIME_FROM_TRIGGER->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_TIME_FROM_TRIGGER" class="ivf_semenanalysisreport_TIME_FROM_TRIGGER">
<span<?php echo $ivf_semenanalysisreport_delete->TIME_FROM_TRIGGER->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->TIME_FROM_TRIGGER->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->COLLECTION_TO_PREPARATION->Visible) { // COLLECTION_TO_PREPARATION ?>
		<td <?php echo $ivf_semenanalysisreport_delete->COLLECTION_TO_PREPARATION->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_COLLECTION_TO_PREPARATION" class="ivf_semenanalysisreport_COLLECTION_TO_PREPARATION">
<span<?php echo $ivf_semenanalysisreport_delete->COLLECTION_TO_PREPARATION->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->COLLECTION_TO_PREPARATION->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_semenanalysisreport_delete->TIME_FROM_PREP_TO_INSEM->Visible) { // TIME_FROM_PREP_TO_INSEM ?>
		<td <?php echo $ivf_semenanalysisreport_delete->TIME_FROM_PREP_TO_INSEM->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_delete->RowCount ?>_ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM" class="ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM">
<span<?php echo $ivf_semenanalysisreport_delete->TIME_FROM_PREP_TO_INSEM->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_delete->TIME_FROM_PREP_TO_INSEM->getViewValue() ?></span>
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
$ivf_semenanalysisreport_delete->terminate();
?>