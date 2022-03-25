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
$ivf_vitals_history_delete = new ivf_vitals_history_delete();

// Run the page
$ivf_vitals_history_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_vitals_history_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fivf_vitals_historydelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fivf_vitals_historydelete = currentForm = new ew.Form("fivf_vitals_historydelete", "delete");
	loadjs.done("fivf_vitals_historydelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $ivf_vitals_history_delete->showPageHeader(); ?>
<?php
$ivf_vitals_history_delete->showMessage();
?>
<form name="fivf_vitals_historydelete" id="fivf_vitals_historydelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_vitals_history">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($ivf_vitals_history_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($ivf_vitals_history_delete->id->Visible) { // id ?>
		<th class="<?php echo $ivf_vitals_history_delete->id->headerCellClass() ?>"><span id="elh_ivf_vitals_history_id" class="ivf_vitals_history_id"><?php echo $ivf_vitals_history_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->RIDNO->Visible) { // RIDNO ?>
		<th class="<?php echo $ivf_vitals_history_delete->RIDNO->headerCellClass() ?>"><span id="elh_ivf_vitals_history_RIDNO" class="ivf_vitals_history_RIDNO"><?php echo $ivf_vitals_history_delete->RIDNO->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->Name->Visible) { // Name ?>
		<th class="<?php echo $ivf_vitals_history_delete->Name->headerCellClass() ?>"><span id="elh_ivf_vitals_history_Name" class="ivf_vitals_history_Name"><?php echo $ivf_vitals_history_delete->Name->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->Age->Visible) { // Age ?>
		<th class="<?php echo $ivf_vitals_history_delete->Age->headerCellClass() ?>"><span id="elh_ivf_vitals_history_Age" class="ivf_vitals_history_Age"><?php echo $ivf_vitals_history_delete->Age->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->SEX->Visible) { // SEX ?>
		<th class="<?php echo $ivf_vitals_history_delete->SEX->headerCellClass() ?>"><span id="elh_ivf_vitals_history_SEX" class="ivf_vitals_history_SEX"><?php echo $ivf_vitals_history_delete->SEX->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->Religion->Visible) { // Religion ?>
		<th class="<?php echo $ivf_vitals_history_delete->Religion->headerCellClass() ?>"><span id="elh_ivf_vitals_history_Religion" class="ivf_vitals_history_Religion"><?php echo $ivf_vitals_history_delete->Religion->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->Address->Visible) { // Address ?>
		<th class="<?php echo $ivf_vitals_history_delete->Address->headerCellClass() ?>"><span id="elh_ivf_vitals_history_Address" class="ivf_vitals_history_Address"><?php echo $ivf_vitals_history_delete->Address->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->IdentificationMark->Visible) { // IdentificationMark ?>
		<th class="<?php echo $ivf_vitals_history_delete->IdentificationMark->headerCellClass() ?>"><span id="elh_ivf_vitals_history_IdentificationMark" class="ivf_vitals_history_IdentificationMark"><?php echo $ivf_vitals_history_delete->IdentificationMark->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->DoublewitnessName1->Visible) { // DoublewitnessName1 ?>
		<th class="<?php echo $ivf_vitals_history_delete->DoublewitnessName1->headerCellClass() ?>"><span id="elh_ivf_vitals_history_DoublewitnessName1" class="ivf_vitals_history_DoublewitnessName1"><?php echo $ivf_vitals_history_delete->DoublewitnessName1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->DoublewitnessName2->Visible) { // DoublewitnessName2 ?>
		<th class="<?php echo $ivf_vitals_history_delete->DoublewitnessName2->headerCellClass() ?>"><span id="elh_ivf_vitals_history_DoublewitnessName2" class="ivf_vitals_history_DoublewitnessName2"><?php echo $ivf_vitals_history_delete->DoublewitnessName2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->Chiefcomplaints->Visible) { // Chiefcomplaints ?>
		<th class="<?php echo $ivf_vitals_history_delete->Chiefcomplaints->headerCellClass() ?>"><span id="elh_ivf_vitals_history_Chiefcomplaints" class="ivf_vitals_history_Chiefcomplaints"><?php echo $ivf_vitals_history_delete->Chiefcomplaints->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->MenstrualHistory->Visible) { // MenstrualHistory ?>
		<th class="<?php echo $ivf_vitals_history_delete->MenstrualHistory->headerCellClass() ?>"><span id="elh_ivf_vitals_history_MenstrualHistory" class="ivf_vitals_history_MenstrualHistory"><?php echo $ivf_vitals_history_delete->MenstrualHistory->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->ObstetricHistory->Visible) { // ObstetricHistory ?>
		<th class="<?php echo $ivf_vitals_history_delete->ObstetricHistory->headerCellClass() ?>"><span id="elh_ivf_vitals_history_ObstetricHistory" class="ivf_vitals_history_ObstetricHistory"><?php echo $ivf_vitals_history_delete->ObstetricHistory->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->MedicalHistory->Visible) { // MedicalHistory ?>
		<th class="<?php echo $ivf_vitals_history_delete->MedicalHistory->headerCellClass() ?>"><span id="elh_ivf_vitals_history_MedicalHistory" class="ivf_vitals_history_MedicalHistory"><?php echo $ivf_vitals_history_delete->MedicalHistory->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->SurgicalHistory->Visible) { // SurgicalHistory ?>
		<th class="<?php echo $ivf_vitals_history_delete->SurgicalHistory->headerCellClass() ?>"><span id="elh_ivf_vitals_history_SurgicalHistory" class="ivf_vitals_history_SurgicalHistory"><?php echo $ivf_vitals_history_delete->SurgicalHistory->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->Generalexaminationpallor->Visible) { // Generalexaminationpallor ?>
		<th class="<?php echo $ivf_vitals_history_delete->Generalexaminationpallor->headerCellClass() ?>"><span id="elh_ivf_vitals_history_Generalexaminationpallor" class="ivf_vitals_history_Generalexaminationpallor"><?php echo $ivf_vitals_history_delete->Generalexaminationpallor->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->PR->Visible) { // PR ?>
		<th class="<?php echo $ivf_vitals_history_delete->PR->headerCellClass() ?>"><span id="elh_ivf_vitals_history_PR" class="ivf_vitals_history_PR"><?php echo $ivf_vitals_history_delete->PR->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->CVS->Visible) { // CVS ?>
		<th class="<?php echo $ivf_vitals_history_delete->CVS->headerCellClass() ?>"><span id="elh_ivf_vitals_history_CVS" class="ivf_vitals_history_CVS"><?php echo $ivf_vitals_history_delete->CVS->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->PA->Visible) { // PA ?>
		<th class="<?php echo $ivf_vitals_history_delete->PA->headerCellClass() ?>"><span id="elh_ivf_vitals_history_PA" class="ivf_vitals_history_PA"><?php echo $ivf_vitals_history_delete->PA->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->PROVISIONALDIAGNOSIS->Visible) { // PROVISIONALDIAGNOSIS ?>
		<th class="<?php echo $ivf_vitals_history_delete->PROVISIONALDIAGNOSIS->headerCellClass() ?>"><span id="elh_ivf_vitals_history_PROVISIONALDIAGNOSIS" class="ivf_vitals_history_PROVISIONALDIAGNOSIS"><?php echo $ivf_vitals_history_delete->PROVISIONALDIAGNOSIS->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->Investigations->Visible) { // Investigations ?>
		<th class="<?php echo $ivf_vitals_history_delete->Investigations->headerCellClass() ?>"><span id="elh_ivf_vitals_history_Investigations" class="ivf_vitals_history_Investigations"><?php echo $ivf_vitals_history_delete->Investigations->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->Fheight->Visible) { // Fheight ?>
		<th class="<?php echo $ivf_vitals_history_delete->Fheight->headerCellClass() ?>"><span id="elh_ivf_vitals_history_Fheight" class="ivf_vitals_history_Fheight"><?php echo $ivf_vitals_history_delete->Fheight->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->Fweight->Visible) { // Fweight ?>
		<th class="<?php echo $ivf_vitals_history_delete->Fweight->headerCellClass() ?>"><span id="elh_ivf_vitals_history_Fweight" class="ivf_vitals_history_Fweight"><?php echo $ivf_vitals_history_delete->Fweight->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->FBMI->Visible) { // FBMI ?>
		<th class="<?php echo $ivf_vitals_history_delete->FBMI->headerCellClass() ?>"><span id="elh_ivf_vitals_history_FBMI" class="ivf_vitals_history_FBMI"><?php echo $ivf_vitals_history_delete->FBMI->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->FBloodgroup->Visible) { // FBloodgroup ?>
		<th class="<?php echo $ivf_vitals_history_delete->FBloodgroup->headerCellClass() ?>"><span id="elh_ivf_vitals_history_FBloodgroup" class="ivf_vitals_history_FBloodgroup"><?php echo $ivf_vitals_history_delete->FBloodgroup->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->Mheight->Visible) { // Mheight ?>
		<th class="<?php echo $ivf_vitals_history_delete->Mheight->headerCellClass() ?>"><span id="elh_ivf_vitals_history_Mheight" class="ivf_vitals_history_Mheight"><?php echo $ivf_vitals_history_delete->Mheight->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->Mweight->Visible) { // Mweight ?>
		<th class="<?php echo $ivf_vitals_history_delete->Mweight->headerCellClass() ?>"><span id="elh_ivf_vitals_history_Mweight" class="ivf_vitals_history_Mweight"><?php echo $ivf_vitals_history_delete->Mweight->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->MBMI->Visible) { // MBMI ?>
		<th class="<?php echo $ivf_vitals_history_delete->MBMI->headerCellClass() ?>"><span id="elh_ivf_vitals_history_MBMI" class="ivf_vitals_history_MBMI"><?php echo $ivf_vitals_history_delete->MBMI->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->MBloodgroup->Visible) { // MBloodgroup ?>
		<th class="<?php echo $ivf_vitals_history_delete->MBloodgroup->headerCellClass() ?>"><span id="elh_ivf_vitals_history_MBloodgroup" class="ivf_vitals_history_MBloodgroup"><?php echo $ivf_vitals_history_delete->MBloodgroup->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->FBuild->Visible) { // FBuild ?>
		<th class="<?php echo $ivf_vitals_history_delete->FBuild->headerCellClass() ?>"><span id="elh_ivf_vitals_history_FBuild" class="ivf_vitals_history_FBuild"><?php echo $ivf_vitals_history_delete->FBuild->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->MBuild->Visible) { // MBuild ?>
		<th class="<?php echo $ivf_vitals_history_delete->MBuild->headerCellClass() ?>"><span id="elh_ivf_vitals_history_MBuild" class="ivf_vitals_history_MBuild"><?php echo $ivf_vitals_history_delete->MBuild->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->FSkinColor->Visible) { // FSkinColor ?>
		<th class="<?php echo $ivf_vitals_history_delete->FSkinColor->headerCellClass() ?>"><span id="elh_ivf_vitals_history_FSkinColor" class="ivf_vitals_history_FSkinColor"><?php echo $ivf_vitals_history_delete->FSkinColor->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->MSkinColor->Visible) { // MSkinColor ?>
		<th class="<?php echo $ivf_vitals_history_delete->MSkinColor->headerCellClass() ?>"><span id="elh_ivf_vitals_history_MSkinColor" class="ivf_vitals_history_MSkinColor"><?php echo $ivf_vitals_history_delete->MSkinColor->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->FEyesColor->Visible) { // FEyesColor ?>
		<th class="<?php echo $ivf_vitals_history_delete->FEyesColor->headerCellClass() ?>"><span id="elh_ivf_vitals_history_FEyesColor" class="ivf_vitals_history_FEyesColor"><?php echo $ivf_vitals_history_delete->FEyesColor->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->MEyesColor->Visible) { // MEyesColor ?>
		<th class="<?php echo $ivf_vitals_history_delete->MEyesColor->headerCellClass() ?>"><span id="elh_ivf_vitals_history_MEyesColor" class="ivf_vitals_history_MEyesColor"><?php echo $ivf_vitals_history_delete->MEyesColor->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->FHairColor->Visible) { // FHairColor ?>
		<th class="<?php echo $ivf_vitals_history_delete->FHairColor->headerCellClass() ?>"><span id="elh_ivf_vitals_history_FHairColor" class="ivf_vitals_history_FHairColor"><?php echo $ivf_vitals_history_delete->FHairColor->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->MhairColor->Visible) { // MhairColor ?>
		<th class="<?php echo $ivf_vitals_history_delete->MhairColor->headerCellClass() ?>"><span id="elh_ivf_vitals_history_MhairColor" class="ivf_vitals_history_MhairColor"><?php echo $ivf_vitals_history_delete->MhairColor->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->FhairTexture->Visible) { // FhairTexture ?>
		<th class="<?php echo $ivf_vitals_history_delete->FhairTexture->headerCellClass() ?>"><span id="elh_ivf_vitals_history_FhairTexture" class="ivf_vitals_history_FhairTexture"><?php echo $ivf_vitals_history_delete->FhairTexture->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->MHairTexture->Visible) { // MHairTexture ?>
		<th class="<?php echo $ivf_vitals_history_delete->MHairTexture->headerCellClass() ?>"><span id="elh_ivf_vitals_history_MHairTexture" class="ivf_vitals_history_MHairTexture"><?php echo $ivf_vitals_history_delete->MHairTexture->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->Fothers->Visible) { // Fothers ?>
		<th class="<?php echo $ivf_vitals_history_delete->Fothers->headerCellClass() ?>"><span id="elh_ivf_vitals_history_Fothers" class="ivf_vitals_history_Fothers"><?php echo $ivf_vitals_history_delete->Fothers->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->Mothers->Visible) { // Mothers ?>
		<th class="<?php echo $ivf_vitals_history_delete->Mothers->headerCellClass() ?>"><span id="elh_ivf_vitals_history_Mothers" class="ivf_vitals_history_Mothers"><?php echo $ivf_vitals_history_delete->Mothers->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->PGE->Visible) { // PGE ?>
		<th class="<?php echo $ivf_vitals_history_delete->PGE->headerCellClass() ?>"><span id="elh_ivf_vitals_history_PGE" class="ivf_vitals_history_PGE"><?php echo $ivf_vitals_history_delete->PGE->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->PPR->Visible) { // PPR ?>
		<th class="<?php echo $ivf_vitals_history_delete->PPR->headerCellClass() ?>"><span id="elh_ivf_vitals_history_PPR" class="ivf_vitals_history_PPR"><?php echo $ivf_vitals_history_delete->PPR->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->PBP->Visible) { // PBP ?>
		<th class="<?php echo $ivf_vitals_history_delete->PBP->headerCellClass() ?>"><span id="elh_ivf_vitals_history_PBP" class="ivf_vitals_history_PBP"><?php echo $ivf_vitals_history_delete->PBP->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->Breast->Visible) { // Breast ?>
		<th class="<?php echo $ivf_vitals_history_delete->Breast->headerCellClass() ?>"><span id="elh_ivf_vitals_history_Breast" class="ivf_vitals_history_Breast"><?php echo $ivf_vitals_history_delete->Breast->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->PPA->Visible) { // PPA ?>
		<th class="<?php echo $ivf_vitals_history_delete->PPA->headerCellClass() ?>"><span id="elh_ivf_vitals_history_PPA" class="ivf_vitals_history_PPA"><?php echo $ivf_vitals_history_delete->PPA->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->PPSV->Visible) { // PPSV ?>
		<th class="<?php echo $ivf_vitals_history_delete->PPSV->headerCellClass() ?>"><span id="elh_ivf_vitals_history_PPSV" class="ivf_vitals_history_PPSV"><?php echo $ivf_vitals_history_delete->PPSV->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->PPAPSMEAR->Visible) { // PPAPSMEAR ?>
		<th class="<?php echo $ivf_vitals_history_delete->PPAPSMEAR->headerCellClass() ?>"><span id="elh_ivf_vitals_history_PPAPSMEAR" class="ivf_vitals_history_PPAPSMEAR"><?php echo $ivf_vitals_history_delete->PPAPSMEAR->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->PTHYROID->Visible) { // PTHYROID ?>
		<th class="<?php echo $ivf_vitals_history_delete->PTHYROID->headerCellClass() ?>"><span id="elh_ivf_vitals_history_PTHYROID" class="ivf_vitals_history_PTHYROID"><?php echo $ivf_vitals_history_delete->PTHYROID->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->MTHYROID->Visible) { // MTHYROID ?>
		<th class="<?php echo $ivf_vitals_history_delete->MTHYROID->headerCellClass() ?>"><span id="elh_ivf_vitals_history_MTHYROID" class="ivf_vitals_history_MTHYROID"><?php echo $ivf_vitals_history_delete->MTHYROID->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->SecSexCharacters->Visible) { // SecSexCharacters ?>
		<th class="<?php echo $ivf_vitals_history_delete->SecSexCharacters->headerCellClass() ?>"><span id="elh_ivf_vitals_history_SecSexCharacters" class="ivf_vitals_history_SecSexCharacters"><?php echo $ivf_vitals_history_delete->SecSexCharacters->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->PenisUM->Visible) { // PenisUM ?>
		<th class="<?php echo $ivf_vitals_history_delete->PenisUM->headerCellClass() ?>"><span id="elh_ivf_vitals_history_PenisUM" class="ivf_vitals_history_PenisUM"><?php echo $ivf_vitals_history_delete->PenisUM->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->VAS->Visible) { // VAS ?>
		<th class="<?php echo $ivf_vitals_history_delete->VAS->headerCellClass() ?>"><span id="elh_ivf_vitals_history_VAS" class="ivf_vitals_history_VAS"><?php echo $ivf_vitals_history_delete->VAS->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->EPIDIDYMIS->Visible) { // EPIDIDYMIS ?>
		<th class="<?php echo $ivf_vitals_history_delete->EPIDIDYMIS->headerCellClass() ?>"><span id="elh_ivf_vitals_history_EPIDIDYMIS" class="ivf_vitals_history_EPIDIDYMIS"><?php echo $ivf_vitals_history_delete->EPIDIDYMIS->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->Varicocele->Visible) { // Varicocele ?>
		<th class="<?php echo $ivf_vitals_history_delete->Varicocele->headerCellClass() ?>"><span id="elh_ivf_vitals_history_Varicocele" class="ivf_vitals_history_Varicocele"><?php echo $ivf_vitals_history_delete->Varicocele->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->FamilyHistory->Visible) { // FamilyHistory ?>
		<th class="<?php echo $ivf_vitals_history_delete->FamilyHistory->headerCellClass() ?>"><span id="elh_ivf_vitals_history_FamilyHistory" class="ivf_vitals_history_FamilyHistory"><?php echo $ivf_vitals_history_delete->FamilyHistory->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->Addictions->Visible) { // Addictions ?>
		<th class="<?php echo $ivf_vitals_history_delete->Addictions->headerCellClass() ?>"><span id="elh_ivf_vitals_history_Addictions" class="ivf_vitals_history_Addictions"><?php echo $ivf_vitals_history_delete->Addictions->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->Medical->Visible) { // Medical ?>
		<th class="<?php echo $ivf_vitals_history_delete->Medical->headerCellClass() ?>"><span id="elh_ivf_vitals_history_Medical" class="ivf_vitals_history_Medical"><?php echo $ivf_vitals_history_delete->Medical->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->Surgical->Visible) { // Surgical ?>
		<th class="<?php echo $ivf_vitals_history_delete->Surgical->headerCellClass() ?>"><span id="elh_ivf_vitals_history_Surgical" class="ivf_vitals_history_Surgical"><?php echo $ivf_vitals_history_delete->Surgical->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->CoitalHistory->Visible) { // CoitalHistory ?>
		<th class="<?php echo $ivf_vitals_history_delete->CoitalHistory->headerCellClass() ?>"><span id="elh_ivf_vitals_history_CoitalHistory" class="ivf_vitals_history_CoitalHistory"><?php echo $ivf_vitals_history_delete->CoitalHistory->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->MariedFor->Visible) { // MariedFor ?>
		<th class="<?php echo $ivf_vitals_history_delete->MariedFor->headerCellClass() ?>"><span id="elh_ivf_vitals_history_MariedFor" class="ivf_vitals_history_MariedFor"><?php echo $ivf_vitals_history_delete->MariedFor->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->CMNCM->Visible) { // CMNCM ?>
		<th class="<?php echo $ivf_vitals_history_delete->CMNCM->headerCellClass() ?>"><span id="elh_ivf_vitals_history_CMNCM" class="ivf_vitals_history_CMNCM"><?php echo $ivf_vitals_history_delete->CMNCM->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->TidNo->Visible) { // TidNo ?>
		<th class="<?php echo $ivf_vitals_history_delete->TidNo->headerCellClass() ?>"><span id="elh_ivf_vitals_history_TidNo" class="ivf_vitals_history_TidNo"><?php echo $ivf_vitals_history_delete->TidNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history_delete->pFamilyHistory->Visible) { // pFamilyHistory ?>
		<th class="<?php echo $ivf_vitals_history_delete->pFamilyHistory->headerCellClass() ?>"><span id="elh_ivf_vitals_history_pFamilyHistory" class="ivf_vitals_history_pFamilyHistory"><?php echo $ivf_vitals_history_delete->pFamilyHistory->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$ivf_vitals_history_delete->RecordCount = 0;
$i = 0;
while (!$ivf_vitals_history_delete->Recordset->EOF) {
	$ivf_vitals_history_delete->RecordCount++;
	$ivf_vitals_history_delete->RowCount++;

	// Set row properties
	$ivf_vitals_history->resetAttributes();
	$ivf_vitals_history->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$ivf_vitals_history_delete->loadRowValues($ivf_vitals_history_delete->Recordset);

	// Render row
	$ivf_vitals_history_delete->renderRow();
?>
	<tr <?php echo $ivf_vitals_history->rowAttributes() ?>>
<?php if ($ivf_vitals_history_delete->id->Visible) { // id ?>
		<td <?php echo $ivf_vitals_history_delete->id->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_id" class="ivf_vitals_history_id">
<span<?php echo $ivf_vitals_history_delete->id->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->RIDNO->Visible) { // RIDNO ?>
		<td <?php echo $ivf_vitals_history_delete->RIDNO->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_RIDNO" class="ivf_vitals_history_RIDNO">
<span<?php echo $ivf_vitals_history_delete->RIDNO->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->RIDNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->Name->Visible) { // Name ?>
		<td <?php echo $ivf_vitals_history_delete->Name->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_Name" class="ivf_vitals_history_Name">
<span<?php echo $ivf_vitals_history_delete->Name->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->Age->Visible) { // Age ?>
		<td <?php echo $ivf_vitals_history_delete->Age->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_Age" class="ivf_vitals_history_Age">
<span<?php echo $ivf_vitals_history_delete->Age->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->Age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->SEX->Visible) { // SEX ?>
		<td <?php echo $ivf_vitals_history_delete->SEX->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_SEX" class="ivf_vitals_history_SEX">
<span<?php echo $ivf_vitals_history_delete->SEX->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->SEX->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->Religion->Visible) { // Religion ?>
		<td <?php echo $ivf_vitals_history_delete->Religion->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_Religion" class="ivf_vitals_history_Religion">
<span<?php echo $ivf_vitals_history_delete->Religion->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->Religion->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->Address->Visible) { // Address ?>
		<td <?php echo $ivf_vitals_history_delete->Address->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_Address" class="ivf_vitals_history_Address">
<span<?php echo $ivf_vitals_history_delete->Address->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->Address->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->IdentificationMark->Visible) { // IdentificationMark ?>
		<td <?php echo $ivf_vitals_history_delete->IdentificationMark->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_IdentificationMark" class="ivf_vitals_history_IdentificationMark">
<span<?php echo $ivf_vitals_history_delete->IdentificationMark->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->IdentificationMark->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->DoublewitnessName1->Visible) { // DoublewitnessName1 ?>
		<td <?php echo $ivf_vitals_history_delete->DoublewitnessName1->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_DoublewitnessName1" class="ivf_vitals_history_DoublewitnessName1">
<span<?php echo $ivf_vitals_history_delete->DoublewitnessName1->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->DoublewitnessName1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->DoublewitnessName2->Visible) { // DoublewitnessName2 ?>
		<td <?php echo $ivf_vitals_history_delete->DoublewitnessName2->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_DoublewitnessName2" class="ivf_vitals_history_DoublewitnessName2">
<span<?php echo $ivf_vitals_history_delete->DoublewitnessName2->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->DoublewitnessName2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->Chiefcomplaints->Visible) { // Chiefcomplaints ?>
		<td <?php echo $ivf_vitals_history_delete->Chiefcomplaints->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_Chiefcomplaints" class="ivf_vitals_history_Chiefcomplaints">
<span<?php echo $ivf_vitals_history_delete->Chiefcomplaints->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->Chiefcomplaints->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->MenstrualHistory->Visible) { // MenstrualHistory ?>
		<td <?php echo $ivf_vitals_history_delete->MenstrualHistory->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_MenstrualHistory" class="ivf_vitals_history_MenstrualHistory">
<span<?php echo $ivf_vitals_history_delete->MenstrualHistory->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->MenstrualHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->ObstetricHistory->Visible) { // ObstetricHistory ?>
		<td <?php echo $ivf_vitals_history_delete->ObstetricHistory->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_ObstetricHistory" class="ivf_vitals_history_ObstetricHistory">
<span<?php echo $ivf_vitals_history_delete->ObstetricHistory->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->ObstetricHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->MedicalHistory->Visible) { // MedicalHistory ?>
		<td <?php echo $ivf_vitals_history_delete->MedicalHistory->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_MedicalHistory" class="ivf_vitals_history_MedicalHistory">
<span<?php echo $ivf_vitals_history_delete->MedicalHistory->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->MedicalHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->SurgicalHistory->Visible) { // SurgicalHistory ?>
		<td <?php echo $ivf_vitals_history_delete->SurgicalHistory->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_SurgicalHistory" class="ivf_vitals_history_SurgicalHistory">
<span<?php echo $ivf_vitals_history_delete->SurgicalHistory->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->SurgicalHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->Generalexaminationpallor->Visible) { // Generalexaminationpallor ?>
		<td <?php echo $ivf_vitals_history_delete->Generalexaminationpallor->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_Generalexaminationpallor" class="ivf_vitals_history_Generalexaminationpallor">
<span<?php echo $ivf_vitals_history_delete->Generalexaminationpallor->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->Generalexaminationpallor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->PR->Visible) { // PR ?>
		<td <?php echo $ivf_vitals_history_delete->PR->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_PR" class="ivf_vitals_history_PR">
<span<?php echo $ivf_vitals_history_delete->PR->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->PR->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->CVS->Visible) { // CVS ?>
		<td <?php echo $ivf_vitals_history_delete->CVS->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_CVS" class="ivf_vitals_history_CVS">
<span<?php echo $ivf_vitals_history_delete->CVS->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->CVS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->PA->Visible) { // PA ?>
		<td <?php echo $ivf_vitals_history_delete->PA->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_PA" class="ivf_vitals_history_PA">
<span<?php echo $ivf_vitals_history_delete->PA->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->PA->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->PROVISIONALDIAGNOSIS->Visible) { // PROVISIONALDIAGNOSIS ?>
		<td <?php echo $ivf_vitals_history_delete->PROVISIONALDIAGNOSIS->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_PROVISIONALDIAGNOSIS" class="ivf_vitals_history_PROVISIONALDIAGNOSIS">
<span<?php echo $ivf_vitals_history_delete->PROVISIONALDIAGNOSIS->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->PROVISIONALDIAGNOSIS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->Investigations->Visible) { // Investigations ?>
		<td <?php echo $ivf_vitals_history_delete->Investigations->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_Investigations" class="ivf_vitals_history_Investigations">
<span<?php echo $ivf_vitals_history_delete->Investigations->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->Investigations->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->Fheight->Visible) { // Fheight ?>
		<td <?php echo $ivf_vitals_history_delete->Fheight->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_Fheight" class="ivf_vitals_history_Fheight">
<span<?php echo $ivf_vitals_history_delete->Fheight->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->Fheight->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->Fweight->Visible) { // Fweight ?>
		<td <?php echo $ivf_vitals_history_delete->Fweight->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_Fweight" class="ivf_vitals_history_Fweight">
<span<?php echo $ivf_vitals_history_delete->Fweight->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->Fweight->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->FBMI->Visible) { // FBMI ?>
		<td <?php echo $ivf_vitals_history_delete->FBMI->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_FBMI" class="ivf_vitals_history_FBMI">
<span<?php echo $ivf_vitals_history_delete->FBMI->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->FBMI->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->FBloodgroup->Visible) { // FBloodgroup ?>
		<td <?php echo $ivf_vitals_history_delete->FBloodgroup->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_FBloodgroup" class="ivf_vitals_history_FBloodgroup">
<span<?php echo $ivf_vitals_history_delete->FBloodgroup->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->FBloodgroup->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->Mheight->Visible) { // Mheight ?>
		<td <?php echo $ivf_vitals_history_delete->Mheight->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_Mheight" class="ivf_vitals_history_Mheight">
<span<?php echo $ivf_vitals_history_delete->Mheight->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->Mheight->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->Mweight->Visible) { // Mweight ?>
		<td <?php echo $ivf_vitals_history_delete->Mweight->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_Mweight" class="ivf_vitals_history_Mweight">
<span<?php echo $ivf_vitals_history_delete->Mweight->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->Mweight->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->MBMI->Visible) { // MBMI ?>
		<td <?php echo $ivf_vitals_history_delete->MBMI->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_MBMI" class="ivf_vitals_history_MBMI">
<span<?php echo $ivf_vitals_history_delete->MBMI->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->MBMI->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->MBloodgroup->Visible) { // MBloodgroup ?>
		<td <?php echo $ivf_vitals_history_delete->MBloodgroup->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_MBloodgroup" class="ivf_vitals_history_MBloodgroup">
<span<?php echo $ivf_vitals_history_delete->MBloodgroup->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->MBloodgroup->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->FBuild->Visible) { // FBuild ?>
		<td <?php echo $ivf_vitals_history_delete->FBuild->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_FBuild" class="ivf_vitals_history_FBuild">
<span<?php echo $ivf_vitals_history_delete->FBuild->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->FBuild->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->MBuild->Visible) { // MBuild ?>
		<td <?php echo $ivf_vitals_history_delete->MBuild->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_MBuild" class="ivf_vitals_history_MBuild">
<span<?php echo $ivf_vitals_history_delete->MBuild->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->MBuild->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->FSkinColor->Visible) { // FSkinColor ?>
		<td <?php echo $ivf_vitals_history_delete->FSkinColor->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_FSkinColor" class="ivf_vitals_history_FSkinColor">
<span<?php echo $ivf_vitals_history_delete->FSkinColor->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->FSkinColor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->MSkinColor->Visible) { // MSkinColor ?>
		<td <?php echo $ivf_vitals_history_delete->MSkinColor->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_MSkinColor" class="ivf_vitals_history_MSkinColor">
<span<?php echo $ivf_vitals_history_delete->MSkinColor->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->MSkinColor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->FEyesColor->Visible) { // FEyesColor ?>
		<td <?php echo $ivf_vitals_history_delete->FEyesColor->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_FEyesColor" class="ivf_vitals_history_FEyesColor">
<span<?php echo $ivf_vitals_history_delete->FEyesColor->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->FEyesColor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->MEyesColor->Visible) { // MEyesColor ?>
		<td <?php echo $ivf_vitals_history_delete->MEyesColor->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_MEyesColor" class="ivf_vitals_history_MEyesColor">
<span<?php echo $ivf_vitals_history_delete->MEyesColor->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->MEyesColor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->FHairColor->Visible) { // FHairColor ?>
		<td <?php echo $ivf_vitals_history_delete->FHairColor->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_FHairColor" class="ivf_vitals_history_FHairColor">
<span<?php echo $ivf_vitals_history_delete->FHairColor->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->FHairColor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->MhairColor->Visible) { // MhairColor ?>
		<td <?php echo $ivf_vitals_history_delete->MhairColor->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_MhairColor" class="ivf_vitals_history_MhairColor">
<span<?php echo $ivf_vitals_history_delete->MhairColor->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->MhairColor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->FhairTexture->Visible) { // FhairTexture ?>
		<td <?php echo $ivf_vitals_history_delete->FhairTexture->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_FhairTexture" class="ivf_vitals_history_FhairTexture">
<span<?php echo $ivf_vitals_history_delete->FhairTexture->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->FhairTexture->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->MHairTexture->Visible) { // MHairTexture ?>
		<td <?php echo $ivf_vitals_history_delete->MHairTexture->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_MHairTexture" class="ivf_vitals_history_MHairTexture">
<span<?php echo $ivf_vitals_history_delete->MHairTexture->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->MHairTexture->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->Fothers->Visible) { // Fothers ?>
		<td <?php echo $ivf_vitals_history_delete->Fothers->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_Fothers" class="ivf_vitals_history_Fothers">
<span<?php echo $ivf_vitals_history_delete->Fothers->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->Fothers->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->Mothers->Visible) { // Mothers ?>
		<td <?php echo $ivf_vitals_history_delete->Mothers->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_Mothers" class="ivf_vitals_history_Mothers">
<span<?php echo $ivf_vitals_history_delete->Mothers->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->Mothers->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->PGE->Visible) { // PGE ?>
		<td <?php echo $ivf_vitals_history_delete->PGE->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_PGE" class="ivf_vitals_history_PGE">
<span<?php echo $ivf_vitals_history_delete->PGE->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->PGE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->PPR->Visible) { // PPR ?>
		<td <?php echo $ivf_vitals_history_delete->PPR->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_PPR" class="ivf_vitals_history_PPR">
<span<?php echo $ivf_vitals_history_delete->PPR->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->PPR->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->PBP->Visible) { // PBP ?>
		<td <?php echo $ivf_vitals_history_delete->PBP->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_PBP" class="ivf_vitals_history_PBP">
<span<?php echo $ivf_vitals_history_delete->PBP->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->PBP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->Breast->Visible) { // Breast ?>
		<td <?php echo $ivf_vitals_history_delete->Breast->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_Breast" class="ivf_vitals_history_Breast">
<span<?php echo $ivf_vitals_history_delete->Breast->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->Breast->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->PPA->Visible) { // PPA ?>
		<td <?php echo $ivf_vitals_history_delete->PPA->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_PPA" class="ivf_vitals_history_PPA">
<span<?php echo $ivf_vitals_history_delete->PPA->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->PPA->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->PPSV->Visible) { // PPSV ?>
		<td <?php echo $ivf_vitals_history_delete->PPSV->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_PPSV" class="ivf_vitals_history_PPSV">
<span<?php echo $ivf_vitals_history_delete->PPSV->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->PPSV->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->PPAPSMEAR->Visible) { // PPAPSMEAR ?>
		<td <?php echo $ivf_vitals_history_delete->PPAPSMEAR->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_PPAPSMEAR" class="ivf_vitals_history_PPAPSMEAR">
<span<?php echo $ivf_vitals_history_delete->PPAPSMEAR->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->PPAPSMEAR->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->PTHYROID->Visible) { // PTHYROID ?>
		<td <?php echo $ivf_vitals_history_delete->PTHYROID->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_PTHYROID" class="ivf_vitals_history_PTHYROID">
<span<?php echo $ivf_vitals_history_delete->PTHYROID->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->PTHYROID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->MTHYROID->Visible) { // MTHYROID ?>
		<td <?php echo $ivf_vitals_history_delete->MTHYROID->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_MTHYROID" class="ivf_vitals_history_MTHYROID">
<span<?php echo $ivf_vitals_history_delete->MTHYROID->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->MTHYROID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->SecSexCharacters->Visible) { // SecSexCharacters ?>
		<td <?php echo $ivf_vitals_history_delete->SecSexCharacters->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_SecSexCharacters" class="ivf_vitals_history_SecSexCharacters">
<span<?php echo $ivf_vitals_history_delete->SecSexCharacters->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->SecSexCharacters->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->PenisUM->Visible) { // PenisUM ?>
		<td <?php echo $ivf_vitals_history_delete->PenisUM->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_PenisUM" class="ivf_vitals_history_PenisUM">
<span<?php echo $ivf_vitals_history_delete->PenisUM->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->PenisUM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->VAS->Visible) { // VAS ?>
		<td <?php echo $ivf_vitals_history_delete->VAS->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_VAS" class="ivf_vitals_history_VAS">
<span<?php echo $ivf_vitals_history_delete->VAS->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->VAS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->EPIDIDYMIS->Visible) { // EPIDIDYMIS ?>
		<td <?php echo $ivf_vitals_history_delete->EPIDIDYMIS->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_EPIDIDYMIS" class="ivf_vitals_history_EPIDIDYMIS">
<span<?php echo $ivf_vitals_history_delete->EPIDIDYMIS->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->EPIDIDYMIS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->Varicocele->Visible) { // Varicocele ?>
		<td <?php echo $ivf_vitals_history_delete->Varicocele->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_Varicocele" class="ivf_vitals_history_Varicocele">
<span<?php echo $ivf_vitals_history_delete->Varicocele->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->Varicocele->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->FamilyHistory->Visible) { // FamilyHistory ?>
		<td <?php echo $ivf_vitals_history_delete->FamilyHistory->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_FamilyHistory" class="ivf_vitals_history_FamilyHistory">
<span<?php echo $ivf_vitals_history_delete->FamilyHistory->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->FamilyHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->Addictions->Visible) { // Addictions ?>
		<td <?php echo $ivf_vitals_history_delete->Addictions->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_Addictions" class="ivf_vitals_history_Addictions">
<span<?php echo $ivf_vitals_history_delete->Addictions->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->Addictions->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->Medical->Visible) { // Medical ?>
		<td <?php echo $ivf_vitals_history_delete->Medical->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_Medical" class="ivf_vitals_history_Medical">
<span<?php echo $ivf_vitals_history_delete->Medical->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->Medical->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->Surgical->Visible) { // Surgical ?>
		<td <?php echo $ivf_vitals_history_delete->Surgical->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_Surgical" class="ivf_vitals_history_Surgical">
<span<?php echo $ivf_vitals_history_delete->Surgical->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->Surgical->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->CoitalHistory->Visible) { // CoitalHistory ?>
		<td <?php echo $ivf_vitals_history_delete->CoitalHistory->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_CoitalHistory" class="ivf_vitals_history_CoitalHistory">
<span<?php echo $ivf_vitals_history_delete->CoitalHistory->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->CoitalHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->MariedFor->Visible) { // MariedFor ?>
		<td <?php echo $ivf_vitals_history_delete->MariedFor->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_MariedFor" class="ivf_vitals_history_MariedFor">
<span<?php echo $ivf_vitals_history_delete->MariedFor->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->MariedFor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->CMNCM->Visible) { // CMNCM ?>
		<td <?php echo $ivf_vitals_history_delete->CMNCM->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_CMNCM" class="ivf_vitals_history_CMNCM">
<span<?php echo $ivf_vitals_history_delete->CMNCM->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->CMNCM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->TidNo->Visible) { // TidNo ?>
		<td <?php echo $ivf_vitals_history_delete->TidNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_TidNo" class="ivf_vitals_history_TidNo">
<span<?php echo $ivf_vitals_history_delete->TidNo->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->TidNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history_delete->pFamilyHistory->Visible) { // pFamilyHistory ?>
		<td <?php echo $ivf_vitals_history_delete->pFamilyHistory->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCount ?>_ivf_vitals_history_pFamilyHistory" class="ivf_vitals_history_pFamilyHistory">
<span<?php echo $ivf_vitals_history_delete->pFamilyHistory->viewAttributes() ?>><?php echo $ivf_vitals_history_delete->pFamilyHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$ivf_vitals_history_delete->Recordset->moveNext();
}
$ivf_vitals_history_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_vitals_history_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$ivf_vitals_history_delete->showPageFooter();
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
$ivf_vitals_history_delete->terminate();
?>