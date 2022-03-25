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
$view_billing_voucher_print_view = new view_billing_voucher_print_view();

// Run the page
$view_billing_voucher_print_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_billing_voucher_print_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_billing_voucher_print_view->isExport()) { ?>
<script>
var fview_billing_voucher_printview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fview_billing_voucher_printview = currentForm = new ew.Form("fview_billing_voucher_printview", "view");
	loadjs.done("fview_billing_voucher_printview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$view_billing_voucher_print_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $view_billing_voucher_print_view->ExportOptions->render("body") ?>
<?php $view_billing_voucher_print_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $view_billing_voucher_print_view->showPageHeader(); ?>
<?php
$view_billing_voucher_print_view->showMessage();
?>
<form name="fview_billing_voucher_printview" id="fview_billing_voucher_printview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_billing_voucher_print">
<input type="hidden" name="modal" value="<?php echo (int)$view_billing_voucher_print_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($view_billing_voucher_print_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_id"><script id="tpc_view_billing_voucher_print_id" type="text/html"><?php echo $view_billing_voucher_print_view->id->caption() ?></script></span></td>
		<td data-name="id" <?php echo $view_billing_voucher_print_view->id->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_id" type="text/html"><span id="el_view_billing_voucher_print_id">
<span<?php echo $view_billing_voucher_print_view->id->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->id->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_print_view->Reception->Visible) { // Reception ?>
	<tr id="r_Reception">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_Reception"><script id="tpc_view_billing_voucher_print_Reception" type="text/html"><?php echo $view_billing_voucher_print_view->Reception->caption() ?></script></span></td>
		<td data-name="Reception" <?php echo $view_billing_voucher_print_view->Reception->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_Reception" type="text/html"><span id="el_view_billing_voucher_print_Reception">
<span<?php echo $view_billing_voucher_print_view->Reception->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->Reception->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_print_view->PatientId->Visible) { // PatientId ?>
	<tr id="r_PatientId">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_PatientId"><script id="tpc_view_billing_voucher_print_PatientId" type="text/html"><?php echo $view_billing_voucher_print_view->PatientId->caption() ?></script></span></td>
		<td data-name="PatientId" <?php echo $view_billing_voucher_print_view->PatientId->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_PatientId" type="text/html"><span id="el_view_billing_voucher_print_PatientId">
<span<?php echo $view_billing_voucher_print_view->PatientId->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->PatientId->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_print_view->mrnno->Visible) { // mrnno ?>
	<tr id="r_mrnno">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_mrnno"><script id="tpc_view_billing_voucher_print_mrnno" type="text/html"><?php echo $view_billing_voucher_print_view->mrnno->caption() ?></script></span></td>
		<td data-name="mrnno" <?php echo $view_billing_voucher_print_view->mrnno->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_mrnno" type="text/html"><span id="el_view_billing_voucher_print_mrnno">
<span<?php echo $view_billing_voucher_print_view->mrnno->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->mrnno->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_print_view->PatientName->Visible) { // PatientName ?>
	<tr id="r_PatientName">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_PatientName"><script id="tpc_view_billing_voucher_print_PatientName" type="text/html"><?php echo $view_billing_voucher_print_view->PatientName->caption() ?></script></span></td>
		<td data-name="PatientName" <?php echo $view_billing_voucher_print_view->PatientName->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_PatientName" type="text/html"><span id="el_view_billing_voucher_print_PatientName">
<span<?php echo $view_billing_voucher_print_view->PatientName->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->PatientName->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_print_view->Age->Visible) { // Age ?>
	<tr id="r_Age">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_Age"><script id="tpc_view_billing_voucher_print_Age" type="text/html"><?php echo $view_billing_voucher_print_view->Age->caption() ?></script></span></td>
		<td data-name="Age" <?php echo $view_billing_voucher_print_view->Age->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_Age" type="text/html"><span id="el_view_billing_voucher_print_Age">
<span<?php echo $view_billing_voucher_print_view->Age->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->Age->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_print_view->Gender->Visible) { // Gender ?>
	<tr id="r_Gender">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_Gender"><script id="tpc_view_billing_voucher_print_Gender" type="text/html"><?php echo $view_billing_voucher_print_view->Gender->caption() ?></script></span></td>
		<td data-name="Gender" <?php echo $view_billing_voucher_print_view->Gender->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_Gender" type="text/html"><span id="el_view_billing_voucher_print_Gender">
<span<?php echo $view_billing_voucher_print_view->Gender->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->Gender->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_print_view->profilePic->Visible) { // profilePic ?>
	<tr id="r_profilePic">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_profilePic"><script id="tpc_view_billing_voucher_print_profilePic" type="text/html"><?php echo $view_billing_voucher_print_view->profilePic->caption() ?></script></span></td>
		<td data-name="profilePic" <?php echo $view_billing_voucher_print_view->profilePic->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_profilePic" type="text/html"><span id="el_view_billing_voucher_print_profilePic">
<span<?php echo $view_billing_voucher_print_view->profilePic->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->profilePic->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_print_view->Mobile->Visible) { // Mobile ?>
	<tr id="r_Mobile">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_Mobile"><script id="tpc_view_billing_voucher_print_Mobile" type="text/html"><?php echo $view_billing_voucher_print_view->Mobile->caption() ?></script></span></td>
		<td data-name="Mobile" <?php echo $view_billing_voucher_print_view->Mobile->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_Mobile" type="text/html"><span id="el_view_billing_voucher_print_Mobile">
<span<?php echo $view_billing_voucher_print_view->Mobile->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->Mobile->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_print_view->IP_OP->Visible) { // IP_OP ?>
	<tr id="r_IP_OP">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_IP_OP"><script id="tpc_view_billing_voucher_print_IP_OP" type="text/html"><?php echo $view_billing_voucher_print_view->IP_OP->caption() ?></script></span></td>
		<td data-name="IP_OP" <?php echo $view_billing_voucher_print_view->IP_OP->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_IP_OP" type="text/html"><span id="el_view_billing_voucher_print_IP_OP">
<span<?php echo $view_billing_voucher_print_view->IP_OP->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->IP_OP->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_print_view->Doctor->Visible) { // Doctor ?>
	<tr id="r_Doctor">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_Doctor"><script id="tpc_view_billing_voucher_print_Doctor" type="text/html"><?php echo $view_billing_voucher_print_view->Doctor->caption() ?></script></span></td>
		<td data-name="Doctor" <?php echo $view_billing_voucher_print_view->Doctor->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_Doctor" type="text/html"><span id="el_view_billing_voucher_print_Doctor">
<span<?php echo $view_billing_voucher_print_view->Doctor->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->Doctor->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_print_view->voucher_type->Visible) { // voucher_type ?>
	<tr id="r_voucher_type">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_voucher_type"><script id="tpc_view_billing_voucher_print_voucher_type" type="text/html"><?php echo $view_billing_voucher_print_view->voucher_type->caption() ?></script></span></td>
		<td data-name="voucher_type" <?php echo $view_billing_voucher_print_view->voucher_type->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_voucher_type" type="text/html"><span id="el_view_billing_voucher_print_voucher_type">
<span<?php echo $view_billing_voucher_print_view->voucher_type->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->voucher_type->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_print_view->Details->Visible) { // Details ?>
	<tr id="r_Details">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_Details"><script id="tpc_view_billing_voucher_print_Details" type="text/html"><?php echo $view_billing_voucher_print_view->Details->caption() ?></script></span></td>
		<td data-name="Details" <?php echo $view_billing_voucher_print_view->Details->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_Details" type="text/html"><span id="el_view_billing_voucher_print_Details">
<span<?php echo $view_billing_voucher_print_view->Details->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->Details->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_print_view->ModeofPayment->Visible) { // ModeofPayment ?>
	<tr id="r_ModeofPayment">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_ModeofPayment"><script id="tpc_view_billing_voucher_print_ModeofPayment" type="text/html"><?php echo $view_billing_voucher_print_view->ModeofPayment->caption() ?></script></span></td>
		<td data-name="ModeofPayment" <?php echo $view_billing_voucher_print_view->ModeofPayment->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_ModeofPayment" type="text/html"><span id="el_view_billing_voucher_print_ModeofPayment">
<span<?php echo $view_billing_voucher_print_view->ModeofPayment->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->ModeofPayment->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_print_view->Amount->Visible) { // Amount ?>
	<tr id="r_Amount">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_Amount"><script id="tpc_view_billing_voucher_print_Amount" type="text/html"><?php echo $view_billing_voucher_print_view->Amount->caption() ?></script></span></td>
		<td data-name="Amount" <?php echo $view_billing_voucher_print_view->Amount->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_Amount" type="text/html"><span id="el_view_billing_voucher_print_Amount">
<span<?php echo $view_billing_voucher_print_view->Amount->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->Amount->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_print_view->AnyDues->Visible) { // AnyDues ?>
	<tr id="r_AnyDues">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_AnyDues"><script id="tpc_view_billing_voucher_print_AnyDues" type="text/html"><?php echo $view_billing_voucher_print_view->AnyDues->caption() ?></script></span></td>
		<td data-name="AnyDues" <?php echo $view_billing_voucher_print_view->AnyDues->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_AnyDues" type="text/html"><span id="el_view_billing_voucher_print_AnyDues">
<span<?php echo $view_billing_voucher_print_view->AnyDues->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->AnyDues->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_print_view->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_createdby"><script id="tpc_view_billing_voucher_print_createdby" type="text/html"><?php echo $view_billing_voucher_print_view->createdby->caption() ?></script></span></td>
		<td data-name="createdby" <?php echo $view_billing_voucher_print_view->createdby->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_createdby" type="text/html"><span id="el_view_billing_voucher_print_createdby">
<span<?php echo $view_billing_voucher_print_view->createdby->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->createdby->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_print_view->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_createddatetime"><script id="tpc_view_billing_voucher_print_createddatetime" type="text/html"><?php echo $view_billing_voucher_print_view->createddatetime->caption() ?></script></span></td>
		<td data-name="createddatetime" <?php echo $view_billing_voucher_print_view->createddatetime->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_createddatetime" type="text/html"><span id="el_view_billing_voucher_print_createddatetime">
<span<?php echo $view_billing_voucher_print_view->createddatetime->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->createddatetime->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_print_view->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_modifiedby"><script id="tpc_view_billing_voucher_print_modifiedby" type="text/html"><?php echo $view_billing_voucher_print_view->modifiedby->caption() ?></script></span></td>
		<td data-name="modifiedby" <?php echo $view_billing_voucher_print_view->modifiedby->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_modifiedby" type="text/html"><span id="el_view_billing_voucher_print_modifiedby">
<span<?php echo $view_billing_voucher_print_view->modifiedby->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->modifiedby->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_print_view->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_modifieddatetime"><script id="tpc_view_billing_voucher_print_modifieddatetime" type="text/html"><?php echo $view_billing_voucher_print_view->modifieddatetime->caption() ?></script></span></td>
		<td data-name="modifieddatetime" <?php echo $view_billing_voucher_print_view->modifieddatetime->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_modifieddatetime" type="text/html"><span id="el_view_billing_voucher_print_modifieddatetime">
<span<?php echo $view_billing_voucher_print_view->modifieddatetime->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->modifieddatetime->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_print_view->RealizationAmount->Visible) { // RealizationAmount ?>
	<tr id="r_RealizationAmount">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_RealizationAmount"><script id="tpc_view_billing_voucher_print_RealizationAmount" type="text/html"><?php echo $view_billing_voucher_print_view->RealizationAmount->caption() ?></script></span></td>
		<td data-name="RealizationAmount" <?php echo $view_billing_voucher_print_view->RealizationAmount->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_RealizationAmount" type="text/html"><span id="el_view_billing_voucher_print_RealizationAmount">
<span<?php echo $view_billing_voucher_print_view->RealizationAmount->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->RealizationAmount->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_print_view->RealizationStatus->Visible) { // RealizationStatus ?>
	<tr id="r_RealizationStatus">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_RealizationStatus"><script id="tpc_view_billing_voucher_print_RealizationStatus" type="text/html"><?php echo $view_billing_voucher_print_view->RealizationStatus->caption() ?></script></span></td>
		<td data-name="RealizationStatus" <?php echo $view_billing_voucher_print_view->RealizationStatus->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_RealizationStatus" type="text/html"><span id="el_view_billing_voucher_print_RealizationStatus">
<span<?php echo $view_billing_voucher_print_view->RealizationStatus->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->RealizationStatus->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_print_view->RealizationRemarks->Visible) { // RealizationRemarks ?>
	<tr id="r_RealizationRemarks">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_RealizationRemarks"><script id="tpc_view_billing_voucher_print_RealizationRemarks" type="text/html"><?php echo $view_billing_voucher_print_view->RealizationRemarks->caption() ?></script></span></td>
		<td data-name="RealizationRemarks" <?php echo $view_billing_voucher_print_view->RealizationRemarks->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_RealizationRemarks" type="text/html"><span id="el_view_billing_voucher_print_RealizationRemarks">
<span<?php echo $view_billing_voucher_print_view->RealizationRemarks->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->RealizationRemarks->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_print_view->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
	<tr id="r_RealizationBatchNo">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_RealizationBatchNo"><script id="tpc_view_billing_voucher_print_RealizationBatchNo" type="text/html"><?php echo $view_billing_voucher_print_view->RealizationBatchNo->caption() ?></script></span></td>
		<td data-name="RealizationBatchNo" <?php echo $view_billing_voucher_print_view->RealizationBatchNo->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_RealizationBatchNo" type="text/html"><span id="el_view_billing_voucher_print_RealizationBatchNo">
<span<?php echo $view_billing_voucher_print_view->RealizationBatchNo->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->RealizationBatchNo->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_print_view->RealizationDate->Visible) { // RealizationDate ?>
	<tr id="r_RealizationDate">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_RealizationDate"><script id="tpc_view_billing_voucher_print_RealizationDate" type="text/html"><?php echo $view_billing_voucher_print_view->RealizationDate->caption() ?></script></span></td>
		<td data-name="RealizationDate" <?php echo $view_billing_voucher_print_view->RealizationDate->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_RealizationDate" type="text/html"><span id="el_view_billing_voucher_print_RealizationDate">
<span<?php echo $view_billing_voucher_print_view->RealizationDate->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->RealizationDate->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_print_view->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_HospID"><script id="tpc_view_billing_voucher_print_HospID" type="text/html"><?php echo $view_billing_voucher_print_view->HospID->caption() ?></script></span></td>
		<td data-name="HospID" <?php echo $view_billing_voucher_print_view->HospID->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_HospID" type="text/html"><span id="el_view_billing_voucher_print_HospID">
<span<?php echo $view_billing_voucher_print_view->HospID->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->HospID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_print_view->RIDNO->Visible) { // RIDNO ?>
	<tr id="r_RIDNO">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_RIDNO"><script id="tpc_view_billing_voucher_print_RIDNO" type="text/html"><?php echo $view_billing_voucher_print_view->RIDNO->caption() ?></script></span></td>
		<td data-name="RIDNO" <?php echo $view_billing_voucher_print_view->RIDNO->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_RIDNO" type="text/html"><span id="el_view_billing_voucher_print_RIDNO">
<span<?php echo $view_billing_voucher_print_view->RIDNO->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->RIDNO->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_print_view->TidNo->Visible) { // TidNo ?>
	<tr id="r_TidNo">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_TidNo"><script id="tpc_view_billing_voucher_print_TidNo" type="text/html"><?php echo $view_billing_voucher_print_view->TidNo->caption() ?></script></span></td>
		<td data-name="TidNo" <?php echo $view_billing_voucher_print_view->TidNo->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_TidNo" type="text/html"><span id="el_view_billing_voucher_print_TidNo">
<span<?php echo $view_billing_voucher_print_view->TidNo->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->TidNo->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_print_view->CId->Visible) { // CId ?>
	<tr id="r_CId">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_CId"><script id="tpc_view_billing_voucher_print_CId" type="text/html"><?php echo $view_billing_voucher_print_view->CId->caption() ?></script></span></td>
		<td data-name="CId" <?php echo $view_billing_voucher_print_view->CId->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_CId" type="text/html"><span id="el_view_billing_voucher_print_CId">
<span<?php echo $view_billing_voucher_print_view->CId->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->CId->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_print_view->PartnerName->Visible) { // PartnerName ?>
	<tr id="r_PartnerName">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_PartnerName"><script id="tpc_view_billing_voucher_print_PartnerName" type="text/html"><?php echo $view_billing_voucher_print_view->PartnerName->caption() ?></script></span></td>
		<td data-name="PartnerName" <?php echo $view_billing_voucher_print_view->PartnerName->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_PartnerName" type="text/html"><span id="el_view_billing_voucher_print_PartnerName">
<span<?php echo $view_billing_voucher_print_view->PartnerName->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->PartnerName->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_print_view->PayerType->Visible) { // PayerType ?>
	<tr id="r_PayerType">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_PayerType"><script id="tpc_view_billing_voucher_print_PayerType" type="text/html"><?php echo $view_billing_voucher_print_view->PayerType->caption() ?></script></span></td>
		<td data-name="PayerType" <?php echo $view_billing_voucher_print_view->PayerType->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_PayerType" type="text/html"><span id="el_view_billing_voucher_print_PayerType">
<span<?php echo $view_billing_voucher_print_view->PayerType->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->PayerType->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_print_view->Dob->Visible) { // Dob ?>
	<tr id="r_Dob">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_Dob"><script id="tpc_view_billing_voucher_print_Dob" type="text/html"><?php echo $view_billing_voucher_print_view->Dob->caption() ?></script></span></td>
		<td data-name="Dob" <?php echo $view_billing_voucher_print_view->Dob->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_Dob" type="text/html"><span id="el_view_billing_voucher_print_Dob">
<span<?php echo $view_billing_voucher_print_view->Dob->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->Dob->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_print_view->Currency->Visible) { // Currency ?>
	<tr id="r_Currency">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_Currency"><script id="tpc_view_billing_voucher_print_Currency" type="text/html"><?php echo $view_billing_voucher_print_view->Currency->caption() ?></script></span></td>
		<td data-name="Currency" <?php echo $view_billing_voucher_print_view->Currency->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_Currency" type="text/html"><span id="el_view_billing_voucher_print_Currency">
<span<?php echo $view_billing_voucher_print_view->Currency->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->Currency->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_print_view->DiscountRemarks->Visible) { // DiscountRemarks ?>
	<tr id="r_DiscountRemarks">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_DiscountRemarks"><script id="tpc_view_billing_voucher_print_DiscountRemarks" type="text/html"><?php echo $view_billing_voucher_print_view->DiscountRemarks->caption() ?></script></span></td>
		<td data-name="DiscountRemarks" <?php echo $view_billing_voucher_print_view->DiscountRemarks->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_DiscountRemarks" type="text/html"><span id="el_view_billing_voucher_print_DiscountRemarks">
<span<?php echo $view_billing_voucher_print_view->DiscountRemarks->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->DiscountRemarks->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_print_view->Remarks->Visible) { // Remarks ?>
	<tr id="r_Remarks">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_Remarks"><script id="tpc_view_billing_voucher_print_Remarks" type="text/html"><?php echo $view_billing_voucher_print_view->Remarks->caption() ?></script></span></td>
		<td data-name="Remarks" <?php echo $view_billing_voucher_print_view->Remarks->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_Remarks" type="text/html"><span id="el_view_billing_voucher_print_Remarks">
<span<?php echo $view_billing_voucher_print_view->Remarks->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->Remarks->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_print_view->PatId->Visible) { // PatId ?>
	<tr id="r_PatId">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_PatId"><script id="tpc_view_billing_voucher_print_PatId" type="text/html"><?php echo $view_billing_voucher_print_view->PatId->caption() ?></script></span></td>
		<td data-name="PatId" <?php echo $view_billing_voucher_print_view->PatId->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_PatId" type="text/html"><span id="el_view_billing_voucher_print_PatId">
<span<?php echo $view_billing_voucher_print_view->PatId->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->PatId->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_print_view->DrDepartment->Visible) { // DrDepartment ?>
	<tr id="r_DrDepartment">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_DrDepartment"><script id="tpc_view_billing_voucher_print_DrDepartment" type="text/html"><?php echo $view_billing_voucher_print_view->DrDepartment->caption() ?></script></span></td>
		<td data-name="DrDepartment" <?php echo $view_billing_voucher_print_view->DrDepartment->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_DrDepartment" type="text/html"><span id="el_view_billing_voucher_print_DrDepartment">
<span<?php echo $view_billing_voucher_print_view->DrDepartment->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->DrDepartment->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_print_view->RefferedBy->Visible) { // RefferedBy ?>
	<tr id="r_RefferedBy">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_RefferedBy"><script id="tpc_view_billing_voucher_print_RefferedBy" type="text/html"><?php echo $view_billing_voucher_print_view->RefferedBy->caption() ?></script></span></td>
		<td data-name="RefferedBy" <?php echo $view_billing_voucher_print_view->RefferedBy->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_RefferedBy" type="text/html"><span id="el_view_billing_voucher_print_RefferedBy">
<span<?php echo $view_billing_voucher_print_view->RefferedBy->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->RefferedBy->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_print_view->BillNumber->Visible) { // BillNumber ?>
	<tr id="r_BillNumber">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_BillNumber"><script id="tpc_view_billing_voucher_print_BillNumber" type="text/html"><?php echo $view_billing_voucher_print_view->BillNumber->caption() ?></script></span></td>
		<td data-name="BillNumber" <?php echo $view_billing_voucher_print_view->BillNumber->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_BillNumber" type="text/html"><span id="el_view_billing_voucher_print_BillNumber">
<span<?php echo $view_billing_voucher_print_view->BillNumber->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->BillNumber->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_print_view->CardNumber->Visible) { // CardNumber ?>
	<tr id="r_CardNumber">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_CardNumber"><script id="tpc_view_billing_voucher_print_CardNumber" type="text/html"><?php echo $view_billing_voucher_print_view->CardNumber->caption() ?></script></span></td>
		<td data-name="CardNumber" <?php echo $view_billing_voucher_print_view->CardNumber->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_CardNumber" type="text/html"><span id="el_view_billing_voucher_print_CardNumber">
<span<?php echo $view_billing_voucher_print_view->CardNumber->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->CardNumber->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_print_view->BankName->Visible) { // BankName ?>
	<tr id="r_BankName">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_BankName"><script id="tpc_view_billing_voucher_print_BankName" type="text/html"><?php echo $view_billing_voucher_print_view->BankName->caption() ?></script></span></td>
		<td data-name="BankName" <?php echo $view_billing_voucher_print_view->BankName->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_BankName" type="text/html"><span id="el_view_billing_voucher_print_BankName">
<span<?php echo $view_billing_voucher_print_view->BankName->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->BankName->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_print_view->DrID->Visible) { // DrID ?>
	<tr id="r_DrID">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_DrID"><script id="tpc_view_billing_voucher_print_DrID" type="text/html"><?php echo $view_billing_voucher_print_view->DrID->caption() ?></script></span></td>
		<td data-name="DrID" <?php echo $view_billing_voucher_print_view->DrID->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_DrID" type="text/html"><span id="el_view_billing_voucher_print_DrID">
<span<?php echo $view_billing_voucher_print_view->DrID->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->DrID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_print_view->BillStatus->Visible) { // BillStatus ?>
	<tr id="r_BillStatus">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_BillStatus"><script id="tpc_view_billing_voucher_print_BillStatus" type="text/html"><?php echo $view_billing_voucher_print_view->BillStatus->caption() ?></script></span></td>
		<td data-name="BillStatus" <?php echo $view_billing_voucher_print_view->BillStatus->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_BillStatus" type="text/html"><span id="el_view_billing_voucher_print_BillStatus">
<span<?php echo $view_billing_voucher_print_view->BillStatus->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->BillStatus->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_print_view->ReportHeader->Visible) { // ReportHeader ?>
	<tr id="r_ReportHeader">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_ReportHeader"><script id="tpc_view_billing_voucher_print_ReportHeader" type="text/html"><?php echo $view_billing_voucher_print_view->ReportHeader->caption() ?></script></span></td>
		<td data-name="ReportHeader" <?php echo $view_billing_voucher_print_view->ReportHeader->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_ReportHeader" type="text/html"><span id="el_view_billing_voucher_print_ReportHeader">
<span<?php echo $view_billing_voucher_print_view->ReportHeader->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->ReportHeader->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_print_view->UserName->Visible) { // UserName ?>
	<tr id="r_UserName">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_UserName"><script id="tpc_view_billing_voucher_print_UserName" type="text/html"><?php echo $view_billing_voucher_print_view->UserName->caption() ?></script></span></td>
		<td data-name="UserName" <?php echo $view_billing_voucher_print_view->UserName->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_UserName" type="text/html"><span id="el_view_billing_voucher_print_UserName">
<span<?php echo $view_billing_voucher_print_view->UserName->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->UserName->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_print_view->AdjustmentAdvance->Visible) { // AdjustmentAdvance ?>
	<tr id="r_AdjustmentAdvance">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_AdjustmentAdvance"><script id="tpc_view_billing_voucher_print_AdjustmentAdvance" type="text/html"><?php echo $view_billing_voucher_print_view->AdjustmentAdvance->caption() ?></script></span></td>
		<td data-name="AdjustmentAdvance" <?php echo $view_billing_voucher_print_view->AdjustmentAdvance->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_AdjustmentAdvance" type="text/html"><span id="el_view_billing_voucher_print_AdjustmentAdvance">
<span<?php echo $view_billing_voucher_print_view->AdjustmentAdvance->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->AdjustmentAdvance->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_print_view->billing_vouchercol->Visible) { // billing_vouchercol ?>
	<tr id="r_billing_vouchercol">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_billing_vouchercol"><script id="tpc_view_billing_voucher_print_billing_vouchercol" type="text/html"><?php echo $view_billing_voucher_print_view->billing_vouchercol->caption() ?></script></span></td>
		<td data-name="billing_vouchercol" <?php echo $view_billing_voucher_print_view->billing_vouchercol->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_billing_vouchercol" type="text/html"><span id="el_view_billing_voucher_print_billing_vouchercol">
<span<?php echo $view_billing_voucher_print_view->billing_vouchercol->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->billing_vouchercol->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_print_view->BillType->Visible) { // BillType ?>
	<tr id="r_BillType">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_BillType"><script id="tpc_view_billing_voucher_print_BillType" type="text/html"><?php echo $view_billing_voucher_print_view->BillType->caption() ?></script></span></td>
		<td data-name="BillType" <?php echo $view_billing_voucher_print_view->BillType->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_BillType" type="text/html"><span id="el_view_billing_voucher_print_BillType">
<span<?php echo $view_billing_voucher_print_view->BillType->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->BillType->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_print_view->ProcedureName->Visible) { // ProcedureName ?>
	<tr id="r_ProcedureName">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_ProcedureName"><script id="tpc_view_billing_voucher_print_ProcedureName" type="text/html"><?php echo $view_billing_voucher_print_view->ProcedureName->caption() ?></script></span></td>
		<td data-name="ProcedureName" <?php echo $view_billing_voucher_print_view->ProcedureName->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_ProcedureName" type="text/html"><span id="el_view_billing_voucher_print_ProcedureName">
<span<?php echo $view_billing_voucher_print_view->ProcedureName->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->ProcedureName->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_print_view->ProcedureAmount->Visible) { // ProcedureAmount ?>
	<tr id="r_ProcedureAmount">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_ProcedureAmount"><script id="tpc_view_billing_voucher_print_ProcedureAmount" type="text/html"><?php echo $view_billing_voucher_print_view->ProcedureAmount->caption() ?></script></span></td>
		<td data-name="ProcedureAmount" <?php echo $view_billing_voucher_print_view->ProcedureAmount->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_ProcedureAmount" type="text/html"><span id="el_view_billing_voucher_print_ProcedureAmount">
<span<?php echo $view_billing_voucher_print_view->ProcedureAmount->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->ProcedureAmount->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_print_view->IncludePackage->Visible) { // IncludePackage ?>
	<tr id="r_IncludePackage">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_IncludePackage"><script id="tpc_view_billing_voucher_print_IncludePackage" type="text/html"><?php echo $view_billing_voucher_print_view->IncludePackage->caption() ?></script></span></td>
		<td data-name="IncludePackage" <?php echo $view_billing_voucher_print_view->IncludePackage->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_IncludePackage" type="text/html"><span id="el_view_billing_voucher_print_IncludePackage">
<span<?php echo $view_billing_voucher_print_view->IncludePackage->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->IncludePackage->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_print_view->CancelBill->Visible) { // CancelBill ?>
	<tr id="r_CancelBill">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_CancelBill"><script id="tpc_view_billing_voucher_print_CancelBill" type="text/html"><?php echo $view_billing_voucher_print_view->CancelBill->caption() ?></script></span></td>
		<td data-name="CancelBill" <?php echo $view_billing_voucher_print_view->CancelBill->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_CancelBill" type="text/html"><span id="el_view_billing_voucher_print_CancelBill">
<span<?php echo $view_billing_voucher_print_view->CancelBill->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->CancelBill->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_print_view->CancelReason->Visible) { // CancelReason ?>
	<tr id="r_CancelReason">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_CancelReason"><script id="tpc_view_billing_voucher_print_CancelReason" type="text/html"><?php echo $view_billing_voucher_print_view->CancelReason->caption() ?></script></span></td>
		<td data-name="CancelReason" <?php echo $view_billing_voucher_print_view->CancelReason->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_CancelReason" type="text/html"><span id="el_view_billing_voucher_print_CancelReason">
<span<?php echo $view_billing_voucher_print_view->CancelReason->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->CancelReason->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_print_view->CancelModeOfPayment->Visible) { // CancelModeOfPayment ?>
	<tr id="r_CancelModeOfPayment">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_CancelModeOfPayment"><script id="tpc_view_billing_voucher_print_CancelModeOfPayment" type="text/html"><?php echo $view_billing_voucher_print_view->CancelModeOfPayment->caption() ?></script></span></td>
		<td data-name="CancelModeOfPayment" <?php echo $view_billing_voucher_print_view->CancelModeOfPayment->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_CancelModeOfPayment" type="text/html"><span id="el_view_billing_voucher_print_CancelModeOfPayment">
<span<?php echo $view_billing_voucher_print_view->CancelModeOfPayment->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->CancelModeOfPayment->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_print_view->CancelAmount->Visible) { // CancelAmount ?>
	<tr id="r_CancelAmount">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_CancelAmount"><script id="tpc_view_billing_voucher_print_CancelAmount" type="text/html"><?php echo $view_billing_voucher_print_view->CancelAmount->caption() ?></script></span></td>
		<td data-name="CancelAmount" <?php echo $view_billing_voucher_print_view->CancelAmount->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_CancelAmount" type="text/html"><span id="el_view_billing_voucher_print_CancelAmount">
<span<?php echo $view_billing_voucher_print_view->CancelAmount->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->CancelAmount->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_print_view->CancelBankName->Visible) { // CancelBankName ?>
	<tr id="r_CancelBankName">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_CancelBankName"><script id="tpc_view_billing_voucher_print_CancelBankName" type="text/html"><?php echo $view_billing_voucher_print_view->CancelBankName->caption() ?></script></span></td>
		<td data-name="CancelBankName" <?php echo $view_billing_voucher_print_view->CancelBankName->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_CancelBankName" type="text/html"><span id="el_view_billing_voucher_print_CancelBankName">
<span<?php echo $view_billing_voucher_print_view->CancelBankName->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->CancelBankName->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_print_view->CancelTransactionNumber->Visible) { // CancelTransactionNumber ?>
	<tr id="r_CancelTransactionNumber">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_CancelTransactionNumber"><script id="tpc_view_billing_voucher_print_CancelTransactionNumber" type="text/html"><?php echo $view_billing_voucher_print_view->CancelTransactionNumber->caption() ?></script></span></td>
		<td data-name="CancelTransactionNumber" <?php echo $view_billing_voucher_print_view->CancelTransactionNumber->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_CancelTransactionNumber" type="text/html"><span id="el_view_billing_voucher_print_CancelTransactionNumber">
<span<?php echo $view_billing_voucher_print_view->CancelTransactionNumber->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->CancelTransactionNumber->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_print_view->LabTest->Visible) { // LabTest ?>
	<tr id="r_LabTest">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_LabTest"><script id="tpc_view_billing_voucher_print_LabTest" type="text/html"><?php echo $view_billing_voucher_print_view->LabTest->caption() ?></script></span></td>
		<td data-name="LabTest" <?php echo $view_billing_voucher_print_view->LabTest->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_LabTest" type="text/html"><span id="el_view_billing_voucher_print_LabTest">
<span<?php echo $view_billing_voucher_print_view->LabTest->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->LabTest->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_print_view->sid->Visible) { // sid ?>
	<tr id="r_sid">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_sid"><script id="tpc_view_billing_voucher_print_sid" type="text/html"><?php echo $view_billing_voucher_print_view->sid->caption() ?></script></span></td>
		<td data-name="sid" <?php echo $view_billing_voucher_print_view->sid->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_sid" type="text/html"><span id="el_view_billing_voucher_print_sid">
<span<?php echo $view_billing_voucher_print_view->sid->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->sid->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_print_view->SidNo->Visible) { // SidNo ?>
	<tr id="r_SidNo">
		<td class="<?php echo $view_billing_voucher_print_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_print_SidNo"><script id="tpc_view_billing_voucher_print_SidNo" type="text/html"><?php echo $view_billing_voucher_print_view->SidNo->caption() ?></script></span></td>
		<td data-name="SidNo" <?php echo $view_billing_voucher_print_view->SidNo->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_print_SidNo" type="text/html"><span id="el_view_billing_voucher_print_SidNo">
<span<?php echo $view_billing_voucher_print_view->SidNo->viewAttributes() ?>><?php echo $view_billing_voucher_print_view->SidNo->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_view_billing_voucher_printview" class="ew-custom-template"></div>
<script id="tpm_view_billing_voucher_printview" type="text/html">
<div id="ct_view_billing_voucher_print_view"><style>
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
			echo '<h5 align="center"><u>PATIENT BILL OF SUPPLY</u></h5>';
		}else{
			echo '<h2 align="center">PATIENT BILL OF SUPPLY</h2>';
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
<td><b>Description</b></td>
<td><b>Item Code</b></td>
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

				//$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td>'.$Qty.'</td><td>'.$Rate.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
				$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
	$rs->MoveNext();
}
$hhh .= '<tr><td></td><td align="right">Total</td><td align="right">'.$Page->Amount->CurrentValue.'</td></tr>  ';
echo $hhh;
$tt = "ewbarcode.php?data=".$Page->BillNumber->CurrentValue."&encode=QRCODE&height=60&color=%23000000";
?>		
</table> 
<br><br>
<?php
$canCeBill = $Page->CancelBill->CurrentValue;
if($canCeBill == "Yes" || $canCeBill == "Cancel Bill" || $canCeBill == "Cancel Return to Advance" || $canCeBill == "Cancel Cash Return" || $canCeBill == "Cancel NEFT Return")
{
echo "<h1>This Bill is Cancelled... </h1>";
}
if($canCeBill == "Cancel Return to Advance")
{
$rsAdvanceNo = $Page->CancelModeOfPayment->CurrentValue;
		$sql = "select * from `ganeshkumar_bjhims`.`billing_other_voucher` where `AdvanceNo` = '".$rsAdvanceNo."';";
			$results1 = $dbhelper->ExecuteRows($sql);
	echo '';

//		echo	header("location:billing_other_voucherview.php?showdetail=&id=".$results1[0]["id"]);
}
?>
<img src='<?php echo $tt; ?>' alt style="border: 0;">
<p align="right">Signature<p>
<p align="right">
{{:UserName}}
<p>
	  </font>
</div>
</script>
<script type="text/html" class="view_billing_voucher_printview_js">
 window.open("billing_other_voucherview.php?showdetail=&id='.$results1[0]["id"].'", "_blank"); 

</script>

<?php
	if (in_array("view_patient_services", explode(",", $view_billing_voucher_print->getCurrentDetailTable())) && $view_patient_services->DetailView) {
?>
<?php if ($view_billing_voucher_print->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("view_patient_services", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "view_patient_servicesgrid.php" ?>
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($view_billing_voucher_print->Rows) ?> };
	ew.applyTemplate("tpd_view_billing_voucher_printview", "tpm_view_billing_voucher_printview", "view_billing_voucher_printview", "<?php echo $view_billing_voucher_print->CustomExport ?>", ew.templateData.rows[0]);
	$("script.view_billing_voucher_printview_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$view_billing_voucher_print_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_billing_voucher_print_view->isExport()) { ?>
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
$view_billing_voucher_print_view->terminate();
?>