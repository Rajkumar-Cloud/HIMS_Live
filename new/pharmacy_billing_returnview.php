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
$pharmacy_billing_return_view = new pharmacy_billing_return_view();

// Run the page
$pharmacy_billing_return_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_billing_return_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pharmacy_billing_return_view->isExport()) { ?>
<script>
var fpharmacy_billing_returnview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fpharmacy_billing_returnview = currentForm = new ew.Form("fpharmacy_billing_returnview", "view");
	loadjs.done("fpharmacy_billing_returnview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$pharmacy_billing_return_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $pharmacy_billing_return_view->ExportOptions->render("body") ?>
<?php $pharmacy_billing_return_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $pharmacy_billing_return_view->showPageHeader(); ?>
<?php
$pharmacy_billing_return_view->showMessage();
?>
<form name="fpharmacy_billing_returnview" id="fpharmacy_billing_returnview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_billing_return">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_billing_return_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($pharmacy_billing_return_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $pharmacy_billing_return_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_return_id"><script id="tpc_pharmacy_billing_return_id" type="text/html"><?php echo $pharmacy_billing_return_view->id->caption() ?></script></span></td>
		<td data-name="id" <?php echo $pharmacy_billing_return_view->id->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_id" type="text/html"><span id="el_pharmacy_billing_return_id">
<span<?php echo $pharmacy_billing_return_view->id->viewAttributes() ?>><?php echo $pharmacy_billing_return_view->id->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_return_view->Reception->Visible) { // Reception ?>
	<tr id="r_Reception">
		<td class="<?php echo $pharmacy_billing_return_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_return_Reception"><script id="tpc_pharmacy_billing_return_Reception" type="text/html"><?php echo $pharmacy_billing_return_view->Reception->caption() ?></script></span></td>
		<td data-name="Reception" <?php echo $pharmacy_billing_return_view->Reception->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_Reception" type="text/html"><span id="el_pharmacy_billing_return_Reception">
<span<?php echo $pharmacy_billing_return_view->Reception->viewAttributes() ?>><?php echo $pharmacy_billing_return_view->Reception->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_return_view->PatientId->Visible) { // PatientId ?>
	<tr id="r_PatientId">
		<td class="<?php echo $pharmacy_billing_return_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_return_PatientId"><script id="tpc_pharmacy_billing_return_PatientId" type="text/html"><?php echo $pharmacy_billing_return_view->PatientId->caption() ?></script></span></td>
		<td data-name="PatientId" <?php echo $pharmacy_billing_return_view->PatientId->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_PatientId" type="text/html"><span id="el_pharmacy_billing_return_PatientId">
<span<?php echo $pharmacy_billing_return_view->PatientId->viewAttributes() ?>><?php echo $pharmacy_billing_return_view->PatientId->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_return_view->mrnno->Visible) { // mrnno ?>
	<tr id="r_mrnno">
		<td class="<?php echo $pharmacy_billing_return_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_return_mrnno"><script id="tpc_pharmacy_billing_return_mrnno" type="text/html"><?php echo $pharmacy_billing_return_view->mrnno->caption() ?></script></span></td>
		<td data-name="mrnno" <?php echo $pharmacy_billing_return_view->mrnno->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_mrnno" type="text/html"><span id="el_pharmacy_billing_return_mrnno">
<span<?php echo $pharmacy_billing_return_view->mrnno->viewAttributes() ?>><?php echo $pharmacy_billing_return_view->mrnno->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_return_view->PatientName->Visible) { // PatientName ?>
	<tr id="r_PatientName">
		<td class="<?php echo $pharmacy_billing_return_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_return_PatientName"><script id="tpc_pharmacy_billing_return_PatientName" type="text/html"><?php echo $pharmacy_billing_return_view->PatientName->caption() ?></script></span></td>
		<td data-name="PatientName" <?php echo $pharmacy_billing_return_view->PatientName->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_PatientName" type="text/html"><span id="el_pharmacy_billing_return_PatientName">
<span<?php echo $pharmacy_billing_return_view->PatientName->viewAttributes() ?>><?php echo $pharmacy_billing_return_view->PatientName->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_return_view->Age->Visible) { // Age ?>
	<tr id="r_Age">
		<td class="<?php echo $pharmacy_billing_return_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_return_Age"><script id="tpc_pharmacy_billing_return_Age" type="text/html"><?php echo $pharmacy_billing_return_view->Age->caption() ?></script></span></td>
		<td data-name="Age" <?php echo $pharmacy_billing_return_view->Age->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_Age" type="text/html"><span id="el_pharmacy_billing_return_Age">
<span<?php echo $pharmacy_billing_return_view->Age->viewAttributes() ?>><?php echo $pharmacy_billing_return_view->Age->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_return_view->Gender->Visible) { // Gender ?>
	<tr id="r_Gender">
		<td class="<?php echo $pharmacy_billing_return_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_return_Gender"><script id="tpc_pharmacy_billing_return_Gender" type="text/html"><?php echo $pharmacy_billing_return_view->Gender->caption() ?></script></span></td>
		<td data-name="Gender" <?php echo $pharmacy_billing_return_view->Gender->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_Gender" type="text/html"><span id="el_pharmacy_billing_return_Gender">
<span<?php echo $pharmacy_billing_return_view->Gender->viewAttributes() ?>><?php echo $pharmacy_billing_return_view->Gender->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_return_view->profilePic->Visible) { // profilePic ?>
	<tr id="r_profilePic">
		<td class="<?php echo $pharmacy_billing_return_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_return_profilePic"><script id="tpc_pharmacy_billing_return_profilePic" type="text/html"><?php echo $pharmacy_billing_return_view->profilePic->caption() ?></script></span></td>
		<td data-name="profilePic" <?php echo $pharmacy_billing_return_view->profilePic->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_profilePic" type="text/html"><span id="el_pharmacy_billing_return_profilePic">
<span<?php echo $pharmacy_billing_return_view->profilePic->viewAttributes() ?>><?php echo $pharmacy_billing_return_view->profilePic->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_return_view->Mobile->Visible) { // Mobile ?>
	<tr id="r_Mobile">
		<td class="<?php echo $pharmacy_billing_return_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_return_Mobile"><script id="tpc_pharmacy_billing_return_Mobile" type="text/html"><?php echo $pharmacy_billing_return_view->Mobile->caption() ?></script></span></td>
		<td data-name="Mobile" <?php echo $pharmacy_billing_return_view->Mobile->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_Mobile" type="text/html"><span id="el_pharmacy_billing_return_Mobile">
<span<?php echo $pharmacy_billing_return_view->Mobile->viewAttributes() ?>><?php echo $pharmacy_billing_return_view->Mobile->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_return_view->IP_OP->Visible) { // IP_OP ?>
	<tr id="r_IP_OP">
		<td class="<?php echo $pharmacy_billing_return_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_return_IP_OP"><script id="tpc_pharmacy_billing_return_IP_OP" type="text/html"><?php echo $pharmacy_billing_return_view->IP_OP->caption() ?></script></span></td>
		<td data-name="IP_OP" <?php echo $pharmacy_billing_return_view->IP_OP->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_IP_OP" type="text/html"><span id="el_pharmacy_billing_return_IP_OP">
<span<?php echo $pharmacy_billing_return_view->IP_OP->viewAttributes() ?>><?php echo $pharmacy_billing_return_view->IP_OP->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_return_view->Doctor->Visible) { // Doctor ?>
	<tr id="r_Doctor">
		<td class="<?php echo $pharmacy_billing_return_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_return_Doctor"><script id="tpc_pharmacy_billing_return_Doctor" type="text/html"><?php echo $pharmacy_billing_return_view->Doctor->caption() ?></script></span></td>
		<td data-name="Doctor" <?php echo $pharmacy_billing_return_view->Doctor->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_Doctor" type="text/html"><span id="el_pharmacy_billing_return_Doctor">
<span<?php echo $pharmacy_billing_return_view->Doctor->viewAttributes() ?>><?php echo $pharmacy_billing_return_view->Doctor->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_return_view->voucher_type->Visible) { // voucher_type ?>
	<tr id="r_voucher_type">
		<td class="<?php echo $pharmacy_billing_return_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_return_voucher_type"><script id="tpc_pharmacy_billing_return_voucher_type" type="text/html"><?php echo $pharmacy_billing_return_view->voucher_type->caption() ?></script></span></td>
		<td data-name="voucher_type" <?php echo $pharmacy_billing_return_view->voucher_type->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_voucher_type" type="text/html"><span id="el_pharmacy_billing_return_voucher_type">
<span<?php echo $pharmacy_billing_return_view->voucher_type->viewAttributes() ?>><?php echo $pharmacy_billing_return_view->voucher_type->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_return_view->Details->Visible) { // Details ?>
	<tr id="r_Details">
		<td class="<?php echo $pharmacy_billing_return_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_return_Details"><script id="tpc_pharmacy_billing_return_Details" type="text/html"><?php echo $pharmacy_billing_return_view->Details->caption() ?></script></span></td>
		<td data-name="Details" <?php echo $pharmacy_billing_return_view->Details->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_Details" type="text/html"><span id="el_pharmacy_billing_return_Details">
<span<?php echo $pharmacy_billing_return_view->Details->viewAttributes() ?>><?php echo $pharmacy_billing_return_view->Details->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_return_view->ModeofPayment->Visible) { // ModeofPayment ?>
	<tr id="r_ModeofPayment">
		<td class="<?php echo $pharmacy_billing_return_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_return_ModeofPayment"><script id="tpc_pharmacy_billing_return_ModeofPayment" type="text/html"><?php echo $pharmacy_billing_return_view->ModeofPayment->caption() ?></script></span></td>
		<td data-name="ModeofPayment" <?php echo $pharmacy_billing_return_view->ModeofPayment->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_ModeofPayment" type="text/html"><span id="el_pharmacy_billing_return_ModeofPayment">
<span<?php echo $pharmacy_billing_return_view->ModeofPayment->viewAttributes() ?>><?php echo $pharmacy_billing_return_view->ModeofPayment->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_return_view->Amount->Visible) { // Amount ?>
	<tr id="r_Amount">
		<td class="<?php echo $pharmacy_billing_return_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_return_Amount"><script id="tpc_pharmacy_billing_return_Amount" type="text/html"><?php echo $pharmacy_billing_return_view->Amount->caption() ?></script></span></td>
		<td data-name="Amount" <?php echo $pharmacy_billing_return_view->Amount->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_Amount" type="text/html"><span id="el_pharmacy_billing_return_Amount">
<span<?php echo $pharmacy_billing_return_view->Amount->viewAttributes() ?>><?php echo $pharmacy_billing_return_view->Amount->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_return_view->AnyDues->Visible) { // AnyDues ?>
	<tr id="r_AnyDues">
		<td class="<?php echo $pharmacy_billing_return_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_return_AnyDues"><script id="tpc_pharmacy_billing_return_AnyDues" type="text/html"><?php echo $pharmacy_billing_return_view->AnyDues->caption() ?></script></span></td>
		<td data-name="AnyDues" <?php echo $pharmacy_billing_return_view->AnyDues->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_AnyDues" type="text/html"><span id="el_pharmacy_billing_return_AnyDues">
<span<?php echo $pharmacy_billing_return_view->AnyDues->viewAttributes() ?>><?php echo $pharmacy_billing_return_view->AnyDues->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_return_view->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $pharmacy_billing_return_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_return_createdby"><script id="tpc_pharmacy_billing_return_createdby" type="text/html"><?php echo $pharmacy_billing_return_view->createdby->caption() ?></script></span></td>
		<td data-name="createdby" <?php echo $pharmacy_billing_return_view->createdby->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_createdby" type="text/html"><span id="el_pharmacy_billing_return_createdby">
<span<?php echo $pharmacy_billing_return_view->createdby->viewAttributes() ?>><?php echo $pharmacy_billing_return_view->createdby->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_return_view->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $pharmacy_billing_return_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_return_createddatetime"><script id="tpc_pharmacy_billing_return_createddatetime" type="text/html"><?php echo $pharmacy_billing_return_view->createddatetime->caption() ?></script></span></td>
		<td data-name="createddatetime" <?php echo $pharmacy_billing_return_view->createddatetime->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_createddatetime" type="text/html"><span id="el_pharmacy_billing_return_createddatetime">
<span<?php echo $pharmacy_billing_return_view->createddatetime->viewAttributes() ?>><?php echo $pharmacy_billing_return_view->createddatetime->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_return_view->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $pharmacy_billing_return_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_return_modifiedby"><script id="tpc_pharmacy_billing_return_modifiedby" type="text/html"><?php echo $pharmacy_billing_return_view->modifiedby->caption() ?></script></span></td>
		<td data-name="modifiedby" <?php echo $pharmacy_billing_return_view->modifiedby->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_modifiedby" type="text/html"><span id="el_pharmacy_billing_return_modifiedby">
<span<?php echo $pharmacy_billing_return_view->modifiedby->viewAttributes() ?>><?php echo $pharmacy_billing_return_view->modifiedby->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_return_view->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $pharmacy_billing_return_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_return_modifieddatetime"><script id="tpc_pharmacy_billing_return_modifieddatetime" type="text/html"><?php echo $pharmacy_billing_return_view->modifieddatetime->caption() ?></script></span></td>
		<td data-name="modifieddatetime" <?php echo $pharmacy_billing_return_view->modifieddatetime->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_modifieddatetime" type="text/html"><span id="el_pharmacy_billing_return_modifieddatetime">
<span<?php echo $pharmacy_billing_return_view->modifieddatetime->viewAttributes() ?>><?php echo $pharmacy_billing_return_view->modifieddatetime->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_return_view->RealizationAmount->Visible) { // RealizationAmount ?>
	<tr id="r_RealizationAmount">
		<td class="<?php echo $pharmacy_billing_return_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_return_RealizationAmount"><script id="tpc_pharmacy_billing_return_RealizationAmount" type="text/html"><?php echo $pharmacy_billing_return_view->RealizationAmount->caption() ?></script></span></td>
		<td data-name="RealizationAmount" <?php echo $pharmacy_billing_return_view->RealizationAmount->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_RealizationAmount" type="text/html"><span id="el_pharmacy_billing_return_RealizationAmount">
<span<?php echo $pharmacy_billing_return_view->RealizationAmount->viewAttributes() ?>><?php echo $pharmacy_billing_return_view->RealizationAmount->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_return_view->RealizationStatus->Visible) { // RealizationStatus ?>
	<tr id="r_RealizationStatus">
		<td class="<?php echo $pharmacy_billing_return_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_return_RealizationStatus"><script id="tpc_pharmacy_billing_return_RealizationStatus" type="text/html"><?php echo $pharmacy_billing_return_view->RealizationStatus->caption() ?></script></span></td>
		<td data-name="RealizationStatus" <?php echo $pharmacy_billing_return_view->RealizationStatus->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_RealizationStatus" type="text/html"><span id="el_pharmacy_billing_return_RealizationStatus">
<span<?php echo $pharmacy_billing_return_view->RealizationStatus->viewAttributes() ?>><?php echo $pharmacy_billing_return_view->RealizationStatus->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_return_view->RealizationRemarks->Visible) { // RealizationRemarks ?>
	<tr id="r_RealizationRemarks">
		<td class="<?php echo $pharmacy_billing_return_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_return_RealizationRemarks"><script id="tpc_pharmacy_billing_return_RealizationRemarks" type="text/html"><?php echo $pharmacy_billing_return_view->RealizationRemarks->caption() ?></script></span></td>
		<td data-name="RealizationRemarks" <?php echo $pharmacy_billing_return_view->RealizationRemarks->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_RealizationRemarks" type="text/html"><span id="el_pharmacy_billing_return_RealizationRemarks">
<span<?php echo $pharmacy_billing_return_view->RealizationRemarks->viewAttributes() ?>><?php echo $pharmacy_billing_return_view->RealizationRemarks->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_return_view->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
	<tr id="r_RealizationBatchNo">
		<td class="<?php echo $pharmacy_billing_return_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_return_RealizationBatchNo"><script id="tpc_pharmacy_billing_return_RealizationBatchNo" type="text/html"><?php echo $pharmacy_billing_return_view->RealizationBatchNo->caption() ?></script></span></td>
		<td data-name="RealizationBatchNo" <?php echo $pharmacy_billing_return_view->RealizationBatchNo->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_RealizationBatchNo" type="text/html"><span id="el_pharmacy_billing_return_RealizationBatchNo">
<span<?php echo $pharmacy_billing_return_view->RealizationBatchNo->viewAttributes() ?>><?php echo $pharmacy_billing_return_view->RealizationBatchNo->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_return_view->RealizationDate->Visible) { // RealizationDate ?>
	<tr id="r_RealizationDate">
		<td class="<?php echo $pharmacy_billing_return_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_return_RealizationDate"><script id="tpc_pharmacy_billing_return_RealizationDate" type="text/html"><?php echo $pharmacy_billing_return_view->RealizationDate->caption() ?></script></span></td>
		<td data-name="RealizationDate" <?php echo $pharmacy_billing_return_view->RealizationDate->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_RealizationDate" type="text/html"><span id="el_pharmacy_billing_return_RealizationDate">
<span<?php echo $pharmacy_billing_return_view->RealizationDate->viewAttributes() ?>><?php echo $pharmacy_billing_return_view->RealizationDate->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_return_view->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $pharmacy_billing_return_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_return_HospID"><script id="tpc_pharmacy_billing_return_HospID" type="text/html"><?php echo $pharmacy_billing_return_view->HospID->caption() ?></script></span></td>
		<td data-name="HospID" <?php echo $pharmacy_billing_return_view->HospID->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_HospID" type="text/html"><span id="el_pharmacy_billing_return_HospID">
<span<?php echo $pharmacy_billing_return_view->HospID->viewAttributes() ?>><?php echo $pharmacy_billing_return_view->HospID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_return_view->RIDNO->Visible) { // RIDNO ?>
	<tr id="r_RIDNO">
		<td class="<?php echo $pharmacy_billing_return_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_return_RIDNO"><script id="tpc_pharmacy_billing_return_RIDNO" type="text/html"><?php echo $pharmacy_billing_return_view->RIDNO->caption() ?></script></span></td>
		<td data-name="RIDNO" <?php echo $pharmacy_billing_return_view->RIDNO->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_RIDNO" type="text/html"><span id="el_pharmacy_billing_return_RIDNO">
<span<?php echo $pharmacy_billing_return_view->RIDNO->viewAttributes() ?>><?php echo $pharmacy_billing_return_view->RIDNO->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_return_view->TidNo->Visible) { // TidNo ?>
	<tr id="r_TidNo">
		<td class="<?php echo $pharmacy_billing_return_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_return_TidNo"><script id="tpc_pharmacy_billing_return_TidNo" type="text/html"><?php echo $pharmacy_billing_return_view->TidNo->caption() ?></script></span></td>
		<td data-name="TidNo" <?php echo $pharmacy_billing_return_view->TidNo->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_TidNo" type="text/html"><span id="el_pharmacy_billing_return_TidNo">
<span<?php echo $pharmacy_billing_return_view->TidNo->viewAttributes() ?>><?php echo $pharmacy_billing_return_view->TidNo->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_return_view->CId->Visible) { // CId ?>
	<tr id="r_CId">
		<td class="<?php echo $pharmacy_billing_return_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_return_CId"><script id="tpc_pharmacy_billing_return_CId" type="text/html"><?php echo $pharmacy_billing_return_view->CId->caption() ?></script></span></td>
		<td data-name="CId" <?php echo $pharmacy_billing_return_view->CId->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_CId" type="text/html"><span id="el_pharmacy_billing_return_CId">
<span<?php echo $pharmacy_billing_return_view->CId->viewAttributes() ?>><?php echo $pharmacy_billing_return_view->CId->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_return_view->PartnerName->Visible) { // PartnerName ?>
	<tr id="r_PartnerName">
		<td class="<?php echo $pharmacy_billing_return_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_return_PartnerName"><script id="tpc_pharmacy_billing_return_PartnerName" type="text/html"><?php echo $pharmacy_billing_return_view->PartnerName->caption() ?></script></span></td>
		<td data-name="PartnerName" <?php echo $pharmacy_billing_return_view->PartnerName->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_PartnerName" type="text/html"><span id="el_pharmacy_billing_return_PartnerName">
<span<?php echo $pharmacy_billing_return_view->PartnerName->viewAttributes() ?>><?php echo $pharmacy_billing_return_view->PartnerName->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_return_view->PayerType->Visible) { // PayerType ?>
	<tr id="r_PayerType">
		<td class="<?php echo $pharmacy_billing_return_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_return_PayerType"><script id="tpc_pharmacy_billing_return_PayerType" type="text/html"><?php echo $pharmacy_billing_return_view->PayerType->caption() ?></script></span></td>
		<td data-name="PayerType" <?php echo $pharmacy_billing_return_view->PayerType->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_PayerType" type="text/html"><span id="el_pharmacy_billing_return_PayerType">
<span<?php echo $pharmacy_billing_return_view->PayerType->viewAttributes() ?>><?php echo $pharmacy_billing_return_view->PayerType->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_return_view->Dob->Visible) { // Dob ?>
	<tr id="r_Dob">
		<td class="<?php echo $pharmacy_billing_return_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_return_Dob"><script id="tpc_pharmacy_billing_return_Dob" type="text/html"><?php echo $pharmacy_billing_return_view->Dob->caption() ?></script></span></td>
		<td data-name="Dob" <?php echo $pharmacy_billing_return_view->Dob->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_Dob" type="text/html"><span id="el_pharmacy_billing_return_Dob">
<span<?php echo $pharmacy_billing_return_view->Dob->viewAttributes() ?>><?php echo $pharmacy_billing_return_view->Dob->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_return_view->Currency->Visible) { // Currency ?>
	<tr id="r_Currency">
		<td class="<?php echo $pharmacy_billing_return_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_return_Currency"><script id="tpc_pharmacy_billing_return_Currency" type="text/html"><?php echo $pharmacy_billing_return_view->Currency->caption() ?></script></span></td>
		<td data-name="Currency" <?php echo $pharmacy_billing_return_view->Currency->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_Currency" type="text/html"><span id="el_pharmacy_billing_return_Currency">
<span<?php echo $pharmacy_billing_return_view->Currency->viewAttributes() ?>><?php echo $pharmacy_billing_return_view->Currency->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_return_view->DiscountRemarks->Visible) { // DiscountRemarks ?>
	<tr id="r_DiscountRemarks">
		<td class="<?php echo $pharmacy_billing_return_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_return_DiscountRemarks"><script id="tpc_pharmacy_billing_return_DiscountRemarks" type="text/html"><?php echo $pharmacy_billing_return_view->DiscountRemarks->caption() ?></script></span></td>
		<td data-name="DiscountRemarks" <?php echo $pharmacy_billing_return_view->DiscountRemarks->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_DiscountRemarks" type="text/html"><span id="el_pharmacy_billing_return_DiscountRemarks">
<span<?php echo $pharmacy_billing_return_view->DiscountRemarks->viewAttributes() ?>><?php echo $pharmacy_billing_return_view->DiscountRemarks->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_return_view->Remarks->Visible) { // Remarks ?>
	<tr id="r_Remarks">
		<td class="<?php echo $pharmacy_billing_return_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_return_Remarks"><script id="tpc_pharmacy_billing_return_Remarks" type="text/html"><?php echo $pharmacy_billing_return_view->Remarks->caption() ?></script></span></td>
		<td data-name="Remarks" <?php echo $pharmacy_billing_return_view->Remarks->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_Remarks" type="text/html"><span id="el_pharmacy_billing_return_Remarks">
<span<?php echo $pharmacy_billing_return_view->Remarks->viewAttributes() ?>><?php echo $pharmacy_billing_return_view->Remarks->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_return_view->PatId->Visible) { // PatId ?>
	<tr id="r_PatId">
		<td class="<?php echo $pharmacy_billing_return_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_return_PatId"><script id="tpc_pharmacy_billing_return_PatId" type="text/html"><?php echo $pharmacy_billing_return_view->PatId->caption() ?></script></span></td>
		<td data-name="PatId" <?php echo $pharmacy_billing_return_view->PatId->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_PatId" type="text/html"><span id="el_pharmacy_billing_return_PatId">
<span<?php echo $pharmacy_billing_return_view->PatId->viewAttributes() ?>><?php echo $pharmacy_billing_return_view->PatId->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_return_view->DrDepartment->Visible) { // DrDepartment ?>
	<tr id="r_DrDepartment">
		<td class="<?php echo $pharmacy_billing_return_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_return_DrDepartment"><script id="tpc_pharmacy_billing_return_DrDepartment" type="text/html"><?php echo $pharmacy_billing_return_view->DrDepartment->caption() ?></script></span></td>
		<td data-name="DrDepartment" <?php echo $pharmacy_billing_return_view->DrDepartment->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_DrDepartment" type="text/html"><span id="el_pharmacy_billing_return_DrDepartment">
<span<?php echo $pharmacy_billing_return_view->DrDepartment->viewAttributes() ?>><?php echo $pharmacy_billing_return_view->DrDepartment->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_return_view->RefferedBy->Visible) { // RefferedBy ?>
	<tr id="r_RefferedBy">
		<td class="<?php echo $pharmacy_billing_return_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_return_RefferedBy"><script id="tpc_pharmacy_billing_return_RefferedBy" type="text/html"><?php echo $pharmacy_billing_return_view->RefferedBy->caption() ?></script></span></td>
		<td data-name="RefferedBy" <?php echo $pharmacy_billing_return_view->RefferedBy->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_RefferedBy" type="text/html"><span id="el_pharmacy_billing_return_RefferedBy">
<span<?php echo $pharmacy_billing_return_view->RefferedBy->viewAttributes() ?>><?php echo $pharmacy_billing_return_view->RefferedBy->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_return_view->BillNumber->Visible) { // BillNumber ?>
	<tr id="r_BillNumber">
		<td class="<?php echo $pharmacy_billing_return_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_return_BillNumber"><script id="tpc_pharmacy_billing_return_BillNumber" type="text/html"><?php echo $pharmacy_billing_return_view->BillNumber->caption() ?></script></span></td>
		<td data-name="BillNumber" <?php echo $pharmacy_billing_return_view->BillNumber->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_BillNumber" type="text/html"><span id="el_pharmacy_billing_return_BillNumber">
<span<?php echo $pharmacy_billing_return_view->BillNumber->viewAttributes() ?>><?php echo $pharmacy_billing_return_view->BillNumber->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_return_view->CardNumber->Visible) { // CardNumber ?>
	<tr id="r_CardNumber">
		<td class="<?php echo $pharmacy_billing_return_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_return_CardNumber"><script id="tpc_pharmacy_billing_return_CardNumber" type="text/html"><?php echo $pharmacy_billing_return_view->CardNumber->caption() ?></script></span></td>
		<td data-name="CardNumber" <?php echo $pharmacy_billing_return_view->CardNumber->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_CardNumber" type="text/html"><span id="el_pharmacy_billing_return_CardNumber">
<span<?php echo $pharmacy_billing_return_view->CardNumber->viewAttributes() ?>><?php echo $pharmacy_billing_return_view->CardNumber->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_return_view->BankName->Visible) { // BankName ?>
	<tr id="r_BankName">
		<td class="<?php echo $pharmacy_billing_return_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_return_BankName"><script id="tpc_pharmacy_billing_return_BankName" type="text/html"><?php echo $pharmacy_billing_return_view->BankName->caption() ?></script></span></td>
		<td data-name="BankName" <?php echo $pharmacy_billing_return_view->BankName->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_BankName" type="text/html"><span id="el_pharmacy_billing_return_BankName">
<span<?php echo $pharmacy_billing_return_view->BankName->viewAttributes() ?>><?php echo $pharmacy_billing_return_view->BankName->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_return_view->DrID->Visible) { // DrID ?>
	<tr id="r_DrID">
		<td class="<?php echo $pharmacy_billing_return_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_return_DrID"><script id="tpc_pharmacy_billing_return_DrID" type="text/html"><?php echo $pharmacy_billing_return_view->DrID->caption() ?></script></span></td>
		<td data-name="DrID" <?php echo $pharmacy_billing_return_view->DrID->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_DrID" type="text/html"><span id="el_pharmacy_billing_return_DrID">
<span<?php echo $pharmacy_billing_return_view->DrID->viewAttributes() ?>><?php echo $pharmacy_billing_return_view->DrID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_return_view->BillStatus->Visible) { // BillStatus ?>
	<tr id="r_BillStatus">
		<td class="<?php echo $pharmacy_billing_return_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_return_BillStatus"><script id="tpc_pharmacy_billing_return_BillStatus" type="text/html"><?php echo $pharmacy_billing_return_view->BillStatus->caption() ?></script></span></td>
		<td data-name="BillStatus" <?php echo $pharmacy_billing_return_view->BillStatus->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_BillStatus" type="text/html"><span id="el_pharmacy_billing_return_BillStatus">
<span<?php echo $pharmacy_billing_return_view->BillStatus->viewAttributes() ?>><?php echo $pharmacy_billing_return_view->BillStatus->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_return_view->ReportHeader->Visible) { // ReportHeader ?>
	<tr id="r_ReportHeader">
		<td class="<?php echo $pharmacy_billing_return_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_return_ReportHeader"><script id="tpc_pharmacy_billing_return_ReportHeader" type="text/html"><?php echo $pharmacy_billing_return_view->ReportHeader->caption() ?></script></span></td>
		<td data-name="ReportHeader" <?php echo $pharmacy_billing_return_view->ReportHeader->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_ReportHeader" type="text/html"><span id="el_pharmacy_billing_return_ReportHeader">
<span<?php echo $pharmacy_billing_return_view->ReportHeader->viewAttributes() ?>><?php echo $pharmacy_billing_return_view->ReportHeader->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_return_view->PharID->Visible) { // PharID ?>
	<tr id="r_PharID">
		<td class="<?php echo $pharmacy_billing_return_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_return_PharID"><script id="tpc_pharmacy_billing_return_PharID" type="text/html"><?php echo $pharmacy_billing_return_view->PharID->caption() ?></script></span></td>
		<td data-name="PharID" <?php echo $pharmacy_billing_return_view->PharID->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_PharID" type="text/html"><span id="el_pharmacy_billing_return_PharID">
<span<?php echo $pharmacy_billing_return_view->PharID->viewAttributes() ?>><?php echo $pharmacy_billing_return_view->PharID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_pharmacy_billing_returnview" class="ew-custom-template"></div>
<script id="tpm_pharmacy_billing_returnview" type="text/html">
<div id="ct_pharmacy_billing_return_view"><style>
.ew-form:not(.ew-list-form):not(.ew-pager-form), table.ew-master-table.ew-vertical {
	width: 90%;
}
	.ew-form:not(.ew-list-form):not(.ew-pager-form), table.ew-master-table.ew-vertical {
		width: 90%;
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
.alignleft {
	float: left;
}
.alignright {
	float: right;
}
</style>
<?php

function convertToIndianCurrency($number) {
	$no = round($number);
	$decimal = round($number - ($no = floor($number)), 2) * 100;    
	$digits_length = strlen($no);    
	$i = 0;
	$str = array();
	$words = array(
		0 => '',
		1 => 'One',
		2 => 'Two',
		3 => 'Three',
		4 => 'Four',
		5 => 'Five',
		6 => 'Six',
		7 => 'Seven',
		8 => 'Eight',
		9 => 'Nine',
		10 => 'Ten',
		11 => 'Eleven',
		12 => 'Twelve',
		13 => 'Thirteen',
		14 => 'Fourteen',
		15 => 'Fifteen',
		16 => 'Sixteen',
		17 => 'Seventeen',
		18 => 'Eighteen',
		19 => 'Nineteen',
		20 => 'Twenty',
		30 => 'Thirty',
		40 => 'Forty',
		50 => 'Fifty',
		60 => 'Sixty',
		70 => 'Seventy',
		80 => 'Eighty',
		90 => 'Ninety');
	$digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
	while ($i < $digits_length) {
		$divider = ($i == 2) ? 10 : 100;
		$number = floor($no % $divider);
		$no = floor($no / $divider);
		$i += $divider == 10 ? 1 : 2;
		if ($number) {
			$plural = (($counter = count($str)) && $number > 9) ? 's' : null;            
			$str [] = ($number < 21) ? $words[$number] . ' ' . $digits[$counter] . $plural : $words[floor($number / 10) * 10] . ' ' . $words[$number % 10] . ' ' . $digits[$counter] . $plural;
		} else {
			$str [] = null;
		}  
	}
	$Rupees = implode(' ', array_reverse($str));
	$paise = ($decimal) ? "And Paise " . ($words[$decimal - $decimal%10]) ." " .($words[$decimal%10])  : '';
	return ($Rupees ? 'Rupees ' . $Rupees : '') . $paise . " Only";
}
			$invoiceId = $Page->id->CurrentValue;
			$patient_id = $Page->PatientId->CurrentValue;
			$PatId = $Page->PatId->CurrentValue;
			$HospID = $Page->HospID->CurrentValue;
$dbhelper = &DbHelper();
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$PatId."' ;";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	 $row = &$rs->fields;
	 $Patid =  $row["id"];
	 $PatientID =  $row["PatientID"];
	 $gender =  $row["gender"];
	 $dob =  $row["dob"];
	 $Age =  $row["Age"];
	 if($dob != null)
	 {
	 	$Age = $Age;
	 }
	 $mobile_no =  $row["mobile_no"];
	 $IdentificationMark =  $row["IdentificationMark"];
	 $Religion =  $row["Religion"];
	 $street =  $row["street"];
	 $town =  $row["town"];
	 $province =  $row["province"];
	 $country =  $row["country"];
	 $postal_code =  $row["postal_code"];
	 $PEmail =  $row["PEmail"];
	if( $street != '')
	{
		$address .= $street;
	}
	if( $town != '')
	{
		$address .= ', '.$town;
	}
	if( $province != '')
	{
		$address .= ', '.$province;
	}
	if( $country != '')
	{
		$address .= ', '.$country;
	}
	 if( $postal_code != '')
	{
		$address .= ', '.$postal_code;
	}
	 $rs->MoveNext();
 }
$aa = "ewbarcode.php?data=".$Page->id->CurrentValue."&encode=EAN-13&height=40&color=%23000000";
 $sql = "SELECT * FROM ganeshkumar_bjhims.hospital where id='".$HospID."' ;";
$results2 = $dbhelper->ExecuteRows($sql);
if($results2[0]["BillingGST"] != "")
{
$HospGST = "GST No:". $results2[0]["BillingGST"];
}
if($Page->ReportHeader->CurrentValue=="Yes")
{
$id =  $results2[0]["id"];
 $logo = $results2[0]["logo"];
 $hospital = $results2[0]["hospital"];
 $street = $results2[0]["street"];
 $area = $results2[0]["area"];
 $town = $results2[0]["town"];
 $province = $results2[0]["province"];
 $postal_code = $results2[0]["postal_code"];
 $phone_no = $results2[0]["phone_no"];
 $PreFixCode = $results2[0]["PreFixCode"];
 $status = $results2[0]["status"];
$createdby =  $results2[0]["createdby"];
$createddatetime =  $results2[0]["createddatetime"];
$modifiedby =  $results2[0]["modifiedby"];
$modifieddatetime =  $results2[0]["modifieddatetime"];
$BillingGST =  $results2[0]["BillingGST"];
$pharmacyGST =  $results2[0]["pharmacyGST"];
$hospaddress = '';
if( $street != '')
{
	$hospaddress .= $street;
}
if( $area != '')
{
	$hospaddress .= ', '.$area;
}
if( $town != '')
{
	$hospaddress .= ', '.$town;
}
if( $province != '')
{
	$hospaddress .= ', '.$province;
}
if( $country != '')
{
	$hospaddress .= ', '.$country;
}
if( $postal_code != '')
{
	$hospaddress .= ', '.$postal_code . '.';
	}
$hospphone_no = '';
if( $phone_no != '')
{
	$hospphone_no .= '		<tr>
			<td  style="width:50px;"></td>
			<td align="center">Ph: '.$phone_no.' .</td>
			<td  style="width:50px;"></td>
		</tr>';
}
$heeddeer = '<font size="4" style="font-weight: bold;">
<table width="100%">
	 <tbody>
		<tr>
			<td  style="width:50px;"></td>
			<td><h2 align="center">'.$hospital.'</h2></td>
			<td  style="width:50px;"></td>
		</tr>
		<tr>
			<td  style="width:50px;"></td>
			<td align="center">'.$hospaddress.'</td>
			<td  style="width:50px;"></td>
		</tr>
		'.$hospphone_no.'
	</tbody>
</table>
';
echo $heeddeer;
}
 ?>
<table width="100%">
	 <tbody>
		<tr>
<td></td>
<td>
<?php
		if($Page->ReportHeader->CurrentValue=="Yes")
		{
			echo '<h5 align="center"><u>PATIENT RETURN BILL</u></h5>';
		}else{
			echo '<h2 align="center">PATIENT RETURN BILL</h2>';
		}
?>
</td>
<td  style="float: right;"><?php echo $HospGST; ?></td>
</tr>
	</tbody>
</table>
<font size="4" style="font-weight: bold;">
<table width="100%">
	 <tbody>
		<tr><td  style="float:left;">Patient Id: <?php echo $PatientID; ?> </td><td  style="float: right;">Bill No: {{:BillNumber}}</td></tr>
		<tr><td  style="float:left;">Patient Name: {{:PatientName}}</td><td  style="float: right;">Bill Date:<?php echo date("d-m-Y", strtotime($Page->createddatetime->CurrentValue)); ?></td></tr>
		<tr><td  style="float:left;"> Age: <?php echo $Age; ?> </td><td  style="float: right;">Consultant: {{:Doctor}}</td></tr>
		<tr><td  style="float:left;width:50%;">Gender: <?php echo $gender; ?> </td><td  style="float: right;"><img src='<?php echo $aa; ?>' alt style="border: 0;"></td></tr>
		<tr><td  style="float:left;width:50%;">Address: <?php echo $address; ?> </td><td  style="float: right;"></td></tr>
	</tbody>
</table>
	</font>
		<font size="4" >
<table class="table table-striped ew-table ew-export-table" width="100%">
<tr>
<td><b>SiNo</b></td>
<td><b>Product</b></td>
		<td><b>Mfg</b></td>
		<td><b>Exp</b></td>
		<td><b>Batch</b></td>
		<td><b>Qty</b></td>
<td><b align="right">Amount</b></td>
</tr>
							 <?php
			$invoiceId = $Page->id->CurrentValue;
						 $patient_id = $Page->PatientId->CurrentValue;
					 $Reception = $Page->Reception->CurrentValue;
$fromdt = date('Y-m-d', strtotime('-1 months'));
$todate = date('Y-m-d', strtotime('+2 months'));
$Drid = $_GET['Drid'];
$dbhelper = &DbHelper();
$sql = "SELECT * FROM ganeshkumar_bjhims.pharmacy_pharled where pbt='".$invoiceId."' ;";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	$row = &$rs->fields;
	$SiNo =  $row["SiNo"];
	$Product =  $row["Product"];
	$Mfg =  $row["Mfg"];
	$EXPDT =  date("Y-M", strtotime($row["EXPDT"]));
	$BATCHNO =  $row["BATCHNO"];
	$IQ =  (int)$row["MRQ"];
	$DAMT =  $row["DAMT"];
	$hhh .= '<tr><td>'.$SiNo.'</td><td>'.$Product.'</td><td>'.$Mfg.'</td>  ';
	$hhh .= '<td>'.$EXPDT.'</td><td>'.$BATCHNO.'</td><td>'.$IQ.'</td>  ';
	$hhh .= '<td align="right">'.$DAMT.'</td></tr>  ';
	$rs->MoveNext();
}
$hhh .= '<tr><td></td><td></td><td></td><td></td><td></td><td align="right">Total</td><td align="right">'.$Page->Amount->CurrentValue.'</td></tr>  ';
echo $hhh;
$tt = "ewbarcode.php?data=".$Page->BillNumber->CurrentValue."&encode=QRCODE&height=60&color=%23000000";
?>		
</table> 
<br><br>
<img src='<?php echo $tt; ?>' alt style="border: 0;">
<p align="right">Signature<p>
	  </font>
</div>
</script>

<?php
	if (in_array("view_pharmacy_pharled_return", explode(",", $pharmacy_billing_return->getCurrentDetailTable())) && $view_pharmacy_pharled_return->DetailView) {
?>
<?php if ($pharmacy_billing_return->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("view_pharmacy_pharled_return", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "view_pharmacy_pharled_returngrid.php" ?>
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($pharmacy_billing_return->Rows) ?> };
	ew.applyTemplate("tpd_pharmacy_billing_returnview", "tpm_pharmacy_billing_returnview", "pharmacy_billing_returnview", "<?php echo $pharmacy_billing_return->CustomExport ?>", ew.templateData.rows[0]);
	$("script.pharmacy_billing_returnview_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$pharmacy_billing_return_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_billing_return_view->isExport()) { ?>
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
$pharmacy_billing_return_view->terminate();
?>