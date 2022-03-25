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
$view_lab_servicess_view = new view_lab_servicess_view();

// Run the page
$view_lab_servicess_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_lab_servicess_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_lab_servicess_view->isExport()) { ?>
<script>
var fview_lab_servicessview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fview_lab_servicessview = currentForm = new ew.Form("fview_lab_servicessview", "view");
	loadjs.done("fview_lab_servicessview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$view_lab_servicess_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $view_lab_servicess_view->ExportOptions->render("body") ?>
<?php $view_lab_servicess_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $view_lab_servicess_view->showPageHeader(); ?>
<?php
$view_lab_servicess_view->showMessage();
?>
<form name="fview_lab_servicessview" id="fview_lab_servicessview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_lab_servicess">
<input type="hidden" name="modal" value="<?php echo (int)$view_lab_servicess_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($view_lab_servicess_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $view_lab_servicess_view->TableLeftColumnClass ?>"><span id="elh_view_lab_servicess_id"><script id="tpc_view_lab_servicess_id" type="text/html"><?php echo $view_lab_servicess_view->id->caption() ?></script></span></td>
		<td data-name="id" <?php echo $view_lab_servicess_view->id->cellAttributes() ?>>
<script id="tpx_view_lab_servicess_id" type="text/html"><span id="el_view_lab_servicess_id">
<span<?php echo $view_lab_servicess_view->id->viewAttributes() ?>><?php echo $view_lab_servicess_view->id->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_servicess_view->SID->Visible) { // SID ?>
	<tr id="r_SID">
		<td class="<?php echo $view_lab_servicess_view->TableLeftColumnClass ?>"><span id="elh_view_lab_servicess_SID"><script id="tpc_view_lab_servicess_SID" type="text/html"><?php echo $view_lab_servicess_view->SID->caption() ?></script></span></td>
		<td data-name="SID" <?php echo $view_lab_servicess_view->SID->cellAttributes() ?>>
<script id="tpx_view_lab_servicess_SID" type="text/html"><span id="el_view_lab_servicess_SID">
<span<?php echo $view_lab_servicess_view->SID->viewAttributes() ?>><?php echo $view_lab_servicess_view->SID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_servicess_view->Reception->Visible) { // Reception ?>
	<tr id="r_Reception">
		<td class="<?php echo $view_lab_servicess_view->TableLeftColumnClass ?>"><span id="elh_view_lab_servicess_Reception"><script id="tpc_view_lab_servicess_Reception" type="text/html"><?php echo $view_lab_servicess_view->Reception->caption() ?></script></span></td>
		<td data-name="Reception" <?php echo $view_lab_servicess_view->Reception->cellAttributes() ?>>
<script id="tpx_view_lab_servicess_Reception" type="text/html"><span id="el_view_lab_servicess_Reception">
<span<?php echo $view_lab_servicess_view->Reception->viewAttributes() ?>><?php echo $view_lab_servicess_view->Reception->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_servicess_view->PatientId->Visible) { // PatientId ?>
	<tr id="r_PatientId">
		<td class="<?php echo $view_lab_servicess_view->TableLeftColumnClass ?>"><span id="elh_view_lab_servicess_PatientId"><script id="tpc_view_lab_servicess_PatientId" type="text/html"><?php echo $view_lab_servicess_view->PatientId->caption() ?></script></span></td>
		<td data-name="PatientId" <?php echo $view_lab_servicess_view->PatientId->cellAttributes() ?>>
<script id="tpx_view_lab_servicess_PatientId" type="text/html"><span id="el_view_lab_servicess_PatientId">
<span<?php echo $view_lab_servicess_view->PatientId->viewAttributes() ?>><?php echo $view_lab_servicess_view->PatientId->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_servicess_view->mrnno->Visible) { // mrnno ?>
	<tr id="r_mrnno">
		<td class="<?php echo $view_lab_servicess_view->TableLeftColumnClass ?>"><span id="elh_view_lab_servicess_mrnno"><script id="tpc_view_lab_servicess_mrnno" type="text/html"><?php echo $view_lab_servicess_view->mrnno->caption() ?></script></span></td>
		<td data-name="mrnno" <?php echo $view_lab_servicess_view->mrnno->cellAttributes() ?>>
<script id="tpx_view_lab_servicess_mrnno" type="text/html"><span id="el_view_lab_servicess_mrnno">
<span<?php echo $view_lab_servicess_view->mrnno->viewAttributes() ?>><?php echo $view_lab_servicess_view->mrnno->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_servicess_view->PatientName->Visible) { // PatientName ?>
	<tr id="r_PatientName">
		<td class="<?php echo $view_lab_servicess_view->TableLeftColumnClass ?>"><span id="elh_view_lab_servicess_PatientName"><script id="tpc_view_lab_servicess_PatientName" type="text/html"><?php echo $view_lab_servicess_view->PatientName->caption() ?></script></span></td>
		<td data-name="PatientName" <?php echo $view_lab_servicess_view->PatientName->cellAttributes() ?>>
<script id="tpx_view_lab_servicess_PatientName" type="text/html"><span id="el_view_lab_servicess_PatientName">
<span<?php echo $view_lab_servicess_view->PatientName->viewAttributes() ?>><?php echo $view_lab_servicess_view->PatientName->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_servicess_view->Age->Visible) { // Age ?>
	<tr id="r_Age">
		<td class="<?php echo $view_lab_servicess_view->TableLeftColumnClass ?>"><span id="elh_view_lab_servicess_Age"><script id="tpc_view_lab_servicess_Age" type="text/html"><?php echo $view_lab_servicess_view->Age->caption() ?></script></span></td>
		<td data-name="Age" <?php echo $view_lab_servicess_view->Age->cellAttributes() ?>>
<script id="tpx_view_lab_servicess_Age" type="text/html"><span id="el_view_lab_servicess_Age">
<span<?php echo $view_lab_servicess_view->Age->viewAttributes() ?>><?php echo $view_lab_servicess_view->Age->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_servicess_view->Gender->Visible) { // Gender ?>
	<tr id="r_Gender">
		<td class="<?php echo $view_lab_servicess_view->TableLeftColumnClass ?>"><span id="elh_view_lab_servicess_Gender"><script id="tpc_view_lab_servicess_Gender" type="text/html"><?php echo $view_lab_servicess_view->Gender->caption() ?></script></span></td>
		<td data-name="Gender" <?php echo $view_lab_servicess_view->Gender->cellAttributes() ?>>
<script id="tpx_view_lab_servicess_Gender" type="text/html"><span id="el_view_lab_servicess_Gender">
<span<?php echo $view_lab_servicess_view->Gender->viewAttributes() ?>><?php echo $view_lab_servicess_view->Gender->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_servicess_view->profilePic->Visible) { // profilePic ?>
	<tr id="r_profilePic">
		<td class="<?php echo $view_lab_servicess_view->TableLeftColumnClass ?>"><span id="elh_view_lab_servicess_profilePic"><script id="tpc_view_lab_servicess_profilePic" type="text/html"><?php echo $view_lab_servicess_view->profilePic->caption() ?></script></span></td>
		<td data-name="profilePic" <?php echo $view_lab_servicess_view->profilePic->cellAttributes() ?>>
<script id="tpx_view_lab_servicess_profilePic" type="text/html"><span id="el_view_lab_servicess_profilePic">
<span<?php echo $view_lab_servicess_view->profilePic->viewAttributes() ?>><?php echo $view_lab_servicess_view->profilePic->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_servicess_view->Mobile->Visible) { // Mobile ?>
	<tr id="r_Mobile">
		<td class="<?php echo $view_lab_servicess_view->TableLeftColumnClass ?>"><span id="elh_view_lab_servicess_Mobile"><script id="tpc_view_lab_servicess_Mobile" type="text/html"><?php echo $view_lab_servicess_view->Mobile->caption() ?></script></span></td>
		<td data-name="Mobile" <?php echo $view_lab_servicess_view->Mobile->cellAttributes() ?>>
<script id="tpx_view_lab_servicess_Mobile" type="text/html"><span id="el_view_lab_servicess_Mobile">
<span<?php echo $view_lab_servicess_view->Mobile->viewAttributes() ?>><?php echo $view_lab_servicess_view->Mobile->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_servicess_view->IP_OP->Visible) { // IP_OP ?>
	<tr id="r_IP_OP">
		<td class="<?php echo $view_lab_servicess_view->TableLeftColumnClass ?>"><span id="elh_view_lab_servicess_IP_OP"><script id="tpc_view_lab_servicess_IP_OP" type="text/html"><?php echo $view_lab_servicess_view->IP_OP->caption() ?></script></span></td>
		<td data-name="IP_OP" <?php echo $view_lab_servicess_view->IP_OP->cellAttributes() ?>>
<script id="tpx_view_lab_servicess_IP_OP" type="text/html"><span id="el_view_lab_servicess_IP_OP">
<span<?php echo $view_lab_servicess_view->IP_OP->viewAttributes() ?>><?php echo $view_lab_servicess_view->IP_OP->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_servicess_view->Doctor->Visible) { // Doctor ?>
	<tr id="r_Doctor">
		<td class="<?php echo $view_lab_servicess_view->TableLeftColumnClass ?>"><span id="elh_view_lab_servicess_Doctor"><script id="tpc_view_lab_servicess_Doctor" type="text/html"><?php echo $view_lab_servicess_view->Doctor->caption() ?></script></span></td>
		<td data-name="Doctor" <?php echo $view_lab_servicess_view->Doctor->cellAttributes() ?>>
<script id="tpx_view_lab_servicess_Doctor" type="text/html"><span id="el_view_lab_servicess_Doctor">
<span<?php echo $view_lab_servicess_view->Doctor->viewAttributes() ?>><?php echo $view_lab_servicess_view->Doctor->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_servicess_view->voucher_type->Visible) { // voucher_type ?>
	<tr id="r_voucher_type">
		<td class="<?php echo $view_lab_servicess_view->TableLeftColumnClass ?>"><span id="elh_view_lab_servicess_voucher_type"><script id="tpc_view_lab_servicess_voucher_type" type="text/html"><?php echo $view_lab_servicess_view->voucher_type->caption() ?></script></span></td>
		<td data-name="voucher_type" <?php echo $view_lab_servicess_view->voucher_type->cellAttributes() ?>>
<script id="tpx_view_lab_servicess_voucher_type" type="text/html"><span id="el_view_lab_servicess_voucher_type">
<span<?php echo $view_lab_servicess_view->voucher_type->viewAttributes() ?>><?php echo $view_lab_servicess_view->voucher_type->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_servicess_view->Details->Visible) { // Details ?>
	<tr id="r_Details">
		<td class="<?php echo $view_lab_servicess_view->TableLeftColumnClass ?>"><span id="elh_view_lab_servicess_Details"><script id="tpc_view_lab_servicess_Details" type="text/html"><?php echo $view_lab_servicess_view->Details->caption() ?></script></span></td>
		<td data-name="Details" <?php echo $view_lab_servicess_view->Details->cellAttributes() ?>>
<script id="tpx_view_lab_servicess_Details" type="text/html"><span id="el_view_lab_servicess_Details">
<span<?php echo $view_lab_servicess_view->Details->viewAttributes() ?>><?php echo $view_lab_servicess_view->Details->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_servicess_view->ModeofPayment->Visible) { // ModeofPayment ?>
	<tr id="r_ModeofPayment">
		<td class="<?php echo $view_lab_servicess_view->TableLeftColumnClass ?>"><span id="elh_view_lab_servicess_ModeofPayment"><script id="tpc_view_lab_servicess_ModeofPayment" type="text/html"><?php echo $view_lab_servicess_view->ModeofPayment->caption() ?></script></span></td>
		<td data-name="ModeofPayment" <?php echo $view_lab_servicess_view->ModeofPayment->cellAttributes() ?>>
<script id="tpx_view_lab_servicess_ModeofPayment" type="text/html"><span id="el_view_lab_servicess_ModeofPayment">
<span<?php echo $view_lab_servicess_view->ModeofPayment->viewAttributes() ?>><?php echo $view_lab_servicess_view->ModeofPayment->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_servicess_view->Amount->Visible) { // Amount ?>
	<tr id="r_Amount">
		<td class="<?php echo $view_lab_servicess_view->TableLeftColumnClass ?>"><span id="elh_view_lab_servicess_Amount"><script id="tpc_view_lab_servicess_Amount" type="text/html"><?php echo $view_lab_servicess_view->Amount->caption() ?></script></span></td>
		<td data-name="Amount" <?php echo $view_lab_servicess_view->Amount->cellAttributes() ?>>
<script id="tpx_view_lab_servicess_Amount" type="text/html"><span id="el_view_lab_servicess_Amount">
<span<?php echo $view_lab_servicess_view->Amount->viewAttributes() ?>><?php echo $view_lab_servicess_view->Amount->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_servicess_view->AnyDues->Visible) { // AnyDues ?>
	<tr id="r_AnyDues">
		<td class="<?php echo $view_lab_servicess_view->TableLeftColumnClass ?>"><span id="elh_view_lab_servicess_AnyDues"><script id="tpc_view_lab_servicess_AnyDues" type="text/html"><?php echo $view_lab_servicess_view->AnyDues->caption() ?></script></span></td>
		<td data-name="AnyDues" <?php echo $view_lab_servicess_view->AnyDues->cellAttributes() ?>>
<script id="tpx_view_lab_servicess_AnyDues" type="text/html"><span id="el_view_lab_servicess_AnyDues">
<span<?php echo $view_lab_servicess_view->AnyDues->viewAttributes() ?>><?php echo $view_lab_servicess_view->AnyDues->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_servicess_view->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $view_lab_servicess_view->TableLeftColumnClass ?>"><span id="elh_view_lab_servicess_createdby"><script id="tpc_view_lab_servicess_createdby" type="text/html"><?php echo $view_lab_servicess_view->createdby->caption() ?></script></span></td>
		<td data-name="createdby" <?php echo $view_lab_servicess_view->createdby->cellAttributes() ?>>
<script id="tpx_view_lab_servicess_createdby" type="text/html"><span id="el_view_lab_servicess_createdby">
<span<?php echo $view_lab_servicess_view->createdby->viewAttributes() ?>><?php echo $view_lab_servicess_view->createdby->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_servicess_view->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $view_lab_servicess_view->TableLeftColumnClass ?>"><span id="elh_view_lab_servicess_createddatetime"><script id="tpc_view_lab_servicess_createddatetime" type="text/html"><?php echo $view_lab_servicess_view->createddatetime->caption() ?></script></span></td>
		<td data-name="createddatetime" <?php echo $view_lab_servicess_view->createddatetime->cellAttributes() ?>>
<script id="tpx_view_lab_servicess_createddatetime" type="text/html"><span id="el_view_lab_servicess_createddatetime">
<span<?php echo $view_lab_servicess_view->createddatetime->viewAttributes() ?>><?php echo $view_lab_servicess_view->createddatetime->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_servicess_view->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $view_lab_servicess_view->TableLeftColumnClass ?>"><span id="elh_view_lab_servicess_modifiedby"><script id="tpc_view_lab_servicess_modifiedby" type="text/html"><?php echo $view_lab_servicess_view->modifiedby->caption() ?></script></span></td>
		<td data-name="modifiedby" <?php echo $view_lab_servicess_view->modifiedby->cellAttributes() ?>>
<script id="tpx_view_lab_servicess_modifiedby" type="text/html"><span id="el_view_lab_servicess_modifiedby">
<span<?php echo $view_lab_servicess_view->modifiedby->viewAttributes() ?>><?php echo $view_lab_servicess_view->modifiedby->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_servicess_view->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $view_lab_servicess_view->TableLeftColumnClass ?>"><span id="elh_view_lab_servicess_modifieddatetime"><script id="tpc_view_lab_servicess_modifieddatetime" type="text/html"><?php echo $view_lab_servicess_view->modifieddatetime->caption() ?></script></span></td>
		<td data-name="modifieddatetime" <?php echo $view_lab_servicess_view->modifieddatetime->cellAttributes() ?>>
<script id="tpx_view_lab_servicess_modifieddatetime" type="text/html"><span id="el_view_lab_servicess_modifieddatetime">
<span<?php echo $view_lab_servicess_view->modifieddatetime->viewAttributes() ?>><?php echo $view_lab_servicess_view->modifieddatetime->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_servicess_view->RealizationAmount->Visible) { // RealizationAmount ?>
	<tr id="r_RealizationAmount">
		<td class="<?php echo $view_lab_servicess_view->TableLeftColumnClass ?>"><span id="elh_view_lab_servicess_RealizationAmount"><script id="tpc_view_lab_servicess_RealizationAmount" type="text/html"><?php echo $view_lab_servicess_view->RealizationAmount->caption() ?></script></span></td>
		<td data-name="RealizationAmount" <?php echo $view_lab_servicess_view->RealizationAmount->cellAttributes() ?>>
<script id="tpx_view_lab_servicess_RealizationAmount" type="text/html"><span id="el_view_lab_servicess_RealizationAmount">
<span<?php echo $view_lab_servicess_view->RealizationAmount->viewAttributes() ?>><?php echo $view_lab_servicess_view->RealizationAmount->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_servicess_view->RealizationStatus->Visible) { // RealizationStatus ?>
	<tr id="r_RealizationStatus">
		<td class="<?php echo $view_lab_servicess_view->TableLeftColumnClass ?>"><span id="elh_view_lab_servicess_RealizationStatus"><script id="tpc_view_lab_servicess_RealizationStatus" type="text/html"><?php echo $view_lab_servicess_view->RealizationStatus->caption() ?></script></span></td>
		<td data-name="RealizationStatus" <?php echo $view_lab_servicess_view->RealizationStatus->cellAttributes() ?>>
<script id="tpx_view_lab_servicess_RealizationStatus" type="text/html"><span id="el_view_lab_servicess_RealizationStatus">
<span<?php echo $view_lab_servicess_view->RealizationStatus->viewAttributes() ?>><?php echo $view_lab_servicess_view->RealizationStatus->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_servicess_view->RealizationRemarks->Visible) { // RealizationRemarks ?>
	<tr id="r_RealizationRemarks">
		<td class="<?php echo $view_lab_servicess_view->TableLeftColumnClass ?>"><span id="elh_view_lab_servicess_RealizationRemarks"><script id="tpc_view_lab_servicess_RealizationRemarks" type="text/html"><?php echo $view_lab_servicess_view->RealizationRemarks->caption() ?></script></span></td>
		<td data-name="RealizationRemarks" <?php echo $view_lab_servicess_view->RealizationRemarks->cellAttributes() ?>>
<script id="tpx_view_lab_servicess_RealizationRemarks" type="text/html"><span id="el_view_lab_servicess_RealizationRemarks">
<span<?php echo $view_lab_servicess_view->RealizationRemarks->viewAttributes() ?>><?php echo $view_lab_servicess_view->RealizationRemarks->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_servicess_view->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
	<tr id="r_RealizationBatchNo">
		<td class="<?php echo $view_lab_servicess_view->TableLeftColumnClass ?>"><span id="elh_view_lab_servicess_RealizationBatchNo"><script id="tpc_view_lab_servicess_RealizationBatchNo" type="text/html"><?php echo $view_lab_servicess_view->RealizationBatchNo->caption() ?></script></span></td>
		<td data-name="RealizationBatchNo" <?php echo $view_lab_servicess_view->RealizationBatchNo->cellAttributes() ?>>
<script id="tpx_view_lab_servicess_RealizationBatchNo" type="text/html"><span id="el_view_lab_servicess_RealizationBatchNo">
<span<?php echo $view_lab_servicess_view->RealizationBatchNo->viewAttributes() ?>><?php echo $view_lab_servicess_view->RealizationBatchNo->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_servicess_view->RealizationDate->Visible) { // RealizationDate ?>
	<tr id="r_RealizationDate">
		<td class="<?php echo $view_lab_servicess_view->TableLeftColumnClass ?>"><span id="elh_view_lab_servicess_RealizationDate"><script id="tpc_view_lab_servicess_RealizationDate" type="text/html"><?php echo $view_lab_servicess_view->RealizationDate->caption() ?></script></span></td>
		<td data-name="RealizationDate" <?php echo $view_lab_servicess_view->RealizationDate->cellAttributes() ?>>
<script id="tpx_view_lab_servicess_RealizationDate" type="text/html"><span id="el_view_lab_servicess_RealizationDate">
<span<?php echo $view_lab_servicess_view->RealizationDate->viewAttributes() ?>><?php echo $view_lab_servicess_view->RealizationDate->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_servicess_view->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $view_lab_servicess_view->TableLeftColumnClass ?>"><span id="elh_view_lab_servicess_HospID"><script id="tpc_view_lab_servicess_HospID" type="text/html"><?php echo $view_lab_servicess_view->HospID->caption() ?></script></span></td>
		<td data-name="HospID" <?php echo $view_lab_servicess_view->HospID->cellAttributes() ?>>
<script id="tpx_view_lab_servicess_HospID" type="text/html"><span id="el_view_lab_servicess_HospID">
<span<?php echo $view_lab_servicess_view->HospID->viewAttributes() ?>><?php echo $view_lab_servicess_view->HospID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_servicess_view->RIDNO->Visible) { // RIDNO ?>
	<tr id="r_RIDNO">
		<td class="<?php echo $view_lab_servicess_view->TableLeftColumnClass ?>"><span id="elh_view_lab_servicess_RIDNO"><script id="tpc_view_lab_servicess_RIDNO" type="text/html"><?php echo $view_lab_servicess_view->RIDNO->caption() ?></script></span></td>
		<td data-name="RIDNO" <?php echo $view_lab_servicess_view->RIDNO->cellAttributes() ?>>
<script id="tpx_view_lab_servicess_RIDNO" type="text/html"><span id="el_view_lab_servicess_RIDNO">
<span<?php echo $view_lab_servicess_view->RIDNO->viewAttributes() ?>><?php echo $view_lab_servicess_view->RIDNO->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_servicess_view->TidNo->Visible) { // TidNo ?>
	<tr id="r_TidNo">
		<td class="<?php echo $view_lab_servicess_view->TableLeftColumnClass ?>"><span id="elh_view_lab_servicess_TidNo"><script id="tpc_view_lab_servicess_TidNo" type="text/html"><?php echo $view_lab_servicess_view->TidNo->caption() ?></script></span></td>
		<td data-name="TidNo" <?php echo $view_lab_servicess_view->TidNo->cellAttributes() ?>>
<script id="tpx_view_lab_servicess_TidNo" type="text/html"><span id="el_view_lab_servicess_TidNo">
<span<?php echo $view_lab_servicess_view->TidNo->viewAttributes() ?>><?php echo $view_lab_servicess_view->TidNo->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_servicess_view->CId->Visible) { // CId ?>
	<tr id="r_CId">
		<td class="<?php echo $view_lab_servicess_view->TableLeftColumnClass ?>"><span id="elh_view_lab_servicess_CId"><script id="tpc_view_lab_servicess_CId" type="text/html"><?php echo $view_lab_servicess_view->CId->caption() ?></script></span></td>
		<td data-name="CId" <?php echo $view_lab_servicess_view->CId->cellAttributes() ?>>
<script id="tpx_view_lab_servicess_CId" type="text/html"><span id="el_view_lab_servicess_CId">
<span<?php echo $view_lab_servicess_view->CId->viewAttributes() ?>><?php echo $view_lab_servicess_view->CId->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_servicess_view->PartnerName->Visible) { // PartnerName ?>
	<tr id="r_PartnerName">
		<td class="<?php echo $view_lab_servicess_view->TableLeftColumnClass ?>"><span id="elh_view_lab_servicess_PartnerName"><script id="tpc_view_lab_servicess_PartnerName" type="text/html"><?php echo $view_lab_servicess_view->PartnerName->caption() ?></script></span></td>
		<td data-name="PartnerName" <?php echo $view_lab_servicess_view->PartnerName->cellAttributes() ?>>
<script id="tpx_view_lab_servicess_PartnerName" type="text/html"><span id="el_view_lab_servicess_PartnerName">
<span<?php echo $view_lab_servicess_view->PartnerName->viewAttributes() ?>><?php echo $view_lab_servicess_view->PartnerName->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_servicess_view->PayerType->Visible) { // PayerType ?>
	<tr id="r_PayerType">
		<td class="<?php echo $view_lab_servicess_view->TableLeftColumnClass ?>"><span id="elh_view_lab_servicess_PayerType"><script id="tpc_view_lab_servicess_PayerType" type="text/html"><?php echo $view_lab_servicess_view->PayerType->caption() ?></script></span></td>
		<td data-name="PayerType" <?php echo $view_lab_servicess_view->PayerType->cellAttributes() ?>>
<script id="tpx_view_lab_servicess_PayerType" type="text/html"><span id="el_view_lab_servicess_PayerType">
<span<?php echo $view_lab_servicess_view->PayerType->viewAttributes() ?>><?php echo $view_lab_servicess_view->PayerType->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_servicess_view->Dob->Visible) { // Dob ?>
	<tr id="r_Dob">
		<td class="<?php echo $view_lab_servicess_view->TableLeftColumnClass ?>"><span id="elh_view_lab_servicess_Dob"><script id="tpc_view_lab_servicess_Dob" type="text/html"><?php echo $view_lab_servicess_view->Dob->caption() ?></script></span></td>
		<td data-name="Dob" <?php echo $view_lab_servicess_view->Dob->cellAttributes() ?>>
<script id="tpx_view_lab_servicess_Dob" type="text/html"><span id="el_view_lab_servicess_Dob">
<span<?php echo $view_lab_servicess_view->Dob->viewAttributes() ?>><?php echo $view_lab_servicess_view->Dob->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_servicess_view->Currency->Visible) { // Currency ?>
	<tr id="r_Currency">
		<td class="<?php echo $view_lab_servicess_view->TableLeftColumnClass ?>"><span id="elh_view_lab_servicess_Currency"><script id="tpc_view_lab_servicess_Currency" type="text/html"><?php echo $view_lab_servicess_view->Currency->caption() ?></script></span></td>
		<td data-name="Currency" <?php echo $view_lab_servicess_view->Currency->cellAttributes() ?>>
<script id="tpx_view_lab_servicess_Currency" type="text/html"><span id="el_view_lab_servicess_Currency">
<span<?php echo $view_lab_servicess_view->Currency->viewAttributes() ?>><?php echo $view_lab_servicess_view->Currency->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_servicess_view->DiscountRemarks->Visible) { // DiscountRemarks ?>
	<tr id="r_DiscountRemarks">
		<td class="<?php echo $view_lab_servicess_view->TableLeftColumnClass ?>"><span id="elh_view_lab_servicess_DiscountRemarks"><script id="tpc_view_lab_servicess_DiscountRemarks" type="text/html"><?php echo $view_lab_servicess_view->DiscountRemarks->caption() ?></script></span></td>
		<td data-name="DiscountRemarks" <?php echo $view_lab_servicess_view->DiscountRemarks->cellAttributes() ?>>
<script id="tpx_view_lab_servicess_DiscountRemarks" type="text/html"><span id="el_view_lab_servicess_DiscountRemarks">
<span<?php echo $view_lab_servicess_view->DiscountRemarks->viewAttributes() ?>><?php echo $view_lab_servicess_view->DiscountRemarks->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_servicess_view->Remarks->Visible) { // Remarks ?>
	<tr id="r_Remarks">
		<td class="<?php echo $view_lab_servicess_view->TableLeftColumnClass ?>"><span id="elh_view_lab_servicess_Remarks"><script id="tpc_view_lab_servicess_Remarks" type="text/html"><?php echo $view_lab_servicess_view->Remarks->caption() ?></script></span></td>
		<td data-name="Remarks" <?php echo $view_lab_servicess_view->Remarks->cellAttributes() ?>>
<script id="tpx_view_lab_servicess_Remarks" type="text/html"><span id="el_view_lab_servicess_Remarks">
<span<?php echo $view_lab_servicess_view->Remarks->viewAttributes() ?>><?php echo $view_lab_servicess_view->Remarks->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_servicess_view->PatId->Visible) { // PatId ?>
	<tr id="r_PatId">
		<td class="<?php echo $view_lab_servicess_view->TableLeftColumnClass ?>"><span id="elh_view_lab_servicess_PatId"><script id="tpc_view_lab_servicess_PatId" type="text/html"><?php echo $view_lab_servicess_view->PatId->caption() ?></script></span></td>
		<td data-name="PatId" <?php echo $view_lab_servicess_view->PatId->cellAttributes() ?>>
<script id="tpx_view_lab_servicess_PatId" type="text/html"><span id="el_view_lab_servicess_PatId">
<span<?php echo $view_lab_servicess_view->PatId->viewAttributes() ?>><?php echo $view_lab_servicess_view->PatId->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_servicess_view->DrDepartment->Visible) { // DrDepartment ?>
	<tr id="r_DrDepartment">
		<td class="<?php echo $view_lab_servicess_view->TableLeftColumnClass ?>"><span id="elh_view_lab_servicess_DrDepartment"><script id="tpc_view_lab_servicess_DrDepartment" type="text/html"><?php echo $view_lab_servicess_view->DrDepartment->caption() ?></script></span></td>
		<td data-name="DrDepartment" <?php echo $view_lab_servicess_view->DrDepartment->cellAttributes() ?>>
<script id="tpx_view_lab_servicess_DrDepartment" type="text/html"><span id="el_view_lab_servicess_DrDepartment">
<span<?php echo $view_lab_servicess_view->DrDepartment->viewAttributes() ?>><?php echo $view_lab_servicess_view->DrDepartment->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_servicess_view->RefferedBy->Visible) { // RefferedBy ?>
	<tr id="r_RefferedBy">
		<td class="<?php echo $view_lab_servicess_view->TableLeftColumnClass ?>"><span id="elh_view_lab_servicess_RefferedBy"><script id="tpc_view_lab_servicess_RefferedBy" type="text/html"><?php echo $view_lab_servicess_view->RefferedBy->caption() ?></script></span></td>
		<td data-name="RefferedBy" <?php echo $view_lab_servicess_view->RefferedBy->cellAttributes() ?>>
<script id="tpx_view_lab_servicess_RefferedBy" type="text/html"><span id="el_view_lab_servicess_RefferedBy">
<span<?php echo $view_lab_servicess_view->RefferedBy->viewAttributes() ?>><?php echo $view_lab_servicess_view->RefferedBy->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_servicess_view->BillNumber->Visible) { // BillNumber ?>
	<tr id="r_BillNumber">
		<td class="<?php echo $view_lab_servicess_view->TableLeftColumnClass ?>"><span id="elh_view_lab_servicess_BillNumber"><script id="tpc_view_lab_servicess_BillNumber" type="text/html"><?php echo $view_lab_servicess_view->BillNumber->caption() ?></script></span></td>
		<td data-name="BillNumber" <?php echo $view_lab_servicess_view->BillNumber->cellAttributes() ?>>
<script id="tpx_view_lab_servicess_BillNumber" type="text/html"><span id="el_view_lab_servicess_BillNumber">
<span<?php echo $view_lab_servicess_view->BillNumber->viewAttributes() ?>><?php echo $view_lab_servicess_view->BillNumber->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_servicess_view->CardNumber->Visible) { // CardNumber ?>
	<tr id="r_CardNumber">
		<td class="<?php echo $view_lab_servicess_view->TableLeftColumnClass ?>"><span id="elh_view_lab_servicess_CardNumber"><script id="tpc_view_lab_servicess_CardNumber" type="text/html"><?php echo $view_lab_servicess_view->CardNumber->caption() ?></script></span></td>
		<td data-name="CardNumber" <?php echo $view_lab_servicess_view->CardNumber->cellAttributes() ?>>
<script id="tpx_view_lab_servicess_CardNumber" type="text/html"><span id="el_view_lab_servicess_CardNumber">
<span<?php echo $view_lab_servicess_view->CardNumber->viewAttributes() ?>><?php echo $view_lab_servicess_view->CardNumber->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_servicess_view->BankName->Visible) { // BankName ?>
	<tr id="r_BankName">
		<td class="<?php echo $view_lab_servicess_view->TableLeftColumnClass ?>"><span id="elh_view_lab_servicess_BankName"><script id="tpc_view_lab_servicess_BankName" type="text/html"><?php echo $view_lab_servicess_view->BankName->caption() ?></script></span></td>
		<td data-name="BankName" <?php echo $view_lab_servicess_view->BankName->cellAttributes() ?>>
<script id="tpx_view_lab_servicess_BankName" type="text/html"><span id="el_view_lab_servicess_BankName">
<span<?php echo $view_lab_servicess_view->BankName->viewAttributes() ?>><?php echo $view_lab_servicess_view->BankName->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_servicess_view->DrID->Visible) { // DrID ?>
	<tr id="r_DrID">
		<td class="<?php echo $view_lab_servicess_view->TableLeftColumnClass ?>"><span id="elh_view_lab_servicess_DrID"><script id="tpc_view_lab_servicess_DrID" type="text/html"><?php echo $view_lab_servicess_view->DrID->caption() ?></script></span></td>
		<td data-name="DrID" <?php echo $view_lab_servicess_view->DrID->cellAttributes() ?>>
<script id="tpx_view_lab_servicess_DrID" type="text/html"><span id="el_view_lab_servicess_DrID">
<span<?php echo $view_lab_servicess_view->DrID->viewAttributes() ?>><?php echo $view_lab_servicess_view->DrID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_servicess_view->LabTestReleased->Visible) { // LabTestReleased ?>
	<tr id="r_LabTestReleased">
		<td class="<?php echo $view_lab_servicess_view->TableLeftColumnClass ?>"><span id="elh_view_lab_servicess_LabTestReleased"><script id="tpc_view_lab_servicess_LabTestReleased" type="text/html"><?php echo $view_lab_servicess_view->LabTestReleased->caption() ?></script></span></td>
		<td data-name="LabTestReleased" <?php echo $view_lab_servicess_view->LabTestReleased->cellAttributes() ?>>
<script id="tpx_view_lab_servicess_LabTestReleased" type="text/html"><span id="el_view_lab_servicess_LabTestReleased">
<span<?php echo $view_lab_servicess_view->LabTestReleased->viewAttributes() ?>><?php echo $view_lab_servicess_view->LabTestReleased->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_servicess_view->BillStatus->Visible) { // BillStatus ?>
	<tr id="r_BillStatus">
		<td class="<?php echo $view_lab_servicess_view->TableLeftColumnClass ?>"><span id="elh_view_lab_servicess_BillStatus"><script id="tpc_view_lab_servicess_BillStatus" type="text/html"><?php echo $view_lab_servicess_view->BillStatus->caption() ?></script></span></td>
		<td data-name="BillStatus" <?php echo $view_lab_servicess_view->BillStatus->cellAttributes() ?>>
<script id="tpx_view_lab_servicess_BillStatus" type="text/html"><span id="el_view_lab_servicess_BillStatus">
<span<?php echo $view_lab_servicess_view->BillStatus->viewAttributes() ?>><?php echo $view_lab_servicess_view->BillStatus->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_view_lab_servicessview" class="ew-custom-template"></div>
<script id="tpm_view_lab_servicessview" type="text/html">
<div id="ct_view_lab_servicess_view"><style>
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
 ?>
<h2 align="center">PATIENT BILL OF SUPPLY</h2>
<font size="4" style="font-weight: bold;">
<table width="100%">
	 <tbody>
		<tr><td  style="float:left;">PatientId: <?php echo $PatientID; ?> </td><td  style="float: right;">Bill No: {{:BillNumber}}</td></tr>
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
<td><b>Description</b></td>
<td><b>Item Code</b></td>
<td><b>Qty</b></td>
<td><b>Rate</b></td>
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
$sql = "SELECT * FROM ganeshkumar_bjhims.patient_services where Vid='".$invoiceId."'  and TestType != 'ProfileSubTest';";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	$row = &$rs->fields;
				$Services =  $row["Services"];
				$ItemCode =  $row["ItemCode"];
				$Qty = 1; //$row["Services"];
				$Rate =  $row["amount"];
				$SubTotal =  $row["SubTotal"];
				$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td>'.$Qty.'</td><td>'.$Rate.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
	$rs->MoveNext();
}
$hhh .= '<tr><td></td><td></td><td></td><td align="right">Total</td><td align="right">'.$Page->Amount->CurrentValue.'</td></tr>  ';
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
	if (in_array("view_lab_resultreleasedd", explode(",", $view_lab_servicess->getCurrentDetailTable())) && $view_lab_resultreleasedd->DetailView) {
?>
<?php if ($view_lab_servicess->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("view_lab_resultreleasedd", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "view_lab_resultreleaseddgrid.php" ?>
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($view_lab_servicess->Rows) ?> };
	ew.applyTemplate("tpd_view_lab_servicessview", "tpm_view_lab_servicessview", "view_lab_servicessview", "<?php echo $view_lab_servicess->CustomExport ?>", ew.templateData.rows[0]);
	$("script.view_lab_servicessview_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$view_lab_servicess_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_lab_servicess_view->isExport()) { ?>
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
$view_lab_servicess_view->terminate();
?>