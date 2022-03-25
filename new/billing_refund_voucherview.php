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
$billing_refund_voucher_view = new billing_refund_voucher_view();

// Run the page
$billing_refund_voucher_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$billing_refund_voucher_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$billing_refund_voucher_view->isExport()) { ?>
<script>
var fbilling_refund_voucherview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fbilling_refund_voucherview = currentForm = new ew.Form("fbilling_refund_voucherview", "view");
	loadjs.done("fbilling_refund_voucherview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$billing_refund_voucher_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $billing_refund_voucher_view->ExportOptions->render("body") ?>
<?php $billing_refund_voucher_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $billing_refund_voucher_view->showPageHeader(); ?>
<?php
$billing_refund_voucher_view->showMessage();
?>
<form name="fbilling_refund_voucherview" id="fbilling_refund_voucherview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="billing_refund_voucher">
<input type="hidden" name="modal" value="<?php echo (int)$billing_refund_voucher_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($billing_refund_voucher_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $billing_refund_voucher_view->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_id"><script id="tpc_billing_refund_voucher_id" type="text/html"><?php echo $billing_refund_voucher_view->id->caption() ?></script></span></td>
		<td data-name="id" <?php echo $billing_refund_voucher_view->id->cellAttributes() ?>>
<script id="tpx_billing_refund_voucher_id" type="text/html"><span id="el_billing_refund_voucher_id">
<span<?php echo $billing_refund_voucher_view->id->viewAttributes() ?>><?php echo $billing_refund_voucher_view->id->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($billing_refund_voucher_view->Name->Visible) { // Name ?>
	<tr id="r_Name">
		<td class="<?php echo $billing_refund_voucher_view->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_Name"><script id="tpc_billing_refund_voucher_Name" type="text/html"><?php echo $billing_refund_voucher_view->Name->caption() ?></script></span></td>
		<td data-name="Name" <?php echo $billing_refund_voucher_view->Name->cellAttributes() ?>>
<script id="tpx_billing_refund_voucher_Name" type="text/html"><span id="el_billing_refund_voucher_Name">
<span<?php echo $billing_refund_voucher_view->Name->viewAttributes() ?>><?php echo $billing_refund_voucher_view->Name->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($billing_refund_voucher_view->Mobile->Visible) { // Mobile ?>
	<tr id="r_Mobile">
		<td class="<?php echo $billing_refund_voucher_view->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_Mobile"><script id="tpc_billing_refund_voucher_Mobile" type="text/html"><?php echo $billing_refund_voucher_view->Mobile->caption() ?></script></span></td>
		<td data-name="Mobile" <?php echo $billing_refund_voucher_view->Mobile->cellAttributes() ?>>
<script id="tpx_billing_refund_voucher_Mobile" type="text/html"><span id="el_billing_refund_voucher_Mobile">
<span<?php echo $billing_refund_voucher_view->Mobile->viewAttributes() ?>><?php echo $billing_refund_voucher_view->Mobile->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($billing_refund_voucher_view->voucher_type->Visible) { // voucher_type ?>
	<tr id="r_voucher_type">
		<td class="<?php echo $billing_refund_voucher_view->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_voucher_type"><script id="tpc_billing_refund_voucher_voucher_type" type="text/html"><?php echo $billing_refund_voucher_view->voucher_type->caption() ?></script></span></td>
		<td data-name="voucher_type" <?php echo $billing_refund_voucher_view->voucher_type->cellAttributes() ?>>
<script id="tpx_billing_refund_voucher_voucher_type" type="text/html"><span id="el_billing_refund_voucher_voucher_type">
<span<?php echo $billing_refund_voucher_view->voucher_type->viewAttributes() ?>><?php echo $billing_refund_voucher_view->voucher_type->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($billing_refund_voucher_view->Details->Visible) { // Details ?>
	<tr id="r_Details">
		<td class="<?php echo $billing_refund_voucher_view->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_Details"><script id="tpc_billing_refund_voucher_Details" type="text/html"><?php echo $billing_refund_voucher_view->Details->caption() ?></script></span></td>
		<td data-name="Details" <?php echo $billing_refund_voucher_view->Details->cellAttributes() ?>>
<script id="tpx_billing_refund_voucher_Details" type="text/html"><span id="el_billing_refund_voucher_Details">
<span<?php echo $billing_refund_voucher_view->Details->viewAttributes() ?>><?php echo $billing_refund_voucher_view->Details->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($billing_refund_voucher_view->ModeofPayment->Visible) { // ModeofPayment ?>
	<tr id="r_ModeofPayment">
		<td class="<?php echo $billing_refund_voucher_view->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_ModeofPayment"><script id="tpc_billing_refund_voucher_ModeofPayment" type="text/html"><?php echo $billing_refund_voucher_view->ModeofPayment->caption() ?></script></span></td>
		<td data-name="ModeofPayment" <?php echo $billing_refund_voucher_view->ModeofPayment->cellAttributes() ?>>
<script id="tpx_billing_refund_voucher_ModeofPayment" type="text/html"><span id="el_billing_refund_voucher_ModeofPayment">
<span<?php echo $billing_refund_voucher_view->ModeofPayment->viewAttributes() ?>><?php echo $billing_refund_voucher_view->ModeofPayment->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($billing_refund_voucher_view->Amount->Visible) { // Amount ?>
	<tr id="r_Amount">
		<td class="<?php echo $billing_refund_voucher_view->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_Amount"><script id="tpc_billing_refund_voucher_Amount" type="text/html"><?php echo $billing_refund_voucher_view->Amount->caption() ?></script></span></td>
		<td data-name="Amount" <?php echo $billing_refund_voucher_view->Amount->cellAttributes() ?>>
<script id="tpx_billing_refund_voucher_Amount" type="text/html"><span id="el_billing_refund_voucher_Amount">
<span<?php echo $billing_refund_voucher_view->Amount->viewAttributes() ?>><?php echo $billing_refund_voucher_view->Amount->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($billing_refund_voucher_view->AnyDues->Visible) { // AnyDues ?>
	<tr id="r_AnyDues">
		<td class="<?php echo $billing_refund_voucher_view->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_AnyDues"><script id="tpc_billing_refund_voucher_AnyDues" type="text/html"><?php echo $billing_refund_voucher_view->AnyDues->caption() ?></script></span></td>
		<td data-name="AnyDues" <?php echo $billing_refund_voucher_view->AnyDues->cellAttributes() ?>>
<script id="tpx_billing_refund_voucher_AnyDues" type="text/html"><span id="el_billing_refund_voucher_AnyDues">
<span<?php echo $billing_refund_voucher_view->AnyDues->viewAttributes() ?>><?php echo $billing_refund_voucher_view->AnyDues->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($billing_refund_voucher_view->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $billing_refund_voucher_view->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_createdby"><script id="tpc_billing_refund_voucher_createdby" type="text/html"><?php echo $billing_refund_voucher_view->createdby->caption() ?></script></span></td>
		<td data-name="createdby" <?php echo $billing_refund_voucher_view->createdby->cellAttributes() ?>>
<script id="tpx_billing_refund_voucher_createdby" type="text/html"><span id="el_billing_refund_voucher_createdby">
<span<?php echo $billing_refund_voucher_view->createdby->viewAttributes() ?>><?php echo $billing_refund_voucher_view->createdby->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($billing_refund_voucher_view->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $billing_refund_voucher_view->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_createddatetime"><script id="tpc_billing_refund_voucher_createddatetime" type="text/html"><?php echo $billing_refund_voucher_view->createddatetime->caption() ?></script></span></td>
		<td data-name="createddatetime" <?php echo $billing_refund_voucher_view->createddatetime->cellAttributes() ?>>
<script id="tpx_billing_refund_voucher_createddatetime" type="text/html"><span id="el_billing_refund_voucher_createddatetime">
<span<?php echo $billing_refund_voucher_view->createddatetime->viewAttributes() ?>><?php echo $billing_refund_voucher_view->createddatetime->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($billing_refund_voucher_view->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $billing_refund_voucher_view->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_modifiedby"><script id="tpc_billing_refund_voucher_modifiedby" type="text/html"><?php echo $billing_refund_voucher_view->modifiedby->caption() ?></script></span></td>
		<td data-name="modifiedby" <?php echo $billing_refund_voucher_view->modifiedby->cellAttributes() ?>>
<script id="tpx_billing_refund_voucher_modifiedby" type="text/html"><span id="el_billing_refund_voucher_modifiedby">
<span<?php echo $billing_refund_voucher_view->modifiedby->viewAttributes() ?>><?php echo $billing_refund_voucher_view->modifiedby->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($billing_refund_voucher_view->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $billing_refund_voucher_view->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_modifieddatetime"><script id="tpc_billing_refund_voucher_modifieddatetime" type="text/html"><?php echo $billing_refund_voucher_view->modifieddatetime->caption() ?></script></span></td>
		<td data-name="modifieddatetime" <?php echo $billing_refund_voucher_view->modifieddatetime->cellAttributes() ?>>
<script id="tpx_billing_refund_voucher_modifieddatetime" type="text/html"><span id="el_billing_refund_voucher_modifieddatetime">
<span<?php echo $billing_refund_voucher_view->modifieddatetime->viewAttributes() ?>><?php echo $billing_refund_voucher_view->modifieddatetime->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($billing_refund_voucher_view->PatID->Visible) { // PatID ?>
	<tr id="r_PatID">
		<td class="<?php echo $billing_refund_voucher_view->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_PatID"><script id="tpc_billing_refund_voucher_PatID" type="text/html"><?php echo $billing_refund_voucher_view->PatID->caption() ?></script></span></td>
		<td data-name="PatID" <?php echo $billing_refund_voucher_view->PatID->cellAttributes() ?>>
<script id="tpx_billing_refund_voucher_PatID" type="text/html"><span id="el_billing_refund_voucher_PatID">
<span<?php echo $billing_refund_voucher_view->PatID->viewAttributes() ?>><?php echo $billing_refund_voucher_view->PatID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($billing_refund_voucher_view->PatientID->Visible) { // PatientID ?>
	<tr id="r_PatientID">
		<td class="<?php echo $billing_refund_voucher_view->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_PatientID"><script id="tpc_billing_refund_voucher_PatientID" type="text/html"><?php echo $billing_refund_voucher_view->PatientID->caption() ?></script></span></td>
		<td data-name="PatientID" <?php echo $billing_refund_voucher_view->PatientID->cellAttributes() ?>>
<script id="tpx_billing_refund_voucher_PatientID" type="text/html"><span id="el_billing_refund_voucher_PatientID">
<span<?php echo $billing_refund_voucher_view->PatientID->viewAttributes() ?>><?php echo $billing_refund_voucher_view->PatientID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($billing_refund_voucher_view->PatientName->Visible) { // PatientName ?>
	<tr id="r_PatientName">
		<td class="<?php echo $billing_refund_voucher_view->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_PatientName"><script id="tpc_billing_refund_voucher_PatientName" type="text/html"><?php echo $billing_refund_voucher_view->PatientName->caption() ?></script></span></td>
		<td data-name="PatientName" <?php echo $billing_refund_voucher_view->PatientName->cellAttributes() ?>>
<script id="tpx_billing_refund_voucher_PatientName" type="text/html"><span id="el_billing_refund_voucher_PatientName">
<span<?php echo $billing_refund_voucher_view->PatientName->viewAttributes() ?>><?php echo $billing_refund_voucher_view->PatientName->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($billing_refund_voucher_view->VisiteType->Visible) { // VisiteType ?>
	<tr id="r_VisiteType">
		<td class="<?php echo $billing_refund_voucher_view->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_VisiteType"><script id="tpc_billing_refund_voucher_VisiteType" type="text/html"><?php echo $billing_refund_voucher_view->VisiteType->caption() ?></script></span></td>
		<td data-name="VisiteType" <?php echo $billing_refund_voucher_view->VisiteType->cellAttributes() ?>>
<script id="tpx_billing_refund_voucher_VisiteType" type="text/html"><span id="el_billing_refund_voucher_VisiteType">
<span<?php echo $billing_refund_voucher_view->VisiteType->viewAttributes() ?>><?php echo $billing_refund_voucher_view->VisiteType->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($billing_refund_voucher_view->VisitDate->Visible) { // VisitDate ?>
	<tr id="r_VisitDate">
		<td class="<?php echo $billing_refund_voucher_view->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_VisitDate"><script id="tpc_billing_refund_voucher_VisitDate" type="text/html"><?php echo $billing_refund_voucher_view->VisitDate->caption() ?></script></span></td>
		<td data-name="VisitDate" <?php echo $billing_refund_voucher_view->VisitDate->cellAttributes() ?>>
<script id="tpx_billing_refund_voucher_VisitDate" type="text/html"><span id="el_billing_refund_voucher_VisitDate">
<span<?php echo $billing_refund_voucher_view->VisitDate->viewAttributes() ?>><?php echo $billing_refund_voucher_view->VisitDate->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($billing_refund_voucher_view->AdvanceNo->Visible) { // AdvanceNo ?>
	<tr id="r_AdvanceNo">
		<td class="<?php echo $billing_refund_voucher_view->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_AdvanceNo"><script id="tpc_billing_refund_voucher_AdvanceNo" type="text/html"><?php echo $billing_refund_voucher_view->AdvanceNo->caption() ?></script></span></td>
		<td data-name="AdvanceNo" <?php echo $billing_refund_voucher_view->AdvanceNo->cellAttributes() ?>>
<script id="tpx_billing_refund_voucher_AdvanceNo" type="text/html"><span id="el_billing_refund_voucher_AdvanceNo">
<span<?php echo $billing_refund_voucher_view->AdvanceNo->viewAttributes() ?>><?php echo $billing_refund_voucher_view->AdvanceNo->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($billing_refund_voucher_view->Status->Visible) { // Status ?>
	<tr id="r_Status">
		<td class="<?php echo $billing_refund_voucher_view->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_Status"><script id="tpc_billing_refund_voucher_Status" type="text/html"><?php echo $billing_refund_voucher_view->Status->caption() ?></script></span></td>
		<td data-name="Status" <?php echo $billing_refund_voucher_view->Status->cellAttributes() ?>>
<script id="tpx_billing_refund_voucher_Status" type="text/html"><span id="el_billing_refund_voucher_Status">
<span<?php echo $billing_refund_voucher_view->Status->viewAttributes() ?>><?php echo $billing_refund_voucher_view->Status->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($billing_refund_voucher_view->Date->Visible) { // Date ?>
	<tr id="r_Date">
		<td class="<?php echo $billing_refund_voucher_view->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_Date"><script id="tpc_billing_refund_voucher_Date" type="text/html"><?php echo $billing_refund_voucher_view->Date->caption() ?></script></span></td>
		<td data-name="Date" <?php echo $billing_refund_voucher_view->Date->cellAttributes() ?>>
<script id="tpx_billing_refund_voucher_Date" type="text/html"><span id="el_billing_refund_voucher_Date">
<span<?php echo $billing_refund_voucher_view->Date->viewAttributes() ?>><?php echo $billing_refund_voucher_view->Date->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($billing_refund_voucher_view->AdvanceValidityDate->Visible) { // AdvanceValidityDate ?>
	<tr id="r_AdvanceValidityDate">
		<td class="<?php echo $billing_refund_voucher_view->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_AdvanceValidityDate"><script id="tpc_billing_refund_voucher_AdvanceValidityDate" type="text/html"><?php echo $billing_refund_voucher_view->AdvanceValidityDate->caption() ?></script></span></td>
		<td data-name="AdvanceValidityDate" <?php echo $billing_refund_voucher_view->AdvanceValidityDate->cellAttributes() ?>>
<script id="tpx_billing_refund_voucher_AdvanceValidityDate" type="text/html"><span id="el_billing_refund_voucher_AdvanceValidityDate">
<span<?php echo $billing_refund_voucher_view->AdvanceValidityDate->viewAttributes() ?>><?php echo $billing_refund_voucher_view->AdvanceValidityDate->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($billing_refund_voucher_view->TotalRemainingAdvance->Visible) { // TotalRemainingAdvance ?>
	<tr id="r_TotalRemainingAdvance">
		<td class="<?php echo $billing_refund_voucher_view->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_TotalRemainingAdvance"><script id="tpc_billing_refund_voucher_TotalRemainingAdvance" type="text/html"><?php echo $billing_refund_voucher_view->TotalRemainingAdvance->caption() ?></script></span></td>
		<td data-name="TotalRemainingAdvance" <?php echo $billing_refund_voucher_view->TotalRemainingAdvance->cellAttributes() ?>>
<script id="tpx_billing_refund_voucher_TotalRemainingAdvance" type="text/html"><span id="el_billing_refund_voucher_TotalRemainingAdvance">
<span<?php echo $billing_refund_voucher_view->TotalRemainingAdvance->viewAttributes() ?>><?php echo $billing_refund_voucher_view->TotalRemainingAdvance->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($billing_refund_voucher_view->Remarks->Visible) { // Remarks ?>
	<tr id="r_Remarks">
		<td class="<?php echo $billing_refund_voucher_view->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_Remarks"><script id="tpc_billing_refund_voucher_Remarks" type="text/html"><?php echo $billing_refund_voucher_view->Remarks->caption() ?></script></span></td>
		<td data-name="Remarks" <?php echo $billing_refund_voucher_view->Remarks->cellAttributes() ?>>
<script id="tpx_billing_refund_voucher_Remarks" type="text/html"><span id="el_billing_refund_voucher_Remarks">
<span<?php echo $billing_refund_voucher_view->Remarks->viewAttributes() ?>><?php echo $billing_refund_voucher_view->Remarks->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($billing_refund_voucher_view->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
	<tr id="r_SeectPaymentMode">
		<td class="<?php echo $billing_refund_voucher_view->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_SeectPaymentMode"><script id="tpc_billing_refund_voucher_SeectPaymentMode" type="text/html"><?php echo $billing_refund_voucher_view->SeectPaymentMode->caption() ?></script></span></td>
		<td data-name="SeectPaymentMode" <?php echo $billing_refund_voucher_view->SeectPaymentMode->cellAttributes() ?>>
<script id="tpx_billing_refund_voucher_SeectPaymentMode" type="text/html"><span id="el_billing_refund_voucher_SeectPaymentMode">
<span<?php echo $billing_refund_voucher_view->SeectPaymentMode->viewAttributes() ?>><?php echo $billing_refund_voucher_view->SeectPaymentMode->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($billing_refund_voucher_view->PaidAmount->Visible) { // PaidAmount ?>
	<tr id="r_PaidAmount">
		<td class="<?php echo $billing_refund_voucher_view->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_PaidAmount"><script id="tpc_billing_refund_voucher_PaidAmount" type="text/html"><?php echo $billing_refund_voucher_view->PaidAmount->caption() ?></script></span></td>
		<td data-name="PaidAmount" <?php echo $billing_refund_voucher_view->PaidAmount->cellAttributes() ?>>
<script id="tpx_billing_refund_voucher_PaidAmount" type="text/html"><span id="el_billing_refund_voucher_PaidAmount">
<span<?php echo $billing_refund_voucher_view->PaidAmount->viewAttributes() ?>><?php echo $billing_refund_voucher_view->PaidAmount->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($billing_refund_voucher_view->Currency->Visible) { // Currency ?>
	<tr id="r_Currency">
		<td class="<?php echo $billing_refund_voucher_view->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_Currency"><script id="tpc_billing_refund_voucher_Currency" type="text/html"><?php echo $billing_refund_voucher_view->Currency->caption() ?></script></span></td>
		<td data-name="Currency" <?php echo $billing_refund_voucher_view->Currency->cellAttributes() ?>>
<script id="tpx_billing_refund_voucher_Currency" type="text/html"><span id="el_billing_refund_voucher_Currency">
<span<?php echo $billing_refund_voucher_view->Currency->viewAttributes() ?>><?php echo $billing_refund_voucher_view->Currency->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($billing_refund_voucher_view->CardNumber->Visible) { // CardNumber ?>
	<tr id="r_CardNumber">
		<td class="<?php echo $billing_refund_voucher_view->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_CardNumber"><script id="tpc_billing_refund_voucher_CardNumber" type="text/html"><?php echo $billing_refund_voucher_view->CardNumber->caption() ?></script></span></td>
		<td data-name="CardNumber" <?php echo $billing_refund_voucher_view->CardNumber->cellAttributes() ?>>
<script id="tpx_billing_refund_voucher_CardNumber" type="text/html"><span id="el_billing_refund_voucher_CardNumber">
<span<?php echo $billing_refund_voucher_view->CardNumber->viewAttributes() ?>><?php echo $billing_refund_voucher_view->CardNumber->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($billing_refund_voucher_view->BankName->Visible) { // BankName ?>
	<tr id="r_BankName">
		<td class="<?php echo $billing_refund_voucher_view->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_BankName"><script id="tpc_billing_refund_voucher_BankName" type="text/html"><?php echo $billing_refund_voucher_view->BankName->caption() ?></script></span></td>
		<td data-name="BankName" <?php echo $billing_refund_voucher_view->BankName->cellAttributes() ?>>
<script id="tpx_billing_refund_voucher_BankName" type="text/html"><span id="el_billing_refund_voucher_BankName">
<span<?php echo $billing_refund_voucher_view->BankName->viewAttributes() ?>><?php echo $billing_refund_voucher_view->BankName->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($billing_refund_voucher_view->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $billing_refund_voucher_view->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_HospID"><script id="tpc_billing_refund_voucher_HospID" type="text/html"><?php echo $billing_refund_voucher_view->HospID->caption() ?></script></span></td>
		<td data-name="HospID" <?php echo $billing_refund_voucher_view->HospID->cellAttributes() ?>>
<script id="tpx_billing_refund_voucher_HospID" type="text/html"><span id="el_billing_refund_voucher_HospID">
<span<?php echo $billing_refund_voucher_view->HospID->viewAttributes() ?>><?php echo $billing_refund_voucher_view->HospID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($billing_refund_voucher_view->Reception->Visible) { // Reception ?>
	<tr id="r_Reception">
		<td class="<?php echo $billing_refund_voucher_view->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_Reception"><script id="tpc_billing_refund_voucher_Reception" type="text/html"><?php echo $billing_refund_voucher_view->Reception->caption() ?></script></span></td>
		<td data-name="Reception" <?php echo $billing_refund_voucher_view->Reception->cellAttributes() ?>>
<script id="tpx_billing_refund_voucher_Reception" type="text/html"><span id="el_billing_refund_voucher_Reception">
<span<?php echo $billing_refund_voucher_view->Reception->viewAttributes() ?>><?php echo $billing_refund_voucher_view->Reception->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($billing_refund_voucher_view->mrnno->Visible) { // mrnno ?>
	<tr id="r_mrnno">
		<td class="<?php echo $billing_refund_voucher_view->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_mrnno"><script id="tpc_billing_refund_voucher_mrnno" type="text/html"><?php echo $billing_refund_voucher_view->mrnno->caption() ?></script></span></td>
		<td data-name="mrnno" <?php echo $billing_refund_voucher_view->mrnno->cellAttributes() ?>>
<script id="tpx_billing_refund_voucher_mrnno" type="text/html"><span id="el_billing_refund_voucher_mrnno">
<span<?php echo $billing_refund_voucher_view->mrnno->viewAttributes() ?>><?php echo $billing_refund_voucher_view->mrnno->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($billing_refund_voucher_view->GetUserName->Visible) { // GetUserName ?>
	<tr id="r_GetUserName">
		<td class="<?php echo $billing_refund_voucher_view->TableLeftColumnClass ?>"><span id="elh_billing_refund_voucher_GetUserName"><script id="tpc_billing_refund_voucher_GetUserName" type="text/html"><?php echo $billing_refund_voucher_view->GetUserName->caption() ?></script></span></td>
		<td data-name="GetUserName" <?php echo $billing_refund_voucher_view->GetUserName->cellAttributes() ?>>
<script id="tpx_billing_refund_voucher_GetUserName" type="text/html"><span id="el_billing_refund_voucher_GetUserName">
<span<?php echo $billing_refund_voucher_view->GetUserName->viewAttributes() ?>><?php echo $billing_refund_voucher_view->GetUserName->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_billing_refund_voucherview" class="ew-custom-template"></div>
<script id="tpm_billing_refund_voucherview" type="text/html">
<div id="ct_billing_refund_voucher_view"><style>
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
			$patient_id = $Page->PatientID->CurrentValue;
					 $PatId = $Page->PatID->CurrentValue;
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
<table width="100%">
	 <tbody>
		<tr>
			<td  style="float:left;width:50px;"></td>
			<td><h2 align="center">Refund Receipt</h2></td>
			<td  style="float:left;width:50px;"><img src='<?php echo $aa; ?>' alt style="border: 0;"></td>
		</tr>
	</tbody>
</table>
<hr>
<font size="4" style="font-weight: bold;">
<table width="100%">
	 <tbody>
		<tr><td  style="width:240px;">Patient Id  </td><td  style="width:4px;">:</td><td> {{:PatientID}} </td><td  style="float: right;">Adv. No: {{:AdvanceNo}}</td></tr>
		<tr><td  style="width:240px;">Patient Name  </td><td  style="width:4px;">:</td><td> {{:PatientName}}</td><td  style="float: right;">Adv. Date:<?php echo date("d-m-Y", strtotime($Page->createddatetime->CurrentValue)); ?></td></tr>
	</tbody>
</table>
<table width="100%">
	 <tbody>
		<tr><td  style="width:240px;">Address  </td><td  style="width:4px;">:</td><td> <?php echo $address; ?> </td></tr>
			<tr><td  style="width:240px;">Remarks</td><td  style="width:4px;">:</td><td> {{:Remarks}} </td></tr>
			<tr><td  style="width:240px;">Advance Amount (Rs.)</td><td  style="width:4px;">:</td><td> {{:Amount}} </td></tr>
			<tr><td  style="width:240px;">In words</td><td  style="width:4px;">:</td><td>  <?php echo convertToIndianCurrency($Page->Amount->CurrentValue); ?> </td></tr>
			<tr><td  style="width:240px;">Payment Details</td><td  style="width:4px;">:</td><td> {{:ModeofPayment}} </td></tr>
<?php
if($Page->ModeofPayment->CurrentValue =='CARD' || $Page->ModeofPayment->CurrentValue =='PAYTM'  || $Page->ModeofPayment->CurrentValue =='NEFT' )
{
$bankMode = '<tr><td  style="width:240px;">Number </td><td  style="width:4px;">:</td><td> ********'.substr($Page->CardNumber->CurrentValue,-4).' </td></tr>';
$bankMode .= '<tr><td  style="width:240px;">Bank Name</td><td  style="width:4px;">:</td><td> '.$Page->BankName->CurrentValue.' </td></tr>';
echo $bankMode;
}
$tt = "ewbarcode.php?data=".$Page->AdvanceNo->CurrentValue."&encode=QRCODE&height=60&color=%23000000";
?>
	</tbody>
</table>
<hr>
<table width="100%">
	 <tbody>
		<tr><td  style="float:left;"><img src='<?php echo $tt; ?>' alt style="border: 0;">Printed On: <?php echo date("F j, Y"); ?> </td><td  style="float: right;">Prep By: {{:createdby}}</td></tr>			
	</tbody>
</table>
</font>
</div>
</script>

</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($billing_refund_voucher->Rows) ?> };
	ew.applyTemplate("tpd_billing_refund_voucherview", "tpm_billing_refund_voucherview", "billing_refund_voucherview", "<?php echo $billing_refund_voucher->CustomExport ?>", ew.templateData.rows[0]);
	$("script.billing_refund_voucherview_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$billing_refund_voucher_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$billing_refund_voucher_view->isExport()) { ?>
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
$billing_refund_voucher_view->terminate();
?>