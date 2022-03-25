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
$patient_an_registration_view = new patient_an_registration_view();

// Run the page
$patient_an_registration_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_an_registration_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$patient_an_registration_view->isExport()) { ?>
<script>
var fpatient_an_registrationview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fpatient_an_registrationview = currentForm = new ew.Form("fpatient_an_registrationview", "view");
	loadjs.done("fpatient_an_registrationview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$patient_an_registration_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $patient_an_registration_view->ExportOptions->render("body") ?>
<?php $patient_an_registration_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $patient_an_registration_view->showPageHeader(); ?>
<?php
$patient_an_registration_view->showMessage();
?>
<form name="fpatient_an_registrationview" id="fpatient_an_registrationview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_an_registration">
<input type="hidden" name="modal" value="<?php echo (int)$patient_an_registration_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($patient_an_registration_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_id"><script id="tpc_patient_an_registration_id" type="text/html"><?php echo $patient_an_registration_view->id->caption() ?></script></span></td>
		<td data-name="id" <?php echo $patient_an_registration_view->id->cellAttributes() ?>>
<script id="tpx_patient_an_registration_id" type="text/html"><span id="el_patient_an_registration_id">
<span<?php echo $patient_an_registration_view->id->viewAttributes() ?>><?php echo $patient_an_registration_view->id->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->pid->Visible) { // pid ?>
	<tr id="r_pid">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_pid"><script id="tpc_patient_an_registration_pid" type="text/html"><?php echo $patient_an_registration_view->pid->caption() ?></script></span></td>
		<td data-name="pid" <?php echo $patient_an_registration_view->pid->cellAttributes() ?>>
<script id="tpx_patient_an_registration_pid" type="text/html"><span id="el_patient_an_registration_pid">
<span<?php echo $patient_an_registration_view->pid->viewAttributes() ?>><?php echo $patient_an_registration_view->pid->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->fid->Visible) { // fid ?>
	<tr id="r_fid">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_fid"><script id="tpc_patient_an_registration_fid" type="text/html"><?php echo $patient_an_registration_view->fid->caption() ?></script></span></td>
		<td data-name="fid" <?php echo $patient_an_registration_view->fid->cellAttributes() ?>>
<script id="tpx_patient_an_registration_fid" type="text/html"><span id="el_patient_an_registration_fid">
<span<?php echo $patient_an_registration_view->fid->viewAttributes() ?>><?php echo $patient_an_registration_view->fid->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->G->Visible) { // G ?>
	<tr id="r_G">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_G"><script id="tpc_patient_an_registration_G" type="text/html"><?php echo $patient_an_registration_view->G->caption() ?></script></span></td>
		<td data-name="G" <?php echo $patient_an_registration_view->G->cellAttributes() ?>>
<script id="tpx_patient_an_registration_G" type="text/html"><span id="el_patient_an_registration_G">
<span<?php echo $patient_an_registration_view->G->viewAttributes() ?>><?php echo $patient_an_registration_view->G->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->P->Visible) { // P ?>
	<tr id="r_P">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_P"><script id="tpc_patient_an_registration_P" type="text/html"><?php echo $patient_an_registration_view->P->caption() ?></script></span></td>
		<td data-name="P" <?php echo $patient_an_registration_view->P->cellAttributes() ?>>
<script id="tpx_patient_an_registration_P" type="text/html"><span id="el_patient_an_registration_P">
<span<?php echo $patient_an_registration_view->P->viewAttributes() ?>><?php echo $patient_an_registration_view->P->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->L->Visible) { // L ?>
	<tr id="r_L">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_L"><script id="tpc_patient_an_registration_L" type="text/html"><?php echo $patient_an_registration_view->L->caption() ?></script></span></td>
		<td data-name="L" <?php echo $patient_an_registration_view->L->cellAttributes() ?>>
<script id="tpx_patient_an_registration_L" type="text/html"><span id="el_patient_an_registration_L">
<span<?php echo $patient_an_registration_view->L->viewAttributes() ?>><?php echo $patient_an_registration_view->L->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->A->Visible) { // A ?>
	<tr id="r_A">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_A"><script id="tpc_patient_an_registration_A" type="text/html"><?php echo $patient_an_registration_view->A->caption() ?></script></span></td>
		<td data-name="A" <?php echo $patient_an_registration_view->A->cellAttributes() ?>>
<script id="tpx_patient_an_registration_A" type="text/html"><span id="el_patient_an_registration_A">
<span<?php echo $patient_an_registration_view->A->viewAttributes() ?>><?php echo $patient_an_registration_view->A->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->E->Visible) { // E ?>
	<tr id="r_E">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_E"><script id="tpc_patient_an_registration_E" type="text/html"><?php echo $patient_an_registration_view->E->caption() ?></script></span></td>
		<td data-name="E" <?php echo $patient_an_registration_view->E->cellAttributes() ?>>
<script id="tpx_patient_an_registration_E" type="text/html"><span id="el_patient_an_registration_E">
<span<?php echo $patient_an_registration_view->E->viewAttributes() ?>><?php echo $patient_an_registration_view->E->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->M->Visible) { // M ?>
	<tr id="r_M">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_M"><script id="tpc_patient_an_registration_M" type="text/html"><?php echo $patient_an_registration_view->M->caption() ?></script></span></td>
		<td data-name="M" <?php echo $patient_an_registration_view->M->cellAttributes() ?>>
<script id="tpx_patient_an_registration_M" type="text/html"><span id="el_patient_an_registration_M">
<span<?php echo $patient_an_registration_view->M->viewAttributes() ?>><?php echo $patient_an_registration_view->M->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->LMP->Visible) { // LMP ?>
	<tr id="r_LMP">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_LMP"><script id="tpc_patient_an_registration_LMP" type="text/html"><?php echo $patient_an_registration_view->LMP->caption() ?></script></span></td>
		<td data-name="LMP" <?php echo $patient_an_registration_view->LMP->cellAttributes() ?>>
<script id="tpx_patient_an_registration_LMP" type="text/html"><span id="el_patient_an_registration_LMP">
<span<?php echo $patient_an_registration_view->LMP->viewAttributes() ?>><?php echo $patient_an_registration_view->LMP->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->EDO->Visible) { // EDO ?>
	<tr id="r_EDO">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_EDO"><script id="tpc_patient_an_registration_EDO" type="text/html"><?php echo $patient_an_registration_view->EDO->caption() ?></script></span></td>
		<td data-name="EDO" <?php echo $patient_an_registration_view->EDO->cellAttributes() ?>>
<script id="tpx_patient_an_registration_EDO" type="text/html"><span id="el_patient_an_registration_EDO">
<span<?php echo $patient_an_registration_view->EDO->viewAttributes() ?>><?php echo $patient_an_registration_view->EDO->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->MenstrualHistory->Visible) { // MenstrualHistory ?>
	<tr id="r_MenstrualHistory">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_MenstrualHistory"><script id="tpc_patient_an_registration_MenstrualHistory" type="text/html"><?php echo $patient_an_registration_view->MenstrualHistory->caption() ?></script></span></td>
		<td data-name="MenstrualHistory" <?php echo $patient_an_registration_view->MenstrualHistory->cellAttributes() ?>>
<script id="tpx_patient_an_registration_MenstrualHistory" type="text/html"><span id="el_patient_an_registration_MenstrualHistory">
<span<?php echo $patient_an_registration_view->MenstrualHistory->viewAttributes() ?>><?php echo $patient_an_registration_view->MenstrualHistory->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->MaritalHistory->Visible) { // MaritalHistory ?>
	<tr id="r_MaritalHistory">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_MaritalHistory"><script id="tpc_patient_an_registration_MaritalHistory" type="text/html"><?php echo $patient_an_registration_view->MaritalHistory->caption() ?></script></span></td>
		<td data-name="MaritalHistory" <?php echo $patient_an_registration_view->MaritalHistory->cellAttributes() ?>>
<script id="tpx_patient_an_registration_MaritalHistory" type="text/html"><span id="el_patient_an_registration_MaritalHistory">
<span<?php echo $patient_an_registration_view->MaritalHistory->viewAttributes() ?>><?php echo $patient_an_registration_view->MaritalHistory->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->ObstetricHistory->Visible) { // ObstetricHistory ?>
	<tr id="r_ObstetricHistory">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ObstetricHistory"><script id="tpc_patient_an_registration_ObstetricHistory" type="text/html"><?php echo $patient_an_registration_view->ObstetricHistory->caption() ?></script></span></td>
		<td data-name="ObstetricHistory" <?php echo $patient_an_registration_view->ObstetricHistory->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ObstetricHistory" type="text/html"><span id="el_patient_an_registration_ObstetricHistory">
<span<?php echo $patient_an_registration_view->ObstetricHistory->viewAttributes() ?>><?php echo $patient_an_registration_view->ObstetricHistory->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->PreviousHistoryofGDM->Visible) { // PreviousHistoryofGDM ?>
	<tr id="r_PreviousHistoryofGDM">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_PreviousHistoryofGDM"><script id="tpc_patient_an_registration_PreviousHistoryofGDM" type="text/html"><?php echo $patient_an_registration_view->PreviousHistoryofGDM->caption() ?></script></span></td>
		<td data-name="PreviousHistoryofGDM" <?php echo $patient_an_registration_view->PreviousHistoryofGDM->cellAttributes() ?>>
<script id="tpx_patient_an_registration_PreviousHistoryofGDM" type="text/html"><span id="el_patient_an_registration_PreviousHistoryofGDM">
<span<?php echo $patient_an_registration_view->PreviousHistoryofGDM->viewAttributes() ?>><?php echo $patient_an_registration_view->PreviousHistoryofGDM->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->PreviousHistorofPIH->Visible) { // PreviousHistorofPIH ?>
	<tr id="r_PreviousHistorofPIH">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_PreviousHistorofPIH"><script id="tpc_patient_an_registration_PreviousHistorofPIH" type="text/html"><?php echo $patient_an_registration_view->PreviousHistorofPIH->caption() ?></script></span></td>
		<td data-name="PreviousHistorofPIH" <?php echo $patient_an_registration_view->PreviousHistorofPIH->cellAttributes() ?>>
<script id="tpx_patient_an_registration_PreviousHistorofPIH" type="text/html"><span id="el_patient_an_registration_PreviousHistorofPIH">
<span<?php echo $patient_an_registration_view->PreviousHistorofPIH->viewAttributes() ?>><?php echo $patient_an_registration_view->PreviousHistorofPIH->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->PreviousHistoryofIUGR->Visible) { // PreviousHistoryofIUGR ?>
	<tr id="r_PreviousHistoryofIUGR">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_PreviousHistoryofIUGR"><script id="tpc_patient_an_registration_PreviousHistoryofIUGR" type="text/html"><?php echo $patient_an_registration_view->PreviousHistoryofIUGR->caption() ?></script></span></td>
		<td data-name="PreviousHistoryofIUGR" <?php echo $patient_an_registration_view->PreviousHistoryofIUGR->cellAttributes() ?>>
<script id="tpx_patient_an_registration_PreviousHistoryofIUGR" type="text/html"><span id="el_patient_an_registration_PreviousHistoryofIUGR">
<span<?php echo $patient_an_registration_view->PreviousHistoryofIUGR->viewAttributes() ?>><?php echo $patient_an_registration_view->PreviousHistoryofIUGR->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->PreviousHistoryofOligohydramnios->Visible) { // PreviousHistoryofOligohydramnios ?>
	<tr id="r_PreviousHistoryofOligohydramnios">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_PreviousHistoryofOligohydramnios"><script id="tpc_patient_an_registration_PreviousHistoryofOligohydramnios" type="text/html"><?php echo $patient_an_registration_view->PreviousHistoryofOligohydramnios->caption() ?></script></span></td>
		<td data-name="PreviousHistoryofOligohydramnios" <?php echo $patient_an_registration_view->PreviousHistoryofOligohydramnios->cellAttributes() ?>>
<script id="tpx_patient_an_registration_PreviousHistoryofOligohydramnios" type="text/html"><span id="el_patient_an_registration_PreviousHistoryofOligohydramnios">
<span<?php echo $patient_an_registration_view->PreviousHistoryofOligohydramnios->viewAttributes() ?>><?php echo $patient_an_registration_view->PreviousHistoryofOligohydramnios->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->PreviousHistoryofPreterm->Visible) { // PreviousHistoryofPreterm ?>
	<tr id="r_PreviousHistoryofPreterm">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_PreviousHistoryofPreterm"><script id="tpc_patient_an_registration_PreviousHistoryofPreterm" type="text/html"><?php echo $patient_an_registration_view->PreviousHistoryofPreterm->caption() ?></script></span></td>
		<td data-name="PreviousHistoryofPreterm" <?php echo $patient_an_registration_view->PreviousHistoryofPreterm->cellAttributes() ?>>
<script id="tpx_patient_an_registration_PreviousHistoryofPreterm" type="text/html"><span id="el_patient_an_registration_PreviousHistoryofPreterm">
<span<?php echo $patient_an_registration_view->PreviousHistoryofPreterm->viewAttributes() ?>><?php echo $patient_an_registration_view->PreviousHistoryofPreterm->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->G1->Visible) { // G1 ?>
	<tr id="r_G1">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_G1"><script id="tpc_patient_an_registration_G1" type="text/html"><?php echo $patient_an_registration_view->G1->caption() ?></script></span></td>
		<td data-name="G1" <?php echo $patient_an_registration_view->G1->cellAttributes() ?>>
<script id="tpx_patient_an_registration_G1" type="text/html"><span id="el_patient_an_registration_G1">
<span<?php echo $patient_an_registration_view->G1->viewAttributes() ?>><?php echo $patient_an_registration_view->G1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->G2->Visible) { // G2 ?>
	<tr id="r_G2">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_G2"><script id="tpc_patient_an_registration_G2" type="text/html"><?php echo $patient_an_registration_view->G2->caption() ?></script></span></td>
		<td data-name="G2" <?php echo $patient_an_registration_view->G2->cellAttributes() ?>>
<script id="tpx_patient_an_registration_G2" type="text/html"><span id="el_patient_an_registration_G2">
<span<?php echo $patient_an_registration_view->G2->viewAttributes() ?>><?php echo $patient_an_registration_view->G2->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->G3->Visible) { // G3 ?>
	<tr id="r_G3">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_G3"><script id="tpc_patient_an_registration_G3" type="text/html"><?php echo $patient_an_registration_view->G3->caption() ?></script></span></td>
		<td data-name="G3" <?php echo $patient_an_registration_view->G3->cellAttributes() ?>>
<script id="tpx_patient_an_registration_G3" type="text/html"><span id="el_patient_an_registration_G3">
<span<?php echo $patient_an_registration_view->G3->viewAttributes() ?>><?php echo $patient_an_registration_view->G3->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->DeliveryNDLSCS1->Visible) { // DeliveryNDLSCS1 ?>
	<tr id="r_DeliveryNDLSCS1">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_DeliveryNDLSCS1"><script id="tpc_patient_an_registration_DeliveryNDLSCS1" type="text/html"><?php echo $patient_an_registration_view->DeliveryNDLSCS1->caption() ?></script></span></td>
		<td data-name="DeliveryNDLSCS1" <?php echo $patient_an_registration_view->DeliveryNDLSCS1->cellAttributes() ?>>
<script id="tpx_patient_an_registration_DeliveryNDLSCS1" type="text/html"><span id="el_patient_an_registration_DeliveryNDLSCS1">
<span<?php echo $patient_an_registration_view->DeliveryNDLSCS1->viewAttributes() ?>><?php echo $patient_an_registration_view->DeliveryNDLSCS1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->DeliveryNDLSCS2->Visible) { // DeliveryNDLSCS2 ?>
	<tr id="r_DeliveryNDLSCS2">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_DeliveryNDLSCS2"><script id="tpc_patient_an_registration_DeliveryNDLSCS2" type="text/html"><?php echo $patient_an_registration_view->DeliveryNDLSCS2->caption() ?></script></span></td>
		<td data-name="DeliveryNDLSCS2" <?php echo $patient_an_registration_view->DeliveryNDLSCS2->cellAttributes() ?>>
<script id="tpx_patient_an_registration_DeliveryNDLSCS2" type="text/html"><span id="el_patient_an_registration_DeliveryNDLSCS2">
<span<?php echo $patient_an_registration_view->DeliveryNDLSCS2->viewAttributes() ?>><?php echo $patient_an_registration_view->DeliveryNDLSCS2->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->DeliveryNDLSCS3->Visible) { // DeliveryNDLSCS3 ?>
	<tr id="r_DeliveryNDLSCS3">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_DeliveryNDLSCS3"><script id="tpc_patient_an_registration_DeliveryNDLSCS3" type="text/html"><?php echo $patient_an_registration_view->DeliveryNDLSCS3->caption() ?></script></span></td>
		<td data-name="DeliveryNDLSCS3" <?php echo $patient_an_registration_view->DeliveryNDLSCS3->cellAttributes() ?>>
<script id="tpx_patient_an_registration_DeliveryNDLSCS3" type="text/html"><span id="el_patient_an_registration_DeliveryNDLSCS3">
<span<?php echo $patient_an_registration_view->DeliveryNDLSCS3->viewAttributes() ?>><?php echo $patient_an_registration_view->DeliveryNDLSCS3->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->BabySexweight1->Visible) { // BabySexweight1 ?>
	<tr id="r_BabySexweight1">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_BabySexweight1"><script id="tpc_patient_an_registration_BabySexweight1" type="text/html"><?php echo $patient_an_registration_view->BabySexweight1->caption() ?></script></span></td>
		<td data-name="BabySexweight1" <?php echo $patient_an_registration_view->BabySexweight1->cellAttributes() ?>>
<script id="tpx_patient_an_registration_BabySexweight1" type="text/html"><span id="el_patient_an_registration_BabySexweight1">
<span<?php echo $patient_an_registration_view->BabySexweight1->viewAttributes() ?>><?php echo $patient_an_registration_view->BabySexweight1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->BabySexweight2->Visible) { // BabySexweight2 ?>
	<tr id="r_BabySexweight2">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_BabySexweight2"><script id="tpc_patient_an_registration_BabySexweight2" type="text/html"><?php echo $patient_an_registration_view->BabySexweight2->caption() ?></script></span></td>
		<td data-name="BabySexweight2" <?php echo $patient_an_registration_view->BabySexweight2->cellAttributes() ?>>
<script id="tpx_patient_an_registration_BabySexweight2" type="text/html"><span id="el_patient_an_registration_BabySexweight2">
<span<?php echo $patient_an_registration_view->BabySexweight2->viewAttributes() ?>><?php echo $patient_an_registration_view->BabySexweight2->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->BabySexweight3->Visible) { // BabySexweight3 ?>
	<tr id="r_BabySexweight3">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_BabySexweight3"><script id="tpc_patient_an_registration_BabySexweight3" type="text/html"><?php echo $patient_an_registration_view->BabySexweight3->caption() ?></script></span></td>
		<td data-name="BabySexweight3" <?php echo $patient_an_registration_view->BabySexweight3->cellAttributes() ?>>
<script id="tpx_patient_an_registration_BabySexweight3" type="text/html"><span id="el_patient_an_registration_BabySexweight3">
<span<?php echo $patient_an_registration_view->BabySexweight3->viewAttributes() ?>><?php echo $patient_an_registration_view->BabySexweight3->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->PastMedicalHistory->Visible) { // PastMedicalHistory ?>
	<tr id="r_PastMedicalHistory">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_PastMedicalHistory"><script id="tpc_patient_an_registration_PastMedicalHistory" type="text/html"><?php echo $patient_an_registration_view->PastMedicalHistory->caption() ?></script></span></td>
		<td data-name="PastMedicalHistory" <?php echo $patient_an_registration_view->PastMedicalHistory->cellAttributes() ?>>
<script id="tpx_patient_an_registration_PastMedicalHistory" type="text/html"><span id="el_patient_an_registration_PastMedicalHistory">
<span<?php echo $patient_an_registration_view->PastMedicalHistory->viewAttributes() ?>><?php echo $patient_an_registration_view->PastMedicalHistory->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->PastSurgicalHistory->Visible) { // PastSurgicalHistory ?>
	<tr id="r_PastSurgicalHistory">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_PastSurgicalHistory"><script id="tpc_patient_an_registration_PastSurgicalHistory" type="text/html"><?php echo $patient_an_registration_view->PastSurgicalHistory->caption() ?></script></span></td>
		<td data-name="PastSurgicalHistory" <?php echo $patient_an_registration_view->PastSurgicalHistory->cellAttributes() ?>>
<script id="tpx_patient_an_registration_PastSurgicalHistory" type="text/html"><span id="el_patient_an_registration_PastSurgicalHistory">
<span<?php echo $patient_an_registration_view->PastSurgicalHistory->viewAttributes() ?>><?php echo $patient_an_registration_view->PastSurgicalHistory->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->FamilyHistory->Visible) { // FamilyHistory ?>
	<tr id="r_FamilyHistory">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_FamilyHistory"><script id="tpc_patient_an_registration_FamilyHistory" type="text/html"><?php echo $patient_an_registration_view->FamilyHistory->caption() ?></script></span></td>
		<td data-name="FamilyHistory" <?php echo $patient_an_registration_view->FamilyHistory->cellAttributes() ?>>
<script id="tpx_patient_an_registration_FamilyHistory" type="text/html"><span id="el_patient_an_registration_FamilyHistory">
<span<?php echo $patient_an_registration_view->FamilyHistory->viewAttributes() ?>><?php echo $patient_an_registration_view->FamilyHistory->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->Viability->Visible) { // Viability ?>
	<tr id="r_Viability">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Viability"><script id="tpc_patient_an_registration_Viability" type="text/html"><?php echo $patient_an_registration_view->Viability->caption() ?></script></span></td>
		<td data-name="Viability" <?php echo $patient_an_registration_view->Viability->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Viability" type="text/html"><span id="el_patient_an_registration_Viability">
<span<?php echo $patient_an_registration_view->Viability->viewAttributes() ?>><?php echo $patient_an_registration_view->Viability->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->ViabilityDATE->Visible) { // ViabilityDATE ?>
	<tr id="r_ViabilityDATE">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ViabilityDATE"><script id="tpc_patient_an_registration_ViabilityDATE" type="text/html"><?php echo $patient_an_registration_view->ViabilityDATE->caption() ?></script></span></td>
		<td data-name="ViabilityDATE" <?php echo $patient_an_registration_view->ViabilityDATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ViabilityDATE" type="text/html"><span id="el_patient_an_registration_ViabilityDATE">
<span<?php echo $patient_an_registration_view->ViabilityDATE->viewAttributes() ?>><?php echo $patient_an_registration_view->ViabilityDATE->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->ViabilityREPORT->Visible) { // ViabilityREPORT ?>
	<tr id="r_ViabilityREPORT">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ViabilityREPORT"><script id="tpc_patient_an_registration_ViabilityREPORT" type="text/html"><?php echo $patient_an_registration_view->ViabilityREPORT->caption() ?></script></span></td>
		<td data-name="ViabilityREPORT" <?php echo $patient_an_registration_view->ViabilityREPORT->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ViabilityREPORT" type="text/html"><span id="el_patient_an_registration_ViabilityREPORT">
<span<?php echo $patient_an_registration_view->ViabilityREPORT->viewAttributes() ?>><?php echo $patient_an_registration_view->ViabilityREPORT->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->Viability2->Visible) { // Viability2 ?>
	<tr id="r_Viability2">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Viability2"><script id="tpc_patient_an_registration_Viability2" type="text/html"><?php echo $patient_an_registration_view->Viability2->caption() ?></script></span></td>
		<td data-name="Viability2" <?php echo $patient_an_registration_view->Viability2->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Viability2" type="text/html"><span id="el_patient_an_registration_Viability2">
<span<?php echo $patient_an_registration_view->Viability2->viewAttributes() ?>><?php echo $patient_an_registration_view->Viability2->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->Viability2DATE->Visible) { // Viability2DATE ?>
	<tr id="r_Viability2DATE">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Viability2DATE"><script id="tpc_patient_an_registration_Viability2DATE" type="text/html"><?php echo $patient_an_registration_view->Viability2DATE->caption() ?></script></span></td>
		<td data-name="Viability2DATE" <?php echo $patient_an_registration_view->Viability2DATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Viability2DATE" type="text/html"><span id="el_patient_an_registration_Viability2DATE">
<span<?php echo $patient_an_registration_view->Viability2DATE->viewAttributes() ?>><?php echo $patient_an_registration_view->Viability2DATE->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->Viability2REPORT->Visible) { // Viability2REPORT ?>
	<tr id="r_Viability2REPORT">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Viability2REPORT"><script id="tpc_patient_an_registration_Viability2REPORT" type="text/html"><?php echo $patient_an_registration_view->Viability2REPORT->caption() ?></script></span></td>
		<td data-name="Viability2REPORT" <?php echo $patient_an_registration_view->Viability2REPORT->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Viability2REPORT" type="text/html"><span id="el_patient_an_registration_Viability2REPORT">
<span<?php echo $patient_an_registration_view->Viability2REPORT->viewAttributes() ?>><?php echo $patient_an_registration_view->Viability2REPORT->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->NTscan->Visible) { // NTscan ?>
	<tr id="r_NTscan">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_NTscan"><script id="tpc_patient_an_registration_NTscan" type="text/html"><?php echo $patient_an_registration_view->NTscan->caption() ?></script></span></td>
		<td data-name="NTscan" <?php echo $patient_an_registration_view->NTscan->cellAttributes() ?>>
<script id="tpx_patient_an_registration_NTscan" type="text/html"><span id="el_patient_an_registration_NTscan">
<span<?php echo $patient_an_registration_view->NTscan->viewAttributes() ?>><?php echo $patient_an_registration_view->NTscan->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->NTscanDATE->Visible) { // NTscanDATE ?>
	<tr id="r_NTscanDATE">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_NTscanDATE"><script id="tpc_patient_an_registration_NTscanDATE" type="text/html"><?php echo $patient_an_registration_view->NTscanDATE->caption() ?></script></span></td>
		<td data-name="NTscanDATE" <?php echo $patient_an_registration_view->NTscanDATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_NTscanDATE" type="text/html"><span id="el_patient_an_registration_NTscanDATE">
<span<?php echo $patient_an_registration_view->NTscanDATE->viewAttributes() ?>><?php echo $patient_an_registration_view->NTscanDATE->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->NTscanREPORT->Visible) { // NTscanREPORT ?>
	<tr id="r_NTscanREPORT">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_NTscanREPORT"><script id="tpc_patient_an_registration_NTscanREPORT" type="text/html"><?php echo $patient_an_registration_view->NTscanREPORT->caption() ?></script></span></td>
		<td data-name="NTscanREPORT" <?php echo $patient_an_registration_view->NTscanREPORT->cellAttributes() ?>>
<script id="tpx_patient_an_registration_NTscanREPORT" type="text/html"><span id="el_patient_an_registration_NTscanREPORT">
<span<?php echo $patient_an_registration_view->NTscanREPORT->viewAttributes() ?>><?php echo $patient_an_registration_view->NTscanREPORT->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->EarlyTarget->Visible) { // EarlyTarget ?>
	<tr id="r_EarlyTarget">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_EarlyTarget"><script id="tpc_patient_an_registration_EarlyTarget" type="text/html"><?php echo $patient_an_registration_view->EarlyTarget->caption() ?></script></span></td>
		<td data-name="EarlyTarget" <?php echo $patient_an_registration_view->EarlyTarget->cellAttributes() ?>>
<script id="tpx_patient_an_registration_EarlyTarget" type="text/html"><span id="el_patient_an_registration_EarlyTarget">
<span<?php echo $patient_an_registration_view->EarlyTarget->viewAttributes() ?>><?php echo $patient_an_registration_view->EarlyTarget->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->EarlyTargetDATE->Visible) { // EarlyTargetDATE ?>
	<tr id="r_EarlyTargetDATE">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_EarlyTargetDATE"><script id="tpc_patient_an_registration_EarlyTargetDATE" type="text/html"><?php echo $patient_an_registration_view->EarlyTargetDATE->caption() ?></script></span></td>
		<td data-name="EarlyTargetDATE" <?php echo $patient_an_registration_view->EarlyTargetDATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_EarlyTargetDATE" type="text/html"><span id="el_patient_an_registration_EarlyTargetDATE">
<span<?php echo $patient_an_registration_view->EarlyTargetDATE->viewAttributes() ?>><?php echo $patient_an_registration_view->EarlyTargetDATE->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->EarlyTargetREPORT->Visible) { // EarlyTargetREPORT ?>
	<tr id="r_EarlyTargetREPORT">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_EarlyTargetREPORT"><script id="tpc_patient_an_registration_EarlyTargetREPORT" type="text/html"><?php echo $patient_an_registration_view->EarlyTargetREPORT->caption() ?></script></span></td>
		<td data-name="EarlyTargetREPORT" <?php echo $patient_an_registration_view->EarlyTargetREPORT->cellAttributes() ?>>
<script id="tpx_patient_an_registration_EarlyTargetREPORT" type="text/html"><span id="el_patient_an_registration_EarlyTargetREPORT">
<span<?php echo $patient_an_registration_view->EarlyTargetREPORT->viewAttributes() ?>><?php echo $patient_an_registration_view->EarlyTargetREPORT->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->Anomaly->Visible) { // Anomaly ?>
	<tr id="r_Anomaly">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Anomaly"><script id="tpc_patient_an_registration_Anomaly" type="text/html"><?php echo $patient_an_registration_view->Anomaly->caption() ?></script></span></td>
		<td data-name="Anomaly" <?php echo $patient_an_registration_view->Anomaly->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Anomaly" type="text/html"><span id="el_patient_an_registration_Anomaly">
<span<?php echo $patient_an_registration_view->Anomaly->viewAttributes() ?>><?php echo $patient_an_registration_view->Anomaly->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->AnomalyDATE->Visible) { // AnomalyDATE ?>
	<tr id="r_AnomalyDATE">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_AnomalyDATE"><script id="tpc_patient_an_registration_AnomalyDATE" type="text/html"><?php echo $patient_an_registration_view->AnomalyDATE->caption() ?></script></span></td>
		<td data-name="AnomalyDATE" <?php echo $patient_an_registration_view->AnomalyDATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_AnomalyDATE" type="text/html"><span id="el_patient_an_registration_AnomalyDATE">
<span<?php echo $patient_an_registration_view->AnomalyDATE->viewAttributes() ?>><?php echo $patient_an_registration_view->AnomalyDATE->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->AnomalyREPORT->Visible) { // AnomalyREPORT ?>
	<tr id="r_AnomalyREPORT">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_AnomalyREPORT"><script id="tpc_patient_an_registration_AnomalyREPORT" type="text/html"><?php echo $patient_an_registration_view->AnomalyREPORT->caption() ?></script></span></td>
		<td data-name="AnomalyREPORT" <?php echo $patient_an_registration_view->AnomalyREPORT->cellAttributes() ?>>
<script id="tpx_patient_an_registration_AnomalyREPORT" type="text/html"><span id="el_patient_an_registration_AnomalyREPORT">
<span<?php echo $patient_an_registration_view->AnomalyREPORT->viewAttributes() ?>><?php echo $patient_an_registration_view->AnomalyREPORT->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->Growth->Visible) { // Growth ?>
	<tr id="r_Growth">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Growth"><script id="tpc_patient_an_registration_Growth" type="text/html"><?php echo $patient_an_registration_view->Growth->caption() ?></script></span></td>
		<td data-name="Growth" <?php echo $patient_an_registration_view->Growth->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Growth" type="text/html"><span id="el_patient_an_registration_Growth">
<span<?php echo $patient_an_registration_view->Growth->viewAttributes() ?>><?php echo $patient_an_registration_view->Growth->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->GrowthDATE->Visible) { // GrowthDATE ?>
	<tr id="r_GrowthDATE">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_GrowthDATE"><script id="tpc_patient_an_registration_GrowthDATE" type="text/html"><?php echo $patient_an_registration_view->GrowthDATE->caption() ?></script></span></td>
		<td data-name="GrowthDATE" <?php echo $patient_an_registration_view->GrowthDATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_GrowthDATE" type="text/html"><span id="el_patient_an_registration_GrowthDATE">
<span<?php echo $patient_an_registration_view->GrowthDATE->viewAttributes() ?>><?php echo $patient_an_registration_view->GrowthDATE->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->GrowthREPORT->Visible) { // GrowthREPORT ?>
	<tr id="r_GrowthREPORT">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_GrowthREPORT"><script id="tpc_patient_an_registration_GrowthREPORT" type="text/html"><?php echo $patient_an_registration_view->GrowthREPORT->caption() ?></script></span></td>
		<td data-name="GrowthREPORT" <?php echo $patient_an_registration_view->GrowthREPORT->cellAttributes() ?>>
<script id="tpx_patient_an_registration_GrowthREPORT" type="text/html"><span id="el_patient_an_registration_GrowthREPORT">
<span<?php echo $patient_an_registration_view->GrowthREPORT->viewAttributes() ?>><?php echo $patient_an_registration_view->GrowthREPORT->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->Growth1->Visible) { // Growth1 ?>
	<tr id="r_Growth1">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Growth1"><script id="tpc_patient_an_registration_Growth1" type="text/html"><?php echo $patient_an_registration_view->Growth1->caption() ?></script></span></td>
		<td data-name="Growth1" <?php echo $patient_an_registration_view->Growth1->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Growth1" type="text/html"><span id="el_patient_an_registration_Growth1">
<span<?php echo $patient_an_registration_view->Growth1->viewAttributes() ?>><?php echo $patient_an_registration_view->Growth1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->Growth1DATE->Visible) { // Growth1DATE ?>
	<tr id="r_Growth1DATE">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Growth1DATE"><script id="tpc_patient_an_registration_Growth1DATE" type="text/html"><?php echo $patient_an_registration_view->Growth1DATE->caption() ?></script></span></td>
		<td data-name="Growth1DATE" <?php echo $patient_an_registration_view->Growth1DATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Growth1DATE" type="text/html"><span id="el_patient_an_registration_Growth1DATE">
<span<?php echo $patient_an_registration_view->Growth1DATE->viewAttributes() ?>><?php echo $patient_an_registration_view->Growth1DATE->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->Growth1REPORT->Visible) { // Growth1REPORT ?>
	<tr id="r_Growth1REPORT">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Growth1REPORT"><script id="tpc_patient_an_registration_Growth1REPORT" type="text/html"><?php echo $patient_an_registration_view->Growth1REPORT->caption() ?></script></span></td>
		<td data-name="Growth1REPORT" <?php echo $patient_an_registration_view->Growth1REPORT->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Growth1REPORT" type="text/html"><span id="el_patient_an_registration_Growth1REPORT">
<span<?php echo $patient_an_registration_view->Growth1REPORT->viewAttributes() ?>><?php echo $patient_an_registration_view->Growth1REPORT->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->ANProfile->Visible) { // ANProfile ?>
	<tr id="r_ANProfile">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ANProfile"><script id="tpc_patient_an_registration_ANProfile" type="text/html"><?php echo $patient_an_registration_view->ANProfile->caption() ?></script></span></td>
		<td data-name="ANProfile" <?php echo $patient_an_registration_view->ANProfile->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ANProfile" type="text/html"><span id="el_patient_an_registration_ANProfile">
<span<?php echo $patient_an_registration_view->ANProfile->viewAttributes() ?>><?php echo $patient_an_registration_view->ANProfile->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->ANProfileDATE->Visible) { // ANProfileDATE ?>
	<tr id="r_ANProfileDATE">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ANProfileDATE"><script id="tpc_patient_an_registration_ANProfileDATE" type="text/html"><?php echo $patient_an_registration_view->ANProfileDATE->caption() ?></script></span></td>
		<td data-name="ANProfileDATE" <?php echo $patient_an_registration_view->ANProfileDATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ANProfileDATE" type="text/html"><span id="el_patient_an_registration_ANProfileDATE">
<span<?php echo $patient_an_registration_view->ANProfileDATE->viewAttributes() ?>><?php echo $patient_an_registration_view->ANProfileDATE->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->ANProfileINHOUSE->Visible) { // ANProfileINHOUSE ?>
	<tr id="r_ANProfileINHOUSE">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ANProfileINHOUSE"><script id="tpc_patient_an_registration_ANProfileINHOUSE" type="text/html"><?php echo $patient_an_registration_view->ANProfileINHOUSE->caption() ?></script></span></td>
		<td data-name="ANProfileINHOUSE" <?php echo $patient_an_registration_view->ANProfileINHOUSE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ANProfileINHOUSE" type="text/html"><span id="el_patient_an_registration_ANProfileINHOUSE">
<span<?php echo $patient_an_registration_view->ANProfileINHOUSE->viewAttributes() ?>><?php echo $patient_an_registration_view->ANProfileINHOUSE->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->ANProfileREPORT->Visible) { // ANProfileREPORT ?>
	<tr id="r_ANProfileREPORT">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ANProfileREPORT"><script id="tpc_patient_an_registration_ANProfileREPORT" type="text/html"><?php echo $patient_an_registration_view->ANProfileREPORT->caption() ?></script></span></td>
		<td data-name="ANProfileREPORT" <?php echo $patient_an_registration_view->ANProfileREPORT->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ANProfileREPORT" type="text/html"><span id="el_patient_an_registration_ANProfileREPORT">
<span<?php echo $patient_an_registration_view->ANProfileREPORT->viewAttributes() ?>><?php echo $patient_an_registration_view->ANProfileREPORT->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->DualMarker->Visible) { // DualMarker ?>
	<tr id="r_DualMarker">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_DualMarker"><script id="tpc_patient_an_registration_DualMarker" type="text/html"><?php echo $patient_an_registration_view->DualMarker->caption() ?></script></span></td>
		<td data-name="DualMarker" <?php echo $patient_an_registration_view->DualMarker->cellAttributes() ?>>
<script id="tpx_patient_an_registration_DualMarker" type="text/html"><span id="el_patient_an_registration_DualMarker">
<span<?php echo $patient_an_registration_view->DualMarker->viewAttributes() ?>><?php echo $patient_an_registration_view->DualMarker->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->DualMarkerDATE->Visible) { // DualMarkerDATE ?>
	<tr id="r_DualMarkerDATE">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_DualMarkerDATE"><script id="tpc_patient_an_registration_DualMarkerDATE" type="text/html"><?php echo $patient_an_registration_view->DualMarkerDATE->caption() ?></script></span></td>
		<td data-name="DualMarkerDATE" <?php echo $patient_an_registration_view->DualMarkerDATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_DualMarkerDATE" type="text/html"><span id="el_patient_an_registration_DualMarkerDATE">
<span<?php echo $patient_an_registration_view->DualMarkerDATE->viewAttributes() ?>><?php echo $patient_an_registration_view->DualMarkerDATE->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->DualMarkerINHOUSE->Visible) { // DualMarkerINHOUSE ?>
	<tr id="r_DualMarkerINHOUSE">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_DualMarkerINHOUSE"><script id="tpc_patient_an_registration_DualMarkerINHOUSE" type="text/html"><?php echo $patient_an_registration_view->DualMarkerINHOUSE->caption() ?></script></span></td>
		<td data-name="DualMarkerINHOUSE" <?php echo $patient_an_registration_view->DualMarkerINHOUSE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_DualMarkerINHOUSE" type="text/html"><span id="el_patient_an_registration_DualMarkerINHOUSE">
<span<?php echo $patient_an_registration_view->DualMarkerINHOUSE->viewAttributes() ?>><?php echo $patient_an_registration_view->DualMarkerINHOUSE->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->DualMarkerREPORT->Visible) { // DualMarkerREPORT ?>
	<tr id="r_DualMarkerREPORT">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_DualMarkerREPORT"><script id="tpc_patient_an_registration_DualMarkerREPORT" type="text/html"><?php echo $patient_an_registration_view->DualMarkerREPORT->caption() ?></script></span></td>
		<td data-name="DualMarkerREPORT" <?php echo $patient_an_registration_view->DualMarkerREPORT->cellAttributes() ?>>
<script id="tpx_patient_an_registration_DualMarkerREPORT" type="text/html"><span id="el_patient_an_registration_DualMarkerREPORT">
<span<?php echo $patient_an_registration_view->DualMarkerREPORT->viewAttributes() ?>><?php echo $patient_an_registration_view->DualMarkerREPORT->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->Quadruple->Visible) { // Quadruple ?>
	<tr id="r_Quadruple">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Quadruple"><script id="tpc_patient_an_registration_Quadruple" type="text/html"><?php echo $patient_an_registration_view->Quadruple->caption() ?></script></span></td>
		<td data-name="Quadruple" <?php echo $patient_an_registration_view->Quadruple->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Quadruple" type="text/html"><span id="el_patient_an_registration_Quadruple">
<span<?php echo $patient_an_registration_view->Quadruple->viewAttributes() ?>><?php echo $patient_an_registration_view->Quadruple->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->QuadrupleDATE->Visible) { // QuadrupleDATE ?>
	<tr id="r_QuadrupleDATE">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_QuadrupleDATE"><script id="tpc_patient_an_registration_QuadrupleDATE" type="text/html"><?php echo $patient_an_registration_view->QuadrupleDATE->caption() ?></script></span></td>
		<td data-name="QuadrupleDATE" <?php echo $patient_an_registration_view->QuadrupleDATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_QuadrupleDATE" type="text/html"><span id="el_patient_an_registration_QuadrupleDATE">
<span<?php echo $patient_an_registration_view->QuadrupleDATE->viewAttributes() ?>><?php echo $patient_an_registration_view->QuadrupleDATE->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->QuadrupleINHOUSE->Visible) { // QuadrupleINHOUSE ?>
	<tr id="r_QuadrupleINHOUSE">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_QuadrupleINHOUSE"><script id="tpc_patient_an_registration_QuadrupleINHOUSE" type="text/html"><?php echo $patient_an_registration_view->QuadrupleINHOUSE->caption() ?></script></span></td>
		<td data-name="QuadrupleINHOUSE" <?php echo $patient_an_registration_view->QuadrupleINHOUSE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_QuadrupleINHOUSE" type="text/html"><span id="el_patient_an_registration_QuadrupleINHOUSE">
<span<?php echo $patient_an_registration_view->QuadrupleINHOUSE->viewAttributes() ?>><?php echo $patient_an_registration_view->QuadrupleINHOUSE->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->QuadrupleREPORT->Visible) { // QuadrupleREPORT ?>
	<tr id="r_QuadrupleREPORT">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_QuadrupleREPORT"><script id="tpc_patient_an_registration_QuadrupleREPORT" type="text/html"><?php echo $patient_an_registration_view->QuadrupleREPORT->caption() ?></script></span></td>
		<td data-name="QuadrupleREPORT" <?php echo $patient_an_registration_view->QuadrupleREPORT->cellAttributes() ?>>
<script id="tpx_patient_an_registration_QuadrupleREPORT" type="text/html"><span id="el_patient_an_registration_QuadrupleREPORT">
<span<?php echo $patient_an_registration_view->QuadrupleREPORT->viewAttributes() ?>><?php echo $patient_an_registration_view->QuadrupleREPORT->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->A5month->Visible) { // A5month ?>
	<tr id="r_A5month">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_A5month"><script id="tpc_patient_an_registration_A5month" type="text/html"><?php echo $patient_an_registration_view->A5month->caption() ?></script></span></td>
		<td data-name="A5month" <?php echo $patient_an_registration_view->A5month->cellAttributes() ?>>
<script id="tpx_patient_an_registration_A5month" type="text/html"><span id="el_patient_an_registration_A5month">
<span<?php echo $patient_an_registration_view->A5month->viewAttributes() ?>><?php echo $patient_an_registration_view->A5month->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->A5monthDATE->Visible) { // A5monthDATE ?>
	<tr id="r_A5monthDATE">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_A5monthDATE"><script id="tpc_patient_an_registration_A5monthDATE" type="text/html"><?php echo $patient_an_registration_view->A5monthDATE->caption() ?></script></span></td>
		<td data-name="A5monthDATE" <?php echo $patient_an_registration_view->A5monthDATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_A5monthDATE" type="text/html"><span id="el_patient_an_registration_A5monthDATE">
<span<?php echo $patient_an_registration_view->A5monthDATE->viewAttributes() ?>><?php echo $patient_an_registration_view->A5monthDATE->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->A5monthINHOUSE->Visible) { // A5monthINHOUSE ?>
	<tr id="r_A5monthINHOUSE">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_A5monthINHOUSE"><script id="tpc_patient_an_registration_A5monthINHOUSE" type="text/html"><?php echo $patient_an_registration_view->A5monthINHOUSE->caption() ?></script></span></td>
		<td data-name="A5monthINHOUSE" <?php echo $patient_an_registration_view->A5monthINHOUSE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_A5monthINHOUSE" type="text/html"><span id="el_patient_an_registration_A5monthINHOUSE">
<span<?php echo $patient_an_registration_view->A5monthINHOUSE->viewAttributes() ?>><?php echo $patient_an_registration_view->A5monthINHOUSE->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->A5monthREPORT->Visible) { // A5monthREPORT ?>
	<tr id="r_A5monthREPORT">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_A5monthREPORT"><script id="tpc_patient_an_registration_A5monthREPORT" type="text/html"><?php echo $patient_an_registration_view->A5monthREPORT->caption() ?></script></span></td>
		<td data-name="A5monthREPORT" <?php echo $patient_an_registration_view->A5monthREPORT->cellAttributes() ?>>
<script id="tpx_patient_an_registration_A5monthREPORT" type="text/html"><span id="el_patient_an_registration_A5monthREPORT">
<span<?php echo $patient_an_registration_view->A5monthREPORT->viewAttributes() ?>><?php echo $patient_an_registration_view->A5monthREPORT->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->A7month->Visible) { // A7month ?>
	<tr id="r_A7month">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_A7month"><script id="tpc_patient_an_registration_A7month" type="text/html"><?php echo $patient_an_registration_view->A7month->caption() ?></script></span></td>
		<td data-name="A7month" <?php echo $patient_an_registration_view->A7month->cellAttributes() ?>>
<script id="tpx_patient_an_registration_A7month" type="text/html"><span id="el_patient_an_registration_A7month">
<span<?php echo $patient_an_registration_view->A7month->viewAttributes() ?>><?php echo $patient_an_registration_view->A7month->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->A7monthDATE->Visible) { // A7monthDATE ?>
	<tr id="r_A7monthDATE">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_A7monthDATE"><script id="tpc_patient_an_registration_A7monthDATE" type="text/html"><?php echo $patient_an_registration_view->A7monthDATE->caption() ?></script></span></td>
		<td data-name="A7monthDATE" <?php echo $patient_an_registration_view->A7monthDATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_A7monthDATE" type="text/html"><span id="el_patient_an_registration_A7monthDATE">
<span<?php echo $patient_an_registration_view->A7monthDATE->viewAttributes() ?>><?php echo $patient_an_registration_view->A7monthDATE->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->A7monthINHOUSE->Visible) { // A7monthINHOUSE ?>
	<tr id="r_A7monthINHOUSE">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_A7monthINHOUSE"><script id="tpc_patient_an_registration_A7monthINHOUSE" type="text/html"><?php echo $patient_an_registration_view->A7monthINHOUSE->caption() ?></script></span></td>
		<td data-name="A7monthINHOUSE" <?php echo $patient_an_registration_view->A7monthINHOUSE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_A7monthINHOUSE" type="text/html"><span id="el_patient_an_registration_A7monthINHOUSE">
<span<?php echo $patient_an_registration_view->A7monthINHOUSE->viewAttributes() ?>><?php echo $patient_an_registration_view->A7monthINHOUSE->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->A7monthREPORT->Visible) { // A7monthREPORT ?>
	<tr id="r_A7monthREPORT">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_A7monthREPORT"><script id="tpc_patient_an_registration_A7monthREPORT" type="text/html"><?php echo $patient_an_registration_view->A7monthREPORT->caption() ?></script></span></td>
		<td data-name="A7monthREPORT" <?php echo $patient_an_registration_view->A7monthREPORT->cellAttributes() ?>>
<script id="tpx_patient_an_registration_A7monthREPORT" type="text/html"><span id="el_patient_an_registration_A7monthREPORT">
<span<?php echo $patient_an_registration_view->A7monthREPORT->viewAttributes() ?>><?php echo $patient_an_registration_view->A7monthREPORT->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->A9month->Visible) { // A9month ?>
	<tr id="r_A9month">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_A9month"><script id="tpc_patient_an_registration_A9month" type="text/html"><?php echo $patient_an_registration_view->A9month->caption() ?></script></span></td>
		<td data-name="A9month" <?php echo $patient_an_registration_view->A9month->cellAttributes() ?>>
<script id="tpx_patient_an_registration_A9month" type="text/html"><span id="el_patient_an_registration_A9month">
<span<?php echo $patient_an_registration_view->A9month->viewAttributes() ?>><?php echo $patient_an_registration_view->A9month->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->A9monthDATE->Visible) { // A9monthDATE ?>
	<tr id="r_A9monthDATE">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_A9monthDATE"><script id="tpc_patient_an_registration_A9monthDATE" type="text/html"><?php echo $patient_an_registration_view->A9monthDATE->caption() ?></script></span></td>
		<td data-name="A9monthDATE" <?php echo $patient_an_registration_view->A9monthDATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_A9monthDATE" type="text/html"><span id="el_patient_an_registration_A9monthDATE">
<span<?php echo $patient_an_registration_view->A9monthDATE->viewAttributes() ?>><?php echo $patient_an_registration_view->A9monthDATE->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->A9monthINHOUSE->Visible) { // A9monthINHOUSE ?>
	<tr id="r_A9monthINHOUSE">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_A9monthINHOUSE"><script id="tpc_patient_an_registration_A9monthINHOUSE" type="text/html"><?php echo $patient_an_registration_view->A9monthINHOUSE->caption() ?></script></span></td>
		<td data-name="A9monthINHOUSE" <?php echo $patient_an_registration_view->A9monthINHOUSE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_A9monthINHOUSE" type="text/html"><span id="el_patient_an_registration_A9monthINHOUSE">
<span<?php echo $patient_an_registration_view->A9monthINHOUSE->viewAttributes() ?>><?php echo $patient_an_registration_view->A9monthINHOUSE->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->A9monthREPORT->Visible) { // A9monthREPORT ?>
	<tr id="r_A9monthREPORT">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_A9monthREPORT"><script id="tpc_patient_an_registration_A9monthREPORT" type="text/html"><?php echo $patient_an_registration_view->A9monthREPORT->caption() ?></script></span></td>
		<td data-name="A9monthREPORT" <?php echo $patient_an_registration_view->A9monthREPORT->cellAttributes() ?>>
<script id="tpx_patient_an_registration_A9monthREPORT" type="text/html"><span id="el_patient_an_registration_A9monthREPORT">
<span<?php echo $patient_an_registration_view->A9monthREPORT->viewAttributes() ?>><?php echo $patient_an_registration_view->A9monthREPORT->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->INJ->Visible) { // INJ ?>
	<tr id="r_INJ">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_INJ"><script id="tpc_patient_an_registration_INJ" type="text/html"><?php echo $patient_an_registration_view->INJ->caption() ?></script></span></td>
		<td data-name="INJ" <?php echo $patient_an_registration_view->INJ->cellAttributes() ?>>
<script id="tpx_patient_an_registration_INJ" type="text/html"><span id="el_patient_an_registration_INJ">
<span<?php echo $patient_an_registration_view->INJ->viewAttributes() ?>><?php echo $patient_an_registration_view->INJ->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->INJDATE->Visible) { // INJDATE ?>
	<tr id="r_INJDATE">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_INJDATE"><script id="tpc_patient_an_registration_INJDATE" type="text/html"><?php echo $patient_an_registration_view->INJDATE->caption() ?></script></span></td>
		<td data-name="INJDATE" <?php echo $patient_an_registration_view->INJDATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_INJDATE" type="text/html"><span id="el_patient_an_registration_INJDATE">
<span<?php echo $patient_an_registration_view->INJDATE->viewAttributes() ?>><?php echo $patient_an_registration_view->INJDATE->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->INJINHOUSE->Visible) { // INJINHOUSE ?>
	<tr id="r_INJINHOUSE">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_INJINHOUSE"><script id="tpc_patient_an_registration_INJINHOUSE" type="text/html"><?php echo $patient_an_registration_view->INJINHOUSE->caption() ?></script></span></td>
		<td data-name="INJINHOUSE" <?php echo $patient_an_registration_view->INJINHOUSE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_INJINHOUSE" type="text/html"><span id="el_patient_an_registration_INJINHOUSE">
<span<?php echo $patient_an_registration_view->INJINHOUSE->viewAttributes() ?>><?php echo $patient_an_registration_view->INJINHOUSE->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->INJREPORT->Visible) { // INJREPORT ?>
	<tr id="r_INJREPORT">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_INJREPORT"><script id="tpc_patient_an_registration_INJREPORT" type="text/html"><?php echo $patient_an_registration_view->INJREPORT->caption() ?></script></span></td>
		<td data-name="INJREPORT" <?php echo $patient_an_registration_view->INJREPORT->cellAttributes() ?>>
<script id="tpx_patient_an_registration_INJREPORT" type="text/html"><span id="el_patient_an_registration_INJREPORT">
<span<?php echo $patient_an_registration_view->INJREPORT->viewAttributes() ?>><?php echo $patient_an_registration_view->INJREPORT->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->Bleeding->Visible) { // Bleeding ?>
	<tr id="r_Bleeding">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Bleeding"><script id="tpc_patient_an_registration_Bleeding" type="text/html"><?php echo $patient_an_registration_view->Bleeding->caption() ?></script></span></td>
		<td data-name="Bleeding" <?php echo $patient_an_registration_view->Bleeding->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Bleeding" type="text/html"><span id="el_patient_an_registration_Bleeding">
<span<?php echo $patient_an_registration_view->Bleeding->viewAttributes() ?>><?php echo $patient_an_registration_view->Bleeding->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->Hypothyroidism->Visible) { // Hypothyroidism ?>
	<tr id="r_Hypothyroidism">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Hypothyroidism"><script id="tpc_patient_an_registration_Hypothyroidism" type="text/html"><?php echo $patient_an_registration_view->Hypothyroidism->caption() ?></script></span></td>
		<td data-name="Hypothyroidism" <?php echo $patient_an_registration_view->Hypothyroidism->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Hypothyroidism" type="text/html"><span id="el_patient_an_registration_Hypothyroidism">
<span<?php echo $patient_an_registration_view->Hypothyroidism->viewAttributes() ?>><?php echo $patient_an_registration_view->Hypothyroidism->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->PICMENumber->Visible) { // PICMENumber ?>
	<tr id="r_PICMENumber">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_PICMENumber"><script id="tpc_patient_an_registration_PICMENumber" type="text/html"><?php echo $patient_an_registration_view->PICMENumber->caption() ?></script></span></td>
		<td data-name="PICMENumber" <?php echo $patient_an_registration_view->PICMENumber->cellAttributes() ?>>
<script id="tpx_patient_an_registration_PICMENumber" type="text/html"><span id="el_patient_an_registration_PICMENumber">
<span<?php echo $patient_an_registration_view->PICMENumber->viewAttributes() ?>><?php echo $patient_an_registration_view->PICMENumber->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->Outcome->Visible) { // Outcome ?>
	<tr id="r_Outcome">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Outcome"><script id="tpc_patient_an_registration_Outcome" type="text/html"><?php echo $patient_an_registration_view->Outcome->caption() ?></script></span></td>
		<td data-name="Outcome" <?php echo $patient_an_registration_view->Outcome->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Outcome" type="text/html"><span id="el_patient_an_registration_Outcome">
<span<?php echo $patient_an_registration_view->Outcome->viewAttributes() ?>><?php echo $patient_an_registration_view->Outcome->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->DateofAdmission->Visible) { // DateofAdmission ?>
	<tr id="r_DateofAdmission">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_DateofAdmission"><script id="tpc_patient_an_registration_DateofAdmission" type="text/html"><?php echo $patient_an_registration_view->DateofAdmission->caption() ?></script></span></td>
		<td data-name="DateofAdmission" <?php echo $patient_an_registration_view->DateofAdmission->cellAttributes() ?>>
<script id="tpx_patient_an_registration_DateofAdmission" type="text/html"><span id="el_patient_an_registration_DateofAdmission">
<span<?php echo $patient_an_registration_view->DateofAdmission->viewAttributes() ?>><?php echo $patient_an_registration_view->DateofAdmission->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->DateodProcedure->Visible) { // DateodProcedure ?>
	<tr id="r_DateodProcedure">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_DateodProcedure"><script id="tpc_patient_an_registration_DateodProcedure" type="text/html"><?php echo $patient_an_registration_view->DateodProcedure->caption() ?></script></span></td>
		<td data-name="DateodProcedure" <?php echo $patient_an_registration_view->DateodProcedure->cellAttributes() ?>>
<script id="tpx_patient_an_registration_DateodProcedure" type="text/html"><span id="el_patient_an_registration_DateodProcedure">
<span<?php echo $patient_an_registration_view->DateodProcedure->viewAttributes() ?>><?php echo $patient_an_registration_view->DateodProcedure->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->Miscarriage->Visible) { // Miscarriage ?>
	<tr id="r_Miscarriage">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Miscarriage"><script id="tpc_patient_an_registration_Miscarriage" type="text/html"><?php echo $patient_an_registration_view->Miscarriage->caption() ?></script></span></td>
		<td data-name="Miscarriage" <?php echo $patient_an_registration_view->Miscarriage->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Miscarriage" type="text/html"><span id="el_patient_an_registration_Miscarriage">
<span<?php echo $patient_an_registration_view->Miscarriage->viewAttributes() ?>><?php echo $patient_an_registration_view->Miscarriage->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->ModeOfDelivery->Visible) { // ModeOfDelivery ?>
	<tr id="r_ModeOfDelivery">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ModeOfDelivery"><script id="tpc_patient_an_registration_ModeOfDelivery" type="text/html"><?php echo $patient_an_registration_view->ModeOfDelivery->caption() ?></script></span></td>
		<td data-name="ModeOfDelivery" <?php echo $patient_an_registration_view->ModeOfDelivery->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ModeOfDelivery" type="text/html"><span id="el_patient_an_registration_ModeOfDelivery">
<span<?php echo $patient_an_registration_view->ModeOfDelivery->viewAttributes() ?>><?php echo $patient_an_registration_view->ModeOfDelivery->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->ND->Visible) { // ND ?>
	<tr id="r_ND">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ND"><script id="tpc_patient_an_registration_ND" type="text/html"><?php echo $patient_an_registration_view->ND->caption() ?></script></span></td>
		<td data-name="ND" <?php echo $patient_an_registration_view->ND->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ND" type="text/html"><span id="el_patient_an_registration_ND">
<span<?php echo $patient_an_registration_view->ND->viewAttributes() ?>><?php echo $patient_an_registration_view->ND->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->NDS->Visible) { // NDS ?>
	<tr id="r_NDS">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_NDS"><script id="tpc_patient_an_registration_NDS" type="text/html"><?php echo $patient_an_registration_view->NDS->caption() ?></script></span></td>
		<td data-name="NDS" <?php echo $patient_an_registration_view->NDS->cellAttributes() ?>>
<script id="tpx_patient_an_registration_NDS" type="text/html"><span id="el_patient_an_registration_NDS">
<span<?php echo $patient_an_registration_view->NDS->viewAttributes() ?>><?php echo $patient_an_registration_view->NDS->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->NDP->Visible) { // NDP ?>
	<tr id="r_NDP">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_NDP"><script id="tpc_patient_an_registration_NDP" type="text/html"><?php echo $patient_an_registration_view->NDP->caption() ?></script></span></td>
		<td data-name="NDP" <?php echo $patient_an_registration_view->NDP->cellAttributes() ?>>
<script id="tpx_patient_an_registration_NDP" type="text/html"><span id="el_patient_an_registration_NDP">
<span<?php echo $patient_an_registration_view->NDP->viewAttributes() ?>><?php echo $patient_an_registration_view->NDP->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->Vaccum->Visible) { // Vaccum ?>
	<tr id="r_Vaccum">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Vaccum"><script id="tpc_patient_an_registration_Vaccum" type="text/html"><?php echo $patient_an_registration_view->Vaccum->caption() ?></script></span></td>
		<td data-name="Vaccum" <?php echo $patient_an_registration_view->Vaccum->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Vaccum" type="text/html"><span id="el_patient_an_registration_Vaccum">
<span<?php echo $patient_an_registration_view->Vaccum->viewAttributes() ?>><?php echo $patient_an_registration_view->Vaccum->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->VaccumS->Visible) { // VaccumS ?>
	<tr id="r_VaccumS">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_VaccumS"><script id="tpc_patient_an_registration_VaccumS" type="text/html"><?php echo $patient_an_registration_view->VaccumS->caption() ?></script></span></td>
		<td data-name="VaccumS" <?php echo $patient_an_registration_view->VaccumS->cellAttributes() ?>>
<script id="tpx_patient_an_registration_VaccumS" type="text/html"><span id="el_patient_an_registration_VaccumS">
<span<?php echo $patient_an_registration_view->VaccumS->viewAttributes() ?>><?php echo $patient_an_registration_view->VaccumS->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->VaccumP->Visible) { // VaccumP ?>
	<tr id="r_VaccumP">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_VaccumP"><script id="tpc_patient_an_registration_VaccumP" type="text/html"><?php echo $patient_an_registration_view->VaccumP->caption() ?></script></span></td>
		<td data-name="VaccumP" <?php echo $patient_an_registration_view->VaccumP->cellAttributes() ?>>
<script id="tpx_patient_an_registration_VaccumP" type="text/html"><span id="el_patient_an_registration_VaccumP">
<span<?php echo $patient_an_registration_view->VaccumP->viewAttributes() ?>><?php echo $patient_an_registration_view->VaccumP->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->Forceps->Visible) { // Forceps ?>
	<tr id="r_Forceps">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Forceps"><script id="tpc_patient_an_registration_Forceps" type="text/html"><?php echo $patient_an_registration_view->Forceps->caption() ?></script></span></td>
		<td data-name="Forceps" <?php echo $patient_an_registration_view->Forceps->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Forceps" type="text/html"><span id="el_patient_an_registration_Forceps">
<span<?php echo $patient_an_registration_view->Forceps->viewAttributes() ?>><?php echo $patient_an_registration_view->Forceps->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->ForcepsS->Visible) { // ForcepsS ?>
	<tr id="r_ForcepsS">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ForcepsS"><script id="tpc_patient_an_registration_ForcepsS" type="text/html"><?php echo $patient_an_registration_view->ForcepsS->caption() ?></script></span></td>
		<td data-name="ForcepsS" <?php echo $patient_an_registration_view->ForcepsS->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ForcepsS" type="text/html"><span id="el_patient_an_registration_ForcepsS">
<span<?php echo $patient_an_registration_view->ForcepsS->viewAttributes() ?>><?php echo $patient_an_registration_view->ForcepsS->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->ForcepsP->Visible) { // ForcepsP ?>
	<tr id="r_ForcepsP">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ForcepsP"><script id="tpc_patient_an_registration_ForcepsP" type="text/html"><?php echo $patient_an_registration_view->ForcepsP->caption() ?></script></span></td>
		<td data-name="ForcepsP" <?php echo $patient_an_registration_view->ForcepsP->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ForcepsP" type="text/html"><span id="el_patient_an_registration_ForcepsP">
<span<?php echo $patient_an_registration_view->ForcepsP->viewAttributes() ?>><?php echo $patient_an_registration_view->ForcepsP->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->Elective->Visible) { // Elective ?>
	<tr id="r_Elective">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Elective"><script id="tpc_patient_an_registration_Elective" type="text/html"><?php echo $patient_an_registration_view->Elective->caption() ?></script></span></td>
		<td data-name="Elective" <?php echo $patient_an_registration_view->Elective->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Elective" type="text/html"><span id="el_patient_an_registration_Elective">
<span<?php echo $patient_an_registration_view->Elective->viewAttributes() ?>><?php echo $patient_an_registration_view->Elective->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->ElectiveS->Visible) { // ElectiveS ?>
	<tr id="r_ElectiveS">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ElectiveS"><script id="tpc_patient_an_registration_ElectiveS" type="text/html"><?php echo $patient_an_registration_view->ElectiveS->caption() ?></script></span></td>
		<td data-name="ElectiveS" <?php echo $patient_an_registration_view->ElectiveS->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ElectiveS" type="text/html"><span id="el_patient_an_registration_ElectiveS">
<span<?php echo $patient_an_registration_view->ElectiveS->viewAttributes() ?>><?php echo $patient_an_registration_view->ElectiveS->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->ElectiveP->Visible) { // ElectiveP ?>
	<tr id="r_ElectiveP">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ElectiveP"><script id="tpc_patient_an_registration_ElectiveP" type="text/html"><?php echo $patient_an_registration_view->ElectiveP->caption() ?></script></span></td>
		<td data-name="ElectiveP" <?php echo $patient_an_registration_view->ElectiveP->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ElectiveP" type="text/html"><span id="el_patient_an_registration_ElectiveP">
<span<?php echo $patient_an_registration_view->ElectiveP->viewAttributes() ?>><?php echo $patient_an_registration_view->ElectiveP->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->Emergency->Visible) { // Emergency ?>
	<tr id="r_Emergency">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Emergency"><script id="tpc_patient_an_registration_Emergency" type="text/html"><?php echo $patient_an_registration_view->Emergency->caption() ?></script></span></td>
		<td data-name="Emergency" <?php echo $patient_an_registration_view->Emergency->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Emergency" type="text/html"><span id="el_patient_an_registration_Emergency">
<span<?php echo $patient_an_registration_view->Emergency->viewAttributes() ?>><?php echo $patient_an_registration_view->Emergency->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->EmergencyS->Visible) { // EmergencyS ?>
	<tr id="r_EmergencyS">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_EmergencyS"><script id="tpc_patient_an_registration_EmergencyS" type="text/html"><?php echo $patient_an_registration_view->EmergencyS->caption() ?></script></span></td>
		<td data-name="EmergencyS" <?php echo $patient_an_registration_view->EmergencyS->cellAttributes() ?>>
<script id="tpx_patient_an_registration_EmergencyS" type="text/html"><span id="el_patient_an_registration_EmergencyS">
<span<?php echo $patient_an_registration_view->EmergencyS->viewAttributes() ?>><?php echo $patient_an_registration_view->EmergencyS->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->EmergencyP->Visible) { // EmergencyP ?>
	<tr id="r_EmergencyP">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_EmergencyP"><script id="tpc_patient_an_registration_EmergencyP" type="text/html"><?php echo $patient_an_registration_view->EmergencyP->caption() ?></script></span></td>
		<td data-name="EmergencyP" <?php echo $patient_an_registration_view->EmergencyP->cellAttributes() ?>>
<script id="tpx_patient_an_registration_EmergencyP" type="text/html"><span id="el_patient_an_registration_EmergencyP">
<span<?php echo $patient_an_registration_view->EmergencyP->viewAttributes() ?>><?php echo $patient_an_registration_view->EmergencyP->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->Maturity->Visible) { // Maturity ?>
	<tr id="r_Maturity">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Maturity"><script id="tpc_patient_an_registration_Maturity" type="text/html"><?php echo $patient_an_registration_view->Maturity->caption() ?></script></span></td>
		<td data-name="Maturity" <?php echo $patient_an_registration_view->Maturity->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Maturity" type="text/html"><span id="el_patient_an_registration_Maturity">
<span<?php echo $patient_an_registration_view->Maturity->viewAttributes() ?>><?php echo $patient_an_registration_view->Maturity->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->Baby1->Visible) { // Baby1 ?>
	<tr id="r_Baby1">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Baby1"><script id="tpc_patient_an_registration_Baby1" type="text/html"><?php echo $patient_an_registration_view->Baby1->caption() ?></script></span></td>
		<td data-name="Baby1" <?php echo $patient_an_registration_view->Baby1->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Baby1" type="text/html"><span id="el_patient_an_registration_Baby1">
<span<?php echo $patient_an_registration_view->Baby1->viewAttributes() ?>><?php echo $patient_an_registration_view->Baby1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->Baby2->Visible) { // Baby2 ?>
	<tr id="r_Baby2">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Baby2"><script id="tpc_patient_an_registration_Baby2" type="text/html"><?php echo $patient_an_registration_view->Baby2->caption() ?></script></span></td>
		<td data-name="Baby2" <?php echo $patient_an_registration_view->Baby2->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Baby2" type="text/html"><span id="el_patient_an_registration_Baby2">
<span<?php echo $patient_an_registration_view->Baby2->viewAttributes() ?>><?php echo $patient_an_registration_view->Baby2->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->sex1->Visible) { // sex1 ?>
	<tr id="r_sex1">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_sex1"><script id="tpc_patient_an_registration_sex1" type="text/html"><?php echo $patient_an_registration_view->sex1->caption() ?></script></span></td>
		<td data-name="sex1" <?php echo $patient_an_registration_view->sex1->cellAttributes() ?>>
<script id="tpx_patient_an_registration_sex1" type="text/html"><span id="el_patient_an_registration_sex1">
<span<?php echo $patient_an_registration_view->sex1->viewAttributes() ?>><?php echo $patient_an_registration_view->sex1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->sex2->Visible) { // sex2 ?>
	<tr id="r_sex2">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_sex2"><script id="tpc_patient_an_registration_sex2" type="text/html"><?php echo $patient_an_registration_view->sex2->caption() ?></script></span></td>
		<td data-name="sex2" <?php echo $patient_an_registration_view->sex2->cellAttributes() ?>>
<script id="tpx_patient_an_registration_sex2" type="text/html"><span id="el_patient_an_registration_sex2">
<span<?php echo $patient_an_registration_view->sex2->viewAttributes() ?>><?php echo $patient_an_registration_view->sex2->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->weight1->Visible) { // weight1 ?>
	<tr id="r_weight1">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_weight1"><script id="tpc_patient_an_registration_weight1" type="text/html"><?php echo $patient_an_registration_view->weight1->caption() ?></script></span></td>
		<td data-name="weight1" <?php echo $patient_an_registration_view->weight1->cellAttributes() ?>>
<script id="tpx_patient_an_registration_weight1" type="text/html"><span id="el_patient_an_registration_weight1">
<span<?php echo $patient_an_registration_view->weight1->viewAttributes() ?>><?php echo $patient_an_registration_view->weight1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->weight2->Visible) { // weight2 ?>
	<tr id="r_weight2">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_weight2"><script id="tpc_patient_an_registration_weight2" type="text/html"><?php echo $patient_an_registration_view->weight2->caption() ?></script></span></td>
		<td data-name="weight2" <?php echo $patient_an_registration_view->weight2->cellAttributes() ?>>
<script id="tpx_patient_an_registration_weight2" type="text/html"><span id="el_patient_an_registration_weight2">
<span<?php echo $patient_an_registration_view->weight2->viewAttributes() ?>><?php echo $patient_an_registration_view->weight2->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->NICU1->Visible) { // NICU1 ?>
	<tr id="r_NICU1">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_NICU1"><script id="tpc_patient_an_registration_NICU1" type="text/html"><?php echo $patient_an_registration_view->NICU1->caption() ?></script></span></td>
		<td data-name="NICU1" <?php echo $patient_an_registration_view->NICU1->cellAttributes() ?>>
<script id="tpx_patient_an_registration_NICU1" type="text/html"><span id="el_patient_an_registration_NICU1">
<span<?php echo $patient_an_registration_view->NICU1->viewAttributes() ?>><?php echo $patient_an_registration_view->NICU1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->NICU2->Visible) { // NICU2 ?>
	<tr id="r_NICU2">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_NICU2"><script id="tpc_patient_an_registration_NICU2" type="text/html"><?php echo $patient_an_registration_view->NICU2->caption() ?></script></span></td>
		<td data-name="NICU2" <?php echo $patient_an_registration_view->NICU2->cellAttributes() ?>>
<script id="tpx_patient_an_registration_NICU2" type="text/html"><span id="el_patient_an_registration_NICU2">
<span<?php echo $patient_an_registration_view->NICU2->viewAttributes() ?>><?php echo $patient_an_registration_view->NICU2->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->Jaundice1->Visible) { // Jaundice1 ?>
	<tr id="r_Jaundice1">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Jaundice1"><script id="tpc_patient_an_registration_Jaundice1" type="text/html"><?php echo $patient_an_registration_view->Jaundice1->caption() ?></script></span></td>
		<td data-name="Jaundice1" <?php echo $patient_an_registration_view->Jaundice1->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Jaundice1" type="text/html"><span id="el_patient_an_registration_Jaundice1">
<span<?php echo $patient_an_registration_view->Jaundice1->viewAttributes() ?>><?php echo $patient_an_registration_view->Jaundice1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->Jaundice2->Visible) { // Jaundice2 ?>
	<tr id="r_Jaundice2">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Jaundice2"><script id="tpc_patient_an_registration_Jaundice2" type="text/html"><?php echo $patient_an_registration_view->Jaundice2->caption() ?></script></span></td>
		<td data-name="Jaundice2" <?php echo $patient_an_registration_view->Jaundice2->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Jaundice2" type="text/html"><span id="el_patient_an_registration_Jaundice2">
<span<?php echo $patient_an_registration_view->Jaundice2->viewAttributes() ?>><?php echo $patient_an_registration_view->Jaundice2->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->Others1->Visible) { // Others1 ?>
	<tr id="r_Others1">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Others1"><script id="tpc_patient_an_registration_Others1" type="text/html"><?php echo $patient_an_registration_view->Others1->caption() ?></script></span></td>
		<td data-name="Others1" <?php echo $patient_an_registration_view->Others1->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Others1" type="text/html"><span id="el_patient_an_registration_Others1">
<span<?php echo $patient_an_registration_view->Others1->viewAttributes() ?>><?php echo $patient_an_registration_view->Others1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->Others2->Visible) { // Others2 ?>
	<tr id="r_Others2">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Others2"><script id="tpc_patient_an_registration_Others2" type="text/html"><?php echo $patient_an_registration_view->Others2->caption() ?></script></span></td>
		<td data-name="Others2" <?php echo $patient_an_registration_view->Others2->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Others2" type="text/html"><span id="el_patient_an_registration_Others2">
<span<?php echo $patient_an_registration_view->Others2->viewAttributes() ?>><?php echo $patient_an_registration_view->Others2->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->SpillOverReasons->Visible) { // SpillOverReasons ?>
	<tr id="r_SpillOverReasons">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_SpillOverReasons"><script id="tpc_patient_an_registration_SpillOverReasons" type="text/html"><?php echo $patient_an_registration_view->SpillOverReasons->caption() ?></script></span></td>
		<td data-name="SpillOverReasons" <?php echo $patient_an_registration_view->SpillOverReasons->cellAttributes() ?>>
<script id="tpx_patient_an_registration_SpillOverReasons" type="text/html"><span id="el_patient_an_registration_SpillOverReasons">
<span<?php echo $patient_an_registration_view->SpillOverReasons->viewAttributes() ?>><?php echo $patient_an_registration_view->SpillOverReasons->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->ANClosed->Visible) { // ANClosed ?>
	<tr id="r_ANClosed">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ANClosed"><script id="tpc_patient_an_registration_ANClosed" type="text/html"><?php echo $patient_an_registration_view->ANClosed->caption() ?></script></span></td>
		<td data-name="ANClosed" <?php echo $patient_an_registration_view->ANClosed->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ANClosed" type="text/html"><span id="el_patient_an_registration_ANClosed">
<span<?php echo $patient_an_registration_view->ANClosed->viewAttributes() ?>><?php echo $patient_an_registration_view->ANClosed->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->ANClosedDATE->Visible) { // ANClosedDATE ?>
	<tr id="r_ANClosedDATE">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ANClosedDATE"><script id="tpc_patient_an_registration_ANClosedDATE" type="text/html"><?php echo $patient_an_registration_view->ANClosedDATE->caption() ?></script></span></td>
		<td data-name="ANClosedDATE" <?php echo $patient_an_registration_view->ANClosedDATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ANClosedDATE" type="text/html"><span id="el_patient_an_registration_ANClosedDATE">
<span<?php echo $patient_an_registration_view->ANClosedDATE->viewAttributes() ?>><?php echo $patient_an_registration_view->ANClosedDATE->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->PastMedicalHistoryOthers->Visible) { // PastMedicalHistoryOthers ?>
	<tr id="r_PastMedicalHistoryOthers">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_PastMedicalHistoryOthers"><script id="tpc_patient_an_registration_PastMedicalHistoryOthers" type="text/html"><?php echo $patient_an_registration_view->PastMedicalHistoryOthers->caption() ?></script></span></td>
		<td data-name="PastMedicalHistoryOthers" <?php echo $patient_an_registration_view->PastMedicalHistoryOthers->cellAttributes() ?>>
<script id="tpx_patient_an_registration_PastMedicalHistoryOthers" type="text/html"><span id="el_patient_an_registration_PastMedicalHistoryOthers">
<span<?php echo $patient_an_registration_view->PastMedicalHistoryOthers->viewAttributes() ?>><?php echo $patient_an_registration_view->PastMedicalHistoryOthers->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->PastSurgicalHistoryOthers->Visible) { // PastSurgicalHistoryOthers ?>
	<tr id="r_PastSurgicalHistoryOthers">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_PastSurgicalHistoryOthers"><script id="tpc_patient_an_registration_PastSurgicalHistoryOthers" type="text/html"><?php echo $patient_an_registration_view->PastSurgicalHistoryOthers->caption() ?></script></span></td>
		<td data-name="PastSurgicalHistoryOthers" <?php echo $patient_an_registration_view->PastSurgicalHistoryOthers->cellAttributes() ?>>
<script id="tpx_patient_an_registration_PastSurgicalHistoryOthers" type="text/html"><span id="el_patient_an_registration_PastSurgicalHistoryOthers">
<span<?php echo $patient_an_registration_view->PastSurgicalHistoryOthers->viewAttributes() ?>><?php echo $patient_an_registration_view->PastSurgicalHistoryOthers->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->FamilyHistoryOthers->Visible) { // FamilyHistoryOthers ?>
	<tr id="r_FamilyHistoryOthers">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_FamilyHistoryOthers"><script id="tpc_patient_an_registration_FamilyHistoryOthers" type="text/html"><?php echo $patient_an_registration_view->FamilyHistoryOthers->caption() ?></script></span></td>
		<td data-name="FamilyHistoryOthers" <?php echo $patient_an_registration_view->FamilyHistoryOthers->cellAttributes() ?>>
<script id="tpx_patient_an_registration_FamilyHistoryOthers" type="text/html"><span id="el_patient_an_registration_FamilyHistoryOthers">
<span<?php echo $patient_an_registration_view->FamilyHistoryOthers->viewAttributes() ?>><?php echo $patient_an_registration_view->FamilyHistoryOthers->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->PresentPregnancyComplicationsOthers->Visible) { // PresentPregnancyComplicationsOthers ?>
	<tr id="r_PresentPregnancyComplicationsOthers">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_PresentPregnancyComplicationsOthers"><script id="tpc_patient_an_registration_PresentPregnancyComplicationsOthers" type="text/html"><?php echo $patient_an_registration_view->PresentPregnancyComplicationsOthers->caption() ?></script></span></td>
		<td data-name="PresentPregnancyComplicationsOthers" <?php echo $patient_an_registration_view->PresentPregnancyComplicationsOthers->cellAttributes() ?>>
<script id="tpx_patient_an_registration_PresentPregnancyComplicationsOthers" type="text/html"><span id="el_patient_an_registration_PresentPregnancyComplicationsOthers">
<span<?php echo $patient_an_registration_view->PresentPregnancyComplicationsOthers->viewAttributes() ?>><?php echo $patient_an_registration_view->PresentPregnancyComplicationsOthers->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration_view->ETdate->Visible) { // ETdate ?>
	<tr id="r_ETdate">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ETdate"><script id="tpc_patient_an_registration_ETdate" type="text/html"><?php echo $patient_an_registration_view->ETdate->caption() ?></script></span></td>
		<td data-name="ETdate" <?php echo $patient_an_registration_view->ETdate->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ETdate" type="text/html"><span id="el_patient_an_registration_ETdate">
<span<?php echo $patient_an_registration_view->ETdate->viewAttributes() ?>><?php echo $patient_an_registration_view->ETdate->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_patient_an_registrationview" class="ew-custom-template"></div>
<script id="tpm_patient_an_registrationview" type="text/html">
<div id="ct_patient_an_registration_view"><style>
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
.input-group {
	position: relative;
	display: flex;
	flex-wrap: inherit;
	align-items: stretch;
	width: 100%;
}
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}
#customers tr:nth-child(even){background-color: #f2f2f2;}
#customers tr:hover {background-color: #ddd;}
#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
::placeholder {
  color: red;
  opacity: 1; /* Firefox */
}
:-ms-input-placeholder { /* Internet Explorer 10-11 */
 color: red;
}
::-ms-input-placeholder { /* Microsoft Edge */
 color: red;
}
</style>
<?php
$cid = $_GET["fk_id"] ;
$IVFid = $_GET["fk_RIDNO"] ;
$dbhelper = &DbHelper();
$Tid = $_GET["fk_id"];//
$showmaster = $_GET["showmaster"] ;
$sql = "SELECT * FROM ganeshkumar_bjhims.patient_opd_follow_up where id='".$Tid."'; ";
$resultsA = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where CoupleID='".$resultsA[0]["PatID"]."'; ";
$results = $dbhelper->ExecuteRows($sql);
if($results[0]["Female"] != '')
{
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Male"]."'; ";
$results1 = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Female"]."'; ";
$results2 = $dbhelper->ExecuteRows($sql);
}else{
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$resultsA[0]["PatientId"]."'; ";
$results2 = $dbhelper->ExecuteRows($sql);
}
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_vitals_history where RIDNO='".$results[0]["id"]."'; ";
$resultsVitalHistory = $dbhelper->ExecuteRows($sql);
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
$pageHeader = 'Stimulation Chart For ' . $resultsA[0]["ARTCYCLE"];
?>	
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
<div class="row">
<?php echo $resultsVitalHistory[count($resultsVitalHistory)-1]["Chiefcomplaints"] ;?>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">AN Registration</h3>
			</div>
			<div class="card-body">
<table id="ETTableSt" class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_G"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_G")/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_P"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_P")/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_L"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_L")/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_A"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_A")/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_E"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_E")/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_M"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_M")/}}</span>
				</td>
		 </tr>
	</tbody>
</table>
<table id="ETTableSt" class="ew-table" style="width:100%;">	
	<tbody>
  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_LMP"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_LMP")/}}</span>
				</td>
				<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_ETdate"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_ETdate")/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_EDO"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_EDO")/}}</span>
				</td>
		</tr>
  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_MenstrualHistory"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_MenstrualHistory")/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_ObstetricHistory"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_ObstetricHistory")/}}</span>
				</td>
				<td>					 
				</td>
		</tr>		 
  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_PreviousHistoryofGDM"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_PreviousHistoryofGDM")/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_PreviousHistorofPIH"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_PreviousHistorofPIH")/}}</span>
				</td>
				<td>					 
				</td>
		</tr>
  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_PreviousHistoryofIUGR"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_PreviousHistoryofIUGR")/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_PreviousHistoryofOligohydramnios"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_PreviousHistoryofOligohydramnios")/}}</span>
				</td>
				<td>				
				</td>
		</tr>
  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_PreviousHistoryofPreterm"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_PreviousHistoryofPreterm")/}}</span>
				</td>
				<td>				
				</td>
				<td>					 
				</td>
		 </tr> 
	</tbody>
</table>
</div>
<div class="card-body">
<table id="customers" class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
				<th><span class="ew-cell">G</span></th>
		  		<th><span class="ew-cell">AN Complication</span></th>
		  		<th><span class="ew-cell">Delivery – ND/ LSCS Place of delivery</span></th>
		  		<th><span class="ew-cell">Baby Sex/ weight/ problems</span></th>
		</tr>
		<tr>
				<td><span class="ew-cell">1</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_G1")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_DeliveryNDLSCS1")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_BabySexweight1")/}}</span></td>
		</tr>
		<tr>
				<td><span class="ew-cell">2</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_G2")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_DeliveryNDLSCS2")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_BabySexweight2")/}}</span></td>
		</tr> 
		<tr>
		  		<td><span class="ew-cell">3</span></td>		
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_G3")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_DeliveryNDLSCS3")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_BabySexweight3")/}}</span></td>
		</tr>
	</tbody>
</table>
 <!-- /.card-body -->
</div>
<div class="card-body">
<table id="ETTableSt" class="ew-table" style="width:100%;">	
	<tbody>
  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_PastMedicalHistory"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_PastMedicalHistory")/}}</span>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_PastMedicalHistoryOthers"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_PastMedicalHistoryOthers")/}}</span>
				</td>
				<td>					 
				</td>
		</tr>
  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_PastSurgicalHistory"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_PastSurgicalHistory")/}}</span>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_PastSurgicalHistoryOthers"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_PastSurgicalHistoryOthers")/}}</span>
				</td>
				<td>					 
				</td>
		</tr>		 
  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_FamilyHistory"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_FamilyHistory")/}}</span>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_FamilyHistoryOthers"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_FamilyHistoryOthers")/}}</span>
				</td>
				<td>					 
				</td>
		</tr>
	</tbody>
</table>
</div>
<div class="card-body">
Scan :
<table id="customers" class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
				<th><span class="ew-cell">Scan Type</span></th>
		  		<th><span class="ew-cell">Done Date</span></th>
		  		<th><span class="ew-cell">Report</span></th>
		</tr>
		<tr>
				<td><span class="ew-cell">Viability</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_ViabilityDATE")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_ViabilityREPORT")/}}</span></td>
		</tr>
		<tr>
				<td><span class="ew-cell">Viability2</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_Viability2DATE")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_Viability2REPORT")/}}</span></td>
		</tr> 
		<tr>
		  		<td><span class="ew-cell">NTscan</span></td>		
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_NTscanDATE")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_NTscanREPORT")/}}</span></td>
		</tr>
				<tr>
		  		<td><span class="ew-cell">EarlyTarget</span></td>		
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_EarlyTargetDATE")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_EarlyTargetREPORT")/}}</span></td>
		</tr>
				<tr>
		  		<td><span class="ew-cell">Anomaly</span></td>		
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_AnomalyDATE")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_AnomalyREPORT")/}}</span></td>
		</tr>
				<tr>
		  		<td><span class="ew-cell">Growth</span></td>		
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_GrowthDATE")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_GrowthREPORT")/}}</span></td>
		</tr>
		<tr>
		  		<td><span class="ew-cell">Growth1</span></td>		
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_Growth1DATE")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_Growth1REPORT")/}}</span></td>
		</tr>
	</tbody>
</table>
 <!-- /.card-body -->
			</div>
<div class="card-body">
Investigation:
<table id="customers" class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
				<th><span class="ew-cell">Investigation Type</span></th>
		  		<th><span class="ew-cell">Done date</span></th>
		  		<th><span class="ew-cell">Inhouse / Outside Lab</span></th>
		  		<th><span class="ew-cell">Report</span></th>
		</tr>
		<tr>
				<td><span class="ew-cell">AN Profile</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_ANProfileDATE")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_ANProfileINHOUSE")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_ANProfileREPORT")/}}</span></td>
		</tr>
		<tr>
				<td><span class="ew-cell">Dual Marker</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_DualMarkerDATE")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_DualMarkerINHOUSE")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_DualMarkerREPORT")/}}</span></td>
		</tr>
		<tr>
		  		<td><span class="ew-cell">Quadruple Marker</span></td>		
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_QuadrupleDATE")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_QuadrupleINHOUSE")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_QuadrupleREPORT")/}}</span></td>
		</tr>
		<tr>
		  		<td><span class="ew-cell">5 th month Blood & Urine test</span></td>		
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_A5monthDATE")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_A5monthINHOUSE")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_A5monthREPORT")/}}</span></td>
		</tr>
		<tr>
		  		<td><span class="ew-cell">7 th month Blood & Urine test</span></td>		
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_A7monthDATE")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_A7monthINHOUSE")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_A7monthREPORT")/}}</span></td>
		</tr>
		<tr>
		  		<td><span class="ew-cell">9 th month Blood & Urine test</span></td>		
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_A9monthDATE")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_A9monthINHOUSE")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_A9monthREPORT")/}}</span></td>
		</tr>
		<tr>
		  		<td><span class="ew-cell">Inj Dexamethasone</span></td>		
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_INJDATE")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_INJINHOUSE")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_INJREPORT")/}}</span></td>
		</tr>
	</tbody>
</table>
 <!-- /.card-body -->
			</div>
<div class="card-body">
Present Pregnancy Complications :
<table id="ETTableSt" class="ew-table" style="width:100%;">	
	<tbody>
  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_Bleeding"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_Bleeding")/}}</span>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_PresentPregnancyComplicationsOthers"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_PresentPregnancyComplicationsOthers")/}}</span>
				</td>
				<td>					 
				</td>
		</tr>
  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_PICMENumber"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_PICMENumber")/}}</span>
				</td>
				<td>					 
				</td>
		</tr>		 
  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_Outcome"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_Outcome")/}}</span>
				</td>
				<td>					 
				</td>
		</tr>
		 <tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_DateofAdmission"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_DateofAdmission")/}}</span>
				</td>
				<td>					 
				</td>
		</tr>
		  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_DateodProcedure"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_DateodProcedure")/}}</span>
				</td>
				<td>					 
				</td>
		</tr>
		  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_Miscarriage"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_Miscarriage")/}}</span>
				</td>
				<td>					 
				</td>
		</tr>
		  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_ModeOfDelivery"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_ModeOfDelivery")/}}</span>
				</td>
				<td>					 
				</td>
		</tr>
	</tbody>
</table>
</div>
<div class="card-body">
<table id="customers" class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
				<td><span class="ew-cell">ND</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_NDS")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_NDP")/}}</span></td>
		</tr> 
		<tr>
				<td><span class="ew-cell">Vaccum D</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_VaccumS")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_VaccumP")/}}</span></td>
		</tr> 
		<tr>
		  		<td><span class="ew-cell">Forceps D</span></td>		
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_ForcepsS")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_ForcepsP")/}}</span></td>
		</tr>
		<tr>
		  		<td><span class="ew-cell">Elective LSCS</span></td>		
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_ElectiveS")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_ElectiveP")/}}</span></td>
		</tr>
		<tr>
		  		<td><span class="ew-cell">Emergency LSCS</span></td>		
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_EmergencyS")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl=~getTemplate("#tpx_patient_an_registration_EmergencyP")/}}</span></td>
		</tr>
	</tbody>
</table>
 <!-- /.card-body -->
</div>
{{include tmpl="#tpc_patient_an_registration_Maturity"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_Maturity")/}}
<div class="card-body">
Paediatric : 
<table id="customers" class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
				<td><span class="ew-cell">1</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_Baby1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_Baby1")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_sex1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_sex1")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_weight1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_weight1")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_NICU1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_NICU1")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_Jaundice1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_Jaundice1")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_Others1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_Others1")/}}</span></td>
		</tr>
		<tr>
				<td><span class="ew-cell">2</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_Baby2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_Baby2")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_sex2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_sex2")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_weight2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_weight2")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_NICU2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_NICU2")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_Jaundice2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_Jaundice2")/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_Others2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_Others2")/}}</span></td>
		</tr> 
	</tbody>
</table>
 <!-- /.card-body -->
</div>
{{include tmpl="#tpc_patient_an_registration_SpillOverReasons"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_SpillOverReasons")/}}
{{include tmpl="#tpc_patient_an_registration_ANClosed"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_ANClosed")/}}
{{include tmpl="#tpc_patient_an_registration_ANClosedDATE"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_an_registration_ANClosedDATE")/}}
		</div>
	</div>
</div>
</div>
</script>

</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($patient_an_registration->Rows) ?> };
	ew.applyTemplate("tpd_patient_an_registrationview", "tpm_patient_an_registrationview", "patient_an_registrationview", "<?php echo $patient_an_registration->CustomExport ?>", ew.templateData.rows[0]);
	$("script.patient_an_registrationview_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$patient_an_registration_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$patient_an_registration_view->isExport()) { ?>
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
$patient_an_registration_view->terminate();
?>