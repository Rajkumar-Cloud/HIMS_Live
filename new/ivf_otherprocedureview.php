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
$ivf_otherprocedure_view = new ivf_otherprocedure_view();

// Run the page
$ivf_otherprocedure_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_otherprocedure_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$ivf_otherprocedure_view->isExport()) { ?>
<script>
var fivf_otherprocedureview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fivf_otherprocedureview = currentForm = new ew.Form("fivf_otherprocedureview", "view");
	loadjs.done("fivf_otherprocedureview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$ivf_otherprocedure_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $ivf_otherprocedure_view->ExportOptions->render("body") ?>
<?php $ivf_otherprocedure_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $ivf_otherprocedure_view->showPageHeader(); ?>
<?php
$ivf_otherprocedure_view->showMessage();
?>
<form name="fivf_otherprocedureview" id="fivf_otherprocedureview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_otherprocedure">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_otherprocedure_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($ivf_otherprocedure_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_id"><script id="tpc_ivf_otherprocedure_id" type="text/html"><?php echo $ivf_otherprocedure_view->id->caption() ?></script></span></td>
		<td data-name="id" <?php echo $ivf_otherprocedure_view->id->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_id" type="text/html"><span id="el_ivf_otherprocedure_id">
<span<?php echo $ivf_otherprocedure_view->id->viewAttributes() ?>><?php echo $ivf_otherprocedure_view->id->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure_view->RIDNO->Visible) { // RIDNO ?>
	<tr id="r_RIDNO">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_RIDNO"><script id="tpc_ivf_otherprocedure_RIDNO" type="text/html"><?php echo $ivf_otherprocedure_view->RIDNO->caption() ?></script></span></td>
		<td data-name="RIDNO" <?php echo $ivf_otherprocedure_view->RIDNO->cellAttributes() ?>>
<script id="orig_ivf_otherprocedure_RIDNO" class="ivf_otherprocedureview" type="text/html">
<?php echo $ivf_otherprocedure_view->RIDNO->getViewValue() ?>
</script><script id="tpx_ivf_otherprocedure_RIDNO" class="ivf_otherprocedureview" type="text/html">
<?php echo Barcode()->show($ivf_otherprocedure_view->RIDNO->CurrentValue, 'EAN-13', 60) ?>
</script>
<script id="tpx_ivf_otherprocedure_RIDNO" type="text/html"><span id="el_ivf_otherprocedure_RIDNO">
<span<?php echo $ivf_otherprocedure_view->RIDNO->viewAttributes() ?>>{{include tmpl=~getTemplate("#tpx_ivf_otherprocedure_RIDNO")/}}</span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure_view->Name->Visible) { // Name ?>
	<tr id="r_Name">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_Name"><script id="tpc_ivf_otherprocedure_Name" type="text/html"><?php echo $ivf_otherprocedure_view->Name->caption() ?></script></span></td>
		<td data-name="Name" <?php echo $ivf_otherprocedure_view->Name->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_Name" type="text/html"><span id="el_ivf_otherprocedure_Name">
<span<?php echo $ivf_otherprocedure_view->Name->viewAttributes() ?>><?php echo $ivf_otherprocedure_view->Name->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure_view->Age->Visible) { // Age ?>
	<tr id="r_Age">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_Age"><script id="tpc_ivf_otherprocedure_Age" type="text/html"><?php echo $ivf_otherprocedure_view->Age->caption() ?></script></span></td>
		<td data-name="Age" <?php echo $ivf_otherprocedure_view->Age->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_Age" type="text/html"><span id="el_ivf_otherprocedure_Age">
<span<?php echo $ivf_otherprocedure_view->Age->viewAttributes() ?>><?php echo $ivf_otherprocedure_view->Age->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure_view->SEX->Visible) { // SEX ?>
	<tr id="r_SEX">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_SEX"><script id="tpc_ivf_otherprocedure_SEX" type="text/html"><?php echo $ivf_otherprocedure_view->SEX->caption() ?></script></span></td>
		<td data-name="SEX" <?php echo $ivf_otherprocedure_view->SEX->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_SEX" type="text/html"><span id="el_ivf_otherprocedure_SEX">
<span<?php echo $ivf_otherprocedure_view->SEX->viewAttributes() ?>><?php echo $ivf_otherprocedure_view->SEX->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure_view->Address->Visible) { // Address ?>
	<tr id="r_Address">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_Address"><script id="tpc_ivf_otherprocedure_Address" type="text/html"><?php echo $ivf_otherprocedure_view->Address->caption() ?></script></span></td>
		<td data-name="Address" <?php echo $ivf_otherprocedure_view->Address->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_Address" type="text/html"><span id="el_ivf_otherprocedure_Address">
<span<?php echo $ivf_otherprocedure_view->Address->viewAttributes() ?>><?php echo $ivf_otherprocedure_view->Address->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure_view->DateofAdmission->Visible) { // DateofAdmission ?>
	<tr id="r_DateofAdmission">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_DateofAdmission"><script id="tpc_ivf_otherprocedure_DateofAdmission" type="text/html"><?php echo $ivf_otherprocedure_view->DateofAdmission->caption() ?></script></span></td>
		<td data-name="DateofAdmission" <?php echo $ivf_otherprocedure_view->DateofAdmission->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_DateofAdmission" type="text/html"><span id="el_ivf_otherprocedure_DateofAdmission">
<span<?php echo $ivf_otherprocedure_view->DateofAdmission->viewAttributes() ?>><?php echo $ivf_otherprocedure_view->DateofAdmission->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure_view->DateofProcedure->Visible) { // DateofProcedure ?>
	<tr id="r_DateofProcedure">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_DateofProcedure"><script id="tpc_ivf_otherprocedure_DateofProcedure" type="text/html"><?php echo $ivf_otherprocedure_view->DateofProcedure->caption() ?></script></span></td>
		<td data-name="DateofProcedure" <?php echo $ivf_otherprocedure_view->DateofProcedure->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_DateofProcedure" type="text/html"><span id="el_ivf_otherprocedure_DateofProcedure">
<span<?php echo $ivf_otherprocedure_view->DateofProcedure->viewAttributes() ?>><?php echo $ivf_otherprocedure_view->DateofProcedure->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure_view->DateofDischarge->Visible) { // DateofDischarge ?>
	<tr id="r_DateofDischarge">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_DateofDischarge"><script id="tpc_ivf_otherprocedure_DateofDischarge" type="text/html"><?php echo $ivf_otherprocedure_view->DateofDischarge->caption() ?></script></span></td>
		<td data-name="DateofDischarge" <?php echo $ivf_otherprocedure_view->DateofDischarge->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_DateofDischarge" type="text/html"><span id="el_ivf_otherprocedure_DateofDischarge">
<span<?php echo $ivf_otherprocedure_view->DateofDischarge->viewAttributes() ?>><?php echo $ivf_otherprocedure_view->DateofDischarge->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure_view->Consultant->Visible) { // Consultant ?>
	<tr id="r_Consultant">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_Consultant"><script id="tpc_ivf_otherprocedure_Consultant" type="text/html"><?php echo $ivf_otherprocedure_view->Consultant->caption() ?></script></span></td>
		<td data-name="Consultant" <?php echo $ivf_otherprocedure_view->Consultant->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_Consultant" type="text/html"><span id="el_ivf_otherprocedure_Consultant">
<span<?php echo $ivf_otherprocedure_view->Consultant->viewAttributes() ?>><?php echo $ivf_otherprocedure_view->Consultant->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure_view->Surgeon->Visible) { // Surgeon ?>
	<tr id="r_Surgeon">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_Surgeon"><script id="tpc_ivf_otherprocedure_Surgeon" type="text/html"><?php echo $ivf_otherprocedure_view->Surgeon->caption() ?></script></span></td>
		<td data-name="Surgeon" <?php echo $ivf_otherprocedure_view->Surgeon->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_Surgeon" type="text/html"><span id="el_ivf_otherprocedure_Surgeon">
<span<?php echo $ivf_otherprocedure_view->Surgeon->viewAttributes() ?>><?php echo $ivf_otherprocedure_view->Surgeon->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure_view->Anesthetist->Visible) { // Anesthetist ?>
	<tr id="r_Anesthetist">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_Anesthetist"><script id="tpc_ivf_otherprocedure_Anesthetist" type="text/html"><?php echo $ivf_otherprocedure_view->Anesthetist->caption() ?></script></span></td>
		<td data-name="Anesthetist" <?php echo $ivf_otherprocedure_view->Anesthetist->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_Anesthetist" type="text/html"><span id="el_ivf_otherprocedure_Anesthetist">
<span<?php echo $ivf_otherprocedure_view->Anesthetist->viewAttributes() ?>><?php echo $ivf_otherprocedure_view->Anesthetist->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure_view->IdentificationMark->Visible) { // IdentificationMark ?>
	<tr id="r_IdentificationMark">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_IdentificationMark"><script id="tpc_ivf_otherprocedure_IdentificationMark" type="text/html"><?php echo $ivf_otherprocedure_view->IdentificationMark->caption() ?></script></span></td>
		<td data-name="IdentificationMark" <?php echo $ivf_otherprocedure_view->IdentificationMark->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_IdentificationMark" type="text/html"><span id="el_ivf_otherprocedure_IdentificationMark">
<span<?php echo $ivf_otherprocedure_view->IdentificationMark->viewAttributes() ?>><?php echo $ivf_otherprocedure_view->IdentificationMark->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure_view->ProcedureDone->Visible) { // ProcedureDone ?>
	<tr id="r_ProcedureDone">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_ProcedureDone"><script id="tpc_ivf_otherprocedure_ProcedureDone" type="text/html"><?php echo $ivf_otherprocedure_view->ProcedureDone->caption() ?></script></span></td>
		<td data-name="ProcedureDone" <?php echo $ivf_otherprocedure_view->ProcedureDone->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_ProcedureDone" type="text/html"><span id="el_ivf_otherprocedure_ProcedureDone">
<span<?php echo $ivf_otherprocedure_view->ProcedureDone->viewAttributes() ?>><?php echo $ivf_otherprocedure_view->ProcedureDone->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure_view->PROVISIONALDIAGNOSIS->Visible) { // PROVISIONALDIAGNOSIS ?>
	<tr id="r_PROVISIONALDIAGNOSIS">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_PROVISIONALDIAGNOSIS"><script id="tpc_ivf_otherprocedure_PROVISIONALDIAGNOSIS" type="text/html"><?php echo $ivf_otherprocedure_view->PROVISIONALDIAGNOSIS->caption() ?></script></span></td>
		<td data-name="PROVISIONALDIAGNOSIS" <?php echo $ivf_otherprocedure_view->PROVISIONALDIAGNOSIS->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_PROVISIONALDIAGNOSIS" type="text/html"><span id="el_ivf_otherprocedure_PROVISIONALDIAGNOSIS">
<span<?php echo $ivf_otherprocedure_view->PROVISIONALDIAGNOSIS->viewAttributes() ?>><?php echo $ivf_otherprocedure_view->PROVISIONALDIAGNOSIS->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure_view->Chiefcomplaints->Visible) { // Chiefcomplaints ?>
	<tr id="r_Chiefcomplaints">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_Chiefcomplaints"><script id="tpc_ivf_otherprocedure_Chiefcomplaints" type="text/html"><?php echo $ivf_otherprocedure_view->Chiefcomplaints->caption() ?></script></span></td>
		<td data-name="Chiefcomplaints" <?php echo $ivf_otherprocedure_view->Chiefcomplaints->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_Chiefcomplaints" type="text/html"><span id="el_ivf_otherprocedure_Chiefcomplaints">
<span<?php echo $ivf_otherprocedure_view->Chiefcomplaints->viewAttributes() ?>><?php echo $ivf_otherprocedure_view->Chiefcomplaints->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure_view->MaritallHistory->Visible) { // MaritallHistory ?>
	<tr id="r_MaritallHistory">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_MaritallHistory"><script id="tpc_ivf_otherprocedure_MaritallHistory" type="text/html"><?php echo $ivf_otherprocedure_view->MaritallHistory->caption() ?></script></span></td>
		<td data-name="MaritallHistory" <?php echo $ivf_otherprocedure_view->MaritallHistory->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_MaritallHistory" type="text/html"><span id="el_ivf_otherprocedure_MaritallHistory">
<span<?php echo $ivf_otherprocedure_view->MaritallHistory->viewAttributes() ?>><?php echo $ivf_otherprocedure_view->MaritallHistory->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure_view->MenstrualHistory->Visible) { // MenstrualHistory ?>
	<tr id="r_MenstrualHistory">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_MenstrualHistory"><script id="tpc_ivf_otherprocedure_MenstrualHistory" type="text/html"><?php echo $ivf_otherprocedure_view->MenstrualHistory->caption() ?></script></span></td>
		<td data-name="MenstrualHistory" <?php echo $ivf_otherprocedure_view->MenstrualHistory->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_MenstrualHistory" type="text/html"><span id="el_ivf_otherprocedure_MenstrualHistory">
<span<?php echo $ivf_otherprocedure_view->MenstrualHistory->viewAttributes() ?>><?php echo $ivf_otherprocedure_view->MenstrualHistory->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure_view->SurgicalHistory->Visible) { // SurgicalHistory ?>
	<tr id="r_SurgicalHistory">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_SurgicalHistory"><script id="tpc_ivf_otherprocedure_SurgicalHistory" type="text/html"><?php echo $ivf_otherprocedure_view->SurgicalHistory->caption() ?></script></span></td>
		<td data-name="SurgicalHistory" <?php echo $ivf_otherprocedure_view->SurgicalHistory->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_SurgicalHistory" type="text/html"><span id="el_ivf_otherprocedure_SurgicalHistory">
<span<?php echo $ivf_otherprocedure_view->SurgicalHistory->viewAttributes() ?>><?php echo $ivf_otherprocedure_view->SurgicalHistory->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure_view->PastHistory->Visible) { // PastHistory ?>
	<tr id="r_PastHistory">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_PastHistory"><script id="tpc_ivf_otherprocedure_PastHistory" type="text/html"><?php echo $ivf_otherprocedure_view->PastHistory->caption() ?></script></span></td>
		<td data-name="PastHistory" <?php echo $ivf_otherprocedure_view->PastHistory->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_PastHistory" type="text/html"><span id="el_ivf_otherprocedure_PastHistory">
<span<?php echo $ivf_otherprocedure_view->PastHistory->viewAttributes() ?>><?php echo $ivf_otherprocedure_view->PastHistory->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure_view->FamilyHistory->Visible) { // FamilyHistory ?>
	<tr id="r_FamilyHistory">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_FamilyHistory"><script id="tpc_ivf_otherprocedure_FamilyHistory" type="text/html"><?php echo $ivf_otherprocedure_view->FamilyHistory->caption() ?></script></span></td>
		<td data-name="FamilyHistory" <?php echo $ivf_otherprocedure_view->FamilyHistory->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_FamilyHistory" type="text/html"><span id="el_ivf_otherprocedure_FamilyHistory">
<span<?php echo $ivf_otherprocedure_view->FamilyHistory->viewAttributes() ?>><?php echo $ivf_otherprocedure_view->FamilyHistory->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure_view->Temp->Visible) { // Temp ?>
	<tr id="r_Temp">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_Temp"><script id="tpc_ivf_otherprocedure_Temp" type="text/html"><?php echo $ivf_otherprocedure_view->Temp->caption() ?></script></span></td>
		<td data-name="Temp" <?php echo $ivf_otherprocedure_view->Temp->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_Temp" type="text/html"><span id="el_ivf_otherprocedure_Temp">
<span<?php echo $ivf_otherprocedure_view->Temp->viewAttributes() ?>><?php echo $ivf_otherprocedure_view->Temp->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure_view->Pulse->Visible) { // Pulse ?>
	<tr id="r_Pulse">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_Pulse"><script id="tpc_ivf_otherprocedure_Pulse" type="text/html"><?php echo $ivf_otherprocedure_view->Pulse->caption() ?></script></span></td>
		<td data-name="Pulse" <?php echo $ivf_otherprocedure_view->Pulse->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_Pulse" type="text/html"><span id="el_ivf_otherprocedure_Pulse">
<span<?php echo $ivf_otherprocedure_view->Pulse->viewAttributes() ?>><?php echo $ivf_otherprocedure_view->Pulse->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure_view->BP->Visible) { // BP ?>
	<tr id="r_BP">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_BP"><script id="tpc_ivf_otherprocedure_BP" type="text/html"><?php echo $ivf_otherprocedure_view->BP->caption() ?></script></span></td>
		<td data-name="BP" <?php echo $ivf_otherprocedure_view->BP->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_BP" type="text/html"><span id="el_ivf_otherprocedure_BP">
<span<?php echo $ivf_otherprocedure_view->BP->viewAttributes() ?>><?php echo $ivf_otherprocedure_view->BP->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure_view->CNS->Visible) { // CNS ?>
	<tr id="r_CNS">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_CNS"><script id="tpc_ivf_otherprocedure_CNS" type="text/html"><?php echo $ivf_otherprocedure_view->CNS->caption() ?></script></span></td>
		<td data-name="CNS" <?php echo $ivf_otherprocedure_view->CNS->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_CNS" type="text/html"><span id="el_ivf_otherprocedure_CNS">
<span<?php echo $ivf_otherprocedure_view->CNS->viewAttributes() ?>><?php echo $ivf_otherprocedure_view->CNS->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure_view->_RS->Visible) { // RS ?>
	<tr id="r__RS">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure__RS"><script id="tpc_ivf_otherprocedure__RS" type="text/html"><?php echo $ivf_otherprocedure_view->_RS->caption() ?></script></span></td>
		<td data-name="_RS" <?php echo $ivf_otherprocedure_view->_RS->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure__RS" type="text/html"><span id="el_ivf_otherprocedure__RS">
<span<?php echo $ivf_otherprocedure_view->_RS->viewAttributes() ?>><?php echo $ivf_otherprocedure_view->_RS->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure_view->CVS->Visible) { // CVS ?>
	<tr id="r_CVS">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_CVS"><script id="tpc_ivf_otherprocedure_CVS" type="text/html"><?php echo $ivf_otherprocedure_view->CVS->caption() ?></script></span></td>
		<td data-name="CVS" <?php echo $ivf_otherprocedure_view->CVS->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_CVS" type="text/html"><span id="el_ivf_otherprocedure_CVS">
<span<?php echo $ivf_otherprocedure_view->CVS->viewAttributes() ?>><?php echo $ivf_otherprocedure_view->CVS->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure_view->PA->Visible) { // PA ?>
	<tr id="r_PA">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_PA"><script id="tpc_ivf_otherprocedure_PA" type="text/html"><?php echo $ivf_otherprocedure_view->PA->caption() ?></script></span></td>
		<td data-name="PA" <?php echo $ivf_otherprocedure_view->PA->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_PA" type="text/html"><span id="el_ivf_otherprocedure_PA">
<span<?php echo $ivf_otherprocedure_view->PA->viewAttributes() ?>><?php echo $ivf_otherprocedure_view->PA->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure_view->InvestigationReport->Visible) { // InvestigationReport ?>
	<tr id="r_InvestigationReport">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_InvestigationReport"><script id="tpc_ivf_otherprocedure_InvestigationReport" type="text/html"><?php echo $ivf_otherprocedure_view->InvestigationReport->caption() ?></script></span></td>
		<td data-name="InvestigationReport" <?php echo $ivf_otherprocedure_view->InvestigationReport->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_InvestigationReport" type="text/html"><span id="el_ivf_otherprocedure_InvestigationReport">
<span<?php echo $ivf_otherprocedure_view->InvestigationReport->viewAttributes() ?>><?php echo $ivf_otherprocedure_view->InvestigationReport->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure_view->FinalDiagnosis->Visible) { // FinalDiagnosis ?>
	<tr id="r_FinalDiagnosis">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_FinalDiagnosis"><script id="tpc_ivf_otherprocedure_FinalDiagnosis" type="text/html"><?php echo $ivf_otherprocedure_view->FinalDiagnosis->caption() ?></script></span></td>
		<td data-name="FinalDiagnosis" <?php echo $ivf_otherprocedure_view->FinalDiagnosis->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_FinalDiagnosis" type="text/html"><span id="el_ivf_otherprocedure_FinalDiagnosis">
<span<?php echo $ivf_otherprocedure_view->FinalDiagnosis->viewAttributes() ?>><?php echo $ivf_otherprocedure_view->FinalDiagnosis->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure_view->Treatment->Visible) { // Treatment ?>
	<tr id="r_Treatment">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_Treatment"><script id="tpc_ivf_otherprocedure_Treatment" type="text/html"><?php echo $ivf_otherprocedure_view->Treatment->caption() ?></script></span></td>
		<td data-name="Treatment" <?php echo $ivf_otherprocedure_view->Treatment->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_Treatment" type="text/html"><span id="el_ivf_otherprocedure_Treatment">
<span<?php echo $ivf_otherprocedure_view->Treatment->viewAttributes() ?>><?php echo $ivf_otherprocedure_view->Treatment->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure_view->DetailOfOperation->Visible) { // DetailOfOperation ?>
	<tr id="r_DetailOfOperation">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_DetailOfOperation"><script id="tpc_ivf_otherprocedure_DetailOfOperation" type="text/html"><?php echo $ivf_otherprocedure_view->DetailOfOperation->caption() ?></script></span></td>
		<td data-name="DetailOfOperation" <?php echo $ivf_otherprocedure_view->DetailOfOperation->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_DetailOfOperation" type="text/html"><span id="el_ivf_otherprocedure_DetailOfOperation">
<span<?php echo $ivf_otherprocedure_view->DetailOfOperation->viewAttributes() ?>><?php echo $ivf_otherprocedure_view->DetailOfOperation->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure_view->FollowUpAdvice->Visible) { // FollowUpAdvice ?>
	<tr id="r_FollowUpAdvice">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_FollowUpAdvice"><script id="tpc_ivf_otherprocedure_FollowUpAdvice" type="text/html"><?php echo $ivf_otherprocedure_view->FollowUpAdvice->caption() ?></script></span></td>
		<td data-name="FollowUpAdvice" <?php echo $ivf_otherprocedure_view->FollowUpAdvice->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_FollowUpAdvice" type="text/html"><span id="el_ivf_otherprocedure_FollowUpAdvice">
<span<?php echo $ivf_otherprocedure_view->FollowUpAdvice->viewAttributes() ?>><?php echo $ivf_otherprocedure_view->FollowUpAdvice->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure_view->FollowUpMedication->Visible) { // FollowUpMedication ?>
	<tr id="r_FollowUpMedication">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_FollowUpMedication"><script id="tpc_ivf_otherprocedure_FollowUpMedication" type="text/html"><?php echo $ivf_otherprocedure_view->FollowUpMedication->caption() ?></script></span></td>
		<td data-name="FollowUpMedication" <?php echo $ivf_otherprocedure_view->FollowUpMedication->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_FollowUpMedication" type="text/html"><span id="el_ivf_otherprocedure_FollowUpMedication">
<span<?php echo $ivf_otherprocedure_view->FollowUpMedication->viewAttributes() ?>><?php echo $ivf_otherprocedure_view->FollowUpMedication->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure_view->Plan->Visible) { // Plan ?>
	<tr id="r_Plan">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_Plan"><script id="tpc_ivf_otherprocedure_Plan" type="text/html"><?php echo $ivf_otherprocedure_view->Plan->caption() ?></script></span></td>
		<td data-name="Plan" <?php echo $ivf_otherprocedure_view->Plan->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_Plan" type="text/html"><span id="el_ivf_otherprocedure_Plan">
<span<?php echo $ivf_otherprocedure_view->Plan->viewAttributes() ?>><?php echo $ivf_otherprocedure_view->Plan->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure_view->TempleteFinalDiagnosis->Visible) { // TempleteFinalDiagnosis ?>
	<tr id="r_TempleteFinalDiagnosis">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_TempleteFinalDiagnosis"><script id="tpc_ivf_otherprocedure_TempleteFinalDiagnosis" type="text/html"><?php echo $ivf_otherprocedure_view->TempleteFinalDiagnosis->caption() ?></script></span></td>
		<td data-name="TempleteFinalDiagnosis" <?php echo $ivf_otherprocedure_view->TempleteFinalDiagnosis->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_TempleteFinalDiagnosis" type="text/html"><span id="el_ivf_otherprocedure_TempleteFinalDiagnosis">
<span<?php echo $ivf_otherprocedure_view->TempleteFinalDiagnosis->viewAttributes() ?>><?php echo $ivf_otherprocedure_view->TempleteFinalDiagnosis->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure_view->TemplateTreatment->Visible) { // TemplateTreatment ?>
	<tr id="r_TemplateTreatment">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_TemplateTreatment"><script id="tpc_ivf_otherprocedure_TemplateTreatment" type="text/html"><?php echo $ivf_otherprocedure_view->TemplateTreatment->caption() ?></script></span></td>
		<td data-name="TemplateTreatment" <?php echo $ivf_otherprocedure_view->TemplateTreatment->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_TemplateTreatment" type="text/html"><span id="el_ivf_otherprocedure_TemplateTreatment">
<span<?php echo $ivf_otherprocedure_view->TemplateTreatment->viewAttributes() ?>><?php echo $ivf_otherprocedure_view->TemplateTreatment->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure_view->TemplateOperation->Visible) { // TemplateOperation ?>
	<tr id="r_TemplateOperation">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_TemplateOperation"><script id="tpc_ivf_otherprocedure_TemplateOperation" type="text/html"><?php echo $ivf_otherprocedure_view->TemplateOperation->caption() ?></script></span></td>
		<td data-name="TemplateOperation" <?php echo $ivf_otherprocedure_view->TemplateOperation->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_TemplateOperation" type="text/html"><span id="el_ivf_otherprocedure_TemplateOperation">
<span<?php echo $ivf_otherprocedure_view->TemplateOperation->viewAttributes() ?>><?php echo $ivf_otherprocedure_view->TemplateOperation->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure_view->TemplateFollowUpAdvice->Visible) { // TemplateFollowUpAdvice ?>
	<tr id="r_TemplateFollowUpAdvice">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_TemplateFollowUpAdvice"><script id="tpc_ivf_otherprocedure_TemplateFollowUpAdvice" type="text/html"><?php echo $ivf_otherprocedure_view->TemplateFollowUpAdvice->caption() ?></script></span></td>
		<td data-name="TemplateFollowUpAdvice" <?php echo $ivf_otherprocedure_view->TemplateFollowUpAdvice->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_TemplateFollowUpAdvice" type="text/html"><span id="el_ivf_otherprocedure_TemplateFollowUpAdvice">
<span<?php echo $ivf_otherprocedure_view->TemplateFollowUpAdvice->viewAttributes() ?>><?php echo $ivf_otherprocedure_view->TemplateFollowUpAdvice->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure_view->TemplateFollowUpMedication->Visible) { // TemplateFollowUpMedication ?>
	<tr id="r_TemplateFollowUpMedication">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_TemplateFollowUpMedication"><script id="tpc_ivf_otherprocedure_TemplateFollowUpMedication" type="text/html"><?php echo $ivf_otherprocedure_view->TemplateFollowUpMedication->caption() ?></script></span></td>
		<td data-name="TemplateFollowUpMedication" <?php echo $ivf_otherprocedure_view->TemplateFollowUpMedication->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_TemplateFollowUpMedication" type="text/html"><span id="el_ivf_otherprocedure_TemplateFollowUpMedication">
<span<?php echo $ivf_otherprocedure_view->TemplateFollowUpMedication->viewAttributes() ?>><?php echo $ivf_otherprocedure_view->TemplateFollowUpMedication->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure_view->TemplatePlan->Visible) { // TemplatePlan ?>
	<tr id="r_TemplatePlan">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_TemplatePlan"><script id="tpc_ivf_otherprocedure_TemplatePlan" type="text/html"><?php echo $ivf_otherprocedure_view->TemplatePlan->caption() ?></script></span></td>
		<td data-name="TemplatePlan" <?php echo $ivf_otherprocedure_view->TemplatePlan->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_TemplatePlan" type="text/html"><span id="el_ivf_otherprocedure_TemplatePlan">
<span<?php echo $ivf_otherprocedure_view->TemplatePlan->viewAttributes() ?>><?php echo $ivf_otherprocedure_view->TemplatePlan->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure_view->QRCode->Visible) { // QRCode ?>
	<tr id="r_QRCode">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_QRCode"><script id="tpc_ivf_otherprocedure_QRCode" type="text/html"><?php echo $ivf_otherprocedure_view->QRCode->caption() ?></script></span></td>
		<td data-name="QRCode" <?php echo $ivf_otherprocedure_view->QRCode->cellAttributes() ?>>
<script id="orig_ivf_otherprocedure_QRCode" class="ivf_otherprocedureview" type="text/html">
<?php echo $ivf_otherprocedure_view->QRCode->getViewValue() ?>
</script><script id="tpx_ivf_otherprocedure_QRCode" class="ivf_otherprocedureview" type="text/html">
<?php echo Barcode()->show($ivf_otherprocedure_view->RIDNO->CurrentValue, 'QRCODE', 80) ?>
</script>
<script id="tpx_ivf_otherprocedure_QRCode" type="text/html"><span id="el_ivf_otherprocedure_QRCode">
<span<?php echo $ivf_otherprocedure_view->QRCode->viewAttributes() ?>>{{include tmpl=~getTemplate("#tpx_ivf_otherprocedure_QRCode")/}}</span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure_view->TidNo->Visible) { // TidNo ?>
	<tr id="r_TidNo">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_TidNo"><script id="tpc_ivf_otherprocedure_TidNo" type="text/html"><?php echo $ivf_otherprocedure_view->TidNo->caption() ?></script></span></td>
		<td data-name="TidNo" <?php echo $ivf_otherprocedure_view->TidNo->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_TidNo" type="text/html"><span id="el_ivf_otherprocedure_TidNo">
<span<?php echo $ivf_otherprocedure_view->TidNo->viewAttributes() ?>><?php echo $ivf_otherprocedure_view->TidNo->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_ivf_otherprocedureview" class="ew-custom-template"></div>
<script id="tpm_ivf_otherprocedureview" type="text/html">
<div id="ct_ivf_otherprocedure_view"><style>
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
$dbhelper = &DbHelper();
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
{{include tmpl="#tpc_ivf_otherprocedure_RIDNO"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_otherprocedure_RIDNO")/}}
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
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Patient</h3>
			</div>
			<div class="card-body">
				 <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_otherprocedure_DateofAdmission"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_otherprocedure_DateofAdmission")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_otherprocedure_DateofProcedure"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_otherprocedure_DateofProcedure")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_otherprocedure_DateofDischarge"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_otherprocedure_DateofDischarge")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_otherprocedure_ProcedureDone"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_otherprocedure_ProcedureDone")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_otherprocedure_Consultant"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_otherprocedure_Consultant")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_otherprocedure_Surgeon"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_otherprocedure_Surgeon")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_otherprocedure_Anesthetist"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_otherprocedure_Anesthetist")/}}</span>
				  </div>
				<div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_otherprocedure_InvestigationReport"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_otherprocedure_InvestigationReport")/}}</span>
				  </div>
				  <div class="ew-row">
				  {{include tmpl="#tpc_ivf_otherprocedure_TempleteFinalDiagnosis"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_otherprocedure_TempleteFinalDiagnosis")/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_otherprocedure_FinalDiagnosis"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_otherprocedure_FinalDiagnosis")/}}</span>
				  </div>
				  <div class="ew-row">
				  {{include tmpl="#tpc_ivf_otherprocedure_TemplateTreatment"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_otherprocedure_TemplateTreatment")/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_otherprocedure_Treatment"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_otherprocedure_Treatment")/}}</span>
				  </div>
				  <div class="ew-row">
				  {{include tmpl="#tpc_ivf_otherprocedure_TemplateOperation"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_otherprocedure_TemplateOperation")/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_otherprocedure_DetailOfOperation"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_otherprocedure_DetailOfOperation")/}}</span>
				  </div>
				  <div class="ew-row">
				  {{include tmpl="#tpc_ivf_otherprocedure_TemplateFollowUpAdvice"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_otherprocedure_TemplateFollowUpAdvice")/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_otherprocedure_FollowUpAdvice"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_otherprocedure_FollowUpAdvice")/}}</span>
				  </div>
				  <div class="ew-row">
				  {{include tmpl="#tpc_ivf_otherprocedure_TemplateFollowUpMedication"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_otherprocedure_TemplateFollowUpMedication")/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_otherprocedure_FollowUpMedication"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_otherprocedure_FollowUpMedication")/}}</span>
				  </div>
				  <div class="ew-row">
				  {{include tmpl="#tpc_ivf_otherprocedure_TemplatePlan"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_otherprocedure_TemplatePlan")/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_otherprocedure_Plan"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_otherprocedure_Plan")/}}</span>
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
	ew.templateData = { rows: <?php echo JsonEncode($ivf_otherprocedure->Rows) ?> };
	ew.applyTemplate("tpd_ivf_otherprocedureview", "tpm_ivf_otherprocedureview", "ivf_otherprocedureview", "<?php echo $ivf_otherprocedure->CustomExport ?>", ew.templateData.rows[0]);
	$("script.ivf_otherprocedureview_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$ivf_otherprocedure_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$ivf_otherprocedure_view->isExport()) { ?>
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
$ivf_otherprocedure_view->terminate();
?>