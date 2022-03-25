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
$ivf_vitals_history_view = new ivf_vitals_history_view();

// Run the page
$ivf_vitals_history_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_vitals_history_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$ivf_vitals_history_view->isExport()) { ?>
<script>
var fivf_vitals_historyview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fivf_vitals_historyview = currentForm = new ew.Form("fivf_vitals_historyview", "view");
	loadjs.done("fivf_vitals_historyview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$ivf_vitals_history_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $ivf_vitals_history_view->ExportOptions->render("body") ?>
<?php $ivf_vitals_history_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $ivf_vitals_history_view->showPageHeader(); ?>
<?php
$ivf_vitals_history_view->showMessage();
?>
<form name="fivf_vitals_historyview" id="fivf_vitals_historyview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_vitals_history">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_vitals_history_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($ivf_vitals_history_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_id"><script id="tpc_ivf_vitals_history_id" type="text/html"><?php echo $ivf_vitals_history_view->id->caption() ?></script></span></td>
		<td data-name="id" <?php echo $ivf_vitals_history_view->id->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_id" type="text/html"><span id="el_ivf_vitals_history_id">
<span<?php echo $ivf_vitals_history_view->id->viewAttributes() ?>><?php echo $ivf_vitals_history_view->id->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->RIDNO->Visible) { // RIDNO ?>
	<tr id="r_RIDNO">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_RIDNO"><script id="tpc_ivf_vitals_history_RIDNO" type="text/html"><?php echo $ivf_vitals_history_view->RIDNO->caption() ?></script></span></td>
		<td data-name="RIDNO" <?php echo $ivf_vitals_history_view->RIDNO->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_RIDNO" type="text/html"><span id="el_ivf_vitals_history_RIDNO">
<span<?php echo $ivf_vitals_history_view->RIDNO->viewAttributes() ?>><?php echo $ivf_vitals_history_view->RIDNO->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->Name->Visible) { // Name ?>
	<tr id="r_Name">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_Name"><script id="tpc_ivf_vitals_history_Name" type="text/html"><?php echo $ivf_vitals_history_view->Name->caption() ?></script></span></td>
		<td data-name="Name" <?php echo $ivf_vitals_history_view->Name->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Name" type="text/html"><span id="el_ivf_vitals_history_Name">
<span<?php echo $ivf_vitals_history_view->Name->viewAttributes() ?>><?php echo $ivf_vitals_history_view->Name->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->Age->Visible) { // Age ?>
	<tr id="r_Age">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_Age"><script id="tpc_ivf_vitals_history_Age" type="text/html"><?php echo $ivf_vitals_history_view->Age->caption() ?></script></span></td>
		<td data-name="Age" <?php echo $ivf_vitals_history_view->Age->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Age" type="text/html"><span id="el_ivf_vitals_history_Age">
<span<?php echo $ivf_vitals_history_view->Age->viewAttributes() ?>><?php echo $ivf_vitals_history_view->Age->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->SEX->Visible) { // SEX ?>
	<tr id="r_SEX">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_SEX"><script id="tpc_ivf_vitals_history_SEX" type="text/html"><?php echo $ivf_vitals_history_view->SEX->caption() ?></script></span></td>
		<td data-name="SEX" <?php echo $ivf_vitals_history_view->SEX->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_SEX" type="text/html"><span id="el_ivf_vitals_history_SEX">
<span<?php echo $ivf_vitals_history_view->SEX->viewAttributes() ?>><?php echo $ivf_vitals_history_view->SEX->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->Religion->Visible) { // Religion ?>
	<tr id="r_Religion">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_Religion"><script id="tpc_ivf_vitals_history_Religion" type="text/html"><?php echo $ivf_vitals_history_view->Religion->caption() ?></script></span></td>
		<td data-name="Religion" <?php echo $ivf_vitals_history_view->Religion->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Religion" type="text/html"><span id="el_ivf_vitals_history_Religion">
<span<?php echo $ivf_vitals_history_view->Religion->viewAttributes() ?>><?php echo $ivf_vitals_history_view->Religion->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->Address->Visible) { // Address ?>
	<tr id="r_Address">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_Address"><script id="tpc_ivf_vitals_history_Address" type="text/html"><?php echo $ivf_vitals_history_view->Address->caption() ?></script></span></td>
		<td data-name="Address" <?php echo $ivf_vitals_history_view->Address->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Address" type="text/html"><span id="el_ivf_vitals_history_Address">
<span<?php echo $ivf_vitals_history_view->Address->viewAttributes() ?>><?php echo $ivf_vitals_history_view->Address->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->IdentificationMark->Visible) { // IdentificationMark ?>
	<tr id="r_IdentificationMark">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_IdentificationMark"><script id="tpc_ivf_vitals_history_IdentificationMark" type="text/html"><?php echo $ivf_vitals_history_view->IdentificationMark->caption() ?></script></span></td>
		<td data-name="IdentificationMark" <?php echo $ivf_vitals_history_view->IdentificationMark->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_IdentificationMark" type="text/html"><span id="el_ivf_vitals_history_IdentificationMark">
<span<?php echo $ivf_vitals_history_view->IdentificationMark->viewAttributes() ?>><?php echo $ivf_vitals_history_view->IdentificationMark->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->DoublewitnessName1->Visible) { // DoublewitnessName1 ?>
	<tr id="r_DoublewitnessName1">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_DoublewitnessName1"><script id="tpc_ivf_vitals_history_DoublewitnessName1" type="text/html"><?php echo $ivf_vitals_history_view->DoublewitnessName1->caption() ?></script></span></td>
		<td data-name="DoublewitnessName1" <?php echo $ivf_vitals_history_view->DoublewitnessName1->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_DoublewitnessName1" type="text/html"><span id="el_ivf_vitals_history_DoublewitnessName1">
<span<?php echo $ivf_vitals_history_view->DoublewitnessName1->viewAttributes() ?>><?php echo $ivf_vitals_history_view->DoublewitnessName1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->DoublewitnessName2->Visible) { // DoublewitnessName2 ?>
	<tr id="r_DoublewitnessName2">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_DoublewitnessName2"><script id="tpc_ivf_vitals_history_DoublewitnessName2" type="text/html"><?php echo $ivf_vitals_history_view->DoublewitnessName2->caption() ?></script></span></td>
		<td data-name="DoublewitnessName2" <?php echo $ivf_vitals_history_view->DoublewitnessName2->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_DoublewitnessName2" type="text/html"><span id="el_ivf_vitals_history_DoublewitnessName2">
<span<?php echo $ivf_vitals_history_view->DoublewitnessName2->viewAttributes() ?>><?php echo $ivf_vitals_history_view->DoublewitnessName2->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->Chiefcomplaints->Visible) { // Chiefcomplaints ?>
	<tr id="r_Chiefcomplaints">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_Chiefcomplaints"><script id="tpc_ivf_vitals_history_Chiefcomplaints" type="text/html"><?php echo $ivf_vitals_history_view->Chiefcomplaints->caption() ?></script></span></td>
		<td data-name="Chiefcomplaints" <?php echo $ivf_vitals_history_view->Chiefcomplaints->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Chiefcomplaints" type="text/html"><span id="el_ivf_vitals_history_Chiefcomplaints">
<span<?php echo $ivf_vitals_history_view->Chiefcomplaints->viewAttributes() ?>><?php echo $ivf_vitals_history_view->Chiefcomplaints->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->MenstrualHistory->Visible) { // MenstrualHistory ?>
	<tr id="r_MenstrualHistory">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_MenstrualHistory"><script id="tpc_ivf_vitals_history_MenstrualHistory" type="text/html"><?php echo $ivf_vitals_history_view->MenstrualHistory->caption() ?></script></span></td>
		<td data-name="MenstrualHistory" <?php echo $ivf_vitals_history_view->MenstrualHistory->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MenstrualHistory" type="text/html"><span id="el_ivf_vitals_history_MenstrualHistory">
<span<?php echo $ivf_vitals_history_view->MenstrualHistory->viewAttributes() ?>><?php echo $ivf_vitals_history_view->MenstrualHistory->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->ObstetricHistory->Visible) { // ObstetricHistory ?>
	<tr id="r_ObstetricHistory">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_ObstetricHistory"><script id="tpc_ivf_vitals_history_ObstetricHistory" type="text/html"><?php echo $ivf_vitals_history_view->ObstetricHistory->caption() ?></script></span></td>
		<td data-name="ObstetricHistory" <?php echo $ivf_vitals_history_view->ObstetricHistory->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_ObstetricHistory" type="text/html"><span id="el_ivf_vitals_history_ObstetricHistory">
<span<?php echo $ivf_vitals_history_view->ObstetricHistory->viewAttributes() ?>><?php echo $ivf_vitals_history_view->ObstetricHistory->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->MedicalHistory->Visible) { // MedicalHistory ?>
	<tr id="r_MedicalHistory">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_MedicalHistory"><script id="tpc_ivf_vitals_history_MedicalHistory" type="text/html"><?php echo $ivf_vitals_history_view->MedicalHistory->caption() ?></script></span></td>
		<td data-name="MedicalHistory" <?php echo $ivf_vitals_history_view->MedicalHistory->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MedicalHistory" type="text/html"><span id="el_ivf_vitals_history_MedicalHistory">
<span<?php echo $ivf_vitals_history_view->MedicalHistory->viewAttributes() ?>><?php echo $ivf_vitals_history_view->MedicalHistory->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->SurgicalHistory->Visible) { // SurgicalHistory ?>
	<tr id="r_SurgicalHistory">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_SurgicalHistory"><script id="tpc_ivf_vitals_history_SurgicalHistory" type="text/html"><?php echo $ivf_vitals_history_view->SurgicalHistory->caption() ?></script></span></td>
		<td data-name="SurgicalHistory" <?php echo $ivf_vitals_history_view->SurgicalHistory->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_SurgicalHistory" type="text/html"><span id="el_ivf_vitals_history_SurgicalHistory">
<span<?php echo $ivf_vitals_history_view->SurgicalHistory->viewAttributes() ?>><?php echo $ivf_vitals_history_view->SurgicalHistory->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->Generalexaminationpallor->Visible) { // Generalexaminationpallor ?>
	<tr id="r_Generalexaminationpallor">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_Generalexaminationpallor"><script id="tpc_ivf_vitals_history_Generalexaminationpallor" type="text/html"><?php echo $ivf_vitals_history_view->Generalexaminationpallor->caption() ?></script></span></td>
		<td data-name="Generalexaminationpallor" <?php echo $ivf_vitals_history_view->Generalexaminationpallor->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Generalexaminationpallor" type="text/html"><span id="el_ivf_vitals_history_Generalexaminationpallor">
<span<?php echo $ivf_vitals_history_view->Generalexaminationpallor->viewAttributes() ?>><?php echo $ivf_vitals_history_view->Generalexaminationpallor->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->PR->Visible) { // PR ?>
	<tr id="r_PR">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_PR"><script id="tpc_ivf_vitals_history_PR" type="text/html"><?php echo $ivf_vitals_history_view->PR->caption() ?></script></span></td>
		<td data-name="PR" <?php echo $ivf_vitals_history_view->PR->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PR" type="text/html"><span id="el_ivf_vitals_history_PR">
<span<?php echo $ivf_vitals_history_view->PR->viewAttributes() ?>><?php echo $ivf_vitals_history_view->PR->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->CVS->Visible) { // CVS ?>
	<tr id="r_CVS">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_CVS"><script id="tpc_ivf_vitals_history_CVS" type="text/html"><?php echo $ivf_vitals_history_view->CVS->caption() ?></script></span></td>
		<td data-name="CVS" <?php echo $ivf_vitals_history_view->CVS->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_CVS" type="text/html"><span id="el_ivf_vitals_history_CVS">
<span<?php echo $ivf_vitals_history_view->CVS->viewAttributes() ?>><?php echo $ivf_vitals_history_view->CVS->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->PA->Visible) { // PA ?>
	<tr id="r_PA">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_PA"><script id="tpc_ivf_vitals_history_PA" type="text/html"><?php echo $ivf_vitals_history_view->PA->caption() ?></script></span></td>
		<td data-name="PA" <?php echo $ivf_vitals_history_view->PA->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PA" type="text/html"><span id="el_ivf_vitals_history_PA">
<span<?php echo $ivf_vitals_history_view->PA->viewAttributes() ?>><?php echo $ivf_vitals_history_view->PA->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->PROVISIONALDIAGNOSIS->Visible) { // PROVISIONALDIAGNOSIS ?>
	<tr id="r_PROVISIONALDIAGNOSIS">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_PROVISIONALDIAGNOSIS"><script id="tpc_ivf_vitals_history_PROVISIONALDIAGNOSIS" type="text/html"><?php echo $ivf_vitals_history_view->PROVISIONALDIAGNOSIS->caption() ?></script></span></td>
		<td data-name="PROVISIONALDIAGNOSIS" <?php echo $ivf_vitals_history_view->PROVISIONALDIAGNOSIS->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PROVISIONALDIAGNOSIS" type="text/html"><span id="el_ivf_vitals_history_PROVISIONALDIAGNOSIS">
<span<?php echo $ivf_vitals_history_view->PROVISIONALDIAGNOSIS->viewAttributes() ?>><?php echo $ivf_vitals_history_view->PROVISIONALDIAGNOSIS->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->Investigations->Visible) { // Investigations ?>
	<tr id="r_Investigations">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_Investigations"><script id="tpc_ivf_vitals_history_Investigations" type="text/html"><?php echo $ivf_vitals_history_view->Investigations->caption() ?></script></span></td>
		<td data-name="Investigations" <?php echo $ivf_vitals_history_view->Investigations->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Investigations" type="text/html"><span id="el_ivf_vitals_history_Investigations">
<span<?php echo $ivf_vitals_history_view->Investigations->viewAttributes() ?>><?php echo $ivf_vitals_history_view->Investigations->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->Fheight->Visible) { // Fheight ?>
	<tr id="r_Fheight">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_Fheight"><script id="tpc_ivf_vitals_history_Fheight" type="text/html"><?php echo $ivf_vitals_history_view->Fheight->caption() ?></script></span></td>
		<td data-name="Fheight" <?php echo $ivf_vitals_history_view->Fheight->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Fheight" type="text/html"><span id="el_ivf_vitals_history_Fheight">
<span<?php echo $ivf_vitals_history_view->Fheight->viewAttributes() ?>><?php echo $ivf_vitals_history_view->Fheight->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->Fweight->Visible) { // Fweight ?>
	<tr id="r_Fweight">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_Fweight"><script id="tpc_ivf_vitals_history_Fweight" type="text/html"><?php echo $ivf_vitals_history_view->Fweight->caption() ?></script></span></td>
		<td data-name="Fweight" <?php echo $ivf_vitals_history_view->Fweight->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Fweight" type="text/html"><span id="el_ivf_vitals_history_Fweight">
<span<?php echo $ivf_vitals_history_view->Fweight->viewAttributes() ?>><?php echo $ivf_vitals_history_view->Fweight->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->FBMI->Visible) { // FBMI ?>
	<tr id="r_FBMI">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_FBMI"><script id="tpc_ivf_vitals_history_FBMI" type="text/html"><?php echo $ivf_vitals_history_view->FBMI->caption() ?></script></span></td>
		<td data-name="FBMI" <?php echo $ivf_vitals_history_view->FBMI->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_FBMI" type="text/html"><span id="el_ivf_vitals_history_FBMI">
<span<?php echo $ivf_vitals_history_view->FBMI->viewAttributes() ?>><?php echo $ivf_vitals_history_view->FBMI->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->FBloodgroup->Visible) { // FBloodgroup ?>
	<tr id="r_FBloodgroup">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_FBloodgroup"><script id="tpc_ivf_vitals_history_FBloodgroup" type="text/html"><?php echo $ivf_vitals_history_view->FBloodgroup->caption() ?></script></span></td>
		<td data-name="FBloodgroup" <?php echo $ivf_vitals_history_view->FBloodgroup->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_FBloodgroup" type="text/html"><span id="el_ivf_vitals_history_FBloodgroup">
<span<?php echo $ivf_vitals_history_view->FBloodgroup->viewAttributes() ?>><?php echo $ivf_vitals_history_view->FBloodgroup->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->Mheight->Visible) { // Mheight ?>
	<tr id="r_Mheight">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_Mheight"><script id="tpc_ivf_vitals_history_Mheight" type="text/html"><?php echo $ivf_vitals_history_view->Mheight->caption() ?></script></span></td>
		<td data-name="Mheight" <?php echo $ivf_vitals_history_view->Mheight->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Mheight" type="text/html"><span id="el_ivf_vitals_history_Mheight">
<span<?php echo $ivf_vitals_history_view->Mheight->viewAttributes() ?>><?php echo $ivf_vitals_history_view->Mheight->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->Mweight->Visible) { // Mweight ?>
	<tr id="r_Mweight">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_Mweight"><script id="tpc_ivf_vitals_history_Mweight" type="text/html"><?php echo $ivf_vitals_history_view->Mweight->caption() ?></script></span></td>
		<td data-name="Mweight" <?php echo $ivf_vitals_history_view->Mweight->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Mweight" type="text/html"><span id="el_ivf_vitals_history_Mweight">
<span<?php echo $ivf_vitals_history_view->Mweight->viewAttributes() ?>><?php echo $ivf_vitals_history_view->Mweight->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->MBMI->Visible) { // MBMI ?>
	<tr id="r_MBMI">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_MBMI"><script id="tpc_ivf_vitals_history_MBMI" type="text/html"><?php echo $ivf_vitals_history_view->MBMI->caption() ?></script></span></td>
		<td data-name="MBMI" <?php echo $ivf_vitals_history_view->MBMI->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MBMI" type="text/html"><span id="el_ivf_vitals_history_MBMI">
<span<?php echo $ivf_vitals_history_view->MBMI->viewAttributes() ?>><?php echo $ivf_vitals_history_view->MBMI->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->MBloodgroup->Visible) { // MBloodgroup ?>
	<tr id="r_MBloodgroup">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_MBloodgroup"><script id="tpc_ivf_vitals_history_MBloodgroup" type="text/html"><?php echo $ivf_vitals_history_view->MBloodgroup->caption() ?></script></span></td>
		<td data-name="MBloodgroup" <?php echo $ivf_vitals_history_view->MBloodgroup->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MBloodgroup" type="text/html"><span id="el_ivf_vitals_history_MBloodgroup">
<span<?php echo $ivf_vitals_history_view->MBloodgroup->viewAttributes() ?>><?php echo $ivf_vitals_history_view->MBloodgroup->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->FBuild->Visible) { // FBuild ?>
	<tr id="r_FBuild">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_FBuild"><script id="tpc_ivf_vitals_history_FBuild" type="text/html"><?php echo $ivf_vitals_history_view->FBuild->caption() ?></script></span></td>
		<td data-name="FBuild" <?php echo $ivf_vitals_history_view->FBuild->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_FBuild" type="text/html"><span id="el_ivf_vitals_history_FBuild">
<span<?php echo $ivf_vitals_history_view->FBuild->viewAttributes() ?>><?php echo $ivf_vitals_history_view->FBuild->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->MBuild->Visible) { // MBuild ?>
	<tr id="r_MBuild">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_MBuild"><script id="tpc_ivf_vitals_history_MBuild" type="text/html"><?php echo $ivf_vitals_history_view->MBuild->caption() ?></script></span></td>
		<td data-name="MBuild" <?php echo $ivf_vitals_history_view->MBuild->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MBuild" type="text/html"><span id="el_ivf_vitals_history_MBuild">
<span<?php echo $ivf_vitals_history_view->MBuild->viewAttributes() ?>><?php echo $ivf_vitals_history_view->MBuild->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->FSkinColor->Visible) { // FSkinColor ?>
	<tr id="r_FSkinColor">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_FSkinColor"><script id="tpc_ivf_vitals_history_FSkinColor" type="text/html"><?php echo $ivf_vitals_history_view->FSkinColor->caption() ?></script></span></td>
		<td data-name="FSkinColor" <?php echo $ivf_vitals_history_view->FSkinColor->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_FSkinColor" type="text/html"><span id="el_ivf_vitals_history_FSkinColor">
<span<?php echo $ivf_vitals_history_view->FSkinColor->viewAttributes() ?>><?php echo $ivf_vitals_history_view->FSkinColor->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->MSkinColor->Visible) { // MSkinColor ?>
	<tr id="r_MSkinColor">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_MSkinColor"><script id="tpc_ivf_vitals_history_MSkinColor" type="text/html"><?php echo $ivf_vitals_history_view->MSkinColor->caption() ?></script></span></td>
		<td data-name="MSkinColor" <?php echo $ivf_vitals_history_view->MSkinColor->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MSkinColor" type="text/html"><span id="el_ivf_vitals_history_MSkinColor">
<span<?php echo $ivf_vitals_history_view->MSkinColor->viewAttributes() ?>><?php echo $ivf_vitals_history_view->MSkinColor->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->FEyesColor->Visible) { // FEyesColor ?>
	<tr id="r_FEyesColor">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_FEyesColor"><script id="tpc_ivf_vitals_history_FEyesColor" type="text/html"><?php echo $ivf_vitals_history_view->FEyesColor->caption() ?></script></span></td>
		<td data-name="FEyesColor" <?php echo $ivf_vitals_history_view->FEyesColor->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_FEyesColor" type="text/html"><span id="el_ivf_vitals_history_FEyesColor">
<span<?php echo $ivf_vitals_history_view->FEyesColor->viewAttributes() ?>><?php echo $ivf_vitals_history_view->FEyesColor->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->MEyesColor->Visible) { // MEyesColor ?>
	<tr id="r_MEyesColor">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_MEyesColor"><script id="tpc_ivf_vitals_history_MEyesColor" type="text/html"><?php echo $ivf_vitals_history_view->MEyesColor->caption() ?></script></span></td>
		<td data-name="MEyesColor" <?php echo $ivf_vitals_history_view->MEyesColor->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MEyesColor" type="text/html"><span id="el_ivf_vitals_history_MEyesColor">
<span<?php echo $ivf_vitals_history_view->MEyesColor->viewAttributes() ?>><?php echo $ivf_vitals_history_view->MEyesColor->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->FHairColor->Visible) { // FHairColor ?>
	<tr id="r_FHairColor">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_FHairColor"><script id="tpc_ivf_vitals_history_FHairColor" type="text/html"><?php echo $ivf_vitals_history_view->FHairColor->caption() ?></script></span></td>
		<td data-name="FHairColor" <?php echo $ivf_vitals_history_view->FHairColor->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_FHairColor" type="text/html"><span id="el_ivf_vitals_history_FHairColor">
<span<?php echo $ivf_vitals_history_view->FHairColor->viewAttributes() ?>><?php echo $ivf_vitals_history_view->FHairColor->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->MhairColor->Visible) { // MhairColor ?>
	<tr id="r_MhairColor">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_MhairColor"><script id="tpc_ivf_vitals_history_MhairColor" type="text/html"><?php echo $ivf_vitals_history_view->MhairColor->caption() ?></script></span></td>
		<td data-name="MhairColor" <?php echo $ivf_vitals_history_view->MhairColor->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MhairColor" type="text/html"><span id="el_ivf_vitals_history_MhairColor">
<span<?php echo $ivf_vitals_history_view->MhairColor->viewAttributes() ?>><?php echo $ivf_vitals_history_view->MhairColor->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->FhairTexture->Visible) { // FhairTexture ?>
	<tr id="r_FhairTexture">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_FhairTexture"><script id="tpc_ivf_vitals_history_FhairTexture" type="text/html"><?php echo $ivf_vitals_history_view->FhairTexture->caption() ?></script></span></td>
		<td data-name="FhairTexture" <?php echo $ivf_vitals_history_view->FhairTexture->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_FhairTexture" type="text/html"><span id="el_ivf_vitals_history_FhairTexture">
<span<?php echo $ivf_vitals_history_view->FhairTexture->viewAttributes() ?>><?php echo $ivf_vitals_history_view->FhairTexture->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->MHairTexture->Visible) { // MHairTexture ?>
	<tr id="r_MHairTexture">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_MHairTexture"><script id="tpc_ivf_vitals_history_MHairTexture" type="text/html"><?php echo $ivf_vitals_history_view->MHairTexture->caption() ?></script></span></td>
		<td data-name="MHairTexture" <?php echo $ivf_vitals_history_view->MHairTexture->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MHairTexture" type="text/html"><span id="el_ivf_vitals_history_MHairTexture">
<span<?php echo $ivf_vitals_history_view->MHairTexture->viewAttributes() ?>><?php echo $ivf_vitals_history_view->MHairTexture->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->Fothers->Visible) { // Fothers ?>
	<tr id="r_Fothers">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_Fothers"><script id="tpc_ivf_vitals_history_Fothers" type="text/html"><?php echo $ivf_vitals_history_view->Fothers->caption() ?></script></span></td>
		<td data-name="Fothers" <?php echo $ivf_vitals_history_view->Fothers->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Fothers" type="text/html"><span id="el_ivf_vitals_history_Fothers">
<span<?php echo $ivf_vitals_history_view->Fothers->viewAttributes() ?>><?php echo $ivf_vitals_history_view->Fothers->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->Mothers->Visible) { // Mothers ?>
	<tr id="r_Mothers">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_Mothers"><script id="tpc_ivf_vitals_history_Mothers" type="text/html"><?php echo $ivf_vitals_history_view->Mothers->caption() ?></script></span></td>
		<td data-name="Mothers" <?php echo $ivf_vitals_history_view->Mothers->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Mothers" type="text/html"><span id="el_ivf_vitals_history_Mothers">
<span<?php echo $ivf_vitals_history_view->Mothers->viewAttributes() ?>><?php echo $ivf_vitals_history_view->Mothers->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->PGE->Visible) { // PGE ?>
	<tr id="r_PGE">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_PGE"><script id="tpc_ivf_vitals_history_PGE" type="text/html"><?php echo $ivf_vitals_history_view->PGE->caption() ?></script></span></td>
		<td data-name="PGE" <?php echo $ivf_vitals_history_view->PGE->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PGE" type="text/html"><span id="el_ivf_vitals_history_PGE">
<span<?php echo $ivf_vitals_history_view->PGE->viewAttributes() ?>><?php echo $ivf_vitals_history_view->PGE->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->PPR->Visible) { // PPR ?>
	<tr id="r_PPR">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_PPR"><script id="tpc_ivf_vitals_history_PPR" type="text/html"><?php echo $ivf_vitals_history_view->PPR->caption() ?></script></span></td>
		<td data-name="PPR" <?php echo $ivf_vitals_history_view->PPR->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PPR" type="text/html"><span id="el_ivf_vitals_history_PPR">
<span<?php echo $ivf_vitals_history_view->PPR->viewAttributes() ?>><?php echo $ivf_vitals_history_view->PPR->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->PBP->Visible) { // PBP ?>
	<tr id="r_PBP">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_PBP"><script id="tpc_ivf_vitals_history_PBP" type="text/html"><?php echo $ivf_vitals_history_view->PBP->caption() ?></script></span></td>
		<td data-name="PBP" <?php echo $ivf_vitals_history_view->PBP->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PBP" type="text/html"><span id="el_ivf_vitals_history_PBP">
<span<?php echo $ivf_vitals_history_view->PBP->viewAttributes() ?>><?php echo $ivf_vitals_history_view->PBP->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->Breast->Visible) { // Breast ?>
	<tr id="r_Breast">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_Breast"><script id="tpc_ivf_vitals_history_Breast" type="text/html"><?php echo $ivf_vitals_history_view->Breast->caption() ?></script></span></td>
		<td data-name="Breast" <?php echo $ivf_vitals_history_view->Breast->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Breast" type="text/html"><span id="el_ivf_vitals_history_Breast">
<span<?php echo $ivf_vitals_history_view->Breast->viewAttributes() ?>><?php echo $ivf_vitals_history_view->Breast->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->PPA->Visible) { // PPA ?>
	<tr id="r_PPA">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_PPA"><script id="tpc_ivf_vitals_history_PPA" type="text/html"><?php echo $ivf_vitals_history_view->PPA->caption() ?></script></span></td>
		<td data-name="PPA" <?php echo $ivf_vitals_history_view->PPA->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PPA" type="text/html"><span id="el_ivf_vitals_history_PPA">
<span<?php echo $ivf_vitals_history_view->PPA->viewAttributes() ?>><?php echo $ivf_vitals_history_view->PPA->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->PPSV->Visible) { // PPSV ?>
	<tr id="r_PPSV">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_PPSV"><script id="tpc_ivf_vitals_history_PPSV" type="text/html"><?php echo $ivf_vitals_history_view->PPSV->caption() ?></script></span></td>
		<td data-name="PPSV" <?php echo $ivf_vitals_history_view->PPSV->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PPSV" type="text/html"><span id="el_ivf_vitals_history_PPSV">
<span<?php echo $ivf_vitals_history_view->PPSV->viewAttributes() ?>><?php echo $ivf_vitals_history_view->PPSV->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->PPAPSMEAR->Visible) { // PPAPSMEAR ?>
	<tr id="r_PPAPSMEAR">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_PPAPSMEAR"><script id="tpc_ivf_vitals_history_PPAPSMEAR" type="text/html"><?php echo $ivf_vitals_history_view->PPAPSMEAR->caption() ?></script></span></td>
		<td data-name="PPAPSMEAR" <?php echo $ivf_vitals_history_view->PPAPSMEAR->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PPAPSMEAR" type="text/html"><span id="el_ivf_vitals_history_PPAPSMEAR">
<span<?php echo $ivf_vitals_history_view->PPAPSMEAR->viewAttributes() ?>><?php echo $ivf_vitals_history_view->PPAPSMEAR->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->PTHYROID->Visible) { // PTHYROID ?>
	<tr id="r_PTHYROID">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_PTHYROID"><script id="tpc_ivf_vitals_history_PTHYROID" type="text/html"><?php echo $ivf_vitals_history_view->PTHYROID->caption() ?></script></span></td>
		<td data-name="PTHYROID" <?php echo $ivf_vitals_history_view->PTHYROID->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PTHYROID" type="text/html"><span id="el_ivf_vitals_history_PTHYROID">
<span<?php echo $ivf_vitals_history_view->PTHYROID->viewAttributes() ?>><?php echo $ivf_vitals_history_view->PTHYROID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->MTHYROID->Visible) { // MTHYROID ?>
	<tr id="r_MTHYROID">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_MTHYROID"><script id="tpc_ivf_vitals_history_MTHYROID" type="text/html"><?php echo $ivf_vitals_history_view->MTHYROID->caption() ?></script></span></td>
		<td data-name="MTHYROID" <?php echo $ivf_vitals_history_view->MTHYROID->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MTHYROID" type="text/html"><span id="el_ivf_vitals_history_MTHYROID">
<span<?php echo $ivf_vitals_history_view->MTHYROID->viewAttributes() ?>><?php echo $ivf_vitals_history_view->MTHYROID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->SecSexCharacters->Visible) { // SecSexCharacters ?>
	<tr id="r_SecSexCharacters">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_SecSexCharacters"><script id="tpc_ivf_vitals_history_SecSexCharacters" type="text/html"><?php echo $ivf_vitals_history_view->SecSexCharacters->caption() ?></script></span></td>
		<td data-name="SecSexCharacters" <?php echo $ivf_vitals_history_view->SecSexCharacters->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_SecSexCharacters" type="text/html"><span id="el_ivf_vitals_history_SecSexCharacters">
<span<?php echo $ivf_vitals_history_view->SecSexCharacters->viewAttributes() ?>><?php echo $ivf_vitals_history_view->SecSexCharacters->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->PenisUM->Visible) { // PenisUM ?>
	<tr id="r_PenisUM">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_PenisUM"><script id="tpc_ivf_vitals_history_PenisUM" type="text/html"><?php echo $ivf_vitals_history_view->PenisUM->caption() ?></script></span></td>
		<td data-name="PenisUM" <?php echo $ivf_vitals_history_view->PenisUM->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PenisUM" type="text/html"><span id="el_ivf_vitals_history_PenisUM">
<span<?php echo $ivf_vitals_history_view->PenisUM->viewAttributes() ?>><?php echo $ivf_vitals_history_view->PenisUM->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->VAS->Visible) { // VAS ?>
	<tr id="r_VAS">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_VAS"><script id="tpc_ivf_vitals_history_VAS" type="text/html"><?php echo $ivf_vitals_history_view->VAS->caption() ?></script></span></td>
		<td data-name="VAS" <?php echo $ivf_vitals_history_view->VAS->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_VAS" type="text/html"><span id="el_ivf_vitals_history_VAS">
<span<?php echo $ivf_vitals_history_view->VAS->viewAttributes() ?>><?php echo $ivf_vitals_history_view->VAS->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->EPIDIDYMIS->Visible) { // EPIDIDYMIS ?>
	<tr id="r_EPIDIDYMIS">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_EPIDIDYMIS"><script id="tpc_ivf_vitals_history_EPIDIDYMIS" type="text/html"><?php echo $ivf_vitals_history_view->EPIDIDYMIS->caption() ?></script></span></td>
		<td data-name="EPIDIDYMIS" <?php echo $ivf_vitals_history_view->EPIDIDYMIS->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_EPIDIDYMIS" type="text/html"><span id="el_ivf_vitals_history_EPIDIDYMIS">
<span<?php echo $ivf_vitals_history_view->EPIDIDYMIS->viewAttributes() ?>><?php echo $ivf_vitals_history_view->EPIDIDYMIS->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->Varicocele->Visible) { // Varicocele ?>
	<tr id="r_Varicocele">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_Varicocele"><script id="tpc_ivf_vitals_history_Varicocele" type="text/html"><?php echo $ivf_vitals_history_view->Varicocele->caption() ?></script></span></td>
		<td data-name="Varicocele" <?php echo $ivf_vitals_history_view->Varicocele->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Varicocele" type="text/html"><span id="el_ivf_vitals_history_Varicocele">
<span<?php echo $ivf_vitals_history_view->Varicocele->viewAttributes() ?>><?php echo $ivf_vitals_history_view->Varicocele->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->FertilityTreatmentHistory->Visible) { // FertilityTreatmentHistory ?>
	<tr id="r_FertilityTreatmentHistory">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_FertilityTreatmentHistory"><script id="tpc_ivf_vitals_history_FertilityTreatmentHistory" type="text/html"><?php echo $ivf_vitals_history_view->FertilityTreatmentHistory->caption() ?></script></span></td>
		<td data-name="FertilityTreatmentHistory" <?php echo $ivf_vitals_history_view->FertilityTreatmentHistory->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_FertilityTreatmentHistory" type="text/html"><span id="el_ivf_vitals_history_FertilityTreatmentHistory">
<span<?php echo $ivf_vitals_history_view->FertilityTreatmentHistory->viewAttributes() ?>><?php echo $ivf_vitals_history_view->FertilityTreatmentHistory->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->SurgeryHistory->Visible) { // SurgeryHistory ?>
	<tr id="r_SurgeryHistory">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_SurgeryHistory"><script id="tpc_ivf_vitals_history_SurgeryHistory" type="text/html"><?php echo $ivf_vitals_history_view->SurgeryHistory->caption() ?></script></span></td>
		<td data-name="SurgeryHistory" <?php echo $ivf_vitals_history_view->SurgeryHistory->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_SurgeryHistory" type="text/html"><span id="el_ivf_vitals_history_SurgeryHistory">
<span<?php echo $ivf_vitals_history_view->SurgeryHistory->viewAttributes() ?>><?php echo $ivf_vitals_history_view->SurgeryHistory->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->FamilyHistory->Visible) { // FamilyHistory ?>
	<tr id="r_FamilyHistory">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_FamilyHistory"><script id="tpc_ivf_vitals_history_FamilyHistory" type="text/html"><?php echo $ivf_vitals_history_view->FamilyHistory->caption() ?></script></span></td>
		<td data-name="FamilyHistory" <?php echo $ivf_vitals_history_view->FamilyHistory->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_FamilyHistory" type="text/html"><span id="el_ivf_vitals_history_FamilyHistory">
<span<?php echo $ivf_vitals_history_view->FamilyHistory->viewAttributes() ?>><?php echo $ivf_vitals_history_view->FamilyHistory->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->PInvestigations->Visible) { // PInvestigations ?>
	<tr id="r_PInvestigations">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_PInvestigations"><script id="tpc_ivf_vitals_history_PInvestigations" type="text/html"><?php echo $ivf_vitals_history_view->PInvestigations->caption() ?></script></span></td>
		<td data-name="PInvestigations" <?php echo $ivf_vitals_history_view->PInvestigations->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PInvestigations" type="text/html"><span id="el_ivf_vitals_history_PInvestigations">
<span<?php echo $ivf_vitals_history_view->PInvestigations->viewAttributes() ?>><?php echo $ivf_vitals_history_view->PInvestigations->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->Addictions->Visible) { // Addictions ?>
	<tr id="r_Addictions">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_Addictions"><script id="tpc_ivf_vitals_history_Addictions" type="text/html"><?php echo $ivf_vitals_history_view->Addictions->caption() ?></script></span></td>
		<td data-name="Addictions" <?php echo $ivf_vitals_history_view->Addictions->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Addictions" type="text/html"><span id="el_ivf_vitals_history_Addictions">
<span<?php echo $ivf_vitals_history_view->Addictions->viewAttributes() ?>><?php echo $ivf_vitals_history_view->Addictions->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->Medications->Visible) { // Medications ?>
	<tr id="r_Medications">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_Medications"><script id="tpc_ivf_vitals_history_Medications" type="text/html"><?php echo $ivf_vitals_history_view->Medications->caption() ?></script></span></td>
		<td data-name="Medications" <?php echo $ivf_vitals_history_view->Medications->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Medications" type="text/html"><span id="el_ivf_vitals_history_Medications">
<span<?php echo $ivf_vitals_history_view->Medications->viewAttributes() ?>><?php echo $ivf_vitals_history_view->Medications->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->Medical->Visible) { // Medical ?>
	<tr id="r_Medical">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_Medical"><script id="tpc_ivf_vitals_history_Medical" type="text/html"><?php echo $ivf_vitals_history_view->Medical->caption() ?></script></span></td>
		<td data-name="Medical" <?php echo $ivf_vitals_history_view->Medical->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Medical" type="text/html"><span id="el_ivf_vitals_history_Medical">
<span<?php echo $ivf_vitals_history_view->Medical->viewAttributes() ?>><?php echo $ivf_vitals_history_view->Medical->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->Surgical->Visible) { // Surgical ?>
	<tr id="r_Surgical">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_Surgical"><script id="tpc_ivf_vitals_history_Surgical" type="text/html"><?php echo $ivf_vitals_history_view->Surgical->caption() ?></script></span></td>
		<td data-name="Surgical" <?php echo $ivf_vitals_history_view->Surgical->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Surgical" type="text/html"><span id="el_ivf_vitals_history_Surgical">
<span<?php echo $ivf_vitals_history_view->Surgical->viewAttributes() ?>><?php echo $ivf_vitals_history_view->Surgical->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->CoitalHistory->Visible) { // CoitalHistory ?>
	<tr id="r_CoitalHistory">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_CoitalHistory"><script id="tpc_ivf_vitals_history_CoitalHistory" type="text/html"><?php echo $ivf_vitals_history_view->CoitalHistory->caption() ?></script></span></td>
		<td data-name="CoitalHistory" <?php echo $ivf_vitals_history_view->CoitalHistory->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_CoitalHistory" type="text/html"><span id="el_ivf_vitals_history_CoitalHistory">
<span<?php echo $ivf_vitals_history_view->CoitalHistory->viewAttributes() ?>><?php echo $ivf_vitals_history_view->CoitalHistory->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->SemenAnalysis->Visible) { // SemenAnalysis ?>
	<tr id="r_SemenAnalysis">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_SemenAnalysis"><script id="tpc_ivf_vitals_history_SemenAnalysis" type="text/html"><?php echo $ivf_vitals_history_view->SemenAnalysis->caption() ?></script></span></td>
		<td data-name="SemenAnalysis" <?php echo $ivf_vitals_history_view->SemenAnalysis->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_SemenAnalysis" type="text/html"><span id="el_ivf_vitals_history_SemenAnalysis">
<span<?php echo $ivf_vitals_history_view->SemenAnalysis->viewAttributes() ?>><?php echo $ivf_vitals_history_view->SemenAnalysis->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->MInsvestications->Visible) { // MInsvestications ?>
	<tr id="r_MInsvestications">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_MInsvestications"><script id="tpc_ivf_vitals_history_MInsvestications" type="text/html"><?php echo $ivf_vitals_history_view->MInsvestications->caption() ?></script></span></td>
		<td data-name="MInsvestications" <?php echo $ivf_vitals_history_view->MInsvestications->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MInsvestications" type="text/html"><span id="el_ivf_vitals_history_MInsvestications">
<span<?php echo $ivf_vitals_history_view->MInsvestications->viewAttributes() ?>><?php echo $ivf_vitals_history_view->MInsvestications->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->PImpression->Visible) { // PImpression ?>
	<tr id="r_PImpression">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_PImpression"><script id="tpc_ivf_vitals_history_PImpression" type="text/html"><?php echo $ivf_vitals_history_view->PImpression->caption() ?></script></span></td>
		<td data-name="PImpression" <?php echo $ivf_vitals_history_view->PImpression->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PImpression" type="text/html"><span id="el_ivf_vitals_history_PImpression">
<span<?php echo $ivf_vitals_history_view->PImpression->viewAttributes() ?>><?php echo $ivf_vitals_history_view->PImpression->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->MIMpression->Visible) { // MIMpression ?>
	<tr id="r_MIMpression">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_MIMpression"><script id="tpc_ivf_vitals_history_MIMpression" type="text/html"><?php echo $ivf_vitals_history_view->MIMpression->caption() ?></script></span></td>
		<td data-name="MIMpression" <?php echo $ivf_vitals_history_view->MIMpression->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MIMpression" type="text/html"><span id="el_ivf_vitals_history_MIMpression">
<span<?php echo $ivf_vitals_history_view->MIMpression->viewAttributes() ?>><?php echo $ivf_vitals_history_view->MIMpression->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->PPlanOfManagement->Visible) { // PPlanOfManagement ?>
	<tr id="r_PPlanOfManagement">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_PPlanOfManagement"><script id="tpc_ivf_vitals_history_PPlanOfManagement" type="text/html"><?php echo $ivf_vitals_history_view->PPlanOfManagement->caption() ?></script></span></td>
		<td data-name="PPlanOfManagement" <?php echo $ivf_vitals_history_view->PPlanOfManagement->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PPlanOfManagement" type="text/html"><span id="el_ivf_vitals_history_PPlanOfManagement">
<span<?php echo $ivf_vitals_history_view->PPlanOfManagement->viewAttributes() ?>><?php echo $ivf_vitals_history_view->PPlanOfManagement->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->MPlanOfManagement->Visible) { // MPlanOfManagement ?>
	<tr id="r_MPlanOfManagement">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_MPlanOfManagement"><script id="tpc_ivf_vitals_history_MPlanOfManagement" type="text/html"><?php echo $ivf_vitals_history_view->MPlanOfManagement->caption() ?></script></span></td>
		<td data-name="MPlanOfManagement" <?php echo $ivf_vitals_history_view->MPlanOfManagement->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MPlanOfManagement" type="text/html"><span id="el_ivf_vitals_history_MPlanOfManagement">
<span<?php echo $ivf_vitals_history_view->MPlanOfManagement->viewAttributes() ?>><?php echo $ivf_vitals_history_view->MPlanOfManagement->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->PReadMore->Visible) { // PReadMore ?>
	<tr id="r_PReadMore">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_PReadMore"><script id="tpc_ivf_vitals_history_PReadMore" type="text/html"><?php echo $ivf_vitals_history_view->PReadMore->caption() ?></script></span></td>
		<td data-name="PReadMore" <?php echo $ivf_vitals_history_view->PReadMore->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PReadMore" type="text/html"><span id="el_ivf_vitals_history_PReadMore">
<span<?php echo $ivf_vitals_history_view->PReadMore->viewAttributes() ?>><?php echo $ivf_vitals_history_view->PReadMore->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->MReadMore->Visible) { // MReadMore ?>
	<tr id="r_MReadMore">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_MReadMore"><script id="tpc_ivf_vitals_history_MReadMore" type="text/html"><?php echo $ivf_vitals_history_view->MReadMore->caption() ?></script></span></td>
		<td data-name="MReadMore" <?php echo $ivf_vitals_history_view->MReadMore->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MReadMore" type="text/html"><span id="el_ivf_vitals_history_MReadMore">
<span<?php echo $ivf_vitals_history_view->MReadMore->viewAttributes() ?>><?php echo $ivf_vitals_history_view->MReadMore->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->MariedFor->Visible) { // MariedFor ?>
	<tr id="r_MariedFor">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_MariedFor"><script id="tpc_ivf_vitals_history_MariedFor" type="text/html"><?php echo $ivf_vitals_history_view->MariedFor->caption() ?></script></span></td>
		<td data-name="MariedFor" <?php echo $ivf_vitals_history_view->MariedFor->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MariedFor" type="text/html"><span id="el_ivf_vitals_history_MariedFor">
<span<?php echo $ivf_vitals_history_view->MariedFor->viewAttributes() ?>><?php echo $ivf_vitals_history_view->MariedFor->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->CMNCM->Visible) { // CMNCM ?>
	<tr id="r_CMNCM">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_CMNCM"><script id="tpc_ivf_vitals_history_CMNCM" type="text/html"><?php echo $ivf_vitals_history_view->CMNCM->caption() ?></script></span></td>
		<td data-name="CMNCM" <?php echo $ivf_vitals_history_view->CMNCM->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_CMNCM" type="text/html"><span id="el_ivf_vitals_history_CMNCM">
<span<?php echo $ivf_vitals_history_view->CMNCM->viewAttributes() ?>><?php echo $ivf_vitals_history_view->CMNCM->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->TemplateMenstrualHistory->Visible) { // TemplateMenstrualHistory ?>
	<tr id="r_TemplateMenstrualHistory">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_TemplateMenstrualHistory"><script id="tpc_ivf_vitals_history_TemplateMenstrualHistory" type="text/html"><?php echo $ivf_vitals_history_view->TemplateMenstrualHistory->caption() ?></script></span></td>
		<td data-name="TemplateMenstrualHistory" <?php echo $ivf_vitals_history_view->TemplateMenstrualHistory->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_TemplateMenstrualHistory" type="text/html"><span id="el_ivf_vitals_history_TemplateMenstrualHistory">
<span<?php echo $ivf_vitals_history_view->TemplateMenstrualHistory->viewAttributes() ?>><?php echo $ivf_vitals_history_view->TemplateMenstrualHistory->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->TemplateObstetricHistory->Visible) { // TemplateObstetricHistory ?>
	<tr id="r_TemplateObstetricHistory">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_TemplateObstetricHistory"><script id="tpc_ivf_vitals_history_TemplateObstetricHistory" type="text/html"><?php echo $ivf_vitals_history_view->TemplateObstetricHistory->caption() ?></script></span></td>
		<td data-name="TemplateObstetricHistory" <?php echo $ivf_vitals_history_view->TemplateObstetricHistory->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_TemplateObstetricHistory" type="text/html"><span id="el_ivf_vitals_history_TemplateObstetricHistory">
<span<?php echo $ivf_vitals_history_view->TemplateObstetricHistory->viewAttributes() ?>><?php echo $ivf_vitals_history_view->TemplateObstetricHistory->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->TemplateFertilityTreatmentHistory->Visible) { // TemplateFertilityTreatmentHistory ?>
	<tr id="r_TemplateFertilityTreatmentHistory">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_TemplateFertilityTreatmentHistory"><script id="tpc_ivf_vitals_history_TemplateFertilityTreatmentHistory" type="text/html"><?php echo $ivf_vitals_history_view->TemplateFertilityTreatmentHistory->caption() ?></script></span></td>
		<td data-name="TemplateFertilityTreatmentHistory" <?php echo $ivf_vitals_history_view->TemplateFertilityTreatmentHistory->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_TemplateFertilityTreatmentHistory" type="text/html"><span id="el_ivf_vitals_history_TemplateFertilityTreatmentHistory">
<span<?php echo $ivf_vitals_history_view->TemplateFertilityTreatmentHistory->viewAttributes() ?>><?php echo $ivf_vitals_history_view->TemplateFertilityTreatmentHistory->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->TemplateSurgeryHistory->Visible) { // TemplateSurgeryHistory ?>
	<tr id="r_TemplateSurgeryHistory">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_TemplateSurgeryHistory"><script id="tpc_ivf_vitals_history_TemplateSurgeryHistory" type="text/html"><?php echo $ivf_vitals_history_view->TemplateSurgeryHistory->caption() ?></script></span></td>
		<td data-name="TemplateSurgeryHistory" <?php echo $ivf_vitals_history_view->TemplateSurgeryHistory->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_TemplateSurgeryHistory" type="text/html"><span id="el_ivf_vitals_history_TemplateSurgeryHistory">
<span<?php echo $ivf_vitals_history_view->TemplateSurgeryHistory->viewAttributes() ?>><?php echo $ivf_vitals_history_view->TemplateSurgeryHistory->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->TemplateFInvestigations->Visible) { // TemplateFInvestigations ?>
	<tr id="r_TemplateFInvestigations">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_TemplateFInvestigations"><script id="tpc_ivf_vitals_history_TemplateFInvestigations" type="text/html"><?php echo $ivf_vitals_history_view->TemplateFInvestigations->caption() ?></script></span></td>
		<td data-name="TemplateFInvestigations" <?php echo $ivf_vitals_history_view->TemplateFInvestigations->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_TemplateFInvestigations" type="text/html"><span id="el_ivf_vitals_history_TemplateFInvestigations">
<span<?php echo $ivf_vitals_history_view->TemplateFInvestigations->viewAttributes() ?>><?php echo $ivf_vitals_history_view->TemplateFInvestigations->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->TemplatePlanOfManagement->Visible) { // TemplatePlanOfManagement ?>
	<tr id="r_TemplatePlanOfManagement">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_TemplatePlanOfManagement"><script id="tpc_ivf_vitals_history_TemplatePlanOfManagement" type="text/html"><?php echo $ivf_vitals_history_view->TemplatePlanOfManagement->caption() ?></script></span></td>
		<td data-name="TemplatePlanOfManagement" <?php echo $ivf_vitals_history_view->TemplatePlanOfManagement->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_TemplatePlanOfManagement" type="text/html"><span id="el_ivf_vitals_history_TemplatePlanOfManagement">
<span<?php echo $ivf_vitals_history_view->TemplatePlanOfManagement->viewAttributes() ?>><?php echo $ivf_vitals_history_view->TemplatePlanOfManagement->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->TemplatePImpression->Visible) { // TemplatePImpression ?>
	<tr id="r_TemplatePImpression">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_TemplatePImpression"><script id="tpc_ivf_vitals_history_TemplatePImpression" type="text/html"><?php echo $ivf_vitals_history_view->TemplatePImpression->caption() ?></script></span></td>
		<td data-name="TemplatePImpression" <?php echo $ivf_vitals_history_view->TemplatePImpression->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_TemplatePImpression" type="text/html"><span id="el_ivf_vitals_history_TemplatePImpression">
<span<?php echo $ivf_vitals_history_view->TemplatePImpression->viewAttributes() ?>><?php echo $ivf_vitals_history_view->TemplatePImpression->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->TemplateMedications->Visible) { // TemplateMedications ?>
	<tr id="r_TemplateMedications">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_TemplateMedications"><script id="tpc_ivf_vitals_history_TemplateMedications" type="text/html"><?php echo $ivf_vitals_history_view->TemplateMedications->caption() ?></script></span></td>
		<td data-name="TemplateMedications" <?php echo $ivf_vitals_history_view->TemplateMedications->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_TemplateMedications" type="text/html"><span id="el_ivf_vitals_history_TemplateMedications">
<span<?php echo $ivf_vitals_history_view->TemplateMedications->viewAttributes() ?>><?php echo $ivf_vitals_history_view->TemplateMedications->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->TemplateSemenAnalysis->Visible) { // TemplateSemenAnalysis ?>
	<tr id="r_TemplateSemenAnalysis">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_TemplateSemenAnalysis"><script id="tpc_ivf_vitals_history_TemplateSemenAnalysis" type="text/html"><?php echo $ivf_vitals_history_view->TemplateSemenAnalysis->caption() ?></script></span></td>
		<td data-name="TemplateSemenAnalysis" <?php echo $ivf_vitals_history_view->TemplateSemenAnalysis->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_TemplateSemenAnalysis" type="text/html"><span id="el_ivf_vitals_history_TemplateSemenAnalysis">
<span<?php echo $ivf_vitals_history_view->TemplateSemenAnalysis->viewAttributes() ?>><?php echo $ivf_vitals_history_view->TemplateSemenAnalysis->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->MaleInsvestications->Visible) { // MaleInsvestications ?>
	<tr id="r_MaleInsvestications">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_MaleInsvestications"><script id="tpc_ivf_vitals_history_MaleInsvestications" type="text/html"><?php echo $ivf_vitals_history_view->MaleInsvestications->caption() ?></script></span></td>
		<td data-name="MaleInsvestications" <?php echo $ivf_vitals_history_view->MaleInsvestications->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MaleInsvestications" type="text/html"><span id="el_ivf_vitals_history_MaleInsvestications">
<span<?php echo $ivf_vitals_history_view->MaleInsvestications->viewAttributes() ?>><?php echo $ivf_vitals_history_view->MaleInsvestications->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->TemplateMIMpression->Visible) { // TemplateMIMpression ?>
	<tr id="r_TemplateMIMpression">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_TemplateMIMpression"><script id="tpc_ivf_vitals_history_TemplateMIMpression" type="text/html"><?php echo $ivf_vitals_history_view->TemplateMIMpression->caption() ?></script></span></td>
		<td data-name="TemplateMIMpression" <?php echo $ivf_vitals_history_view->TemplateMIMpression->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_TemplateMIMpression" type="text/html"><span id="el_ivf_vitals_history_TemplateMIMpression">
<span<?php echo $ivf_vitals_history_view->TemplateMIMpression->viewAttributes() ?>><?php echo $ivf_vitals_history_view->TemplateMIMpression->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->TemplateMalePlanOfManagement->Visible) { // TemplateMalePlanOfManagement ?>
	<tr id="r_TemplateMalePlanOfManagement">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_TemplateMalePlanOfManagement"><script id="tpc_ivf_vitals_history_TemplateMalePlanOfManagement" type="text/html"><?php echo $ivf_vitals_history_view->TemplateMalePlanOfManagement->caption() ?></script></span></td>
		<td data-name="TemplateMalePlanOfManagement" <?php echo $ivf_vitals_history_view->TemplateMalePlanOfManagement->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_TemplateMalePlanOfManagement" type="text/html"><span id="el_ivf_vitals_history_TemplateMalePlanOfManagement">
<span<?php echo $ivf_vitals_history_view->TemplateMalePlanOfManagement->viewAttributes() ?>><?php echo $ivf_vitals_history_view->TemplateMalePlanOfManagement->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->TidNo->Visible) { // TidNo ?>
	<tr id="r_TidNo">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_TidNo"><script id="tpc_ivf_vitals_history_TidNo" type="text/html"><?php echo $ivf_vitals_history_view->TidNo->caption() ?></script></span></td>
		<td data-name="TidNo" <?php echo $ivf_vitals_history_view->TidNo->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_TidNo" type="text/html"><span id="el_ivf_vitals_history_TidNo">
<span<?php echo $ivf_vitals_history_view->TidNo->viewAttributes() ?>><?php echo $ivf_vitals_history_view->TidNo->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->pFamilyHistory->Visible) { // pFamilyHistory ?>
	<tr id="r_pFamilyHistory">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_pFamilyHistory"><script id="tpc_ivf_vitals_history_pFamilyHistory" type="text/html"><?php echo $ivf_vitals_history_view->pFamilyHistory->caption() ?></script></span></td>
		<td data-name="pFamilyHistory" <?php echo $ivf_vitals_history_view->pFamilyHistory->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_pFamilyHistory" type="text/html"><span id="el_ivf_vitals_history_pFamilyHistory">
<span<?php echo $ivf_vitals_history_view->pFamilyHistory->viewAttributes() ?>><?php echo $ivf_vitals_history_view->pFamilyHistory->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history_view->pTemplateMedications->Visible) { // pTemplateMedications ?>
	<tr id="r_pTemplateMedications">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_pTemplateMedications"><script id="tpc_ivf_vitals_history_pTemplateMedications" type="text/html"><?php echo $ivf_vitals_history_view->pTemplateMedications->caption() ?></script></span></td>
		<td data-name="pTemplateMedications" <?php echo $ivf_vitals_history_view->pTemplateMedications->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_pTemplateMedications" type="text/html"><span id="el_ivf_vitals_history_pTemplateMedications">
<span<?php echo $ivf_vitals_history_view->pTemplateMedications->viewAttributes() ?>><?php echo $ivf_vitals_history_view->pTemplateMedications->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_ivf_vitals_historyview" class="ew-custom-template"></div>
<script id="tpm_ivf_vitals_historyview" type="text/html">
<div id="ct_ivf_vitals_history_view"><style>
	.ew-form:not(.ew-list-form):not(.ew-pager-form), table.ew-master-table.ew-vertical {
		width: 100%;
	}
	.content-wrapper {
		background: #f4f6f9;
	}
	.form-control-plaintext {
		display: unset;
		width: unset;
	}
	.widget-user .widget-user-image {
		position: absolute;
		top: 65px;
		left: 90%;
		margin-left: -45px;
	}
	.widget-user .card-footer {
		padding-top: 0px;
	}
	.card-footer {
		padding: .05rem 0.025rem;
		background-color: rgba(17,17,17,0.03);
		border-top: 0 solid #f4f4f4;
	}
	.widget-user .widget-user-username {
	margin-top: 0;
	margin-bottom: 0px;
	font-size: 18px;
	font-weight: 300;
	text-shadow: 0 1px 1px rgba(0,0,0,0.2);
}
.widget-user .widget-user-image {
	position: absolute;
	top: 5px;
	left: 90%;
	margin-left: -45px;
}
.widget-user .widget-user-header {
	padding: 1rem;
	height: 100px;
	border-top-left-radius: .25rem;
	border-top-right-radius: .25rem;
}
.form-control:not(textarea) {
	width: -webkit-fill-available;
}
.ew-row .ew-cell {
	margin-right: unset;
}
</style>
<?php
$cid = $_GET["fk_id"] ;
$IVFid = $_GET["fk_RIDNO"] ;
$Iid = $_GET["id"] ;
$dbhelper = &DbHelper();
if($IVFid == null)
{
	$sqla = "SELECT * FROM ganeshkumar_bjhims.ivf_vitals_history where id='".$Iid."'";
	$resultsa = $dbhelper->ExecuteRows($sqla);
	$IVFid = $resultsa[0]["RIDNO"];
	$cid = $resultsa[0]["Name"];
}
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$IVFid."'; ";
$results = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Male"]."'; ";
$results1 = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Female"]."'; ";
$results2 = $dbhelper->ExecuteRows($sql);
if($results2[0]["profilePic"] == "")
{
   $PatientProfilePic = "hims\profile-picture.png";
}else{
 $PatientProfilePic = $results2[0]["profilePic"];
}
if($results1[0]["profilePic"] == "")
{
   $PartnerProfilePic = "hims\profile-picture.png";
}else{
 $PartnerProfilePic = $results1[0]["profilePic"];
}
?>	
<div id="divCheckbox" style="display: none;">
{{include tmpl="#tpc_ivf_vitals_history_RIDNO"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_RIDNO")/}}
{{include tmpl="#tpc_ivf_vitals_history_Name"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_Name")/}}
</div>
<input type="hidden" id="ivfRIDNO" name="ivfRIDNO" value="<?php echo $IVFid; ?>">
<input type="hidden" id="ivfName" name="ivfName" value="<?php echo $results[0]["Female"]; ?>">
 <?php  if($results[0]["Male"]== '0')
{ echo "Donor ID : ".$results[0]["CoupleID"]; }
else{ echo "Couple ID : ".$results[0]["CoupleID"]; }
  ?>
<div class="row">
<div class="col-md-6">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
			  <!-- Add the bg color to the header using any of the bg-* classes -->
			  <div class="widget-user-header bg-warning">
			  	<h4 class="widget-user-username"><span class="ew-cell">Patient Id : <?php echo $results2[0]["PatientID"]; ?></span></h4>
				<h4 class="widget-user-username"><span class="ew-cell">Patient Name : <?php echo $results2[0]["first_name"]; ?></span></h4>
				<h6 class="widget-user-desc"><span class="ew-cell">Gender : <?php echo $results2[0]["gender"]; ?></span></h6>	
				<h6 class="widget-user-desc"><span class="ew-cell">Blood Group : <?php echo $results2[0]["blood_group"]; ?></span></h6>
			  </div>
			  <div class="widget-user-image">
			   		<img id="profilePicturePatient" class="img-circle elevation-2" src='<?php echo "uploads/".$PatientProfilePic; ?>' alt="User Avatar"> 
			  </div>
			  <div class="card-footer">
				<div class="row">
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span class="ew-cell">Age : <?php echo AgeCalculationb($results2[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header">Mobile : <?php echo $results2[0]["mobile_no"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4">
					<div class="description-block">
					  <h5 class="description-header">Email : <?php echo $results2[0]["PEmail"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				</div>
				<!-- /.row -->
			  </div>
			</div>
			<!-- /.widget-user -->
</div>
<div class="col-md-6">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
			  <!-- Add the bg color to the header using any of the bg-* classes -->
			  <div class="widget-user-header bg-warning">
			  	<h4 class="widget-user-username"><span class="ew-cell">Partner Id : <?php echo $results1[0]["PatientID"]; ?></span></h4>
				<h4 class="widget-user-username"><span class="ew-cell">Partner Name :<?php echo $results1[0]["first_name"]; ?></span></h4>
				<h6 class="widget-user-desc"><span class="ew-cell">Gender : <?php echo $results1[0]["gender"]; ?></span></h6>	
				<h6 class="widget-user-desc"><span class="ew-cell">Blood Group : <?php echo $results1[0]["blood_group"]; ?></span></h6>
			  </div>
			  <div class="widget-user-image">
			   		<img id="profilePicturePatient" class="img-circle elevation-2" src='<?php echo "uploads/".$PartnerProfilePic; ?>' alt="User Avatar"> 
			  </div>
			  <div class="card-footer">
				<div class="row">
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span class="ew-cell">Age : <?php echo AgeCalculationb($results1[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header">Mobile : <?php echo $results1[0]["mobile_no"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4">
					<div class="description-block">
					  <h5 class="description-header">Email : <?php echo $results1[0]["PEmail"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				</div>
				<!-- /.row -->
			  </div>
			</div>
			<!-- /.widget-user -->
</div>
</div>
<?php
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_vitals_history where RIDNO='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$VitalsHistory = $dbhelper->ExecuteRows($sql);
	$VitalsHistoryRowCount = count($VitalsHistory);
	if($VitalsHistoryRowCount > 0)
	{
		if($cid == $VitalsHistory[$VitalsHistoryRowCount-1]["TidNo"])
		{
			$VitalsHistoryUrl = "ivf_vitals_historyview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$VitalsHistory[$VitalsHistoryRowCount-1]["id"]."";  // ---- view
		}else{
			$kk = 0;
			for ($x = 0; $x < $VitalsHistoryRowCount; $x++) {
				if($cid == $VitalsHistory[$x]["TidNo"])
				{
					$kk = 1;
					$VitalsHistoryUrl = "ivf_vitals_historyview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$VitalsHistory[$x]["id"]."";  // ---- view
				}
			}
			if($kk == 0)
			{
				$VitalsHistoryUrl = "ivf_vitals_historyadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$VitalsHistory[$VitalsHistoryRowCount-1]["id"]."";
			}
		}
	}else{
		$VitalsHistoryUrl = "ivf_vitals_historyadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}
	$opurl = "view_opd_follow_upadd.php?showmaster=ivf_treatment_plan&fk_Name=".$results2[0]["id"]."&fk_id=".$cid."&fk_RIDNO=".$IVFid."";
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_et_chart where RIDNo='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivf_et_chart = $dbhelper->ExecuteRows($sql);
	$Vivf_et_chartRowCount = count($ivf_et_chart);
	if($ivf_et_chart == false)
	{
		$Etcountwarn = "";
		$ivf_et_chartUrl = "ivf_et_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($Vivf_et_chartRowCount > 0)
		{
			$Etcountwarn ='<span class="badge bg-warning">'.$Vivf_et_chartRowCount.'</span>';
			if($cid == $ivf_et_chart[$Vivf_et_chartRowCount-1]["TidNo"])
			{
				$ivf_et_chartUrl = "ivf_et_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivf_et_chart[$Vivf_et_chartRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $Vivf_et_chartRowCount; $x++) {
					if($cid == $ivf_et_chart[$x]["TidNo"])
					{
						$kk = 1;
						$ivf_et_chartUrl = "ivf_et_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivf_et_chart[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivf_et_chartUrl = "ivf_et_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivf_et_chart[$Vivf_et_chartRowCount-1]["id"]."";
				}
			}
		}else{
			$ivf_et_chartUrl = "ivf_et_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}

	//http://localhost:1445/ivf_et_chartadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_art_summary where RIDNo='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivfartsummary = $dbhelper->ExecuteRows($sql);
	$ivfartsummaryRowCount = count($ivfartsummary);
	if($ivfartsummary == false)
	{
		$ivfartsummarycountwarn = "";
		$ivfartsummaryUrl = "ivf_art_summaryadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($ivfartsummaryRowCount > 0)
		{
			$ivfartsummarycountwarn ='<span class="badge bg-warning">'.$ivfartsummaryRowCount.'</span>';
			if($cid == $ivfartsummary[$ivfartsummaryRowCount-1]["TidNo"])
			{
				$ivfartsummaryUrl = "ivf_art_summaryview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfartsummary[$ivfartsummaryRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfartsummaryRowCount; $x++) {
					if($cid == $ivfartsummary[$x]["TidNo"])
					{
						$kk = 1;
						$ivfartsummaryUrl = "ivf_art_summaryview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfartsummary[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfartsummaryUrl = "ivf_art_summaryadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfartsummary[$ivfartsummaryRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfartsummaryUrl = "ivf_art_summaryadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}

  //  http://localhost:1445/ivf_art_summaryadd.php?showmaster=ivf_treatment_plan&fk_id=1&fk_Name=597&fk_RIDNO=11
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_stimulation_chart where RIDNo='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivfstimulationchart = $dbhelper->ExecuteRows($sql);
	$ivfstimulationchartRowCount = count($ivfstimulationchart);
	if($ivfstimulationchart == false)
	{
		$ivfstimulationchartwarn = "";
		$ivfstimulationchartUrl = "ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($VitalsHistoryRowCount > 0)
		{
			$ivfstimulationchartwarn ='<span class="badge bg-warning">'.$VitalsHistoryRowCount.'</span>';
			if($cid == $ivfstimulationchart[$ivfstimulationchartRowCount-1]["TidNo"])
			{
				$ivfstimulationchartUrl = "ivf_stimulation_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfstimulationchart[$ivfstimulationchartRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfstimulationchartRowCount; $x++) {
					if($cid == $ivfstimulationchart[$x]["TidNo"])
					{
						$kk = 1;
						$ivfstimulationchartUrl = "ivf_stimulation_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfstimulationchart[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfstimulationchartUrl = "ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfstimulationchart[$ivfstimulationchartRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfstimulationchartUrl = "ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}

  //  http://localhost:1445/ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_semenanalysisreport where RIDNo='".$IVFid."' and PatientName='".$results2[0]["id"]."' ;";
	$ivfsemenanalysisreport = $dbhelper->ExecuteRows($sql);
	$ivfsemenanalysisreportRowCount = count($ivfsemenanalysisreport);
	if($ivfsemenanalysisreport == false)
	{
		$ivfsemenanalysisreportwarn = "";
		$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($ivfsemenanalysisreportRowCount > 0)
		{
			$ivfsemenanalysisreportwarn ='<span class="badge bg-warning">'.$ivfsemenanalysisreportRowCount.'</span>';
			if($cid == $ivfsemenanalysisreport[$ivfsemenanalysisreportRowCount-1]["TidNo"])
			{
				$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfsemenanalysisreport[$ivfsemenanalysisreportRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfsemenanalysisreportRowCount; $x++) {
					if($cid == $ivfsemenanalysisreport[$x]["TidNo"])
					{
						$kk = 1;
						$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfsemenanalysisreport[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfsemenanalysisreport[$ivfsemenanalysisreportRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}

  //  http://localhost:1445/ivf_semenanalysisreportadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_ovum_pick_up_chart where RIDNo='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivfovumpickupchart = $dbhelper->ExecuteRows($sql);
	$ivfovumpickupchartRowCount = count($ivfovumpickupchart);
	if($ivfovumpickupchart == false)
	{
		$ivfovumpickupchartwarn = "";
		$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($ivfovumpickupchartRowCount > 0)
		{
			$ivfovumpickupchartwarn ='<span class="badge bg-warning">'.$ivfovumpickupchartRowCount.'</span>';
			if($cid == $ivfovumpickupchart[$ivfovumpickupchartRowCount-1]["TidNo"])
			{
				$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfovumpickupchart[$ivfovumpickupchartRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfovumpickupchartRowCount; $x++) {
					if($cid == $ivfovumpickupchart[$x]["TidNo"])
					{
						$kk = 1;
						$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfovumpickupchart[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfovumpickupchart[$ivfovumpickupchartRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}

   // http://localhost:1445/ivf_ovum_pick_up_chartadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_otherprocedure where RIDNO='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivfotherprocedure = $dbhelper->ExecuteRows($sql);
	$ivfotherprocedureRowCount = count($ivfotherprocedure);
	if($ivfotherprocedure == false)
	{
		$ivfotherprocedurewarn = "";
		$ivfotherprocedureUrl = "ivf_otherprocedureadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($ivfotherprocedureRowCount > 0)
		{
			$ivfotherprocedurewarn ='<span class="badge bg-warning">'.$ivfotherprocedureRowCount.'</span>';
			if($cid == $ivfotherprocedure[$ivfotherprocedureRowCount-1]["TidNo"])
			{
				$ivfotherprocedureUrl = "ivf_otherprocedureview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfotherprocedure[$ivfotherprocedureRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfotherprocedureRowCount; $x++) {
					if($cid == $ivfotherprocedure[$x]["TidNo"])
					{
						$kk = 1;
						$ivfotherprocedureUrl = "ivf_otherprocedureview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfotherprocedure[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfotherprocedureUrl = "ivf_otherprocedureadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfotherprocedure[$ivfotherprocedureRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfotherprocedureUrl = "ivf_otherprocedureadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}

  //  http://localhost:1445/ivf_otherprocedureadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$ivfembryologychartlistUrl = "ivf_embryology_chartlist.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add

	//http://localhost:1445/ivf_embryology_chartlist.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$patientserviceslistUrl = "patient_serviceslist.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";

	//http://localhost:1445/patient_serviceslist.php?showmaster=ivf_treatment_plan&fk_Name=597&fk_RIDNO=11&fk_id=1
	$followupurl = "ivf_follow_up_trackingadd.php?showmaster=ivf_treatment_plan&fk_Name=".$results2[0]["id"]."&fk_id=".$cid."&fk_RIDNO=".$IVFid."";

	//http://localhost:1445/ivf_follow_up_trackingadd.php?showmaster=ivf_treatment_plan&fk_id=1&fk_RIDNO=11&fk_Name=597
	$followupurl = "ivf_follow_up_trackingadd.php?showmaster=ivf_treatment_plan&fk_Name=".$results2[0]["id"]."&fk_id=".$cid."&fk_RIDNO=".$IVFid."";
	$TrPlanurl = "ivf_treatment_planview.php?showdetail=&id=".$cid."&showmaster=ivf&fk_id=".$IVFid."&fk_Female=".$results2[0]["id"]."";

	//http://localhost:1445/ivf_treatment_planview.php?showdetail=&id=1&showmaster=ivf&fk_id=11&fk_Female=597
?>
	<div class="card">
			  <div class="card-header">
				<h3 class="card-title">Application Buttons</h3>
			  </div>
			  <div class="card-body">
				<a class="btn btn-app"  href="javascript:history.back()">
				  <i class="fas fa-undo"></i> Back
				</a>	  
			  </div>
			  <!-- /.card-body -->
		</div>
</br>
<div class="row">
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Patient</h3>
			</div>
			<div class="card-body">
				 <div class="ew-row">
				 	<table  style="width: 100%;"  class="ew-table">
			  			<tbody>
			  				<tr><td>{{include tmpl="#tpc_ivf_vitals_history_Fheight"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_Fheight")/}} Cm.</td><td>{{include tmpl="#tpc_ivf_vitals_history_Fweight"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_Fweight")/}} Kg.</td></tr>
			  			</tbody>
			  		</table>
					<span class="ew-cell col-6">{{include tmpl="#tpc_ivf_vitals_history_FBMI"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_FBMI")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_IdentificationMark"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_IdentificationMark")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_FBuild"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_FBuild")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_FSkinColor"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_FSkinColor")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_FEyesColor"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_FEyesColor")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_FHairColor"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_FHairColor")/}}</span>
				  </div>
				<div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_MHairTexture"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_MHairTexture")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_Mothers"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_Mothers")/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Partner</h3>
			</div>
			<div class="card-body">
				<div class="ew-row">
					<table  style="width: 100%;"  class="ew-table">
			  			<tbody>
			  				<tr><td>{{include tmpl="#tpc_ivf_vitals_history_Mheight"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_Mheight")/}} Cm.</td><td>{{include tmpl="#tpc_ivf_vitals_history_Mweight"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_Mweight")/}} Kg.</td></tr>
			  			</tbody>
			  		</table>
					<span class="ew-cell col-6">{{include tmpl="#tpc_ivf_vitals_history_MBMI"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_MBMI")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_Address"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_Address")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_MBuild"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_MBuild")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_MSkinColor"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_MSkinColor")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_MEyesColor"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_MEyesColor")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_MhairColor"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_MhairColor")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_FhairTexture"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_FhairTexture")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_Fothers"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_Fothers")/}}</span>
				  </div>
				  			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
</div>
  				 <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_MariedFor"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_MariedFor")/}}</span>
				  </div>
				  				 <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_CMNCM"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_CMNCM")/}}</span>
				  </div>
{{include tmpl="#tpc_ivf_vitals_history_Chiefcomplaints"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_Chiefcomplaints")/}}
  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_CoitalHistory"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_CoitalHistory")/}}</span>
				  </div>
				  				 <div class="ew-row">
				 {{include tmpl="#tpc_ivf_vitals_history_TemplateFertilityTreatmentHistory"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_TemplateFertilityTreatmentHistory")/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_FertilityTreatmentHistory"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_FertilityTreatmentHistory")/}}</span>
				  </div>
<div class="row">
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Patient</h3>
			</div>
			<div class="card-body">
			 		<div class="ew-row">
			 		{{include tmpl="#tpc_ivf_vitals_history_TemplateMenstrualHistory"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_TemplateMenstrualHistory")/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_MenstrualHistory"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_MenstrualHistory")/}}</span>
				  </div>
				   <div class="ew-row">
				   {{include tmpl="#tpc_ivf_vitals_history_TemplateObstetricHistory"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_TemplateObstetricHistory")/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_ObstetricHistory"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_ObstetricHistory")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_MedicalHistory"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_MedicalHistory")/}}</span>
				  </div>
				   <div class="ew-row">
				   {{include tmpl="#tpc_ivf_vitals_history_TemplateSurgeryHistory"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_TemplateSurgeryHistory")/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_SurgeryHistory"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_SurgeryHistory")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_FamilyHistory"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_FamilyHistory")/}}</span>
				  </div>
				   <div class="ew-row">
				   {{include tmpl="#tpc_ivf_vitals_history_TemplateFInvestigations"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_TemplateFInvestigations")/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_PInvestigations"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_PInvestigations")/}}</span>
				  </div>
					<div class="ew-row">
				   {{include tmpl="#tpc_ivf_vitals_history_TemplateMedications"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_TemplateMedications")/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_pTemplateMedications"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_pTemplateMedications")/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Partner</h3>
			</div>
			<div class="card-body">
				<div class="ew-row">
						<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_Addictions"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_Addictions")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_Medical"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_Medical")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_Surgical"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_Surgical")/}}</span>
				  </div>
				<div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_pFamilyHistory"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_pFamilyHistory")/}}</span>
				  </div>
				   <div class="ew-row">
				   {{include tmpl="#tpc_ivf_vitals_history_TemplateSemenAnalysis"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_TemplateSemenAnalysis")/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_SemenAnalysis"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_SemenAnalysis")/}}</span>
				  </div>
				    <div class="ew-row">
				    {{include tmpl="#tpc_ivf_vitals_history_MaleInsvestications"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_MaleInsvestications")/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_MInsvestications"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_MInsvestications")/}}</span>
				  </div>
				   <div class="ew-row">
				   {{include tmpl="#tpc_ivf_vitals_history_TemplateMedications"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_TemplateMedications")/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_Medications"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_Medications")/}}</span>
				  </div>
				  			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
</div>
<div class="row">
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Patient</h3>
			</div>
			<div class="card-body">
				 <div class="ew-row">
					<span class="ew-cell col-6">{{include tmpl="#tpc_ivf_vitals_history_PGE"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_PGE")/}}</span>
					<span class="ew-cell col-6">{{include tmpl="#tpc_ivf_vitals_history_PPR"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_PPR")/}}</span>
					<span class="ew-cell col-6">{{include tmpl="#tpc_ivf_vitals_history_PBP"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_PBP")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_Breast"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_Breast")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_PPA"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_PPA")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_PPSV"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_PPSV")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_PPAPSMEAR"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_PPAPSMEAR")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_PTHYROID"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_PTHYROID")/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Partner</h3>
			</div>
			<div class="card-body">
				<div class="ew-row">
						<span class="ew-cell col-6">{{include tmpl="#tpc_ivf_vitals_history_MTHYROID"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_MTHYROID")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_SecSexCharacters"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_SecSexCharacters")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_PenisUM"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_PenisUM")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_VAS"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_VAS")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_EPIDIDYMIS"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_EPIDIDYMIS")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_Varicocele"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_Varicocele")/}}</span>
				  </div>
				  			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
</div>
<div class="row">
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Patient</h3>
			</div>
			<div class="card-body">
			 		<div class="ew-row">
			 		{{include tmpl="#tpc_ivf_vitals_history_TemplatePImpression"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_TemplatePImpression")/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_PImpression"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_PImpression")/}}</span>
				  </div>
				   <div class="ew-row">
				   {{include tmpl="#tpc_ivf_vitals_history_TemplatePlanOfManagement"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_TemplatePlanOfManagement")/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_PPlanOfManagement"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_PPlanOfManagement")/}}</span>
				  </div>
				 <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_PReadMore"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_PReadMore")/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Partner</h3>
			</div>
			<div class="card-body">
				<div class="ew-row">
				{{include tmpl="#tpc_ivf_vitals_history_TemplateMIMpression"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_TemplateMIMpression")/}}
						<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_MIMpression"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_MIMpression")/}}</span>
				  </div>
				   <div class="ew-row">
				   {{include tmpl="#tpc_ivf_vitals_history_TemplateMalePlanOfManagement"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_TemplateMalePlanOfManagement")/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_MPlanOfManagement"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_MPlanOfManagement")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_MReadMore"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_vitals_history_MReadMore")/}}</span>
				  </div>
				  			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
</div>
</div>
</script>

</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($ivf_vitals_history->Rows) ?> };
	ew.applyTemplate("tpd_ivf_vitals_historyview", "tpm_ivf_vitals_historyview", "ivf_vitals_historyview", "<?php echo $ivf_vitals_history->CustomExport ?>", ew.templateData.rows[0]);
	$("script.ivf_vitals_historyview_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$ivf_vitals_history_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$ivf_vitals_history_view->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	function calculateBmi(){var e=document.getElementById("x_Fweight").value,t=document.getElementById("x_Fheight").value;if(e>0&&t>0){var n=e/(t/100*t/100);(n=Math.round(1e3*n)/1e3)<18.5&&(n+=" Too Thin"),n>18.5&&n<25&&(n+=" Healthy"),n>25&&(n+=" Over Weight"),document.getElementById("x_FBMI").value=n}}function calculateBmiM(){var e=document.getElementById("x_Mweight").value,t=document.getElementById("x_Mheight").value;if(e>0&&t>0){var n=e/(t/100*t/100);(n=Math.round(1e3*n)/1e3)<18.5&&(n+=" Too Thin"),n>18.5&&n<25&&(n+=" Healthy"),n>25&&(n+=" Over Weight"),document.getElementById("x_MBMI").value=n}}document.getElementById("x_Fweight").style.width="80px",document.getElementById("x_Fheight").style.width="80px",document.getElementById("x_Mweight").style.width="80px",document.getElementById("x_Mheight").style.width="80px",$("#x_Fweight").change(function(){calculateBmi()}),$("#x_Fheight").change(function(){calculateBmi()}),$("#x_Mweight").change(function(){calculateBmiM()}),$("#x_Mheight").change(function(){calculateBmiM()});
});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$ivf_vitals_history_view->terminate();
?>