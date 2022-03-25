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
$patient_ot_delivery_register_view = new patient_ot_delivery_register_view();

// Run the page
$patient_ot_delivery_register_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_ot_delivery_register_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$patient_ot_delivery_register_view->isExport()) { ?>
<script>
var fpatient_ot_delivery_registerview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fpatient_ot_delivery_registerview = currentForm = new ew.Form("fpatient_ot_delivery_registerview", "view");
	loadjs.done("fpatient_ot_delivery_registerview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$patient_ot_delivery_register_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $patient_ot_delivery_register_view->ExportOptions->render("body") ?>
<?php $patient_ot_delivery_register_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $patient_ot_delivery_register_view->showPageHeader(); ?>
<?php
$patient_ot_delivery_register_view->showMessage();
?>
<form name="fpatient_ot_delivery_registerview" id="fpatient_ot_delivery_registerview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_ot_delivery_register">
<input type="hidden" name="modal" value="<?php echo (int)$patient_ot_delivery_register_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($patient_ot_delivery_register_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_id"><script id="tpc_patient_ot_delivery_register_id" type="text/html"><?php echo $patient_ot_delivery_register_view->id->caption() ?></script></span></td>
		<td data-name="id" <?php echo $patient_ot_delivery_register_view->id->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_id" type="text/html"><span id="el_patient_ot_delivery_register_id">
<span<?php echo $patient_ot_delivery_register_view->id->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->id->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->PatID->Visible) { // PatID ?>
	<tr id="r_PatID">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_PatID"><script id="tpc_patient_ot_delivery_register_PatID" type="text/html"><?php echo $patient_ot_delivery_register_view->PatID->caption() ?></script></span></td>
		<td data-name="PatID" <?php echo $patient_ot_delivery_register_view->PatID->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_PatID" type="text/html"><span id="el_patient_ot_delivery_register_PatID">
<span<?php echo $patient_ot_delivery_register_view->PatID->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->PatID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->PatientName->Visible) { // PatientName ?>
	<tr id="r_PatientName">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_PatientName"><script id="tpc_patient_ot_delivery_register_PatientName" type="text/html"><?php echo $patient_ot_delivery_register_view->PatientName->caption() ?></script></span></td>
		<td data-name="PatientName" <?php echo $patient_ot_delivery_register_view->PatientName->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_PatientName" type="text/html"><span id="el_patient_ot_delivery_register_PatientName">
<span<?php echo $patient_ot_delivery_register_view->PatientName->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->PatientName->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->mrnno->Visible) { // mrnno ?>
	<tr id="r_mrnno">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_mrnno"><script id="tpc_patient_ot_delivery_register_mrnno" type="text/html"><?php echo $patient_ot_delivery_register_view->mrnno->caption() ?></script></span></td>
		<td data-name="mrnno" <?php echo $patient_ot_delivery_register_view->mrnno->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_mrnno" type="text/html"><span id="el_patient_ot_delivery_register_mrnno">
<span<?php echo $patient_ot_delivery_register_view->mrnno->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->mrnno->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->MobileNumber->Visible) { // MobileNumber ?>
	<tr id="r_MobileNumber">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_MobileNumber"><script id="tpc_patient_ot_delivery_register_MobileNumber" type="text/html"><?php echo $patient_ot_delivery_register_view->MobileNumber->caption() ?></script></span></td>
		<td data-name="MobileNumber" <?php echo $patient_ot_delivery_register_view->MobileNumber->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_MobileNumber" type="text/html"><span id="el_patient_ot_delivery_register_MobileNumber">
<span<?php echo $patient_ot_delivery_register_view->MobileNumber->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->MobileNumber->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->Age->Visible) { // Age ?>
	<tr id="r_Age">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_Age"><script id="tpc_patient_ot_delivery_register_Age" type="text/html"><?php echo $patient_ot_delivery_register_view->Age->caption() ?></script></span></td>
		<td data-name="Age" <?php echo $patient_ot_delivery_register_view->Age->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_Age" type="text/html"><span id="el_patient_ot_delivery_register_Age">
<span<?php echo $patient_ot_delivery_register_view->Age->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->Age->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->Gender->Visible) { // Gender ?>
	<tr id="r_Gender">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_Gender"><script id="tpc_patient_ot_delivery_register_Gender" type="text/html"><?php echo $patient_ot_delivery_register_view->Gender->caption() ?></script></span></td>
		<td data-name="Gender" <?php echo $patient_ot_delivery_register_view->Gender->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_Gender" type="text/html"><span id="el_patient_ot_delivery_register_Gender">
<span<?php echo $patient_ot_delivery_register_view->Gender->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->Gender->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->profilePic->Visible) { // profilePic ?>
	<tr id="r_profilePic">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_profilePic"><script id="tpc_patient_ot_delivery_register_profilePic" type="text/html"><?php echo $patient_ot_delivery_register_view->profilePic->caption() ?></script></span></td>
		<td data-name="profilePic" <?php echo $patient_ot_delivery_register_view->profilePic->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_profilePic" type="text/html"><span id="el_patient_ot_delivery_register_profilePic">
<span<?php echo $patient_ot_delivery_register_view->profilePic->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->profilePic->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->ObstetricsHistryFeMale->Visible) { // ObstetricsHistryFeMale ?>
	<tr id="r_ObstetricsHistryFeMale">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_ObstetricsHistryFeMale"><script id="tpc_patient_ot_delivery_register_ObstetricsHistryFeMale" type="text/html"><?php echo $patient_ot_delivery_register_view->ObstetricsHistryFeMale->caption() ?></script></span></td>
		<td data-name="ObstetricsHistryFeMale" <?php echo $patient_ot_delivery_register_view->ObstetricsHistryFeMale->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ObstetricsHistryFeMale" type="text/html"><span id="el_patient_ot_delivery_register_ObstetricsHistryFeMale">
<span<?php echo $patient_ot_delivery_register_view->ObstetricsHistryFeMale->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->ObstetricsHistryFeMale->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->Abortion->Visible) { // Abortion ?>
	<tr id="r_Abortion">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_Abortion"><script id="tpc_patient_ot_delivery_register_Abortion" type="text/html"><?php echo $patient_ot_delivery_register_view->Abortion->caption() ?></script></span></td>
		<td data-name="Abortion" <?php echo $patient_ot_delivery_register_view->Abortion->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_Abortion" type="text/html"><span id="el_patient_ot_delivery_register_Abortion">
<span<?php echo $patient_ot_delivery_register_view->Abortion->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->Abortion->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->ChildBirthDate->Visible) { // ChildBirthDate ?>
	<tr id="r_ChildBirthDate">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_ChildBirthDate"><script id="tpc_patient_ot_delivery_register_ChildBirthDate" type="text/html"><?php echo $patient_ot_delivery_register_view->ChildBirthDate->caption() ?></script></span></td>
		<td data-name="ChildBirthDate" <?php echo $patient_ot_delivery_register_view->ChildBirthDate->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ChildBirthDate" type="text/html"><span id="el_patient_ot_delivery_register_ChildBirthDate">
<span<?php echo $patient_ot_delivery_register_view->ChildBirthDate->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->ChildBirthDate->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->ChildBirthTime->Visible) { // ChildBirthTime ?>
	<tr id="r_ChildBirthTime">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_ChildBirthTime"><script id="tpc_patient_ot_delivery_register_ChildBirthTime" type="text/html"><?php echo $patient_ot_delivery_register_view->ChildBirthTime->caption() ?></script></span></td>
		<td data-name="ChildBirthTime" <?php echo $patient_ot_delivery_register_view->ChildBirthTime->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ChildBirthTime" type="text/html"><span id="el_patient_ot_delivery_register_ChildBirthTime">
<span<?php echo $patient_ot_delivery_register_view->ChildBirthTime->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->ChildBirthTime->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->ChildSex->Visible) { // ChildSex ?>
	<tr id="r_ChildSex">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_ChildSex"><script id="tpc_patient_ot_delivery_register_ChildSex" type="text/html"><?php echo $patient_ot_delivery_register_view->ChildSex->caption() ?></script></span></td>
		<td data-name="ChildSex" <?php echo $patient_ot_delivery_register_view->ChildSex->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ChildSex" type="text/html"><span id="el_patient_ot_delivery_register_ChildSex">
<span<?php echo $patient_ot_delivery_register_view->ChildSex->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->ChildSex->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->ChildWt->Visible) { // ChildWt ?>
	<tr id="r_ChildWt">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_ChildWt"><script id="tpc_patient_ot_delivery_register_ChildWt" type="text/html"><?php echo $patient_ot_delivery_register_view->ChildWt->caption() ?></script></span></td>
		<td data-name="ChildWt" <?php echo $patient_ot_delivery_register_view->ChildWt->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ChildWt" type="text/html"><span id="el_patient_ot_delivery_register_ChildWt">
<span<?php echo $patient_ot_delivery_register_view->ChildWt->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->ChildWt->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->ChildDay->Visible) { // ChildDay ?>
	<tr id="r_ChildDay">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_ChildDay"><script id="tpc_patient_ot_delivery_register_ChildDay" type="text/html"><?php echo $patient_ot_delivery_register_view->ChildDay->caption() ?></script></span></td>
		<td data-name="ChildDay" <?php echo $patient_ot_delivery_register_view->ChildDay->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ChildDay" type="text/html"><span id="el_patient_ot_delivery_register_ChildDay">
<span<?php echo $patient_ot_delivery_register_view->ChildDay->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->ChildDay->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->ChildOE->Visible) { // ChildOE ?>
	<tr id="r_ChildOE">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_ChildOE"><script id="tpc_patient_ot_delivery_register_ChildOE" type="text/html"><?php echo $patient_ot_delivery_register_view->ChildOE->caption() ?></script></span></td>
		<td data-name="ChildOE" <?php echo $patient_ot_delivery_register_view->ChildOE->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ChildOE" type="text/html"><span id="el_patient_ot_delivery_register_ChildOE">
<span<?php echo $patient_ot_delivery_register_view->ChildOE->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->ChildOE->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->TypeofDelivery->Visible) { // TypeofDelivery ?>
	<tr id="r_TypeofDelivery">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_TypeofDelivery"><script id="tpc_patient_ot_delivery_register_TypeofDelivery" type="text/html"><?php echo $patient_ot_delivery_register_view->TypeofDelivery->caption() ?></script></span></td>
		<td data-name="TypeofDelivery" <?php echo $patient_ot_delivery_register_view->TypeofDelivery->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_TypeofDelivery" type="text/html"><span id="el_patient_ot_delivery_register_TypeofDelivery">
<span<?php echo $patient_ot_delivery_register_view->TypeofDelivery->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->TypeofDelivery->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->ChildBlGrp->Visible) { // ChildBlGrp ?>
	<tr id="r_ChildBlGrp">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_ChildBlGrp"><script id="tpc_patient_ot_delivery_register_ChildBlGrp" type="text/html"><?php echo $patient_ot_delivery_register_view->ChildBlGrp->caption() ?></script></span></td>
		<td data-name="ChildBlGrp" <?php echo $patient_ot_delivery_register_view->ChildBlGrp->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ChildBlGrp" type="text/html"><span id="el_patient_ot_delivery_register_ChildBlGrp">
<span<?php echo $patient_ot_delivery_register_view->ChildBlGrp->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->ChildBlGrp->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->ApgarScore->Visible) { // ApgarScore ?>
	<tr id="r_ApgarScore">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_ApgarScore"><script id="tpc_patient_ot_delivery_register_ApgarScore" type="text/html"><?php echo $patient_ot_delivery_register_view->ApgarScore->caption() ?></script></span></td>
		<td data-name="ApgarScore" <?php echo $patient_ot_delivery_register_view->ApgarScore->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ApgarScore" type="text/html"><span id="el_patient_ot_delivery_register_ApgarScore">
<span<?php echo $patient_ot_delivery_register_view->ApgarScore->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->ApgarScore->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->birthnotification->Visible) { // birthnotification ?>
	<tr id="r_birthnotification">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_birthnotification"><script id="tpc_patient_ot_delivery_register_birthnotification" type="text/html"><?php echo $patient_ot_delivery_register_view->birthnotification->caption() ?></script></span></td>
		<td data-name="birthnotification" <?php echo $patient_ot_delivery_register_view->birthnotification->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_birthnotification" type="text/html"><span id="el_patient_ot_delivery_register_birthnotification">
<span<?php echo $patient_ot_delivery_register_view->birthnotification->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->birthnotification->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->formno->Visible) { // formno ?>
	<tr id="r_formno">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_formno"><script id="tpc_patient_ot_delivery_register_formno" type="text/html"><?php echo $patient_ot_delivery_register_view->formno->caption() ?></script></span></td>
		<td data-name="formno" <?php echo $patient_ot_delivery_register_view->formno->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_formno" type="text/html"><span id="el_patient_ot_delivery_register_formno">
<span<?php echo $patient_ot_delivery_register_view->formno->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->formno->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->dte->Visible) { // dte ?>
	<tr id="r_dte">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_dte"><script id="tpc_patient_ot_delivery_register_dte" type="text/html"><?php echo $patient_ot_delivery_register_view->dte->caption() ?></script></span></td>
		<td data-name="dte" <?php echo $patient_ot_delivery_register_view->dte->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_dte" type="text/html"><span id="el_patient_ot_delivery_register_dte">
<span<?php echo $patient_ot_delivery_register_view->dte->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->dte->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->motherReligion->Visible) { // motherReligion ?>
	<tr id="r_motherReligion">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_motherReligion"><script id="tpc_patient_ot_delivery_register_motherReligion" type="text/html"><?php echo $patient_ot_delivery_register_view->motherReligion->caption() ?></script></span></td>
		<td data-name="motherReligion" <?php echo $patient_ot_delivery_register_view->motherReligion->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_motherReligion" type="text/html"><span id="el_patient_ot_delivery_register_motherReligion">
<span<?php echo $patient_ot_delivery_register_view->motherReligion->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->motherReligion->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->bloodgroup->Visible) { // bloodgroup ?>
	<tr id="r_bloodgroup">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_bloodgroup"><script id="tpc_patient_ot_delivery_register_bloodgroup" type="text/html"><?php echo $patient_ot_delivery_register_view->bloodgroup->caption() ?></script></span></td>
		<td data-name="bloodgroup" <?php echo $patient_ot_delivery_register_view->bloodgroup->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_bloodgroup" type="text/html"><span id="el_patient_ot_delivery_register_bloodgroup">
<span<?php echo $patient_ot_delivery_register_view->bloodgroup->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->bloodgroup->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_status"><script id="tpc_patient_ot_delivery_register_status" type="text/html"><?php echo $patient_ot_delivery_register_view->status->caption() ?></script></span></td>
		<td data-name="status" <?php echo $patient_ot_delivery_register_view->status->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_status" type="text/html"><span id="el_patient_ot_delivery_register_status">
<span<?php echo $patient_ot_delivery_register_view->status->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->status->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_createdby"><script id="tpc_patient_ot_delivery_register_createdby" type="text/html"><?php echo $patient_ot_delivery_register_view->createdby->caption() ?></script></span></td>
		<td data-name="createdby" <?php echo $patient_ot_delivery_register_view->createdby->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_createdby" type="text/html"><span id="el_patient_ot_delivery_register_createdby">
<span<?php echo $patient_ot_delivery_register_view->createdby->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->createdby->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_createddatetime"><script id="tpc_patient_ot_delivery_register_createddatetime" type="text/html"><?php echo $patient_ot_delivery_register_view->createddatetime->caption() ?></script></span></td>
		<td data-name="createddatetime" <?php echo $patient_ot_delivery_register_view->createddatetime->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_createddatetime" type="text/html"><span id="el_patient_ot_delivery_register_createddatetime">
<span<?php echo $patient_ot_delivery_register_view->createddatetime->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->createddatetime->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_modifiedby"><script id="tpc_patient_ot_delivery_register_modifiedby" type="text/html"><?php echo $patient_ot_delivery_register_view->modifiedby->caption() ?></script></span></td>
		<td data-name="modifiedby" <?php echo $patient_ot_delivery_register_view->modifiedby->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_modifiedby" type="text/html"><span id="el_patient_ot_delivery_register_modifiedby">
<span<?php echo $patient_ot_delivery_register_view->modifiedby->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->modifiedby->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_modifieddatetime"><script id="tpc_patient_ot_delivery_register_modifieddatetime" type="text/html"><?php echo $patient_ot_delivery_register_view->modifieddatetime->caption() ?></script></span></td>
		<td data-name="modifieddatetime" <?php echo $patient_ot_delivery_register_view->modifieddatetime->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_modifieddatetime" type="text/html"><span id="el_patient_ot_delivery_register_modifieddatetime">
<span<?php echo $patient_ot_delivery_register_view->modifieddatetime->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->modifieddatetime->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->PatientID->Visible) { // PatientID ?>
	<tr id="r_PatientID">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_PatientID"><script id="tpc_patient_ot_delivery_register_PatientID" type="text/html"><?php echo $patient_ot_delivery_register_view->PatientID->caption() ?></script></span></td>
		<td data-name="PatientID" <?php echo $patient_ot_delivery_register_view->PatientID->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_PatientID" type="text/html"><span id="el_patient_ot_delivery_register_PatientID">
<span<?php echo $patient_ot_delivery_register_view->PatientID->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->PatientID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_HospID"><script id="tpc_patient_ot_delivery_register_HospID" type="text/html"><?php echo $patient_ot_delivery_register_view->HospID->caption() ?></script></span></td>
		<td data-name="HospID" <?php echo $patient_ot_delivery_register_view->HospID->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_HospID" type="text/html"><span id="el_patient_ot_delivery_register_HospID">
<span<?php echo $patient_ot_delivery_register_view->HospID->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->HospID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->ChildBirthDate1->Visible) { // ChildBirthDate1 ?>
	<tr id="r_ChildBirthDate1">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_ChildBirthDate1"><script id="tpc_patient_ot_delivery_register_ChildBirthDate1" type="text/html"><?php echo $patient_ot_delivery_register_view->ChildBirthDate1->caption() ?></script></span></td>
		<td data-name="ChildBirthDate1" <?php echo $patient_ot_delivery_register_view->ChildBirthDate1->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ChildBirthDate1" type="text/html"><span id="el_patient_ot_delivery_register_ChildBirthDate1">
<span<?php echo $patient_ot_delivery_register_view->ChildBirthDate1->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->ChildBirthDate1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->ChildBirthTime1->Visible) { // ChildBirthTime1 ?>
	<tr id="r_ChildBirthTime1">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_ChildBirthTime1"><script id="tpc_patient_ot_delivery_register_ChildBirthTime1" type="text/html"><?php echo $patient_ot_delivery_register_view->ChildBirthTime1->caption() ?></script></span></td>
		<td data-name="ChildBirthTime1" <?php echo $patient_ot_delivery_register_view->ChildBirthTime1->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ChildBirthTime1" type="text/html"><span id="el_patient_ot_delivery_register_ChildBirthTime1">
<span<?php echo $patient_ot_delivery_register_view->ChildBirthTime1->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->ChildBirthTime1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->ChildSex1->Visible) { // ChildSex1 ?>
	<tr id="r_ChildSex1">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_ChildSex1"><script id="tpc_patient_ot_delivery_register_ChildSex1" type="text/html"><?php echo $patient_ot_delivery_register_view->ChildSex1->caption() ?></script></span></td>
		<td data-name="ChildSex1" <?php echo $patient_ot_delivery_register_view->ChildSex1->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ChildSex1" type="text/html"><span id="el_patient_ot_delivery_register_ChildSex1">
<span<?php echo $patient_ot_delivery_register_view->ChildSex1->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->ChildSex1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->ChildWt1->Visible) { // ChildWt1 ?>
	<tr id="r_ChildWt1">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_ChildWt1"><script id="tpc_patient_ot_delivery_register_ChildWt1" type="text/html"><?php echo $patient_ot_delivery_register_view->ChildWt1->caption() ?></script></span></td>
		<td data-name="ChildWt1" <?php echo $patient_ot_delivery_register_view->ChildWt1->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ChildWt1" type="text/html"><span id="el_patient_ot_delivery_register_ChildWt1">
<span<?php echo $patient_ot_delivery_register_view->ChildWt1->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->ChildWt1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->ChildDay1->Visible) { // ChildDay1 ?>
	<tr id="r_ChildDay1">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_ChildDay1"><script id="tpc_patient_ot_delivery_register_ChildDay1" type="text/html"><?php echo $patient_ot_delivery_register_view->ChildDay1->caption() ?></script></span></td>
		<td data-name="ChildDay1" <?php echo $patient_ot_delivery_register_view->ChildDay1->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ChildDay1" type="text/html"><span id="el_patient_ot_delivery_register_ChildDay1">
<span<?php echo $patient_ot_delivery_register_view->ChildDay1->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->ChildDay1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->ChildOE1->Visible) { // ChildOE1 ?>
	<tr id="r_ChildOE1">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_ChildOE1"><script id="tpc_patient_ot_delivery_register_ChildOE1" type="text/html"><?php echo $patient_ot_delivery_register_view->ChildOE1->caption() ?></script></span></td>
		<td data-name="ChildOE1" <?php echo $patient_ot_delivery_register_view->ChildOE1->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ChildOE1" type="text/html"><span id="el_patient_ot_delivery_register_ChildOE1">
<span<?php echo $patient_ot_delivery_register_view->ChildOE1->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->ChildOE1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->TypeofDelivery1->Visible) { // TypeofDelivery1 ?>
	<tr id="r_TypeofDelivery1">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_TypeofDelivery1"><script id="tpc_patient_ot_delivery_register_TypeofDelivery1" type="text/html"><?php echo $patient_ot_delivery_register_view->TypeofDelivery1->caption() ?></script></span></td>
		<td data-name="TypeofDelivery1" <?php echo $patient_ot_delivery_register_view->TypeofDelivery1->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_TypeofDelivery1" type="text/html"><span id="el_patient_ot_delivery_register_TypeofDelivery1">
<span<?php echo $patient_ot_delivery_register_view->TypeofDelivery1->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->TypeofDelivery1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->ChildBlGrp1->Visible) { // ChildBlGrp1 ?>
	<tr id="r_ChildBlGrp1">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_ChildBlGrp1"><script id="tpc_patient_ot_delivery_register_ChildBlGrp1" type="text/html"><?php echo $patient_ot_delivery_register_view->ChildBlGrp1->caption() ?></script></span></td>
		<td data-name="ChildBlGrp1" <?php echo $patient_ot_delivery_register_view->ChildBlGrp1->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ChildBlGrp1" type="text/html"><span id="el_patient_ot_delivery_register_ChildBlGrp1">
<span<?php echo $patient_ot_delivery_register_view->ChildBlGrp1->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->ChildBlGrp1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->ApgarScore1->Visible) { // ApgarScore1 ?>
	<tr id="r_ApgarScore1">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_ApgarScore1"><script id="tpc_patient_ot_delivery_register_ApgarScore1" type="text/html"><?php echo $patient_ot_delivery_register_view->ApgarScore1->caption() ?></script></span></td>
		<td data-name="ApgarScore1" <?php echo $patient_ot_delivery_register_view->ApgarScore1->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ApgarScore1" type="text/html"><span id="el_patient_ot_delivery_register_ApgarScore1">
<span<?php echo $patient_ot_delivery_register_view->ApgarScore1->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->ApgarScore1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->birthnotification1->Visible) { // birthnotification1 ?>
	<tr id="r_birthnotification1">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_birthnotification1"><script id="tpc_patient_ot_delivery_register_birthnotification1" type="text/html"><?php echo $patient_ot_delivery_register_view->birthnotification1->caption() ?></script></span></td>
		<td data-name="birthnotification1" <?php echo $patient_ot_delivery_register_view->birthnotification1->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_birthnotification1" type="text/html"><span id="el_patient_ot_delivery_register_birthnotification1">
<span<?php echo $patient_ot_delivery_register_view->birthnotification1->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->birthnotification1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->formno1->Visible) { // formno1 ?>
	<tr id="r_formno1">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_formno1"><script id="tpc_patient_ot_delivery_register_formno1" type="text/html"><?php echo $patient_ot_delivery_register_view->formno1->caption() ?></script></span></td>
		<td data-name="formno1" <?php echo $patient_ot_delivery_register_view->formno1->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_formno1" type="text/html"><span id="el_patient_ot_delivery_register_formno1">
<span<?php echo $patient_ot_delivery_register_view->formno1->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->formno1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->proposedSurgery->Visible) { // proposedSurgery ?>
	<tr id="r_proposedSurgery">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_proposedSurgery"><script id="tpc_patient_ot_delivery_register_proposedSurgery" type="text/html"><?php echo $patient_ot_delivery_register_view->proposedSurgery->caption() ?></script></span></td>
		<td data-name="proposedSurgery" <?php echo $patient_ot_delivery_register_view->proposedSurgery->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_proposedSurgery" type="text/html"><span id="el_patient_ot_delivery_register_proposedSurgery">
<span<?php echo $patient_ot_delivery_register_view->proposedSurgery->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->proposedSurgery->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->surgeryProcedure->Visible) { // surgeryProcedure ?>
	<tr id="r_surgeryProcedure">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_surgeryProcedure"><script id="tpc_patient_ot_delivery_register_surgeryProcedure" type="text/html"><?php echo $patient_ot_delivery_register_view->surgeryProcedure->caption() ?></script></span></td>
		<td data-name="surgeryProcedure" <?php echo $patient_ot_delivery_register_view->surgeryProcedure->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_surgeryProcedure" type="text/html"><span id="el_patient_ot_delivery_register_surgeryProcedure">
<span<?php echo $patient_ot_delivery_register_view->surgeryProcedure->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->surgeryProcedure->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->typeOfAnaesthesia->Visible) { // typeOfAnaesthesia ?>
	<tr id="r_typeOfAnaesthesia">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_typeOfAnaesthesia"><script id="tpc_patient_ot_delivery_register_typeOfAnaesthesia" type="text/html"><?php echo $patient_ot_delivery_register_view->typeOfAnaesthesia->caption() ?></script></span></td>
		<td data-name="typeOfAnaesthesia" <?php echo $patient_ot_delivery_register_view->typeOfAnaesthesia->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_typeOfAnaesthesia" type="text/html"><span id="el_patient_ot_delivery_register_typeOfAnaesthesia">
<span<?php echo $patient_ot_delivery_register_view->typeOfAnaesthesia->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->typeOfAnaesthesia->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->RecievedTime->Visible) { // RecievedTime ?>
	<tr id="r_RecievedTime">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_RecievedTime"><script id="tpc_patient_ot_delivery_register_RecievedTime" type="text/html"><?php echo $patient_ot_delivery_register_view->RecievedTime->caption() ?></script></span></td>
		<td data-name="RecievedTime" <?php echo $patient_ot_delivery_register_view->RecievedTime->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_RecievedTime" type="text/html"><span id="el_patient_ot_delivery_register_RecievedTime">
<span<?php echo $patient_ot_delivery_register_view->RecievedTime->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->RecievedTime->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->AnaesthesiaStarted->Visible) { // AnaesthesiaStarted ?>
	<tr id="r_AnaesthesiaStarted">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_AnaesthesiaStarted"><script id="tpc_patient_ot_delivery_register_AnaesthesiaStarted" type="text/html"><?php echo $patient_ot_delivery_register_view->AnaesthesiaStarted->caption() ?></script></span></td>
		<td data-name="AnaesthesiaStarted" <?php echo $patient_ot_delivery_register_view->AnaesthesiaStarted->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_AnaesthesiaStarted" type="text/html"><span id="el_patient_ot_delivery_register_AnaesthesiaStarted">
<span<?php echo $patient_ot_delivery_register_view->AnaesthesiaStarted->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->AnaesthesiaStarted->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->AnaesthesiaEnded->Visible) { // AnaesthesiaEnded ?>
	<tr id="r_AnaesthesiaEnded">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_AnaesthesiaEnded"><script id="tpc_patient_ot_delivery_register_AnaesthesiaEnded" type="text/html"><?php echo $patient_ot_delivery_register_view->AnaesthesiaEnded->caption() ?></script></span></td>
		<td data-name="AnaesthesiaEnded" <?php echo $patient_ot_delivery_register_view->AnaesthesiaEnded->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_AnaesthesiaEnded" type="text/html"><span id="el_patient_ot_delivery_register_AnaesthesiaEnded">
<span<?php echo $patient_ot_delivery_register_view->AnaesthesiaEnded->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->AnaesthesiaEnded->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->surgeryStarted->Visible) { // surgeryStarted ?>
	<tr id="r_surgeryStarted">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_surgeryStarted"><script id="tpc_patient_ot_delivery_register_surgeryStarted" type="text/html"><?php echo $patient_ot_delivery_register_view->surgeryStarted->caption() ?></script></span></td>
		<td data-name="surgeryStarted" <?php echo $patient_ot_delivery_register_view->surgeryStarted->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_surgeryStarted" type="text/html"><span id="el_patient_ot_delivery_register_surgeryStarted">
<span<?php echo $patient_ot_delivery_register_view->surgeryStarted->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->surgeryStarted->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->surgeryEnded->Visible) { // surgeryEnded ?>
	<tr id="r_surgeryEnded">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_surgeryEnded"><script id="tpc_patient_ot_delivery_register_surgeryEnded" type="text/html"><?php echo $patient_ot_delivery_register_view->surgeryEnded->caption() ?></script></span></td>
		<td data-name="surgeryEnded" <?php echo $patient_ot_delivery_register_view->surgeryEnded->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_surgeryEnded" type="text/html"><span id="el_patient_ot_delivery_register_surgeryEnded">
<span<?php echo $patient_ot_delivery_register_view->surgeryEnded->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->surgeryEnded->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->RecoveryTime->Visible) { // RecoveryTime ?>
	<tr id="r_RecoveryTime">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_RecoveryTime"><script id="tpc_patient_ot_delivery_register_RecoveryTime" type="text/html"><?php echo $patient_ot_delivery_register_view->RecoveryTime->caption() ?></script></span></td>
		<td data-name="RecoveryTime" <?php echo $patient_ot_delivery_register_view->RecoveryTime->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_RecoveryTime" type="text/html"><span id="el_patient_ot_delivery_register_RecoveryTime">
<span<?php echo $patient_ot_delivery_register_view->RecoveryTime->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->RecoveryTime->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->ShiftedTime->Visible) { // ShiftedTime ?>
	<tr id="r_ShiftedTime">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_ShiftedTime"><script id="tpc_patient_ot_delivery_register_ShiftedTime" type="text/html"><?php echo $patient_ot_delivery_register_view->ShiftedTime->caption() ?></script></span></td>
		<td data-name="ShiftedTime" <?php echo $patient_ot_delivery_register_view->ShiftedTime->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ShiftedTime" type="text/html"><span id="el_patient_ot_delivery_register_ShiftedTime">
<span<?php echo $patient_ot_delivery_register_view->ShiftedTime->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->ShiftedTime->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->Duration->Visible) { // Duration ?>
	<tr id="r_Duration">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_Duration"><script id="tpc_patient_ot_delivery_register_Duration" type="text/html"><?php echo $patient_ot_delivery_register_view->Duration->caption() ?></script></span></td>
		<td data-name="Duration" <?php echo $patient_ot_delivery_register_view->Duration->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_Duration" type="text/html"><span id="el_patient_ot_delivery_register_Duration">
<span<?php echo $patient_ot_delivery_register_view->Duration->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->Duration->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->DrVisit1->Visible) { // DrVisit1 ?>
	<tr id="r_DrVisit1">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_DrVisit1"><script id="tpc_patient_ot_delivery_register_DrVisit1" type="text/html"><?php echo $patient_ot_delivery_register_view->DrVisit1->caption() ?></script></span></td>
		<td data-name="DrVisit1" <?php echo $patient_ot_delivery_register_view->DrVisit1->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_DrVisit1" type="text/html"><span id="el_patient_ot_delivery_register_DrVisit1">
<span<?php echo $patient_ot_delivery_register_view->DrVisit1->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->DrVisit1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->DrVisit2->Visible) { // DrVisit2 ?>
	<tr id="r_DrVisit2">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_DrVisit2"><script id="tpc_patient_ot_delivery_register_DrVisit2" type="text/html"><?php echo $patient_ot_delivery_register_view->DrVisit2->caption() ?></script></span></td>
		<td data-name="DrVisit2" <?php echo $patient_ot_delivery_register_view->DrVisit2->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_DrVisit2" type="text/html"><span id="el_patient_ot_delivery_register_DrVisit2">
<span<?php echo $patient_ot_delivery_register_view->DrVisit2->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->DrVisit2->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->DrVisit3->Visible) { // DrVisit3 ?>
	<tr id="r_DrVisit3">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_DrVisit3"><script id="tpc_patient_ot_delivery_register_DrVisit3" type="text/html"><?php echo $patient_ot_delivery_register_view->DrVisit3->caption() ?></script></span></td>
		<td data-name="DrVisit3" <?php echo $patient_ot_delivery_register_view->DrVisit3->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_DrVisit3" type="text/html"><span id="el_patient_ot_delivery_register_DrVisit3">
<span<?php echo $patient_ot_delivery_register_view->DrVisit3->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->DrVisit3->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->DrVisit4->Visible) { // DrVisit4 ?>
	<tr id="r_DrVisit4">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_DrVisit4"><script id="tpc_patient_ot_delivery_register_DrVisit4" type="text/html"><?php echo $patient_ot_delivery_register_view->DrVisit4->caption() ?></script></span></td>
		<td data-name="DrVisit4" <?php echo $patient_ot_delivery_register_view->DrVisit4->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_DrVisit4" type="text/html"><span id="el_patient_ot_delivery_register_DrVisit4">
<span<?php echo $patient_ot_delivery_register_view->DrVisit4->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->DrVisit4->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->Surgeon->Visible) { // Surgeon ?>
	<tr id="r_Surgeon">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_Surgeon"><script id="tpc_patient_ot_delivery_register_Surgeon" type="text/html"><?php echo $patient_ot_delivery_register_view->Surgeon->caption() ?></script></span></td>
		<td data-name="Surgeon" <?php echo $patient_ot_delivery_register_view->Surgeon->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_Surgeon" type="text/html"><span id="el_patient_ot_delivery_register_Surgeon">
<span<?php echo $patient_ot_delivery_register_view->Surgeon->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->Surgeon->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->Anaesthetist->Visible) { // Anaesthetist ?>
	<tr id="r_Anaesthetist">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_Anaesthetist"><script id="tpc_patient_ot_delivery_register_Anaesthetist" type="text/html"><?php echo $patient_ot_delivery_register_view->Anaesthetist->caption() ?></script></span></td>
		<td data-name="Anaesthetist" <?php echo $patient_ot_delivery_register_view->Anaesthetist->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_Anaesthetist" type="text/html"><span id="el_patient_ot_delivery_register_Anaesthetist">
<span<?php echo $patient_ot_delivery_register_view->Anaesthetist->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->Anaesthetist->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->AsstSurgeon1->Visible) { // AsstSurgeon1 ?>
	<tr id="r_AsstSurgeon1">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_AsstSurgeon1"><script id="tpc_patient_ot_delivery_register_AsstSurgeon1" type="text/html"><?php echo $patient_ot_delivery_register_view->AsstSurgeon1->caption() ?></script></span></td>
		<td data-name="AsstSurgeon1" <?php echo $patient_ot_delivery_register_view->AsstSurgeon1->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_AsstSurgeon1" type="text/html"><span id="el_patient_ot_delivery_register_AsstSurgeon1">
<span<?php echo $patient_ot_delivery_register_view->AsstSurgeon1->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->AsstSurgeon1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->AsstSurgeon2->Visible) { // AsstSurgeon2 ?>
	<tr id="r_AsstSurgeon2">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_AsstSurgeon2"><script id="tpc_patient_ot_delivery_register_AsstSurgeon2" type="text/html"><?php echo $patient_ot_delivery_register_view->AsstSurgeon2->caption() ?></script></span></td>
		<td data-name="AsstSurgeon2" <?php echo $patient_ot_delivery_register_view->AsstSurgeon2->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_AsstSurgeon2" type="text/html"><span id="el_patient_ot_delivery_register_AsstSurgeon2">
<span<?php echo $patient_ot_delivery_register_view->AsstSurgeon2->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->AsstSurgeon2->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->paediatric->Visible) { // paediatric ?>
	<tr id="r_paediatric">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_paediatric"><script id="tpc_patient_ot_delivery_register_paediatric" type="text/html"><?php echo $patient_ot_delivery_register_view->paediatric->caption() ?></script></span></td>
		<td data-name="paediatric" <?php echo $patient_ot_delivery_register_view->paediatric->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_paediatric" type="text/html"><span id="el_patient_ot_delivery_register_paediatric">
<span<?php echo $patient_ot_delivery_register_view->paediatric->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->paediatric->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->ScrubNurse1->Visible) { // ScrubNurse1 ?>
	<tr id="r_ScrubNurse1">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_ScrubNurse1"><script id="tpc_patient_ot_delivery_register_ScrubNurse1" type="text/html"><?php echo $patient_ot_delivery_register_view->ScrubNurse1->caption() ?></script></span></td>
		<td data-name="ScrubNurse1" <?php echo $patient_ot_delivery_register_view->ScrubNurse1->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ScrubNurse1" type="text/html"><span id="el_patient_ot_delivery_register_ScrubNurse1">
<span<?php echo $patient_ot_delivery_register_view->ScrubNurse1->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->ScrubNurse1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->ScrubNurse2->Visible) { // ScrubNurse2 ?>
	<tr id="r_ScrubNurse2">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_ScrubNurse2"><script id="tpc_patient_ot_delivery_register_ScrubNurse2" type="text/html"><?php echo $patient_ot_delivery_register_view->ScrubNurse2->caption() ?></script></span></td>
		<td data-name="ScrubNurse2" <?php echo $patient_ot_delivery_register_view->ScrubNurse2->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_ScrubNurse2" type="text/html"><span id="el_patient_ot_delivery_register_ScrubNurse2">
<span<?php echo $patient_ot_delivery_register_view->ScrubNurse2->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->ScrubNurse2->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->FloorNurse->Visible) { // FloorNurse ?>
	<tr id="r_FloorNurse">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_FloorNurse"><script id="tpc_patient_ot_delivery_register_FloorNurse" type="text/html"><?php echo $patient_ot_delivery_register_view->FloorNurse->caption() ?></script></span></td>
		<td data-name="FloorNurse" <?php echo $patient_ot_delivery_register_view->FloorNurse->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_FloorNurse" type="text/html"><span id="el_patient_ot_delivery_register_FloorNurse">
<span<?php echo $patient_ot_delivery_register_view->FloorNurse->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->FloorNurse->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->Technician->Visible) { // Technician ?>
	<tr id="r_Technician">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_Technician"><script id="tpc_patient_ot_delivery_register_Technician" type="text/html"><?php echo $patient_ot_delivery_register_view->Technician->caption() ?></script></span></td>
		<td data-name="Technician" <?php echo $patient_ot_delivery_register_view->Technician->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_Technician" type="text/html"><span id="el_patient_ot_delivery_register_Technician">
<span<?php echo $patient_ot_delivery_register_view->Technician->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->Technician->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->HouseKeeping->Visible) { // HouseKeeping ?>
	<tr id="r_HouseKeeping">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_HouseKeeping"><script id="tpc_patient_ot_delivery_register_HouseKeeping" type="text/html"><?php echo $patient_ot_delivery_register_view->HouseKeeping->caption() ?></script></span></td>
		<td data-name="HouseKeeping" <?php echo $patient_ot_delivery_register_view->HouseKeeping->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_HouseKeeping" type="text/html"><span id="el_patient_ot_delivery_register_HouseKeeping">
<span<?php echo $patient_ot_delivery_register_view->HouseKeeping->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->HouseKeeping->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->countsCheckedMops->Visible) { // countsCheckedMops ?>
	<tr id="r_countsCheckedMops">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_countsCheckedMops"><script id="tpc_patient_ot_delivery_register_countsCheckedMops" type="text/html"><?php echo $patient_ot_delivery_register_view->countsCheckedMops->caption() ?></script></span></td>
		<td data-name="countsCheckedMops" <?php echo $patient_ot_delivery_register_view->countsCheckedMops->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_countsCheckedMops" type="text/html"><span id="el_patient_ot_delivery_register_countsCheckedMops">
<span<?php echo $patient_ot_delivery_register_view->countsCheckedMops->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->countsCheckedMops->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->gauze->Visible) { // gauze ?>
	<tr id="r_gauze">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_gauze"><script id="tpc_patient_ot_delivery_register_gauze" type="text/html"><?php echo $patient_ot_delivery_register_view->gauze->caption() ?></script></span></td>
		<td data-name="gauze" <?php echo $patient_ot_delivery_register_view->gauze->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_gauze" type="text/html"><span id="el_patient_ot_delivery_register_gauze">
<span<?php echo $patient_ot_delivery_register_view->gauze->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->gauze->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->needles->Visible) { // needles ?>
	<tr id="r_needles">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_needles"><script id="tpc_patient_ot_delivery_register_needles" type="text/html"><?php echo $patient_ot_delivery_register_view->needles->caption() ?></script></span></td>
		<td data-name="needles" <?php echo $patient_ot_delivery_register_view->needles->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_needles" type="text/html"><span id="el_patient_ot_delivery_register_needles">
<span<?php echo $patient_ot_delivery_register_view->needles->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->needles->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->bloodloss->Visible) { // bloodloss ?>
	<tr id="r_bloodloss">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_bloodloss"><script id="tpc_patient_ot_delivery_register_bloodloss" type="text/html"><?php echo $patient_ot_delivery_register_view->bloodloss->caption() ?></script></span></td>
		<td data-name="bloodloss" <?php echo $patient_ot_delivery_register_view->bloodloss->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_bloodloss" type="text/html"><span id="el_patient_ot_delivery_register_bloodloss">
<span<?php echo $patient_ot_delivery_register_view->bloodloss->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->bloodloss->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->bloodtransfusion->Visible) { // bloodtransfusion ?>
	<tr id="r_bloodtransfusion">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_bloodtransfusion"><script id="tpc_patient_ot_delivery_register_bloodtransfusion" type="text/html"><?php echo $patient_ot_delivery_register_view->bloodtransfusion->caption() ?></script></span></td>
		<td data-name="bloodtransfusion" <?php echo $patient_ot_delivery_register_view->bloodtransfusion->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_bloodtransfusion" type="text/html"><span id="el_patient_ot_delivery_register_bloodtransfusion">
<span<?php echo $patient_ot_delivery_register_view->bloodtransfusion->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->bloodtransfusion->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->implantsUsed->Visible) { // implantsUsed ?>
	<tr id="r_implantsUsed">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_implantsUsed"><script id="tpc_patient_ot_delivery_register_implantsUsed" type="text/html"><?php echo $patient_ot_delivery_register_view->implantsUsed->caption() ?></script></span></td>
		<td data-name="implantsUsed" <?php echo $patient_ot_delivery_register_view->implantsUsed->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_implantsUsed" type="text/html"><span id="el_patient_ot_delivery_register_implantsUsed">
<span<?php echo $patient_ot_delivery_register_view->implantsUsed->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->implantsUsed->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->MaterialsForHPE->Visible) { // MaterialsForHPE ?>
	<tr id="r_MaterialsForHPE">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_MaterialsForHPE"><script id="tpc_patient_ot_delivery_register_MaterialsForHPE" type="text/html"><?php echo $patient_ot_delivery_register_view->MaterialsForHPE->caption() ?></script></span></td>
		<td data-name="MaterialsForHPE" <?php echo $patient_ot_delivery_register_view->MaterialsForHPE->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_MaterialsForHPE" type="text/html"><span id="el_patient_ot_delivery_register_MaterialsForHPE">
<span<?php echo $patient_ot_delivery_register_view->MaterialsForHPE->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->MaterialsForHPE->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->Reception->Visible) { // Reception ?>
	<tr id="r_Reception">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_Reception"><script id="tpc_patient_ot_delivery_register_Reception" type="text/html"><?php echo $patient_ot_delivery_register_view->Reception->caption() ?></script></span></td>
		<td data-name="Reception" <?php echo $patient_ot_delivery_register_view->Reception->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_Reception" type="text/html"><span id="el_patient_ot_delivery_register_Reception">
<span<?php echo $patient_ot_delivery_register_view->Reception->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->Reception->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->PId->Visible) { // PId ?>
	<tr id="r_PId">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_PId"><script id="tpc_patient_ot_delivery_register_PId" type="text/html"><?php echo $patient_ot_delivery_register_view->PId->caption() ?></script></span></td>
		<td data-name="PId" <?php echo $patient_ot_delivery_register_view->PId->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_PId" type="text/html"><span id="el_patient_ot_delivery_register_PId">
<span<?php echo $patient_ot_delivery_register_view->PId->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->PId->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_delivery_register_view->PatientSearch->Visible) { // PatientSearch ?>
	<tr id="r_PatientSearch">
		<td class="<?php echo $patient_ot_delivery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_PatientSearch"><script id="tpc_patient_ot_delivery_register_PatientSearch" type="text/html"><?php echo $patient_ot_delivery_register_view->PatientSearch->caption() ?></script></span></td>
		<td data-name="PatientSearch" <?php echo $patient_ot_delivery_register_view->PatientSearch->cellAttributes() ?>>
<script id="tpx_patient_ot_delivery_register_PatientSearch" type="text/html"><span id="el_patient_ot_delivery_register_PatientSearch">
<span<?php echo $patient_ot_delivery_register_view->PatientSearch->viewAttributes() ?>><?php echo $patient_ot_delivery_register_view->PatientSearch->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_patient_ot_delivery_registerview" class="ew-custom-template"></div>
<script id="tpm_patient_ot_delivery_registerview" type="text/html">
<div id="ct_patient_ot_delivery_register_view"><style>
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
</style>
	<?php
	$fk_id = $_GET["fk_id"] ;
	$fk_patient_id = $_GET["fk_patient_id"] ;
	$fk_mrnNo = $_GET["fk_mrnNo"] ;
	$dbhelper = &DbHelper();
	$Tid = $_GET["fk_patient_id"] ;
	if($Tid == "")
	{
		$vviid = $_GET["id"] ;
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_ot_delivery_register where id='".$vviid."'; ";
		$resuVi = $dbhelper->ExecuteRows($sql);
		$Tid = $resuVi[0]["PatientId"];
				if($Tid == null)
		{
$Tid = $resuVi[0]["PId"];
		}
		$fk_mrnNo = $resuVi[0]["mrnno"];
	}
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$Tid."'; ";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["profilePic"] == "")
	{
		$PatientProfilePic = "hims\profile-picture.png";
	}else{
		$PatientProfilePic = $results1[0]["profilePic"];
	}
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$Tid."'; ";
	$results1 = $dbhelper->ExecuteRows($sql);
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$Tid."'; ";
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
{{include tmpl="#tpc_patient_ot_delivery_register_PatientSearch"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_PatientSearch")/}}	
<p id="profilePic" hidden>{{include tmpl="#tpc_patient_ot_delivery_register_profilePic"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_profilePic")/}}</p>
<p id="SurfaceArea" hidden>{{include tmpl=~getTemplate("#tpx_SurfaceArea")/}}</p>
<p id="BodyMassIndex" hidden>{{include tmpl=~getTemplate("#tpx_BodyMassIndex")/}}</p>
<p id="idmrnnokk" hidden>{{include tmpl="#tpc_patient_ot_delivery_register_mrnno"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_mrnno")/}}</p>
<div hidden>
  <p>{{include tmpl="#tpc_patient_ot_delivery_register_Reception"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_Reception")/}}</p> 
  <p>{{include tmpl="#tpc_patient_ot_delivery_register_PatientID"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_PatientID")/}}</p> 
  <p>{{include tmpl="#tpc_patient_ot_delivery_register_PatientName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_PatientName")/}}</p> 
  <p>{{include tmpl="#tpc_patient_ot_delivery_register_Age"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_Age")/}}</p> 
  <p>{{include tmpl="#tpc_patient_ot_delivery_register_Gender"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_Gender")/}}</p>
  <p>{{include tmpl="#tpc_patient_ot_delivery_register_PatID"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_PatID")/}}</p>
  <p>{{include tmpl="#tpc_patient_ot_delivery_register_MobileNumber"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_MobileNumber")/}}</p> 
   <p>{{include tmpl="#tpc_patient_ot_delivery_register_PId"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_PId")/}}</p>
</div>
	<div class="row">
<div id="patientdataview" class="col-md-12">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
			  <!-- Add the bg color to the header using any of the bg-* classes -->
			  <div class="widget-user-header bg-warning">
			  	<h4 class="widget-user-username"><span id="SemPatientId" class="ew-cell">Patient Id : <?php echo $results2[0]["PatientID"]; ?></span></h4>
				<h4 class="widget-user-username"><span id="SemPatientPatientName" class="ew-cell">Patient Name : <?php echo $results2[0]["first_name"]; ?></span></h4>
				<h6 class="widget-user-desc"><span id="SemPatientGender" class="ew-cell">Gender : <?php echo $results2[0]["gender"]; ?></span></h6>	
				<h6 class="widget-user-desc"><span id="SemPatientBloodGroup" class="ew-cell">Blood Group : <?php echo $results2[0]["blood_group"]; ?></span></h6>
			  </div>
			  <div class="widget-user-image">
			   		<img id="profilePicturePatient"  class="img-circle elevation-2" src='<?php echo "uploads/".$PatientProfilePic; ?>' alt="User Avatar"> 
			  </div>
			  <div class="card-footer">
				<div class="row">
				<div class="col-sm-4">
					<div class="description-block">
					  <h5 id="SemPatientEmail" class="description-header">MRN No : <?php echo $fk_mrnNo; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span id="SemPatientAge" class="ew-cell">Age : <?php echo AgeCalculationb($results2[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 id="SemPatientMobile" class="description-header">Mobile : <?php echo $results2[0]["mobile_no"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				</div>
				<!-- /.row -->
			  </div>
			</div>
			<!-- /.widget-user -->
</div>
</div>
<div class="row">
		 <div class="col-lg-6">
			<div class="card bg-info">             
			  <div class="card-body">
				<table  style="width: 100%;"  class="ew-table">
					<tbody>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ObstetricsHistryFeMale"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_ObstetricsHistryFeMale")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_Abortion"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_Abortion")/}}</td></tr>					
					</tbody>
				</table>
			  </div>
			</div>
		 </div>
		  <!-- /.col-md-6 -->
		<div class="col-lg-6">
			<div class="card bg-success">             
			  <div class="card-body">
			  <table  style="width: 100%;"  class="ew-table">
					<tbody>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_dte"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_dte")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_motherReligion"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_motherReligion")/}}</td></tr>
					</tbody>
				</table>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
  <div class="row">
		 <div class="col-lg-6">
			<div class="card bg-info">             
			  <div class="card-body">
				<table  style="width: 100%;"  class="ew-table">
					<tbody>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ChildBirthDate"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_ChildBirthDate")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ChildBirthTime"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_ChildBirthTime")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ChildSex"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_ChildSex")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ChildWt"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_ChildWt")/}}</td></tr>
											<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ChildDay"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_ChildDay")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ChildOE"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_ChildOE")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_TypeofDelivery"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_TypeofDelivery")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ChildBlGrp"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_ChildBlGrp")/}}</td></tr>
												<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ApgarScore"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_ApgarScore")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_birthnotification"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_birthnotification")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_formno"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_formno")/}}</td></tr>
					</tbody>
				</table>
			  </div>
			</div>
		 </div>
		  <!-- /.col-md-6 -->
		<div class="col-lg-6">
			<div class="card bg-success">             
			  <div class="card-body">
			  <table  style="width: 100%;"  class="ew-table">
					<tbody>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ChildBirthDate1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_ChildBirthDate1")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ChildBirthTime1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_ChildBirthTime1")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ChildSex1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_ChildSex1")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ChildWt1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_ChildWt1")/}}</td></tr>
											<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ChildDay1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_ChildDay1")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ChildOE1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_ChildOE1")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_TypeofDelivery1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_TypeofDelivery1")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ChildBlGrp1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_ChildBlGrp1")/}}</td></tr>
												<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ApgarScore1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_ApgarScore1")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_birthnotification1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_birthnotification1")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_formno1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_formno1")/}}</td></tr>
					</tbody>
				</table>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
<div class="row">
		 <div class="col-lg-6">
			<div class="card bg-info">             
			  <div class="card-body">
				<table  style="width: 100%;"  class="ew-table">
					<tbody>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_bloodgroup"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_bloodgroup")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_proposedSurgery"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_proposedSurgery")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_surgeryProcedure"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_surgeryProcedure")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_typeOfAnaesthesia"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_typeOfAnaesthesia")/}}</td></tr>
					</tbody>
				</table>
			  </div>
			</div>
		 </div>
		  <!-- /.col-md-6 -->
		<div class="col-lg-6">
			<div class="card bg-success">             
			  <div class="card-body">
			  <table  style="width: 100%;"  class="ew-table">
					<tbody>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_RecievedTime"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_RecievedTime")/}}</td></tr>
							<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_AnaesthesiaStarted"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_AnaesthesiaStarted")/}}</td></tr>
							<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_AnaesthesiaEnded"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_AnaesthesiaEnded")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_surgeryStarted"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_surgeryStarted")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_surgeryEnded"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_surgeryEnded")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_RecoveryTime"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_RecoveryTime")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ShiftedTime"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_ShiftedTime")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_Duration"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_Duration")/}}</td></tr>
					</tbody>
				</table>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
<div class="row">
		 <div class="col-lg-6">
			<div class="card bg-info">             
			  <div class="card-body">
				<table  style="width: 100%;"  class="ew-table">
					<tbody>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_DrVisit1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_DrVisit1")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_DrVisit2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_DrVisit2")/}}</td></tr>					
					</tbody>
				</table>
			  </div>
			</div>
		 </div>
		  <!-- /.col-md-6 -->
		<div class="col-lg-6">
			<div class="card bg-success">             
			  <div class="card-body">
			  <table  style="width: 100%;"  class="ew-table">
					<tbody>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_DrVisit3"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_DrVisit3")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_DrVisit4"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_DrVisit4")/}}</td></tr>
					</tbody>
				</table>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
<div class="row">
		 <div class="col-lg-6">
			<div class="card bg-info">             
			  <div class="card-body">
				<table  style="width: 100%;"  class="ew-table">
					<tbody>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_Surgeon"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_Surgeon")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_Anaesthetist"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_Anaesthetist")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_AsstSurgeon1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_AsstSurgeon1")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_AsstSurgeon2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_AsstSurgeon2")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_paediatric"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_paediatric")/}}</td></tr>
					</tbody>
				</table>
			  </div>
			</div>
		 </div>
		  <!-- /.col-md-6 -->
		<div class="col-lg-6">
			<div class="card bg-success">             
			  <div class="card-body">
			  <table  style="width: 100%;"  class="ew-table">
					<tbody>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ScrubNurse1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_ScrubNurse1")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_ScrubNurse2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_ScrubNurse2")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_FloorNurse"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_FloorNurse")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_Technician"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_Technician")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_HouseKeeping"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_HouseKeeping")/}}</td></tr>
					</tbody>
				</table>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
<div class="row">
		 <div class="col-lg-6">
			<div class="card bg-info">             
			  <div class="card-body">
				<table  style="width: 100%;"  class="ew-table">
					<tbody>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_countsCheckedMops"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_countsCheckedMops")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_gauze"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_gauze")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_needles"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_needles")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_bloodloss"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_bloodloss")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_bloodtransfusion"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_bloodtransfusion")/}}</td></tr>
					</tbody>
				</table>
			  </div>
			</div>
		 </div>
		  <!-- /.col-md-6 -->
		<div class="col-lg-6">
			<div class="card bg-success">             
			  <div class="card-body">
			  <table  style="width: 100%;"  class="ew-table">
					<tbody>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_implantsUsed"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_implantsUsed")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_delivery_register_MaterialsForHPE"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ot_delivery_register_MaterialsForHPE")/}}</td></tr>
					</tbody>
				</table>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
</div>
</script>

</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($patient_ot_delivery_register->Rows) ?> };
	ew.applyTemplate("tpd_patient_ot_delivery_registerview", "tpm_patient_ot_delivery_registerview", "patient_ot_delivery_registerview", "<?php echo $patient_ot_delivery_register->CustomExport ?>", ew.templateData.rows[0]);
	$("script.patient_ot_delivery_registerview_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$patient_ot_delivery_register_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$patient_ot_delivery_register_view->isExport()) { ?>
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
$patient_ot_delivery_register_view->terminate();
?>